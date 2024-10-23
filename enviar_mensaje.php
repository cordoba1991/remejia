<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $asunto = filter_input(INPUT_POST, 'asunto', FILTER_SANITIZE_STRING);
    $mensaje = filter_input(INPUT_POST, 'mensaje', FILTER_SANITIZE_STRING);
    
    // Configura el correo
    $para = "remejiaflotas1@gmail.com"; // Reemplaza con tu dirección de email
    $asunto_email = "Nuevo mensaje de contacto: $asunto_email";
    $cuerpo_email = "Has recibido un nuevo mensaje de $nombre ($email):\n\n$mensaje";
    
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
