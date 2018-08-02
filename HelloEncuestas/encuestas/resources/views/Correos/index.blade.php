@extends('layouts.menu')
@section('content')
<style>
.modal-header{     
    min-height: 1px;
    padding: 0px;
    margin: 0px 0;
    margin-left: 0px auto;
    margin-right: 0px auto;
    margin-top: 0px auto;
    margin-bottom: 0px auto;
    border: none;
    border-style: none;

}

.modal-body {
    min-height: 1px;
    padding: 0px;
    margin: 0px 0;
    margin-left: 0px auto;
    margin-right: 0px auto;
    margin-top: 0px auto;
    margin-bottom: 0px auto;

    border: none;
    border-style: none;

}
.modal-backdrop {
     border-style: none;

</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-xs-3">

		</div>
		<div class="col-lg-9 col-md-9 col-xs-9">
			<div class="row">
				<center><h2> Administrador de Correos</h2></center>	
				<br><br><br>
				<div class="col-xs-10 col-md-10 col-lg-10">
				<div class="col-xs-12 col-md-1 col-lg-1">
					<div class="row">
						<div class="col-lg-7 col-md-7 col-xs-12"></div>
						<div class="col-lg-2 col-md-2 col-xs-12" align="right">
							<a href="#" data-toggle="modal" data-target="#agregarlista"><button type="button" class="btn btn-info"><span style="align-content: right;" class="glyphicon glyphicon-tasks glyphicon "></span> Agregar Lista</button></a>
							</div><br><br><br>
					</div>
					
					</div><br>
					<br><br><div class="col-xs-10 col-md-10 col-lg-10">
						<h3>Listas de Correo</h3><br>
						<table class="table table-hover" id="correo" cellspacing="0" width="110%">
							<thead>
								<tr>
									<th>No.</th>
									<th>Titulo de la lista</th>
									<th>Fecha de creación</th>
									<th>Ultima Fecha de Modificacion</th>
									<th> </th>
									
								</tr>
							</thead>
							<tbody>
								<!--	Foreach para correo-->
								@foreach($listacorreo as $lc)
								<tr>
								<td>{{$lc->id_lis}}</td>
								<td>{{$lc->nombre}}</td>
								<td>{{$lc->created_at}}</td>
								<td>{{$lc->updated_at}}</td>

								<td>
									
									
								<a href="{{ URL::action('CorreoController@editlista', $lc->id_lis) }}" title="Editar Lista"><span class="glyphicon  glyphicon-pencil"></span></a>&nbsp;&nbsp;
							</td>
							<td>
							<a href="{{URL::action('CorreoController@destroy', $lc->id_lis)}}" title="Eliminar Lista"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;&nbsp;
								</td>
								</tr>
								@endforeach
								<!-- endforeach-->
							</tbody>
						</table>
					</div>
					</div>
					<div class="col-xs-10 col-md-10 col-lg-10">
					<div class="col-lg-9 col-md-9 col-xs-9">
						<div class="row">
							<div class="col-lg-7 col-md-7 col-xs-12"></div>
						<div class="col-lg-2 col-md-2 col-xs-12" align="right">
								<a href="#" data-toggle="modal" data-target="#agregarcorreo"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-tasks glyphicon "></span> Agregar Correo</button></a>
							</div><br><br><br>
						</div>
						</div>
						<br><br><div class="col-xs-12 col-md-12 col-lg-12">
						<h3>Detalle de Lista "Clientes"</h3><br>
						<table class="table table-hover" id="correoCli" cellspacing="0" width="110%">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nombre</th>
									<th>Correo Electronico</th>
									<th>Telefono</th>
									<th>Direccion</th>
									<th>Empresa</th>
									<th> </th>
									<th> </th>
								</tr>
							</thead>
							<tbody>
								<!--	Foreach para correo-->
								<tr>
								<td>123</td>
								<td>Hello</td>
								<td>helloteam</td>
								<td>1546546465</td>
								<td>Valladolid 456445</td>
								<th>HelloMexico</th>
								<td>
								<a href="#" title="Editar Lista"><span class="glyphicon  glyphicon-pencil"></span></a>&nbsp;&nbsp;
							</td>
							<td>
							<a href="#" title="Eliminar Lista"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;&nbsp;
								</td>
								</tr>
							</tbody>
						</table>
					</div>
					</div>
					</div>
			</div>
		</div>
	</div>
</div>
<!-------------------------------Modal De Correo------------------------------------------------->
<div class="modal fade " id="agregarcorreo" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<!-- Modal Content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Agregar Correo</h4>
			</div>
		<!-- Formulario para agregar correos dentro del modal-->
		<div class="modal-body">
		<form method="POST" action="{{URL::action('CorreoController@agregarcorreo')}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
			</div>
			<div class="form-group">
				<label for="correo" class="col-sm-4 col-form-label">Correo Electronico:</label>
				<input  type="text" id="correo" name="correo" placeholder="Correo Electronico" class="form-control">
			</div>
			<div class="form-group">
				<label for="telefono" class="col-sm-2 col-form-label">Telefono:</label>
				<input class="form-control" id="telefono" type="text" name="telefono" placeholder="Telefono">
			</div>
			<div class="form-group">
				<label for="direccion" class="col-sm-2 col-form-label">Direccion:</label>
				<input class="form-control" id="direccion" type="text" name="direccion" placeholder="Direccion">
			</div>
			<div class="form-group">
				<label for="empresa" class="col-sm-2 col-form-label">Empresa:</label>
				<input class="form-control" id="empresa" type="text" name="empresa" placeholder="Empresa">
			</div>
			<div class="">
				<label for="lcorreo" class="col-sm-6 col-form-label">Agregar a Lista</label>
				<select class="form-control" id="lcorreo" name="lcorreo">
			
					<option value="">Lista</option>
				
				</select>
			</div>
			<div class="modal-footer text-center">
				<<button type="submit" class="btn btn-succes">Guardar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</form>
	</div>
		</div>
	
	</div>
</div>
<!-------------------------------Fin Modal De Correo------------------------------------------------->

<!-------------------------------Modal De Lista------------------------------------------------->
<div class="modal fade " id="agregarlista" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<!-- Modal Content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Agregar Lista</h4>
			</div>
		<!-- Formulario para agregar correos dentro del modal-->
		<div class="modal-body">
		<form method="POST" action="{{URL::action('CorreoController@agregarlista')}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label for="alista" class="col-sm-2 col-form-label">Titulo de la Lista:</label>
				<input type="text" class="form-control" id="alista" name="alista" placeholder="Ingresa el Titulo de la Lista">
			</div>
			<div class="modal-footer text-center">
				<button type="submit" class="btn btn-succes">Guardar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</form>
	</div>
		</div>
	
	</div>
</div>
<!-------------------------------Fin Modal De Lista------------------------------------------------->
<!-------------------------------Modal De Editar De Lista Correo---------------------------------------------->

<!-------------------------------fin Modal De Editar De Lista Correo------------------------------------------->
<script type="text/javascript">
		$('.fecha').datepicker({
		    format: 'yyyy-mm-dd',
		    language: 'SP',
		    startDate: '-3d'
		});

		$('#correo').DataTable({
                         "dom": 'T<"clear">lfrtip',
                         "tableTools": {
                             "sRowSelect": "multi",
                             "aButtons": [
                                 {
                                     "sExtends": "select_none",
                                     "sButtonText": "Borrar selección"
                                 }]
                         },
                         "pagingType": "simple_numbers",
//Actualizo las etiquetas de mi tabla para mostrarlas en español
                         "language": {
                             "lengthMenu": "Mostrar _MENU_ registros por página.",
                             "zeroRecords": "No se encontró registro.",
                             "info": "  _START_ de _END_ (_TOTAL_ registros totales).",
                             "infoEmpty": "0 de 0 de 0 registros",
                             "infoFiltered": "(Encontrado de _MAX_ registros)",
                             "search": "Búsqueda: ",
                             "processing": "Procesando la información",
                             "paginate": {
                                 "first": " |< ",
                                 "previous": "Ant.",
                                 "next": "Sig.",
                                 "last": " >| "
                             }
                         }
                     });
	</script>
	<script type="text/javascript">
		$('.fecha').datepicker({
		    format: 'yyyy-mm-dd',
		    language: 'SP',
		    startDate: '-3d'
		});

		$('#correoCli').DataTable({
                         "dom": 'T<"clear">lfrtip',
                         "tableTools": {
                             "sRowSelect": "multi",
                             "aButtons": [
                                 {
                                     "sExtends": "select_none",
                                     "sButtonText": "Borrar selección"
                                 }]
                         },
                         "pagingType": "simple_numbers",
//Actualizo las etiquetas de mi tabla para mostrarlas en español
                         "language": {
                             "lengthMenu": "Mostrar _MENU_ registros por página.",
                             "zeroRecords": "No se encontró registro.",
                             "info": "  _START_ de _END_ (_TOTAL_ registros totales).",
                             "infoEmpty": "0 de 0 de 0 registros",
                             "infoFiltered": "(Encontrado de _MAX_ registros)",
                             "search": "Búsqueda: ",
                             "processing": "Procesando la información",
                             "paginate": {
                                 "first": " |< ",
                                 "previous": "Ant.",
                                 "next": "Sig.",
                                 "last": " >| "
                             }
                         }
                     });
	</script>
							
@endsection