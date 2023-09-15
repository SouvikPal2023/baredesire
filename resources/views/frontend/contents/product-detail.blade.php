@extends('frontend.master')
@section('title', "Product Detail")
@section('content')
<!-- banner-inner -->
<section class="detail-product-card">
    <div class="container-fluid">
        <div class="card-wrapper">
            <div class="card">
                <!-- card left -->
                <div id="sidebar">
                    <div class="product-imgs">
                        <div class="img-display">
                            <div class="img-showcase">
                                @foreach($product->product_images as $image)
                                <img src="{{  isset($image->image) ? config("app.url").Storage::url($image->image) :asset('assets/images/logo.png') }}"
                                    alt="image" />
                                <!-- <img src="{{asset('assets/images/ls1.jpg')}}" alt="shoe image" /> -->
                                <!-- <img src="{{asset('assets/images/ls3.jpg')}}" alt="shoe image" />
                    <img src="{{asset('assets/images/ls1.jpg')}}" alt="shoe image" />
                    <img src="{{asset('assets/images/ls3.jpg')}}" alt="shoe image" /> -->
                                @endforeach
                            </div>
                        </div>
                        <div class="img-select">
                            @php
                            $i=1;
                            @endphp
                            @foreach($product->product_images as $image)
                            <div class="img-item">
                                <a href="#" data-id="{{$i++}}">
                                    <img src="{{  isset($image->image) ? config("app.url").Storage::url($image->image) :asset('assets/images/logo.png') }}"
                                        alt="image" />
                                </a>
                            </div>
                            @endforeach
                            <!-- <div class="img-item">
                    <a href="#" data-id="2">
                      <img src="{{asset('assets/images/ls3.jpg')}}" alt="shoe image" />
                    </a>
                  </div>
                  <div class="img-item">
                    <a href="#" data-id="3">
                      <img src="{{asset('assets/images/ls1.jpg')}}" alt="shoe image" />
                    </a>
                  </div>
                  <div class="img-item">
                    <a href="#" data-id="4">
                      <img src="{{asset('assets/images/ls3.jpg')}}" alt="shoe image" />
                    </a>
                  </div> -->
                        </div>
                    </div>
                </div>
                <!-- card right -->
                <div class="product-content">
                    <h2 class="product-title">{{$product->name}}</h2>
                    <!-- <a href="#" class="product-link">visit near store</a> -->
                    @php
                    $wholeStars = floor($avgRating);
                    $fractionalStar = $avgRating - $wholeStars;
                    @endphp
                    <div class="product-rating">
                        @if($countRatings>0)
                        <!-- @for ($i = 0; $i < 5; $i++) 
                        @if ($i < $avgRating) 
                        <i class="fa fa-star" aria-hidden="true"></i>
                            @else
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            @endif
                            @endfor -->
                        @for ($i = 0; $i < $wholeStars; $i++) <i class="fa fa-star" aria-hidden="true"></i>
                            @endfor

                            @if ($fractionalStar > 0)
                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                            @else
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            @endif



                            <!-- <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i> -->

                            <span>{{$avgRating}} ({{$countRatings}})</span>
                            @else
                            <span>No Reviews!</span>
                            @endif
                    </div>
                    @php
                    $price=($product->original_price -$product->selling_price);
                    $percent=($price/$product->original_price)*100;
                    @endphp
                    <div class="product-price">
                        <p class="last-price">Old Price: <span>${{$product->original_price}}</span></p>
                        <p class="new-price">New Price: <span>${{$product->selling_price}} ({{floor($percent)}}%)</span>
                        </p>
                    </div>
                    <form action="{{route('addToCart')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div id="available_sizes">
                            <p class="sizesAvailble prThumb">
                                <span style="text-align: left"> Available Sizes</span>
                            </p>

                            <input type="hidden" name="id" value="{{$product->id}}" />
                            <ul class="free-selected size_mar listNone Sizeslist normal radio-button" id="selectSize1">
                                @php
                                $i=1;
                                @endphp
                                @foreach($product->product_sizes as $size)
                                <input type="radio" id="radio{{$i}}" name="size" value="{{$size->size}}">
                                <label for="radio{{$i}}">{{$size->size}}</label>
                                @php
                                $i++;
                                @endphp
                                @endforeach

                            </ul>
                            <div id="requestSizeContainer"
                                class="productFilter size_mar productFilterLook2 col-lg-12 clearfix">
                                <p class="sizeChartRequest">
                                    <span style="display: flex">
                                        <a href="#" class="last" data-toggle="modal" data-target="#exampleModal">SIZE
                                            CHART</a>
                                    </span>

                                    <span class="sizeRequest">Couldn't find your size?<a href="#" class="pinkDark">
                                            Request your size here</a></span>
                                </p>
                            </div>
                        </div>

                        <div class="m-colors">
                            <h2>Choose Colors</h2>
                            <div class="c1">
                                <div class="radius-color">

                                    <div class="circle active" style="background-color:{{$product->color->code}}"></div>

                                    @foreach($product->variations as $variation)



                                    <a href="{{route('productDetail',$variation->id)}}">
                                        <div class="circle" style="background-color:{{$variation->color->code}}"></div>
                                    </a>

                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nl1" href="#buzz" role="tab" data-toggle="tab">Wash</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nl1" href="#references" role="tab" data-toggle="tab">
                                    Additional Info</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content product-details-tab">
                            <div role="tabpanel" class="tab-pane fade in active show" id="profile">
                                <div class="product-detail">
                                    {!!$product->description!!}
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="buzz">
                                <div class="prdetail">
                                    {!!$product->wash!!}

                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="references">
                                <div>
                                    <div class="prdetail prddetails_addinfo">
                                        <p>
                                            {!!$product->additional!!}

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="purchase-info">
                            <input type="number" name="quantity" min="1" max="10" value="1" />

                            <button type="submit" class="btn">
                                Add to Cart
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </button>

                            <button type="button" class="btn">Buy Now</button>
                        </div>
                    </form>
                    <div class="estimate-delivery">
                        <h2>
                            <i class="fa fa-truck" aria-hidden="true"><span>Estimate Delivery</span></i>
                        </h2>
                        <div class="bnd">
                            <a href="#" class="bnd1">Shipping </a>
                            <a href="#" class="bnd1">Discreet Packaging </a>
                            <a href="#" class="bnd11"> Return Policy </a>
                        </div>
                        <form class="address-pincode">
                            @csrf
                            <input class="pin" placeholder=" Enter Pincode" type="text" name="pincode" />
                            <button type="submit" class="btn">Check</button>

                        </form>
                        <div id="pincode-message" class=""></div>
                    </div>

                    <section>
                        <div class="factor">
                            <p class="icns">
                                <span>
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </span>
                                <strong>COD Available</strong>
                            </p>
                            <p class="icns">
                                <span>
                                    <i class="fa fa-refresh" aria-hidden="true"></i>
                                </span>
                                <strong>15 days returns</strong>
                            </p>
                            <p class="icns">
                                <span>
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                </span>
                                <strong>Free shipping</strong>
                            </p>
                        </div>
                    </section>

                    <section class="rating">
                        <h2>Rating & Reviews</h2>
                        <div class="rating-list">
                            <div class="stars">
                                @if($countRatings>0)

                                @for ($i = 0; $i < $wholeStars; $i++) <i class="fa fa-star" aria-hidden="true"></i>
                                    @endfor

                                    @if ($fractionalStar > 0)
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                    @else
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    @endif

                                    <span>{{$avgRating}} ({{$countRatings}})</span>
                                    @else
                                    <span>No Reviews!</span>
                                    @endif
                                    <!-- <i class="fa fa-star" aria-hidden="true" style="color: gold"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color: gold"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color: gold"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color: gold"></i>

                                <i class="fa fa-star" aria-hidden="true"></i> -->
                            </div>

                            <div class="rating-star">
                                <div> @if($countRatings>0)
                                    <span>{{$avgRating}} </span>
                                    <span class="rating-span1"> Based on Rating</span>@endif
                                </div>
                                @if(auth()->user())
                                <a href="#" class="rating-btn" data-target="#review" data-toggle="modal">RATE &
                                    REVIEW</a>
                                @endif
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="more-like-wrap">
    @if($similar_products->isEmpty())
    <div></div>
    @else
    <h2>Similar Products</h2>
    <div class="more-like">
        <div class="owl-carousel owl-theme" id="similar-products">
            @foreach($similar_products as $similar)
            <div class="item">
                <ul>
                    <li>
                        <a href="{{route('productDetail',$similar->id)}}" class="product-img">
                            <img src="{{  isset($similar->product_images->first->image->image) ? config("app.url").Storage::url($similar->product_images->first->image->image) :asset('assets/images/logo.png') }}"
                                alt="owl1" />
                            <!-- <img src="{{asset('assets/images/pr1.jpg')}}" alt="owl1" /> -->
                            <span>{{$similar->name}}</span>
                            <span> $ {{$similar->original_price}}</span>
                        </a>
                    </li>
                </ul>
            </div>
            @endforeach

        </div>
    </div>
    @endif
    <!--Modal-->
    <div class="modal fade size-chart" id="review" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="review">Review & Rating</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('postReview')}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}" />
                        <div class="col">
                            <div class="rate">
                                <input type="radio" id="star5" class="rate" name="rating" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" class="rate" name="rating" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" class="rate" name="rating" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" class="rate" name="rating" value="2">
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" class="rate" name="rating" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>

                        <textarea rows="12" class="form-control no-resize" name="review"
                            placeholder="Write your review here!"></textarea>



                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <!-- <button type="button" class="btn btn-primary">Submit</button> -->
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.address-pincode').submit(function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the pincode entered by the user
        var pincode = $('input[name="pincode"]').val();

        // Make an AJAX request to check the pincode
        $.ajax({
            type: 'POST',
            url: '{{ route('pincode') }}', // Replace with your actual route URL
            data: {
                _token: '{{ csrf_token() }}',
                pincode: pincode
            },
            success: function(response) {
                // Display the response message in the message div
                console.log(response)

                if (response.status == 404) {
                    $('#pincode-message').html(response.message).removeClass(
                        'success-message').addClass('error-message');;
                } else {
                    $('#pincode-message').html(response.message).removeClass(
                        'error-message').addClass('success-message');

                }


            },
            error: function() {
                // Handle errors here, e.g., display an error message
                $('#pincode-message').html('Error occurred while checking pincode.');
            }
        });
    });
});
</script>

<style>
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}

.rate:not(:checked)>input {
    position: absolute;
    display: none;
}

.rate:not(:checked)>label {
    float: right;
    width: 1em;
    overflow: hidden;
    white-space: nowrap;
    cursor: pointer;
    font-size: 30px;
    color: #ccc;
}

.rated:not(:checked)>label {
    float: right;
    width: 1em;
    overflow: hidden;
    white-space: nowrap;
    cursor: pointer;
    font-size: 30px;
    color: #ccc;
}

.rate:not(:checked)>label:before {
    content: '★ ';
}

.rate>input:checked~label {
    color: #ffc700;
}

.rate:not(:checked)>label:hover,
.rate:not(:checked)>label:hover~label {
    color: #deb217;
}

.rate>input:checked+label:hover,
.rate>input:checked+label:hover~label,
.rate>input:checked~label:hover,
.rate>input:checked~label:hover~label,
.rate>label:hover~input:checked~label {
    color: #c59b08;
}

.star-rating-complete {
    color: #c59b08;
}

.rating-container .form-control:hover,
.rating-container .form-control:focus {
    background: #fff;
    border: 1px solid #ced4da;
}

.rating-container textarea:focus,
.rating-container input:focus {
    color: #000;
}

.rated {
    float: left;
    height: 46px;
    padding: 0 10px;
}

.rated:not(:checked)>input {
    position: absolute;
    display: none;
}

.rated:not(:checked)>label {
    float: right;
    width: 1em;
    overflow: hidden;
    white-space: nowrap;
    cursor: pointer;
    font-size: 30px;
    color: #ffc700;
}

.rated:not(:checked)>label:before {
    content: '★ ';
}

.rated>input:checked~label {
    color: #ffc700;
}

.rated:not(:checked)>label:hover,
.rated:not(:checked)>label:hover~label {
    color: #deb217;
}

.rated>input:checked+label:hover,
.rated>input:checked+label:hover~label,
.rated>input:checked~label:hover,
.rated>input:checked~label:hover~label,
.rated>label:hover~input:checked~label {
    color: #c59b08;
}
</style>
@endsection