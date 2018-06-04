@extends('layouts.menu')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-xs-3">
				
			</div>
			<div class="col-lg-9 col-md-9 col-xs-9">
				<div class="row">
					<div class="col-xs-12 col-md-11 col-lg-11">
						@foreach($preguntas as $p)
						@if($p->tipo != "1" && $p->tipo != "2")
						<div class="row">
							<div class="col-xs-12">
								<label>Pregunta: {{$p->pregunta}}</label>
								<canvas id="graf{{$p->id_pesp}}"></canvas>
							</div>
						</div>
						@endif
						@endforeach
						<div class="row">
							<div class="col-xs-12">
								<label>Pregunta: Encuesta Básica</label>
								<canvas id="grafica"></canvas>
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
		var cadena = "";
		var datos = "";
		var datosSeparados = "";
		var frecuencias = [];
		$(document).ready(function(){
			@foreach($preguntas as $p)
			var respuestas{{$p->id_pesp}} = [];
			@if($p->tipo != "1" && $p->tipo != "2")
			if($("#graf{{$p->id_pesp}}")){
				cadena = ""
				@foreach($resultados as $res)
					@if($res->id_pesp == $p->id_pesp)
					cadena += "{{$res->respuesta}};";
					@endif
				@endforeach
				datos = cadena.substring(0, cadena.length - 1);
				alert(datos);
				datosSeparados = datos.split(';');
				@foreach($respuestas as $r)
				var f = 0;
				@if($r->id_pesp == $p->id_pesp)
					respuestas{{$p->id_pesp}}.push("{{$r->respuestas}}");
					for(var i = 0; i < datosSeparados.length; i++){
						if(datosSeparados[i]=={{$r->id_res}}){
							f++;
						}
					}
					frecuencias.push(f);
				@endif
				@endforeach
				var grafica = $('#graf{{$p->id_pesp}}');

				var myChart = new Chart(grafica, {
					type: 'doughnut',
					data: {
				        labels: respuestas{{$p->id_pesp}},
				        datasets: [{
				            label: '# of Votes',
				            data: frecuencias,
				            backgroundColor: [
				                'rgba(255, 99, 132, 0.2)',
				                'rgba(54, 162, 235, 0.2)',
				                'rgba(255, 206, 86, 0.2)',
				                'rgba(75, 192, 192, 0.2)',
				                'rgba(153, 102, 255, 0.2)',
				                'rgba(255, 159, 64, 0.2)'
				            ],
				            borderColor: [
				                'rgba(255, 99, 132, 1)',
				                'rgba(54, 162, 235, 1)',
				                'rgba(255, 206, 86, 1)',
				                'rgba(75, 192, 192, 1)',
				                'rgba(153, 102, 255, 1)',
				                'rgba(255, 159, 64, 1)'
				            ],
				            borderWidth: 1
				        }]
				    }
				});
			}
			@endif
			@endforeach
		});
	</script>
@endsection