-- Banco de dados: `testbd`
-- Apagando banco de dados testdb se existir
-- Cria o banco de dados testbd
-- Usa o banco de dados testbd

DROP DATABASE IF EXISTS `testdb`;

CREATE DATABASE `testdb`;

USE `testdb`;

------------------------------
-- Criando tabela `perfis` 

CREATE TABLE `testdb`.`perfis` (
    `id` int not null primary key auto_increment,
    `nome` varchar(50) not null 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-----------------------------
-- Inserindo dados na tabela `perfis`

INSERT INTO `testdb`.`perfis` (`id`,`nome`) VALUES
(1,'ADMNISTRADOR'),
(2,'GERENTE'),
(3,'USUÁRIO COMUM');

----------------------------
-- Criando tabela `usuarios`

CREATE TABLE `testdb`.`usuarios` (
    `id` int not null primary key auto_increment,
    `email` varchar(255) not null,
    `nome` varchar(180) not null,
    `password` varchar(80) not null,
    `status` tinyint not null,
    `perfil_id` int not null,
    FOREIGN KEY (perfil_id) REFERENCES perfis(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

---------------------------
-- Inserindo dados na tabela `usuarios`

INSERT INTO `testdb`.`usuarios` (`id`,`email`,`nome`,`password`,`status`,`perfil_id`) VALUES
(1, 'lennon@email.com','John', '56daf002d328229cf4ef837e0b0ecbde', 1, 1),
(2, 'paul_dead@email.com','Paul', '1f545a6d49bd6dc815ddd731d0c2a2ad',  1, 2),
(3, 'gegeorg@email.com','George', '9f9d51bc70ef21ca5c14f307980a29d8', 1, 2),
(4, 'starr_r@email.com','Ringo', 'c727b6e646efd75f99c2b75cb5b10570', 1, 2);
