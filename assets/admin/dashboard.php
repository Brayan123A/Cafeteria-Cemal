<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: paginas/login.php");
    exit();
}

$nombre = $_SESSION['nombre'];
$foto = $_SESSION['foto'] ?? "default.png";

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard | Cafetería CEMAL</title>


<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Iconos -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<!-- CSS Propio -->
<link rel="stylesheet" href="../assets/css/dashboard.css">


</head>


<body>


<?php include("../includes/navbar.php"); ?>


<div class="container-fluid">

<div class="row">


<!-- MENU LATERAL -->
<?php include("../includes/sidebar.php"); ?>



<!-- CONTENIDO -->

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 contenido">


<h1 class="mt-4">

<i class="bi bi-speedometer2"></i>

Dashboard

</h1>


<p>
Bienvenido nuevamente,
<strong>
<?php echo $nombre; ?>
</strong>
☕
</p>



<div class="row mt-4">



<div class="col-md-3">

<div class="card tarjeta shadow">

<div class="card-body">

<i class="bi bi-people icono"></i>

<h5>
Usuarios
</h5>

<h2>
120
</h2>

</div>

</div>

</div>





<div class="col-md-3">

<div class="card tarjeta shadow">

<div class="card-body">

<i class="bi bi-cup-hot icono"></i>

<h5>
Productos
</h5>

<h2>
45
</h2>

</div>

</div>

</div>





<div class="col-md-3">

<div class="card tarjeta shadow">

<div class="card-body">

<i class="bi bi-cart icono"></i>

<h5>
Pedidos
</h5>

<h2>
30
</h2>

</div>

</div>

</div>





<div class="col-md-3">

<div class="card tarjeta shadow">

<div class="card-body">

<i class="bi bi-currency-dollar icono"></i>

<h5>
Ventas
</h5>

<h2>
$5,000
</h2>

</div>

</div>

</div>



</div>





<div class="row mt-5">


<div class="col-md-7">


<div class="card shadow">

<div class="card-header titulo">

Pedidos recientes

</div>


<div class="card-body">


<table class="table">

<tr>

<th>
Cliente
</th>

<th>
Producto
</th>

<th>
Estado
</th>


</tr>


<tr>

<td>
Juan Pérez
</td>

<td>
Café Latte
</td>

<td>
<span class="badge bg-success">
Entregado
</span>
</td>


</tr>


<tr>

<td>
María López
</td>

<td>
Hamburguesa
</td>

<td>
<span class="badge bg-warning">
Pendiente
</span>
</td>

</tr>



</table>


</div>


</div>


</div>




<div class="col-md-5">


<div class="card shadow">


<div class="card-header titulo">

Perfil

</div>


<div class="card-body text-center">


<img src="../assets/uploads/perfiles/<?php echo $foto; ?>"
class="perfil">


<h4 class="mt-3">

<?php echo $nombre; ?>

</h4>


<a href="perfil.php" class="btn btn-success">

<i class="bi bi-person"></i>

Ver perfil

</a>


</div>


</div>


</div>


</div>



</main>



</div>

</div>




<?php include("../includes/footer.php"); ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>