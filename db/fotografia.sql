-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2017 at 09:16 
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fotografias`
--

-- --------------------------------------------------------

--
-- Table structure for table `fotografia`
--

CREATE TABLE `fotografia` (
  `id` int(11) NOT NULL,
  `fecha` varchar(200) DEFAULT NULL,
  `tipo` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `imgnombre` text NOT NULL,
  `Descripcion` text NOT NULL,
  `formato` varchar(500) NOT NULL,
  `Localizacion` varchar(500) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `country` varchar(45) NOT NULL,
  `province` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fotografia`
--

INSERT INTO `fotografia` (`id`, `fecha`, `tipo`, `link`, `imgnombre`, `Descripcion`, `formato`, `Localizacion`, `avatar`, `country`, `province`, `city`) VALUES
(207, '08/01/1970', 'RAW', 'http://jsequeiros.com/sites/default/files/imagen-cachorro-comprimir.jpg', 'German', 'gggg', 'Retrato:Paisaje:', 'Urbano', 'media/default-avatar.png', 'ES', '46', 'Ontinyent'),
(208, '09/01/1970', 'RAW', 'ggg', 'gggg', 'ggg', 'Retrato:', 'Urbano', 'media/default-avatar.png', 'ES', '46', 'Ontinyent'),
(209, '02/01/1970', 'RAW', 'http://jsequeiros.com/sites/default/files/imagen-cachorro-comprimir.jpg', 'gerr', 'geeer', 'Retrato:Paisaje:Aerea:', 'Interior', 'media/1225680597-flowers.png', 'ES', '46', 'Ontinyent'),
(210, '03/01/1970', 'RAW', 'https://www.google.es/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwjRldrQzqLWAhVF5xoKHR5VAm8QjRwIBw&url=http%3A%2F%2Fwww.imagen.com.mx%2F&psig=AFQjCNFjGXFCc34igV_hjfLgv4cP7nkB8', 'ggggg', 'ggggggg', 'Retrato:', 'Urbano', 'media/default-avatar.png', 'SG', 'default_provincia', 'default_ciudad'),
(211, 'Introduce una fecha', 'RAW', 'http://jsequeiros.com/sites/default/files/imagen-cachorro-comprimir.jpg', 'gggg', 'gggg', 'Retrato:', 'Urbano', 'media/default-avatar.png', 'BS', 'default_provincia', 'default_ciudad'),
(212, 'Introduce una fecha', 'RAW', 'http://jsequeiros.com/sites/default/files/imagen-cachorro-comprimir.jpg', 'ggggggggg', 'gggggggg', 'Retrato:', 'Urbano', 'media/default-avatar.png', 'DZ', 'default_provincia', 'default_ciudad'),
(213, '15/01/1970', 'RAW', 'http://jsequeiros.com/sites/default/files/imagen-cachorro-comprimir.jpg', 'ggg', 'ggg', 'Retrato:', 'Urbano', 'media/default-avatar.png', 'AS', 'default_provincia', 'default_ciudad'),
(214, '08/01/1970', 'RAW', 'http://jsequeiros.com/sites/default/files/imagen-cachorro-comprimir.jpg', 'German', 'gggg', 'Retrato:', 'Urbano', 'media/20143601-flowers.png', 'AM', 'default_provincia', 'default_ciudad'),
(215, '02/01/1970', 'RAW', 'http://jsequeiros.com/sites/default/files/imagen-cachorro-comprimir.jpg', 'gggg', 'gggg', 'Retrato:', 'Urbano', 'media/default-avatar.png', 'AF', 'default_provincia', 'default_ciudad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fotografia`
--
ALTER TABLE `fotografia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fotografia`
--
ALTER TABLE `fotografia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
