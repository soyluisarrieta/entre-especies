<?php
// Configuración de la base de datos
$host = 'localhost';
$usuario = 'root';
$password = '';
$base_de_datos = 'entre_especies';

// Nombre del archivo de respaldo
$archivo_respaldo = 'respaldo.sql';

// Conexión a la base de datos
$conexion = new mysqli($host, $usuario, $password, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para realizar el respaldo de la base de datos
$consulta = "SET NAMES 'utf8'";
$consulta .= ";SET FOREIGN_KEY_CHECKS=0";
$consulta .= ";SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO'";
$consulta .= ";SET AUTOCOMMIT=0";
$consulta .= ";START TRANSACTION";
$consulta .= ";SET time_zone = '+00:00'";
$consulta .= ";SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0";
$consulta .= ";SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0";
$consulta .= ";SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO'";
$consulta .= ";SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0";
$consulta .= ";/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */";
$consulta .= ";/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */";
$consulta .= ";/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */";
$consulta .= ";/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */";

// Obtener la lista de tablas en la base de datos
$tablas = array();
$resultado = $conexion->query("SHOW TABLES");
while ($fila = $resultado->fetch_row()) {
    $tablas[] = $fila[0];
}

// Recorrer las tablas y generar las consultas para respaldar cada una
foreach ($tablas as $tabla) {
    $consulta .= ";";
    $consulta .= "DROP TABLE IF EXISTS `$tabla`;";
    $consulta .= "/*!40101 SET @saved_cs_client     = @@character_set_client */;";
    $consulta .= "/*!40101 SET character_set_client = utf8 */;";
    $consulta .= "CREATE TABLE `$tabla` (";

    // Obtener la estructura de la tabla
    $resultado = $conexion->query("SHOW CREATE TABLE `$tabla`");
    $fila = $resultado->fetch_row();
    $consulta .= "\n" . $fila[1] . ";\n";
    $consulta .= "/*!40101 SET character_set_client = @saved_cs_client */;";
    $consulta .= "\n\n";

    // Obtener los datos de la tabla
    $resultado = $conexion->query("SELECT * FROM `$tabla`");
    while ($fila = $resultado->fetch_row()) {
        $consulta .= "INSERT INTO `$tabla` VALUES (";
        foreach ($fila as $valor) {
            $consulta .= "'" . $conexion->real_escape_string($valor) . "',";
        }
        $consulta = rtrim($consulta, ",");
        $consulta .= ");\n";
    }
}

// Restaurar la configuración original
$consulta .= ";/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;";
$consulta .= "/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;";
$consulta .= "/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;";
$consulta .= "/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;";
$consulta .= "COMMIT;";

// Guardar el respaldo en un archivo
if (file_put_contents($archivo_respaldo, $consulta) !== false) {
    echo "El respaldo se ha creado correctamente en el archivo '$archivo_respaldo'.";
} else {
    echo "Ha ocurrido un error al crear el respaldo.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
