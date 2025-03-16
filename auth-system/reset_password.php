<?php
// Start the session to manage user data
session_start();

// Include the database connection file
include 'model/db_conn.php';

// Check if the token is provided in the URL
if (isset($_GET['token'])) {
    // Get the token from the URL
    $token = $_GET['token'];

    try {
        // Search for the token in the database
        $sql = "SELECT * FROM usuarios WHERE token_recuperacion = :token";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the token is valid and corresponds to a user
        if ($user) {
            // Check if the form to reset the password has been submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Hash the new password for security
                $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

                // Update the user's password and clear the recovery token
                $sql = "UPDATE usuarios SET password = :password, token_recuperacion = NULL WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':password', $new_password);
                $stmt->bindParam(':id', $user['id']);
                $stmt->execute();

                // Display a success message and a link to the login page
                echo "Contraseña restablecida correctamente. <a href='login.html'>Inicia sesión</a>";
            } else {
                // Display the password reset form
                echo "
                <form method='POST'>
                    <input type='password' name='new_password' placeholder='Nueva Contraseña' required>
                    <button type='submit'>Restablecer Contraseña</button>
                </form>
                ";
            }
        } else {
            // Display an error message if the token is invalid or expired
            echo "Token inválido o expirado.";
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
} else {
    // Display an error message if no token is provided
    echo "Token no proporcionado.";
}
?>

