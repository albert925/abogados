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
		$idR=$_POST['idfntCc'];
		$a=$_POST['titnt'];
		$b=$_POST['tpnt'];
		$c=$_POST['resnt'];
		$d=$_POST['txtnt'];
		if ($idR=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id no ticia no disponible');";
				echo "var pagina='../noticias';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$modificar="UPDATE noticias set tit_nt='$a',tp_id=$b,res_nt='$c',tx_nt='$d' where id_nt=$idR";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('Noticia modificada');";
				echo "var pagina='modifnoticia.php?nt=$idR';";
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