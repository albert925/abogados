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
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Todos los abogados admn" />
	<meta name="keywords" content="Abog" />
	<title>Administrar Abogados|Vargas Nossa y Asociados</title>
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
			<a href="../"><?php echo "$usad"; ?></a>
			<a href="../../../cerrar">Salir</a>
		</nav>
		<div id="mn_mv"><span class="icon-menu"></span></div>
	</article>
	<nav id="mnB">
		<a id="btB" href="#">Nuevo abogado</a>
	</nav>
	<section class="marsec">
		<h1>Abogados</h1>
		<article id="automargen">
			<article id="cjB" class="cjaing">
				<form action="../../../new_abogado.php" method="post" enctype="multipart/form-data" class="columninput">
					<label for="nmbo">*<b>Nombre</b></label>
					<input type="text" id="nmbo" name="nmbo" required />
					<label>*<b>Imagen (resolución 150x150)</b></label>
					<input type="file" id="imgbo" name="imgbo" required />
					<label>*<b>Resumen</b></label>
					<textarea id="resbo" name="resbo" required></textarea>
					<label><b>Texto</b></label>
					<textarea id="editor1" name="txtbo"></textarea>
					<script>
						CKEDITOR.replace('txtbo');
					</script>
					<div id="txA"></div>
					<input type="submit" value="Ingresar" id="valabo" />
				</form>
			</article>
		</article>
		<article id="automargen" class="flxC">
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
				$ssql="SELECT * from abogad order by id_ab desc";
				$rs=mysql_query($ssql,$conexion) or die (mysql_error());
				$num_total_registros= mysql_num_rows($rs);
				$total_paginas= ceil($num_total_registros / $tamno_pagina);
				$gsql="SELECT * from abogad order by id_ab desc limit $inicio, $tamno_pagina";
				$impsql=mysql_query($gsql,$conexion) or die (mysql_error());
				while ($gh=mysql_fetch_array($impsql)) {
					$idbo=$gh['id_ab'];
					$nmbo=$gh['nam_ab'];
					$rtbo=$gh['avat_ab'];
					$rsbo=$gh['res_ab'];
					$txbo=$gh['txt_ab'];
			?>
			<figure>
				<h3><?php echo "$nmbo"; ?></h3>
				<img src="../../../<?php echo $rtbo ?>" alt="imange_<?php echo $idr ?>_<?php echo $idbo ?>" />
				<figcaption class="columninput">
					<a id="disbyn" href="modifabogado.php?nt=<?php echo $idbo ?>">Modificar</a>
					<a class="dell" href="borriabogado.php?br=<?php echo $idbo ?>">Borrar</a>
				</figcaption>
			</figure>
			<?php
				}
			?>
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
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../../erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>