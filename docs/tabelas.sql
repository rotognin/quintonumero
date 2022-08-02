-- Active: 1657285035745@@127.0.0.1@3306@anotacoes_db
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `nivel` tinyint(1) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `pontos` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/* Criação do usuário padrão */
INSERT INTO `anotacoes_db`.`usuarios`
(`nome`, `login`, `senha`, `nivel`, `status`, `pontos`)
VALUES
('Administrador', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 0);