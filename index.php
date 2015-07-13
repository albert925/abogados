<?php
	include 'config.php';
	function tomarultidnot($dato,$serv)
	{
		$PrimerNT="SELECT * from noticias where tp_id=$dato order by id_nt desc limit 1";
		$sqlprnt=mysql_query($PrimerNT,$serv) or die (mysql_error());
		while ($unt=mysql_fetch_array($sqlprnt)) {
			$uidnt=$unt['id_nt'];
		}
		return $uidnt;
	}
	$mH=date("m");
	$yH=date("Y");
	$fe_in=$yH."-".$mH."-01";
	$fe_fn=$yH."-".$mH."-31";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="somos una empresa en el sector inmobiliario de la ciudad de Cúcuta y su área metropolitana. 
	El servicio al cliente interno será una responsabilidad incorporada en todos los miembros de la organización." />
	<meta name="keywords" content="Abogados, noticias, denuncias, casos" />
	<title>Vargas Nossa y Asociados</title>
	<link rel="icon" href="imagenes/icon.png" />
	<link rel="image_src" href="imagenes/logo.png" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/iconos/style.css" />
	<link rel="stylesheet" href="css/default/default.css" />
	<link rel="stylesheet" href="css/nivo_slider.css" />
	<link rel="stylesheet" href="css/owl_carousel.css" />
	<link rel="stylesheet" href="css/owl_theme_min.css" />
	<link rel="stylesheet" href="css/style.css" />
	<script src="js/jquery_2_1_1.js"></script>
	<script src="js/owl_carousel_min.js"></script>
	<script src="js/scripag.js"></script>
	<script src="js/cuencass.js"></script>
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
				<a href="">
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
			<a class="sel" href="">Inicio</a>
			<a href="portafolio">Portafolio de Servicios</a>
			<a href="nosotros">Quienes Somos</a>
			<a href="contacto">Contacto</a>
		</nav>
		<div id="mn_mv"><span class="icon-menu"></span></div>
	</article>
	<section>
		<article id="automargen" class="innots">
			<article id="textowl">
				<div class="slider-wrapper theme-default">
					<div id="slider" class="nivoSlider">
						<?php
							$galery="SELECT * from galery order by id_gal asc";
							$sql_gal=mysql_query($galery,$conexion) or die (mysql_error());
							while ($gy=mysql_fetch_array($sql_gal)) {
								$idgal=$gy['id_gal'];
								$rtgal=$gy['rut_gal'];
						?>
						<img src="<?php echo $rtgal ?>" alt="imagen_<?php echo $idgal ?>" title="#caption<?php echo $idgal ?>" />
						<?php
							}
						?>
					</div>
					<?php
						$capp="SELECT * from galery order by id_gal asc";
						$sqlcapp=mysql_query($capp,$conexion) or die (mysql_error());
						while ($cp=mysql_fetch_array($sqlcapp)) {
							$idcp=$cp['id_gal'];
							$txcp=$cp['txt_gal'];
					?>
					<div id="caption<?php echo $idcp ?>" style="display:none;">
						<h2><?php echo "$txcp"; ?></h2>
					</div>
					<?php
						}
					?>
				</div>
			</article>
			<nav>
				<?php
					$Ttp="SELECT * from tipo_noticia order by nam_tp asc";
					$sql_ttp=mysql_query($Ttp,$conexion) or die (mysql_error());
					while ($tp=mysql_fetch_array($sql_ttp)) {
						$idtp=$tp['id_tp'];
						$nmtp=$tp['nam_tp'];
						$ntid=tomarultidnot($idtp,$conexion);
				?>
				<a href="#vetp<?php echo $idtp ?>_<?php echo $ntid ?>"><?php echo "$nmtp"; ?></a>
				<?php
					}
				?>
			</nav>
			<article class="noticiasR">
				<article class="owl-carousel owl-theme owl-loaded">
					<?php
						$NT="SELECT * from noticias 
							where fe_nt>='$fe_in' and fe_nt<='$fe_fn'	order by tp_id asc,id_nt desc";
						$sqlNT=mysql_query($NT,$conexion) or die (mysql_error());
						while ($tn=mysql_fetch_array($sqlNT)) {
							$idnt=$tn['id_nt'];
							$nmnt=$tn['tit_nt'];
							$tpnt=$tn['tp_id'];
							$rtnt=$tn['rut_nt'];
							$rsnt=$tn['res_nt'];
							$txnt=$tn['tx_nt'];
							$fent=$tn['fe_nt'];
					?>
					<div class="item">
						<figure class="notitem" data-hash="vetp<?php echo $tpnt ?>_<?php echo $idnt ?>">
							<a href="noticia.php?nt=<?php echo $idnt ?>">
								<img src="<?php echo $rtnt ?>" alt="<?php echo $nmnt ?>" />
							</a>
							<figcaption>
								<h4><?php echo "$nmnt"; ?></h4>
								<div>
									<?php echo "$rsnt"; ?>
								</div>
							</figcaption>
						</figure>
					</div>
					<?php
						}
					?>
				</article>
			</article>
		</article>
	</section>
	<section class="dossec">
		<article id="automargen" class="flab">
			<?php
				$Tdab="SELECT * from abogad order by id_ab desc limit 3";
				$sql_aboga=mysql_query($Tdab,$conexion) or die (mysql_error());
				while ($bo=mysql_fetch_array($sql_aboga)) {
					$idbo=$bo['id_ab'];
					$nmbo=$bo['nam_ab'];
					$rtbo=$bo['avat_ab'];
					$rsbo=$bo['res_ab'];
					$txbo=$bo['txt_ab'];
			?>
			<article>
				<figure id="lkabog" data-id="<?php echo $idbo ?>" style="background-image:url(<?php echo $rtbo ?>);"></figure>
				<figcaption>
					<h3><?php echo "$nmbo"; ?></h3>
					<article>
						<?php echo "$rsbo"; ?>
					</article>
				</figcaption>
			</article>
			<?php
				}
			?>
		</article>
	</section>
	<section class="frases">
		<article id="automargen">
			<article class="owl-carousel-b owl-theme owl-loaded">
				<?php
					$Todfras="SELECT * from frases order by id_fra desc limit 10";
					$sql_fras=mysql_query($Todfras,$conexion) or die (mysql_error());
					while ($ff=mysql_fetch_array($sql_fras)) {
						$idF=$ff['id_fra'];
						$nmF=$ff['tit_fra'];
						$rsF=$ff['res_fra'];
						$txF=$ff['txt_fra'];
				?>
				<div class="item">
					<article class="fraitem">
						<h2><?php echo "$nmF"; ?></h2>
						<p>
							<?php echo "$rsF"; ?>
						</p>
					</article>
				</div>
				<?php
					}
				?>
			</article>
		</article>
	</section>
	<section class="tressec flxcont">
		<article>
			<form action="#" method="post" class="columninput">
				<input type="text" id="nmct" required placeholder="Nombre" />
				<input type="email" id="corct" required placeholder="E-mail" />
				<textarea rows="4" id="txct" required placeholder="Mensaje"></textarea>
				<div id="txsj"></div>
				<div class="lefsub">
					<input type="submit" value="Enviar" id="nvcas" />
				</div>
			</form>
		</article>
		<article>
			<h2>Cuéntanos tu caso</h2>
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
	<script src="js/nivo_slider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
      $('#slider').nivoSlider({
          effect: 'fade',
          slices: 15,
          boxCols: 8,
          boxRows: 4,
          animSpeed: 500,
          pauseTime: 10000,
          pauseOnHover:true,
          startSlide: 0,
          directionNav: true,
          controlNav: true,
          controlNavThumbs: false,
          pauseOnHover: true,
          manualAdvance: false,
          prevText: 'Prev',
          nextText: 'Next',
          randomStart: false,
      });
   	});
   	// http://web.tursos.com/como-implementar-nivo-slider-en-tu-pagina-web/
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
		  $('.owl-carousel').owlCarousel({
				autoplay:false,
				loop:false,
				margin:10,
				responsiveClass:true,
				URLhashListener:true,
				startPosition: 'URLHash',
				nav:false,
				responsive:{
					0:{
						items:1
					},
					600:{
						items:2
					},
					1000:{
						items:3
					}
				}
			});
			$(".owl-carousel-b").owlCarousel({
				autoHeight: false,
    		autoHeightClass: 'owl-height',
    		autoplay:true,
				autoplayTimeout:3000,
				autoplayHoverPause:true,
    		items:1
			});
		});
	</script>
	<script src="http://www.google.com/jsapi"></script>
	<script src="js/colmapa.js"></script>
</body>
</html>