-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 21-Fev-2023 às 19:19
-- Versão do servidor: 10.3.37-MariaDB-cll-lve
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sousamir_perguntas_e_respostas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas_e_respostas`
--

CREATE TABLE `perguntas_e_respostas` (
  `id` int(11) NOT NULL,
  `pergunta` text NOT NULL,
  `resposta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `perguntas_e_respostas`
--

INSERT INTO `perguntas_e_respostas` (`id`, `pergunta`, `resposta`) VALUES
(2, 'Qual é a história da Rangel Logística?', 'A Rangel Logística foi fundada em 1980, em Portugal, e desde então vem expandindo seus negócios para outros países, incluindo Brasil, Espanha, Polônia, Alemanha e outros.'),
(3, 'Quais são os serviços oferecidos pela Rangel Logística?', 'A Rangel Logística oferece serviços de transporte terrestre, aéreo e marítimo, logística integrada, armazenagem, gestão de estoque, entre outros.'),
(4, 'Qual é a missão da Rangel Logística?', 'A missão da Rangel Logística é oferecer soluções logísticas personalizadas e inovadoras, agregando valor ao negócio dos seus clientes.'),
(5, 'A Rangel Logística está presente em quantos países?', 'A Rangel Logística está presente em mais de 10 países, incluindo Portugal, Brasil, Espanha, Polônia, Alemanha, entre outros.'),
(6, 'Qual é a visão da Rangel Logística?', 'A visão da Rangel Logística é ser uma referência global em soluções logísticas integradas, através de inovação, qualidade e excelência.'),
(7, 'A Rangel Logística possui certificações?', 'Sim, a Rangel Logística possui diversas certificações, incluindo ISO 9001, ISO 14001, OHSAS 18001 e GDP (Good Distribution Practice), entre outras.'),
(8, 'Qual é o diferencial da Rangel Logística?', 'O diferencial da Rangel Logística é oferecer soluções personalizadas e inovadoras, além de investir constantemente em tecnologia e infraestrutura para garantir a qualidade dos seus serviços.'),
(9, 'Quais são os valores da Rangel Logística?', 'Os valores da Rangel Logística incluem comprometimento, inovação, ética, qualidade, trabalho em equipe e responsabilidade social e ambiental.'),
(10, 'Qual é o tamanho da frota da Rangel Logística?', 'A Rangel Logística possui uma frota de mais de 200 veículos, incluindo caminhões, carretas, vans e outros.'),
(11, 'A Rangel Logística atua em quais setores?', 'A Rangel Logística atua em diversos setores, incluindo farmacêutico, automotivo, alimentício, tecnológico, entre outros.'),
(12, 'Qual é a localização da matriz da Rangel Logística?', 'A matriz da Rangel Logística está localizada em Portugal, mais especificamente em Vila Nova de Gaia.'),
(26, 'onde fica o brasil ?', '\',');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `perguntas_e_respostas`
--
ALTER TABLE `perguntas_e_respostas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `perguntas_e_respostas`
--
ALTER TABLE `perguntas_e_respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
