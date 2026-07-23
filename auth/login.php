<?php
session_start();
include("../config/conexion.php");
include '../includes/header.php';
include '../includes/navbar.php';


if(isset($_POST['login'])){

    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $password = $_POST['password'];

    $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo='$correo'");

    if(mysqli_num_rows($sql) == 1){

        $usuario = mysqli_fetch_assoc($sql);

        // Verificar contraseña
        if(password_verify($password, $usuario['password'])){

            // Crear sesiones
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['correo'];
            $_SESSION['rol'] = $usuario['rol'];

            // Redirección según el rol
            if($usuario['rol'] == 'admin'){
                header("Location: ../admin/dashboard.php");
            }else{
                header("Location: ../paginas/index.php");
            }

            exit();

        }else{
            echo "<script>alert('Contraseña incorrecta'); window.history.back();</script>";
        }

    }else{
        echo "<script>alert('El correo no existe'); window.history.back();</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>
<link rel="stylesheet" href="../assets/css/style.css">

<link rel="stylesheet" href="../assets/css/login.css">

</head>

<body>

<form method="POST">

<h2>Iniciar Sesión</h2>

<input type="email" name="correo" placeholder="Correo" required>

<input type="password" name="password" placeholder="Contraseña" required>

<button name="login">Entrar</button>



<a href="../auth/registro.php">Crear cuenta</a>

</form>

</body>
</html>

<?php
include '../includes/footer.php';
?>