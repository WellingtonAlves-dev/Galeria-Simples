<?php
require_once("php/Model/Catalogo.php");

$catalogo = new Catalogo(HOST, USER, PASS, DBNAME);

// print_r($catalogo->getItems());
$items = $catalogo->getItems();
?>
<a href="admin.html">Admin</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo virtual(Projeto para Portfolio)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="jumbotron jumbotron-fluid text-light">
        <div class="container">
          <h1 class="display-4">Galeria Online</h1>
          <p class="lead">Sistema de galeria simples criado em PHP.</p>
          <p class="lead">Foi Utilizado Bootstrap + php puro.</p>
        </div>
      </div>

    <div class='container'>
        <div class='row d-flex justify-content-center'>
          <?php

            foreach($items as $item) {
              echo "<div class='col-sx-5 m-2'>";
                echo '<div class="card" style="width: 18rem;">';
                echo '<img src="'.$item['pic'].'" style="height:200px;" class="card-img-top" alt="..."/>';
                echo '<div class="card-body">';

                  echo '<h5 class="card-title">'.$item['title'].'</h5>';
                  echo '<p class="card-text">'.$item['description'].'</p>';
                echo '</div>';
              echo "</div>";
              echo "</div>";
            }

          ?>
        </div>
    </div>
</body>
</html>