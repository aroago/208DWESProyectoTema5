<?php
/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 25/11/2021
 * Last modification: 25/11/2021
 */
if ($_SERVER['PHP_AUTH_USER'] != 'admin' || $_SERVER['PHP_AUTH_PW'] != 'paso') { //Si el usuario no es admin y la contrasena no es paso entramos en el if
    header('WWW-Authenticate: Basic Realm="Contenido restringido"'); //Muestra de nuevo la cabecera de autentificacion
    header('HTTP/1.0 401 Unauthorized'); //Redirige con el estado Unauthorized
    echo "El usuario no puede ser reconocido. No puedes ACCEDER!"; //Muestro un mensaje de error
    exit;
} else {
    ?> 
    <h1 style="color:cadetblue;text-align: center;">Bienvenido Admin </h1>
<?php }
?>