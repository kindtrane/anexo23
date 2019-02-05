<?php
session_start();
include_once "conexion.php";

function verificar_login($user,$password,&$result) {
    $sql = "SELECT * FROM usuarios WHERE usuario = '$user' and password = '$password'";
    $rec = mysql_query($sql);
    $count = 0;

    while($row = mysql_fetch_object($rec))
    {
        $count++;
        $result = $row;
    }

    if($count == 1)
    {
        return 1;
    }

    else
    {
        return 0;
    }
}

if(!isset($_SESSION['userid']))
{
    if(isset($_POST['login']))
    {
        if(verificar_login($_POST['user'],$_POST['password'],$result) == 1)
        {
            $_SESSION['userid'] = $result->idusuario;
            $_SESSION['usuario'] = $_POST['user'];
            $_SESSION['estado'] = 'Autenticado';
            header("location:menu.php");
        }
        else
        {
            echo '<div align="center" class="error">Su usuario o contraseña es incorrecto, intente nuevamente.</div>';
        }
    }
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Inicio de Sesión</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    <footer><span><center><img src="img/Imagen1.png" class="img-responsive" alt="Imagen responsive"/></center></span></footer>
    
    <div class="container">
        <form action="" method="post" class="form-signin">
        <h2 class="form-signin-heading">Inicio de Sesión</h2>
    	<div align="center"><label class="sr-only">Usuario</label><input name="user" type="text" class="form-control" placeholder="Usuario" required autofocus></div>
    	<div align="center"><label class="sr-only">Contraseña</label><input name="password" type="password" class="form-control" placeholder="Contraseña" required></div>
    	<div align="center"><input name="login" type="submit" value="Iniciar Sesión" class="btn btn-lg btn-primary btn-block"></div>
        </form>
    </div>
    <?php
    } else {
    	echo 'Su usuario ingreso correctamente.';
    	echo '<a href="logout.php">Logout</a>';
    }
    ?>