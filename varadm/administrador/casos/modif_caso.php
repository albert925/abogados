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
		$idR=$_GET['cs'];
		if ($idR=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id caso no disponible');";
				echo "var pagina='../casos';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$datos="SELECT * from casos where id_cas=$idR";
			$sql_datos=mysql_query($datos,$conexion) or die (mysql_error());
			$numdatos=mysql_num_rows($sql_datos);
			if ($numdatos>0) {
				while ($dt=mysql_fetch_array($sql_datos)) {
					$usid=$dt['us_id'];
					$cstt=$dt['tit_cas'];
					$csxt=$dt['text_cas'];
					$cses=$dt['es_cas'];
					$csfe=$dt['fe_cas'];
				}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Todos los casos" />
	<meta name="keywords" content="Ingresar y elminar casos" />
	<title><?php echo "$cstt"; ?>|Vargas Nossa y Asociados</title>
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
		<a href="../casos">Ver Usuarios</a>
		<a href="casos.php">Casos</a>
	</nav>
	<section class="marsec">
		<h1><?php echo "$cstt"; ?></h1>
		<article id="automargen">
			<form action="#" method="post" class="columninput">
				<input type="text" id="uscs" name="uscs" value="<?php echo $usid ?>" requried style="display:none;" />
				<label>*<b>Título</b></label>
				<input type="text" id="ttcs" name="ttcs" value="<?php echo $cstt ?>" required />
				<label>*<b>Estado</b></label>
				<select id="escs" name="escs">
					<?php
						$escso=["Selecione","En proceso","Cancelado","Terminado"];
						for ($eis=0; $eis <=3 ; $eis++) {
							if ($eis==$cses) {
								$selcasoes="selected";
							}
							else{
								$selcasoes="";
							}
					?>
					<option value="<?php echo $eis ?>" <?php echo $selcasoes ?>><?php echo $escso[$eis]; ?></option>
					<?php
						}
					?>
				</select>
				<label>*<b>Texto</b></label>
				<textarea id="txcs" name="txcs" rows="4"><?php echo "$csxt"; ?></textarea>
				<div id="txC"></div>
				<input type="submit" value="Modificar" id="mfcas" data-id="<?php echo $idR ?>" />
			</form>
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
			else{
				echo "<script type='text/javascript'>";
					echo "alert('caso no existe o ha sido eliminado');";
					echo "var pagina='../casos';";
					echo "document.location.href=pagina;";
				echo "</script>";
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