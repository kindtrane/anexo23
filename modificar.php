<?php

		
	session_start(); 

  $nombreuser= $_SESSION['usuario'];

	$db_host="localhost";
	$db_user="root";
	$password="123";
	$db_name="anexobd";
	$db_table_name="inmuebles";
	$db_table_name2="modificacion";

	$db_connection = mysql_connect($db_host, $db_user, $password);

	if (!$db_connection) {
		die('No se ha podido conectar a la base de datos');
	}
	$subs_nii = utf8_decode($_POST['nii']);
	$subs_ubicacion = utf8_decode($_POST['ubicacion']);
	$subs_vialidad = utf8_decode($_POST['vialidad']);
	$subs_calle = utf8_decode($_POST['calle']);
	$subs_numExt = utf8_decode($_POST['numExt']);
	$subs_asentamiento = utf8_decode($_POST['asentamiento']);
	$subs_colonia = utf8_decode($_POST['colonia']);
	$subs_cp = utf8_decode($_POST['cp']);
	$subs_referencia = utf8_decode($_POST['referencia']);
	$subs_localidad = utf8_decode($_POST['localidad']);
	$subs_delegacion = utf8_decode($_POST['delegacion']);
	$subs_entidad = utf8_decode($_POST['entidad']);

	mysql_select_db($db_name, $db_connection);
	$resultado = mysql_query("SELECT * FROM ".$db_table_name." WHERE '".$subs_nii."'", $db_connection);
	$numero_filas = mysql_num_rows($resultado);
	$numero_filas = (int) $numero_filas;


	if ($numero_filas < 1)
	{

	header('Location: Fail.html');

	} else {


		$insert_value2 = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name2.'` (`inmueble` , `usuario`, `fecha`, `hora`) VALUES ("' . $subs_nii . '", "' . $nombreuser . '", NOW(), CURTIME())';


			mysql_select_db($db_name, $db_connection);
			$retry_value2 = mysql_query($insert_value2, $db_connection);


		$insert_value = "UPDATE inmuebles SET ubicacion='$subs_ubicacion', vialidad='$subs_vialidad', 
		calle='$subs_calle', numExt='$subs_numExt', asentamiento='$subs_asentamiento', colonia='$subs_colonia', 
		cp='$subs_cp', referencia='$subs_referencia', localidad='$subs_localidad', delegacion='$subs_delegacion', 
		entidad='$subs_entidad' WHERE nii = '$subs_nii'";

		mysql_select_db($db_name, $db_connection);
		$retry_value = mysql_query($insert_value, $db_connection);

		if (!$retry_value) {
	   	die('Error: ' . mysql_error());
		}
		
		header('Location: Success.html');
	}

	mysql_close($db_connection);
?>