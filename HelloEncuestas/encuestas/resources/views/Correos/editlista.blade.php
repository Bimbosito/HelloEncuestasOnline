@extends('layouts.menu')
@section('content')	

<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-xs-3">
				
			</div>
			<div class="col-lg-9 col-md-9 col-xs-9">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<form action="" method="POST">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="lcorreo">Asigna un Nuevo Nombre a tu Encuesta</label>
									<input type="text" name="lcorreo" class="form-control" value="{{ $listacorreo->nombre }}">
									</div>
									<button type="submit" class="btn btn-succes">Modificar</button>
									<div>

								</div>
						</div>
					</div>
				</div>
			</div>
		</div>


@endsection