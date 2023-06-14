<?php
include ('conexion.php');

if(isset($_GET['id_Usuario'])){
$id_Usuario=(int) $_GET['id_Usuario'];

$buscar=$conexion->prepare('SELECT * FROM usuario WHERE id_Usuario=:id_Usuario  LIMIT 1');
$buscar->execute(array(
':id_Usuario'=>$id_Usuario,
));
$resultado=$buscar->fetch();
}else{
header('Location: index1.php');
}


if(isset($_POST['guardar'])){
     
    $nombre_usuario = $_POST["nombre_usuario"];
    $apellido_usuario = $_POST["apellido_usuario"];
    $contraseña = $_POST["contraseña"];
    $id_Rol = $_POST["id_Rol"];
    $correo = $_POST["correo"];
    $estado = $_POST["estado"];
    $documento = $_POST["documento"];
    $telefono = $_POST["telefono"];
    $id_Usuario = (int)$_POST["id_Usuario"]; 


if(!empty($id_Usuario)){

$consulta_update=$conexion->prepare(' UPDATE usuario SET 
nombre_usuario=:nombre_usuario,apellido_usuario=:apellido_usuario, contraseña=:contraseña, id_Rol=:id_Rol, correo=:correo, estado=:estado, documento=:documento, telefono=:telefono WHERE id_Usuario=:id_Usuario;'
);
$consulta_update->execute(array(
    ':password' =>$password,
    ':documento' =>$documento,
    ':rol' =>$rol,
    ':privilegio' =>$privilegio,
    ':usuario' =>$usuario
));
header('Location: index1.php');

}else{
  echo "<script> alert('Los campos estan vacios');</script>";
  }
}



/*
<?php
include('conexion.php');

if(isset($_POST['guardar'])) {  
    $id_Usuario = $_POST["id_Usuario"];  
    $nombre = $_POST["nombre_usuario"];
    $apellido = $_POST["apellido_usuario"];
    $contraseña = $_POST["contraseña"];
    $rol = $_POST["id_Rol"];
    $correo = $_POST["correo"];
    $estado = $_POST["estado"];
    $documento = $_POST["documento"];
    $telefono = $_POST["telefono"];
    
    $sql = "UPDATE usuario SET nombre_usuario=?, apellido_usuario=?, contraseña=?, id_Rol=?, correo=?, estado=?, documento=?, telefono=? WHERE id_Usuario=id_Usuario";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssiisiii", $nombre, $apellido, $contraseña, $rol, $correo, $estado, $documento, $telefono, $id);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        header("Location: usuario.php");
        exit();
    } else {
        echo "Error al actualizar el usuario.";
    }

    $stmt->close();
    $conexion->close();
}*/




/*
<?php 
include('conexion.php');
if(isset($_POST['modificar'])){  
    $id=$_POST["id"];  
    $nombre=$_POST["nombre_usuario"];
    $apellido=$_POST["apellido_usuario"];
    $contraseña=$_POST["contraseña"];
    $rol=$_POST["id_Rol"];
    $correo=$_POST["correo"];
    $estado=$_POST["estado"];
    $documento=$_POST["documento"];
    $telefono=$_POST["telefono"];
    
     $sql = $conexion->query("update usuario set  nombre_usuario='$nombre',apellido_usuario='$apellido', contraseña='$contraseña', id_Rol=$rol, correo='$correo', estado='$estado', documento=$documento, telefono=$telefono where  id_Usuario=$id");
    if($sql==1){
        header("location:usuario.php");
    }else{
        header("location:usuario.php");
    }
}
?>*/