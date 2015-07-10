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
		$idR=$_POST['idfdbo'];
		$a=$_POST['nmbo'];
		$b=$_POST['resbo'];
		$c=$_POST['txtbo'];
		if ($idR=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id abogado no disponible');";
				echo "var pagina='../abogados';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$modificar="UPDATE abogad set nam_ab='$a',res_ab='$b',txt_ab='$c' where id_ab=$idR";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('Datos modificado');";
				echo "var pagina='modifabogado.php?nt=$idR';";
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