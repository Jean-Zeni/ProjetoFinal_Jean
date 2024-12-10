-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/12/2024 às 02:32
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_livros`
--

CREATE TABLE `tb_livros` (
  `pk_id_livro` int(11) NOT NULL,
  `nome_livro` varchar(255) NOT NULL,
  `data_publicacao_livro` date NOT NULL,
  `valor_livro` double NOT NULL,
  `editora` varchar(255) NOT NULL,
  `img_livro` varchar(255) NOT NULL,
  `fk_id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_livros`
--

INSERT INTO `tb_livros` (`pk_id_livro`, `nome_livro`, `data_publicacao_livro`, `valor_livro`, `editora`, `img_livro`, `fk_id_autor`) VALUES
(2, 'aaa', '2024-12-05', 3, 'fsdfsd', 'uploads/67523af88dd14.jpg', 1),
(3, 'O Senhor dos Anéis', '2024-12-03', 12.9, 'aaa', 'uploads/675789765a4da.jpg', 4),
(4, 'As Crônicas de Nárnia', '2024-10-31', 12.9, 'aaa', 'uploads/675789b121a6a.jpg', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_livros`
--
ALTER TABLE `tb_livros`
  ADD PRIMARY KEY (`pk_id_livro`),
  ADD KEY `fk_id_autor` (`fk_id_autor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_livros`
--
ALTER TABLE `tb_livros`
  MODIFY `pk_id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_livros`
--
ALTER TABLE `tb_livros`
  ADD CONSTRAINT `tb_livros_ibfk_1` FOREIGN KEY (`fk_id_autor`) REFERENCES `tb_autores` (`pk_id_autor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
