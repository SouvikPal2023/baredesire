@extends('frontend.master')
@section('title', "Index")
@section('content')

<!--banner sec-->
<section class="banner d-none d-lg-block d-md-block d-sm-none">
    <div class="banner-grid">
        <!-- <div class="banner-content">
            <h3>{{$section1->heading}}</h3>
            <h4>{{$section1->sub_heading}}</h4>
            <p>{{$section1->description}}</p>
            <a href="{{$section1->btn1_url}}" class="shopnow">{{$section1->btn1_text}}</a>
            <a href="{{$section1->btn2_url}}" class="arrival">{{$section1->btn2_text}}</a>
        </div> -->
        <div class="banner-slider">
            <div id="banner-image" class="owl-carousel owl-theme">
                <!-- <div class="item">
                    <img src="{{  isset($section1->image1) ? config("app.url").Storage::url($section1->image1) : asset('adminAssets/img/default-image.png') }}"
                        alt="image" /> -->
                    <!-- <img src="{{asset('assets/images/banner1.jpg')}}" alt=""> -->
                <!-- </div> -->
                <div class="item">
                    <img src="{{  isset($section1->image2) ? config("app.url").Storage::url($section1->image2) : asset('adminAssets/img/default-image.png') }}"
                        alt="image" />
                    <!-- <img src="{{asset('assets/images/banner1.jpg')}}" alt=""> -->
                </div>
                <div class="item">
                    <img src="{{  isset($section1->image3) ? config("app.url").Storage::url($section1->image3) : asset('adminAssets/img/default-image.png') }}"
                        alt="image" />
                    <!-- <img src="{{asset('assets/images/banner1.jpg')}}" alt=""> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner end -->


<!--banner sec mobile-->
<section class="banner d-block d-sm-block d-md-none d-lg-none">
    <div class="banner-grid">

        <div class="banner-slider">
            <div id="banner-imageM" class="owl-carousel owl-theme">
                <!-- <div class="item">
                    <img src="{{  isset($section1->image1) ? config("app.url").Storage::url($section1->image1) : asset('adminAssets/img/default-image.png') }}"
                        alt="image" />
                </div> -->
                <div class="item">
                    <img src="{{  isset($section1->image2) ? config("app.url").Storage::url($section1->image2) : asset('adminAssets/img/default-image.png') }}"
                        alt="image" />
                </div>
                <div class="item">
                    <img src="{{  isset($section1->image3) ? config("app.url").Storage::url($section1->image3) : asset('adminAssets/img/default-image.png') }}"
                        alt="image" />
                </div>
            </div>
        </div>
        <!-- <div class="banner-content">
            <h3>{{$section1->heading}}</h3>
            <h4>{{$section1->sub_heading}}</h4>
            <p>{{$section1->description}}</p>
            <a href="{{$section1->btn1_url}}" class="shopnow">{{$section1->btn1_text}}</a>
            <a href="{{$section1->btn2_url}}" class="arrival">{{$section1->btn2_text}}</a>
        </div> -->
    </div>
</section>
<!-- banner end -->

<!-- latest-sec -->
<section class="latest-sec">
    <div class="container-fluid">
        <div class="latest-sec-wrap">
            <div class="latest-sec-wrap-box1">
                <a href="{{$section2->btn1_url}}">
                    <div class="img-box">
                        <img src="{{  isset($section2->image1) ? config("app.url").Storage::url($section2->image1) :asset('assets/images/ls1.jpg') }}"
                            alt="image" />
                        <!-- <img src="{{asset('assets/images/ls1.jpg')}}" alt=""> -->
                    </div>
                    <div class="img-box-details">
                        <img src="{{  isset($section2->btn_image) ? config("app.url").Storage::url($section2->btn_image) :asset('assets/images/right-arrows1.png') }}"
                            alt="image" />
                        <p>{{$section2->btn1_text}}</p>
                    </div>
                </a>
            </div>
            <div class="latest-sec-wrap-box2">
                <a href="{{$section2->btn2_url}}">
                    <div class="img-box">
                        <img src="{{  isset($section2->image2) ? config("app.url").Storage::url($section2->image2) :asset('assets/images/ls2.jpg') }}"
                            alt="image" />
                        <!-- <img src="{{asset('assets/images/ls2.jpg')}}" alt=""> -->
                    </div>
                    <div class="img-box-details">
                        <img src="{{  isset($section2->btn_image) ? config("app.url").Storage::url($section2->btn_image) :asset('assets/images/right-arrows1.png') }}"
                            alt="image" />
                        <p>{{$section2->btn2_text}}</p>
                    </div>
                </a>
            </div>
            <div class="latest-sec-wrap-box1">
                <a href="{{$section2->btn3_url}}">
                    <div class="img-box">
                        <img src="{{  isset($section2->image3) ? config("app.url").Storage::url($section2->image3) :asset('assets/images/ls3.jpg') }}"
                            alt="image" />
                        <!-- <img src="{{asset('assets/images/ls3.jpg')}}" alt=""> -->
                    </div>
                    <div class="img-box-details">
                        <img src="{{  isset($section2->btn_image) ? config("app.url").Storage::url($section2->btn_image) :asset('assets/images/right-arrows1.png') }}"
                            alt="image" />
                        <p>{{$section2->btn3_text}}</p>
                    </div>
                </a>
            </div>
            <div class="latest-sec-wrap-box2">
                <a href="{{$section2->btn4_url}}">
                    <div class="img-box">
                        <img src="{{  isset($section2->image4) ? config("app.url").Storage::url($section2->image4) :asset('assets/images/ls4.jpg') }}"
                            alt="image" />
                        <!-- <img src="{{asset('assets/images/ls4.jpg')}}" alt=""> -->
                    </div>
                    <div class="img-box-details">
                        <img src="{{  isset($section2->btn_image) ? config("app.url").Storage::url($section2->btn_image) :asset('assets/images/right-arrows1.png') }}"
                            alt="image" />
                        <p>{{$section2->btn4_text}}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- latest-sec-end -->

<!-- fun -->
<section class="fun">
    <div class="section-head">
        <h3>{{$section3->heading}}</h3>
    </div>
    <div class="fun-wrap">
        <div class="row m-0">
            <div class="col-md-6 p-0">
                <div class="fun-wrap-box">
                    <img src="{{  isset($section3->image1) ? config("app.url").Storage::url($section3->image1) :asset('assets/images/fun1.jpg') }}"
                        alt="image" />
                    <!-- <img src="{{asset('assets/images/fun1.jpg')}}" alt=""> -->
                    <div class="fun-wrap-box-deatil">
                        <h4>{{$section3->image1_text}}</h4>
                        <a href="{{$section3->btn1_url}}">{{$section3->btn1_text}}<i class="fa fa-angle-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-0">
                <div class="fun-wrap-box">
                    <img src="{{  isset($section3->image2) ? config("app.url").Storage::url($section3->image2) :asset('assets/images/fun2.jpg') }}"
                        alt="image" />
                    <!-- <img src="{{asset('assets/images/fun2.jpg')}}" alt=""> -->
                    <div class="fun-wrap-box-deatil">
                        <h4>{{$section3->image2_text}}</h4>
                        <a href="{{$section3->btn2_url}}">{{$section3->btn2_text}}<i class="fa fa-angle-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- fun end-->

<!-- feature -->
<section class="feature">
    <div class="container">
        <div class="feature-wrap">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-wrap-box">
                        <a href="{{$section9->url1}}">
                            <img src="{{  isset($section9->image1) ? config("app.url").Storage::url($section9->image1) :asset('assets/images/sticker1.png') }}"
                                alt="image" />
                            <!-- <img src="{{asset('assets/images/sticker1.png')}}" alt=""> -->
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-wrap-box">
                        <a href="{{$section9->url2}}">
                            <img src="{{  isset($section9->image2) ? config("app.url").Storage::url($section9->image2) :asset('assets/images/sticker2.png') }}"
                                alt="image" />
                            <!-- <img src="{{asset('assets/images/sticker2.png')}}" alt=""> -->
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-wrap-box">
                        <a href="{{$section9->url3}}">
                            <img src="{{  isset($section9->image3) ? config("app.url").Storage::url($section9->image3) :asset('assets/images/sticker3.png') }}"
                                alt="image" />
                            <!-- <img src="{{asset('assets/images/sticker3.png')}}" alt=""> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- feature-end -->
@php
$i=1;
$j=1;
@endphp
<!-- collection -->
<section class="collection">
    <div class="container-fluid">
        <div class="section-head">
            <h3>new collection</h3>
        </div>
        <div class="product-wrap">
            @foreach($products as $product)
            <div class="product-wrap-box">

                <a href="{{route('productDetail',$product->id)}}"> <img
                        src="{{  isset($product->product_images->first()->image) ? config("app.url").Storage::url($product->product_images->first()->image) :asset('assets/images/sticker3.png') }}"
                        alt="{{ $product->name }}" />
                    <h4>{{ Str::limit($product->name, 30) }}</h4>
                    <p>${{$product->original_price}}</p>
                </a>
                <div class="cart-button">
                    <a href="#" class="cart" data-target="#size-modal{{$i}}" data-toggle="modal">Add to cart</a>
                    <form action="{{route('addToWish')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <input type="hidden" name="id" value="{{$product->id}}" />
                    <button type="submit" class="buy">Add to Wishlist</button>
</form>
                </div>
                <div class="modal fade size-chart" id="size-modal{{$i}}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="size-modal{{$i}}">Select Size</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('addToCart')}}" method="POST" enctype="multipart/form-data">

                                    @csrf
                                    <input type="hidden" name="id" value="{{$product->id}}" />
                                  
                                    <input type="hidden" name="quantity" value="1" />
                                    <ul class="free-selected size_mar listNone Sizeslist normal radio-button"
                                        id="selectSize2">
                                        
                                        @foreach($product->product_sizes as $size)
                                        <input type="radio" id="radio{{$j}}" name="size" value="{{$size->size}}">
                                        <label for="radio{{$j}}">{{$size->size}}</label>

                                        @php
                                        $j++;
                                        @endphp
                                        @endforeach

                                    </ul>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Go To Cart</button>
                                <!-- <button type="button" class="btn btn-primary">Submit</button> -->
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--END MODAL-->
            </div>
            @php
            $i++;
            @endphp
            @endforeach
        </div>
    </div>
</section>
<!-- collection-head -->




<!-- bra -->
<section class="fun">
    <div class="section-head">
        <h3>{{$section4->heading}}</h3>
    </div>
    <div class="fun-wrap">
        <div class="row m-0">
            <div class="col-md-6 p-0">
                <div class="fun-wrap-box">
                    <img src="{{  isset($section4->image1) ? config("app.url").Storage::url($section4->image1) :asset('assets/images/bra1.jpg') }}"
                        alt="image" />
                    <!-- <img src="{{asset('assets/images/bra1.jpg')}}" alt=""> -->
                    <div class="fun-wrap-box-deatil">
                        <h4>{{$section4->image1_text}}</h4>
                        <a href="{{$section4->btn1_url}}">{{$section4->btn1_text}}<i class="fa fa-angle-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-0">
                <div class="fun-wrap-box">
                    <img src="{{  isset($section4->image2) ? config("app.url").Storage::url($section4->image2) :asset('assets/images/bra2.jpg') }}"
                        alt="image" />
                    <!-- <img src="{{asset('assets/images/bra2.jpg')}}" alt=""> -->
                    <div class="fun-wrap-box-deatil">
                        <h4>{{$section4->image2_text}}</h4>
                        <a href="{{$section4->btn2_url}}">{{$section4->btn2_text}}<i class="fa fa-angle-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- bra end-->


<!-- shapewear -->
<section class="shapewear">
    <div class="shapewear-bg">
        <img src="{{  isset($section5->image) ? config("app.url").Storage::url($section5->image) :asset('assets/images/shapewear-bg.jpg') }}"
            alt="image" />
        <!-- <img src="{{asset('assets/images/shapewear-bg.jpg')}}" alt=""> -->
    </div>
    <div class="shapewear-content">
        <h3>{{$section5->heading}}</h3>
        <p>{{$section5->desc}}</p>
        <a href="{{$section5->btn_url}}">{{$section5->btn_text}}<i class="fa fa-angle-right" aria-hidden="true"></i></a>
    </div>
</section>
<!-- shapewear end -->

<!-- secret -->
<section class="secret">
    <div class="container">
        <div class="secret-header">
            <h3>{{$section6->heading}}</h3>
            <p>{{$section6->sub_heading}}</p>
        </div>
        <div class="secret-wrap">
            <div class="row">
                <div class="col-md-3">
                    <div class="secret-wrap-box">
                        <img src="{{  isset($section6->image1) ? config("app.url").Storage::url($section6->image1) :asset('assets/images/sa1.png') }}"
                            alt="image" />
                        <!-- <img src="{{asset('assets/images/sa1.png')}}" alt=""> -->
                        <h4>{{$section6->image1_heading}}</h4>
                        <p>{{$section6->image1_text}} </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="secret-wrap-box">
                        <img src="{{  isset($section6->image2) ? config("app.url").Storage::url($section6->image2) :asset('assets/images/sa2.png') }}"
                            alt="image" />
                        <h4>{{$section6->image2_heading}}</h4>
                        <p>{{$section6->image2_text}}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="secret-wrap-box">
                        <img src="{{  isset($section6->image3) ? config("app.url").Storage::url($section6->image3) :asset('assets/images/sa3.png') }}"
                            alt="image" />
                        <h4>{{$section6->image3_heading}}</h4>
                        <p>{{$section6->image3_text}}</p>
                    </div>
                </div>
                <!-- <div class="col-md-3">
                    <div class="secret-wrap-box">
                        <img src="{{  isset($section6->image4) ? config("app.url").Storage::url($section6->image4) :asset('assets/images/sa4.png') }}"
                            alt="image" />
                        <h4>{{$section6->image4_heading}}</h4>
                        <p>{{$section6->image4_text}}</p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- secret end -->


<!-- shopnow -->
<section class="shopnow-sec">
    <div class="row m-0 align-items-center">
        <div class="col-md-7 p-0">
            <img src="{{  isset($section7->image) ? config("app.url").Storage::url($section7->image) :asset('assets/images/shopnow.jpg') }}"
                alt="image" />
            <!-- <img src="{{asset('assets/images/shopnow.jpg')}}" alt=""> -->
        </div>
        <div class="col-md-5 p-0">
            <div class="shopnow-sec-content">
                <h4>{{$section7->heading}}</h4>
                <p>{{$section7->desc}}</p>
                <a href="{{$section7->btn_url}}">{{$section7->btn_text}}<i class="fa fa-angle-right"
                        aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- shopnow-end -->





<!-- testimonial -->
<section class="testimonial text-center">
    <div class="container">
        <div class="testimonial-header">
            <h3>{{$section8->heading}}</h3>
        </div>
        <div id="testimonial-slider" class="owl-carousel owl-theme">
            <div class="item">
                <p>{{$section8->desc}}<br><br> <span>
                        {{$section8->name}}</span></p>
            </div>
            <div class="item">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. " <br><br> <span>
                        - P.R.Noida</span></p>
            </div>
        </div>
    </div>
</section>
<!-- testimonial-end -->

@endsection