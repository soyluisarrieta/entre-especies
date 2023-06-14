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

include('../../controlador/validar.php');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ENTRE ESPECIES</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/logo.jpeg" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="assets/images/logos/dark-logo.svg" width="180" alt="" />
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
              <a class="sidebar-link" href="indEmpleado.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <span class="hide-menu">OPCIONES</span>
            </li>

            <?php if ($_SESSION['permisos'][6] == true) { ?>
              <li class="sidebar-item">
                <a class="sidebar-link" href="../usuarioempleado.php" aria-expanded="false">
                  <span class="hide-menu">USUARIOS</span>
                </a>
              </li>
            <?php } ?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-form.html" aria-expanded="false">
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
              <a class="sidebar-link" href="../../controlador/cerrarsesion.php" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">CERRAR SESESION</span>
              </a>
            </li>
      </div>
  </div>
  </nav>
  <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->
  <!--  Main wrapper -->
  <div class="body-wrapper">
    <!--  Header Start -->
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
                <img src="assets/images/profile/EMPLEADO.png" alt="" width="35" height="35" class="rounded-circle">
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                <div class="message-body">
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-user fs-6"></i>
                    <p class="mb-0 fs-3">EMPLEADO</p>
                  </a>
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-mail fs-6"></i>
                    <p class="mb-0 fs-3">TIAGUITO </p>
                  </a>
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-list-check fs-6"></i>
                    <p class="mb-0 fs-3">TAXISTA</p>
                  </a>
                  <a href="./indAdministrador.html" class="btn btn-outline-primary mx-3 mt-2 d-block">SALIR</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!--  Header End -->
    <div class="container-fluid">
      <!--  Row 1 -->
      <div class="row">
        <div class="col-lg-8 d-flex align-items-strech">
          <div class="card w-100">
            <div class="card-body">
              <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                <div class="mb-3 mb-sm-0">
                  <h5 class="card-title fw-semibold">VENTAS DE TODA ESTA SEMANA</h5>
                </div>
                <div>
                  <select class="form-select">
                    <option value="1">Marzo 2023</option>
                    <option value="2">Abril 2023</option>
                    <option value="3">Mayo 2023</option>
                    <option value="4">Junio 2023</option>
                  </select>
                </div>
              </div>
              <div id="chart"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="row">
            <div class="col-lg-12">
              <!-- Yearly Breakup -->
              <div class="card overflow-hidden">
                <div class="card-body p-4">
                  <h5 class="card-title mb-9 fw-semibold">GANANCIAS POR VACUNACION</h5>
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h4 class="fw-semibold mb-3">$36,358</h4>
                      <div class="d-flex align-items-center mb-3">
                        <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                          <i class="ti ti-arrow-up-left text-success"></i>
                        </span>
                        <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                        <p class="fs-3 mb-0">MES DE ENERO</p>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="me-4">
                          <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                          <span class="fs-2">2023</span>
                        </div>
                        <div>
                          <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                          <span class="fs-2">2023</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="d-flex justify-content-center">
                        <div id="breakup"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <!-- Monthly Earnings -->
              <div class="card">
                <div class="card-body">
                  <div class="row alig n-items-start">
                    <div class="col-8">
                      <h5 class="card-title mb-9 fw-semibold"> VENTAS POR CUIDO DOG CHOW </h5>
                      <h4 class="fw-semibold mb-3">$6,820</h4>
                      <div class="d-flex align-items-center pb-1">
                        <span class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                          <i class="ti ti-arrow-down-right text-danger"></i>
                        </span>
                        <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                        <p class="fs-3 mb-0">MES PASADO</p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="d-flex justify-content-end">
                        <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-currency-dollar fs-6"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="earning"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">
          <div class="card w-100">
            <div class="card-body p-4">
              <div class="mb-4">
                <h5 class="card-title fw-semibold">AGREGAR TAREA</h5>
              </div>
              <ul class="timeline-widget mb-0 position-relative mb-n5">
                <li class="timeline-item d-flex position-relative overflow-hidden">
                  <div class="timeline-time text-dark flex-shrink-0 text-end">09:30</div>
                  <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                    <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                  </div>
                  <div class="timeline-desc fs-3 text-dark mt-n1">CASTRACION PAREJA DE SHIH TZU</div>
                </li>
                <li class="timeline-item d-flex position-relative overflow-hidden">
                  <div class="timeline-time text-dark flex-shrink-0 text-end">10:00 am</div>
                  <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                    <span class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                  </div>
                  <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">NUEVA VACUNACION <a href="javascript:void(0)" class="text-primary d-block fw-normal">HUSKYY SIBERIANO</a>
                  </div>
                </li>
                <li class="timeline-item d-flex position-relative overflow-hidden">
                  <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
                  <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                    <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                  </div>
                  <div class="timeline-desc fs-3 text-dark mt-n1">RENOVAR INVENTARIO</div>
                </li>
                <li class="timeline-item d-flex position-relative overflow-hidden">
                  <div class="timeline-time text-dark flex-shrink-0 text-end">11:30 am</div>
                  <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                    <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                  </div>
                  <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">PELUQUERIA <a href="javascript:void(0)" class="text-primary d-block fw-normal">GOLDEN</a>
                  </div>
                </li>
                <li class="timeline-item d-flex position-relative overflow-hidden">
                  <div class="timeline-time text-dark flex-shrink-0 text-end">03:30 Pm</div>
                  <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                    <span class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                  </div>
                  <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">BAÑADO DE MASCOTA SANTIAGO
                  </div>
                </li>
                <li class="timeline-item d-flex position-relative overflow-hidden">
                  <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
                  <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                    <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                  </div>
                  <div class="timeline-desc fs-3 text-dark mt-n1">CONFIRMAR CITAS DISPONIBLES</div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8 d-flex align-items-stretch">
          <div class="card w-100">
            <div class="card-body p-4">
              <h5 class="card-title fw-semibold mb-4">TAREAS DISPONIBLES</h5>
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Id</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">ASIGNACION</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">NOMBRE</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">PRIORIDAD</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">PRECIO</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">1</h6>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1">PEDICURE</h6>
                        <span class="fw-normal">CHIHUAHUA</span>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">DANIEL SEBASTIAN</p>
                      </td>
                      <td class="border-bottom-0">
                        <div class="d-flex align-items-center gap-2">
                          <span class="badge bg-primary rounded-3 fw-semibold">NO HECHA</span>
                        </div>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0 fs-4">$25.000</h6>
                      </td>
                    </tr>
                    <tr>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">2</h6>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1">BAÑADO Y CEPILLADO</h6>
                        <span class="fw-normal">LABRADOR RETRIEVER</span>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">LUISA CAMILA ROJAS</p>
                      </td>
                      <td class="border-bottom-0">
                        <div class="d-flex align-items-center gap-2">
                          <span class="badge bg-secondary rounded-3 fw-semibold">POR HACER</span>
                        </div>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0 fs-4">$32.000 </h6>
                      </td>
                    </tr>
                    <tr>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">3</h6>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1">OPERACION </h6>
                        <span class="fw-normal">BULLDOG</span>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">MARIA JULIETA</p>
                      </td>
                      <td class="border-bottom-0">
                        <div class="d-flex align-items-center gap-2">
                          <span class="badge bg-danger rounded-3 fw-semibold">IMPORTANTE</span>
                        </div>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0 fs-4">$68.000</h6>
                      </td>
                    </tr>
                    <tr>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">4</h6>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1">Vacuncaion y peluqeria</h6>
                        <span class="fw-normal">PASTOR ALEMAN</span>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">JULIAN OCAMPO</p>
                      </td>
                      <td class="border-bottom-0">
                        <div class="d-flex align-items-center gap-2">
                          <span class="badge bg-success rounded-3 fw-semibold">URGENTE</span>
                        </div>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0 fs-4">$112.0000</h6>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-xl-3">
          <div class="card overflow-hidden rounded-2">
            <div class="position-relative">
              <a href="javascript:void(0)"><img src="assets/images/products/cuido1.jfif" class="card-img-top rounded-0" alt="..."></a>
              <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
            </div>
            <div class="card-body pt-3 p-4">
              <h6 class="fw-semibold fs-4">DOG CHOW</h6>
              <div class="d-flex align-items-center justify-content-between">
                <h6 class="fw-semibold fs-4 mb-0">17.500</h6>
                <ul class="list-unstyled d-flex align-items-center mb-0">
                  <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card overflow-hidden rounded-2">
            <div class="position-relative">
              <a href="javascript:void(0)"><img src="assets/images/products/cuido 2.jfif" class="card-img-top rounded-0" alt="..."></a>
              <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
            </div>
            <div class="card-body pt-3 p-4">
              <h6 class="fw-semibold fs-4">MAX RAZA GRANDE</h6>
              <div class="d-flex align-items-center justify-content-between">
                <h6 class="fw-semibold fs-4 mb-0">$15.000</h6>
                <ul class="list-unstyled d-flex align-items-center mb-0">
                  <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card overflow-hidden rounded-2">
            <div class="position-relative">
              <a href="javascript:void(0)"><img src="assets/images/products/cuido3.jfif" class="card-img-top rounded-0" alt="..."></a>
              <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
            </div>
            <div class="card-body pt-3 p-4">
              <h6 class="fw-semibold fs-4">GASTROINTESTINAL</h6>
              <div class="d-flex align-items-center justify-content-between">
                <h6 class="fw-semibold fs-4 mb-0">$20.0000</h6>
                <ul class="list-unstyled d-flex align-items-center mb-0">
                  <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card overflow-hidden rounded-2">
            <div class="position-relative">
              <a href="javascript:void(0)"><img src="assets/images/products/cuido5.jfif" class="card-img-top rounded-0" alt="..."></a>
              <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
            </div>
            <div class="card-body pt-3 p-4">
              <h6 class="fw-semibold fs-4">RICOCAN</h6>
              <div class="d-flex align-items-center justify-content-between">
                <h6 class="fw-semibold fs-4 mb-0">$22.0000</h6>
                <ul class="list-unstyled d-flex align-items-center mb-0">
                  <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a></p>
      </div>
    </div>
  </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/js/dashboard.js"></script>
</body>

</html>