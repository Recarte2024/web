<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'sistema_login','3306');

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $texto = $_POST['texto'];

    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO formulario (nombre, telefono, direccion, correo, texto) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $telefono, $direccion, $correo, $texto);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Datos guardados exitosamente.";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
