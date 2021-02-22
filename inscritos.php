<?php
$pfj_tipo_aplicacion = $_GET['pfj_tipo_aplicacion'];
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
    <link rel="stylesheet" href="css/stile-inscritos.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css"/>

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
              <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
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
    <!-- /Barra de navegador -->

    <!-- header-->
    <div class="jumbotron">
     <h1 class="display-4 titulo">
        <?php
            if ($pfj_tipo_aplicacion =='counselor'){
                echo 'Consejeros';                
            }else {
                echo 'Jovenes';
            }
        ?>
     </h1>
    </div>
    <div class="container">
    <div class="agregar">  
          <h2> Agregar
          <?php
            if ($pfj_tipo_aplicacion =='counselor'){
                echo 'Consejeros';                
            }else {
                echo 'Jovenes';
            }
        ?>
          </h2> 
          <div>
            <a href="#">
                <img src="img\iconfinder_plus_1646001.png" alt="" border="0">
            </a>
          </div>
        </div>
        <hr>
 <table class="table" id='inscritos'>
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Sexo</th>
      <th scope="col">Fecha de Nacimiento</th>
      <th scope="col">Barrio</th>
      <th scope="col">Estaca</th>
      <th scope="col">Opciones</th>
    

    </tr>
  </thead>
  <tbody>
  <?php

    $query = "SELECT pfj_nombre, pfj_apellido, pfj_fecha_nacimiento, pfj_sexo, pfj_barrio, pfj_estaca, pfj_id FROM `pfj_participantes` where pfj_tipo_aplicacion = '$pfj_tipo_aplicacion'";

    if ($resultado = $mysqli->query($query)) {

        while($registro = $resultado->fetch_array(MYSQLI_ASSOC)) {
                $pfj_nombre                 = $registro['pfj_nombre'];
                $pfj_apellido               = $registro['pfj_apellido'];
                $pfj_fecha_nacimiento       = $registro['pfj_fecha_nacimiento'];
                $pfj_sexo                   = $registro['pfj_sexo'];
                $pfj_barrio                 = $registro['pfj_barrio'];
                $pfj_estaca                 = $registro['pfj_estaca'];
                $pfj_id                     = $registro['pfj_id'];
                
                if ($pfj_sexo =='Male'){
                    $pfj_sexo='Hombre';                
                }else {
                    $pfj_sexo='Mujer'; 
                }

                echo "<tr>";
                #echo "<th  scope='row'>$pfj_id</td>";
                echo "<td>$pfj_nombre</td>";
                echo "<td>$pfj_apellido  </td>";
                echo "<td>$pfj_sexo</td>";
                echo "<td>$pfj_fecha_nacimiento </td>";
                echo "<td>$pfj_barrio</td>";
                echo "<td>$pfj_estaca </td>";
                echo "<td><a href='#'>Eliminar</a>/<a href='#'>Perfil</a></td>";
                echo "</tr>";
        
        }
    }
    ?>
  </tbody>
</table>

    </div>
    <!-- /header-->
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!--Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#inscritos').DataTable();
        } );
    </script>
    </body>
</html>