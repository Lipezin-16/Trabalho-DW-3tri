CREATE DATABASE Banco_pizzaria;
USE Banco_pizzaria;

CREATE TABLE Funcionario( 
id_funcionario INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(50) NOT NULL,
cpf CHAR(11) NOT NULL UNIQUE,
funcao BOOLEAN NOT NULL,
email varchar(100) NOT NULL,
senha varchar(15) not null 
);

CREATE TABLE Pizza(
id_pizza INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(50) NOT NULL,
valor decimal(4,2) not null
);

CREATE TABLE Mesa(
id_mesa int primary key auto_increment,
nome varchar(10) not null
);

CREATE TABLE Pedido(
    id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    nome_cliente VARCHAR(50) NOT NULL,
    cpf_cliente CHAR(11) NOT NULL,
    id_mesa INT NOT NULL,
    id_funcionario INT NOT NULL,

    FOREIGN KEY (id_mesa) REFERENCES Mesa(id_mesa),
    FOREIGN KEY (id_funcionario) REFERENCES Funcionario(id_funcionario)
);

CREATE TABLE Itens_Pedido(
    id_item INT PRIMARY KEY AUTO_INCREMENT,
    id_pedido INT NOT NULL,
    id_pizza int NOT NULL,
    quantidade INT NOT NULL,

    FOREIGN KEY (id_pedido) references Pedido(id_pedido),
    FOREIGN KEY (id_pizza) REFERENCES Pizza(id_pizza)
);

CREATE TABLE Pagamento(
    id_pagamento INT PRIMARY KEY AUTO_INCREMENT,
    id_pedido INT NOT NULL,
    forma_pagamento VARCHAR(30) NOT NULL,
    valor_pago DECIMAL(10,2) NOT NULL,
    valor_pagamdo DECIMAL(10,2) NOT NULL,
    data_pagamento TIMESTAMP,
    comprovante varchar(150) not null,

    FOREIGN KEY (id_pedido) REFERENCES Pedido(id_pedido)
);

INSERT INTO Funcionario (nome, cpf, funcao, email, senha) VALUES
('Joao Silva', '12345678901', 1, 'joao@gmail.com', '123'),
('Maria Souza', '23456789012', 1, 'maria@gmail.com', '123'),
('Pedro Santos', '34567890123', 1, 'pedro@gmail.com', '123'),
('Ana Costa', '45678901234', 0, 'ana@gmail.com', '123'),
('Lucas Oliveira', '56789012345', 0, 'lucas@gmail.com', '123'),
('Julia Alves', '67890123456', 0, 'julia@gmail.com', '123');
INSERT INTO Pizza (nome, valor) VALUES
('Mussarela', 35.00),
('Calabresa', 38.00),
('Portuguesa', 42.00),
('Frango', 40.00),
('Frango Catupiry', 45.00),
('Quatro Queijos', 48.00),
('Marguerita', 39.00),
('Napolitana', 37.00),
('Bacon', 43.00),
('Pepperoni', 47.00),
('Chocolate', 40.00),
('Romeu e Julieta', 42.00),
('Banana Canela', 36.00),
('Milho Bacon', 41.00),
('Lombo Canadense', 46.00);

INSERT INTO Mesa (nome) VALUES
('Mesa 01'),
('Mesa 02'),
('Mesa 03'),
('Mesa 04'),
('Mesa 05'),
('Mesa 06'),
('Mesa 07'),
('Mesa 08'),
('Mesa 09'),
('Mesa 10'),
('Mesa 11'),
('Mesa 12'),
('Mesa 13'),
('Mesa 14'),
('Mesa 15');

INSERT INTO Pedido (nome_cliente, cpf_cliente, id_mesa, id_funcionario) VALUES
('Carlos Mendes', '11122233344', 1, 1),
('Fernanda Lima', '22233344455', 2, 2),
('Roberto Alves', '33344455566', 3, 3),
('Mariana Costa', '44455566677', 4, 1),
('Gabriel Souza', '55566677788', 5, 2);
INSERT INTO Itens_Pedido (id_pedido, id_pizza, quantidade) VALUES
(1, 1, 2),
(2, 3, 1),
(3, 5, 2),
(4, 7, 1),
(5, 10, 3);

