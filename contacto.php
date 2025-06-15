<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = htmlspecialchars($_POST["nombre"]);
  $telefono = htmlspecialchars($_POST["telefono"]);
  $email = htmlspecialchars($_POST["email"]);
  $mensaje = htmlspecialchars($_POST["mensaje"]);

  $destinatario = "m.delcampo93@gmail.com";
  $asunto = "Nuevo mensaje desde Brújula Escolar";

  $contenido = "Nombre: $nombre\n";
  $contenido .= "Teléfono: $telefono\n";
  $contenido .= "Email: $email\n";
  $contenido .= "Mensaje:\n$mensaje\n";

  $headers = "From: $email";

  if (mail($destinatario, $asunto, $contenido, $headers)) {
    header("Location: gracias.html");
    exit();
  } else {
    echo "Hubo un error al enviar el mensaje.";
  }
}
?>
