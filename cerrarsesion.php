<?php
	session_start(); 
	$_SESSION=array(); 
	session_destroy(); 
	//lo redirecciono a la página anterior  
	header("location:index.php");
?>