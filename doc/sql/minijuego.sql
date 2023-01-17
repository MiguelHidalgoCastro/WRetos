CREATE DATABASE IF NOT EXISTS pruebaMinijuegos;

CREATE TABLE IF NOT EXISTS minijuego(
    idMinijuego tinyint unsigned NOT NULL AUTO_INCREMENT,
    nombre varchar(100) NOT NULL,
    imagen varchar(100),
    PRIMARY KEY (idMinijuego)
);

INSERT INTO minijuego (nombre, imagen) VALUES ('juego 1', 'img1');
INSERT INTO minijuego (nombre, imagen) VALUES ('juego 2', 'img2');
INSERT INTO minijuego (nombre, imagen) VALUES ('juego 3', 'img3');
INSERT INTO minijuego (nombre, imagen) VALUES ('juego 4', 'img4');
INSERT INTO minijuego (nombre, imagen) VALUES ('juego 5', 'img5');
INSERT INTO minijuego (nombre, imagen) VALUES ('juego 6', null);
INSERT INTO minijuego (nombre, imagen) VALUES ('juego 7', null);
/*ES IGUAL*/
INSERT INTO minijuego (nombre, imagen) VALUES ('juego 1', 'img1'), ('juego 2', 'img2'), 
('juego 3', 'img3'),('juego 4', 'img4'),('juego 5', 'img5'),('juego 6', null),('juego 7', null);


/*CONSULTAS*/

/*Mostrar juegos sin imagen*/
SELECT * FROM minijuego WHERE imagen IS NULL;

/*Mostrar aquellos juegos que si tienes imagenes*/
/*el único que se niega después es el operador IS*/
SELECT * FROM minijuego WHERE imagen IS NOT NULL;

/*Mostrar los juegos 2,3,6*/
SELECT * FROM minijuego WHERE idMinijuego IN (2,3,6);

/*Los contrarios*/
SELECT * FROM minijuego WHERE idMinijuego NOT IN (2,3,6);

/**/
SELECT * FROM minijuego WHERE imagen IN ('img1','img4','img5');

/*Mostrar del 3 al 7*/
SELECT * FROM minijuego WHERE idMinijuego BETWEEN 3 AND 7;

/*Los contrarios*/
SELECT * FROM minijuego WHERE idMinijuego NOT BETWEEN 3 AND 7;

/*Mostrar todas las imagenes que contengan im*/
SELECT * FROM minijuego WHERE imagen LIKE '%im%';

/*Mostrar todas las imagenes que comiencen im*/
SELECT * FROM minijuego WHERE imagen LIKE 'im%';

/*Acaben*/
SELECT * FROM minijuego WHERE imagen LIKE '%im';

/*Aquellas imágenes que no tengan un 11 */
SELECT * FROM minijuego WHERE imagen NOT LIKE '%11';
SELECT * FROM minijuego WHERE imagen LIKE 'img_';


/*Aquellas imágenes que tenga un 1*//*ÉSTA ME LA HE INVENTADO YO*/
SELECT * FROM minijuego WHERE imagen LIKE '%1%';



/*del 1 al 9 no por caracteres*/
/*Expresiones regulares*/
/*Sólo buscaría en el 4o caracter un numero del 1 al 9*/
/*REGEXP*/
SELECT * FROM minijuego WHERE imagen LIKE 'img[1-9]';

/*Sólo buscaría en el 4o caracter una letra*/
SELECT * FROM minijuego WHERE imagen LIKE 'img[^1-9]';
