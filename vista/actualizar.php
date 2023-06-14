<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['correo']) || !isset($_SESSION['permisos'])) {
  header('Location: ../../controlador/cerrarsesion.php');
}

// Verificar permisos
if ($_SESSION['permisos'][4] == false) {
  header("location: ../login.php");
}

include('../controlador/conexion.php');
include('../controlador/modificar.php');
$id = $_GET["id"];
$sql = $conexion->query(" SELECT * FROM usuario WHERE id_Usuario=$id ");
?>
<!DOCTYPE html>
<html>

<head>
  <title>Registrar usuario</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <form class="col-4 p-3 m-auto" action="###########.php" method="post">
    <h3 class="text-center text-secondary">modificar usuario</h3>
    <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
    <?php
    while ($datos = $sql->fetch_object()) { ?>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Documento</label>
        <input type="text" class="form-control" name="documento" value="<?= $datos->documento ?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">nombre</label>
        <input type="text" class="form-control" name="nombre_usuario" value="<?= $datos->nombre_usuario ?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Apellido</label>
        <input type="text" class="form-control" name="apellido_usuario" value="<?= $datos->apellido_usuario ?>">
      </div>
      <select class="form-control" required name="estado">
        <option value="<?= $datos->estado ?>" disabled selected>Selecciona una opción</option>
        <option value="Activo">Activo</option>
        <option value="Inactivo">Inactivo</option>
      </select>
      </select>
      <select class="form-control" required name="id_Rol">
        <option value="" disabled selected>Selecciona una opción</option>
        <option value="1">Administrador</option>
        <option value="2">Empleado</option>
      </select>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">correo</label>
        <input type="email" class="form-control" name="correo" value="<?= $datos->correo ?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">contraseña</label>
        <input type="password" class="form-control" name="contraseña" value="<?= $datos->contraseña ?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Telefono</label>
        <input type="text" class="form-control" name="telefono" value="<?= $datos->telefono ?>">
      </div>
    <?php }
    ?>
    <button type="submit" class="btn btn-primary" name="guardar">modificar</button>
  </form>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>