<?php
  session_start(); 

  $nombreuser= $_SESSION['usuario'];
  if($_SESSION['estado'] == 'Autenticado') 
  { 
         // Lo dejas entrar a la pagina 
  } 
  else 
  {   
         // Usuario que no se ha logueado 
         header("location:index.php");
         exit(); 
  }  
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Menú</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<!-- NAVBAR
================================================== -->
  <body>

  <footer><span><center><img src="./img/Imagen1.png" class="img-responsive"/></center></span></footer>

    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand">Menú</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            </div>
          </div>
        </nav>

      </div>
    </div>



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <div align="right"><?php
        $nombreuser= $_SESSION['usuario'];
        echo "<label>Usuario: $nombreuser</label>";
      ?><br>
      <label><a href="cerrarsesion.php">Cerrar sesión</a></label>
      <center><h2>Bienvenido</h1></center>
    </div>

      <hr class="featurette-divider">

      <div class="row" align="center">
        <div class="col-lg-4">
          <center><h3>Consultar Oficinas</h2></center>
          <center><a href="consultaoficinas.php"><img class="img-responsive" src="img/conof.png" alt="Generic placeholder image" width="172"></a></center>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <center><h3>Registrar Oficina</h2></center>
          <center><a href="registroficina.php"><img class="img-responsive" src="img/agrof.png" alt="Generic placeholder image" width="172"></a></center>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <center><h3>Modificar Oficina</h2></center>
          <center><a href="registroficina.php"><img class="img-responsive" src="img/modof.png" alt="Generic placeholder image" width="172"></a></center>
        </div>
      </div><!-- /.row -->

      <div class="row" align="center">
        <div class="col-lg-4">
          <center><h3>Empleados por Inmueble</h2></center>
          <center><a href="consultaempleados.php"><img class="img-responsive" src="img/empin.png" alt="Generic placeholder image" width="172"></a></center>
        </div>
        <div class="col-lg-4">
          <center><h3>Registrar Inmueble</h2></center>
          <center><a href="registroinmueble.php"><img class="img-responsive" src="img/regin.png" alt="Generic placeholder image" width="172"></a></center>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <center><h3>Modificar Inmueble</h2></center>
          <center><a href="niimodificar.php"><img class="img-responsive" src="img/modin.png" alt="Generic placeholder image" width="172"></a></center>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">


    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="./js/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>