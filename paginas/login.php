<?php
session_start();
require_once("../config/conexion.php");


include '../includes/header.php';
include '../includes/navbar.php';



// Si ya inició sesión
if (isset($_SESSION['id'])) {
   header("Location: admin/dashboard.php");
    exit();
}

$mensaje = "";

if (isset($_POST['login'])) {

    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    if (empty($usuario) || empty($password)) {

        $mensaje = "<div class='alert alert-danger'>
                        Completa todos los campos.
                    </div>";

    } else {

        $sql = "SELECT * FROM usuarios
                WHERE usuario = ? OR correo = ?
                LIMIT 1";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $usuario, $usuario);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($resultado->num_rows == 1) {

            $fila = $resultado->fetch_assoc();

            if (password_verify($password, $fila['password'])) {

                $_SESSION['id'] = $fila['id'];
                $_SESSION['nombre'] = $fila['nombre'];
                $_SESSION['apellido'] = $fila['apellido'];
                $_SESSION['usuario'] = $fila['usuario'];
                $_SESSION['correo'] = $fila['correo'];
                $_SESSION['foto'] = $fila['foto'];

                header("Location: dashboard.php");
                exit();

            } else {

                $mensaje = "<div class='alert alert-danger'>
                                Contraseña incorrecta.
                            </div>";
            }

        } else {

            $mensaje = "<div class='alert alert-danger'>
                            El usuario no existe.
                        </div>";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Iniciar Sesión | Cafetería CEMAL</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-5">

<div class="card shadow">

<div class="card-header bg-success text-white text-center">

<h3>☕ Cafetería CEMAL</h3>
<p class="mb-0">Iniciar Sesión</p>

</div>

<div class="card-body">

<?php echo $mensaje; ?>

<form method="POST">

<div class="mb-3">
<label>Usuario o Correo</label>
<input
type="text"
name="usuario"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Contraseña</label>
<input
type="password"
name="password"
class="form-control"
required>
</div>

<div class="d-grid">

<button
type="submit"
name="login"
class="btn btn-success">

Iniciar Sesión

</button>

</div>

<div class="text-center mt-3">

¿No tienes una cuenta?

<a href="registro.php">
Registrarse
</a>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>

<?php
include '../includes/footer.php';