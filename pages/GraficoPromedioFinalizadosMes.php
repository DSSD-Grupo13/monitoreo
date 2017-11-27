<?php
namespace  Monitor;
require '../includes/config.php';

$casos_archivados = Cases::getArchivedCases()['data'];
$total_casos = count($casos_archivados) + Cases::getCountCases();
$finalizados = 0;
foreach ($casos_archivados as $case) {
  $inicio = new \DateTime($case->start);
  $fin = new \DateTime($case->end_date);
  $diff = $fin->diff($inicio);
  if ($diff->d <= 30)
    $finalizados++;
}

$pendientes = $total_casos - $finalizados;
$promedio = $finalizados / $total_casos;
?>

<div id = "chart_1" style="width:100%; height:400px;"> </div>
<center>
  <div> Finalizados: <?php echo $finalizados ?> </div>
  <div> Pendientes: <?php echo $pendientes ?>  </div>
  <div> Total: <?php echo $total_casos ?> </div>
  <div> Promedio: <?php echo round($promedio * 100, 2) ?> %  </div>
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
          categories: ['Finalizados, Pendientes']
      },
      series: [{
        data: [{name:'Finalizados',y: <?php echo $finalizados ?>}, {name:'Pendientes', y: <?php echo $pendientes ?>}]
      }]
  });
});
</script>
