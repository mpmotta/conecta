-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jul-2024 às 15:24
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL,
  `avatar` varchar(128) NOT NULL DEFAULT 'avatar.jpg',
  `nome` varchar(50) NOT NULL,
  `fone` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `avatar`, `nome`, `fone`, `email`, `data_criado`, `data_editado`) VALUES
(5, 'avatar.jpg', 'Madalena Santos Silva', '(51) 32556-987', 'madalena@santos.com', '2023-11-20 18:05:14', '2024-07-05 23:13:24'),
(7, '8aace8049ce377e4d0e60604af833520.png', 'Terezinha de Jesus silva', '(31) 98265465464', 'terezinha@jesus.com', '2023-11-20 19:07:30', '2024-07-05 23:12:54'),
(9, 'bc6756732750735400bceb4c7db8802e.jpg', 'Joana D\'arc', '(31) 94074070', 'joana@gmail.com', '2023-11-22 17:25:22', '2023-11-27 17:49:46'),
(11, '88b5659dbe9f3fb22e8fc05850dbe754.PNG', 'Fernando Diniz', '(21) 658785-5577', 'diniz@bailou.com', '2023-11-22 18:03:13', '2024-07-09 12:42:41'),
(13, 'cbc47c55d442e5095a681e3684e041b5.png', 'Pedro Pedreira', '(31) 94074070', 'pedro.pedreira@gmail.com', '2023-11-22 18:21:53', '2024-07-09 12:55:37'),
(14, '01b084c7019f8921b1bc878bda75376d.jpg', 'Elias da Bahia ', '(51) 94074079', 'elias_ramos@alcidesmaya.com.br', '2023-11-27 17:33:51', '2024-07-05 23:24:07'),
(15, '535977b19ec37ffbc31e6341275fccad.jpg', 'Edson Arantes do Nascimento', '(11) 658785-5577', 'pele@cbf.com.br', '2023-11-27 18:03:04', '2023-11-27 18:03:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `email` varchar(80) NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `email`, `data_criado`, `data_editado`) VALUES
(1, 'admin', '123456', 'admin@root.com', '2023-11-27 19:00:19', '2024-07-02 14:29:15');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
