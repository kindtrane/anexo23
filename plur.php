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

<html> 
<body> 
  
	<?php 
		header("Content-Type: text/html; charset=ISO-8859-1");
        $db_host="localhost";
        $db_user="root";
        $password="123";
        $db_name="anexobd";
        $db_table_name="inmuebles";

		$link = mysql_connect($db_host, $db_user, $password); 
		mysql_select_db($db_name, $link); 
		
		$result = mysql_query("SELECT * FROM empleados INNER JOIN inmuebles on inmuebles.nii = empleados.nii WHERE empleados.nii='".$subs_nii."'", $link); 
		echo "<table border = '1'> \n"; 
		echo "<tr><td>Nombre</td><td>E-Mail</td></tr> \n"; 
		while ($row = mysql_fetch_row($result)){ 
		       echo "<tr><td>$row[0]</td><td>$row[1]</td></tr> \n"; 
		} 
		echo "</table> \n"; 
	?>
  
</body> 
</html> 