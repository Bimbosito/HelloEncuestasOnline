@extends('layouts.menu')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-xs-3">
				
			</div>
			<div class="col-lg-9 col-md-9 col-xs-9">
				<div class="row">
					<div class="col-xs-12 col-md-1 col-lg-1">

					</div>
					<div class="col-xs-12 col-md-10 col-lg-10">
						<h2><strong>Estadísticas de encuestas</strong></h2>
						<br><br>
						<div class="row">
							<div class="col-xs-12">
								<div class="alert alert-default" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="sr-only">Error:</span>
									Tu cuenta es básica, solo podrás generar una encuesta. ¿No tienes cuenta <strong>Premium</strong> o <strong>Empresarial</strong>? <a href="#">Click aquí para comprar</a>.
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-4 col-lg-4">
								<div class="form-group">
									<label for="especifica">Encuesta Especifica</label>
									<select class="form-control" id="especifica">
										<option value="">----Seleccione Encuesta Específica----</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-md-4 col-lg-4">
								<div class="form-group">
									<label for="global">Encuesta Global</label>
									<select class="form-control" id="global">
										<option value="">----Seleccione Encuesta Global----</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-md-4 col-lg-4">
								<button class="btn btn-primary" onclick="busqueda();">Buscar</button>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-3 col-lg-3">
								<div class="form-group">
									<label for="sede">Sede: </label>
									<input class="form-control" id="sede" name="sede" placeholder="Sede">
								</div>
							</div>	
							<div class="col-xs-12 col-md-3 col-lg-3">
								<div class="form-group">
									<label for="evento">Evento: </label>
									<input class="form-control" id="evento" name="evento" placeholder="Evento">
								</div>
							</div>
							<div class="col-xs-12 col-md-3 col-lg-3">
								<div class="form-group">
									<label for="marca">Marca: </label>
									<select class="form-control" id="marca" name="marca">
										<option value="">----Seleccione una marca----</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-md-3 col-lg-3">
								<div class="form-group">
									<label for="inicio">Fecha de Inicio: </label>
									<input class="form-control fecha" id="inicio" name="inicio">
								</div>
							</div>
						</div>
						<table class="table table-bordered" id="encuestas" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Encuesta</th>
									<th>Fecha de Inicio</th>
									<th>Fecha de Fin</th>
									<th>Sede</th>
									<th>Evento</th>
									<th>Marca</th>
									<th>Encuestas Respondidas</th>
									<th>Ver estadísticas</th>
								</tr>
							</thead>
							<tbody>
								@foreach($encuestas as $e)
								<tr>
									<td>{{$e->encu}}</td>
									<td>{{$e->fecha_inicio}}</td>
									<td>{{$e->fecha_fin}}</td>
									<td>{{$e->sede}}</td>
									<td>{{$e->evento}}</td>
									<td>{{$e->nombre}}</td>
									<td>{{$e->cuantos}}</td>
									<td>
										<a href="{{URL::action('EncuestaEspecificaContestadaController@edit', $e->id_esp)}}" title="Ver Encuesta"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<br><br><br><br><br><br><br><br>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-xs-12" align="right">
								<a href="javascript:window.history.back();"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Regresar a la página anterior</button></a>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-1 col-lg-1">

					</div>
				</div>
			</div>
		</div>
	</div>
</body>
	<script type="text/javascript">
		$('.fecha').datepicker({
		    format: 'yyyy-mm-dd',
		    language: 'SP',
		    startDate: '-3d'
		});

		$('#encuestas').DataTable({
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
		
        jQuery(document).ready(function () {
            $("#input-21f").rating({
                starCaptions: function (val) {
                    if (val < 3) {
                        return val;
                    } else {
                        return 'high';
                    }
                },
                starCaptionClasses: function (val) {
                    if (val < 3) {
                        return 'label label-danger';
                    } else {
                        return 'label label-success';
                    }
                },
                hoverOnClear: false
            });
            var $inp = $('#rating-input');

        });

	</script>
	<script type="text/javascript">
		function busqueda(){
			
		}
	</script>
@endsection