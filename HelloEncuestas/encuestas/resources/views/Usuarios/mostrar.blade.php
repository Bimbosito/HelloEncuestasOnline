
@extends('layouts.menu')

@section('content')

<div class="container-fluid">
		<br><br><br><br><br>
		<div class="row">
			<div class="col-lg-3 col-md-3 col-xs-3">
				
			</div>
			<div class="col-lg-9 col-md-9 col-xs-9">
  
				<div class="form-group">
					<label >Nombre: {{ $user->nombre }}</label>

				</div>


				<div class="form-group">

					<label >Correo Electronico: {{ $user->email }}</label>
				</div>



				<div class="form-group">
					<label >Empresa: {{ $user->empresa }}</label>
					
				</div>

				<a href="{{ route('Usuarios.edit') }}" class="btn btn-warning">Editar</a>
			</div>
		</div>
	</div>


@endsection