$(document).on("ready",inicio_abogados);
function inicio_abogados () {
	$("#moimgbo").on("click",img_abog);
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
function img_abog () {
	var ida=$("#idfbo").val();
	var gibo=$("#fgibo")[0].files[0];
	var namegibo=gibo.name;
	var extegibo=namegibo.substring(namegibo.lastIndexOf('.')+1);
	var tamgibo=gibo.size;
	var tipogibo=gibo.type;
	if (ida=="" || ida=="0") {
		$("#txA").css(mal).text("Id abogado no disponible");
		return false
	}
	else{
		if (!es_imagen(extegibo)) {
			$("#txA").css(mal).text("Tipo de imagen no permitido");
			return false
		}
		else{
			$("#txA").css(normal).text("");
			var formu=new FormData($("#gm_bo")[0]);
			$.ajax({
				url: '../../../mofimggabog.php',
				type: 'POST',
				data: formu,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend:function () {
					$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
				},
				success:reulimg,
				error:function () {
					$("#txA").css(mal).text("Ocurrió un error");
					$("#txA").fadeIn();$("#txA").fadeOut(3000);
				}
			});
			return false
		}
	}
}
function reulimg (dtst) {
	if (dtst=="2") {
		$("#txA").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
		$("#txA").fadeIn();$("#txA").fadeOut(3000);
		return false;
	}
	else{
		if (dtst=="3") {
			$("#txA").css(mal).text("Tamaño no permitido");
			$("#txA").fadeIn();$("#txA").fadeOut(3000);
			return false;
		}
		else{
			if (dtst=="4") {
				$("#txA").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
				$("#txA").fadeIn();$("#txA").fadeOut(3000);
				return false;
			}
			else{
				if (dtst=="5") {
					$("#txA").css(bien).text("Imagen subida");
					$("#txA").fadeIn();$("#txA").fadeOut(3000);
					location.reload(20);
				}
				else{
					$("#txA").css(mal).html(dtst);
					$("#txA").fadeIn();
					return false;
				}
			}
		}
	}
}