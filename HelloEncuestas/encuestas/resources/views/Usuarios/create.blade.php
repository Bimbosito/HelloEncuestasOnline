@extends('Home.template.main')
@section('title','Crear usuario')

@section('content')

      

{!! Form::open(['action' => 'UsuariosController@store' ,'method'=>'POST','files'=>true]) !!}

<div class="form-group">
	{!! Form::label('nombre','Nombre') !!}
	{!! Form::text('nombre',null,['class'=>'form-control' , 'placeholder' => 'Nombre completo','required' => 'required']) !!}

</div>


<div class="form-group">
	{!! Form::label('email','Correo electronico') !!}
	{!! Form::email('email',null,['class'=>'form-control' , 'placeholder' => 'example@gmail.com','required' => 'required']) !!}

</div>


<div class="form-group">
	{!! Form::label('password','Contraseña') !!}
	{!! Form::password('password',['class'=>'form-control' , 'placeholder' => '***********','required' => 'required']) !!}

</div>

<div class="form-group">
	{!! Form::label('empresa','Empresa') !!}
	{!! Form::text('empresa',null,['class'=>'form-control' , 'placeholder' => 'Empresa','required' => 'required']) !!}

</div>


<div class="form-group">
	{!! Form::label('image','Logo') !!}
	{!! Form::file('image', array('class' => 'form-control')) !!}

</div>
 

<div class="form-group">
	{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
	
</div>

{!! Form::close() !!}



@endsection