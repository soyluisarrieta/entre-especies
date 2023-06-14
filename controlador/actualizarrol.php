<?php
include_once('conexion.php');

session_start();

if (isset($_POST['guardar'])) {
  $id_rol = $_POST['id'];
  $nombre_rol = $_POST['nombre_rol'];

  $actualizar_rol = "UPDATE roles SET Nom_Rol = '$nombre_rol' WHERE Id_Rol = $id_rol";
  $resultado_rol = mysqli_query($conexion, $actualizar_rol);

  $eliminar_permisos = "DELETE FROM role_permisos WHERE Id_Rol = $id_rol";
  $resultado_eliminar = mysqli_query($conexion, $eliminar_permisos);

  foreach ($_POST['permisos'] as $permiso) {
    $insertar_permiso = "INSERT INTO role_permisos VALUES (0, $id_rol, $permiso)";
    $resultado_permiso = mysqli_query($conexion, $insertar_permiso);
  }


  $_SESSION['permisos'] = [];

  $consulta_perm = "SELECT * FROM permisos";
  $resultado_permn = mysqli_query($conexion, $consulta_perm);

  while ($permiso = mysqli_fetch_array($resultado_permn)) {
    $_SESSION['permisos'][$permiso['Id_permiso']] = false;
  }

  $consulta_roleP = "SELECT * FROM role_permisos WHERE Id_Rol=$_SESSION[rol]";
  $resultado_roleP = mysqli_query($conexion, $consulta_roleP);

  while ($roleP = mysqli_fetch_array($resultado_roleP)) {
    $_SESSION['permisos'][$roleP['Id_permiso']] = true;
  }

  header("Location: ../vista/roles.php");
}
