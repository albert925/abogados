<?php
	include '../../../config.php';
	$a=$_POST['a'];//nombres
	$b=$_POST['b'];//cc
	$c=$_POST['c'];//correo
	$d=$_POST['d'];//tel
	$e=$_POST['e'];//mov
	$f=$_POST['f'];//dire
	$hoy=date("Y-m-d");
	if ($a=="" || $b=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from usuarios where cc_us='$b'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numexiste=mysql_num_rows($sql_existe);
		if ($numexiste>0) {
			echo "2";
		}
		else{
			if ($c=="") {
				$ingresar="INSERT into usuarios(cc_us,nom_ap_us,tel_us,mov_us,direc_us,tp_us,estd_us,fecr_us) 
					values('$b','$a','$d','$e','$f','1','1','$hoy')";
				mysql_query($ingresar,$conexion) or die (mysql_error());
				echo "3";
			}
			else{
				$correxst="SELECT * from usuarios where cor_us='$c'";
				$sql_correxs=mysql_query($correxst,$conexion) or die (mysql_error());
				$numcorreo=mysql_num_rows($sql_correxs);
				if ($numcorreo>0) {
					echo "4";
				}
				else{
					$ingresar="INSERT into usuarios(cc_us,nom_ap_us,cor_us,tel_us,mov_us,direc_us,tp_us,estd_us,fecr_us) 
						values('$b','$a','$c','$d','$e','$f','1','1','$hoy')";
					mysql_query($ingresar,$conexion) or die (mysql_error());
					echo "3";
				}
			}
		}
	}
?>