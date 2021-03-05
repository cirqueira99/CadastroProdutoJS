-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 04-Mar-2021 às 15:03
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `JunkSystem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(6) NOT NULL,
  `nome` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj_cpf` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contato` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cnpj_cpf`, `endereco`, `email`, `contato`) VALUES
(1, 'Marcos Francisco SIlva', '22233366654', 'Rua Almeida SIlva, 43  Americana São Paulo (SP)', 'marcos1@gmail.com', '1933664554'),
(2, 'Mercadinho do Zé', '79460809000156', 'Av. Independência, 3574  Campinas São Paulo (SP)', 'mercadinhodozé@live.com', '1933754426'),
(3, 'Maria Torlean Oliveira Almeida', '33865268000145', 'Rua Vergílio Macedo, 100    Cariacica Espírito Santo (ES)', 'maria_oliveira@yahoo.com', '1798855588');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `id` int(6) NOT NULL,
  `data_op` date NOT NULL,
  `cod_vendedor` int(4) NOT NULL,
  `nome_fornecedor` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_produtos` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qt_produtos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_frete` float DEFAULT NULL,
  `valor_total` float NOT NULL,
  `forma_pagamento` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parcelas` int(4) NOT NULL,
  `data_entrega` date DEFAULT NULL,
  `observacao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `compras`
--

INSERT INTO `compras` (`id`, `data_op`, `cod_vendedor`, `nome_fornecedor`, `cod_produtos`, `qt_produtos`, `valor_frete`, `valor_total`, `forma_pagamento`, `parcelas`, `data_entrega`, `observacao`) VALUES
(13, '2021-01-28', 12, 'FerreroAgro LDTA', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;s:1:\"5\";}', 20, 75, 'Dinheiro Vista', 1, '2021-02-01', 'O produto chegou no prazo.'),
(14, '2021-01-30', 12, 'FerreroAgro LDTA', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;s:2:\"10\";}', 20, 150, 'Dinheiro Vista', 1, NULL, 'nada'),
(15, '2021-01-31', 12, 'Verdes Distribuidora LDTA', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:1:\"3\";}', 20, 27, 'Cartão Crédito', 1, NULL, ''),
(16, '2021-01-31', 12, 'Agro Distribuidora LDTA', 'a:1:{i:0;s:1:\"3\";}', 'a:1:{i:0;s:1:\"3\";}', 35, 30, 'Cartão Débito', 2, NULL, ''),
(17, '2021-01-31', 12, 'FerreroAgro LDTA', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;s:1:\"5\";}', 15, 75, 'Dinheiro Vista', 1, NULL, 'nada'),
(18, '2021-02-02', 12, 'Verdes Distribuidora LDTA', 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}', 'a:3:{i:0;s:1:\"5\";i:1;s:1:\"5\";i:2;s:1:\"5\";}', 25, 195, 'Cartão Crédito', 2, NULL, ''),
(19, '2021-02-03', 12, 'FerreroAgro LDTA', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;s:1:\"5\";}', 20, 75, 'Dinheiro Vista', 1, NULL, ''),
(20, '2021-02-04', 12, 'FerreroAgro LDTA', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;s:2:\"10\";}', 20, 150, 'Dinheiro Vista', 1, NULL, 'nada'),
(21, '2021-02-05', 12, 'Verdes Distribuidora LDTA', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:1:\"3\";}', 20, 27, 'Cartão Crédito', 1, NULL, ''),
(22, '2021-02-05', 12, 'Agro Distribuidora LDTA', 'a:1:{i:0;s:1:\"3\";}', 'a:1:{i:0;s:1:\"3\";}', 35, 30, 'Cartão Débito', 2, NULL, ''),
(23, '2021-02-06', 12, 'FerreroAgro LDTA', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;s:1:\"5\";}', 15, 75, 'Dinheiro Vista', 1, NULL, 'nada'),
(24, '2021-02-07', 12, 'Verdes Distribuidora LDTA', 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}', 'a:3:{i:0;s:1:\"5\";i:1;s:1:\"5\";i:2;s:1:\"5\";}', 25, 195, 'Cartão Crédito', 2, NULL, ''),
(25, '2021-02-09', 12, 'FerreroAgro LDTA', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;s:1:\"5\";}', 20, 75, 'Dinheiro Vista', 1, NULL, ''),
(26, '2021-02-10', 12, 'FerreroAgro LDTA', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;s:2:\"10\";}', 20, 150, 'Dinheiro Vista', 1, NULL, 'nada'),
(27, '2021-02-11', 12, 'Verdes Distribuidora LDTA', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:1:\"3\";}', 20, 27, 'Cartão Crédito', 1, NULL, ''),
(28, '2021-02-11', 12, 'Agro Distribuidora LDTA', 'a:1:{i:0;s:1:\"3\";}', 'a:1:{i:0;s:1:\"3\";}', 35, 30, 'Cartão Débito', 2, NULL, ''),
(29, '2021-02-13', 12, 'FerreroAgro LDTA', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;s:1:\"5\";}', 15, 75, 'Dinheiro Vista', 1, NULL, 'nada'),
(30, '2021-02-14', 12, 'Verdes Distribuidora LDTA', 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}', 'a:3:{i:0;s:1:\"5\";i:1;s:1:\"5\";i:2;s:1:\"5\";}', 25, 195, 'Cartão Crédito', 2, NULL, ''),
(31, '2021-02-15', 12, 'FerreroAgro LDTA', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;s:1:\"5\";}', 20, 75, 'Dinheiro Vista', 1, NULL, ''),
(32, '2021-02-16', 12, 'FerreroAgro LDTA', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;s:2:\"10\";}', 20, 150, 'Dinheiro Vista', 1, NULL, 'nada'),
(33, '2021-02-17', 12, 'Verdes Distribuidora LDTA', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:1:\"3\";}', 20, 27, 'Cartão Crédito', 1, NULL, ''),
(34, '2021-02-18', 12, 'Agro Distribuidora LDTA', 'a:1:{i:0;s:1:\"3\";}', 'a:1:{i:0;s:1:\"3\";}', 35, 30, 'Cartão Débito', 2, NULL, ''),
(35, '2021-02-25', 12, 'FerreroAgro LDTA', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;s:1:\"5\";}', 15, 75, 'Dinheiro Vista', 1, NULL, 'nada'),
(36, '2021-02-25', 12, 'Verdes Distribuidora LDTA', 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}', 'a:3:{i:0;s:1:\"5\";i:1;s:1:\"5\";i:2;s:1:\"5\";}', 25, 195, 'Cartão Crédito', 2, NULL, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(4) NOT NULL,
  `nome` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj_cpf` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contato` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `cnpj_cpf`, `endereco`, `email`, `contato`) VALUES
(4, 'Verdes Distribuidora LDTA', '11111111111', 'Av Bradescol, 425  São Carlos São Paulo (SP)', 'verdesdistribuidora@gmail.com', '16988338833'),
(5, 'Agro Distribuidora LDTA', '44914992000138', 'R. Vito Modesto Mastro Rosa, 292  Limeira São Paulo (SP)', 'agro@gmail.com', ' 1921132450'),
(6, 'FerreroAgro LDTA', '13043813000100', 'Rua Farmaceutico Jacob Fanelli, 560  Limeira São Paulo (SP)', 'ferrero@hotmail.com', '19971147072');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(4) NOT NULL,
  `nome` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contato` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `endereco`, `email`, `contato`, `cargo`) VALUES
(11, 'José Roberto Henrique Silva', '22233311140', 'Rua Almeida SIlva, 43  São Carlos São Paulo (SP)', 'jose@gmail.com', '1912345678', 'Atendente'),
(12, 'Paula Lima de Souza', '33666545102', 'Av. Independência, 3574  São Paulo São Paulo (SP)', 'liima@gmail.com', '1933664554', 'Vendedora');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(6) NOT NULL,
  `nome` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fornecedor` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qt` int(4) NOT NULL,
  `preco_custo` float NOT NULL,
  `preco_venda` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `fornecedor`, `qt`, `preco_custo`, `preco_venda`) VALUES
(1, 'Batata', 'Verdes Distribuidora LDTA', 10, 9, 20),
(2, 'Batata Doce', 'Verdes Distribuidora', 10, 20, 30),
(3, 'Tomate', 'Agro Distribuidora LDTA', 10, 10, 20),
(4, 'Alface', 'FerreroAgro LDTA', 10, 15, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `registros`
--

CREATE TABLE `registros` (
  `data_registro` date NOT NULL,
  `id_func` int(4) NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_saida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `user` varchar(15) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `categoria` varchar(15) NOT NULL,
  `cpf_usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`user`, `senha`, `categoria`, `cpf_usuario`) VALUES
('adm', '94f3b3a16d8ce064c808b16bee5003c5', 'Administrador', '111222333450'),
('joseroberto', '81dc9bdb52d04dc20036dbd8313ed055', 'Funcionário', '22233311140'),
('paul@', '81dc9bdb52d04dc20036dbd8313ed055', 'Funcionário', '33666545102');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(6) NOT NULL,
  `data_op` date NOT NULL,
  `cod_vendedor` int(4) NOT NULL,
  `nome_cliente` varchar(30) NOT NULL,
  `cod_produtos` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qt_produtos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_frete` float NOT NULL,
  `valor_total` float NOT NULL,
  `forma_pagamento` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parcelas` int(4) NOT NULL,
  `data_entrega` date DEFAULT NULL,
  `observacao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnpj_cpf` (`cnpj_cpf`);

--
-- Índices para tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnpj_cpf` (`cnpj_cpf`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
