<?php
	$conexion=mysql_connect("localhost","root","") or die (mysql_error());
	$base_datos=mysql_select_db("abogados") or die (mysql_error());
?>