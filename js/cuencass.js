var expr=/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
$(document).on("ready",inicio_mscaso);
function inicio_mscaso () {
	$("#nvcas").on("click",enviarcaso);
}
var bien={color:"#328A26"};
var normal={color:"#000"};
var mal={color:"#9C0202"};
function enviarcaso () {
	var casn=$("#nmct").val();
	var casc=$("#corct").val();
	var cast=$("#txct").val();
	if (casn=="") {
		$("#txsj").css(mal).text("Ingrese el nombre");
		return false;
	}
	else{
		if (casc=="" || !expr.test(casc)) {
			$("#txsj").css(mal).text("Ingrese el correo");
			return false;
		}
		else{
			if (cast=="") {
				$("#txsj").css(mal).text("Ingrese el mensaje");
				return false;
			}
			else{
				$("#txsj").css(mal).text("");
				$("#txsj").prepend("<center><img src='imagenes/loadingb.gif' alt='loading' /></center>");
				$.post("new_mscaso.php",{a:casn,b:casc,c:cast},resulcasmensaj);
				return false;
			}
		}
	}
}
function resulcasmensaj (rscmsj) {
	if (rscmsj=="2") {
		$("#txsj").css(bien).text("Mensaje enviado");
		location.reload(20);
	}
	else{
		$("#txsj").css(mal).html(rscmsj);
	}
}