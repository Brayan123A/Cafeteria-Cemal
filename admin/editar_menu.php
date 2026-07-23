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

$id = $_GET['id'];

$sql = mysqli_query($conn, "SELECT * FROM menus WHERE id='$id'");
$menu = mysqli_fetch_assoc($sql);

if (!$menu) {
    header("Location: menus.php");
    exit();
}

if (isset($_POST['actualizar'])) {

    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($conn, $_POST['precio']);

    $imagen = $menu['imagen'];

    if ($_FILES['imagen']['name'] != "") {

        $imagen = time() . "_" . $_FILES['imagen']['name'];
        $tmp = $_FILES['imagen']['tmp_name'];

        move_uploaded_file($tmp, "../assets/uploads/menus/" . $imagen);

        if (!empty($menu['imagen']) && file_exists("../assets/uploads/menus/" . $menu['imagen'])) {
            unlink("../assets/uploads/menus/" . $menu['imagen']);
        }
    }

    mysqli_query($conn, "UPDATE menus SET
        nombre='$nombre',
        descripcion='$descripcion',
        precio='$precio',
        imagen='$imagen'
        WHERE id='$id'
    ");

    header("Location: menus.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Editar Menú</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/dashboard.css">

</head>

<body>

<?php include("../includes/navbar_admin.php"); ?>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-dark text-white">
<h3>✏️ Editar Menú</h3>
</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Nombre</label>
<input type="text" name="nombre" class="form-control"
value="<?php echo $menu['nombre']; ?>" required>
</div>

<div class="mb-3">
<label>Descripción</label>
<textarea name="descripcion" class="form-control" rows="4"><?php echo $menu['descripcion']; ?></textarea>
</div>

<div class="mb-3">
<label>Precio</label>
<input type="number" step="0.01" name="precio"
class="form-control"
value="<?php echo $menu['precio']; ?>" required>
</div>

<div class="mb-3">
<label>Imagen actual</label><br>

<img src="../assets/uploads/menus/<?php echo $menu['imagen']; ?>"
width="180"
class="img-thumbnail">
</div>

<div class="mb-3">
<label>Nueva imagen (opcional)</label>
<input type="file" name="imagen" class="form-control">
</div>

<button type="submit" name="actualizar" class="btn btn-success">
💾 Guardar Cambios
</button>

<a href="menus.php" class="btn btn-secondary">
Cancelar
</a>

</form>

</div>

</div>

</div>

</body>

</html>