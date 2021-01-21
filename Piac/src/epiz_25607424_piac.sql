-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2021 a las 18:49:55
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `epiz_25607424_piac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciiu`
--

CREATE TABLE `ciiu` (
  `Codigo` int(11) NOT NULL,
  `Codigo_Ciiu` int(11) NOT NULL,
  `Descripcion` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ciiu`
--

INSERT INTO `ciiu` (`Codigo`, `Codigo_Ciiu`, `Descripcion`) VALUES
(1, 123, 'Cultivo de café'),
(2, 119, 'Otros cultivos transitorios ncp'),
(3, 125, 'Cultivo de flor de corte'),
(4, 130, 'Propagación de plantas (actividades de los viveros, excepto viveros forestales) '),
(5, 230, 'Recolección de productos forestales diferentes a la madera'),
(6, 122, 'Cultivo de plátano y banano'),
(7, 124, 'Cultivo de caña de azúcar'),
(8, 111, 'Cultivo de cereales (excepto arroz), legumbres y semillas oleaginosas '),
(9, 112, 'Cultivo de arroz '),
(10, 126, 'Cultivo de palma para aceite (palma africana) y otros frutos oleaginosos'),
(11, 111, 'Cultivo de cereales (excepto arroz), legumbres y semillas oleaginosas '),
(12, 113, 'Cultivo de hortalizas, raíces y tubérculos '),
(13, 128, 'Cultivo de especias y de plantas aromáticas y medicinales '),
(14, 113, 'Cultivo de hortalizas, raíces y tubérculos '),
(15, 119, 'Otros cultivos transitorios n.c.p.'),
(16, 121, 'Cultivo de frutas tropicales y subtropicales'),
(17, 126, 'Cultivo de palma para aceite (palma africana) y otros frutos oleaginosos'),
(18, 127, 'Cultivo de plantas con las que se preparan bebidas'),
(19, 128, 'Cultivo de especias y de plantas aromáticas y medicinales '),
(20, 111, 'Cultivo de cereales (excepto arroz), legumbres y semillas oleaginosas '),
(21, 113, 'Cultivo de hortalizas, raíces y tubérculos '),
(22, 114, 'Cultivo de tabaco '),
(23, 115, 'Cultivo de plantas textiles '),
(24, 119, 'Otros cultivos transitorios n.c.p.'),
(25, 128, 'Cultivo de especias y de plantas aromáticas y medicinales '),
(26, 129, 'Otros cultivos permanentes n.c.p.'),
(27, 163, 'Actividades posteriores a la cosecha '),
(28, 1200, 'Elaboración de productos de tabaco'),
(29, 111, 'Cultivo de cereales (excepto arroz), legumbres y semillas oleaginosas '),
(30, 112, 'Cultivo de arroz '),
(31, 113, 'Cultivo de hortalizas, raíces y tubérculos '),
(32, 114, 'Cultivo de tabaco '),
(33, 115, 'Cultivo de plantas textiles '),
(34, 119, 'Otros cultivos transitorios n.c.p.'),
(35, 121, 'Cultivo de frutas tropicales y subtropicales'),
(36, 122, 'Cultivo de plátano y banano'),
(37, 123, 'Cultivo de café'),
(38, 124, 'Cultivo de caña de azúcar'),
(39, 125, 'Cultivo de flor de corte'),
(40, 126, 'Cultivo de palma para aceite (palma africana) y otros frutos oleaginosos'),
(41, 127, 'Cultivo de plantas con las que se preparan bebidas'),
(42, 128, 'Cultivo de especias y de plantas aromáticas y medicinales '),
(43, 129, 'Otros cultivos permanentes n.c.p.'),
(44, 141, 'Cría de ganado bovino y bufalino'),
(45, 144, 'Cría de ganado porcino'),
(46, 145, 'Cría de aves de corral'),
(47, 142, 'Cría de caballos y otros equinos '),
(48, 143, 'Cría de ovejas y cabras '),
(49, 149, 'Cría de otros animales n.c.p.'),
(50, 322, 'Acuicultura de agua dulce'),
(51, 141, 'Cría de ganado bovino y bufalino'),
(52, 142, 'Cría de caballos y otros equinos '),
(53, 143, 'Cría de ovejas y cabras '),
(54, 144, 'Cría de ganado porcino'),
(55, 145, 'Cría de aves de corral'),
(56, 149, 'Cría de otros animales n.c.p.'),
(57, 150, 'Explotación mixta (agrícola y pecuaria) '),
(58, 161, 'Actividades de apoyo a la agricultura '),
(59, 162, 'Actividades de apoyo a la ganadería'),
(60, 163, 'Actividades posteriores a la cosecha '),
(61, 164, 'Tratamiento de semillas para propagación '),
(62, 8130, ' Actividades de paisajismo y servicios de mantenimiento conexos'),
(63, 170, 'Caza ordinaria y mediante trampas y actividades de servicios conexas '),
(64, 9499, 'Actividades de otras asociaciones n.c.p.'),
(65, 130, 'Propagación de plantas (actividades de los viveros, excepto viveros forestales)'),
(66, 210, 'Silvicultura y otras actividades forestales'),
(67, 220, 'Extracción de madera '),
(68, 230, 'Recolección de productos forestales diferentes a la madera'),
(69, 240, 'Servicios de apoyo a la silvicultura '),
(70, 311, 'Pesca marítima '),
(71, 312, 'Pesca de agua dulce '),
(72, 321, 'Acuicultura marítima '),
(73, 322, 'Acuicultura de agua dulce'),
(74, 311, 'Pesca marítima '),
(75, 312, 'Pesca de agua dulce '),
(76, 321, 'Acuicultura marítima '),
(77, 322, 'Acuicultura de agua dulce'),
(78, 510, 'Extracción de hulla (carbón de piedra)'),
(79, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(80, 1921, 'Fabricación de productos de la refinación del petróleo'),
(81, 520, 'Extracción de carbón lignito'),
(82, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(83, 1921, 'Fabricación de productos de la refinación del petróleo'),
(84, 899, 'Extracción de otros minerales no metálicos n.c.p.'),
(85, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(86, 610, 'Extracción de petróleo crudo '),
(87, 620, 'Extracción de gas natural'),
(88, 910, 'Actividades de apoyo para la extracción de petróleo y de gas natural'),
(89, 910, 'Actividades de apoyo para la extracción de petróleo y de gas natural'),
(90, 721, 'Extracción de minerales de uranio y de torio'),
(91, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(92, 710, 'Extracción de minerales de hierro'),
(93, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(94, 722, 'Extracción de oro y otros metales preciosos'),
(95, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(96, 723, 'Extracción de minerales de níquel'),
(97, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(98, 729, 'Extracción de otros minerales metalíferos no ferrosos n.c.p.'),
(99, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(100, 811, 'Extracción de piedra, arena, arcillas comunes, yeso y anhidrita'),
(101, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(102, 811, 'Extracción de piedra, arena, arcillas comunes, yeso y anhidrita'),
(103, 812, 'Extracción de arcillas de uso industrial, Caliza, Caolín y Bentonitas'),
(104, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(105, 891, 'Extracción de minerales para la fabricación de abonos y productos químicos'),
(106, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(107, 892, 'Extracción de halita (sal)'),
(108, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(109, 820, 'Extracción de esmeraldas, piedras preciosas y semipreciosas '),
(110, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(111, 820, 'Extracción de esmeraldas, piedras preciosas y semipreciosas '),
(112, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(113, 899, 'Extracción de otros minerales no metálicos n.c.p.'),
(114, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(115, 1011, 'Procesamiento y conservación de carne y productos cárnicos'),
(116, 1012, 'Procesamiento y conservación de pescados, crustáceos y moluscos'),
(117, 1020, 'Procesamiento y conservación de frutas, legumbres, hortalizas y tubérculos'),
(118, 1084, 'Elaboración de comidas y platos preparados'),
(119, 1030, 'Elaboración de aceites y grasas de origen vegetal y animal'),
(120, 1040, 'Elaboración de productos lácteos'),
(121, 1051, 'Elaboración de productos de molinería'),
(122, 1052, 'Elaboración de almidones y productos derivados del almidón'),
(123, 1090, 'Elaboración de alimentos preparados para animales'),
(124, 1081, 'Elaboración de productos de panadería'),
(125, 1084, 'Elaboración de comidas y platos preparados'),
(126, 1089, 'Elaboración de otros productos alimenticios n.c.p.'),
(127, 1083, 'Elaboración de macarrones, fideos, alcuzcuz y productos farináceos similares'),
(128, 1061, 'Trilla de café'),
(129, 1062, 'Descafeinado, tostión y molienda del café'),
(130, 1063, 'Otros derivados del café'),
(131, 1071, 'Elaboración y refinación de azúcar'),
(132, 1072, 'Elaboración de panela'),
(133, 1082, 'Elaboración de cacao, chocolate y productos de confitería'),
(134, 1020, 'Procesamiento y conservación de frutas, legumbres, hortalizas y tubérculos'),
(135, 1084, 'Elaboración de comidas y platos preparados'),
(136, 1089, 'Elaboración de otros productos alimenticios n.c.p.'),
(137, 1101, 'Destilación, rectificación y mezcla de bebidas alcohólicas'),
(138, 2011, 'Fabricación de sustancias y productos químicos básicos'),
(139, 1102, 'Elaboración de bebidas fermentadas no destiladas'),
(140, 1103, 'Producción de malta, elaboración de cervezas y otras bebidas malteadas'),
(141, 1104, 'Elaboración de bebidas no alcohólicas, producción de aguas minerales y de otras aguas embotelladas'),
(142, 1200, 'Elaboración de productos de tabaco'),
(143, 1311, 'Preparación e hilatura de fibras textiles'),
(144, 1312, 'Tejeduría de productos textiles'),
(145, 1313, 'Acabado de productos textiles. '),
(146, 1811, 'Actividades de impresión'),
(147, 1392, 'Confección de artículos con materiales textiles, excepto prendas de vestir'),
(148, 3250, 'Fabricación de instrumentos y materiales médicos y odontológicos (incluido mobiliario)'),
(149, 3319, 'Mantenimiento y reparación de otros tipos de equipos y sus componentes n.c.p.'),
(150, 1393, 'Fabricación de tapetes y alfombras para pisos'),
(151, 1394, 'Fabricación de cuerdas, cordeles, cables, bramantes y redes'),
(152, 3319, 'Mantenimiento y reparación de otros tipos de equipos y sus componentes n.c.p.'),
(153, 1313, 'Acabado de productos textiles. '),
(154, 1399, 'Fabricación de otros artículos textiles n.c.p.'),
(155, 1512, 'Fabricación de artículos de viaje, bolsos de mano y artículos similares elaborados en cuero, y fabricación de artículos de talabartería y guarnicioner'),
(156, 1709, 'Fabricación de otros artículos de papel y cartón'),
(180, 1640, 'Fabricación de recipientes de madera'),
(181, 3319, 'Mantenimiento y reparación de otros tipos de equipos y sus componentes n.c.p.'),
(182, 1690, 'Fabricación de otros productos de madera, fabricación de artículos de corcho, cestería y espartería'),
(183, 3290, 'Otras industrias manufactureras n.c.p.'),
(184, 1701, 'Fabricación de pulpas (pastas) celulósicas, papel y cartón'),
(185, 1702, 'Fabricación de papel y cartón ondulado (corrugado), fabricación de envases, empaques y de embalajes de papel y cartón'),
(186, 1709, 'Fabricación de otros artículos de papel y cartón'),
(187, 1811, 'Actividades de impresión'),
(188, 2229, 'Fabricación de artículos de plástico n.c.p.'),
(189, 3290, 'Otras industrias manufactureras n.c.p.'),
(190, 5811, 'Edición de libros'),
(191, 5812, 'Edición de directorios y listas de correo'),
(192, 5920, 'Actividades de grabación de sonido y edición de música'),
(193, 5813, 'Edición de periódicos, revistas y otras publicaciones periódicas'),
(194, 5920, 'Actividades de grabación de sonido y edición de música'),
(195, 5813, 'Edición de periódicos, revistas y otras publicaciones periódicas'),
(196, 5819, 'Otros trabajos de edición'),
(197, 1709, 'Fabricación de otros artículos de papel y cartón'),
(198, 1811, 'Actividades de impresión'),
(199, 1812, 'Actividades de servicios relacionados con la impresión'),
(200, 1820, 'Producción de copias a partir de grabaciones originales'),
(201, 1910, 'Fabricación de productos de hornos de coque '),
(202, 1921, 'Fabricación de productos de la refinación del petróleo'),
(203, 2011, 'Fabricación de sustancias y productos químicos básicos'),
(204, 2100, 'Fabricación de productos farmacéuticos, sustancias químicas medicinales y productos botánicos de uso farmacéutico'),
(205, 2429, 'Industrias básicas de otros metales no ferrosos'),
(206, 3812, 'Recolección de desechos peligrosos'),
(207, 3822, 'Tratamiento y disposición de desechos peligrosos'),
(208, 1910, 'Fabricación de productos de hornos de coque'),
(209, 2011, 'Fabricación de sustancias y productos químicos básicos'),
(210, 2012, 'Fabricación de abonos y compuestos inorgánicos nitrogenados'),
(211, 3821, 'Tratamiento y disposición de desechos no peligrosos'),
(212, 2013, 'Fabricación de plásticos en formas primarias'),
(213, 2014, 'Fabricación de caucho sintético en formas primarias'),
(214, 2021, 'Fabricación de plaguicidas y otros productos químicos de uso agropecuario'),
(215, 2022, 'Fabricación de pinturas, barnices y revestimientos similares, tintas para impresión y masillas'),
(216, 2100, 'Fabricación de productos farmacéuticos, sustancias químicas medicinales y productos botánicos de uso farmacéutico'),
(217, 3250, 'Fabricación de instrumentos, aparatos y materiales médicos y odontológicos (incluido mobiliario)'),
(218, 2023, 'Fabricación de jabones y detergentes, preparados para limpiar y pulir, perfumes y preparados de tocador'),
(219, 1089, 'Elaboración de otros productos alimenticios n.c.p.'),
(220, 2011, 'Fabricación de sustancias y productos químicos básicos'),
(221, 2029, 'Fabricación de otros productos químicos n.c.p.'),
(222, 2610, 'Fabricación de componentes y tableros electrónicos'),
(223, 2680, 'Fabricación de medios magnéticos y ópticos para almacenamiento de datos'),
(224, 2817, 'Fabricación de maquinaria y equipo de oficina (excepto computadoras y equipo periférico)'),
(225, 2013, 'Fabricación de plásticos en formas primarias'),
(226, 2030, 'Fabricación de fibras sintéticas y artificiales'),
(227, 2211, 'Fabricación de llantas y neumáticos de caucho'),
(228, 2212, 'Reencauche de llantas usadas'),
(229, 2219, 'Fabricación de formas básicas de caucho y otros productos de caucho n.c.p.'),
(230, 2219, 'Fabricación de formas básicas de caucho y otros productos de caucho n.c.p.'),
(231, 2229, 'Fabricación de artículos de plástico n.c.p.'),
(232, 2812, 'Fabricación de equipos de potencia hidráulica y neumática'),
(233, 3290, 'Otras industrias manufactureras n.c.p.'),
(234, 3319, 'Mantenimiento y reparación de otros tipos de equipos y sus componentes n.c.p.'),
(235, 2221, 'Fabricación de formas básicas de plástico'),
(236, 2229, 'Fabricación de artículos de plástico n.c.p.'),
(237, 2610, 'Fabricación de componentes y tableros electrónicos'),
(238, 2732, 'Fabricación de dispositivos de cableado'),
(239, 3290, 'Otras industrias manufactureras n.c.p.'),
(240, 3319, 'Mantenimiento y reparación de otros tipos de equipos y sus componentes n.c.p.'),
(241, 2310, 'Fabricación de vidrio y productos de vidrio'),
(242, 3319, 'Mantenimiento y reparación de otros tipos de equipos y sus componentes n.c.p.'),
(243, 2392, 'Fabricación de materiales de arcilla para la construcción'),
(244, 2393, 'Fabricación de otros productos de cerámica y porcelana'),
(245, 2391, 'Fabricación de productos refractarios'),
(246, 2392, 'Fabricación de materiales de arcilla para la construcción'),
(247, 2394, 'Fabricación de cemento, cal y yeso'),
(248, 2395, 'Fabricación de artículos de hormigón, cemento y yeso'),
(249, 2396, 'Corte, tallado y acabado de la piedra'),
(250, 1312, 'Tejeduría de productos textiles'),
(251, 2399, 'Fabricación de otros productos minerales no metálicos n.c.p.'),
(252, 3290, 'Otras industrias manufactureras n.c.p.'),
(253, 3319, 'Mantenimiento y reparación de otros tipos de equipos y sus componentes n.c.p.'),
(254, 2410, 'Industrias básicas de hierro y de acero'),
(255, 2431, 'Fundición de hierro y de acero'),
(256, 2421, 'Industrias básicas de metales preciosos'),
(257, 2429, 'Industrias básicas de otros metales no ferrosos '),
(258, 2431, 'Fundición de hierro y de acero'),
(259, 2432, 'Fundición de metales no ferrosos'),
(260, 2511, 'Fabricación de productos metálicos para uso estructural'),
(261, 3311, 'Mantenimiento y reparación especializado de productos elaborados en metal'),
(262, 2512, 'Fabricación de tanques, depósitos y recipientes de metal, excepto los utilizados para el envase o transporte de mercancías'),
(263, 3311, 'Mantenimiento y reparación especializado de productos elaborados en metal'),
(264, 2513, 'Fabricación de generadores de vapor, excepto calderas de agua caliente para calefacción central'),
(265, 3311, 'Mantenimiento y reparación especializado de productos elaborados en metal'),
(266, 2591, 'Forja, prensado, estampado y laminado de metal, pulvimetalurgia'),
(267, 1811, 'Actividades de impresión'),
(268, 2592, 'Tratamiento y revestimiento de metales, mecanizado'),
(269, 3311, 'Mantenimiento y reparación especializado de productos elaborados en metal'),
(270, 2593, 'Fabricación de artículos de cuchillería, herramientas de mano y artículos de ferretería'),
(271, 3311, 'Mantenimiento y reparación especializado de productos elaborados en metal'),
(272, 2593, 'Fabricación de artículos de cuchillería, herramientas de mano y artículos de ferretería'),
(273, 2599, 'Fabricación de otros productos elaborados de metal n.c.p.'),
(274, 3290, 'Otras industrias manufactureras n.c.p.'),
(275, 3311, 'Mantenimiento y reparación especializado de productos elaborados en metal'),
(276, 2811, 'Fabricación de motores, turbinas, y partes para motores de combustión interna'),
(277, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(278, 3320, 'Instalación especializada de maquinaria y equipo industrial'),
(279, 2812, 'Fabricación de equipos de potencia hidráulica y neumática'),
(280, 2813, 'Fabricación de otras bombas, compresores, grifos y válvulas'),
(281, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(282, 3320, 'Instalación especializada de maquinaria y equipo industrial'),
(283, 2812, 'Fabricación de equipos de potencia hidráulica y neumática'),
(284, 2814, 'Fabricación de cojinetes, engranajes, trenes de engranajes y piezas de transmisión'),
(285, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(286, 2815, 'Fabricación de hornos, hogares y quemadores industriales'),
(287, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(288, 3320, 'Instalación especializada de maquinaria y equipo industrial'),
(289, 2816, 'Fabricación de equipo de elevación y manipulación'),
(290, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(291, 3320, 'Instalación especializada de maquinaria y equipo industrial'),
(292, 2819, 'Fabricación de otros tipos de maquinaria y equipo de uso general n.c.p..'),
(293, 3250, 'Fabricación de instrumentos, aparatos y materiales médicos y odontológicos (incluido mobiliario)'),
(294, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(295, 3320, 'Instalación especializada de maquinaria y equipo industrial'),
(296, 2821, 'Fabricación de maquinaria agropecuaria y forestal '),
(297, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(298, 3320, 'Instalación especializada de maquinaria y equipo industrial'),
(299, 2790, 'Fabricación de otros tipos de equipo eléctrico n.c.p.'),
(300, 2818, 'Fabricación de herramientas manuales con motor'),
(301, 2819, 'Fabricación de otros tipos de maquinaria y equipo de uso general n.c.p..'),
(302, 2822, 'Fabricación de máquinas formadoras de metal y de máquinas herramienta'),
(303, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(304, 3314, 'Mantenimiento y reparación especializado de equipo eléctrico'),
(305, 3320, 'Instalación especializada de maquinaria y equipo industrial'),
(306, 2823, 'Fabricación de maquinaria para la metalurgia '),
(307, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(308, 3320, 'Instalación especializada de maquinaria y equipo industrial'),
(309, 2824, 'Fabricación de maquinaria para explotación de minas y canteras y para obras de construcción'),
(310, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(311, 3320, 'Instalación especializada de maquinaria y equipo industrial'),
(312, 2825, 'Fabricación de maquinaria para la elaboración de alimentos, bebidas y tabaco'),
(313, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(314, 3320, 'Instalación especializada de maquinaria y equipo industrial'),
(315, 2826, 'Fabricación de maquinaria para la elaboración de productos textiles, prendas de vestir y cueros'),
(316, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(317, 3320, 'Instalación especializada de maquinaria y equipo industrial'),
(318, 2520, 'Fabricación de armas y municiones'),
(319, 3030, 'Fabricación de aeronaves, naves espaciales y de maquinaria conexa'),
(320, 3040, 'Fabricación de vehículos militares de combate'),
(321, 3311, 'Mantenimiento y reparación especializado de productos elaborados en metal'),
(322, 2790, 'Fabricación de otros tipos de equipo eléctrico n.c.p.'),
(323, 2826, 'Fabricación de maquinaria para la elaboración de productos textiles, prendas de vestir y cueros'),
(324, 2829, 'Fabricación de otros tipos de maquinaria y equipo de uso especial n.c.p.'),
(325, 3311, 'Mantenimiento y reparación especializado de productos elaborados en metal'),
(326, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(327, 3314, 'Mantenimiento y reparación especializado de equipo eléctrico'),
(328, 3320, 'Instalación especializada de maquinaria y equipo industrial'),
(329, 2750, 'Fabricación de aparatos de uso doméstico'),
(330, 2815, 'Fabricación de hornos, hogares y quemadores industriales'),
(331, 2819, 'Fabricación de otros tipos de maquinaria y equipo de uso general n.c.p..'),
(332, 2610, 'Fabricación de componentes y tableros electrónicos'),
(333, 2620, 'Fabricación de computadoras y de equipo periférico'),
(334, 2817, 'Fabricación de maquinaria y equipo de oficina (excepto computadoras y equipo periférico)'),
(335, 3320, 'Instalación especializada de maquinaria y equipo industrial'),
(336, 2610, 'Fabricación de componentes y tableros electrónicos'),
(337, 2711, 'Fabricación de motores, generadores y transformadores eléctricos'),
(338, 2790, 'Fabricación de otros tipos de equipo eléctrico n.c.p.'),
(339, 2811, 'Fabricación de motores, turbinas y partes para motores de combustión interna'),
(340, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(341, 3314, 'Mantenimiento y reparación especializado de equipo eléctrico'),
(342, 3320, 'Instalación especializada de maquinaria y equipo industrial '),
(343, 2610, 'Fabricación de componentes y tableros electrónicos'),
(344, 2712, 'Fabricación de aparatos de distribución y control de la energía eléctrica'),
(345, 2732, 'Fabricación de dispositivos de cableado'),
(346, 2790, 'Fabricación de otros tipos de equipo eléctrico n.c.p.'),
(347, 3314, 'Mantenimiento y reparación especializado de equipo eléctrico'),
(348, 2610, 'Fabricación de componentes y tableros electrónicos'),
(349, 2731, 'Fabricación de hilos y cables eléctricos y de fibra óptica'),
(350, 2790, 'Fabricación de otros tipos de equipo eléctrico n.c.p.'),
(351, 3314, 'Mantenimiento y reparación especializado de equipo eléctrico'),
(352, 2720, 'Fabricación de pilas, baterías y acumuladores eléctricos'),
(353, 3314, 'Mantenimiento y reparación especializado de equipo eléctrico'),
(354, 2740, 'Fabricación de equipos eléctricos de iluminación'),
(355, 2790, 'Fabricación de otros tipos de equipo eléctrico n.c.p.'),
(356, 3314, 'Mantenimiento y reparación especializado de equipo eléctrico'),
(357, 2599, 'Fabricación de otros productos elaborados de metal n.c.p.'),
(358, 2630, 'Fabricación de equipos de comunicación'),
(359, 2651, 'Fabricación de equipo de medición, prueba, navegación y control'),
(360, 2732, 'Fabricación de dispositivos de cableado'),
(361, 2740, 'Fabricación de equipos eléctricos de iluminación '),
(362, 2790, 'Fabricación de otros tipos de equipo eléctrico n.c.p.'),
(363, 2930, 'Fabricación de partes, piezas (autopartes) y accesorios (lujos) para vehículos automotores'),
(364, 3020, 'Fabricación de locomotoras y de material rodante para ferrocarriles '),
(365, 3313, 'Mantenimiento y reparación especializado de equipo electrónico y óptico'),
(366, 3314, 'Mantenimiento y reparación especializado de equipo eléctrico'),
(367, 2610, 'Fabricación de componentes y tableros electrónicos'),
(368, 3314, 'Mantenimiento y reparación especializado de equipo eléctrico'),
(369, 2630, 'Fabricación de equipos de comunicación'),
(370, 2651, 'Fabricación de equipo de medición, prueba, navegación y control'),
(371, 3313, 'Mantenimiento y reparación especializado de equipo electrónico y óptico'),
(372, 3320, 'Instalación especializada de maquinaria y equipo industrial'),
(373, 9512, 'Mantenimiento y reparación de equipos de comunicación'),
(374, 2610, 'Fabricación de componentes y tableros electrónicos'),
(375, 2630, 'Fabricación de equipos de comunicación'),
(376, 2640, 'Fabricación de aparatos electrónicos de consumo'),
(377, 2670, 'Fabricación de instrumentos ópticos y equipo fotográfico'),
(378, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(379, 3313, 'Mantenimiento y reparación especializado de equipo electrónico y óptico'),
(380, 2660, 'Fabricación de equipo de irradiación y equipo electrónico de uso médico y terapéutico'),
(381, 3250, 'Fabricación de instrumentos, aparatos y materiales médicos y odontológicos (incluido mobiliario)'),
(382, 3290, 'Otras industrias manufactureras n.c.p.'),
(383, 3313, 'Mantenimiento y reparación especializado de equipo electrónico y óptico'),
(384, 3319, 'Mantenimiento y reparación de otros tipos de equipos y sus componentes n.c.p.'),
(385, 3320, 'Instalación especializada de maquinaria y equipo industrial'),
(386, 2651, 'Fabricación de equipo de medición, prueba, navegación y control'),
(387, 3250, 'Fabricación de instrumentos, aparatos y materiales médicos y odontológicos (incluido mobiliario)'),
(388, 3313, 'Mantenimiento y reparación especializado de equipo electrónico y óptico'),
(389, 3319, 'Mantenimiento y reparación de otros tipos de equipos y sus componentes n.c.p.'),
(390, 2651, 'Fabricación de equipo de medición, prueba, navegación y control'),
(391, 3313, 'Mantenimiento y reparación especializado de equipo electrónico y óptico'),
(392, 3320, 'Instalación especializada de maquinaria y equipo industrial'),
(393, 2670, 'Fabricación de instrumentos ópticos y equipo fotográfico'),
(394, 2731, 'Fabricación de hilos y cables eléctricos y de fibra óptica'),
(395, 3250, 'Fabricación de instrumentos, aparatos y materiales médicos y odontológicos (incluido mobiliario)'),
(396, 3313, 'Mantenimiento y reparación especializado de equipo electrónico y óptico'),
(397, 2652, 'Fabricación de relojes'),
(398, 3210, 'Fabricación de joyas, bisutería y artículos conexos'),
(399, 3319, 'Mantenimiento y reparación de otros tipos de equipos y sus componentes n.c.p.'),
(400, 2910, 'Fabricación de vehículos automotores y sus motores'),
(401, 2920, 'Fabricación de carrocerías para vehículos automotores, fabricación de remolques y semirremolques'),
(402, 3311, 'Mantenimiento y reparación especializado de productos elaborados en metal'),
(403, 1392, 'Confección de artículos con materiales textiles, excepto prendas de vestir'),
(404, 2811, 'Fabricación de motores, turbinas, y partes para motores de combustión interna'),
(405, 2930, 'Fabricación de partes, piezas (autopartes) y accesorios (lujos) para vehículos automotores '),
(406, 3011, 'Construcción de barcos y de estructuras flotantes'),
(407, 3315, 'Mantenimiento y reparación especializado de equipo de transporte, excepto los vehículos automotores, motocicletas y bicicletas'),
(408, 3012, 'Construcción de embarcaciones de recreo y deporte'),
(409, 3315, 'Mantenimiento y reparación especializado de equipo de transporte, excepto los vehículos automotores, motocicletas y bicicletas'),
(410, 3020, 'Fabricación de locomotoras y de material rodante para ferrocarriles '),
(411, 3315, 'Mantenimiento y reparación especializado de equipo de transporte, excepto los vehículos automotores, motocicletas y bicicletas'),
(412, 2811, 'Fabricación de motores, turbinas, y partes para motores de combustión interna'),
(413, 2829, 'Fabricación de otros tipos de maquinaria y equipo de uso especial n.c.p.'),
(414, 3030, 'Fabricación de aeronaves, naves espaciales y de maquinaria conexa'),
(415, 3315, 'Mantenimiento y reparación especializado de equipo de transporte, excepto los vehículos automotores, motocicletas y bicicletas'),
(416, 2811, 'Fabricación de motores, turbinas, y partes para motores de combustión interna'),
(417, 3091, 'Fabricación de motocicletas'),
(418, 3092, 'Fabricación de bicicletas y de sillas de ruedas para personas con discapacidad'),
(419, 3240, 'Fabricación de juegos, juguetes y rompecabezas'),
(420, 2816, 'Fabricación de equipo de elevación y manipulación'),
(421, 3099, 'Fabricación de otros tipos de equipo de transporte n.c.p.'),
(422, 3110, 'Fabricación de muebles '),
(423, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(424, 3315, 'Mantenimiento y reparación especializado de equipo de transporte, excepto los vehículos automotores, motocicletas y bicicletas'),
(425, 3110, 'Fabricación de muebles '),
(426, 3120, 'Fabricación de colchones y somieres'),
(427, 3110, 'Fabricación de muebles '),
(428, 3210, 'Fabricación de joyas, bisutería y artículos conexos'),
(429, 3220, 'Fabricación de instrumentos musicales'),
(430, 3319, 'Mantenimiento y reparación de otros tipos de equipos y sus componentes n.c.p. '),
(431, 9529, 'Mantenimiento y reparación de otros efectos personales y enseres domésticos'),
(432, 3230, 'Fabricación de artículos y equipo para la práctica del deporte'),
(433, 2640, 'Fabricación de aparatos electrónicos de consumo'),
(434, 2829, 'Fabricación de otros tipos de maquinaria y equipo de uso especial n.c.p.'),
(435, 3240, 'Fabricación de juegos, juguetes y rompecabezas'),
(436, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(437, 3319, 'Mantenimiento y reparación de otros tipos de equipos y sus componentes n.c.p.'),
(438, 1512, 'Fabricación de artículos de viaje, bolsos de mano y artículos similares elaborados en cuero, y fabricación de artículos de talabartería y guarnicioner'),
(439, 1709, 'Fabricación de otros artículos de papel y cartón'),
(440, 2219, 'Fabricación de formas básicas de caucho y otros productos de caucho, n.c.p.'),
(441, 2599, 'Fabricación de otros productos elaborados de metal n.c.p.'),
(442, 3290, 'Otras industrias manufactureras n.c.p.'),
(443, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(444, 3830, 'Recuperación de materiales'),
(445, 3511, 'Generación de energía eléctrica'),
(446, 3512, 'Transmisión de energía eléctrica'),
(447, 3513, 'Distribución de energía eléctrica'),
(448, 3514, 'Comercialización de energía eléctrica'),
(449, 3520, 'Producción de gas, distribución de combustibles gaseosos por tuberías'),
(450, 3530, 'Suministro de vapor y aire acondicionado'),
(451, 3600, 'Captación, tratamiento y distribución de agua'),
(452, 4311, 'Demolición'),
(453, 4312, 'Preparación del terreno'),
(454, 3900, 'Actividades de saneamiento ambiental y otros servicios de gestión de desechos'),
(455, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(456, 4312, 'Preparación del terreno'),
(457, 3900, 'Actividades de saneamiento ambiental y otros servicios de gestión de desechos'),
(458, 4111, 'Construcción de edificios residenciales '),
(459, 4112, 'Construcción de edificios no residenciales'),
(460, 4210, 'Construcción de carreteras y vías de ferrocarril'),
(461, 4220, 'Construcción de proyectos de servicio público'),
(462, 4290, 'Construcción de otras obras de ingeniería civil'),
(463, 4390, 'Otras actividades especializadas para la construcción de edificios y obras de ingeniería civil'),
(464, 4322, 'Instalaciones de fontanería, calefacción y aire acondicionado'),
(465, 4321, 'Instalaciones eléctricas'),
(466, 4322, 'Instalaciones de fontanería, calefacción y aire acondicionado'),
(467, 4329, 'Otras instalaciones especializadas'),
(468, 4322, 'Instalaciones de fontanería, calefacción y aire acondicionado'),
(469, 4329, 'Otras instalaciones especializadas'),
(470, 4330, 'Terminación y acabado de edificios y obras de ingeniería civil'),
(471, 4390, 'Otras actividades especializadas para la construcción de edificios y obras de ingeniería civil'),
(472, 4511, 'Comercio de vehículos automotores nuevos'),
(473, 4512, 'Comercio de vehículos automotores usados'),
(474, 4520, 'Mantenimiento y reparación de vehículos automotores'),
(475, 5221, 'Actividades de estaciones, vías y servicios complementarios para el transporte terrestre'),
(476, 4530, 'Comercio de partes, piezas (autopartes) y accesorios (lujos) para vehículos automotores'),
(477, 4541, 'Comercio de motocicletas y de sus partes, piezas y accesorios'),
(478, 4542, 'Mantenimiento y reparación de motocicletas y de sus partes y piezas '),
(479, 4731, 'Comercio al por menor de combustible para automotores'),
(480, 4732, 'Comercio al por menor de lubricantes (aceites y grasas) aditivos y productos de limpieza para vehículos automotores'),
(481, 4610, 'Comercio al por mayor a cambio de una retribución o por contrata'),
(482, 4620, 'Comercio al por mayor de materias primas agropecuarias, animales vivos'),
(483, 4631, 'Comercio al por mayor de productos alimenticios'),
(484, 4620, 'Comercio al por mayor de materias primas agropecuarias, animales vivos'),
(485, 4632, 'Comercio al por mayor de bebidas y tabaco'),
(486, 4641, 'Comercio al por mayor de productos textiles, productos confeccionados para uso doméstico'),
(487, 4642, 'Comercio al por mayor de prendas de vestir'),
(488, 4643, 'Comercio al por mayor de calzado'),
(489, 4644, 'Comercio al por mayor de aparatos y equipo de uso doméstico'),
(490, 4645, 'Comercio al por mayor de productos farmacéuticos, medicinales, cosméticos y de tocador'),
(491, 4645, 'Comercio al por mayor de productos farmacéuticos, medicinales, cosméticos y de tocador'),
(492, 4659, 'Comercio al por mayor de otros tipos de maquinaria y equipo n.c.p.'),
(493, 4649, 'Comercio al por mayor de otros utensilios domésticos n.c.p.'),
(494, 4669, 'Comercio al por mayor de otros productos n.c.p.'),
(495, 4649, 'Comercio al por mayor de otros utensilios domésticos n.c.p.'),
(496, 4663, 'Comercio al por mayor de materiales de construcción, artículos de ferretería, pinturas, productos de vidrio, equipo y materiales de fontanería y calef'),
(497, 4661, 'Comercio al por mayor de combustibles sólidos, líquidos, gaseosos y productos conexos'),
(498, 4662, 'Comercio al por mayor de metales y productos metalíferos'),
(499, 4664, 'Comercio al por mayor de productos químicos básicos, cauchos y plásticos en formas primarias y productos químicos de uso agropecuario'),
(500, 4669, 'Comercio al por mayor de otros productos n.c.p.'),
(501, 4665, 'Comercio al por mayor de desperdicios, desechos y chatarra'),
(502, 4669, 'Comercio al por mayor de otros productos n.c.p.'),
(503, 4653, 'Comercio al por mayor de maquinaria y equipo agropecuarios'),
(504, 4659, 'Comercio al por mayor de otros tipos de maquinaria y equipo n.c.p.'),
(505, 4659, 'Comercio al por mayor de otros tipos de maquinaria y equipo n.c.p.'),
(506, 4652, 'Comercio al por mayor de equipo, partes y piezas electrónicos y de telecomunicaciones'),
(507, 4651, 'Comercio al por mayor de computadores, equipo periférico y programas de informática'),
(508, 4659, 'Comercio al por mayor de otros tipos de maquinaria y equipo n.c.p.'),
(509, 4659, 'Comercio al por mayor de otros tipos de maquinaria y equipo n.c.p.'),
(510, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo '),
(511, 4690, 'Comercio al por mayor no especializado'),
(512, 4711, 'Comercio al por menor en establecimientos no especializados con surtido compuesto principalmente por alimentos, bebidas o tabaco'),
(513, 4719, 'Comercio a por menor en establecimientos no especializados, con surtido compuesto principalmente por productos diferentes de alimentos (víveres en gen'),
(514, 4721, 'Comercio al por menor de productos agrícolas para el consumo en establecimientos especializados'),
(515, 4722, 'Comercio al por menor de leche, productos lácteos y huevos en establecimientos especializados'),
(516, 4723, 'Comercio al por menor de carnes (incluye aves de corral), productos cárnicos, pescados y productos de mar en establecimientos especializados'),
(517, 4729, 'Comercio al por menor de otros productos alimenticios n.c.p., en establecimientos especializados'),
(518, 4724, 'Comercio al por menor de bebidas y productos de tabaco, en establecimientos especializados'),
(519, 4729, 'Comercio al por menor de otros productos alimenticios n.c.p., en establecimientos especializados'),
(520, 4773, 'Comercio al por menor de productos farmacéuticos y medicinales, cosméticos y artículos de tocador en establecimientos especializados'),
(521, 4751, 'Comercio al por menor de productos textiles en establecimientos especializados'),
(522, 4771, 'Comercio al por menor de prendas de vestir y sus accesorios (incluye artículos de piel) en establecimientos especializados'),
(523, 4772, 'Comercio al por menor de todo tipo de calzado y artículos de cuero y sucedáneos del cuero en establecimientos especializados.'),
(524, 4741, 'Comercio al por menor de computadores, equipos periféricos, programas de informática y equipos de telecomunicaciones en establecimientos especializado'),
(525, 4742, 'Comercio al por menor de equipos y aparatos de sonido y de video, en establecimientos especializados'),
(526, 4754, 'Comercio al por menor de electrodomésticos y gasodomesticos de uso doméstico, muebles y equipos de iluminación '),
(527, 4754, 'Comercio al por menor de electrodomésticos y gasodomesticos de uso doméstico, muebles y equipos de iluminación '),
(528, 4754, 'Comercio al por menor de electrodomésticos y gasodomesticos de uso doméstico, muebles y equipos de iluminación '),
(529, 4755, 'Comercio al por menor de artículos y utensilios de uso doméstico'),
(530, 4759, 'Comercio al por menor de otros artículos domésticos en establecimientos especializados'),
(531, 4769, 'Comercio al por menor de otros artículos culturales y de entretenimiento n.c.p. en establecimientos especializados'),
(532, 4753, 'Comercio al por menor de tapices, alfombras y recubrimientos para paredes y pisos en establecimientos especializados'),
(533, 4759, 'Comercio al por menor de otros artículos domésticos en establecimientos especializados'),
(534, 4762, 'Comercio al por menor de artículos deportivos, en establecimientos especializados '),
(535, 4769, 'Comercio al por menor de otros artículos culturales y de entretenimiento n.c.p. en establecimientos especializados'),
(536, 4774, 'Comercio al por menor de otros productos nuevos, en establecimientos especializados'),
(537, 4752, 'Comercio al por menor de artículos de ferretería, pinturas y productos de vidrio en establecimientos especializados'),
(538, 4741, 'Comercio al por menor de computadores, equipos periféricos, programas de informática y equipos de telecomunicaciones en establecimientos especializado'),
(539, 4761, 'Comercio al por menor de libros, periódicos, materiales y artículos de papelería y escritorio, en establecimientos especializados'),
(540, 4774, 'Comercio al por menor de otros productos nuevos en establecimientos especializados'),
(541, 4775, 'Comercio al por menor de artículos de segunda mano'),
(542, 4775, 'Comercio al por menor de artículos de segunda mano'),
(543, 6499, 'Otras actividades de servicio financiero, excepto las de seguros y pensiones n.c.p. '),
(544, 4792, 'Comercio al por menor realizado a través de casas de venta o por correo'),
(545, 4781, 'Comercio al por menor de alimentos, bebidas y tabaco en puestos de venta móviles'),
(546, 4782, 'Comercio al por menor de productos textiles, prendas de vestir y calzado, en puestos de venta móviles '),
(547, 4789, 'Comercio al por menor de otros productos, en puestos de venta móviles'),
(548, 4791, 'Comercio al por menor realizado a través de Internet'),
(549, 4799, 'Otros tipos de comercio al por menor no realizado en establecimientos, puestos de venta o mercados'),
(550, 9523, 'Reparación de calzado y artículos de cuero'),
(551, 9529, 'Mantenimiento y reparación de otros efectos personales y enseres domésticos'),
(552, 9512, 'Mantenimiento y reparación de equipos de comunicación'),
(553, 9521, 'Mantenimiento y reparación de aparatos electrónicos de consumo'),
(554, 9522, 'Mantenimiento y reparación de aparatos y equipos domésticos y de jardinería'),
(555, 9524, 'Reparación de muebles y accesorios para el hogar'),
(556, 9529, 'Mantenimiento y reparación de otros efectos personales y enseres domésticos'),
(557, 5511, 'Alojamiento en hoteles'),
(558, 5512, 'Alojamiento en aparta-hoteles'),
(559, 5530, 'Servicios por horas'),
(560, 5513, 'Alojamiento en centros vacacionales '),
(561, 5520, 'Actividades de zonas de camping y parques para vehículos recreacionales'),
(562, 5514, 'Alojamiento rural'),
(563, 5519, 'Otros tipos de alojamientos para visitantes'),
(564, 5590, 'Otros tipos de alojamiento n.c.p. '),
(565, 5611, 'Expendio a la mesa de comidas preparadas'),
(566, 5613, 'Expendio de comidas preparadas en cafeterías'),
(567, 5612, 'Expendio por autoservicio de comidas preparadas'),
(568, 5619, 'Otros tipos de expendio de comidas preparadas n.c.p.'),
(569, 5621, 'Catering para eventos'),
(570, 5629, 'Actividades de otros servicios de comidas'),
(571, 5630, 'Expendio de bebidas alcohólicas para el consumo dentro del establecimiento'),
(572, 4911, 'Transporte férreo de pasajeros '),
(573, 4912, 'Transporte férreo de carga '),
(574, 5221, 'Actividades de estaciones, vías y servicios complementarios para el transporte terrestre'),
(575, 4921, 'Transporte de pasajeros'),
(576, 4921, 'Transporte de pasajeros'),
(577, 4921, 'Transporte de pasajeros'),
(578, 4922, 'Transporte mixto'),
(579, 4923, 'Transporte de carga por carretera'),
(580, 4930, 'Transporte por tuberías'),
(581, 5011, 'Transporte de pasajeros marítimo y de cabotaje '),
(582, 5012, 'Transporte de carga marítimo y de cabotaje '),
(583, 5011, 'Transporte de pasajeros marítimo y de cabotaje '),
(584, 5012, 'Transporte de carga marítimo y de cabotaje '),
(585, 5021, 'Transporte fluvial de pasajeros'),
(586, 5022, 'Transporte fluvial de carga'),
(587, 5111, 'Transporte aéreo nacional de pasajeros '),
(588, 5121, 'Transporte aéreo nacional de carga '),
(589, 5112, 'Transporte aéreo internacional de pasajeros '),
(590, 5122, 'Transporte aéreo internacional de carga '),
(591, 5111, 'Transporte aéreo nacional de pasajeros '),
(592, 5112, 'Transporte aéreo internacional de pasajeros '),
(593, 5121, 'Transporte aéreo nacional de carga '),
(594, 5122, 'Transporte aéreo internacional de carga '),
(595, 5224, 'Manipulación de carga'),
(596, 5210, 'Almacenamiento y depósito'),
(597, 5221, 'Actividades de estaciones, vías y servicios complementarios para el transporte terrestre'),
(598, 5222, 'Actividades de puertos y servicios complementarios para el transporte acuático'),
(599, 5223, 'Actividades de aeropuertos, servicios de navegación aérea y demás actividades conexas al transporte aéreo'),
(600, 5222, 'Actividades de puertos y servicios complementarios para el transporte acuático'),
(601, 5223, 'Actividades de aeropuertos, servicios de navegación aérea y demás actividades conexas al transporte aéreo'),
(602, 3315, 'Mantenimiento y reparación especializado de equipo de transporte, excepto los vehículos automotores, motocicletas y bicicletas'),
(603, 7911, 'Actividades de las agencias de viajes '),
(604, 7912, 'Actividades de operadores turísticos '),
(605, 7990, 'Otros servicios de reserva y actividades relacionadas'),
(606, 5229, 'Otras actividades complementarias al transporte'),
(607, 5310, 'Actividades postales nacionales'),
(608, 8219, 'Fotocopiado, preparación de documentos y otras actividades especializadas de apoyo a oficina'),
(609, 5320, 'Actividades de mensajería'),
(610, 6110, 'Actividades de telecomunicaciones alámbricas'),
(611, 6120, 'Actividades de telecomunicaciones inalámbricas'),
(612, 6130, 'Actividades de telecomunicación satelital'),
(613, 6190, 'Otras actividades de telecomunicaciones'),
(614, 6110, 'Actividades de telecomunicaciones alámbricas'),
(615, 6120, 'Actividades de telecomunicaciones inalámbricas'),
(616, 6130, 'Actividades de telecomunicación satelital'),
(617, 6190, 'Otras actividades de telecomunicaciones'),
(618, 6110, 'Actividades de telecomunicaciones alámbricas'),
(619, 6120, 'Actividades de telecomunicaciones inalámbricas'),
(620, 6130, 'Actividades de telecomunicación satelital'),
(621, 6110, 'Actividades de telecomunicaciones alámbricas'),
(622, 6190, 'Otras actividades de telecomunicaciones'),
(623, 4652, 'Comercio al por mayor de equipo, partes y piezas electrónicos y de comunicaciones '),
(624, 4741, 'Comercio al por menor de computadores, equipos periféricos, programas de informática y equipos de telecomunicaciones en establecimientos especializado'),
(625, 6411, 'Banco Central'),
(626, 6412, 'Bancos comerciales'),
(627, 6421, 'Actividades de las corporaciones financieras'),
(628, 6422, 'Actividades de las compañías de financiamiento '),
(629, 6424, 'Actividades de las cooperativas financieras '),
(630, 6499, 'Otras actividades de servicio financiero, excepto las de seguros y pensiones n.c.p.'),
(631, 6491, 'Leasing financiero (arrendamiento financiero)'),
(632, 6431, 'Fideicomisos, fondos y entidades financieras similares'),
(633, 6492, 'Actividades financieras de fondos de empleados y otras formas asociativas del sector solidario'),
(634, 6514, 'Capitalización'),
(635, 6493, 'Actividades de compra de cartera o factoring'),
(636, 6423, 'Banca de segundo piso'),
(637, 6495, 'Instituciones especiales oficiales'),
(638, 6499, 'Otras actividades de servicio financiero, excepto las de seguros y pensiones n.c.p.'),
(639, 6494, 'Otras actividades de distribución de fondos'),
(640, 6499, 'Otras actividades de servicio financiero, excepto las de seguros y pensiones n.c.p.'),
(641, 7740, 'Arrendamiento de propiedad intelectual y productos similares, excepto obras protegidas por derechos de autor'),
(642, 6511, 'Seguros generales'),
(643, 6521, 'Servicios de seguros sociales de salud '),
(644, 6522, 'Servicios de seguros sociales de riesgos profesionales'),
(645, 6512, 'Seguros de vida'),
(646, 6513, 'Reaseguros'),
(647, 6432, 'Fondos de cesantías'),
(648, 6531, 'Régimen de prima media con prestación definida (RPM)'),
(649, 6532, ' Régimen de ahorro individual (RAI)'),
(650, 6611, 'Administración de mercados financieros '),
(651, 6612, 'Corretaje de valores y de contratos de productos básicos'),
(652, 6613, 'Otras actividades relacionadas con el mercado de valores'),
(653, 6614, 'Actividades de las casas de cambio'),
(654, 6615, 'Actividades de los profesionales de compra y venta de divisas'),
(655, 6619, 'Otras actividades auxiliares de las actividades de servicios financieros n.c.p'),
(656, 6621, 'Actividades de agentes y corredores de seguros'),
(657, 6629, 'Evaluación de riesgos y daños y otras actividades de servicios auxiliares'),
(658, 6629, 'Evaluación de riesgos y daños y otras actividades de servicios auxiliares'),
(659, 6630, 'Actividades de administración de fondos'),
(660, 4290, 'Construcción de otras obras de ingeniería civil'),
(661, 6810, 'Actividades inmobiliarias realizadas con bienes propios o arrendados'),
(662, 6820, 'Actividades inmobiliarias realizadas a cambio de una retribución o por contrata'),
(663, 8110, 'Actividades combinadas de apoyo a instalaciones '),
(664, 7710, 'Alquiler y arrendamiento de vehículos automotores '),
(665, 7730, 'Alquiler y arrendamiento de otros tipos de maquinaria, equipo y bienes tangibles n.c.p.'),
(666, 7730, 'Alquiler y arrendamiento de otros tipos de maquinaria, equipo y bienes tangibles n.c.p.'),
(667, 7730, 'Alquiler y arrendamiento de otros tipos de maquinaria, equipo y bienes tangibles n.c.p.'),
(668, 7721, 'Alquiler y arrendamiento de equipo recreativo y deportivo'),
(669, 7722, 'Alquiler de videos y discos'),
(670, 7729, 'Alquiler y arrendamiento de otros efectos personales y enseres domésticos n.c.p.'),
(671, 7730, 'Alquiler y arrendamiento de otros tipos de maquinaria, equipo y bienes tangibles n.c.p.'),
(672, 6202, 'Actividades de consultoría informática y actividades de administración de instalaciones informáticas '),
(673, 5820, 'Edición de programas de informática (software) '),
(674, 6201, 'Actividades de desarrollo de sistemas informáticos (planificación, análisis, diseño, programación, pruebas)'),
(675, 6202, 'Actividades de consultoría informática y actividades de administración de instalaciones informáticas '),
(676, 6202, 'Actividades de consultoría informática y actividades de administración de instalaciones informáticas '),
(677, 6311, 'Procesamiento de datos, alojamiento (hosting) y actividades relacionadas'),
(678, 5811, 'Edición de libros'),
(679, 5812, 'Edición de directorios y listas de correo'),
(680, 5813, 'Edición de periódicos, revistas y otras publicaciones periódicas'),
(681, 5819, 'Otros trabajos de edición'),
(682, 5820, 'Edición de programas de informática (software)'),
(683, 5920, 'Actividades de grabación de sonido y edición de música'),
(684, 6010, 'Actividades de programación y transmisión en el servicio de radiodifusión sonora '),
(685, 6020, 'Actividades de programación y transmisión de televisión'),
(686, 6312, 'Portales Web'),
(687, 3312, 'Mantenimiento y reparación especializado de maquinaria y equipo'),
(688, 9511, 'Mantenimiento y reparación de computadoras y de equipo periférico'),
(689, 6209, 'Otras actividades de tecnologías de información y actividades de servicios informáticos'),
(690, 7210, 'Investigaciones y desarrollo experimental en el campo de las ciencias naturales y la ingeniería '),
(691, 7220, 'Investigaciones y desarrollo experimental en el campo de las ciencias sociales y las humanidades '),
(692, 6910, 'Actividades jurídicas '),
(693, 6920, 'Actividades de contabilidad, teneduría de libros, auditoria financiera y asesoría tributaria '),
(694, 7320, 'Estudios de mercado y realización de encuestas de opinión pública'),
(695, 7010, 'Actividades de administración empresarial'),
(696, 7020, 'Actividades de consultoría de gestión'),
(697, 7490, 'Otras actividades profesionales, científicas y técnicas n.c.p.'),
(698, 910, 'Actividades de apoyo para la extracción de petróleo y de gas natural'),
(699, 990, 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
(700, 7110, 'Actividades de arquitectura e ingeniería y otras actividades conexas de consultoría técnica '),
(701, 7410, 'Actividades especializadas de diseño'),
(702, 7490, 'Otras actividades profesionales, científicas y técnicas n.c.p.'),
(703, 7120, 'Ensayos y análisis técnicos'),
(704, 7310, 'Publicidad'),
(705, 7810, 'Actividades de agencias de empleo '),
(706, 7820, 'Actividades de agencias de empleo temporal'),
(707, 7830, 'Otras actividades de suministro de recurso humano '),
(708, 7490, 'Otras actividades profesionales, científicas y técnicas n.c.p.'),
(709, 8010, 'Actividades de seguridad privada'),
(710, 8020, 'Actividades de servicios de sistemas de seguridad '),
(711, 8030, 'Actividades de detectives e investigadores privados '),
(712, 8121, 'Limpieza general interior de edificios ');
INSERT INTO `ciiu` (`Codigo`, `Codigo_Ciiu`, `Descripcion`) VALUES
(713, 8129, 'Otras actividades de limpieza de edificios e instalaciones industriales '),
(714, 7420, 'Actividades de fotografía '),
(715, 8292, 'Actividades de envase y empaque '),
(716, 6399, 'Otras actividades de servicio de información n.c.p.'),
(717, 7410, 'Actividades especializadas de diseño'),
(718, 7490, 'Otras actividades profesionales científicas y técnicas n.c.p.'),
(719, 8211, 'Actividades combinadas de servicios administrativos de oficina'),
(720, 8219, 'Fotocopiado, preparación de documentos y otras actividades especializadas de apoyo de oficina '),
(721, 8220, 'Actividades de centros de llamadas (Call center)'),
(722, 8230, 'Organización de convenciones y eventos comerciales '),
(723, 8291, 'Actividades de agencias de cobranza y oficinas de calificación crediticia '),
(724, 8299, 'Otras actividades de servicio de apoyo a las empresas n.c.p.'),
(725, 8560, 'Actividades de apoyo a la educación'),
(726, 8411, 'Actividades legislativas de la administración publica'),
(727, 8412, 'Actividades ejecutivas de la administración publica'),
(728, 8415, 'Actividades de los otros órganos de control '),
(729, 8413, 'Regulación de las actividades de organismos que prestan servicios de salud, educativos, culturales y otros servicios sociales, excepto servicios de se'),
(730, 8414, 'Actividades reguladoras y facilitadoras de la actividad económica'),
(731, 8412, 'Actividades ejecutivas de la administración publica'),
(732, 9101, 'Actividades de bibliotecas y archivos'),
(733, 8421, 'Relaciones exteriores'),
(734, 8890, 'Otras actividades de asistencia social sin alojamiento'),
(735, 8422, 'Actividades de defensa'),
(736, 8424, 'Administración de justicia'),
(737, 7120, 'Ensayos y análisis técnicos'),
(738, 8423, 'Orden público y actividades de seguridad '),
(739, 8430, 'Actividades de planes de seguridad social de afiliación obligatoria'),
(740, 8512, 'Educación preescolar'),
(741, 8513, 'Educación básica primaria'),
(742, 8521, 'Educación básica secundaria'),
(743, 8522, 'Educación media académica'),
(744, 8523, 'Educación media técnica y de formación laboral'),
(745, 8523, 'Educación media técnica y de formación laboral'),
(746, 8530, 'Establecimientos que combinan diferentes niveles de educación'),
(747, 8541, 'Educación técnica profesional'),
(748, 8542, 'Educación tecnológica'),
(749, 8543, 'Educación de instituciones universitarias o de escuelas tecnológicas'),
(750, 8544, 'Educación de universidades'),
(751, 8551, 'Formación académica no formal'),
(752, 8610, 'Actividades de hospitales y clínicas, con internación'),
(753, 8621, 'Actividades de la práctica médica, sin internación'),
(754, 8622, 'Actividades de la práctica odontológica'),
(755, 8691, 'Actividades de apoyo diagnóstico'),
(756, 8692, 'Actividades de apoyo terapéutico'),
(757, 8699, 'Otras actividades de atención de la salud humana'),
(758, 8710, 'Actividades de atención residencial medicalizada de tipo general'),
(759, 7500, 'Actividades veterinarias'),
(760, 8720, 'Actividades de atención residencial, para el cuidado de pacientes con retardo mental, enfermedad mental y consumo de sustancias psicoactivas'),
(761, 8730, 'Actividades de atención en instituciones para el cuidado de personas mayores y/o discapacitadas'),
(762, 8790, 'Otras actividades de atención en instituciones con alojamiento'),
(763, 8810, 'Actividades de asistencia social sin alojamiento para personas mayores y discapacitadas'),
(764, 8890, 'Otras actividades de asistencia social sin alojamiento'),
(765, 3700, 'Evacuación y tratamiento de aguas residuales'),
(766, 3811, 'Recolección de desechos no peligrosos'),
(767, 3812, 'Recolección de desechos peligrosos'),
(768, 3821, 'Tratamiento y disposición de desechos no peligrosos '),
(769, 3822, 'Tratamiento y disposición de desechos peligrosos '),
(770, 3900, 'Actividades de saneamiento ambiental y otros servicios de gestion de desechos'),
(771, 8129, 'Otras actividades de limpieza de edificios e instalaciones industriales'),
(772, 8130, 'Actividades de paisajismo y servicios de mantenimiento conexos'),
(773, 9411, 'Actividades de asociaciones empresariales y de empleadores'),
(774, 9412, 'Actividades de asociaciones profesionales'),
(775, 9420, 'Actividades de sindicatos de empleados'),
(776, 9491, 'Actividades de asociaciones religiosas'),
(777, 9492, 'Actividades de asociaciones políticas'),
(778, 9499, 'Actividades de otras asociaciones n.c.p.'),
(779, 5911, 'Actividades de producción de películas cinematográficas, videos, programas, anuncios y comerciales de televisión.'),
(780, 5912, 'Actividades de postproducción de películas cinematográficas, videos, programas, anuncios y comerciales de televisión'),
(781, 5913, 'Actividades de distribución de películas cinematográficas, videos, programas, anuncios y comerciales de televisión '),
(782, 5920, 'Actividades de grabación de sonido y edición de música'),
(783, 5914, 'Actividades de exhibición de películas cinematográficas y videos'),
(784, 5911, 'Actividades de producción de películas cinematográficas, videos, programas, anuncios y comerciales de televisión.'),
(785, 5920, 'Actividades de grabación de sonido y edición de música'),
(786, 6010, 'Actividades de programación y transmisión en el servicio de radiodifusión sonora '),
(787, 6020, 'Actividades de programación y transmisión de televisión'),
(788, 7990, 'Otros servicios de reserva y actividades relacionadas'),
(789, 9001, 'Creación literaria'),
(790, 9002, 'Creación musical'),
(791, 9003, 'Creación teatral'),
(792, 9004, 'Creación audiovisual'),
(793, 9005, 'Artes plásticas y visuales'),
(794, 9006, 'Actividades teatrales'),
(795, 9007, 'Actividades de espectáculos musicales en vivo'),
(796, 7990, 'Otros servicios de reserva y actividades relacionadas'),
(797, 8553, 'Enseñanza cultural'),
(798, 9008, 'Otras actividades de espectáculos en vivo'),
(799, 9321, 'Actividades de parques de atracciones y parques temáticos'),
(800, 9329, 'Otras actividades recreativas y de esparcimiento n.c.p.'),
(801, 6391, 'Actividades de agencias de noticias'),
(802, 7420, 'Actividades de fotografía'),
(803, 9001, 'Creación literaria'),
(804, 5912, 'Actividades de postproducción de películas cinematográficas, videos, programas, anuncios y comerciales de televisión'),
(805, 9101, 'Actividades de bibliotecas y archivos'),
(806, 9102, 'Actividades y funcionamiento de museos, conservación de edificios y sitios históricos'),
(807, 9103, 'Actividades de jardines botánicos, zoológicos y reservas naturales'),
(808, 7990, 'Otros servicios de reserva y actividades relacionadas'),
(809, 8552, 'Enseñanza deportiva y recreativa'),
(810, 8559, 'Otros tipos de educación n.c.p.'),
(811, 9311, 'Gestión de instalaciones deportivas'),
(812, 9312, 'Actividades de clubes deportivos'),
(813, 9319, 'Otras actividades deportivas'),
(814, 9329, 'Otras actividades recreativas y de esparcimiento n.c.p.'),
(815, 9200, 'Actividades de juegos de azar y apuestas'),
(816, 7810, 'Actividades de agencias de empleo'),
(817, 9329, 'Otras actividades recreativas y de esparcimiento n.c.p.'),
(818, 9601, 'Lavado y limpieza, incluso la limpieza en seco, de productos textiles y de piel '),
(819, 9602, 'Peluquería y otros tratamientos de belleza'),
(820, 9603, 'Pompas fúnebres y actividades relacionadas'),
(821, 8552, 'Enseñanza deportiva y recreativa'),
(822, 9609, 'Otras actividades de servicios personales n.c.p.'),
(823, 9700, 'Actividades de los hogares individuales como empleadores de personal doméstico'),
(824, 9900, 'Actividades de organizaciones y entidades extraterritoriales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_agua`
--

CREATE TABLE `consumo_agua` (
  `Sede` int(11) NOT NULL,
  `Consumo_empleados` int(11) NOT NULL,
  `Riego_jardines` int(11) NOT NULL,
  `Lavado_instalaciones` int(11) NOT NULL,
  `Consumo_procesos` int(11) NOT NULL,
  `Unidades_sanitarias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_empleados`
--

CREATE TABLE `consumo_empleados` (
  `Codigo` int(11) NOT NULL,
  `Duchas` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Casino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_procesos`
--

CREATE TABLE `consumo_procesos` (
  `codigo` int(11) NOT NULL,
  `Medicion_individual` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento`
--

CREATE TABLE `elemento` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Subtipo` int(11) NOT NULL,
  `Unidad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `F_e_CO2` double NOT NULL,
  `Unidades_CO2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `F_e_CH4` double DEFAULT NULL,
  `Unidades_CH4` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `F_e_N2O` double DEFAULT NULL,
  `Unidades_N2O` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `elemento`
--

INSERT INTO `elemento` (`Codigo`, `Nombre`, `Subtipo`, `Unidad`, `F_e_CO2`, `Unidades_CO2`, `F_e_CH4`, `Unidades_CH4`, `F_e_N2O`, `Unidades_N2O`) VALUES
(1001, 'Avigas', 2, 'Gal', 6.387, 'Kg CO2/gal', 0.0000237, 'Kg CH4/gal', 0.0000047, 'Kg N2O/gal'),
(1002, 'Biodiesel palma', 2, 'Gal', 6.8823, 'Kg CO2/gal', 0.0000263, 'Kg CH4/gal', 0.0000053, 'Kg N2O/gal'),
(1003, 'Etanol Anhidro', 2, 'Gal', 5.9201, 'Kg CO2/gal', 0.0000146, 'Kg CH4/gal', 0.0000029, 'Kg N2O/gal'),
(1004, 'Combustóleo', 2, 'Gal', 11.6246, 'Kg CO2/gal', 0.0000302, 'Kg CH4/gal', 0.000006, 'Kg N2O/gal'),
(1005, 'Crudo de Castilla', 2, 'Gal', 11.2818, 'Kg CO2/gal', 0.0000303, 'Kg CH4/gal', 0.0000061, 'Kg N2O/gal'),
(1006, 'Diésel B10 (Mezcla comercial)', 2, 'Gal', 10.2765, 'Kg CO2/gal', 0.0000096, 'Kg CH4/gal', 0.0000058, 'Kg N2O/gal'),
(1007, 'Diésel Marino', 2, 'Gal', 8.8632, 'Kg CO2/gal', 0.0000095, 'Kg CH4/gal', 0.0000057, 'Kg N2O/gal'),
(1009, 'Fuel Oil # 4 - Ecopetrol', 2, 'Gal', 10.1781, 'Kg CO2/gal', 0.0000272, 'Kg CH4/gal', 0.0000054, 'Kg N2O/gal'),
(1010, 'Gasolina E10(Mezcla comercial)', 2, 'Gal', 7.6181, 'Kg CO2/gal', 0.0000239, 'Kg CH4/gal', 0.0000048, 'Kg N2O/gal'),
(1012, 'Jet A1', 2, 'Gal', 9.8404, 'Kg CO2/gal', 0.0000233, 'Kg CH4/gal', 0.0000047, 'Kg N2O/gal'),
(1013, 'Kerosene', 2, 'Gal', 9.6232, 'Kg CO2/gal', 0.0000272, 'Kg CH4/gal', 0.0000054, 'Kg N2O/gal'),
(1014, 'Carbón Generico', 1, 'Ton ', 2534.813, 'Kg CO2/ton', 0.0287602, 'Kg CH4/ton', 0.0431404, 'Kg N2O/ton'),
(1015, 'Bagazo', 1, 'Ton ', 1664.9168, 'Kg CO2/ton', 0.4422884, 'Kg CH4/ton', 0.0589718, 'Kg N2O/ton'),
(1016, 'Borra de Café', 1, 'Ton', 2222.1487, 'Kg CO2/ton', 0.735, 'Kg CH4/ton', 0.098, 'Kg N2O/ton'),
(1017, 'Carbon Antioquia', 1, 'Ton ', 2277.449, 'Kg CO2/ton', 0.0244054, 'Kg CH4/ton', 0.0366081, 'Kg N2O/ton'),
(1018, 'Carbón Boyacá', 1, 'Ton ', 3052.795, 'Kg CO2/ton', 0.0352062, 'Kg CH4/ton', 0.0528093, 'Kg N2O/ton'),
(1019, 'Carbón Cauca - Valle del Cauca', 1, 'Ton ', 2507.633, 'Kg CO2/ton', 0.0312123, 'Kg CH4/ton', 0.0468184, 'Kg N2O/ton'),
(1020, 'Carbón Córdoba-Norte de Antioquia', 1, 'Ton ', 1903.181, 'Kg CO2/ton', 0.0209476, 'Kg CH4/ton', 0.0314214, 'Kg N2O/ton'),
(1021, 'Carbón Cundinamarca', 1, 'Ton ', 2214.458, 'Kg CO2/ton', 0.0291702, 'Kg CH4/ton', 0.0437553, 'Kg N2O/ton'),
(1022, 'Carbón Guajira', 1, 'Ton ', 2894.059, 'Kg CO2/ton', 0.0304169, 'Kg CH4/ton', 0.0456253, 'Kg N2O/ton'),
(1023, 'Carbón Guajira - Cesar', 1, 'Ton ', 2160.755, 'Kg CO2/ton', 0.0266224, 'Kg CH4/ton', 0.0399335, 'Kg N2O/ton'),
(1024, 'Carbón Norte de Santander', 1, 'Ton ', 2812.754, 'Kg CO2/ton', 0.0312293, 'Kg CH4/ton', 0.0468439, 'Kg N2O/ton'),
(1025, 'Carbón Santander', 1, 'Ton ', 2560.306, 'Kg CO2/ton', 0.0330767, 'Kg CH4/ton', 0.049615, 'Kg N2O/ton'),
(1026, 'Carbón Santander Sogamoso', 1, 'Ton', 2690.982, 'Kg CO2/ton', 0.0292047, 'Kg CH4/ton', 0.0438071, 'Kg N2O/ton'),
(1027, 'Cascarilla de Arroz', 1, 'Ton', 1553.2506, 'Kg CO2/ton', 0.4485882, 'Kg CH4/ton', 0.0598118, 'Kg N2O/ton'),
(1028, 'Cisco de Café', 1, 'Ton', 1871.6688, 'Kg CO2/ton', 0.5377797, 'Kg CH4/ton', 0.071704, 'Kg N2O/ton'),
(1029, 'Cuesco de palma', 1, 'Ton', 1758.4453, 'Kg CO2/ton', 0.5031291, 'Kg CH4/ton', 0.0670839, 'Kg N2O/ton'),
(1030, 'Fibra de palma', 1, 'Ton', 1869.8367, 'Kg CO2/ton', 0.4991913, 'Kg CH4/ton', 0.0665588, 'Kg N2O/ton'),
(1031, 'Leña', 1, 'Ton', 1521.3392, 'Kg CO2/ton', 0.5098035, 'Kg CH4/ton', 0.0679738, 'Kg N2O/ton'),
(1032, 'Madera Acacia', 1, 'Ton', 1942.7541, 'Kg CO2/ton', 0.56082, 'Kg CH4/ton', 0.074776, 'Kg N2O/ton'),
(1033, 'Madera Eucalipto', 1, 'Ton', 1953.3803, 'Kg CO2/ton', 0.55467, 'Kg CH4/ton', 0.073956, 'Kg N2O/ton'),
(1034, 'Madera Genérico', 1, 'Ton', 1958.4185, 'Kg CO2/ton', 0.5093728, 'Kg CH4/ton', 0.0679164, 'Kg N2O/ton'),
(1035, 'Madera Melina', 1, 'Ton', 1932.128, 'Kg CO2/ton', 0.55746, 'Kg CH4/ton', 0.074328, 'Kg N2O/ton'),
(1036, 'Madera Pino', 1, 'Ton', 1953.3803, 'Kg CO2/ton', 0.56907, 'Kg CH4/ton', 0.075876, 'Kg N2O/ton'),
(1037, 'Raquis de palma', 1, 'Ton', 1965.8385, 'Kg CO2/ton', 0.548921, 'Kg CH4/ton', 0.0731895, 'Kg N2O/ton'),
(1038, 'Residuos para coprocesamiento', 1, 'Ton ', 2941.796, 'Kg CO2/ton', 1.1376222, 'Kg CH4/ton', 0.0037921, 'Kg N2O/ton'),
(1039, 'Biogás Genérico', 3, 'm3', 1.856, 'Kg CO2/m3', 0.000022, 'Kg CH4/m3', 0.0000022, 'Kg N2O/m3'),
(1040, 'Acetileno', 3, 'kg', 3.38, 'Kg CO2/Kg', 0, 'Kg CH4/Kg', 0, 'Kg N2O/Kg'),
(1041, 'Coke Gas Genérico', 3, 'm3', 0.6129, 'Kg CO2/m3', 0.000015, 'Kg CH4/m3', 0.0000015, 'Kg N2O/m3'),
(1042, 'Gas Cupiagua', 3, 'm3', 2.1621, 'Kg CO2/m3', 0.0000379, 'Kg CH4/m3', 0.0000038, 'Kg N2O/m3'),
(1043, 'Gas de Pozo cupiagua', 3, 'm3', 2.2818, 'Kg CO2/m3', 0.0000406, 'Kg CH4/m3', 0.0000041, 'Kg N2O/m3'),
(1044, 'Gas La Creciente', 3, 'm3', 1.8321, 'Kg CO2/m3', 0.0000335, 'Kg CH4/m3', 0.0000034, 'Kg N2O/m3'),
(1045, 'Gas MAPP', 3, 'kg', 3.121890903, 'Kg CO2/Kg', 0, 'Kg CH4/Kg', 0, 'Kg N2O/Kg'),
(1046, 'Gas Natural Cusiana', 3, 'm3', 2.1913, 'Kg CO2/m3', 0.0000387, 'Kg CH4/m3', 0.0000039, 'Kg N2O/m3'),
(1047, 'Gas Natural Genérico', 3, 'm3', 1.9806, 'Kg CO2/m3', 0.0000357, 'Kg CH4/m3', 0.0000036, 'Kg N2O/m3'),
(1048, 'Gas Natural Guajira', 3, 'm3', 1.8397, 'Kg CO2/m3', 0.0000335, 'Kg CH4/m3', 0.0000033, 'Kg N2O/m3'),
(1049, 'Gas Natural Guepaje', 3, 'm3', 1.8259, 'Kg CO2/m3', 0.0000333, 'Kg CH4/m3', 0.0000033, 'Kg N2O/m3'),
(1050, 'Gas Natural Mezcla Mariquita', 3, 'm3', 2.1795, 'Kg CO2/m3', 0.0000385, 'Kg CH4/m3', 0.0000038, 'Kg N2O/m3'),
(1051, 'Gas Natural Mezcla Sebastopol', 3, 'm3', 1.9421, 'Kg CO2/m3', 0.0000355, 'Kg CH4/m3', 0.0000036, 'Kg N2O/m3'),
(1052, 'Gas Natural Mezcla Usme', 3, 'm3', 2.101, 'Kg CO2/m3', 0.0000373, 'Kg CH4/m3', 0.0000037, 'Kg N2O/m3'),
(1053, 'Gas Natural Neiva - Huila', 3, 'm3', 2.0355, 'Kg CO2/m3', 0.0000373, 'Kg CH4/m3', 0.0000037, 'Kg N2O/m3'),
(1054, 'Gas Opon Payoa', 3, 'm3', 1.9775, 'Kg CO2/m3', 0.0000354, 'Kg CH4/m3', 0.0000035, 'Kg N2O/m3'),
(1055, 'GLP Genérico', 3, 'kg', 3.051, 'Kg CO2/Kg', 0.000045, 'Kg CH4/Kg', 0.000005, 'Kg N2O/Kg'),
(1056, 'LPG Propano', 3, 'm3', 5.5792, 'Kg CO2/m3', 0.0000863, 'Kg CH4/m3', 0.0000086, 'Kg N2O/m3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `Codigo` int(11) NOT NULL,
  `Nit` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Representante` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `correo` text COLLATE utf8_unicode_ci NOT NULL,
  `CIIU` int(11) DEFAULT NULL,
  `Huella` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Hidrica` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`Codigo`, `Nit`, `Nombre`, `Representante`, `telefono`, `correo`, `CIIU`, `Huella`, `Hidrica`) VALUES
(1, '900964705-5', 'Ecoblue', 'Eduardo Ramirez', '4159282', 'soporte@ecoblue.co', 272, NULL, NULL),
(2, '79654', 'sebaste', 'sebastian', '78952', 'correo@correo.co', 82, NULL, NULL),
(3, '901244612-3', 'Agencia de servicios y estudios ambientales BioDat', 'Sandra Morales', '75685', 'agenciabiodata@gmail.com', 58, NULL, NULL),
(4, '123', 'Miguel', 'mig', '12357', 'correo@correo.co', 1, 'null', 'null'),
(5, '745236985', 'Nueva empresa', 'Miguel otra VEz', '789542332', 'miguelangel_1704@hotmail.com', 4, 'null', 'null'),
(6, '799655', 'Esta es de prueba', 'Miguel', '8965412', 'Migueal@este.co', 603, 'null', 'null');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_electronico`
--

CREATE TABLE `equipo_electronico` (
  `Codigo` int(11) NOT NULL,
  `Sede` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Cantidad_equipos` int(11) NOT NULL,
  `Horas` double NOT NULL,
  `Dias` int(11) NOT NULL,
  `Refrigerante` int(11) DEFAULT NULL,
  `Lubricantes` int(11) NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL,
  `observacion` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `equipo_electronico`
--

INSERT INTO `equipo_electronico` (`Codigo`, `Sede`, `Nombre`, `Cantidad_equipos`, `Horas`, `Dias`, `Refrigerante`, `Lubricantes`, `estado`, `observacion`) VALUES
(6, 1, 'espichadora', 2, 8, 5, 0, 0, 0, NULL),
(7, 1, 'impresora', 10, 10, 5, 0, 0, 0, NULL),
(12, 1, 'Compactadora', 2, 12, 6, 0, 0, 0, NULL),
(13, 2, 'asdads', 2, 2, 2, 0, 0, 0, NULL),
(14, 5, 'aire acondicionado ', 4, 8, 6, 0, 0, 0, NULL),
(15, 5, 'aire acondicionado ', 4, 8, 6, 0, 0, 0, NULL),
(16, 5, 'horno', 1, 1, 6, 0, 0, 0, NULL),
(17, 5, 'aire acondicionado ', 4, 8, 6, 20, 0, 0, NULL),
(18, 5, 'horno', 1, 1, 6, 0, 0, 0, NULL),
(19, 10, 'Nevera', 5, 24, 7, 0, 0, 0, NULL),
(20, 10, 'Congelador', 2, 24, 7, 0, 0, 0, NULL),
(21, 1, 'embalsadora', 2, 2, 2, 1, 0, 0, NULL),
(22, 1, 'nevera', 3, 24, 7, 9, 0, 0, NULL),
(27, 10, 'Extractor', 3, 6, 7, 0, 0, 0, NULL),
(28, 10, 'Licuadora', 4, 3, 7, 0, 0, 0, NULL),
(29, 5, 'Computador', 4, 9, 6, 0, 0, 0, NULL),
(30, 5, 'patines', 0, 1, 1, 0, 1, 1, ' 2019-11-06 0 Para las pruebas'),
(31, 5, 'Patines', 0, 10, 7, 0, 1, 1, ' 2019-11-06 0 Para pruebas de inserción'),
(32, 1, 'computador mac', 1, 6, 6, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extintores`
--

CREATE TABLE `extintores` (
  `codigo` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `unidad` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Co2` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Unidad_reporte` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ruta` text COLLATE utf8_unicode_ci NOT NULL,
  `Buscar` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `extintores`
--

INSERT INTO `extintores` (`codigo`, `Nombre`, `unidad`, `Co2`, `Unidad_reporte`, `ruta`, `Buscar`) VALUES
(1001, 'Extintores CO2', 'Kg', '1', 'kgCO2e/kg', 'extintorCo2.jpg', 'Extintor_co'),
(1002, 'Extintores R-123 / HCFC-123', 'Kg', '79', 'kgCO2e/kg', 'extintorR-123.jpg', 'Extintor_HCFC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extintor_sede`
--

CREATE TABLE `extintor_sede` (
  `codigo` int(11) NOT NULL,
  `sede` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Peso` double NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `extintor_sede`
--

INSERT INTO `extintor_sede` (`codigo`, `sede`, `Cantidad`, `Peso`, `Fecha`) VALUES
(1001, 1, 67, 20, '2019-11-23'),
(1001, 5, 2, 20, '2019-11-13'),
(1001, 5, 2, 50, '2019-11-08'),
(1001, 10, 2, 12, '2019-11-23'),
(1001, 10, 5, 30, '2019-10-30'),
(1002, 1, 45, 30, '2019-11-15'),
(1002, 1, 8, 90, '2019-10-01'),
(1002, 5, 5, 20, '2019-11-08'),
(1002, 10, 3, 20, '2019-10-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extintor_vehiculo`
--

CREATE TABLE `extintor_vehiculo` (
  `Vehiculo` int(11) NOT NULL,
  `extintor` int(11) NOT NULL,
  `Peso` int(11) NOT NULL,
  `Fecha_subida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `extintor_vehiculo`
--

INSERT INTO `extintor_vehiculo` (`Vehiculo`, `extintor`, `Peso`, `Fecha_subida`) VALUES
(20, 1002, 30, '2019-11-08'),
(21, 1002, 20, '2019-11-08'),
(22, 1002, 30, '2019-11-08'),
(23, 1001, 20, '2019-11-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extintor_vehiculo_elec`
--

CREATE TABLE `extintor_vehiculo_elec` (
  `Vehiculo` int(11) NOT NULL,
  `extintor` int(11) NOT NULL,
  `Peso` int(11) NOT NULL,
  `Fecha_subida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `extintor_vehiculo_elec`
--

INSERT INTO `extintor_vehiculo_elec` (`Vehiculo`, `extintor`, `Peso`, `Fecha_subida`) VALUES
(7, 1001, 10, '2019-11-08'),
(8, 1001, 20, '2019-11-08'),
(8, 1002, 30, '2019-11-08'),
(9, 1001, 10, '2019-11-08'),
(9, 1002, 20, '2019-11-08'),
(13, 1002, 30, '2019-11-15'),
(14, 1002, 30, '2019-11-15'),
(15, 1002, 30, '2019-11-15'),
(16, 1001, 20, '2019-11-23'),
(16, 1002, 20, '2019-11-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuentes_fijas`
--

CREATE TABLE `fuentes_fijas` (
  `Codigo` int(11) NOT NULL,
  `Sede` int(11) NOT NULL,
  `Fuente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Elemento` int(11) NOT NULL,
  `horas_dias` int(11) NOT NULL,
  `dias_semana` int(11) NOT NULL,
  `refrigerante` int(11) DEFAULT NULL,
  `Lubricantes` int(11) NOT NULL,
  `fecha_i_funcion` date NOT NULL,
  `Fecha` date NOT NULL,
  `Estado` int(20) DEFAULT NULL,
  `Observacion` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fuentes_fijas`
--

INSERT INTO `fuentes_fijas` (`Codigo`, `Sede`, `Fuente`, `Cantidad`, `Elemento`, `horas_dias`, `dias_semana`, `refrigerante`, `Lubricantes`, `fecha_i_funcion`, `Fecha`, `Estado`, `Observacion`) VALUES
(1, 1, 'espichadora', 1, 1017, 5, 5, 2, 0, '2018-12-01', '2019-10-01', 0, NULL),
(2, 1, 'caldera', 2, 1022, 3, 2, 3, 0, '2018-11-30', '2019-10-01', 0, NULL),
(3, 1, 'horno', 0, 1017, 3, 2, 4, 0, '2018-11-30', '2019-10-01', 1, ' 2019-11-23 0 '),
(4, 5, 'Estufa', 2, 1055, 4, 6, 0, 0, '2019-06-03', '2019-10-10', 0, NULL),
(5, 5, 'Estufa', 2, 1055, 4, 6, 0, 0, '2019-06-03', '2019-10-10', 0, NULL),
(6, 5, 'Estufa', 2, 1055, 4, 6, 0, 0, '2019-06-03', '2019-10-10', 0, NULL),
(7, 10, 'estufa', 1, 1047, 12, 7, 0, 0, '2000-01-03', '2019-10-11', 0, ' 2019-11-23 3  2019-11-23 3  2019-11-23 3  2019-11-23 2 prueba 2019-11-23 1 prueba'),
(8, 10, 'Horno', 1, 1055, 6, 7, 0, 0, '2000-02-08', '2019-10-11', 0, ' 2019-11-23 4  2019-11-23 3  2019-11-23 2  2019-11-23 1 '),
(9, 10, 'Caldera', 1, 1014, 24, 7, 3, 0, '2018-01-01', '2019-10-30', 0, NULL),
(13, 5, 'monta', 0, 1006, 5, 7, 0, 0, '2019-01-01', '2019-10-30', 0, ''),
(15, 10, 'as', 0, 1018, 4, 7, 0, 1, '2019-12-31', '2019-10-31', 1, ' 2019-11-23 1  2019-11-23 1  2019-11-23 1  2019-11-23 -2  2019-11-23 -3 priueba 2019-11-23 0 hols'),
(16, 5, 'hola', 0, 1016, 2, 5, 2, 1, '2019-12-31', '2019-11-05', 1, ' 2019-11-05 0 por pruebas'),
(17, 5, 'hola', 0, 1016, 2, 5, 2, 1, '2019-12-31', '2019-11-05', 1, ' 2019-11-05 1 maquina dañada 2019-11-05 0 maquina dañada'),
(18, 5, 'holas', 0, 1003, 1, 8, 0, 1, '2019-01-01', '2019-11-05', 1, ' 2019-11-05 0 Pruebas'),
(19, 5, 'holas', 0, 1003, 1, 7, 0, 1, '2019-01-01', '2019-11-05', 1, ' 2019-11-05 0 Pruebas'),
(29, 5, 'nbvc', 0, 1014, 1, 1, 0, 0, '2019-12-31', '2019-11-05', 1, ' 2019-11-05 0 '),
(30, 5, 'Monta', 0, 1015, 1, 1, 0, 0, '2019-12-31', '2019-11-05', 1, ' 2019-11-06 0 Para las pruebas'),
(31, 5, 'hol', 0, 1014, 1, 1, 0, 0, '2019-12-31', '2019-11-05', 1, ' 2019-11-05 0 tocaba'),
(32, 1, 'Rectificadpora de frenos ', 1, 1006, 4, 4, 0, 0, '2018-12-12', '2019-11-23', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuentes_moviles`
--

CREATE TABLE `fuentes_moviles` (
  `Codigo` int(11) NOT NULL,
  `Sede` int(11) NOT NULL,
  `Vehiculo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Tipo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Placa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Combustible` int(11) NOT NULL,
  `Refrigerante` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `estado` int(11) NOT NULL,
  `observacion` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fuentes_moviles`
--

INSERT INTO `fuentes_moviles` (`Codigo`, `Sede`, `Vehiculo`, `Tipo`, `Placa`, `Combustible`, `Refrigerante`, `Fecha`, `estado`, `observacion`) VALUES
(1, 1, 'Mazda', '1', 'CUA-159', 1001, 0, '2019-08-29', 0, NULL),
(2, 1, 'Mazda', '1', 'CUA-159', 1002, 0, '2019-08-29', 0, NULL),
(3, 1, 'chevrolet', '2', 'GHT-789', 1010, 0, '2019-10-11', 0, NULL),
(4, 1, 'chevrolet', '2', 'GHT-789', 1010, 0, '2019-10-11', 0, NULL),
(5, 1, 'chevrolet', '2', 'GHT-789', 1010, 0, '2019-10-11', 0, NULL),
(6, 5, 'Scoda', '1', 'VH-478', 1010, 0, '2019-10-16', 0, NULL),
(10, 10, 'Renault', '1', 'BOD795', 1010, 0, '2019-10-30', 0, NULL),
(20, 5, 'Pollito', '1', 'tax125', 1010, 0, '2019-11-08', 0, NULL),
(21, 5, 'Pollito', '1', 'tax125', 1010, 3, '2019-11-08', 0, NULL),
(22, 5, 'Pollitico', '1', 'tax125', 1010, 0, '2019-11-08', 0, NULL),
(23, 1, 'Renoult', '1', 'ksj785', 1010, 0, '2019-11-15', 0, NULL),
(24, 1, 'Renoult', '2', 'ksj785', 1010, 0, '2019-11-15', 0, NULL),
(25, 1, 'Toyota', '2', 'mks781', 1010, 0, '2019-11-15', 0, NULL),
(26, 1, 'Toyota', '2', 'mks781', 1010, 0, '2019-11-15', 0, NULL),
(27, 1, 'Toyota', '2', 'mks781', 1010, 0, '2019-11-15', 0, NULL),
(28, 1, 'POLLITO', '2', 'KYC 123', 1009, 0, '2019-11-23', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuente_emision`
--

CREATE TABLE `fuente_emision` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huella_carbono_energia`
--

CREATE TABLE `huella_carbono_energia` (
  `Codigo` int(11) NOT NULL,
  `Sede` int(11) NOT NULL,
  `Factor_CO2` double NOT NULL,
  `Cantidad` double NOT NULL,
  `Total_CO2` double NOT NULL,
  `Fecha_registro` date NOT NULL,
  `Fecha_subida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `huella_carbono_energia`
--

INSERT INTO `huella_carbono_energia` (`Codigo`, `Sede`, `Factor_CO2`, `Cantidad`, `Total_CO2`, `Fecha_registro`, `Fecha_subida`) VALUES
(1, 5, 0.2096, 25, 5.24, '2019-10-22', '2019-10-22'),
(2, 5, 0.2096, 678, 142.1088, '2019-10-30', '2019-10-30'),
(3, 10, 0.2096, 458, 95.9968, '2019-11-23', '2019-11-23'),
(4, 10, 0.2096, 152, 31.8592, '2019-11-25', '2019-11-25'),
(5, 10, 0, 800, 0, '2019-11-28', '2019-11-28'),
(6, 10, 0, 800, 0, '2019-11-28', '2019-11-28'),
(7, 10, 0, 800, 0, '2019-11-28', '2019-11-28'),
(8, 10, 0, 800, 0, '2019-11-28', '2019-11-28'),
(9, 1, 0.2096, 1500, 314.4, '2020-05-21', '2020-05-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huella_carbono_extintores`
--

CREATE TABLE `huella_carbono_extintores` (
  `Codigo` int(11) NOT NULL,
  `Extintor` int(11) NOT NULL,
  `Cantidad` double NOT NULL,
  `Total` double NOT NULL,
  `Fecha_registro` date NOT NULL,
  `Fecha_subida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `huella_carbono_extintores`
--

INSERT INTO `huella_carbono_extintores` (`Codigo`, `Extintor`, `Cantidad`, `Total`, `Fecha_registro`, `Fecha_subida`) VALUES
(9, 1001, 2, 2, '2019-10-30', '2019-10-30'),
(10, 1002, 2, 158, '2019-10-30', '2019-10-30'),
(11, 1001, 21, 462, '2019-11-18', '2019-11-18'),
(12, 1002, 21, 39816, '2019-11-18', '2019-11-18'),
(13, 1001, 21, 462, '2019-11-18', '2019-11-18'),
(14, 1002, 21, 39816, '2019-11-18', '2019-11-18'),
(15, 1001, 21, 462, '2019-11-18', '2019-11-18'),
(16, 1002, 21, 39816, '2019-11-18', '2019-11-18'),
(17, 1001, 21, 462, '2019-11-18', '2019-11-18'),
(18, 1002, 21, 39816, '2019-11-18', '2019-11-18'),
(19, 1001, 21, 462, '2019-11-18', '2019-11-18'),
(20, 1002, 21, 39816, '2019-11-18', '2019-11-18'),
(21, 1001, 21, 462, '2019-11-18', '2019-11-18'),
(22, 1002, 21, 39816, '2019-11-18', '2019-11-18'),
(23, 1001, 21, 462, '2019-11-18', '2019-11-18'),
(24, 1002, 21, 39816, '2019-11-18', '2019-11-18'),
(25, 1001, 21, 462, '2019-11-18', '2019-11-18'),
(26, 1002, 21, 39816, '2019-11-18', '2019-11-18'),
(27, 1001, 21, 462, '2019-11-18', '2019-11-18'),
(28, 1002, 21, 39816, '2019-11-18', '2019-11-18'),
(29, 1001, 21, 462, '2019-11-18', '2019-11-18'),
(30, 1002, 21, 39816, '2019-11-18', '2019-11-18'),
(31, 1001, 2, 18, '2019-11-23', '2019-11-23'),
(32, 1002, 2, 0, '2019-11-23', '2019-11-23'),
(33, 1001, 2, 18, '2019-11-23', '2019-11-23'),
(34, 1002, 9, 0, '2019-11-23', '2019-11-23'),
(35, 1001, 2, 18, '2019-11-23', '2019-11-23'),
(36, 1002, 9, 0, '2019-11-23', '2019-11-23'),
(37, 1001, 2, 18, '2019-11-23', '2019-11-23'),
(38, 1002, 9, 2133, '2019-11-23', '2019-11-23'),
(39, 1001, 2, 4, '2019-11-23', '2019-11-23'),
(40, 1002, 2, 474, '2019-11-23', '2019-11-23'),
(41, 1001, 2, 4, '2019-11-23', '2019-11-23'),
(42, 1002, 2, 316, '2019-11-23', '2019-11-23'),
(43, 1001, 2, 4, '0000-00-00', '2019-11-23'),
(44, 1002, 2, 316, '0000-00-00', '2019-11-23'),
(45, 1001, 2, 4, '2019-01-01', '2019-11-23'),
(46, 1002, 2, 316, '2019-01-01', '2019-11-23'),
(47, 1001, 0, 0, '2019-02-01', '2019-11-28'),
(48, 1002, 0, 0, '2019-02-01', '2019-11-28'),
(49, 1001, 0, 0, '2019-03-01', '2019-11-28'),
(50, 1002, 0, 0, '2019-03-01', '2019-11-28'),
(51, 1001, 0, 0, '2019-03-01', '2019-11-28'),
(52, 1002, 0, 0, '2019-03-01', '2019-11-28'),
(53, 1001, 0, 0, '2019-03-01', '2019-11-28'),
(54, 1002, 0, 0, '2019-03-01', '2019-11-28'),
(55, 1001, 0, 0, '2019-03-01', '2019-11-28'),
(56, 1002, 0, 0, '2019-03-01', '2019-11-28'),
(57, 1001, 3, 150, '2020-05-21', '2020-05-21'),
(58, 1002, 50, 0, '2020-05-21', '2020-05-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huella_carbono_fuentes_fijas_combustible`
--

CREATE TABLE `huella_carbono_fuentes_fijas_combustible` (
  `Codigo` int(11) NOT NULL,
  `Elemento` int(11) NOT NULL,
  `Cantidad` double NOT NULL,
  `Total_co2` double NOT NULL,
  `Total_CH4` double NOT NULL,
  `Total_NO2` double NOT NULL,
  `Fecha_registro` date NOT NULL,
  `Fecha_subida` date NOT NULL,
  `Sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `huella_carbono_fuentes_fijas_combustible`
--

INSERT INTO `huella_carbono_fuentes_fijas_combustible` (`Codigo`, `Elemento`, `Cantidad`, `Total_co2`, `Total_CH4`, `Total_NO2`, `Fecha_registro`, `Fecha_subida`, `Sede`) VALUES
(1, 1022, 5, 14470.295, 0, 0, '2019-10-10', '2019-10-10', 1),
(2, 1017, 8, 18219.592, 0, 0, '2019-10-10', '2019-10-10', 1),
(3, 1022, 8, 23152.472, 0, 0, '2019-10-10', '2019-10-10', 1),
(4, 1017, 7, 15942.143, 0, 0, '2019-10-10', '2019-10-10', 1),
(5, 1022, 8, 23152.472, 0, 0, '2019-10-10', '2019-10-10', 1),
(6, 1017, 7, 15942.143, 0, 0, '2019-10-10', '2019-10-10', 1),
(7, 1022, 8, 23152.472, 0, 0, '2019-10-10', '2019-10-10', 1),
(8, 1017, 7, 15942.143, 0, 0, '2019-10-10', '2019-10-10', 1),
(9, 1022, 8, 23152.472, 0, 0, '2019-10-10', '2019-10-10', 1),
(10, 1017, 7, 15942.143, 0, 0, '2019-10-10', '2019-10-10', 1),
(11, 1022, 8, 23152.472, 0, 0, '2019-10-10', '2019-10-10', 1),
(12, 1017, 7, 15942.143, 0, 0, '2019-10-10', '2019-10-10', 1),
(13, 1022, 8, 23152.472, 0, 0, '2019-10-10', '2019-10-10', 1),
(14, 1017, 7, 15942.143, 0, 0, '2019-10-10', '2019-10-10', 1),
(15, 1022, 8, 23152.472, 0, 0, '2019-10-10', '2019-10-10', 1),
(16, 1017, 7, 15942.143, 0, 0, '2019-10-10', '2019-10-10', 1),
(17, 1022, 0, 0, 0, 0, '2019-10-10', '2019-10-10', 1),
(18, 1017, 0, 0, 0, 0, '2019-10-10', '2019-10-10', 1),
(19, 1022, 12, 34728.708, 0, 0, '2019-10-15', '2019-10-15', 1),
(20, 1017, 10, 22774.49, 0, 0, '2019-10-15', '2019-10-15', 1),
(21, 1055, 12, 36.612, 0, 0, '2019-10-17', '2019-10-17', 5),
(22, 1055, 12, 36.612, 0, 0, '2019-10-17', '2019-10-17', 5),
(23, 1055, 12, 36.612, 0, 0, '2019-10-17', '2019-10-17', 5),
(24, 1055, 5, 15.255, 0, 0, '2019-10-17', '2019-10-17', 5),
(25, 1022, 8, 23152.472, 0, 0, '2019-10-18', '2019-10-18', 1),
(26, 1017, 4, 9109.796, 0, 0, '2019-10-18', '2019-10-18', 1),
(27, 1022, 5, 14470.295, 0, 0, '2019-10-21', '2019-10-21', 1),
(28, 1017, 8, 18219.592, 0, 0, '2019-10-21', '2019-10-21', 1),
(29, 1022, 5, 14470.295, 0, 0, '2019-10-21', '2019-10-21', 1),
(30, 1017, 8, 18219.592, 0, 0, '2019-10-21', '2019-10-21', 1),
(31, 1022, 5, 14470.295, 0, 0, '2019-10-21', '2019-10-21', 1),
(32, 1017, 8, 18219.592, 0, 0, '2019-10-21', '2019-10-21', 1),
(33, 1022, 5, 14470.295, 0, 0, '2019-10-21', '2019-10-21', 1),
(34, 1017, 8, 18219.592, 0, 0, '2019-10-21', '2019-10-21', 1),
(35, 1022, 5, 14470.295, 0, 0, '2019-10-21', '2019-10-21', 1),
(36, 1017, 8, 18219.592, 0, 0, '2019-10-21', '2019-10-21', 1),
(37, 1022, 5, 14470.295, 0, 0, '2019-10-21', '2019-10-21', 1),
(38, 1017, 8, 18219.592, 0, 0, '2019-10-21', '2019-10-21', 1),
(39, 1022, 5, 14470.295, 0, 0, '2019-10-21', '2019-10-21', 1),
(40, 1017, 8, 18219.592, 0, 0, '2019-10-21', '2019-10-21', 1),
(41, 1022, 5, 14470.295, 0, 0, '2019-10-21', '2019-10-21', 1),
(42, 1017, 8, 18219.592, 0, 0, '2019-10-21', '2019-10-21', 1),
(43, 1022, 5, 14470.295, 0, 0, '2019-10-21', '2019-10-21', 1),
(44, 1017, 8, 18219.592, 0, 0, '2019-10-21', '2019-10-21', 1),
(45, 1022, 5, 14470.295, 0, 0, '2019-10-21', '2019-10-21', 1),
(46, 1017, 8, 18219.592, 0, 0, '2019-10-21', '2019-10-21', 1),
(47, 1022, 5, 14470.295, 0, 0, '2019-10-21', '2019-10-21', 1),
(48, 1017, 8, 18219.592, 0, 0, '2019-10-21', '2019-10-21', 1),
(49, 1022, 5, 14470.295, 0, 0, '2019-10-21', '2019-10-21', 1),
(50, 1017, 8, 18219.592, 0, 0, '2019-10-21', '2019-10-21', 1),
(51, 1055, 60, 183.06, 0, 0, '2019-10-30', '2019-10-30', 5),
(52, 1008, 5.7, 57.8493, 0, 0, '2019-10-30', '2019-10-30', 5),
(53, 1006, 6, 61.659, 0, 0, '2019-10-30', '2019-10-30', 5),
(54, 1022, 1, 2894.059, 0, 0, '2019-11-18', '2019-11-18', 1),
(55, 1017, 2, 4554.898, 0, 0, '2019-11-18', '2019-11-18', 1),
(56, 1022, 1, 2894.059, 0.0304169, 0.0456253, '2019-11-18', '2019-11-18', 1),
(57, 1017, 2, 4554.898, 0.0488108, 0.0732162, '2019-11-18', '2019-11-18', 1),
(58, 1022, 1, 2894.059, 0.0304169, 0.0456253, '2019-11-18', '2019-11-18', 1),
(59, 1017, 2, 4554.898, 0.0488108, 0.0732162, '2019-11-18', '2019-11-18', 1),
(60, 1022, 1, 2894.059, 0.0304169, 0.0456253, '2019-11-18', '2019-11-18', 1),
(61, 1017, 2, 4554.898, 0.0488108, 0.0732162, '2019-11-18', '2019-11-18', 1),
(62, 1022, 1, 2894.059, 0, 0.0304169, '2019-11-18', '2019-11-18', 1),
(63, 1017, 2, 4554.898, 0, 0.0488108, '2019-11-18', '2019-11-18', 1),
(64, 1022, 1, 2894.059, 0, 0.0304169, '2019-11-18', '2019-11-18', 1),
(65, 1017, 2, 4554.898, 0, 0.0488108, '2019-11-18', '2019-11-18', 1),
(66, 1022, 1, 2894.059, 0.0304169, 0.0456253, '2019-11-18', '2019-11-18', 1),
(67, 1017, 2, 4554.898, 0.0488108, 0.0732162, '2019-11-18', '2019-11-18', 1),
(68, 1022, 1, 2894.059, 0.0304169, 0.0456253, '2019-11-18', '2019-11-18', 1),
(69, 1017, 2, 4554.898, 0.0488108, 0.0732162, '2019-11-18', '2019-11-18', 1),
(70, 1022, 1, 2894.059, 0.0304169, 0.0456253, '2019-11-18', '2019-11-18', 1),
(71, 1017, 2, 4554.898, 0.0488108, 0.0732162, '2019-11-18', '2019-11-18', 1),
(72, 1022, 1, 2894.059, 0.0304169, 0.0456253, '2019-11-18', '2019-11-18', 1),
(73, 1017, 2, 4554.898, 0.0488108, 0.0732162, '2019-11-18', '2019-11-18', 1),
(74, 1055, 1, 3.051, 0.000045, 0.000005, '2019-11-23', '2019-11-23', 10),
(75, 1047, 2, 3.9612, 0.0000714, 0.0000072, '2019-11-23', '2019-11-23', 10),
(76, 1014, 3, 7604.439, 0.0862806, 0.1294212, '2019-11-23', '2019-11-23', 10),
(77, 1055, 1, 3.051, 0.000045, 0.000005, '2019-11-23', '2019-11-23', 10),
(78, 1047, 2, 3.9612, 0.0000714, 0.0000072, '2019-11-23', '2019-11-23', 10),
(79, 1014, 3, 7604.439, 0.0862806, 0.1294212, '2019-11-23', '2019-11-23', 10),
(80, 1055, 1, 3.051, 0.000045, 0.000005, '2019-11-23', '2019-11-23', 10),
(81, 1047, 2, 3.9612, 0.0000714, 0.0000072, '2019-11-23', '2019-11-23', 10),
(82, 1014, 3, 7604.439, 0.0862806, 0.1294212, '2019-11-23', '2019-11-23', 10),
(83, 1055, 1, 3.051, 0.000045, 0.000005, '2019-11-23', '2019-11-23', 10),
(84, 1047, 2, 3.9612, 0.0000714, 0.0000072, '2019-11-23', '2019-11-23', 10),
(85, 1014, 3, 7604.439, 0.0862806, 0.1294212, '2019-11-23', '2019-11-23', 10),
(86, 1055, 1, 3.051, 0.000045, 0.000005, '2019-11-23', '2019-11-23', 10),
(87, 1047, 2, 3.9612, 0.0000714, 0.0000072, '2019-11-23', '2019-11-23', 10),
(88, 1014, 3, 7604.439, 0.0862806, 0.1294212, '2019-11-23', '2019-11-23', 10),
(89, 1055, 1, 3.051, 0.000045, 0.000005, '2019-11-23', '2019-11-23', 10),
(90, 1047, 2, 3.9612, 0.0000714, 0.0000072, '2019-11-23', '2019-11-23', 10),
(91, 1014, 3, 7604.439, 0.0862806, 0.1294212, '2019-11-23', '2019-11-23', 10),
(92, 1055, 1, 3.051, 0.000045, 0.000005, '0000-00-00', '2019-11-23', 10),
(93, 1047, 2, 3.9612, 0.0000714, 0.0000072, '0000-00-00', '2019-11-23', 10),
(94, 1014, 3, 7604.439, 0.0862806, 0.1294212, '0000-00-00', '2019-11-23', 10),
(95, 1055, 1, 3.051, 0.000045, 0.000005, '2019-01-01', '2019-11-23', 10),
(96, 1047, 2, 3.9612, 0.0000714, 0.0000072, '2019-01-01', '2019-11-23', 10),
(97, 1014, 3, 7604.439, 0.0862806, 0.1294212, '2019-01-01', '2019-11-23', 10),
(98, 1055, 2.5, 7.6275, 0.0001125, 0.0000125, '2019-02-01', '2019-11-28', 10),
(99, 1047, 1000, 1980.6, 0.0357, 0.0036, '2019-02-01', '2019-11-28', 10),
(100, 1014, 0.001, 2.534813, 0.0000287602, 0.0000431404, '2019-02-01', '2019-11-28', 10),
(101, 1055, 3, 9.153, 0.000135, 0.000015, '2019-03-01', '2019-11-28', 10),
(102, 1047, 325, 643.695, 0.0116025, 0.00117, '2019-03-01', '2019-11-28', 10),
(103, 1014, 0.25, 633.70325, 0.00719005, 0.0107851, '2019-03-01', '2019-11-28', 10),
(104, 1055, 3, 9.153, 0.000135, 0.000015, '2019-03-01', '2019-11-28', 10),
(105, 1047, 325, 643.695, 0.0116025, 0.00117, '2019-03-01', '2019-11-28', 10),
(106, 1014, 0.25, 633.70325, 0.00719005, 0.0107851, '2019-03-01', '2019-11-28', 10),
(107, 1055, 3, 9.153, 0.000135, 0.000015, '2019-03-01', '2019-11-28', 10),
(108, 1047, 325, 643.695, 0.0116025, 0.00117, '2019-03-01', '2019-11-28', 10),
(109, 1014, 0.25, 633.70325, 0.00719005, 0.0107851, '2019-03-01', '2019-11-28', 10),
(110, 1055, 3, 9.153, 0.000135, 0.000015, '2019-03-01', '2019-11-28', 10),
(111, 1047, 325, 643.695, 0.0116025, 0.00117, '2019-03-01', '2019-11-28', 10),
(112, 1014, 0.25, 633.70325, 0.00719005, 0.0107851, '2019-03-01', '2019-11-28', 10),
(113, 1006, 3, 30.8295, 0.0000288, 0.0000174, '2020-05-21', '2020-05-21', 1),
(114, 1022, 1.5, 4341.0885, 0.04562535, 0.06843795, '2020-05-21', '2020-05-21', 1),
(115, 1017, 2, 4554.898, 0.0488108, 0.0732162, '2020-05-21', '2020-05-21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huella_carbono_fuentes_fijas_refrigerante`
--

CREATE TABLE `huella_carbono_fuentes_fijas_refrigerante` (
  `Codigo` int(11) NOT NULL,
  `Elemento` int(11) NOT NULL,
  `Cantidad` double NOT NULL,
  `Total` double NOT NULL,
  `Fecha_registro` date NOT NULL,
  `Fecha_subida` date NOT NULL,
  `Sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `huella_carbono_fuentes_fijas_refrigerante`
--

INSERT INTO `huella_carbono_fuentes_fijas_refrigerante` (`Codigo`, `Elemento`, `Cantidad`, `Total`, `Fecha_registro`, `Fecha_subida`, `Sede`) VALUES
(1, 2, 4, 40800, '2019-10-10', '2019-10-10', 1),
(2, 4, 5, 3910, '2019-05-10', '2019-10-10', 1),
(3, 3, 2, 3520, '2019-10-10', '2019-10-10', 1),
(4, 2, 1, 10200, '2019-02-10', '2019-10-10', 1),
(5, 4, 1, 782, '2019-10-10', '2019-10-10', 1),
(6, 3, 1, 1760, '2019-10-10', '2019-10-10', 1),
(7, 2, 120, 1224000, '2019-06-15', '2019-10-15', 1),
(8, 4, 10, 7820, '2019-10-15', '2019-10-15', 1),
(9, 3, 10, 17600, '2019-10-15', '2019-10-15', 1),
(10, 0, 5, 0, '2019-06-17', '2019-10-17', 5),
(11, 0, 5, 0, '2019-10-17', '2019-10-17', 5),
(12, 20, 5, 15, '2019-06-17', '2019-10-17', 5),
(13, 20, 12, 36, '2019-01-17', '2019-10-17', 5),
(14, 2, 5, 51000, '2019-10-18', '2019-10-18', 1),
(15, 4, 6, 4692, '2019-10-18', '2019-10-18', 1),
(16, 3, 8, 14080, '2019-08-18', '2019-10-18', 1),
(17, 1, 8, 37280, '2019-10-18', '2019-10-18', 1),
(18, 9, 5, 6500, '2019-10-18', '2019-10-18', 1),
(19, 2, 7, 71400, '2019-03-21', '2019-10-21', 1),
(20, 4, 4, 3128, '2019-10-21', '2019-10-21', 1),
(21, 3, 5, 8800, '2019-10-21', '2019-10-21', 1),
(22, 1, 2, 9320, '2019-05-21', '2019-10-21', 1),
(23, 9, 2, 2600, '2019-10-21', '2019-10-21', 1),
(24, 2, 7, 71400, '2019-10-21', '2019-10-21', 1),
(25, 4, 4, 3128, '2019-08-21', '2019-10-21', 1),
(26, 3, 5, 8800, '2019-10-21', '2019-10-21', 1),
(27, 1, 2, 9320, '2019-02-21', '2019-10-21', 1),
(28, 9, 2, 2600, '2019-10-21', '2019-10-21', 1),
(29, 2, 7, 71400, '2019-10-21', '2019-10-21', 1),
(30, 4, 4, 3128, '2019-01-25', '2019-10-21', 1),
(31, 3, 5, 8800, '2019-10-21', '2019-10-21', 1),
(32, 1, 2, 9320, '2019-10-21', '2019-10-21', 1),
(33, 9, 2, 2600, '2019-09-21', '2019-10-21', 1),
(34, 2, 7, 71400, '2019-10-21', '2019-10-21', 1),
(35, 4, 4, 3128, '2019-10-21', '2019-10-21', 1),
(36, 3, 5, 8800, '2019-10-21', '2019-10-21', 1),
(37, 1, 2, 9320, '2019-10-21', '2019-10-21', 1),
(38, 9, 2, 2600, '2019-10-21', '2019-10-21', 1),
(39, 2, 7, 71400, '2019-10-21', '2019-10-21', 1),
(40, 4, 4, 3128, '2019-10-21', '2019-10-21', 1),
(41, 3, 5, 8800, '2019-10-21', '2019-10-21', 1),
(42, 1, 2, 9320, '2019-10-21', '2019-10-21', 1),
(43, 9, 2, 2600, '2019-10-21', '2019-10-21', 1),
(44, 2, 7, 71400, '2019-10-21', '2019-10-21', 1),
(45, 4, 4, 3128, '2019-10-21', '2019-10-21', 1),
(46, 3, 5, 8800, '2019-10-21', '2019-10-21', 1),
(47, 1, 2, 9320, '2019-10-21', '2019-10-21', 1),
(48, 9, 2, 2600, '2019-10-21', '2019-10-21', 1),
(49, 2, 7, 71400, '2019-10-21', '2019-10-21', 1),
(50, 4, 4, 3128, '2019-10-21', '2019-10-21', 1),
(51, 3, 5, 8800, '2019-10-21', '2019-10-21', 1),
(52, 1, 2, 9320, '2019-10-21', '2019-10-21', 1),
(53, 9, 2, 2600, '2019-10-21', '2019-10-21', 1),
(54, 2, 7, 71400, '2019-10-21', '2019-10-21', 1),
(55, 4, 4, 3128, '2019-10-21', '2019-10-21', 1),
(56, 3, 5, 8800, '2019-10-21', '2019-10-21', 1),
(57, 1, 2, 9320, '2019-10-21', '2019-10-21', 1),
(58, 9, 2, 2600, '2019-10-21', '2019-10-21', 1),
(59, 2, 7, 71400, '2019-10-21', '2019-10-21', 1),
(60, 4, 4, 3128, '2019-10-21', '2019-10-21', 1),
(61, 3, 5, 8800, '2019-10-21', '2019-10-21', 1),
(62, 1, 2, 9320, '2019-10-21', '2019-10-21', 1),
(63, 9, 2, 2600, '2019-10-21', '2019-10-21', 1),
(64, 2, 7, 71400, '2019-10-21', '2019-10-21', 1),
(65, 4, 4, 3128, '2019-10-21', '2019-10-21', 1),
(66, 3, 5, 8800, '2019-10-21', '2019-10-21', 1),
(67, 1, 2, 9320, '2019-10-21', '2019-10-21', 1),
(68, 9, 2, 2600, '2019-10-21', '2019-10-21', 1),
(69, 2, 7, 71400, '2019-10-21', '2019-10-21', 1),
(70, 4, 4, 3128, '2019-10-21', '2019-10-21', 1),
(71, 3, 5, 8800, '2019-10-21', '2019-10-21', 1),
(72, 1, 2, 9320, '2019-10-21', '2019-10-21', 1),
(73, 9, 2, 2600, '2019-10-21', '2019-10-21', 1),
(74, 2, 7, 71400, '2019-10-21', '2019-10-21', 1),
(75, 4, 4, 3128, '2019-10-21', '2019-10-21', 1),
(76, 3, 5, 8800, '2019-10-21', '2019-10-21', 1),
(77, 1, 2, 9320, '2019-10-21', '2019-10-21', 1),
(78, 9, 2, 2600, '2019-10-21', '2019-10-21', 1),
(79, 20, 20, 60, '2019-10-30', '2019-10-30', 5),
(80, 2, 3, 30600, '2019-11-18', '2019-11-18', 1),
(81, 4, 4, 3128, '2019-11-18', '2019-11-18', 1),
(82, 3, 5, 8800, '2019-11-18', '2019-11-18', 1),
(83, 1, 6, 27960, '2019-11-18', '2019-11-18', 1),
(84, 9, 7, 9100, '2019-11-18', '2019-11-18', 1),
(85, 16, 8, 7000, '2019-11-18', '2019-11-18', 1),
(86, 2, 3, 30600, '2019-11-18', '2019-11-18', 1),
(87, 4, 4, 3128, '2019-11-18', '2019-11-18', 1),
(88, 3, 5, 8800, '2019-11-18', '2019-11-18', 1),
(89, 1, 6, 27960, '2019-11-18', '2019-11-18', 1),
(90, 9, 7, 9100, '2019-11-18', '2019-11-18', 1),
(91, 16, 8, 7000, '2019-11-18', '2019-11-18', 1),
(92, 2, 3, 30600, '2019-11-18', '2019-11-18', 1),
(93, 4, 4, 3128, '2019-11-18', '2019-11-18', 1),
(94, 3, 5, 8800, '2019-11-18', '2019-11-18', 1),
(95, 1, 6, 27960, '2019-11-18', '2019-11-18', 1),
(96, 9, 7, 9100, '2019-11-18', '2019-11-18', 1),
(97, 16, 8, 7000, '2019-11-18', '2019-11-18', 1),
(98, 2, 3, 30600, '2019-11-18', '2019-11-18', 1),
(99, 4, 4, 3128, '2019-11-18', '2019-11-18', 1),
(100, 3, 5, 8800, '2019-11-18', '2019-11-18', 1),
(101, 1, 6, 27960, '2019-11-18', '2019-11-18', 1),
(102, 9, 7, 9100, '2019-11-18', '2019-11-18', 1),
(103, 16, 8, 7000, '2019-11-18', '2019-11-18', 1),
(104, 2, 3, 30600, '2019-11-18', '2019-11-18', 1),
(105, 4, 4, 3128, '2019-11-18', '2019-11-18', 1),
(106, 3, 5, 8800, '2019-11-18', '2019-11-18', 1),
(107, 1, 6, 27960, '2019-11-18', '2019-11-18', 1),
(108, 9, 7, 9100, '2019-11-18', '2019-11-18', 1),
(109, 16, 8, 7000, '2019-11-18', '2019-11-18', 1),
(110, 2, 3, 30600, '2019-11-18', '2019-11-18', 1),
(111, 4, 4, 3128, '2019-11-18', '2019-11-18', 1),
(112, 3, 5, 8800, '2019-11-18', '2019-11-18', 1),
(113, 1, 6, 27960, '2019-11-18', '2019-11-18', 1),
(114, 9, 7, 9100, '2019-11-18', '2019-11-18', 1),
(115, 16, 8, 7000, '2019-11-18', '2019-11-18', 1),
(116, 2, 3, 30600, '2019-11-18', '2019-11-18', 1),
(117, 4, 4, 3128, '2019-11-18', '2019-11-18', 1),
(118, 3, 5, 8800, '2019-11-18', '2019-11-18', 1),
(119, 1, 6, 27960, '2019-11-18', '2019-11-18', 1),
(120, 9, 7, 9100, '2019-11-18', '2019-11-18', 1),
(121, 16, 8, 7000, '2019-11-18', '2019-11-18', 1),
(122, 2, 3, 30600, '2019-11-18', '2019-11-18', 1),
(123, 4, 4, 3128, '2019-11-18', '2019-11-18', 1),
(124, 3, 5, 8800, '2019-11-18', '2019-11-18', 1),
(125, 1, 6, 27960, '2019-11-18', '2019-11-18', 1),
(126, 9, 7, 9100, '2019-11-18', '2019-11-18', 1),
(127, 16, 8, 7000, '2019-11-18', '2019-11-18', 1),
(128, 2, 3, 30600, '2019-11-18', '2019-11-18', 1),
(129, 4, 4, 3128, '2019-11-18', '2019-11-18', 1),
(130, 3, 5, 8800, '2019-11-18', '2019-11-18', 1),
(131, 1, 6, 27960, '2019-11-18', '2019-11-18', 1),
(132, 9, 7, 9100, '2019-11-18', '2019-11-18', 1),
(133, 16, 8, 7000, '2019-11-18', '2019-11-18', 1),
(134, 2, 3, 30600, '2019-11-18', '2019-11-18', 1),
(135, 4, 4, 3128, '2019-11-18', '2019-11-18', 1),
(136, 3, 5, 8800, '2019-11-18', '2019-11-18', 1),
(137, 1, 6, 27960, '2019-11-18', '2019-11-18', 1),
(138, 9, 7, 9100, '2019-11-18', '2019-11-18', 1),
(139, 16, 8, 7000, '2019-11-18', '2019-11-18', 1),
(140, 3, 4, 7040, '2019-11-23', '2019-11-23', 10),
(141, 3, 4, 7040, '2019-11-23', '2019-11-23', 10),
(142, 3, 4, 7040, '2019-11-23', '2019-11-23', 10),
(143, 3, 4, 7040, '2019-11-23', '2019-11-23', 10),
(144, 3, 4, 7040, '2019-11-23', '2019-11-23', 10),
(145, 3, 4, 7040, '2019-11-23', '2019-11-23', 10),
(146, 3, 4, 7040, '0000-00-00', '2019-11-23', 10),
(147, 3, 4, 7040, '2019-01-01', '2019-11-23', 10),
(148, 3, 0, 0, '2019-02-01', '2019-11-28', 10),
(149, 3, 12, 21120, '2019-03-01', '2019-11-28', 10),
(150, 3, 12, 21120, '2019-03-01', '2019-11-28', 10),
(151, 3, 12, 21120, '2019-03-01', '2019-11-28', 10),
(152, 3, 12, 21120, '2019-03-01', '2019-11-28', 10),
(153, 2, 25, 255000, '2020-05-21', '2020-05-21', 1),
(154, 4, 30, 23460, '2020-05-21', '2020-05-21', 1),
(155, 3, 10, 17600, '2020-05-21', '2020-05-21', 1),
(156, 1, 20, 93200, '2020-05-21', '2020-05-21', 1),
(157, 9, 20, 26000, '2020-05-21', '2020-05-21', 1),
(158, 11, 20, 96000, '2020-05-21', '2020-05-21', 1),
(159, 16, 20, 17500, '2020-05-21', '2020-05-21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huella_carbono_fuentes_moviles`
--

CREATE TABLE `huella_carbono_fuentes_moviles` (
  `Codigo` int(11) NOT NULL,
  `Placa` int(11) NOT NULL,
  `Cantidad` double NOT NULL,
  `Total_CO2` double NOT NULL,
  `Total_CH4` double NOT NULL,
  `Total_N2O` double NOT NULL,
  `Fecha_registro` date NOT NULL,
  `Fecha_subida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `huella_carbono_fuentes_moviles`
--

INSERT INTO `huella_carbono_fuentes_moviles` (`Codigo`, `Placa`, `Cantidad`, `Total_CO2`, `Total_CH4`, `Total_N2O`, `Fecha_registro`, `Fecha_subida`) VALUES
(1, 1, 1, 6.387, 0, 0, '2019-10-10', '2019-10-10'),
(2, 2, 2, 0, 0, 0, '2019-04-10', '2019-10-10'),
(3, 1, 1, 6.387, 0, 0, '2019-10-10', '2019-10-10'),
(4, 2, 2, 0, 0, 0, '2019-05-10', '2019-10-10'),
(5, 1, 1, 6.387, 0, 0, '2019-10-10', '2019-10-10'),
(6, 2, 2, 0, 0, 0, '2019-02-10', '2019-10-10'),
(7, 1, 34, 217.158, 0, 0, '2019-10-10', '2019-10-10'),
(8, 2, 32, 0, 0, 0, '2019-01-10', '2019-10-10'),
(9, 1, 30, 191.61, 0, 0, '2019-10-15', '2019-10-15'),
(10, 2, 20, 0, 0, 0, '2019-10-15', '2019-10-15'),
(11, 3, 20, 152.362, 0, 0, '2019-04-15', '2019-10-15'),
(12, 4, 20, 152.362, 0, 0, '2019-10-15', '2019-10-15'),
(13, 5, 20, 152.362, 0, 0, '2019-05-15', '2019-10-15'),
(14, 6, 3, 22.8543, 0, 0, '2019-10-17', '2019-10-17'),
(15, 7, 8, 81.192, 0, 0, '2019-10-17', '2019-10-17'),
(16, 6, 6, 45.7086, 0, 0, '2019-10-17', '2019-10-17'),
(17, 7, 4, 40.596, 0, 0, '2019-02-17', '2019-10-17'),
(18, 6, 8, 60.9448, 0, 0, '2019-10-17', '2019-10-17'),
(19, 7, 4, 40.596, 0, 0, '2019-10-17', '2019-10-17'),
(20, 1, 7, 44.709, 0, 0, '2019-05-18', '2019-10-18'),
(21, 2, 5, 0, 0, 0, '2019-10-18', '2019-10-18'),
(22, 3, 3, 22.8543, 0, 0, '2019-10-18', '2019-10-18'),
(23, 4, 3, 22.8543, 0, 0, '2019-05-18', '2019-10-18'),
(24, 5, 2, 15.2362, 0, 0, '2019-10-18', '2019-10-18'),
(25, 1, 8, 51.096, 0, 0, '2019-02-21', '2019-10-21'),
(26, 2, 5, 0, 0, 0, '2019-10-21', '2019-10-21'),
(27, 3, 2, 15.2362, 0, 0, '2019-10-21', '2019-10-21'),
(28, 4, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(29, 5, 4, 30.4724, 0, 0, '2019-06-21', '2019-10-21'),
(30, 1, 8, 51.096, 0, 0, '2019-10-21', '2019-10-21'),
(31, 2, 5, 0, 0, 0, '2019-10-21', '2019-10-21'),
(32, 3, 2, 15.2362, 0, 0, '2019-05-21', '2019-10-21'),
(33, 4, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(34, 5, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(35, 1, 8, 51.096, 0, 0, '2019-02-21', '2019-10-21'),
(36, 2, 5, 0, 0, 0, '2019-10-21', '2019-10-21'),
(37, 3, 2, 15.2362, 0, 0, '2019-10-21', '2019-10-21'),
(38, 4, 4, 30.4724, 0, 0, '2019-04-21', '2019-10-21'),
(39, 5, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(40, 1, 8, 51.096, 0, 0, '2019-10-21', '2019-10-21'),
(41, 2, 5, 0, 0, 0, '2019-10-21', '2019-10-21'),
(42, 3, 2, 15.2362, 0, 0, '2019-02-21', '2019-10-21'),
(43, 4, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(44, 5, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(45, 1, 8, 51.096, 0, 0, '2019-10-21', '2019-10-21'),
(46, 2, 5, 0, 0, 0, '2019-05-21', '2019-10-21'),
(47, 3, 2, 15.2362, 0, 0, '2019-10-21', '2019-10-21'),
(48, 4, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(49, 5, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(50, 1, 8, 51.096, 0, 0, '2019-08-22', '2019-10-21'),
(51, 2, 5, 0, 0, 0, '2019-10-21', '2019-10-21'),
(52, 3, 2, 15.2362, 0, 0, '2019-10-21', '2019-10-21'),
(53, 4, 4, 30.4724, 0, 0, '2019-06-21', '2019-10-21'),
(54, 5, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(55, 1, 8, 51.096, 0, 0, '2019-10-21', '2019-10-21'),
(56, 2, 5, 0, 0, 0, '2019-10-21', '2019-10-21'),
(57, 3, 2, 15.2362, 0, 0, '2019-10-21', '2019-10-21'),
(58, 4, 4, 30.4724, 0, 0, '2019-02-21', '2019-10-21'),
(59, 5, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(60, 1, 8, 51.096, 0, 0, '2019-06-21', '2019-10-21'),
(61, 2, 5, 0, 0, 0, '2019-10-21', '2019-10-21'),
(62, 3, 2, 15.2362, 0, 0, '2019-10-21', '2019-10-21'),
(63, 4, 4, 30.4724, 0, 0, '2019-05-21', '2019-10-21'),
(64, 5, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(65, 1, 8, 51.096, 0, 0, '2019-10-21', '2019-10-21'),
(66, 2, 5, 0, 0, 0, '2019-01-21', '2019-10-21'),
(67, 3, 2, 15.2362, 0, 0, '2019-10-21', '2019-10-21'),
(68, 4, 4, 30.4724, 0, 0, '2019-03-21', '2019-10-21'),
(69, 5, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(70, 1, 8, 51.096, 0, 0, '2019-05-21', '2019-10-21'),
(71, 2, 5, 0, 0, 0, '2019-10-21', '2019-10-21'),
(72, 3, 2, 15.2362, 0, 0, '2019-08-21', '2019-10-21'),
(73, 4, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(74, 5, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(75, 1, 8, 51.096, 0, 0, '2019-03-21', '2019-10-21'),
(76, 2, 5, 0, 0, 0, '2019-10-21', '2019-10-21'),
(77, 3, 2, 15.2362, 0, 0, '2019-02-21', '2019-10-21'),
(78, 4, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(79, 5, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(80, 1, 8, 51.096, 0, 0, '2019-06-21', '2019-10-21'),
(81, 2, 5, 0, 0, 0, '2019-10-21', '2019-10-21'),
(82, 3, 2, 15.2362, 0, 0, '2019-07-21', '2019-10-21'),
(83, 4, 4, 30.4724, 0, 0, '2019-10-21', '2019-10-21'),
(84, 5, 4, 30.4724, 0, 0, '2019-04-21', '2019-10-21'),
(85, 6, 50, 380.905, 0, 0, '2019-10-30', '2019-10-30'),
(86, 7, 45, 456.705, 0, 0, '2019-10-30', '2019-10-30'),
(87, 11, 48, 487.152, 0, 0, '2019-10-30', '2019-10-30'),
(88, 1, 11, 70.257, 0, 0, '2019-11-18', '2019-11-18'),
(89, 2, 12, 82.5876, 0, 0, '2019-11-18', '2019-11-18'),
(90, 3, 13, 99.0353, 0, 0, '2019-11-18', '2019-11-18'),
(91, 4, 14, 106.6534, 0, 0, '2019-11-18', '2019-11-18'),
(92, 5, 15, 114.2715, 0, 0, '2019-11-18', '2019-11-18'),
(93, 23, 16, 121.8896, 0, 0, '2019-11-18', '2019-11-18'),
(94, 24, 17, 129.5077, 0, 0, '2019-11-18', '2019-11-18'),
(95, 25, 18, 137.1258, 0, 0, '2019-11-18', '2019-11-18'),
(96, 26, 19, 144.7439, 0, 0, '2019-11-18', '2019-11-18'),
(97, 27, 20, 152.362, 0, 0, '2019-11-18', '2019-11-18'),
(98, 1, 11, 70.257, 0.0002607, 0.0000517, '2019-11-18', '2019-11-18'),
(99, 2, 12, 82.5876, 0.0003156, 0.0000636, '2019-11-18', '2019-11-18'),
(100, 3, 13, 99.0353, 0.0003107, 0.0000624, '2019-11-18', '2019-11-18'),
(101, 4, 14, 106.6534, 0.0003346, 0.0000672, '2019-11-18', '2019-11-18'),
(102, 5, 15, 114.2715, 0.0003585, 0.000072, '2019-11-18', '2019-11-18'),
(103, 23, 16, 121.8896, 0.0003824, 0.0000768, '2019-11-18', '2019-11-18'),
(104, 24, 17, 129.5077, 0.0004063, 0.0000816, '2019-11-18', '2019-11-18'),
(105, 25, 18, 137.1258, 0.0004302, 0.0000864, '2019-11-18', '2019-11-18'),
(106, 26, 19, 144.7439, 0.0004541, 0.0000912, '2019-11-18', '2019-11-18'),
(107, 27, 20, 152.362, 0.000478, 0.000096, '2019-11-18', '2019-11-18'),
(108, 1, 11, 70.257, 0.0002607, 0.0000517, '2019-11-18', '2019-11-18'),
(109, 2, 12, 82.5876, 0.0003156, 0.0000636, '2019-11-18', '2019-11-18'),
(110, 3, 13, 99.0353, 0.0003107, 0.0000624, '2019-11-18', '2019-11-18'),
(111, 4, 14, 106.6534, 0.0003346, 0.0000672, '2019-11-18', '2019-11-18'),
(112, 5, 15, 114.2715, 0.0003585, 0.000072, '2019-11-18', '2019-11-18'),
(113, 23, 16, 121.8896, 0.0003824, 0.0000768, '2019-11-18', '2019-11-18'),
(114, 24, 17, 129.5077, 0.0004063, 0.0000816, '2019-11-18', '2019-11-18'),
(115, 25, 18, 137.1258, 0.0004302, 0.0000864, '2019-11-18', '2019-11-18'),
(116, 26, 19, 144.7439, 0.0004541, 0.0000912, '2019-11-18', '2019-11-18'),
(117, 27, 20, 152.362, 0.000478, 0.000096, '2019-11-18', '2019-11-18'),
(118, 1, 11, 70.257, 0.0002607, 0.0000517, '2019-11-18', '2019-11-18'),
(119, 2, 12, 82.5876, 0.0003156, 0.0000636, '2019-11-18', '2019-11-18'),
(120, 3, 13, 99.0353, 0.0003107, 0.0000624, '2019-11-18', '2019-11-18'),
(121, 4, 14, 106.6534, 0.0003346, 0.0000672, '2019-11-18', '2019-11-18'),
(122, 5, 15, 114.2715, 0.0003585, 0.000072, '2019-11-18', '2019-11-18'),
(123, 23, 16, 121.8896, 0.0003824, 0.0000768, '2019-11-18', '2019-11-18'),
(124, 24, 17, 129.5077, 0.0004063, 0.0000816, '2019-11-18', '2019-11-18'),
(125, 25, 18, 137.1258, 0.0004302, 0.0000864, '2019-11-18', '2019-11-18'),
(126, 26, 19, 144.7439, 0.0004541, 0.0000912, '2019-11-18', '2019-11-18'),
(127, 27, 20, 152.362, 0.000478, 0.000096, '2019-11-18', '2019-11-18'),
(128, 1, 11, 70.257, 0.0002607, 0.0000517, '2019-11-18', '2019-11-18'),
(129, 2, 12, 82.5876, 0.0003156, 0.0000636, '2019-11-18', '2019-11-18'),
(130, 3, 13, 99.0353, 0.0003107, 0.0000624, '2019-11-18', '2019-11-18'),
(131, 4, 14, 106.6534, 0.0003346, 0.0000672, '2019-11-18', '2019-11-18'),
(132, 5, 15, 114.2715, 0.0003585, 0.000072, '2019-11-18', '2019-11-18'),
(133, 23, 16, 121.8896, 0.0003824, 0.0000768, '2019-11-18', '2019-11-18'),
(134, 24, 17, 129.5077, 0.0004063, 0.0000816, '2019-11-18', '2019-11-18'),
(135, 25, 18, 137.1258, 0.0004302, 0.0000864, '2019-11-18', '2019-11-18'),
(136, 26, 19, 144.7439, 0.0004541, 0.0000912, '2019-11-18', '2019-11-18'),
(137, 27, 20, 152.362, 0.000478, 0.000096, '2019-11-18', '2019-11-18'),
(138, 1, 11, 70.257, 0.0002607, 0.0000517, '2019-11-18', '2019-11-18'),
(139, 2, 12, 82.5876, 0.0003156, 0.0000636, '2019-11-18', '2019-11-18'),
(140, 3, 13, 99.0353, 0.0003107, 0.0000624, '2019-11-18', '2019-11-18'),
(141, 4, 14, 106.6534, 0.0003346, 0.0000672, '2019-11-18', '2019-11-18'),
(142, 5, 15, 114.2715, 0.0003585, 0.000072, '2019-11-18', '2019-11-18'),
(143, 23, 16, 121.8896, 0.0003824, 0.0000768, '2019-11-18', '2019-11-18'),
(144, 24, 17, 129.5077, 0.0004063, 0.0000816, '2019-11-18', '2019-11-18'),
(145, 25, 18, 137.1258, 0.0004302, 0.0000864, '2019-11-18', '2019-11-18'),
(146, 26, 19, 144.7439, 0.0004541, 0.0000912, '2019-11-18', '2019-11-18'),
(147, 27, 20, 152.362, 0.000478, 0.000096, '2019-11-18', '2019-11-18'),
(148, 10, 7, 53.3267, 0.0001673, 0.0000336, '2019-11-23', '2019-11-23'),
(149, 10, 7, 53.3267, 0.0001673, 0.0000336, '2019-11-23', '2019-11-23'),
(150, 10, 7, 53.3267, 0.0001673, 0.0000336, '2019-11-23', '2019-11-23'),
(151, 10, 7, 53.3267, 0.0001673, 0.0000336, '2019-11-23', '2019-11-23'),
(152, 10, 7, 53.3267, 0.0001673, 0.0000336, '2019-11-23', '2019-11-23'),
(153, 10, 7, 53.3267, 0.0001673, 0.0000336, '2019-11-23', '2019-11-23'),
(154, 10, 7, 53.3267, 0.0001673, 0.0000336, '0000-00-00', '2019-11-23'),
(155, 10, 7, 53.3267, 0.0001673, 0.0000336, '2019-01-01', '2019-11-23'),
(156, 10, 6, 45.7086, 0.0001434, 0.0000288, '2019-02-01', '2019-11-28'),
(157, 10, 4, 30.4724, 0.0000956, 0.0000192, '2019-03-01', '2019-11-28'),
(158, 10, 4, 30.4724, 0.0000956, 0.0000192, '2019-03-01', '2019-11-28'),
(159, 10, 4, 30.4724, 0.0000956, 0.0000192, '2019-03-01', '2019-11-28'),
(160, 10, 4, 30.4724, 0.0000956, 0.0000192, '2019-03-01', '2019-11-28'),
(161, 1, 3, 19.161, 0.0000711, 0.0000141, '2020-05-21', '2020-05-21'),
(162, 2, 3, 20.6469, 0.0000789, 0.0000159, '2020-05-21', '2020-05-21'),
(163, 3, 5, 38.0905, 0.0001195, 0.000024, '2020-05-21', '2020-05-21'),
(164, 4, 6, 45.7086, 0.0001434, 0.0000288, '2020-05-21', '2020-05-21'),
(165, 5, 3, 22.8543, 0.0000717, 0.0000144, '2020-05-21', '2020-05-21'),
(166, 23, 3, 22.8543, 0.0000717, 0.0000144, '2020-05-21', '2020-05-21'),
(167, 24, 5, 38.0905, 0.0001195, 0.000024, '2020-05-21', '2020-05-21'),
(168, 25, 3, 22.8543, 0.0000717, 0.0000144, '2020-05-21', '2020-05-21'),
(169, 26, 5, 38.0905, 0.0001195, 0.000024, '2020-05-21', '2020-05-21'),
(170, 27, 5, 38.0905, 0.0001195, 0.000024, '2020-05-21', '2020-05-21'),
(171, 28, 2, 20.3562, 0.0000544, 0.0000108, '2020-05-21', '2020-05-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huella_carbono_lubricantes`
--

CREATE TABLE `huella_carbono_lubricantes` (
  `codigo` int(11) NOT NULL,
  `sede` int(11) NOT NULL,
  `tipo_lubricante` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `total_emision` double NOT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_subida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `huella_carbono_lubricantes`
--

INSERT INTO `huella_carbono_lubricantes` (`codigo`, `sede`, `tipo_lubricante`, `cantidad`, `total_emision`, `fecha_registro`, `fecha_subida`) VALUES
(1, 1, 1, 9, 0.01604655, '2019-11-18', '2019-11-18'),
(2, 1, 2, 10, 0.005896, '2019-11-18', '2019-11-18'),
(3, 1, 1, 9, 0.01604655, '2019-11-18', '2019-11-18'),
(4, 1, 2, 10, 0.005896, '2019-11-18', '2019-11-18'),
(5, 1, 1, 9, 0.01604655, '2019-11-18', '2019-11-18'),
(6, 1, 2, 10, 0.005896, '2019-11-18', '2019-11-18'),
(7, 1, 1, 9, 0.01604655, '2019-11-18', '2019-11-18'),
(8, 1, 2, 10, 0.005896, '2019-11-18', '2019-11-18'),
(9, 1, 1, 9, 0.01604655, '2019-11-18', '2019-11-18'),
(10, 1, 2, 10, 0.005896, '2019-11-18', '2019-11-18'),
(11, 1, 1, 9, 0.01604655, '2019-11-18', '2019-11-18'),
(12, 1, 2, 10, 0.005896, '2019-11-18', '2019-11-18'),
(13, 1, 1, 9, 0.01604655, '2019-11-18', '2019-11-18'),
(14, 1, 2, 10, 0.005896, '2019-11-18', '2019-11-18'),
(15, 1, 1, 9, 0.01604655, '2019-11-18', '2019-11-18'),
(16, 1, 2, 10, 0.005896, '2019-11-18', '2019-11-18'),
(17, 1, 1, 9, 0.01604655, '2019-11-18', '2019-11-18'),
(18, 1, 2, 10, 0.005896, '2019-11-18', '2019-11-18'),
(19, 1, 1, 9, 0.01604655, '2019-11-18', '2019-11-18'),
(20, 1, 2, 10, 0.005896, '2019-11-18', '2019-11-18'),
(21, 1, 1, 9, 0.01604655, '2019-11-18', '2019-11-18'),
(22, 1, 2, 10, 0.005896, '2019-11-18', '2019-11-18'),
(23, 10, 1, 5, 0.00891475, '2019-11-23', '2019-11-23'),
(24, 10, 2, 6, 0.0035376, '2019-11-23', '2019-11-23'),
(25, 10, 1, 5, 0.00891475, '2019-11-23', '2019-11-23'),
(26, 10, 2, 6, 0.0035376, '2019-11-23', '2019-11-23'),
(27, 10, 1, 5, 0.00891475, '2019-11-23', '2019-11-23'),
(28, 10, 2, 6, 0.0035376, '2019-11-23', '2019-11-23'),
(29, 10, 1, 5, 0.00891475, '2019-11-23', '2019-11-23'),
(30, 10, 2, 6, 0.0035376, '2019-11-23', '2019-11-23'),
(31, 10, 1, 5, 0.00891475, '2019-11-23', '2019-11-23'),
(32, 10, 2, 6, 0.0035376, '2019-11-23', '2019-11-23'),
(33, 10, 1, 5, 0.00891475, '2019-11-23', '2019-11-23'),
(34, 10, 2, 6, 0.0035376, '2019-11-23', '2019-11-23'),
(35, 10, 1, 5, 0.00891475, '0000-00-00', '2019-11-23'),
(36, 10, 2, 6, 0.0035376, '0000-00-00', '2019-11-23'),
(37, 10, 1, 5, 0.00891475, '2019-01-01', '2019-11-23'),
(38, 10, 2, 6, 0.0035376, '2019-01-01', '2019-11-23'),
(39, 10, 1, 0, 0, '2019-02-01', '2019-11-28'),
(40, 10, 2, 0, 0, '2019-02-01', '2019-11-28'),
(41, 10, 1, 1, 0.00178295, '2019-03-01', '2019-11-28'),
(42, 10, 2, 2, 0.0011792, '2019-03-01', '2019-11-28'),
(43, 10, 1, 1, 0.00178295, '2019-03-01', '2019-11-28'),
(44, 10, 2, 2, 0.0011792, '2019-03-01', '2019-11-28'),
(45, 10, 1, 1, 0.00178295, '2019-03-01', '2019-11-28'),
(46, 10, 2, 2, 0.0011792, '2019-03-01', '2019-11-28'),
(47, 10, 1, 1, 0.00178295, '2019-03-01', '2019-11-28'),
(48, 10, 2, 2, 0.0011792, '2019-03-01', '2019-11-28'),
(49, 1, 1, 3, 0.00534885, '2020-05-21', '2020-05-21'),
(50, 1, 2, 1, 0.0005896, '2020-05-21', '2020-05-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huella_hidrica`
--

CREATE TABLE `huella_hidrica` (
  `codigo` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Mes` int(70) NOT NULL,
  `Azul` int(11) NOT NULL,
  `verde` int(11) NOT NULL,
  `gris` int(11) NOT NULL,
  `Sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_produccion`
--

CREATE TABLE `informacion_produccion` (
  `Empresa` int(11) NOT NULL,
  `Produccion_mensual_prom` double NOT NULL,
  `Costo_producc_prom` double NOT NULL,
  `Empleados_nomi_h` int(11) NOT NULL,
  `Horas_dia_h` int(11) NOT NULL,
  `Dias_semana_h` int(11) NOT NULL,
  `Empleados_nomi_m` int(11) NOT NULL,
  `Horas_dia_m` int(11) NOT NULL,
  `Dias_semana_m` int(11) NOT NULL,
  `Contratistas_h` int(11) NOT NULL,
  `Hora_dia_con_h` int(11) NOT NULL,
  `Contratistas_m` int(11) NOT NULL,
  `Hora_dia_con_m` int(11) NOT NULL,
  `Tota_empleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lavado_instalaciones`
--

CREATE TABLE `lavado_instalaciones` (
  `Codigo` int(11) NOT NULL,
  `Frecuencia` int(11) NOT NULL,
  `Cantidad_agua` double NOT NULL,
  `Area_lavado` double NOT NULL,
  `Procedencia_agua` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `luminarias`
--

CREATE TABLE `luminarias` (
  `Codigo` int(11) NOT NULL,
  `Sede` int(11) NOT NULL,
  `Tipo_luminaria` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `Potencia` double NOT NULL,
  `Horas_uso` double NOT NULL,
  `Dias` int(11) NOT NULL,
  `est` int(11) NOT NULL,
  `observacion` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `luminarias`
--

INSERT INTO `luminarias` (`Codigo`, `Sede`, `Tipo_luminaria`, `cantidad`, `Potencia`, `Horas_uso`, `Dias`, `est`, `observacion`) VALUES
(1, 1, 'led', 5, 5, 5, 5, 0, NULL),
(2, 1, 'led', 5, 5, 5, 5, 0, NULL),
(3, 5, 'Bombillo Led', 5, 12, 24, 7, 0, NULL),
(4, 10, 'Led', 100, 200, 12, 7, 0, NULL),
(5, 10, 'Sodio', 20, 400, 8, 7, 0, NULL),
(6, 5, 'LED', 8, 220, 6, 7, 0, NULL),
(7, 1, 'LED', 4, 110, 4, 54, 0, NULL),
(8, 1, 'LED', 4, 110, 4, 7, 0, NULL),
(9, 1, 'LED', 4, 110, 4, 7, 0, NULL),
(10, 10, 'Led', 12, 220, 12, 8, 0, NULL),
(11, 1, 'LED', 4, 110, 4, 7, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_prima`
--

CREATE TABLE `materia_prima` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Canitdad` double NOT NULL,
  `Sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `Codigo` int(11) NOT NULL,
  `Nit` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `Area_residuos` text COLLATE utf8_unicode_ci NOT NULL,
  `Camara_comercio` text COLLATE utf8_unicode_ci,
  `Rut` text COLLATE utf8_unicode_ci,
  `Cedula_representante` text COLLATE utf8_unicode_ci,
  `Permisos` text COLLATE utf8_unicode_ci,
  `Certificaciones` text COLLATE utf8_unicode_ci,
  `Sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refrigerante`
--

CREATE TABLE `refrigerante` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `unidades` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `CO2` double NOT NULL,
  `unidades_reporte` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `refrigerante`
--

INSERT INTO `refrigerante` (`codigo`, `nombre`, `unidades`, `CO2`, `unidades_reporte`) VALUES
(0, 'N/A', 'NA', 0, 'N/A'),
(1, 'CFC-11 / R-11', 'kg', 4660, 'Kg CO2/Kg'),
(2, 'CFC-12 / R-12', 'kg', 10200, 'Kg CO2/Kg'),
(3, 'HCFC-22 / R-22', 'kg', 1760, 'Kg CO2/Kg'),
(4, 'HCFC-141B / R-141B', 'kg', 782, 'Kg CO2/Kg'),
(5, 'HFC-23 / R-23', 'kg', 12400, 'Kg CO2/Kg'),
(6, 'HFC-32 / R-32', 'kg', 677, 'Kg CO2/Kg'),
(7, 'HFC-125 / R-125', 'kg', 3170, 'Kg CO2/Kg'),
(8, 'HFC-134 / R-134', 'kg', 1120, 'Kg CO2/Kg'),
(9, 'HFC-134a / R-134a', 'kg', 1300, 'Kg CO2/Kg'),
(10, 'HFC-143 / R-143', 'kg', 328, 'Kg CO2/Kg'),
(11, 'HFC-143a / R-143a', 'kg', 4800, 'Kg CO2/Kg'),
(12, 'HFC-227ea / FM-200', 'kg', 3350, 'Kg CO2/Kg'),
(13, 'HFC-404A / R-404A', 'kg', 3942, 'Kg CO2/Kg'),
(14, 'HFC-407C / R-407C', 'kg', 1624, 'Kg CO2/Kg'),
(15, 'HFC-410a / R-410A', 'kg', 1923, 'Kg CO2/Kg'),
(16, 'HFC-417A / R-417A', 'kg', 875, 'Kg CO2/Kg'),
(17, 'HFC-422D / R-422D', 'kg', 2473, 'Kg CO2/Kg'),
(18, 'PFC-14 / R-14 ', 'kg', 6630, 'Kg CO2/Kg'),
(19, 'FE-36 / 1,1,1,3,3,3 - Hexafluoropropano', 'kg', 182, 'Kg CO2/Kg'),
(20, 'Propano Alta Calidad / R-290', 'kg', 3, 'Kg CO2/Kg'),
(21, 'Isobutano / R-600A ', 'kg', 1, 'Kg CO2/Kg'),
(22, 'Halon 1301 / CBrF3', 'kg', 6290, 'Kg CO2/Kg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residuo_solido`
--

CREATE TABLE `residuo_solido` (
  `Codigo` int(11) NOT NULL,
  `Tipo_residuo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Material_residuo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `Observacion` text COLLATE utf8_unicode_ci NOT NULL,
  `Proveedor` int(11) NOT NULL,
  `certificado` text COLLATE utf8_unicode_ci,
  `Precio_kilo` int(11) NOT NULL,
  `Sede` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `riego_jardines`
--

CREATE TABLE `riego_jardines` (
  `Codigo` int(11) NOT NULL,
  `Area_riego` double NOT NULL,
  `Procedencia_agua` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Cantidad_agua` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Ciudad` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `Telefono` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Representante` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `Correo` text COLLATE utf8_unicode_ci NOT NULL,
  `Empresa` int(11) NOT NULL,
  `Coordenadas` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `carbono` int(11) DEFAULT NULL,
  `hidrica` int(11) DEFAULT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`Codigo`, `Nombre`, `Ciudad`, `Direccion`, `Telefono`, `Representante`, `Correo`, `Empresa`, `Coordenadas`, `carbono`, `hidrica`, `Estado`) VALUES
(1, 'Ecoblue Bogota', 'Bogotá', 'no me la se', '76422452', 'Eduardo Ramirez', 'soporte@ecoblue.co', 1, '0', 1, 0, 0),
(2, 'prueba', 'villa', 'Esta es me la se', '3155686708', 'miguel', 'miguel@correo.co', 1, '0', 0, 0, 0),
(5, 'sebaste -bogota', 'Bogotá', 'maksdajdn', '7852352', 'sebastian', 'correo@correo.co', 2, '781-125', 1, 1, 0),
(10, 'BioData-Bogotá', 'Bogotá', 'yuijhgfvbnmkuyg625', '78514652456', 'Sandris', 'agenciabiodata@gmial.com', 3, '78-52', 0, 0, 0),
(11, 'Miguel-bogota', 'Bogota', 'nananansjdhb', '7965412', 'Miguel', 'correo@correo.co', 4, '', 1, 1, 0),
(12, 'Miguel- prueba', 'Bogota', 'no me la se', '785126', 'miguel', 'm.martinez@ecoblue.co', 4, '125-8965', 1, 1, 0),
(13, 'miguel-prueba1', 'bogota', 'asdfhbn', '41', 'asdads', 'asdasd', 4, 'weqweq', 1, 1, 0),
(14, 'Prueba 1', 'bogotá', 'Esta direccion no me la se', '789654123', 'Miguel martints', 'miguelangel_1704@hotmail.com', 4, '78645112152', 1, 1, 0),
(15, 'Esta sede ', 'Bogotá', 'Crasnsd anas ', '78245621', ';Miguel', 'Masdnansf@asdas.vo', 1, '78965452', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtipo_elemento`
--

CREATE TABLE `subtipo_elemento` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `subtipo_elemento`
--

INSERT INTO `subtipo_elemento` (`Codigo`, `Nombre`, `Tipo`) VALUES
(1, 'Solido', 1),
(2, 'Liquido', 1),
(3, 'Gas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_elemento`
--

CREATE TABLE `tipo_elemento` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Alcance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_elemento`
--

INSERT INTO `tipo_elemento` (`Codigo`, `Nombre`, `Alcance`) VALUES
(1, 'carbono', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_lubricante`
--

CREATE TABLE `tipo_lubricante` (
  `codigo` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Co2` double NOT NULL,
  `Unidades` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_lubricante`
--

INSERT INTO `tipo_lubricante` (`codigo`, `Nombre`, `Co2`, `Unidades`) VALUES
(1, 'Aceite', 0.00178295, 'Gal'),
(2, 'Grasas', 0.0005896, 'Kg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_material`
--

CREATE TABLE `tipo_material` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_sanitaria`
--

CREATE TABLE `unidad_sanitaria` (
  `Codigo` int(11) NOT NULL,
  `Sanitarios` int(11) NOT NULL,
  `ahorradores` int(11) NOT NULL,
  `Convencionales` int(11) NOT NULL,
  `Orinales` int(11) NOT NULL,
  `Lavamanos` int(11) NOT NULL,
  `Duchas` int(11) NOT NULL,
  `Llaves` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Codigo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` text COLLATE utf8_unicode_ci NOT NULL,
  `contraseña` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo_usuario` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Codigo`, `nombre`, `correo`, `contraseña`, `tipo_usuario`, `Sede`) VALUES
(1, 'admin', 'soporte@ecoblue.co', 'ecoblue', '1', 1),
(2, 'Miguel', 'm.martinez@ecoblue.co', 'Dragonforce123', '2', 1),
(3, 'sebastian', 'correo@correo.co', '1234', '2', 5),
(10, 'Sandra Morales', 'biodata@gmail.com', '1234', '2', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo_electrico`
--

CREATE TABLE `vehiculo_electrico` (
  `Codigo` int(11) NOT NULL,
  `Sede` int(11) NOT NULL,
  `Placa` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Potencia` double NOT NULL,
  `Horas_carga` double NOT NULL,
  `dias_uso` int(11) NOT NULL,
  `Refrigerante` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `observacion` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vehiculo_electrico`
--

INSERT INTO `vehiculo_electrico` (`Codigo`, `Sede`, `Placa`, `Potencia`, `Horas_carga`, `dias_uso`, `Refrigerante`, `estado`, `observacion`) VALUES
(1, 1, 'CUA-159', 12.5, 4, 5, 0, 0, NULL),
(2, 1, 'CUA-159', 12.5, 4, 5, 0, 0, NULL),
(3, 5, 'BBP-122', 200, 6, 7, 0, 0, NULL),
(4, 10, 'CUA159', 121, 8, 6, 0, 0, NULL),
(5, 10, 'NTF489', 121, 8, 6, 0, 0, NULL),
(6, 5, 'tax098', 211, 8, 6, 0, 1, '/-/ 2019-11-07// Para prueba hibryda'),
(7, 5, 'ASR135', 121, 8, 5, 3, 0, NULL),
(8, 5, 'API758', 121, 8, 5, 0, 0, NULL),
(9, 5, 'QPR753', 121, 8, 5, 0, 0, NULL),
(10, 5, 'PIR457', 200, 6, 6, 0, 0, NULL),
(11, 5, 'PIR457', 200, 6, 6, 0, 0, NULL),
(12, 5, 'PIR457', 200, 6, 6, 0, 0, NULL),
(13, 1, 'CUA159', 121, 8, 5, 0, 0, NULL),
(14, 1, 'CUA159', 121, 8, 5, 0, 0, NULL),
(15, 1, 'CUA159', 121, 8, 5, 16, 0, NULL),
(16, 1, 'PPT', 123, 6, 6, 11, 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciiu`
--
ALTER TABLE `ciiu`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `consumo_agua`
--
ALTER TABLE `consumo_agua`
  ADD PRIMARY KEY (`Sede`),
  ADD KEY `Consumo_empleados` (`Consumo_empleados`),
  ADD KEY `Riego_jardines` (`Riego_jardines`),
  ADD KEY `Lavado_instalaciones` (`Lavado_instalaciones`),
  ADD KEY `Consumo_procesos` (`Consumo_procesos`),
  ADD KEY `Unidades_sanitarias` (`Unidades_sanitarias`);

--
-- Indices de la tabla `consumo_empleados`
--
ALTER TABLE `consumo_empleados`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `consumo_procesos`
--
ALTER TABLE `consumo_procesos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `elemento`
--
ALTER TABLE `elemento`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Subtipo` (`Subtipo`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `CIIU` (`CIIU`);

--
-- Indices de la tabla `equipo_electronico`
--
ALTER TABLE `equipo_electronico`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Refrigerante` (`Refrigerante`),
  ADD KEY `Equipo_electronico_ibfk_1` (`Sede`);

--
-- Indices de la tabla `extintores`
--
ALTER TABLE `extintores`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `extintor_sede`
--
ALTER TABLE `extintor_sede`
  ADD PRIMARY KEY (`codigo`,`sede`,`Peso`) USING BTREE,
  ADD KEY `sede` (`sede`);

--
-- Indices de la tabla `extintor_vehiculo`
--
ALTER TABLE `extintor_vehiculo`
  ADD PRIMARY KEY (`Vehiculo`,`extintor`),
  ADD KEY `extintor` (`extintor`);

--
-- Indices de la tabla `extintor_vehiculo_elec`
--
ALTER TABLE `extintor_vehiculo_elec`
  ADD PRIMARY KEY (`Vehiculo`,`extintor`),
  ADD KEY `extintor` (`extintor`);

--
-- Indices de la tabla `fuentes_fijas`
--
ALTER TABLE `fuentes_fijas`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `refrigerante` (`refrigerante`),
  ADD KEY `fuentes_fijas_ibfk_1` (`Sede`),
  ADD KEY `fuentes_fijas_ibfk_2` (`Elemento`);

--
-- Indices de la tabla `fuentes_moviles`
--
ALTER TABLE `fuentes_moviles`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Combustible` (`Combustible`),
  ADD KEY `Sede` (`Sede`),
  ADD KEY `fuentes_moviles_ibfk_3` (`Refrigerante`);

--
-- Indices de la tabla `fuente_emision`
--
ALTER TABLE `fuente_emision`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `huella_carbono_energia`
--
ALTER TABLE `huella_carbono_energia`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Sede` (`Sede`);

--
-- Indices de la tabla `huella_carbono_extintores`
--
ALTER TABLE `huella_carbono_extintores`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Extintor` (`Extintor`);

--
-- Indices de la tabla `huella_carbono_fuentes_fijas_combustible`
--
ALTER TABLE `huella_carbono_fuentes_fijas_combustible`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Elemento` (`Elemento`),
  ADD KEY `Sede` (`Sede`);

--
-- Indices de la tabla `huella_carbono_fuentes_fijas_refrigerante`
--
ALTER TABLE `huella_carbono_fuentes_fijas_refrigerante`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Elemento` (`Elemento`),
  ADD KEY `Sede` (`Sede`);

--
-- Indices de la tabla `huella_carbono_fuentes_moviles`
--
ALTER TABLE `huella_carbono_fuentes_moviles`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Placa` (`Placa`);

--
-- Indices de la tabla `huella_carbono_lubricantes`
--
ALTER TABLE `huella_carbono_lubricantes`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `tipo_lubricante` (`tipo_lubricante`),
  ADD KEY `sede` (`sede`);

--
-- Indices de la tabla `huella_hidrica`
--
ALTER TABLE `huella_hidrica`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `Sede` (`Sede`);

--
-- Indices de la tabla `informacion_produccion`
--
ALTER TABLE `informacion_produccion`
  ADD PRIMARY KEY (`Empresa`);

--
-- Indices de la tabla `lavado_instalaciones`
--
ALTER TABLE `lavado_instalaciones`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `luminarias`
--
ALTER TABLE `luminarias`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Sede` (`Sede`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Tipo` (`Tipo`);

--
-- Indices de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Sede` (`Sede`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Sede` (`Sede`);

--
-- Indices de la tabla `refrigerante`
--
ALTER TABLE `refrigerante`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `residuo_solido`
--
ALTER TABLE `residuo_solido`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Proveedor` (`Proveedor`),
  ADD KEY `Sede` (`Sede`);

--
-- Indices de la tabla `riego_jardines`
--
ALTER TABLE `riego_jardines`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Empresa` (`Empresa`);

--
-- Indices de la tabla `subtipo_elemento`
--
ALTER TABLE `subtipo_elemento`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Tipo` (`Tipo`);

--
-- Indices de la tabla `tipo_elemento`
--
ALTER TABLE `tipo_elemento`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `tipo_lubricante`
--
ALTER TABLE `tipo_lubricante`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `tipo_material`
--
ALTER TABLE `tipo_material`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `unidad_sanitaria`
--
ALTER TABLE `unidad_sanitaria`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Sede` (`Sede`);

--
-- Indices de la tabla `vehiculo_electrico`
--
ALTER TABLE `vehiculo_electrico`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Sede` (`Sede`),
  ADD KEY `Refrigerante` (`Refrigerante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fuentes_fijas`
--
ALTER TABLE `fuentes_fijas`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consumo_agua`
--
ALTER TABLE `consumo_agua`
  ADD CONSTRAINT `Consumo_agua_ibfk_1` FOREIGN KEY (`Consumo_empleados`) REFERENCES `consumo_empleados` (`Codigo`),
  ADD CONSTRAINT `Consumo_agua_ibfk_2` FOREIGN KEY (`Riego_jardines`) REFERENCES `riego_jardines` (`Codigo`),
  ADD CONSTRAINT `Consumo_agua_ibfk_3` FOREIGN KEY (`Lavado_instalaciones`) REFERENCES `lavado_instalaciones` (`Codigo`),
  ADD CONSTRAINT `Consumo_agua_ibfk_4` FOREIGN KEY (`Consumo_procesos`) REFERENCES `consumo_procesos` (`codigo`),
  ADD CONSTRAINT `Consumo_agua_ibfk_5` FOREIGN KEY (`Unidades_sanitarias`) REFERENCES `unidad_sanitaria` (`Codigo`),
  ADD CONSTRAINT `Consumo_agua_ibfk_6` FOREIGN KEY (`Sede`) REFERENCES `sede` (`Codigo`);

--
-- Filtros para la tabla `elemento`
--
ALTER TABLE `elemento`
  ADD CONSTRAINT `elemento_ibfk_1` FOREIGN KEY (`Subtipo`) REFERENCES `subtipo_elemento` (`Codigo`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `Empresa_ibfk_1` FOREIGN KEY (`CIIU`) REFERENCES `ciiu` (`Codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo_electronico`
--
ALTER TABLE `equipo_electronico`
  ADD CONSTRAINT `Equipo_electronico_ibfk_1` FOREIGN KEY (`Sede`) REFERENCES `sede` (`Codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Equipo_electronico_ibfk_2` FOREIGN KEY (`Refrigerante`) REFERENCES `refrigerante` (`codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `extintor_sede`
--
ALTER TABLE `extintor_sede`
  ADD CONSTRAINT `extintor_sede_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `extintores` (`codigo`),
  ADD CONSTRAINT `extintor_sede_ibfk_2` FOREIGN KEY (`sede`) REFERENCES `sede` (`Codigo`);

--
-- Filtros para la tabla `extintor_vehiculo`
--
ALTER TABLE `extintor_vehiculo`
  ADD CONSTRAINT `extintor_vehiculo_ibfk_1` FOREIGN KEY (`Vehiculo`) REFERENCES `fuentes_moviles` (`Codigo`),
  ADD CONSTRAINT `extintor_vehiculo_ibfk_2` FOREIGN KEY (`extintor`) REFERENCES `extintores` (`codigo`);

--
-- Filtros para la tabla `extintor_vehiculo_elec`
--
ALTER TABLE `extintor_vehiculo_elec`
  ADD CONSTRAINT `extintor_vehiculo_elec_ibfk_1` FOREIGN KEY (`Vehiculo`) REFERENCES `vehiculo_electrico` (`Codigo`),
  ADD CONSTRAINT `extintor_vehiculo_elec_ibfk_2` FOREIGN KEY (`extintor`) REFERENCES `extintores` (`codigo`);

--
-- Filtros para la tabla `fuentes_fijas`
--
ALTER TABLE `fuentes_fijas`
  ADD CONSTRAINT `fuentes_fijas_ibfk_1` FOREIGN KEY (`Sede`) REFERENCES `sede` (`Codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fuentes_fijas_ibfk_2` FOREIGN KEY (`Elemento`) REFERENCES `elemento` (`Codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fuentes_fijas_ibfk_3` FOREIGN KEY (`refrigerante`) REFERENCES `refrigerante` (`codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `fuentes_moviles`
--
ALTER TABLE `fuentes_moviles`
  ADD CONSTRAINT `fuentes_moviles_ibfk_1` FOREIGN KEY (`Combustible`) REFERENCES `elemento` (`Codigo`),
  ADD CONSTRAINT `fuentes_moviles_ibfk_2` FOREIGN KEY (`Sede`) REFERENCES `sede` (`Codigo`),
  ADD CONSTRAINT `fuentes_moviles_ibfk_3` FOREIGN KEY (`Refrigerante`) REFERENCES `refrigerante` (`codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `huella_carbono_energia`
--
ALTER TABLE `huella_carbono_energia`
  ADD CONSTRAINT `huella_carbono_energia_ibfk_1` FOREIGN KEY (`Sede`) REFERENCES `sede` (`Codigo`);

--
-- Filtros para la tabla `huella_carbono_extintores`
--
ALTER TABLE `huella_carbono_extintores`
  ADD CONSTRAINT `huella_carbono_extintores_ibfk_1` FOREIGN KEY (`Extintor`) REFERENCES `extintores` (`codigo`);

--
-- Filtros para la tabla `huella_carbono_fuentes_fijas_refrigerante`
--
ALTER TABLE `huella_carbono_fuentes_fijas_refrigerante`
  ADD CONSTRAINT `huella_carbono_fuentes_fijas_refrigerante_ibfk_1` FOREIGN KEY (`Elemento`) REFERENCES `refrigerante` (`codigo`),
  ADD CONSTRAINT `huella_carbono_fuentes_fijas_refrigerante_ibfk_2` FOREIGN KEY (`Sede`) REFERENCES `sede` (`Codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
