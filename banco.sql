CREATE DATABASE lavanderia;
USE lavanderia;

-- define fuso horário Brasil
SELECT * FROM pedidos WHERE cliente_id = ...
CONVERT_TZ(data, '+00:00', '-03:00')

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    senha VARCHAR(100)
);

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT,
    peso DECIMAL(5,2),
    preco DECIMAL(10,2),
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);