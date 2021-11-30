
<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Usuario no reconocido!";
    exit;
} else {
    // Constantes de conexión a la base de datos.
    require_once '../config/confDBPDO.php';

    try {
        // Conexión con la base de datos.
        $mydb = new PDO(HOST, USER, PASSWORD);
        $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Query de selección.
        $sSelect = "SELECT T01_CodUsuario, T01_Password FROM T01_Usuario WHERE T01_CodUsuario='{$_SERVER['PHP_AUTH_USER']}'";

        // Preparación y ejecución de la consulta.
        $oResultadoSelect = $mydb->prepare($sSelect);
        $oResultadoSelect->execute();

        
        $oResultado = $oResultadoSelect->fetchObject();
        if (!$oResultado || $oResultado->T01_Password != hash('sha256', ($_SERVER['PHP_AUTH_USER'].$_SERVER['PHP_AUTH_PW']))) {
            header('WWW-Authenticate: Basic Realm="Contenido restringido"');
            header('HTTP/1.0 401 Unauthorized');
            echo "Usuario no reconocido!";
            exit;
        }

        /**
         * Si usuario y contraseña son correctos, añade la conexión al registro
         * de conexiones, y añade la última hora de conexión.
         */
        $oDateTime = new DateTime();
        
        // Query de actualización.
        $sUpdate = <<<QUERY
                UPDATE T01_Usuario SET T01_NumConexiones=T01_NumConexiones+1,
                T01_FechaHoraUltimaConexion = '{$oDateTime->format("y-m-d h:i:s")}'
                WHERE T01_CodUsuario='{$_SERVER['PHP_AUTH_USER']}'
        QUERY;

        // Preparación y ejecución de la actualización.
        $oResultadoUpdate = $mydb->prepare($sUpdate);
        $oResultadoUpdate->execute();
        
    } catch (PDOException $exception) {
        /*
         * Mostrado del código de error y su mensaje.
         */
        echo '<div>Se han encontrado errores:</div><ul>';
        echo '<li>' . $exception->getCode() . ' : ' . $exception->getMessage() . '</li>';
        echo '</ul>';
    } finally {
        unset($mydb);
    }
}
?>

<!DOCTYPE html>
<!--Aroa Granero Omañas 
Fecha Creacion: 28/11/2021
Fecha Modificacion: 28/11/2021 -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="aroaGraneroOmañas">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="application-name" content="ejercicio02 Tema5">
        <meta name="description" content="variasuper glovales">
        <meta name="keywords" content=" index, ej00" >
        <meta name="robots" content="index, follow" />
        <link rel="shortcut icon" href="favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../webroot/css/estilosEjer.css"  rel="stylesheet"  type="text/css" title="Default style">
        <title>Ejercicio 02</title>
    </head>
    <body>
        <div class="topnav">
            <a href="../indexProyectoTema5.php">&#8666;</a>
            <a href="https://github.com/aroago/208DWESProyectoTema5">GitHub</a>
            <a href="../mostrarcodigo/ejercicio00.php">Codigo</a>
            <a href="../../index.php">&#127968;</a>
        </div>
        <div class="container">
        <?php
            echo "<div class='bienvenido'>Bienvenide: " . $_SERVER['PHP_AUTH_USER'] . "</div>";
            echo "<div class='bienvenido'>Su Contraseña es : " . $_SERVER['PHP_AUTH_PW'] . "</div>";
         ?>
         </div>
    </body>
</html>
