<?php
	$a=$_POST['a'];//nombre
	$b=$_POST['b'];//correo
	$c=$_POST['c'];//mensaje
	if ($a=="" || $b=="") {
		echo "1";
	}
	else{
		include 'miler/class.phpmailer.php';
		$mail=new PHPMailer();
		$body="<section style='max-width:1100px;'>
			<header>
				<figure>
					<img src='http://vargasnossa.com/imagenes/logo.png' alt='logo' />
				</figure>
				<h1>Contacto $a</h1>
			</header>
			<section>
				<article>
					<p>
						<b>Nombre:</b> $a<br />
						<b>Correo:</b> $b<br />
						<b>Mensaje:</b>
					</p>
					<p>
						$c
					</p>
				</article>
				<article>
					<a herf='http://vargasnossa.com/' target='_blank'>Página</a>
				</article>
			</section>
		</section>";
		$mail->SetFrom('$b','$a');
		$mail->From = "$b";
		$mail->FromName = "$a";
		$mail->AddReplyTo('$b','$a');
		$address="albertarias925@gmail.com";
		$mail->AddAddress($address, "Inmobiliaria Provase");
		$mail->Subject = "Contacto";
		$mail->AltBody = "Cuerpo alternativo del mensaje";
		$mail->CharSet = 'UTF-8';
		$mail->MsgHTML($body);
		if(!$mail->Send()) {
			echo "Error al enviar el mensaje: " . $mail­>ErrorInfo;
		} 
		else {
			echo "2";
		}
	}
?>