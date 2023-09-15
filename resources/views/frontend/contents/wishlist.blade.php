@include('frontend.partials.headerCss')
@include('frontend.partials.header')
<!-- inner-banner -->
<section class="section breadcrumb-wrapper">
    <div class="shell">
        <h2>Wish List</h2>
    </div>
</section>
<!-- inner-banner end -->

<section class="service-wrap">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="service-box">
                    <form>
                        <div class="col-md-6">
                            <!--<div class="form-group d-flex order-search">-->
                            <!--    <input type="text" class="form-control" id="exampleFormControlInput1"-->
                            <!--        placeholder="Search Order">-->
                            <!--    <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>-->
                            <!--</div>-->
                        </div>

                    </form>
                    @if($wishlists->isEmpty())


<div class="empty-cart"> <p>{{'Wishlist is empty!!'}}</p></div>

@else


                    <div class="service-box">
                        <div class="wishlist">
                            <div class="wishlist-wrap">
                               
                                @php
                                $i=1;
                                 $j=1;
                                @endphp
                                @foreach($wishlists as $list)
                                @php

                                $h=1;
                                @endphp
                                @php
                                $product=App\Models\Product::with(['product_images' => function ($query) {
                                $query->take(2);
                                }])->find($list->product_id);


                                @endphp
                                <div class="wishlist-wrap-box">
                                    @foreach($product->product_images as $image)

                                    <div class="wishlist-image{{$h++}}"><img
                                            src="{{  isset($image->image) ? config("app.url").Storage::url($image->image) :asset('assets/images/fun2.jpg') }}"
                                            alt=""></div>
                                    @endforeach
                                    <div class="product-details">
                                        <p>{{ Str::limit($product->name, 50) }}</p>
                                        <p class="price-tag">Rs {{$product->original_price}}</p>
                                    </div>
                                    <div class="product-button">
                                        <a href="#" data-target="#size-modal{{$i}}" data-toggle="modal">Add to
                                            Cart</a>
                                        <form action="{{route('removeItem',$list->id)}} " method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <p><button type="submit" class="Delete">Remove</button></p></form>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade size-chart" id="size-modal{{$i}}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="size-modal{{$i}}">Size Chart</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('wishToCart')}}" method="POST"
                                                        enctype="multipart/form-data">

                                                        @csrf
                                                        <input type="hidden" name="id"  value="{{$product->id}}" />
                                                        <input type="hidden" name="cart"  value="{{$list->id}}" />
                                                        <input type="hidden" name="quantity" value="1" />
                                                        <ul class="free-selected size_mar listNone Sizeslist normal radio-button"
                                                            id="selectSize2">
                                                           
                                                            @foreach($product->product_sizes as $size)
                                                            <input type="radio" id="radio{{$j}}" name="size"
                                                            value="{{$size->size}}">
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
                                </div>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                                @endif

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
$('.Delete').on('click', function(e) {

    e.preventDefault();
    //alert(0);
    var single = $(this);

    iziToast.question({
        overlay: true,
        toastOnce: true,
        id: 'question',
        title: 'Hey',
        message: 'Are you sure you want to delete?',
        position: 'center',
        buttons: [
            ['<button><b>YES</b></button>', function(instance, toast) {

                instance.hide({
                    transitionOut: 'fadeOut'
                }, toast);

                single.closest("form").submit();


            }, true],
            ['<button>NO</button>', function(instance, toast) {

                instance.hide({
                    transitionOut: 'fadeOut'
                }, toast);

            }]
        ]
    });

});
</script>
@include('frontend.partials.footer')

@include('frontend.partials.footerScripts')