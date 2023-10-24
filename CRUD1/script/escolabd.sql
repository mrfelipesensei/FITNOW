
--
-- Banco de dados: `escolabd`
--
DROP SCHEMA IF EXISTS `escolabd`;

CREATE SCHEMA `escolabd`;

USE `escolabd`;
-- --------------------------------------------------------

--
-- Estrutura para tabela `perfis`
--

CREATE TABLE `escolabd`.`perfis` (
  `id` int NOT NULL PRIMARY KEY auto_increment,
  `nome` varchar(50) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `perfis`
--

INSERT INTO `escolabd`.`perfis` (`id`, `nome`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'GERENTE'),
(3, 'USUÁRIO COMUM');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `escolabd`.`usuarios` (
  `id` int NOT NULL PRIMARY KEY auto_increment,
  `email` varchar(255) NOT NULL ,
  `password` varchar(80) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `status` tinyint NOT NULL,
  `perfil_id` int NOT NULL,
  FOREIGN KEY (perfil_id) REFERENCES perfis(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `escolabd`.`usuarios` (`id`, `email`, `password`, `nome`, `status`, `perfil_id`) VALUES
(1, 'chico@email.com', '56daf002d328229cf4ef837e0b0ecbde', 'Chico', 1, 1),
(2, 'dora@email.com', '1f545a6d49bd6dc815ddd731d0c2a2ad', 'Dora', 1, 2),
(3, 'bob@email.com', '9f9d51bc70ef21ca5c14f307980a29d8', 'Bob', 1, 2),
(4, 'ademastor@email.com', 'c727b6e646efd75f99c2b75cb5b10570', 'Ademastor', 1, 2);

