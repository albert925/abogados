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
		$idR=$_GET['nt'];
		if ($idR=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id no ticia no disponible');";
				echo "var pagina='../noticias';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$datos="SELECT * from noticias 
					inner join tipo_noticia on(noticias.tp_id=tipo_noticia.id_tp) 
				where id_nt=$idR";
			$sql_datos=mysql_query($datos,$conexion) or die (mysql_error());
			$numdatos=mysql_num_rows($sql_datos);
			if ($numdatos>0) {
				while ($dt=mysql_fetch_array($sql_datos)) {
					$nmnt=$dt['tit_nt'];
					$tpnt=$dt['tp_id'];
					$rtnt=$dt['rut_nt'];
					$rsnt=$dt['res_nt'];
					$txnt=$dt['tx_nt'];
					$fent=$dt['fe_nt'];
					$tipnam=$dt['nam_tp'];
				}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Datos de <?php echo $nmnt ?>" />
	<meta name="keywords" content="Modificar Noticia" />
	<title><?php echo "$nmnt"; ?>|Vargas Nossa y Asociados</title>
	<link rel="icon" href="../../../imagenes/icon.png" />
	<link rel="image_src" href="../../../imagenes/logo.png" />
	<link rel="stylesheet" href="../../../css/normalize.css" />
	<link rel="stylesheet" href="../../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../../css/style.css" />
	<link rel="stylesheet" href="../../../css/styadmin.css" />
	<script src="../../../js/jquery_2_1_1.js"></script>
	<script src="../../../js/scripag.js"></script>
	<script src="../../../js/scripadmins.js"></script>
	<script src="../../../js/noticias.js"></script>
	<script src="../../../ckeditor/ckeditor.js"></script>
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
			<a class="sel" href="../noticias">Noticias</a>
			<a href="../abogados">Abogados</a>
			<a href="../frases">Frases</a>
			<a href="../portafolio">Portafolio</a>
			<a href="../casos">Procesos o casos</a>
			<a href="../"><?php echo "$usad"; ?></a>
			<a href="../../../cerrar">Salir</a>
		</nav>
		<div id="mn_mv"><span class="icon-menu"></span></div>
	</article>
	<nav id="mnB">
		<a href="../noticias">Ver noticias</a>
		<a href="tipo_noticia.php">Tipos de noticias</a>
	</nav>
	<section class="marsec">
		<h1><?php echo "$nmnt"; ?></h1>
		<article id="automargen">
			<h2>Modificar imagen</h2>
			<article>
				<form action="#" method="post" enctype="multipart/form-data" id="mfimgnt" class="columninput">
					<input type="text" id="idfnt" name="idfnt" value="<?php echo $idR ?>" required style="display:none;" />
					<label><a href="../../../<?php echo $rtnt ?>" target="_blank"><?php echo "$rtnt"; ?></a></label>
					<label for="gmntf"><b>Imagen (resolución 330x270)</b></label>
					<input type="file" id="gmntf" name="gmntf" required />
					<div id="txD"></div>
					<input type="submit" value="Modificar" id="mfimagnt" />
				</form>
			</article>
			<h2>Modificar datos</h2>
			<article>
				<form action="modifc_noticia.php" method="post" class="columninput">
					<input type="text" id="idfntCc" name="idfntCc" value="<?php echo $idR ?>" required style="display:none;" />
					<label for="titnt">*<b>Titulo</b></label>
					<input type="text" id="titnt" name="titnt" value="<?php echo $nmnt ?>" required />
					<label>*<b>Tipo de noticia</b></label>
					<select id="tpnt" name="tpnt">
						<option value="0">Selecione</option>
						<?php
							$Ttpnt="SELECT * from tipo_noticia order by nam_tp asc";
							$sql_tp=mysql_query($Ttpnt,$conexion) or die (mysql_error());
							while ($tpS=mysql_fetch_array($sql_tp)) {
								$idtp=$tpS['id_tp'];
								$nmtp=$tpS['nam_tp'];
								if ($idtp==$tpnt) {
									$seltipo="selected";
								}
								else{
									$seltipo="";
								}
						?>
						<option value="<?php echo $idtp ?>" <?php echo $seltipo ?>><?php echo "$nmtp"; ?></option>
						<?php
							}
						?>
					</select>
					<label>*<b>Resumen</b></label>
					<textarea id="restx" name="resnt" required><?php echo "$rsnt"; ?></textarea>
					<label><b>Texto</b></label>
					<textarea id="editor1" name="txtnt"><?php echo "$txnt"; ?></textarea>
					<script>
						CKEDITOR.replace('txtnt');
					</script>
					<div id="txA"></div>
					<input type="submit" value="Modificar" id="valnot" />
				</form>
			</article>
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
					echo "alert('noticia no existe');";
					echo "var pagina='../noticias';";
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