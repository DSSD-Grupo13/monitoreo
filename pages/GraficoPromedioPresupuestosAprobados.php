<?php
$metricas_json = file_get_contents('http://api-incidentes.com/metricas-presupuestos');
$metricas = json_decode($metricas_json);
$aprobados = $metricas->{'cantidad_aprobados'};
$rechazados = $metricas->{'cantidad_rechazados'};
$total = $metricas->{'total'};
$promedio = $aprobados / $total;
?>

<div id = "chart_2" style="width:100%; height:400px;"> </div>
<center>
  <div> Aprobados: <?php echo $aprobados ?> </div>
  <div> Rechazados: <?php echo $rechazados ?>  </div>
  <div> Total: <?php echo $total ?> </div>
  <div> Promedio: <?php echo round($promedio * 100, 2) ?> %  </div>
</center>

<script>
  $(function () {
    var myChart = Highcharts.chart('chart_2', {
      chart: {
          type: 'pie'
      },
      title: {
          text: 'Incidentes con presupuestos aprobados'
      },
      tooltip: {
        pointFormat: '<b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
      xAxis: {
          categories: ['Aprobados, Rechazados']
      },
      series: [{
        showInLegend: false,
        data: [{name:'Aprobados',y: <?php echo $aprobados ?>}, {name:'Rechazados', y: <?php echo $rechazados ?>}]
      }]
  });
});
</script>