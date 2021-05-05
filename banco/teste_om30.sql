-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05/05/2021 às 11:17
-- Versão do servidor: 8.0.24
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste_om30`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-05-05-070715', 'App\\Database\\Migrations\\Usuarios', 'default', 'App', 1620209239, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int UNSIGNED NOT NULL,
  `nome_paciente` varchar(100) NOT NULL,
  `nome_mae` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `cns` varchar(100) NOT NULL,
  `foto_perfil` varchar(100) DEFAULT NULL,
  `status` int NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `data_criado` datetime DEFAULT NULL,
  `data_atualizado` datetime DEFAULT NULL,
  `data_deletado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente_endereco`
--

CREATE TABLE `paciente_endereco` (
  `id_paciente_endereco` int UNSIGNED NOT NULL,
  `id_paciente` int NOT NULL,
  `cep` varchar(100) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(100) NOT NULL,
  `data_criado` datetime DEFAULT NULL,
  `data_atualizado` datetime DEFAULT NULL,
  `data_deletado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int UNSIGNED NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `ultimo_acesso` datetime DEFAULT NULL,
  `ultimo_ip` varchar(50) NOT NULL,
  `status` int NOT NULL,
  `data_criado` datetime DEFAULT NULL,
  `data_atualizado` datetime DEFAULT NULL,
  `data_deletado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `senha`, `ultimo_acesso`, `ultimo_ip`, `status`, `data_criado`, `data_atualizado`, `data_deletado`) VALUES
(1, 'master', 'eb0a191797624dd3a48fa681d3061212', NULL, '', 1, '2021-05-05 07:09:20', '2021-05-05 07:45:19', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD UNIQUE KEY `id_paciente` (`id_paciente`);

--
-- Índices de tabela `paciente_endereco`
--
ALTER TABLE `paciente_endereco`
  ADD PRIMARY KEY (`id_paciente_endereco`),
  ADD UNIQUE KEY `id_paciente_endereco` (`id_paciente_endereco`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `paciente_endereco`
--
ALTER TABLE `paciente_endereco`
  MODIFY `id_paciente_endereco` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
