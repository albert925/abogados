$(document).on("ready",inicscripadmin);
function inicscripadmin () {
	$("#btA").on("click",abrirA);
	$("#btB").on("click",abrirB);
	$("#btC").on("click",abrirC);
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
function abrirC (cC) {
	cC.preventDefault();
	$("#cjC").each(animarC);
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
function animarC () {
	if ($(window).width()>800) {
		var alto="450px";
	}
	else{
		var alto="550px";
	}
	varcajalt=$(this).css("height");
	if (varcajalt==alto) {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:alto}, 500);
	}
}