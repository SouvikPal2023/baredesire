<footer>
    <div class="footer-top">
      <div class="container">
        <div class="footer-top-head">
          <h3>Popular Searches</h3>
          <div class="footer-product-link">
            @foreach($footer_categories as $cat)
            <a href="{{route('category-product',$cat->id)}}">{{$cat->name}}</a> 
            @endforeach
            <!-- <a href="#">Bras</a> 
            <a href="#">Panties</a> 
            <a href="#">Nightwear</a> 
            <a href="#">Activewear</a> 
            <a href="#">Shapewear</a> 
            <a href="#">Lingerie</a> 
            <a href="#">Sports Bra</a> 
            <a href="#">Bra Panty</a> 
            <a href="#">Bra For Girls</a> 
            <a href="#">Sexy Bra</a> 
            <a href="#">Bridal Bra</a> 
            <a href="#">Padded Bra</a>
            <a href="#">Push Up Bra</a> 
            <a href="#">Strapless Bra</a> 
            <a href="#">Bralette</a> 
            <a href="#">Backless Bra</a> 
            <a href="#">T-Shirt Bra</a> 
            <a href="#">Bra Size Calculator</a> 
            <a href="#">Girls Panties</a> 
            <a href="#">Hipster Panties</a> 
            <a href="#">Thongs</a>
            <a href="#">Bikini Panties</a>
            <a href="#">Night Dress</a>
            <a href="#">Night Suit for Women</a>
            <a href="#">Loungewear</a>
            <a href="#">Pajamas</a>
            <a href="#">Camisole</a>
            <a href="#">Night gown Cotton</a>
            <a href="#">Night Dress</a>
            <a href="#">Babydoll</a>
            <a href="#">Sexy Night Dress</a>
            <a href="#">Bridal Nightwear</a>
            <a href="#">Girls Nightwear</a>
            <a href="#">Gym Wear</a>
            <a href="#">Yoga Pants</a>
            <a href="#">Sports T Shirts</a>
            <a href="#">Tights</a>
            <a href="#">Track Pants for Women</a>
            <a href="#">Sexy Lingerie</a>
            <a href="#">Lingerie Sets</a>
            <a href="#">Honeymoon Lingerie</a>
            <a href="#">Swimwear</a>
            <a href="#">Bikini</a>
            <a href="#">Sanitary Napkin</a>
            <a href="#">Types of Bras</a>
            <a href="#">Bra Size Chart</a>
            <a href="#">Panty Size Chart</a>
            <a href="#">Period Calculator</a>
            <a href="#">Underwears</a> -->
          </div>

          <div class="quick-links">
            <div class="row">
              @foreach($mainCategories as $cat)
              <div class="col-md-2 col-6">
                <div class="quicklink-box">
                 
                  <h4>{{$cat->name}}</h4>
                  <ul>
                    
                    @foreach($cat->children as $child)
                    @foreach($child->children as $subchild)
                    <li><a href="{{route('category-product',$subchild->id)}}">{{$subchild->name}}</a></li>
                    @endforeach
                    @endforeach
                    <!-- <li><a href="#">Bralette</a></li>
                    <li><a href="#">Bridal Bra</a></li>
                    <li><a href="#">Cotton Bra</a></li>
                    <li><a href="#">Full Coverage Bra</a></li>
                    <li><a href="#">Padded Bra</a></li>
                    <li><a href="#">Push Up Bra</a></li>
                    <li><a href="#">Sexy Bra</a></li>
                    <li><a href="#">Strapless Bra</a></li>
                    <li><a href="#">T-shirt Bra</a></li>
                    <li><a href="#">Underwire</a></li> -->
                    <!-- <li> -->

                    </ul>
                    </div>
                  </div>
@endforeach
                  <!-- <div class="col-md-2 col-6">
                    <div class="quicklink-box">
                      <h4>Panties</h4>
                      <ul>
                        <li><a href="#">Bikini Panties</a></li>
                        <li><a href="#">Boy Shorts</a></li>
                        <li><a href="#">Bra Panty Set</a></li>
                        <li><a href="#">Cotton Panties</a></li>
                        <li><a href="#">Hipster</a></li>
                        <li><a href="#">Sexy Panties</a></li>
                        <li><a href="#">Thong</a></li>
                      </ul>
                    </div>
                  </div>

                  <div class="col-md-2 col-6">
                    <div class="quicklink-box">
                      <h4>Nightwear</h4>
                      <ul>
                        <li><a href="#">Babydoll</a></li>
                        <li><a href="#">Bridal Nightwear</a></li>
                        <li><a href="#">Camisole</a></li>
                        <li><a href="#">Cotton Nightwear</a></li>
                        <li><a href="#">Night Suit</a></li>
                        <li><a href="#">Nighty/Night Dress</a></li>
                        <li><a href="#">Pajamas</a></li>
                        <li><a href="#">Sexy Nightwear</a></li>
                        <li><a href="#">Tank Top</a></li>
                      </ul>
                    </div>
                  </div>

                  <div class="col-md-2 col-6">
                    <div class="quicklink-box">
                      <h4>ACTIVEWEAR</h4>
                      <ul>
                        <li><a href="#">Active Shorts</a></li>
                        <li><a href="#">Sports Bra</a></li>
                        <li><a href="#">Sports T shirts</a></li>
                        <li><a href="#">Tights</a></li>
                        <li><a href="#">Gym Wear</a></li>
                        <li><a href="#">Yoga Dress</a></li>
                      </ul>
                    </div>
                  </div> -->
 <div class="col-md-4 col-12">
 <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fprofile.php%3Fid%3D100092465379806&tabs=timeline&width=300&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=829634195558792" width="300" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
</div>
                  <!--<div class="col-md-4 col-12">-->
                  <!--  <div class="quicklink-box">-->
                  <!--    <h4>QUICK LINKS</h4>-->
                  <!--    <div class="quicklink-box-wrap">-->
                  <!--      <ul>-->
                  <!--        <li><a href="#">Magazine</a></li>-->
                  <!--        <li><a href="#">CloviaCurveTMFit Test</a></li>-->
                  <!--        <li><a href="#">Bra Size Calculator</a></li>-->
                  <!--        <li><a href="#">Bra For Your Dress</a></li>-->
                  <!--        <li><a href="#">Shop By Sizes</a></li>-->
                  <!--        <li><a href="#">Shop By Colors</a></li>-->
                  <!--        <li><a href="#">Period Tracker</a></li>-->
                  <!--        <li><a href="#">Save For Later</a></li>-->
                  <!--        <li><a href="#">Clovia Partnership Program</a></li>-->
                  <!--        <li><a href="#">Clovia Reviews</a></li>-->
                  <!--        <li><a href="#">Sales and Service</a></li>-->
                  <!--        <li><a href="#">Own A Franchisee</a></li>-->
                  <!--        <li><a href="#">Clovia Store Locator</a></li>-->
                  <!--        <li><a href="#">Clovia Responsible</a></li>-->
                  <!--        <li><a href="#">Disclosure Policy</a></li>-->
                  <!--      </ul>-->
                  <!--      <ul>-->
                  <!--        <li><a href="#">About Us</a></li>-->
                  <!--        <li><a href="#">Contact Us</a></li>-->
                  <!--        <li><a href="#">Shipping Policy</a></li>-->
                  <!--        <li><a href="#">Privacy Policy</a></li>-->
                  <!--        <li><a href="#">Terms & Conditions</a></li>-->
                  <!--        <li><a href="#">Trade Enquiries</a></li>-->
                  <!--        <li><a href="#">Return & Exchange Policy</a></li>-->
                  <!--        <li><a href="#">Track your order</a></li>-->
                  <!--        <li><a href="#">Discreet Packaging</a></li>-->
                  <!--        <li><a href="#">Gentlemen's Guide</a></li>-->
                  <!--        <li><a href="#">Refer & Earn</a></li>-->
                  <!--        <li><a href="#">My Bag</a></li>-->
                  <!--        <li><a href="#">Sitemap</a></li>-->
                  <!--        <li><a href="#">FAQs</a></li>-->
                  <!--        <li><a href="#">Clovia Coupons</a></li>-->
                  <!--        <li><a href="#">Careers</a></li>-->
                  <!--      </ul>-->
                  <!--    </div>-->
                  <!--  </div>-->
                  <!--</div>-->

                </div>
              </div>
            </div>

            <div class="footer-contact-box">
              <h4>Stay in Touch</h4>
              <div class="footer-form">
                <form action="{{route('emailCheck')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                  <div class="form-group">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <button type="submit" class="btn">Submit</button>
                </form>
                <div class="social-link">
                  <a href="https://www.facebook.com/profile.php?id=100092465379806" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <a href="https://www.instagram.com/baredezireindia/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
                <div class="app-link d-flex">
                  <a href="#"><img src="{{asset('assets/images/gp.png')}}"></a>
                  <a href="#"><img src="{{asset('assets/images/app.png')}}"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bootom">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <div class="footer-bottom-wrap">
                  <h4>{{$setting->contact_title}}</h4>
                  <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{$setting->address}}</p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="footer-bottom-wrap">
                  <h4>Support:</h4>
                  <ul class="">
                    <li><a href="tel:123456789"><i class="fa fa-phone" aria-hidden="true"></i>{{$setting->site_phone}}</a></li>
                    <li><a href="https://wa.me/+91987654321"><img src="{{  isset($setting->whatsapp_logo) ? config("app.url").Storage::url($setting->whatsapp_logo) :asset('assets/images/whatsapp.png') }}" alt="image" />{{$setting->site_whatsapp}}</a></li>
                    <li><a href="mailto:baredsire@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i>{{$setting->site_email}}</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-5 text-right">
                <div class="footer-bottom-wrap">
                  <img src="{{asset('assets/images/fb.png')}}" alt="">
                  <img src="{{asset('assets/images/fb2.png')}}" alt="" class="mt-2">
                  <p class="copyright mt-5">{{$setting->copyright_text}} <a href="https://3raredynamics.com/" target="_blank">{{$setting->footer_text}}</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content mc-1">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Size Chart</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="modal-body p0">
              <div class="bgPnk">
                <span class="pull-left txtHeading">Find your Size</span>
                
              </div>
              <div class="imgSizeChart">
                <img
                  id="chart_image_inches"
                  src="{{  isset($setting->size_chart_image) ? config("app.url").Storage::url($setting->size_chart_image) :asset('assets/images/avtar.png') }}"
                  src="{{asset('assets/images/size-chharts-IN.jpg')}}"
                  alt="women size chart 2"
                  class="imgResponsive"
                />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>