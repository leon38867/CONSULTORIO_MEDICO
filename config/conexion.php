<?php
/* Conexión para InfinityFree */
$host = "sql107.infinityfree.com";
$usuario = "if0_42059142";
$password = "Consultorio2026";
$bd = "if0_42059142_consultorio_medico";

$conn = new mysqli($host, $usuario, $password, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

/* Compatibilidad por si algún archivo usa $conexion */
$conexion = $conn;
?>
