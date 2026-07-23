<?php
session_start();
include("../config/conexion.php");

if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: menus.php");
    exit();
}

$id = intval($_GET['id']);

// Obtener la imagen
$sql = mysqli_query($conn, "SELECT imagen FROM menus WHERE id='$id'");

if (mysqli_num_rows($sql) > 0) {

    $menu = mysqli_fetch_assoc($sql);

    // Eliminar la imagen del servidor
    if (!empty($menu['imagen']) && file_exists("../assets/uploads/menus/" . $menu['imagen'])) {
        unlink("../assets/uploads/menus/" . $menu['imagen']);
    }

    // Eliminar el registro
    mysqli_query($conn, "DELETE FROM menus WHERE id='$id'");
}

header("Location: menus.php");
exit();
?>