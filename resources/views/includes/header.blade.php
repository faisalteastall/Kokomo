    <div class="body-preloader">
        <div class="loader-wrap">
            <div class="dots">
                <div class="dot one"></div>
                <div class="dot two"></div>
                <div class="dot three"></div>
            </div>
        </div>
    </div>
    <header class="hdr global_width hdr-style-2 hdr_sticky minicart-icon-style-3 hdr-mobile-style2">
        <div class="bgcolor" style="background:#070736;">
            <div class="container text-right pt-1 pb-1">
                @if(isset(Auth::guard('customer')->user()->id))
                 <b class="text-white curser-pointer"><a class="text-white" href="javascript:void(0)"  >Hi {{Auth::guard('customer')->user()->firstname}}</a></b>
                 <div class="dropdown float-right pl-2">
                    <span id="showbutton" style="cursor: pointer;"><img width="25" height="25" src="{{asset('storage/app/public/customers/'.Auth::guard('customer')->user()->image)}}" style="background: white;border-radius: 16px;"></span>
                    <div class="dropdown-menu" id="showing">
                        <a class="dropdown-item" href="{{route('order')}}">My Orders</a>
                        <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                        <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                    </div>
                </div>               
                @else
                 <b class="text-white curser-pointer"><a class="text-white" href="#" data-fancybox data-src="#log1" id="loggedin">Log In</a> <span style="color: #000"></span>&nbsp;<span class="hidden-xs">&nbsp;|&nbsp;&nbsp; <a class="text-white" href="#" data-fancybox data-src="#log2" id="loggedout">Sign Up</a></span></b>               
                @endif
            </div>
        </div>
        <div class="mobilemenu js-push-mbmenu">
            <div class="mobilemenu-content">
                <div class="mobilemenu-close mobilemenu-toggle">CLOSE</div>
                <div class="mobilemenu-scroll">
                    <div class="mobilemenu-search"></div>
                    <div class="nav-wrapper show-menu">
                        <div class="nav-toggle"><span class="nav-back"><i class="icon-arrow-left"></i></span> <span class="nav-title"></span></div>
                        <ul class="nav nav-level-1">
                            <li><a href="index.php">Home</a><span class="arrow"></span></li>
                            <li><a href="about.php">About</a><span class="arrow"></span></li>
                            <li><a href="collection.php">Collection</a><span class="arrow"></span></li>
                            <li><a href="contact.php">Contact Us</a><span class="arrow"></span></li>
                            <span id="showbutton"><a href="cart.php"><img width="32" src="{{asset('public/assets/images/footer/2.png')}}"></a></span>
                        </ul>
                    </div>
                    <div class="mobilemenu-bottom">
                        <div class="mobilemenu-currency"></div>
                        <div class="mobilemenu-language"></div>
                        <div class="mobilemenu-settings"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hdr-mobile show-mobile">
            <div class="hdr-content">
                <div class="container">
                    <div class="menu-toggle"><a href="#" class="mobilemenu-toggle"><i class="icon icon-menu"></i></a></div>
                    <div class="logo-holder"><a href="" class="logo"><img src="{{asset('public/assets/images/logo.png')}}" srcset="" alt=""></a></div>
                    <div class="hdr-mobile-right">
                        <div class="hdr-topline-right links-holder"></div>
                        <div class="minicart-holder"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hdr-desktop hide-mobile">
            <div class="hdr-content">
                <div class="container">
                    <div class="hdr-content-left"></div>
                    <div class="logo-holder"><a href="index.php" class="logo"><img src="{{asset('public/assets/images/logo.png')}}" alt=""></a></div>
                    <div class="hdr-content-right">
                        <div class="links-holder"></div>
                        <div class="minicart-holder">
                            <div class="">
                               
                                <!-- <div class="option-links float-right pt-1a"><a href="#" data-fancybox data-src="#log1">Logged in</a></div> -->
                                <div class="modal--simple" id="log1" style="display: none;border-radius: 60px;max-width: 5500px;">
                                    <div class="modal-content">                                    
                                    <form action="{{route('login')}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal-body pt-0 pb-2 {{ $errors->has('modal') ? ' has-error' : '' }}">
                                            <h3 class="text-center si">Sign in</h3>
                                            <p class="text-center fw-700 mb-2 mt-1 si">I have no account? <a href="javascript:void(0)" onclick="showmodal('log2','log1')">SIGN UP</a></p>
                                            <input type="hidden" name="modal" value="loggedin">
                                            <input class="input" placeholder="Email" type="email" required name="email" value="{{ old('email') }}">
                                           @if($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                            
                                            <input class="input" placeholder="Password" type="text" required name="password" value="{{ old('password') }}">
                                            <span class="help-block">

                                            @if($errors->has('password'))
                                            <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="row mb-2 ">
                                           <button type="submit"  class="btn fb-bg text-uppercase btn-block " style="margin:15px;font-size: 15px;">Submit</button>
                                           </div>
                                    </form>
                                        <div class="row mb-2">
                                            <div class="col-md-6 mb-1">
                                                <a href="{{ url('/redirect') }}" class="btn fb-bg text-uppercase btn-block fw-700"><img width="30" src="{{asset('public/assets/images/footer/fb.png')}}"> Sign up with facebook</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{ url('/redirect') }}" class="btn go-bg btn-block fw-700"><img width="30" src="{{asset('public/assets/images/footer/go.png')}}"> Sign up with google</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal--simple" id="log2" style="display: none;border-radius: 60px;max-width: 5500px;">
                                    <div class="modal-content">
                                    <form action="{{route('registeration')}}" method="post">
                                       {{ csrf_field() }}
                                        <div class="modal-body pt-0 pb-2 {{ $errors->has('modal') ? ' has-error' : '' }}">
                                            <h3 class="text-center su">Sign Up</h3>
                                            <!-- <h3 class="text-center si">Sign in</h3> -->
                                            <p class="text-center fw-700 mb-2 mt-1 su">Already a member? <a href="javascript:void(0)" onclick="showmodal('log1','log2')">SIGN IN</a></p>
                                            <!-- <p class="text-center fw-700 mb-2 mt-1 si">I have no account? <a href="#">SIGN UP</a></p> -->
                                            <input type="hidden" name="modal" value="loggedout">
                                            <input class="input" placeholder="First Name" type="text" required name="first_name" value="{{old('first_name')}}">
                                            @if($errors->has('first_name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                            @endif
                                            <input class="input" placeholder="Last Name" type="text" required name="last_name" value="{{old('last_name')}}">
                                            @if($errors->has('last_name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                            @endif
                                            <input class="input" placeholder="Email" type="email" required name="email" value="{{old('email')}}">
                                            @if($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                            <input class="input" placeholder="Password" type="text" required name="password" value="{{old('password')}}">
                                            @if($errors->has('password'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                            <input class="input" placeholder="Mobile" type="text" required name="mobile" value="{{old('mobile')}}">
                                            @if($errors->has('mobile'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                            </span>
                                            @endif
                                            <div class="row mb-2 ">
                                           <button type="submit"  class="btn fb-bg text-uppercase btn-block " style="margin:15px;font-size: 15px;">Submit</button>
                                           </div>
                                            <p class="text-center mt-3 mb-0 ">By signing up you will agree Privacy Policy and Terms of conditions</p>
                                        </div>
                                    </form>
                                        <div class="row mb-2">
                                            <div class="col-md-6 mb-1">
                                                <button type="button" class="btn fb-bg text-uppercase btn-block fw-700"><img width="30" src="{{asset('public/assets/images/footer/fb.png')}}"> Sign up with facebook</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn go-bg btn-block fw-700"><img width="30" src="{{asset('public/assets/images/footer/go.png')}}"> Sign up with google</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="option-links"><a href="#" data-fancybox data-src="#log1" class="minicart-link float-right pt-1">logged in </a></div> -->
                                <!-- <a href="" class="minicart-link">&nbsp; <img width="38" src="{{asset('public/assets/images/footer/1.png')}}">  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-holder border-bottom">
                <div class="container">
                    <div class="hdr-nav">
                        <ul class="mmenu mmenu-js">
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{route('collection')}}">Collection</a></li>
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                        </ul>
                        <div class="dropdown float-right pl-2">
                            <span style="top:-6px;position: absolute;left: 42px;font-weight: bold;color: white;    background: #070736;border-radius: 50%; width: 18px;height: 18px;line-height:20px;">{{count(isset(Session::get('cart')->items)?Session::get('cart')->items:[])}}</span><a href="{{route('cart')}}"><img width="32" src="{{asset('public/assets/images/footer/2.png')}}"></a></span>
                           
                        </div>                       
                    </div>                   
                </div>                
            </div>            
        </div>
        <div class="sticky-holder compensate-for-scrollbar">
            <div class="container">
                <div class="row">
                    <a href="#" class="mobilemenu-toggle show-mobile"><i class="icon icon-menu"></i></a>
                    <div class="col-auto logo-holder-s"><a href="index.php" class="logo"><img src="{{asset('public/assets/images/logo.png')}}" srcset="{{asset('public/assets/images/logo-retina.png 2x" alt=""></a></div>
                    <div class="prev-menu-scroll icon-angle-left prev-menu-js"></div>
                    <div class="nav-holder-s"></div>
                    <div class="next-menu-scroll icon-angle-right next-menu-js"></div>
                    <div class="col-auto minicart-holder-s"></div>
                </div>
            </div>
        </div>
    </header>