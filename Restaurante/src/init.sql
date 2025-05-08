CREATE TABLE IF NOT EXISTS bebidas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(5,2) NOT NULL
);

CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_cliente VARCHAR(100) NOT NULL,
    bebida_id INT,
    quantidade INT NOT NULL,
    FOREIGN KEY (bebida_id) REFERENCES bebidas(id)
);

INSERT INTO bebidas (nome, preco) VALUES
('Coca-Cola', 5.00),
('Suco de Laranja', 6.50),
('Água Mineral', 3.00);

INSERT INTO pedidos (nome_cliente, bebida_id, quantidade) VALUES
('João', 1, 2),
('Maria', 2, 1);