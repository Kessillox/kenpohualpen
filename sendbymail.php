<?php
$mensaje = "";
if(isset($_POST['mail'])) {

	// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
	$email_to = "torneo@kenpohualpen.cl";
	$email_subject = "Formulario de Contacto - IKKA Kenpo La Floresta";
	$email_from = "torneo@kenpohualpen.cl";

	// Aquí se deberían validar los datos ingresados por el usuario
	if(!isset($_POST['nombre']) ||
	!isset($_POST['mail']) ||
	!isset($_POST['texto'])) {

		// echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
		//echo 'alert("Ocurrió un error y el formulario no ha sido enviado.")';
		$mensaje = 'Ocurrió un error y el formulario no ha sido enviado. Por favor, vuelva atrás y verifique la información ingresada';

		//echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
		//echo 'alert("Por favor, vuelva atrás y verifique la información ingresada")';
		//die();
	}
	else{
		$email_message = "Detalles del formulario de contacto:\n\n";
		$email_message .= "Nombre: " . $_POST['nombre'] . "\n";
		$email_message .= "E-mail: " . $_POST['mail'] . "\n";
		$email_message .= "Mensaje: " . $_POST['texto'] . "\n\n";

		// Ahora se envía el e-mail usando la función mail() de PHP
		$headers = 'From: '.$email_from."\r\n".
		'Reply-To: '.$email_from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		mail($email_to, $email_subject, $email_message, $headers);

		// echo "¡El formulario se ha enviado con éxito!";
		//echo 'alert("¡El formulario se ha enviado con éxito!")';
		$mensaje = '¡El formulario se ha enviado con éxito!';
	}
}
else{
	$mensaje = 'Ocurrió un error y el formulario no ha sido enviado\nFaltan campos por llenar';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de formulario</title>
</head>
<body>
	<script>
		alert('<?php echo $mensaje; ?>');
		window.location = 'http://www.kenpohualpen.cl';
	</script>
</body>
</html>

