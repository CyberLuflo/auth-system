<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['user_id'])) {
    // Si el usuario está autenticado, redirigirlo al dashboard
    header("Location: control/dashboard.php");
    exit();
} else {
    // Si el usuario no está autenticado, redirigirlo al formulario de inicio de sesión
    header("Location: view/login.html");
    exit();
}
?>