-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/06/2025 às 03:00
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escola`
--

CREATE DATABASE escola;

USE escola;

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `matricula` varchar(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `codcurso` char(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`matricula`, `nome`, `endereco`, `cidade`, `codcurso`) VALUES
('20001', 'Bianca Fernandes', 'Rua Sol Nascente, 12', 'Campinas', '04'),
('20002', 'Luiz Otávio Martins', 'Av. Brasil, 445', 'São Paulo', '05'),
('20003', 'Fernanda Lima', 'Rua Esperança, 78', 'São Carlos', '06'),
('20004', 'Rodrigo Araújo', 'Rua das Palmeiras, 90', 'Limeira', '07'),
('20005', 'Camila Rocha', 'Rua Alegria, 303', 'Campinas', '04'),
('20006', 'Rafael dos Santos', 'Av. Paulista, 1001', 'São Paulo', '06'),
('20007', 'Ingrid Souza', 'Rua do Sol, 88', 'Ribeirão Preto', '05'),
('20008', 'Bruno Mendes', 'Rua Coração, 222', 'São Carlos', '07'),
('20009', 'Tainá Oliveira', 'Rua Arco Íris, 17', 'Campinas', '05'),
('20010', 'Diego Ramos', 'Av. Azul, 456', 'Americana', '06'),
('20011', 'Larissa Borges', 'Rua da Paz, 12', 'Limeira', '07'),
('20012', 'Felipe Martins', 'Rua Nova Era, 91', 'Campinas', '04'),
('20013', 'Júlia Castro', 'Rua dos Sonhos, 100', 'São Paulo', '05'),
('20014', 'Gabriel Leal', 'Av. Vitória, 333', 'São Carlos', '06'),
('20015', 'Isabela Silva', 'Rua do Saber, 400', 'Ribeirão Preto', '07'),
('20016', 'Lucas Vieira', 'Rua da Tecnologia, 55', 'Americana', '04'),
('20017', 'Priscila Andrade', 'Rua dos Estudantes, 88', 'Campinas', '06'),
('20018', 'Matheus Dias', 'Rua Inovação, 150', 'Limeira', '07'),
('20019', 'Vanessa Cruz', 'Rua do Código, 202', 'São Paulo', '05'),
('20020', 'Eduardo Lima', 'Rua 25 de Março, 300', 'Campinas', '04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `codcurso` char(2) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `coddisc1` char(2) NOT NULL,
  `coddisc2` char(2) NOT NULL,
  `coddisc3` char(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`codcurso`, `nome`, `coddisc1`, `coddisc2`, `coddisc3`) VALUES
('04', 'Redes de Computadores', '45', '46', '47'),
('05', 'Ciência de Dados', '48', '49', '50'),
('06', 'Engenharia de Software', '41', '42', '43'),
('07', 'Infraestrutura de TI', '44', '45', '46');

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `CodDisciplina` char(2) NOT NULL,
  `NomeDisciplina` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `disciplinas`
--

INSERT INTO `disciplinas` (`CodDisciplina`, `NomeDisciplina`) VALUES
('41', 'Estrutura de Dados'),
('42', 'Sistemas Operacionais'),
('43', 'Engenharia de Software'),
('44', 'Arquitetura de Computadores'),
('45', 'Redes de Computadores'),
('46', 'Segurança da Informação'),
('47', 'Cloud Computing'),
('48', 'Data Science'),
('49', 'Machine Learning'),
('50', 'Inteligência Artificial');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `matricula` (`matricula`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`codcurso`);

--
-- Índices de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`CodDisciplina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
