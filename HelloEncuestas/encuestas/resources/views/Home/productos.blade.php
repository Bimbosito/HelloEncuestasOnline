@extends('layouts.menu')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<br><br><br><br><br><br>
				<div class="row">
					<div class="col-xs-12 col-md-12 col-lg-12">
						<div style="font-size: 48px; color: white;">La forma mas sencilla de obtener métricas confiables, al momento y sumamente detalladas.</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12">
						<h4 style="color: white;">Hello survey te ofrece lo que necesitas para medir las respuestas de tus usuarios de forma sencilla y facil de entender</h4>
					</div>
				</div>
				<br><br><br>
				<div class="row">
					<div class="col-xs-12 col-md-7 col-lg-7">
						<form action="" method="POST">
							<div class="row">
								<div class="col-xs-12 col-lg-7 col-md-7">
									<div class="form-group">
										<input type="text" class="form-control" style="height: 48px; font-size: 18px;" id="email" name="email" placeholder="nombre@mailempresa.com">
									</div>
								</div>
								<div class="col-xs-12 col-md-5 col-lg-5">
									<button type="submit" class="btn btn-lg btn-warning">Comenzar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection