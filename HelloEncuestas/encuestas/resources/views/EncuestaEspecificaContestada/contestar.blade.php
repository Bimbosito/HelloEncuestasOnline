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
							<form enctype="multipart/form-data" id="formulario" action="javascript:contestar();" method="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="row">
									<div class="col-xs-12">
										<h2><strong>Encuesta {{$encuesta->nombre}}</strong></h2>
										<input type="hidden" id="numEncuesta" name="numEncuesta" value="{{$encuesta->id_esp}}">
										<br><br>
										<div class="row">
											<div class="col-lg-3 col-md-3 col-xs-12">
												<div class="form-group">
													<label for="inicio">Fecha de inicio: {{$encuesta->fecha_inicio}}</label>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-xs-12">
												<div class="form-group">
													<label for="fin">Fecha de Fin: {{$encuesta->fecha_fin}}</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<h3><strong>Datos de la encuesta:</strong></h3>
									<div class="col-lg-3 col-md-3 col-xs-12">
										<div class="form-group">
											<label for="sede">Sede: {{$encuesta->sede}}</label>
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-xs-12">
										<div class="form-group">
											<label for="eventos">Evento: {{$encuesta->evento}}</label>
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-xs-12">
										<div class="form-group">
											@foreach($marcas as $m)
											@if($encuesta->marca == $m->id_mar)
											<label for="global">Marca: {{$m->nombre}}</label>
											@endif
											@endforeach
										</div>
									</div>
								</div>
								<br><br>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<div class="form-group">
											@if($encuesta->abierto = 1)
											<input type="radio" id="tipopu" name="abierto" value="1" checked> <label><strong>Pública</strong></label>
											@else
											<input type="radio" id="tipopu" name="abierto" value="1"> <label><strong>Pública</strong></label>
											@endif
										</div>
									
										<div class="form-group">
											@if($encuesta->abierto = 0)
											<input type="radio" id="tipopr" name="abierto" value="0" checked> <label><strong>Privada</strong></label>
											@else
											<input type="radio" id="tipopr" name="abierto" value="0"> <label><strong>Privada</strong></label>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<div class="row">
												<h3><strong>Registro</strong></h3>

												<h4><strong>Completa tu información de registro</strong></h4>
											<br>
										</div>
										<br>
										<div>
											@foreach($registro as $r)
											<div class="row">
												<br>
												<div class="col-xs-12 col-md-3 col-lg-3"><label for="{{$r->campo}}">{{$r->campo}}</label></div>
												<div class="col-xs-12 col-md-9 col-lg-9"><input type="text" class="form-control" id="r_{{$r->id_regesp}}" name="r_{{$r->id_regesp}}" placeholder="Ingresa tu {{$r->campo}}"><input type="hidden" id="n_{{$r->id_regesp}}" name="n_{{$r->id_regesp}}" value="{{$r->id_regesp}}"></div>
											</div>
											@endforeach
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<h3><strong>Preguntas</strong></h3>
										<div>
											@foreach($preguntas as $p)
											<div class="row">
												<div class="col-xs-12">
													<div class="form-group">
														<label for="pre{{$p->id_pesp}}">{{$p->pregunta}}</label>
														@if($p->tipo == 1)
														<textarea class="form-control" id="pre{{$p->id_pesp}}" name="pre{{$p->id_pesp}}"></textarea>
														@elseif($p->tipo == 2)
														<input type="text" class="form-control" id="pre{{$p->id_pesp}}" name="pre{{$p->id_pesp}}">
														@elseif($p->tipo == 3)
															<br>
															@foreach($opciones as $o)
															@if($o->id_pesp == $p->id_pesp)
															<input type="checkbox" id="opc{{$o->id_res}}" name="opc{{$o->id_res}}" value="{{$o->id_res}}"> <label><strong>{{$o->respuestas}}</strong></label><br>
															@endif
															@endforeach
														@elseif($p->tipo == 4)
															<br>
															@foreach($opciones as $o)
															@if($o->id_pesp == $p->id_pesp)
															<input type="radio" id="opc{{$o->id_res}}" name="opc{{$p->id_pesp}}" value="{{$o->id_res}}"> <label><strong>{{$o->respuestas}}</strong></label><br>
															@endif
															@endforeach
														@elseif($p->tipo == 5)
														@elseif($p->tipo == 6)
															<br>
															@foreach($opciones as $o)
															@if($o->id_pesp == $p->id_pesp)
															<input type="checkbox" id="opc{{$o->id_res}}" name="opc{{$o->id_res}}" value="{{$o->id_res}}"> <label><strong>{{$o->respuestas}}</strong></label><br>
															@endif
															@endforeach
															<textarea class="form-control" id="pre{{$p->id_pesp}}" name="pre{{$p->id_pesp}}"></textarea>
														@elseif($p->tipo == 7)
															<br>
															@foreach($opciones as $o)
															@if($o->id_pesp == $p->id_pesp)
															<input type="radio" id="opc{{$o->id_res}}" name="opc{{$p->id_pesp}}" value="{{$o->id_res}}"> <label><strong>{{$o->respuestas}}</strong></label><br>
															@endif
															@endforeach
															<textarea class="form-control" id="pre{{$p->id_pesp}}" name="pre{{$p->id_pesp}}"></textarea>
														@endif
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>
								<br><br><br><br>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-xs-12">
										<button type="button" class="btn btn-success" data-toggle="modal" onclick="modalg();"><span class="glyphicon glyphicon-ok"></span> Mandar Datos</button>
									</div>
									<div class="col-lg-6 col-md-6 col-xs-12">
										<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</button>
									</div>
								</div>
								<div class="modal fade" id="modal-guardar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<center>
													<img src="{{asset('assets/images/signo.png')}}">
													<h3><strong>¿Desea mandar sus respuestas de esta encuesta en este momento?</strong></h3>
													
												</center>
											</div>
											<div class="modal-footer">
												<div class="row">
													<div class="col-xs-6" align="left">
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
													</div>
													<div class="col-xs-6">
														<button type="submit" class="btn btn-warning">Mandar Datos</button>
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
														Has contestado la encuesta exitosamente.
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
														Hubo un problema al contestar la encuesta.
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
</body>
	<script type="text/javascript">
		$('.fecha').datepicker({
		    format: 'yyyy-mm-dd',
		    language: 'SP',
		    startDate: '-3d'
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
		function modalg(){
			$("#modal-guardar").modal('show');
		}

		function contestar(){
			var form = new FormData(document.getElementById('formulario'));
			$.ajax({
				url: '/guardarContestada',
				type: 'post',
				data: form,
				processData: false,
				contentType: false,
				success: function(data){
					$("#modal-guardar").modal('hide');
					$("#modal-exito").modal('show');
				},
				error: function(){
					$("#modal-guardar").modal('hide');
					$("#modal-error").modal('show');
				}
			});
		}
	</script>
@endsection