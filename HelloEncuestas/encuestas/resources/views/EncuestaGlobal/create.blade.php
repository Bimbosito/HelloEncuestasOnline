@extends('layouts.menu')
@section('content')	
<meta name="csrf-token" content="{{ csrf_token() }}">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-xs-3">
				
			</div>
			<div class="col-lg-9 col-md-9 col-xs-9">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
	<form enctype="multipart/form-data" id="formulario" action="javascript:guardarglobal();" method="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="row">
									<div class="col-xs-12">
										<div class="alert alert-default" role="alert">
											<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
											<span class="sr-only">Error:</span>
											Tu cuenta es básica, solo podrás generar una encuesta. ¿No tienes cuenta <strong>Premium</strong> o <strong>Empresarial</strong>? <a href="#">Click aquí para comprar</a>.
										</div>
									</div>
									<div class="col-xs-12">
										<div class="alert alert-danger" role="alert">
											<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
											<span class="sr-only">Error:</span>
											Los campos marcados con (*) son campos obligatorios
										</div>
									</div>
								</div>
				<!--				<div class="row">
									<div class="col-lg-3 col-md-3 col-xs-12">
										<div class="form-group">
											<label for="global">Seleccionar Encuesta Global:</label>
											<select class="form-control" id="global" name="global">
												<option value="">--Selecciona Encuesta--</option>
											</select>
										</div>
									</div>-->
								</div>
								<br>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-xs-12">
										<div class="form-group">
											<label for="sede">Sede:</label>
											<input type="text" class="form-control" id="sede" name="sede" placeholder="Ingrese sede">
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-xs-12">
										<div class="form-group">
											<label for="eventos">Eventos:</label>
											<input type="text" class="form-control" id="eventos" name="eventos" placeholder="Ingrese eventos">
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-xs-12">
										<div class="form-group">
											<label for="global">Marca:</label>
											<select class="form-control" id="marca" name="marca">
												<option value="">--Marca--</option>
												@foreach($marcas as $m)
												<option value="{{$m->id_mar}}">{{$m->nombre}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<br><br>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<div class="form-group">
											<input type="radio" id="tipopu" name="abierto" value="1" checked> <label><strong>Pública</strong></label>
										</div>
									
										<div class="form-group">
											<input type="radio" id="tipopr" name="abierto" value="0"> <label><strong>Privada</strong></label>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="panel panel-default">
											<div class="panel-footer">
												<p>
													Las encuestas públicas pueden ser contestadad 'n' cantidad de veces con el mismo correo, la privada solo puede ser contestada con el mismo correo 1 vez.
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<h3><strong>Nueva Encuesta</strong></h3>
										<br><br>
										<div class="row">
											<div class="col-lg-6 col-md-6 col-xs-12">
												<div class="form-group">
													<label for="nombre">Nombre de la encuesta:</label><span style="color: red; font-size: 14px;">*</span>
													<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre de la Encuesta" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-3 col-md-3 col-xs-12">
												<div class="form-group">
													<label for="inicio">Fecha de inicio:</label><span style="color: red; font-size: 14px;">*</span>
													<input type="text" class="form-control fecha" id="inicio" name="inicio" placeholder="Inicia el día...">
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-xs-12">
												<div class="form-group">
													<label for="fin">Fecha de Fin:</label><span style="color: red; font-size: 14px;">*</span>
													<input type="text" class="form-control fecha" id="fin" name="fin" placeholder="Termina el día...">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-xs-12">
												<h3><strong>Registro</strong></h3>
											</div>
											<br>
											<div class="col-lg-3 col-md-3 col-xs-12">
												<input type="checkbox" id="registro" checked data-toggle="toggle">
											</div>
										</div>
										<br>
										<div id="contenido">
											<div class="row">
												<br>
												<div class="col-xs-5"><input type="text" class="form-control" id="dato1" name="dato1" placeholder="Agrega Campo para Registro" required></div>
												<div class="col-xs-1"><button type="button" class="btn btn-success" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="agregarRegistro();"><center><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></center></button></div>
											</div>
										</div>
										<input type="hidden" id="cuantosR" name="cuantosR" value="1">
										<input type="hidden" id="cuantosP" name="cuantosP" value="1">
										<input type="hidden" id="cuantosO" name="cuantosO" value="1">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<h3><strong>Selecciona tus preguntas</strong></h3>
										<br><br>
										<div class="row">
											<div class="col-lg-6 col-md-6 col-xs-12">
												<div class="form-group">
													<label for="tipoPre">Tipo de pregunta:</label>
													<select class="form-control" id="tipoPre" name="tipoPre">
														<option value="">--Tipo de pregunta--</option>
														<option value="1">Respuesta Larga</option>
														<option value="2">Respuesta Corta</option>
														<option value="3">Opción Múltiple</option>
														<option value="4">Opción Única</option>
														<option value="5">Valoración</option>
														<option value="6">Opción Múltiple con Respuesta Abierta</option>
														<option value="7">Opción Única con Respuesta Abierta</option>
													</select>
												</div>
											</div>
										</div>
										<br><br>
										<div id="preguntas">
											
										</div>
										<div class="row">
											<div class="col-lg-3 col-md-3 col-xs-12">
												<button type="button" class="btn btn-success" onclick="hacerPregunta();"><center><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Pregunta</center></button>
											</div>
										</div>
									</div>
								</div>
								<br><br><br><br>
								<div class="row">
									<div class="col-lg-4 col-md-4 col-xs-12">
										<button type="button" class="btn btn-success" data-toggle="modal" onclick="modalg();"><span class="glyphicon glyphicon-saved"></span> Guardar Encuesta</button>
									</div>
									<div class="col-lg-4 col-md-4 col-xs-12">
										<a href="javascript:window.history.back();"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</button></a>
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
													<h3><strong style="color: white">¿Desea guardar la encuesta?</strong></h3>
													<p style="color: white">
														Una vez hecha la encuesta, no se podrá modificar.
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
													<h3><strong style="color: white">Éxito</strong></h3>
													<p style="color: white">
														Tu encuesta se ha guardado exitosamente.
													</p>
												</center>
											</div>
											<div class="modal-footer">
												<div class="row">
													<div class="col-xs-6" align="left">
														<a href="{{URL::action('EncuestaGlobalController@index')}}"> <button type="button" class="btn btn-default">Cerrar</button></a>
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
													<h3 style="color: white"><strong>Error</strong></h3>
													<p style="color: white">
														Hubo un problema al guardar tu encuesta.
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
		var nextinput = 1;
		var opc = 0;
		var p = 0;
		var cadena = '<div class="row"><br>'+
						'<div class="col-xs-5"><input type="text" class="form-control" id="dato1" name="dato1" placeholder="Agrega Campo para Registro" required></div>'+
							'<div class="col-xs-1"><button type="button" class="btn btn-success" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="agregarRegistro();"><center><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></center></button></div>'+
						'</div>';

		var cadena2 = "";

		$("#registro").change(function(){
			if($(this).prop('checked')){
				//console.log('si');
				$("#contenido").append(cadena);
				nextinput++;
				$("#cuantosR").val(nextinput);
			}
			else{
				//console.log('no');
				$("#contenido").html("");
				nextinput = 1;
				$("#cuantosR").val(nextinput);
			}
		});

		function agregarRegistro() {
			nextinput++;
			cadena2 = '<div class="row" id="hola'+nextinput+'"><br>'+
						'<div class="col-xs-5"><input type="text" class="form-control" id="dato'+nextinput+'" name="dato'+nextinput+'" placeholder="Agrega Campo para Registro"></div>'+
							'<div class="col-xs-1"><button type="button" class="btn btn-success" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="agregarRegistro();"><center><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></center></button></div>'+
							'<div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarRegistro('+nextinput+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div>'+
						'</div>';

			$("#contenido").append(cadena2);
			$("#cuantosR").val(nextinput);
		}

		function borrarRegistro(num) {
			document.getElementById('contenido').removeChild(document.getElementById('hola'+num));
		}

		function hacerPregunta(){

			p++;
			var tipo = $('#tipoPre').val();
			var pregunta = '<div class="row" id="preg'+p+'">'+
								'<div class="col-xs-12">'+
									'<div class="form-group"><div class="col-xs-11" style="padding: 0;">'+
										'<input type="text" class="form-control" id="pregunta'+p+'" name="pregunta'+p+'" placeholder="¿Qué deséas preguntar? No olvides signos de puntuación ni ortografía."></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarPregunta('+p+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div></div><br>';

			pregunta += '<input type="checkbox" id="obli'+p+'" name="obli'+p+'" value="1"> <label><strong>Esta pregunta es obligatoria de responder.</strong></label><br>';
									
			switch(tipo){
				case "1":
					//alert("Es abierta o cerrada")
					
					pregunta += '<input type="hidden" id="tip'+p+'" name="tip'+p+'" value="'+tipo+'">';
					break;

				case "2":
					//alert("Es abierta o cerrada")
					
					pregunta += '<input type="hidden" id="tip'+p+'" name="tip'+p+'" value="'+tipo+'">';
					break;

				case "3":
					//alert("Es multiple")
					opc++;
					pregunta += '<div class="row" id="mul'+p+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+p+opc+'" name ="opcion'+p+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+p+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div><br></div>';
					opc++;
					pregunta += '<div class="row" id="mul'+p+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+p+opc+'" name ="opcion'+p+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+p+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div><br></div>';
					
					pregunta += '<div id="opi'+p+'"></div>';
					pregunta += '<button type="button" class="btn btn-link" onclick="agregarOpcion('+p+', '+opc+');"><center><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Opción</center></button>'
					pregunta += '<input type="hidden" id="tip'+p+'" name="tip'+p+'" value="'+tipo+'">';
					break;

				case "4":
					//alert("Es multiple")
					opc++;
					pregunta += '<div class="row" id="mul'+p+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+p+opc+'" name ="opcion'+p+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+p+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div><br></div>';
					opc++;
					pregunta += '<div class="row" id="mul'+p+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+p+opc+'" name ="opcion'+p+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+p+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div><br></div>';
					
					pregunta += '<div id="opi'+p+'"></div>';
					pregunta += '<button type="button" class="btn btn-link" onclick="agregarOpcion('+p+', '+opc+');"><center><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Opción</center></button>'
					pregunta += '<input type="hidden" id="tip'+p+'" name="tip'+p+'" value="'+tipo+'">';
					break;

				case "6":
					//alert("Es multiple")
					opc++;
					pregunta += '<div class="row" id="mul'+p+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+p+opc+'" name ="opcion'+p+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+p+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div></div>';
					opc++;
					pregunta += '<div class="row" id="mul'+p+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+p+opc+'" name ="opcion'+p+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+p+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div></div>';
					
					pregunta += '<div id="opi'+p+'"></div>';
					pregunta += '<button type="button" class="btn btn-link" onclick="agregarOpcion('+p+', '+opc+');"><center><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Opción</center></button>'
					pregunta += '<input type="hidden" id="tip'+p+'" name="tip'+p+'" value="'+tipo+'">';
					break;

				case "7":
					//alert("Es multiple")
					opc++;
					pregunta += '<div class="row" id="mul'+p+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+p+opc+'" name ="opcion'+p+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+p+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div></div>';
					opc++;
					pregunta += '<div class="row" id="mul'+p+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+p+opc+'" name ="opcion'+p+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+p+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div></div>';
					
					pregunta += '<div id="opi'+p+'"></div>';
					pregunta += '<button type="button" class="btn btn-link" onclick="agregarOpcion('+p+', '+opc+');"><center><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Opción</center></button>'
					pregunta += '<input type="hidden" id="tip'+p+'" name="tip'+p+'" value="'+tipo+'">';
					break;

				case "5":
					
					pregunta += '<input type="hidden" id="tip'+p+'" name="tip'+p+'" value="'+tipo+'">';
					break;

				default:
					pregunta = "";
					p--;
			}

			pregunta += '</div>'+
								'</div>'+
							'<br><br></div>';

			$("#cuantosP").val(p);
			$("#cuantosO").val(opc);
			$("#preguntas").append(pregunta);
		}

		function agregarOpcion(pe, op) {
			opc++;
			var sen = '<div class="row" id="mul'+pe+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+pe+opc+'" name ="opcion'+pe+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+pe+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div><br></div>';
			
			$("#cuantosO").val(opc);
			$("#opi"+pe).append(sen);
		}

		function borrarOpcion(pe, op) {
			document.getElementById('opi'+pe).removeChild(document.getElementById('mul'+pe+op));
		}

		function borrarPregunta(pr) {
			document.getElementById("preguntas").removeChild(document.getElementById("preg"+pr));
		}

		function modalg(){
			$("#modal-guardar").modal('show');
		}

		function guardarglobal(){
			var form = new FormData(document.getElementById('formulario'));
			$.ajax({
				url: '/guardarGlobal',
				type: 'POST',
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
