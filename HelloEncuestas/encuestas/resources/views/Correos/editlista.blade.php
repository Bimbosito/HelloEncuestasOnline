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
							<form enctype="multipart/form-data" action="" method="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" id="id" name="id" value="{{ $id }}">
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label for=alista> Editar Lista de Correo</label>
											<input type="text" name="alista" id="alista" placeholder="Agrega un nombre..." required value="{{$listacorreo->nombre}}">
										</div>
									</div>
								</div>
								
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


@endsection