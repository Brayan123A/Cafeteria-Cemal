<?php
include("../config/conexion.php");
include '../includes/header.php';
include '../includes/navbar.php';
$mensaje = "";

if(isset($_POST['registrar'])){

    $nombre = mysqli_real_escape_string($conn,$_POST['nombre']);
    $correo = mysqli_real_escape_string($conn,$_POST['correo']);

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = mysqli_query($conn,"INSERT INTO usuarios(nombre,correo,password)
    VALUES('$nombre','$correo','$password')");

    if($sql){
        $mensaje="Usuario registrado correctamente";
    }else{
        $mensaje="Error al registrar";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Registro</title>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>

<form method="POST">

<h2>Registro</h2>

<input type="text" name="nombre" placeholder="Nombre" required>

<input type="email" name="correo" placeholder="Correo" required>

<input type="password" name="password" placeholder="Contraseña" required>

<button name="registrar">Registrarse</button>

<p><?php echo $mensaje; ?></p>

<a href="login.php">Ya tengo cuenta</a>

</form>

</body>
</html>

<?php
include '../includes/footer.php';
?>