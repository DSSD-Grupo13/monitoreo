<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

$metricas_json = file_get_contents('http://api-incidentes.com/metricas-presupuestos');
$metricas = json_decode($metricas_json);
?>

