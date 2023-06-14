# Módulo de Gestión y reconocimiento de roles y privilegios

## ▶ Componentes
- [x] Crearé las interfaces del CRUD con el mismo estilo de la aplicación [Frontend].
- [x] Permitiré la creación de nuevos roles con nombres personalizados, asignándoles los permisos requeridos en la aplicación [Frontend y Backend].
- [x] Mostraré todos los roles creados [Frontend y Backend].
- [x] Habilitaré la configuración de los roles creados [Frontend y Backend].
- [x] Permitiré la eliminación de roles [Frontend y Backend].
- [x] Realizaré modificaciones en la base de datos, si es necesario [Backend].
- [x] La aplicación reconocerá los permisos del usuario que ingrese al sistema y, según su rol, le impedirá acceder a ciertas funcionalidades no permitidas, mostrando una alerta u ocultando dichas opciones [Frontend y Backend].

### BONUS

- [x] Verificar si tiene sesión iniciada
- [x] Redireccionar si tiene o no sesión iniciada
- [x] Cerrar sesión
- [x] Corrección de errores que me impiden avanzar

### ▶ ¿Cómo verificar permisos en un fragmento de código?

Sí el usuario **tiene permiso** entonces mostrará el código html interno del condicional:

  ```html
  <?php if ($_SESSION['permisos'][46] == false) { ?>
    <p>Código html que se oculta si no tiene permiso</p>
  <?php } ?>
  ```

El número 46 es el ID del permiso que se encuentra registrado en la base de datos. Un ejemplo real:

  ```html
  <!-- Verificar si tiene permiso para visualizar mascotas -->
  <?php if ($_SESSION['permisos'][11] == true) { ?>
    <li class="sidebar-item">
      <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
        <span class="hide-menu">MASCOTAS</span>
      </a>
    </li>
  <?php } ?>
  ```

> ### ❗ IMPORTANTE: 
> Arriba del archivo debe contener este código para que todo se implemente bien:
> ```php
> if (!isset($_SESSION)) {
>  session_start();
>}
>
>if (!isset($_SESSION['correo']) || !isset($_SESSION['permisos'])) {
>  header('Location: ../login.php');
>}
>
>// Verificar permisos
>if ($_SESSION['permisos'][3] == false) {
>  header("location: ../login.php");
>}
> ```
> Recuerda que debe estar dentro de etiquetas PHP: `<?php` ... `?>`


### ▶ ¿Cómo verificar permisos para un archivo completo?

En la parte superior del archivo debes implementar este código php:

```php
  <?php
  if (!isset($_SESSION)) {
    session_start();
  }

  // Verificar sesión
  if (!isset($_SESSION['correo']) || !isset($_SESSION['permisos'])) {
    header('Location: ../login.php');
  }

  // Verificar permisos
  if ($_SESSION['permisos'][4] == false) {
    header("location: ../login.php");
  }

  ?>
```
Recuerda ponerle el número ID del permiso

### ▶ ID de permisos de la base de datos: 
| ID  | Nombre del permiso       |
| --- | ------------------------ |
| 1   | Registrar usuario        |
| 2   | Recuperar contraseña     |
| 3   | Visualizar dashboard     |
| 4   | Actualizar usuario       |
| 5   | Eliminar usuario         |
| 6   | Visualizar usuario       |
| 7   | Registrar cliente        |
| 8   | Actualizar cliente       |
| 9   | Eliminar cliente         |
| 10  | Registrar mascota        |
| 11  | Visualizar mascota       |
| 12  | Actualizar mascota       |
| 13  | Eliminar mascota         |
| 14  | Registrar producto       |
| 15  | Actualizar producto      |
| 16  | Eliminar producto        |
| 17  | Registrar venta          |
| 18  | Visualizar venta         |
| 19  | Actualizar venta         |
| 20  | Eliminar venta           |
| 21  | Registrar compra         |
| 22  | Actualizar compra        |
| 23  | Visualizar compra        |
| 24  | Eliminar compra          |
| 25  | Registrar cita           |
| 26  | Actualizar cita          |
| 27  | Visualizar cita          |
| 28  | Eliminar cita            |
| 29  | Registrar proveedor      |
| 30  | Actualizar proveedor     |
| 31  | Eliminar proveedor       |
| 32  | Ingresar a configuración |
| 33  | Agrega nuevo rol         |
| 34  | Asignar permisos         |
| 35  | Agregar servicio         |
| 36  | Actualizar servicio      |
| 37  | Eliminar servicio        |
| 38  | Buscar usuario           |
| 39  | Buscar servicio          |
| 40  | Buscar cliente           |
| 41  | Buscar mascota           |
| 42  | Buscar producto          |
| 43  | Buscar venta             |
| 44  | Buscar cita              |
| 45  | Buscar compra            |
| 46  | Buscar proveedor         |


## ▶ Errores encontrados y corregidos

| #   | Rol      | Descripción del error                                                                             | Archivo                      | Linea      |
| --- | -------- | ------------------------------------------------------------------------------------------------- | ---------------------------- | ---------- |
| 1   | Empleado | El nombre de la tabla en la consulta es diferente al de la BD                                     | ./controlador/validar.php    | 26         |
| 2   | Empleado | Los nombres de índices en los arreglos para iniciar sesión son diferentes a las columnas de la BD | ./controlador/validar.php    | 31 y 34    |
| 3   | Empleado | El nombre de la tabla en la consulta es diferente al de la BD                                     | ./vista/usuarioempleado.php  | 53         |
| 4   | Admin    | El nombre de la tabla en la consulta es diferente al de la BD                                     | ./vista/usuarioe.php         | 63         |
| 5   | Empleado | Los nombres de los atributos son diferentes a la base de datos                                    | ./vista/usuarioempleado.php  | 56 al 63   |
| 6   | Admin    | Los nombres de los atributos son diferentes a la base de datos                                    | ./vista/usuarios.php         | 66 al 74   |
| 7   | Empleado | Las rutas de los scripts están mal                                                                | ./vista/html/indEmpleado.php | 510 al 517 |
| 8   | Empleado | Para que le botón de usuario se active, falta añadir el script                                    | ./vista/usuarioempleado.php  | 84         |
| 9   | Admin    | Para que le botón de usuario se active, falta añadir el script                                    | ./vista/usuarios.php         | 94         |
| 10  | Backend  | En la tabla de roles a la columna 'Id_Rol' le falta el AUTO_INCREMENT                             | -                            | -          |
