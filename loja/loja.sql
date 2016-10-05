CREATE TABLE produto (
	idProduto int NOT NULL AUTO_INCREMENT,
	nome varchar(100) NOT NULL,
	descricao mediumtext,
	preco float NOT NULL,
	precoPromocao float,
	peso float NOT NULL,
	idCategoria int NOT NULL,
	primary key(idProduto)
);

CREATE TABLE categoria (
	idCategoria int NOT NULL AUTO_INCREMENT,
	nomeCategoria varchar(70) NOT NULL,
	primary key(idCategoria)
);

CREATE TABLE frete (
	local varchar(100) NOT NULL,
	pesoLimite float NOT NULL,
	preco float NOT NULL,
	primary key(local,pesoLimite)
);

CREATE TABLE usuario (
	email varchar(100) NOT NULL,
	senha varchar(20) NOT NULL,
	nome varchar(100) NOT NULL,
	endereco varchar(100) NOT NULL,
	cidade varchar(50) NOT NULL,
	estado char(2) NOT NULL,
	cep char(8) NOT NULL,
	primary key(email)
);

CREATE TABLE pedido (
	idPedido int NOT NULL AUTO_INCREMENT,
	email varchar(100) NOT NULL,
	data date NOT NULL,
	valorTotal float NOT NULL,
	precoFrete float NOT NULL,
	primary key(idPedido)
);

CREATE TABLE itemPedido (
	idPedido int NOT NULL,
	idProduto int NOT NULL,
	preco float NOT NULL,
	quantidade int NOT NULL,
	primary key(idPedido,idProduto)
);


INSERT INTO categoria(nomeCategoria) VALUES ('Beleza e Saúde');
INSERT INTO categoria(nomeCategoria) VALUES ('Brinquedos');
INSERT INTO categoria(nomeCategoria) VALUES ('Eletrônicos');
INSERT INTO categoria(nomeCategoria) VALUES ('Eletrodomésticos');

INSERT INTO produto(nome,descricao,preco,precoPromocao,peso,idCategoria) VALUES ('Balança c/ Medidor de Gordura', 'Com monitoramento do seu peso, taxa de gordura, taxa de líquido e músculo, você poderá ter um retrato diário da evolução do peso em seu corpo.', 169, 0, 1.3, 1);
INSERT INTO produto(nome,descricao,preco,precoPromocao,peso,idCategoria) VALUES ('Joaquina, a Boneca que Fala', 'Com a mais alta tecnologia, Joaquina fala mais de 500 frases e reconhece quando a mamãe penteia seu cabelo.', 799, 0, 5, 2);
INSERT INTO produto(nome,descricao,preco,precoPromocao,peso,idCategoria) VALUES ('TV 29 Polegadas Tela Plana', 'Tela Super Plana, 181 canais, Controle Remoto Luminoso, Closed Caption e Stereo Surround/SAP.', 979, 899, 48, 3);
INSERT INTO produto(nome,descricao,preco,precoPromocao,peso,idCategoria) VALUES ('Ar Condicionado 10.000 btus', 'Controle de Temperatura: Eletrônico, Filtro AntiBactéria, Proteção Anti-Corrosão.', 1099, 999, 31, 4);

INSERT INTO frete VALUES ("SP - Capital", 5, 18.90);
INSERT INTO frete VALUES ("SP - Capital", 100, 34.90);
INSERT INTO frete VALUES ("SP - Capital", 1000, 54.90);
INSERT INTO frete VALUES ("RJ - Capital", 5, 19.90);
INSERT INTO frete VALUES ("RJ - Capital", 100, 35.90);
INSERT INTO frete VALUES ("RJ - Capital", 1000, 55.90);
