<?php

$mysqli = new mysqli('localhost','root','','pfj_system');

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>PFJ System</title>
  </head>
  <body>
    <!-- Barra de navegador -->
    <nav class="navbar navbar-light bg-light">
      <div class="container">  
        <a class="navbar-brand" href="index.php">
            <img src="img/Grupo 56.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            System
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Inicio </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="inscritos.php?pfj_tipo_aplicacion=counselor">Consejero</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="inscritos.php?pfj_tipo_aplicacion=participant">Jovenes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Enfermeria</a>
            </li>
            <li class="nav-item">
              <p>USUARIO  "ADMIN"</p>
            </li>
            <li class="nav-item">
              <button type="button" class="btn btn-danger">Cerrar Sesión</button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--inscripciones -->
    <div class="inscripciones " >
      <h2 class="display-4 inscripciones-texto" >INSCRIPCIONES</h2>
      <hr class="my-4">
      <div class="container caja">
        
        <div class="consejero">
          <a href="inscritos.php?pfj_tipo_aplicacion=counselor">
            <h2>Consejero</h2>
            <?php

            $query = "SELECT COUNT(pfj_sexo) FROM `pfj_participantes` WHERE pfj_tipo_aplicacion = 'counselor'" ;

            if ($resultado = $mysqli->query($query)) {

                while($registro = $resultado->fetch_array(MYSQLI_ASSOC)) {
                  $count       =  $registro['COUNT(pfj_sexo)'];    
                  
                  echo "<h3>$count</h3>";
                
                }
            }
            ?>         
          </a>
        </div>
        <div class="jovenes"> 
        <a href="inscritos.php?pfj_tipo_aplicacion=participant">
            <h2>Jovenes</h2>
            <?php

              $query = "SELECT COUNT(pfj_sexo) FROM `pfj_participantes` WHERE pfj_tipo_aplicacion = 'participant'" ;

              if ($resultado = $mysqli->query($query)) {

                  while($registro = $resultado->fetch_array(MYSQLI_ASSOC)) {
                    $count       =  $registro['COUNT(pfj_sexo)'];    
                    
                    echo "<h3>$count</h3>";
                   
                  }
              }
            ?>
          </a>
        </div>
      </div>
    </div>



   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>