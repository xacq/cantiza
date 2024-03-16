-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2024 a las 03:38:50
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
-- Base de datos: `greenpc_cantiza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `can_area`
--

CREATE TABLE `can_area` (
  `can_are_id` int(11) NOT NULL,
  `can_are_name` varchar(50) NOT NULL,
  `can_are_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `can_area`
--

INSERT INTO `can_area` (`can_are_id`, `can_are_name`, `can_are_create`) VALUES
(1, '1', '2024-02-25 10:34:03'),
(2, '2', '2024-02-25 10:34:17'),
(3, '3', '2024-02-25 10:34:42'),
(4, '4 ', '2024-02-25 10:34:49'),
(5, '5', '2024-02-25 10:35:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `can_base`
--

CREATE TABLE `can_base` (
  `can_bas_id` int(11) NOT NULL,
  `can_bas_super` int(11) NOT NULL,
  `can_bas_worker` int(11) NOT NULL,
  `can_bas_info` varchar(20) NOT NULL,
  `can_bas_numerodetallos` int(11) NOT NULL,
  `can_bas_totalcosecha` int(11) NOT NULL,
  `can_bas_date_asig` date NOT NULL DEFAULT current_timestamp(),
  `can_bas_estado` int(11) NOT NULL,
  `can_bas_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `can_base`
--

INSERT INTO `can_base` (`can_bas_id`, `can_bas_super`, `can_bas_worker`, `can_bas_info`, `can_bas_numerodetallos`, `can_bas_totalcosecha`, `can_bas_date_asig`, `can_bas_estado`, `can_bas_create`) VALUES
(27, 2, 3, '1-AR1-BL1-Hearts', 20, 200, '2024-03-15', 0, '2024-03-15 23:19:13'),
(28, 2, 3, '1-AR1-BL2-Paloma', 20, 400, '2024-03-15', 0, '2024-03-15 23:19:51'),
(29, 2, 4, '1-AR1-BL3-Miss White', 20, 0, '2024-03-15', 0, '2024-03-15 23:20:00'),
(30, 2, 3, '1-AR1-BL4-Stardust', 20, 1000, '2024-03-15', 0, '2024-03-15 23:20:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `can_bloque`
--

CREATE TABLE `can_bloque` (
  `can_blo_id` int(11) NOT NULL,
  `can_blo_name` varchar(100) NOT NULL,
  `can_blo_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `can_bloque`
--

INSERT INTO `can_bloque` (`can_blo_id`, `can_blo_name`, `can_blo_create`) VALUES
(1, '1', '2024-02-25 10:40:12'),
(2, '2', '2024-02-25 10:41:35'),
(3, '3', '2024-02-25 10:41:40'),
(4, '4', '2024-02-25 10:41:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `can_estimado`
--

CREATE TABLE `can_estimado` (
  `can_est_id` int(11) NOT NULL,
  `can_est_date` date NOT NULL,
  `can_est_time` time NOT NULL,
  `can_est_base` int(11) NOT NULL,
  `can_est_calculo` int(11) NOT NULL,
  `can_est_resultado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `can_finca`
--

CREATE TABLE `can_finca` (
  `can_fin_id` int(11) NOT NULL,
  `can_fin_name` varchar(100) NOT NULL,
  `can_fin_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `can_finca`
--

INSERT INTO `can_finca` (`can_fin_id`, `can_fin_name`, `can_fin_create`) VALUES
(1, 'BOSA NOVA 1', '2024-02-25 10:33:39'),
(2, 'BOSA NOVA 2', '2024-02-25 10:33:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `can_informacion`
--

CREATE TABLE `can_informacion` (
  `can_inf_id` int(11) NOT NULL,
  `can_inf_super` int(11) NOT NULL,
  `can_inf_finca` int(11) NOT NULL,
  `can_inf_areas` int(11) NOT NULL,
  `can_inf_bloque` int(11) NOT NULL,
  `can_inf_rosa` int(11) NOT NULL,
  `can_inf_identifier` varchar(20) NOT NULL,
  `can_inf_tallospormalla` int(5) NOT NULL,
  `can_inf_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `can_informacion`
--

INSERT INTO `can_informacion` (`can_inf_id`, `can_inf_super`, `can_inf_finca`, `can_inf_areas`, `can_inf_bloque`, `can_inf_rosa`, `can_inf_identifier`, `can_inf_tallospormalla`, `can_inf_create`) VALUES
(9, 2, 1, 1, 1, 1, '1-AR1-BL1-Hearts', 20, '2024-03-15 23:16:38'),
(10, 2, 1, 1, 2, 2, '1-AR1-BL2-Paloma', 20, '2024-03-15 23:17:13'),
(11, 2, 1, 1, 3, 8, '1-AR1-BL3-Miss White', 20, '2024-03-15 23:17:28'),
(12, 2, 1, 1, 4, 16, '1-AR1-BL4-Stardust', 20, '2024-03-15 23:17:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `can_ingresos`
--

CREATE TABLE `can_ingresos` (
  `can_ing_id` int(11) NOT NULL,
  `can_ing_base` int(11) NOT NULL,
  `can_ing_cochero` int(11) NOT NULL,
  `can_ing_trabajador` int(11) NOT NULL,
  `can_ing_mallas` int(11) NOT NULL,
  `can_ing_tallos` int(11) NOT NULL,
  `can_ing_subtotal` int(11) NOT NULL,
  `can_ing_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `can_ingresos`
--

INSERT INTO `can_ingresos` (`can_ing_id`, `can_ing_base`, `can_ing_cochero`, `can_ing_trabajador`, `can_ing_mallas`, `can_ing_tallos`, `can_ing_subtotal`, `can_ing_create`) VALUES
(18, 27, 3, 6, 10, 20, 200, '2024-03-16 02:22:33'),
(19, 28, 3, 6, 20, 20, 400, '2024-03-16 02:22:44'),
(20, 30, 3, 6, 50, 20, 1000, '2024-03-16 02:29:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `can_registro`
--

CREATE TABLE `can_registro` (
  `can_reg_id` int(11) NOT NULL,
  `can_reg_usuario` int(11) NOT NULL,
  `can_reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `can_registro`
--

INSERT INTO `can_registro` (`can_reg_id`, `can_reg_usuario`, `can_reg_date`) VALUES
(1, 1, '2024-02-25 09:40:08'),
(2, 1, '2024-02-25 09:40:41'),
(3, 1, '2024-02-25 10:49:14'),
(4, 1, '2024-02-25 10:59:03'),
(5, 2, '2024-02-25 11:01:12'),
(6, 1, '2024-02-25 11:01:38'),
(7, 2, '2024-02-25 11:11:31'),
(8, 3, '2024-02-25 11:21:53'),
(9, 3, '2024-02-25 11:22:46'),
(10, 1, '2024-02-25 11:24:35'),
(11, 1, '2024-02-25 11:30:03'),
(12, 2, '2024-02-25 11:30:31'),
(13, 1, '2024-02-25 12:40:59'),
(14, 2, '2024-02-25 12:43:51'),
(15, 3, '2024-02-25 12:47:04'),
(16, 3, '2024-02-25 14:28:12'),
(17, 6, '2024-02-25 14:39:18'),
(18, 1, '2024-02-25 14:50:04'),
(19, 6, '2024-02-25 14:51:46'),
(20, 1, '2024-02-25 15:17:17'),
(21, 2, '2024-02-25 15:21:00'),
(22, 3, '2024-02-25 15:24:08'),
(23, 2, '2024-02-25 15:27:09'),
(24, 3, '2024-02-25 15:37:27'),
(25, 1, '2024-02-25 15:45:08'),
(26, 1, '2024-03-14 02:41:57'),
(27, 2, '2024-03-14 03:00:35'),
(28, 1, '2024-03-14 03:11:15'),
(29, 2, '2024-03-14 04:02:53'),
(30, 3, '2024-03-14 04:03:52'),
(31, 4, '2024-03-14 04:05:15'),
(32, 7, '2024-03-14 04:11:07'),
(33, 1, '2024-03-14 19:04:22'),
(34, 2, '2024-03-15 02:24:24'),
(35, 4, '2024-03-15 02:28:19'),
(36, 2, '2024-03-15 02:45:09'),
(37, 4, '2024-03-15 02:55:47'),
(38, 2, '2024-03-15 13:45:03'),
(39, 4, '2024-03-15 13:45:27'),
(40, 4, '2024-03-15 14:45:45'),
(41, 2, '2024-03-15 18:28:31'),
(42, 1, '2024-03-15 18:43:53'),
(43, 1, '2024-03-15 19:06:07'),
(44, 4, '2024-03-15 22:55:16'),
(45, 2, '2024-03-15 22:59:37'),
(46, 1, '2024-03-15 23:06:59'),
(47, 2, '2024-03-15 23:18:59'),
(48, 4, '2024-03-15 23:24:57'),
(49, 3, '2024-03-15 23:25:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `can_rosas`
--

CREATE TABLE `can_rosas` (
  `can_ros_id` int(11) NOT NULL,
  `can_ros_name` varchar(100) NOT NULL,
  `can_ros_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `can_rosas`
--

INSERT INTO `can_rosas` (`can_ros_id`, `can_ros_name`, `can_ros_create`) VALUES
(1, 'Hearts', '2024-02-25 10:42:04'),
(2, 'Paloma', '2024-02-25 10:42:47'),
(3, 'Pink Mondial', '2024-02-25 10:42:59'),
(4, 'Freedom', '2024-02-25 10:43:10'),
(5, 'Mondial', '2024-02-25 10:43:21'),
(6, 'Explorer', '2024-02-25 10:43:36'),
(7, 'Magic Times', '2024-02-25 10:43:49'),
(8, 'Miss White', '2024-02-25 10:44:07'),
(9, 'Red Paris', '2024-02-25 10:44:24'),
(10, 'Cherry O', '2024-02-25 10:44:39'),
(11, 'Cool Water', '2024-02-25 10:44:52'),
(12, 'Esperance', '2024-02-25 10:45:03'),
(13, 'Moody Blues', '2024-02-25 10:45:40'),
(14, 'Tibet', '2024-02-25 10:45:49'),
(15, 'Bumblebee', '2024-02-25 10:46:12'),
(16, 'Stardust', '2024-02-25 10:46:23'),
(17, 'High & Yellow M. Flame', '2024-02-25 10:46:36'),
(18, 'Ocean Song', '2024-02-25 10:46:47'),
(19, 'Pink Floyd', '2024-02-25 10:47:04'),
(20, 'Polar Star', '2024-02-25 10:47:21'),
(21, 'Red Panther', '2024-02-25 10:47:34'),
(22, 'Sweetness', '2024-02-25 10:47:46'),
(23, 'Playa Blanca', '2024-02-25 10:48:06'),
(24, 'Atomic', '2024-02-25 10:48:15'),
(25, 'Jessika', '2024-02-25 10:48:24'),
(26, 'Brighton', '2024-02-25 10:48:40'),
(27, 'Nina', '2024-02-25 10:49:39'),
(28, 'Tara', '2024-02-25 10:49:52'),
(29, 'Cabaret', '2024-02-25 10:50:32'),
(30, 'Samba Pa Ti', '2024-02-25 10:51:41'),
(31, 'Twilight', '2024-02-25 10:52:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `can_tallos_malla`
--

CREATE TABLE `can_tallos_malla` (
  `can_tal_mal_id` int(11) NOT NULL,
  `can_tal_mal_number` int(11) NOT NULL,
  `can_tal_mal_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `can_tallos_malla`
--

INSERT INTO `can_tallos_malla` (`can_tal_mal_id`, `can_tal_mal_number`, `can_tal_mal_create`) VALUES
(1, 20, '2024-02-25 11:08:41'),
(2, 25, '2024-02-25 11:09:23'),
(3, 30, '2024-02-25 11:09:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `can_tipo`
--

CREATE TABLE `can_tipo` (
  `can_tip_id` int(11) NOT NULL,
  `can_tip_name` varchar(100) NOT NULL,
  `can_tip_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `can_tipo`
--

INSERT INTO `can_tipo` (`can_tip_id`, `can_tip_name`, `can_tip_create`) VALUES
(1, 'Administrador', '2024-02-25 10:38:36'),
(2, 'Supervisor', '2024-02-25 10:38:46'),
(3, 'Cochero', '2024-02-25 10:38:55'),
(4, 'Empleado', '2024-02-25 11:25:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `can_usuario`
--

CREATE TABLE `can_usuario` (
  `can_usu_id` int(11) NOT NULL,
  `can_usu_name` varchar(100) NOT NULL,
  `can_usu_cedula` varchar(20) NOT NULL,
  `can_usu_email` varchar(255) NOT NULL,
  `can_usu_password` varchar(255) NOT NULL,
  `can_usu_phone` varchar(50) NOT NULL,
  `can_usu_tipo` int(15) NOT NULL,
  `can_usu_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `can_usuario`
--

INSERT INTO `can_usuario` (`can_usu_id`, `can_usu_name`, `can_usu_cedula`, `can_usu_email`, `can_usu_password`, `can_usu_phone`, `can_usu_tipo`, `can_usu_create`) VALUES
(1, 'Xavier', '0103824835', 'xacq@msn.com', '123456', '0992542734', 1, '2024-02-25 09:39:23'),
(2, 'Pedro Suarez', '0103824835', 'ps@gmail.com', '123456', '123456', 2, '2024-02-25 10:56:33'),
(3, 'Juan Mendez', '0102426053', 'jm@gmail.com', '123456', '1234567890', 3, '2024-02-25 11:21:06'),
(4, 'Pedro Torres', '0102426053', 'pt@gmail.com', '123456', '1234567890', 3, '2024-02-25 11:29:52'),
(5, 'Miguel Rodriguez', '0103824835', 'mr@gmail.com', '123456', '1234567890', 2, '2024-02-25 12:38:40'),
(6, 'Antonio', '0103824835', 'antonio@gmail.com', '123456', '123456789', 4, '2024-02-25 13:11:06'),
(7, 'Jose Luis', '0103824835', 'jl@gmail.com', '123456', '1234567890', 4, '2024-02-25 13:11:06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `can_area`
--
ALTER TABLE `can_area`
  ADD PRIMARY KEY (`can_are_id`);

--
-- Indices de la tabla `can_base`
--
ALTER TABLE `can_base`
  ADD PRIMARY KEY (`can_bas_id`);

--
-- Indices de la tabla `can_bloque`
--
ALTER TABLE `can_bloque`
  ADD PRIMARY KEY (`can_blo_id`);

--
-- Indices de la tabla `can_estimado`
--
ALTER TABLE `can_estimado`
  ADD PRIMARY KEY (`can_est_id`);

--
-- Indices de la tabla `can_finca`
--
ALTER TABLE `can_finca`
  ADD PRIMARY KEY (`can_fin_id`);

--
-- Indices de la tabla `can_informacion`
--
ALTER TABLE `can_informacion`
  ADD PRIMARY KEY (`can_inf_id`);

--
-- Indices de la tabla `can_ingresos`
--
ALTER TABLE `can_ingresos`
  ADD PRIMARY KEY (`can_ing_id`);

--
-- Indices de la tabla `can_registro`
--
ALTER TABLE `can_registro`
  ADD PRIMARY KEY (`can_reg_id`);

--
-- Indices de la tabla `can_rosas`
--
ALTER TABLE `can_rosas`
  ADD PRIMARY KEY (`can_ros_id`);

--
-- Indices de la tabla `can_tallos_malla`
--
ALTER TABLE `can_tallos_malla`
  ADD PRIMARY KEY (`can_tal_mal_id`);

--
-- Indices de la tabla `can_tipo`
--
ALTER TABLE `can_tipo`
  ADD PRIMARY KEY (`can_tip_id`);

--
-- Indices de la tabla `can_usuario`
--
ALTER TABLE `can_usuario`
  ADD PRIMARY KEY (`can_usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `can_area`
--
ALTER TABLE `can_area`
  MODIFY `can_are_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `can_base`
--
ALTER TABLE `can_base`
  MODIFY `can_bas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `can_bloque`
--
ALTER TABLE `can_bloque`
  MODIFY `can_blo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `can_estimado`
--
ALTER TABLE `can_estimado`
  MODIFY `can_est_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `can_finca`
--
ALTER TABLE `can_finca`
  MODIFY `can_fin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `can_informacion`
--
ALTER TABLE `can_informacion`
  MODIFY `can_inf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `can_ingresos`
--
ALTER TABLE `can_ingresos`
  MODIFY `can_ing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `can_registro`
--
ALTER TABLE `can_registro`
  MODIFY `can_reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `can_rosas`
--
ALTER TABLE `can_rosas`
  MODIFY `can_ros_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `can_tallos_malla`
--
ALTER TABLE `can_tallos_malla`
  MODIFY `can_tal_mal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `can_tipo`
--
ALTER TABLE `can_tipo`
  MODIFY `can_tip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `can_usuario`
--
ALTER TABLE `can_usuario`
  MODIFY `can_usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
