<?php
session_start();
include("../config/conexion.php");
include '../includes/header.php';


if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}



$usuarios = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM usuarios"));
$menus = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM menus"));
$promociones = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM promociones"));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Cafetería CEMAL</title>
     <link rel="stylesheet" href="../assets/css/style.css">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/dashboard.css">

    <link rel="icon" href="../assets/img/logo.png">
</head>
<body>

<?php include("../includes/navbar_admin.php"); ?>

<div class="container mt-5">

    <div class="row align-items-center mb-5">

        <div class="col-md-8">

            <h1>☕ Bienvenido, Administrador</h1>

            <p>Este es el panel de administración de Cafetería CEMAL.</p>

        </div>

        <div class="col-md-4 text-center">

            <img src="../assets/img/cafe.png" class="img-fluid" width="250">

        </div>

    </div>

    <div class="row g-4">

        <div class="col-md-3">

            <div class="card shadow border-0 p-4">

                <h5>👤 Total Usuarios</h5>

                <h2><?php echo $usuarios['total']; ?></h2>

                <a href="usuarios.php" class="btn btn-outline-dark mt-3">
                    Ver usuarios
                </a>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow border-0 p-4">

                <h5>🍔 Total Menús</h5>

                <h2><?php echo $menus['total']; ?></h2>

                <a href="../admin/menus.php" class="btn btn-outline-dark mt-3">
                    Gestionar
                </a>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow border-0 p-4">

                <h5>🎉 Promociones</h5>

                <h2><?php echo $promociones['total']; ?></h2>

                <a href="promociones.php" class="btn btn-outline-dark mt-3">
                    Gestionar
                </a>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow border-0 p-4">

                <h5>⚙️ Perfil</h5>

                <p><?php echo $_SESSION['nombre']; ?></p>

                <a href="../admin/perfil.php" class="btn btn-dark mt-3">
                    Mi perfil
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>
<?php
include '../includes/footer.php';
?>