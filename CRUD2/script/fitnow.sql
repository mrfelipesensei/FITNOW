-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/11/2023 às 13:54
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fitnow`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `academias`
--

CREATE TABLE `academias` (
  `idAcademia` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `horarios` varchar(10) NOT NULL,
  `modalidades` varchar(60) NOT NULL,
  `valores` float NOT NULL,
  `cep` varchar(20) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `numero` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `academias`
--

INSERT INTO `academias` (`idAcademia`, `nome`, `cnpj`, `horarios`, `modalidades`, `valores`, `cep`, `bairro`, `complemento`, `numero`) VALUES
(1, 'TESTE', '55724924000122', '7H as 22h', 'Luta', 66, '7231457', 'Ceilândia Norte', 'QNN 19 Cj N Loja', '754');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(140) NOT NULL,
  `cpf` float NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `perfil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nome`, `cpf`, `email`, `senha`, `perfil`) VALUES
(1, 'FELIPE', 64746900000, 'mrfelipesensei@gmail.com', '123456', 'Admin'),
(2, 'TininhaA', 123457000, 'tina@tina.com', '654', 'Cliente'),
(3, 'Batman', 202.821, 'bruce@gmail.com', '666', 'Cliente+'),
(6, 'Steve Jobs', 51598300000, 'mac_daddy@gmail.com', '321', 'Parceiro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario_academia`
--

CREATE TABLE `usuario_academia` (
  `idUsuario` int(11) NOT NULL,
  `idAcademia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario_academia`
--

INSERT INTO `usuario_academia` (`idUsuario`, `idAcademia`) VALUES
(6, 22);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `academias`
--
ALTER TABLE `academias`
  ADD PRIMARY KEY (`idAcademia`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `usuario_academia`
--
ALTER TABLE `usuario_academia`
  ADD KEY `test` (`idAcademia`),
  ADD KEY `test2` (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `academias`
--
ALTER TABLE `academias`
  MODIFY `idAcademia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
