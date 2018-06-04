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
						<div class="row">
							<div class="col-xs-12" align="right">
								<a href="{{URL::action('CampaniaController@create')}}"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i> Crear Campaña</button></a>
							</div>
						</div>
						<h3><strong>Campañas recientes</strong></h3>
						<table class="table table-bordered" id="tableMarca" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Nombre de la Campaña</th>
									<th>Fecha de Inicio</th>
									<th>Fecha de Fin</th>
									<th>Marcas dentro de la Campaña</th>
									<th>Encuestas Globales</th>
									<th>Encuestas Especificas</th>
									<th>Detalle</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Campaña 1</td>
									<td>01 de Junio de 2018</td>
									<td>15 de Junio de 2018</td>
									<td>3 marcas</td>
									<td>2</td>
									<td>5</td>
									<td>
										<a href="#" title="Ver Campaña"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;
									</td>
									<td>
										<a href="#" title="Editar Campaña"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;
									</td>
									<td>
										<a href="#" title="Eliminar Campaña"><span class="glyphicon glyphicon-trash"></span></a>&nbsp;&nbsp;
									</td>
								</tr>
							</tbody>
						</table>
						<div class="modal fade" id="modal-guardar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<center>
													<img src="{{asset('assets/images/signo.png')}}">
													<h3><strong>Eliminar campania</strong></h3>
													<p>
														¿Desea eliminar la campania?
													</p>
												</center>
											</div>
											<div class="modal-footer">
												<div class="row">
													<div class="col-xs-6" align="left">
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
													</div>
													<div class="col-xs-6">
														<button type="button" class="btn btn-warning" onclick="eliminar(1);">Guardar</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal fade" id="modal-exito" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<center>
													<img src="{{asset('assets/images/singo1.png')}}">
													<h3><strong>Éxito</strong></h3>
													<p>
														Tu campaña se ha eliminado exitosamente.
													</p>
												</center>
											</div>
											<div class="modal-footer">
												<div class="row">
													<div class="col-xs-6" align="left">
														<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal fade" id="modal-error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<center>
													<img src="{{asset('assets/images/signo2.png')}}">
													<h3><strong>Error</strong></h3>
													<p>
														Hubo un problema al eliminar tu campaña.
													</p>
												</center>
											</div>
											<div class="modal-footer">
												<div class="row">
													<div class="col-xs-6" align="left">
														<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
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

		function eliminarCampania(){
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