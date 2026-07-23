

    <ul class="navbar-nav ms-auto">
 

    
    <li class="nav-item">
        <a class="nav-link active" href="../paginas/index.php">
            <i class="bi bi-house"></i>
            Inicio
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="../paginas/nosotros.php">
            <i class="bi bi-people"></i>
            Nosotros
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="../paginas/orden.php">
            <i class="bi bi-list"></i>
            Menú
        </a>
    </li>

     <!-- Solo visible para administradores -->
    <?php if(isset($_SESSION['rol']) && $_SESSION['rol']=="admin"){ ?>

    <li class="nav-item">
        <a class="nav-link" href="../admin/dashboard.php">
            🛠 Administrador
        </a>
    </li>
     <?php } ?>

    <?php if(isset($_SESSION['id'])){ ?>

        <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle"
               href="#"
               id="perfilDropdown"
               role="button"
               data-bs-toggle="dropdown">

                👤 <?php echo htmlspecialchars($_SESSION['nombre']); ?>

            </a>

            <ul class="dropdown-menu dropdown-menu-end">

                <li>
                    <a class="dropdown-item" href="../perfil.php">
                        👤 Perfil
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="../editar_perfil.php">
                        ✏️ Editar perfil
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <a class="dropdown-item text-danger" href="../auth/logout.php">
                        🚪 Cerrar sesión
                    </a>
                </li>

            </ul>

        </li>

    <?php }else{ ?>

        <li class="nav-item">
            <a href="../auth/login.php" class="nav-link">
                <i class="bi bi-box-arrow-in-right"></i>
                Iniciar sesión
            </a>
        </li>

        <li class="nav-item">
            <a href="../auth/registro.php" class="nav-link">
                <i class="bi bi-person-plus"></i>
                Registrarse
            </a>
        </li>

    <?php } ?>

</ul>
