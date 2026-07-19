CREATE DATABASE cafeteria_cemal;
USE cafeteria_cemal;

CREATE TABLE usuarios (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nombre VARCHAR(100) NOT NULL,

    correo VARCHAR(100) NOT NULL UNIQUE,

    password VARCHAR(255) NOT NULL,

    rol ENUM('admin','usuario') NOT NULL DEFAULT 'usuario',

    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

UPDATE usuarios
SET rol='admin'
WHERE id=1;

UPDATE usuarios
SET rol='usuario'
WHERE id=1;

SELECT id, nombre, correo, rol
FROM usuarios;

INSERT INTO usuarios (nombre, correo, password)
VALUES (
'Brayan',
'brayan@gmail.com',
'123456'
);

