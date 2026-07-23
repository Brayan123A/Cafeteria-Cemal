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

$id = $_SESSION['id'];

$sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE id='$id'");
$admin = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Perfil Administrador</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/perfil_admin.css">

</head>

<body>

<?php include("../includes/navbar_admin.php"); ?>

<div class="container">

<div class="perfil-admin">

<div class="foto-admin">

<img src="../assets/img/admin.png" alt="Administrador">

</div>

<h2>Administrador</h2>

<table class="table">

<tr>
<th>Nombre</th>
<td><?php echo $admin['nombre']; ?></td>
</tr>

<tr>
<th>Correo</th>
<td><?php echo $admin['correo']; ?></td>
</tr>

<tr>
<th>Rol</th>
<td><?php echo ucfirst($admin['rol']); ?></td>
</tr>

<tr>
<th>Fecha de Registro</th>
<td><?php echo $admin['fecha_registro']; ?></td>
</tr>

</table>

<div class="botones">

<a href="dashboard.php" class="btn btn-primary">

🏠 Dashboard

</a>

<a href="../logout.php" class="btn btn-danger">

🚪 Cerrar Sesión

</a>

</div>

</div>

</div>

</body>

</html>