<header>
    <div class="header-top">
        <div class="container-fluid">
            <div class="header-top-wrap">
                <p>with us</p>
                <p>Feel good while you shop with us</p>
                <p>Feel Good</p>
            </div>
        </div>
    </div>
    <!-- for larges creen -->
    <div class="header-bottom">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-lg" id="myNavbar">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav"
                    aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav ml-auto nav-fill">
                        @foreach ($categories as $category)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{route('maincategory-product',$category->id)}}"
                                id="servicesDropdown" role="button">{{$category->name }}<span class="sr-only">(current)</span></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="servicesDropdown">
                                <div class="d-md-flex align-items-start justify-content-start">
                                    @foreach ($category->children as $subcategory)
                                      @if ($subcategory->status == '1')
                                    <div>

                                        <div class="dropdown-header">{{$subcategory->name}}</div>
                                        @foreach ($subcategory->children as $subSubcategory)
                                        @if ($subSubcategory->status == '1')
                                        <a class="dropdown-item"
                                            href="{{route('category-product',$subSubcategory->id)}}">{{$subSubcategory->name}}</a>
                                              @endif
                                        @endforeach
                                    </div> @endif
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <a href="{{route('dashboard')}}" class="navbar-brand"><img
                        src="{{  isset($setting->site_logo) ? config("app.url").Storage::url($setting->site_logo) :asset('assets/images/logo.png') }}"
                        alt="image" /></a>
                <!-- <a href="#" class="navbar-brand"><img src="{{asset('assets/images/logo.png')}}" alt=""></a> -->
                <div class="wish-cart">
                    <div class="autocomplete">
                        <input type="text" id="search" name="search" class="form-control" placeholder="Search">
                        <div id="results" class="autocomplete-results"></div>
                    </div>

                 
                    <a href="{{route('wishlist')}}"><i class="fa fa-heart"></i>
                        <p>{{ App\Models\Cart::where('user_id',Auth::check()?Auth::user()->id:0)->where('wishlist',1)->count() }}
                        </p>
                    </a>
                    <a href="{{route('cartView')}}"><i class="fa fa-shopping-bag"></i>
                        <p>{{ App\Models\Cart::where('user_id',Auth::check()?Auth::user()->id:0)->where('wishlist',0)->count() }}
                        </p>
                    </a>

                    @guest
                    <a href="{{route('loginForm')}}"><i class="fa fa-user" aria-hidden="true"></i></a>
                    @else

                    <ul class="navbar-nav ml-auto nav-fill">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown__toggle" id="navbarDropdown" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">

                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span>{{ Str::limit(auth()->user()->name, 8) }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <i class="fa fa-bars"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('orderlist')}}">
                                        <i class="fa fa-shopping-cart"></i> My Orders
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#manageProfile">
                                        <i class="fa fa-user"></i> Manage Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#managePassword">
                                        <i class="fa fa-key"></i> Manage Password
                                    </a>
                                </li>
                                <!-- <li>
                <a class="dropdown-item" href="#">
                <i class="fa fa-money"></i> Buy Again
                </a>
              </li> -->
                                <!-- <li>
                <a class="dropdown-item" href="#">
                <i class="fa fa-hand-peace-o"></i> My Recommendation
                </a>
              </li> -->
                                <li>
                                    <a class="dropdown-item" href="{{route('wishlist')}}">
                                        <i class="fa fa-heart"></i> Wishlist
                                    </a>
                                </li>
                                <!-- <li>
                <a class="dropdown-item" href="#">
                <i class="fa fa-percent" ></i> My Coupons
                </a>
              </li> -->
                                <!-- <li>
                <a class="dropdown-item" href="#">
                <i class="fa fa-female"></i>BareDesireCurve!
                </a>
              </li> -->
                                <!-- <li>
                <a class="dropdown-item" href="#">
            <i class="fa fa-commenting-o" ></i> Feedback
                </a>
              </li> -->
                                <li>
                                    <a class="dropdown-item" href="{{route('contactUs')}}">
                                        <i class="fa fa-comments"></i>Contact US
                                    </a>
                                </li>
                                <hr>


                                <li>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fa fa-sign-out"></i>Logout
                                    </a>


                                </li>

                            </ul>
                        </li>
                    </ul>
                    @endguest
                </div>
            </nav>
        </div>
    </div>
    <!-- end -->

    <div class="modal fade size-chart" id="logoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModal">Ready to Leave?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>


                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>


                    <a class="btn btn-secondary" type="button" onclick="LogoutFormMobile.submit()">
                        Logout
                        <form action="{{route('logout')}}" method="POST" id="LogoutFormMobile" style="display:none">
                            @csrf
                        </form>
                    </a>
                </div>

            </div>
        </div>
    </div>


    <!-- profile modal -->

    <div class="modal fade size-chart" id="manageProfile" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="manageProfile">Manage Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="FaqQuestion">Name</label>
                            <div class="input-group input-group-merge">

                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    id="Name" placeholder="Enter Name"
                                    value="{{old('name', isset(auth()->user()->name) ? auth()->user()->name:'')}}" />
                            </div>
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="FaqQuestion">Email</label>
                            <div class="input-group input-group-merge">

                                <input type="text" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="Email"
                                    placeholder="Enter Email"
                                    value="{{old('email', isset(auth()->user()->email) ? auth()->user()->email:'')}}" />
                            </div>
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="FaqQuestion">Phone</label>
                            <div class="input-group input-group-merge">

                                <input type="text" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror" id="Phone"
                                    placeholder="Enter Phone"
                                    value="{{old('phone', isset(auth()->user()->phone) ? auth()->user()->phone:'')}}" />
                            </div>
                        </div>
                    
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>


                </div>
                </form>
            </div>
        </div>
    </div>


     <!-- password modal -->

     <div class="modal fade size-chart" id="managePassword" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="managePassword">Manage Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('password.update')}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="FaqQuestion">Old Password</label>
                            <div class="input-group input-group-merge">

                                <input type="password" name="old_password" class="form-control @error('name') is-invalid @enderror"
                                    id="Name" placeholder="Enter Existing Password!"
                                     />
                            </div>
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="FaqQuestion">New Password</label>
                            <div class="input-group input-group-merge">

                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="Email"
                                    placeholder="Enter New Password"
                                    />
                            </div>
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="FaqQuestion">Confirm Password</label>
                            <div class="input-group input-group-merge">

                                <input type="password" name="con_password"
                                    class="form-control @error('con_password') is-invalid @enderror" id="con_password"
                                    placeholder="Confirm Your Password"
                                     />
                            </div>
                        </div>
                    
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>


                </div>
                </form>
            </div>
        </div>
    </div>
</header>