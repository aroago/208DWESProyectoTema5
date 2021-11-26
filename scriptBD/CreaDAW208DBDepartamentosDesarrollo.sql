-- Crear base de datos DB207DWESProyectoTema5
CREATE DATABASE IF NOT EXISTS DB208DWESProyectoTema5;

-- CREAR Tabla T01_Usuario dentro de la base de datos DB208DWESProyectoTema5
USE DB208DWESProyectoTema5;
CREATE TABLE IF NOT EXISTS T01_Usuario(
    T01_CodUsuario varchar(10) PRIMARY KEY,
    T01_Password varchar(64) NOT NULL,
    T01_DescUsuario varchar(255) NOT NULL,
    T01_NumConexiones int DEFAULT 0,
    T01_FechaHoraUltimaConexion int,
    T01_Perfil enum('admin', 'usuario') DEFAULT 'usuario',
    T01_ImagenUsuario mediumblob NULL
)engine=innodb;

-- CREAR Tabla T02_Departamento dentro de la base de datos DB208DWESProyectoTema5
CREATE TABLE IF NOT EXISTS DB208DWESProyectoTema5.T02_Departamento(
    T02_CodDepartamento varchar(3) PRIMARY KEY,
    T02_DescDepartamento varchar(255) NOT NULL,
    T02_FechaCreacionDepartamento int NULL,
    T02_VolumenDeNegocio float NULL,
    T02_FechaBajaDepartamento date NULL
)engine=innodb;

/* Crear el usuario usuarioDAW208DBDepartamentos / paso*/

CREATE USER 'User208DWESProyectoTema5'@'%' identified BY 'P@ssw0rd';

/* Dar permisos al usuario usuarioDAW208DBDepartamentos*/

GRANT ALL PRIVILEGES ON DB208DWESProyectoTema4.* TO 'User208DWESProyectoTema5'@'%';