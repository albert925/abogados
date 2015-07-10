<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$idR=$_POST['idfbo'];
		//-------------------------------------------
		$fotAcosmodT=$_FILES['fgibo']['name'];
		$tipfotA=$_FILES['fgibo']['type'];
	 	$almfotA=$_FILES['fgibo']['tmp_name'];
	 	$tamfotA=$_FILES['fgibo']['size'];
	 	$erorfotA=$_FILES['fgibo']['error'];
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
					$ruta="imagenes/abogados/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "Una imagen tiene el mismo nombre";
					}
					else{
						$size=getimagesize($almfotA);
						$anchoimagen=$size[0];
						$altoimagen=$size[1];
						$anchodetermindo=150;
						$altodeterminad=150;
						if ($anchoimagen!=$anchodetermindo && $altoimagen!=$altodeterminad) {
							echo "Resolucion de imagen no permitida debe ser 150 x 150";
						}
						else{
							$borruta="SELECT * from abogad where id_ab=$idR";
							$sql_rutdl=mysql_query($borruta,$conexion) or die (mysql_error());
							while ($tr=mysql_fetch_array($sql_rutdl)) {
								$rutrec=$tr['avat_ab'];
							}
							unlink($rutrec);
							$subiendo=@move_uploaded_file($almfotA, $ruta);
							if ($subiendo) {
								$ddf="UPDATE abogad set avat_ab='$ruta' where id_ab=$idR";
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