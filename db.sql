CREATE DATABASE db;
USE db;
CREATE TABLE registros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(20),
    descricao VARCHAR(255),
    valor DECIMAL(10,2),
    data DATE,
    forma_pagamento VARCHAR(50),
    beneficiario VARCHAR(100),
    status VARCHAR(20)
);