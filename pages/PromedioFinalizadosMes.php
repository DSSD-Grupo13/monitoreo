<?php
namespace Monitor;
require '../includes/config.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
  <?php
  $cases = Cases::getArchivedCases()['data'];
  $total = count($cases) + Cases::getCountCases();
  $aprobados = 0;
  foreach ($cases as $case) {
    $inicio = new \DateTime($case->start);
    $fin = new \DateTime($case->end_date);
    $diff = $fin->diff($inicio);
    if ($diff->d <= 30) {
      $aprobados++;
    }

    $rechazados = $total - $aprobados;
    $promedio = $aprobados / $total;
  }
  ?>
  </body>

  <div id="container" style="width:100%; height:400px;"></div>
  <div> <center> Promedio: <?php echo round($promedio * 100, 2) ?> % </center> </div>

  <script>
  $(function () {
    var myChart = Highcharts.chart('container', {
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
        data: [{name:'Aprobados',y: <?php echo $aprobados ?>}, {name:'Rechazados', y: <?php echo $rechazados ?>}]
      }]
  });
});
</script>
</html>