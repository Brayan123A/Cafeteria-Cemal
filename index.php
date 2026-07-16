<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<link rel="stylesheet" href="assets/css/style.css">
<section class="hero">
    <div class="hero-content">
        <h1>Bienvenido a Cafetería CEMAL</h1>
        <p>El mejor café artesanal acompañado de deliciosos postres y un ambiente acogedor.</p>

        <a href="menu.php" class="btn">
            Ver Menú
        </a>
    </div>
</section>

<section class="bienvenida">
    <div class="container">

        <h2>¿Quiénes Somos?</h2>

        <p>
            En Cafetería CEMAL ofrecemos café de excelente calidad,
            bebidas frías y calientes, postres y alimentos preparados
            con ingredientes frescos para brindarte la mejor experiencia.
        </p>

    </div>
</section>

<section class="destacados">

    <div class="container">

        <h2>Productos Destacados</h2>

        <div class="cards">

            <div class="card">
                <img src="assets/img/cafe1.jpg">
                <h3>Capuchino</h3>
                <p>Café espresso con leche espumada.</p>
            </div>

            <div class="card">
                <img src="assets/img/cafe2.jpg">
                <h3>Latte</h3>
                <p>Suave y cremoso.</p>
            </div>

            <div class="card">
                <img src="assets/img/pastel.jpg">
                <h3>Pastel de Chocolate</h3>
                <p>Preparado diariamente.</p>
            </div>

        </div>

    </div>

</section>

<section class="promocion">

    <div class="container">

        <h2>Promoción del Mes</h2>

        <h3>2x1 en Capuchino</h3>

        <p>Todos los martes.</p>

    </div>

</section>

<?php
include 'includes/footer.php';
?>