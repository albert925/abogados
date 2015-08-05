<?php
	include '../../../config.php';
	$idR=$_POST['fa'];
	$es=$_POST['a'];
	if ($idR=="" || $es=="0" || $es=="") {
		echo "1";
	}
	else{
		$cambiar="UPDATE casos set es_cas='$es' where id_cas=$idR";
		mysql_query($cambiar,$conexion) or die (mysql_error());
		echo "2";
	}
?>