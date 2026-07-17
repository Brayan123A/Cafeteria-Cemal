<?php
// ==========================================
// CONEXIÓN A LA BASE DE DATOS
// Cafetería CEMAL
// ==========================================

$host = "localhost";
$usuario = "root";
$password = "";
$basedatos = "cafeteria_cemal";

// Crear conexión
$conn = new mysqli($host, $usuario, $password, $basedatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Establecer caracteres UTF-8
$conn->set_charset("utf8");
?>