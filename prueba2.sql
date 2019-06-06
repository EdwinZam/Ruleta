-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2019 a las 18:00:48
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `id_jugador` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `dinero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id_jugador`, `nombre`, `dinero`) VALUES
(1, 'jugador 1', 10000),
(2, 'jugador 2', 10000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1499445660),
('m170707_163549_init_user', 1499445737);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `id_rol` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `id_rol`, `rol`) VALUES
(1, '0', 'Superuser'),
(2, '1', 'Administrador'),
(3, '2', 'Usuario'),
(4, '3', 'Funcionario publico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `id_rol` smallint(6) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `id_rol`, `created_at`, `updated_at`) VALUES
(2, '79pMxAM6ZcdXPI9GvS1Uy_xIue5INxG4', '$2y$13$6dNgFKWPHIBCl/s6Qk9J3.qe35KKbhx3acZdubABbu068WCErz5Qe', NULL, 'admon.aecindi@gmail.com', 10, 1, 1499661325, 1499661325),
(4, 'uH0stQk_6Lm7iYIeR_lo4STFHer6f7Fd', '$2y$13$nRyPICPyExfi8WJ1LI3DbeiRQKvhP9FnVsFlsvq.rGJ7j6tEzx.5u', 'ZbAdopWpq_YGa7WU6S5ZF4Gji5UkBUv3_1500653393', 'ca.rl.ejecutivo@gmail.com', 10, 0, 1499662971, 1500653393),
(5, 'nOZzGO4eeg35Yov00kAV7FzFja-DCpbx', '$2y$13$CXh5ro0Ta9uONh7lRaaGGOK4IV8IPslD/ilH3h4kjrHQwHkvqhrD2', NULL, 'jhon.0710@hotmail.com', 10, 0, 1504102800, 1504102800),
(8, 'X5208PrjqnCjNML1yZXVB611a6K_vx_-', '$2y$13$fUTq2IXpFq7LDGh/6NkNn.gHdc14N5cEGX3fOt5BTcqVA0pmtv3ze', NULL, 'prueba3@gmail.com', 10, 0, 1510789599, 1510789599),
(9, 'hlYy4QQFFyDJ1NUPRrprJ8iVcyCdrJtr', '$2y$13$iGX0Pi/J/XchOQq.1geOIevx9RAaLfiEW96dU3SNPnL2sSQgUeWvi', NULL, 'admin@gmail.com', 10, 1, 1512778811, 1512778811),
(10, 'L9A7-VBEtcU6wKlvkxzUN8MCcCHK6kJt', '$2y$13$cM06eYsHh0XWf/4JHc8aaOWJQvDB1YF1EZgSZmfYVc2q41h35kVhi', NULL, 'usuario@gmail.com', 10, 2, 1512778820, 1512778820),
(11, 'gRiwsCnc5Y-QnvohDcm1MeDw-oFSM2QD', '$2y$13$5BBkYl8hHauiWljGIbrNBO18Poqq9neZOzVyK3EeK60LC7gEiGlDi', NULL, 'funcionariopublico@gmail.com', 10, 3, 1512778828, 1512778828),
(12, '2iTQgyUpYxn1ykKWC867kCYiziPecFSL', '$2y$13$WdXh2e5foq9Ih6loZryt6.erObeB9mP.zwbLKOO1tdXfepidmum3u', NULL, 'edwin@live.com', 10, 0, 1559764452, 1559764452);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id_jugador`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
