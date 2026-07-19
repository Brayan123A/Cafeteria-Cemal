<?php
session_start();
include '../includes/header.php';
include '../includes/navbar.php';
?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">

<section class="hero">
    

<?php if(isset($_SESSION['id'])){ ?>

    <div class="bienvenida">
        <h1>☕ ¡Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</h1>

        <p>
            Gracias por iniciar sesión en <strong>Cafetería CEMAL</strong>.
        </p>

       
<?php }else{ ?>

    <div class="bienvenida">
        <h1>☕ Bienvenido a Cafetería CEMAL</h1>

        <p>
            Inicia sesión para disfrutar de todas las funciones de nuestra cafetería.
        </p>

        <a href="../auth/login.php" class="btn">
            Iniciar Sesión
        </a>
    </div>

<?php } ?>

</section>

<section class="bienvenida">
    <div class="container">

        <h2>☕ ¿Qué es Cafetería CEMAL?</h2>

        <p>
            Cafetería CEMAL es un espacio diseñado para ofrecer alimentos y bebidas de calidad en un ambiente cómodo, agradable y accesible para estudiantes, docentes y visitantes.

            Nuestro objetivo es brindar un servicio rápido y eficiente, ofreciendo café, desayunos, snacks, postres y bebidas preparadas con ingredientes frescos para que disfrutes cada momento en nuestra cafetería.
        </p>

    </div>
</section>

<?php include '../includes/footer.php'; ?>