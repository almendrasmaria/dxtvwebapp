-- Crear una nueva base de datos llamada 'dxtvdb'
CREATE DATABASE dxtvdb;

-- Seleccionar la base de datos 'dxtvdb' para realizar operaciones en ella
USE dxtvdb;

-- Crear una tabla llamada 'my_table' con algunas columnas
CREATE TABLE my_table(
  id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  view VARCHAR(50),
  name VARCHAR(50) NOT NULL,
  hashtag VARCHAR(50) NOT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
);
