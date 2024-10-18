<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'sistema_login','3306');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_usuario = $_POST['nombre_usuario'] ?? '';
    $email = $_POST['email'] ?? '';
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Cifrar la contraseña

    // Validar que los campos no estén vacíos
    if (!empty($nombre_usuario) && !empty($email) && !empty($contraseña)) {
        $sql = "INSERT INTO usuarios (nombre_usuario, email, contraseña) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $nombre_usuario, $email, $contraseña);

        if ($stmt->execute()) {
            echo 'Usuario registrado exitosamente.';
        } else {
            echo 'Error: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        echo 'Por favor, completa todos los campos.';
    }

    $conn->close();
}
