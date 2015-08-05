<?php
	include '../../../config.php';
	include '../../../fecha_format.php';
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
		$mH=date("m");
		$yH=date("Y");
		$arrestado=["Selecione","Activado","Desactivado"];
		function canEstado($dato,$servidor)
		{
			$swr="SELECT * from casos where us_id=$dato";
			$sql_swr=mysql_query($swr,$servidor) or die (mysql_error());
			$numswr=mysql_num_rows($sql_swr);
			return $numswr;
		}
		$idR=$_GET['us'];
		if ($idR=="") {
			echo "<script type='text/javascript'>";
				echo "alert('Id de usuario no disponible');";
				echo "var pagina='../casos';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Todos los casos" />
	<meta name="keywords" content="Ingresar y elminar casos" />
	<title>Administrar casos|Vargas Nossa y Asociados</title>
	<link rel="icon" href="../../../imagenes/icon.png" />
	<link rel="image_src" href="../../../imagenes/logo.png" />
	<link rel="stylesheet" href="../../../css/normalize.css" />
	<link rel="stylesheet" href="../../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../../css/style.css" />
	<link rel="stylesheet" href="../../../css/styadmin.css" />
	<script src="../../../js/jquery_2_1_1.js"></script>
	<script src="../../../js/scripag.js"></script>
	<script src="../../../js/scripadmins.js"></script>
	<script src="../../../js/casos.js"></script>
</head>
<body>
	<header id="automargen">
		<article id="verlogo">
			<figure id="logo">
				<a href="../">
					<img src="../../../imagenes/logo.png" alt="logo" />
				</a>
			</figure>
		</article>
		<article id="minmyred">
			<article id="spanmm">
				<a href="../"><?php echo "$usad"; ?></a>
				<span>contacto@vargasnossa.com</span>
				<span>(+57)5 72 0821</span>
			</article>
			<article id="redes">
				<a href="" target="_blank"><span class="icon-facebook3"></span></a>
				<a href="" target="_blank"><span class="icon-twitter3"></span></a>
				<a href="" target="_blank"><span class="icon-instagram-with-circle"></span></a>
			</article>
		</article>
	</header>
	<article id="automargen" class="menuP">
		<nav id="mnP">
			<a href="../galeria">Imagenes I.</a>
			<a href="../noticias">Noticias</a>
			<a href="../abogados">Abogados</a>
			<a href="../frases">Frases</a>
			<a href="../portafolio">Portafolio</a>
			<a class="sel" href="../casos">Procesos o casos</a>
			<a href="../"><?php echo "$usad"; ?></a>
			<a href="../../../cerrar">Salir</a>
		</nav>
		<div id="mn_mv"><span class="icon-menu"></span></div>
	</article>
	<nav id="mnB">
		<a id="btC" href="#">Nuevo Usuario</a>
		<a href="casos.php">Nuevo Caso</a>
	</nav>
	<section class="marsec">
		<h1>Usuarios</h1>
		<article id="automargen">
			<article id="cjC" class="cjaing">
				<form action="#" method="post" class="columninput">
					<label>*<b>Nombres y Apellidos</b></label>
					<input type="text" id="nmigs" name="nmigs" required />
					<label>*<b>Cedula</b></label>
					<input type="number" id="ccgs" name="ccgs" required />
					<label><b>Correo</b></label>
					<input type="email" id="crgs" name="crgs" />
					<label><b>Teléfono</b></label>
					<input type="tel" id="tlgs" name="tlgs" />
					<label><b>Celular</b></label>
					<input type="tel" id="clgs" name="clgs" />
					<label><b>Dirección</b></label>
					<input type="text" id="drgs" name="drgs" />
					<div id="txA"></div>
					<input type="submit" value="Ingresar" id="nvgs" />
				</form>
			</article>
		</article>
		<article id="automargen" class="filflx">
			<select id="busB">
				<?php
					$arrordendos=["Ordenar","Id asc","Id desc","nombre asc","nombre desc","Cedula asc","Cedula desc"];
					for ($ob=0; $ob <=6 ; $ob++) { 
				?>
				<option value="<?php echo $ob ?>"><?php echo $arrordendos[$ob]; ?></option>
				<?php
					}
				?>
			</select>
			<select id="busC">
				<?php
					$arrmeses=["Meses","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto",
						"Septiembre","Octubre","Noviembre","Diciembre"];
					for ($oc=0; $oc <=12 ; $oc++) {
						if ($oc==$mH) {
							$selmes="selected";
						}
						else{
							$selmes="";
						}
				?>
				<option value="<?php echo $oc ?>" <?php echo $selmes ?>><?php echo $arrmeses[$oc]; ?></option>
				<?php
					}
				?>
			</select>
			<select id="busD">
				<?php
					for ($od=2015; $od <=($yH+1) ; $od++) {
						if ($od==$yH) {
							$selyear="selected";
						}
						else{
							$selyear="";
						}
				?>
				<option value="<?php echo $od ?>" <?php echo $selyear ?>><?php echo "$od"; ?></option>
				<?php
					}
				?>
			</select>
			<input type="text" id="busE" placeholder="Buscar por nombre" />
		</article>
		<div id="cargadorus"></div>
		<article id="resulNombres">
		</article>
		<article class="tlfx">
			<?php
				error_reporting(E_ALL ^ E_NOTICE);
				$tamno_pagina=15;
				$pagina= $_GET['pagina'];
				if (!$pagina) {
					$inicio=0;
					$pagina=1;
				}
				else{
					$inicio= ($pagina - 1)*$tamno_pagina;
				}
				$ssql="SELECT * from usuarios where id_us=$idR";
				$rs=mysql_query($ssql,$conexion) or die (mysql_error());
				$num_total_registros= mysql_num_rows($rs);
				$total_paginas= ceil($num_total_registros / $tamno_pagina);
			?>
			<table border="1">
				<tr>
					<td><b>Id</b></td>
					<td><b>Cédula</b></td>
					<td><b>Nombres y Apellidos</b></td>
					<td><b>Correo</b></td>
					<td><b>Teléfono</b></td>
					<td><b>Dirección</b></td>
					<td><b>Estado</b></td>
					<td><b>Fecha Reg.</b></td>
					<td><b>Casos</b></td>
				</tr>
			<?php
				$gsql="SELECT * from usuarios where id_us=$idR limit $inicio, $tamno_pagina";
				$impsql=mysql_query($gsql,$conexion) or die (mysql_error());
				while ($gh=mysql_fetch_array($impsql)) {
					$idus=$gh['id_us'];
					$ccus=$gh['cc_us'];
					$nmus=$gh['nom_ap_us'];
					$crus=$gh['cor_us'];
					$tlus=$gh['tel_us'];
					$mvus=$gh['mov_us'];
					$dpus=$gh['depart_id'];
					$muni=$gh['muni_id'];
					$drus=$gh['direc_us'];
					$tpus=$gh['tp_us'];
					$esus=$gh['estd_us'];
					$feus=$gh['fecr_us'];
			?>
			<tr>
				<td><b><?php echo "$idus"; ?></b></td>
				<td><?php echo "$ccus"; ?></td>
				<td><?php echo "$nmus"; ?></td>
				<td><?php echo "$crus"; ?></td>
				<td><?php echo "$tlus/$mvus"; ?></td>
				<td><?php echo "$drus"; ?></td>
				<td>
					<select id="es_<?php echo $idus ?>" class="seles" data-id="<?php echo $idus ?>">
						<?php
							for ($ies=0; $ies <=2 ; $ies++) {
								if ($ies==$esus) {
									$selestado="selected";
								}
								else{
									$selestado="";
								}
						?>
						<option value="<?php echo $ies ?>" <?php echo $selestado ?>><?php echo $arrestado[$ies]; ?></option>
						<?php
							}
						?>
					</select>
				</td>
				<td><?php echo fechatraducearray($feus); ?></td>
				<td>
					<a href="cassus.php?us=<?php echo $idus ?>">
						<?php echo canEstado($idus,$conexion); ?> Casos
					</a>
				</td>
			</tr>
			<?php
				}
			?>
			</table>
		</article>
		<article id="automargen">
			<br />
			<b>Páginas: </b>
			<?php
				//muestro los distintos indices de las paginas
				if ($total_paginas>1) {
					for ($i=1; $i <=$total_paginas ; $i++) { 
						if ($pagina==$i) {
							//si muestro el indice del la pagina actual, no coloco enlace
				?>
					<b><?php echo $pagina." "; ?></b>
				<?php
						}
						else{
							//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
				?>
							<a href="index.php?pagina=<?php echo $i ?>"><?php echo "$i"; ?></a>

				<?php
						}
					}
				}
			?>
		</article>
	</section>
	<footer>
		<article class="flexfoot">
			<article id="contfo">
				<h4>VARGAS NOSSA & ASOCIADOS</h4>
				<div><span class="icon-location"></span>Av. 1E # 11-142 Barrio Caobos</div>
				<div>Colombia - Cúcuta</div>
				<div>
					<span class="icon-phone"></span>
					314 394 1701 - 315 827 4399
				</div>
				<div>
					<span class="icon-old-phone"></span>
					583 0897/98 - 573 0190 - 571 22 62
				</div>
				<div><span class="icon-mail"></span> contacto@vargasnossaabogados.com</div>
				<div id="redes">
					<a href="" target="_blank"><span class="icon-facebook"></span></span></a>
					<a href="" target="_blank"><span class="icon-twitter"></span></a>
					<a href="" target="_blank"><span class="icon-instagram"></span></a>
				</div>
			</article>
			<article id="mapagoogle">
				<article id="map_canvas" class="mapas"></article>
			</article>
		</article>
		<article class="fionfoot">
			CONAXPORT © 2015 &nbsp;&nbsp;todos los derechos reservados &nbsp;- &nbsp;PBX (5) 841 733 &nbsp;&nbsp;Cúcuta - Colombia &nbsp;&nbsp;
			<a href="http://conaxport.com/" target="_blank">www.conaxport.com</a>
		</article>
	</footer>
	<script src="http://www.google.com/jsapi"></script>
	<script src="../../../js/colmapa.js"></script>
</body>
</html>
<?php
		}
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../../erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>