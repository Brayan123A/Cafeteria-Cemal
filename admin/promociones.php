<?php
session_start();
include("../config/conexion.php");

if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SESSION['rol'] != "admin") {
    header("Location: dashboard.php");
    exit();
}

if(isset($_POST['guardar'])){

    $titulo = mysqli_real_escape_string($conn,$_POST['titulo']);
    $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);

    $imagen="";

    if($_FILES['imagen']['name']!=""){

        $imagen=time()."_".$_FILES['imagen']['name'];

        move_uploaded_file(
            $_FILES['imagen']['tmp_name'],
            "../assets/uploads/promociones/".$imagen
        );

    }

    mysqli_query($conn,"INSERT INTO promociones(titulo,descripcion,imagen)
    VALUES('$titulo','$descripcion','$imagen')");
}

$promociones=mysqli_query($conn,"SELECT * FROM promociones ORDER BY id DESC");
?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Promociones</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/promociones.css">

</head>

<body>

<?php include("../includes/navbar_admin.php"); ?>

<div class="container">

<div class="card mt-4">

<div class="card-header">

<h2>🎉 Administrar Promociones</h2>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label>Título</label>

<input type="text" name="titulo" class="form-control" required>

</div>

<div class="mb-3">

<label>Descripción</label>

<textarea name="descripcion" class="form-control" rows="4" required></textarea>

</div>

<div class="mb-3">

<label>Imagen</label>

<input type="file" name="imagen" class="form-control" required>

</div>

<button class="btn btn-success" name="guardar">

Guardar Promoción

</button>

</form>

<hr>

<h3>Lista de Promociones</h3>

<table class="table table-bordered table-hover">

<thead>

<tr>

<th>ID</th>

<th>Imagen</th>

<th>Título</th>

<th>Descripción</th>

<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php while($fila=mysqli_fetch_assoc($promociones)){ ?>

<tr>

<td><?php echo $fila['id']; ?></td>

<td>

<img src="../assets/uploads/promociones/<?php echo $fila['imagen']; ?>" width="90">

</td>

<td><?php echo $fila['titulo']; ?></td>

<td><?php echo $fila['descripcion']; ?></td>

<td>

<a href="editar_promocion.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning btn-sm">

✏ Editar

</a>

<a href="eliminar_promocion.php?id=<?php echo $fila['id']; ?>"

class="btn btn-danger btn-sm"

onclick="return confirm('¿Eliminar esta promoción?');">

🗑 Eliminar

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</body>

</html>