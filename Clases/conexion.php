<?php
// Configuración de la base de datos
$host = "localhost";
$dbname = "salsamentaria_db";
$user = "root";
$pass = "";
$charset = "utf8";

try {
    // Crear la conexión con PDO
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);

    // Opciones para lanzar excepciones si hay errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "✅ Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
    exit();
}
