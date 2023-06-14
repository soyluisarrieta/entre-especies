<?php
include('conexion.php');
if (!empty($_GET["id_Usuario"])) {
    $id = $_GET["id_Usuario"];

    $sql = "DELETE FROM usuario WHERE id_Usuario = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo '<div>Usuario eliminado correctamente</div>';
    } else {
        echo '<div>No se pudo eliminar el usuario</div>';
        echo mysqli_error($conexion);
    }

    mysqli_stmt_close($stmt);
}





/*
<?php 
 include ('conexion.php');
if(!empty($_GET["id_Usuario"])){
    $id=$_GET["id_Usuario"];
    
    $sql="DELETE FROM usuario WHERE id_Usuario= ?";
    $resultado = mysqli_query($conexion, $sql);

    if($resultado){
        echo '<div>Usuario eliminado correctamente</div>';
    }else{
        echo '<div>No se pudo</div>';
    }
}

?>*/