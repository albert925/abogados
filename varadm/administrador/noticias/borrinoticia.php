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
				echo "alert('id noticia no disponible');";
				echo "var pagina='../noticias';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$rutbor="SELECT * from noticias where id_nt=$idR";
			$sql_rut=mysql_query($rutbor,$conexion) or die (mysql_error());
			while ($tr=mysql_fetch_array($sql_rut)) {
				$imgbor=$tr['rut_nt'];
			}
			unlink("../../../".$imgbor);
			$borrar="DELETE from noticias where id_nt=$idR";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('Borrado');";
				echo "var pagina='../noticias';";
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