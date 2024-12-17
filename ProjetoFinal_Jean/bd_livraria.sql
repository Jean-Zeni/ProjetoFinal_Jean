-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Dez-2024 às 23:08
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_livraria`
--
CREATE DATABASE IF NOT EXISTS `bd_livraria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_livraria`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_autores`
--

CREATE TABLE `tb_autores` (
  `pk_id_autor` int(11) NOT NULL,
  `nome_autor` varchar(255) NOT NULL,
  `nacionalidade_autor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_autores`
--

INSERT INTO `tb_autores` (`pk_id_autor`, `nome_autor`, `nacionalidade_autor`) VALUES
(1, 'Clive Staples Lewis', 'Britânico(Irlandês)'),
(4, 'Tolkien', 'Britânico'),
(6, 'George Orwell', 'Britânico (Índia colonial)'),
(10, 'Machado de Assis', 'Brasileiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_editoras`
--

CREATE TABLE `tb_editoras` (
  `pk_id_editora` int(11) NOT NULL,
  `nome_editora` varchar(255) NOT NULL,
  `infos_editora` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_editoras`
--

INSERT INTO `tb_editoras` (`pk_id_editora`, `nome_editora`, `infos_editora`) VALUES
(2, 'Thomas Nelson', 'Veja nossas publicações dos livros de Clive Staples Lewis!'),
(3, 'Companhia das Letras', 'Veja nossas publicações de George Orwell\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_livros`
--

CREATE TABLE `tb_livros` (
  `pk_id_livro` int(11) NOT NULL,
  `nome_livro` varchar(255) NOT NULL,
  `data_publicacao_livro` date NOT NULL,
  `valor_livro` double NOT NULL,
  `img_livro` varchar(255) NOT NULL,
  `unidades` int(11) NOT NULL,
  `fk_id_autor` int(11) NOT NULL,
  `fk_id_editora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_livros`
--

INSERT INTO `tb_livros` (`pk_id_livro`, `nome_livro`, `data_publicacao_livro`, `valor_livro`, `img_livro`, `unidades`, `fk_id_autor`, `fk_id_editora`) VALUES
(17, 'Cristianismo Puro e Simples ', '1952-11-11', 44.9, '../uploads/6760c7d3f3c93.jpg', 17, 1, 2),
(18, 'A Revolução dos Bichos', '1967-11-11', 11.9, '../uploads/675dd3105f821.jpeg', 0, 6, 3),
(19, 'O Pequeno Príncipe', '1976-11-11', 11.9, '../uploads/675deae087e02.jpg', 0, 4, 2),
(21, 'Dom Casmurro ', '1860-11-11', 44.9, '../uploads/6760c6bfc6d7a.jpg', 19, 10, 3),
(22, 'Memórias Póstumas de Brás Cubas', '1879-11-11', 22.9, '../uploads/6760c50fa5be1.jpg', 30, 10, 3),
(23, 'O Espelho e Outros Contos', '1876-11-11', 55.99, '../uploads/6760c54d05aa1.jpg', 5, 10, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `pk_id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `email_usuario` varchar(255) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`pk_id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`) VALUES
(9, 'Maria Joana', 'jojo@gmail.com', '$2y$10$/j50AY0L3i0PHpoVsNkt/uEDZmJKouZQFzwbeueLlelx9cxQoDBua'),
(10, 'Maria Zeni', 'mae@gmail.com', '$2y$10$pWnofbQaT3s3qv70KfS3GuinSJBe.lzUN6bOy7VzMHRxD9goljq.y'),
(11, 'Jean', 'jean@gmail.com', '$2y$10$G9ntLqplOHKLdiYEqb9dzeNbjog6zoV75w5Esc.wHwjP3M18ioEyO'),
(12, 'Ana Paula', 'ana@gmail.com', '$2y$10$Es.lTKue99DrRGBJkViomeXxnCvpMxEsuPkJ2GJrhH30reMkDhOBC');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_autores`
--
ALTER TABLE `tb_autores`
  ADD PRIMARY KEY (`pk_id_autor`);

--
-- Índices para tabela `tb_editoras`
--
ALTER TABLE `tb_editoras`
  ADD PRIMARY KEY (`pk_id_editora`);

--
-- Índices para tabela `tb_livros`
--
ALTER TABLE `tb_livros`
  ADD PRIMARY KEY (`pk_id_livro`),
  ADD KEY `fk_id_autor` (`fk_id_autor`),
  ADD KEY `fk_id_editora` (`fk_id_editora`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`pk_id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_autores`
--
ALTER TABLE `tb_autores`
  MODIFY `pk_id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_editoras`
--
ALTER TABLE `tb_editoras`
  MODIFY `pk_id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_livros`
--
ALTER TABLE `tb_livros`
  MODIFY `pk_id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `pk_id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_livros`
--
ALTER TABLE `tb_livros`
  ADD CONSTRAINT `tb_livros_ibfk_1` FOREIGN KEY (`fk_id_autor`) REFERENCES `tb_autores` (`pk_id_autor`),
  ADD CONSTRAINT `tb_livros_ibfk_2` FOREIGN KEY (`fk_id_editora`) REFERENCES `tb_editoras` (`pk_id_editora`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
