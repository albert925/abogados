<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$idR=$_POST['idfnt'];
		//-------------------------------------------
		$fotAcosmodT=$_FILES['gmntf']['name'];
		$tipfotA=$_FILES['gmntf']['type'];
	 	$almfotA=$_FILES['gmntf']['tmp_name'];
	 	$tamfotA=$_FILES['gmntf']['size'];
	 	$erorfotA=$_FILES['gmntf']['error'];
		//----------------------------------------
		if ($idR=="" || $fotAcosmodT=="") {
			echo "1";
		}
		else{
			if ($erorfotA>0) {
				echo "2";
			}
			else{
				$maAximo = 100204000;
				if ($tamfotA<=$maAximo*1024) {
					$ruta="imagenes/noticias/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "Una imagen tiene el mismo nombre";
					}
					else{
						$size=getimagesize($almfotA);
						$anchoimagen=$size[0];
						$altoimagen=$size[1];
						$anchodetermindo=330;
						$altodeterminad=270;
						if ($anchoimagen!=$anchodetermindo && $altoimagen!=$altodeterminad) {
							echo "Resolucion de imagen no permitida debe ser 330 x 270";
						}
						else{
							$borruta="SELECT * from noticias where id_nt=$idR";
							$sql_rutdl=mysql_query($borruta,$conexion) or die (mysql_error());
							while ($tr=mysql_fetch_array($sql_rutdl)) {
								$rutrec=$tr['rut_nt'];
							}
							unlink($rutrec);
							$subiendo=@move_uploaded_file($almfotA, $ruta);
							if ($subiendo) {
								$ddf="UPDATE noticias set rut_nt='$ruta' where id_nt=$idR";
								mysql_query($ddf,$conexion) or die (mysql_error());
								echo "5";
							}
							else{
								echo "4";
							}
						}
					}
				}
				else{
					echo "3";
				}
			}
		}
	}
	else{
		echo "error";
	}
?>