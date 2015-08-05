$(document).on("ready",inicio_procesos);
function inicio_procesos () {
	$("#buscasocc").on("click",buscar_caso);
}
var bien={color:"#328A26"};
var normal={color:"#000"};
var mal={color:"#9C0202"};
function buscar_caso () {
	var cc=$("#cedbuscaso").val();
	if (cc=="") {
		$("#txCS").css(mal).text("Ingrese el número de cédula");
		return false;
	}
	else{
		$("#txCS").css(normal).text("");
		$("#txCS").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' /></center>");
		$.post("buscar_casos.php",{a:cc},colocarcasos);
		return false;
	}
}
function colocarcasos (utcas) {
	if (utcas=="2") {
		$("#txCS").css(mal).text("Cédula no está registrado");
		return false;
	}
	else{
		if (utcas=="3") {
			$("#txCS").css(mal).text("usuario desactivado");
			return false;
		}
		else{
			$("#txCS").css(normal).text("");
			$("#casosver").html(utcas);
			return false;
		}
	}
}