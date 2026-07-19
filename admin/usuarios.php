<?php
session_start();
include("../config/conexion.php");

if(!isset($_SESSION['admin'])){
    header("Location: ../auth/login.php");
    exit();
}

$usuarios = mysqli_query($conn, "SELECT * FROM usuarios");

include("../includes/header.php");
include("../includes/navbar.php");
?>

<section class="pagina">

<div class="container">

    <div class="titulo-admin">
        <h1>Administración de Usuarios</h1>
        <a href="agregar_usuario.php" class="btn">+ Nuevo Usuario</a>
    </div>

    <div class="tabla-responsive">

        <table class="tabla-admin">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

            <?php while($fila = mysqli_fetch_assoc($usuarios)){ ?>

                <tr>

                    <td><?= $fila['id']; ?></td>

                    <td>

                    <?php if(!empty($fila['foto'])){ ?>

                        <img src="../uploads/<?= $fila['foto']; ?>" class="foto-tabla">

                    <?php }else{ ?>

                        <img src="../assets/img/user.png" class="foto-tabla">

                    <?php } ?>

                    </td>

                    <td><?= $fila['nombre']; ?></td>

                    <td><?= $fila['correo']; ?></td>

                    <td><?= ucfirst($fila['rol']); ?></td>

                    <td>

                        <a href="editar_usuario.php?id=<?= $fila['id']; ?>" class="editar">
                            Editar
                        </a>

                        <a href="eliminar_usuario.php?id=<?= $fila['id']; ?>"
                           class="eliminar"
                           onclick="return confirm('¿Eliminar este usuario?')">
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