<?php
	include '../config.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Procesos de cada usuario" />
	<meta name="keywords" content="Procesos, casos" />
	<title>Procesos o casos | Vargas Nossa y Asociados</title>
	<link rel="icon" href="../imagenes/icon.png" />
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/procesos.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scripag.js"></script>
	<script src="../js/busprocesi.js"></script>
	<script type="application/ld+json">
		{
		  "@context" : "http://schema.org",
		  "@type" : "LocalBusiness",
		  "name" : "Procesos o casos |Vargas Nossa y Asosciados",
		  "image" : "url"
		}
	</script>
</head>
<body>
	<header id="automargen">
		<article id="verlogo">
			<figure id="logo">
				<a href="../">
					<img src="../imagenes/logo.png" alt="logo" />
				</a>
			</figure>
		</article>
		<article id="minmyred">
			<article id="spanmm">
				<a href="../registro">usuario</a>
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
			<a href="../">Inicio</a>
			<a href="../nosotros">Quienes Somos</a>
			<a href="../portafolio">Portafolio de Servicios</a>
			<a class="sel" href="../procesos">Procesos</a>
			<a href="../contacto">Contacto</a>
		</nav>
		<div id="mn_mv"><span class="icon-menu"></span></div>
	</article>
	<section>
		<h1>Procesos</h1>
		<article id="automargen" class="flxyt">
			<article class="yti">
				<form action="#" method="post" class="columninput">
					<article>
						<label for="cedbuscaso">N° Cédula</label>
						<input type="tel" id="cedbuscaso" requried />
					</article>
					<div id="txCS"></div>
					<input type="submit" value="Consultar" id="buscasocc" />
				</form>
			</article>
			<article id="casosver">
				<h2>Información</h2>
				<article class="desus">
				</article>
				<h2>Procesos</h2>
				<article class="tdscasos">
				</article>
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
	<script src="../js/colmapa.js"></script>
</body>
</html>