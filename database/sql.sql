CREATE DATABASE serviceware;
USE serviceware;

CREATE TABLE produtos (
	idProduto INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    valor FLOAT NOT NULL,
    quantidade INT NOT NULL
);

