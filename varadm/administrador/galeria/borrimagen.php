<?php
	include '../../../config.php';
	session_start();
	if (isset($_SESSION['adm'])) {
		$residad=$_SESSION['adm'];
		$datadmin="SELECT * from administrador where id_adm=$residad";
		$sql_admin=mysql_query($datadmin,$conexion) or die (mysql_error());
		while ($ad=mysql_fetch_array($sql_admin)) {
			$idad=$ad['id_adm'];
			$usad=$ad['user_adm'];
			$tpad=$ad['tp_adm'];
		}
		$idR=$_GET['br'];
		if ($idR=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id de imagen no disponible')";
				echo "var pagina='../galeria';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$sacarrut="SELECT * from galery where id_gal=$idR";
			$rutdel=mysql_query($sacarrut,$conexion) or die (mysql_error());
			while ($tr=mysql_fetch_array($rutdel)) {
				$borrrut=$tr['rut_gal'];
			}
			unlink("../../../".$borrrut);
			$borrar="DELETE from galery where id_gal=$idR";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('Imagen borrado');";
				echo "var pagina='../galeria';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../../erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>