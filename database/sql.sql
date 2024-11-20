CREATE DATABASE serviceware;
USE serviceware;

CREATE TABLE produtos (
	idProduto INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    valor FLOAT NOT NULL
);

CREATE TABLE clientes (
    idCliente int AUTO_INCREMENT PRIMARY KEY,
    nome varchar(255) NOT NULL,
    cpf varchar(255) NOT NULL,
    endereco varchar(255) NOT NULL,
    email varchar(250) NOT NULL,
    telefone VARCHAR(15),
    cidade VARCHAR(255),
    numero VARCHAR(255), NOT NULL
);

CREATE TABLE veiculos(
    idVeiculo int AUTO_INCREMENT PRIMARY KEY,
    placa varchar(255) NOT NULL,
    modelo varchar(255) NOT NULL,
    ano varchar(255) NOT NULL,
    marca varchar(255) NOT NULL,
    idCliente int NOT NULL,
    FOREIGN KEY (idCliente) REFERENCES clientes(idCliente) ON DELETE CASCADE
);

CREATE TABLE ordem(
   idOrdem int AUTO_INCREMENT PRIMARY KEY,
   idCliente INT NOT NULL,
   dataAbertura DATETIME,
   dataFechamento DATETIME,
   idVeiculo int not null,
   valorVenda FLOAT NULL,
   observacao varchar(500) NULL,
   FOREIGN KEY (idCliente) REFERENCES clientes(idCliente) ON DELETE CASCADE,
   FOREIGN KEY (idVeiculo) REFERENCES veiculos(idVeiculo) ON DELETE CASCADE
);