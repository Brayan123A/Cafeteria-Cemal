<?php
$pagina = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background:#4E342E;">

    <div class="container">

        <a class="navbar-brand d-flex align-items-center" href="../admin/dashboard.php">

           

            <strong>Cafetería CEMAL</strong>

        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menuAdmin">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="menuAdmin">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link <?= ($pagina=="dashboard.php") ? "active" : ""; ?>"
                       href="../admin/dashboard.php">
                       🏠 Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($pagina=="usuarios.php") ? "active" : ""; ?>"
                       href="../admin/usuarios.php">
                       👤 Usuarios
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($pagina=="menus.php") ? "active" : ""; ?>"
                       href="../admin/menus.php">
                       🍔 Menús
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($pagina=="promociones.php") ? "active" : ""; ?>"
                       href="../admin/promociones.php">
                       🎉 Promociones
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($pagina=="perfil.php") ? "active" : ""; ?>"
                       href="perfil.php">
                       👤 Perfil
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../auth/logout.php" class="btn btn-cerrar">
    🚪 Cerrar sesión
</a>
                </li>

            </ul>

        </div>

    </div>

</nav>