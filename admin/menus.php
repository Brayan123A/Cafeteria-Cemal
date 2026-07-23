<?php
session_start();
include("../config/conexion.php");

if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}

if(isset($_POST['guardar'])){

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $imagen = $_FILES['imagen']['name'];
    $tmp = $_FILES['imagen']['tmp_name'];

    move_uploaded_file($tmp,"../assets/uploads/menus/".$imagen);

    mysqli_query($conn,"INSERT INTO menus(nombre,descripcion,precio,imagen)
    VALUES('$nombre','$descripcion','$precio','$imagen')");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Administrar Menús</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/dashboard.css">

</head>

<body>

<?php include("../includes/navbar_admin.php"); ?>

<div class="container mt-5">

<h2>🍔 Agregar Menú</h2>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label>Nombre</label>

<input type="text" name="nombre" class="form-control" required>

</div>

<div class="mb-3">

<label>Descripción</label>

<textarea name="descripcion" class="form-control"></textarea>

</div>

<div class="mb-3">

<label>Precio</label>

<input type="number" step="0.01" name="precio" class="form-control" required>

</div>

<div class="mb-3">

<label>Imagen</label>

<input type="file" name="imagen" class="form-control" required>

</div>

<button class="btn btn-success" name="guardar">

Guardar Menú

</button>

</form>

<hr>

<h2>📋 Menús Registrados</h2>

<table class="table table-bordered">

<tr>

<th>Imagen</th>

<th>Nombre</th>

<th>Precio</th>

<th>Acciones</th>

</tr>

<?php

$sql = mysqli_query($conn,"SELECT * FROM menus");

while($fila=mysqli_fetch_array($sql)){

?>

<tr>

<td>

<img src="../assets/uploads/menus/<?php echo $fila['imagen']; ?>" width="80">

</td>

<td><?php echo $fila['nombre']; ?></td>

<td>$<?php echo $fila['precio']; ?></td>

<td>

<a href="editar_menu.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning btn-sm">

Editar

</a>

<a href="eliminar_menu.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger btn-sm">

Eliminar

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>