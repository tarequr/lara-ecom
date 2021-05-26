<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo_9/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 May 2021 15:59:21 GMT -->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>@yield('title')</title>

	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Porto - Bootstrap eCommerce Template">
	<meta name="author" content="SW-THEMES">

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="{{ asset('public/frontEnd/assets/images/icons/favicon.ico') }}">

	<script type="text/javascript">
		WebFontConfig = {
			google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700,800' ] }
		};
		(function(d) {
			var wf = d.createElement('script'), s = d.scripts[0];
			wf.src = 'public/frontEnd/assets/js/webfont.js';
			wf.async = true;
			s.parentNode.insertBefore(wf, s);
		})(document);
	</script>

	<!-- Plugins CSS File -->
	<link rel="stylesheet" href="{{ asset('public/frontEnd/assets/css/bootstrap.min.css') }}">

	<!-- Main CSS File -->
	<link rel="stylesheet" href="{{ asset('public/frontEnd/assets/css/style.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontEnd/assets/vendor/fontawesome-free/css/all.min.css') }}">
</head>
<body>
	<div class="page-wrapper">
		<div class="top-notice text-white bg-primary">
			<div class="container text-center">
				<h5 class="d-inline-block mb-0">Get Up to <b>40% OFF</b> New-Season Styles </h5>
				<small>* Limited time only.</small>
				<button title="Close (Esc)" type="button" class="mfp-close">×</button>
			</div><!-- End .container -->
		</div><!-- End .top-notice -->

        @include('frontEnd.includes.header')

		@yield('content')

		@include('frontEnd.includes.footer')

        @include('frontEnd.includes.mobile-menu')

        @include('frontEnd.includes.add-cart')

	<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

	<!-- Plugins JS File -->
	<script src="{{ asset('public/frontEnd/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('public/frontEnd/assets/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('public/frontEnd/assets/js/plugins.min.js') }}"></script>

	<!-- Main JS File -->
	<script src="{{ asset('public/frontEnd/assets/js/main.min.js') }}"></script>

	<!--image instant Show script-->
	<script type="text/javascript">
	    $(document).ready(function(){
	      $('#image').change(function(e){
	        var reader = new FileReader();
	        reader.onload = function(e){
	          $('#showImage').attr('src',e.target.result);
	        }
	        reader.readAsDataURL(e.target.files['0']);
	      });
	    });
	</script>
</body>

<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo_9/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 May 2021 15:59:48 GMT -->
</html>