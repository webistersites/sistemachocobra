-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jun-2016 às 22:59
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chocolateria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero_pedido` int(12) DEFAULT NULL,
  `produtos_id_produto` int(10) unsigned NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `quantidade` int(10) unsigned NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `data` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `pedido_FKIndex1` (`produtos_id_produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `numero_pedido`, `produtos_id_produto`, `descricao`, `quantidade`, `usuario`, `data`) VALUES
(2, 7, 0, 'Barra ao leite 100 gr', 5, 'junior', NULL),
(3, 7, 0, 'Barra meio amargo 100 gr', 6, 'junior', NULL),
(5, 7, 0, 'Barra ao leite 100 gr', 12, 'Fernando', NULL),
(6, 7, 0, 'Barra meio amargo 100 gr', 14, 'Fernando', NULL),
(8, 8, 0, 'Barra ao leite 100 gr', 12, 'Fernando', NULL),
(9, 8, 0, 'Barra meio amargo 100 gr', 41, 'Fernando', NULL),
(11, 9, 0, 'Barra meio amargo 100 gr', 123, 'Fernando', NULL),
(12, 9, 0, 'Barra ao leite 100 gr', 15, 'Fernando', NULL),
(14, 8, 0, 'Barra meio amargo 100 gr', 124, 'junior', NULL),
(15, 1, 0, 'Barra ao leite 100 gr', 13, 'amadeu', NULL),
(16, 2, 0, 'Barra meio amargo 100 gr', 24, 'amadeu', NULL),
(17, 2, 0, 'Barra ao leite 100 gr', 69, 'amadeu', NULL),
(19, 9, 0, 'Barra branco 100 gr', 3, 'junior', NULL),
(20, 9, 0, 'Barra origem 63% 40 gr', 5, 'junior', NULL),
(22, 1, 0, 'Barra origem 35% 40 gr', 4, 'godofredo', NULL),
(23, 1, 0, 'Barra origem 63% 40 gr', 5, 'godofredo', NULL),
(24, 10, 0, 'Barra origem 35% 40 gr', 1, 'junior', NULL),
(25, 10, 0, 'Barra origem 63% 40 gr', 4, 'junior', NULL),
(26, 10, 0, 'Barra Nuts branca 100 gr ', 10, 'junior', NULL),
(27, 10, 0, 'placa com frase "PARABENS" 50 gr', 6, 'junior', NULL),
(31, 1, 0, 'Barra ao leite 20 gr', 2, 'Joaquim', NULL),
(32, 1, 0, 'placa com frase "TE AMO" 50 gr', 10, 'Joaquim', NULL),
(33, 1, 0, 'Barra origem 35% 40 gr', 6, 'Joaquim', NULL),
(34, 1, 0, 'Barra origem 35% 40 gr', 3, 'teste', NULL),
(35, 1, 0, 'Barra origem 63% 40 gr', 2, 'teste', NULL),
(36, 1, 0, 'Barra ao leite 100 gr', 10, 'teste', NULL),
(37, 11, 0, 'Barra ao leite 100 gr', 12, 'junior', NULL),
(38, 12, 0, 'Barra meio amargo 100 gr', 2, 'junior', NULL),
(39, 12, 0, 'Barra origem 35% 40 gr', 4, 'junior', NULL),
(40, 12, 0, 'Barra ao leite 100 gr', 4, 'junior', NULL),
(41, 12, 0, 'Barra branco 20 gr', 4, 'junior', NULL),
(45, 13, 0, 'Barra ao leite 100 gr', 20, 'junior', '29/06/16'),
(46, 13, 0, 'Barra ao leite 100 gr', 20, 'junior', NULL),
(47, 14, 0, 'Barra meio amargo 100 gr', 15, 'junior', '29/06/16'),
(48, 1, 0, 'Barra ao leite 100 gr', 12, 'Administrador', '29/06/16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_admin`
--

CREATE TABLE IF NOT EXISTS `pedido_admin` (
  `id_pedido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero_pedido` int(12) unsigned NOT NULL,
  `produtos_id_produto` int(10) unsigned NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `quantidade` int(10) unsigned NOT NULL,
  `usuario` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `pedido_FKIndex1` (`produtos_id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_junior`
--

CREATE TABLE IF NOT EXISTS `pedido_junior` (
  `id_pedido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero_pedido` int(12) unsigned NOT NULL,
  `produtos_id_produto` int(10) unsigned NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `quantidade` int(10) unsigned NOT NULL,
  `usuario` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `pedido_FKIndex1` (`produtos_id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_usuario`
--

CREATE TABLE IF NOT EXISTS `pedido_usuario` (
  `id_pedido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero_pedido` int(12) unsigned NOT NULL,
  `produtos_id_produto` int(10) unsigned NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `quantidade` int(10) unsigned NOT NULL,
  `usuario` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `pedido_FKIndex1` (`produtos_id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(200) NOT NULL,
  `qtd_caixa` int(10) unsigned NOT NULL,
  `valor_caixa` decimal(10,2) NOT NULL,
  `valor_unit` decimal(10,2) NOT NULL,
  `valor_venda` decimal(10,2) NOT NULL,
  `categoria` varchar(60) NOT NULL,
  `foi_pedido` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `descricao`, `qtd_caixa`, `valor_caixa`, `valor_unit`, `valor_venda`, `categoria`, `foi_pedido`) VALUES
(1, 'Barra ao leite 100 gr', 30, '180.00', '6.00', '12.60', 'Barras', 0),
(2, 'Barra meio amargo 100 gr', 30, '180.00', '6.00', '12.60', 'Barras', 0),
(3, 'Barra branco 100 gr', 30, '180.00', '6.00', '12.60', 'Barras', 0),
(4, 'Barra ao leite 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(5, 'Barra ao leite com amendoim 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(6, 'Barra ao leite com avelã 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(7, 'Barra ao leite com cast de caju 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(8, 'Barra branco 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(9, 'Barra branco com cookies 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(10, 'Barra meio amargo 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(11, 'Barra origem 35% 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(12, 'Barra origem 53% 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(13, 'Barra origem 63% 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(14, 'Barra origem 70% 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(15, 'Barra origem diet 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(16, 'Barra Nuts ao leite 100 gr ', 20, '164.00', '8.20', '16.80', 'Barras', 0),
(17, 'Barra Nuts branca 100 gr ', 20, '164.00', '8.20', '16.80', 'Barras', 0),
(18, 'Barra Nuts meio amarga 100 gr ', 20, '164.00', '8.20', '16.80', 'Barras', 0),
(19, 'Bombom trufado branco 15 gr', 90, '90.00', '1.00', '2.00', 'Barras', 0),
(20, 'Bombom trufado frutas vermelhas 15 gr ', 90, '90.00', '1.00', '2.00', 'Barras', 0),
(21, 'Bombom trufado pistache 15 gr', 90, '90.00', '1.00', '2.00', 'Barras', 0),
(22, 'Trufa artesanal caixa com 6', 12, '141.60', '11.80', '24.80', 'Barras', 0),
(23, 'Leiteira P 150 gr', 24, '576.00', '24.00', '44.50', 'Barras', 0),
(24, 'Leiteira G 300 gr', 12, '384.00', '32.00', '62.90', 'Barras', 0),
(25, 'Cachepot 150 gr ', 20, '340.00', '17.00', '34.00', 'Barras', 0),
(26, 'Caneca com bombons diversos 180 gr ', 20, '480.00', '24.00', '48.00', 'Barras', 0),
(27, 'Caixa seleções - ao leite/bco/croc 180 gr', 12, '222.00', '18.50', '38.90', 'Barras', 0),
(28, 'Pirulito ao leite ', 36, '90.00', '2.50', '5.00', 'Barras', 0),
(29, 'Pirulito caramelo', 36, '90.00', '2.50', '5.00', 'Barras', 0),
(30, 'Carrinho / coração menino 70 gr', 36, '234.00', '6.50', '13.70', 'Barras', 0),
(31, 'Ursinho / coração menina 70 gr', 36, '234.00', '6.50', '13.70', 'Barras', 0),
(32, 'Tabletes diversos presente 70 gr', 36, '250.20', '6.95', '14.90', 'Barras', 0),
(33, 'Mix de barrinhas presente 200 gr ', 20, '320.00', '16.00', '32.00', 'Barras', 0),
(34, 'Brigadeiro Gourmet 240 gr ', 24, '348.00', '14.50', '30.50', 'Barras', 0),
(35, 'Cookies castanha do para coberto 60 gr', 36, '162.00', '4.50', '9.50', 'Barras', 0),
(36, 'Cookies gotas de choc coberto 60 gr', 36, '162.00', '4.50', '9.50', 'Barras', 0),
(37, 'Trufa tradicional ', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(38, 'Trufa meio a meio - branco e tradicional', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(39, 'Trufa morango', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(40, 'Trufa cereja', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(41, 'Trufa maracuja', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(42, 'Trufa Marula ', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(43, 'Trufa meio a meio - morango e tradic', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(44, 'Trufa limão ', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(45, 'Trufa puro cacau', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(46, 'Trufa coco', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(47, 'Lata celebrar bombons com licor 225 gr', 8, '216.00', '27.00', '54.00', 'Barras', 0),
(48, 'Lata drageas premium 150 gr', 10, '260.00', '26.00', '52.00', 'Barras', 0),
(49, 'Caixa presente bombom sem lactose 160 gr', 12, '299.40', '24.95', '49.90', 'Barras', 0),
(50, 'Caixa presente bombom diet 160 gr', 12, '299.40', '24.95', '49.90', 'Barras', 0),
(51, 'Caixa felino 100 gr', 30, '318.00', '10.60', '18.00', 'Barras', 0),
(52, 'Brigadeiro Gourmet no palito Maltine', 20, '118.00', '5.90', '12.40', 'Barras', 0),
(53, 'Brigadeiro Gourmet no palito Tradicional', 20, '118.00', '5.90', '12.40', 'Barras', 0),
(54, 'Tablete 10 gr ao leite', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(55, 'Tablete 10 gr ao leite crocante', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(56, 'Tablete 10 gr ao leite mentolado', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(57, 'Tablete 10 gr branco', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(58, 'Tablete 10 gr branco crocante', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(59, 'Tablete 10 gr meio amargo', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(60, 'Tablete 10 gr meio amargo crocante', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(61, 'placa com frase "TE AMO" 50 gr', 20, '130.00', '6.50', '13.00', 'Barras', 0),
(62, 'placa com frase "COM CARINHO" 50 gr', 20, '130.00', '6.50', '13.00', 'Barras', 0),
(63, 'placa com frase "PARABENS" 50 gr', 20, '130.00', '6.50', '13.00', 'Barras', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_admin`
--

CREATE TABLE IF NOT EXISTS `produtos_admin` (
  `id_produto` int(10) unsigned NOT NULL DEFAULT '0',
  `descricao` varchar(200) NOT NULL,
  `qtd_caixa` int(10) unsigned NOT NULL,
  `valor_caixa` decimal(10,2) NOT NULL,
  `valor_unit` decimal(10,2) NOT NULL,
  `valor_venda` decimal(10,2) NOT NULL,
  `categoria` varchar(60) NOT NULL,
  `foi_pedido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos_admin`
--

INSERT INTO `produtos_admin` (`id_produto`, `descricao`, `qtd_caixa`, `valor_caixa`, `valor_unit`, `valor_venda`, `categoria`, `foi_pedido`) VALUES
(1, 'Barra ao leite 100 gr', 30, '180.00', '6.00', '12.60', 'Barras', 0),
(2, 'Barra meio amargo 100 gr', 30, '180.00', '6.00', '12.60', 'Barras', 0),
(3, 'Barra branco 100 gr', 30, '180.00', '6.00', '12.60', 'Barras', 0),
(4, 'Barra ao leite 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(5, 'Barra ao leite com amendoim 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(6, 'Barra ao leite com avelã 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(7, 'Barra ao leite com cast de caju 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(8, 'Barra branco 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(9, 'Barra branco com cookies 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(10, 'Barra meio amargo 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(11, 'Barra origem 35% 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(12, 'Barra origem 53% 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(13, 'Barra origem 63% 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(14, 'Barra origem 70% 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(15, 'Barra origem diet 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(16, 'Barra Nuts ao leite 100 gr ', 20, '164.00', '8.20', '16.80', 'Barras', 0),
(17, 'Barra Nuts branca 100 gr ', 20, '164.00', '8.20', '16.80', 'Barras', 0),
(18, 'Barra Nuts meio amarga 100 gr ', 20, '164.00', '8.20', '16.80', 'Barras', 0),
(19, 'Bombom trufado branco 15 gr', 90, '90.00', '1.00', '2.00', 'Barras', 0),
(20, 'Bombom trufado frutas vermelhas 15 gr ', 90, '90.00', '1.00', '2.00', 'Barras', 0),
(21, 'Bombom trufado pistache 15 gr', 90, '90.00', '1.00', '2.00', 'Barras', 0),
(22, 'Trufa artesanal caixa com 6', 12, '141.60', '11.80', '24.80', 'Barras', 0),
(23, 'Leiteira P 150 gr', 24, '576.00', '24.00', '44.50', 'Barras', 0),
(24, 'Leiteira G 300 gr', 12, '384.00', '32.00', '62.90', 'Barras', 0),
(25, 'Cachepot 150 gr ', 20, '340.00', '17.00', '34.00', 'Barras', 0),
(26, 'Caneca com bombons diversos 180 gr ', 20, '480.00', '24.00', '48.00', 'Barras', 0),
(27, 'Caixa seleções - ao leite/bco/croc 180 gr', 12, '222.00', '18.50', '38.90', 'Barras', 0),
(28, 'Pirulito ao leite ', 36, '90.00', '2.50', '5.00', 'Barras', 0),
(29, 'Pirulito caramelo', 36, '90.00', '2.50', '5.00', 'Barras', 0),
(30, 'Carrinho / coração menino 70 gr', 36, '234.00', '6.50', '13.70', 'Barras', 0),
(31, 'Ursinho / coração menina 70 gr', 36, '234.00', '6.50', '13.70', 'Barras', 0),
(32, 'Tabletes diversos presente 70 gr', 36, '250.20', '6.95', '14.90', 'Barras', 0),
(33, 'Mix de barrinhas presente 200 gr ', 20, '320.00', '16.00', '32.00', 'Barras', 0),
(34, 'Brigadeiro Gourmet 240 gr ', 24, '348.00', '14.50', '30.50', 'Barras', 0),
(35, 'Cookies castanha do para coberto 60 gr', 36, '162.00', '4.50', '9.50', 'Barras', 0),
(36, 'Cookies gotas de choc coberto 60 gr', 36, '162.00', '4.50', '9.50', 'Barras', 0),
(37, 'Trufa tradicional ', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(38, 'Trufa meio a meio - branco e tradicional', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(39, 'Trufa morango', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(40, 'Trufa cereja', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(41, 'Trufa maracuja', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(42, 'Trufa Marula ', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(43, 'Trufa meio a meio - morango e tradic', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(44, 'Trufa limão ', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(45, 'Trufa puro cacau', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(46, 'Trufa coco', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(47, 'Lata celebrar bombons com licor 225 gr', 8, '216.00', '27.00', '54.00', 'Barras', 0),
(48, 'Lata drageas premium 150 gr', 10, '260.00', '26.00', '52.00', 'Barras', 0),
(49, 'Caixa presente bombom sem lactose 160 gr', 12, '299.40', '24.95', '49.90', 'Barras', 0),
(50, 'Caixa presente bombom diet 160 gr', 12, '299.40', '24.95', '49.90', 'Barras', 0),
(51, 'Caixa felino 100 gr', 30, '318.00', '10.60', '18.00', 'Barras', 0),
(52, 'Brigadeiro Gourmet no palito Maltine', 20, '118.00', '5.90', '12.40', 'Barras', 0),
(53, 'Brigadeiro Gourmet no palito Tradicional', 20, '118.00', '5.90', '12.40', 'Barras', 0),
(54, 'Tablete 10 gr ao leite', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(55, 'Tablete 10 gr ao leite crocante', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(56, 'Tablete 10 gr ao leite mentolado', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(57, 'Tablete 10 gr branco', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(58, 'Tablete 10 gr branco crocante', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(59, 'Tablete 10 gr meio amargo', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(60, 'Tablete 10 gr meio amargo crocante', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(61, 'placa com frase "TE AMO" 50 gr', 20, '130.00', '6.50', '13.00', 'Barras', 0),
(62, 'placa com frase "COM CARINHO" 50 gr', 20, '130.00', '6.50', '13.00', 'Barras', 0),
(63, 'placa com frase "PARABENS" 50 gr', 20, '130.00', '6.50', '13.00', 'Barras', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_junior`
--

CREATE TABLE IF NOT EXISTS `produtos_junior` (
  `id_produto` int(10) unsigned NOT NULL DEFAULT '0',
  `descricao` varchar(200) NOT NULL,
  `qtd_caixa` int(10) unsigned NOT NULL,
  `valor_caixa` decimal(10,2) NOT NULL,
  `valor_unit` decimal(10,2) NOT NULL,
  `valor_venda` decimal(10,2) NOT NULL,
  `categoria` varchar(60) NOT NULL,
  `foi_pedido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos_junior`
--

INSERT INTO `produtos_junior` (`id_produto`, `descricao`, `qtd_caixa`, `valor_caixa`, `valor_unit`, `valor_venda`, `categoria`, `foi_pedido`) VALUES
(1, 'Barra ao leite 100 gr', 30, '180.00', '6.00', '12.60', 'Barras', 0),
(2, 'Barra meio amargo 100 gr', 30, '180.00', '6.00', '12.60', 'Barras', 0),
(3, 'Barra branco 100 gr', 30, '180.00', '6.00', '12.60', 'Barras', 0),
(4, 'Barra ao leite 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(5, 'Barra ao leite com amendoim 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(6, 'Barra ao leite com avelã 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(7, 'Barra ao leite com cast de caju 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(8, 'Barra branco 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(9, 'Barra branco com cookies 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(10, 'Barra meio amargo 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(11, 'Barra origem 35% 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(12, 'Barra origem 53% 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(13, 'Barra origem 63% 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(14, 'Barra origem 70% 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(15, 'Barra origem diet 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(16, 'Barra Nuts ao leite 100 gr ', 20, '164.00', '8.20', '16.80', 'Barras', 0),
(17, 'Barra Nuts branca 100 gr ', 20, '164.00', '8.20', '16.80', 'Barras', 0),
(18, 'Barra Nuts meio amarga 100 gr ', 20, '164.00', '8.20', '16.80', 'Barras', 0),
(19, 'Bombom trufado branco 15 gr', 90, '90.00', '1.00', '2.00', 'Barras', 0),
(20, 'Bombom trufado frutas vermelhas 15 gr ', 90, '90.00', '1.00', '2.00', 'Barras', 0),
(21, 'Bombom trufado pistache 15 gr', 90, '90.00', '1.00', '2.00', 'Barras', 0),
(22, 'Trufa artesanal caixa com 6', 12, '141.60', '11.80', '24.80', 'Barras', 0),
(23, 'Leiteira P 150 gr', 24, '576.00', '24.00', '44.50', 'Barras', 0),
(24, 'Leiteira G 300 gr', 12, '384.00', '32.00', '62.90', 'Barras', 0),
(25, 'Cachepot 150 gr ', 20, '340.00', '17.00', '34.00', 'Barras', 0),
(26, 'Caneca com bombons diversos 180 gr ', 20, '480.00', '24.00', '48.00', 'Barras', 0),
(27, 'Caixa seleções - ao leite/bco/croc 180 gr', 12, '222.00', '18.50', '38.90', 'Barras', 0),
(28, 'Pirulito ao leite ', 36, '90.00', '2.50', '5.00', 'Barras', 0),
(29, 'Pirulito caramelo', 36, '90.00', '2.50', '5.00', 'Barras', 0),
(30, 'Carrinho / coração menino 70 gr', 36, '234.00', '6.50', '13.70', 'Barras', 0),
(31, 'Ursinho / coração menina 70 gr', 36, '234.00', '6.50', '13.70', 'Barras', 0),
(32, 'Tabletes diversos presente 70 gr', 36, '250.20', '6.95', '14.90', 'Barras', 0),
(33, 'Mix de barrinhas presente 200 gr ', 20, '320.00', '16.00', '32.00', 'Barras', 0),
(34, 'Brigadeiro Gourmet 240 gr ', 24, '348.00', '14.50', '30.50', 'Barras', 0),
(35, 'Cookies castanha do para coberto 60 gr', 36, '162.00', '4.50', '9.50', 'Barras', 0),
(36, 'Cookies gotas de choc coberto 60 gr', 36, '162.00', '4.50', '9.50', 'Barras', 0),
(37, 'Trufa tradicional ', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(38, 'Trufa meio a meio - branco e tradicional', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(39, 'Trufa morango', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(40, 'Trufa cereja', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(41, 'Trufa maracuja', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(42, 'Trufa Marula ', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(43, 'Trufa meio a meio - morango e tradic', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(44, 'Trufa limão ', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(45, 'Trufa puro cacau', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(46, 'Trufa coco', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(47, 'Lata celebrar bombons com licor 225 gr', 8, '216.00', '27.00', '54.00', 'Barras', 0),
(48, 'Lata drageas premium 150 gr', 10, '260.00', '26.00', '52.00', 'Barras', 0),
(49, 'Caixa presente bombom sem lactose 160 gr', 12, '299.40', '24.95', '49.90', 'Barras', 0),
(50, 'Caixa presente bombom diet 160 gr', 12, '299.40', '24.95', '49.90', 'Barras', 0),
(51, 'Caixa felino 100 gr', 30, '318.00', '10.60', '18.00', 'Barras', 0),
(52, 'Brigadeiro Gourmet no palito Maltine', 20, '118.00', '5.90', '12.40', 'Barras', 0),
(53, 'Brigadeiro Gourmet no palito Tradicional', 20, '118.00', '5.90', '12.40', 'Barras', 0),
(54, 'Tablete 10 gr ao leite', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(55, 'Tablete 10 gr ao leite crocante', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(56, 'Tablete 10 gr ao leite mentolado', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(57, 'Tablete 10 gr branco', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(58, 'Tablete 10 gr branco crocante', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(59, 'Tablete 10 gr meio amargo', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(60, 'Tablete 10 gr meio amargo crocante', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(61, 'placa com frase "TE AMO" 50 gr', 20, '130.00', '6.50', '13.00', 'Barras', 0),
(62, 'placa com frase "COM CARINHO" 50 gr', 20, '130.00', '6.50', '13.00', 'Barras', 0),
(63, 'placa com frase "PARABENS" 50 gr', 20, '130.00', '6.50', '13.00', 'Barras', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_usuario`
--

CREATE TABLE IF NOT EXISTS `produtos_usuario` (
  `id_produto` int(10) unsigned NOT NULL DEFAULT '0',
  `descricao` varchar(200) NOT NULL,
  `qtd_caixa` int(10) unsigned NOT NULL,
  `valor_caixa` decimal(10,2) NOT NULL,
  `valor_unit` decimal(10,2) NOT NULL,
  `valor_venda` decimal(10,2) NOT NULL,
  `categoria` varchar(60) NOT NULL,
  `foi_pedido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos_usuario`
--

INSERT INTO `produtos_usuario` (`id_produto`, `descricao`, `qtd_caixa`, `valor_caixa`, `valor_unit`, `valor_venda`, `categoria`, `foi_pedido`) VALUES
(1, 'Barra ao leite 100 gr', 30, '180.00', '6.00', '12.60', 'Barras', 0),
(2, 'Barra meio amargo 100 gr', 30, '180.00', '6.00', '12.60', 'Barras', 0),
(3, 'Barra branco 100 gr', 30, '180.00', '6.00', '12.60', 'Barras', 0),
(4, 'Barra ao leite 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(5, 'Barra ao leite com amendoim 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(6, 'Barra ao leite com avelã 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(7, 'Barra ao leite com cast de caju 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(8, 'Barra branco 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(9, 'Barra branco com cookies 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(10, 'Barra meio amargo 20 gr', 150, '195.00', '1.30', '2.75', 'Barras', 0),
(11, 'Barra origem 35% 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(12, 'Barra origem 53% 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(13, 'Barra origem 63% 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(14, 'Barra origem 70% 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(15, 'Barra origem diet 40 gr', 30, '165.00', '5.50', '11.60', 'Barras', 0),
(16, 'Barra Nuts ao leite 100 gr ', 20, '164.00', '8.20', '16.80', 'Barras', 0),
(17, 'Barra Nuts branca 100 gr ', 20, '164.00', '8.20', '16.80', 'Barras', 0),
(18, 'Barra Nuts meio amarga 100 gr ', 20, '164.00', '8.20', '16.80', 'Barras', 0),
(19, 'Bombom trufado branco 15 gr', 90, '90.00', '1.00', '2.00', 'Barras', 0),
(20, 'Bombom trufado frutas vermelhas 15 gr ', 90, '90.00', '1.00', '2.00', 'Barras', 0),
(21, 'Bombom trufado pistache 15 gr', 90, '90.00', '1.00', '2.00', 'Barras', 0),
(22, 'Trufa artesanal caixa com 6', 12, '141.60', '11.80', '24.80', 'Barras', 0),
(23, 'Leiteira P 150 gr', 24, '576.00', '24.00', '44.50', 'Barras', 0),
(24, 'Leiteira G 300 gr', 12, '384.00', '32.00', '62.90', 'Barras', 0),
(25, 'Cachepot 150 gr ', 20, '340.00', '17.00', '34.00', 'Barras', 0),
(26, 'Caneca com bombons diversos 180 gr ', 20, '480.00', '24.00', '48.00', 'Barras', 0),
(27, 'Caixa seleções - ao leite/bco/croc 180 gr', 12, '222.00', '18.50', '38.90', 'Barras', 0),
(28, 'Pirulito ao leite ', 36, '90.00', '2.50', '5.00', 'Barras', 0),
(29, 'Pirulito caramelo', 36, '90.00', '2.50', '5.00', 'Barras', 0),
(30, 'Carrinho / coração menino 70 gr', 36, '234.00', '6.50', '13.70', 'Barras', 0),
(31, 'Ursinho / coração menina 70 gr', 36, '234.00', '6.50', '13.70', 'Barras', 0),
(32, 'Tabletes diversos presente 70 gr', 36, '250.20', '6.95', '14.90', 'Barras', 0),
(33, 'Mix de barrinhas presente 200 gr ', 20, '320.00', '16.00', '32.00', 'Barras', 0),
(34, 'Brigadeiro Gourmet 240 gr ', 24, '348.00', '14.50', '30.50', 'Barras', 0),
(35, 'Cookies castanha do para coberto 60 gr', 36, '162.00', '4.50', '9.50', 'Barras', 0),
(36, 'Cookies gotas de choc coberto 60 gr', 36, '162.00', '4.50', '9.50', 'Barras', 0),
(37, 'Trufa tradicional ', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(38, 'Trufa meio a meio - branco e tradicional', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(39, 'Trufa morango', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(40, 'Trufa cereja', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(41, 'Trufa maracuja', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(42, 'Trufa Marula ', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(43, 'Trufa meio a meio - morango e tradic', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(44, 'Trufa limão ', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(45, 'Trufa puro cacau', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(46, 'Trufa coco', 80, '112.00', '1.40', '3.00', 'Barras', 0),
(47, 'Lata celebrar bombons com licor 225 gr', 8, '216.00', '27.00', '54.00', 'Barras', 0),
(48, 'Lata drageas premium 150 gr', 10, '260.00', '26.00', '52.00', 'Barras', 0),
(49, 'Caixa presente bombom sem lactose 160 gr', 12, '299.40', '24.95', '49.90', 'Barras', 0),
(50, 'Caixa presente bombom diet 160 gr', 12, '299.40', '24.95', '49.90', 'Barras', 0),
(51, 'Caixa felino 100 gr', 30, '318.00', '10.60', '18.00', 'Barras', 0),
(52, 'Brigadeiro Gourmet no palito Maltine', 20, '118.00', '5.90', '12.40', 'Barras', 0),
(53, 'Brigadeiro Gourmet no palito Tradicional', 20, '118.00', '5.90', '12.40', 'Barras', 0),
(54, 'Tablete 10 gr ao leite', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(55, 'Tablete 10 gr ao leite crocante', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(56, 'Tablete 10 gr ao leite mentolado', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(57, 'Tablete 10 gr branco', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(58, 'Tablete 10 gr branco crocante', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(59, 'Tablete 10 gr meio amargo', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(60, 'Tablete 10 gr meio amargo crocante', 200, '180.00', '0.90', '2.00', 'Barras', 0),
(61, 'placa com frase "TE AMO" 50 gr', 20, '130.00', '6.50', '13.00', 'Barras', 0),
(62, 'placa com frase "COM CARINHO" 50 gr', 20, '130.00', '6.50', '13.00', 'Barras', 0),
(63, 'placa com frase "PARABENS" 50 gr', 20, '130.00', '6.50', '13.00', 'Barras', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `permissao` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `permissao`) VALUES
(1, 'junior', 'junior', '1234', 1),
(16, 'Administrador', 'admin', '123@chocobra', 1),
(17, 'Franqueado 01', 'usuario', 'leitura', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
