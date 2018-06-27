<!DOCTYPE html>
<html>
<head>
	<title>{{Session::get('interfaz')}}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatable.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css')}}">
	<link href="{{asset ('assets/css/star-rating.css')}}" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/simple-sidebar-inverted2.css')}}">
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script type="text/javascript" src="{{ asset('assets/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/datatable.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/bootstrap.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/star-rating.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/bootstrap-datepicker.js')}}"></script>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
<body>
	<!-- Menú de navegación -->
	
		<div class="container">
			<div class="navbar-header">
				
				<a class="navbar-brand" href="#"><img src="{{asset('assets/images/logo_menu.png')}}" width="50px"></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					
					
				</ul>
			</div>
		</div>


	

				@yield('content')
	<script type="text/javascript">
		var a = 1;
		function esconder(){
			if(a == 1){
				$("#sidebar-wrapper").hide(300);
				a = 0;
			}
			else{
				$("#sidebar-wrapper").show(300);
				a = 1;
			}
		}
	</script>
</body>
</html>