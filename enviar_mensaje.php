<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge y sanitiza los datos del formulario
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $asunto = filter_input(INPUT_POST, 'asunto', FILTER_SANITIZE_STRING);
    $mensaje = filter_input(INPUT_POST, 'mensaje', FILTER_SANITIZE_STRING);
    
    // Validar los datos obligatorios
    if (!$nombre || !$email || !$asunto || !$mensaje) {
        echo "Todos los campos son obligatorios. Por favor, verifica e inténtalo de nuevo.";
        exit;
    }

    // Configura el correo
    $para = "remejiaflotas1@gmail.com"; // Reemplaza con tu dirección de email
    $asunto_email = "Nuevo mensaje de contacto: $asunto"; // Corregido aquí
    $cuerpo_email = "Has recibido un nuevo mensaje de contacto:\n\n";
    $cuerpo_email .= "Nombre: $nombre\n";
    $cuerpo_email .= "Email: $email\n";
    $cuerpo_email .= "Asunto: $asunto\n";
    $cuerpo_email .= "Mensaje:\n$mensaje\n";

    // Configura las cabeceras del email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Intenta enviar el email
    if (mail($para, $asunto_email, $cuerpo_email, $headers)) {
        echo "Mensaje enviado con éxito. Gracias por contactarnos.";
    } else {
        echo "Lo siento, hubo un error al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.";
    }
} else {
    // Si alguien intenta acceder directamente a este archivo
    echo "Acceso denegado";
}
?>
