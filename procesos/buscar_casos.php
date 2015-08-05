<?php
	include '../config.php'; 
	include '../fecha_format.php';//
	$ccR=$_POST['a'];//N° cedula
	if ($ccR=="") {
		echo "1";
	}
	else{
		$buscar="SELECT * from usuarios where cc_us='$ccR'";
		$sql_buscar=mysql_query($buscar,$conexion) or die (mysql_error());
		$numbuscar=mysql_num_rows($sql_buscar);
		if ($numbuscar>0) {
			$actides="SELECT * from usuarios where cc_us='$ccR' and estd_us='1'";
			$sql_acdes=mysql_query($actides,$conexion) or die (mysql_error());
			$numacts=mysql_num_rows($sql_acdes);
			if ($numacts>0) {
				while ($us=mysql_fetch_array($sql_buscar)) {
					$idus=$us['id_us'];
					$ccus=$us['cc_us'];
					$nmus=$us['nom_ap_us'];
					$crus=$us['cor_us'];
					$tlus=$us['tel_us'];
					$mvus=$us['mov_us'];
					$dpus=$us['depart_id'];
					$muni=$us['muni_id'];
					$drus=$us['direc_us'];
					$tpus=$us['tp_us'];
					$esus=$us['estd_us'];
					$feus=$us['fecr_us'];
				}
?>
<h2>Información</h2>
<article class="desus">
	<b>Nombre:</b> <?php echo "$nmus"; ?> <br />
	<b>Cédula:</b> <?php echo "$ccus"; ?><br />
	<b>Correo:</b> <?php echo "$crus"; ?><br />
	<b>Teléfono:</b> <?php echo "$tlus/$mvus"; ?>
</article>
<h2>Procesos</h2>
<?php
				$casosus="SELECT * from casos where us_id=$idus order by id_cas desc limit 25";
				$sql_casos=mysql_query($casosus,$conexion) or die (mysql_error());
				$numcasos=mysql_num_rows($sql_casos);
				if ($numcasos>0) {
					while ($cs=mysql_fetch_array($sql_casos)) {
						$idcs=$cs['id_cas'];
						$cstt=$cs['tit_cas'];
						$csxt=$cs['text_cas'];
						$cses=$cs['es_cas'];
						$csfe=$cs['fe_cas'];
?>
<article class="tdscasos">
	<h3><?php echo "$cstt"; ?></h3>
	<article>
		<?php echo substr($csxt,0,80); ?>
	</article>
	<a href="proceso.php?cs=<?php echo $idcs ?>">Leer mas</a>
	<i><?php echo fechatraducearray($csfe); ?></i>
</article>
<?php
					}
				}
				else{
?>
<div>No tiene casos o procesos</div>
<?php
				}
			}
			else{
				echo "3";
			}
		}
		else{
			echo "2";
		}
	}
?>