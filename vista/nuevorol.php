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
          <h3>Crear nuevo rol</h3>
        </center>

        <div>
          <form class="p-3 m-auto " action="../controlador/nuevorol.php" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre del rol</label>
              <input type="text" class="form-control" name="nombre_rol">
            </div>

            <label for="exampleInputEmail1" class="form-label">Privilegios</label>
            <div style="columns: 5;">
              <?php
              $permisos = $conexion->query("SELECT * FROM permisos ");
              while ($permiso = $permisos->fetch_object()) {
              ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="permiso-<?= $permiso->Id_permiso  ?>" name="permisos[]" value="<?= $permiso->Id_permiso  ?>">
                  <label class="form-check-label" for="permiso-<?= $permiso->Id_permiso  ?>">
                    <?= $permiso->Nom_permiso ?>
                  </label>
                </div>
              <?php } ?>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
          </form>
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