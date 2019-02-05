<?php
$db_host="localhost";
$db_user="root";
$password="123";
$db_name="anexobd";
$db_table_name="inmuebles";
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
$resultado=mysql_query("SELECT * FROM ".$db_table_name." WHERE nii = '".$subs_nii."'", $db_connection);
$numero_filas = mysql_num_rows($resultado);
	$numero_filas = (int) $numero_filas;

if ($numero_filas>0)
{

header('Location: registrofallido.html');

} else {
	
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`nii` , `ubicacion` , `vialidad`, `calle`, `numExt`, `asentamiento`, `colonia`, `cp`, 
	`referencia`, `localidad`, `delegacion`, `entidad`) VALUES ("' . $subs_nii . '", "' . $subs_ubicacion . '", "' . $subs_vialidad . '", "' . $subs_calle . '", 
	"' . $subs_numExt . '", "' . $subs_asentamiento . '", "' . $subs_colonia . '", "' . $subs_cp . '", "' . $subs_referencia . '", "' . $subs_localidad . '", 
	"' . $subs_delegacion . '", "' . $subs_entidad . '")';

mysql_select_db($db_name, $db_connection);
$retry_value = mysql_query($insert_value, $db_connection);

if (!$retry_value) {
   die('Error: ' . mysql_error());
}
	
header('Location: Success.html');

}

mysql_close($db_connection);

		
?>