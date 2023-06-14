<?php
include_once('conexion.php');

if (isset($_GET['id'])) {
  $id_rol = $_GET['id'];

  $eliminar_permisos = "DELETE FROM role_permisos WHERE Id_Rol = $id_rol";
  $resultado_permisos = mysqli_query($conexion, $eliminar_permisos);

  $eliminar_rol = "DELETE FROM roles WHERE Id_Rol = $id_rol";
  $resultado_rol = mysqli_query($conexion, $eliminar_rol);

  header("Location: ../vista/roles.php");
}
