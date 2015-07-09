$(document).on("ready",inicio_noticias);
function inicio_noticias () {
	$("#nvtipos").on("click",nuevo_tipo);
	$(".moftp").on("click",modif_tipo);
}
var bien={color:"#328A26"};
var normal={color:"#000"};
var mal={color:"#9C0202"};
function es_imagen (tipederf) {
	switch(tipederf.toLowerCase()){
		case 'jpg':
			return true;
			break;
		case 'gif':
			return true;
			break;
		case 'png':
			return true;
			break;
		case 'jpeg':
			return true;
			break;
		default:
			return false;
			break;
	}
}
function nuevo_tipo () {
	var nmtp=$("#namtp").val();
	if (nmtp=="") {
		$("#txB").css(mal).text("Ingrese el nombre");
	}
	else{
		$("#txB").css(normal).text("");
		$("#txB").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$.post("new_tipo.php",{a:nmtp},resultipo);
	}
}
function resultipo (jostp) {
	if (jostp=="2") {
		$("#txB").css(mal).text("Tipo de producto ya existe");
	}
	else{
		if (jostp=="3") {
			$("#txB").css(bien).text("Tipo producto ingresado");
			location.reload(20);
		}
		else{
			$("#txB").css(mal).html(jostp);
		}
	}
}
function modif_tipo () {
	var ida=$(this).attr("data-id");
	var nftp=$("#nftp_"+ida).val();
	if (nftp=="") {
		$("#txC_"+ida).css(mal).text("Ingrese el nombre");
	}
	else{
		$("#txC_"+ida).css(normal).text("");
		$("#txC_"+ida).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$.post("modif_tipo.php",{fa:ida,a:nftp},function (restp) {
			if (restp=="2") {
				$("#txC_"+ida).css(bien).text("nombre modificado");
				location.reload(20);
			}
			else{
				$("#txC_"+ida).css(mal).html(restp);
			}
		});
	}
}