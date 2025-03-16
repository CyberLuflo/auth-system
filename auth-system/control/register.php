<?php
include '../model/db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Cifrar la contraseña

    try {
        // Insertar usuario en la base de datos
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        echo "Registro exitoso. <a href='../view/login.html'>Inicia sesión</a>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>