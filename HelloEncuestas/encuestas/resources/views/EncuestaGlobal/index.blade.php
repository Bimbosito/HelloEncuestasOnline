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
						<table class="table table-bordered" id="encuestas" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Fecha de Inicio</th>
									<th>Fecha de Fin</th>
									<th>Sede</th>
									<th>Marca</th>
									<th>Evento</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								@foreach($encuestas as $g)
								<tr>
									<td>{{$g->nombre}}</td>
									<td>{{$g->fecha_inicio}}</td>
									<td>{{$g->fecha_fin}}</td>
									<td>{{$g->sede}}</td>
									<td>{{$g->marca}}</td>
									<td>{{$g->evento}}</td>
									<td>
										<a href="{{URL::action('EncuestaGlobalController@show', $g->id_glo)}}" title="Ver Encuesta"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;
										<a href="{{URL::action('EncuestaGlobalController@destroy', $g->id_glo)}}" title="Eliminar Encuesta"><span class="glyphicon glyphicon-trash"></span></a>&nbsp;&nbsp;
										<a href="{{URL::action('EncuestaGlobalController@edit', $g->id_glo)}}" title="Editar Encuesta"><span class="glyphicon  glyphicon-pencil"></span></a>&nbsp;&nbsp;
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<br><br><br><br><br><br><br><br>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-xs-12" align="left">
								<a href="{{URL::action('EncuestaGlobalController@create')}}"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-list"></span> Crear Encuesta</button></a>
							</div>
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
				$("cuantosR").val(nextinput);
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
					alert("Es abierta o cerrada")
					
					pregunta += '<input type="hidden" id="tip'+p+'" name="tip'+p+'" value="'+tipo+'">';
					break;

				case "2":
					alert("Es abierta o cerrada")
					
					pregunta += '<input type="hidden" id="tip'+p+'" name="tip'+p+'" value="'+tipo+'">';
					break;

				case "3":
					alert("Es multiple")
					opc++;
					pregunta += '<div class="row" id="mul'+p+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+p+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+p+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div><br></div>';
					opc++;
					pregunta += '<div class="row" id="mul'+p+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+p+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+p+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div><br></div>';
					
					pregunta += '<div id="opi'+p+'"></div>';
					pregunta += '<button type="button" class="btn btn-link" onclick="agregarOpcion('+p+', '+opc+');"><center><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Opción</center></button>'
					pregunta += '<input type="hidden" id="tip'+p+'" name="tip'+p+'" value="'+tipo+'">';
					break;

				case "4":
					alert("Es multiple")
					opc++;
					pregunta += '<div class="row" id="mul'+p+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+p+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+p+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div><br></div>';
					opc++;
					pregunta += '<div class="row" id="mul'+p+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+p+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+p+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div><br></div>';
					
					pregunta += '<div id="opi'+p+'"></div>';
					pregunta += '<button type="button" class="btn btn-link" onclick="agregarOpcion('+p+', '+opc+');"><center><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Opción</center></button>'
					pregunta += '<input type="hidden" id="tip'+p+'" name="tip'+p+'" value="'+tipo+'">';
					break;

				case "6":
					alert("Es multiple")
					opc++;
					pregunta += '<div class="row" id="mul'+p+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+p+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+p+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div></div>';
					opc++;
					pregunta += '<div class="row" id="mul'+p+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+p+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+p+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div></div>';
					
					pregunta += '<div id="opi'+p+'"></div>';
					pregunta += '<button type="button" class="btn btn-link" onclick="agregarOpcion('+p+', '+opc+');"><center><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Opción</center></button>'
					pregunta += '<input type="hidden" id="tip'+p+'" name="tip'+p+'" value="'+tipo+'">';
					break;

				case "7":
					alert("Es multiple")
					opc++;
					pregunta += '<div class="row" id="mul'+p+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+p+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+p+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div></div>';
					opc++;
					pregunta += '<div class="row" id="mul'+p+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+p+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+p+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div></div>';
					
					pregunta += '<div id="opi'+p+'"></div>';
					pregunta += '<button type="button" class="btn btn-link" onclick="agregarOpcion('+p+', '+opc+');"><center><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Opción</center></button>'
					pregunta += '<input type="hidden" id="tip'+p+'" name="tip'+p+'" value="'+tipo+'">';
					break;

				case 5:
					
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
			var sen = '<div class="row" id="mul'+pe+opc+'"><div class="col-xs-5"><input type="text" class="form-control" placeholder="Opción" type="text" id="opcion'+pe+opc+'"></div><div class="col-xs-1"><button type="button" class="btn btn-danger" style="padding: 7px; width: 30px;border-radius: 25px; font-size: 10px;" onclick="borrarOpcion('+pe+','+opc+');"><center><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></center></button></div><br></div>';
			
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

		function guardarEncuesta(){
			var form = new FormData(document.getElementById('formulario'));
			$.ajax({
				url: '/guardarEspecifica',
				type: 'post',
				data: form,
				processData: false,
				contentType: false,
				success: function(data){
					$("#modal-exito").modal('show');
				},
				error: function(){
					$("#modal-error").modal('show');
				}
			});
		}
	</script>
@endsection