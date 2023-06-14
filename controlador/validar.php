
<?php
if (!isset($_SESSION)) {
  session_start();
}

/*
if(isset($_SESSION['id_Usuario'])) {
    header("Location: ../vista/admin.php");
}*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['correo'])) {
    $correo = $_POST['correo'];
  } else {
    $correo = '';
  }

  if (isset($_POST['contraseña'])) {
    $contraseña = $_POST['contraseña'];
  } else {
    $contraseña = '';
  }

  $conexion = mysqli_connect("localhost", "root", "", "entre_especies");

  $consulta = "SELECT * FROM usuarios WHERE correo='$correo' AND contraseña='$contraseña' LIMIT 1";
  $resultado = mysqli_query($conexion, $consulta);

  if (mysqli_num_rows($resultado) > 0) {
    $usuario = mysqli_fetch_assoc($resultado);

    $_SESSION['correo'] = $usuario['Correo'];
    $_SESSION['rol'] = $usuario['Id_Rol'];
    $_SESSION['permisos'] = [];

    $consulta_perm = "SELECT * FROM permisos";
    $resultado_permn = mysqli_query($conexion, $consulta_perm);

    while ($permiso = mysqli_fetch_array($resultado_permn)) {
      $_SESSION['permisos'][$permiso['Id_permiso']] = false;
    }

    $consulta_roleP = "SELECT * FROM role_permisos WHERE Id_Rol=$usuario[Id_Rol]";
    $resultado_roleP = mysqli_query($conexion, $consulta_roleP);

    while ($roleP = mysqli_fetch_array($resultado_roleP)) {
      $_SESSION['permisos'][$roleP['Id_permiso']] = true;
    }

    if ($_SESSION['rol'] == 1) {
      //le cambie a location 
      header("location: ../vista/html/indAdministrador.php");
    } else if ($_SESSION['rol'] == 2) {
      header("location: ../vista/html/indEmpleado.php");
    }
  } else {
    include("error.php");
?>
        
        <?php
      }

      mysqli_free_result($resultado);
      mysqli_close($conexion);
    }


/*

<?php
/*session_start(); codigo segundo corregido solo que me ejecuta el else sin igreasr ningun uusario

if (isset($_POST['correo'])) {
    $correo = $_POST['correo'];
} else {
    $correo = '';
}

if (isset($_POST['contraseña'])) {
    $contraseña = $_POST['contraseña'];
} else {
    $contraseña = '';
}

$_SESSION['correo'] = $correo;

$conexion = mysqli_connect("localhost", "root", "", "entre_especies");

$consulta = "SELECT * FROM usuario WHERE correo='$correo' AND contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    $filas = mysqli_fetch_array($resultado);
    if ($filas['id_Rol'] == 1) {
        header("location:admin.php");
    } else if ($filas['id_Rol'] == 2) {
        header("location:empleados.php");
    }
} else {
    include ("error.php");
    ?>
    <h1 class="###">Error</h1>
    <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);*/




/* codigo original
<?php
$correo=$_POST['correo'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['correo']=$correo;

$conexion=mysqli_connect("localhost","root","","entre_especies");

$consulta="SELECT * FROM usuario where correo='$correo' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);


$filas = mysqli_fetch_array($resultado);

if (mysqli_num_rows($resultado) > 0) {
    if($filas['id_Rol'] == 1){
        header("location:admin.php");
    }else if($filas['id_Rol'] == 2){
        header("location:empleados.php");
    }
}else {
    include ("error.php");
    ?>
    <h1 class="###">Error</h1>
    <?php
}



mysqli_free_result($resultado);
mysqli_close($conexion);*/