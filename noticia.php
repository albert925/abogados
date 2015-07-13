<?php
	include 'config.php';
	include 'fecha_format.php';
	$idR=$_GET['nt'];
	if ($idR=="") {
		echo "<script type='text/javascript'>";
			echo "alert('id noticia no disponible');";
			echo "var pagina='index.php';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
	else{
		$datos="SELECT * from noticias where id_nt=$idR";
		$sql_nt=mysql_query($datos,$conexion) or die (mysql_error());
		$numnt=mysql_num_rows($sql_nt);
		if ($numnt>0) {
			while ($dt=mysql_fetch_array($sql_nt)) {
				$nmnt=$dt['tit_nt'];
				$tpnt=$dt['tp_id'];
				$rtnt=$dt['rut_nt'];
				$rsnt=$dt['res_nt'];
				$txnt=$dt['tx_nt'];
				$fent=$dt['fe_nt'];
			}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="<?php echo "$rsnt"; ?>" />
	<meta name="keywords" content="Noticia completo" />
	<title><?php echo "$nmnt"; ?></title>
	<link rel="icon" href="imagenes/icon.png" />
	<link rel="image_src" href="<?php echo $rtnt ?>" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/iconos/style.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/noticias.css" />
	<script src="js/jquery_2_1_1.js"></script>
	<script src="js/scripag.js"></script>
	<script type="application/ld+json">
		{
		  "@context" : "http://schema.org",
		  "@type" : "LocalBusiness",
		  "name" : "Vargas Nossa y Asosciados",
		  "image" : "url"
		}
	</script>
</head>
<body>
	<header id="automargen">
		<article id="verlogo">
			<figure id="logo">
				<a href="index.php">
					<img src="imagenes/logo.png" alt="logo" />
				</a>
			</figure>
		</article>
		<article id="minmyred">
			<article id="spanmm">
				<a href="registro">usuario</a>
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
			<a href="index.php">Inicio</a>
			<a href="portafolio">Portafolio de Servicios</a>
			<a href="nosotros">Quienes Somos</a>
			<a href="contacto">Contacto</a>
		</nav>
		<div id="mn_mv"><span class="icon-menu"></span></div>
	</article>
	<section>
		<article id="automargen">
			<h1><?php echo "$nmnt"; ?></h1>
			<article class="flxnot">
				<figure id="imgnt">
					<img src="<?php echo $rtnt ?>" alt="<?php echo $nmnt ?>" />
				</figure>
				<article>
					<?php echo "$txnt"; ?>
				</article>
			</article>
			<div class="fecha"><?php echo fechatraducearray($fent); ?></div>
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
	<script src="js/colmapa.js"></script>
</body>
</html>
<?php
		}
		else{
			echo "<script type='text/javascript'>";
				echo "alert('La noticia ha sido eliminada');";
				echo "var pagina='index.php';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
	}
?>