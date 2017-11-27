<?php
$metrica_json = file_get_contents('http://api-incidentes.com/metrica-tipo-incidente');
$metrica = json_decode($metrica_json);

$mapper_categorias =  function ($element)
{
  return "'". $element->{'nombre'} . "'";
};

$categorias = array_map($mapper_categorias, $metrica);
$categorias = join(',', $categorias);

$data = [];
foreach ($metrica as &$element) {
  $data[] = [
    'name' => $element->{'nombre'},
    'y' => intval($element->{'cantidad'})
  ];
}

$data = json_encode($data);
$data = str_replace('"name"', 'name', $data);
$data = str_replace('"y"', 'y', $data);
$data = str_replace('"', "'", $data);
?>

<div id = "chart_3" style="width:100%; height:400px;"> </div>

<script>
  $(function () {
    var myChart = Highcharts.chart('chart_3', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Incidentes por tipo'
      },
      tooltip: {
        pointFormat: '<span style="color:{point.color}">\u25CF</span><b>{point.y}</b>'
      },
      xAxis: {
          categories: [ <?php echo $categorias ?>]
      },
      series: [{
        showInLegend: false,
        data: <?php echo $data ?>
      }]
  });
});
</script>

