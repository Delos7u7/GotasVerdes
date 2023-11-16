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
$mail->addAddress($correoRecolector);
$nombreRecolector;

try {
    // Configuración del servidor SMTP
    $mail->SMTPDebug = 0;                      // Habilitar la salida de depuración detallada (0 para deshabilitar)
    $mail->isSMTP();                           // Usar SMTP para enviar correos
    $mail->Host       = 'smtp.gmail.com';      // Servidor SMTP de Gmail
    $mail->SMTPAuth   = true;                  // Habilitar la autenticación SMTP
    $mail->Username   = 'gotasverdesoficial@gmail.com'; // Tu dirección de correo electrónico de Gmail
    $mail->Password   = 'fsthgmdpcpvvuuiu';    // Tu contraseña de Gmail
    $mail->SMTPSecure = 'tls';                 // Habilitar cifrado TLS
    $mail->Port       = 587;                   // Puerto TCP para la conexión SMTP (587 para TLS)

    // Configuración de los remitentes y destinatarios
    $mail->setFrom('gotasverdesoficial@gmail.com', 'GotasVerdes'); // Dirección de correo del remitente
    $mail->addAddress($correoRecolector); // Agregar un destinatario
    $mail->CharSet = 'UTF-8'; // Configuración de la codificación de caracteres
    $mail->Encoding = 'base64';
    // Configuración del contenido del correo electrónico
    $mail->isHTML(true); // Establecer el formato del correo como HTML
    $mail->Subject = 'Cuenta Activada'; // Asunto del correo
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
                <p>Hola '.$nombreRecolector.'</p>
                <p>Se le asignado una nueva recolecta</p>
            </div>
        </body>
    </html>';


    // Enviar el correo electrónico
    $mail->send();

} catch (Exception $e) {
    // En caso de error, mostrar el mensaje de error
    echo "Error: {$mail->ErrorInfo}";
}
?>