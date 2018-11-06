-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Out-2018 às 17:01
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fasterfoodservice`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `nome` varchar(45) NOT NULL,
  `precoCompra` float DEFAULT NULL,
  `precoVenda` float DEFAULT NULL,
  `idProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiaprima`
--

CREATE TABLE `materiaprima` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `quantidade` float NOT NULL,
  `precoCompra` float NOT NULL,
  `precoUnidade` float NOT NULL,
  `qtdPedacos` int(11) NOT NULL,
  `tipoMateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materiaprima`
--

INSERT INTO `materiaprima` (`id`, `nome`, `quantidade`, `precoCompra`, `precoUnidade`, `qtdPedacos`, `tipoMateria`) VALUES
(1, 'TOMATE', 170, 18, 0.04, 8, 1),
(3, 'QUEIJO MUSSARELA', 160, 28, 0.28, 100, 1),
(4, 'QUEIJO PARMESãO', 101, 35, 1.17, 30, 1),
(5, 'df', 50, 454, 10.09, 45, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiaprima_produto`
--

CREATE TABLE `materiaprima_produto` (
  `id` int(11) NOT NULL,
  `idMateriaPrima` int(11) DEFAULT NULL,
  `idProduto` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materiaprima_produto`
--

INSERT INTO `materiaprima_produto` (`id`, `idMateriaPrima`, `idProduto`, `quantidade`) VALUES
(1, NULL, NULL, NULL),
(2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `precoCompra` float NOT NULL,
  `precoVenda` float NOT NULL,
  `tipoProduto` int(11) NOT NULL,
  `quantidade` float NOT NULL,
  `idTamanho` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `precoCompra`, `precoVenda`, `tipoProduto`, `quantidade`, `idTamanho`) VALUES
(3, 'coca cola 2 litros', 4, 7, 2, 686, NULL),
(5, 'FANTA 2 LITROS', 4, 7, 2, 97, NULL),
(6, 'CHOCOLATE BARRA GAROTO MEL COM AçUCAR', 3, 4, 2, 1187, NULL),
(7, 'HALLS PRETO 100 KILOS', 1.2, 2, 2, 340, NULL),
(8, 'PIZZA 4 QUEIJOS', 0, 38, 1, 0, 5),
(9, 'Yokitos 120 Mg Presunto', 1, 3, 2, 110, NULL),
(10, 'Bolacha Passa-Tempo 90g', 10, 30, 2, 430, NULL),
(11, 'aa', 12, 323, 2, 75, NULL),
(12, 'teste ti', 10.89, 10.57, 2, 23, NULL),
(13, 'Régua A4', 2.8, 5.75, 2, 10, NULL),
(14, 'Pão Frances Ensopado', 3, 4.5, 2, 35, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho`
--

CREATE TABLE `tamanho` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `qtdPedacos` int(11) NOT NULL,
  `qtdSabores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tamanho`
--

INSERT INTO `tamanho` (`id`, `nome`, `qtdPedacos`, `qtdSabores`) VALUES
(1, 'Pequeno', 8, 1),
(2, 'Médio', 12, 2),
(3, 'Grande', 16, 2),
(4, 'Gigante', 18, 3),
(5, 'Plus Ultra', 25, 5),
(6, 'Choji', 30, 6),
(7, 'Sua Mãe', 8000, 10),
(8, 'Armando', 2147483647, 8000),
(9, 'Child', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `status` char(1) NOT NULL,
  `tipoUsuario` int(11) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `rg` varchar(9) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) NOT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`, `status`, `tipoUsuario`, `cpf`, `endereco`, `telefone`, `rg`, `login`, `email`, `cidade`, `cep`, `estado`) VALUES
(1, 'Administrador de Sistema', '$2y$10$hynKUzqYPQocrolQDeQOauH7TrAsJ8/q5wUSm0FeNowZfujr7qQ7a', '1', 1, NULL, NULL, NULL, NULL, 'admin', NULL, '', NULL, NULL),
(2, 'dsds', '$2y$10$xlFWnmdUdADFO9np/OQDnO7bNp/HTGnhkAkjXUW9QrpqsaSAK94uC', '1', 3, NULL, NULL, NULL, NULL, 'dsds', 'ds@ds.com', '', NULL, NULL),
(3, 'Andréia Arida', '$2y$10$mGeL9O7EHYD/xRtNY7JVF.sPYnv1uEja5.Wpix4n/4eu/bbsToTB2', '1', 3, NULL, NULL, NULL, NULL, 'midorii', 'andreia@mido2ri.com', '', NULL, NULL),
(6, 'Robs', '$2y$10$f7e3oitnfRuA/5sBXzbQxu.nIH1VzzYnRXpcat/pScZbDaSuIE6mq', '1', 2, NULL, NULL, NULL, NULL, 'ojsfjdpos', 'dspofkdpofk@sdsd.com', '', NULL, NULL),
(7, 'Edu Falaschi', '$2y$10$MND9VpVA.Og2SKTS5o8rq.I7jbiJy41.pz1RYnpRVXiAaoltNaq7O', '1', 2, NULL, NULL, NULL, NULL, 'carryon', 'suporte@angra.com', '', NULL, NULL),
(9, 'Luiz Paulo Mariano Pereira', '$2y$10$mUVwGXpoG3YCYfpqJP6eSepPUYQri.j9MPAbv9KFyz1fB7AYNqN.m', '1', 1, NULL, NULL, NULL, NULL, 'paulinho', 'paulo@gazin.com.br', '', NULL, NULL),
(10, 'Eduardo Kawassaki', '$2y$10$IWvoTsGQ2Gr2yCRMmZxFveHLuZyk/OnZbopjkNIHfvfQUHbWPhdcC', '1', 3, NULL, NULL, NULL, NULL, 'kawassaki', 'kawa@ssaki.com', '', NULL, NULL),
(11, 'marcelu', 'd45sd4a56', '1', 3, '45454545', 'dfhjbgfdsb', '564564564', '5454545', '', 'fds@ds.com', 'Água Branca', '5484512', 'PB'),
(12, 'Curintiano', 'cor123', '1', 3, '09177771808', 'Roubaram o nome', '4545454545', '120054788', '', 'curintia@hotmail.com', 'Carapebus', '87485000', 'RJ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `dataVenda` date NOT NULL,
  `valorTotal` float NOT NULL,
  `pagamento` varchar(45) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `andamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `materiaprima`
--
ALTER TABLE `materiaprima`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `materiaprima_produto`
--
ALTER TABLE `materiaprima_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMateriaPrima` (`idMateriaPrima`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTamanho` (`idTamanho`);

--
-- Indexes for table `tamanho`
--
ALTER TABLE `tamanho`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `materiaprima`
--
ALTER TABLE `materiaprima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `materiaprima_produto`
--
ALTER TABLE `materiaprima_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tamanho`
--
ALTER TABLE `tamanho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `historico_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `materiaprima_produto`
--
ALTER TABLE `materiaprima_produto`
  ADD CONSTRAINT `materiaprima_produto_ibfk_1` FOREIGN KEY (`idMateriaPrima`) REFERENCES `materiaprima` (`id`),
  ADD CONSTRAINT `materiaprima_produto_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idTamanho`) REFERENCES `tamanho` (`id`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
