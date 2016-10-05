CREATE TABLE produtos (
	codigo int NOT NULL AUTO_INCREMENT,
	nome varchar(100) NOT NULL,
	preco float NOT NULL,
	primary key(codigo)
);

INSERT INTO produtos(nome,preco) VALUES('Monitor LCD 15','599');
INSERT INTO produtos(nome,preco) VALUES('Monitor LCD 17','799');
INSERT INTO produtos(nome,preco) VALUES('Monitor LCD 19','999');
INSERT INTO produtos(nome,preco) VALUES('Lavadora de Roupas 10kg','1500');
INSERT INTO produtos(nome,preco) VALUES('Lavadora de Roupas 12kg','1529');
INSERT INTO produtos(nome,preco) VALUES('Lavadora de Roupas 14kg','1600');
