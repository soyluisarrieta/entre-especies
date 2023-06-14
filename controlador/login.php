<?php 
include('conexion.php');
if (!empty($_POST["ingresar"])) {
    if (empty($_POST["correo"]) and empty($_POST["contraseña"])) {
        echo"Debe completar ambos campos";
    } else {
       $correo=$_POST["correo"];
       $contraseña=$_POST["contraseña"];
       $sql=$conexion->query("select*from usuario where correo='$correo' and contraseña='$contraseña'");
       if ($datos=$sql->fetch_object()){
          header("location:usuario.php");
    } else {
        echo"El usuario o la contraseña estan erroneos";
       }
       
    }
    # code...
}

?>