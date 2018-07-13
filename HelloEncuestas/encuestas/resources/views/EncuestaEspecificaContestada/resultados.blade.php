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
<body>
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
				
			
	<div class="container" id="chart">
   <div style="center">
     <canvas id="Graf01" width="100" height="40"></canvas><br>
     <button id="downloadBtn" class="btn btn-info">Descargar PDF</button>
   </div>
   </div>
<!-- armchart options
   Export chart data to <input type="button" value="JSON" onclick="exportJSON();" />
<input type="button" value="CSV" onclick="exportCSV();" />
<input type="button" value="XLSX" onclick="exportXLSX();" />
<input type="button" value="PRINT" onclick="printChart();" />
<div id="chart1" class="chartdiv"></div><-->

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
	  pdf.text(10,10,'Grafica');
      pdf.addImage(imgData, "JPEG", 10, 20,100,50);
      pdf.save(n+"-Graf01.pdf");
    }, false);
  });
	</script>
	<!--
<script>
var chart = AmCharts.makeChart("chart1", {
  "type": "serial",
  "theme": "light",
  "autoMargins": false,
  "marginLeft": 50,
  "marginRight": 8,
  "marginTop": 30,
  "marginBottom": 26,
  "dataProvider": [{
    "country": "USA",
    "visits": 2025
  }, {
    "country": "China",
    "visits": 1882
  }, {
    "country": "Japan",
    "visits": 1809
  }, {
    "country": "Germany",
    "visits": 1322
  }, {
    "country": "UK",
    "visits": 1122
  }, {
    "country": "France",
    "visits": 1114
  }, {
    "country": "India",
    "visits": 984
  }, {
    "country": "Spain",
    "visits": 711
  }],
  "valueAxes": [{
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  }],
  "startDuration": 1,
  "graphs": [{
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20
  },
  "export": {
    "enabled": true,
    "menu": []
  }

});

/**
 * Exports and triggers download of chart data as JSON file
 */
function exportJSON() {
  chart.export.toJSON({}, function(data) {
    this.download(data, this.defaults.formats.JSON.mimeType, "amCharts.json");
  });
}

/**
 * Exports and triggers download of chart data as CSV file
 */
function exportCSV() {
  chart.export.toCSV({}, function(data) {
    this.download(data, this.defaults.formats.CSV.mimeType, "amCharts.csv");
  });
}

/**
 * Exports and triggers download of chart data as Excel file
 */
function exportXLSX() {
  chart.export.toXLSX({}, function(data) {
    this.download(data, this.defaults.formats.XLSX.mimeType, "amCharts.xlsx");
  });
}

</script>-->
@endsection