-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2024 a las 18:09:09
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `moviles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `Cod_Car` int(11) NOT NULL,
  `Usu_Car` varchar(50) NOT NULL,
  `Pro_Car` varchar(50) NOT NULL,
  `Pre_Car` double NOT NULL,
  `Ima_Car` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`Cod_Car`, `Usu_Car`, `Pro_Car`, `Pre_Car`, `Ima_Car`) VALUES
(63, 'amorcito', 'Pedro Ximenez', 3.2, 'Recursos/Imagenes/Productos/PedroXimenez.png'),
(64, 'amorcito', 'The Last Dark Dawn', 3.85, 'Recursos/Imagenes/Productos/TheLastDark.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `Cod_Com` int(11) NOT NULL,
  `Cli_Com` varchar(50) NOT NULL,
  `Pre_Tot_Com` double NOT NULL,
  `Fec_Com` date NOT NULL,
  `Pro_Com` varchar(250) NOT NULL,
  `Pre_Sub_Com` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`Cod_Com`, `Cli_Com`, `Pre_Tot_Com`, `Fec_Com`, `Pro_Com`, `Pre_Sub_Com`) VALUES
(5, 'dallin', 52.752, '2023-11-08', '[\"Palo Cortado\",\"The Last Dark Dawn\"]', 47.1),
(8, 'dallin', 52.752, '2023-11-10', '[\"Palo Cortado\",\"The Last Dark Dawn\"]', 47.1),
(13, 'dallin', 52.752, '2023-11-15', '[\"The Last Dark Dawn\",\"Palo Cortado\"]', 47.1),
(14, 'dallin', 141.12, '2023-11-17', '[\"u00d6u00f6\",\"NIGULA\",\"Must Kuld\",\"Pime u00d6u00f6\",\"SBERLUC\"]', 126),
(16, 'dallin', 43.344, '2023-11-17', '[\"Russian Imperial Stout\",\"Pedro Ximenez\"]', 38.7),
(17, 'dallin', 27.216, '2023-12-04', '[\"Palo Cortado\"]', 24.3),
(18, 'Dario', 47.712, '2023-12-30', '[\"The Last Dark Dawn\",\"Russian Imperial Stout\"]', 42.6),
(22, 'Martha', 25.87, '2023-12-31', 'The Last Dark Dawn', 0),
(23, 'Martha', 18.48, '2023-12-31', 'Black Country', 16.5),
(24, 'Martha', 21.84, '2023-12-31', 'Russian Imperial Stout', 19.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Cod_Pro` int(11) NOT NULL,
  `Nom_Pro` varchar(50) NOT NULL,
  `Mar_Pro` varchar(50) NOT NULL,
  `Gra_Alc_Pro` double NOT NULL,
  `Car_1_Pro` varchar(40) NOT NULL,
  `Car_2_Pro` varchar(40) NOT NULL,
  `Car_3_Pro` varchar(40) NOT NULL,
  `Ama_Pro` varchar(20) NOT NULL,
  `Cue_Pro` varchar(20) NOT NULL,
  `Pre_Pro` double NOT NULL,
  `Des_Pro` varchar(500) NOT NULL,
  `IBU` double NOT NULL,
  `Rut_Pro` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Cod_Pro`, `Nom_Pro`, `Mar_Pro`, `Gra_Alc_Pro`, `Car_1_Pro`, `Car_2_Pro`, `Car_3_Pro`, `Ama_Pro`, `Cue_Pro`, `Pre_Pro`, `Des_Pro`, `IBU`, `Rut_Pro`) VALUES
(1, 'Pedro Ximenez', 'BlackBlock', 13, 'Chocolate', 'Copos Cebada', 'Magnum', 'Alto', 'Medio', 3.2, 'La Black Block de siempre añejada durante 2 años en barricas de PX. Una delicia para los sentidos.', 60, 'Recursos/Imagenes/Productos/PedroXimenez.png'),
(2, 'Palo Cortado', 'BlackBlock', 13, 'Cebada Asada', 'Avena', 'Malta Extra Palida', 'Alto', 'Medio', 4.05, 'Nuestra Black Block de siempre, madurada en barricas de Palo Cortado durante 2 años. Yummm!', 60, 'Recursos/Imagenes/Productos/Bourbon.png'),
(3, 'The Last Dark Dawn', 'BlackBlock', 15, 'Dextrina', 'Copos Trigo', 'Cebada Tostada', 'Alto', 'Alto', 3.85, 'Algo “grande” o “muy grande”, que destaca por su magnitud. Oscuridad, densidad, potencia, cremosidad, torrefacción…', 65, 'Recursos/Imagenes/Productos/TheLastDark.png'),
(4, 'Vanilla Black Velvet', 'BlackBlock', 10.3, 'Vainilla', 'Avena', 'Malta Extra Palida', 'Medio', 'Medio', 4.2, 'No queremos presumir demasiado… pero esto es un BIRROTE! La mezcla ha sido mágica y el resultado es sorprendente y no te dejará indiferente.', 40, 'Recursos/Imagenes/Productos/Vanilla.png'),
(5, 'Russian Imperial Stout', 'BlackBlock', 11.2, 'Chocolate', 'Copos Cebada', 'Malta Palida', 'Alto', 'Medio', 3.25, 'Buque insignia de la nave Pirata, nuestra Russian Imperial Stout de 11,2% es una cerveza con mucha presencia, mucho cuerpo, mucha densidad y absoluta oscuridad, potente y redonda, para los buenos amantes de las stout. Balanceada, bastante dulce y de ligero amargor final, resinoso y de licor.', 60, 'Recursos/Imagenes/Productos/Russian.png'),
(6, 'Black Country', 'BlackBlock', 4, 'Malta Cafe', 'Avena Dorada', 'Willamette', 'Bajo', 'Bajo', 2.75, 'Es tiempo de darle el poder a aquellos a quienes nunca se les debió arrebatar. Volverá a nuestras manos. No más élites, no más dirigentes corruptos, es nuestra hora. ¡Tened cuidado, nos habéis cabreado!', 20, 'Recursos/Imagenes/Productos/BlackCountry.png'),
(7, 'Cocobänger', 'Pöhjala', 12.5, 'Coco Cremoso', 'Ciruelas', 'Café Tostado', 'Alto', 'Medio', 5.8, 'Pöhjala Cocobänger es una cerveza estilo Imperial Stout elaborada con cremoso coco y café de Costa Rica. Cocobänger  presenta aromas a coco tostado, pasas y licor de café, en boca el coco está presente, seguido del café, ciruelas y moras.', 60, 'Recursos/Imagenes/Productos/CocoBanger.png'),
(8, 'Öö', 'Pöhjala', 10.5, 'Cacao', 'Café Expreso', 'Regaliz', 'Bajo', 'Alto', 4.6, 'Pöhjala Öö es una cerveza estilo baltic porter  con notas a café expreso, cacao, regaliz y cuero, el cuerpo amargo y sedoso está suavemente carbonatado con un lado salado de umami y una sequedad astringente que llena perfectamente el paladar.', 0, 'Recursos/Imagenes/Productos/Oo.png'),
(9, 'Pime Öö', 'Pöhjala', 13.6, 'Chocolate', 'Grosellas Negras', 'Nuez', 'Alto', 'Medio', 5.2, 'Pöhjala Forest Pime Öö es una cerveza estilo Imperial Stout en donde las grosellas negras y las ciruelas se perciben en boca seguidas de toques de jazmín y nuez, de carbonatación baja que ayuda a limpiar el paladar antes de que termine la sensación de un brownie de chocolate.', 60, 'Recursos/Imagenes/Productos/PrimeOo.png'),
(10, 'Must Kuld', 'Pöhjala', 7.8, 'Leche', 'Miel', 'Nuez', 'Bajo', 'Bajo', 3.5, 'Pöhjala Must Kuld es una cerveza estilo Porter elaborada con leche. miel y grosella. Must Kuld presenta aromas a chocolate y café.', 20, 'Recursos/Imagenes/Productos/MustKuld.png'),
(11, 'MILAFIÜ', 'PintalPina', 5.5, 'Miel Valtellina', 'Malta Cebada', 'Levadura', 'Bajo', 'Medio', 3.2, 'Cerveza fresca y refrescante, con una graduación alcohólica ligera que facilita su consumo en abundancia. Malta, miel, lúpulo y levadura. Una bebida delicada con notas de miel y heno cerrada por un elegante final especiado.', 15, 'Recursos/Imagenes/Productos/Milafiu.png'),
(12, 'WITELA', 'PintalPina', 4.8, 'Malta Trigo', 'Aven', 'Hibisco', 'Bajo', 'Medio', 3.2, 'Witela es un witbier aromatizado con flores de hibisco y cilantro. Cerveza fresca y saciante con tonos delicados y ligeramente picantes. El trigo y la avena le dan una opalescencia típica y una espuma persistente.', 15, 'Recursos/Imagenes/Productos/Witela.png'),
(13, 'SUMARTÌ', 'PintalPina', 6, 'Centeno Valtellina', 'Malta Cebada', 'Levadura', 'Bajo', 'Bajo', 3.9, 'Cerveza estilo Saison, espumosa y ligera. La nariz recuerda a los aromas especiados y al heno de primavera. El centeno Valtellina y la levadura saison desprenden un aroma afrutado y una nota especiada\r\ny ligeramente picante.', 22.5, 'Recursos/Imagenes/Productos/Sumati.png'),
(14, 'RÜGEN', 'PintalPina', 6.5, 'Malta Cebada', 'Azucar Confitada', 'Levadura', 'Bajo', 'Medio', 3.2, 'Rügen es una cerveza equilibrada, de color caoba, con aromas especiados y ligeramente tostados. Aroma a frutos rojos maduros y frutos secos, con notas de galletas y chocolate.', 25, 'Recursos/Imagenes/Productos/Rugen.png'),
(15, 'SBERLUC', 'PintalPina', 5.5, 'Lupulo', 'Malta Cebada', 'Levadura', 'Bajo', 'Bajo', 3.9, 'Cerveza Lager, típica FestBier alemana de color dorado y fina espuma blanca. La nariz recuerda a la corteza de pan y a la miel. En boca, la dulzura de la malta y el lúpulo refinado equilibran un buen contenido de alcohol, lo que invita a beber.', 18, 'Recursos/Imagenes/Productos/Sberluc.png'),
(16, 'CRASC', 'PintalPina', 4.5, 'Raíz Regaliz', 'Malta Cebada', 'Levadura', 'Bajo', 'Medio', 3.2, 'Crasc es una cerveza negra con un aspecto nocturno con un sombrero grueso de espuma crema. En nariz desprende aromas a café tostado y cereales tostados. Agradablemente complejo, aporta un delicado chocolate negro a la boca complementado con toques de chinotto y raíz de regaliz. ', 22, 'Recursos/Imagenes/Productos/Crasc.png'),
(17, 'NIGULA', 'PintalPina', 4.5, 'Lupulo', 'Malta Cebada', 'Levadura', 'Medio', 'Bajo', 3.8, 'Cerveza ligera de color dorado, con un importante lupulado que libera aromas cítricos y herbáceos, dándole un sabor único, pero \"sencillo\". El cuerpo esbelto, pero con carácter, y el ligero amargor que emerge claramente la convierten en una cerveza con una excelente bebibilidad.', 33, 'Recursos/Imagenes/Productos/Nigula.png'),
(20, 'Flanders Style', 'PumpKing', 5, 'Cebada', 'Dextrima', 'Cacao', 'Medio', 'Bajo', 3, 'Qque pasa macho', 60, 'Recursos/Imagenes/Productos/Mockup-The-Last-Dark-Dawn-OK.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `Cod_Tes` int(11) NOT NULL,
  `Usu_Tes` varchar(50) NOT NULL,
  `Ema_Tes` varchar(200) NOT NULL,
  `Mot_Tes` varchar(100) NOT NULL,
  `Men_Tes` varchar(500) NOT NULL,
  `Hab_Tes` varchar(20) NOT NULL,
  `Cal_Mot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`Cod_Tes`, `Usu_Tes`, `Ema_Tes`, `Mot_Tes`, `Men_Tes`, `Hab_Tes`, `Cal_Mot`) VALUES
(1, 'Dallin Miranda', 'DTuston@uta.edu.ec', 'Testimonio', '\"La cerveza artesanal de INTI ha elevado mis expectativas. Cada sorbo es una experiencia única llena de sabor y calidad. ¡Un deleite para los amantes de la cerveza!\"', 'Habilitado', 5),
(2, 'Andres Laverde', 'ALaverde@uta.edu.ec', 'Testimonio', '\"Lo que más me impresiona es el compromiso de INTI con la calidad. Cada cerveza es un testimonio de su dedicación a la excelencia y la artesanía.\"', 'Habilitado', 3),
(4, 'Valentina Caserez', 'VCaserez@hotmail.com', 'Testimonio', '\"La cerveza artesanal de esta empresa es más que una bebida, es una experiencia. Cada cerveza cuenta una historia, y cada sorbo es una invitación a explorar el apasionante mundo de la cerveza artesanal.\"', 'Deshabilitado', 4),
(5, 'Andres Quiñonez', 'AndQ2023@gmail.com', 'Testimonio', '\"Desde que probé la cerveza artesanal de esta empresa, no puedo conformarme con otra. La frescura y la atención a los detalles hacen que cada cerveza sea una obra maestra. ¡No puedo esperar a probar las próximas creaciones!\"', 'Habilitado', 5),
(6, 'Alan Flores', 'AlitasPicantes@gmail.com', 'Testimonio', '\"Como amante de la cerveza, puedo decir con certeza que la selección de cervezas artesanales de esta empresa es insuperable. Desde las cervezas más ligeras hasta las más robustas, siempre encuentro la perfecta para cada ocasión.\"', 'Deshabilitado', 5),
(7, 'Marcos Cevallos', 'DCevallos@uta.edu.ec', 'Testimonio', '\"Como conocedor de la cerveza, puedo decir con confianza que la calidad de las cervezas de INTI es inigualable. Ingredientes de primera, proceso artesanal y amor por la cerveza.\"', 'Habilitado', 4),
(19, 'Maria Benedeti', 'cl009189@gmail.com', 'Queja', 'wwwwwwwwwwww', 'Deshabilitado', 4),
(20, 'Carlos Montes', 'cl009189@gmail.com', 'Queja', 'asfdsadsadasdsadasdasdas', 'Deshabilitado', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `clave` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `clave`, `email`, `telefono`, `rol`) VALUES
('dallin', 'dallin123', 'dallin@hotmail.com', '0985184605', 'cliente'),
('admin', 'admin', 'admin@uta.edu.ec', '0985184705', 'admin'),
('usuario_prueba', 'contrasena_prueba', 'correo_prueba@example.com', '123456789', 'cliente'),
('user', 'contrasena_prueba', 'correo_prueba@example.com', '123456789', 'cliente'),
('userPrueba', 'contrasena_prueba', 'correo_prueba@example.com', '123456789', 'cliente'),
('usuario_existente', 'contrasena_existente', 'correo_existente@example.com', '987654321', 'cliente'),
('UserTest', 'contrasena_prueba', 'correo_prueba@example.com', '123456789', 'cliente'),
('Dario', 'dario', 'darioLopez@gmail.com', '0985184705', 'cliente'),
('amorcito', '$2y$10$5WyYW5B.A4dh8', 'amorcito@gmail.com', '0993422656', 'cliente'),
('amorcito2', '$2y$10$p6SFXwcAc5GTv', 'cl009189@gmail.com', '0985184705', 'cliente'),
('marco', '123', 'cl009189@gmail.com', '0985184705', 'cliente'),
('CLopez@uta.edu.com', '2001', 'cl009189@gmail.com', '9999999999', 'cliente'),
('Martha', '15diciembre001', 'martha@gmail.com', '0993422656', 'cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`Cod_Car`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`Cod_Com`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Cod_Pro`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`Cod_Tes`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `Cod_Car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `Cod_Com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Cod_Pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `Cod_Tes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
