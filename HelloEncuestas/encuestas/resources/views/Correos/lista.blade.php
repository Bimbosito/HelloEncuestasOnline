@extends('Home.template.main')
@section('title','Administrador de correos')
@section('content')

      




<form action="{{ url('Usuarios/Listacorreos') }}" method="post">
	{{ csrf_field() }}

	<select name="cLista" class="selectpicker">
	@foreach($listas as $lista)
  <option value= "{{$lista->id_lis }}" >{{ $lista->nombre }}</option>
    @endforeach

</select>

 <button type="submit"  class="btn btn-primary">Enviar</button>
</form> 


@endsection