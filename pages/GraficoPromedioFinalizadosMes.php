<?php
namespace  Monitor;
require '../includes/config.php';

$casos_archivados = Cases::getArchivedCases()['data'];
$total_casos = count($casos_archivados) + Cases::getCountCases();
$casos_aprobados_mes_corriente = 0;
foreach ($casos_archivados as $case) {
  $inicio = new \DateTime($case->start);
  $fin = new \DateTime($case->end_date);
  $diff = $fin->diff($inicio);
  if ($diff->d <= 30)
    $casos_aprobados_mes_corriente++;
}

$casos_rechazados_mes_corriente = $total_casos - $casos_aprobados_mes_corriente;
$promedio = $casos_aprobados_mes_corriente / $total_casos;
?>

<div id = "chart_1" style="width:100%; height:400px;"> </div>
<center>
  <div>  Aprobados: <?php echo $casos_aprobados_mes_corriente ?> </div>
  <div>  Rechazados: <?php echo $casos_rechazados_mes_corriente ?>  </div>
  <div>  Total: <?php echo $total_casos ?> </div>
  <div>  Promedio: <?php echo round($promedio * 100, 2) ?> %  </div>
</center>

<script>
  $(function () {
    var myChart = Highcharts.chart('chart_1', {
      chart: {
          type: 'pie'
      },
      title: {
          text: 'Casos finalizados en el mes que inician'
      },
      xAxis: {
          categories: ['Aprobados, Rechazados']
      },
      series: [{
        data: [{name:'Aprobados',y: <?php echo $casos_aprobados_mes_corriente ?>}, {name:'Rechazados', y: <?php echo $casos_rechazados_mes_corriente ?>}]
      }]
  });
});
</script>
