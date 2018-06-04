@extends('layouts.menu')

@section('content')

<div class="container">
		<br><br><br><br><br>
		<div class="row">
			<div class="col-lg-3 col-md-3 col-xs-3">
				
			</div>
			<div class="col-lg-9 col-md-9 col-xs-9">
				{!! Form::open(['action' => 'UsuariosController@update' ,'method'=>'PUT']) !!}

				<div class="form-group">
					{!! Form::label('nombre','Nombre') !!}
					{!! Form::text('nombre',$user->nombre,['class'=>'form-control' , 'placeholder' => 'Nombre completo','required' => 'required']) !!}

				</div>


				<div class="form-group">
					{!! Form::label('email','Correo electronico') !!}
					{!! Form::email('email',$user->email,['class'=>'form-control' , 'placeholder' => 'example@gmail.com','required' => 'required']) !!}

				</div>


				<div class="form-group">
					{!! Form::label('empresa','Empresa') !!}
					{!! Form::text('empresa',$user->empresa,['class'=>'form-control' , 'placeholder' => 'Empresa','required' => 'required']) !!}

				</div>


				 

				<div class="form-group">
					{!! Form::submit('editar',['class'=>'btn btn-primary']) !!}
					
				</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>



@endsection