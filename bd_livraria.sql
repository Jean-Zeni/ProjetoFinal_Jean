-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/12/2024 às 21:36
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
-- Banco de dados: `bd_livraria`
--
CREATE DATABASE IF NOT EXISTS `bd_livraria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_livraria`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_autores`
--

CREATE TABLE `tb_autores` (
  `pk_id_autor` int(11) NOT NULL,
  `nome_autor` varchar(255) NOT NULL,
  `nacionalidade_autor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_autores`
--

INSERT INTO `tb_autores` (`pk_id_autor`, `nome_autor`, `nacionalidade_autor`) VALUES
(1, 'C.S. Lewis', 'Britânico(Irlandês)'),
(4, 'J.R.R. Tolkien', 'Britânico'),
(6, 'George Orwell', 'Britânico (Índia colonial)'),
(10, 'Machado de Assis', 'Brasileiro'),
(13, 'Augusto Cury', 'Brasileiro'),
(14, 'Victor Hugo', 'Francês');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_editoras`
--

CREATE TABLE `tb_editoras` (
  `pk_id_editora` int(11) NOT NULL,
  `nome_editora` varchar(255) NOT NULL,
  `infos_editora` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_editoras`
--

INSERT INTO `tb_editoras` (`pk_id_editora`, `nome_editora`, `infos_editora`) VALUES
(2, 'Thomas Nelson', 'Veja nossas publicações dos livros de Clive Staples Lewis!'),
(3, 'Companhia das Letras', 'Veja nossas publicações de George Orwell\r\n'),
(5, 'Vitrola', 'Publicamos seus títulos favoritos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_livros`
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
-- Despejando dados para a tabela `tb_livros`
--

INSERT INTO `tb_livros` (`pk_id_livro`, `nome_livro`, `data_publicacao_livro`, `valor_livro`, `img_livro`, `unidades`, `fk_id_autor`, `fk_id_editora`) VALUES
(18, 'A Revolução dos Bichos    ', '1967-11-11', 11.9, '../uploads/67631cadbeb67.jpeg', 5, 6, 3),
(24, 'Os Miseráveis', '1878-11-11', 65.9, '../uploads/67631c8c38ea8.jpeg', 3, 14, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `pk_id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `email_usuario` varchar(255) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`pk_id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`) VALUES
(14, 'Jean', 'jean@gmail.com', '$2y$10$ZM7GgspDny/QWYqCUmUKIeMPwEC6IPG/55Q.T/ebDszp6VMCWvo8y'),
(15, 'Cleberson', 'Clebito@gmail.com', '$2y$10$Tmtj.3CeTuD7F7UwmiZz3OP3iiLshoqYxpnvA1MYDJA.IgIrVQxGS');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_autores`
--
ALTER TABLE `tb_autores`
  ADD PRIMARY KEY (`pk_id_autor`),
  ADD UNIQUE KEY `nome_autor` (`nome_autor`);

--
-- Índices de tabela `tb_editoras`
--
ALTER TABLE `tb_editoras`
  ADD PRIMARY KEY (`pk_id_editora`),
  ADD UNIQUE KEY `nome_editora` (`nome_editora`);

--
-- Índices de tabela `tb_livros`
--
ALTER TABLE `tb_livros`
  ADD PRIMARY KEY (`pk_id_livro`),
  ADD KEY `fk_id_autor` (`fk_id_autor`),
  ADD KEY `fk_id_editora` (`fk_id_editora`);

--
-- Índices de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`pk_id_usuario`),
  ADD UNIQUE KEY `email_usuario` (`email_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_autores`
--
ALTER TABLE `tb_autores`
  MODIFY `pk_id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_editoras`
--
ALTER TABLE `tb_editoras`
  MODIFY `pk_id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_livros`
--
ALTER TABLE `tb_livros`
  MODIFY `pk_id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `pk_id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_livros`
--
ALTER TABLE `tb_livros`
  ADD CONSTRAINT `tb_livros_ibfk_1` FOREIGN KEY (`fk_id_autor`) REFERENCES `tb_autores` (`pk_id_autor`),
  ADD CONSTRAINT `tb_livros_ibfk_2` FOREIGN KEY (`fk_id_editora`) REFERENCES `tb_editoras` (`pk_id_editora`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
