<header id="header" class="d-flex navbar fixed-top">
  <div class="col-1">
    <a href="index.php"><img class="logo" src="./img/logo.png" alt="logo" title="logo"></a>
  </div>
  <div class="col-9">
    <ul class="menu_superior">
      <li class="menu_sup_item">
        <a href="index.php">Inicio</a>
      </li>
      <li class="menu_sup_item">
        <a href="index.php#ancla_eventos">Eventos</a>
      </li>
      <li class="menu_sup_item">
        <a href="#footer">Contacto</a>
      </li>

    </ul>
  </div>
  <div class="col-2 sesion" style="color: white">
    <?php
    if (isset($_SESSION["nombre_empresa"])) {
    ?>
      <div class="btn-group">
        <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $_SESSION['nombre_empresa']; ?>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="perfil.php">Mi perfil</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
      </div>
    <?php
    } else {
    ?>
      <a href='login.php' data-bs-toggle='modal' data-bs-target='#loginModal'>
        <button type='button' class='btn btn-outline-warning'>Iniciar Sesión</button>
      </a>
    <?php
    }
    ?>

  </div>

</header>