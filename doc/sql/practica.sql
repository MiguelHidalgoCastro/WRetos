CREATE DATABASE IF NOT EXISTS practica;
/*DROP DATABASE practica;*/
CREATE TABLE IF NOT EXISTS prueba1(
    idMinijuego tinyint unsigned NOT NULL AUTO_INCREMENT,
    nombre varchar(100) NOT NULL,
    imagen varchar(100),
    PRIMARY KEY (idMinijuego)
);
/*crear una tabla a partir de las columnas de otra*/
CREATE TABLE testPrueba1 AS
SELECT idMinijuego, nombre
FROM prueba1;

CREATE TABLE IF NOT EXISTS prueba2(
    idMinijuego tinyint unsigned NOT NULL AUTO_INCREMENT,
    nombre varchar(100) NOT NULL,
    imagen varchar(100),
    PRIMARY KEY (idMinijuego)
);

/*Borrar Tabla*/
DROP TABLE prueba2;

/*Borra los datos de dentro de la tabla*/
TRUNCATE TABLE prueba2;

/*Editar tabla, agregar una columna*/
ALTER TABLE prueba1
ADD puntuacion float NOT NULL,
ADD email varchar(100) NOT NULL;

/*Borrar una columna*/
ALTER TABLE prueba1
DROP COLUMN puntuacion;

/*Editar una columna*/
ALTER TABLE prueba1
MODIFY COLUMN email varchar(255);

/*COSTRAINTS*/
/*DUDA  COSTRAINT UC_prueba3 UNIQUE (idMinijuego,nombre) NO FUNCIONA https://www.w3schools.com/mysql/mysql_unique.asp */
/*No deja hacer un unique de un autoincrement*/
/*UNIQUE, NOT NULL, PRIMARY KEY*/
CREATE TABLE IF NOT EXISTS prueba3(
    idMinijuego tinyint unsigned NOT NULL AUTO_INCREMENT,
    nombre varchar(100) NOT NULL,
    imagen varchar(100),
    email varchar(255),
    /*crea un nombre para la constraint con el nombre de la columna  UNIQUE (nombre),*/
    PRIMARY KEY (idMinijuego),
    CONSTRAINT uc_nuevo UNIQUE (nombre, imagen) 
);

/*ADD UNIQUE*/
ALTER TABLE prueba3
ADD UNIQUE (nombre)

/*DEL UNIQUE*/
ALTER TABLE prueba3
DROP UNIQUE nombre

/*DELETE INDEX, HEIDI SQL LA BORRA ASI*/ /*DUDA*/
ALTER TABLE prueba3 
DROP INDEX uc_nuevo

ALTER TABLE prueba3 
DROP CONSTRAINT uc_nuevo

/*similar*/
DROP INDEX uc_nuevo on prueba3

/*ADD PRIMARY*/
ALTER TABLE prueba3
ADD PRIMARY KEY (idMinijuego);
/*DEL PRIMARY*/
ALTER TABLE prueba3
DROP PRIMARY KEY;



/*FOREIGN KEY*/

CREATE TABLE IF NOT EXISTS marca(
    idMarca tinyint unsigned NOT NULL AUTO_INCREMENT,
    nombre varchar(100) NOT NULL,
    PRIMARY KEY (idMarca)
);

CREATE TABLE IF NOT EXISTS modelo(
    idModelo tinyint unsigned NOT NULL AUTO_INCREMENT,
    idMarca tinyint unsigned NOT NULL,
    nombre varchar(100) NOT NULL,
    PRIMARY KEY (idModelo),
    CONSTRAINT FK_MarcaModelo FOREIGN KEY (idMarca) REFERENCES marca(idMarca)
);

/*add*/
ALTER TABLE modelo
ADD CONSTRAINT FK_MarcaModelo
FOREIGN KEY (idMarca) REFERENCES marca(idMarca)
/*del*/
ALTER TABLE modelo
DROP FOREIGN KEY FK_MarcaModelo

/*EN EL PC LA BORRA COMO*/  /*DUDA*/ 
DROP INDEX FK_MarcaModelo


/*CHECK*/

CREATE TABLE IF NOT EXISTS persona(
    id tinyint unsigned NOT NULL AUTO_INCREMENT,
    nombre varchar(100) NOT NULL,
    edad tinyint unsigned,
    PRIMARY KEY (idMarca),
    CHECK (edad>=18)
);

/*ADD*/
ALTER TABLE Persons
ADD CHECK (Age>=18);
/*DEL*/ /*OJO PASA LO MISMO QUE EN LOS OTROS*/
ALTER TABLE Persons
DROP CHECK CHK_PersonAge;


/*Renombrar columna*/
ALTER TABLE prueba3 
CHANGE oldcolname newcolname VARCHAR(100) NOT NULL;