<?php
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION['correo']) && isset($_SESSION['permisos'])) {
  if ($_SESSION['rol'] == 1) {
    header("location: html/indAdministrador.php");
  } else if ($_SESSION['rol'] == 2) {
    header("location: html/indEmpleado.php");
  }
}

include('../controlador/conexion.php');
include('../controlador/validar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=}, initial-scale=1.0">
  <link rel="shortcut icon" href="img/imagen2.ico">
  <link rel="stylesheet" type="text/css" href="../vista/estilos.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
  </script>
  <title>login</title>
</head>

<body>
  <style>
  </style>
  <form id="form" method="post">
    <section>
      <center><img class="logologin" src="img/logo.jpeg" alt="hola" width="300px"> </img><br>
        <div>
          <form id="form" method="post">
            <div>
              <label for="">correo</label>
              <input id="correo" type="text" placeholder="Ingrese su correo" name="correo"><br><br>
            </div>
            <div>
              <label for="">Contraseña
              </label>
              <input id="contraseña" type="password" placeholder="Ingrese su contraseña" name="contraseña">
            </div>
            <br>
          </form>
        </div>
        <br>
        <center> <input type="submit" id="ingresar" name="ingresar" value="Ingresar"></center>
        <br>
        <center>
          <a href="https://www.youtube.com/watch?v=PVDC56MsWpM">olvidó su contraseña</a>
        </center>
    </section>
    </center>
    <script>
      $("#form").submit(function() {
        if ($("#correo").val().length < 1) {
          Swal.fire({
            icon: 'warning',
            title: 'Por Favor Llene Los Campos',
            text: 'Debe Ingresar Un Correo',
            footer: '<p> Sistema de informacion</p>'
          })
          return false;
        }
        if ($("#contraseña").val().length < 1) {
          Swal.fire({
            icon: 'warning',
            title: 'Por Favor Llene Los Campos',
            text: 'Debe Ingresar Una Contraseña',
            footer: '<p> Sistema de informacion</p>'
          })
          return false;
        }

      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>