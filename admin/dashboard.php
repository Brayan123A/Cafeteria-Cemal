<?php
session_start();

if(!isset($_SESSION['id']) || $_SESSION['rol'] != 'admin'){
    header("Location: ../paginas/index.php");
    exit();
}

include("../config/conexion.php");
?>

include("../config/conexion.php");
include("../includes/header.php");
include("../includes/navbar.php");
?>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<div class="dashboard">

    <div class="dashboard-header">

        <h1>☕ Panel de Administración</h1>

        <p>
            Bienvenido,
            <strong><?php echo htmlspecialchars($_SESSION['nombre']); ?></strong>.
            Administra toda la información de Cafetería CEMAL desde este panel.
        </p>

    </div>

    <div class="cards">

        <div class="card">
            <h3>👥 Usuarios</h3>

            <?php
            $usuarios = mysqli_query($conn,"SELECT * FROM usuarios");
            ?>

            <span><?php echo mysqli_num_rows($usuarios); ?></span>

        </div>

        <div class="card">
            <h3>🍔 Menú</h3>

            <?php
            $menu = mysqli_query($conn,"SELECT * FROM menu");
            ?>

            <span><?php echo mysqli_num_rows($menu); ?></span>

        </div>

        <div class="card">
            <h3>📂 Categorías</h3>

            <?php
            $categorias = mysqli_query($conn,"SELECT * FROM categorias");
            ?>

            <span><?php echo mysqli_num_rows($categorias); ?></span>

        </div>

    </div>

    <div class="bienvenida">

        <h2>Bienvenido al Panel</h2>

        <p>
            Desde aquí puedes administrar usuarios,
            categorías y el menú de Cafetería CEMAL.
        </p>

    </div>

</div>

<?php include("../includes/footer.php"); ?>