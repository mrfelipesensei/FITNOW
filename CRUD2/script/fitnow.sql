-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/11/2023 às 19:50
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
DROP DATABASE IF EXISTS `fitnow`;
CREATE DATABASE `fitnow`;
USE `fitnow`;

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
(1, 'ARENA FIT', '17937053000136', '7h às 21h', 'Musculação/Funcional', 50, '70830452', 'Asa Norte', 'SGAN 610 Módulo B Lt', '66'),
(2, 'BODY PAIN', '82930368000113', '6h às 22h', 'Musculação/Yoga/Box', 40, '72610421', 'Recanto das Emas', 'Quadra 204 Cj 21 Loja', '50'),
(3, 'ACQUA FIT', '43156310000102', '7h às 19h', 'Musculação/Natação', 55, '71015026', 'Guará I', 'Quadra QI 20 Conjunto B Lt', '40'),
(4, 'RED HOT GYM', '37245988000169', '8h às 22h', 'Box/Jiu-Jitsu/Luta', 40, '72308402', 'Samambaia Sul', 'Quadra QN 316 Conjunto 2 Lt', '12'),
(5, 'SOS FIT', '97996708000186', '5h às 21h', 'Musculação/Funcional', 40, '72260874', 'Ceilândia Norte', 'Quadra QNO 18 Conjunto 74 Loja', '25'),
(6, 'USSR GYM', '85657953000180', '6h às 22h', 'Musculação/Luta', 35, '72341403', 'Samambaia Norte', 'QR 209 Conjunto 3 Lote', '13'),
(7, 'GORILLAS', '63448156000150', '7h às 23h', 'Crossfit/Funcional', 60, '72125310', 'Taguatinga Norte', 'Quadra QNE 31 Loja', '31'),
(8, 'Star Bem Fit', '06453388000162', '5h às 22h ', 'Musculação/Luta', 57, '72255311', 'Ceilândia Norte', 'QNO 13 Conjunto K Loja', '40'),
(9, 'HORSE POWER', '28965185000198', '6h às 00h', 'Musculação/Luta/Box', 55, '72220403', 'Ceilândia Sul', 'QNN 40 Conjunto C Loja', '15'),
(10, 'FIGHT CLUB', '35857495000154', '19h às 00h', 'Luta', 40, '72015525', 'Taguatinga Sul', 'Quadra CSB 2 Bloco A Loja', '01'),
(11, 'Fit Life', '41745969000179', '6h às 22h', 'Musculação/Funcional', 60, '70835140', 'Asa Norte', 'SQN 403 Bloco N Loja', '14');

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
  MODIFY `idAcademia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
