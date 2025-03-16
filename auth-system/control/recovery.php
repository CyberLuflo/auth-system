<?php
// Include the database connection file
include '../model/db_conn.php';

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library files
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email from the form
    $email = $_POST['email'];

    try {
        // Generate a recovery token
        $token = bin2hex(random_bytes(32));

        // Update the token in the database
        $sql = "UPDATE usuarios SET token_recuperacion = :token WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Configure PHPMailer
        $mail = new PHPMailer(true);

        // Set up SMTP server configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'tucorroe@gmail.com'; // Your email address
        $mail->Password = 'contraseña generada por gmail'; // Your email password or app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Encryption type
        $mail->Port = 587; // Port for TLS

        // Set up the email
        $mail->setFrom('tucorreo@gmail.com', 'Sistema de Autenticación');
        $mail->addAddress($email); // Recipient's email address
        $mail->isHTML(true);
        $mail->Subject = 'Recuperación de Contraseña';
        $reset_link = "http://tusitio.com/reset_password.php?token=$token";
        $mail->Body = "Haz clic en el siguiente enlace para restablecer tu contraseña: <a href='$reset_link'>Restablecer Contraseña</a>";

        // Send the email
        $mail->send();
        echo "Instrucciones enviadas a tu correo electrónico.";
    } catch (Exception $e) {
        // Handle email sending errors
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
}
?>