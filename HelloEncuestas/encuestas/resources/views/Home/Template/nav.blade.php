<nav class="navbar navbar-inverse">
		<div class="container-fluid">
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
					<li><a href="#">TOUR</a></li>
					<li><a href="#">PRODUCTO</a></li>
					<li><a href="#">PAQUETES</a></li>
					<li><a href="#">CONFIGURACIÓN</a></li>
					<li><a href="{{ route('Usuarios.logout') }}">CERRAR SESIÓN</a></li>
					<li><a href="{{ route('Usuarios.crear') }}">REGISTRARME</a></li>
					<li><a href="{{ route('Usuarios.login') }}" class="btn btn-light">Comenzar</a></li>
					
				</ul>
			</div>
		</div>
	</nav>