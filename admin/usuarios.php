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

$usuarios = mysqli_query($conn, "SELECT * FROM usuarios ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/usuarios.css">
</head>

<body>

<?php include("../includes/navbar_admin.php"); ?>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-dark text-white">
            <h3>👤 Usuarios Registrados</h3>
        </div>

        <div class="card-body">

            <table class="table table-hover text-center">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Fecha Registro</th>
                        <th>Acción</th>

                    </tr>

                </thead>

                <tbody>

                <?php while($fila = mysqli_fetch_assoc($usuarios)){ ?>

                <tr>

                    <td><?= $fila['id']; ?></td>

                    <td><?= $fila['nombre']; ?></td>

                    <td><?= $fila['correo']; ?></td>

                    <td>

                        <?php if($fila['rol']=="admin"){ ?>

                            <span class="badge bg-success">Administrador</span>

                        <?php }else{ ?>

                            <span class="badge bg-primary">Usuario</span>

                        <?php } ?>

                    </td>

                    <td><?= $fila['fecha_registro']; ?></td>

                    <td>

                        <?php if($fila['id'] != $_SESSION['id']){ ?>

                        <a href="eliminar_usuario.php?id=<?= $fila['id']; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('¿Eliminar usuario?')">

                            🗑 Eliminar

                        </a>

                        <?php }else{ ?>

                        <span class="badge bg-secondary">

                            Sesión actual

                        </span>

                        <?php } ?>

                    </td>

                </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>