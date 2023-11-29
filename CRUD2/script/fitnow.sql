-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/11/2023 às 12:59
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
(11, 'Fit Life', '41745969000179', '6h às 22h', 'Musculação/Funcional', 60, '70835140', 'Asa Norte', 'SQN 403 Bloco N Loja', '14'),
(12, 'BIG MUSCLE', '42748045000199', '6h às 22h', 'Natação/Yoga', 50, '72210046', 'Ceilândia Norte', 'QNM 4 Conjunto F Loja ', '13'),
(13, 'FIT MORE', '58620773000150', '8h às 21h', 'Musculação/Funcional', 40, '72025525', 'Taguatinga Sul', 'Quadra CSF 2', '64'),
(14, 'ATLAS ACADEMY', '78325055000169', '8h às 22h', 'Musculação/Box/Luta/Crossfit', 50, '71575455', 'Paranoá', 'Quadra 39 Conjunto K Loja', '15'),
(15, 'Elite Training', '32858419000175', '8h às 21h', 'Natação/Funcional/Luta', 55, '70686730', 'Setor Noroeste', 'SQNW 111 Bloco F Lote', '45'),
(16, 'Núcleo Fit', '96948561000196', '7h às 19h', 'Funcional/Spinning', 60, '72603118', 'Recanto das Emas', 'Quadra 113 Conjunto 16 Loja', '12'),
(17, 'Stellar Gym', '04616363000107', '8h às 21h', 'Box/Funcional/Spinning', 70, '70345040', 'Asa Sul', 'SQS 106 Bloco D Loja', '45'),
(18, 'Vibe Atlética', '86115266000103', '6h às 00h', 'Dança/Funcional/Box/Luta', 40, '71745607', 'Park Way', 'Quadra SMPW Quadra 26 Conjunto 7 Lt', '130'),
(19, 'Magma Movement', '22848861000167', '7h às 22h', 'Judô/Box/Jiu-Jitsu', 45, '72405916', 'Gama', 'Quadra 55 Bloco 5 Lote ', '3'),
(20, 'Domínio Fit', '78939260000114', '7h às 22h', 'Pilates/Corrida/Dança', 45, '70640098', 'Gama', 'Quadra 53 Projeção 2 Lote ', '12'),
(21, 'Astral Arena', '12406082000158', '8h às 22h', 'Musculação/Pilates', 60, '73340110', 'Planaltina', 'Quadra 1 Conjunto J Lote', '666'),
(22, 'TROPA de ELITE', '28228700000157', '24h', 'Judô/Box/Jiu-Jitsu/Crossfit/Musculação', 70, '73031650', 'Sobradinho', 'Quadra 5 Comércio Local 20', '78'),
(23, 'Fronteira Fit', '76584906000162', '8h às 21h', 'Dança/Pilates/Yoga', 45, '71727005', 'Candangolândia', 'Quadra QR O Conjunto E Loja', '49'),
(26, 'GymNation', '12345678900012', '7h às 23h', 'Funcional/Spinning', 60, '72151400', 'Taguatinga Sul', 'Quadra QSB 3 Bloco C Loja', '7'),
(27, 'FitMax', '56789012300045', '6h às 21h', 'Musculação/Yoga', 50, '72640123', 'Recanto das Emas', 'Quadra 302 Conjunto 1A Lt', '5'),
(28, 'PowerHouse', '90123456700089', '8h às 22h', 'Crossfit/Boxing', 65, '72360321', 'Samambaia Norte', 'QR 408 Conjunto 15 Loja', '9'),
(29, 'FitHub', '34567890100123', '7h às 20h', 'Pilates/Funcional', 55, '71090123', 'Guará II', 'Quadra QE 34 Conjunto A Lt', '13'),
(30, 'MegaFit', '67890123400123', '5h às 23h', 'Musculação/Crossfit', 70, '72170123', 'Taguatinga Norte', 'Quadra QNA 17 Bloco E Loja', '3'),
(31, 'Vitality Gym', '90123456700123', '6h às 22h', 'Funcional/Yoga', 60, '72670123', 'Recanto das Emas', 'Quadra 402 Conjunto 1 Lt', '25'),
(32, 'FitZone', '23456789000123', '7h às 21h', 'Musculação/Pilates', 50, '72480123', 'Gama', 'Quadra 803 Conjunto A Loja', '8'),
(33, 'Core Fitness', '45678901200123', '8h às 20h', 'Funcional/Spinning', 55, '71010123', 'Guará I', 'Quadra QE 10 Conjunto B Lt', '17'),
(34, 'Energize', '78901234500123', '7h às 22h', 'Musculação/Boxing', 65, '72290123', 'Ceilândia Sul', 'QNN 29 Conjunto G Loja', '4'),
(35, 'PulseFit', '12345678910012', '6h às 23h', 'Crossfit/Funcional', 70, '72380123', 'Samambaia Sul', 'QR 308 Conjunto 10A Lt', '11'),
(36, 'Fit Fusion', '34567891010012', '8h às 21h', 'Pilates/Yoga', 60, '72560123', 'Riacho Fundo I', 'QS 6 Conjunto 12A Loja', '6'),
(37, 'BodyTech', '56789101110012', '7h às 22h', 'Musculação/Spinning', 75, '72620123', 'Recanto das Emas', 'Quadra 202 Conjunto 1B Lt', '14'),
(38, 'Fitland', '78910111210012', '6h às 21h', 'Funcional/Zumba', 55, '72440123', 'Gama', 'Quadra 444 Conjunto B Loja', '7'),
(39, 'TotalFit', '10111213110012', '7h às 20h', 'Musculação/Boxing', 65, '72250123', 'Ceilândia Norte', 'QNN 25 Conjunto E Loja', '9'),
(40, 'Dynamic Fitness', '11121314110012', '8h às 22h', 'Crossfit/Funcional', 70, '72350123', 'Samambaia Norte', 'QR 350 Conjunto 12 Loja', '13'),
(41, 'FitMotion', '12131415110012', '6h às 21h', 'Musculação/Yoga', 55, '72450123', 'Gama', 'Quadra 450 Conjunto A Loja', '8'),
(42, 'Zenith Gym', '13141516110012', '7h às 23h', 'Funcional/Spinning', 65, '72550123', 'Riacho Fundo II', 'QN 5 Conjunto 10A Loja', '17'),
(43, 'Vigor Fitness', '14151617110012', '8h às 20h', 'Musculação/Boxing', 60, '72650123', 'Recanto das Emas', 'Quadra 650 Conjunto 15 Lt', '4'),
(44, 'FitSphere', '15161718110012', '7h às 22h', 'Crossfit/Spinning', 75, '72750123', 'Santa Maria', 'Quadra 750 Conjunto 10 Loja', '11'),
(45, 'GymFlow', '16171819110012', '6h às 21h', 'Funcional/Zumba', 55, '72850123', 'Sobradinho II', 'Quadra 850 Conjunto 5A Lt', '6'),
(46, 'Elevate Fitness', '17181920110012', '7h às 20h', 'Pilates/Boxing', 65, '72950123', 'Planaltina', 'Quadra 950 Conjunto C Loja', '9'),
(47, 'FitUniverse', '18192021110012', '8h às 22h', 'Musculação/Spinning', 70, '73050123', 'Sobradinho', 'Quadra 1050 Conjunto A Loja', '13'),
(48, 'CorePower', '19202122110012', '7h às 20h', 'Funcional/Yoga', 60, '73150123', 'Sudoeste', 'Quadra CLSW 150 Bloco B Loja', '7'),
(49, 'Fitness Fusion', '20212223110012', '8h às 21h', 'Crossfit/Pilates', 65, '73250123', 'Taguatinga Centro', 'Quadra CSD 250 Loja', '9'),
(50, 'ZenFitness', '21222324110012', '6h às 22h', 'Musculação/Funcional', 70, '73350123', 'Taguatinga Sul', 'Quadra QSE 350 Conjunto G Lt', '11'),
(51, 'PowerMoves', '22232425110012', '7h às 23h', 'Funcional/Spinning', 75, '73450123', 'Vicente Pires', 'Rua 5A Chácara 123 Loja', '14'),
(52, 'FitCamp', '23242526110012', '8h às 22h', 'Musculação/Boxing', 65, '73550123', 'Santa Maria', 'Quadra 550 Conjunto 12A Lt', '8'),
(53, 'EcoFitness', '24252627110012', '7h às 21h', 'Funcional/Zumba', 60, '73650123', 'Sobradinho II', 'Quadra 650 Conjunto 3 Loja', '6'),
(54, 'PureMotion', '25262728110012', '6h às 20h', 'Pilates/Yoga', 55, '73750123', 'Planaltina', 'Quadra 750 Conjunto B Loja', '9'),
(55, 'GymZen', '26272829110012', '7h às 22h', 'Musculação/Spinning', 70, '73850123', 'Sobradinho', 'Quadra 850 Conjunto 5 Loja', '11'),
(56, 'FitVibe', '27282930110012', '8h às 21h', 'Crossfit/Funcional', 75, '73950123', 'Sudoeste', 'Quadra 950 Conjunto C Loja', '13'),
(57, 'FusionFitness', '28293031110012', '7h às 22h', 'Funcional/Boxing', 65, '74050123', 'Taguatinga Centro', 'Quadra CSD 1050 Loja', '8'),
(58, 'VitalFitness', '29303132110012', '6h às 21h', 'Musculação/Yoga', 60, '74150123', 'Taguatinga Sul', 'Quadra QSE 150 Conjunto D Lt', '9'),
(59, 'Elevate', '30313233110012', '8h às 20h', 'Pilates/Spinning', 65, '74250123', 'Vicente Pires', 'Rua 10A Chácara 321 Loja', '7'),
(60, 'FlexXtreme', '31323334110012', '7h às 23h', 'Crossfit/Funcional', 70, '74350123', 'Santa Maria', 'Quadra 350 Conjunto 7A Lt', '11'),
(61, 'LifeCore', '32333435110012', '8h às 21h', 'Funcional/Yoga', 60, '74450123', 'Sobradinho II', 'Quadra 450 Conjunto 10 Loja', '9'),
(62, 'EcoPulse', '33343536110012', '7h às 22h', 'Musculação/Boxing', 65, '74550123', 'Planaltina', 'Quadra 550 Conjunto B Loja', '8'),
(63, 'FitFusion', '34353637110012', '6h às 20h', 'Pilates/Zumba', 55, '74650123', 'Sobradinho', 'Quadra 650 Conjunto 3 Loja', '6'),
(64, 'GymPlus', '35363738110012', '7h às 21h', 'Funcional/Spinning', 70, '74750123', 'Sudoeste', 'Quadra 750 Conjunto 5 Loja', '11'),
(65, 'PowerFit', '36373839110012', '8h às 22h', 'Crossfit/Boxing', 75, '74850123', 'Taguatinga Centro', 'Quadra 850 Conjunto C Loja', '13'),
(66, 'FitCity', '37383940110012', '7h às 20h', 'Musculação/Yoga', 60, '74950123', 'Taguatinga Sul', 'Quadra QSE 950 Conjunto B Lt', '9'),
(67, 'EcoMotion', '38404142110012', '6h às 22h', 'Pilates/Spinning', 65, '75050123', 'Vicente Pires', 'Rua 15A Chácara 421 Loja', '7'),
(68, 'CoreZone', '40414243110012', '7h às 21h', 'Funcional/Zumba', 60, '75150123', 'Santa Maria', 'Quadra 150 Conjunto 3A Lt', '9'),
(69, 'FitElevate', '41424344110012', '8h às 20h', 'Musculação/Boxing', 65, '75250123', 'Sobradinho II', 'Quadra 250 Conjunto B Loja', '8'),
(70, 'FlexMotion', '42434445110012', '7h às 22h', 'Crossfit/Spinning', 70, '75350123', 'Planaltina', 'Quadra 350 Conjunto 7 Loja', '11'),
(71, 'VitaFitness', '43444546110012', '8h às 21h', 'Funcional/Yoga', 60, '75450123', 'Sobradinho', 'Quadra 450 Conjunto 10 Loja', '9'),
(72, 'FitPulse', '44454647110012', '7h às 22h', 'Musculação/Spinning', 70, '75550123', 'Sudoeste', 'Quadra 550 Conjunto 5 Loja', '11'),
(73, 'ElevateFit', '45464748110012', '8h às 21h', 'Crossfit/Funcional', 75, '75650123', 'Taguatinga Centro', 'Quadra 650 Conjunto C Loja', '13'),
(74, 'CoreVibe', '46474849110012', '7h às 20h', 'Funcional/Zumba', 60, '75750123', 'Taguatinga Sul', 'Quadra QSE 750 Conjunto D Lt', '9'),
(76, 'FitVital', '48495051110012', '7h às 21h', 'Funcional/Spinning', 70, '75950123', 'Santa Maria', 'Quadra 950 Conjunto 8 Loja', '11'),
(77, 'CoreFit', '49505152110012', '8h às 20h', 'Crossfit/Boxing', 75, '76050123', 'Sobradinho II', 'Quadra 550 Conjunto C Loja', '13'),
(78, 'PulseMotion', '50515253110012', '7h às 22h', 'Musculação/Yoga', 60, '76150123', 'Planaltina', 'Quadra 615 Conjunto A Loja', '9'),
(79, 'EcoCore', '51525354110012', '8h às 21h', 'Pilates/Spinning', 65, '76250123', 'Sobradinho', 'Quadra 750 Conjunto 10 Loja', '11'),
(80, 'VitaMotion', '52535455110012', '7h às 22h', 'Funcional/Zumba', 70, '76350123', 'Sudoeste', 'Quadra 850 Conjunto 5 Loja', '9'),
(81, 'ElevateZone', '53545556110012', '8h às 21h', 'Crossfit/Funcional', 75, '76450123', 'Taguatinga Centro', 'Quadra 650 Conjunto B Loja', '13'),
(82, 'FitZen', '54555657110012', '7h às 20h', 'Musculação/Yoga', 60, '76550123', 'Taguatinga Sul', 'Quadra QSE 750 Conjunto D Lt', '9'),
(83, 'GymFlex', '55565758110012', '6h às 22h', 'Funcional/Spinning', 65, '76650123', 'Vicente Pires', 'Rua 10A Chácara 621 Loja', '11'),
(84, 'VitaPulse', '56575859110012', '7h às 21h', 'Crossfit/Boxing', 70, '76750123', 'Santa Maria', 'Quadra 750 Conjunto 9 Loja', '13'),
(85, 'EcoFit', '57585960110012', '8h às 20h', 'Funcional/Zumba', 75, '76850123', 'Sobradinho II', 'Quadra 850 Conjunto C Loja', '9'),
(86, 'FitCore', '58596061110012', '7h às 22h', 'Musculação/Spinning', 60, '76950123', 'Planaltina', 'Quadra 650 Conjunto A Loja', '11'),
(87, 'PulseZone', '59606162110012', '8h às 21h', 'Pilates/Yoga', 65, '77050123', 'Sobradinho', 'Quadra 750 Conjunto 11 Loja', '9'),
(88, 'VitaCore', '60616263110012', '7h às 22h', 'Funcional/Spinning', 70, '77150123', 'Sudoeste', 'Quadra 850 Conjunto 6 Loja', '11'),
(89, 'ElevateFit', '61626364110012', '8h às 21h', 'Crossfit/Boxing', 75, '77250123', 'Taguatinga Centro', 'Quadra 650 Conjunto D Loja', '13'),
(90, 'FitFlex', '62636465110012', '7h às 20h', 'Musculação/Zumba', 60, '77350123', 'Taguatinga Sul', 'Quadra QSE 750 Conjunto E Lt', '9'),
(91, 'EcoPulse', '63646566110012', '6h às 22h', 'Funcional/Spinning', 65, '77450123', 'Vicente Pires', 'Rua 5A Chácara 731 Loja', '11'),
(92, 'VitaMotion', '64656667110012', '7h às 21h', 'Crossfit/Boxing', 70, '77550123', 'Santa Maria', 'Quadra 750 Conjunto 12 Loja', '13'),
(93, 'ElevateZone', '65666768110012', '8h às 20h', 'Funcional/Zumba', 75, '77650123', 'Sobradinho II', 'Quadra 850 Conjunto F Loja', '9'),
(94, 'FitZen', '66676869110012', '7h às 22h', 'Musculação/Spinning', 60, '77750123', 'Planaltina', 'Quadra 650 Conjunto B Loja', '11'),
(95, 'GymFlex', '67686970110012', '8h às 21h', 'Pilates/Yoga', 65, '77850123', 'Sobradinho', 'Quadra 750 Conjunto 13 Loja', '9'),
(96, 'VitaPulse', '68697071110012', '7h às 22h', 'Funcional/Spinning', 70, '77950123', 'Sudoeste', 'Quadra 850 Conjunto 7 Loja', '11'),
(97, 'EcoFit', '69707172110012', '8h às 21h', 'Crossfit/Boxing', 75, '78050123', 'Taguatinga Centro', 'Quadra 650 Conjunto G Loja', '13'),
(98, 'FitCore', '70717273110012', '7h às 20h', 'Funcional/Zumba', 60, '78150123', 'Taguatinga Sul', 'Quadra QSE 750 Conjunto H Lt', '9'),
(99, 'PulseZone', '71727374110012', '6h às 22h', 'Musculação/Spinning', 65, '78250123', 'Vicente Pires', 'Rua 10A Chácara 821 Loja', '11'),
(100, 'FitActive', '72737475110012', '8h às 21h', 'Funcional/Yoga', 70, '78350123', 'Santa Maria', 'Quadra 750 Conjunto 14 Loja', '13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `assinatura`
--

CREATE TABLE `assinatura` (
  `idUsuario` int(11) NOT NULL,
  `data_hora_clique` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `assinatura`
--

INSERT INTO `assinatura` (`idUsuario`, `data_hora_clique`) VALUES
(13, 2023);

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
  `perfil` varchar(30) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nome`, `cpf`, `email`, `senha`, `perfil`, `foto_perfil`) VALUES
(1, 'FELIPE', 64746900000, 'mrfelipesensei@gmail.com', '123456', 'Admin', NULL),
(2, 'TininhaA', 123457000, 'tina@tina.com', '654', 'Cliente', NULL),
(3, 'Batman', 202.821, 'bruce@gmail.com', '666', 'Cliente+', NULL),
(6, 'Steve Jobs', 51598300000, 'mac_daddy@gmail.com', '321', 'Parceiro', NULL),
(10, 'Karine', 12377, 'karine_k@gmail.com', '741', 'Cliente', NULL),
(11, 'Teste', 45456500, 'teste@gmail.com', '4545', 'Cliente', NULL),
(13, 'Ronie', 4757900, 'ronie@exemplo.com', '123', 'Cliente+', 'house.jpg');

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
  MODIFY `idAcademia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
