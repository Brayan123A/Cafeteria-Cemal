<?php
session_start();
include("../config/conexion.php");

if(!isset($_SESSION['admin'])){
    header("Location: ../auth/login.php");
    exit();
}

$menus = mysqli_query($conn,"SELECT * FROM menus");

include("../includes/header.php");
include("../includes/navbar.php");
?>

<section class="pagina">

<div class="container">

<div class="titulo-admin">
<h1>Administración del Menú</h1>

<a href="agregar_menu.php" class="btn">
+ Agregar Platillo
</a>

</div>

<div class="tabla-responsive">

<table class="tabla-admin">

<thead>

<tr>

<th>ID</th>
<th>Imagen</th>
<th>Nombre</th>
<th>Categoría</th>
<th>Precio</th>
<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php while($fila=mysqli_fetch_assoc($menus)){ ?>

<tr>

<td><?= $fila['id']; ?></td>

<td>

<img src="../uploads/<?= $fila['imagen']; ?>" class="foto-tabla">

</td>

<td><?= $fila['nombre']; ?></td>

<td><?= $fila['categoria']; ?></td>

<td>$<?= $fila['precio']; ?></td>

<td>

<a href="editar_menu.php?id=<?= $fila['id']; ?>" class="editar">
Editar
</a>

<a href="eliminar_menu.php?id=<?= $fila['id']; ?>" class="eliminar"
onclick="return confirm('¿Eliminar este platillo?')">
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