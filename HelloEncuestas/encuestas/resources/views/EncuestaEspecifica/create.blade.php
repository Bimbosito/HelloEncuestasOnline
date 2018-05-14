<!DOCTYPE html>
<html>
<head>
	<title>Encuesta especifica</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css')}}">
	
</head>
<body>
	<!-- Menú de navegación -->
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
					<li><a href="#">CERRAR SESIÓN</a></li>
					<li><a href="#">REGISTRARME</a></li>
					<li><a href="#" class="btn btn-light">Comenzar</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-xs-12">
				
			</div>
			<div class="col-lg-9 col-md-9 col-xs-12">
				<div class="row">
					<div class="col-lg-11 col-md-11 col-xs-12">
						<div class="row">
							<form>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-xs-12">
										<div class="form-group">
											<label for="global">Seleccionar Encuesta Global</label>
											<select class="form-control" id="global" name="global">
												<option value="">--Selecciona Encuesta--</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-xs-12">
										<div class="form-group">
											<label for="sede">Sede</label>
											<input type="sede" class="form-control" id="sede" name="sede" placeholder="Ingrese sede">
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-xs-12">
										<div class="form-group">
											<label for="global">Marca</label>
											<select class="form-control" id="marca" name="marca">
												<option value="">--Marca--</option>
											</select>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-xs-12">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>