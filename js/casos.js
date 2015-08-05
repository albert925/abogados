$(document).on("ready",inicio_casos);
function inicio_casos () {
	$("#nvgs").on("click",nuevo_ususario);
	$("#nvcas").on("click",nuevo_caso);
	$("#mfcas").on("click",modic_caso);
	$("#busE").keydown(buscarnombresusers);
	$("#busE").keyup(buscarnombresusers);
	$(".pucas").on("change",cambiarestadocasos);
	$(".filflx select").on("change",buscar_filimnb);
}
var bien={color:"#328A26"};
var normal={color:"#000"};
var mal={color:"#9C0202"};
function nuevo_ususario () {
	var susa=$("#nmigs").val();
	var susb=$("#ccgs").val();
	var susc=$("#crgs").val();
	var susd=$("#tlgs").val();
	var suse=$("#clgs").val();
	var susf=$("#drgs").val();
	if (susa=="") {
		$("#txA").css(mal).text("Ingrese los nombres y apellidos");
		return false;
	}
	else{
		if (susb=="" || susb.length<5) {
			$("#txA").css(mal).text("Ingrese la cédula");
			return false;
		}
		else{
			$("#txA").css(normal).text("");
			$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
			$.post("new_users.php",{a:susa,b:susb,c:susc,d:susd,e:suse,f:susf},resulusers);
			return false;
		}
	}
}
function resulusers (rsus) {
	if (rsus=="2") {
		$("#txA").css(mal).text("Cédula ya existe");
			return false;
	}
	else{
		if (rsus=="4") {
			$("#txA").css(mal).text("Correo ya existe");
			return false;
		}
		else{
			if (rsus=="3") {
				$("#txA").css(bien).text("Ingresado");
				location.reload(20);
			}
			else{
				$("#txA").css(mal).html(rsus);
				return false;
			}
		}
	}
}
function nuevo_caso () {
	var jia=$("#uscs").val();
	var jib=$("#ttcs").val();
	var jic=$("#escs").val();
	var jid=$("#txcs").val();
	if (jia=="0" || jia=="") {
		$("#txB").css(mal).text("Selecione el usuario");
		return false;
	}
	else{
		if (jib=="") {
			$("#txB").css(mal).text("Ingrese el título");
			return false;
		}
		else{
			if (jic=="0" || jic=="") {
				$("#txB").css(mal).text("Selecione el estado");
				return false;
			}
			else{
				if (jid=="") {
					$("#txB").css(mal).text("Ingrese el texto");
					return false;
				}
				else{
					$("#txB").css(normal).text("");
					$("#txB").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
					$.post("new_caso.php",{a:jia,b:jib,c:jic,d:jid},function (ywq) {
						if (ywq=="2") {
							$("#txB").css(bien).text("Caso ingresado");
							window.location.href="cassus.php?us="+jia;
						}
						else{
							$("#txB").css(mal).html(ywq);
							return false;
						}
					});
					return false;
				}
			}
		}
	}
}
function modic_caso () {
	var ida=$(this).attr("data-id");
	var kia=$("#uscs").val();
	var kib=$("#ttcs").val();
	var kic=$("#escs").val();
	var kid=$("#txcs").val();
		if (kia=="0" || kia=="") {
		$("#txC").css(mal).text("Selecione el usuario");
		return false;
	}
	else{
		if (kib=="") {
			$("#txC").css(mal).text("Ingrese el título");
			return false;
		}
		else{
			if (kic=="0" || kic=="") {
				$("#txC").css(mal).text("Selecione el estado");
				return false;
			}
			else{
				if (kid=="") {
					$("#txC").css(mal).text("Ingrese el texto");
					return false;
				}
				else{
					$("#txC").css(normal).text("");
					$("#txC").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
					$.post("mofffif_caso.php",{fad:ida,a:kia,b:kib,c:kic,d:kid},function (ywq) {
						if (ywq=="2") {
							$("#txC").css(bien).text("Caso modificado");
							location.reload(20);
						}
						else{
							$("#txC").css(mal).html(ywq);
							return false;
						}
					});
					return false;
				}
			}
		}
	}
}
function cambiarestadocasos () {
	var idb=$(this).attr("data-id");
	var selwe=$("#cacas_"+idb).val();
	if (selwe=="0" || selwe=="") {
		alert("selecione el estado");
	}
	else{
		$.post("camb_escaso.php",{fa:idb,a:selwe},resulesss);
	}
}
function resulesss (zwt) {
	if (zwt=="2") {
		alert("estado cambiado");
		location.reload(20);
	}
	else{
		alert(zwt);
	}
}
function buscar_filimnb () {
	var bbb=$("#busB").val();
	var bcc=$("#busC").val();
	var bdd=$("#busD").val();
	window.location.href="ind2x.php?bb="+bbb+"&bc="+bcc+"&bd="+bdd;
}
function buscarnombresusers () {
	var nmus=$("#busE").val();
	$("#cargadorus center").remove();
	$("#cargadorus").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
	$.post("bucplab_users.php",{pa:nmus},resulcolnombres);
}
function resulcolnombres (xsx) {
	$("#cargadorus center").remove();
	if (xsx=="" || $("#busE").val()=="") {
		$("#resulNombres").css({display:"none"});
	}
	else{
		$("#resulNombres").css({display:"flex"}).html(xsx);
	}
}