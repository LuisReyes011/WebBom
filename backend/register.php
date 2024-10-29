<?php
// Establecer la conexión a la base de datos
$servername = "localhost"; // Cambia esto si es necesario
$username = "tu_usuario"; // Cambia esto a tu usuario de base de datos
$password = "tu_contraseña"; // Cambia esto a tu contraseña de base de datos
$dbname = "tu_base_de_datos"; // Cambia esto a tu nombre de base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validar que las contraseñas coincidan
if ($password !== $confirm_password) {
    die("Las contraseñas no coinciden.");
}

// Hash de la contraseña
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Preparar la consulta SQL
$sql = "INSERT INTO usuarios (email, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $hashed_password);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Registro exitoso. Puedes iniciar sesión ahora.";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
