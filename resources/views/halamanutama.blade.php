<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="{{ asset("css/owl.carousel.css") }}" />
	<link type="text/css" rel="stylesheet" href="{{ asset("css/owl.theme.default.css") }}" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="{{ asset("css/magnific-popup.css") }}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ asset("css/font-awesome.min.css") }}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset("css/style_landpage.css") }}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Header -->
	<header id="home">
		<!-- Background Image -->
		<div class="bg-img" style="background-image: url('{{ asset("images/london.jpg") }}');">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		<!-- Nav -->
		<nav id="nav" class="navbar nav-transparent">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="index.html">
							<img class="logo" src="{{ asset("images/logo.png")}}" alt="logo">
							<img class="logo-alt" src="{{ asset("images/logo-alt.png")}}" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="#home">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
					<li><a href="#portfolio">Placement Test</a></li>

				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

		<!-- home wrapper -->
		<div class="home-wrapper">
			<div class="container">
				<div class="row">

					<!-- home content -->
					<div class="col-md-10 col-md-offset-1">
						<div class="home-content">
							<h1 class="white-text">DAY TO DAY ENGLISH</h1>
							<!--<p class="white-text">DAY TO DAY ENGLISH</p>-->
							<a href="{{ url('/registrasi') }}"><button class="white-btn">DAFTAR</button></a>
							<a href="{{ url('/login') }}"><button class="main-btn">LOGIN</button></a>
						</div>
					</div>
					<!-- /home content -->

				</div>
			</div>
		</div>
		<!-- /home wrapper -->

	</header>
	<!-- /Header -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="{{ asset("js/jquery.min.js") }}"></script>
	<script type="text/javascript" src="{{ asset("js/bootstrap.min.js") }}"></script>
	<script type="text/javascript" src="{{ asset("js/owl.carousel.min.js") }}"></script>
	<script type="text/javascript" src="{{ asset("js/jquery.magnific-popup.js") }}"></script>
	<script type="text/javascript" src="{{ asset("js/main.js") }}"></script>

</body>

</html>
