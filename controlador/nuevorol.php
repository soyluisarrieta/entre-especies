<?php
include_once('conexion.php');
if (isset($_POST['guardar'])) {

  $nombre_rol = $_POST['nombre_rol'];
  $crear_rol = "INSERT INTO roles VALUES (0, '$nombre_rol')";
  $resultado = mysqli_query($conexion, $crear_rol);

  $rol_creado = $conexion->insert_id;

  foreach ($_POST['permisos'] as $permiso) {
    $datos_insertar[] = "(0, $rol_creado, $permiso)";
  }

  $permisosSeparados = implode(', ', $datos_insertar);

  $sql = "INSERT INTO role_permisos VALUES $permisosSeparados";
  $resultado = mysqli_query($conexion, $sql);

  header("location: ../vista/roles.php");
}
