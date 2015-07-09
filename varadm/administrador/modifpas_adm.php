<?php
	include '../../config.php';
	$idR=$_POST['fb'];//id amin
	$con_actual=$_POST['b'];
	$con_nueva=$_POST['c'];
	function converpass($pass)
	{
		$salt="pneyan$/";
		$cifrado=sha1(md5($salt.$pass));
		return $cifrado;
	}
	if ($idR=="" || $con_actual=="" || $con_nueva=="") {
		echo "1";
	}
	else{
		$cif_actual=converpass($con_actual);
		$cif_nueva=converpass($con_nueva);
		$existe="SELECT * from administrador where id_adm=$idR and pass_adm='$cif_actual'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			$modificar="UPDATE administrador set pass_adm='$cif_nueva' where id_adm=$idR";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "3";
		}
		else{
			echo "2";
		}
	}
?>