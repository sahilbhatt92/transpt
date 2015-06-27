<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		
		<meta name="author" content="Andrew Feng">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="{{asset('js/html5shiv.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/respond.min.js')}}"></script>
		<![endif]-->
		<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/bs-wizard-min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/jquery.validate.bootstrap.popover.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/bs-wizard-demo2.js')}}"></script>
		
		
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<link href="{{asset('css/company-form.css')}}" rel="stylesheet" type="text/css" media="all">
		<link href="{{asset('css/bs-wizard-min.css')}}" rel="stylesheet" type="text/css" media="all">
		
	</head>
	<body>
		<div class="container">
			<div class="row">
			    <div class="col-lg-12">&nbsp;</div>
			</div>
			<div class="row">
			    <div class="col-lg-12">&nbsp;</div>
			</div>
		</div>

		<div class="container body-container">
			@yield('content')
		</div>
	</body>
</html>