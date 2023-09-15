@extends('frontend.master')
@section('title', "Edit Shipping Address")
@section('content')
<section class="cart-section">
    <div class="container">
    <form action="{{route('saveAddress')}}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="cart-wrap">
            <div class="form__name">Shipping and Billing Form</div>

            <div class="row">
                <div class="col-md-12 col-lg-8 col-xl-8">
                    <div class="cart-wrap-left">
                        <div class="form__container">
                            <section class="form__personal">
                                <div class="sections">
                                    <div class="box">1</div><span>Personal Information</span>
                                </div>
                                <div class="shipping--form">
                                    
                                        <div class="row one">
                                            <div class="address">
                                                <label for="address-one">FIRST NAME</label>
                                                <input placeholder="FIRST NAME" id="address-one" type="text"  name="first_name"  value="{{old('first_name', isset($address->first_name) ? $address->first_name:'')}}"/>
                                            </div>
                                            <div class="address-two">
                                                <label for="address-two">LAST NAME</label>
                                                <input placeholder="LAST NAME" id="address-two" type="text" name="last_name" value="{{old('last_name', isset($address->last_name) ? $address->last_name:'')}}"/>
                                            </div>
                                        </div>
                                        <div class="row two">
                                            <div class="city">
                                                <label for="city">MOBILE NUMBER</label>
                                                <input placeholder="+ 91" id="city" type="text" name="mobile" value="{{old('mobile', isset($address->mobile) ? $address->mobile:'')}}"/>
                                            </div>
                                            <div class="state">
                                                <label for="state">EMAIL</label>
                                                <input placeholder="abc@gmail.com" id="state" type="email" name="email" value="{{old('email', isset($address->email) ? $address->email:'')}}"/>
                                            </div>
                                        </div>

                               
                                </div>
                            </section>
                            <section class="form__billing">
                                <div class="sections">
                                    <div class="box billing">2</div><span>Billing Address</span>
                                </div>
                                <div class="shipping--form">
                                  
                                        <div class="row one">
                                            <div class="address">
                                                <label for="address-one">Address Line 1</label>
                                                <input placeholder="e.g. 1 Infinite Loop" id="billing_address_line1"
                                                    type="text" name="billing_address_line1" value="{{old('billing_address_line1', isset($address->billing_address_line1) ? $address->billing_address_line1:'')}}"/>
                                            </div>
                                            <div class="address-two">
                                                <label for="address-two">Address Line 2</label>
                                                <input id="billing_address_line2" type="text" name="billing_address_line2" value="{{old('billing_address_line2', isset($address->billing_address_line2) ? $address->billing_address_line2:'')}}"/>
                                            </div>
                                        </div>
                                        <div class="row two">
                                            <div class="city">
                                                <label for="city">City</label>
                                                <input placeholder="e.g. Cupertino" id="billing_city" type="text" name="billing_city" value="{{old('billing_city', isset($address->billing_city) ? $address->billing_city:'')}}"/>
                                            </div>
                                            <div class="state">
                                                <label for="state">State / Province / Region</label>
                                                <input placeholder="e.g. California" id="billing_state" type="text" name="billing_state" value="{{old('billing_state', isset($address->billing_state) ? $address->billing_state:'')}}"/>
                                            </div>
                                        </div>
                                        <div class="row three">
                                            <div class="zip">
                                                <label for="zip">Zip / Postal Code</label>
                                                <input placeholder="e.g. 95014" id="billing_zip" type="text" name="billing_zip" value="{{old('billing_zip', isset($address->billing_zip) ? $address->billing_zip:'')}}"/>
                                            </div>
                                            <div class="country">
                                                <label for="country">Country</label>
                                                <input placeholder="e.g. U.S.A" id="billing_country" type="text" name="billing_country" value="{{old('billing_country', isset($address->billing_country) ? $address->billing_country:'')}}"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                            <section class="form__shipping">
                                <div class="sections">
                                    <div class="box">3</div><span>Shipping Address</span>
                                </div>
                                <div class="form__question">
                                    <input type="checkbox" id="sameAddressCheckbox"/>
                                    <p>Is your shipping address the same as your billing address ?</p>
                                </div>
                                <div class="shipping--form">
                                  
                                        <div class="row one">
                                            <div class="address">
                                                <label for="address-one">Address Line 1</label>
                                                <input placeholder="" id="shipping_address_line1" type="text" name="shipping_address_line1"  value="{{old('shipping_address_line1', isset($address->shipping_address_line1) ? $address->shipping_address_line1:'')}}"/>
                                            </div>
                                            <div class="address-two">
                                                <label for="address-two">Address Line 2</label>
                                                <input id="shipping_address_line2" type="text" name="shipping_address_line2" value="{{old('shipping_address_line2', isset($address->shipping_address_line2) ? $address->shipping_address_line2:'')}}"/>
                                            </div>
                                        </div>
                                        <div class="row two">
                                            <div class="city">
                                                <label for="city">City</label>
                                                <input placeholder="" id="shipping_city" type="text" name="shipping_city" value="{{old('shipping_city', isset($address->shipping_city) ? $address->shipping_city:'')}}"/>
                                            </div>
                                            <div class="state">
                                                <label for="state">State / Province / Region</label>
                                                <input placeholder="" id="shipping_state" type="text" name="shipping_state" value="{{old('shipping_state', isset($address->shipping_state) ? $address->shipping_state:'')}}"/>
                                            </div>
                                        </div>
                                        <div class="row three">
                                            <div class="zip">
                                                <label for="zip">Zip / Postal Code</label>
                                                <input placeholder="" id="shipping_zip" type="text" name="shipping_zip"  value="{{old('shipping_zip', isset($address->shipping_zip) ? $address->shipping_zip:'')}}"/>
                                            </div>
                                            <div class="country">
                                                <label for="country">Country</label>
                                                <input placeholder="" id="shipping_country" type="text" name="shipping_country" value="{{old('shipping_country', isset($address->shipping_country) ? $address->shipping_country:'')}}"/>
                                            </div>
                                        </div>
                                   
                                </div>
                            </section>

                            <div class="form__confirmation">
                                <button>Confirm Information</button>
                            </div>
                        </div>
                    </div>
                </div>
</form>
                <div class="col-md-12 col-lg-4 col-xl-4">
                <form action="{{route('paymentMode')}}" method="POST" enctype="multipart/form-data">
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
                                        <th>₹ {{$total}}.00</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                     <tr>
                                        <td>Discount</td>
                                        <td>₹ {{$discount}}.00</td>
                                    </tr>
                                <tr class="special">
                                        <th>Sub Total</th>
                                        <th>₹ {{$total-$discount}}.00</th>
                                    </tr>
                                    <tr>
                                        <td>Estimated Tax</td>
                                        <td>₹ {{$tax}}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Charge</td>
                                        <td>Free</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="gift" name="gift" value="yes" {{ ( isset($giftWrap) && $giftWrap == 'yes' )  ? 'checked' : '' }} ><label for="gift"> Gift
                                                Wrap</label></td>
                                        <td>₹ 35</td>
                                    </tr>
                                    <tr>
                                        <td>Payble Amount</td>
                                        <td>₹ <span id="payableAmount"> {{$total-$discount+$tax ?? '00'}}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="offer-sec">
                            <p class="offer-heading">Offer</p>
                            <div class="d-flex align-items-baseline">
                                <p><img src="images/discount.png" alt="">Apply Coupon</p>
                                <p class="text-right"><a href="#">View Offers</a></p>
                            </div>
                            <div class="apply-form">
                                <input type="text" name="" placeholder="Have A Coupon? Type here">
                                <a href="#">Apply</a>
                            </div>
                        </div> -->
                        <input type="hidden" name="total"  value="{{$total}}" />
                        <input type="hidden" name="discount"  value="{{$discount}}" />
                        <div class="checkout-button mb-5">
                            <button type="submit" class="btn">Proceed to checkout</button>
                        </div>
                    </div>
                </div>
            </div>
</form>
        </div>

    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script>
    $(document).ready(function () {
        $('#gift').click(function () {
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
</script>  -->
<script>
    $(document).ready(function () {
        var checkbox = $('#gift');
        var payableAmount = parseFloat($('#payableAmount').text().replace('₹ ', ''));

        // Calculate and update the payable amount based on checkbox status
        function updatePayableAmount() {
            if (checkbox.prop('checked')) {
                payableAmount += 35;
            } else {
                payableAmount -= 35;
            }
            $('#payableAmount').text(payableAmount.toFixed(2));
        }

        // Initialize the payable amount based on initial checkbox status
        updatePayableAmount();

        checkbox.click(function () {
            if ($(this).prop('checked')) {
                if (confirm('Do you want to add Rs 35 as Gift wrap amount to the payable amount?')) {
                    updatePayableAmount();
                } else {
                    $(this).prop('checked', false);
                }
            } else {
                updatePayableAmount();
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Check if the checkbox is clicked
        $('#sameAddressCheckbox').click(function () {
            // Check if the checkbox is checked
            if ($(this).prop('checked')) {
                // Copy billing address data to shipping address fields
                $('#shipping_address_line1').val($('#billing_address_line1').val());
                $('#shipping_address_line2').val($('#billing_address_line2').val());
                $('#shipping_city').val($('#billing_city').val());
                $('#shipping_state').val($('#billing_state').val());
                $('#shipping_zip').val($('#billing_zip').val());
                $('#shipping_country').val($('#billing_country').val());
            } else {
                // Clear shipping address fields
                $('#shipping_address_line1').val('');
                $('#shipping_address_line2').val('');
                $('#shipping_city').val('');
                $('#shipping_state').val('');
                $('#shipping_zip').val('');
                $('#shipping_country').val('');
            }
        });
    });
</script>
@endsection