<?php
	include 'config.php';
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
		$a=$_POST['titnt'];
		$b=$_POST['tpnt'];
		$c=$_POST['resnt'];
		$d=$_POST['txtnt'];
		$hoy=date("Y-m-d");
		//-------------------------------------------
		$fotAcosmodT=$_FILES['ntimg']['name'];
		$tipfotA=$_FILES['ntimg']['type'];
	 	$almfotA=$_FILES['ntimg']['tmp_name'];
	 	$tamfotA=$_FILES['ntimg']['size'];
	 	$erorfotA=$_FILES['ntimg']['error'];
		//----------------------------------------
		if ($fotAcosmodT=="" || $a=="" || $b=="0" || $b=="") {
			echo "<script type='text/javascript'>";
				echo "alert('Imagen no selecionado');";
				echo "var pagina='varadm/administrador/noticias/';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			if ($erorfotA>0) {
				echo "<script type='text/javascript'>";
					echo "alert('Carpeta sin permisos');";
					echo "var pagina='varadm/administrador/noticias/';";
					echo "document.location.href=pagina;";
				echo "</script>";
			}
			else{
				$maAximo = 100204000;
				if ($tamfotA<=$maAximo*1024) {
					$ruta="imagenes/noticias/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "Una imagen tiene el mismo nombre";
						echo "<script type='text/javascript'>";
							echo "alert('Una imagen tiene el mismo nombre');";
							echo "var pagina='varadm/administrador/noticias/';";
							echo "document.location.href=pagina;";
						echo "</script>";
					}
					else{
						$size=getimagesize($almfotA);
						$anchoimagen=$size[0];
						$altoimagen=$size[1];
						$anchodetermindo=330;
						$altodeterminad=270;
						if ($anchoimagen!=$anchodetermindo && $altoimagen!=$altodeterminad) {
							echo "Resolucion de imagen no permitida debe ser 330 x 270";
							echo "<script type='text/javascript'>";
								echo "alert('Resolucion de imagen no permitida debe er 330 x 270');";
								echo "var pagina='varadm/administrador/noticias/';";
								echo "document.location.href=pagina;";
							echo "</script>";
						}
						else{
							$subiendo=@move_uploaded_file($almfotA, $ruta);
							if ($subiendo) {
								$ddf="INSERT into noticias(tit_nt,tp_id,rut_nt,res_nt,tx_nt,fe_nt) 
									values('$a',$b,'$ruta','$c','$d','$hoy')";
								mysql_query($ddf,$conexion) or die (mysql_error());
								echo "<script type='text/javascript'>";
									echo "alert('Noticia ingresada');";
									echo "var pagina='varadm/administrador/noticias/';";
									echo "document.location.href=pagina;";
								echo "</script>";
							}
							else{
								echo "<script type='text/javascript'>";
									echo "alert('Carpeta sin permisos');";
									echo "var pagina='varadm/administrador/noticias/';";
									echo "document.location.href=pagina;";
								echo "</script>";
							}
						}
					}
				}
				else{
					echo "<script type='text/javascript'>";
						echo "alert('Imagen size no permitido');";
						echo "var pagina='varadm/administrador/noticias/';";
						echo "document.location.href=pagina;";
					echo "</script>";
				}
			}
		}
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../../erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>