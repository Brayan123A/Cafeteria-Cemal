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

SELECT id, nombre, correo, rol FROM usuarios;

UPDATE usuarios
SET rol='admin'
WHERE correo='jose23@gmail.com';

CREATE TABLE menus(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion TEXT,
    precio DECIMAL(10,2),
    imagen VARCHAR(255),
    tipo VARCHAR(50),
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE promociones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    precio_anterior DECIMAL(10,2) NOT NULL,
    precio_oferta DECIMAL(10,2) NOT NULL,
    imagen VARCHAR(255) DEFAULT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    estado ENUM('Activa','Inactiva') DEFAULT 'Activa',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
