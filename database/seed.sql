INSERT INTO clientes (nome, cpf, endereco, email, telefone, cidade, numero) VALUES
('João Silva', '123.456.789-00', 'Rua das Flores', 'joao@email.com', '987654321', 'São Paulo', '123'),
('Maria Oliveira', '987.654.321-00', 'Avenida Brasil', 'maria@email.com', '912345678', 'Rio de Janeiro', '456'),
('Carlos Pereira', '111.222.333-44', 'Rua dos Três Irmãos', 'carlos@email.com', '923456789', 'Belo Horizonte', '789'),
('Ana Santos', '444.555.666-77', 'Rua do Sol', 'ana@email.com', '934567890', 'Curitiba', '101'),
('Lucas Almeida', '777.888.999-11', 'Avenida Central', 'lucas@email.com', '945678901', 'Porto Alegre', '202');

INSERT INTO produtos (nome, valor) VALUES
('Bateria Automotiva', 250.00),
('Pneu Aro 17', 400.00),
('Amortecedor Traseiro', 180.50),
('Pastilha de Freio', 90.00),
('Filtro de Óleo', 35.00);

INSERT INTO veiculos (placa, modelo, ano, marca) VALUES
('ABC-1234', 'Fusca', '1980', 'Volkswagen'),
('XYZ-5678', 'Civic', '2020', 'Honda'),
('LMN-2345', 'Gol', '2015', 'Volkswagen'),
('OPQ-6789', 'Fiesta', '2018', 'Ford'),
('RST-3456', 'Corolla', '2022', 'Toyota');

INSERT INTO ordem (dataAbertura, dataFechamento, valorVenda, observacao) VALUES
('2024-11-01', '2024-11-02', 1200.00, 'Troca de peças no motor'),
('2024-11-03', '2024-11-04', 1500.00, 'Troca de pneus e revisão geral'),
('2024-11-05', '2024-11-06', 800.00, 'Reparo no sistema de ar condicionado'),
('2024-11-07', '2024-11-08', 1100.00, 'Revisão de suspensão e alinhamento'),
('2024-11-09', '2024-11-10', 2000.00, 'Troca de óleo e filtro');

