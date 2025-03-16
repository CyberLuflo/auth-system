<?php
$host = "localhost";
$dbname = "auth_system";
$user = "root"; // Usuario por defecto de XAMPP
$password = ""; // Contraseña por defecto de XAMPP (vacía)

try {
    // Crear conexión PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    // Configurar PDO para lanzar excepciones en caso de errores
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>