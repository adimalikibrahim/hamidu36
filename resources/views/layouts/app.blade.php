
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hamidu</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Hamidu">

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap">

	<!-- Plugins CSS -->
	
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/font-awesome/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/overlay-scrollbar/css/OverlayScrollbars.min.css')}}">
	
	<link id="style-switch" rel="stylesheet" type="text/css" href="{{asset('assets/css/style-dark.css')}}">
	<link id="style-switch" rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
	
    @stack('css')
</head>

<body>

<main>
	
    @include('layouts.sidebar')
<div class="page-content">


    @include('layouts.navbar')
    
	<div class="page-content-wrapper border">

		<div class="row">
			<div class="col-12 mb-3">
				<h1 class="h3 mb-2 mb-sm-0">@yield('title')</h1>
			</div>
		</div>

        @yield('konten')

	</div>
</div>

</main>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/purecounterjs/dist/purecounter_vanilla.js')}}"></script>
<script src="{{asset('assets/vendor/overlay-scrollbar/js/overlayscrollbars.min.js')}}"></script>
<script src="{{asset('assets/js/functions.js')}}"></script>
@stack('script')

</body>
</html>