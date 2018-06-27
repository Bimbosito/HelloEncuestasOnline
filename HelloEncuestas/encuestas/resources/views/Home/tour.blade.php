@extends('layouts.sidebar')

@section('content')


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
		<!--<div class="col-sm-6 col-sm-offset-3" align="center">
	-->

		<!--
			<div class="panel panel-default">
				
				<div class="panel-body"> 
			<br>
			<br>
			</div>
		-->
		</div>
		</div>
	</center>
	</div>
	</div>
@endsection