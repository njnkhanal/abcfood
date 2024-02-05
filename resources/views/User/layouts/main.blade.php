<!doctype html>
<html class="no-js" lang="zxx">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>FoodHub-Home</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/logo1.png') }}">

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.html">
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    
	</head>
    <body>
        <!-- header-start -->
		<header>
			<div id="sticky-header" class="header-top-area header-2 pr-60 pl-60">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-1 col-lg-1">
							<div class="logo">
								<a href="/"><img src="{{ asset('assets/img/logo/logo1.png') }}" height="100px" width="100px" alt="" /></a>
							</div>
						</div>
						<div class="col-xl-4 col-lg-3">
							<div class="main-menu text-center">
								<nav id="mobile-menu">
									<ul>
										<li class="active"><a href="/">home </a>
										</li>
                    					<li><a href="#">menu</a></li>
										<li><a href="#">about</a></li>
										<li><a href="#">contact</a></li>
									</ul>
								</nav>
							</div>
							<div class="mobile-menu"></div>
						</div>
						<div class="col-xl-7 col-lg-8">
							<div class="header-right f-right d-none d-md-none d-lg-block">	
                               <ul>
									@auth
									<li><a href=""><span class="ti-shopping-cart h3"></span></a></li>
									<li><div style="margin-left: 30px">
										<img
										  class="user-img"
										  onclick="toggleDropdown();"
										  src=" {{ asset('assets/img/shop/shop2.jpg') }}"
										  alt=""
										/>
										<div class="click-img" id="dropdown">
										  <a href="#">Wishlist</a>
										  <a href="#">Edit Profile</a>
										  <a href="#">View Profile</a>
										  <a class="dropdown-item" href="{{ route('logout') }}"
										onclick="event.preventDefault();
													  document.getElementById('logout-form').submit();">
										 {{ __('Logout') }}
									 </a>
											<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
												@csrf
											</form>
										</div>
									  </div></li>
								   @if (Auth::user()->role=='admin')
								   <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>  
								   @endif
                               </ul>
                           </div>
						</div>
						@endauth
					</div>
				</div>
			</div>
			
		</header>
        
        @yield('main-content')
		{{-- footer start --}}

		
	<footer>
		<div class="footer-bottom-area pt-25 pb-25 bg-dark">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="copyright text-center">
							<p class=" text-light">@FoodHub. All Right Reserved</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
		<!-- footer-area-end -->
        <!-- JS here -->
        <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
{{-- 
        icon --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </body>

</html>