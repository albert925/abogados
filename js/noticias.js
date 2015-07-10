$(document).on("ready",inicio_noticias);
function inicio_noticias () {
	$("#nvtipos").on("click",nuevo_tipo);
	$("#valnot").on("click",validarnoticia);
	$("#mfimagnt").on("click",cambiar_imagenoticia);
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
function validarnoticia () {
	var sela=$("#tpnt").val();
	if (sela=="0" || sela=="") {
		alert("Selecione tipo de noticia");
		return false;
	}
	else{
		return true;
	}
}
function cambiar_imagenoticia () {
	var idinp=$("#idfnt").val();
	var imgnt=$("#gmntf")[0].files[0];
	var nameimgnt=imgnt.name;
	var exteimgnt=nameimgnt.substring(nameimgnt.lastIndexOf('.')+1);
	var tamimgnt=imgnt.size;
	var tipoimgnt=imgnt.type;
	if (idinp=="" || idinp=="0") {
		$("#txD").css(mal).text("id de imagen no disponible");
		return false;
	}
	else{
		if (!es_imagen(exteimgnt)) {
			$("#txD").css(mal).text("Tipo de imagen no permitido");
			return false;
		}
		else{
			$("#txD").css(normal).text("");
			var formu=new FormData($("#mfimgnt")[0]);
			$.ajax({
				url: '../../../modifimgnoti.php',
				type: 'POST',
				data: formu,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend:function () {
					$("#txD").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
				},
				success:reulimg,
				error:function () {
					$("#txD").css(mal).text("Ocurrió un error");
					$("#txD").fadeIn();$("#txD").fadeOut(3000);
				}
			});
			return false;
		}
	}
}
function reulimg (dtst) {
	if (dtst=="2") {
		$("#txD").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
		$("#txD").fadeIn();$("#txD").fadeOut(3000);
		return false;
	}
	else{
		if (dtst=="3") {
			$("#txD").css(mal).text("Tamaño no permitido");
			$("#txD").fadeIn();$("#txD").fadeOut(3000);
			return false;
		}
		else{
			if (dtst=="4") {
				$("#txD").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
				$("#txD").fadeIn();$("#txD").fadeOut(3000);
				return false;
			}
			else{
				if (dtst=="5") {
					$("#txD").css(bien).text("Imagen subida");
					$("#txD").fadeIn();$("#txD").fadeOut(3000);
					location.reload(20);
				}
				else{
					$("#txD").css(mal).html(dtst);
					$("#txD").fadeIn();
					return false;
				}
			}
		}
	}
}