$(document).on("ready",inicscripadmin);
function inicscripadmin () {
	$("#btA").on("click",abrirA);
	$("#btB").on("click",abrirB);
	$(".dell").on("click",confirborr);
}
function confirborr () {
	return confirm("Estas seguro de elimiarlo?");
}
function abrirA (aA) {
	aA.preventDefault();
	$("#cjA").each(animarA);
}
function abrirB (bB) {
	bB.preventDefault();
	$("#cjB").each(animarB);
}
function animarA () {
	if ($(window).width()>800) {
		var alto="250px";
	}
	else{
		var alto="350px";
	}
	varcajalt=$(this).css("height");
	if (varcajalt==alto) {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:alto}, 500);
	}
}
function animarB () {
	if ($(window).width()>800) {
		var alto="750px";
	}
	else{
		var alto="850px";
	}
	varcajalt=$(this).css("height");
	if (varcajalt==alto) {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:alto}, 500);
	}
}