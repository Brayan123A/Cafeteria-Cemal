<?php
session_start();
require_once("../config/conexion.php");


include '../includes/header.php';
include '../includes/navbar.php';

$mensaje = "";

if(isset($_POST['registrar'])){

    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $usuario = trim($_POST['usuario']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $password = trim($_POST['password']);
    $confirmar = trim($_POST['confirmar']);

    if(
        empty($nombre) ||
        empty($apellido) ||
        empty($usuario) ||
        empty($correo) ||
        empty($password) ||
        empty($confirmar)
    ){
        $mensaje = "<div class='alert alert-danger'>Todos los campos son obligatorios.</div>";
    }

    elseif($password != $confirmar){
        $mensaje = "<div class='alert alert-danger'>Las contraseñas no coinciden.</div>";
    }

    else{

        $verificar = $conn->prepare("SELECT id FROM usuarios WHERE usuario=? OR correo=?");
        $verificar->bind_param("ss",$usuario,$correo);
        $verificar->execute();
        $resultado = $verificar->get_result();

        if($resultado->num_rows > 0){

            $mensaje = "<div class='alert alert-warning'>El usuario o correo ya existen.</div>";

        }else{

            $passwordHash = password_hash($password,PASSWORD_DEFAULT);

            $foto = "default.png";

            $insertar = $conn->prepare("INSERT INTO usuarios(nombre,apellido,usuario,correo,telefono,password,foto)
            VALUES(?,?,?,?,?,?,?)");

            $insertar->bind_param(
                "sssssss",
                $nombre,
                $apellido,
                $usuario,
                $correo,
                $telefono,
                $passwordHash,
                $foto
            );

            if($insertar->execute()){

                $mensaje = "<div class='alert alert-success'>
                Usuario registrado correctamente.
                <br><a href='login.php'>Iniciar sesión</a>
                </div>";

            }else{

                $mensaje = "<div class='alert alert-danger'>
                Ocurrió un error al registrar.
                </div>";

            }

        }

    }

}
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Registro | Cafetería CEMAL</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header text-center bg-success text-white">

<h3>☕ Registro de Usuario</h3>

</div>

<div class="card-body">

<?php echo $mensaje; ?>

<form method="POST">

<div class="mb-3">
<label>Nombre</label>
<input type="text" name="nombre" class="form-control" required>
</div>

<div class="mb-3">
<label>Apellido</label>
<input type="text" name="apellido" class="form-control" required>
</div>

<div class="mb-3">
<label>Usuario</label>
<input type="text" name="usuario" class="form-control" required>
</div>

<div class="mb-3">
<label>Correo</label>
<input type="email" name="correo" class="form-control" required>
</div>

<div class="mb-3">
<label>Teléfono</label>
<input type="text" name="telefono" class="form-control">
</div>

<div class="mb-3">
<label>Contraseña</label>
<input type="password" name="password" class="form-control" required>
</div>

<div class="mb-3">
<label>Confirmar Contraseña</label>
<input type="password" name="confirmar" class="form-control" required>
</div>

<div class="d-grid">

<button type="submit" name="registrar" class="btn btn-success">
Registrarse
</button>

</div>

<div class="text-center mt-3">

¿Ya tienes una cuenta?

<a href="login.php">Iniciar sesión</a>

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
?>