# Comandos SQL para Modelagem Física

## Criar Banco de dados

CREATE DATABASE microblog_jean CHARACTER SET utf8mb4;

## Criar tabela de usuários

CREATE TABLE usuarios(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(45) NOT NULL,
    email VARCHAR(45) NOT NULL UNIQUE,
    senha VARCHAR(255),
    tipo ENUM('admin', 'editor') NOT NULL

); 

# Faça o comando SQL para criação da tabela de notícias com todas as colunas: id, data, titulo, texto, resumo, imagem e usuario_id

CREATE TABLE noticias(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    data DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    titulo VARCHAR(150) NOT NULL,
    texto TEXT NOT NULL,
    resumo TINYTEXT NOT NULL,
    imagem TEXT NOT NULL,
    usuario_id INT NOT NULL
);


## Criar o relacionamento entre as tabelas e a chave estrangeira

ALTER TABLE noticias
    ADD CONSTRAINT fk_noticias_usuarios
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id);