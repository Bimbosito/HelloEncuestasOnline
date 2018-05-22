
@extends('Home.template.main')
@section('title','Mostrar usuario')

@section('content')


<center>
  
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




</center>

@endsection