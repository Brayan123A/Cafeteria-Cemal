<?php

session_start();

include("../config/conexion.php");


// validar administrador
if(!isset($_SESSION['usuario']) || $_SESSION['rol'] != "admin"){

    header("Location: ../login.php");
    exit();

}


// Guardar menú

if(isset($_POST['guardar'])){


    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $tipo = $_POST['tipo'];


    // imagen
    $imagen = $_FILES['imagen']['name'];
    $ruta = "../assets/img/menu/".$imagen;


    move_uploaded_file(
        $_FILES['imagen']['tmp_name'],
        $ruta
    );


    $sql = "INSERT INTO menus
    (nombre,descripcion,precio,imagen,tipo)

    VALUES

    ('$nombre',
    '$descripcion',
    '$precio',
    '$imagen',
    '$tipo')";


    mysqli_query($conn,$sql);


    echo "<script>
    alert('Menú agregado correctamente');
    window.location='menu.php';
    </script>";

}


?>


<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Administrador - Menú CEMAL</title>

<link rel="stylesheet" href="../assets/css/admin.css">

</head>


<body>


<h1>
Panel de Menús Cafetería CEMAL
</h1>



<form method="POST" enctype="multipart/form-data">


<label>
Nombre del producto
</label>

<input 
type="text" 
name="nombre"
required>



<label>
Descripción
</label>

<textarea 
name="descripcion"
required>
</textarea>



<label>
Precio
</label>

<input 
type="number"
name="precio"
required>



<label>
Tipo
</label>

<select name="tipo">

<option value="menu">
Menú
</option>


<option value="promocion">
Promoción
</option>

</select>



<label>
Imagen
</label>

<input 
type="file"
name="imagen"
required>



<button name="guardar">
Guardar Menú
</button>



</form>



</body>

</html>