<?php
	include '../../../config.php';
	$a=$_POST['a'];//usuario id
	$b=$_POST['b'];//titulo
	$c=$_POST['c'];//estado
	$d=$_POST['d'];//texto
	$hoy=date("Y-m-d");
	if ($a=="0" || $a=="" || $b=="" || $c=="0" || $c=="") {
		echo "1";
	}
	else{
		$ingresar="INSERT into casos(us_id,tit_cas,text_cas,es_cas,fe_cas) 
			values($a,'$b','$d','$c','$hoy')";
		mysql_query($ingresar,$conexion) or die (mysql_error());
		echo "2";
	}
?>