<?php
session_start();
include("config/conexion.php");

include('includes/header.php');
include('includes/navbar.php');


if (!isset($_SESSION['id'])) {
    header("Location: auth/login.php");
    exit();
}

$id = $_SESSION['id'];

$sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE id='$id'");
$usuario = mysqli_fetch_assoc($sql);


?>

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/perfil.css">

<section class="profile-section">

    <div class="profile-card">

      

        <h2><?php echo htmlspecialchars($usuario['nombre']); ?></h2>

        

        <div class="profile-details">

            <div class="profile-item">
                <span class="label">Nombre:</span>
                <span class="value">
                    <?php echo htmlspecialchars($usuario['nombre']); ?>
                </span>
            </div>

            <div class="profile-item">
                <span class="label">Correo:</span>
                <span class="value">
                    <?php echo htmlspecialchars($usuario['correo']); ?>
                </span>
            </div>

            <div class="profile-item">
                <span class="label">Rol:</span>
                <span class="value">
                    <?php echo ucfirst($usuario['rol']); ?>
                </span>
            </div>

            <div class="profile-item">
                <span class="label">Registrado:</span>
                <span class="value">
                    <?php echo $usuario['fecha_registro']; ?>
                </span>
            </div>

        </div>

        <div class="form-actions">

            <a href="editar_perfil.php" class="btn-submit">
                Editar Perfil
            </a>

            <a href="logout.php" class="btn-cancel">
                Cerrar Sesión
            </a>

        </div>

    </div>

</section>

<?php include("includes/footer.php"); ?>