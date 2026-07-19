<?php
session_start();
include("../config/conexion.php");

if(!isset($_SESSION['admin'])){
    header("Location: ../auth/login.php");
    exit();
}

$comentarios=mysqli_query($conn,"SELECT * FROM comentarios");

include("../includes/header.php");
include("../includes/navbar.php");
?>

<section class="pagina">

<div class="container">

<h1>Comentarios de Clientes</h1>

<div class="tabla-responsive">

<table class="tabla-admin">

<thead>

<tr>

<th>ID</th>

<th>Usuario</th>

<th>Comentario</th>

<th>Fecha</th>

<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php while($fila=mysqli_fetch_assoc($comentarios)){ ?>

<tr>

<td><?= $fila['id']; ?></td>

<td><?= $fila['usuario']; ?></td>

<td><?= $fila['comentario']; ?></td>

<td><?= $fila['fecha']; ?></td>

<td>

<a href="eliminar_comentario.php?id=<?= $fila['id']; ?>" class="eliminar"
onclick="return confirm('¿Eliminar comentario?')">
Eliminar
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</section>

<?php include("../includes/footer.php"); ?>