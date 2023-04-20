<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>

    <title>SEND</title>
</head>
<body style="background-color: #8d6a0b; font-family: 'Ubuntu', sans-serif; color: #fff; font-size: 19px">
<?php

if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $extras = isset($_POST['extras']) ? $_POST['extras'] : '';
    $mensaje_extra = isset($_POST['extras-detalles']) ? $_POST['extras-detalles'] : '';
    

    $resultado = enviarTelegram($nombre, $apellido, $correo, $celular, $extras, $mensaje_extra);

    // Comprueba si se envió el mensaje con éxito
    if (!$resultado) {
        echo "<script>
            Swal.fire({
            icon: 'error',
            title: 'Error al enviar el solicitud.',
        });
        </script>";
       
    } else {
        echo "<script>
            Swal.fire({
            icon: 'success',
            title: 'Solicitud enviada con éxito.',
          });
          </script>";
    }
}

function enviarTelegram($nombre, $apellido, $correo, $celular, $extras = null, $mensaje_extra = null) {
    // Configura tu token de bot y chat ID
    $botToken = "6228820321:AAE9bHbA3zUoZq1Xk2b_kSc-UFwjrI6yH5c";
    $chatId = "748796282";

    // Construye el mensaje a enviar
    $message = "Nueva solicitud del formulario de suscripción:\n\n";
    $message .= "Nombre: " . $nombre . "\n";
    $message .= "Apellido: " . $apellido . "\n";
    $message .= "Correo electrónico: " . $correo . "\n";
    $message .= "Número de celular: " . $celular . "\n";
    if ($extras != null && $extras == "on" && $mensaje_extra != null) {
        $message .= "Mensaje adicional: " . $mensaje_extra . "\n";
    } else {
        $message .= "Mensaje adicional: Ninguno\n";
    }

    // Construye la URL para enviar el mensaje a través de Telegram API
    $url = "https://api.telegram.org/bot" . $botToken . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($message);

    // Envía la solicitud HTTP para enviar el mensaje
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Verifica si se envió el mensaje con éxito
    if (!$response) {
        return false;
    }

    // Analiza la respuesta de Telegram API
    $responseData = json_decode($response, true);
    if ($responseData['ok'] != true) {
        return false;
    }

    // Si todo salió bien, devuelve true
    return true;
}

   
?>

<div class="container">
  <div class="text-center">
    <img src="https://img.icons8.com/bubbles/100/null/happy.png"/>
    <h3>¡Gracias por tu interés en nuestra suscripción!</h3>
    <p>Te estaremos enviado un correo electrónico y mensaje con los pasos a seguir para completar el proceso de suscripción.</p><br>
    <p>Ya puedes cerrar esta pagina.</p>
  </div>
</div>

<style>
    .container {
        text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
}
.container {
  margin: 0 auto;
}
</style>

</body>
</html>
