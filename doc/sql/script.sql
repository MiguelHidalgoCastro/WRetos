CREATE TABLE IF NOT EXISTS categorias(
    idCategoria tinyint unsigned PRIMARY KEY NOT NULL,
    /*AutoIncrement falta*/
    nombreCategoria varchar(100) UNIQUE NOT NULL
    /*HE BORRADO EL KEY*/
) COLLATE = 'utf8mb4_general_ci' ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS minijuegos(
    idMinijuego tinyint unsigned NOT NULL,
    nombre varchar(100) NOT NULL,
    imagen varchar(100),
    PRIMARY KEY (idMinijuego)
);

/*Lo de arriba ya está mal ya que la forma correcta es ponerla debajo los indices*/
/*EJEMPLO*/
CREATE TABLE Orders (
    OrderID int NOT NULL,
    OrderNumber int NOT NULL,
    PersonID int,
    PRIMARY KEY (OrderID),
    CONSTRAINT FK_PersonOrder FOREIGN KEY (PersonID) REFERENCES Persons(PersonID)
);


/*Recordar*/
CREATE PROCEDURE myproc()
BEGIN
    DECLARE i int DEFAULT 237692001;
    WHILE i <= 237692004 DO
        INSERT INTO mytable (code, active, total) VALUES (i, 1, 1);
        SET i = i + 1;
    END WHILE;
END