@extends('frontend.master')
@section('title', "Payment Mode")
@section('content')
<section class="cart-section">
    <div class="container">
        <div class="cart-wrap">
            <div class="form__name">Choose payment options</div>
            <form action="{{route('orderPlace')}}" id="myForm" method="POST" enctype="multipart/form-data">

@csrf
            <div class="row">
                <div class="col-md-12 col-lg-8 col-xl-8">
                    <div class="cart-wrap-left">
                        <div class="form__container p-gateway">
                            <section class="form__personal">
                                <div class="sections">
                                   
                                        <div class="radio">
                                            <input id="radio-1" name="payment_method" type="radio" value="cod" checked>
                                            <label for="radio-1" class="radio-label">Cash On Delivery (COD)</label>
                                        </div>

                                        <div class="radio">
                                            <input id="radio-2" name="payment_method" type="radio" disabled>
                                            <label for="radio-2" class="radio-label">UPI payment</label>
                                        </div>

                                        <div class="radio">
                                            <input id="radio-3" name="payment_method" type="radio" disabled>
                                            <label for="radio-3" class="radio-label">Payment with Card</label>
                                        </div>

                                </div>

                            </section>

                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <div class="cart-wrap-right">
                        <div class="checkout-button">
                            <a href="#" data-target="#size-modal1" data-toggle="modal">Proceed to checkout</a>
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
                                     <tr class="special">
                                        <td>Discount</td>
                                        <td>₹ {{$discount}}.00</td>
                                    </tr>
                                    <tr>
                                        <th>Sub Total</th>
                                        <th>₹ {{$total-$discount}}</th>
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
                                        <td>Gift Wrap</td>
                                        <td>₹ {{isset($gift)&& $gift=='yes'? $gift_price:'0'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Payble Amount</td>
                                        <td>₹
                                            {{isset($gift)&& $gift=='yes'? ($total-$discount)+$tax+$gift_price:($total-$discount)+$tax}}
                                        </td>
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
                  <input type="hidden" name="total" value="{{$total}}" />
                        <input type="hidden" name="discount" value="{{$discount}}" />
                        <input type="hidden" name="gross"
                            value="{{isset($gift)&& $gift=='yes'? ($total-$discount)+$tax+$gift_price:($total-$discount)+$tax}}" />

                        <div class="checkout-button mb-5">
                            <a href="#" data-target="#size-modal1" data-toggle="modal">Proceed to checkout</a>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade size-chart" id="size-modal1" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="size-modal1">Alert!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                   

                                       
                                        <p class="order_Place">Do you want to proceed and place this order?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-primary">Dismiss</button>
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!--END MODAL-->
                </div>
            </div>
          
        </div>
</form>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
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

    checkbox.click(function() {
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
    document.addEventListener('DOMContentLoaded', function() {
        const confirmModal = $('#myForm');
        const confirmButton = confirmModal.find('.btn-primary:last-child'); // Confirm button inside the modal
        const dismissButton = confirmModal.find('.btn-primary:first-child'); // Dismiss button inside the modal
        const form = $('#yourFormId'); // Replace with your actual form ID

        // Show the modal when the form is about to be submitted
        form.on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            confirmModal.modal('show');

            confirmButton.on('click', function() {
                form.off('submit').submit(); // Submit the form after confirmation
            });

            dismissButton.on('click', function() {
                confirmModal.modal('hide'); // Hide the modal when dismissed
            });
        });
    });
</script>


@endsection