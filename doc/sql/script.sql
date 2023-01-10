CREATE TABLE IF NOT EXISTS categorias(
    idCategoria tinyint unsigned PRIMARY KEY NOT NULL,
    nombreCategoria varchar(100) UNIQUE KEY NOT NULL
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;