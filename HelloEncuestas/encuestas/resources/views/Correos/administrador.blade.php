@extends('Home.template.main')
@section('title','Administrador de correos')


<script type="text/javascript">

num=0;
function crear(obj) {
  num++;

  document.getElementById("cCorreos").value = num; 
  fi = document.getElementById('fiel'); // 1
  contenedor = document.createElement('div'); // 2
  contenedor.id = 'div'+num; // 3
  fi.appendChild(contenedor); // 4
 
  ele = document.createElement('input'); // 5
  ele.type = 'email'; // 6
  ele.name = 'email'+num; // 6
  ele.required = true
  contenedor.appendChild(ele); // 7
   
  ele = document.createElement('input'); // 5
  ele.type = 'button'; // 6
  ele.value = 'Borrar'; // 8
  ele.name = 'div'+num; // 8
  ele.onclick = function () {borrar(this.name)} // 9
  contenedor.appendChild(ele); // 7
}
function borrar(obj) {
  
  fi = document.getElementById('fiel'); // 1 
  fi.removeChild(document.getElementById(obj)); // 10
}
 
</script>

@section('content')

      


<form action="{{ url('Usuarios/Enviarcorreos') }}" method="post">
	{{ csrf_field() }}
<div id="fiel">
<input type="button" value="Crear" onclick="crear(this)">
</div>
<input type="hidden" id="cCorreos" name="cCorreos" vlue = "0" />
 <button type="submit"  class="btn btn-primary">Enviar</button>
</form> 



@endsection