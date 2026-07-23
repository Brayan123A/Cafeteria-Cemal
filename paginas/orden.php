<?php
session_start();
include("../config/conexion.php");

if (!isset($_SESSION['id'])) {
    header("Location: ../auth/login.php");
    exit();
}

include '../includes/header.php';
include '../includes/navbar.php';

// Obtener los menús
$menus = mysqli_query($conn, "SELECT * FROM menus ORDER BY id DESC");

// Obtener promociones
$promociones = mysqli_query($conn, "SELECT * FROM promociones ORDER BY id DESC");
?>

<link rel="stylesheet" href="../assets/css/orden.css">
<div class="container py-5">

    <h2 class="text-center mb-4">☕ Menú de Cafetería CEMAL</h2>

    <div class="row">
        <?php while($menu = mysqli_fetch_assoc($menus)) { ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <img src="../uploads/menu/<?php echo $menu['imagen']; ?>"
                     class="card-img-top"
                     style="height:220px; object-fit:cover;">

                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $menu['nombre']; ?>
                    </h5>

                    <p class="card-text">
                        <?php echo $menu['descripcion']; ?>
                    </p>

                    <h4 class="text-success">
                        $<?php echo number_format($menu['precio'],2); ?>
                    </h4>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <hr class="my-5">

    <h2 class="text-center mb-4">🎉 Promociones</h2>

    <div class="row">
        <?php while($promo = mysqli_fetch_assoc($promociones)) { ?>
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <img src="../uploads/promociones/<?php echo $promo['imagen']; ?>"
                     class="card-img-top"
                     style="height:250px; object-fit:cover;">

                <div class="card-body">
                    <h4><?php echo $promo['titulo']; ?></h4>

                    <p><?php echo $promo['descripcion']; ?></p>

                    <span class="badge bg-danger">
                        Válido hasta:
                        <?php echo $promo['fecha_fin']; ?>
                    </span>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

</div>

<?php include("../includes/footer.php"); ?>