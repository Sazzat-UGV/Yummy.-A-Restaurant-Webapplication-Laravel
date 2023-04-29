
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('assets/backend/auth') }}/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/auth') }}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/auth') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/auth') }}/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/auth') }}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/auth') }}/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/auth') }}/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/auth') }}/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/auth') }}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/auth') }}/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="{{ route('admin.login') }}" method="POST">
                    @csrf
					<span class="login100-form-title">
						Sign In
					</span>

					<div class="wrap-input100 validate-input m-b-16">
						<input type="text" name="email" placeholder="Email" class="input100 @error('email')
                        is-invalid
                        @enderror" >
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<input type="password" name="password" placeholder="Password" class="input100 @error('password')
                        is-invalid
                        @enderror">
                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn py-5">
						<button  type="submit" class="login100-form-btn">
							Sign in
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


<!--===============================================================================================-->
	<script src="{{ asset('assets/backend/auth') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/backend/auth') }}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/backend/auth') }}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ asset('assets/backend/auth') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/backend/auth') }}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/backend/auth') }}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{ asset('assets/backend/auth') }}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/backend/auth') }}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/backend/auth') }}/js/main.js"></script>

</body>
</html>
