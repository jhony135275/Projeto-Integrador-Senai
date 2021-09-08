-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 22-Dez-2020 às 15:28
-- Versão do servidor: 5.7.28
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_descricao`) VALUES
(1, 'PAES E SALGADOS'),
(2, 'DOCES'),
(3, 'BEBIDAS\r\n'),
(4, 'aaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cod_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `CPF` char(16) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_cliente`),
  UNIQUE KEY `CPF` (`CPF`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `CPF`, `password`, `user`) VALUES
(26, '109.401.028-62', '202cb962ac59075b964b07152d234b70', 'b09c600fddc573f117449b3723f23d64'),
(28, '096.001.988-02', '202cb962ac59075b964b07152d234b70', 'ae5a9733104904f8ece1abf0e3a9227b'),
(44, '467.683.958-82', '202cb962ac59075b964b07152d234b70', '245a9d1273c6251d654bcc6ad521c00a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_cliente`
--

DROP TABLE IF EXISTS `endereco_cliente`;
CREATE TABLE IF NOT EXISTS `endereco_cliente` (
  `cod_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(20) NOT NULL,
  `CEP` char(10) NOT NULL,
  `bairro` varchar(20) CHARACTER SET utf8 NOT NULL,
  `numero` int(11) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  PRIMARY KEY (`cod_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco_cliente`
--

INSERT INTO `endereco_cliente` (`cod_cliente`, `rua`, `CEP`, `bairro`, `numero`, `cidade`) VALUES
(26, 'Pastor veneto', '15.841-891', 'Seu Jorge', 444, 'Damantina'),
(28, 'aaa', '56.418-945', 'aaa', 15, 'aaa'),
(44, 'bbbb', '22222222', 'bbbb', 2222, 'bbb');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_fornecedor`
--

DROP TABLE IF EXISTS `endereco_fornecedor`;
CREATE TABLE IF NOT EXISTS `endereco_fornecedor` (
  `cod_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `bairro` varchar(20) NOT NULL,
  `rua` varchar(20) NOT NULL,
  `CEP` char(10) NOT NULL,
  `numero` int(11) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  PRIMARY KEY (`cod_fornecedor`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco_fornecedor`
--

INSERT INTO `endereco_fornecedor` (`cod_fornecedor`, `bairro`, `rua`, `CEP`, `numero`, `cidade`) VALUES
(1, 'Sao lourezo', 'Rua cillos', '13454888', 48, 'santa barbara'),
(2, 'Santa luzia', 'Professor silva', '13448-108', 8, 'santa barbara'),
(3, 'Jardim pirassunuga', 'Porto rico', '13457-888', 856, 'santa barbara'),
(4, 'Jd ipiranga', 'Padre Joao Ferreira', '13444-405', 158, 'Americana');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `cod_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `CNPJ` char(11) NOT NULL,
  PRIMARY KEY (`cod_fornecedor`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`cod_fornecedor`, `nome`, `CNPJ`) VALUES
(1, 'Panificadora Bella Pane LTDA', '10231854801'),
(2, 'Distribuidora de Refrigerante 2 irmãos', '22155648900'),
(3, 'Coca coca LTDA', '55678318352'),
(4, 'Doceria Italiana', '64888128901');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `cod_item` int(11) NOT NULL AUTO_INCREMENT,
  `item_id_categoria` int(11) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `breve_descricao` varchar(255) NOT NULL,
  `imagem` varchar(65000) NOT NULL,
  PRIMARY KEY (`cod_item`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`cod_item`, `item_id_categoria`, `valor_unitario`, `descricao`, `breve_descricao`, `imagem`) VALUES
(1, 1, '0.50', 'Pao frances', 'Tipo de pao feito de farinha, sal, agua e fermento.', 'https://amp.receitadevovo.com.br/wp-content/uploads/2020/10/como-fazer-pao-frances-em-casa_04082020194448.jpg'),
(2, 1, '1.00', 'Pao de queijo', 'Variacao da chipa, receita criada pelas missoes jesuiticas, com influências indígena e europeia', 'https://1.bp.blogspot.com/_27yAS0qg3Jg/TBuSKlDJsaI/AAAAAAAAAAs/0XJtFfYnBu8/s1600/pao-de-queijo-1.jpg'),
(3, 1, '4.50', 'Coxinha de Frango', 'Coxinha de Frango com massa de trigo e recheio de catupiry com frango desfiado', 'https://i2.wp.com/www.flamboesa.com.br/wp-content/uploads/2017/06/coxinha9386.jpg?fit=1280%2C849&ssl=1'),
(4, 2, '4.50', 'Bomba de Chocolate', 'Bomba de chocolate feito com massa de farinha de trigo, com recheio cremoso de chobolate e cobertura de calda de chocolate endurecida.', 'https://abrilmdemulher.files.wordpress.com/2016/10/receita-bomba-chocolate-diet.jpg?quality=90&strip=info&w=620&h=372&crop=1'),
(5, 2, '1.50', 'Sonho', 'Sonho com recheio de doce de leite', 'https://koch-img.azureedge.net/product/34357-sonho-panfacil-doce-de-leite-kg-g.jpg'),
(6, 3, '5.00', 'Refrigerante Esportivo 2L', 'Refrigerante com o sabor de Guarana\r\n, contendo 2 Litros', 'https://thumb-cdn.soluall.net/prod/shp_products/sp300fw/6051cd3c-7024-482d-9bd2-84c6b48eb9ce/6631150b-79e3-4f03-9d32-e2bc435567aa.jpg'),
(7, 3, '5.00', 'Guarana antartica 2L', 'bebida com sabor de guarana, feita com o fruto que vem da Amazônia.', 'https://www.ideiagood.com.br/plataforma/cardapio/uploads/cardapio/111_59b03617e218e.jpg'),
(8, 3, '7.99', 'Refrigerante Coca-Cola 2 litros', 'Refrigerante com o sabor de Coca com 2 Litros', 'https://www.confianca.com.br/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/2/1/211370_1.jpg'),
(9, 1, '7.90', 'Pão de forma 300g', 'Pao de forma com 300g marca PULMAN', 'https://cdn.awsli.com.br/1369/1369432/produto/54567408/698896d09d.jpg'),
(10, 3, '2.90', 'Lata 250ml Coca-Cola', 'Lata de refrigerante sabor cola com 220ml', 'https://supernossoemcasa.vteximg.com.br/arquivos/ids/220928-1000-1000/182790.jpg?v=637172799446400000'),
(11, 2, '5.00', 'Torta de Chocolate', 'Torta de chocolate 100g com recheio de chocolate e cobertura de granulado branco', 'https://t2.rg.ltmcdn.com/pt/images/1/0/0/torta_umida_de_chocolate_6001_600.jpg'),
(14, 2, '12.00', 'Pão doce', 'Pao com doce de leite e coco ralado', 'https://img.cybercook.com.br/imagens/receitas/681/pao-doce-de-creme-e-coco-360x220.jpg'),
(12, 1, '5.00', 'Salgado de presunto e queijo assado', 'Salgado com oregano ', 'https://www.bonde.com.br/img/bondenews/2019/05/img_1_33_1576.jpg'),
(13, 2, '1.00', 'Rosquinha de Chocolate', 'Rosquinha de Chocolate com cobertura de chocolate e cheio de chocolate branco', 'https://rihappy.vteximg.com.br/arquivos/ids/373082-768-768/acessorios-de-praia-e-piscina-boia-redonda-114-cm-rosquinha-donut-chocolate-intex-56262_Frente.jpg?v=636857707247130000'),
(15, 2, '12.00', 'aaaa', 'aaaaa', 'https://s2.glbimg.com/nksCDlmBan7iiSCgJqZdN7A5ekc=/e.glbimg.com/og/ed/f/original/2019/10/22/6th-place_small-white-hair-spider_javier-ruperez_nikon-small-world.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemxfornecedor`
--

DROP TABLE IF EXISTS `itemxfornecedor`;
CREATE TABLE IF NOT EXISTS `itemxfornecedor` (
  `cod_fornecedor` int(11) NOT NULL,
  `cod_item` int(11) NOT NULL,
  PRIMARY KEY (`cod_fornecedor`,`cod_item`),
  KEY `cod_item` (`cod_item`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itemxfornecedor`
--

INSERT INTO `itemxfornecedor` (`cod_fornecedor`, `cod_item`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 9),
(1, 12),
(2, 6),
(2, 7),
(3, 8),
(3, 10),
(4, 4),
(4, 5),
(4, 11),
(4, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_do_pedido`
--

DROP TABLE IF EXISTS `itens_do_pedido`;
CREATE TABLE IF NOT EXISTS `itens_do_pedido` (
  `cod_item` int(11) NOT NULL,
  `cod_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `qtd` int(11) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`cod_item`,`cod_pedido`),
  KEY `cod_pedido` (`cod_pedido`)
) ENGINE=MyISAM AUTO_INCREMENT=216 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itens_do_pedido`
--

INSERT INTO `itens_do_pedido` (`cod_item`, `cod_pedido`, `qtd`, `valor_unitario`, `valor_total`) VALUES
(3, 213, 2, '4.50', '9.00'),
(4, 212, 2, '4.50', '9.00'),
(4, 211, 1, '4.50', '4.50'),
(4, 210, 1, '4.50', '4.50'),
(10, 209, 1, '2.90', '2.90'),
(9, 209, 2, '7.90', '15.80'),
(9, 208, 2, '7.90', '15.80'),
(4, 207, 2, '4.50', '9.00'),
(4, 206, 1, '4.50', '4.50'),
(3, 214, 2, '4.50', '9.00'),
(4, 215, 2, '4.50', '9.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `cod_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cliente` int(11) NOT NULL,
  `status_pedido` varchar(14) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `desconto` decimal(10,2) DEFAULT NULL,
  `data` char(20) NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`cod_pedido`),
  KEY `cod_cliente` (`cod_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=216 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`cod_pedido`, `cod_cliente`, `status_pedido`, `valor_total`, `desconto`, `data`, `hora`) VALUES
(215, 43, 'Cancelado', '9.00', '0.00', '2020-12-21', '15:14:32'),
(214, 40, 'Cancelado', '9.00', '0.00', '2020-12-21', '12:19:35'),
(213, 38, 'Cancelado', '9.00', '0.00', '2020-12-21', '09:36:48'),
(212, 26, 'Cancelado', '9.00', '0.00', '2020-12-21', '09:02:43'),
(211, 26, 'Processando', '4.50', '0.00', '2020-12-20', '17:17:41'),
(210, 26, 'Processando', '4.50', '0.00', '2020-12-17', '16:01:33'),
(209, 30, 'Processando', '18.70', '0.00', '2020-12-17', '11:25:30'),
(208, 30, 'Processando', '15.80', '0.00', '2020-12-17', '11:25:20'),
(207, 26, 'Cancelado', '9.00', '0.00', '2020-12-17', '00:17:07'),
(206, 26, 'Cancelado', '4.50', '0.00', '2020-12-15', '22:40:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_cliente`
--

DROP TABLE IF EXISTS `telefone_cliente`;
CREATE TABLE IF NOT EXISTS `telefone_cliente` (
  `cod_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `telefone` char(15) DEFAULT NULL,
  PRIMARY KEY (`cod_cliente`),
  UNIQUE KEY `telefone` (`telefone`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `telefone_cliente`
--

INSERT INTO `telefone_cliente` (`cod_cliente`, `telefone`) VALUES
(44, '(11)11111-1111'),
(28, '(85)48941-2313'),
(26, '(18)94894-1231');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_fornecedor`
--

DROP TABLE IF EXISTS `telefone_fornecedor`;
CREATE TABLE IF NOT EXISTS `telefone_fornecedor` (
  `cod_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `telefone` char(15) NOT NULL,
  PRIMARY KEY (`cod_fornecedor`),
  UNIQUE KEY `telefone` (`telefone`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `telefone_fornecedor`
--

INSERT INTO `telefone_fornecedor` (`cod_fornecedor`, `telefone`) VALUES
(1, '(19)933454-0002'),
(2, '(19)95481-1230'),
(3, '(19)98872-1038'),
(4, '(19)94144-0802');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
