<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-light">
    <a class="navbar-brand">M&eacute;tricas</a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php"> Monitor </a>
      </li>
    </ul>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col"> <?php include 'GraficoPromedioFinalizadosMes.php' ?> </div>
        <div class="col"> <?php include 'GraficoPromedioPresupuestosAprobados.php' ?> </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col"> <?php include 'GraficoIncidentesPorTipo.php' ?> </div>
        <div class="col"> </div>
      </div>
    </div>
  </body>
</html>
