<?php
// Configuración de conexión a la base de datos
$host = 'localhost'; // Cambia esto si es necesario
$db   = 'nombre_de_tu_base_de_datos'; // Reemplaza con el nombre de tu base de datos
$user = 'Acer'; // Usuario de la base de datos
$pass = 'alert_system'; // Contraseña del usuario
$charset = 'utf8mb4'; // Conjunto de caracteres

// Establecer el DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opciones de conexión
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lanzar excepciones en errores
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Obtener resultados como un array asociativo
    PDO::ATTR_EMULATE_PREPARES   => false, // Desactivar emulación de declaraciones preparadas
];

try {
    // Crear una nueva instancia de PDO
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Manejo de errores de conexión
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
