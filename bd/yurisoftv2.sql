-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Nov-2019 às 04:32
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yurisoftv2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `idcarrinho` int(11) NOT NULL,
  `idstock` int(11) NOT NULL,
  `idvenda` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` float(8,0) NOT NULL,
  `subtotal` float(8,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`idcarrinho`, `idstock`, `idvenda`, `quantidade`, `preco`, `subtotal`) VALUES
(1, 5, 2, 56, 12, 672),
(2, 6, 2, 7, 1000, 7000),
(3, 5, 3, 56, 12, 672),
(4, 6, 3, 7, 1000, 7000),
(5, 7, 4, 12, 155, 1860),
(6, 5, 4, 12, 12, 144),
(7, 5, 4, 111, 12, 1332),
(8, 6, 4, 3, 1000, 3000),
(9, 6, 4, 4, 1000, 4000),
(10, 5, 7, 3, 12, 36),
(11, 5, 7, 1, 12, 12),
(12, 5, 7, 4, 12, 48),
(13, 7, 8, 2, 155, 310),
(14, 7, 9, 3, 155, 465);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `morada` varchar(255) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nome`, `morada`, `telefone`, `email`) VALUES
(1, 'TÃ¢nia', 'Prenda(cassenda)', '956768979', 'TF@gmail.com'),
(3, 'Manuel Ferreira', 'Catambor', '1234', 'manuelferreira@gmail.com'),
(4, 'Roger Nunda Fula', 'Mutamba', '567334', 'rgf@gmail.com'),
(5, 'Filipe', 'Mutamba', NULL, 'filipe@gmail.com'),
(6, 'Domingos', 'efqgl', NULL, 'ghgh@gmail.com'),
(7, 'Jghfj', 'jkbjj', NULL, 'bjbv@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `idfornecedor` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `nif` int(11) NOT NULL,
  `morada` varchar(255) NOT NULL,
  `telefone` varchar(18) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`idfornecedor`, `nome`, `nif`, `morada`, `telefone`, `email`) VALUES
(3, 'Amaro G', 1223, 'Cazenga', '123456', 'amarobuta34@gmail.com'),
(9, 'NCR', 213456, 'Gamek', '1234567898', 'ncr@gmail.com'),
(17, 'Paulo', 33, 'Prenda', '987654', 'paulo@gmail.com'),
(18, 'Mario', 33, 'Prenda', '987654', 'mario@live.com.pt');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idfuncionario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nacionalidade` varchar(100) NOT NULL,
  `naturalidade` varchar(30) NOT NULL,
  `documentacao` varchar(30) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` int(11) NOT NULL,
  `datanascimento` date NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `idperfil` int(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idfuncionario`, `nome`, `nacionalidade`, `naturalidade`, `documentacao`, `endereco`, `telefone`, `datanascimento`, `sexo`, `senha`, `idperfil`) VALUES
(7, 'leny', 'Angolana', 'NinguÃ©m Sabe', 'al675678654', 'rergbnj', 99876543, '2000-12-07', 'Masculino', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(8, 'tania', 'Angolana', 'NinguÃ©m Sabe', '12333333330', 'Maianga/chaba-rua1', 0, '2000-12-15', 'Femenino', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(16, 'Amaro', 'wqe', 'qwerter', '2345678LA89', 'fdgh', 123456789, '1975-12-12', 'Femenino', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(17, 'bernadina', 'qwr', 'qwert', '1234r5LA123', 'qeeq', 1232435675, '1975-12-23', 'Femenino', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(18, 'Amaro', 'Angolana', 'NinguÃ©m Sabe', '12333333330', 'Maianga/chaba-rua1', 987654, '2019-11-07', 'Masculino', 'c4ca4238a0b923820dcc509a6f75849b', 2),
(14, 'Miranda', 'Angolana', 'Luanda', '2987657LA09', 'ccyvb', 2345678, '1234-12-23', 'Masculino', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(15, 'abel', 'njjjk', 'vjhvh', '234354678LA324', 'qwdfs', 12345, '0000-00-00', 'Masculino', 'c4ca4238a0b923820dcc509a6f75849b', 2),
(19, 'Lenilson Faztudo', 'Angolana', 'Prenda', '13246568790', 'Maianga/prenda', 939674269, '1998-03-28', 'Masculino', 'c4ca4238a0b923820dcc509a6f75849b', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `idperfil` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idperfil`, `descricao`) VALUES
(1, 'Operador'),
(2, 'adm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idproduto` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `codbarra` varchar(15) NOT NULL,
  `idtipoproduto` int(11) DEFAULT NULL,
  `idfornecedor` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idproduto`, `nome`, `codbarra`, `idtipoproduto`, `idfornecedor`) VALUES
(2, 'Mouse', '1223132', 2, 3),
(3, 'HD', '268', 2, 16),
(15, 'Cuca', '1111111', 1, 16),
(5, 'Cabo HTMI', '25555', 1, 1),
(18, 'computador', '12345678', 1, 17),
(10, 'Mouse', '1234565', 1, 1),
(17, 'computador', '12345678', 1, 3),
(16, 'Computador', '123', 1, 18),
(14, 'Computar', '12314253', 2, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

CREATE TABLE `stock` (
  `idstock` int(11) NOT NULL,
  `quantidadeinicial` int(11) NOT NULL,
  `preco` double NOT NULL,
  `datacadastro` date NOT NULL,
  `quantidadeactual` int(11) NOT NULL,
  `dataalteracao` date NOT NULL,
  `idproduto` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `stock`
--

INSERT INTO `stock` (`idstock`, `quantidadeinicial`, `preco`, `datacadastro`, `quantidadeactual`, `dataalteracao`, `idproduto`) VALUES
(7, 155, 155, '2019-10-31', 75000, '2019-10-31', 16),
(2, 20, 4000, '0000-00-00', 20, '2019-11-02', 4),
(5, 504, 12, '0000-00-00', 504, '2019-10-31', 3),
(6, 89, 1000, '2019-10-30', 89, '2019-10-31', 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoproduto`
--

CREATE TABLE `tipoproduto` (
  `idtipoproduto` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipoproduto`
--

INSERT INTO `tipoproduto` (`idtipoproduto`, `descricao`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `idvenda` int(11) NOT NULL,
  `datavenda` date NOT NULL,
  `total` float(8,0) NOT NULL,
  `pago` float(8,0) NOT NULL,
  `troco` float(8,0) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idfuncionario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`idvenda`, `datavenda`, `total`, `pago`, `troco`, `idcliente`, `idfuncionario`) VALUES
(1, '2019-11-01', 7672, 5000, 0, 1, 8),
(2, '2019-11-01', 7672, 55555, 0, 1, 8),
(3, '2019-11-01', 7672, 333333, 0, 1, 8),
(4, '2019-11-01', 10336, 10336, 0, 1, 17),
(5, '2019-11-01', 0, 10336, 0, 1, 17),
(6, '2019-11-01', 0, 10336, 0, 1, 17),
(7, '2019-11-01', 96, 777, 0, 1, 8),
(8, '2019-11-01', 310, 345, 0, 1, 8),
(9, '2019-11-01', 465, 44444, 0, 1, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`idcarrinho`,`idstock`,`idvenda`),
  ADD KEY `Refstock5` (`idstock`),
  ADD KEY `Refvenda6` (`idvenda`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`idfornecedor`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idfuncionario`),
  ADD KEY `Refperfil1` (`idperfil`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idperfil`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idproduto`),
  ADD KEY `Reftipoproduto2` (`idtipoproduto`),
  ADD KEY `Reffornecedor3` (`idfornecedor`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idstock`),
  ADD KEY `Refproduto4` (`idproduto`);

--
-- Indexes for table `tipoproduto`
--
ALTER TABLE `tipoproduto`
  ADD PRIMARY KEY (`idtipoproduto`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`idvenda`),
  ADD KEY `Refcliente7` (`idcliente`),
  ADD KEY `Reffuncionario8` (`idfuncionario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `idcarrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `idfornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idfuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idperfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idstock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tipoproduto`
--
ALTER TABLE `tipoproduto`
  MODIFY `idtipoproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `idvenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
