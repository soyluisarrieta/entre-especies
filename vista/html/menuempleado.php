<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['correo']) || !isset($_SESSION['permisos'])) {
  header('Location: ../../controlador/cerrarsesion.php');
}

// Verificar permisos
if ($_SESSION['permisos'][3] == false) {
  header('Location: ../../controlador/cerrarsesion.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="html/assets/css/styles.min.css" />
  <link rel="stylesheet" href="html/assets/css/styles.css" />
  <title>Document</title>
</head>

<body>

  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="html/assets/images/logos/dark-logo.svg" width="180" alt="fotossss" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">INICIO</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="html/indEmpleado.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <span class="hide-menu">OPCIONES</span>
            </li>

            <?php if ($_SESSION['permisos'][4] == true) { ?>
              <li class="sidebar-item">
                <a class="sidebar-link" href="usuarioempleado.php" aria-expanded="false">
                  <span class="hide-menu">USUARIOS</span>
                </a>
              </li>
            <?php } ?>

            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                <span class="hide-menu">CLIENTES</span>
              </a>
            </li>

            <?php if ($_SESSION['permisos'][11] == true) { ?>
              <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                  <span class="hide-menu">MASCOTAS</span>
                </a>
              </li>
            <?php } ?>

            <?php if ($_SESSION['permisos'][23] == true) { ?>
              <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                  <span class="hide-menu">COMPRAS</span>
                </a>
              </li>
            <?php } ?>

            <?php if ($_SESSION['permisos'][42] == true) { ?>
              <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                  <span class="hide-menu">PRODUCTOS</span>
                </a>
              </li>
            <?php } ?>

            <?php if ($_SESSION['permisos'][18] == true) { ?>
              <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                  <span class="hide-menu">VENTAS</span>
                </a>
              </li>
            <?php } ?>

            <?php if ($_SESSION['permisos'][27] == true) { ?>
              <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                  <span class="hide-menu">CITAS</span>
                </a>
              </li>
            <?php } ?>

            <?php if ($_SESSION['permisos'][46] == true) { ?>
              <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                  <span class="hide-menu">PROVEEDORES</span>
                </a>
              </li>
            <?php } ?>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">cuenta</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../controlador/cerrarsesion.php" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">CERRAR SESION</span>
              </a>
            </li>
      </div>
  </div>
  </nav>
  <!-- End Sidebar navigation -->
  <header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
          <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-icon-hover" href="javascript:void(0)">
            <i class="ti ti-bell-ringing"></i>
            <div class="notification bg-primary rounded-circle"></div>
          </a>
        </li>
      </ul>
      <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
          <li class="nav-item dropdown">
            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
              <?php
              $user = $_SESSION['correo'];
              echo $_SESSION['correo'];
              ?>
              <img src="html/assets/images/profile/admins.png" alt="" width="35" height="35" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
              <div class="message-body">
                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="ti ti-user fs-6"></i>
                  <p class="mb-0 fs-3">ADMINISTRADORA</p>
                </a>
                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="ti ti-mail fs-6"></i>
                  <p class="mb-0 fs-3">MARIA ISABEL</p>
                </a>
                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="ti ti-list-check fs-6"></i>
                  <p class="mb-0 fs-3">DUEÑA</p>
                </a>
                <a href="../login.php" class="btn btn-outline-primary mx-3 mt-2 d-block">SALIR</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- End Sidebar scroll-->
  </aside>
</body>

</html>