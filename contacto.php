<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="pagina">

<div class="container">

<h1>Contáctanos</h1>

<form action="enviar.php" method="POST">

<input
type="text"
name="nombre"
placeholder="Nombre"
required>

<input
type="email"
name="correo"
placeholder="Correo"
required>

<textarea
name="mensaje"
placeholder="Mensaje"
required>
</textarea>

<button type="submit">
Enviar
</button>

</form>

</div>

</section>

<?php
include 'includes/footer.php';
?>