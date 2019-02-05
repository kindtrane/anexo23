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
<?php
$server     = 'localhost'; //servidor
$username   = 'root'; //usuario de la base de datos
$password   = '123'; //password del usuario de la base de datos
$database   = 'anexobd'; //nombre de la base de datos
 
$conexion = @new mysqli($server, $username, $password, $database);

$conexion->set_charset('utf8');
 
if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarlo
{
    die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
}
 
$sql="SELECT * from inmuebles";
$result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable
 
if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobit .=" <option value='".$row['nii']."'>".$row['nii']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}

$sql="SELECT * from instancias";
$result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable
 
if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobyte="";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobyte .=" <option value='".$row['nombre']."'>".$row['nombre']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}

$conexion->close(); //cerramos la conexión
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

    <title>Registro de Oficinas</title>

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
                <li class="active"><a>Registro de Oficinas</a></li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <div>
      <form action="registrof.php" method="POST" onsubmit="return valida(this)">
      <div align="right"><?php
          $nombreuser= $_SESSION['usuario'];
          echo "<label>Usuario: $nombreuser</label>";
        ?><br>
        <label><a href="cerrarsesion.php">Cerrar sesión</a></label>
        <center><h1>Registro de Oficinas</h1></center>
      </div>

      <hr class="featurette-divider">
          <div>
            <label for="nii">NII <span><em>(requerido)</em></span></label><br>
            <select type="text" name="nii" class="form-control2" placeholder="NII" required autofocus>
              <?php echo $combobit; ?>
            </select> <br>
            
            <label for="instancia">Instancia <span><em>(requerido)</em></span></label><br>
            <select type="text" name="instancia" class="form-control" placeholder="Instancia" required>
              <?php echo $combobyte; ?>
            </select><br>

            <input type="text" name="administracion" class="form-control" placeholder="Administración (requerido)" required autofocus/><br>

            <input type="text" name="area" class="form-control" placeholder="Área"/><br>

            <input type="text" name="numInt" class="form-control" placeholder="Número Interior"/><br>

            <input class="btn btn-primary" name="submit" type="submit" value="Registrar oficina" />
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