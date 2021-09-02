CREATE TABLE IF NOT EXISTS usuarios (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(150) NOT NULL,
    sexo INT(11) NOT NULL,
    codigo_verificacion VARCHAR(150) NOT NULL,
    activo tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (id)
);