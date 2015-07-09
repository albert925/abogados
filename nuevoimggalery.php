<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$txgal=$_POST['txgla'];
		//-------------------------------------------
		$fotAcosmodT=$_FILES['galimg']['name'];
		$tipfotA=$_FILES['galimg']['type'];
	 	$almfotA=$_FILES['galimg']['tmp_name'];
	 	$tamfotA=$_FILES['galimg']['size'];
	 	$erorfotA=$_FILES['galimg']['error'];
		//----------------------------------------
		if ($fotAcosmodT=="") {
			echo "1";
		}
		else{
			if ($erorfotA>0) {
				echo "2";
			}
			else{
				$maAximo = 100204000;
				if ($tamfotA<=$maAximo*1024) {
					$ruta="imagenes/galery/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "Una imagen tiene el mismo nombre";
					}
					else{
						$size=getimagesize($almfotA);
						$anchoimagen=$size[0];
						$altoimagen=$size[1];
						$anchodetermindo=1170;
						$altodeterminad=570;
						if ($anchoimagen!=$anchodetermindo && $altoimagen!=$altodeterminad) {
							echo "Resolucion de imagen no permitida debe ser 1200 x 1088";
						}
						else{
							$subiendo=@move_uploaded_file($almfotA, $ruta);
							if ($subiendo) {
								$ddf="INSERT into galery(rut_gal,txt_gal) values('$ruta','$txgal')";
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