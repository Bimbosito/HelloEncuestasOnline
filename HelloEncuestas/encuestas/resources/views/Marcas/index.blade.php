@extends('layouts.menu')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-xs-3">
				
			</div>
			<div class="col-lg-9 col-md-9 col-xs-9">
				<div class="row">
					<br><br><br>
					<div class="col-xs-12 col-md-1 col-lg-1">

					</div>
					<div class="col-xs-12 col-md-10 col-lg-10">
						<h3><strong>Lista de Marcas</strong></h3>
						<table class="table table-bordered" id="tableMarca" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Nombre de la Marca</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Marca 1</td>
									<td>
										<a href="#" title="Editar Marca"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;
									</td>
									<td>
										<a href="#" title="Eliminar Marca"><span class="glyphicon glyphicon-trash"></span></a>&nbsp;&nbsp;
									</td>
								</tr>
							</tbody>
						</table>
						<br><br><br><br><br><br><br><br>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-xs-12" align="left">
								<a href="{{URL::action('EncuestaEspecificaController@create')}}"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-list"></span> Crear Encuesta</button></a>
							</div>
							<div class="col-lg-6 col-md-6 col-xs-12" align="right">
								<a href="javascript:window.history.back();"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Regresar a la página anterior</button></a>
							</div>
						</div>
						@include('Marcas.crear')
						@include('Marcas.editar')
						@include('Marcas.eliminar')
					</div>
					<div class="col-xs-12 col-md-1 col-lg-1">

					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$('#tableMarca').DataTable({
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
                             "search": "Buscar: ",
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
		function crear(){
			$("#modal-crear").modal("show");
		}

		function guardarEncuesta(){
			var form = new FormData(document.getElementById('formulario'));
			$.ajax({
				url: '/guardarEspecifica',
				type: 'post',
				data: form,
				processData: false,
				contentType: false,
				success: function(data){
					$("#modal-crear").modal("hide");
					$("#modal-exito").modal('show');
				},
				error: function(){
					$("#modal-crear").modal("hide");
					$("#modal-error").modal('show');
				}
			});
		}
	</script>
@endsection