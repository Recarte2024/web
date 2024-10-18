<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'sistema_login','3306');

if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();

    if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
        echo 'Inicio de sesión exitoso.';
        // Aquí podrías iniciar una sesión, por ejemplo
        session_start();
        $_SESSION['usuario'] = $usuario['nombre_usuario'];
    } else {
        echo 'Email o contraseña incorrectos.';
    }

    $stmt->close();
    $conn->close();
}
?>
