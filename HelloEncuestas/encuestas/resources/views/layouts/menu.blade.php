<!DOCTYPE html>
<html>
<head>
	<title>{{Session::get('interfaz')}}</title>
     
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatable.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css')}}">
	<link href="{{asset ('assets/css/star-rating.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/simple-sidebar-inverted2.css')}}">
	@if(Session::get('interfaz') == 'Productos')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/simple-sidebar-inverted.css')}}">

	@else
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/simple-sidebar.css')}}">
	@endif
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
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
					
					<li><a href="#" data-toggle="modal" data-target="#ventana1"><h4>TOUR</h4></a></li>
					<li><a href="{{ route('Home.producto') }}"><h4>PRODUCTO</h4></a></li>
					@if(Session::has('admin'))
					<li><a href="{{URL::action('PaqueteController@index')}}"><h4>PAQUETES</h4></a></li>
					@endif
                    <li><a href="{{URL::route('Home.paquetes')}}"><h4>PAQUETES</h4></a></li>
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
			                    <a href="{{URL::action('EncuestaGlobalController@index')}}">Encuesta Global</a>
			                </li>
			                <li role="separator" class="divider"></li>
			                <li>
			                    <a href="{{URL::action('EncuestaEspecificaController@index')}}">Encuesta Específica</a>
			                </li>
			                <li role="separator" class="divider"></li>
			                <li>
			                    <a href="{{URL::action('EncuestaEspecificaContestadaController@index')}}">Gráficas</a>
			                </li>
			                <li role="separator" class="divider"></li>
			                <li>
			                    <a href="{{URL::action('CorreoController@index')}}">Administación de Correos</a>
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

	<div class="modal fullscreen-modal fade" role="dialog" tabindex="-1" id="ventana1">
					<div class="modal-dialog modal-lg " role="document">
						<div class="modal-content">
							
							<div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                </button>


	<div class="container">
		<div class="row">
			<div class="col-xs-12">

				<div class="row">
					<div class="col-xs-12 col-md-12 col-lg-12" align="">
						<div style="font-size: 48px; color: white;"></div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12 " align="center">
					<h2 style="color: white;">Encuesta Hello Survey</h2></center>
						<center style="color: white;">Ten Feedback directo de tus usuarios</center>
					</div>
				</div>
				<br><br><br> 
			</div>
		</div>
	</div>
	<div class="container-fuid">
	<br>
	<div class="container">
	<div class="row">
	<center>
	<div class="col-md-12">
		<div id="carousel-1" class="carousel slide" data-ride="carousel">
			<!--Indicadores-->
			<ol class="carousel-indicators">
				<li data-target="#carousel-1" data-slide-to="0" class="active">
				<li data-target="#carousel-1" data-slide-to="1">
				<li data-target="#carousel-1" data-slide-to="2">
			</ol>
			<!-- Contenedor de los slide -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="{{asset('assets/images/Carrusel/2.jpg')}}" class="img-responsive" alt="">
					<div class="carousel-caption hidden-xs hidden-sm">
					<h3>Slide 1</h3>
					<p> No se que dice aquiu :v</p>
					</div>
				</div>

				<div class="item">
					<img src="{{asset('assets/images/Carrusel/3.jpg')}}" class="img-responsive" alt="">
					<div class="carousel-caption hidden-xs hidden-sm">
					<h3>Slide 2</h3>
					<p> No se que dice aquiu :v</p>
					</div>
				</div>

				<div class="item">
					<img src="{{asset('assets/images/Carrusel/images.jpeg')}}" class="img-responsive" alt="">
					<div class="carousel-caption hidden-xs hidden-sm">
					<h3>Slide 3</h3>
					<p> No se que dice aquiu :v</p>
					</div>
				</div>
			</div>
			<!-- Controles -->
			<a href="#carousel-1" class="let carousel-control" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Anterior</span>
			</a>

			<a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Siguiente</span>
			</a>
		</div>
	</div>
		</div>
		</div>

	</div>
	</div>


							</div>
						</div>
	
					</div>
	

							<!-- footer ventana-->
							<div class="modal-footer">
								 
							</div>
						
</body>
</html>