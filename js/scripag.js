var contador=1;
$(document).on("ready",inicio_pagina);
function inicio_pagina () {
	if ($(window).width()<810) {
		$(window).scroll(mostrarmov);
	}
	$("#mn_mv").on("click",abrir_menu);
	$("#lkabog").on("click",ver_descabo);
}
function abrir_menu () {
	if (contador==1) {
		$("#mnP").animate({left:"0"}, 500);
		contador=0;
	}
	else{
		$("#mnP").animate({left:"-100%"}, 500);
		contador=1;
	}
}
function mostrarmov () {
	var altoscroll=$(window).scrollTop();
	if (altoscroll>250) {
		$(".menuP").css({position:"fixed"});
	}
	else{
		$(".menuP").css({position:"relative"});
	}
}
function ver_descabo () {
	var delud=$(this).attr("data-id");
	window.location.href="abogado.php?bo="+delud;
}