<?php
include_once('conexion.php');
 if(isset($_POST['guardar'])){     
        $nombre=$_POST["nombre_usuario"];
        $apellido=$_POST["apellido_usuario"];
        $contraseña=$_POST["contraseña"];
        $rol=$_POST["id_Rol"];
        $correo=$_POST["correo"];
        $estado=$_POST["estado"];
        $documento=$_POST["documento"];
        $telefono=$_POST["telefono"];
        
         $sql = "INSERT INTO usuario  VALUES ('0', '$nombre', '$apellido', '$contraseña', '$rol','$correo', '$estado','$documento','$telefono')";
         $resultado = mysqli_query($conexion, $sql);

         if($resultado){
            header("location: ../vista/usuarios.php");
        }else{
            header("location: ../vista/usuarios.php");
        }
    }
?>


