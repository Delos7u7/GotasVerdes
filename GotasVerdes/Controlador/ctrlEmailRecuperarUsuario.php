<?php
// Se importan las clases necesarias de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Se requieren los archivos de PHPMailer
require '../Controlador/PHPMailer/Exception.php';
require '../Controlador/PHPMailer/PHPMailer.php';
require '../Controlador/PHPMailer/SMTP.php';

// Se crea una instancia de la clase PHPMailer
$mail = new PHPMailer(true);
// Se agrega la dirección de correo electrónico proporcionada a la variable $gmail
$mail->addAddress($cor_recuperarUsuario);
$codigo_recuperar = rand(1000, 9999);

try {
    // Configuración del servidor SMTP
    $mail->SMTPDebug = 0;                      // Habilitar la salida de depuración detallada (0 para deshabilitar)
    $mail->isSMTP();                           // Usar SMTP para enviar correos
    $mail->Host       = 'smtp.gmail.com';      // Servidor SMTP de Gmail
    $mail->SMTPAuth   = true;                  // Habilitar la autenticación SMTP
    $mail->Username   = 'gotasverdesoficial@gmail.com'; // Tu dirección de correo electrónico de Gmail
    $mail->Password   = 'tbgusetdskoxzjql';    // Tu contraseña de Gmail
    $mail->SMTPSecure = 'tls';                 // Habilitar cifrado TLS
    $mail->Port       = 587;                   // Puerto TCP para la conexión SMTP (587 para TLS)

    // Configuración de los remitentes y destinatarios
    $mail->setFrom('gotasverdesoficial@gmail.com', 'GotasVerdes'); // Dirección de correo del remitente
    $mail->addAddress($cor_recuperarUsuario); // Agregar un destinatario
    $mail->CharSet = 'UTF-8'; // Configuración de la codificación de caracteres
    $mail->Encoding = 'base64';
    // Configuración del contenido del correo electrónico
    $mail->isHTML(true); // Establecer el formato del correo como HTML
    $mail->Subject = 'Recuperacion de contraseña'; // Asunto del correo
    $mail->Body = 
    '<html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background: #E7E1E1;
                    padding: 20px;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    background: #fff;
                    border-radius: 25px;
                    border: 2px solid #E7E1E1;
                    padding: 30px;
                    border-radius: 5px;
                }
                
                p {
                    font-size: 16px;
                    line-height: 1.6;
                }
            </style>
        </head>
        <body>
            <div class="container">          
                <p>Hola usuari@,</p>
                <p>Tu codigo para recuperar tu contraseña es: '.$codigo_recuperar.'</p>
                <p><a href="http://localhost/GotasVerdes/Vista/login/codigo_confirmacion.php?gmail=' . $cor_recuperarUsuario . '&token=' . $token_recuperar . '">Para restablecer da clic aquí</a></p>
                <p><smail>Si usted no solicitó el código, favor de ignorar este correo</smail></p>
            </div>
        </body>
    </html>';


    // Enviar el correo electrónico
    $mail->send();

    echo '<script>
    alert("Revise su correo electrónico para obtener el código de recuperación.");
    window.location ="../Vista/login/login.html";
    </script>';

} catch (Exception $e) {
    // En caso de error, mostrar el mensaje de error
    echo "Error: {$mail->ErrorInfo}";
}
?>