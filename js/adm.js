$(document).on("ready",inicio_administrador);
function inicio_administrador () {
	$("#ingadus").on("click",ingresar_admin);
}
var bien={color:"#328A26"};
var normal={color:"#000"};
var mal={color:"#9C0202"};
function ingresar_admin () {
	var adus=$("#usadm").val();
	var adps=$("#psadm").val();
	if (adus=="") {
		$("#txA").css(mal).text("Ingrese el nombre de suuario");
		return false;
	}
	else{
		if (adps=="") {
			$("#txA").css(mal).text("Ingrese la contraseña");
			return false;
		}
		else{
			$("#txA").css(normal).text("");
			$("#txA").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' /></center>");
			$.post("ingadmin.php",{a:adus,b:adps},resulingadmin);
			return false;
		}
	}
}
function resulingadmin (rgtad) {
	if (rgtad=="2") {
		$("#txA").css(mal).text("Usuario o contraseña incorrectos");
		return false;
	}
	else{
		if (rgtad=="3") {
			$("#txA").css(bien).text("Ingresando..");
			window.location.href="administrador";
		}
		else{
			$("#txA").css(mal).html(rgtad);
			return false;
		}
	}
}