<?php
$metricas_json = file_get_contents('http://api-incidentes.com/metricas-presupuestos');
$metricas = json_decode($metricas_json);
?>

<div id = "chart_2" style="width:100%; height:400px;"> </div>

<script>

</script>
