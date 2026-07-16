<?php

require 'includes/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $mensaje = trim($_POST['mensaje']);

    $sql = "INSERT INTO mensajes(nombre,correo,mensaje)
            VALUES(?,?,?)";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([$nombre,$correo,$mensaje]);

    header("Location: contacto.php?ok=1");
    exit();

}