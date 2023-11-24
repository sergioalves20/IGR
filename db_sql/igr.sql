-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Nov-2023 às 12:41
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `igr`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_adendactfz`
--

CREATE TABLE `tbl_adendactfz` (
  `id_adendactfiz` int(11) NOT NULL,
  `id_contratfiz` int(11) NOT NULL,
  `datai` date NOT NULL,
  `dataf` date NOT NULL,
  `datass` date NOT NULL,
  `val` double(7,2) NOT NULL,
  `just` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ass` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_adendactob`
--

CREATE TABLE `tbl_adendactob` (
  `id_adendactob` int(11) NOT NULL,
  `id_contratobra` int(11) NOT NULL,
  `datai` date NOT NULL,
  `dataf` date NOT NULL,
  `datass` date NOT NULL,
  `val` double(7,2) NOT NULL,
  `just` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ass` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_banqueta`
--

CREATE TABLE `tbl_banqueta` (
  `id_banqueta` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_talude` int(11) NOT NULL,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `banqueta` char(2) DEFAULT NULL,
  `dstpetal` double DEFAULT NULL,
  `compt` double DEFAULT NULL,
  `largura` double DEFAULT NULL,
  `drcrista` varchar(9) DEFAULT NULL,
  `material` varchar(13) DEFAULT NULL,
  `lrgdrcrista` double DEFAULT NULL,
  `cptdrcrista` double DEFAULT NULL,
  `profund` double DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_bermas`
--

CREATE TABLE `tbl_bermas` (
  `id_berma` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(11) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` int(11) DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `larg` double(3,2) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_bermasbase`
--

CREATE TABLE `tbl_bermasbase` (
  `id_bermabase` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_berma` int(11) NOT NULL,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `natgeo` varchar(8) DEFAULT NULL,
  `granul` varchar(5) DEFAULT NULL,
  `espess` double(4,2) DEFAULT NULL,
  `sentido` varchar(15) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_bermasbbdsg`
--

CREATE TABLE `tbl_bermasbbdsg` (
  `id_bermabbdsg` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_berma` int(11) NOT NULL,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `granul` varchar(5) DEFAULT NULL,
  `espess` double(4,2) DEFAULT NULL,
  `betume` varchar(6) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_bermasbblig`
--

CREATE TABLE `tbl_bermasbblig` (
  `id_bermabblig` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_berma` int(11) NOT NULL,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `granul` varchar(5) DEFAULT NULL,
  `espess` double(3,1) DEFAULT NULL,
  `betume` varchar(10) DEFAULT NULL,
  `sentido` varchar(15) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_bermasfund`
--

CREATE TABLE `tbl_bermasfund` (
  `id_bermafund` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_berma` int(11) NOT NULL,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `natgeo` varchar(5) DEFAULT NULL,
  `cbr` double(5,3) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` int(11) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_bermastipo`
--

CREATE TABLE `tbl_bermastipo` (
  `id_bermatipo` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_berma` int(11) NOT NULL,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(11) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` int(11) DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `pavim` tinyint(1) DEFAULT NULL,
  `pedra` varchar(18) DEFAULT NULL,
  `revsuperf` varchar(7) DEFAULT NULL,
  `bb` varchar(6) DEFAULT NULL,
  `bclas` tinyint(1) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_bermasubbase`
--

CREATE TABLE `tbl_bermasubbase` (
  `id_bermasubbase` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_berma` int(11) NOT NULL,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `natgeo` varchar(8) DEFAULT NULL,
  `granul` varchar(4) DEFAULT NULL,
  `espess` double(4,2) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_concelho`
--

CREATE TABLE `tbl_concelho` (
  `id_concelho` int(11) NOT NULL,
  `concelho` varchar(27) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_concurso`
--

CREATE TABLE `tbl_concurso` (
  `id_concurso` int(11) NOT NULL,
  `id_empreitada` int(11) NOT NULL,
  `data_publicacao` date DEFAULT NULL,
  `data_entra_prop` date DEFAULT NULL,
  `data_relat_prop` date DEFAULT NULL,
  `data_homolog` date DEFAULT NULL,
  `data_consignacao` date DEFAULT NULL,
  `data_ordem_inicio` date DEFAULT NULL,
  `anulado` tinyint(1) NOT NULL DEFAULT 0,
  `data_anulacao` date DEFAULT NULL,
  `id_motivo` int(11) NOT NULL,
  `ass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_consorcio`
--

CREATE TABLE `tbl_consorcio` (
  `id_consorcio` int(4) NOT NULL,
  `id_concurso` int(4) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `lider` tinyint(1) NOT NULL DEFAULT 0,
  `ass` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_contratfiz`
--

CREATE TABLE `tbl_contratfiz` (
  `id_contratfiz` int(11) NOT NULL,
  `id_empreitada` int(11) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `datai` date NOT NULL,
  `dataf` date NOT NULL,
  `datass` date NOT NULL,
  `val` float(9,2) NOT NULL,
  `ass` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_contratobra`
--

CREATE TABLE `tbl_contratobra` (
  `id_contratobra` int(11) NOT NULL,
  `id_concurso` int(11) NOT NULL,
  `consorcio` varchar(100) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `datai` date NOT NULL,
  `dataf` date NOT NULL,
  `datass` date NOT NULL,
  `val` float(10,2) NOT NULL,
  `ass` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_ctrafego`
--

CREATE TABLE `tbl_ctrafego` (
  `id_ctrafego` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `id_trecho` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `maquina` varchar(10) DEFAULT NULL,
  `id_posto` int(11) DEFAULT NULL,
  `altsolo` double(4,2) DEFAULT NULL,
  `disteixo` double(4,2) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `horai` time DEFAULT NULL,
  `horaf` time DEFAULT NULL,
  `datai` date DEFAULT NULL,
  `dataf` date DEFAULT NULL,
  `ndias` double(4,2) DEFAULT NULL,
  `vmedia` tinyint(3) DEFAULT NULL,
  `lig` mediumint(9) DEFAULT NULL,
  `pes` mediumint(9) DEFAULT NULL,
  `tmda` mediumint(9) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_curvasplanta`
--

CREATE TABLE `tbl_curvasplanta` (
  `id_curvap` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `lat_c` varchar(16) DEFAULT NULL,
  `lat_n` double(10,8) DEFAULT NULL,
  `long_c` varchar(16) DEFAULT NULL,
  `long_n` double(10,8) DEFAULT NULL,
  `altitude` int(11) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `raioplanta` tinyint(4) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_curvasverticais`
--

CREATE TABLE `tbl_curvasverticais` (
  `id_curvav` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `lat_c` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `lat_n` double(10,8) DEFAULT NULL,
  `long_c` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `long_n` double(10,8) DEFAULT NULL,
  `altitude` smallint(4) DEFAULT NULL,
  `sentido` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `raiovertical` int(11) DEFAULT NULL,
  `ass` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_delineadores`
--

CREATE TABLE `tbl_delineadores` (
  `id_delind` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(11) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` int(11) DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `delin` tinyint(1) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_drensupf`
--

CREATE TABLE `tbl_drensupf` (
  `id_drensupf` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(11) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` int(11) DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `tipo` varchar(9) DEFAULT NULL,
  `material` varchar(13) DEFAULT NULL,
  `sentido` varchar(11) NOT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_empreitada`
--

CREATE TABLE `tbl_empreitada` (
  `id_empreitada` int(11) NOT NULL,
  `data` date NOT NULL,
  `nome` varchar(300) NOT NULL,
  `tipos_proced` varchar(23) NOT NULL,
  `concurso` varchar(15) NOT NULL,
  `ass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_empresa`
--

CREATE TABLE `tbl_empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `alvara` varchar(50) NOT NULL,
  `nif` varchar(20) NOT NULL,
  `nac` varchar(30) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel1` varchar(20) NOT NULL,
  `cont1` varchar(30) NOT NULL,
  `tel2` varchar(20) NOT NULL,
  `cont2` varchar(30) NOT NULL,
  `tel3` varchar(20) NOT NULL,
  `cont3` varchar(30) NOT NULL,
  `ass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_estrada`
--

CREATE TABLE `tbl_estrada` (
  `id_estrada` int(11) NOT NULL,
  `codigo` varchar(8) DEFAULT NULL,
  `tutela` varchar(26) DEFAULT NULL,
  `classe` varchar(2) DEFAULT NULL,
  `ilha` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nseq` int(11) DEFAULT NULL,
  `estatuto` varchar(14) DEFAULT NULL,
  `extensao` double(5,3) DEFAULT NULL,
  `toponimo` varchar(255) DEFAULT NULL,
  `pontosext` text DEFAULT NULL,
  `altitd_pki` int(11) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` decimal(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` decimal(10,8) DEFAULT NULL,
  `altitd_pkf` int(11) DEFAULT 0,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` decimal(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` decimal(10,8) DEFAULT NULL,
  `orient` varchar(11) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_freguesia`
--

CREATE TABLE `tbl_freguesia` (
  `id_freguesia` int(11) NOT NULL,
  `freguesia` varchar(27) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_fxrod`
--

CREATE TABLE `tbl_fxrod` (
  `id_fxrod` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(11) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` int(11) DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `nvias` varchar(3) DEFAULT NULL,
  `largv1` double(3,2) DEFAULT NULL,
  `largv2` double(3,2) DEFAULT NULL,
  `largv3` double(3,2) DEFAULT NULL,
  `largv4` double(3,2) DEFAULT NULL,
  `largv5` double(3,2) DEFAULT NULL,
  `largv6` double(3,2) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` int(11) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_fxrodbase`
--

CREATE TABLE `tbl_fxrodbase` (
  `id_fxrodbase` int(11) NOT NULL,
  `alt` int(11) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_fxrod` int(11) NOT NULL,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `via` char(2) DEFAULT NULL,
  `natgeo` varchar(8) DEFAULT NULL,
  `granul` varchar(4) DEFAULT NULL,
  `espess` double(4,2) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` int(11) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_fxrodbbdsg`
--

CREATE TABLE `tbl_fxrodbbdsg` (
  `id_fxrodbbdsg` int(11) NOT NULL,
  `alt` int(11) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_fxrod` int(11) NOT NULL,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `via` char(2) DEFAULT NULL,
  `granul` varchar(4) DEFAULT NULL,
  `espess` double(4,2) DEFAULT NULL,
  `betume` varchar(6) DEFAULT NULL,
  `ass` char(30) NOT NULL,
  `arq` int(11) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_fxrodbblig`
--

CREATE TABLE `tbl_fxrodbblig` (
  `id_fxrodbblig` int(11) NOT NULL,
  `alt` int(11) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_fxrod` int(11) NOT NULL,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `via` char(2) DEFAULT NULL,
  `granul` varchar(4) DEFAULT NULL,
  `espess` double(4,2) DEFAULT NULL,
  `betume` varchar(6) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` int(11) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_fxrodfund`
--

CREATE TABLE `tbl_fxrodfund` (
  `id_fxrodfund` int(11) NOT NULL,
  `alt` int(11) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_fxrod` int(11) NOT NULL,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `via` char(2) DEFAULT NULL,
  `natgeo` varchar(5) DEFAULT NULL,
  `cbr` double(5,3) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_fxrodsubbase`
--

CREATE TABLE `tbl_fxrodsubbase` (
  `id_fxrodsubbase` int(11) NOT NULL,
  `alt` int(11) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL,
  `id_fxrod` int(11) NOT NULL,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `via` char(2) DEFAULT NULL,
  `natgeo` varchar(8) DEFAULT NULL,
  `granul` varchar(4) DEFAULT NULL,
  `espess` double(4,2) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` int(11) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_fxrodtipo`
--

CREATE TABLE `tbl_fxrodtipo` (
  `id_fxrodtipo` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_fxrod` int(11) NOT NULL,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(11) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` int(11) DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `terrabt` tinyint(1) NOT NULL DEFAULT 0,
  `pedra` varchar(18) DEFAULT NULL,
  `revsuperf` varchar(7) DEFAULT NULL,
  `bb` varchar(6) DEFAULT NULL,
  `bclas` tinyint(1) NOT NULL DEFAULT 0,
  `via` char(2) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_gestor`
--

CREATE TABLE `tbl_gestor` (
  `id_gestor` int(11) NOT NULL,
  `nome_gestor` varchar(100) NOT NULL,
  `nasc` date DEFAULT NULL,
  `grauac` varchar(30) DEFAULT NULL,
  `nif` varchar(20) DEFAULT NULL,
  `endr` varchar(100) DEFAULT NULL,
  `corr` varchar(50) DEFAULT NULL,
  `tel1` varchar(20) DEFAULT NULL,
  `tel2` varchar(20) DEFAULT NULL,
  `data_reg` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tbl_gestor`
--

INSERT INTO `tbl_gestor` (`id_gestor`, `nome_gestor`, `nasc`, `grauac`, `nif`, `endr`, `corr`, `tel1`, `tel2`, `data_reg`) VALUES
(9, 'Catarina Alves', '0000-00-00', '', '', '', '', '', '', '2023-11-16'),
(7, 'Brucelinda Veiga', '0000-00-00', '', '', '', '', '', '', '2023-11-16'),
(8, 'Sergio Alves', '0000-00-00', '', '', '', '', '', '', '2023-11-16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_gestorobra`
--

CREATE TABLE `tbl_gestorobra` (
  `id_gestorobra` int(11) NOT NULL,
  `id_gestor` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `id_objconcurso` int(11) NOT NULL,
  `nomeado` tinyint(1) NOT NULL DEFAULT 0,
  `substituto` tinyint(1) NOT NULL DEFAULT 0,
  `interino` tinyint(1) NOT NULL DEFAULT 0,
  `datai` date DEFAULT NULL,
  `dataf` date DEFAULT NULL,
  `just` varchar(300) DEFAULT NULL,
  `ass` varchar(25) NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tbl_gestorobra`
--

INSERT INTO `tbl_gestorobra` (`id_gestorobra`, `id_gestor`, `data`, `id_objconcurso`, `nomeado`, `substituto`, `interino`, `datai`, `dataf`, `just`, `ass`, `ativo`) VALUES
(1, 9, '2023-11-18', 1, 1, 0, 0, '2023-11-18', '2023-11-18', 'férias', 'Brucelinda Veiga', 1),
(2, 9, '2023-11-19', 5, 1, 0, 0, '2023-11-19', '2023-11-19', 'Viagem', 'Brucelinda Veiga', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_gestrada`
--

CREATE TABLE `tbl_gestrada` (
  `id_gestrada` int(11) NOT NULL,
  `id_gestor` int(11) NOT NULL,
  `data` date NOT NULL,
  `id_estrada` int(11) NOT NULL,
  `nomeado` tinyint(1) NOT NULL,
  `substituto` tinyint(1) NOT NULL,
  `interino` tinyint(1) NOT NULL,
  `datai` date NOT NULL,
  `dataf` date NOT NULL,
  `just` varchar(200) NOT NULL,
  `ass` varchar(15) NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_guardseg`
--

CREATE TABLE `tbl_guardseg` (
  `id_guardseg` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(11) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` int(11) DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `guardseg` varchar(9) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_ilha`
--

CREATE TABLE `tbl_ilha` (
  `id_ilha` int(11) NOT NULL,
  `ilha` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_intersecao`
--

CREATE TABLE `tbl_intersecao` (
  `id_intrs` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `lat_c` varchar(16) DEFAULT NULL,
  `lat_n` double(10,8) DEFAULT NULL,
  `long_c` varchar(16) DEFAULT NULL,
  `long_n` double(10,8) DEFAULT NULL,
  `altitude` int(11) DEFAULT NULL,
  `desniv` tinyint(1) DEFAULT NULL,
  `denivel` varchar(14) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_intervencao`
--

CREATE TABLE `tbl_intervencao` (
  `id_intervencao` int(11) NOT NULL,
  `id_proposta` int(11) NOT NULL,
  `id_objconcurso` int(11) NOT NULL,
  `valor_global` float(9,2) NOT NULL,
  `trabalhos` varchar(24) NOT NULL,
  `cod` varchar(12) NOT NULL,
  `pkinicio` float(5,3) NOT NULL,
  `pkfim` float(5,3) NOT NULL,
  `sentido` varchar(11) NOT NULL,
  `und` int(11) NOT NULL,
  `quant` float(8,2) NOT NULL,
  `preco` float(9,2) NOT NULL,
  `ass` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tbl_intervencao`
--

INSERT INTO `tbl_intervencao` (`id_intervencao`, `id_proposta`, `id_objconcurso`, `valor_global`, `trabalhos`, `cod`, `pkinicio`, `pkfim`, `sentido`, `und`, `quant`, `preco`, `ass`) VALUES
(7, 5, 1, 200.00, 'Muros', '01.01.01', 0.110, 0.200, 'Crescente', 0, 100.00, 2000.00, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_iq`
--

CREATE TABLE `tbl_iq` (
  `id_iq` int(11) NOT NULL,
  `alt` int(11) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `id_trecho` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `iq` tinyint(1) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` int(11) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_iri`
--

CREATE TABLE `tbl_iri` (
  `id_iri` int(11) NOT NULL,
  `alt` int(11) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `id_trecho` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `via` char(2) DEFAULT NULL,
  `iri` double(2,1) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` int(11) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_juri`
--

CREATE TABLE `tbl_juri` (
  `id_juri` int(11) NOT NULL,
  `data` date NOT NULL,
  `id_concurso` int(3) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `instituicao` varchar(100) NOT NULL,
  `ass` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_marcadores`
--

CREATE TABLE `tbl_marcadores` (
  `id_marc` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(11) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` int(11) DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `marc` tinyint(1) NOT NULL DEFAULT 0,
  `sentido` varchar(11) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` int(11) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_motivo`
--

CREATE TABLE `tbl_motivo` (
  `id_motivo` int(2) NOT NULL,
  `motivo` text NOT NULL,
  `ass` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tbl_motivo`
--

INSERT INTO `tbl_motivo` (`id_motivo`, `motivo`, `ass`) VALUES
(1, 'Por circunstâncias supervenientes foi adiada a execução da obra pelo prazo mínimo de 1 (um) ano. ( Alínea a) do Artigo 105º do Decreto-Lei nº 54/2010)', 'Brucelinda Veiga'),
(2, 'Todas as propostas, ou as mais convenientes, ofereceram preço total consideravelmente superior ao preço base do concurso.(Alínea b) do Artigo 105º do Decreto-Lei nº 54/2010)', 'Brucelinda Veiga'),
(3, 'As condições oferecidas e os projectos ou variantes da autoria do empreiteiro não foram convenientes por tratar-se de propostas condicionadas.( Alínea c) do Artigo 105º do Decreto-Lei nº 54/2010', 'Brucelinda Veiga'),
(4, 'Por grave circunstância superveniente, teve de proceder-se à revisão e alteração do projecto posto a concurso.(Alínea d) do Artigo 105º do Decreto-Lei nº 54/2010)', 'Brucelinda Veiga'),
(5, 'Houve forte presunção de conluio entre os concorrentes.(Alínea e) do Artigo 105º do Decreto-Lei nº 54/2010)', 'Brucelinda Veiga'),
(6, 'Todas as propostas ofereceram preço total anormalmente baixo e as respectivas notas justificativas não foram esclarecedoras.(Alínea f) do Artigo 105º do Decreto-Lei nº 54/2010)', 'Brucelinda Veiga'),
(7, 'Foi apresentada apenas uma proposta.( Alínea g) do Artigo 105º do Decreto-Lei nº 54/2010)', 'Brucelinda Veiga');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_muros`
--

CREATE TABLE `tbl_muros` (
  `id_muro` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(11) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` int(11) DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `nat` varchar(17) DEFAULT NULL,
  `altura` double(4,2) DEFAULT NULL,
  `espess` double(3,2) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_nivelacesso`
--

CREATE TABLE `tbl_nivelacesso` (
  `id_nivel` int(11) NOT NULL,
  `nivel` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tbl_nivelacesso`
--

INSERT INTO `tbl_nivelacesso` (`id_nivel`, `nivel`, `created`, `modified`) VALUES
(1, 'Administrador', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_objconcurso`
--

CREATE TABLE `tbl_objconcurso` (
  `id_objconcurso` int(11) NOT NULL,
  `id_concurso` int(11) NOT NULL,
  `id_estrada` int(11) NOT NULL,
  `tipo_obra` varchar(50) NOT NULL,
  `pkinicio` double(5,3) NOT NULL DEFAULT 0.000,
  `pkfim` double(5,3) NOT NULL DEFAULT 0.000,
  `ass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_ocorrencias`
--

CREATE TABLE `tbl_ocorrencias` (
  `id_ocor` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `id_estrada` int(11) DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(4) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` double DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `ocor` mediumtext DEFAULT NULL,
  `foto1` varchar(30) DEFAULT 'foto.jpg',
  `foto2` varchar(30) DEFAULT 'foto.jpg',
  `ass` varchar(30) NOT NULL,
  `arq` int(11) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_orcamento`
--

CREATE TABLE `tbl_orcamento` (
  `id_orc` int(11) NOT NULL,
  `data` date NOT NULL,
  `id_estrada` int(11) NOT NULL,
  `tipo_obra` varchar(50) NOT NULL,
  `ass` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_orcamentocap`
--

CREATE TABLE `tbl_orcamentocap` (
  `id_orcamentocap` int(2) NOT NULL,
  `capitulo` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tbl_orcamentocap`
--

INSERT INTO `tbl_orcamentocap` (`id_orcamentocap`, `capitulo`) VALUES
(1, 'Terraplenagem'),
(2, 'Drenagem'),
(3, 'Pavimentação'),
(4, 'Obras acessórias'),
(5, 'Equipamento de sinalização e segurança'),
(6, 'Obras de arte'),
(7, 'Túneis'),
(8, 'Diversos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_orcamentodet`
--

CREATE TABLE `tbl_orcamentodet` (
  `id_orcdet` int(11) NOT NULL,
  `id_orc` int(11) NOT NULL,
  `trabalhos` varchar(50) NOT NULL,
  `pkinicio` double(5,3) NOT NULL,
  `pkfim` double(5,3) NOT NULL,
  `cod` varchar(12) NOT NULL,
  `quant` double(10,3) NOT NULL,
  `preco` double(11,2) NOT NULL,
  `ass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_orcamentoitens`
--

CREATE TABLE `tbl_orcamentoitens` (
  `id_orc` int(11) NOT NULL,
  `cod` varchar(15) NOT NULL,
  `descr` varchar(300) NOT NULL,
  `und` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tbl_orcamentoitens`
--

INSERT INTO `tbl_orcamentoitens` (`id_orc`, `cod`, `descr`, `und`) VALUES
(1, '01', 'Terraplenagem', ''),
(3, '01.01.01', 'Desmatação, incluindo derrube de árvores, desenraizamento, limpeza do terreno, carga, transporte e colocação dos produtos em vazadouro e eventual indemnização por depósito.', 'm2'),
(4, '01.01.02', 'Demolição de construções (excluindo muros), incluindo carga, transporte e colocação dos produtos em vazadouro, e eventual indemnização por depósito.', 'm3'),
(5, '01.01.03', 'Demolição de muros, incluindo carga, transporte e colocação dos produtos em vazadouro, e eventual indemnização por depósito.', 'm3'),
(6, '01.01.04', 'Demolição de elementos do sistema de drenagem existente, incluindo carga, transporte e colocação dos produtos em vazadouro, e eventual indemnização por depósito.', 'm3'),
(7, '01.01.05', 'Desativação de poços, nascentes ou outras captações existentes:', ''),
(8, '01.01.05.01', 'Enchimento de poços com enrocamento, ou outro material com características drenantes equivalentes.', 'm3'),
(9, '01.01.05.02', 'Captação e condução de águas.', 'm'),
(10, '01.01.06', 'Decapagem na linha de terra vegetal com a(s) espessura(s) média(s) definida(s) no projeto e sua colocação em vazadouro, ou depósito provisório para posterior utilização, incluindo escavação, carga, transporte, proteção e eventual indemnização por depósito.', ''),
(11, '01.01.06.01', 'Com colocação em vazadouro.', 'm3'),
(12, '01.01.06.02', 'Com colocação em depósito provisório.', 'm3'),
(13, '01.01.07', 'Preparação da fundação de aterros em condições especiais:', ''),
(14, '01.01.07.01', 'Limpeza, regularização e compactação da fundação de aterros, em zonas de solos para execução de aterros de pequena altura.', 'm2'),
(15, '01.01.07.02', 'Limpeza, regularização e compactação da fundação de aterros, em zonas de afloramentos rochosos.', 'm2'),
(16, '01.01.07.03', 'Saneamento em fundação de aterros, incluindo carga, transporte e espalhamento em vazadouro ou depósito provisório, e eventual indemnização por depósito.', 'm3'),
(17, '01.01.07.04', 'Preenchimento dos volumes saneados com materiais adequados, incluindo o seu fornecimento, transporte, espalhamento e compactação.', 'm3'),
(18, '01.01.07.05', 'Fornecimento e colocação de geossintéticos em fundação de aterros, sobre baixas aluvionares compressíveis ou outros solos moles, com o objetivo essencial de desempenhar as funções de separação e/ou filtro.', 'm2'),
(19, '01.01.07.06', 'Fornecimento e colocação de geossintéticos em fundação de aterros, em zonas de deficiente traficabilidade, designadamente com espessuras elevadas de terras vegetais, de modo a permitir a circulação dos equipamentos de construção.', 'm2'),
(20, '01.01.07.07', 'Fornecimento e colocação de geossintéticos em fundação de aterros, com a função de reforço, incluindo todos os dispositivos e acessórios necessários à sua aplicação.', 'm2'),
(21, '01.01.07.08', 'Técnicas de consolidação, incluindo o fornecimento de todos os materiais necessários e a sua colocação ou execução - Drenos verticais do tipo Geodreno.', 'm'),
(22, '01.01.07.09', 'Técnicas de consolidação, incluindo o fornecimento de todos os materiais necessários e a sua colocação ou execução - Estacas de areia - D = 0,40 m.', 'm'),
(23, '01.01.07.10', 'Técnicas de consolidação, incluindo o fornecimento de todos os materiais necessários e a sua colocação ou execução - Estacas de areia - D = 0,50 m.', 'm'),
(24, '01.01.07.11', 'Técnicas de consolidação, incluindo o fornecimento de todos os materiais necessários e a sua colocação ou execução - Estacas de brita com diâmetro inferior ou igual a 0,70 m.', 'm'),
(25, '01.01.07.12', 'Técnicas de consolidação, incluindo o fornecimento de todos os materiais necessários e a sua colocação ou execução - Estacas de brita com diâmetro superior a 0,70 m.', 'm'),
(26, '01.01.07.13', 'Técnicas de consolidação, incluindo o fornecimento de todos os materiais necessários e a sua colocação ou execução - Pré-carga, incluindo o fornecimento e posterior remoção do material aplicado.', 'm3'),
(27, '01.01.07.14', 'Técnicas de consolidação, incluindo o fornecimento de todos os materiais necessários e a sua colocação ou execução - Valas drenantes, incluindo colocação de geotêxteis e preenchimento da vala com material drenante.', 'm3'),
(28, '01.01.08', 'Camada drenante sobrejacente ao geotêxtil:', ''),
(29, '01.01.08.01', 'Em areia natural.', 'm3'),
(30, '01.01.08.02', 'Em solos permeáveis.', 'm3'),
(31, '01.01.08.03', 'Em material aluvionar ou de terraço.', 'm3'),
(32, '01.01.08.04', 'Em materiais britados ou obtidos por crivagem, mistura ou composição de materiais naturais.', 'm3'),
(33, '01.02', 'Escavação na linha e colocação em aterro ou vazadouro:', ''),
(34, '01.02.01', 'Escavação em terreno brando.', 'm3'),
(35, '01.02.02', 'Escavação em terreno duro.', 'm3'),
(36, '01.02.03', 'Escavação em terreno compacto (rocha).', 'm3'),
(37, '01.02.04', 'Carga, transporte e colocação em aterro dos materiais provenientes da escavação:', ''),
(38, '01.02.04.01', 'Incluindo espalhamento e compactação.', 'm3'),
(39, '01.02.04.02', 'Incluindo tratamento \"in situ\" com cal e/ou cimento em camadas com espessura entre 0,20 a 0,35 m, inclusive.', 'm3'),
(40, '01.02.05', 'Carga, transporte e colocação em vazadouro dos materiais provenientes da escavação, incluindo espalhamento e eventual indemnização por depósito.', 'm3'),
(41, '01.02.06', 'Escavação de solos a rejeitar por falta de características para aplicação em aterros, incluindo carga, transporte, espalhamento em vazadouro e eventual indemnização por depósito.', 'm3'),
(42, '01.02.07', 'Regularização de taludes de escavação:', ''),
(43, '01.02.07.01', 'Em zonas onde a escavação foi feita em terreno brando.', 'm2'),
(44, '01.02.07.02', 'Em zonas onde a escavação foi feita em terreno duro.', 'm2'),
(45, '01.02.07.03', 'Em zonas onde a escavação foi feita em terreno compacto (rocha).', 'm2'),
(46, '01.02.08', 'Regularização de taludes de aterro.', 'm2'),
(47, '01.02.09', 'Regularização e modelação das áreas interiores aos ramos dos nós.', 'm2'),
(48, '01.02.10', 'Regularização e modelação de outras áreas confinantes com a estrada, conforme definido no projeto.', 'm2'),
(49, '01.03', 'Escavação em empréstimo:', ''),
(50, '01.03.01', 'Escavação em empréstimo em terreno de qualquer natureza e colocação em aterro, indemnização por desmatagem e arranjo para enquadramento paisagístico da zona de empréstimo:', ''),
(51, '01.03.01.01', 'Carga, transporte, espalhamento e compactação.', 'm3'),
(52, '01.03.01.02', 'Carga, transporte, espalhamento e compactação, incluindo tratamento \"in situ\" com cal e/ou cimento em camadas com espessura entre 0,20 a 0,35 m, inclusive.', 'm3'),
(53, '01.03.02', 'Tratamento paisagístico de zonas de empréstimo, de acordo com projeto específico, em casos excecionais.', 'm2'),
(54, '01.04', 'Leito do pavimento, incluindo tratamento ou  fornecimento, e colocação dos materiais: (espessuras das camadas, após compactação)', ''),
(55, '01.04.01', 'Em aterros de solos:', ''),
(56, '01.04.01.01', 'Com solos selecionados e 0,15 m de espessura.', 'm2'),
(57, '01.04.01.02', 'Com solos selecionados e 0,20 m de espessura.', 'm2'),
(58, '01.04.01.03', 'Com solos selecionados e 0,30 m de espessura.', 'm2'),
(59, '01.04.01.04', 'Tratamento \"in situ\" com ligantes hidráulicos e/ou pozolânicos numa espessura de 0,20 m.', 'm2'),
(60, '01.04.01.05', 'Tratamento \"in situ\" com ligantes hidráulicos e/ou pozolânicos numa espessura de 0,25 m.', 'm2'),
(61, '01.04.01.06', 'Tratamento \"in situ\" com ligantes hidráulicos e/ou pozolânicos numa espessura de 0,30 m.', 'm2'),
(62, '01.04.01.07', 'Em material granular não britado (seixo), com 0,15 m de espessura.', 'm2'),
(63, '01.04.01.08', 'Em material granular não britado (seixo), com 0,20 m de espessura.', 'm2'),
(64, '01.04.01.09', 'Em material granular britado, com 0,15 m de espessura.', 'm2'),
(65, '01.04.01.10', 'Em material granular britado, com 0,20 m de espessura.', 'm2'),
(66, '01.04.02', 'Em pedraplenos ou em aterros com materiais do tipo solo-enrocamento:', ''),
(67, '01.04.02.01', 'Em material granular não britado (seixo), com 0,15 m de espessura.', 'm2'),
(68, '01.04.02.02', 'Em material granular não britado (seixo), com 0,20 m de espessura.', 'm2'),
(69, '01.04.02.03', 'Em material granular britado, com 0,15 m de espessura.', 'm2'),
(70, '01.04.02.04', 'Em material granular britado, com 0,20 m de espessura.', 'm2'),
(71, '01.04.03', 'Em escavações ou perfis mistos em solo:', ''),
(72, '01.04.03.01', 'Escarificação, homogeneização e compactação, na espessura de 0,30 m.', 'm2'),
(73, '01.04.03.02', 'Saneamento, incluindo carga, transporte e espalhamento em vazadouro, e eventual indemnização por depósito, na espessura de 0,40 m.', 'm2'),
(74, '01.04.03.03', 'Saneamento, incluindo carga, transporte e espalhamento em vazadouro, e eventual indemnização por depósito, na espessura de 0,60 m.', 'm2'),
(75, '01.04.03.04', 'Em solos \"selecionados\", com 0,15 m de espessura.', 'm2'),
(76, '01.04.03.05', 'Em solos \"selecionados\", com 0,20 m de espessura.', 'm2'),
(77, '01.04.03.06', 'Em solos \"selecionados\", com 0,30 m de espessura.', 'm2'),
(78, '01.04.03.07', 'Tratamento \"in situ\" com ligantes hidráulicos e/ou pozolânicos, numa espessura de 0,20 m.', 'm2'),
(79, '01.04.03.08', 'Tratamento \"in situ\" com ligantes hidráulicos e/ou pozolânicos, numa espessura de 0,25 m.', 'm2'),
(80, '01.04.03.09', 'Tratamento \"in situ\" com ligantes hidráulicos e/ou pozolânicos, numa espessura de 0,30 m.', 'm2'),
(81, '01.04.03.10', 'Em material granular não britado (seixo), com 0,15 m de espessura.', 'm2'),
(82, '01.04.03.11', 'Em material granular não britado (seixo), com 0,20 m de espessura.', 'm2'),
(83, '01.04.03.12', 'Em material granular britado, com 0,15 m de espessura.', 'm2'),
(84, '01.04.03.13', 'Em material granular britado, com 0,20 m de espessura.', 'm2'),
(85, '01.04.04', 'Em escavações ou perfis mistos em rocha:', ''),
(86, '01.04.04.01', 'Limpeza e/ou saneamento, para posterior regularização da plataforma com material pétreo, numa espessura média de 0,15 m.', 'm2'),
(87, '01.04.04.02', 'Limpeza e/ou saneamento, para posterior regularização da plataforma com material pétreo, numa espessura média de 0,25 m.', 'm2'),
(88, '01.04.04.03', 'Regularização da plataforma com material pétreo, numa espessura média de 0,15 m.', 'm2'),
(89, '01.04.04.04', 'Regularização da plataforma com material pétreo, numa espessura média de 0,25 m.', 'm2'),
(90, '01.04.05', 'Geossintéticos em leitos do pavimento, incluindo fornecimento e  colocação:', ''),
(91, '01.04.05.01', 'Geotêxteis.', 'm2'),
(92, '01.04.05.02', 'Geogrelhas.', 'm2'),
(93, '01.05', 'Trabalhos em condições particulares:', ''),
(94, '01.05.01', 'Escavação nas bermas e/ou separador para alargamento do pavimento (abertura de caixa), incluindo transporte dos produtos escavados e sua colocação em vazadouro, e eventual indemnização por depósito, na espessura definida no projeto.', 'm2'),
(95, '01.05.02', 'Preparação de taludes de aterro para posterior alargamento, de acordo com desenho de pormenor, incluindo carga, transporte e colocação em vazadouro dos produtos da limpeza, e eventual indemnização por depósito.', 'm3'),
(96, '01.05.03', 'Limpeza, regularização e reperfilamento de valetas, incluindo carga, transporte e colocação em vazadouro dos produtos sobrantes, e eventual indemnização por depósito.', 'm'),
(97, '01.05.04', 'Limpeza das linhas de água (ribeiras ou outras), incluindo carga, transporte e colocação em vazadouro dos produtos sobrantes, e eventual indemnização por depósito.', 'm'),
(98, '01.05.05', 'Limpeza do interior de passagens hidráulicas existentes, incluindo carga, transporte e colocação em vazadouro dos produtos sobrantes, e eventual indemnização por depósito.', 'm'),
(99, '01.05.06', 'Limpeza, regularização e reperfilamento de plataformas existentes, incluindo carga, transporte e colocação em vazadouro dos produtos sobrantes, e eventual indemnização por depósito.', 'm'),
(100, '01.05.07', 'Limpeza, regularização e reperfilamento de bermas existentes, incluindo eventuais enchimentos e compactação, carga, transporte e colocação em vazadouro dos produtos sobrantes, e eventual indemnização por depósito.', 'm2'),
(101, '01.05.08', 'Limpeza e regularização de taludes existentes, incluindo desmatação, carga, transporte e colocação dos produtos em vazadouro, e eventual indemnização por depósito.', 'm2'),
(102, '01.05.09', 'Execução de valas para intersecção de raízes de árvores, incluindo enchimento de acordo com o definido no projeto', 'm'),
(103, '01.05.10', 'Corte de árvores em zonas de alargamentos, incluindo desenraizamento, enchimento de acordo com o definido no projeto, e transporte, colocação em vazadouro dos produtos sobrantes e eventual indemnização por depósito.', 'un'),
(104, '01.05.11', 'Enrocamento de protecção do talude adjacente a PH (passagem hidráulica) ou LAS (linha de água à superfície)', 'm3'),
(105, '01.06', 'Trabalhos complementares:', ''),
(106, '01.06.01', 'Máscara drenante.', 'm3'),
(107, '01.06.02', 'Esporão drenante.', 'm3'),
(108, '01.06.03', 'Drenos sub-horizontais em taludes.', 'm'),
(109, '01.07', 'Outros Trabalhos:', ''),
(110, '02', 'Drenagem', ''),
(111, '02.01', 'Escavação, em trabalhos realizados para garantia da continuidade do sistema de águas superficiais, incluindo remoção, reposição e compactação, condução a vazadouro dos produtos sobrantes, e eventuais indemnizações por depósito:', ''),
(112, '02.01.01', 'Para abertura de valas destinadas à regularização, retificação ou desvio de linhas de água, nomeadamente as contíguas às passagens hidráulicas, e valas longitudinais de grande secção:', ''),
(113, '02.01.01.01', 'Em terreno brando.', 'm3'),
(114, '02.01.01.02', 'Em terreno duro.', 'm3'),
(115, '02.01.01.03', 'Em terreno compacto (rocha).', 'm3'),
(116, '02.01.02', 'Para reperfilamento de valetas ou valas existentes, em terreno de qualquer natureza.', 'm'),
(117, '02.02', 'Execução de passagens hidráulicas de secção circular, em betão, incluindo todos os trabalhos necessários à sua implantação, nomeadamente, a escavação em terreno de qualquer natureza, a remoção, reposição e compactação, condução a vazadouro dos remoção, reposição e compactação, condução a vazadouro d', ''),
(118, '02.02.01', 'Com tubagens da classe I:', ''),
(119, '02.02.01.01', 'Assentamento do tipo A, simples com diâmetro de 0,40 m.', 'm'),
(120, '02.02.01.02', 'Assentamento do tipo A, simples com diâmetro de 0,50 m.', 'm'),
(121, '02.02.01.03', 'Assentamento do tipo A, simples com diâmetro de 0,60 m.', 'm'),
(122, '02.02.01.04', 'Assentamento do tipo B, simples com diâmetro de 0,40 m.', 'm'),
(123, '02.02.01.05', 'Assentamento do tipo B, simples com diâmetro de 0,50 m.', 'm'),
(124, '02.02.01.06', 'Assentamento do tipo B, simples com diâmetro de 0,60 m.', 'm'),
(125, '02.02.02', 'Com tubagens da classe II:', ''),
(126, '02.02.02.01', 'Assentamento do tipo A, simples com diâmetro de 0,80 m.', 'm'),
(127, '02.02.02.02', 'Assentamento do tipo A, duplas com diâmetros de 0,80 m.', 'm'),
(128, '02.02.02.03', 'Assentamento do tipo A, simples com diâmetro de 1,00 m.', 'm'),
(129, '02.02.02.04', 'Assentamento do tipo A, duplas com diâmetros de 1,00 m.', 'm'),
(130, '02.02.02.05', 'Assentamento do tipo A, simples com diâmetro de 1,20 m.', 'm'),
(131, '02.02.02.06', 'Assentamento do tipo A, duplas com diâmetros de 1,20 m.', 'm'),
(132, '02.02.02.07', 'Assentamento do tipo A, triplas com diâmetros de 1,20 m.', 'm'),
(133, '02.02.02.08', 'Assentamento do tipo A, simples com diâmetro de 1,50 m.', 'm'),
(134, '02.02.02.09', 'Assentamento do tipo A, duplas com diâmetros de 1,50 m.', 'm'),
(135, '02.02.02.10', 'Assentamento do tipo A, triplas com diâmetros de 1,50 m.', 'm'),
(136, '02.02.02.11', 'Assentamento do tipo B, simples com diâmetro de 0,80 m.', 'm'),
(137, '02.02.02.12', 'Assentamento do tipo B, duplas com diâmetros de 0,80 m.', 'm'),
(138, '02.02.02.13', 'Assentamento do tipo B, simples com diâmetro de 1,00 m.', 'm'),
(139, '02.02.02.14', 'Assentamento do tipo B, duplas com diâmetros de 1,00 m.', 'm'),
(140, '02.02.02.15', 'Assentamento do tipo B, simples com diâmetro de 1,20 m.', 'm'),
(141, '02.02.02.16', 'Assentamento do tipo B, duplas com diâmetro de 1,20 m.', 'm'),
(142, '02.02.02.17', 'Assentamento do tipo B, triplas com diâmetros de 1,20 m.', 'm'),
(143, '02.02.02.18', 'Assentamento do tipo B, simples com diâmetro de 1,50 m.', 'm'),
(144, '02.02.02.19', 'Assentamento do tipo B, duplas com diâmetros de 1,50 m.', 'm'),
(145, '02.02.02.20', 'Assentamento do tipo B, triplas com diâmetros de 1,50 m.', 'm'),
(146, '02.02.03', 'Com tubagens da classe III:', ''),
(147, '02.02.03.01', 'Assentamento do tipo A, simples com diâmetro de 0,80 m.', 'm'),
(148, '02.02.03.02', 'Assentamento do tipo A, duplas com diâmetros de 0,80 m.', 'm'),
(149, '02.02.03.03', 'Assentamento do tipo A, simples com diâmetro de 1,00 m.', 'm'),
(150, '02.02.03.04', 'Assentamento do tipo A, duplas com diâmetros de 1,00 m.', 'm'),
(151, '02.02.03.05', 'Assentamento do tipo A, simples com diâmetro de 1,20 m.', 'm'),
(152, '02.02.03.06', 'Assentamento do tipo A, duplas com diâmetros de 1,20 m.', 'm'),
(153, '02.02.03.07', 'Assentamento do tipo A, triplas com diâmetros de 1,20 m.', 'm'),
(154, '02.02.03.08', 'Assentamento do tipo A, simples com diâmetro de 1,50 m.', 'm'),
(155, '02.02.03.09', 'Assentamento do tipo A, duplas com diâmetros de 1,50 m.', 'm'),
(156, '02.02.03.10', 'Assentamento do tipo A, triplas com diâmetros de 1,50 m.', 'm'),
(157, '02.02.03.11', 'Assentamento do tipo B, simples com diâmetro de 0,80 m.', 'm'),
(158, '02.02.03.12', 'Assentamento do tipo B, duplas com diâmetros de 0,80 m.', 'm'),
(159, '02.02.03.13', 'Assentamento do tipo B, simples com diâmetro de 1,00 m.', 'm'),
(160, '02.02.03.14', 'Assentamento do tipo B, duplas com diâmetros de 1,00 m.', 'm'),
(161, '02.02.03.15', 'Assentamento do tipo B, simples com diâmetro de 1,20 m.', 'm'),
(162, '02.02.03.16', 'Assentamento do tipo B, duplas com diâmetro de 1,20 m.', 'm'),
(163, '02.02.03.17', 'Assentamento do tipo B, triplas com diâmetros de 1,20 m.', 'm'),
(164, '02.02.03.18', 'Assentamento do tipo B, simples com diâmetro de 1,50 m.', 'm'),
(165, '02.02.03.19', 'Assentamento do tipo B, duplas com diâmetros de 1,50 m.', 'm'),
(166, '02.02.03.20', 'Assentamento do tipo B, triplas com diâmetros de 1,50 m.', 'm'),
(167, '02.02.04', 'Com tubagens da classe IV:', ''),
(168, '02.02.04.01', 'Assentamento do tipo A, simples com diâmetro de 0,80 m.', 'm'),
(169, '02.02.04.02', 'Assentamento do tipo A, duplas com diâmetros de 0,80 m.', 'm'),
(170, '02.02.04.03', 'Assentamento do tipo A, simples com diâmetro de 1,00 m.', 'm'),
(171, '02.02.04.04', 'Assentamento do tipo A, duplas com diâmetros de 1,00 m.', 'm'),
(172, '02.02.04.05', 'Assentamento do tipo A, simples com diâmetro de 1,20 m.', 'm'),
(173, '02.02.04.06', 'Assentamento do tipo A, duplas com diâmetros de 1,20 m.', 'm'),
(174, '02.02.04.07', 'Assentamento do tipo A, triplas com diâmetros de 1,20 m.', 'm'),
(175, '02.02.04.08', 'Assentamento do tipo A, simples com diâmetro de 1,50 m.', 'm'),
(176, '02.02.04.09', 'Assentamento do tipo A, duplas com diâmetros de 1,50 m.', 'm'),
(177, '02.02.04.10', 'Assentamento do tipo A, triplas com diâmetros de 1,50 m.', 'm'),
(178, '02.02.04.11', 'Assentamento do tipo A, simples com diâmetro de 2,00 m.', 'm'),
(179, '02.02.04.12', 'Assentamento do tipo A, duplas com diâmetros de 2,00 m.', 'm'),
(180, '02.02.04.13', 'Assentamento do tipo A, simples com diâmetro de 2,50 m.', 'm'),
(181, '02.02.04.14', 'Assentamento do tipo A, duplas com diâmetros de 2,50 m.', 'm'),
(182, '02.02.04.15', 'Assentamento do tipo B, simples com diâmetro de 0,80 m.', 'm'),
(183, '02.02.04.16', 'Assentamento do tipo B, duplas com diâmetros de 0,80 m.', 'm'),
(184, '02.02.04.17', 'Assentamento do tipo B, simples com diâmetro de 1,00 m.', 'm'),
(185, '02.02.04.18', 'Assentamento do tipo B, duplas com diâmetros de 1,00 m.', 'm'),
(186, '02.02.04.19', 'Assentamento do tipo B, simples com diâmetro de 1,20 m.', 'm'),
(187, '02.02.04.20', 'Assentamento do tipo B, duplas com diâmetros de 1,20 m.', 'm'),
(188, '02.02.04.21', 'Assentamento do tipo B, triplas com diâmetros de 1,20 m.', 'm'),
(189, '02.02.04.22', 'Assentamento do tipo B, simples com diâmetro de 1,50 m.', 'm'),
(190, '02.02.04.23', 'Assentamento do tipo B, duplas com diâmetros de 1,50 m.', 'm'),
(191, '02.02.04.24', 'Assentamento do tipo B, triplas com diâmetros de 1,50 m.', 'm'),
(192, '02.02.04.25', 'Assentamento do tipo B, simples com diâmetro de 2,00 m.', 'm'),
(193, '02.02.04.26', 'Assentamento do tipo B, duplas com diâmetros de 2,00 m.', 'm'),
(194, '02.02.04.27', 'Assentamento do tipo B, simples com diâmetro de 2,50 m.', 'm'),
(195, '02.02.04.28', 'Assentamento do tipo B, duplas com diâmetros de 2,50 m.', 'm'),
(196, '02.03', 'Execução de passagens hidráulicas de secção circular ou outra, metálicas, constituídas por painéis de chapa de aço ondulada ou sistema equivalente, incluindo todos os trabalhos necessários à sua implantação, nomeadamente, a escavação em terreno de qualquer natureza, a remoção, reposição e compactaçã', ''),
(197, '02.03.01', 'Simples com diâmetro ou altura inferior ou igual a 1,00 m.', 'm'),
(198, '02.03.02', 'Duplas com diâmetros ou altura inferior ou igual a 1,00 m.', 'm'),
(199, '02.03.03', 'Triplas com diâmetros ou altura inferior ou igual a 1,00 m.', 'm'),
(200, '02.03.04', 'Simples com diâmetro ou altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'm'),
(201, '02.03.05', 'Duplas com diâmetro ou altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'm'),
(202, '02.03.06', 'Triplas com diâmetros ou altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'm'),
(203, '02.03.07', 'Simples com diâmetro ou altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'm'),
(204, '02.03.08', 'Duplas com diâmetros ou altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'm'),
(205, '02.03.09', 'Triplas com diâmetros ou altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'm'),
(206, '02.04', 'Execução de passagens hidráulicas de secção circular ou outra, constituídas por alvenaria de pedra argamassada, incluindo todos os trabalhos necessários à sua implantação, nomeadamente, a escavação em terreno de qualquer natureza, a remoção, reposição e compactação, condução a vazadouro dos produtos', ''),
(207, '02.04.01', 'Simples com altura inferior ou igual a 1,00 m.', 'm'),
(208, '02.04.02', 'Duplas com altura inferior ou igual a 1,00 m.', 'm'),
(209, '02.04.03', 'Triplas com altura inferior ou igual a 1,00 m.', 'm'),
(210, '02.04.04', 'Simples com altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'm'),
(211, '02.04.05', 'Duplas com altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'm'),
(212, '02.04.06', 'Triplas com altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'm'),
(213, '02.04.07', 'Simples com altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'm'),
(214, '02.04.08', 'Duplas com altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'm'),
(215, '02.04.09', 'Triplas com altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'm'),
(216, '02.05', 'Execução de passagens hidráulicas de secção rectangular ou outra, em betão armado, todos os trabalhos necessários à sua implantação, nomeadamente, a escavação em terreno de qualquer natureza, a remoção, reposição e compactação, condução a vazadouro dos produtos sobrantes, e eventuais indemnizações p', ''),
(217, '02.05.01', 'Simples com altura inferior ou igual a 1,00 m.', 'm'),
(218, '02.05.02', 'Duplas com altura inferior ou igual a 1,00 m.', 'm'),
(219, '02.05.03', 'Triplas com altura inferior ou igual a 1,00 m.', 'm'),
(220, '02.05.04', 'Simples com altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'm'),
(221, '02.05.05', 'Duplas com altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'm'),
(222, '02.05.06', 'Triplas com altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'm'),
(223, '02.05.07', 'Simples com altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'm'),
(224, '02.05.08', 'Duplas com altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'm'),
(225, '02.05.09', 'Triplas com altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'm'),
(226, '02.06', 'Execução de bocas em passagens hidráulicas de secção circular ou outra, incluindo todos os trabalhos necessários, e ainda, para a sua implantação, a escavação em terreno de qualquer natureza, a remoção, reposição e compactação, condução a vazadouro dos produtos sobrantes, e eventuais indemnizações p', ''),
(227, '02.06.01', 'Bocas na base de aterro:', ''),
(228, '02.06.01.01', 'Para passagens hidráulicas em betão, simples, para diâmetro inferior ou igual a 0,60 m.', 'un'),
(229, '02.06.01.02', 'Para passagens hidráulicas em betão, simples, para diâmetro superior a 0,60 m e inferior ou igual a 1,00 m.', 'un'),
(230, '02.06.01.03', 'Para passagens hidráulicas em betão, duplas, para diâmetros superiores a 0,60 m e inferiores ou iguais a 1,00m.', 'un'),
(231, '02.06.01.04', 'Para passagens hidráulicas em betão, simples, para diâmetro superior a 1,00 m e inferior ou igual a 1,50 m.', 'un'),
(232, '02.06.01.05', 'Para passagens hidráulicas em betão, duplas, para diâmetros superiores a 1,00 m e inferiores ou iguais a 1,50m.', 'un'),
(233, '02.06.01.06', 'Para passagens hidráulicas em betão, triplas, para diâmetros superiores a 1,00 m e inferiores ou iguais a 1,50 m.', 'un'),
(234, '02.06.01.07', 'Para passagens hidráulicas em betão, simples, para diâmetro superior a 1,50 m e inferior ou igual a 2,50 m.', 'un'),
(235, '02.06.01.08', 'Para passagens hidráulicas em betão, duplas, para diâmetros superiores a 1,50 m e inferiores ou iguais a 2,50m.', 'un'),
(236, '02.06.01.09', 'Para passagens hidráulicas metálicas, simples, com diâmetro ou altura inferior ou igual a 1,00 m.', 'un'),
(237, '02.06.01.10', 'Para passagens hidráulicas metálicas, duplas, com diâmetros ou altura inferior ou igual a 1,00 m.', 'un'),
(238, '02.06.01.11', 'Para passagens hidráulicas metálicas, triplas, com diâmetros ou altura inferior ou igual a 1,00 m.', 'un'),
(239, '02.06.01.12', 'Para passagens hidráulicas metálicas, simples, com diâmetro ou altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'un'),
(240, '02.06.01.13', 'Para passagens hidráulicas metálicas, duplas, com diâmetros ou altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'un'),
(241, '02.06.01.14', 'Para passagens hidráulicas metálicas, triplas, com diâmetros ou altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'un'),
(242, '02.06.01.15', 'Para passagens hidráulicas metálicas, simples, com diâmetro ou altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'un'),
(243, '02.06.01.16', 'Para passagens hidráulicas metálicas, duplas, com diâmetros ou altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'un'),
(244, '02.06.01.17', 'Para passagens hidráulicas metálicas, triplas com diâmetros ou altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'un'),
(245, '02.06.01.18', 'Para passagens hidráulicas em alvenaria de pedra argamassada, simples,  para diâmetro inferior ou igual a 0,60 m.', 'un'),
(246, '02.06.01.19', 'Para passagens hidráulicas em alvenaria de pedra argamassada, simples, para diâmetro superior a 0,60 m e inferior ou igual a 1,00 m.', 'un'),
(247, '02.06.01.20', 'Para passagens hidráulicas em alvenaria de pedra argamassada, duplas, para diâmetros superiores a 0,60 m e inferiores ou iguais a 1,00m.', 'un'),
(248, '02.06.01.21', 'Para passagens hidráulicas em alvenaria de pedra argamassada, simples, para diâmetro superior a 1,00 m e inferior ou igual a 1,50 m.', 'un'),
(249, '02.06.01.22', 'Para passagens hidráulicas em alvenaria de pedra argamassada, duplas, para diâmetros superiores a 1,00 m e inferiores ou iguais a 1,50m.', 'un'),
(250, '02.06.01.23', 'Para passagens hidráulicas em alvenaria de pedra argamassada, triplas, para diâmetros superiores a 1,00 m e inferiores ou iguais a 1,50 m.', 'un'),
(251, '02.06.01.24', 'Para passagens hidráulicas em alvenaria de pedra argamassada, simples, para diâmetro superior a 1,50 m e inferior ou igual a 2,50 m.', 'un'),
(252, '02.06.01.25', 'Para passagens hidráulicas em alvenaria de pedra argamassada, duplas, para diâmetros superiores a 1,50 m e inferiores ou iguais a 2,50m.', 'un'),
(253, '02.06.02', 'Bocas em talude de aterro:', ''),
(254, '02.06.02.01', 'Para passagens hidráulicas em betão, simples, para diâmetro inferior ou igual a 0,60 m.', 'un'),
(255, '02.06.02.02', 'Para passagens hidráulicas em betão, simples, para diâmetro superior a 0,60 m e inferior ou igual a 1,00 m.', 'un'),
(256, '02.06.02.03', 'Para passagens hidráulicas metálicas, simples, com diâmetro ou altura inferior ou igual a 1,00 m.', 'un'),
(257, '02.06.02.04', 'Para passagens hidráulicas em alvenaria de pedra argamassada, simples, para diâmetro inferior ou igual a 0,60 m.', 'un'),
(258, '02.06.02.05', 'Para passagens hidráulicas em alvenaria de pedra argamassada, simples, superior a 0,60 m e inferior ou igual a 1,00 m.', 'un'),
(259, '02.06.03', 'Bocas em escavação ou recipiente:', ''),
(260, '02.06.03.01', 'Com altura inferior ou igual 2,50 m, simples, para diâmetro ou altura inferior ou igual a 0,60 m.', 'un'),
(261, '02.06.03.02', 'Com altura inferior ou igual 2,50 m, duplas, para diâmetros ou altura inferior ou igual a 0,60 m.', 'un'),
(262, '02.06.03.03', 'Com altura inferior ou igual 2,50 m, triplas, para diâmetros ou altura inferior ou igual a 0,60 m.', 'un'),
(263, '02.06.03.04', 'Com altura inferior ou igual 2,50 m, simples, para diâmetro ou altura superior a 0,60 m e inferior ou igual a 1,00 m.', 'un'),
(264, '02.06.03.05', 'Com altura inferior ou igual 2,50 m, duplas, para diâmetros ou altura superior a 0,60 m e inferior ou igual a 1,00 m.', 'un'),
(265, '02.06.03.06', 'Com altura inferior ou igual 2,50 m, triplas, para diâmetros ou altura superior a 0,60 m e inferior ou igual a 1,00 m.', 'un'),
(266, '02.06.03.07', 'Com altura inferior ou igual 2,50 m, simples, para diâmetro ou altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'un'),
(267, '02.06.03.08', 'Com altura inferior ou igual 2,50 m, duplas, para diâmetros ou altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'un'),
(268, '02.06.03.09', 'Com altura inferior ou igual 2,50 m, triplas, para diâmetros ou altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'un'),
(269, '02.06.03.10', 'Com altura inferior ou igual 2,50 m, simples, para diâmetro ou altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'un'),
(270, '02.06.03.11', 'Com altura inferior ou igual 2,50 m, duplas, para diâmetros ou altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'un'),
(271, '02.06.03.12', 'Com altura inferior ou igual 2,50 m, triplas, para diâmetros ou altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'un'),
(272, '02.06.03.13', 'Com altura superior a 2,50 m e inferior ou igual a 4,00 m, simples, para diâmetro ou altura superior a 0,60 m e inferior ou igual a 1,00 m.', 'un'),
(273, '02.06.03.14', 'Com altura superior a 2,50 m e inferior ou igual a 4,00 m, duplas, para diâmetros ou altura superior a 0,60 m e inferior ou igual a 1,00 m.', 'un'),
(274, '02.06.03.15', 'Com altura superior a 2,50 m e inferior ou igual a 4,00 m, triplas, para diâmetros ou altura superior a 0,60 m e inferior ou igual a 1,00 m.', 'un'),
(275, '02.06.03.16', 'Com altura superior a 2,50 m e inferior ou igual a 4,00 m, simples, para diâmetro ou altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'un'),
(276, '02.06.03.17', 'Com altura superior a 2,50 m e inferior ou igual a 4,00 m, duplas, para diâmetros ou altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'un'),
(277, '02.06.03.18', 'Com altura superior a 2,50 m e inferior ou igual a 4,00 m, triplas, para diâmetros ou altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'un'),
(278, '02.06.03.19', 'Com altura superior a 2,50 m e inferior ou igual a 4,00 m, simples, para diâmetro ou altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'un'),
(279, '02.06.03.20', 'Com altura superior a 2,50 m e inferior ou igual a 4,00 m, duplas, para diâmetros ou altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'un'),
(280, '02.06.03.21', 'Com altura superior a 2,50 m e inferior ou igual a 4,00 m, triplas, para diâmetros ou altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'un'),
(281, '02.06.03.22', 'Com altura superior a 4,00 m, simples, para diâmetro ou altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'un'),
(282, '02.06.03.23', 'Com altura superior a 4,00 m, duplas, para diâmetros ou altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'un'),
(283, '02.06.03.24', 'Com altura superior 4,00 m, triplas, para diâmetros ou altura superior a 1,00 m e inferior ou igual a 1,50 m.', 'un'),
(284, '02.06.03.25', 'Com altura superior a 4,00 m, simples, para diâmetro ou altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'un'),
(285, '02.06.03.26', 'Com altura superior a 4,00 m, duplas, para diâmetros ou altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'un'),
(286, '02.06.03.27', 'Com altura superior a 4,00 m, triplas, para diâmetros ou altura superior a 1,50 m e inferior ou igual a 2,50 m.', 'un'),
(287, '02.07', 'Execução de orgãos de drenagem longitudinal, incluindo todos os trabalhos necessários, e ainda, para a sua implantação, a escavação em terreno de qualquer natureza, a remoção, reposição e compactação, condução a vazadouro dos produtos sobrantes, e eventuais indemnizações por depósito:', ''),
(288, '02.07.01', 'Valetas e valas:', ''),
(289, '02.07.01.01', 'Valetas de plataforma (laterais), não revestidas de secção triangular.', 'm'),
(290, '02.07.01.02', 'Valetas de plataforma (laterais), não revestidas de secção trapezoidal.', 'm'),
(291, '02.07.01.03', 'Valetas de plataforma (laterais), de fundo revestido com betão, de secção triangular.', 'm'),
(292, '02.07.01.04', 'Valetas de plataforma (laterais), de fundo revestido com betão, de secção trapezoidal.', 'm'),
(293, '02.07.01.05', 'Valetas de plataforma (laterais), revestidas com betão, de secção triangular ou trapezoidal, com abertura inferior ou igual a 1,20 m.', 'm'),
(294, '02.07.01.06', 'Valetas de plataforma (laterais), revestidas com betão, de secção triangular ou trapezoidal com abertura superior a 1,20 m.', 'm'),
(295, '02.07.01.07', 'Valetas de plataforma (laterais), revestidas com  betão, de secção semicircular de diâmetro igual a 0,40 m.', 'm'),
(296, '02.07.01.08', 'Valetas de plataforma (laterais), revestidas a pedra, de secção triangular ou outra.', 'm'),
(297, '02.07.01.09', 'Valetas de plataforma (laterais), não revestidas de secção reduzida.', 'm'),
(298, '02.07.01.10', 'Valetas de plataforma (em separador), de secção triangular ou outra, com abertura inferior ou igual a 1,20 m.', 'm'),
(299, '02.07.01.11', 'Valetas de plataforma (em separador), de secção triangular, com abertura superior a 1,20 m.', 'm'),
(300, '02.07.01.12', 'Valetas de bordadura de aterros, revestidas com betão, de secção triangular ou trapezoidal.', 'm'),
(301, '02.07.01.13', 'Valetas de bordadura de aterros, revestidas com betão, de secção semicircular de diâmetro igual a 0,20 m.', 'm'),
(302, '02.07.01.14', 'Valetas de bordadura de aterros, revestidas com betão, de secção semicircular de diâmetro igual a 0,30 m.', 'm'),
(303, '02.07.01.15', 'Valetas de bordadura de aterros, revestidas com betão, de secção semicircular de diâmetro igual a 0,40 m.', 'm'),
(304, '02.07.01.16', 'Valetas de bordadura de aterros, revestidas a pedra, de secção triangular ou outra.', 'm'),
(305, '02.07.01.17', 'Valetas de banqueta não revestidas.', 'm'),
(306, '02.07.01.18', 'Valetas de banqueta revestidas com betão, de secção triangular ou trapezoidal, com abertura inferior ou igual a 0,50 m.', 'm'),
(307, '02.07.01.19', 'Valetas de banqueta revestidas com betão, de secção triangular ou trapezoidal, com abertura superior a 0,50 m.', 'm'),
(308, '02.07.01.20', 'Valetas de banqueta revestidas com betão, de secção semicircular de diâmetro igual a 0,30m.', 'm'),
(309, '02.07.01.21', 'Valetas de banqueta revestidas com betão, de secção semicircular, de diâmetro igual a 0,40 m.', 'm'),
(310, '02.07.01.22', 'Valetas de banqueta revestidas com betão, de secção semicircular, de diâmetro igual a 0,50 m.', 'm'),
(311, '02.07.01.23', 'Valas de crista de talude não revestidas.', 'm'),
(312, '02.07.01.24', 'Valas de crista de talude revestidas com betão, de secção triangular ou trapezoidal, com abertura inferior ou igual a 0,50 m.', 'm'),
(313, '02.07.01.25', 'Valas de crista de talude revestidas com betão, de secção triangular ou trapezoidal, com abertura superior a 0,50 m.', 'm'),
(314, '02.07.01.26', 'Valas de crista de talude revestidas com betão, de secção semicircular, de diâmetro igual a 0,40 m.', 'm'),
(315, '02.07.01.27', 'Valas de crista de talude revestidas com betão, de secção semicircular, de diâmetro igual a 0,50 m.', 'm'),
(316, '02.07.01.28', 'Valas de crista de talude revestidas com betão, de secção semicircular, de diâmetro igual a 0,60 m.', 'm'),
(317, '02.07.01.29', 'Valas de pé de talude não revestidas.', 'm'),
(318, '02.07.01.30', 'Valas de pé de talude de fundo revestido com betão de secção triangular.', 'm'),
(319, '02.07.01.31', 'Valas de pé de talude revestidas com betão.', 'm'),
(320, '02.07.01.32', 'Valas de pé de talude revestidas com enrocamento.', 'm'),
(321, '02.07.01.33', 'Valas de pé de talude revestidas com enrocamento argamassado ou com betão ciclópico pobre.', 'm'),
(322, '02.07.01.34', 'Valas de pé de talude revestidas com betão, de secção semicircular, de diâmetro igual a 0,50 m.', 'm'),
(323, '02.07.01.35', 'Valas de pé de talude revestidas com betão, de secção semicircular, de diâmetro igual a 0,60 m.', 'm'),
(324, '02.07.02', 'Drenagem longitudinal do separador:', ''),
(325, '02.07.02.01', 'Caleira/sumidouro em betão, com rasgo superior em contínuo e com colector incorporado, com diâmetro igual a 0,25 m.', 'm'),
(326, '02.07.02.02', 'Caleira/sumidouro em betão, com rasgo superior em contínuo e com colector incorporado, com diâmetro igual a 0,30 m.', 'm'),
(327, '02.07.02.03', 'Caleira/sumidouro em betão, com rasgo superior em contínuo e com colector incorporado, com diâmetro igual a 0,40 m.', 'm'),
(328, '02.07.02.04', 'Caleira com grelha metálica.', 'm'),
(329, '02.07.03', 'Drenos de plataforma (longitudinais e transversais):', ''),
(330, '02.07.03.01', 'Drenos de plataforma, longitudinais, de rebaixamento de níveis freáticos com altura inferior ou igual a 1,20 m.', 'm'),
(331, '02.07.03.02', 'Drenos de plataforma, longitudinais, de rebaixamento de níveis freáticos, com altura superior a 1,20 m.', 'm'),
(332, '02.07.03.03', 'Drenos de plataforma, longitudinais, de interceção, com altura inferior ou igual a 1,20 m.', 'm'),
(333, '02.07.03.04', 'Drenos de plataforma, longitudinais, de interceção, com altura superior a 1,20 m.', 'm'),
(334, '02.07.03.05', 'Drenos de plataforma, longitudinais, tipo \"écran drenante\" em elementos prefabricados, sem colector, incluindo saídas.', 'm'),
(335, '02.07.03.06', 'Drenos de plataforma, longitudinais, tipo \"écran drenante\" em elementos prefabricados, com colector, incluindo saídas.', 'm'),
(336, '02.07.03.07', 'Drenos de plataforma, longitudinais, tipo \"écran drenante\" em material granular envolvido em geotêxtil, sem colector, incluindo saídas.', 'm'),
(337, '02.07.03.08', 'Drenos de plataforma, longitudinais, tipo \"écran drenante\" em material granular envolvido em geotêxtil, com colector, incluindo saídas.', 'm'),
(338, '02.07.03.09', 'Drenos de plataforma transversais - Drenos.', 'm'),
(339, '02.07.03.10', 'Drenos de plataforma transversais - Camadas drenantes.', 'm2'),
(340, '02.07.04', 'Colectores, longitudinais e de evacuação lateral:', ''),
(341, '02.07.04.01', 'Com diâmetro igual a 0,20 m.', 'm'),
(342, '02.07.04.02', 'Com diâmetro igual a 0,30 m.', 'm'),
(343, '02.07.04.03', 'Com diâmetro igual a 0,40 m.', 'm'),
(344, '02.07.04.04', 'Com diâmetro igual a 0,50 m.', 'm'),
(345, '02.07.04.05', 'Com diâmetro igual a 0,60 m.', 'm'),
(346, '02.07.04.06', 'Com diâmetro igual a 0,80 m.', 'm'),
(347, '02.07.04.07', 'Com diâmetro igual a 1,00 m.', 'm'),
(348, '02.07.04.08', 'Com diâmetro igual a 1,20 m.', 'm'),
(349, '02.08', 'Execução de orgãos complementares de drenagem, incluindo todos os trabalhos necessários, e ainda, para a sua implantação, a escavação em terreno de qualquer natureza, a remoção, reposição e compactação, condução a vazadouro dos produtos sobrantes, e eventuais indemnizações por depósito:', ''),
(350, '02.08.01', 'Caixas de visita/sumidouros em colectores:', ''),
(351, '02.08.01.01', 'Com diâmetro inscrito igual a 1,00 m, com altura inferior ou igual a 2,50 m.', 'un'),
(352, '02.08.01.02', 'Com diâmetro inscrito igual a 1,00 m, com altura superior a 2,50 m e inferior ou igual a 4,00 m.', 'un'),
(353, '02.08.01.03', 'Com diâmetro inscrito igual a 1,00 m, com altura superior a 4,00 m.', 'un'),
(354, '02.08.01.04', 'Com diâmetro inscrito igual a 1,20 m, com altura inferior ou igual a 2,50 m.', 'un'),
(355, '02.08.01.05', 'Com diâmetro inscrito igual a 1,20 m, com altura superior a 2,50 m e inferior ou igual a 4,00 m.', 'un'),
(356, '02.08.01.06', 'Com diâmetro inscrito igual a 1,20 m, com altura superior a 4,00 m.', 'un'),
(357, '02.08.01.07', 'Com diâmetro inscrito superior a 1,20 m, com altura inferior ou igual a 2,50 m.', 'un'),
(358, '02.08.01.08', 'Com diâmetro inscrito superior a 1,20 m, com altura superior a 2,50 m e inferior ou igual a 4,00 m.', 'un'),
(359, '02.08.01.09', 'Com diâmetro inscrito superior a 1,20 m, com altura superior a 4,00 m.', 'un'),
(360, '02.08.02', 'Caixas de queda:', ''),
(361, '02.08.02.01', 'Com diâmetro inscrito igual a 1,00 m, com altura inferior ou igual a 2,50 m.', 'un'),
(362, '02.08.02.02', 'Com diâmetro inscrito igual a 1,00 m, com altura superior a 2,50 m e inferior ou igual a 4,00 m.', 'un'),
(363, '02.08.02.03', 'Com diâmetro inscrito igual a 1,00 m, com altura superior a 4,00 m.', 'un'),
(364, '02.08.02.04', 'Com diâmetro inscrito igual a 1,20 m, com altura inferior ou igual a 2,50 m.', 'un'),
(365, '02.08.02.05', 'Com diâmetro inscrito igual a 1,20 m, com altura superior a 2,50 m e inferior ou igual a 4,00 m.', 'un'),
(366, '02.08.02.06', 'Com diâmetro inscrito igual a 1,20 m, com altura superior a 4,00 m.', 'un'),
(367, '02.08.02.07', 'Com diâmetro inscrito superior a 1,20 m, com altura inferior ou igual a 2,50 m.', 'un'),
(368, '02.08.02.08', 'Com diâmetro inscrito superior a 1,20 m, com altura superior a 2,50 m e inferior ou igual a 4,00 m.', 'un'),
(369, '02.08.02.09', 'Com diâmetro inscrito superior a 1,20 m, com altura superior a 4,00 m.', 'un'),
(370, '02.08.03', 'Sumidouros e Sarjetas:', ''),
(371, '02.08.03.01', 'Sumidouro junto a lancil ou a separador elevado, com grelha.', 'un'),
(372, '02.08.03.02', 'Sarjetas.', 'un'),
(373, '02.08.04', 'Caixas de limpeza e/ou de evacuação lateral em caleiras longitudinais:', ''),
(374, '02.08.04.01', 'Com altura inferior ou igual a 1,00 m.', 'un'),
(375, '02.08.04.02', 'Com altura superior a 1,00 m.', 'un'),
(376, '02.08.05', 'Caixas  de receção, de ligação ou de derivação:', ''),
(377, '02.08.05.01', 'Em valas de crista.', 'un'),
(378, '02.08.05.02', 'Em valetas de banqueta.', 'un'),
(379, '02.08.05.03', 'Em valetas de plataforma para ligação às descidas de talude.', 'un'),
(380, '02.08.05.04', 'Em valetas de bordadura de aterros.', 'un'),
(381, '02.08.05.05', 'Em valas de pé de talude.', 'un'),
(382, '02.08.06', 'Bacias de dissipação:', ''),
(383, '02.08.06.01', 'Em betão.', 'un'),
(384, '02.08.06.02', 'Em enrocamento.', 'un'),
(385, '02.08.07', 'Dissipadores de energia em descidas de taludes:', ''),
(386, '02.08.07.01', 'Intercalados em descidas de talude em aterro ou escavação.', 'un'),
(387, '02.08.07.02', 'No final de descidas de talude em aterro.', 'un'),
(388, '02.08.08', 'Descidas de talude, em aterro ou escavação, revestidas com betão:', ''),
(389, '02.08.08.01', 'De secção triangular ou trapezoidal com abertura inferior ou igual a 0,50 m.', 'm'),
(390, '02.08.08.02', 'De secção triangular ou trapezoidal com abertura superior a 0.50 m.', 'm'),
(391, '02.08.08.03', 'De secção semicircular de diâmetro igual a 0,30 m.', 'm'),
(392, '02.08.08.04', 'De secção semicircular de diâmetro igual a 0,40 m.', 'm'),
(393, '02.08.08.05', 'De secção semicircular de diâmetro igual a 0,50 m.', 'm'),
(394, '02.08.08.06', 'De secção semicircular de diâmetro igual a 0,60 m.', 'm'),
(395, '02.09', 'Execução de orgãos ou trabalhos acessórios no sistema de drenagem, incluindo todos os trabalhos necessários, e ainda, para a sua implantação, a escavação em terreno de qualquer natureza, a remoção, reposição e compactação, condução a vazadouro dos produtos sobrantes, e eventuais indemnizações por de', ''),
(396, '02.09.01', 'Passagens hidráulicas em caminhos paralelos e para continuidade de valetas sob serventias:', ''),
(397, '02.09.01.01', 'Galgáveis.', 'un'),
(398, '02.09.01.02', 'Não galgáveis.', 'un'),
(399, '02.09.01.03', 'Para continuidade de valetas sob serventias, com valetas e laje em betão.', 'm'),
(400, '02.09.01.04', 'Para continuidade de valetas sob serventias, com manilhas de diâmetro igual a 0,30 m e revestimento superior com betão.', 'm'),
(401, '02.09.01.05', 'Para continuidade de valetas sob serventias, com manilhas de diâmetro igual a 0,40 m e revestimento superior com betão.', 'm'),
(402, '02.09.02', 'Revestimento de valas de grande secção:', ''),
(403, '02.09.02.01', 'Em enrocamento.', 'm2'),
(404, '02.09.02.02', 'Em enrocamento argamassado.', 'm2'),
(405, '02.09.02.03', 'Em betão armado.', 'm3'),
(406, '02.09.02.04', 'Em betão simples.', 'm3'),
(407, '02.09.02.05', 'Em betão ciclópico pobre.', 'm3'),
(408, '02.09.02.06', 'Em colchões de gabiões.', 'm3'),
(409, '02.09.02.07', 'Em colchões de gabiões com malha plastificada.', 'm3'),
(410, '02.09.03', 'Limpeza de aquedutos existentes.', 'm'),
(411, '02.09.04', 'Demolição de elementos do sistema de drenagem existente:', ''),
(412, '02.09.04.01', 'Aquedutos.', 'm'),
(413, '02.09.04.02', 'Bocas na base de aterro.', 'un'),
(414, '02.09.04.03', 'Bocas em talude de aterro.', 'un'),
(415, '02.09.04.04', 'Bocas em escavação ou recipiente.', 'un'),
(416, '02.09.04.05', 'Valetas e valas revestidas.', 'm'),
(417, '02.09.04.06', 'Caixas de visita ou queda.', 'un'),
(418, '02.09.04.07', 'Sumidouros, sarjetas, caixas de receção, ligação ou derivação.', 'un'),
(419, '02.09.04.08', 'Bacias de dissipação.', 'm2'),
(420, '02.09.04.09', 'Dissipadores de energia.', 'un'),
(421, '02.10', 'Reparação/reconstrução de orgãos de drenagem:', ''),
(422, '02.10.01', 'Reparação de valetas:', ''),
(423, '02.10.01.01', 'De plataforma, ilhéus e separadores.', 'm'),
(424, '02.10.01.02', 'De banqueta, de crista e pé de talude, incluindo caleiras de descida de talude.', 'm'),
(425, '02.10.02', 'Reparação de outros orgãos de drenagem:', ''),
(426, '02.10.02.01', 'Limpeza e desobstrução de drenos e colectores, incluindo todos os orgãos de receção e derivação.', 'm'),
(427, '02.10.02.02', 'Limpeza de orgãos de drenagem em serventias.', 'm'),
(428, '02.10.02.03', 'Limpeza de dissipadores de energia.', 'un'),
(429, '02.10.02.04', 'Limpeza de bocas em aterro ou escavação, caixas de visita ou de queda.', 'un'),
(430, '02.10.02.05', 'Limpeza e reparação de bacias de decantação.', 'un'),
(431, '02.10.03', 'Reconstrução de orgãos de drenagem:', ''),
(432, '02.10.03.01', 'Valetas de plataforma e de bordadura de aterros revestidas com betão, de secção triangular ou trapezoidal, com abertura inferior ou igual a 1,20m.', 'm'),
(433, '02.10.03.02', 'Valetas de plataforma e de bordadura de aterros revestidas com betão, de secção triangular ou trapezoidal, com abertura maior que 1,20m.', 'm'),
(434, '02.10.03.03', 'Valetas de plataforma, banquetas, crista e pé de talude, revestidas com betão, de secção semicircular, com abertura inferior a 0,40m.', 'm'),
(435, '02.10.03.04', 'Valetas de plataforma, banquetas, crista e pé de talude, revestidas com betão, de secção semicircular, com abertura igual ou superior a 0,40 m.', 'm'),
(436, '02.10.03.05', 'Caixas de visitas, de queda, de limpeza e evacuação lateral, de receção/ligação, ou derivação, bacias de dissipação e dissipadores de energia.', 'un'),
(437, '02.10.03.06', 'Caleiras/sumidouros.', 'un'),
(438, '02.10.03.07', 'Passagens hidráulicas em betão.', 'un'),
(439, '02.10.03.08', 'Passagens hidráulicas em alvenaria.', 'un'),
(440, '02.10.03.09', 'Passagens hidráulicas metálicas.', 'un'),
(441, '02.10.03.10', 'Levantamento/rebaixamento de caixas de visita existentes', 'un'),
(442, '02.11', 'Outros Trabalhos:', ''),
(443, '03', 'Pavimentação', ''),
(444, '03.01', 'Camadas em materiais granulares:', ''),
(445, '03.01.01', 'Com características de sub-base:', ''),
(446, '03.01.01.01', 'Em solos selecionados, com 0,15 m de espessura.', 'm2'),
(447, '03.01.01.02', 'Em solos selecionados, com 0,20 m de espessura.', 'm2'),
(448, '03.01.01.03', 'Em solos selecionados, com 0,25 m de espessura.', 'm2'),
(449, '03.01.01.04', 'Em solos selecionados, com 0,30 m de espessura.', 'm2'),
(450, '03.01.01.05', 'Em agregado não britado (material aluvionar), com 0,15 m de espessura.', 'm2'),
(451, '03.01.01.06', 'Em agregado não britado (material aluvionar), com 0,20 m de espessura.', 'm2'),
(452, '03.01.01.07', 'Em agregado não britado (material aluvionar), com 0,25 m de espessura.', 'm2'),
(453, '03.01.01.08', 'Em agregado não britado (material aluvionar), com 0,30 m de espessura.', 'm2'),
(454, '03.01.01.09', 'Em agregado não britado (material aluvionar), no reperfilamento da superfície do leito do pavimento no extradorso das curvas com sobre-elevação.', 'm2'),
(455, '03.01.01.10', 'Em  agregado  britado de  granulometria extensa, com 0,12 m de espessura.', 'm2'),
(456, '03.01.01.11', 'Em  agregado  britado de  granulometria extensa, com 0,15 m de espessura.', 'm2'),
(457, '03.01.01.12', 'Em  agregado  britado de  granulometria extensa, com 0,20 m de espessura.', 'm2'),
(458, '03.01.01.13', 'Em  agregado  britado de  granulometria extensa, com 0,25 m de espessura.', 'm2'),
(459, '03.01.01.14', 'Em  agregado  britado de  granulometria extensa, com 0,30 m de espessura.', 'm2'),
(460, '03.01.01.15', 'Em  agregado  britado de  granulometria extensa, no reperfilamento da superfície do leito do pavimento no extradorso das curvas com sobre-elevação.', 'm3'),
(461, '03.01.02', 'Com características de base:', ''),
(462, '03.01.02.01', 'Em agregado britado de granulometria extensa, com 0,15 m de espessura.', 'm2'),
(463, '03.01.02.02', 'Em agregado britado de granulometria extensa, com 0,20 m de espessura.', 'm2');
INSERT INTO `tbl_orcamentoitens` (`id_orc`, `cod`, `descr`, `und`) VALUES
(464, '03.01.02.03', 'Em agregado britado de granulometria extensa, com 0,25 m de espessura.', 'm2'),
(465, '03.01.02.04', 'Em agregado britado de granulometria extensa, com 0,30 m de espessura.', 'm2'),
(466, '03.01.02.05', 'Em agregado britado de granulometria extensa, misturado em central, com 0,12 m de espessura.', 'm2'),
(467, '03.01.02.06', 'Em agregado britado de granulometria extensa, misturado em central, com 0,15 m de espessura.', 'm2'),
(468, '03.01.02.07', 'Em agregado britado de granulometria extensa, misturado em central, com 0,20 m de espessura.', 'm2'),
(469, '03.01.02.08', 'Em agregado britado de granulometria extensa, misturado em central, com 0,25 m de espessura.', 'm2'),
(470, '03.01.03', 'Com características de regularização:', ''),
(471, '03.01.03.01', 'Em areia para assentamento de blocos de pedra ou betão, com 0,02 m de espessura.', 'm2'),
(472, '03.01.03.02', 'Em areia para assentamento de blocos de pedra ou betão, com 0,03 m de espessura.', 'm2'),
(473, '03.01.03.03', 'Em areia para assentamento de blocos de pedra ou betão, com 0,05 m de espessura.', 'm2'),
(474, '03.01.03.04', 'Em areia para assentamento de blocos de pedra ou betão, com 0,10 m de espessura.', 'm2'),
(475, '03.01.04', 'Com características de regularização, no enchimento de bermas:', ''),
(476, '03.01.04.01', 'Em agregado britado de granulometria extensa.', 'm3'),
(477, '03.01.04.02', 'Em material drenante com agregado britado.', 'm3'),
(478, '03.01.04.03', 'Em solos.', 'm3'),
(479, '03.01.04.04', 'Em agregado não britado.', 'm3'),
(480, '03.01.05', 'Com características de desgaste em camadas traficadas não revestidas:', ''),
(481, '03.01.05.01', 'Em solos selecionados com 0,20 m de espessura.', 'm2'),
(482, '03.01.05.02', 'Em agregado não britado com 0,15 m de espessura.', 'm2'),
(483, '03.01.05.03', 'Em agregado britado com 0,15 m de espessura.', 'm2'),
(484, '03.02', 'Camadas em misturas betuminosas a quente:', ''),
(485, '03.02.01', 'Com características de regularização:', ''),
(486, '03.02.01.01', 'Em mistura betuminosa densa.', 'ton'),
(487, '03.02.01.02', 'Em betão betuminoso.', 'ton'),
(488, '03.02.01.03', 'Em argamassa betuminosa.', 'ton'),
(489, '03.02.02', 'Com características de ligação:', ''),
(490, '03.02.02.01', 'Em semi-penetração betuminosa, com 0,08 m de espessura e 4 kg/m2 de betume.', 'm2'),
(491, '03.02.02.02', 'Em semi-penetração betuminosa, com 0,10 m de espessura e 5 kg/m2 de betume.', 'm2'),
(492, '03.02.02.03', 'Em mistura betuminosa densa, com 0,04 m de espessura.', 'm2'),
(493, '03.02.02.04', 'Em mistura betuminosa densa, com 0,05 m de espessura.', 'm2'),
(494, '03.02.02.05', 'Em mistura betuminosa densa, com 0,06 m de espessura.', 'm2'),
(495, '03.02.02.06', 'Em mistura betuminosa densa, com 0,07 m de espessura.', 'm2'),
(496, '03.02.02.07', 'Em betão betuminoso , com 0,03 m de espessura.', 'm2'),
(497, '03.02.02.08', 'Em betão betuminoso , com 0,04 m de espessura.', 'm2'),
(498, '03.02.02.09', 'Em betão betuminoso , com 0,05 m de espessura.', 'm2'),
(499, '03.02.02.10', 'Em betão betuminoso , com 0,06 m de espessura.', 'm2'),
(500, '03.02.02.11', 'Em mistura betuminosa densa, para tapagem de covas.', 'ton'),
(501, '03.02.02.12', 'Em argamassa betuminosa, com 0,015 m de espessura.', 'm2'),
(502, '03.02.02.13', 'Em argamassa betuminosa, com 0,02 m de espessura.', 'm2'),
(503, '03.02.02.14', 'Em argamassa betuminosa, com 0,025 m de espessura.', 'm2'),
(504, '03.02.02.15', 'Em argamassa betuminosa, com 0,03 m de espessura.', 'm2'),
(505, '03.02.02.16', 'Na regularização e/ou reperfilamento de pavimentos existentes (espessura variável), com mistura betuminosa densa.', 'ton'),
(506, '03.02.02.17', 'Na regularização e/ou reperfilamento de pavimentos existentes (espessura variável), com argamassa betuminosa.', 'ton'),
(507, '03.02.03', 'Com características de desgaste, na faixa de rodagem:', ''),
(508, '03.02.03.01', 'Em betão betuminoso, com 0,03 m de espessura.', 'm2'),
(509, '03.02.03.02', 'Em betão betuminoso, com 0,04 m de espessura.', ''),
(510, '03.02.03.03', 'Em betão betuminoso, com 0,05 m de espessura.', 'm2'),
(511, '03.02.03.04', 'Em betão betuminoso, com 0,06 m de espessura.', 'm2'),
(512, '03.02.03.05', 'Em argamassa betuminosa, com 0,015 m de espessura.', 'm2'),
(513, '03.02.03.06', 'Em argamassa betuminosa, com 0,02 m de espessura.', 'm2'),
(514, '03.02.03.07', 'Em argamassa betuminosa, com 0,025 m de espessura.', 'm2'),
(515, '03.02.03.08', 'Em argamassa betuminosa, com 0,03 m de espessura.', 'm2'),
(516, '03.02.03.09', 'Em mistura betuminosa com gravilhas duras incrustadas, com 0,05 m de espessura.', 'm2'),
(517, '03.02.03.10', 'Em mistura betuminosa com gravilhas duras incrustadas, com 0,06 m de espessura.', 'm2'),
(518, '03.02.03.11', 'Em betão betuminoso, sobre pavimentos existentes, aplicado em camada única, com função de regularização e/ou reperfilamento, e desgaste.', 'ton'),
(519, '03.02.04', 'Com características de desgaste, em bermas:', ''),
(520, '03.02.04.01', 'Em betão betuminoso, com 0,03 m de espessura.', 'm2'),
(521, '03.02.04.02', 'Em betão betuminoso, com 0,04 m de espessura.', 'm2'),
(522, '03.02.04.03', 'Em betão betuminoso, com 0,05 m de espessura.', 'm2'),
(523, '03.02.04.04', 'Em betão betuminoso, com 0,06 m de espessura.', 'm2'),
(524, '03.02.04.05', 'Em mistura betuminosa densa, com 0,04 m de espessura.', 'm2'),
(525, '03.02.04.06', 'Em mistura betuminosa densa, com 0,05 m de espessura.', 'm2'),
(526, '03.02.04.07', 'Em mistura betuminosa densa, com 0,06 m de espessura.', 'm2'),
(527, '03.02.04.08', 'Em mistura betuminosa densa, com 0,07 m de espessura.', 'm2'),
(528, '03.02.04.09', 'Em argamassa betuminosa, com 0,015 m de espessura.', 'm2'),
(529, '03.02.04.10', 'Em argamassa betuminosa, com 0,02 m de espessura.', 'm2'),
(530, '03.02.04.11', 'Em argamassa betuminosa, com 0,025 m de espessura.', 'm2'),
(531, '03.02.04.12', 'Em argamassa betuminosa, com 0,03 m de espessura.', 'm2'),
(532, '03.03', 'Camadas em misturas betuminosas a frio:', ''),
(533, '03.03.01', 'Com características de regularização:', ''),
(534, '03.03.01.01', 'Em agregado britado de granulometria extensa, tratado com emulsão betuminosa.', 'ton'),
(535, '03.03.01.02', 'Em mistura betuminosa aberta a frio.', 'ton'),
(536, '03.03.02', 'Com características de base:', ''),
(537, '03.03.02.01', 'Em agregado britado de granulometria extensa, tratado com emulsão betuminosa, com 0,08 m de espessura.', 'm2'),
(538, '03.03.02.02', 'Em agregado britado de granulometria extensa, tratado com emulsão betuminosa, com 0,10 m de espessura.', 'm2'),
(539, '03.03.02.03', 'Em agregado britado de granulometria extensa, tratado com emulsão betuminosa, com 0,12 m de espessura.', 'm2'),
(540, '03.03.02.04', 'Em agregado britado de granulometria extensa, tratado com emulsão betuminosa, com 0,14 m de espessura.', 'm2'),
(541, '03.03.02.05', 'Em mistura betuminosa aberta a frio, com 0,05 m de espessura.', 'm2'),
(542, '03.03.02.06', 'Em mistura betuminosa aberta a frio, com 0,06 m de espessura.', 'm2'),
(543, '03.03.02.07', 'Em mistura betuminosa aberta a frio, com 0,08 m de espessura.', 'm2'),
(544, '03.03.02.08', 'Em mistura betuminosa aberta a frio, com 0,10 m de espessura.', 'm2'),
(545, '03.03.03', 'Com características de ligação:', ''),
(546, '03.03.03.01', 'Em agregado britado de granulometria extensa, tratado com emulsão betuminosa, com 0,08 m de espessura.', 'm2'),
(547, '03.03.03.02', 'Em agregado britado de granulometria extensa, tratado com emulsão betuminosa, com 0,10 m de espessura.', 'm2'),
(548, '03.03.03.03', 'Em agregado britado de granulometria extensa, tratado com emulsão betuminosa, com 0,12 m de espessura.', 'm2'),
(549, '03.03.03.04', 'Em agregado britado de granulometria extensa, tratado com emulsão betuminosa, com 0,14 m de espessura.', 'm2'),
(550, '03.03.03.05', 'Em mistura betuminosa aberta a frio, com 0,05 m de espessura.', 'm2'),
(551, '03.03.03.06', 'Em mistura betuminosa aberta a frio, com 0,06 m de espessura.', 'm2'),
(552, '03.03.03.07', 'Em mistura betuminosa aberta a frio, com 0,08 m de espessura.', 'm2'),
(553, '03.03.03.08', 'Em mistura betuminosa aberta a frio, com 0,10 m de espessura.', 'm2'),
(554, '03.03.03.09', 'Em mistura betuminosa aberta a frio, para tapagem de covas.', 'ton'),
(555, '03.03.04', 'Com características de regularização no reperfilamento de pavimentos existentes (espessura variável):', ''),
(556, '03.03.04.01', 'Em agregado britado de granulometria extensa, tratado com emulsão betuminosa.', 'ton'),
(557, '03.03.04.02', 'Em mistura betuminosa aberta a frio.', 'ton'),
(558, '03.03.05', 'Com características de regularização no enchimento de bermas:', ''),
(559, '03.03.05.01', 'Em agregado britado de granulometria extensa tratado com emulsão betuminosa.', 'ton'),
(560, '03.03.05.02', 'Em mistura betuminosa aberta a frio.', 'ton'),
(561, '03.04', 'Camadas de desgaste em blocos de pedra:', ''),
(562, '03.04.01', 'Em calçada à portuguesa.', 'm2'),
(563, '03.04.02', 'Em calçada de paralelepípedos.', 'm2'),
(564, '03.04.03', 'Em empedramento.', 'm2'),
(565, '03.05', 'Camadas de desgaste em lajetas ou blocos de betão de cimento.', 'm2'),
(566, '03.06', 'Tratamentos superficiais:', ''),
(567, '03.06.01', 'Na faixa de rodagem:', ''),
(568, '03.06.01.01', 'Em microaglomerado betuminoso a frio, simples.', 'm2'),
(569, '03.06.01.02', 'Em microaglomerado betuminoso a frio, duplo.', 'm2'),
(570, '03.06.01.03', 'Em lama asfáltica (slurry seal), simples.', 'm2'),
(571, '03.06.01.04', 'Em lama asfáltica (slurry seal), duplo.', 'm2'),
(572, '03.06.01.05', 'Em revestimento superficial, simples.', 'm2'),
(573, '03.06.01.06', 'Em revestimento superficial, duplo.', 'm2'),
(574, '03.06.01.07', 'Em revestimento superficial, simples com duas aplicações de agregado.', 'm2'),
(575, '03.06.02', 'Em bermas:', ''),
(576, '03.06.02.01', 'Em lama asfáltica (slurry seal), simples.', 'm2'),
(577, '03.06.02.02', 'Em lama asfáltica (slurry seal), duplo.', 'm2'),
(578, '03.06.02.03', 'Em revestimento superficial, simples.', 'm2'),
(579, '03.06.02.04', 'Em revestimento superficial, duplo.', 'm2'),
(580, '03.06.02.05', 'Em revestimento superficial, simples com duas aplicações de agregado.', 'm2'),
(581, '03.07', 'Regas betuminosas de impregnação, colagem ou cura:', ''),
(582, '03.07.01', 'Rega de impregnação betuminosa:', ''),
(583, '03.07.01.01', 'Com emulsão betuminosa.', 'm2'),
(584, '03.07.01.02', 'Com betume fluidificado (cut-back).', 'm2'),
(585, '03.07.02', 'Rega de colagem:', ''),
(586, '03.07.02.01', 'Com emulsão betuminosa.', 'm2'),
(587, '03.07.02.02', 'Com betume fluidificado (cut-back).', 'm2'),
(588, '03.07.02.03', 'Com emulsão modificada.', 'm2'),
(589, '03.07.03', 'Rega de cura:', ''),
(590, '03.07.03.01', 'Com emulsão betuminosa.', 'm2'),
(591, '03.07.03.02', 'Com betume fluidificado.', 'm2'),
(592, '03.08', 'Trabalhos especiais de pavimentação:', ''),
(593, '03.08.01', 'Colocação de argamassa de cimento para refechamento das juntas de união de blocos de pedra, ou blocos ou lajetas em betão de cimento.', 'm2'),
(594, '03.08.010', 'Reposição de pavimentos com as características dos existentes, designadamente em zonas de abertura de valas para instalação de redes de serviços públicos ou outros:', ''),
(595, '03.08.02', 'Execução de uma linha de água à superfície:', ''),
(596, '03.08.02.01', 'Em betão de cimento  C25/30 (B30).', 'm3'),
(597, '03.08.02.02', 'Em betão de cimento C20/25 (B25).', 'm3'),
(598, '03.08.02.03', 'Rede de aço.', 'm2'),
(599, '03.08.03', 'Fresagem e/ou remoção de camadas de pavimentos existentes, incluindo limpeza, carga, transporte e colocação em vazadouro e eventual indeminização por depósito:', ''),
(600, '03.08.03.01', 'Em misturas betuminosas, em profundidades inferiores a 5 cm.', 'm2'),
(601, '03.08.03.02', 'Em misturas betuminosas, em profundidades entre 5 e 10 cm.', 'm2'),
(602, '03.08.03.03', 'Em misturas betuminosas, em profundidades superiores a 10 cm.', 'm2'),
(603, '03.08.03.04', 'Em pedra de calçada à portuguesa, incluindo a camada de areia para assentamento dos blocos.', 'm2'),
(604, '03.08.03.05', 'Em pedra de calçada paralelepípedo, incluindo a camada de areia para assentamento dos blocos.', 'm2'),
(605, '03.08.03.06', 'Em empedrado, incluindo a camada de areia para assentamento dos blocos.', 'm2'),
(606, '03.08.03.07', 'Em lajetas ou blocos de betão de cimento.', 'm2'),
(607, '03.08.03.08', 'Em betão de cimento de uma linha de água à superfície, incluindo a rede de aço', ''),
(608, '03.08.04', 'Fresagem e/ou remoção de camadas de pavimentos existentes, incluindo limpeza, carga, transporte para depósito provisório para posterior reutilização, e eventual indeminização por depósito:', 'm2'),
(609, '03.08.04.01', 'Em misturas betuminosas, em profundidades inferiores a 5 cm.', 'm2'),
(610, '03.08.04.02', 'Em misturas betuminosas, em profundidades entre 5 e 10 cm.', 'm2'),
(611, '03.08.04.03', 'Em misturas betuminosas, em profundidades superiores a 10 cm.', 'm2'),
(612, '03.08.04.04', 'Em pedra de calçada à portuguesa, incluindo a camada de areia para assentamento dos blocos.', 'm2'),
(613, '03.08.04.05', 'Em pedra de calçada paralelepípedo, incluindo a camada de areia para assentamento dos blocos.', 'm2'),
(614, '03.08.04.06', 'Em empedrado, incluindo a camada de areia para assentamento dos blocos.', 'm2'),
(615, '03.08.04.07', 'Em lajetas ou blocos de betão de cimento.', 'm2'),
(616, '03.08.04.08', 'Em betão de cimento de uma linha de água à superfície, incluindo a rede de aço.', 'm2'),
(617, '03.08.05', 'Saneamentos de pavimentos existentes, incluindo escavação, remoção e transporte a vazadouro dos produtos escavados, eventual indemnização por depósito, e o preenchimento de acordo com o definido no projeto.', 'm3'),
(618, '03.08.06', 'Regularização e recompactação de fundo de caixa.', 'm2'),
(619, '03.08.07', 'Enchimento em agregado britado de granulometria extensa, para regularização e/ou reperfilamento de pavimentos existentes.', 'm3'),
(620, '03.08.08', 'Selagem ou elemento retardador da propagação de fissuras em pavimentos degradados:', ''),
(621, '03.08.08.01', 'Com misturas betuminosas.', 'm2'),
(622, '03.08.08.02', 'Com revestimentos superficiais.', 'm2'),
(623, '03.08.08.03', 'Com slurry-seal.', 'm2'),
(624, '03.08.08.04', 'Com microaglomerado a frio.', 'm2'),
(625, '03.08.08.05', 'Com geotêxtil impregnado.', 'm2'),
(626, '03.08.08.06', 'Argamassa betuminosa.', 'm2'),
(627, '03.08.08.07', 'Com mástiques betuminosos.', 'm'),
(628, '03.08.09', 'Reparação de juntas ou de fendas em pavimentos de cimento em linhas de água à superfície:', ''),
(629, '03.08.09.01', 'Remoção dos produtos de enchimento.', 'm'),
(630, '03.08.09.02', 'Reparação dos bordos.', 'm'),
(631, '03.08.09.03', 'Selagem com mástiques betuminosos.', 'm'),
(632, '03.08.10.01', 'Em pavimentos betuminosos.', 'm2'),
(633, '03.08.10.02', 'Em calçada à portuguesa.', 'm2'),
(634, '03.08.10.03', 'Em calçada em paralelepípedos.', 'm2'),
(635, '03.08.10.04', 'Em empedrado.', 'm2'),
(636, '03.08.10.05', 'Em lajetas ou blocos de betão de cimento.', 'm2'),
(637, '03.08.10.06', 'Em betão de cimento em linhas de água à superfície, incluindo rede de aço.', 'm2'),
(638, '03.08.11', 'Pavimentação de passeios, separadores ou ilhas direcionais, incluindo fundação:', ''),
(639, '03.08.11.01', 'Em betonilha.', 'm2'),
(640, '03.08.11.02', 'Em calçada à portuguesa.', 'm2'),
(641, '03.08.11.03', 'Em calçada em paralelepípedos.', 'm2'),
(642, '03.08.11.04', 'Em empedrado.', 'm2'),
(643, '03.08.11.05', 'Em lajetas ou blocos de betão.', 'm2'),
(644, '03.08.12', 'Remoção de pavimentos existentes, incluindo fundação e lancis, carga, transporte e colocação em vazadouro dos produtos sobrantes e eventual indemnização por depósito:', ''),
(645, '03.08.12.01', 'Em pavimentos betuminosos.', 'm2'),
(646, '03.08.12.02', 'Em pavimentos rígidos.', 'm2'),
(647, '03.08.12.03', 'Em calçada.', 'm2'),
(648, '03.08.12.04', 'Em passeios e separadores.', 'm2'),
(649, '03.08.12.05', 'Em lajetas ou blocos de betão.', 'm2'),
(650, '03.08.13', 'Enchimento e regularização de bermas em solos selecionados.', 'm3'),
(651, '03.08.14', 'Ranhuragem transversal para melhoramento das condições de drenagem superficial, com a profundidade e largura definida no projeto:', ''),
(652, '03.08.14.01', 'Em camadas de misturas betuminosas', 'm'),
(653, '03.08.14.02', 'Em pavimentos em betão de cimento', 'm'),
(654, '03.09', 'Outros Trabalhos:', ''),
(655, '04', 'Obras acessórias', ''),
(656, '04.01', 'Integração paisagística e medidas minimizadoras:', ''),
(657, '04.01.01', 'Integração paisagística/revestimento vegetal:', ''),
(658, '04.01.01.01', 'Escavação de terra vegetal em empréstimo, incluindo eventual indemnização.', 'm3'),
(659, '04.01.01.02', 'Colocação de terra vegetal, reutilizando os produtos da decapagem previamente armazenados (01.01.06) e/ou provenientes de empréstimo (04.01.01.01), incluindo todos os trabalhos necessários, designadamente a carga, transporte e espalhamento, em revestimento de taludes.', 'm2'),
(660, '04.01.01.03', 'Colocação de terra vegetal, reutilizando os produtos da decapagem previamente armazenados (01.01.05) e/ou provenientes de empréstimo (04.01.01.01), incluindo todos os trabalhos necessários, designadamente a carga, transporte e espalhamento, em separadores e ilhas direcionais.', 'm2'),
(661, '04.01.01.04', 'Colocação de terra vegetal, reutilizando os produtos da decapagem previamente armazenados (01.01.05) e/ou provenientes de empréstimo (04.01.01.01), incluindo todos os trabalhos necessários, designadamente a carga, transporte e espalhamento, nas áreas interiores aos ramos dos nós.', 'm2'),
(662, '04.01.01.05', 'Colocação de terra vegetal, reutilizando os produtos da decapagem previamente armazenados (01.01.05) e/ou provenientes de empréstimo (04.01.01.01), incluindo todos os trabalhos necessários, designadamente a carga, transporte e espalhamento, em outras áreas confinantes com a estrada, conforme definid', 'm2'),
(663, '04.01.01.06', 'Sementeira manual, incluindo o fornecimento das espécies, a preparação e adubação do solo, e trabalhos no período de garantia.', 'm2'),
(664, '04.01.01.07', 'Sementeira por hidrossementeira, incluindo o fornecimento das espécies, a preparação e adubação do solo, e trabalhos no período de garantia.', 'm2'),
(665, '04.01.01.08', 'Sementeiras - Aditivos diversos, incluindo o fornecimento das espécies, preparação e a adubação do solo, e trabalhos no período de garantia.', 'm2'),
(666, '04.01.01.09', 'Sementeiras - Esteiras vegetais, rede ou materiais equivalentes, incluindo o fornecimento das espécies, preparação e a adubação do solo, e trabalhos no período de garantia.', 'm2'),
(667, '04.01.01.10', 'Plantação de árvores, incluindo o fornecimento das espécies, a abertura e enchimento de covas, a adubação, a tutoragem, a retancha, a manutenção e as regas.', 'un'),
(668, '04.01.01.11', 'Plantação de arbustos, incluindo o fornecimento das espécies, a abertura e enchimento de covas, a adubação, a tutoragem, a retancha, a manutenção e as regas.', 'un'),
(669, '04.01.01.12', 'Plantação de herbáceas de revestimento, incluindo o fornecimento das espécies, a abertura e enchimento de covas, a adubação, a tutoragem, a retancha, a manutenção e as regas.', 'un'),
(670, '04.01.01.13', 'Rede de rega - Abertura e tapamento de valas, incluindo a abertura de valas, tubos, válvulas, aspersores e microaspersores e demais acessórios necessários.', 'm'),
(671, '04.01.01.14', 'Rede de rega - Fornecimento e instalação de tubos, incluindo a abertura de valas e demais acessórios necessários.', 'm'),
(672, '04.01.01.15', 'Transplante de espécies existentes, incluindo todos os trabalhos complementares - Árvores.', 'un'),
(673, '04.01.01.16', 'Transplante de espécies existentes, incluindo todos os trabalhos complementares - Arbustos.', 'un'),
(674, '04.01.02', 'Medidas minimizadoras:', ''),
(675, '04.01.02.01', 'Barreiras acústicas em betão, incluindo o fornecimento e a colocação de todos os equipamentos, estruturas de suporte, acessórios e materiais necessários, e ainda todos os trabalhos para a sua implantação, e execução das fundações.', 'm2'),
(676, '04.01.02.02', 'Barreiras acústicas em madeira, incluindo o fornecimento e a colocação de todos os equipamentos, estruturas de suporte, acessórios e materiais necessários, e ainda todos os trabalhos para a sua implantação, e execução das fundações.', 'm2'),
(677, '04.01.02.03', 'Barreiras acústicas metálicas, incluindo o fornecimento e a colocação de todos os equipamentos, estruturas de suporte, acessórios e materiais necessários, e ainda todos os trabalhos para a sua implantação, e execução das fundações.', 'm2'),
(678, '04.01.02.04', 'Barreiras acústicas em vidro, incluindo o fornecimento e a colocação de todos os equipamentos, estruturas de suporte, acessórios e materiais necessários, e ainda todos os trabalhos para a sua implantação, e execução das fundações.', 'm2'),
(679, '04.01.02.05', 'Barreiras acústicas em materiais à base de policarbonatos ou outros materiais sintéticos, incluindo o fornecimento e a colocação de todos os equipamentos, estruturas de suporte, acessórios e materiais necessários, e ainda todos os trabalhos para a sua implantação, e execução das fundações.', 'm2'),
(680, '04.01.02.06', 'Bacias de retenção/decantação.', 'm2'),
(681, '04.02', 'Execução da vedação física e caminhos paralelos, incluindo todos os trabalhos, equipamentos e acessórios necessários e o fornecimento e colocação de todos os materiais:', ''),
(682, '04.02.01', 'Vedações:', ''),
(683, '04.02.01.01', 'Com postes de madeira, em rede de malha variável do tipo cerca de caça.', 'm'),
(684, '04.02.01.02', 'Com postes metálicos, em rede de malha variável do tipo cerca de caça.', 'm'),
(685, '04.02.01.03', 'Com postes metálicos, em rede de malha constante, plastificada.', 'm'),
(686, '04.02.02', 'Portões e passagens:', '--'),
(687, '04.02.02.01', 'Em madeira.', 'un'),
(688, '04.02.02.02', 'Metálicos.', 'un'),
(689, '04.02.03', 'Caminhos paralelos, incluindo terraplenagem, valetas de plataforma e regularização de taludes.', 'm'),
(690, '04.03', 'Obras de contenção (muros de suporte, espera ou vedação, paredes, pregagens e ancoragens) e de revestimento de taludes e canais, incluindo fornecimento e colocação de todos os materiais necessários:', ''),
(691, '04.03.01', 'Fundações:', ''),
(692, '04.03.01.01', 'Escavação, em terreno brando, para abertura de fundações de muros e paredes, incluindo entivação, escoramento, bombagem e esgoto de eventuais águas afluentes, carga, transporte e espalhamento em vazadouro dos produtos sobrantes, aterro e eventual indemnização por depósito.', 'm3'),
(693, '04.03.01.02', 'Escavação, em terreno duro, para abertura de fundações de muros e paredes, incluindo entivação, escoramento, bombagem e esgoto de eventuais águas afluentes, carga, transporte e espalhamento em vazadouro dos produtos sobrantes, aterro e eventual indemnização por depósito.', 'm3'),
(694, '04.03.01.03', 'Escavação, em terreno compacto (rocha), para abertura de fundações de muros e paredes, incluindo entivação, escoramento, bombagem e esgoto de eventuais águas afluentes, carga, transporte e espalhamento em vazadouro dos produtos sobrantes, aterro e eventual indemnização por depósito.', 'm3'),
(695, '04.03.01.04', 'Execução de ensecadeiras para construção de fundações.', 'm2'),
(696, '04.03.02', 'Execução ou reparação de muros, ou revestimento de taludes e canais, incluindo cofragens, cavaletes, escoramentos necessários e colocação dos dispositivos de drenagem no tardoz:', ''),
(697, '04.03.02.01', 'Em enrocamento ou alvenaria de pedra.', 'm3'),
(698, '04.03.02.02', 'Em enrocamento ou alvenaria de pedra argamassada.', 'm3'),
(699, '04.03.02.03', 'Em betão ciclópico.', 'm3'),
(700, '04.03.02.04', 'Em betão armado.', 'm3'),
(701, '04.03.02.05', 'Em gabiões com arame normal.', 'm3'),
(702, '04.03.02.06', 'Em gabiões com arame revestido a PVC.', 'm3'),
(703, '04.03.02.07', 'Em colchões de rede metálica preenchidos com material rochoso, em arame normal.', 'm3'),
(704, '04.03.02.08', 'Em colchões de rede metálica preenchidos com material rochoso, em arame revestido a PVC.', 'm3'),
(705, '04.03.02.09', 'Em rede de proteção contra a queda de pedras.', 'm2'),
(706, '04.03.02.10', 'Em solos reforçados do tipo \"terra armada\" ou equivalente.', 'm2'),
(707, '04.03.02.11', 'Em solos reforçados do tipo \"terra armada\" com paramento em gabiões.', 'm2'),
(708, '04.03.02.12', 'Em solos reforçados do tipo \"terra armada\" com geotêxteis.', 'm2'),
(709, '04.03.02.13', 'Em solos reforçados do tipo \"terra armada\" com geogrelhas ou geomalhas.', 'm2'),
(710, '04.03.02.14', 'Tipo Crib-Wall ou equivalente.', 'm3'),
(711, '04.03.03', 'Reparação de muros de pedra seca, incluindo nivelamento e revestimento com argamassa de cimento.', 'm3'),
(712, '04.03.04', 'Reparação de juntas de muros.', 'm3'),
(713, '04.03.05', 'Colocação de betão de cimento no coroamento dos muros.', 'm3'),
(714, '04.03.06', 'Execução de paredes para ancorar ou pregar, incluindo regularização prévia do talude, cofragens, escoramentos e colocação de todos os dispositivos de drenagem no tardoz:', ''),
(715, '04.03.06.01', 'Em betão armado (incluindo armaduras).', 'm2'),
(716, '04.03.06.02', 'Em betão projetado, aplicado em camadas com espessura mínima de 5 cm.', 'm2'),
(717, '04.03.06.03', 'Em betão projetado, aplicado em camadas com espessura mínima de 5 cm, com uma rede de malha electrossoldada ou armadura equivalente.', 'm2'),
(718, '04.03.06.04', 'Idem, com duas malhas.', 'm2'),
(719, '04.03.06.05', 'Idem, com três malhas.', 'm2'),
(720, '04.03.06.06', 'Em betão projetado com armadura de montagem tradicional.', 'm2'),
(721, '04.03.07', 'Pregagens, incluindo furação, colocação, posicionadores, selagem e todos os trabalhos necessários:', ''),
(722, '04.03.07.01', 'Com varão de aço de diâmetro de 20 mm.', 'm'),
(723, '04.03.07.02', 'Com varão de aço de diâmetro de 25 mm.', 'm'),
(724, '04.03.07.03', 'Com varão de aço de diâmetro de 32 mm.', 'm'),
(725, '04.03.08', 'Pregagens instaladas por vibrocravação incluindo todos os trabalhos necessários e acessórios:', ''),
(726, '04.03.08.01', 'Com varão de aço de diâmetro de 20 mm.', 'm'),
(727, '04.03.08.02', 'Com varão de aço de diâmetro de 25 mm.', 'm'),
(728, '04.03.08.03', 'Com varão de aço de diâmetro de 32 mm.', 'm'),
(729, '04.03.09', 'Pregagens expansivas tipo \"Swellex\", incluindo furação e todos os trabalhos necessários e acessórios.', 'm'),
(730, '04.03.10', 'Execução de ancoragens para a realização de ensaios prévios, incluindo furação, recolha de amostras, ensaios de permeabilidade, instalação das armaduras, injeção, selagem e todos os trabalhos necessários e acessórios.', 'm'),
(731, '04.03.11', 'Execução de ensaios prévios em ancoragens, incluindo todas as operações de colocação em tensão e todos os trabalhos e materiais necessários e acessórios.', 'un'),
(732, '04.03.12', 'Execução de ancoragens provisórias, incluindo furação, ensaios de permeabilidade, instalação das armaduras, injeção, selagem e todos os materiais necessários, os ensaios de receção e as operações de colocação em tensão:', ''),
(733, '04.03.12.01', 'Com tração inferior ou igual a 50 ton.', 'm'),
(734, '04.03.12.02', 'Com tração superior a 50 ton. e inferior ou igual a 100 ton.', 'm'),
(735, '04.03.12.03', 'Com tração superior a 100 ton. e inferior ou igual a 150 ton.', 'm'),
(736, '04.03.12.04', 'Com tração superior a 150 ton.', 'm'),
(737, '04.03.13', 'Execução de ancoragens definitivas, incluindo furação, ensaios de permeabilidade, instalação das armaduras, injeção, selagem e todos os materiais necessários, os ensaios de receção e as operações de colocação em tensão:', ''),
(738, '04.03.13.01', 'Com tração inferior ou igual a 50 ton.', 'm'),
(739, '04.03.13.02', 'Com tração superior a 50 ton. e inferior ou igual a 100 ton.', 'm'),
(740, '04.03.13.03', 'Com tração superior a 100 ton. e inferior ou igual a 150 ton.', 'm'),
(741, '04.03.13.04', 'Com tração superior a 150 ton.', 'm'),
(742, '04.03.14', 'Células de carga para medição do pré-esforço em ancoragens incluindo todos os acessórios e todos os trabalhos necessários.', 'un'),
(743, '04.04', 'Fornecimento e colocação de lancis em passeios, ilhéus e separadores:', ''),
(744, '04.04.01', 'Lancil de passeio, incluindo fundação.', 'm'),
(745, '04.04.02', 'Lancil galgável, incluindo fundação.', 'm'),
(746, '04.04.03', 'Lancil de remate de passeios com zonas ajardinadas, incluindo fundação.', 'm'),
(747, '04.04.04', 'Lancil rebaixado (parques de estacionamento).', 'm'),
(748, '04.05', 'Leitos de paragem em desvios de emergência:', ''),
(749, '04.05.01', 'Fornecimento e colocação do material monogranular para enchimento de leitos de paragem em desvios de emergência.', 'm3'),
(750, '04.05.02', 'Limpeza do material de enchimento de leitos de paragem em desvios de emergência, incluindo o fornecimento de material do mesmo tipo para reposição das quantidades necessárias.', 'm3'),
(751, '04.06', 'Instalação de serviços de interesse público ou reposição dos afetados:', ''),
(752, '04.06.01', 'Redes de abastecimento de água:', ''),
(753, '04.06.01.01', 'Abertura de valas para instalação de tubagens, em terreno de qualquer natureza, incluindo todos os trabalhos necessários e a remoção, transporte e espalhamento em vazadouro ou depósito provisório dos produtos sobrantes, e eventual indemnização por depósito.', 'm3'),
(754, '04.06.01.02', 'Fornecimento e colocação de areia para execução do leito de assentamento de tubagens e seu posterior envolvimento.', 'm3'),
(755, '04.06.01.03', 'Fornecimento e assentamento de tubagens (como definido no projeto), incluindo todos os acessórios, maciços de amarração, e os trabalhos necessários.', 'm'),
(756, '04.06.01.04', 'Enchimento das valas com materiais resultantes da escavação e/ou de empréstimo, incluindo cirandagem de terras para o envolvimento das tubagens, e compactação.', 'm3'),
(757, '04.06.01.05', 'Reposição do pavimento existente em betão betuminoso.', 'm2'),
(758, '04.06.01.06', 'Reposição do pavimento existente em calçada à portuguesa.', 'm2'),
(759, '04.06.01.07', 'Reposição do pavimento existente em calçada de paralelepípedo.', 'm2'),
(760, '04.06.01.08', 'Reposição do pavimento existente em empedramento.', 'm2'),
(761, '04.06.02', 'Redes de águas residuais pluviais e/ou domésticas:', ''),
(762, '04.06.02.01', 'Abertura de valas para instalação de tubagens, em terreno de qualquer natureza, incluindo todos os trabalhos necessários e a remoção, transporte e espalhamento em vazadouro ou depósito provisório dos produtos sobrantes, e eventual indemnização por depósito.', 'm3'),
(763, '04.06.02.02', 'Fornecimento e colocação de areia para execução do leito de assentamento de tubagens e seu posterior envolvimento.', 'm3'),
(764, '04.06.02.03', 'Fornecimento e assentamento de tubagens (como definido no projeto), incluindo todos os acessórios, e os trabalhos necessários', 'm'),
(765, '04.06.02.04', 'Enchimento das valas com materiais resultantes da escavação e/ou de empréstimo, incluindo cirandagem de terras para o envolvimento das tubagens, e compactação.', 'm3'),
(766, '04.06.02.05', 'Execução de caixas de visita, com altura inferior ou igual a 2,50 m.', 'un'),
(767, '04.06.02.06', 'Execução de caixas de visita, com altura superior a 2,50 m.', 'un'),
(768, '04.06.02.07', 'Reposição do pavimento existente em betão betuminoso.', 'm2'),
(769, '04.06.02.08', 'Reposição do pavimento existente em calçada à portuguesa.', 'm2'),
(770, '04.06.02.09', 'Reposição do pavimento existente em calçada de paralelepípedo.', 'm2'),
(771, '04.06.02.10', 'Reposição do pavimento existente em empedramento.', 'm2'),
(772, '04.06.03', 'Reposição de redes de energia e de telecomunicações - via aérea:', ''),
(773, '04.06.03.01', 'Fornecimento e colocação de postes de linhas aéreas de alta tensão.', 'un'),
(774, '04.06.03.02', 'Fornecimento e colocação de postes de linhas aéreas de média tensão.', 'un'),
(775, '04.06.03.03', 'Fornecimento e colocação de postes de linhas aéreas de baixa tensão.', 'un'),
(776, '04.06.03.04', 'Fornecimento e colocação de postes de linhas aéreas de telecomunicações.', 'un'),
(777, '04.06.03.05', 'Fornecimento e instalação de linhas aéreas de alta tensão.', 'un'),
(778, '04.06.03.06', 'Fornecimento e instalação de linhas aéreas de média tensão.', 'un'),
(779, '04.06.03.07', 'Fornecimento e instalação de linhas aéreas de baixa tensão.', 'un'),
(780, '04.06.03.08', 'Fornecimento e instalação de linhas e/ou cabos aéreos de telecomunicações.', 'un'),
(781, '04.06.04', 'Reposição de redes de energia, de telecomunicações e de gás - via subterrânea:', ''),
(782, '04.06.04.01', 'Abertura de valas para instalação de tubos ou cabos, em terreno de qualquer natureza, incluindo todos os trabalhos necessários e a remoção, transporte e espalhamento em vazadouro ou depósito provisório dos produtos sobrantes, e eventual indemnização por depósito.', 'm3'),
(783, '04.06.04.02', 'Fornecimento e colocação de areia para execução do leito de assentamento de tubagens e seu posterior envolvimento.', 'm3'),
(784, '04.06.04.03', 'Fornecimento e colocação de betão tipo C 12/15, para execução do leito de assentamento de tubagens e seu posterior envolvimento.', 'm3'),
(785, '04.06.04.04', 'Fornecimento e colocação de tubos (de acordo com o projeto) para instalação de cabos.', 'm'),
(786, '04.06.04.05', 'Fornecimento e instalação de cabos (de acordo com o projeto).', 'm'),
(787, '04.06.04.06', 'Fornecimento e colocação de rede plástica sinalizadora.', 'm2'),
(788, '04.06.04.07', 'Fornecimento e colocação de fita plástica sinalizadora.', 'm'),
(789, '04.06.04.08', 'Enchimento das valas com materiais resultantes da escavação e/ou empréstimo, incluindo cirandagem de terras para o envolvimento das tubagens, e compactação.', 'm3'),
(790, '04.06.04.09', 'Execução de caixas de visita, com tampa e aro, construídas \"in situ\" ou compostas por elementos prefabricados, incluindo movimento de terras, fundação e todos os trabalhos necessários, circulares com diâmetro máximo de 1,2 m e altura igual ou inferior a 1 m.', 'un'),
(791, '04.06.04.10', 'Execução de caixas de visita, com tampa e aro, construídas \"in situ\" ou compostas por elementos prefabricados, incluindo movimento de terras, fundação e todos os trabalhos necessários, circulares com diâmetro máximo de 1,2 m e altura superior a 1 m.', 'un'),
(792, '04.06.04.11', 'Execução de caixas de visita, com tampa e aro, construídas \"in situ\" ou compostas por elementos prefabricados, incluindo movimento de terras, fundação e todos os trabalhos necessários, quadradas com 0,80 m de lado.', 'un'),
(793, '04.06.04.12', 'Execução de caixas de visita, com tampa e aro, construídas \"in situ\" ou compostas por elementos prefabricados, incluindo movimento de terras, fundação e todos os trabalhos necessários, quadradas com 1 m de lado.', 'un'),
(794, '04.06.04.13', 'Execução de caixas de visita, com tampa e aro, construídas \"in situ\" ou compostas por elementos prefabricados, incluindo movimento de terras, fundação e todos os trabalhos necessários, retangulares com área máxima de 1,10 m2.', 'un'),
(795, '04.06.04.14', 'Reposição do pavimento existente em betão betuminoso.', 'm2'),
(796, '04.06.04.15', 'Reposição do pavimento existente em calçada à portuguesa.', 'm2'),
(797, '04.06.04.16', 'Reposição do pavimento existente em calçada de paralelepípedo.', 'm2'),
(798, '04.06.04.17', 'Reposição do pavimento existente em empedramento.', 'm2'),
(799, '04.06.05', 'Sistemas de telecomunicações - infraestruturas:', ''),
(800, '04.06.05.01', 'Abertura de valas para instalação de tubos, cabos ou outros equipamentos, em terreno de qualquer natureza, incluindo todos os trabalhos necessários e a remoção, transporte e espalhamento em vazadouro ou depósito provisório dos produtos sobrantes, e eventual indemnização por depósito.', 'm3'),
(801, '04.06.05.02', 'Fornecimento e colocação de areia para execução do leito de assentamento de tubagens e seu posterior envolvimento.', 'm3'),
(802, '04.06.05.03', 'Fornecimento e colocação de betão tipo C 12/15, para execução do leito de assentamento de tubagens e seu posterior envolvimento.', 'm3'),
(803, '04.06.05.04', 'Fornecimento e colocação de tubos para instalação de cabos, ou outros equipamentos (de acordo com o projeto).', 'm'),
(804, '04.06.05.05', 'Fornecimento e colocação de rede plástica sinalizadora.', 'm2'),
(805, '04.06.05.06', 'Fornecimento e colocação de fita plástica sinalizadora.', 'm'),
(806, '04.06.05.07', 'Enchimento das valas com materiais resultantes da escavação e/ou empréstimo, incluindo cirandagem de terras, para o envolvimento de tubagens e compactação.', 'm3'),
(807, '04.06.05.08', 'Execução de caixas de visita, com tampa e aro, construídas \"in situ\" ou compostas por elementos prefabricados, incluindo movimento de terras, fundação e todos os trabalhos necessários (de acordo com o projeto).', 'un'),
(808, '04.06.05.09', 'Execução de gares para instalação de postos avisadores SOS, constituídos por maciços de betão armado, incluindo todos os materiais e trabalhos necessários - Para postos principais, integrando circuito de ligação à terra.', 'un'),
(809, '04.06.05.10', 'Execução de gares para instalação de postos avisadores SOS, constituídos por maciços de betão armado, incluindo todos os materiais e trabalhos necessários - Para postos secundários.', 'un'),
(810, '04.06.06', 'Redes de iluminação pública:', ''),
(811, '04.06.06.01', 'Armários de distribuição, seccionamento, sem contagem de energia, constituindo quadro elétrico com esquema de comando e resistência de aquecimento (de acordo com o projeto).', 'un'),
(812, '04.06.06.02', 'Armários de distribuição, seccionamento, com contagem de energia em compartimento separado, constituindo quadro elétrico com esquema de comando e resistência de aquecimento (de acordo com o projeto).', 'un'),
(813, '04.06.06.03', 'Caixas de derivação, de montagem saliente estanques, com placa de bornes em porcelana e bucins com sede e porca - Com proteção.', 'un'),
(814, '04.06.06.04', 'Caixas de derivação, de montagem saliente estanques, com placa de bornes em porcelana e bucins com sede e porca - Sem proteção.', 'un'),
(815, '04.06.06.05', 'Terras (de acordo com o projeto).', 'un'),
(816, '04.06.06.06', 'Fornecimento, instalação e ligação de cabos montados à vista em braçadeiras (de acordo com o projeto).', 'm'),
(817, '04.06.06.07', 'Fornecimento e montagem de colunas metálicas, com tratamento anti-corrosão, equipadas com portinhola e seccionadores-fusíveis classe II, totalmente eletrificadas, incluindo cabos de ligação às luminárias (de acordo com o projeto).', 'un'),
(818, '04.06.06.08', 'Torres metálicas, do tipo sobe e desce, motorizadas, para instalação de luminárias (com coroa, para projetores), completamente eletrificadas, incluindo cabos de ligação, portinhola ou armário de comando (de acordo com o projeto).', 'un'),
(819, '04.06.06.09', 'Luminárias para montagem em coluna, completamente eletrificadas, incluindo acessórios, e com lâmpada de vapor de sódio de alta pressão (de acordo com o projeto).', 'un'),
(820, '04.06.06.10', 'Luminárias completamente eletrificadas para montagem em obras de arte, na parte inferior do tabuleiro, incluindo acessórios e base de estrutura metálica, e com lâmpada de vapor de sódio de alta pressão tubular (de acordo com o projeto).', 'un'),
(821, '04.06.06.11', 'Postos de transformações aéreos, incluindo o fornecimento, montagem e ligação de todos os equipamentos necessários (de acordo com o projeto).', 'un'),
(822, '04.06.06.12', 'Fornecimento e colocação de postes, para instalação de postos de transformação aéreos, incluindo execução das fundações.', 'un'),
(823, '04.06.06.13', 'Construção de edificação própria para a instalação dos postos de transformação em cabine, incluindo movimento de terras, fundação, fornecimento e colocação de todos os materiais e acabamentos.', 'un'),
(824, '04.06.06.14', 'Execução de caixas de visita, com tampa e aro, construídas \"in situ\" ou compostas por elementos prefabricados, incluindo movimento de terras, fundação e todos os trabalhos necessários (de acordo com o projeto).', 'un'),
(825, '04.06.06.15', 'Maciços de betão, simples ou armado, para colunas de iluminação de acordo com os desenhos de projeto.', 'un'),
(826, '04.06.06.16', 'Maciços para quadros elétricos, em alvenaria ou betão.', 'un'),
(827, '04.06.06.17', 'Travessias, inferiores a vias de comunicação ou outras, em tubos PVC a instalar em vala, para posterior enfiamento de cabos (de acordo com o projeto).', 'm'),
(828, '04.06.06.18', 'Infraestruturas complementares para a instalação das redes de iluminação pública - Abertura de valas para instalação de tubos ou cabos, em terreno de qualquer natureza, incluindo todos os trabalhos necessários e a remoção, transporte e espalhamento em vazadouro ou depósito provisório, e eventual ind', 'm3'),
(829, '04.06.06.19', 'Infraestruturas complementares para a instalação das redes de iluminação pública - Fornecimento e colocação de areia, para execução do leito de assentamento de tubagens e seu posterior envolvimento.', 'm3'),
(830, '04.06.06.20', 'Infraestruturas complementares para a instalação das redes de iluminação pública - Fornecimento e colocação de betão tipo C 12/15, para execução do leito de assentamento de tubagens e seu posterior envolvimento.', 'm3'),
(831, '04.06.06.21', 'Infraestruturas complementares para a instalação das redes de iluminação pública - Fornecimento e colocação de rede plástica sinalizadora.', 'm2'),
(832, '04.06.06.22', 'Infraestruturas complementares para a instalação das redes de iluminação pública - Fornecimento e colocação de fita plástica sinalizadora.', 'm'),
(833, '04.06.06.23', 'Infraestruturas complementares para a instalação das redes de iluminação pública - Enchimento das valas com materiais resultantes da escavação e/ou empréstimo, incluindo cirandagem de terras para o envolvimento das tubagens, e compactação.', 'm3'),
(834, '04.07', 'Outros Trabalhos:', ''),
(835, '05', 'Equipamento de sinalização e segurança', ''),
(836, '05.01', 'Sinalização vertical:', ''),
(837, '05.01.01', 'Sinalização vertical de \"código\", incluindo implantação, fornecimento, colocação, elementos ou estruturas de suporte, peças de ligação e maciços de fundação:', ''),
(838, '05.01.01.01', 'Sinais triangulares com L = 0,70 m.', 'un'),
(839, '05.01.01.02', 'Sinais triangulares com L = 0,90 m.', 'un'),
(840, '05.01.01.03', 'Sinais triangulares com L = 1,15 m.', 'un'),
(841, '05.01.01.04', 'Sinais circulares com diâmetro igual a 0,70 m.', 'un'),
(842, '05.01.01.05', 'Sinais circulares com diâmetro igual a 0,90 m.', 'un'),
(843, '05.01.01.06', 'Sinais circulares com diâmetro igual a 1,15 m.', 'un'),
(844, '05.01.01.07', 'Sinais octogonais (STOP) com L = 0,70 m.', 'un'),
(845, '05.01.01.08', 'Sinais octogonais (STOP) com L = 0,90 m.', 'un'),
(846, '05.01.01.09', 'Sinais quadrangulares com L = 0,70 m.', 'un'),
(847, '05.01.01.10', 'Sinais quadrangulares com L = 0,90 m.', 'un'),
(848, '05.01.01.11', 'Sinais quadrangulares com L = 1,15 m.', 'un'),
(849, '05.01.02', 'Sinalização vertical de informação, incluindo fornecimento e colocação:', ''),
(850, '05.01.02.01', 'Sinais de Pré-aviso simplificados (PAS´s), laterais.', 'm2'),
(851, '05.01.02.02', 'Sinais de Pré-aviso gráficos (PAG´s), laterais.', 'm2'),
(852, '05.01.02.03', 'Sinais de Pré-aviso simplificados (PAS´s), em pórtico ou semi-pórtico.', 'm2'),
(853, '05.01.02.04', 'Sinais de Pré-aviso gráficos (PAG´s), em pórtico ou semi-pórtico.', 'm2'),
(854, '05.01.02.05', 'Sinais de Pré-aviso intercalares, laterais.', 'm2'),
(855, '05.01.02.06', 'Sinais de seleção e afetação laterais.', 'm2'),
(856, '05.01.02.07', 'Sinais de seleção e afetação em pórtico ou semi-pórtico.', 'm2'),
(857, '05.01.02.08', 'Sinais de direção - Setas S´s.', 'm2'),
(858, '05.01.02.09', 'Sinais de direção - Setas SD´s.', 'm2'),
(859, '05.01.02.10', 'Sinais de confirmação (Sc´s) laterais.', 'm2'),
(860, '05.01.02.11', 'Sinais de confirmação (Sc´s) em pórtico ou semi-pórtico.', 'm2'),
(861, '05.01.02.12', 'Painéis de vias de lentos.', 'm2'),
(862, '05.01.02.13', 'Painéis de aproximação de saída de nó (SA´s).', 'm2'),
(863, '05.01.02.14', 'Painéis de início e fim de Estrada Nacional.', 'm2'),
(864, '05.01.02.15', 'Painéis de identificação de desvio de emergência de informação fixa.', 'm2'),
(865, '05.01.02.16', 'Painéis de identificação de desvio de emergência de informação variável.', 'm2'),
(866, '05.01.02.17', 'Outros painéis.', 'm2'),
(867, '05.01.03', 'Estruturas para suporte dos elementos da sinalização de informação, incluindo implantação, fornecimento e colocação:', ''),
(868, '05.01.03.01', 'Estruturas de apoio de sinais laterais (excluindo os sinais de \"código\"), setas e painéis, em perfis metálicos não tubulares.', 'kg'),
(869, '05.01.03.02', 'Estruturas de apoio de sinais laterais (excluindo os sinais de \"código\"), setas e painéis, em perfis metálicos tubulares.', 'kg'),
(870, '05.01.03.03', 'Pórticos em perfis metálicos com vão inferior ou igual \na 8 m.', 'un'),
(871, '05.01.03.04', 'Pórticos em perfis metálicos com vão superior a 8 m e inferior ou igual a 15 m.', 'un'),
(872, '05.01.03.05', 'Pórticos em perfis metálicos com vão superior a 15 m e inferior ou igual a 20 m.', 'un'),
(873, '05.01.03.06', 'Pórticos em perfis metálicos com vão superior a 20 m.', 'un'),
(874, '05.01.03.07', 'Semi-pórticos em perfis metálicos com vão inferior ou igual a 6,5 m.', 'un'),
(875, '05.01.03.08', 'Semi-pórticos em perfis metálicos com vão superior a 6,5 m.', 'un'),
(876, '05.01.03.09', 'Pórticos em estruturas tipo treliça com vão inferior ou igual a 8 m.', 'un'),
(877, '05.01.03.10', 'Pórticos em estruturas tipo treliça com vão superior a 8 m e inferior ou igual a 15 m.', 'un'),
(878, '05.01.03.11', 'Pórticos em estruturas tipo treliça com vão superior a 15 m e inferior ou igual a 20 m.', 'un'),
(879, '05.01.03.12', 'Pórticos em estruturas tipo treliça com vão superior a 20 m.', 'un'),
(880, '05.01.03.13', 'Semi-pórticos em estruturas tipo treliça com vão inferior ou igual a 6,5 m.', 'un'),
(881, '05.01.03.14', 'Semi-pórticos em estruturas tipo treliça com vão superior a 6,5 m.', 'un'),
(882, '05.01.03.15', 'Execução de fundações em betão armado, em sinais (excluindo sinais de \"código\"), setas, painéis, pórticos e semi-pórticos, incluindo escavação para abertura da fundação em terreno de qualquer natureza, fornecimento, colocação, e cofragens necessárias.', 'm3'),
(883, '05.02', 'Marcas rodoviárias, incluindo pré-marcação:', ''),
(884, '05.02.01', 'Marcas Longitudinais:', ''),
(885, '05.02.01.01', 'Linha branca contínua (LBC) com 0,10 m de largura (LBC 0,10).', 'm'),
(886, '05.02.01.02', 'Linha branca contínua (LBC) com 0,12 m de largura (LBC 0,12).', 'm'),
(887, '05.02.01.03', 'Linha branca contínua (LBC) com 0,15 m de largura (LBC 0,15).', 'm'),
(888, '05.02.01.04', 'Linha branca contínua (LBC) com 0,20 m de largura (LBC 0,20).', 'm'),
(889, '05.02.01.05', 'Linha branca contínua (LBC) com 0,25 m de largura (LBC 0,25).', 'm'),
(890, '05.02.01.06', 'Linha branca contínua (LBC) com 0,30 m de largura (LBC 0,30).', 'm'),
(891, '05.02.01.07', 'Linha amarela contínua (LAC).', 'm'),
(892, '05.02.01.08', 'Linha branca tracejada de aviso (LBTA), com 0,10 m de largura e relação traço/espaço 2,5/1 m (LBTA 0,10; 2,5/1).', 'm'),
(893, '05.02.01.09', 'Linha branca tracejada de aviso (LBTA), com 0,12 m de largura e relação traço/espaço 5/2 m (LBTA 0,12; 5/2).', 'm'),
(894, '05.02.01.10', 'Linha branca tracejada de aviso (LBTA), com 0,15 m de largura e relação traço/espaço 5/2 m (LBTA 0,15; 5/2).', 'm'),
(895, '05.02.01.11', 'Linha branca tracejada de aviso (LBTA), com 0,15 m de largura e relação traço/espaço 10/4 m (LBTA 0,15; 10/4).', 'm'),
(896, '05.02.01.12', 'Linha branca tracejada (LBT) com 0,10 m de largura e relação traço/espaço 1/1 m (LBT 0,10; 1/1).', 'm'),
(897, '05.02.01.13', 'Linha branca tracejada (LBT) com 0,10 m de largura e relação traço/espaço 2/5 m (LBT 0,10; 2/5).', 'm'),
(898, '05.02.01.14', 'Linha branca tracejada (LBT) com 0,12 m de largura e relação traço/espaço 1/1 m (LBT 0,12; 1/1).', 'm'),
(899, '05.02.01.15', 'Linha branca tracejada (LBT) com 0,12 m de largura e relação traço/espaço 4/10 m (LBT 0,12; 4/10).', 'm'),
(900, '05.02.01.16', 'Linha branca tracejada (LBT) com 0,12 m de largura e relação traço/espaço 3/3 m (LBT 0,12; 3/3).', 'm'),
(901, '05.02.01.17', 'Linha branca tracejada (LBT) com 0,15 m de largura e relação traço/espaço 1,5/2 m (LBT 0,15; 1,5/2).', 'm'),
(902, '05.02.01.18', 'Linha branca tracejada (LBT) com 0,15 m de largura e relação traço/espaço 1/1 m (LBT 0,15; 1/1).', 'm'),
(903, '05.02.01.19', 'Linha branca tracejada (LBT) com 0,15 m de largura e relação traço/espaço 4/10 m (LBT 0,15; 4/10).', 'm'),
(904, '05.02.01.20', 'Linha branca tracejada (LBT) com 0,15 m de largura e relação traço/espaço 8/20 m (LBT 0,15; 8/20).', 'm'),
(905, '05.02.01.21', 'Linha branca tracejada (LBT) com 0,20 m de largura e relação traço/espaço 1,5/2 m (LBT 0,20; 1,5/2).', 'm'),
(906, '05.02.01.22', 'Linha branca tracejada (LBT) com 0,20 m de largura e relação traço/espaço 2,5/1 m (LBT 0,20; 2,5/1).', 'm'),
(907, '05.02.01.23', 'Linha branca tracejada (LBT) com 0,25 m de largura e relação traço/espaço 1,5/2 m (LBT 0,25; 1,5/2).', 'm'),
(908, '05.02.01.24', 'Linha branca tracejada (LBT) com 0,25 m de largura e relação traço/espaço 5/2 m (LBT 0,25; 5/2).', 'm'),
(909, '05.02.01.25', 'Linha branca tracejada (LBT) com 0,30 m de largura e relação traço/espaço 0,4/0,3 m (LBT 0,30; 0,4/0,3).', 'm'),
(910, '05.02.01.26', 'Linha branca tracejada (LBT) com 0,30 m de largura e relação traço/espaço 1,5/2 m (LBT 0,30; 1,5/2).', 'm'),
(911, '05.02.01.27', 'Linha branca tracejada (LBT) com 0,30 m de largura e relação traço/espaço 3/4 m (LBT 0,30; 3/4).', 'm'),
(912, '05.02.01.28', 'Linha branca tracejada (LBT) com 0,30 m de largura e relação traço/espaço 10/4 m (LBT 0,30; 10/4).', 'm'),
(913, '05.02.01.29', 'Guias com 0,12 m de largura.', 'm'),
(914, '05.02.01.30', 'Guias com 0,15 m de largura.', 'm'),
(915, '05.02.01.31', 'Guias com 0,20 m de largura.', 'm'),
(916, '05.02.01.32', 'Guias dentadas com 0,12 m de largura.', 'm'),
(917, '05.02.01.33', 'Guias dentadas com 0,15 m de largura.', 'm'),
(918, '05.02.01.34', 'Guias dentadas com 0,20 m de largura.', 'm'),
(919, '05.02.01.35', 'Aplicação de ressaltos para formação de guias dentadas, sobre guias com 0,12 m de largura.', 'm'),
(920, '05.02.01.36', 'Aplicação de ressaltos para formação de guias dentadas, sobre guias com 0,15 m de largura.', 'm'),
(921, '05.02.01.37', 'Aplicação de ressaltos para formação de guias dentadas, sobre guias com 0,20 m de largura.', 'm'),
(922, '05.02.02', 'Marcas Transversais:', '');
INSERT INTO `tbl_orcamentoitens` (`id_orc`, `cod`, `descr`, `und`) VALUES
(923, '05.02.02.01', 'Barras de paragem com 0,60 m de largura.', 'm2'),
(924, '05.02.02.02', 'Passadeiras de peões.', 'm2'),
(925, '05.02.03', 'Outras marcas:', ''),
(926, '05.02.03.01', 'Raias oblíquas paralelas.', 'm2'),
(927, '05.02.03.02', 'Bandas cromáticas.', 'm2'),
(928, '05.02.03.03', 'Triângulo de cedência de prioridade com h = 2,0 m.', 'un'),
(929, '05.02.03.04', 'Triângulo de cedência de prioridade com h = 6,0 m.', 'un'),
(930, '05.02.03.05', 'Inscrições STOP.', 'un'),
(931, '05.02.03.06', 'Outras inscrições.', 'm2'),
(932, '05.02.03.07', 'Setas de seleção com 6,0 m simples.', 'un'),
(933, '05.02.03.08', 'Setas de seleção com 6,0 m duplas.', 'un'),
(934, '05.02.03.09', 'Setas de seleção com 6,0 m triplas.', 'un'),
(935, '05.02.03.10', 'Setas de seleção com 7,5 m simples.', 'un'),
(936, '05.02.03.11', 'Setas de seleção com 7,5 m duplas.', 'un'),
(937, '05.02.03.12', 'Setas de seleção com 7,5 m triplas.', 'un'),
(938, '05.02.03.13', 'Setas de desvio Tipo I, em vias de 3,0 m.', 'un'),
(939, '05.02.03.14', 'Setas de desvio Tipo I, em vias de 3,5 m.', 'un'),
(940, '05.02.03.15', 'Setas de desvio Tipo II.', 'un'),
(941, '05.02.03.16', 'Quadrícula  para  localização  dos desvios  de emergência.', 'm2'),
(942, '05.02.03.17', 'Linha em ziguezague, de cor amarela, na sinalização de proibição de estacionamento.', 'm2'),
(943, '05.02.03.18', 'Quadrícula, de cor amarela, na delimitação de zonas de interdição de paragem, em cruzamentos.', 'm2'),
(944, '05.03', 'Equipamento de guiamento, balizagem e demarcação, incluindo implantação, fornecimento e colocação:', ''),
(945, '05.03.01', 'Marcadores:', ''),
(946, '05.03.01.01', 'Unidirecionais.', 'un'),
(947, '05.03.01.02', 'Bidirecionais.', 'un'),
(948, '05.03.02', 'Delineadores - Sinalizadores:', ''),
(949, '05.03.02.01', 'Para apoio no solo (h = 1,0 m), com secção poliédrica.', 'un'),
(950, '05.03.02.02', 'Para apoio no solo (h = 1,0 m), com secção de meia cana.', 'un'),
(951, '05.03.02.03', 'Para apoio em guardas de segurança (h = 0,35), com secção poliédrica.', 'un'),
(952, '05.03.02.04', 'Para apoio em guardas de segurança (h = 0,35), com secção de meia cana.', 'un'),
(953, '05.03.03', 'Baias direcionais:', ''),
(954, '05.03.03.01', 'Unitárias (chevrons) com 0,40 m de lado.', 'un'),
(955, '05.03.03.02', 'Unitárias (chevrons) com 0,60 m de lado.', 'un'),
(956, '05.03.03.03', 'Unitárias (chevrons) com 0,90 m de lado.', 'un'),
(957, '05.03.03.04', 'Múltiplas (4 módulos) com 0,40 m de lado.', 'un'),
(958, '05.03.03.05', 'Múltiplas (4 módulos) com 0,60 m de lado.', 'un'),
(959, '05.03.03.06', 'Múltiplas (4 módulos) com 0,90 m de lado.', 'un'),
(960, '05.03.03.07', 'Baias de posição com 0,20 x 1,40 m2.', 'un'),
(961, '05.03.03.08', 'Baias de posição com 0,30 x 2,10 m2.', 'un'),
(962, '05.03.03.09', 'Baias de posição com 0,40 x 2,80 m2.', 'un'),
(963, '05.03.03.10', 'Balizas laterais de posição metálicas com L = 0,20 m.', 'un'),
(964, '05.03.03.11', 'Balizas laterais de posição metálicas com L = 0,30 m.', 'un'),
(965, '05.03.03.12', 'Balizas laterais de posição cilíndricas em plástico.', 'un'),
(966, '05.03.03.13', 'Balizas de pontos de divergência (BPD´s) com 1,25 m.', 'un'),
(967, '05.03.03.14', 'Balizas de pontos de divergência (BPD´s) com 1,80 m.', 'un'),
(968, '05.04', 'Equipamento de demarcação, incluindo implantação, fornecimento e colocação:', ''),
(969, '05.04.01', 'Marcos hectométricos:', ''),
(970, '05.04.01.01', 'Para Estradas Nacionais.', 'un'),
(971, '05.04.01.02', 'Para Outras Estradas.', 'un'),
(972, '05.04.02', 'Marcos quilométricos:', ''),
(973, '05.04.02.01', 'Para Estradas Nacionais.', 'un'),
(974, '05.04.02.02', 'Para Outras Estradas.', 'un'),
(975, '05.04.03', 'Marcos miriamétricos:', ''),
(976, '05.04.03.01', 'Para Estradas Nacionais.', 'un'),
(977, '05.04.03.02', 'Para Outras Estradas.', 'un'),
(978, '05.04.04', 'Marcos de património do Estado.', 'un'),
(979, '05.05', 'Guardas  de segurança, incluindo implantação, fornecimento e colocação:', ''),
(980, '05.05.01', 'Guardas metálicas:', ''),
(981, '05.05.01.01', 'Semi-flexíveis simples, para veículos, com prumos afastados de 4 m.', 'm'),
(982, '05.05.01.02', 'Semi-flexíveis simples, para veículos, com prumos afastados de 2 m.', 'm'),
(983, '05.05.01.03', 'Semi-flexíveis duplas, para veículos.', 'm'),
(984, '05.05.01.04', 'Duplas especiais do tipo BHO.', 'm'),
(985, '05.05.01.05', 'Terminais, tipo cauda de carpa, normal.', 'un'),
(986, '05.05.01.06', 'Terminais, tipo cauda de carpa, espalmado.', 'un'),
(987, '05.05.01.07', 'Terminais circulares de fecho de dois alinhamentos.', 'un'),
(988, '05.05.02', 'Guardas Rígidas:', ''),
(989, '05.05.02.01', 'Com altura inferior ou igual a 0,60 m com perfil simétrico.', 'm'),
(990, '05.05.02.02', 'Com altura inferior ou igual a 0,60 m com perfil assimétrico.', 'm'),
(991, '05.05.02.03', 'Com altura superior a 0,60 m e inferior ou igual a 0,90 m com perfil simétrico.', 'm'),
(992, '05.05.02.04', 'Com altura superior a 0,60 m e inferior ou igual a 0,90 m com perfil assimétrico.', 'm'),
(993, '05.05.02.05', 'Com altura superior  a 0,90 m com perfil simétrico.', 'm'),
(994, '05.05.02.06', 'Com altura superior  a 0,90 m com perfil assimétrico.', 'm'),
(995, '05.05.02.07', 'Betão tipo C 16/20 em fundação de guardas rígidas.', 'm3'),
(996, '05.05.03', 'Equipamento de fecho de interrupções nos separadores, incluindo implantação, fornecimento e colocação:', ''),
(997, '05.05.03.01', 'Guardas metálicas simples e desmontáveis, incluindo todos os equipamentos de desmontagem rápida.', 'm'),
(998, '05.05.03.02', 'Prumos para guardas metálicas simples, incluindo baínhas no pavimento.', 'un'),
(999, '05.05.03.03', 'Corrente de balizamento.', 'm'),
(1000, '05.05.03.04', 'Prumos de suporte da corrente de balizamento, incluindo baínhas no pavimento.', 'un'),
(1001, '05.05.04', 'Guardas de proteção para peões.', 'm'),
(1002, '05.06', 'Outros equipamentos, incluindo implantação, fornecimento e colocação:', ''),
(1003, '05.06.01', 'Barreiras anti-encadeamento, incluindo estrutura de suporte e montagem:', ''),
(1004, '05.06.01.01', 'Com perfis de altura inferior ou igual a 0,60 m.', 'm'),
(1005, '05.06.01.02', 'Com perfis de altura superior a 0,60 m.', 'm'),
(1006, '05.06.02', 'Mangas para sinalização de ventos, incluindo poste e fundação.', 'un'),
(1007, '05.06.03', 'Atenuadores de impacto.', 'un'),
(1008, '05.07', 'Trabalhos a realizar no sistema de sinalização e segurança existente:', ''),
(1009, '05.07.01', 'Levantamento de elementos do sistema existente, e transporte a depósito a indicar pela Fiscalização.', ''),
(1010, '05.07.01.01', 'Sinais de \"código\", baias, balizas e marcos.', 'un'),
(1011, '05.07.01.02', 'Sinais de Informação, setas e painéis.', 'un'),
(1012, '05.07.01.03', 'Pórticos.', 'un'),
(1013, '05.07.01.04', 'Semi-pórticos.', 'un'),
(1014, '05.07.01.05', 'Marcadores.', 'un'),
(1015, '05.07.01.06', 'Delineadores.', 'un'),
(1016, '05.07.01.07', 'Guardas metálicas.', 'm'),
(1017, '05.07.01.08', 'Guardas rígidas.', 'm'),
(1018, '05.07.02', 'Levantamento de elementos do sistema existente e sua recolocação de acordo com o definido no projeto:', ''),
(1019, '05.07.02.01', 'Sinais de \"código\", baias, balizas e marcos.', 'un'),
(1020, '05.07.02.02', 'Sinais de Informação, Setas e Painéis.', 'un'),
(1021, '05.07.02.03', 'Pórticos.', 'un'),
(1022, '05.07.02.04', 'Semi-pórticos.', 'un'),
(1023, '05.07.02.05', 'Marcadores.', 'un'),
(1024, '05.07.02.06', 'Delineadores.', 'un'),
(1025, '05.07.02.07', 'Guardas metálicas.', 'm'),
(1026, '05.07.02.08', 'Guardas rígidas.', 'm'),
(1027, '05.07.03', 'Eliminação de marcas da sinalização horizontal.', 'm2'),
(1028, '05.08', 'Sinalização temporária:', ''),
(1029, '05.08.01', 'Sinalização temporária de trabalhos, de acordo com o definido no projeto, referente a sinalização vertical, horizontal e outros equipamentos necessários, incluindo fornecimento, implantação e colocação.', 'vg'),
(1030, '05.09', 'Outros Trabalhos:', ''),
(1031, '06', 'Obras de arte', ''),
(1032, '06.01', 'Trabalhos preparatórios e fundações especiais:', ''),
(1033, '06.01.01', 'Escavação para abertura de fundações, incluindo implantação, entivação, escoramento, bombagem e esgoto de eventuais águas afluentes, carga, transporte e espalhamento em vazadouro dos produtos sobrantes, e eventual indemnização por depósito:', ''),
(1034, '06.01.01.01', 'Em terreno brando', 'm3'),
(1035, '06.01.01.02', 'Em terreno duro', 'm3'),
(1036, '06.01.01.03', 'Em terreno compacto (rocha).', 'm3'),
(1037, '06.01.02', 'Execução de ensecadeiras.', 'm2'),
(1038, '06.01.03', 'Execução de estacas verticais:', ''),
(1039, '06.01.03.01', 'Com 0,50 m de diâmetro.', 'm'),
(1040, '06.01.03.02', 'Com 0,60 m de diâmetro.', 'm'),
(1041, '06.01.03.03', 'Com 0,80 m de diâmetro.', 'm'),
(1042, '06.01.03.04', 'Com 1,00 m de diâmetro.', 'm'),
(1043, '06.01.03.05', 'Com 1,20 m de diâmetro.', 'm'),
(1044, '06.01.03.06', 'Com 1,50 m de diâmetro.', 'm'),
(1045, '06.01.03.07', 'Com 2,00 m de diâmetro.', 'm'),
(1046, '06.01.04', 'Execução de estacas inclinadas:', ''),
(1047, '06.01.04.01', 'Com 0,50 m de diâmetro.', 'm'),
(1048, '06.01.04.02', 'Com 0,60 m de diâmetro.', 'm'),
(1049, '06.01.04.03', 'Com 0,80 m de diâmetro.', 'm'),
(1050, '06.01.05', 'Execução  de poços:', ''),
(1051, '06.01.05.01', 'Com 1,00 m de diâmetro.', 'm'),
(1052, '06.01.05.02', 'Com 1,20 m de diâmetro.', 'm'),
(1053, '06.01.05.03', 'Com 2,00 m de diâmetro.', 'm'),
(1054, '06.01.06', 'Execução de micro-estacas.', 'm'),
(1055, '06.01.07', 'Execução de barretas.', 'm'),
(1056, '06.01.08', 'Injeção na base das estacas:', ''),
(1057, '06.01.08.01', 'Furação na ponta das estacas para injeção.', 'm'),
(1058, '06.01.08.02', 'Fornecimento e introdução de tubo obturado na ponta.', 'm'),
(1059, '06.01.08.03', 'Injeção de calda.', 'ton'),
(1060, '06.02', 'Prefabricadas ou quadros de pequena secção, incluindo bocas e todos os trabalhos necessários, e ainda, para a sua implantação, a escavação em terreno de qualquer natureza, a remoção, reposição, condução a vazadouro dos produtos sobrantes, e eventuais indemnizações por depósito:', ''),
(1061, '06.02.01', 'Em betão armado de secção rectangular:', ''),
(1062, '06.02.01.01', 'Com secção 3,00 x 3,00 m2.', 'm'),
(1063, '06.02.01.02', 'Com secção 2 x 3,00 x 3,00 m2.', 'm'),
(1064, '06.02.01.03', 'Com secção 4,00 x 4,00 m2.', 'm'),
(1065, '06.02.01.04', 'Com secção 2 x 4,00 x 4,00 m2.', 'm'),
(1066, '06.02.02', 'Em betão armado, constituídas por peças prefabricadas, de secção rectangular ou outra:', ''),
(1067, '06.02.02.01', 'De secção simples, com altura igual ou superior a 2,50 m e inferior ou igual a 4,00 m.', 'm'),
(1068, '06.02.02.02', 'De secção simples, com altura superior a 4,00 m.', 'm'),
(1069, '06.02.02.03', 'De secção dupla, com altura igual ou superior a 2,50 m e inferior ou igual a 4,00 m.', 'm'),
(1070, '06.02.02.04', 'De secção dupla, com altura superior a 4,00 m.', 'm'),
(1071, '06.02.02.05', 'De secção tripla, com altura igual ou superior a 2,50 m e inferior ou igual a 4,00 m.', 'm'),
(1072, '06.02.02.06', 'De secção tripla, com altura superior a 4,00 m.', 'm'),
(1073, '06.02.03', 'Metálicas, constituídas por painéis de chapa de aço ondulada ou sistema equivalente:', ''),
(1074, '06.02.03.01', 'De secção simples, com altura igual ou superior a 2,50 m e inferior ou igual a 4,00 m.', 'm'),
(1075, '06.02.03.02', 'De secção simples, com altura superior a 4,00 m.', 'm'),
(1076, '06.02.03.03', 'De secção dupla, com altura igual ou superior a 2,50 m e inferior ou igual a 4,00 m.', 'm'),
(1077, '06.02.03.04', 'De secção dupla, com altura superior a 4,00 m.', 'm'),
(1078, '06.02.03.05', 'De secção tripla, com altura igual ou superior a 2,50 m e inferior ou igual a 4,00 m.', 'm'),
(1079, '06.02.03.06', 'De secção tripla, com altura superior a 4,00 m.', 'm'),
(1080, '06.03', 'Cofragem, incluindo reaplicações:', ''),
(1081, '06.03.01', 'Para betão não à vista.', 'm2'),
(1082, '06.03.02', 'Para betão à vista.', 'm2'),
(1083, '06.03.03', 'Em moldes perdidos.', 'm2'),
(1084, '06.03.04', 'Para vigas prefabricadas em estaleiro.', 'm2'),
(1085, '06.03.05', 'Pré-lajes prefabricadas, para cofragem perdida de lajes entre vigas.', 'm2'),
(1086, '06.04', 'Betões, incluindo fornecimento e colocação:', ''),
(1087, '06.04.01', 'Betão tipo C 12/15 na regularização de fundações. \n(B 15).', 'm3'),
(1088, '06.04.02', 'Betão tipo C 16/20 na regularização de fundações. \n(B 20).', 'm3'),
(1089, '06.04.03', 'Betão tipo C 20/25. (B 25).', 'm3'),
(1090, '06.04.04', 'Betão tipo C 25/30. (B 30).', 'm3'),
(1091, '06.04.05', 'Betão tipo C 30/37. (B 35).', 'm3'),
(1092, '06.04.06', 'Betão tipo C 35/45. (B 40).', 'm3'),
(1093, '06.04.07', 'Betão tipo C 40/50.', 'm3'),
(1094, '06.04.08', 'Betão tipo C 45/55.', 'm3'),
(1095, '06.04.09', 'Betão tipo C 50/60.', 'm3'),
(1096, '06.05', 'Aços, incluindo fornecimento  e montagem:', ''),
(1097, '06.05.01', 'Aço A 235 NR.', 'kg'),
(1098, '06.05.02', 'Aço A 235 ER.', 'kg'),
(1099, '06.05.03', 'Aço A 400 NR.', 'kg'),
(1100, '06.05.04', 'Aço A 400 ER.', 'kg'),
(1101, '06.05.05', 'Aço A 500 NR.', 'kg'),
(1102, '06.05.06', 'Aço A 500 ER.', 'kg'),
(1103, '06.05.07', 'Redes electrossoldadas.', 'kg'),
(1104, '06.05.08', 'Treliças electrossoldadas.', 'kg'),
(1105, '06.05.09', 'Aços de alta resistência :', ''),
(1106, '06.05.09.01', 'Para pré-esforço aderente, pós-tensionado, em cordão.', 'kg'),
(1107, '06.05.09.02', 'Para pré-esforço aderente, pós-tensionado, em barra.', 'kg'),
(1108, '06.05.09.03', 'Para pré-esforço aderente, pré-tensionado.', 'kg'),
(1109, '06.05.09.04', 'Para pré-esforço exterior, em cordão.', 'kg'),
(1110, '06.05.09.05', 'Para pré-esforço exterior, em barra.', 'kg'),
(1111, '06.05.09.06', 'Em tirantes.', 'kg'),
(1112, '06.06', 'Peças em aço Fe510:', ''),
(1113, '06.06.01', 'Aço em perfis correntes comerciais.', 'kg'),
(1114, '06.06.02', 'Ancoragens e desviadores para pré-esforço exterior.', 'vg'),
(1115, '06.06.03', 'Elementos em aço nos mastros.', 'vg'),
(1116, '06.07', 'Processos construtivos:', ''),
(1117, '06.07.01', 'Cavaletes para montagem dos moldes e cimbres necessários à execução do tabuleiro, incluindo passagens de serviço, desvios provisórios, trabalhos de montagem e desmontagem, eventual sinalização provisória e estruturas de proteção.', 'm3'),
(1118, '06.07.02', 'Transporte e colocação de vigas prefabricadas:', ''),
(1119, '06.07.02.01', 'Para vãos até 15,0 metros.', 'm'),
(1120, '06.07.02.02', 'Para vãos de comprimento superior a 15,0 metros e igual ou inferior a 25,0 metros.', 'm'),
(1121, '06.07.02.03', 'Para vãos de comprimento superior a 25,0 metros e igual ou inferior a 35,0 metros.', 'm'),
(1122, '06.07.02.04', 'Para vãos de comprimento superior a 35,0 metros.', 'm'),
(1123, '06.07.03', 'Cimbre autolançado para montagem dos moldes necessários à execução do tabuleiro, incluindo trabalhos de montagem, desmontagem e operação, eventual sinalização provisória e estruturas de proteção.', 'un'),
(1124, '06.07.04', 'Cimbres móveis para a execução de tabuleiros por avanços sucessivos, incluindo estruturas para a execução dos fechos.', 'un'),
(1125, '06.07.05', 'Sistemas de equilíbrio exterior das consolas, incluindo torres metálicas, tirantes e unidades de ancoragem.', 'un'),
(1126, '06.07.06', 'Bailéus móveis para a construção do tabuleiro, incluindo montagem desmontagem e operação bem como eventuais caminhos de rolamento.', 'un'),
(1127, '06.07.07', 'Sistema de lançamento incremental, incluindo parque de pré-fabricação, equipamento de empurre, nariz metálico e respetiva fixação, guias laterais, placas de deslize, operações de montagem de equipamento, lançamento e desmontagem, incluindo todos os demais trabalhos necessários.', 'un'),
(1128, '06.08', 'Aterro junto a estruturas ou elementos estruturais, incluindo o fornecimento dos materiais, eventual escavação em empréstimo, transporte, espalhamento e compactação:', ''),
(1129, '06.08.01', 'Em fundações.', 'm3'),
(1130, '06.08.02', 'Em encontros, nomeadamente do tipo perdido ou cofre, ou no tardoz de montantes e muros de ala.', 'm3'),
(1131, '06.08.03', 'Em encontros do tipo terra armada.', 'm3'),
(1132, '06.09', 'Diversos:', ''),
(1133, '06.09.01', 'Placas de esferovite, incluindo fornecimento e colocação:', ''),
(1134, '06.09.01.01', 'Com 0,020 m de espessura.', 'm2'),
(1135, '06.09.01.02', 'Com 0,025 m de espessura.', 'm2'),
(1136, '06.09.01.03', 'Com 0,030 m de espessura.', 'm2'),
(1137, '06.09.02', 'Placas de aglomerado negro de cortiça, incluindo fornecimento e colocação:', ''),
(1138, '06.09.02.01', 'Com 0,020 m de espessura.', 'm2'),
(1139, '06.09.02.02', 'Com 0,025 m de espessura.', 'm2'),
(1140, '06.09.02.03', 'Com 0,030 m de espessura.', 'm2'),
(1141, '06.09.03', 'Fornecimento e colocação de tubos de PVC nos enchimentos de passeios ou passadiços de serviço.', 'm'),
(1142, '06.09.04', 'Execução de caixas para ligação aos tubos instalados nos passeios ou passadiços de serviço:', ''),
(1143, '06.09.04.01', 'Na transição da plataforma da via para a obra de arte.', 'un'),
(1144, '06.09.04.02', 'Sobre a obra de arte.', 'un'),
(1145, '06.09.05', 'Esgotos pluviais do tabuleiro, incluindo fornecimento e aplicação:', ''),
(1146, '06.09.05.01', 'Caixas de receção, incluindo grelha e aro.', 'un'),
(1147, '06.09.05.02', 'Tubos de ferro galvanizado para esgoto do tabuleiro.', 'un'),
(1148, '06.09.05.03', 'Tubos de descarga em PVC.', 'm'),
(1149, '06.09.05.04', 'Descidas de talude, revestidas com betão,  de secção semicircular, com 0,30 m de diâmetro.', 'm'),
(1150, '06.09.05.05', 'Execução de caixas de ligação das caleiras de taludes à valeta.', 'un'),
(1151, '06.09.06', 'Revestimento dos taludes sob a obra de arte e/ou nos cones de aterro, incluindo fornecimento e colocação das peças ou dos materiais necessários:', ''),
(1152, '06.09.06.01', 'Com lajetas em betão prefabricadas.', 'm2'),
(1153, '06.09.06.02', 'Com enrocamento argamassado.', 'm2'),
(1154, '06.09.06.03', 'Com material granular britado.', 'm2'),
(1155, '06.09.07', 'Fornecimento e colocação de guardas metálicas de segurança, no tabuleiro.', 'm'),
(1156, '06.09.08', 'Fornecimento e colocação de guardas metálicas de segurança, para proteção de pilares.', 'm'),
(1157, '06.09.09', 'Fornecimento e colocação de guarda-corpos.', 'm'),
(1158, '06.09.10', 'Fornecimento e colocação de betão de agregados leves para enchimento de passeios, passadiços de serviço e separadores.', 'm3'),
(1159, '06.09.11', 'Fornecimento e colocação de lancil em passeios e/ou separadores:', ''),
(1160, '06.09.11.01', 'Em lancil de betão prefabricado.', 'm'),
(1161, '06.09.11.02', 'Em lancil de betão armado, executado \"in situ\" em 2ª fase.', 'm'),
(1162, '06.09.12', 'Revestimento de passeios e/ou separadores, incluindo fornecimento e colocação:', ''),
(1163, '06.09.12.01', 'Com argamassa com 0,02 m de espessura.', 'm2'),
(1164, '06.09.12.02', 'Com argamassa esquartelada.', 'm2'),
(1165, '06.09.12.03', 'Com mosaico hidráulico.', 'm2'),
(1166, '06.09.12.04', 'Com blocos de pedra.', 'm2'),
(1167, '06.09.13', 'Cornijas prefabricadas, incluindo fornecimento e colocação.', 'm'),
(1168, '06.09.14', 'Aparelhos de apoio, incluindo fornecimento e colocação:', ''),
(1169, '06.09.14.01', 'Em neoprene cintado.', 'un'),
(1170, '06.09.14.02', 'Em neoprene cintado circulares.', 'un'),
(1171, '06.09.14.03', 'Em neoprene cintado dotado de placa de deslizamento em teflon.', 'un'),
(1172, '06.09.14.04', 'Em neoprene cintado dotado de placa de deslizamento em teflon, com guiamento.', 'un'),
(1173, '06.09.14.05', 'Do tipo panela, fixos.', 'un'),
(1174, '06.09.14.06', 'Do tipo panela unidirecionais.', 'un'),
(1175, '06.09.14.07', 'Do tipo panela multidirecionais.', 'un'),
(1176, '06.09.14.08', 'Do tipo linear em aço, fixos.', 'un'),
(1177, '06.09.14.09', 'Do tipo linear em aço unidirecionais.', 'un'),
(1178, '06.09.14.10', 'Do tipo linear em aço multidirecionais.', 'un'),
(1179, '06.09.15', 'Dispositivos de amortecimento sísmico:', ''),
(1180, '06.09.15.01', 'Batentes em blocos de neoprene, incluindo chapa de fixação, chumbadouros e todos os trabalhos acessórios.', 'un'),
(1181, '06.09.15.02', 'Aparelhos oleodinâmicos, com características definidas no projeto.', 'un'),
(1182, '06.09.16', 'Tubos de ferro e redes de proteção para arejamento do interior do tabuleiro e pilares.', 'un'),
(1183, '06.09.17', 'Portas metálicas para acesso ao interior dos pilares e encontros', 'un'),
(1184, '06.09.18', 'Escadas metálicas no interior dos pilares incluindo fixações, plataformas, e todos os materiais e trabalhos acessórios.', 'un'),
(1185, '06.09.19', 'Alçapões metálicos no tabuleiro para acesso aos pilares.', 'un'),
(1186, '06.09.20', 'Bainhas de polipropileno nos tirantes', 'm'),
(1187, '06.09.21', 'Execução de cortina drenante no tardoz de montantes e/ou muros de ala, incluindo coletor ou caleira de fundo:', ''),
(1188, '06.09.21.01', 'Com materiais granulares com D > 0,20 m.', 'm2'),
(1189, '06.09.21.02', 'Com geossintéticos.', 'm2'),
(1190, '06.09.22', 'Boeiros em montantes e/ou muros de ala.', 'un'),
(1191, '06.09.23', 'Caleiras no tardoz de muros de ala, revestidas a betão, para drenagem de águas pluviais:', ''),
(1192, '06.09.23.01', 'De secção triangular ou trapezoidal.', 'm'),
(1193, '06.09.23.02', 'De secção semicircular com 0,30 m de diâmetro.', 'm'),
(1194, '06.09.24', 'Execução de drenos transversais na extremidade de lajes de transição, incluindo fornecimento e colocação de todos os materiais necessários.', 'm'),
(1195, '06.09.25', 'Fornecimento e colocação de juntas de dilatação.', 'm'),
(1196, '06.09.26', 'Fornecimento e colocação de lâminas de estanquicidade em PVC.', 'm'),
(1197, '06.09.27', 'Batentes de travamento transversais em  neoprene, nos encontros incluindo fornecimento e colocação.', 'un'),
(1198, '06.09.28', 'Impermeabilização de elementos enterrados, com emulsão betuminosa.', 'm2'),
(1199, '06.09.29', 'Impermeabilização do tabuleiro conforme especificado no projeto, incluindo fornecimento e aplicação dos produtos impermeabilizantes.', 'm2'),
(1200, '06.09.30', 'Perfil rígido no separador, incluindo chumbadouros.', 'm'),
(1201, '06.09.31', 'Trabalhos específicos em alargamento de obras de arte:', ''),
(1202, '06.09.31.01', 'Demolição de estruturas existentes de betão armado, ou pré-esforçado.', 'm3'),
(1203, '06.09.31.02', 'Demolição de elementos de betão armado, ou armado pré-esforçado, em estruturas existentes, e posterior ligação a novos elementos, incluindo tratamento de superfícies.', 'm3'),
(1204, '06.09.31.03', 'Terraplenagem nos acessos, incluindo todos os trabalhos necessários à manutenção das condições de circulação em segurança, de veículos e/ou peões.', 'm3'),
(1205, '06.09.31.04', 'Tratamento para recuperação de guarda corpos existentes, incluindo desmontagem e montagem, e todos os trabalhos necessários.', 'm'),
(1206, '06.09.32', 'Pintura de superfícies de betão com espessuras e tintas definidas no projeto.', 'm2'),
(1207, '06.09.33', 'Logótipo IE em bronze, nos acrotérios, incluindo fornecimento e colocação.', 'un'),
(1208, '06.09.34', 'Inscrições nos acrotérios, de acordo com o definido no projeto.', 'un'),
(1209, '06.09.35', 'Passagens superiores metálicas para peões, incluindo acessos.', 'm'),
(1210, '06.09.36', 'Encontros do tipo terra armada, não incluindo aterros.', 'm2'),
(1211, '06.09.37', 'Drenos transversais a colocar a toda a largura da plataforma, no fim das lajes de transição.', 'm'),
(1212, '06.10', 'Outros Trabalhos:', ''),
(1213, '07', 'Túneis', ''),
(1214, '07.01', 'Trabalhos preparatórios:', ''),
(1215, '07.01.01', 'Desmatação incluindo derrube de árvores, desenraizamento, limpeza do terreno, carga, transporte e colocação dos produtos em vazadouro e eventual indemnização por depósito.', 'm2'),
(1216, '07.01.02', 'Demolição de construções (excluindo muros) incluindo carga, transporte e colocação dos produtos em vazadouro, com eventual indemnização por depósito.', 'm3'),
(1217, '07.01.03', 'Demolição de muros incluindo carga, transporte e colocação dos produtos em vazadouro, com eventual indemnização por depósito.', 'm2'),
(1218, '07.01.04', 'Desativação de poços, nascentes ou outras captações existentes:', ''),
(1219, '07.01.04.01', 'Enchimento de poços com enrocamento ou outro material com características drenantes equivalentes.', 'm3'),
(1220, '07.01.04.02', 'Captação e condução de águas.', 'm'),
(1221, '07.01.05', 'Decapagem de terra vegetal com a(s) espessura(s) média(s) definida(s) no projeto e sua colocação em vazadouro, ou depósito provisório para posterior utilização, incluindo carga, transporte, proteção e eventual indemnização por depósito.', 'm2'),
(1222, '07.01.06', 'Observação e eventual reforço de estruturas a preservar.', 'um'),
(1223, '07.02', 'Escavação e colocação em aterro ou depósito:', ''),
(1224, '07.02.01', 'Escavação incluindo o desmonte, drenagem temporária, ventilação, carga e transporte até à zona de colocação, em aterro ou depósito:', ''),
(1225, '07.02.01.01', 'A céu aberto em terrenos de qualquer natureza.', 'm3'),
(1226, '07.02.01.02', 'Em túnel - ZG 3.', 'm3'),
(1227, '07.02.01.03', 'Em túnel - ZG 2.', 'm3'),
(1228, '07.02.01.04', 'Em túnel - ZG 1.', 'm3'),
(1229, '07.02.02', 'Colocação em aterro dos materiais provenientes da escavação, incluindo espalhamento e compactação.', 'm3'),
(1230, '07.02.03', 'Colocação em depósito provisório ou definitivo dos materiais provenientes da escavação, incluindo espalhamento e regularização.', 'm3'),
(1231, '07.03', 'Suportes iniciais:', ''),
(1232, '07.03.01', 'Emboquilhamentos:', ''),
(1233, '07.03.01.01', 'Pregagens, incluindo a furação, colocação, posicionadores, selagem e todos os trabalhos necessários, com varão de aço com diâmetro de 25 mm.', 'm'),
(1234, '07.03.01.02', 'Pregagens, incluindo a furação, colocação, posicionadores, selagem e todos os trabalhos necessários, com varão de aço com diâmetro de 32 mm.', 'm'),
(1235, '07.03.01.03', 'Pregagens instaladas por vibrocravação, incluindo todos os trabalhos necessários e acessórios.', 'm'),
(1236, '07.03.01.04', 'Rede metálica electrossoldada, incluindo montagem, fixação e todos os acessórios.', 'm2'),
(1237, '07.03.01.05', 'Betão projetado na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 5 cm.', 'm2'),
(1238, '07.03.01.06', 'Betão projetado na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 10 cm.', 'm2'),
(1239, '07.03.01.07', 'Betão projetado na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 15 cm.', 'm2'),
(1240, '07.03.01.08', 'Betão projetado na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 20 cm.', 'm2'),
(1241, '07.03.01.09', 'Betão projetado na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 25 cm.', 'm2'),
(1242, '07.03.01.10', 'Cambotas metálicas, na constituição do pré-túnel e suporte inicial incluindo colocação e todos os acessórios, em perfil TH.', 'kg'),
(1243, '07.03.01.11', 'Cambotas metálicas, na constituição do pré-túnel e suporte inicial incluindo colocação e todos os acessórios, em perfil HEB.', 'Kg'),
(1244, '07.03.01.12', 'Cambotas metálicas, na constituição do pré-túnel e suporte inicial incluindo colocação e todos os acessórios, trianguladas.', 'kg'),
(1245, '07.03.01.13', 'Cambotas metálicas, na constituição do pré-túnel e suporte inicial incluindo colocação e todos os acessórios, de outros tipos.', 'kg'),
(1246, '07.03.02', 'Em ZG 3:', ''),
(1247, '07.03.02.01', 'Micro-estacas em tubo de aço munidas de manchetes, incluindo os trabalhos de furação, injeção e instalação de varão de aço.', 'm'),
(1248, '07.03.02.02', 'Pregagens, incluindo a furação, colocação, posicionadores, selagem e todos os trabalhos necessários, com varão de aço de diâmetro de 25 mm.', 'm'),
(1249, '07.03.02.03', 'Pregagens, incluindo a furação, colocação, posicionadores, selagem e todos os trabalhos necessários, com varão de aço de diâmetro de 32 mm.', 'm'),
(1250, '07.03.02.04', 'Pregagens instaladas por vibrocravação, incluindo todos os trabalhos necessários e acessórios.', 'm'),
(1251, '07.03.02.05', 'Pregagens expansivas tipo \"Swellex\", incluindo furação e todos os trabalhos necessários e acessórios.', 'm'),
(1252, '07.03.02.06', 'Pregagens autoperfurantes tipo \"Titan\" , incluindo todos os trabalhos necessários e acessórios.', 'm'),
(1253, '07.03.02.07', 'Pregagens de varão de fibra de vidro, com diâmetro de 20 mm, incluindo furação, selagem e todos os trabalhos necessários e acessórios.', 'm'),
(1254, '07.03.02.08', 'Rede metálica electrossoldada, incluindo montagem, fixação e todos os acessórios.', 'm2'),
(1255, '07.03.02.09', 'Cambotas metálicas na constituição do suporte inicial incluindo colocação e todos os acessórios, em perfil TH.', 'kg'),
(1256, '07.03.02.10', 'Cambotas metálicas na constituição do suporte inicial incluindo colocação e todos os acessórios, em perfil HEB.', 'kg'),
(1257, '07.03.02.11', 'Cambotas metálicas na constituição do suporte inicial incluindo colocação e todos os acessórios, trianguladas.', 'kg'),
(1258, '07.03.02.12', 'Cambotas metálicas na constituição do suporte inicial incluindo colocação e todos os acessórios, de outros tipos.', 'Kg'),
(1259, '07.03.02.13', 'Betão projetado na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 5 cm.', 'm2'),
(1260, '07.03.02.14', 'Betão projetado na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 10 cm.', 'm2'),
(1261, '07.03.02.15', 'Betão projetado na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 15 cm.', 'm2'),
(1262, '07.03.02.16', 'Betão projetado na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 20 cm.', 'm2'),
(1263, '07.03.02.17', 'Betão projetado na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 25 cm.', 'm2'),
(1264, '07.03.02.18', 'Betão projetado com fibras metálicas na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 10 cm.', 'm2'),
(1265, '07.03.02.19', 'Betão projetado com fibras metálicas na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 15 cm.', 'm2'),
(1266, '07.03.02.20', 'Betão projetado com fibras metálicas na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 20 cm.', 'm2'),
(1267, '07.03.02.21', 'Betão projetado com fibras metálicas na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 25 cm.', 'm2'),
(1268, '07.03.03', 'Em ZG 2:', ''),
(1269, '07.03.03.01', 'Pregagens, incluindo a furação, colocação, posicionadores, selagem e todos os trabalhos necessários, com varão de aço de diâmetro de 25 mm.', 'm'),
(1270, '07.03.03.02', 'Pregagens, incluindo a furação, colocação, posicionadores, selagem e todos os trabalhos necessários, com varão de aço de diâmetro de 32 mm.', 'm'),
(1271, '07.03.03.03', 'Pregagens expansivas tipo \"Swellex\", incluindo furação e todos os trabalhos necessários e acessórios.', 'm'),
(1272, '07.03.03.04', 'Rede metálica electrossoldada, incluindo montagem, fixação e todos os acessórios.', 'm2'),
(1273, '07.03.03.05', 'Cambotas metálicas na constituição do suporte inicial incluindo colocação e todos os acessórios, em perfil TH.', 'kg'),
(1274, '07.03.03.06', 'Cambotas metálicas na constituição do suporte inicial incluindo colocação e todos os acessórios, em perfil HEB.', 'kg'),
(1275, '07.03.03.07', 'Cambotas metálicas na constituição do suporte inicial incluindo colocação e todos os acessórios, trianguladas.', 'kg'),
(1276, '07.03.03.08', 'Cambotas metálicas na constituição do suporte inicial incluindo colocação e todos os acessórios, de outros tipos.', 'kg'),
(1277, '07.03.03.09', 'Betão projetado na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 5 cm.', 'm2'),
(1278, '07.03.03.10', 'Betão projetado na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 10 cm.', 'm2'),
(1279, '07.03.03.11', 'Betão projetado na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 15 cm.', 'm2'),
(1280, '07.03.03.12', 'Betão projetado com fibras metálicas na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 5 cm.', 'm2'),
(1281, '07.03.03.13', 'Betão projetado com fibras metálicas na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 10 cm.', 'm2'),
(1282, '07.03.03.14', 'Betão projetado com fibras metálicas na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 15 cm.', 'm2'),
(1283, '07.03.04', 'Em ZG 1:', ''),
(1284, '07.03.04.01', 'Pregagens, incluindo furação, colocação, posicionadores, selagem e todos os trabalhos necessários, com varão de aço de diâmetro de 25 mm.', 'm'),
(1285, '07.03.04.02', 'Pregagens, incluindo furação, colocação, posicionadores, selagem e todos os trabalhos necessários, com varão de aço de diâmetro de 32 mm.', 'm'),
(1286, '07.03.04.03', 'Pregagens expansivas tipo \"Swellex\", incluindo furação e todos os trabalhos necessários e acessórios.', 'm'),
(1287, '07.03.04.04', 'Rede metálica electrossoldada, incluindo montagem, fixação e todos os acessórios.', 'm2'),
(1288, '07.03.04.05', 'Betão projetado na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 5 cm.', 'm2'),
(1289, '07.03.04.06', 'Betão projetado na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 10 cm.', 'm2'),
(1290, '07.03.04.07', 'Betão projetado com fibras metálicas na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 5 cm.', 'm2'),
(1291, '07.03.04.08', 'Betão projetado com fibras metálicas na proteção e suporte de superfícies escavadas, aplicado em camadas com espessura mínima de 5 cm, na espessura final de 10 cm.', 'm2'),
(1292, '07.03.05', 'Injeções:', ''),
(1293, '07.03.05.01', 'Injeções de consolidação, incluindo furação e todos os trabalhos necessários, com caldas de cimento.', 'kg'),
(1294, '07.03.05.02', 'Injeções de consolidação, incluindo furação e todos os trabalhos necessários, com outros produtos.', 'kg'),
(1295, '07.04', 'Drenagem e impermeabilização:', ''),
(1296, '07.04.01', 'Dreno colector em PVC a colocar na base dos hesteais do túnel para drenagem do extradorso, incluindo todos os trabalhos acessórios e ligações:', ''),
(1297, '07.04.01.01', 'Com diâmetro de 100 mm.', 'm'),
(1298, '07.04.01.02', 'Com diâmetro de 150 mm.', 'm'),
(1299, '07.04.02', 'Dreno colector longitudinal do pavimento em PVC, crepinado na meia calote superior, a colocar junto a um dos lancis para drenagem das águas de fundação do pavimento, infiltrações, derrames e águas de lavagem, incluindo todos os trabalhos de assentamento e envolvimento com mistura drenante e geotêxti', ''),
(1300, '07.04.02.01', 'Com diâmetro de 200 mm.', 'm'),
(1301, '07.04.02.02', 'Com diâmetro de 250 mm.', 'm'),
(1302, '07.04.02.03', 'Com diâmetro de 300 mm.', 'm'),
(1303, '07.04.02.04', 'Com diâmetro de 400 mm.', 'm'),
(1304, '07.04.03', 'Colector longitudinal em PVC para condução exclusiva das águas do extradorso do túnel, incluindo todos os trabalhos acessórios e ligações:', ''),
(1305, '07.04.03.01', 'Com diâmetro de 200 mm.', 'm'),
(1306, '07.04.03.02', 'Com diâmetro de 300 mm.', 'm'),
(1307, '07.04.03.03', 'Com diâmetro de 400 mm.', 'm'),
(1308, '07.04.04', 'Ramais de ligação em PVC, incluindo todos os trabalhos acessórios e ligações:', ''),
(1309, '07.04.04.01', 'Com diâmetro de 50 mm.', 'm'),
(1310, '07.04.04.02', 'Com diâmetro de 100 mm.', 'm'),
(1311, '07.04.05', 'Geotêxtil não tecido a colocar no extradorso do túnel, incluindo fixação, sobreposições, emendas e todos os trabalhos acessórios:', ''),
(1312, '07.04.05.01', 'De 500 g/m2.', 'm2'),
(1313, '07.04.05.02', 'De 700 g/m2.', 'm2'),
(1314, '07.04.06', 'Geocompósito tipo plano para reforço eventual da drenagem do extradorso do túnel, a sobrepor a manta de geotêxtil, incluindo todos os trabalhos de colocação, fixação e ligação ao dreno colector longitudinal do extradorso.', 'm2'),
(1315, '07.04.07', 'Geodreno para reforço eventual da drenagem do extradorso do túnel, colocado transversalmente à calote sobrepondo-se à manta de geotêxtil com diâmetro de 50mm, incluindo todos os trabalhos de fixação e ligações ao dreno colector longitudinal do extradorso.', 'm'),
(1316, '07.04.08', 'Lancil prefabricado com colector de ranhura longitudinal para as águas de lavagem, infiltrações e líquidos derramados, incluindo os trabalhos de assentamentos e armaduras, cantoneiras em aço galvanizado a quente com recobrimento de 80 microns e aplicação.', 'm'),
(1317, '07.04.09', 'Caixa de visita, incluindo tampa metálica em aço galvanizado a quente com recobrimento de 80 microns, e enchimentos para pendentes.', 'um'),
(1318, '07.04.10', 'Furação do maciço para instalação de drenos profundos ou captação de ressurgências:', ''),
(1319, '07.04.10.01', 'Em ZG 3.', 'm'),
(1320, '07.04.10.02', 'Em ZG 2.', 'm'),
(1321, '07.04.10.03', 'Em ZG 1.', 'm'),
(1322, '07.04.11', 'Geodreno em PVC com diâmetro de 50 mm, para drenagem do maciço e respetivos acessórios de ligação à rede de drenagem.', 'm'),
(1323, '07.04.12', 'Impermeabilização das superfícies de betão do túnel a céu aberto por pintura em duas demãos cruzadas de produto betuminoso tipo \"Flintcoat\".', 'm2'),
(1324, '07.04.13', 'Lâmina de impermeabilização em PVC no interior do túnel, incluindo todos os trabalhos de fixação, soldadura e ensaios de estanqueidade.', 'm2'),
(1325, '07.04.14', 'Vedante WS em PVC com 200 mm de largura na impermeabilização das juntas entre troços de galeria.', 'm'),
(1326, '07.05', 'Revestimento definitivo:', ''),
(1327, '07.05.01', 'Aço:', ''),
(1328, '07.05.01.01', 'Aço A400NR em varão incluindo empalmes, armaduras de montagem e outros trabalhos acessórios.', 'kg'),
(1329, '07.05.01.02', 'Rede metálica electrossoldada tipo CQ38 em soleiras do túnel, incluindo todos os acessórios.', 'm2'),
(1330, '07.05.02', 'Betões tipo C25/30 (B30.1) incluindo cofragens e todos os trabalhos acessórios:', ''),
(1331, '07.05.02.01', 'Nas sapatas e soleira em arco invertido.', 'm3'),
(1332, '07.05.02.02', 'Nos hasteais e abóbada.', 'm3'),
(1333, '07.05.02.03', 'Nos hasteais e abóbada da(s) galeria(s) de ligação.', 'm3'),
(1334, '07.05.02.04', 'Nos hasteais e abóbada da(s) galeria(s) de peões.', 'm3'),
(1335, '07.05.02.05', 'Em nichos.', 'm3'),
(1336, '07.05.03', 'Betão tipo C 12/15 em enchimentos.', 'm3'),
(1337, '07.05.04', 'Caleira técnica:', ''),
(1338, '07.05.04.01', 'Caleira técnica prefabricada, incluindo armaduras, cantoneiras em aço galvanizado a quente com recobrimento de 80 microns e aplicação.', 'm'),
(1339, '07.05.04.02', 'Lajetas prefabricadas de betão com aro metálico em cantoneiras em aço galvanizado a quente com recobrimento mínimo de 80 microns no fecho das caleiras técnicas, incluindo todos os trabalhos de montagem.', 'm'),
(1340, '07.05.04.03', 'Fornecimento e aplicação de tubo de PVC nos passeios da galeria de ligação entre túneis, incluindo todos os trabalhos acessórios, com diâmetro de 200 mm.', 'm'),
(1341, '07.05.04.04', 'Fornecimento e aplicação de tubo de PVC nos passeios da galeria de ligação entre túneis, incluindo todos os trabalhos acessórios, com diâmetro de 150 mm.', 'm'),
(1342, '07.06', 'Instrumentação e observação:', ''),
(1343, '07.06.01', 'Tubos de inclinómetros com todos os acessórios, incluindo furação, colocação de marcas de nivelamento topográfico de precisão e todos os trabalhos de apoio.', 'm'),
(1344, '07.06.02', 'Execução de furos e instalação de tubos em PVC para piezómetros, incluindo todos os trabalhos de apoio, proteção e manutenção.', 'm'),
(1345, '07.06.03', 'Extensómetros multipontos incluindo todos os acessórios, trabalhos de furação, de colocação de marcas de nivelamento de precisão e todos os trabalhos de apoio.', 'm'),
(1346, '07.06.04', 'Instalação de marcas de precisão para a constituição de bases de nivelamento de precisão incluindo todos os trabalhos de apoio e observação.', 'un'),
(1347, '07.06.05', 'Instalação de bases de convergência nas secções do interior do(s) túnel(eis) incluindo todos os trabalhos de apoio à observação.', 'un'),
(1348, '07.06.06', 'Fornecimento, instalação e observação de sismógrafos incluindo a construção de abrigos de proteção, manutenção e todos os trabalhos acessórios.', 'un'),
(1349, '07.07', 'Obras complementares:', ''),
(1350, '07.07.01', 'Aterro sobre obra ou nas suas imediações, incluindo compactação no preenchimento das escavações na zona do túnel a céu aberto incluindo transporte, carga, espalhamento e controlo de compactação e regularização de superfícies finais.', 'm3'),
(1351, '07.07.02', 'Execução de ensaios prévios em ancoragens, incluindo todas as operações de colocação em tensão e todos os trabalhos necessários e acessórios.', 'm'),
(1352, '07.07.03', 'Execução de ancoragens provisórias, incluindo furação, ensaios de permeabilidade, instalação das armaduras, injeção, selagem e todos os materiais necessários, os ensaios de receção e as operações de colocação em tensão:', ''),
(1353, '07.07.03.01', 'Com tração inferior ou igual a 50 ton.', 'm'),
(1354, '07.07.03.02', 'Com tração superior a 50 ton e inferior ou igual a 100 ton.', 'm'),
(1355, '07.07.03.03', 'Com tração superior a 100 ton e inferior ou igual a 150 ton.', 'm'),
(1356, '07.07.03.04', 'Com tração superior a 150 ton.', 'm'),
(1357, '07.07.04', 'Execução de ancoragens definitivas, incluindo furação, ensaios de permeabilidade, instalação das armaduras, injeção, selagem e todos os materiais necessários, os ensaios de receção e as operações de colocação em tensão:', ''),
(1358, '07.07.04.01', 'Com tração inferior ou igual a 50 ton.', 'm'),
(1359, '07.07.04.02', 'Com tração superior a 50 ton e inferior ou igual a 100 ton.', 'm'),
(1360, '07.07.04.03', 'Com tração superior a 100 ton e inferior ou igual a 150 Ton.', 'm'),
(1361, '07.07.04.04', 'Com tração superior a 150 Ton.', 'm'),
(1362, '07.07.05', 'Células de carga para medição do pré-esforço em ancoragens incluindo todos os acessórios e todos os trabalhos necessários.', 'un'),
(1363, '07.08', 'Equipamentos:', 'vg'),
(1364, '07.08.01', 'Instalações elétricas, de acordo com o projeto.', 'vg'),
(1365, '07.08.02', 'Iluminação, de acordo com o projeto.', 'vg'),
(1366, '07.08.03', 'Ventilação, de acordo com o projeto.', 'vg'),
(1367, '07.08.04', 'Segurança, de acordo com o projeto.', 'vg'),
(1368, '07.08.05', 'Gestão de tráfego, de acordo com o projeto.', 'vg'),
(1369, '07.08.06', 'Telecomunicações, de acordo com o projeto.', 'vg'),
(1370, '07.08.07', 'Supervisão e comando, de acordo com o projeto.', 'vg'),
(1371, '07.09', 'Outros Trabalhos:', ''),
(1372, '08', 'Diversos', ''),
(1373, '08.01', 'Montagem e desmontagem do estaleiro, incluindo o arranjo paisagístico da área ocupada após desmontagem.', 'vg'),
(1374, '08.02', 'Montagem e desmontagem, no estaleiro, do laboratório equipado com todo o material necessário à execução dos ensaios previstos para o controlo de qualidade, e com área igual ou superior à definida.', 'vg'),
(1375, '08.03', 'Fornecimentos à fiscalização:', ''),
(1376, '08.03.01', 'Instalações incluindo fornecimento e manutenção de escritórios, residências, e consumíveis necessário ao seu funcionamento.', 'vg'),
(1377, '08.03.02', 'Transportes, incluindo seguros, combustíveis e manutenção.', 'vg'),
(1378, '08.03.03', 'Equipamento informático, incluindo software e consumíveis.', 'vg'),
(1379, '08.03.04', 'Montagem e desmontagem do laboratório para a fiscalização, incluindo consumíveis.', 'vg'),
(1380, '08.03.05', 'Sistema de comunicações.', 'vg'),
(1381, '08.03.06', 'Coberturas, fotografia e vídeo.', 'vg'),
(1382, '08.04', 'Execução do projeto de telas finais dos trabalhos realizados, a entregar ao IE quando da receção provisória da obra.', 'vg'),
(1383, '08.05', 'Execução de desvios provisórios de tráfego, incluindo sinalização adequada.', 'vg'),
(1384, '08.06', 'Implementação do plano de segurança e saúde incluindo os meios humanos, materiais e equipamentos.', 'vg'),
(1385, '08.07', 'Implementação do Acompanhamento Ambiental da Empreitada, incluindo os meios humanos, materiais e equipamentos.', 'vg'),
(1386, '08.08', 'Acompanhamento da obra por equipa de arqueologia de acordo com C.E.', 'vg'),
(1387, '08.09.1', 'Reboco', 'm3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_patologiagrupo`
--

CREATE TABLE `tbl_patologiagrupo` (
  `id_grupo` tinyint(2) NOT NULL,
  `grupo` varchar(49) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tbl_patologiagrupo`
--

INSERT INTO `tbl_patologiagrupo` (`id_grupo`, `grupo`) VALUES
(1, 'Pavimento'),
(2, 'Talude'),
(3, 'Caleiras e valetas de pé de talude'),
(4, 'Passagens hidráulicas'),
(5, 'Muros'),
(6, 'Obras de arte'),
(7, 'Guardas de segurança'),
(8, 'Pavimentos em betão (linhas de água à superfície)'),
(9, 'Sinalização horizontal'),
(10, 'Sinalização vertical'),
(11, 'Caleiras e valetas de crista'),
(12, 'Delineadores'),
(13, 'Marcadores'),
(14, 'Caleiras e valetas de plataforma');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_patologiaitens`
--

CREATE TABLE `tbl_patologiaitens` (
  `id_item` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `nivel` varchar(2) NOT NULL,
  `patologia` varchar(100) NOT NULL,
  `descr` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tbl_patologiaitens`
--

INSERT INTO `tbl_patologiaitens` (`id_item`, `id_grupo`, `nivel`, `patologia`, `descr`) VALUES
(1, 1, 'N1', 'Betão Betuminoso_Ninho_N1', 'Profundidade máxima da cavidade < 1 cm'),
(2, 1, 'N2', 'Betão Betuminoso_Ninho_N2', '1 cm < Profundidade máxima da cavidade < 4 cm'),
(3, 1, 'N3', 'Betão Betuminoso_Ninho_N3', 'Profundidade máxima da cavidade > 4 cm ou várias de qualquer profundidade na mesma secção transversal'),
(4, 1, 'N1', 'Betão Betuminoso_Pelada_N1', 'Largura < 20 cm'),
(5, 1, 'N2', 'Betão Betuminoso_Pelada_N2', '20 cm < Largura < 100 cm'),
(6, 1, 'N3', 'Betão Betuminoso_Pelada_N3', 'Largura > 100 cm ou várias peladas de qualquer largura na mesma secção transversal'),
(7, 1, 'N1', 'Betão Betuminoso_Exsudação de betume_N1', 'Largura < 20 cm'),
(8, 1, 'N2', 'Betão Betuminoso_Exsudação de betume_N2', '20 cm < Largura < 100 cm'),
(9, 1, 'N3', 'Betão Betuminoso_Exsudação de betume_N3', 'Largura > 100 cm ou várias anomalias de qualquer largura na mesma secção transversal'),
(10, 1, 'N1', 'Betão Betuminoso_Polimento do agregado_N1', 'Largura < 20 cm'),
(11, 1, 'N2', 'Betão Betuminoso_Polimento do agregado_N2', '20 cm < Largura < 100 cm'),
(12, 1, 'N3', 'Betão Betuminoso_Polimento do agregado_N3', 'Largura > 100 cm ou várias de qualquer largura na mesma secção transversal'),
(13, 1, 'N1', 'Betão Betuminoso_Assentamento localizado_N1', 'Largura < 20 cm e/ou profundidade máxima < 2 cm'),
(14, 1, 'N2', 'Betão Betuminoso_Assentamento localizado_N2', '20 cm < Largura < 100 cm e/ou 2 cm < profundidade máxima < 10 cm'),
(15, 1, 'N3', 'Betão Betuminoso_Assentamento localizado_N3', 'Largura > 100 cm ou várias anomalias de qualquer largura na mesma secção transversal e/ou profundidade máxima > 10 cm'),
(16, 1, 'N1', 'Betão Betuminoso_Desagregação superficial_N1', 'Anomalia isolada ou fração grossa do agregado solta isolada'),
(17, 1, 'N2', 'Betão Betuminoso_Desagregação superficial_N2', 'Anomalias afastadas de cerca de 50 cm em secção transversal'),
(18, 1, 'N3', 'Betão Betuminoso_Desagregação superficial_N3', 'Anomalias com afastamento inferior a 50 cm na mesma secção transversal'),
(19, 1, 'N1', 'Betão Betuminoso_Rodeira_N1', 'Profundidade máxima da rodeira < 1 cm'),
(20, 1, 'N2', 'Betão Betuminoso_Rodeira_N2', '1 cm < Profundidade máxima da rodeira < 3 cm'),
(21, 1, 'N3', 'Betão Betuminoso_Rodeira_N3', 'Profundidade máxima da rodeira > 3 cm'),
(22, 1, 'N1', 'Betão Betuminoso_Fendilhamento_N1', 'Fenda isolada com abertura insignificante (inferior a 2 mm)'),
(23, 1, 'N2', 'Betão Betuminoso_Fendilhamento_N2', 'Fenda abertura significativa (2 mm < abertura < 4 mm) ou ramificada ou com eventual perda de agregados'),
(24, 1, 'N3', 'Betão Betuminoso_Fendilhamento_N3', 'Fenda de abertura forte (abertura > 4 mm) ou em grelha (pele de crocodilo) com perda de material e/ou ascensão de finos (lamas à superfície)'),
(25, 1, 'N1', 'Pedra_Desagregação e/ou pedra solta_N1', 'Largura < 20 cm ou pedra solta isolada'),
(26, 1, 'N2', 'Pedra_Desagregação e/ou pedra solta_N2', '20 cm < Largura < 100 cm'),
(27, 1, 'N3', 'Pedra_Desagregação e/ou pedra solta_N3', 'Largura > 100 cm ou várias pedras soltas na mesma secção transversal'),
(28, 1, 'N1', 'Pedra_Covas (falta de pedras)_N1', 'Largura < 20 cm'),
(29, 1, 'N2', 'Pedra_Covas (falta de pedras)_N2', '20 cm < Largura < 100 cm'),
(30, 1, 'N3', 'Pedra_Covas (falta de pedras)_N3', 'Largura > 100 cm ou várias anomalias de qualquer largura na mesma secção transversal'),
(31, 1, 'N1', 'Pedra_Polimento da pedra_N1', 'Largura < 20 cm'),
(32, 1, 'N2', 'Pedra_Polimento da pedra_N2', '20 cm < Largura < 100 cm'),
(33, 1, 'N3', 'Pedra_Polimento da pedra_N3', 'Largura > 100 cm ou várias anomalias de qualquer largura na mesma secção transversal'),
(34, 1, 'N1', 'Pedra_Degradação da pedra_partida ou irregularidades_N1', 'Largura < 20 cm (pedra partida ou irregular)'),
(35, 1, 'N2', 'Pedra_Degradação da pedra_partida ou irregularidades_N2', '20 cm < Largura < 100 cm  (pedra partida ou irregular)'),
(36, 1, 'N3', 'Pedra_Degradação da pedra_partida ou irregularidades_N3', 'Largura > 100 cm ou várias anomalias de qualquer largura na mesma secção transversal (pedra partida ou irregular)'),
(37, 1, 'N1', 'Pedra_Rotação da pedra com vértice à vista_dente de tubarão_N1', 'Largura < 20 cm'),
(38, 1, 'N2', 'Pedra_Rotação da pedra com vértice à vista_dente de tubarão_N2', '20 cm < Largura < 100 cm'),
(39, 1, 'N3', 'Pedra_Rotação da pedra com vértice à vista_dente de tubarão_N3', 'Largura > 100 cm ou várias anomalias de qualquer largura na mesma secção transversal'),
(40, 1, 'N1', 'Pedra_Rotação da pedra com aresta à vista_barbatana de tubarão_N1', 'Largura < 20 cm'),
(41, 1, 'N2', 'Pedra_Rotação da pedra com aresta à vista_barbatana de tubarão_N2', '20 cm < Largura < 100 cm'),
(42, 1, 'N3', 'Pedra_Rotação da pedra com aresta à vista_barbatana de tubarão_N3', 'Largura > 100 cm ou várias anomalias de qualquer largura na mesma secção transversal'),
(43, 1, 'N1', 'Pedra_Assentamento localizado_N1', 'Largura < 20 cm e/ou profundidade máxima < 2 cm'),
(44, 1, 'N2', 'Pedra_Assentamento localizado_N2', '20 cm < Largura < 100 cm e/ou 2 cm < profundidade máxima < 10 cm'),
(45, 1, 'N3', 'Pedra_Assentamento localizado_N3', 'Largura > 100 cm ou várias anomalias de qualquer largura na mesma secção transversal e/ou profundidade máxima > 10 cm'),
(46, 1, 'N1', 'Pedra_Rodeira_N1', 'Profundidade máxima da rodeira < 1 cm'),
(47, 1, 'N2', 'Pedra_Rodeira_N2', '1 cm < profundidade máxima da rodeira < 3 cm'),
(48, 1, 'N3', 'Pedra_Rodeira_N3', 'Profundidade máxima da rodeira > 3 cm'),
(49, 2, 'N1', 'Solos ou misto_Deslizamento de detritos ou terras_N1', 'Anomalia com volume < 30 m3 ou sem invasão da faixa de rodagem (incluindo berma)'),
(50, 2, 'N2', 'Solos ou misto_Deslizamento de detritos ou terras_N2', 'Com invasão da faixa de rodagem ou 30 m3 < volume da anomalia < 60 m3'),
(51, 2, 'N3', 'Solos ou misto_Deslizamento de detritos ou terras_N3', 'Anomalia com volume > 60 m3 com ou sem invasão da faixa de rodagem'),
(52, 2, 'N1', 'Solos ou misto_Erodabilidade_N1', 'Anomalia com profundidade de rasgo < 5 cm'),
(53, 2, 'N2', 'Solos ou misto_Erodabilidade_N2', '5 cm < profundidade de rasgo da anomalia < 10 cm'),
(54, 2, 'N3', 'Solos ou misto_Erodabilidade_N3', 'Anomalia com profundidade de rasgo > 10 cm'),
(55, 2, 'N1', 'Solos ou misto_Revestimento_N1', 'Falta de revestimento < 25% em altura'),
(56, 2, 'N2', 'Solos ou misto_Revestimento_N2', '25% < Falta de revestimento < 50% em altura'),
(57, 2, 'N3', 'Solos ou misto_Revestimento_N3', 'Falta de revestimento > 50% em altura'),
(58, 3, 'N1', 'Pé de talude_Acumulação de detritos_N1', 'Volume de detritos < 1/3 da altura'),
(59, 3, 'N2', 'Pé de talude_Acumulação de detritos_N2', '1/3 da altura < Volume de detritos < 2/3 da altura'),
(60, 3, 'N3', 'Pé de talude_Acumulação de detritos_N3', 'Volume de detritos > 2/3 da altura'),
(61, 3, 'N1', 'Pé de talude_Integridade_N1', 'Com fendas'),
(62, 3, 'N2', 'Pé de talude_Integridade_N2', 'Fraturada'),
(63, 3, 'N3', 'Pé de talude_Integridade_N3', 'Inexistente ou deslocada'),
(64, 3, 'N1', 'Pé de talude_Elemento de junta_N1', 'Falta de união < 25%'),
(65, 3, 'N2', 'Pé de talude_Elemento de junta_N2', '25% < Falta de união < 50%'),
(66, 3, 'N3', 'Pé de talude_Elemento de junta_N3', 'Falta de elemento'),
(67, 9, 'N1', 'Desgaste_N1', 'Desgaste < 25%'),
(68, 9, 'N2', 'Desgaste_N2', '25% < Desgaste < 50%'),
(69, 9, 'N3', 'Desgaste_N3', 'Desgaste > 50%'),
(70, 4, 'N1', 'Pedra ou Metal_Assoreamento/entupimento_N1', 'Acumulação de materiais na proximidade ou volume da anomalia no interior < 1/4 da altura original'),
(71, 4, 'N2', 'Pedra ou Metal_Assoreamento/entupimento_N2', '1/4 da altura original < Volume da anomalia no interior < 1/2 da altura original'),
(72, 4, 'N3', 'Pedra ou Metal_Assoreamento/entupimento_N3', 'Volume da anomalia no interior > 1/2 da altura original'),
(73, 4, 'N1', 'Pedra ou Metal_Integridade_N1', 'Com fendas isoladas ou pedras partidas'),
(74, 4, 'N2', 'Pedra ou Metal_Integridade_N2', 'Fendas ramificadas ou falta de pedras'),
(75, 4, 'N3', 'Pedra ou Metal_Integridade_N3', 'Fraturados'),
(76, 8, 'N1', 'Erodabilidade_N1', 'Parcialmente erodida'),
(77, 8, 'N2', 'Erodabilidade_N2', 'Muito erodida e/ou malha de aço à vista'),
(78, 8, 'N3', 'Erodabilidade_N3', 'Destruída e/ou malha de aço corroída'),
(79, 7, 'N1', 'Metálicas ou rígidas_Integridade_N1', 'Desalinhadas'),
(80, 7, 'N2', 'Metálicas ou rígidas_Integridade_N2', 'Com impactos'),
(81, 7, 'N3', 'Metálicas ou rígidas_Integridade_N3', 'Derrubadas'),
(82, 12, 'N1', 'Integridade_N1', 'Estado razoável'),
(83, 12, 'N2', 'Integridade_N2', 'Mau estado'),
(84, 12, 'N3', 'Integridade_N3', 'Derrubados'),
(85, 13, 'N1', 'Integridade_N1', 'Sequência razoável'),
(86, 13, 'N2', 'Integridade_N2', 'Grandes interrupções na sequência'),
(87, 13, 'N3', 'Integridade_N3', 'Inoperacionais'),
(88, 10, 'N1', 'Integridade dos suportes e corpos_N1', 'Enferrujados'),
(89, 10, 'N2', 'Integridade dos suportes e corpos_N2', 'Torcidos'),
(90, 10, 'N3', 'Integridade dos suportes e corpos_N3', 'Quebrados'),
(91, 10, 'N1', 'Refletorização (superfície)_N1', 'Estado razoável'),
(92, 10, 'N2', 'Refletorização (superfície)_N2', 'Mau estado'),
(93, 10, 'N3', 'Refletorização (superfície)_N3', 'Inexistente'),
(94, 5, 'N1', 'Pedra seca ou argamassada_Integridade_N1', 'Com fendas isoladas'),
(95, 5, 'N2', 'Pedra seca ou argamassada_Integridade_N2', 'Com deformações ou fendas ramificadas'),
(96, 5, 'N3', 'Pedra seca ou argamassada_Integridade_N3', 'Destruídos'),
(97, 5, 'N1', 'Gabions_Integridade_N1', 'Com rompimento de malha'),
(98, 5, 'N2', 'Gabions_Integridade_N2', 'Com deformações'),
(99, 5, 'N3', 'Gabions_Integridade_N3', 'Em risco de instabilidade'),
(100, 5, 'N1', 'Ancorados_Integridade_N1', 'Com vestígios de água'),
(101, 5, 'N2', 'Ancorados_Integridade_N2', 'Com deformações ou bainhas deterioradas'),
(102, 5, 'N3', 'Ancorados_Integridade_N3', 'Em risco de instabilidade'),
(103, 6, 'N1', 'Aparelhos de apoio_Integridade_N1', 'Estado razoável'),
(104, 6, 'N2', 'Aparelhos de apoio_Integridade_N2', 'Estado medíocre'),
(105, 6, 'N1', 'Juntas_Integridade_N1', 'Estado razoável'),
(106, 6, 'N2', 'Juntas_Integridade_N2', 'Estado medíocre'),
(107, 6, 'N1', 'Vigas de bordadura_Integridade_N1', 'Estado razoável'),
(108, 6, 'N2', 'Vigas de bordadura_Integridade_N2', 'Estado medíocre'),
(109, 6, 'N1', 'Tabuleiro_Integridade_N1', 'Estado razoável'),
(110, 6, 'N1', 'Pilares_Integridade_N1', 'Estado razoável'),
(111, 6, 'N2', 'Pilares_Integridade_N2', 'Estado medíocre'),
(112, 6, 'N3', 'Pilares_Integridade_N3', 'Mau estado'),
(113, 1, 'N1', 'Terra batida_Cova_N1', 'Profundidade máxima da cavidade < 5 cm'),
(114, 1, 'N2', 'Terra batida_Cova_N2', '5 cm < Profundidade máxima da cavidade < 10 cm'),
(115, 1, 'N3', 'Terra batida_Cova_N3', 'Profundidade máxima da cavidade > 10 cm ou várias covas de qualquer profundidade na mesma secção transversal'),
(116, 1, 'N1', 'Terra batida_Assentamento localizado_N1', 'Largura < 20 cm e/ou profundidade máxima < 5 cm'),
(117, 1, 'N2', 'Terra batida_Assentamento localizado_N2', '20 cm < Largura < 100 cm e/ou 5 cm < profundidade máxima > 10 cm'),
(118, 1, 'N3', 'Terra batida_Assentamento localizado_N3', 'Largura > 100 cm ou várias de qualquer largura na mesma secção transversal e/ou profundidade máxima > 10 cm'),
(119, 2, 'N1', 'Rocha_Deslizamento de detritos ou terras_N1', 'Anomalia com volume < 30 m3 ou sem invasão da faixa de rodagem (incluindo berma)'),
(120, 2, 'N2', 'Rocha_Deslizamento de detritos ou terras_N2', 'Com invasão da faixa de rodagem ou 30 m3 < volume da anomalia < 60 m3'),
(121, 2, 'N3', 'Rocha_Deslizamento de detritos ou terras_N3', 'Anomalia com volume > 60 m3 com ou sem invasão da faixa de rodagem'),
(122, 2, 'N1', 'Rocha_Integridade_N1', 'Anomalia com profundidade de fenda < 5 cm'),
(123, 2, 'N2', 'Rocha_Integridade_N2', '5 cm < profundidade de fenda da anomalia < 10 cm'),
(124, 2, 'N3', 'Rocha_Integridade_N3', 'Anomalia com profundidade de fenda > 10 cm'),
(125, 9, 'N1', 'Visibilidade_N1', 'Pouca visibilidade noturna à luz dos faróis'),
(126, 9, 'N2', 'Visibilidade_N2', 'Sem visibilidade noturna à luz dos faróis'),
(127, 9, 'N3', 'Visibilidade_N3', 'Sem visibilidade diurna'),
(128, 4, 'N1', 'Betão_Assoreamento/entupimento_N1', 'Acumulação de materiais na proximidade ou volume da anomalia no interior < 1/4 da altura original'),
(129, 4, 'N2', 'Betão_Assoreamento/entupimento_N2', '1/4 da altura original < Volume da anomalia no interior < 1/2 da altura original'),
(130, 4, 'N3', 'Betão_Assoreamento/entupimento_N3', 'Volume da anomalia no interior > 1/2 da altura original'),
(131, 4, 'N1', 'Betão_Erodabilidade do Cimento_N1', 'Com fendas isoladas'),
(132, 4, 'N2', 'Betão_Erodabilidade do Cimento_N2', 'Fendas ramificadas'),
(133, 4, 'N3', 'Betão_Erodabilidade do Cimento_N3', 'Fraturada'),
(134, 1, 'N1', 'Terra batida_Rodeira_N1', 'Profundidade máxima da rodeira < 5 cm'),
(135, 1, 'N2', 'Terra batida_Rodeira_N2', '5 cm < Profundidade máxima da rodeira < 10 cm'),
(136, 1, 'N3', 'Terra batida_Rodeira_N3', 'Profundidade máxima da rodeira > 10 cm'),
(137, 11, 'N1', 'Crista_Acumulação de detritos_N1', 'Volume de detritos < 1/3 da altura'),
(138, 11, 'N2', 'Crista_Acumulação de detritos_N2', '1/3 da altura < Volume de detritos < 2/3 da altura'),
(139, 11, 'N3', 'Crista_Acumulação de detritos_N3', 'Volume de detritos > 2/3 da altura'),
(140, 11, 'N1', 'Crista_Integridade_N1', 'Com fendas'),
(141, 11, 'N2', 'Crista_Integridade_N2', 'Fraturada'),
(142, 11, 'N3', 'Crista_Integridade_N3', 'Inexistente ou deslocada'),
(143, 11, 'N1', 'Crista_Elemento de junta_N1', 'Falta de união < 25%'),
(144, 11, 'N2', 'Crista_Elemento de junta_N2', '25% < Falta de união < 50%'),
(145, 11, 'N3', 'Crista_Elemento de junta_N3', 'Falta de elemento'),
(146, 6, 'N3', 'Aparelhos de apoio_Integridade_N3', 'Mau estado'),
(147, 6, 'N3', 'Juntas_Integridade_N3', 'Mau estado'),
(148, 6, 'N3', 'Vigas de bordadura_Integridade_N3', 'Mau estado'),
(149, 6, 'N2', 'Tabuleiro_Integridade_N2', 'Estado medíocre'),
(150, 6, 'N3', 'Tabuleiro_Integridade_N3', 'Mau estado'),
(151, 5, 'N1', 'Betão de cimento_Integridade_N1', 'Com fendas isoladas'),
(152, 5, 'N2', 'Betão de cimento_Integridade_N2', 'Com deformações ou fendas ramificadas'),
(153, 5, 'N3', 'Betão de cimento_Integridade_N3', 'Fraturados'),
(154, 1, 'N2', 'Betão Betuminoso_Desmoronamento do pavimento_N2', '20cm < Largura < 150 cm'),
(155, 1, 'N3', 'Betão Betuminoso_Desmoronamento do pavimento_N3', 'Largura > 150 cm'),
(156, 1, 'N2', 'Pedra_Desmoronamento do pavimento_N2', '20 cm < Largura < 150 cm'),
(157, 1, 'N3', 'Pedra_Desmoronamento do pavimento_N3', 'Largura > 150 cm'),
(158, 4, 'N1', 'Betão_Erosão da fundação_N1', 'Descalçamento das bocas dos aquedutos numa profundidade < 10 cm'),
(159, 4, 'N2', 'Betão_Erosão da fundação_N2', '10 cm < Descalçamento das bocas dos aquedutos numa profundidade < 30 cm'),
(160, 4, 'N3', 'Betão_Erosão da fundação_N3', ' Descalçamento das bocas dos aquedutos numa profundidade > 30 cm'),
(161, 4, 'N1', 'Pedra ou Metal_Erosão da fundação_N1', 'Descalçamento das bocas dos aquedutos numa profundidade < 10 cm'),
(162, 4, 'N2', 'Pedra ou Metal_Erosão da fundação_N2', '10 cm < Descalçamento das bocas dos aquedutos numa profundidade < 30 cm'),
(163, 4, 'N3', 'Pedra ou Metal_Erosão da fundação_N3', ' Descalçamento das bocas dos aquedutos numa profundidade > 30 cm'),
(164, 1, 'N1', 'Terra batida_Ondulações_N1', 'Altura da onda < 5 cm'),
(165, 1, 'N2', 'Terra batida_Ondulações_N2', '5 cm < Altura da onda < 10 cm'),
(166, 1, 'N3', 'Terra batida_Ondulações_N3', 'Altura da onda > 10 cm'),
(167, 1, 'N1', 'Betão Betuminoso_Desmoronamento do pavimento_N1', 'Largura < 50 cm'),
(168, 1, 'N1', 'Pedra_Desmoronamento do pavimento_N1', 'Largura < 50 cm'),
(169, 14, 'N1', 'Plataforma_Acumulação de detritos_N1', 'Volume de detritos < 1/3 da altura'),
(170, 14, 'N2', 'Plataforma_Acumulação de detritos_N2', '1/3 da altura < Volume de detritos < 2/3 da altura'),
(171, 14, 'N3', 'Plataforma_Acumulação de detritos_N3', 'Volume de detritos > 2/3 da altura'),
(172, 14, 'N1', 'Plataforma_Elemento de junta_N1', 'Falta de união < 25%'),
(173, 14, 'N2', 'Plataforma_Elemento de junta_N2', '25% < Falta de união < 50%'),
(174, 14, 'N3', 'Plataforma_Elemento de junta_N3', 'Falta de elemento'),
(175, 14, 'N1', 'Plataforma_Integridade_N1', 'Com fendas'),
(176, 14, 'N2', 'Plataforma_Integridade_N2', 'Fraturada'),
(177, 14, 'N3', 'Plataforma_Integridade_N3', 'Inexistente ou deslocada'),
(178, 1, 'N1', 'Revestimento Superficial_Assentamento localizado_N1', 'Largura < 20 cm e/ou profundidade máxima < 2 cm'),
(179, 1, 'N2', 'Revestimento Superficial_Assentamento localizado_N2', '20 cm < Largura < 100 cm e/ou 2 cm < profundidade máxima < 10 cm'),
(180, 1, 'N3', 'Revestimento Superficial_Assentamento localizado_N3', 'Largura > 100 cm ou várias anomalias de qualquer largura na mesma secção transversal e/ou profundidade máxima > 10 cm'),
(181, 1, 'N1', 'Revestimento Superficial_Arrancamento de agregados_N1', 'Anomalia isolada ou fração grossa do agregado solta isolada'),
(182, 1, 'N2', 'Revestimento Superficial_Arrancamento de agregados_N2', 'Anomalias afastadas de cerca de 50 cm em secção transversal'),
(183, 1, 'N3', 'Revestimento Superficial_Arrancamento de agregados_N3', 'Anomalias com afastamento inferior a 50 cm na mesma secção transversal'),
(184, 1, 'N1', 'Revestimento Superficial_Desmoronamento do pavimento_N1', 'Largura < 50 cm'),
(185, 1, 'N2', 'Revestimento Superficial_Desmoronamento do pavimento_N2', '20cm < Largura < 150 cm'),
(186, 1, 'N3', 'Revestimento Superficial_Desmoronamento do pavimento_N3', 'Largura > 150 cm'),
(187, 1, 'N1', 'Revestimento Superficial_Exsudação de betume_N1', 'Largura < 20 cm'),
(188, 1, 'N2', 'Revestimento Superficial_Exsudação de betume_N2', '20 cm < Largura < 100 cm'),
(189, 1, 'N3', 'Revestimento Superficial_Exsudação de betume_N3', 'Largura > 100 cm ou várias anomalias de qualquer largura na mesma secção transversal'),
(190, 1, 'N1', 'Revestimento Superficial_Subida de fendas_N1', 'Fenda isolada com abertura insignificante (inferior a 2 mm)'),
(191, 1, 'N2', 'Revestimento Superficial_Subida de fendas_N2', 'Fenda abertura significativa (2 mm < abertura < 4 mm) ou ramificada ou com eventual perda de agregados'),
(192, 1, 'N3', 'Revestimento Superficial_Subida de fendas_N3', 'Fenda de abertura forte (abertura > 4 mm) ou em grelha (pele de crocodilo) com perda de material e/ou ascensão de finos (lamas à superfície)'),
(193, 1, 'N1', 'Revestimento Superficial_Ranhurado longitudinal_N1', 'Traços longitudinais visíveis sem desprendimento de agregados'),
(194, 1, 'N2', 'Revestimento Superficial_Ranhurado longitudinal_N2', 'Traços longitudinais visíveis com desprendimento parcial de agregados'),
(195, 1, 'N3', 'Revestimento Superficial_Ranhurado longitudinal_N3', 'Traços longitudinais visíveis com desprendimento total de agregados'),
(196, 1, 'N1', 'Revestimento Superficial_Pelada_N1', 'Largura < 20 cm'),
(197, 1, 'N2', 'Revestimento Superficial_Pelada_N2', '20 cm < Largura < 100 cm'),
(198, 1, 'N3', 'Revestimento Superficial_Pelada_N3', 'Largura > 100 cm ou várias peladas de qualquer largura na mesma secção transversal'),
(199, 1, 'N1', 'Revestimento Superficial_Rodeira_N1', 'Profundidade máxima da rodeira < 1 cm'),
(200, 1, 'N2', 'Revestimento Superficial_Rodeira_N2', '1 cm < Profundidade máxima da rodeira < 3 cm'),
(201, 1, 'N3', 'Revestimento Superficial_Rodeira_N3', 'Profundidade máxima da rodeira > 3 cm'),
(206, 100, 'N3', 'Sérgio alves', 'Totalmente'),
(207, 100, 'N3', 'Quebrados', 'Totalmente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_patologias`
--

CREATE TABLE `tbl_patologias` (
  `id_patolog` int(11) NOT NULL,
  `alt` int(11) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(11) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` int(11) DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `grupo` varchar(50) DEFAULT NULL,
  `id_talude` int(11) DEFAULT NULL,
  `banq` varchar(2) DEFAULT NULL,
  `via` char(2) DEFAULT NULL,
  `brm` tinyint(1) NOT NULL DEFAULT 0,
  `sobra` tinyint(1) NOT NULL DEFAULT 0,
  `pass` tinyint(1) NOT NULL DEFAULT 0,
  `sentido` varchar(11) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `foto1` varchar(30) DEFAULT NULL,
  `foto2` varchar(30) DEFAULT NULL,
  `ass` varchar(30) DEFAULT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_pcontagem`
--

CREATE TABLE `tbl_pcontagem` (
  `id_pcontagem` int(11) NOT NULL,
  `alt` int(11) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `id_estrada` int(11) DEFAULT NULL,
  `pk` double(5,3) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `sitio` varchar(100) DEFAULT NULL,
  `lat_c` varchar(16) DEFAULT NULL,
  `lat_n` double(10,8) DEFAULT NULL,
  `long_c` varchar(16) DEFAULT NULL,
  `long_n` double(10,8) DEFAULT NULL,
  `altitude` smallint(6) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` int(11) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_phidraulica`
--

CREATE TABLE `tbl_phidraulica` (
  `id_ph` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `lat_c` varchar(16) DEFAULT NULL,
  `lat_n` double(10,8) DEFAULT NULL,
  `long_c` varchar(16) DEFAULT NULL,
  `long_n` double(10,8) DEFAULT NULL,
  `altitude` int(4) DEFAULT NULL,
  `material` varchar(13) DEFAULT NULL,
  `forma` varchar(11) DEFAULT NULL,
  `largura_ph` double(4,2) DEFAULT NULL,
  `altura_ph` double(4,2) DEFAULT NULL,
  `diametro` double(4,2) DEFAULT NULL,
  `septos` int(2) DEFAULT NULL,
  `altura_sp` double(4,2) DEFAULT NULL,
  `largura_sp` double(4,2) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_propostas`
--

CREATE TABLE `tbl_propostas` (
  `id_proposta` int(4) NOT NULL,
  `data` date NOT NULL,
  `id_concurso` int(4) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `consorcio` varchar(100) NOT NULL,
  `valorp` float(12,2) NOT NULL,
  `prazo` date NOT NULL,
  `classifc` varchar(3) NOT NULL,
  `ass` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_sepcentral`
--

CREATE TABLE `tbl_sepcentral` (
  `id_sepcent` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(11) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` int(11) DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `nat` varchar(22) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_sinalhz`
--

CREATE TABLE `tbl_sinalhz` (
  `id_sinalhz` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(11) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` int(11) DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `sinalhz` varchar(11) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_sinalvt`
--

CREATE TABLE `tbl_sinalvt` (
  `id_sinalvt` int(11) NOT NULL,
  `alt` tinyint(11) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitude` int(11) DEFAULT NULL,
  `lat_c` varchar(16) DEFAULT NULL,
  `lat_n` double(10,8) DEFAULT NULL,
  `long_c` varchar(16) DEFAULT NULL,
  `long_n` double(10,8) DEFAULT NULL,
  `sinalvt` varchar(13) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` int(11) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_singularidade`
--

CREATE TABLE `tbl_singularidade` (
  `id_sing` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `lat_c` varchar(16) DEFAULT NULL,
  `lat_n` double(10,8) DEFAULT NULL,
  `long_c` varchar(16) DEFAULT NULL,
  `long_n` double(10,8) DEFAULT NULL,
  `altitude` int(4) DEFAULT NULL,
  `singularidade` varchar(30) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_sobra`
--

CREATE TABLE `tbl_sobra` (
  `id_sobra` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(11) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` int(11) DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `larg` double(3,2) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_sobratipo`
--

CREATE TABLE `tbl_sobratipo` (
  `id_sobratipo` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_sobra` int(11) NOT NULL,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(11) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` int(11) DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `terrabat` tinyint(1) DEFAULT NULL,
  `pedra` varchar(18) DEFAULT NULL,
  `revsuperf` varchar(7) DEFAULT NULL,
  `bb` varchar(6) DEFAULT NULL,
  `bclas` tinyint(1) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_talude`
--

CREATE TABLE `tbl_talude` (
  `id_talude` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(11) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` int(11) DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `nat` varchar(5) DEFAULT NULL,
  `altura` double(4,2) DEFAULT NULL,
  `inclin` tinyint(2) DEFAULT NULL,
  `tipo` varchar(9) DEFAULT NULL,
  `sentido` varchar(11) DEFAULT NULL,
  `nbanq` tinyint(2) DEFAULT NULL,
  `ass` varchar(30) NOT NULL,
  `arq` tinyint(1) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_tipobra`
--

CREATE TABLE `tbl_tipobra` (
  `id_tipo` int(11) NOT NULL,
  `tipo_obra` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `tbl_tipobra`
--

INSERT INTO `tbl_tipobra` (`id_tipo`, `tipo_obra`) VALUES
(1, 'Construção'),
(2, 'Reabilitação'),
(3, 'Melhoria'),
(4, 'Manutenção periódica / Restabelecimento de nível'),
(5, 'Manutenção corrente'),
(6, 'Urgências');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_trabalhos`
--

CREATE TABLE `tbl_trabalhos` (
  `id_trabalhos` int(11) NOT NULL,
  `trabalhos` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `tbl_trabalhos`
--

INSERT INTO `tbl_trabalhos` (`id_trabalhos`, `trabalhos`) VALUES
(1, 'Muros'),
(2, 'Valetas'),
(3, 'Guardas de segurança'),
(4, 'Bermas'),
(5, 'Pavimentação'),
(6, 'Sinalização e Segurança'),
(7, 'Terraplenagem e Taludes'),
(8, 'Drenagem'),
(9, 'Obras Acessórias'),
(10, 'Estaleiro'),
(11, 'Diversos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_trecho`
--

CREATE TABLE `tbl_trecho` (
  `id_trecho` int(11) NOT NULL,
  `alt` tinyint(1) NOT NULL DEFAULT 0,
  `reg` int(11) NOT NULL DEFAULT 0,
  `id_estrada` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pkinicio` double(5,3) DEFAULT NULL,
  `altitd_pki` int(4) DEFAULT NULL,
  `sitioi` varchar(100) DEFAULT NULL,
  `lat_ci` varchar(16) DEFAULT NULL,
  `lat_ni` double(10,8) DEFAULT NULL,
  `long_ci` varchar(16) DEFAULT NULL,
  `long_ni` double(10,8) DEFAULT NULL,
  `pkfim` double(5,3) DEFAULT NULL,
  `altitd_pkf` int(4) DEFAULT NULL,
  `sitiof` varchar(100) DEFAULT NULL,
  `lat_cf` varchar(16) DEFAULT NULL,
  `lat_nf` double(10,8) DEFAULT NULL,
  `long_cf` varchar(16) DEFAULT NULL,
  `long_nf` double(10,8) DEFAULT NULL,
  `ass` char(30) NOT NULL,
  `arq` int(11) NOT NULL DEFAULT 0,
  `data_arq` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `login` varchar(25) DEFAULT NULL,
  `senha` varchar(10) DEFAULT NULL,
  `nivel` tinyint(1) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `nome`, `email`, `login`, `senha`, `nivel`, `data`, `ativo`) VALUES
(1, 'Brucelinda Veiga', '', 'Brucelinda Veiga', '123', 1, '2019-02-16', 1),
(2, 'Sergio Alves', 'smsa.prog@gmail.com', 'Sergio Alves', '959', 2, '2019-04-27', 1),
(3, 'Catarina Alves', '', 'Catarina Alves', '345', 3, '2019-05-01', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_visitobra`
--

CREATE TABLE `tbl_visitobra` (
  `id_visitobra` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `id_intervencao` int(11) NOT NULL,
  `executada` tinyint(1) NOT NULL,
  `pkinicio` double(5,3) NOT NULL,
  `pkfim` double(5,3) NOT NULL,
  `quant` double(8,2) NOT NULL,
  `obsrv` varchar(250) NOT NULL,
  `foto1` varchar(30) NOT NULL,
  `foto2` varchar(30) NOT NULL,
  `ass` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_adendactfz`
--
ALTER TABLE `tbl_adendactfz`
  ADD PRIMARY KEY (`id_adendactfiz`);

--
-- Índices para tabela `tbl_adendactob`
--
ALTER TABLE `tbl_adendactob`
  ADD PRIMARY KEY (`id_adendactob`);

--
-- Índices para tabela `tbl_banqueta`
--
ALTER TABLE `tbl_banqueta`
  ADD PRIMARY KEY (`id_banqueta`),
  ADD KEY `id_talude_fk` (`id_talude`),
  ADD KEY `id_estrada` (`id_estrada`),
  ADD KEY `id_talude` (`id_talude`);

--
-- Índices para tabela `tbl_bermas`
--
ALTER TABLE `tbl_bermas`
  ADD PRIMARY KEY (`id_berma`),
  ADD KEY `id_estrada` (`id_estrada`);

--
-- Índices para tabela `tbl_bermasbase`
--
ALTER TABLE `tbl_bermasbase`
  ADD PRIMARY KEY (`id_bermabase`),
  ADD KEY `id_estrada` (`id_estrada`) USING BTREE;

--
-- Índices para tabela `tbl_bermasbbdsg`
--
ALTER TABLE `tbl_bermasbbdsg`
  ADD PRIMARY KEY (`id_bermabbdsg`);

--
-- Índices para tabela `tbl_bermasbblig`
--
ALTER TABLE `tbl_bermasbblig`
  ADD PRIMARY KEY (`id_bermabblig`);

--
-- Índices para tabela `tbl_bermasfund`
--
ALTER TABLE `tbl_bermasfund`
  ADD PRIMARY KEY (`id_bermafund`),
  ADD KEY `id_berma` (`id_berma`);

--
-- Índices para tabela `tbl_bermastipo`
--
ALTER TABLE `tbl_bermastipo`
  ADD PRIMARY KEY (`id_bermatipo`),
  ADD KEY `id_berma` (`id_berma`);

--
-- Índices para tabela `tbl_bermasubbase`
--
ALTER TABLE `tbl_bermasubbase`
  ADD PRIMARY KEY (`id_bermasubbase`);

--
-- Índices para tabela `tbl_concelho`
--
ALTER TABLE `tbl_concelho`
  ADD PRIMARY KEY (`id_concelho`);

--
-- Índices para tabela `tbl_concurso`
--
ALTER TABLE `tbl_concurso`
  ADD PRIMARY KEY (`id_concurso`);

--
-- Índices para tabela `tbl_consorcio`
--
ALTER TABLE `tbl_consorcio`
  ADD PRIMARY KEY (`id_consorcio`);

--
-- Índices para tabela `tbl_contratfiz`
--
ALTER TABLE `tbl_contratfiz`
  ADD PRIMARY KEY (`id_contratfiz`);

--
-- Índices para tabela `tbl_contratobra`
--
ALTER TABLE `tbl_contratobra`
  ADD PRIMARY KEY (`id_contratobra`);

--
-- Índices para tabela `tbl_ctrafego`
--
ALTER TABLE `tbl_ctrafego`
  ADD PRIMARY KEY (`id_ctrafego`);

--
-- Índices para tabela `tbl_curvasplanta`
--
ALTER TABLE `tbl_curvasplanta`
  ADD PRIMARY KEY (`id_curvap`),
  ADD KEY `id_estrada_idx` (`id_estrada`),
  ADD KEY `id_estrada` (`id_estrada`);

--
-- Índices para tabela `tbl_curvasverticais`
--
ALTER TABLE `tbl_curvasverticais`
  ADD PRIMARY KEY (`id_curvav`);

--
-- Índices para tabela `tbl_delineadores`
--
ALTER TABLE `tbl_delineadores`
  ADD PRIMARY KEY (`id_delind`);

--
-- Índices para tabela `tbl_drensupf`
--
ALTER TABLE `tbl_drensupf`
  ADD PRIMARY KEY (`id_drensupf`);

--
-- Índices para tabela `tbl_empreitada`
--
ALTER TABLE `tbl_empreitada`
  ADD PRIMARY KEY (`id_empreitada`);

--
-- Índices para tabela `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices para tabela `tbl_estrada`
--
ALTER TABLE `tbl_estrada`
  ADD PRIMARY KEY (`id_estrada`);

--
-- Índices para tabela `tbl_freguesia`
--
ALTER TABLE `tbl_freguesia`
  ADD PRIMARY KEY (`id_freguesia`);

--
-- Índices para tabela `tbl_fxrod`
--
ALTER TABLE `tbl_fxrod`
  ADD PRIMARY KEY (`id_fxrod`),
  ADD KEY `id_estrada_fk` (`id_estrada`);

--
-- Índices para tabela `tbl_fxrodbase`
--
ALTER TABLE `tbl_fxrodbase`
  ADD PRIMARY KEY (`id_fxrodbase`),
  ADD KEY `id_fxrod_fk` (`id_fxrod`) USING BTREE;

--
-- Índices para tabela `tbl_fxrodbbdsg`
--
ALTER TABLE `tbl_fxrodbbdsg`
  ADD PRIMARY KEY (`id_fxrodbbdsg`);

--
-- Índices para tabela `tbl_fxrodbblig`
--
ALTER TABLE `tbl_fxrodbblig`
  ADD PRIMARY KEY (`id_fxrodbblig`);

--
-- Índices para tabela `tbl_fxrodfund`
--
ALTER TABLE `tbl_fxrodfund`
  ADD PRIMARY KEY (`id_fxrodfund`);

--
-- Índices para tabela `tbl_fxrodsubbase`
--
ALTER TABLE `tbl_fxrodsubbase`
  ADD PRIMARY KEY (`id_fxrodsubbase`);

--
-- Índices para tabela `tbl_fxrodtipo`
--
ALTER TABLE `tbl_fxrodtipo`
  ADD PRIMARY KEY (`id_fxrodtipo`);

--
-- Índices para tabela `tbl_gestor`
--
ALTER TABLE `tbl_gestor`
  ADD PRIMARY KEY (`id_gestor`);

--
-- Índices para tabela `tbl_gestorobra`
--
ALTER TABLE `tbl_gestorobra`
  ADD PRIMARY KEY (`id_gestorobra`);

--
-- Índices para tabela `tbl_gestrada`
--
ALTER TABLE `tbl_gestrada`
  ADD PRIMARY KEY (`id_gestrada`);

--
-- Índices para tabela `tbl_guardseg`
--
ALTER TABLE `tbl_guardseg`
  ADD PRIMARY KEY (`id_guardseg`);

--
-- Índices para tabela `tbl_ilha`
--
ALTER TABLE `tbl_ilha`
  ADD PRIMARY KEY (`id_ilha`);

--
-- Índices para tabela `tbl_intersecao`
--
ALTER TABLE `tbl_intersecao`
  ADD PRIMARY KEY (`id_intrs`,`arq`,`ass`);

--
-- Índices para tabela `tbl_intervencao`
--
ALTER TABLE `tbl_intervencao`
  ADD PRIMARY KEY (`id_intervencao`);

--
-- Índices para tabela `tbl_iq`
--
ALTER TABLE `tbl_iq`
  ADD PRIMARY KEY (`id_iq`);

--
-- Índices para tabela `tbl_iri`
--
ALTER TABLE `tbl_iri`
  ADD PRIMARY KEY (`id_iri`);

--
-- Índices para tabela `tbl_juri`
--
ALTER TABLE `tbl_juri`
  ADD PRIMARY KEY (`id_juri`);

--
-- Índices para tabela `tbl_marcadores`
--
ALTER TABLE `tbl_marcadores`
  ADD PRIMARY KEY (`id_marc`);

--
-- Índices para tabela `tbl_motivo`
--
ALTER TABLE `tbl_motivo`
  ADD PRIMARY KEY (`id_motivo`);

--
-- Índices para tabela `tbl_muros`
--
ALTER TABLE `tbl_muros`
  ADD PRIMARY KEY (`id_muro`);

--
-- Índices para tabela `tbl_nivelacesso`
--
ALTER TABLE `tbl_nivelacesso`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Índices para tabela `tbl_objconcurso`
--
ALTER TABLE `tbl_objconcurso`
  ADD PRIMARY KEY (`id_objconcurso`);

--
-- Índices para tabela `tbl_ocorrencias`
--
ALTER TABLE `tbl_ocorrencias`
  ADD PRIMARY KEY (`id_ocor`);

--
-- Índices para tabela `tbl_orcamento`
--
ALTER TABLE `tbl_orcamento`
  ADD PRIMARY KEY (`id_orc`);

--
-- Índices para tabela `tbl_orcamentocap`
--
ALTER TABLE `tbl_orcamentocap`
  ADD PRIMARY KEY (`id_orcamentocap`);

--
-- Índices para tabela `tbl_orcamentodet`
--
ALTER TABLE `tbl_orcamentodet`
  ADD PRIMARY KEY (`id_orcdet`);

--
-- Índices para tabela `tbl_orcamentoitens`
--
ALTER TABLE `tbl_orcamentoitens`
  ADD PRIMARY KEY (`id_orc`);

--
-- Índices para tabela `tbl_patologiagrupo`
--
ALTER TABLE `tbl_patologiagrupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Índices para tabela `tbl_patologiaitens`
--
ALTER TABLE `tbl_patologiaitens`
  ADD PRIMARY KEY (`id_item`);

--
-- Índices para tabela `tbl_patologias`
--
ALTER TABLE `tbl_patologias`
  ADD PRIMARY KEY (`id_patolog`);

--
-- Índices para tabela `tbl_pcontagem`
--
ALTER TABLE `tbl_pcontagem`
  ADD PRIMARY KEY (`id_pcontagem`);

--
-- Índices para tabela `tbl_phidraulica`
--
ALTER TABLE `tbl_phidraulica`
  ADD PRIMARY KEY (`id_ph`);

--
-- Índices para tabela `tbl_propostas`
--
ALTER TABLE `tbl_propostas`
  ADD PRIMARY KEY (`id_proposta`);

--
-- Índices para tabela `tbl_sepcentral`
--
ALTER TABLE `tbl_sepcentral`
  ADD PRIMARY KEY (`id_sepcent`);

--
-- Índices para tabela `tbl_sinalhz`
--
ALTER TABLE `tbl_sinalhz`
  ADD PRIMARY KEY (`id_sinalhz`);

--
-- Índices para tabela `tbl_sinalvt`
--
ALTER TABLE `tbl_sinalvt`
  ADD PRIMARY KEY (`id_sinalvt`);

--
-- Índices para tabela `tbl_singularidade`
--
ALTER TABLE `tbl_singularidade`
  ADD PRIMARY KEY (`id_sing`);

--
-- Índices para tabela `tbl_sobra`
--
ALTER TABLE `tbl_sobra`
  ADD PRIMARY KEY (`id_sobra`),
  ADD UNIQUE KEY `id_sobra_UNIQUE` (`id_sobra`);

--
-- Índices para tabela `tbl_sobratipo`
--
ALTER TABLE `tbl_sobratipo`
  ADD PRIMARY KEY (`id_sobratipo`);

--
-- Índices para tabela `tbl_talude`
--
ALTER TABLE `tbl_talude`
  ADD PRIMARY KEY (`id_talude`),
  ADD KEY `id_estrada` (`id_estrada`);

--
-- Índices para tabela `tbl_tipobra`
--
ALTER TABLE `tbl_tipobra`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Índices para tabela `tbl_trabalhos`
--
ALTER TABLE `tbl_trabalhos`
  ADD PRIMARY KEY (`id_trabalhos`);

--
-- Índices para tabela `tbl_trecho`
--
ALTER TABLE `tbl_trecho`
  ADD PRIMARY KEY (`id_trecho`);

--
-- Índices para tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `tbl_visitobra`
--
ALTER TABLE `tbl_visitobra`
  ADD PRIMARY KEY (`id_visitobra`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_adendactfz`
--
ALTER TABLE `tbl_adendactfz`
  MODIFY `id_adendactfiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbl_adendactob`
--
ALTER TABLE `tbl_adendactob`
  MODIFY `id_adendactob` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbl_banqueta`
--
ALTER TABLE `tbl_banqueta`
  MODIFY `id_banqueta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_bermas`
--
ALTER TABLE `tbl_bermas`
  MODIFY `id_berma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_bermasbase`
--
ALTER TABLE `tbl_bermasbase`
  MODIFY `id_bermabase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_bermasbbdsg`
--
ALTER TABLE `tbl_bermasbbdsg`
  MODIFY `id_bermabbdsg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_bermasbblig`
--
ALTER TABLE `tbl_bermasbblig`
  MODIFY `id_bermabblig` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_bermasfund`
--
ALTER TABLE `tbl_bermasfund`
  MODIFY `id_bermafund` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_bermastipo`
--
ALTER TABLE `tbl_bermastipo`
  MODIFY `id_bermatipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_bermasubbase`
--
ALTER TABLE `tbl_bermasubbase`
  MODIFY `id_bermasubbase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_concelho`
--
ALTER TABLE `tbl_concelho`
  MODIFY `id_concelho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tbl_concurso`
--
ALTER TABLE `tbl_concurso`
  MODIFY `id_concurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_consorcio`
--
ALTER TABLE `tbl_consorcio`
  MODIFY `id_consorcio` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbl_contratfiz`
--
ALTER TABLE `tbl_contratfiz`
  MODIFY `id_contratfiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tbl_contratobra`
--
ALTER TABLE `tbl_contratobra`
  MODIFY `id_contratobra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbl_ctrafego`
--
ALTER TABLE `tbl_ctrafego`
  MODIFY `id_ctrafego` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_curvasplanta`
--
ALTER TABLE `tbl_curvasplanta`
  MODIFY `id_curvap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_curvasverticais`
--
ALTER TABLE `tbl_curvasverticais`
  MODIFY `id_curvav` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_delineadores`
--
ALTER TABLE `tbl_delineadores`
  MODIFY `id_delind` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_drensupf`
--
ALTER TABLE `tbl_drensupf`
  MODIFY `id_drensupf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_empreitada`
--
ALTER TABLE `tbl_empreitada`
  MODIFY `id_empreitada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbl_estrada`
--
ALTER TABLE `tbl_estrada`
  MODIFY `id_estrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT de tabela `tbl_freguesia`
--
ALTER TABLE `tbl_freguesia`
  MODIFY `id_freguesia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `tbl_fxrod`
--
ALTER TABLE `tbl_fxrod`
  MODIFY `id_fxrod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_fxrodbase`
--
ALTER TABLE `tbl_fxrodbase`
  MODIFY `id_fxrodbase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_fxrodbbdsg`
--
ALTER TABLE `tbl_fxrodbbdsg`
  MODIFY `id_fxrodbbdsg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_fxrodbblig`
--
ALTER TABLE `tbl_fxrodbblig`
  MODIFY `id_fxrodbblig` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_fxrodfund`
--
ALTER TABLE `tbl_fxrodfund`
  MODIFY `id_fxrodfund` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_fxrodsubbase`
--
ALTER TABLE `tbl_fxrodsubbase`
  MODIFY `id_fxrodsubbase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_fxrodtipo`
--
ALTER TABLE `tbl_fxrodtipo`
  MODIFY `id_fxrodtipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_gestor`
--
ALTER TABLE `tbl_gestor`
  MODIFY `id_gestor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbl_gestorobra`
--
ALTER TABLE `tbl_gestorobra`
  MODIFY `id_gestorobra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_gestrada`
--
ALTER TABLE `tbl_gestrada`
  MODIFY `id_gestrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_guardseg`
--
ALTER TABLE `tbl_guardseg`
  MODIFY `id_guardseg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_ilha`
--
ALTER TABLE `tbl_ilha`
  MODIFY `id_ilha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbl_intersecao`
--
ALTER TABLE `tbl_intersecao`
  MODIFY `id_intrs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_intervencao`
--
ALTER TABLE `tbl_intervencao`
  MODIFY `id_intervencao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbl_iq`
--
ALTER TABLE `tbl_iq`
  MODIFY `id_iq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_iri`
--
ALTER TABLE `tbl_iri`
  MODIFY `id_iri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_juri`
--
ALTER TABLE `tbl_juri`
  MODIFY `id_juri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbl_marcadores`
--
ALTER TABLE `tbl_marcadores`
  MODIFY `id_marc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_motivo`
--
ALTER TABLE `tbl_motivo`
  MODIFY `id_motivo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbl_muros`
--
ALTER TABLE `tbl_muros`
  MODIFY `id_muro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_nivelacesso`
--
ALTER TABLE `tbl_nivelacesso`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_objconcurso`
--
ALTER TABLE `tbl_objconcurso`
  MODIFY `id_objconcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbl_ocorrencias`
--
ALTER TABLE `tbl_ocorrencias`
  MODIFY `id_ocor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_orcamento`
--
ALTER TABLE `tbl_orcamento`
  MODIFY `id_orc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbl_orcamentocap`
--
ALTER TABLE `tbl_orcamentocap`
  MODIFY `id_orcamentocap` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbl_orcamentodet`
--
ALTER TABLE `tbl_orcamentodet`
  MODIFY `id_orcdet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tbl_orcamentoitens`
--
ALTER TABLE `tbl_orcamentoitens`
  MODIFY `id_orc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1389;

--
-- AUTO_INCREMENT de tabela `tbl_patologiagrupo`
--
ALTER TABLE `tbl_patologiagrupo`
  MODIFY `id_grupo` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tbl_patologiaitens`
--
ALTER TABLE `tbl_patologiaitens`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT de tabela `tbl_patologias`
--
ALTER TABLE `tbl_patologias`
  MODIFY `id_patolog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_pcontagem`
--
ALTER TABLE `tbl_pcontagem`
  MODIFY `id_pcontagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_phidraulica`
--
ALTER TABLE `tbl_phidraulica`
  MODIFY `id_ph` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_propostas`
--
ALTER TABLE `tbl_propostas`
  MODIFY `id_proposta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbl_sepcentral`
--
ALTER TABLE `tbl_sepcentral`
  MODIFY `id_sepcent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_sinalhz`
--
ALTER TABLE `tbl_sinalhz`
  MODIFY `id_sinalhz` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_sinalvt`
--
ALTER TABLE `tbl_sinalvt`
  MODIFY `id_sinalvt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_singularidade`
--
ALTER TABLE `tbl_singularidade`
  MODIFY `id_sing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbl_sobratipo`
--
ALTER TABLE `tbl_sobratipo`
  MODIFY `id_sobratipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_talude`
--
ALTER TABLE `tbl_talude`
  MODIFY `id_talude` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_tipobra`
--
ALTER TABLE `tbl_tipobra`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbl_trabalhos`
--
ALTER TABLE `tbl_trabalhos`
  MODIFY `id_trabalhos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tbl_trecho`
--
ALTER TABLE `tbl_trecho`
  MODIFY `id_trecho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbl_visitobra`
--
ALTER TABLE `tbl_visitobra`
  MODIFY `id_visitobra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
