-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jul-2020 às 01:42
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_saldo_positivo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrar_cartoes`
--

CREATE TABLE `cadastrar_cartoes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `banco` varchar(300) NOT NULL,
  `bandeira` varchar(100) NOT NULL,
  `limite_total` decimal(19,2) NOT NULL,
  `limite_disponivel` decimal(19,2) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastrar_cartoes`
--

INSERT INTO `cadastrar_cartoes` (`id`, `titulo`, `banco`, `bandeira`, `limite_total`, `limite_disponivel`, `id_cadastrar_usuarios`) VALUES
(1, 'Cartão Pernambucanas', 'Pernambucanas', 'ELO', '1200.00', '0.00', 1),
(2, 'Cartão Santander', 'Santander', 'Mastercard', '1200.00', '0.00', 2),
(4, 'Cartão Nunank', 'Nubank', 'Visa', '2200.00', '2200.00', 1),
(5, 'Cartão Caixa Econômica', 'Caixa Econômica', 'ELO', '1800.00', '1800.00', 1),
(6, 'Cartão Mercado', 'Mercado Livre', 'BrCard', '800.00', '299.99', 1),
(7, 'Cartão Eletrozema', 'Eletrozema', 'BrCard', '500.00', '100.00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrar_despesas`
--

CREATE TABLE `cadastrar_despesas` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `tipo_despesa` varchar(200) NOT NULL,
  `tipo_pagamento` varchar(200) NOT NULL,
  `despesa_fixa` varchar(200) NOT NULL DEFAULT 'Não',
  `valor_despesa` decimal(19,2) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastrar_despesas`
--

INSERT INTO `cadastrar_despesas` (`id`, `data`, `descricao`, `tipo_despesa`, `tipo_pagamento`, `despesa_fixa`, `valor_despesa`, `id_cadastrar_usuarios`) VALUES
(71, '2020-07-01', 'TESTE A VISTA SEM CARTÂO', 'Água', 'a_vista', 'Não', '59.99', 1),
(72, '2020-06-01', 'Futebol com os amigos', 'Futebol', 'a_vista', 'Não', '399.00', 1),
(73, '2020-07-06', 'Teste Automatizado com Despesa', 'Cinema', 'a_vista', 'Não', '299.99', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrar_ganhos`
--

CREATE TABLE `cadastrar_ganhos` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `tipo_renda` varchar(200) NOT NULL,
  `valor` decimal(19,2) NOT NULL,
  `renda_fixa` varchar(200) NOT NULL DEFAULT 'Não',
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastrar_ganhos`
--

INSERT INTO `cadastrar_ganhos` (`id`, `data`, `descricao`, `tipo_renda`, `valor`, `renda_fixa`, `id_cadastrar_usuarios`) VALUES
(4, '2020-06-26', 'Meu Salário Mensal', 'Salário', '2103.58', 'Não', 1),
(5, '2020-06-26', 'Salário Luana', 'Salário', '1199.99', 'Não', 2),
(6, '2020-06-25', 'Concertei um PC de um Cliente', 'Hora Extra', '59.99', 'Não', 1),
(7, '2020-06-27', 'Fiz 24 Horas extras no meu trampo', 'Hora Extra', '300.00', 'Não', 1),
(8, '2020-06-26', 'TESTE', 'Teste', '50.00', 'Sim', 1),
(9, '2020-07-26', 'TESTE', 'Teste', '50.00', 'Sim', 1),
(10, '2020-08-26', 'TESTE', 'Teste', '50.00', 'Sim', 1),
(11, '2020-09-26', 'TESTE', 'Teste', '50.00', 'Sim', 1),
(12, '2020-10-26', 'TESTE', 'Teste', '50.00', 'Sim', 1),
(13, '2020-11-26', 'TESTE', 'Teste', '50.00', 'Sim', 1),
(14, '2020-12-26', 'TESTE', 'Teste', '50.00', 'Sim', 1),
(15, '2021-01-26', 'TESTE', 'Teste', '50.00', 'Sim', 1),
(16, '2021-02-26', 'TESTE', 'Teste', '50.00', 'Sim', 1),
(17, '2021-03-26', 'TESTE', 'Teste', '50.00', 'Sim', 1),
(18, '2021-04-26', 'TESTE', 'Teste', '50.00', 'Sim', 1),
(19, '2021-05-26', 'TESTE', 'Teste', '50.00', 'Sim', 1),
(20, '2020-07-06', 'Teste Automatizado de Novo Ganho', 'Hora Extra', '5.99', 'Não', 1),
(21, '2020-07-06', 'Teste Automatizado de Novo Ganho', 'Décimo Terceiro', '5.99', 'Não', 1),
(22, '2020-07-06', 'Teste Automatizado de Novo Ganho', 'Tipo de Renda *', '5.00', 'Não', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrar_metas`
--

CREATE TABLE `cadastrar_metas` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `tipo_meta` varchar(200) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `valor_meta` decimal(19,2) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastrar_metas`
--

INSERT INTO `cadastrar_metas` (`id`, `data`, `tipo_meta`, `descricao`, `valor_meta`, `id_cadastrar_usuarios`) VALUES
(1, '2020-07-06', 'Moto', 'Quero Comprar uma Moto CG', '9000.00', 1),
(2, '2020-07-06', 'Casa', 'Quero construir uma nova casa', '150000.00', 1),
(3, '2020-07-06', 'Casa', 'Quero construir uma nova casa', '150000.00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrar_usuarios`
--

CREATE TABLE `cadastrar_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastrar_usuarios`
--

INSERT INTO `cadastrar_usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Jheymison Simões', 'jheymisonbao@live.com', '8bbba38f39369f74524837ce01201db1102be476'),
(2, 'Luana Oliveira', 'oluana422@gmail.com', '8bbba38f39369f74524837ce01201db1102be476'),
(3, 'Nelson Neto', 'nelson@gmail.com', '8bbba38f39369f74524837ce01201db1102be476'),
(4, 'William Prado', 'william@gmail.com', '8bbba38f39369f74524837ce01201db1102be476'),
(5, 'Jhonatan Simões', 'jhonatan@gmail.com', '8bbba38f39369f74524837ce01201db1102be476'),
(6, 'Elisangela Simões', 'elisangela@gmail.com', '8bbba38f39369f74524837ce01201db1102be476'),
(7, 'Top demais', 'top@gmail.com', '59da2bb5fe2dce670127d209659b30bd331adf4c'),
(8, 'teste teste', 'teste@live.com', '8bbba38f39369f74524837ce01201db1102be476'),
(9, 'Node Js', 'node@gmail.com', '59da2bb5fe2dce670127d209659b30bd331adf4c'),
(10, 'Luana Aquino', 'Luana@gmail.com', 'd86ad728f16d70823018d7cca0082c19a550116a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartoes_avista`
--

CREATE TABLE `cartoes_avista` (
  `id` int(11) NOT NULL,
  `id_cadastrar_cartoes` int(11) NOT NULL,
  `id_cadastrar_despesas` int(11) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cartoes_avista`
--

INSERT INTO `cartoes_avista` (`id`, `id_cadastrar_cartoes`, `id_cadastrar_despesas`, `id_cadastrar_usuarios`) VALUES
(8, 4, 72, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartoes_parcelados`
--

CREATE TABLE `cartoes_parcelados` (
  `id` int(11) NOT NULL,
  `id_cadastrar_cartoes` int(11) NOT NULL,
  `id_cadastrar_despesas` int(11) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos_a_vista`
--

CREATE TABLE `pagamentos_a_vista` (
  `id` int(11) NOT NULL,
  `forma_pagamento` varchar(200) NOT NULL,
  `id_cadastrar_despesas` int(11) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pagamentos_a_vista`
--

INSERT INTO `pagamentos_a_vista` (`id`, `forma_pagamento`, `id_cadastrar_despesas`, `id_cadastrar_usuarios`) VALUES
(32, 'dinheiro_vista', 71, 1),
(33, 'cartao_vista', 72, 1),
(34, 'dinheiro_vista', 73, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos_parcelados`
--

CREATE TABLE `pagamentos_parcelados` (
  `id` int(11) NOT NULL,
  `forma_pagamento` varchar(200) NOT NULL,
  `qnt_parcelas` int(10) NOT NULL,
  `id_cadastrar_despesas` int(11) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_de_despesas`
--

CREATE TABLE `tipos_de_despesas` (
  `id` int(11) NOT NULL,
  `tipo_despesa` varchar(200) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipos_de_despesas`
--

INSERT INTO `tipos_de_despesas` (`id`, `tipo_despesa`, `id_cadastrar_usuarios`) VALUES
(9, 'Fatura do Cartão', 100),
(10, 'Aluguel', 100),
(11, 'Concerto Automóvel', 100),
(12, 'Futebol', 100),
(13, 'Água', 100),
(14, 'Energia', 100),
(15, 'Cinema', 100),
(16, 'Internet Algar', 1),
(17, 'TESTE LUANA', 2),
(20, 'Teste Jheymison', 1),
(22, 'Teste', 1),
(23, 'Teste Automatizado', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_de_ganhos`
--

CREATE TABLE `tipos_de_ganhos` (
  `id` int(11) NOT NULL,
  `tipo_ganho` varchar(200) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipos_de_ganhos`
--

INSERT INTO `tipos_de_ganhos` (`id`, `tipo_ganho`, `id_cadastrar_usuarios`) VALUES
(4, 'Salário', 100),
(5, 'Décimo Terceiro', 100),
(6, 'Hora Extra', 100),
(7, 'Renda Extra', 100),
(8, 'Prêmio', 100),
(9, 'Presente', 100),
(10, 'Prestação de Serviço', 100),
(11, 'Teste', 2),
(12, 'Teste Jheymison', 1),
(14, 'Teste Jheymilson 2', 1),
(15, 'Teste Automatizado', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastrar_cartoes`
--
ALTER TABLE `cadastrar_cartoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cadastrar_despesas`
--
ALTER TABLE `cadastrar_despesas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cadastrar_ganhos`
--
ALTER TABLE `cadastrar_ganhos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cadastrar_metas`
--
ALTER TABLE `cadastrar_metas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cadastrar_usuarios`
--
ALTER TABLE `cadastrar_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cartoes_avista`
--
ALTER TABLE `cartoes_avista`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cartoes_parcelados`
--
ALTER TABLE `cartoes_parcelados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagamentos_a_vista`
--
ALTER TABLE `pagamentos_a_vista`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagamentos_parcelados`
--
ALTER TABLE `pagamentos_parcelados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipos_de_despesas`
--
ALTER TABLE `tipos_de_despesas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipos_de_ganhos`
--
ALTER TABLE `tipos_de_ganhos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastrar_cartoes`
--
ALTER TABLE `cadastrar_cartoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `cadastrar_despesas`
--
ALTER TABLE `cadastrar_despesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de tabela `cadastrar_ganhos`
--
ALTER TABLE `cadastrar_ganhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `cadastrar_metas`
--
ALTER TABLE `cadastrar_metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cadastrar_usuarios`
--
ALTER TABLE `cadastrar_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cartoes_avista`
--
ALTER TABLE `cartoes_avista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `cartoes_parcelados`
--
ALTER TABLE `cartoes_parcelados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `pagamentos_a_vista`
--
ALTER TABLE `pagamentos_a_vista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `pagamentos_parcelados`
--
ALTER TABLE `pagamentos_parcelados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `tipos_de_despesas`
--
ALTER TABLE `tipos_de_despesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tipos_de_ganhos`
--
ALTER TABLE `tipos_de_ganhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
