<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['correo']) || !isset($_SESSION['permisos'])) {
  header('Location: ../login.php');
}

// Verificar permisos
if ($_SESSION['permisos'][33] == false) {
  header("location: ../login.php");
}

include('../controlador/conexion.php');
include('../controlador/validar.php');
include('html/menu.php');
include('../controlador/eliminar.php'); ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="html/assets/css/styles.css" />
  <link href="html/assets/css/styles.min.css" rel="stylesheet" type="text/css">
  <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/7e72a5dd7c.js" crossorigin="anonymous"></script>
  <script src="js/icons.js"></script>
  <script src="js/script.js"></script>
  <title>entreespacies</title>
</head>

<body>
  <div class="container-fluid">
    <div class="pagina">
      <div class="container mt-2">
        <div class="row">
          <div class="col-10 bg-success">
          </div>
          <div class="col-15 bg-primary"></div>
        </div>
        <center>
          <h3>Roles de usuario</h3>
          <div class="d-flex flex-row-reverse mb-2">
            <a href="nuevorol.php" class="btn btn-success">
              <i class="fa-sharp fa-solid fa-plus"></i>
              Crear nuevo
            </a>
          </div>
          <div>
            <center>
              <table class="table">
                <thead class="bg-info">
                  <tr>
                    <th class="col-1" scope="col">ID</th>
                    <th scope="col">Nombre de rol</th>
                    <th scope="col">Permisos y privilegios</th>
                    <th class="col-2" scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $roles_resultados = $conexion->query("SELECT * FROM roles ");
                  $roles = $roles_resultados->fetch_all(MYSQLI_ASSOC);

                  $permisos_resultados = $conexion->query("SELECT * FROM permisos");
                  $permisos = $permisos_resultados->fetch_all(MYSQLI_ASSOC);


                  foreach ($roles as $rol) {
                    $role_perm_resultados = $conexion->query("SELECT * FROM role_permisos WHERE Id_Rol=$rol[Id_Rol]");
                    $permiso_activo = [];
                    while ($estado_rol = $role_perm_resultados->fetch_array()) {
                      $id_permiso = $estado_rol['Id_permiso'];
                      $permiso_activo[$id_permiso] = 'checked';
                    }
                  ?>
                    <tr>
                      <td><?= $rol['Id_Rol']  ?></td>
                      <td><?= $rol['Nom_Rol'] ?></td>
                      <td>
                        <small style="display:block; columns: 4;">
                          <?php
                          foreach ($permisos as $permiso) {
                            $id_perm = $permiso['Id_permiso'];
                          ?>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="permiso-<?= $id_perm  ?>" <?php if (isset($permiso_activo[$id_perm])) echo 'checked' ?> disabled>
                              <label class="form-check-label" for="permiso-<?= $id_perm  ?>">
                                <?= $permiso['Nom_permiso'] ?>
                              </label>
                            </div>
                          <?php } ?>
                        </small>
                      </td>
                      <td>
                        <a href="actualizarrol.php?id=<?= $rol['Id_Rol']  ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>

                        <a href="../controlador/eliminarrol.php?id=<?= $rol['Id_Rol']  ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>

                      </td>
          </div>
          </tr>
        <?php }
        ?>
        </tbody>
        </table>
        </center>
      </div>
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script src="script.js"></script>
      <script src="html/assets/js/sidebarmenu.js"></script>
    </div>
  </div>
</body>

</html>