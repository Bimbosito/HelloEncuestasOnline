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
						<h3><strong>Lista de Paquetes</strong></h3>
						<div class="row">
							<div class="col-xs-12 col-md-4 col-lg-4">
								<label>Nombre del paquete: </label>
							</div>
							<div class="col-xs-12 col-md-3 col-lg-3">
								<label>Tipo de paquete:</label>
							</div>
							<div class="col-xs-12 col-md-3 col-lg-3">
								<label>Precio del paquete:</label>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-xs-12 col-md-2 col-lg-2">
								<div class="form-group">
									<input type="text" class="form-control" id="nombre1" name="nombre1" value="">
								</div>
							</div>
							<div class="col-xs-12 col-md-2 col-lg-2">
								<div class="form-group">
									<select class="form-control" id="tipo" name="tipo">
										<option>--Seleccione Tipo--</option>
										<option>Básico</option>
										<option>Premium</option>
										<option>Empresarial</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-md-2 col-lg-2">
								<div class="form-group">
									<input type="text" class="form-control" id="precio" name="precio">
								</div>
							</div>
							<div class="col-xs-12 col-md-2 col-lg-2">
								button.
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