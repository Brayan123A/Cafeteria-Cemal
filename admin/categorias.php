<?php
session_start();
include("../config/conexion.php");

if(!isset($_SESSION['admin'])){
    header("Location: ../auth/login.php");
    exit();
}

$categorias=mysqli_query($conn,"SELECT * FROM categorias");

include("../includes/header.php");
include("../includes/navbar.php");
?>

<section class="pagina">

<div class="container">

<div class="titulo-admin">

<h1>Categorías</h1>

<a href="agregar_categoria.php" class="btn">
+ Nueva Categoría
</a>

</div>

<div class="tabla-responsive">

<table class="tabla-admin">

<thead>

<tr>

<th>ID</th>

<th>Nombre</th>

<th>Descripción</th>

<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php while($fila=mysqli_fetch_assoc($categorias)){ ?>

<tr>

<td><?= $fila['id']; ?></td>

<td><?= $fila['nombre']; ?></td>

<td><?= $fila['descripcion']; ?></td>

<td>

<a href="editar_categoria.php?id=<?= $fila['id']; ?>" class="editar">
Editar
</a>

<a href="eliminar_categoria.php?id=<?= $fila['id']; ?>" class="eliminar"
onclick="return confirm('¿Eliminar categoría?')">
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