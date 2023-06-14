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

// Cargar el archivo de respaldo
$respaldo = file_get_contents($archivo_respaldo);

// Ejecutar las consultas del respaldo
if ($conexion->multi_query($respaldo)) {
    echo "La restauración se ha realizado correctamente.";
} else {
    echo "Ha ocurrido un error al realizar la restauración: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
