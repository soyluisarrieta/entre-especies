
<?php include ('../controlador/connet.php'); include('../controlador/validar.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Script php backup and restore</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Backup y Restauración de Base de Datos MySQL</title>
</head>
<body>
    <h1>Backup y Restauración de Base de Datos MySQL</h1>

    <h2>Realizar un Backup</h2>
    <form action="../controlador/backup.php" method="post">
        <input type="submit" name="backup" value="Realizar Backup">
    </form>
    <h2>Restaurar desde un Backup</h2>
    <form action="../controlador/restaurar.php" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo_respaldo">
        <input type="submit" name="restaurar" value="Restaurar Backup">
    </form>
</body>
</html>

</body>
</html>