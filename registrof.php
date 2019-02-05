<?php
$db_host="localhost";
$db_user="root";
$password="123";
$db_name="anexobd";
$db_table_name="oficinas";
   $db_connection = mysql_connect($db_host, $db_user, $password);

if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}
$subs_nii = utf8_decode($_POST['nii']);
$subs_instancia = utf8_decode($_POST['instancia']);
$subs_administracion = utf8_decode($_POST['administracion']);
$subs_area = utf8_decode($_POST['area']);
$subs_numInt = utf8_decode($_POST['numInt']);

mysql_select_db($db_name, $db_connection);
$resultado=mysql_query("SELECT * FROM ".$db_table_name." WHERE area = '".$subs_area."' AND instancia = '".$subs_instancia."'", $db_connection);
$numero_filas = mysql_num_rows($resultado);
	$numero_filas = (int) $numero_filas;

if ($numero_filas>0)
{

header('Location: registrofallidof.html');

} else {
	
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`nii` , `instancia` , 
	`administracion`, `area`, `numInt`) VALUES ("' . $subs_nii . '",
	"' . $subs_instancia . '", "' . $subs_administracion . '", "' . $subs_area . '", 
	"' . $subs_numInt . '")';

mysql_select_db($db_name, $db_connection);
$retry_value = mysql_query($insert_value, $db_connection);

if (!$retry_value) {
   die('Error: ' . mysql_error());
}
	
header('Location: Success.html');

}

mysql_close($db_connection);

		
?>