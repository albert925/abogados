<?php
	include '../../../config.php';
	$idR=$_POST['fad'];
	$a=$_POST['a'];//usuario id
	$b=$_POST['b'];//titulo
	$c=$_POST['c'];//estado
	$d=$_POST['d'];//texto
	$hoy=date("Y-m-d");
	if ($idR=="" || $a=="0" || $a=="" || $b=="" || $c=="0" || $c=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE casos set us_id='$a',tit_cas='$b',text_cas='$d',es_cas='$c' where id_cas=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>