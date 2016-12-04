-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Nov-2016 às 20:32
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grafica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `tipo`, `preco`, `descricao`) VALUES
(2, 'cartao de visita', 'cartao', '90.00', 'cartao de visita'),
(3, 'promocao', 'promocao', '100.00', 'descricao'),
(4, 'Folheto', 'folheto', '100.00', 'descricao'),
(5, 'receituario', 'receituario', '100.00', 'descricao'),
(6, 'bloco', 'bloco', '100.00', 'descricao'),
(7, 'Cartao de Visita', 'cartao', '100.00', 'descricao'),
(8, 'Banner', 'banner', '100.00', 'descricao'),
(9, 'Envelope', 'envelope', '100.00', 'descricao'),
(10, 'Comanda', 'comanda', '100.00', 'descricao'),
(11, 'TalÃ£o', 'talao', '100.00', 'descricao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` int(11) NOT NULL,
  `telefone` int(12) NOT NULL,
  `data_nasc` date NOT NULL,
  `senha` varchar(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cpf`, `telefone`, `data_nasc`, `senha`, `email`, `tipo`) VALUES
(1, 'admin', 0, 0, '0000-00-00', 'admin', 'admin@admin', 'admin'),
(36, 'rubens', 0, 123, '0000-00-00', '123', 'rubens@rubens.com', ''),
(37, 'asdas', 0, 123, '0000-00-00', '123', '123@123', ''),
(44, 'rubao', 0, 123, '0000-00-00', '123', 'rubao@rubao.com', ''),
(45, 'adriana', 0, 123, '0000-00-00', '123', 'adriana@hotmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
