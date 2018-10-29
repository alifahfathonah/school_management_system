<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link type="text/css" rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}" />
<link rel="stylesheet" href="{{ asset("css/font-awesome.min.css") }}">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset("css/material-design-iconic-font.min.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset("css/animate.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset("css/hamburgers.min.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset("css/animsition.min.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset("css/select2.min.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset("css/daterangepicker.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset("css/util.css") }}">
	<link rel="stylesheet" type="text/css" href="{{ asset("css/main.css") }}">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{ asset("images/london.jpg") }}');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					{{ csrf_field() }}
					<span class="login100-form-title p-b-34 p-t-27">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" value="Login"/>
						<!--<a href="{{ url('/placementtest') }}"><button class="login100-form-btn">
							Login
						</button></a>-->
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="{{ url('/') }}">
							Kembali
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<script type="text/javascript" src="{{ asset("js/jquery.min.js") }}"></script>
	<script type="text/javascript" src="{{ asset("js/bootstrap.min.js") }}"></script>

	<script src="{{ asset("js/animsition.min.js") }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset("js/popper.js") }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset("js/select2.min.js") }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset("js/moment.min.js") }}"></script>
	<script src="{{ asset("js/daterangepicker.js") }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset("js/countdowntime.js") }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset("js/main_login.js") }}"></script>

</body>
</html>
