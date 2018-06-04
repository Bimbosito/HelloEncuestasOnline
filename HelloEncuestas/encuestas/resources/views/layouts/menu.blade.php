<!DOCTYPE html>
<html>
<head>
	<title>{{Session::get('interfaz')}}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatable.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css')}}">
	<link href="{{asset ('assets/css/star-rating.css')}}" rel="stylesheet">
	@if(Session::get('interfaz') == 'Productos')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/simple-sidebar-inverted.css')}}">
	@else
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/simple-sidebar.css')}}">
	@endif
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
	@if(Session::get('interfaz') == 'Paquetes')
	<nav class="navbar navbar-default fixed-top-inverse">
	@else
	<nav class="navbar navbar-inverse fixed-top-inverse">
	@endif
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="{{asset('assets/images/logo_menu.png')}}" width="50px"></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#"><h4>TOUR</h4></a></li>
					<li><a href="{{ route('Home.producto') }}"><h4>PRODUCTO</h4></a></li>
					@if(Session::has('admin'))
					<li><a href="{{URL::action('PaqueteController@index')}}"><h4>PAQUETES</h4></a></li>
					@endif
					<li><a href="#"><h4>CONFIGURACIÓN</h4></a></li>
					@if(Session::has('usu'))
					<li><a href="{{ route('Usuarios.logout') }}"><h4>CERRAR SESION</h4></a></li>
					@else
					<li><a href="{{ route('Usuarios.login') }}"><h4>INICIAR SESIÓN</h4></a></li>
					<li><a href="{{ route('Usuarios.crear') }}"><h4>REGISTRARME</h4></a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	<nav class="navbar navbar-yellow">
		<div class="container">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#"><h3>Encuestas específicas</h3></a></li>
				</ul>
			</div>
		</div>
	</nav>
	@if(Session::has('usu'))
	<div class="wrapper">
					<div id="sidebar-wrapper">
			            <ul class="sidebar-nav">
			                <li class="sidebar-brand">
			                    <a href="javascript:esconder();">
			                        MENÚ
			                    </a>
			                </li>
			                <li role="separator" class="divider-principal"></li>
			                <li>
			                    <a href="{{ route('Usuarios.mostrar')}}">Perfil</a>
			                </li>
			                <li role="separator" class="divider"></li>
			                <li>
			                    <a href="#">Encuesta Global</a>
			                </li>
			                <li role="separator" class="divider"></li>
			                <li>
			                    <a href="{{URL::action('EncuestaEspecificaController@index')}}">Encuesta Específica</a>
			                </li>
			                <li role="separator" class="divider"></li>
			                <li>
			                    <a href="{{URL::action('EncuestaEspecificaController@index')}}">Gráficas</a>
			                </li>
			                <li role="separator" class="divider"></li>
			                <li>
			                    <a href="{{}}">Administación de Correos</a>
			                </li>
			                <li role="separator" class="divider"></li>
			                <li>
			                    <a href="#">Administrador</a>
			                </li>
			            </ul>
			        </div>
				</div>
	@endif
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