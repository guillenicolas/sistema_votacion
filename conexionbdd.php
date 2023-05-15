<?php
// Datos de conexión a la base de datos
$host = 'localhost';  // Cambia esto por la dirección del servidor de PostgreSQL
$dbname = 'sistVotacion';  // Cambia esto por el nombre de tu base de datos
$user = 'postgres';  // Cambia esto por el nombre de usuario de PostgreSQL
$pasword = 'admin';  // Cambia esto por la contraseña de PostgreSQL

// Conexión a la base de datos
$dsn = "pgsql:host=$host;dbname=$dbname";
try {
    $db = new PDO($dsn, $user, $pasword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Establecer otras opciones de configuración según sea necesario

    // Ejemplo: Obtener las regiones de la base de datos
    $stmt = $db->query("SELECT * FROM regiones");
    $regiones = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Ejemplo: Obtener las comunas de la base de datos
    $stmt = $db->query("SELECT * FROM comunas");
    $candidatos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Ejemplo: Obtener los candidatos de la base de datos
    $stmt = $db->query("SELECT * FROM candidatos");
    $candidatos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Cerrar la conexión
    $db = null;
} catch (PDOException $e) {
    // Manejo de errores
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>
