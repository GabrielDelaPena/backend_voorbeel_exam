<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>People Counter</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="#">People Counter</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="historiek.php">Log</a>
        </li>
      </ul>
    </div>
  </nav>

  <main role="main" class="container" id="detailContent">

    <h1>Log van bezoekersaantallen</h1>

    <div id="log" class="list-group">
      <?php

      include 'Log.php';

      session_start();

     
      $inside_count = isset($_SESSION['inside_count']) ? $_SESSION['inside_count'] : 0;
      $outside_count = isset($_SESSION['outside_count']) ? $_SESSION['outside_count'] : 0;
      $total = isset($_SESSION['total']) ? $_SESSION['total'] : 0;

      if (isset($_SESSION['logs'])) {
        foreach ($_SESSION['logs'] as $log) {
          // echo $log->people . "<br>";
          // echo $log->enter . "<br>";
          // echo $log->timestamp . "<br>";
          // echo $log->location . "<br>";
          // echo "<hr>";
          $plus_minus = $log->enter == true ? "+" : "-";
          $in_out = $log->location == "inside" ? "binnen" : "buiten";
          $checked_in_out = $log->enter == true ? "Toegekomen op " . $log->timestamp : "Vertrokken op " . $log->timestamp;
          $count = $log->location == "inside" ?  $inside_count : $outside_count;
          echo "
          <div class='list-group-item list-group-item-action flex-column align-items-start'>
          <div class='d-flex w-100 justify-content-between'>
            <h5 class='mb-1'>" . $plus_minus . $log->people . " bezoekers <small>" . $in_out . "</small></h5>
            <small>" . $checked_in_out . "</small>
          </div>
          <p class='mb-1'>Totaal aantal bezoekers <small>" . $in_out . "</small>: " . $count . "</p>
        </div>
          ";
        }
      }


      echo  $total;

      ?>


    </div>
  </main>


</body>

</html>