-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Nov-2018 às 15:58
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
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `estado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`id`, `nome`, `estado_id`) VALUES
(1, 'Douradina', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id`, `nome`, `uf`) VALUES
(1, 'Paraná', 'PR');

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
(4, 'QUEIJO PARMESãO', 301, 35, 1.17, 30, 1);

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
(5, 'FANTA 2 LITROS', 4, 7, 2, 277, NULL),
(6, 'CHOCOLATE BARRA GAROTO MEL COM AçUCAR', 3, 4, 2, 101187, NULL),
(7, 'HALLS PRETO 100 KILOS', 1.2, 2, 2, 340, NULL),
(8, 'PIZZA 4 QUEIJOS', 0, 38, 1, 0, 5),
(9, 'Yokitos 120 Mg Presunto', 1, 3, 2, 110, NULL),
(10, 'Bolacha Passa-Tempo 90g', 10, 30, 2, 430, NULL);

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
(1, 'Administrador de Sistema', '$2y$10$a2pFnMQvNbJrZ.rt4ewjD.9edxsWUUSXIWrZozSSyRTo8bnTwF/zm', '1', 4, NULL, NULL, NULL, NULL, 'admin', 'dsdsds@ds.com', '', NULL, NULL),
(7, 'Edu Falaschi', '$2y$10$OEaed/K1mAx1apXBkzkxROrNmgBIN.3mJMhU5A2E2pNvxKt7v04r2', '1', 5, NULL, NULL, NULL, NULL, 'carryon', 'suporte@angra.com', '', NULL, NULL),
(9, 'Luiz Paulo Mariano Pereira', '$2y$10$14c17wo5NXRQP0LtivEQ/uwhRdMqLGKphqsz/Uv.o3qznbMDG7LKO', '1', 2, NULL, NULL, NULL, NULL, 'paulinho', 'paulo@gazin.com.br', '', NULL, NULL),
(11, 'marcelu', '', '1', 3, '07280855008', 'dfhjbgfdsb', '(44) 9125-1565', '150132151', '', 'fds@ds.com', 'Itaubal', '64521-21', 'AP'),
(12, 'Curintiano', 'cor123', '1', 3, '09177771808', 'Roubaram o nome', '4545454545', '120054788', '', 'curintia@hotmail.com', 'Carapebus', '87485000', 'RJ'),
(13, 'Fernando Haddad', '$2y$10$6zHobi4M4JPjTd9fq3eemO..YzwV2IE0tZbHHYSZKpanfqaaXoOFK', '1', 4, NULL, NULL, NULL, NULL, 'corrupto13', 'vouroubei@pt.com.gov.br', '', NULL, NULL),
(14, 'Jair Haddad Boulosnaro', '$2y$10$rTdvN4xd1BwG3VAPXran/eroJx6LSNR9icNiivPhKBIlpFQadTbt6', '1', 4, NULL, NULL, NULL, NULL, 'democratica', 'jair@psl.com', '', NULL, NULL);

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
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado_id` (`estado_id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `cidade_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`);

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
