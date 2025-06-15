<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre   = htmlspecialchars(trim($_POST["nombre"]));
  $telefono = htmlspecialchars(trim($_POST["telefono"]));
  $email    = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $mensaje  = htmlspecialchars(trim($_POST["mensaje"]));

  if (!empty($nombre) && !empty($email) && !empty($mensaje)) {
    $destinatario = "email@contacto.com";
    $asunto = "Nuevo mensaje desde -Nombre Empresa-";

    $contenido  = "Nombre: $nombre\n";
    $contenido .= "Teléfono: $telefono\n";
    $contenido .= "Email: $email\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    $headers  = "From: email@contacto.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    if (mail($destinatario, $asunto, $contenido, $headers)) {
      header("Location: gracias.html");
      exit();
    } else {
      echo "⚠️ Hubo un error al enviar el mensaje. Intenta nuevamente.";
    }
  } else {
    echo "⚠️ Por favor completa los campos requeridos.";
  }
} else {
  header("Location: index.html");
  exit();
}
?>