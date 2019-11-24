<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('homepage/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('homepage/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="{{ asset('homepage/vendor/bootstrap-select/css/bootstrap-select.min.css') }}">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{ asset('homepage/vendor/owl.carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/vendor/owl.carousel/assets/owl.theme.default.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('homepage/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('homepage/css/custom.css') }}">
    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png">
    @yield('header')
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  </head>
  <body>
      @include('sweet::alert')
    <div id="all">
      <!-- Top bar-->
      <div class="top-bar">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-md-6 d-md-block d-none">
              <p>Contact us on +628222100600 25 or didikprab@gmail.com.</p>
            </div>
            <div class="col-md-6">
              <div class="d-flex justify-content-md-end justify-content-between">
                <ul class="list-inline contact-info d-block d-md-none">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-phone"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>
                @if(Auth::user())

                @else
                <div class="login"><a href="#" data-toggle="modal" data-target="#login-modal" class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">Sign In</span></a><a href="{{ url('auth/register') }}" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">Sign Up</span></a></div>
                 @endif
                <ul class="social-custom list-inline">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- Top bar end-->
      <!-- Login Modal-->
      <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title"> Login</h4>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <form action="{{ url('auth/login') }}" method="POST">
                {{ @csrf_field() }}
                <div class="form-group">
                  <input id="email_modal" type="text" placeholder="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                  <input id="password_modal" type="password" placeholder="password" class="form-control" name="password">
                </div>
                <p class="text-center">
                  <button class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Log in</button>
                </p>
              </form>
              <p class="text-center text-muted">Belum punya akun?</p>
              <p class="text-center text-muted"><a href="{{ url('auth/register') }}"><strong>Register now</strong></a></p>
            </div>
          </div>
        </div>
      </div>
      <!-- Login modal end-->
      <!-- Navbar Start-->
      <header class="nav-holder make-sticky">
        <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
          <div class="container"><a href="index.html" class="navbar-brand home"><img src="{{ url('homepage/img/logo.png') }}" alt="Universal logo" class="d-none d-md-inline-block"><img src="img/logo-small.png" alt="Universal logo" class="d-inline-block d-md-none"><span class="sr-only">Universal - go to homepage</span></a>
            <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <div id="navigation" class="navbar-collapse collapse">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item  active"><a href="/" >Home</a>
                </li>
                <li class="nav-item dropdown menu-large"><a href="{{ url('product') }}" >Product</a>
                </li>
                <!-- ========== FULL WIDTH MEGAMENU ==================-->
             
                      <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle">Category <b class="caret"></b></a>
                  <ul class="dropdown-menu megamenu">
                    <li>
                      <div class="row">
                        @foreach($category as $cat)
                        <div class="col-md-6 col-lg-3">
                          <h5> <a href="{{ url('/category/'.$cat->slug) }}">{{ $cat->name }}</a></h5>
                          <ul class="list-unstyled mb-3">
                            @foreach($cat ->children as $sub)
                            <li class="nav-item">
                              <a href="{{ url('/category/'.$sub->slug) }}" class="nav-link">{{ $sub->name }}</a></li>
                            @endforeach
              
                          </ul>
                      </div>
                      @endforeach
                    </li>
                  </ul>
                </li>
                   <li class="nav-item dropdown menu-large"><a href="{{ url('penjual') }}" data-hover="dropdown" data-delay="200" ">Supplier </a>
                </li>
                @if(Auth::user())
               <li class="nav-item dropdown"><a style="color: #3aa18c "  href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle"><img class=" rounded-circle" width="15px" src="{{ url(Auth::user()->photo) }}"> {{(Auth::user()->name) }}  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item"><a href="{{ url('myprofil')}}" class="nav-link">My Acount</a></li>
                    <li class="dropdown-item"><a href="{{ url('cart/myorder') }}" class="nav-link">My Order</a></li>
                    @if(Auth::user()->role == "supplier")
                      <li class="dropdown-item"><a href="{{ url('myproduct') }}" class="nav-link">My Product</a></li>
                    @endif
                    <li class="dropdown-item"><a href="{{ url('logout') }}" class="nav-link">Logout</a></li>
                  </ul>
                </li>
                @endif
                <!-- ========== FULL WIDTH MEGAMENU END ==================-->
                <!-- ========== Contact dropdown ==================-->
                <!-- ========== Contact dropdown end ==================-->
              </ul>
            </div>
            <div id="search" class="collapse clearfix">
              <form role="search" class="navbar-form">
                <div class="input-group">
                  <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button></span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </header>
      @yield('slide')
      <!-- Navbar End-->
      @yield('contents')
        
      <!-- GET IT-->
      @if(!Auth::user())
      <div class="get-it">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 text-center p-3">
              <h3>Ingin menjual barang anda ?</h3>
            </div>
            <div class="col-lg-4 text-center p-3">   <a href="{{ url('auth/register') }}" class="btn btn-template-outlined-white">Register</a></div>
          </div>
        </div>
      </div>
      @endif
      <!-- FOOTER -->
      <footer class="main-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <h4 class="h6">About Us</h4>
              <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            </div>
            <div class="col-lg-4">
              <h4 class="h6">Contact</h4>
              <p class="text-uppercase">
                <strong>Universal Ltd.</strong><br>
                45Y 73J <br>England <br><strong>Great Britain</strong></p>
            </div>
            <div class="col-lg-4">
              <ul class="list-inline photo-stream">
                <li class="list-inline-item"><a href="#"><img src="{{ asset('homepage/img/detailsquare.jpg') }}" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="{{ asset('homepage/img/detailsquare2.jpg') }}" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="{{ asset('homepage/img/detailsquare3.jpg') }}" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="{{ asset('homepage/img/detailsquare3.jpg') }}" alt="..." class="img-fluid"></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="copyrights">
          <div class="container">
            <div class="row">
              <div class="col-md-4 text-center-md">
                <p>&copy; 2018. Didikprabowo.com / tumbas.id</p>
              </div>
              <div class="col-md-8 text-right text-center-md">
                <p>Template design by <a href="https://bootstrapious.com/free-templates">Bootstrapious Templates </a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Javascript files-->
    <script src="{{ asset('homepage/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('homepage/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('homepage/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('homepage/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('homepage/vendor/waypoints/lib/jquery.waypoints.min.js') }}"> </script>
    <script src="{{ asset('homepage/vendor/jquery.counterup/jquery.counterup.min.js') }}"> </script>
    <script src="{{ asset('homepage/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('homepage/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js') }}"></script>
    <script src="{{ asset('homepage/js/jquery.parallax-1.1.3.js') }}"></script>
    <script src="{{ asset('homepage/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('homepage/vendor/jquery.scrollto/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('homepage/js/front.js') }}"></script>
    @yield('footer')
  </body>
</html>