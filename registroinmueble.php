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

    <title>Registro de Inmuebles</title>

    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">

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
              <a class="navbar-brand" href="menu.php">Menú</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a>Registro de Inmuebles</a></li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>

    <script type="text/javascript" src="validacion.js"></script>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

    <div>
      <form action="registro.php" method="POST" onsubmit="return valida(this)">
      <div align="right"><?php
          $nombreuser= $_SESSION['usuario'];
          echo "<label>Usuario: $nombreuser</label>";
        ?><br>
        <label><a href="cerrarsesion.php">Cerrar sesión</a></label>
        <center><h1>Registro de Inmuebles</h1></center>
      </div>

      <hr class="featurette-divider">
          <div>
            <input type="text" name="nii" class="form-control2" placeholder="NII (requerido)" minlength="9" maxlength="10" required/><br> 
            
            <input type="text" name="ubicacion" class="form-control" placeholder="Ubicación (requerido)" required/><br>

            <input type="text" name="vialidad" class="form-control" placeholder="Vialidad (requerido)" required/><br>

            <input type="text" name="calle" class="form-control" placeholder="Calle (requerido)" required/><br>

            <input type="text" name="numExt" class="form-control" placeholder="Número"/><br>

            <input type="text" name="asentamiento" class="form-control" placeholder="Asentamiento"/><br>

            <input type="text" name="colonia" class="form-control" placeholder="Colonia"/><br>

            <input type="number" name="cp" class="form-control" placeholder="Código Postal (requerido)" required/><br>

            <input type="text" name="referencia" class="form-control" placeholder="Entrecalles o referencias"/><br>

            <input type="text" name="localidad" class="form-control" placeholder="Localidad"/><br>

            <input type="text" name="delegacion" class="form-control" placeholder="Delegación o municipio (requerido)" required/><br>

            <input type="text" name="entidad" class="form-control" placeholder="Entidad (requerido)" required/><br>

            <input class="btn btn-primary" name="submit" type="submit" value="Registrar inmueble" />

          </div>
      </form>
    </div>


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