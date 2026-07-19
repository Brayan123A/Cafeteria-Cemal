<?php

session_start();

include('config/conexion.php');
include('includes/header.php');
include('includes/navbar.php');



if(!isset($_SESSION['id'])){

    header("Location: auth/login.php");
    exit();

}


$id = $_SESSION['id'];


$sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE id='$id'");

$usuario = mysqli_fetch_assoc($sql);



if(isset($_POST['actualizar'])){


    $nombre = mysqli_real_escape_string($conn,$_POST['nombre']);

    $correo = mysqli_real_escape_string($conn,$_POST['correo']);


    $foto = $usuario['foto'];



    if(!empty($_FILES['foto']['name'])){


        $nombreFoto = $_FILES['foto']['name'];

        $archivo = $_FILES['foto']['tmp_name'];


        $ruta = "assets/img/perfiles/".$nombreFoto;


        move_uploaded_file($archivo,$ruta);


        $foto = $nombreFoto;


    }



    $actualizar = mysqli_query($conn,

    "UPDATE usuarios SET

    nombre='$nombre',

    correo='$correo',

    foto='$foto'

    WHERE id='$id'

    ");



    if($actualizar){


        $_SESSION['nombre']=$nombre;


        echo "
        <script>
        alert('Perfil actualizado correctamente');
        window.location='perfil.php';
        </script>
        ";


    }


}


?>


<!DOCTYPE html>
<html>
<head>

<title>Editar Perfil - Cafetería CEMAL</title>

<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/editar_perfil.css">

</head>


<body>


<div class="container">


<h2>Editar Perfil</h2>


<<section class="editar-perfil">

<div class="formulario-perfil">

<h2>Editar Perfil</h2>

<form method="POST">

<div class="form-group">
<label>Nombre</label>
<input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>">
</div>

<div class="form-group">
<label>Nueva contraseña</label>
<input type="password" name="password">
</div>

<div class="form-group">
<label>Confirmar contraseña</label>
<input type="password" name="confirmar_password">
</div>

<div class="botones">

<button type="submit" name="actualizar" class="btn-guardar">
Guardar cambios
</button>

<a href="perfil.php" class="btn-cancelar">
Cancelar
</a>

</div>

</form>

</div>

</section>

</body>

</html>
<?php
include 'includes/footer.php';
?>