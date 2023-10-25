DROP DATABASE IF EXISTS `fitnowbd`;

CREATE DATABASE `fitnowbd`;

USE `fitnowbd`;

CREATE TABLE `fitnowbd`.`Perfis` (
	`idPerfil` int not null primary key auto_increment,
	`nome` varchar(40) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Inserindo dados na tabela `Perfis`

INSERT INTO `fitnowbd`.`Perfis` (`idPerfil`,`nome`) VALUES
(1,'ADMINISTRADOR'),
(2,'CLIENTE COMUM'),
(3,'CLIENTE PLUS'),
(4,'PARCEIRO');

CREATE TABLE `fitnowbd`.`Usuarios` (
	`idUsuarios` int not null primary key auto_increment,
    `nome` varchar(45) not null,
    `cpf` varchar(15) not null,
    `email` varchar(60) not null,
    `senha` varchar(60) not null,
    `telefone` varchar(11) not null,
    `perfil_id` int not null,
    foreign key (perfil_id) references Perfis(idPerfil)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

select * from Usuarios;


-- Inserindo valores na tabela `Usuarios`

INSERT INTO `fitnowbd`.`Usuarios`(`idUsuarios`,`nome`,`cpf`,`email`,`senha`,`telefone`,`perfil_id`) VALUES
('1','John Lennon','755.082.370-70','lennon_peace@gmail.com','56daf002d328229cf4ef837e0b0ecbde','6931717357','2'),
('2','Paul McCartney','618.441.960-97','dead.paul@gmail.com','95dag002d325229cf4ef837e0b0ecbde','6191717385','3'),
('3','Ringo Starr','556.222.670-72','starr123@gmail.com','45daf002d325g29cf4ef837e1b0ecbde','6291717358','3'),
('4','George Harrison','304.556.350-30','gh.cool@gmail.com','78dah001d325g29cf4ef837e1b8ecbfe','6398596475','2'),
('5','Felipe Gregório','696.969.131-13','mrfelipe13@gmail.com','13daf001d325h29cf4ef837e1b8ecxfe','6195596475','1'),
('6','Steve Jobs','493.834.470-01','apple_daddy@gmail.com','15daf001d325h29cf4ef837e1b8ecxfj','6198596475','4'),
('7','Bill Gates','459.445.450-03','billy.kid@gmail.com','85daf002d325h29cf4ef837e1b8echfj','6297596475','4'),
('8','Frank Under','679.983.910-30','francis.fu@gmail.com','55dgf002d325h29cf4ef837e1b8echfu','6199596475','4'),
('9','Bruce Wayne','645.686.120-98','morcegao@gmail.com','88dgf002d325h13cf4ef837e1b8echfb','6198596375','4');

-- Criando a tabela `Academia`

CREATE TABLE `fitnowbd`.`Academia` (
    `idAcademia` int not null primary key auto_increment,
    `nome` varchar(45) not null,
    `cnpj` varchar(18) not null,
    `horarios` varchar(45) not null,
    `modalidades` varchar(45) not null,
    `valores` varchar(45) not null,
    `fotos` longblob not null,
    `academia_id` int not null,
    `parceiro_id` int not null,
    FOREIGN KEY (academia_id) REFERENCES Perfis(idPerfil),
    FOREIGN KEY (parceiro_id) REFERENCES Usuarios(idUsuarios)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Associando as chaves estrangeiras à Perfis e à Usuarios*/
/*Talvez no futuro seja necessário associar parceiro_id a outro atributo de Usuario Parceiro*/

INSERT INTO `fitnowbd`. `Academia` (`idAcademia`,`nome`,`cnpj`,`horarios`,`modalidades`,`valores`,`fotos`,`academia_id`,`parceiro_id`) VALUES
(1,'ARENA FIT','49.448.260/0001-13','8h às 21h','Musculação/Box','$20','TESTE','4','6'),
(2,'ARENA FIT','76.662.330/0001-04','8h às 19h','Musculação/Yoga','$25','TESTE','4','6'),
(3,'CORPO SAÚDE','12.555.646/0001-14','6h às 22h','Musculação/Yoga/Natação','$30','TESTE','4','7'),
(4,'EVOLUTION','04.257.711/0001-05','7h às 23h','Musculação/Pilates/Funcional','$30','TESTE','4','8'),
(5,'HARD GYM','46.351.806/0001-25','7h às 23h','Musculação','$20','TESTE','4','7'),
(6,'EVOLUTION','90.724.589/0001-63','8h às 21h','Musculação/Box','$25','TESTE','4','8'),
(7,'CORPO SAÚDE','28.770.387/0001-84','6h às 22h','Musculação/Yoga','$35','TESTE','4','7'),
(8,'NITRO BODY','77.896.062/0001-58','8h às 19h','Musculação/Natação','$30','TESTE','4','6'),
(9,'OLIMPO','01.674.532/0001-77','6h às 23h','Musculação/Pilates/Funcional','$30','TESTE','4','9'),
(10,'BAT CAVE','43.007.230/0001-95','7h às 21h','Musculação/Funcional','$40','TESTE','4','9');

INSERT INTO `fitnowbd`. `Academia` (`idAcademia`,`nome`,`cnpj`,`horarios`,`modalidades`,`valores`,`fotos`,`academia_id`,`parceiro_id`) VALUE
(11,'HARD GYM','11.633.940/0001-34','7h às 21h','Musculação/Box','$30','TESTE','4','7');

-- Criando tabela Endereco

CREATE TABLE `fitnowbd`.`Endereco` (
	`idEndereco` int not null primary key auto_increment,
	`logradouro` varchar(45) not null,
    `bairro` varchar(45) not null,
    `cidade` varchar(45) not null,
    `uf` char(2) not null,
    `complemento` varchar(45) not null,
    `numero` varchar(5) not null,
    `endereco_id` int not null,
    foreign key (endereco_id) references Academia(idAcademia)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `fitnowbd`.`Endereco` (`idEndereco`,`logradouro`,`bairro`,`cidade`,`uf`,`complemento`,`numero`,`endereco_id`) VALUES
('1','Quadra QS 404 Conjunto A','Samambaia Norte','Brasília','DF','Loja','12','1'),
('2','Quadra QNM 40 Conjunto D','Taguatinga Norte','Brasília','DF','Lote','150','2'),
('3','Quadra QR 327 Conjunto 4','Samambaia Sul','Brasília','DF','Loja','A1','3'),
('4','Conjunto SHA Conjunto 1','Arniqueiras','Brasília','DF','Chácara','56B','4'),
('5','Quadra EQNP 8/12 Bloco F','Ceilândia Sul','Brasília','DF','Loja','13','5'),
('6','Quadra SQS 113 Bloco H','Asa Norte','Brasília','DF','Loja','55','6'),
('7','Quadra QNP 24 Conjunto G','Ceilândia Sul','Brasília','DF','Lote','24','7');



