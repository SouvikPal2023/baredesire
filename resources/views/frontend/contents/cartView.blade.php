@extends('frontend.master')
@section('title', "Cart View")
@section('content')
<!-- banner-inner -->
<section class="inner-banner">
    <div class="container-fluid">
        <div class="inner-header">
            <div class="inner-header-menu">
                <ul>
                    <li><a href="{{route('dashboard')}}">Home</a></li>
                    <li><a href="{{route('cartView')}}">Cart</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- banner-inner-end -->
@if($carts->isEmpty())


<div class="empty-cart"><p>{{'Cart is empty!!'}}</p></div>

@else
<section class="cart-section">
    <div class="container">
        <div class="cart-wrap">
            <form action="{{ route('removeCart') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="Delete Delete-1">Clear Cart<i class="fa fa-trash-o" aria-hidden="true"></i></button>
            </form>
            <div class="row">
                <div class="col-md-12 col-lg-8 col-xl-8">
                    <div class="cart-wrap-left">
                        @foreach($carts as $cart)


                        @php
                        $product=App\Models\Product::find($cart->product_id);

                        @endphp
                        <div class="cart-wrap-box">
                            <div class="cart-wrap-box-img">

                                <a href="{{route('productDetail',$product->id)}}"><img
                                        src="{{  isset($product->product_images->first->image->image) ? config("app.url").Storage::url($product->product_images->first->image->image) :asset('assets/images/fun2.jpg') }}"
                                        alt="owl1" /></a>
                            </div>
                            <div class="cart-wrap-box-content">
                                <p><span class="special"> {{ Str::limit($product->name, 50) }}</span></p>
                                <p><span class="special">Size:</span> {{ $cart->size ?? '--'}}</p>
                                <ul class="cart-wrap-box-content-buttons myClass">
                                    <li>
                                        <p><span class="special">Qty:</span>
                                    
                                            <button class="decrease{{$product->id}}" id="d-{{$product->id}}"
                                                onclick="decrement({{$product->id}},{{$cart->id}})" data-id="{{$cart->id}}"
                                                data-product="{{ $product->id }}">-</button>
                                      
                                        <input class="quantity" id="demoInput{{$cart->id}}" type="number" value="{{$cart->quantity}}"
                                            min=1 max=10>
                                       
                                            <button class="increase{{$product->id}}" id="i-{{$product->id}}"
                                                onclick="increment({{$product->id}},{{$cart->id}})" data-product="{{ $product->id }}"
                                                data-id="{{$cart->id}}">+</button>
                                      

                                        </p>
                                    </li>
                                    <li>
                                        <form action="{{route('saveLater',$cart->id)}} " method="POST">
                                            @csrf

                                          
                                            <p><button type="submit" class="Confirm"><i class="fa fa-heart-o"
                                                        aria-hidden="true"></i>Save For
                                                    Later</button></p>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{route('removeItem',$cart->id)}} " method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <p><button type="submit" class="Delete"><i class="fa fa-trash-o"
                                                        aria-hidden="true"></i>Remove</button></p></form
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <p class="price" id="price{{$cart->id}}">₹ {{$product->original_price * $cart->quantity}}.00</p>
                            </div>
                        </div>

                        @endforeach
                        <!-- <div class="cart-wrap-box">
                <div class="cart-wrap-box-img">
                  <a href="#"><img src="{{asset('assets/images/fun2.jpg')}}" alt=""></a>
                </div>
                <div class="cart-wrap-box-content">
                  <p>Low Impact Cotton Non-Padded Non-Wired Sports Bra in...</p>
                  <ul class="cart-wrap-box-content-buttons">
                    <li><p><span>Qty:</span><button onclick="decrement()">-</button> <input id=demoInput type=number min=1 max=99>
                      <button onclick="increment()">+</button>
                    </p></li>
                    <li><p><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>Save For Later</a></p></li>
                    <li><p><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i>Remove</a></p></li>
                  </ul>
                </div>
                <div class="price">
                  <p>₹ 245.00</p>
                </div>
              </div>
              <div class="cart-wrap-box">
                <div class="cart-wrap-box-img">
                  <a href="#"><img src="{{asset('assets/images/fun2.jpg')}}" alt=""></a>
                </div>
                <div class="cart-wrap-box-content">
                  <p>Low Impact Cotton Non-Padded Non-Wired Sports Bra in...</p>
                  <ul class="cart-wrap-box-content-buttons">
                    <li><p><span>Qty:</span><button onclick="decrement()">-</button> <input id=demoInput type=number min=1 max=99>
                      <button onclick="increment()">+</button>
                    </p></li>
                    <li><p><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>Save For Later</a></p></li>
                    <li><p><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i>Remove</a></p></li>
                  </ul>
                </div>
                <div class="price">
                  <p>₹ 245.00</p>
                </div>
              </div> -->
                    </div>
                </div>
                
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <form action="{{route('postCart')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="cart-wrap-right">
                        <div class="checkout-button">
                            <button type="submit" class="btn">Proceed to checkout</button>
                        </div>

                        <div class="payment-details">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Total</th>
                                        <th id="total">₹ {{$price ?? 00}}.00</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                    <tr>
                                        <td>Discount</td>
                                        <td id="discount">₹ {{$discount ?? '00'}}.00</td>
                                    </tr>
                                    <tr class="special">
                                        <th>Sub Total</th>
                                        <th>₹ {{$price-$discount ?? '00'}}.00</th>
                                    </tr>
                                    <tr>
                                        <td>Estimated Tax</td>
                                        <td>₹ {{$tax ?? '00'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Charge</td>
                                        <td>Free</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"  id="giftWrap" name="giftWrap" value="yes"><label for="giftWrap"> Gift
                                                Wrap</label></td>
                                        <td>₹ 35</td>
                                    </tr>
                                    <tr>
                                        <td>Payble Amount</td>
                                        <td>₹<span id="payableAmount"> {{$price-$discount+$tax ?? '00'}}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" name="total"  value="{{$price}}" />
                        <input type="hidden" name="discount"  value="{{$discount}}" />
                        <!-- <div class="offer-sec">
                            <p class="offer-heading">Offer</p>
                            <div class="d-flex align-items-baseline">
                                <p><img src="{{asset('assets/images/discount.png')}}" alt="">Apply Coupon</p>
                                <p class="text-right"><a href="#">View Offers</a></p>
                            </div>
                            <div class="apply-form">
                                <input type="text" name="" placeholder="Have A Coupon? Type here">
                                <a href="#">Apply</a>
                            </div>
                        </div> -->
                        <div class="checkout-button mb-5">
                            <button type="submit" class="btn">Proceed to checkout</button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
</section>
<!-- collection-head -->

@endif



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

<script>
$('.Confirm').on('click', function(e) {

    e.preventDefault();
    //alert(0);
    var single = $(this);

    iziToast.question({
        overlay: true,
        toastOnce: true,
        id: 'question',
        title: 'Hey',
        message: 'Do you want to add this product to wishlist?',
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script>
    $(document).ready(function () {
        $('#giftWrap').change(function () {
            var giftWrapAmount = 35;
            var currentPayableAmount = parseFloat($('#payableAmount').text().replace('₹ ', ''));

            if ($(this).prop('checked')) {
                currentPayableAmount += giftWrapAmount;
            } else {
                currentPayableAmount -= giftWrapAmount;
            }

            $('#payableAmount').text(currentPayableAmount.toFixed(2));
        });
    });
</script> -->

<script>
    $(document).ready(function () {
        $('#giftWrap').click(function () {
            var payableAmount = parseFloat($('#payableAmount').text().replace('₹ ', ''));

            if ($(this).prop('checked')) {
                var newPayableAmount = payableAmount + 35;
                $('#payableAmount').text(newPayableAmount.toFixed(2));
                
                if (confirm('Do you want to add Rs 35 as Gift wrap amount to the payable amount?')) {
                    // Handle user confirmation here, if needed
                } else {
                    $(this).prop('checked', false);
                    $('#payableAmount').text(payableAmount.toFixed(2));
                }
            } else {
                var newPayableAmount = payableAmount - 35;
                $('#payableAmount').text( newPayableAmount.toFixed(2));
            }
        });
    });
</script> 

<script>
    function updateQuantity(cartId, newQuantity) {
        $.ajax({
            url: "{{ route('update.quantity') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                cart_id: cartId,
                quantity: newQuantity
            },
            success: function (data) {
                
                        console.log(data)
                        if (data.status == 200) {
                            window.location.reload();
                           // const quantitySpan = document.querySelector('#price'+data.cart);
                //const priceSpan = button.closest('.cart-wrap-box-content').siblings().find('.price');
               // quantitySpan.textContent = '$'+parseInt(data.price*data.quantity) +'.00';
                           
                        iziToast.success({
                            title: 'Success',
                            message: data.message,
                            position:'topCenter'
                        })
                    }else{
                        iziToast.error({
                            title: 'Error',
                            message: data.message,
                            position:'topCenter'
                        });
                    }
                    
            },
            error: function() {
                // Handle error case
            }
        });
    }
    function increment(productId, cartId) {
        var input = $('#demoInput' + cartId);
        var newQuantity = parseInt(input.val()) + 1;
        if (newQuantity <= 10) {
            // Update input field and quantity in the database
            input.val(newQuantity);
            updateQuantity(cartId, newQuantity);
        }
    }

    function decrement(productId, cartId) {
        var input = $('#demoInput' + cartId);
        var newQuantity = parseInt(input.val()) - 1;
        if (newQuantity >= 1) {
            // Update input field and quantity in the database
            input.val(newQuantity);
            updateQuantity(cartId, newQuantity);
        }
    }
</script>
@endsection