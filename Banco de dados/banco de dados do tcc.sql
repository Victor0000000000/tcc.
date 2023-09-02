CREATE DATABASE curtasifc;
USE curtasifc;

CREATE TABLE `usuarios` (
  `cod` INT PRIMARY KEY AUTO_INCREMENT,
  `nome` VARCHAR(40) NOT NULL,
  `email` VARCHAR(40) NOT NULL,
  `senha` VARCHAR(40) NOT NULL,
  `data_nasc` VARCHAR(40) NOT NULL
);

CREATE TABLE `genero` (
  `cod` INT PRIMARY KEY AUTO_INCREMENT,
  `descricao` VARCHAR(255)
);

CREATE TABLE `ano` (
  `cod` INT PRIMARY KEY AUTO_INCREMENT,
  `descricao` VARCHAR(255)
);

CREATE TABLE `tema` (
  `cod` INT PRIMARY KEY AUTO_INCREMENT,
  `descricao` VARCHAR(255)
);

CREATE TABLE `premiacao` (
  `curta` INT,
  `Des` VARCHAR(255),
  `ano` INT,
  `obs` VARCHAR(255),
  PRIMARY KEY (`curta`),
  FOREIGN KEY (`curta`) REFERENCES `curta`(`cod`)
);

CREATE TABLE `curta` (
  `cod` INT PRIMARY KEY AUTO_INCREMENT,
  `protagonista` VARCHAR(255),
  `titulo` VARCHAR(255),
  `video` VARCHAR(255),
  `imagem` VARCHAR(255),
  `sinopse` TEXT,
  `duracao` TIME,
  `Ano` INT,
  `Tema` INT,
  `Genero` INT,
  FOREIGN KEY (`Ano`) REFERENCES `ano`(`cod`),
  FOREIGN KEY (`Tema`) REFERENCES `tema`(`cod`),
  FOREIGN KEY (`Genero`) REFERENCES `genero`(`cod`)
);

CREATE TABLE `votacao` (
  `cod` INT PRIMARY KEY AUTO_INCREMENT,
  `Data` DATE,
  `hora` TIME,
  `nota` INT,
  `codusa` INT,
  `codcurta` INT,
  FOREIGN KEY (`codusa`) REFERENCES `usuarios`(`cod`),
  FOREIGN KEY (`codcurta`) REFERENCES `curta`(`cod`)
);

-- Criação da tabela "adm" e inserção de um registro
CREATE TABLE `adm` (
  `cod` INT PRIMARY KEY AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL
);

-- Inserção de um registro na tabela "adm"
INSERT INTO `adm` (`admim`, `password`) VALUES ('ftoledp46@gmail.com', '123');