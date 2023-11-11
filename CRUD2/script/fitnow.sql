-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Nov-2023 às 12:51
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fitnow`
DROP DATABASE IF EXISTS `fitnow`;
CREATE DATABASE `fitnow`;
USE `fitnow`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `academias`
--

CREATE TABLE `academias` (
  `idAcademia` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `horarios` varchar(10) NOT NULL,
  `modalidades` varchar(60) NOT NULL,
  `valores` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `academias`
--

INSERT INTO `academias` (`idAcademia`, `nome`, `cnpj`, `horarios`, `modalidades`, `valores`) VALUES
(1, 'BATCAVE', '55724924000122', '6h as 22h', 'Musculação/Luta', 666),
(2, 'ARENA FIT', '20612181000114', '7h às 22h', 'Yoga/Funcional', 57),
(3, 'INFERNO GYM', '66666666666666', '6h às 18h', 'Boxing/Luta', 99);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL,
  `uf` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cep` varchar(16) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `idAcademia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(140) NOT NULL,
  `cpf` float NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `perfil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nome`, `cpf`, `email`, `senha`, `perfil`) VALUES
(1, 'FELIPE', 64746900000, 'mrfelipesensei@gmail.com', '123456', 'Admin'),
(2, 'TininhaA', 123457000, 'tina@tina.com', '654', 'Cliente'),
(3, 'Batman', 202.821, 'bruce@gmail.com', '666', 'Cliente+'),
(6, 'Steve Jobs', 51598300000, 'mac_daddy@gmail.com', '321', 'Parceiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_academia`
--

CREATE TABLE `usuario_academia` (
  `idUsuario` int(11) NOT NULL,
  `idAcademia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `academias`
--
ALTER TABLE `academias`
  ADD PRIMARY KEY (`idAcademia`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`),
  ADD KEY `teste` (`idAcademia`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `usuario_academia`
--
ALTER TABLE `usuario_academia`
  ADD KEY `test` (`idAcademia`),
  ADD KEY `test2` (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `academias`
--
ALTER TABLE `academias`
  MODIFY `idAcademia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `teste` FOREIGN KEY (`idAcademia`) REFERENCES `academias` (`idAcademia`);

--
-- Limitadores para a tabela `usuario_academia`
--
ALTER TABLE `usuario_academia`
  ADD CONSTRAINT `test` FOREIGN KEY (`idAcademia`) REFERENCES `academias` (`idAcademia`),
  ADD CONSTRAINT `test2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
