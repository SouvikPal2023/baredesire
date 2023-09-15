@extends('frontend.master')
@section('title', "Product Detail")
@section('content')
<!-- banner-inner -->
<section class="inner-banner">
    <div class="container-fluid">
        <div class="inner-header">
            <div class="inner-header-menu">
                <ul>
                    <li><a href="{{route('dashboard')}}">Home</a></li>
                    <li><a href="{{route('maincategory-product',$category->parent->parent->id)}}">{{$category->parent->parent->name}}</a></li>
                    <li>
                        <p>{{$category->name}}</p>
                    </li>
                </ul>
            </div>
            <div class="product-heading">
                <h4>{{$category->name}}<span>({{$data_count}} products)</span></h4>
            </div>
        </div>
        <div class="breadcrumb-2">
            <img src="{{  isset($category->banner_image) ? config("app.url").Storage::url($category->banner_image) : asset('assets/images/innerbanner1.jpg') }}"
                alt="">

            <div class="inner-content">
                <h3>{{$category->name}}</h3>

                {!!$category->description!!}


            </div>
        </div>
    </div>
</section>
<!-- banner-inner-end -->
<!-- feature -->
<section class="feature">
    <div class="container">
        <div class="feature-wrap">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-wrap-box">
                        <a href="#">
                            <img src="{{  isset($section9->image1) ? config("app.url").Storage::url($section9->image1) :asset('assets/images/sticker1.png') }}"
                                alt="image" />
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-wrap-box">
                        <a href="#">
                            <img src="{{  isset($section9->image2) ? config("app.url").Storage::url($section9->image2) :asset('assets/images/sticker1.png') }}"
                                alt="image" />
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-wrap-box">
                        <a href="#">
                            <img src="{{  isset($section9->image3) ? config("app.url").Storage::url($section9->image3) :asset('assets/images/sticker1.png') }}"
                                alt="image" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- feature-end -->
<!-- collection -->
<section class="collection">
    <div class="container-fluid">

        <div class="product-wrap">
            @if($data_count !==0)
            @php
            $i=1;
            $j=1;
            @endphp
            @foreach($categoryProducts as $product)
            <div class="product-wrap-box">
                <a href="{{route('productDetail',$product->id)}}"><img
                        src="{{  isset($product->product_images->first->image->image) ? config("app.url").Storage::url($product->product_images->first->image->image) :asset('assets/images/pr1.jpg') }}"
                        alt="owl1" />

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
                    @php
                    $i++;
                    @endphp
                </div>
            </div>
            @endforeach
            @else
             <div class="empty-cart"><p>{{'No Products Found!'}}</p></div>
            @endif
        
        </div>
    </div>
</section>
<!-- collection-head -->



@endsection