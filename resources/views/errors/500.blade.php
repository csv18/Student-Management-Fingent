<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/logo/logo.png') }}">

    <title>500</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('theme/frondend/css/vendors_css.css') }}">

	<!-- Style-->
	<link rel="stylesheet"  href="{{ asset('theme/frondend/css/style.css') }}">
	<link rel="stylesheet"  href="{{ asset('theme/frondend/css/skin_color.css') }}">

  </head>
<body class="theme-primary">

	<section class="error-page h-p100">
		<div class="container h-p100">
		  <div class="row h-p100 align-items-center justify-content-center text-center">
			  <div class="col-lg-7 col-md-10 col-12">
				  <div>
					  <img src="{{ asset('theme/images/auth-bg/500.png') }}" class="max-w-650 w-p100" alt="" />
					  <h1>Uh-Ah</h1>
					  <h3>Internal Server Error !</h3>
					  <div class="my-30"><a href="/login" class="btn btn-danger">Back to Home</a></div>
					  <h5 class="mb-15">-- OR --</h5>
					  <h4>Please try after some time</h4>
				  </div>
			  </div>
		  </div>
		</div>
	</section>

	<!-- Vendor JS -->
	<script src="{{ asset('theme/frondend/js/vendors.min.js') }}"></script>

	<!-- EduAdmin front end -->
	<script src="{{ asset('theme/frondend/js/template.js') }}"></script>


</body>
</html>