@extends('layouts.menu')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<br><br><br><br><br><br>
				<div class="row">
					<div class="col-xs-12 col-md-7 col-lg-7">
						<div style="font-size: 72px;">Hello Survey</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12 col-md-7 col-lg-7">
						<h4>Herramienta estratégica para medir el impacto de los mensajes ante los usuarios</h4>
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