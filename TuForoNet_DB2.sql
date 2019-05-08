-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-05-2019 a las 20:15:51
-- Versión del servidor: 5.7.26-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `TuForoNet_DB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Oficial', 'Comunicados y temas de gran importancia para la comunidad de TuForo.Net.'),
(2, 'General', 'Charlas, esparcimiento y temas que no tienen cabida en los otros subforos.'),
(3, 'Motor', 'Todo sobre el motor: Coches, Noticias, Curiosidades ...'),
(4, 'Noticias', 'Temas de actualidad y noticias de prensa.'),
(5, 'Informática', 'Temas relacionados con la Tecnología, Informática, Smartphones ...'),
(6, 'Juegos', 'Temas sobre Videojuegos, independientemente de su plataforma.'),
(7, 'Música', 'Conciertos, festivales, lanzamientos y todo lo relacionado con el mundo de la música.'),
(8, 'Política', 'Ideologías, partidos políticos, debates ...'),
(9, 'Fitness', 'Temas relacionados con el mundo del Fitness, el gimnasio y las pesas.'),
(10, 'Deportes', 'Todo lo relacionado con temas deportivos como fútbol, baloncesto, tennis ...'),
(11, 'Criptomonedas', 'Todo lo relacionado con Bitcoin, Ethereum, Blockchain ...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `thread_id` int(10) UNSIGNED NOT NULL,
  `creator` int(10) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_04_01_170745_bbdd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `threads`
--

CREATE TABLE `threads` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` int(10) UNSIGNED NOT NULL,
  `thread` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `creator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `reply_count` int(11) NOT NULL DEFAULT '0',
  `last_reply_time` timestamp NULL DEFAULT NULL,
  `last_reply_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `threads`
--

INSERT INTO `threads` (`id`, `category`, `thread`, `url`, `created_at`, `updated_at`, `creator`, `view_count`, `reply_count`, `last_reply_time`, `last_reply_user`, `closed`) VALUES
(1, 1, 'Bienvenidos a TuForo.Net', 'thread/1', '2019-05-06 17:26:07', '2019-05-06 17:26:07', 'Administrador', 0, 0, '2019-05-06 17:26:07', 'Administrador', 0),
(2, 3, 'Os presento mi Ferrari 488 GTB', 'http://192.168.1.56:8000/thread/2', '2019-04-19 20:00:00', '2019-04-29 20:20:00', 'Ilitri', 0, 0, '2019-04-29 20:20:00', 'Lzarillo777', 0),
(3, 5, 'Presupuesto PC Gaming 600€', 'http://192.168.1.56:8000/thread/3', '2019-04-19 20:00:00', '2019-04-29 20:00:00', 'H@Ck€RM@N', 0, 0, '2019-04-29 20:00:00', 'H@Ck€RM@N', 0),
(4, 6, '¿El MMORPG de moda?', 'http://192.168.1.56:8000/thread/4', '2019-04-29 20:00:00', '2019-04-29 20:00:00', 'Lzarillo777', 0, 0, '2019-04-29 20:00:00', 'Lzarillo777', 0),
(5, 7, 'Hilo de Rap, Trap, Rnb y subgéneros', 'http://192.168.1.56:8000/thread/5', '2019-04-29 20:00:00', '2019-04-29 20:00:00', 'ViBoXx', 0, 1, '2019-04-29 20:00:00', 'ViBoXx', 0),
(6, 4, '\"Muerte al machismu\": pintadas en la sede de Foro en Siero', 'http://192.168.1.56:8000/thread/6', '2019-04-29 20:00:00', '2019-04-29 20:00:00', 'Gimeno26', 0, 1, '2019-04-29 20:00:00', 'Gimeno26', 0),
(7, 8, 'Si VOX hubiera estado en el debate de A3', 'http://192.168.1.56:8000/thread/7', '2019-04-29 20:00:00', '2019-04-29 20:00:00', 'ICarrasco', 0, 1, '2019-04-29 20:00:00', 'ICarrasco', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_activity` timestamp NULL DEFAULT NULL,
  `msg_count` int(11) NOT NULL DEFAULT '0',
  `thread_count` int(11) NOT NULL DEFAULT '0',
  `user_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_bg_style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_thread_id_foreign` (`thread_id`),
  ADD KEY `messages_creator_foreign` (`creator`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `threads_url_unique` (`url`),
  ADD KEY `threads_category_foreign` (`category`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_creator_foreign` FOREIGN KEY (`creator`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_thread_id_foreign` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`);

--
-- Filtros para la tabla `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_category_foreign` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
