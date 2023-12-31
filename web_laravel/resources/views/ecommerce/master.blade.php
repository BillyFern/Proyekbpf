<!DOCTYPE html>
<html lang="zxx">

<head>
	<!-- Meta Tag -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
	<title>Golden Mitra Perkasa</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{ url('images/favicon.png')}}">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

	<!-- StyleSheet -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ url('css/bootstrap.css')}}">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ url('css/magnific-popup.min.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ url('css/font-awesome.css')}}">
	<!-- Fancybox -->
	<link rel="stylesheet" href="{{ url('css/jquery.fancybox.min.css')}}">
	<!-- Themify Icons -->
	<link rel="stylesheet" href="{{ url('css/themify-icons.css')}}">
	<!-- Nice Select CSS -->
	<link rel="stylesheet" href="{{ url('css/niceselect.css')}}">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="{{ url('css/animate.css')}}">
	<!-- Flex Slider CSS -->
	<link rel="stylesheet" href="{{ url('css/flex-slider.min.css')}}">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{ url('css/owl-carousel.css')}}">
	<!-- Slicknav -->
	<link rel="stylesheet" href="{{ url('css/slicknav.min.css')}}">

	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="{{ url('css/reset.css')}}">
	<link rel="stylesheet" href="{{ url('style.css')}}">
	<link rel="stylesheet" href="{{ url('css/responsive.css')}}">


	@yield('css')

</head>

<body class="js">

	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->


	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> NO HP</li>
								<li><i class="ti-email"></i> goldenmitraperkasa@gmail.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
					
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>

		@if(session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
		@endif

		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.html"><img src="{{ url('images/logo.png')}}" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
				</div>
			</div>
		</div>

		@yield('content')
		<!-- End Topbar -->

		<footer class="footer">
			<!-- Footer Top -->
			<div class="footer-top section">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer about">
								<div class="logo">
									<a href="index.html"><img src="{{ url('images/logo2.png')}}" alt="#"></a>
								</div>
								<p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
								<p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456 789</a></span></p>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-2 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer links">
								<h4>Information</h4>
								<ul>
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Help</a></li>
									<li><a href="#">Payment Methods</a></li>
									<li><a href="#">Shipping</a></li>
								</ul>
							</div>
							<!-- End Single Widget -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Footer Top -->
			<div class="copyright">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-6 col-12">
								<div class="left">
									<p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a> - All Rights Reserved.</p>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="right">
									<img src="{{ url('images/payments.png" alt="#')}}">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- /End Footer Area -->

		<!-- Jquery -->
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
		<script src="{{ url('js/jquery.min.js')}}"></script>
		<script src="{{ url('js/jquery-migrate-3.0.0.js')}}"></script>
		<script src="{{ url('js/jquery-ui.min.js')}}"></script>
		<!-- Popper JS -->
		<script src="{{ url('js/popper.min.js')}}"></script>
		<!-- Bootstrap JS -->
		<script src="{{ url('js/bootstrap.min.js')}}"></script>
		<!-- Color JS -->
		<script src="{{ url('js/colors.js')}}"></script>
		<!-- Slicknav JS -->
		<script src="{{ url('js/slicknav.min.js')}}"></script>
		<!-- Owl Carousel JS -->
		<script src="{{ url('js/owl-carousel.js')}}"></script>
		<!-- Magnific Popup JS -->
		<script src="{{ url('js/magnific-popup.js')}}"></script>
		<!-- Waypoints JS -->
		<script src="{{ url('js/waypoints.min.js')}}"></script>
		<!-- Countdown JS -->
		<script src="{{ url('js/finalcountdown.min.js')}}"></script>
		<!-- Nice Select JS -->
		<script src="{{ url('js/nicesellect.js')}}"></script>
		<!-- Flex Slider JS -->
		<script src="{{ url('js/flex-slider.js')}}"></script>
		<!-- ScrollUp JS -->
		<script src="{{ url('js/scrollup.js')}}"></script>
		<!-- Onepage Nav JS -->
		<script src="{{ url('js/onepage-nav.min.js')}}"></script>
		<!-- Easing JS -->
		<script src="{{ url('js/easing.js')}}"></script>
		<!-- Active JS -->
		<script src="{{ url('js/active.js')}}"></script>

		@yield('js')
</body>

</html>