<?php

if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['correo']) || !isset($_SESSION['permisos'])) {
  header('Location: ../login.php');
}

// Verificar permisos
if ($_SESSION['permisos'][1] == false) {
  header("location: ../login.php");
}

include('../controlador/conexion.php');
include('../controlador/registrarusu.php');

?>
<!DOCTYPE html>
<html>

<head>
  <title>Registrar usuario</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <form class="col-4 p-3 m-auto " action="../controlador/registrarusu.php" method="post">
    <h3 class="text-center text-secondary">Registro de usuario</h3>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Documento</label>
      <input type="text" class="form-control" name="documento">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">nombre</label>
      <input type="text" class="form-control" name="nombre_usuario">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Apellido</label>
      <input type="text" class="form-control" name="apellido_usuario">
    </div>
    <label for="">estado</label>
    <select class="form-control" required name="estado">
      <option value="" disabled selected>Selecciona una opción</option>
      <option value="Activo">Activo</option>
      <option value="Inactivo">Inactivo</option>
    </select> <br>
    <label for="">rol</label>
    <select class="form-control" required name="id_Rol">
      <option value="" disabled selected>Selecciona una opción</option>
      <option value="1">Administrador</option>
      <option value="2">Empleado</option>
    </select>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">correo</label>
      <input type="email" class="form-control" name="correo">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">contraseña</label>
      <input type="password" class="form-control" name="contraseña">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Telefono</label>
      <input type="text" class="form-control" name="telefono">
    </div>
    <button type="submit" class="btn btn-primary" name="guardar">Registrar</button>
  </form>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>