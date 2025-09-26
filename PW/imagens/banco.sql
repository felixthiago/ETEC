CREATE DATABASE modularProduto;
USE modularProduto;

CREATE TABLE produtos (
  id_produto INT(11) NOT NULL AUTO_INCREMENT,
  nome_produto VARCHAR(100) DEFAULT NULL,
  descricao TEXT DEFAULT NULL,
  PRIMARY KEY (id_produto)
);

CREATE TABLE imagens (
  id_imagem INT(11) NOT NULL AUTO_INCREMENT,
  nome_imagem VARCHAR(100) NOT NULL,
  fk_id_produto INT(11) DEFAULT NULL,
  PRIMARY KEY (id_imagem),
  KEY fk_id_produto (fk_id_produto),
  CONSTRAINT imagens_ibfk_1 FOREIGN KEY (fk_id_produto) REFERENCES produtos (id_produto)
);