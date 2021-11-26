<!DOCTYPE html>
<!--Aroa Granero Omañas 
Fecha Creacion: 25/11/2021
Fecha Modificacion: 25/11/2021 -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="aroaGraneroOmañas">
        <title>ejercicio 1</title>
        <style>
        /* Add a black background color to the top navigation */
        .topnav {
                background-color: #333;
                overflow: hidden;
                margin-bottom: 40px;
                position: absolute;
                top: 0px;
                width: 100vw;
            }
    
        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 20px;
        }
    
        /* Change the color of links on hover */
        .topnav a:hover {
            background-color: rgb(77, 157, 182);
            color: black;
        }
    </style>
    </head>
    <body>
        <div class="topnav">
        <a href="../indexProyectoTema5.php">&#8666;</a>
        <a href="../../index.php">&#127968;</a>
        <a href="https://github.com/aroago/208DWESProyectoTema5">GitHub</a>
        <a href="../codigoPHP/ejercicio01.php">Ejecutar</a>
    </div>
        <?php
            highlight_file("../codigoPHP/ejercicio00.php");
        ?>
    </body>
</html>

