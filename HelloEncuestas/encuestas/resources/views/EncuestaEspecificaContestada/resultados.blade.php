@extends('layouts.menu')
@section('content')

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
<script lang="javascript" src="dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="shim.min.js"></script>
<!-- after the shim is referenced, add the library -->
<script type="text/javascript" src="xlsx.full.min.js"></script>

<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.js"></script>


<style type="text/css">

#downloadBtn {
	
  cursor:pointer;
}

.chartdiv {
    width       : 800px;
    height      : 220px;
}
</style>
</head>
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
							<div class="col-xs-5">
								<label>Encuesta de Satisfaccion</label><br><br>
								<label>Pregunta: {{$p->pregunta}}</label>
								<canvas id="graf{{$p->id_pesp}}"></canvas>
							</div>
						</div>
						@endif
						@endforeach	
					<div class="col-xs-12 col-md-1 col-lg-1">
								
	
   </div>
   </div>
   <div class="container" id="chart">
   <div style="center">
     <canvas id="Graf01" width="100" height="50"></canvas><br>
     <button id="downloadBtn" class="btn btn-info">Descargar PDF</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
		var cadena = "";
		var datos = "";
		var respuestas = "";
		var datosSeparados = "";
		var downloadBtn = document.getElementById('downloadBtn');
		var canvas = document.getElementById("Graf01");
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

				var grafica = new Chart(canvas, {
					type: 'doughnut',
					data: {
				        labels: respuestas{{$p->id_pesp}},
				        datasets: [{
				            label: 'Encuesta Especifica',
				            data: frecuencias,
				            lineTension: 0,
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
	
    downloadBtn.addEventListener("click", function() {
      var d = new Date();
      var n = d.toISOString();
      // only jpeg is supported by jsPDF
      var imgData = canvas.toDataURL("image/png", 1.0);
      var pdf = new jsPDF();
      pdf.setFontSize(20);
	  pdf.text(10,10,'{{$p->pregunta}}');
      pdf.addImage(imgData, "JPEG", 2, 20,100,40);
      pdf.save(n+"-Encuesta.pdf");
    }, false);
  });
	</script>
@endsection