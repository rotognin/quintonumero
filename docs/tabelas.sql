-- Active: 1657285035745@@127.0.0.1@3306@anotacoes_db
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `nivel` tinyint(1) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `prioridade` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categorias_usuario_id_idx` (`usuario_id`),
  CONSTRAINT `fk_categorias_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `textos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `categoria_id` int NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `texto` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `prioridade` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_textos_categoria_id_idx` (`categoria_id`),
  KEY `fk_textos_usuario_id_idx` (`usuario_id`),
  CONSTRAINT `fk_textos_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  CONSTRAINT `fk_textos_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/* Criação do usuário padrão */
INSERT INTO `anotacoes_db`.`usuarios`
(`nome`, `login`, `senha`, `nivel`, `status`, `created_at`)
VALUES
('Administrador', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, CURRENT_TIMESTAMP);