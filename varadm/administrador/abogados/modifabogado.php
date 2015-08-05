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
				echo "alert('id abogado no disponible');";
				echo "var pagina='../abogados';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$datos="SELECT * from abogad where id_ab=$idR";
			$sql_datos=mysql_query($datos,$conexion) or die (mysql_error());
			$numdatos=mysql_num_rows($sql_datos);
			if ($numdatos>0) {
				while ($dt=mysql_fetch_array($sql_datos)) {
					$nmbo=$dt['nam_ab'];
					$rtbo=$dt['avat_ab'];
					$rsbo=$dt['res_ab'];
					$txbo=$dt['txt_ab'];
				}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Modificar dato <?php echo $nmbo ?>" />
	<meta name="keywords" content="modifc Abog" />
	<title><?php echo "$nmbo"; ?>|Vargas Nossa y Asociados</title>
	<link rel="icon" href="../../../imagenes/icon.png" />
	<link rel="image_src" href="../../../imagenes/logo.png" />
	<link rel="stylesheet" href="../../../css/normalize.css" />
	<link rel="stylesheet" href="../../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../../css/style.css" />
	<link rel="stylesheet" href="../../../css/styadmin.css" />
	<script src="../../../js/jquery_2_1_1.js"></script>
	<script src="../../../js/scripag.js"></script>
	<script src="../../../js/scripadmins.js"></script>
	<script src="../../../js/abogados.js"></script>
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
			<a href="../noticias">Noticias</a>
			<a class="sel" href="../abogados">Abogados</a>
			<a href="../frases">Frases</a>
			<a href="../portafolio">Portafolio</a>
			<a href="../casos">Procesos o casos</a>
			<a href="../"><?php echo "$usad"; ?></a>
			<a href="../../../cerrar">Salir</a>
		</nav>
		<div id="mn_mv"><span class="icon-menu"></span></div>
	</article>
	<nav id="mnB">
		<a href="../abogados">Ver abogados</a>
	</nav>
	<section class="marsec">
		<h1><?php echo "$nmbo"; ?></h1>
		<article id="automargen">
			<h2>Imagen</h2>
			<article>
				<form action="#" method="post" enctype="multipart/form-data" id="gm_bo" class="columninput">
					<input type="text" id="idfbo" name="idfbo" value="<?php echo $idR ?>" required style="display:none;" />
					<label><a href="../../../<?php echo $rtbo ?>" target="_blank"><?php echo "$rtbo"; ?></a></label>
					<label><b>Imagen (resolución 150 x 150)</b></label>
					<input type="file" id="fgibo" name="fgibo" required />
					<div id="txA"></div>
					<input type="submit" value="Modificar" id="moimgbo" />
				</form>
			</article>
			<h2>Datos</h2>
			<article>
				<form action="modifc_abogado.php" method="post" class="columninput">
					<input type="text" id="idfdbo" name="idfdbo" value="<?php echo $idR ?>" required style="display:none;" />
					<label for="nmbo">*<b>Nombre</b></label>
					<input type="text" id="nmbo" name="nmbo" value="<?php echo $nmbo ?>" required />
					<label>*<b>Resumen</b></label>
					<textarea id="resbo" name="resbo" required><?php echo "$rsbo"; ?></textarea>
					<label><b>Texto</b></label>
					<textarea id="editor1" name="txtbo"><?php echo "$txbo"; ?></textarea>
					<script>
						CKEDITOR.replace('txtbo');
					</script>
					<div id="txA"></div>
					<input type="submit" value="Modificar" id="valabo" />
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
					echo "alert('No existe');";
					echo "var pagina='../abogados';";
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