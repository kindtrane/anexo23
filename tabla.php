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

    <title>Consulta de Oficinas</title>

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
              <a class="navbar-brand" href="menu.php">Men&#250</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="consultaoficinas.php">Consulta de Oficinas</a></li>
                <li class="active"><a>
                  <?php
                    header("Content-Type: text/html; charset=ISO-8859-1");
                    $subs_instancia = utf8_decode($_POST['instancia']); 
                    echo "$subs_instancia"; 
                  ?>
                </a></li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>

<meta charset="utf-8">

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

    	<div align="right">
	      	<?php
	          $nombreuser= $_SESSION['usuario'];
	          echo "<label>Usuario: $nombreuser</label>";
	        ?><br>
	        <label><a href="cerrarsesion.php">Cerrar sesi&#243n</a></label>
	        <center><h1>Consulta de Oficinas</h1></center>
    	</div>

      	<hr class="featurette-divider">
    	<div>
        <table class="table table-hover">
  			<?php 
  				header("Content-Type: text/html; charset=ISO-8859-1");
  		    $db_host="localhost";
  		    $db_user="root";
  		    $password="123";
  		    $db_name="anexobd";
  		    $db_table_name="inmuebles";

  		    $subs_instancia = utf8_decode($_POST['instancia']);

  				$link = mysql_connect($db_host, $db_user, $password); 
  				mysql_select_db($db_name, $link);
          $total = 0;

  				$result = mysql_query("SELECT * FROM inmuebles INNER JOIN oficinas on inmuebles.nii = oficinas.nii WHERE oficinas.instancia='".$subs_instancia."' ORDER BY oficinas.administracion ASC, oficinas.area ASC", $link); 
          echo "<center><h2><em>$subs_instancia</em></h2></center>";
  				while ($row = mysql_fetch_row($result)){ 
            echo "<tr><td><em><b>$row[15]</em><br>$row[16]</b><br>$row[2] $row[3] $row[4] $row[17], $row[5] $row[6], $row[8], C.P: $row[7], $row[9], $row[10], $row[11]<br></td></tr>";
            $total = $total + 1;
          }
          $total = $total - 1;
          echo "<tr><td><strong>Total:</strong> $total</td></tr>";
  				echo "</table> \n";
  			?><br>
            <center><input class="btn btn-primary"  onClick="window.location.href='./consultaempleados.php'" name="submit" type="button" value="Atr&#225s"/></center><br><br>
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