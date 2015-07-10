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
		$a=$_POST['nmbo'];
		$b=$_POST['resbo'];
		$c=$_POST['txtbo'];
		$hoy=date("Y-m-d");
		//-------------------------------------------
		$fotAcosmodT=$_FILES['imgbo']['name'];
		$tipfotA=$_FILES['imgbo']['type'];
	 	$almfotA=$_FILES['imgbo']['tmp_name'];
	 	$tamfotA=$_FILES['imgbo']['size'];
	 	$erorfotA=$_FILES['imgbo']['error'];
		//----------------------------------------
		if ($fotAcosmodT=="" || $a=="") {
			echo "<script type='text/javascript'>";
				echo "alert('Imagen no selecionado');";
				echo "var pagina='varadm/administrador/abogados/';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			if ($erorfotA>0) {
				echo "<script type='text/javascript'>";
					echo "alert('Carpeta sin permisos');";
					echo "var pagina='varadm/administrador/abogados/';";
					echo "document.location.href=pagina;";
				echo "</script>";
			}
			else{
				$maAximo = 100204000;
				if ($tamfotA<=$maAximo*1024) {
					$ruta="imagenes/abogados/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "Una imagen tiene el mismo nombre";
						echo "<script type='text/javascript'>";
							echo "alert('Una imagen tiene el mismo nombre');";
							echo "var pagina='varadm/administrador/abogados/';";
							echo "document.location.href=pagina;";
						echo "</script>";
					}
					else{
						$size=getimagesize($almfotA);
						$anchoimagen=$size[0];
						$altoimagen=$size[1];
						$anchodetermindo=150;
						$altodeterminad=150;
						if ($anchoimagen!=$anchodetermindo && $altoimagen!=$altodeterminad) {
							echo "Resolucion de imagen no permitida debe ser 150 x 150";
							echo "<script type='text/javascript'>";
								echo "alert('Resolucion de imagen no permitida debe er 150 x 150');";
								echo "var pagina='varadm/administrador/abogados/';";
								echo "document.location.href=pagina;";
							echo "</script>";
						}
						else{
							$subiendo=@move_uploaded_file($almfotA, $ruta);
							if ($subiendo) {
								$ddf="INSERT into abogad(nam_ab,avat_ab,res_ab,txt_ab) 
									values('$a','$ruta','$b','$c')";
								mysql_query($ddf,$conexion) or die (mysql_error());
								echo "<script type='text/javascript'>";
									echo "alert('Abogado ingresado');";
									echo "var pagina='varadm/administrador/abogados/';";
									echo "document.location.href=pagina;";
								echo "</script>";
							}
							else{
								echo "<script type='text/javascript'>";
									echo "alert('Carpeta sin permisos');";
									echo "var pagina='varadm/administrador/abogados/';";
									echo "document.location.href=pagina;";
								echo "</script>";
							}
						}
					}
				}
				else{
					echo "<script type='text/javascript'>";
						echo "alert('Imagen size no permitido');";
						echo "var pagina='varadm/administrador/abogados/';";
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