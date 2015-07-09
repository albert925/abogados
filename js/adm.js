$(document).on("ready",inicio_administrador);
function inicio_administrador () {
	$("#ingadus").on("click",ingresar_admin);
	$("#mofA").on("click",cambioA);
	$("#mofB").on("click",cambioB);
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
function cambioA () {
	var ida=$(this).attr("data-adm");
	var usF=$("#fus").val();
	if (usF=="") {
		$("#txB").css(mal).text("Ingrese nombre de usuario");
	}
	else{
		$("#txB").css(normal).text("");
		$("#txB").prepend("<center><img src='../../imagenes/loadingb.gif' alt='loading' /></center>");
		$.post("modifusadm.php",{fa:ida,a:usF},resulA);
	}
}
function resulA (rlw) {
	if (rlw=="2") {
		$("#txB").css(mal).text("Nombre de usuario ya existe");
	}
	else{
		if (rlw=="3") {
			$("#txB").css(bien).text("Usuario modificado");
			location.reload(20);
		}
		else{
			$("#txB").css(mal).html(rlw);
		}
	}
}
function cambioB () {
	var idb=$(this).attr("data-adm");
	var ca=$("#psac").val();
	var cna=$("#psnva").val();
	var cnb=$("#psnvb").val();
	if (ca=="") {
		$("#txC").css(mal).text("Ingrese la contraseña atual");
	}
	else{
		if (cna=="" || cna.length<6) {
			$("#txC").css(mal).text("Contraseña mínimo 6 dígitos");
		}
		else{
			if (cnb!=cna) {
				$("#txC").css(mal).text("Las contraseñas no coinciden");
			}
			else{
				$("#txC").css(normal).text("");
				$("#txC").prepend("<center><img src='../../imagenes/loadingb.gif' alt='loading' /></center>");
				$.post("modifpas_adm.php",{fb:idb,b:ca,c:cna},resulB);
			}
		}
	}
}
function resulB (tpas) {
	if (tpas=="2") {
		$("#txC").css(mal).text("Contraseña actual incorrecta");
	}
	else{
		if (tpas=="3") {
			$("#txC").css(bien).text("Contraseña modificada");
			setTimeout(direccionar,1500);
		}
		else{
			$("#txC").css(mal).html(tpas);
		}
	}
}
function direccionar () {
	window.location.href="../../cerrar";
}