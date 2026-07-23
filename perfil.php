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

include("../includes/header.php");
include("../includes/navbar_admin.php");

$id = $_SESSION['id'];

$sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE id='$id'");
$admin = mysqli_fetch_assoc($sql);
?>

<link rel="stylesheet" href="../assets/css/">

<div class="container mt-5">

    <div class="perfil-card">

        <h2>👤 Perfil del Administrador</h2>

        <div class="perfil-info">

            <h3><?php echo htmlspecialchars($admin['nombre']); ?></h3>

            <p>Administrador de Cafetería CEMAL</p>

            <hr>

            <p><strong>Correo:</strong><br>
                <?php echo htmlspecialchars($admin['correo']); ?>
            </p>

            <p><strong>Rol:</strong><br>
                <?php echo ucfirst($admin['rol']); ?>
            </p>

            <p><strong>Fecha de Registro:</strong><br>
                <?php echo $admin['fecha_registro']; ?>
            </p>

        </div>

        <div class="botones">

            <a href="dashboard.php" class="btn-editar">
                🏠 Dashboard
            </a>

            <a href="../logout.php" class="btn-salir">
                🚪 Cerrar Sesión
            </a>

        </div>

    </div>

</div>

<?php include("../includes/footer.php"); ?>