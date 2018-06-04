@extends('layouts.menu')
@section('content')	
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-xs-3">
				
			</div>
			<div class="col-lg-9 col-md-9 col-xs-9">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<form enctype="multipart/form-data" id="formulario" action="javascript:guardarEncuesta();" method="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="row">
									<div class="col-xs-12">
										<h3><strong>Crear Campaña</strong></h3>
										<br><br>
										<div class="row">
											<div class="col-lg-6 col-md-6 col-xs-12">
												<div class="form-group">
													<label for="nombre">Nombre de la campaña:</label><span style="color: red; font-size: 14px;">*</span>
													<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre de la Campania" required>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-xs-12">
												<div class="form-group">
													<label for="eventos">Evento:</label>
													<select class="form-control" id="enevto" name="enevto">
														<option value="">--Seleccione Evento--</option>
														@foreach($marcas as $m)
														<option value="{{$m->id_mar}}">{{$m->nombre}}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-xs-12">
												<div class="form-group">
													<label for="marca">Marca:</label>
													<select class="form-control" id="marca" name="marca">
														<option value="">--Seleccione Marca--</option>
														@foreach($marcas as $m)
														<option value="{{$m->id_mar}}">{{$m->nombre}}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								<hr style="color: #69696A;">
								<div class="row">
										<div class="col-lg-3 col-md-3 col-xs-12">
											<div class="form-group">
												<label for="sede">Sede:</label>
												<input type="text" class="form-control" id="sede" name="sede" placeholder="Ingrese sede">
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-xs-12">
											<div class="form-group">
												<label for="ciudad">Ciudad:</label>
												<input type="text" class="form-control" id="sede" name="sede" placeholder="Ingrese sede">
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-xs-12">
											<div class="form-group">
												<label for="inicio">Fecha de inicio global:</label><span style="color: red; font-size: 14px;">*</span>
												<input type="text" class="form-control fecha" id="inicioGlo" name="inicioGlo" placeholder="Inicia el día...">
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-xs-12">
											<div class="form-group">
												<label for="fin">Fecha de término global:</label><span style="color: red; font-size: 14px;">*</span>
												<input type="text" class="form-control fecha" id="finGLo" name="finGLo" placeholder="Termina el día...">
											</div>
										</div>
								</div>
								<div class="row">
										<div class="col-lg-3 col-md-3 col-xs-12">
											<div class="form-group">Inicio del evento:</label><span style="color: red; font-size: 14px;">*</span>
												<input type="text" class="form-control fecha" id="inicio" name="inicio" placeholder="Inicia el día...">
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-xs-12">
											<div class="form-group">
												<label for="fin">Fin del evento:</label><span style="color: red; font-size: 14px;">*</span>
												<input type="text" class="form-control fecha" id="fin" name="fin" placeholder="Termina el día...">
											</div>
										</div>
								</div>
								<div class="row">
										<div class="col-lg-6 col-md-6 col-xs-12">
											<div class="form-group">
												<label for="encuesta">Agregar Encuesta:</label><span style="color: red; font-size: 14px;">*</span>
												<select class="form-control" id="encuesta" name="encuesta">
													<option value="">--Selecciona Encuesta--</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-xs-12">
											<div class="form-group">&nbsp;</div>
											<div class="form-group">
												<input type="radio" id="tipopu" name="abierto" value="1" checked> <label><strong>Pública</strong></label>
												<input type="radio" id="tipopr" name="abierto" value="0"> <label><strong>Privada</strong></label>
											</div>
										</div>
								</div>
								<br><br><br><br>
								<div class="row">
									<div class="col-lg-4 col-md-4 col-xs-12">
										<button type="button" class="btn btn-success" data-toggle="modal" onclick="modalg();"><span class="glyphicon glyphicon-saved"></span> Guardar Encuesta</button>
									</div>
									<div class="col-lg-4 col-md-4 col-xs-12">
										<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</button>
									</div>
									<div class="col-lg-4 col-md-4 col-xs-12">
										<button type="reset" class="btn btn-info"><span class="glyphicon glyphicon-refresh"></span> Reiniciar Formulario</button>
									</div>
								</div>
								<div class="modal fade" id="modal-guardar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<center>
													<img src="{{asset('assets/images/signo.png')}}">
													<h3><strong>¿Desea guardar la campaña?</strong></h3>
													<p>
														Revise los datos de su campaña antes de guardarlos.
													</p>
												</center>
											</div>
											<div class="modal-footer">
												<div class="row">
													<div class="col-xs-6" align="left">
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
													</div>
													<div class="col-xs-6">
														<button type="submit" class="btn btn-warning">Guardar</button>
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
														Tu campaña se ha guardado exitosamente.
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
														Hubo un problema al guardar tu campaña.
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
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('.fecha').datepicker({
		    format: 'yyyy-mm-dd',
		    language: 'SP',
		    startDate: '-3d'
		});
	</script>
	<script type="text/javascript">
		function crear(){
			$("#modal-crear").modal("show");
		}

		function guardarCampania(){
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
