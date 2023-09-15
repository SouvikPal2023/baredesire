@include('frontend.partials.headerCss')
@include('frontend.partials.header')
 <!-- inner-banner -->
 <section class="section breadcrumb-wrapper">
    <div class="shell">
        <h2>My Profile</h2>
    </div>
</section>
<!-- inner-banner end -->

  <section class="service-wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="privacy-sec">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active"  id="nav-mobile-tab" data-toggle="tab" href="#nav-mobile" role="tab"
                  aria-controls="nav-mobile" aria-selected="true">Order History</a>
                <a class="nav-item nav-link" id="nav-front-end-tab" data-toggle="tab" href="#nav-front-end" role="tab"
                  aria-controls="nav-front-end" aria-selected="false">Wishlist</a>
                <a class="nav-item nav-link" id="nav-database-tab" data-toggle="tab" href="#nav-database" role="tab"
                  aria-controls="nav-database" aria-selected="false">Coupons</a>
                <a class="nav-item nav-link" id="nav-database-tab2" data-toggle="tab" href="#nav-database2" role="tab"
                  aria-controls="nav-database" aria-selected="false">Contact Us</a>
                <a class="nav-item nav-link" id="nav-database-tab3" data-toggle="tab" href="#nav-database3" role="tab"
                  aria-controls="nav-database" aria-selected="false">Logout</a>
              </div>
            </nav>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-mobile" role="tabpanel" aria-labelledby="nav-mobile-tab">
              <div class="service-box">
                <form>                    
                  <div class="col-md-6">
                    <div class="form-group d-flex order-search">
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Search Order">
    <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
  </div>
    </div>
  
                </form>

                <section class="order-list">
       <div class="container">
         <div class="order-list-title text-center">
         <h2>Order List</h2>
       </div>
       <div class="order-list-details table-responsive">
         <table class="table table-striped">
 <thead>
    <tr>
    <th>No.</th>
    <th>Product</th>
    <th>Product Name</th>
    <th>Order Id</th>
    <th>Order Placed</th>
    <th>Delivery Within</th>
    <th>View Details</th>
  </tr>
 </thead>
  <tbody>
    <tr>
    <td>1</td>
    <td><a href="#"><img src="{{asset('assets/images/pr6.jpg')}}" alt=""></a></td>
    <td>Bra</td>
    <td>564748BRA</td>
    <td>23-05-2023</td>
    <td>29-05-2023</td>
    <td><a href="#">View Details</a></td>
  </tr>
  <tr>
    <td>2</td>
    <td><a href="#"><img src="{{asset('assets/images/pr5.jpg')}}" alt=""></a></td>
    <td>Bra</td>
    <td>564748BRA</td>
    <td>23-05-2023</td>
    <td>29-05-2023</td>
    <td><a href="#">View Details</a></td>
  </tr>
  <tr>
    <td>3</td>
    <td><a href="#"><img src="{{asset('assets/images/pr8.jpg')}}" alt=""></a></td>
    <td>Bra</td>
    <td>564748BRA</td>
    <td>23-05-2023</td>
    <td>29-05-2023</td>
    <td><a href="#">View Details</a></td>
  </tr>
  <tr>
    <td>4</td>
    <td><a href="#"><img src="{{asset('assets/images/pr7.jpg')}}" alt=""></a></td>
    <td>Bra</td>
    <td>564748BRA</td>
    <td>23-05-2023</td>
    <td>29-05-2023</td>
    <td><a href="#">View Details</a></td>
  </tr>
  </tbody>
</table>

       </div>
       </div>
     </section>
              
              </div>
            </div>
            <div class="tab-pane fade" id="nav-front-end" role="tabpanel" aria-labelledby="nav-front-end-tab">
              <div class="service-box">
                  <div class="wishlist">
                    <div class="wishlist-title">
                      <h2>Wish List</h2>
                    </div>
                    @foreach($wishlists as $list)
                   @php 
                   $product=App\Models\Product::find($list->product_id);
                   @endphp
                    <div class="wishlist-wrap">
                      <div class="wishlist-wrap-box">
                        
                        @php 
                        $i=1;
                        @endphp
                        @foreach($product->product_images as $image)
                        <div class="wishlist-image{{$i++}}"><img  src="{{  isset($image->image) ? config("app.url").Storage::url($image->image) :asset('assets/images/fun2.jpg') }}" alt=""></div>
                        @endforeach
                        <!-- <div class="wishlist-image2"><img src="{{asset('assets/images/w2.jpg')}}" alt=""></div> -->
                        <div class="product-details">
                          <p>{{ Str::limit($product->name, 50) }}</p>
                          <p class="price-tag">Rs {{$product->original_price}}</p>
                          <p class="size-field d-flex">
                            @foreach($product->product_sizes as $size)
                            <a href="#">{{$size->size}}</a>
                            <!-- <a href="#">M</a>
                            <a href="#">L</a>
                            <a href="#">XL</a>
                            <a href="#">2XL</a>
                            <a href="#">3XL</a> -->
                            @endforeach
                          </p>
                        </div>
                        <div class="product-button">
                          <a href="#">Add to Cart</a>
                          <a href="#">Remove</a>
                        </div>
                      </div>

                      @endforeach
                   
                      <!-- <div class="wishlist-wrap-box">
                        <div class="wishlist-image1"><img src="{{asset('assets/images/w1.jpg')}}" alt=""></div>
                        <div class="wishlist-image2"><img src="{{asset('assets/images/w2.jpg')}}" alt=""></div>
                        <div class="product-details">
                          <p>High Leg Bikini Panty in Magenta - Lace</p>
                          <p class="price-tag">Rs 899</p>
                          <p class="size-field d-flex">
                            <a href="#">S</a>
                            <a href="#">M</a>
                            <a href="#">L</a>
                            <a href="#">XL</a>
                            <a href="#">2XL</a>
                            <a href="#">3XL</a>
                          </p>
                        </div>
                        <div class="product-button">
                          <a href="#">Add to Cart</a>
                          <a href="#">Remove</a>
                        </div>
                      </div>
                      <div class="wishlist-wrap-box">
                        <div class="wishlist-image1"><img src="{{asset('assets/images/w1.jpg')}}" alt=""></div>
                        <div class="wishlist-image2"><img src="{{asset('assets/images/w2.jpg')}}" alt=""></div>
                        <div class="product-details">
                          <p>High Leg Bikini Panty in Magenta - Lace</p>
                          <p class="price-tag">Rs 899</p>
                          <p class="size-field d-flex">
                            <a href="#">S</a>
                            <a href="#">M</a>
                            <a href="#">L</a>
                            <a href="#">XL</a>
                            <a href="#">2XL</a>
                            <a href="#">3XL</a>
                          </p>
                        </div>
                        <div class="product-button">
                          <a href="#">Add to Cart</a>
                          <a href="#">Remove</a>
                        </div>
                      </div>
                      <div class="wishlist-wrap-box">
                        <div class="wishlist-image1"><img src="{{asset('assets/images/w1.jpg')}}" alt=""></div>
                        <div class="wishlist-image2"><img src="{{asset('assets/images/w2.jpg')}}" alt=""></div>
                        <div class="product-details">
                          <p>High Leg Bikini Panty in Magenta - Lace</p>
                          <p class="price-tag">Rs 899</p>
                          <p class="size-field d-flex">
                            <a href="#">S</a>
                            <a href="#">M</a>
                            <a href="#">L</a>
                            <a href="#">XL</a>
                            <a href="#">2XL</a>
                            <a href="#">3XL</a>
                          </p>
                        </div>
                        <div class="product-button">
                          <a href="#">Add to Cart</a>
                          <a href="#">Remove</a>
                        </div>
                      </div>
                      <div class="wishlist-wrap-box">
                        <div class="wishlist-image1"><img src="{{asset('assets/images/w1.jpg')}}" alt=""></div>
                        <div class="wishlist-image2"><img src="{{asset('assets/images/w2.jpg')}}" alt=""></div>
                        <div class="product-details">
                          <p>High Leg Bikini Panty in Magenta - Lace</p>
                          <p class="price-tag">Rs 899</p>
                          <p class="size-field d-flex">
                            <a href="#">S</a>
                            <a href="#">M</a>
                            <a href="#">L</a>
                            <a href="#">XL</a>
                            <a href="#">2XL</a>
                            <a href="#">3XL</a>
                          </p>
                        </div>
                        <div class="product-button">
                          <a href="#">Add to Cart</a>
                          <a href="#">Remove</a>
                        </div>
                      </div>
                      <div class="wishlist-wrap-box">
                        <div class="wishlist-image1"><img src="{{asset('assets/images/w1.')}}" alt=""></div>
                        <div class="wishlist-image2"><img src="{{asset('assets/images/w2.jpg')}}" alt=""></div>
                        <div class="product-details">
                          <p>High Leg Bikini Panty in Magenta - Lace</p>
                          <p class="price-tag">Rs 899</p>
                          <p class="size-field d-flex">
                            <a href="#">S</a>
                            <a href="#">M</a>
                            <a href="#">L</a>
                            <a href="#">XL</a>
                            <a href="#">2XL</a>
                            <a href="#">3XL</a>
                          </p>
                        </div>
                        <div class="product-button">
                          <a href="#">Add to Cart</a>
                          <a href="#">Remove</a>
                        </div>
                      </div> -->
                    </div>
                  </div>
              </div>
            </div>
            <div class="tab-pane fade" id="nav-database" role="tabpanel" aria-labelledby="nav-database-tab">
              <div class="service-box">
                <div class="coupon-wrap">
                  <div class="coupon-wrap-box">
                    <div class="left-content">
                      <p>25% OFF</p>
                    </div>
                    <div class="right-content">
                      <p><span>Code:ONLINEOFF</span></p>
                      <p>Minimum purchase value: ₹1499</p>
                      <p>Expiry: Sept. 8, 2023</p>
                    </div>
                    <div class="click-to-copy">
                      <a href="#"><img src="{{asset('assets/images/copy.png')}}" alt=""></a>
                    </div>
                  </div>
                  <div class="coupon-wrap-box">
                    <div class="left-content">
                      <p>25% OFF</p>
                    </div>
                    <div class="right-content">
                      <p><span>Code:ONLINEOFF</span></p>
                      <p>Minimum purchase value: ₹1499</p>
                      <p>Expiry: Sept. 8, 2023</p>
                    </div>
                    <div class="click-to-copy">
                      <a href="#"><img src="{{asset('assets/images/copy.png')}}" alt=""></a>
                    </div>
                  </div>
                  <div class="coupon-wrap-box">
                    <div class="left-content">
                      <p>25% OFF</p>
                    </div>
                    <div class="right-content">
                      <p><span>Code:ONLINEOFF</span></p>
                      <p>Minimum purchase value: ₹1499</p>
                      <p>Expiry: Sept. 8, 2023</p>
                    </div>
                    <div class="click-to-copy">
                      <a href="#"><img src="{{asset('assets/images/copy.png')}}" alt=""></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="nav-database2" role="tabpanel" aria-labelledby="nav-database-tab2">
              <div class="service-box">
                <div class="inner_page_wrap about_inner_pg_wrap inner">

    <div class="container">
      <div class="row">
        <div class="col-md-12 m-0 p-0">
          <div class="contact-item">
            <div class="address-content">
              <h5>REGISTERED OFFICE ADDRESS: </h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
            </div>
            <span class="icon"><i class="fa fa-rocket"></i></span>
          </div>
          <div class="contact-item">
            <div class="address-content">
              <h5>1300 Jacobson:</h5>
              <a href="tel:123456789">123456789</a>
            </div>
            <span class="icon"><i class="fa fa-volume-control-phone"></i></span>
          </div>
          <div class="contact-item">
            <div class="address-content">
              <h5>Mail Us:</h5>
              <p><a href="mailto:baredsire@gmail.com">
              baredsire@gmail.com</a>
            </p>
          </div>
          <span class="icon"><i class="fa fa-envelope-open-o"></i></span>
        </div>
        <div class="map_section">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117925.21689764694!2d88.26495115138643!3d22.535564936166605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f882db4908f667%3A0x43e330e68f6c2cbc!2sKolkata%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1684984421955!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
        <div class="col-md-12 m-0 p-0">
          <div class="contact-form">
            <div class="form-header">
              <h2>Send Us an Enquiry</h2>
            </div>
            <div class="form-sec" id="my_form">
              <form class="rd-mailform1">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Name">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Phone No.">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Email">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Subject">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Request Services">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" placeholder="Message*"></textarea>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button class="contact_submit_btn" type="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        
    </div>
  </div>
</div>

              </div>
            </div>
            <div class="tab-pane fade" id="nav-database3" role="tabpanel" aria-labelledby="nav-database-tab3">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@include('frontend.partials.footer')
 <!-- Modal1 -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content login">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login | Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Register</a>
  </li>
</ul><!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="tabs-1" role="tabpanel">
    <div class="form-sec" id="my_form">
              <form class="rd-mailform1">
                <div class="row">
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Email or Phone Number">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="*Password">
                    </div>
                  </div>
                  
                </div>
                <div class="text-left">
                  <button class="contact_submit_btn" type="submit">Login</button>
                </div>
              </form>
            </div>
  </div>
  <div class="tab-pane" id="tabs-2" role="tabpanel">
    <div class="form-sec" id="my_form">
              <form class="rd-mailform1">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Name">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Phone No.">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Email">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="*Password">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="*Confirm Password">
                    </div>
                  </div>
                  
                </div>
                <div class="text-left">
                  <button class="contact_submit_btn" type="submit">Register</button>
                </div>
              </form>
            </div>
  </div>

</div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // JavaScript to activate the correct tab based on the URL hash
    document.addEventListener('DOMContentLoaded', (event) => {
        const hash = window.location.hash;
        if (hash) {
            const tab = document.querySelector(hash);
            if (tab) {
                tab.classList.add('show', 'active');
                const tabLink = document.querySelector(`[href="${hash}"]`);
                if (tabLink) {
                tabLink.click();
            }
            }
        }
    });
</script>

@include('frontend.partials.footerScripts')
