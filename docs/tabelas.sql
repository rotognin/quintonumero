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


CREATE TABLE `perguntas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero1` int DEFAULT NULL,
  `numero2` int DEFAULT NULL,
  `numero3` int DEFAULT NULL,
  `numero4` int DEFAULT NULL,
  `resposta` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `explicacao` varchar(500) DEFAULT NULL,
  `dificuldade` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


CREATE TABLE `usuperguntas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int DEFAULT NULL,
  `pergunta_id` int DEFAULT NULL,
  `tentativa` tinyint DEFAULT NULL,
  `comentario` varchar(500) DEFAULT NULL,
  `acertou` tinyint(1) DEFAULT NULL COMMENT '1 - SIM, 2 - NÃO (Desistiu), 3 - Não prosseguiu (abandonou), 4 - Não respondeu (na primeira tentativa)',
  `data_resposta` date DEFAULT NULL,
  `hora_resposta` time DEFAULT NULL,
  `dificuldade` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_usuario_id_idx` (`usuario_id`),
  KEY `fk_pergunta_pergunta_id_idx` (`pergunta_id`),
  CONSTRAINT `fk_pergunta_pergunta_id` FOREIGN KEY (`pergunta_id`) REFERENCES `perguntas` (`id`),
  CONSTRAINT `fk_usuario_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


CREATE TABLE `qtdperguntas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `faceis` int NOT NULL DEFAULT '0',
  `medias` int NOT NULL DEFAULT '0',
  `dificeis` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;



/* Criação do usuário padrão */
INSERT INTO `quinto_db`.`usuarios`
(`nome`, `login`, `senha`, `nivel`, `status`, `pontos`)
VALUES
('Administrador', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 0);