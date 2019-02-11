-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Fev-2019 às 20:51
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

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
-- Estrutura da tabela `andamento`
--

CREATE TABLE `andamento` (
  `id` int(11) NOT NULL,
  `situacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `andamento`
--

INSERT INTO `andamento` (`id`, `situacao`) VALUES
(1, 'Pedido Realizado'),
(2, 'Pedido em Produção'),
(3, 'Pedido Pronto'),
(4, 'Pedido Entregue');

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
(16, 'Umuarama', 1),
(21, 'Douradina', 1),
(28, 'Naviraí', 3),
(29, 'Ivaté', 1),
(30, 'Perobal', 1),
(31, 'Korodai', 2);

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
(1, 'Paraná', 'PR'),
(2, 'Mato Grosso', 'MT'),
(3, 'Mato Grosso do Sul', 'MS');

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
  `idtipomateria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materiaprima`
--

INSERT INTO `materiaprima` (`id`, `nome`, `quantidade`, `precoCompra`, `precoUnidade`, `qtdPedacos`, `idtipomateria`) VALUES
(1, 'TOMATE', 190, 18, 0.04, 8, NULL),
(3, 'QUEIJO MUSSARELA', 210, 28, 0.26, 106, NULL),
(4, 'QUEIJO PARMESãO', 301, 35, 1.17, 30, NULL),
(5, 'Teste Plus', 50, 20.5, 2, 10, NULL),
(6, 'Mussarela Premium Gold', 10, 50, 0.05, 1000, NULL),
(7, 'Trigo', 10, 2, 0.04, 50, NULL),
(8, 'Azeite de Oliva', 10, 25, 0.5, 50, NULL),
(9, 'Doce de Leite', 100, 1.5, 0.02, 50, NULL),
(10, 'Gelo', 10, 0, 0, 1, NULL),
(11, 'Alface', 50, 1.5, 0.1, 10, NULL),
(12, 'Frango Desfiado', 10, 40, 0.2, 200, NULL),
(13, 'Coxa de Frango', 100, 1.2, 0.1, 10, NULL),
(14, 'Cheddar', 40, 100, 0.5, 200, NULL);

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
(1, 1, 15, 15),
(10, 3, 15, 10),
(11, 4, 15, 5),
(26, 5, 8, 5),
(28, 6, 17, 5),
(30, 6, 8, 5),
(33, 3, 8, 10),
(36, 8, 8, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `tamanho_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `usuario_id`, `produto_id`, `tamanho_id`) VALUES
(7, 15, 16, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_andamento`
--

CREATE TABLE `pedido_andamento` (
  `id` int(11) NOT NULL,
  `idAndamento` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido_andamento`
--

INSERT INTO `pedido_andamento` (`id`, `idAndamento`, `idPedido`, `hora`) VALUES
(1, 3, 7, '2019-02-11 19:45:13');

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
  `idTamanho` int(11) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `precoCompra`, `precoVenda`, `tipoProduto`, `quantidade`, `idTamanho`, `ativo`) VALUES
(5, 'FANTA 2 LITROS', 4, 7, 2, 635, NULL, 1),
(6, 'CHOCOLATE BARRA GAROTO MEL COM AçUCAR', 3, 4, 2, 101197, NULL, 1),
(7, 'HALLS PRETO 100 KILOS', 1.2, 2, 2, 340, NULL, 1),
(8, 'PIZZA 4 QUEIJOS', 0, 38, 1, 0, 5, 1),
(9, 'Yokitos 120 Mg Presunto', 1, 3, 2, 110, NULL, 1),
(10, 'Bolacha Passa-Tempo 90g', 10, 30, 2, 430, NULL, 1),
(11, 'Megazord Pro Evolution', 400.25, 200.2, 2, 1030, NULL, 1),
(15, 'Pepperoni', 0, 0, 1, 0, 1, 0),
(16, 'Chocolate com Pessego', 0, 0, 1, 0, 5, 1),
(17, 'Pedilara', 0, 0, 1, 0, 1, 1),
(18, 'All Might', 0, 47, 1, 0, 5, 0),
(19, 'Shounen', 0, 25, 1, 0, 3, 0);

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
(5, 'Plus Ultra', 25, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipomateria`
--

CREATE TABLE `tipomateria` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `medida` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipomateria`
--

INSERT INTO `tipomateria` (`id`, `descricao`, `medida`) VALUES
(1, 'mililitros', 1000),
(2, 'gramas', 1000);

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
  `cidade` int(100) NOT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `estado` int(2) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `numero` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`, `status`, `tipoUsuario`, `cpf`, `endereco`, `telefone`, `rg`, `login`, `email`, `cidade`, `cep`, `estado`, `nascimento`, `numero`) VALUES
(1, 'Administrador de Sistema', '$2y$10$cmfclIYQ./d0LhadsEi5hu33YLLogyH1AC3zsyA0hlxAH/z5Mg3Rm', '1', 4, NULL, NULL, NULL, NULL, 'admin', 'dsdsds@ds.com', 21, NULL, 1, NULL, NULL),
(7, 'Edu Falaschi', '$2y$10$OEaed/K1mAx1apXBkzkxROrNmgBIN.3mJMhU5A2E2pNvxKt7v04r2', '1', 5, NULL, NULL, NULL, NULL, 'carryon', 'suporte@angra.com', 21, NULL, 1, NULL, NULL),
(9, 'Luiz Paulo Mariano Pereira', '$2y$10$14c17wo5NXRQP0LtivEQ/uwhRdMqLGKphqsz/Uv.o3qznbMDG7LKO', '1', 2, NULL, NULL, NULL, NULL, 'paulinho', 'paulo@gazin.com.br', 21, NULL, 1, NULL, NULL),
(11, 'Bruce Wayne', '', '1', 3, '07280855008', 'Rua Coringa', '(44) 9125-1565', '150132151', '', 'bruce@wayne.com', 16, '87485-00', 1, '2018-11-09', '104'),
(13, 'Fernando Haddad', '$2y$10$6zHobi4M4JPjTd9fq3eemO..YzwV2IE0tZbHHYSZKpanfqaaXoOFK', '1', 4, NULL, NULL, NULL, NULL, 'corrupto13', 'vouroubei@pt.com.gov.br', 21, NULL, 1, NULL, NULL),
(14, 'Jair Haddad Boulosnaro', '$2y$10$rTdvN4xd1BwG3VAPXran/eroJx6LSNR9icNiivPhKBIlpFQadTbt6', '1', 4, NULL, NULL, NULL, NULL, 'democratica', 'jair@psl.com', 21, NULL, 1, NULL, NULL),
(15, 'Douglas Giomo', '', '1', 3, '33513759053', 'Rua Pedro II', '(44) 1424-5215', '265456251', '', 'dodo@dodo.com', 30, '87485-00', 1, '1990-11-11', '112'),
(16, 'Pedro de Ricardo Lara', '', '1', 3, '33513759053', 'Rua Pedrinho', '(44) 5478-7878', '171584845', '', 'pedro_ricardo@gmail.com', 16, '87485-00', 1, NULL, NULL),
(17, 'Armando Neto', '$2y$10$9yn1Ebi8A2UjGlDIU9Wj7.DsEN1GgtoHPmjKv14djvgjX0cHU7zKO', '1', 1, NULL, NULL, NULL, NULL, 'armando', 'armando@neto.com', 21, NULL, 1, NULL, NULL),
(18, 'Eduardo Kawassaki', '$2y$10$KMVIkZQCWajsH5u/yYoOLuE7wH1/Jcwl0sb6fJGF/7CqAQEIlUtuS', '1', 1, NULL, NULL, NULL, NULL, 'edu', 'eduardo.kawassaki@gmail.com', 0, NULL, NULL, NULL, NULL),
(19, 'Antonio Leonardo', 'fjsdfkjdsnko', '1', 3, '98363681083', 'Rua doidona', '(21) 5455-6565', '121541515', '', 'toninho@gmail.com', 21, '12545-12', 1, '1999-10-11', NULL),
(20, 'Delia Ketchum', '123456', '1', 3, '123456789', 'Rua da Silva', '13232132', '1454545', '', 'emailgenerico', 0, 'dasdas', 0, '0000-00-00', '120'),
(21, 'Napoleão Bonaparty', 'goipigposof', '1', 3, '12345613123', 'Av. Italia', '(56) 4515-4545', '145445454', '', 'napoleao@bonaparty.com', 16, '45454-54', 1, '1990-12-11', '20'),
(26, 'giovanni bussola', '$2y$10$buppRR1k1ZlxXBFJZYzNku1.1Er7qR8sU/jeg9Wz3SHeeFWpQu.ie', '1', 1, NULL, NULL, NULL, NULL, 'gi', 'gi@gi.com', 0, NULL, NULL, NULL, NULL),
(27, 'Andréia Midori Arida', '$2y$10$QsFPuoNRngFESbySzYLXWOKdiyOSaNST2yda3lBsxzciP.0385wge', '1', 1, NULL, NULL, NULL, NULL, 'midori', 'midori@gmail.com', 0, NULL, NULL, NULL, NULL);

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
-- Indexes for table `andamento`
--
ALTER TABLE `andamento`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `idtipomateria` (`idtipomateria`);

--
-- Indexes for table `materiaprima_produto`
--
ALTER TABLE `materiaprima_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMateriaPrima` (`idMateriaPrima`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `produto_id` (`produto_id`),
  ADD KEY `tamanho_id` (`tamanho_id`);

--
-- Indexes for table `pedido_andamento`
--
ALTER TABLE `pedido_andamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAndamento` (`idAndamento`),
  ADD KEY `idPedido` (`idPedido`);

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
-- Indexes for table `tipomateria`
--
ALTER TABLE `tipomateria`
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
-- AUTO_INCREMENT for table `andamento`
--
ALTER TABLE `andamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materiaprima`
--
ALTER TABLE `materiaprima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `materiaprima_produto`
--
ALTER TABLE `materiaprima_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pedido_andamento`
--
ALTER TABLE `pedido_andamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tamanho`
--
ALTER TABLE `tamanho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipomateria`
--
ALTER TABLE `tipomateria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
-- Limitadores para a tabela `materiaprima`
--
ALTER TABLE `materiaprima`
  ADD CONSTRAINT `materiaprima_ibfk_1` FOREIGN KEY (`idtipomateria`) REFERENCES `tipomateria` (`id`);

--
-- Limitadores para a tabela `materiaprima_produto`
--
ALTER TABLE `materiaprima_produto`
  ADD CONSTRAINT `materiaprima_produto_ibfk_1` FOREIGN KEY (`idMateriaPrima`) REFERENCES `materiaprima` (`id`),
  ADD CONSTRAINT `materiaprima_produto_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`tamanho_id`) REFERENCES `tamanho` (`id`);

--
-- Limitadores para a tabela `pedido_andamento`
--
ALTER TABLE `pedido_andamento`
  ADD CONSTRAINT `pedido_andamento_ibfk_1` FOREIGN KEY (`idAndamento`) REFERENCES `andamento` (`id`),
  ADD CONSTRAINT `pedido_andamento_ibfk_2` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`id`);

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
