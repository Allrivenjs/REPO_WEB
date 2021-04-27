-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-04-2021 a las 04:59:54
-- Versión del servidor: 8.0.23-0ubuntu0.20.04.1
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursophp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content` longtext NOT NULL,
  `img_url` text NOT NULL,
  `creador` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `content`, `img_url`, `creador`, `created_at`, `updated_at`) VALUES
(29, 'hola1', 'Este es un nuevo contenido', 'https://ichef.bbci.co.uk/news/640/cpsprodpb/8536/production/_103520143_gettyimages-908714708.jpg', 'Fabian', '2021-04-27 00:50:25', '2021-04-27 02:09:23'),
(31, 'Presentacion fabian- update', 'Presentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabian', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.bbc.com%2Fmundo%2Fvert-fut-50490320&psig=AOvVaw3126EZOYFeDpCv3jSsbf2m&ust=1619382983986000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCMi1uerdl_ACFQAAAAAdAAAAABAD', 'Fabian', '2021-04-27 02:42:48', '2021-04-27 02:44:26'),
(32, 'Presentacion fabian', 'Presentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabian', 'https://ichef.bbci.co.uk/news/640/cpsprodpb/8536/production/_103520143_gettyimages-908714708.jpg', 'Fabian', '2021-04-27 02:42:54', '2021-04-27 02:42:54'),
(33, 'Presentacion fabian', 'Presentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabian', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.bbc.com%2Fmundo%2Fvert-fut-50490320&psig=AOvVaw3126EZOYFeDpCv3jSsbf2m&ust=1619382983986000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCMi1uerdl_ACFQAAAAAdAAAAABAD', 'Fabian', '2021-04-27 02:42:59', '2021-04-27 02:42:59'),
(34, 'Presentacion fabian', 'Presentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabian', 'https://ichef.bbci.co.uk/news/640/cpsprodpb/8536/production/_103520143_gettyimages-908714708.jpg', 'Fabian', '2021-04-27 02:43:04', '2021-04-27 02:43:04'),
(36, 'Presentacion fabian', 'Presentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianPresentacion fabianv', 'https://ichef.bbci.co.uk/news/640/cpsprodpb/8536/production/_103520143_gettyimages-908714708.jpg', 'Fabian', '2021-04-27 02:43:14', '2021-04-27 02:43:14'),
(37, 'Sebas crea posts', 'La bocchi es la bochhi por que la bocchi es bochchi', 'https://i.ytimg.com/vi/xdX6TKOruA4/maxresdefault.jpg', 'sebastian', '2021-04-27 02:47:20', '2021-04-27 02:47:20'),
(38, 'RE: Forum my ideal home', 'laochiiii\r\n', 'https://i.ytimg.com/vi/xdX6TKOruA4/maxresdefault.jpg', 'sebastian', '2021-04-27 02:51:43', '2021-04-27 02:51:43'),
(39, 'nelperro', 'nelperro', 'https://i.ytimg.com/vi/xdX6TKOruA4/maxresdefault.jpg', 'sebastian', '2021-04-27 02:52:38', '2021-04-27 04:35:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Fabian', 'fabian@gmail.com', '$2y$10$gSJA.3E34SuPzabRxOyXg.mYJfKnOlhLBrL0mLRnRQJEnFHU5rH3G', '2021-04-21 04:39:16', '2021-04-21 04:39:16'),
(2, 'sebastian', 'sebastian@gmail.com', '$2y$10$bqed0cZ4ZAVm1duo51IObuNAkxqY7GdX2HwllPOIMkPC5tfGtikky', '2021-04-21 04:40:42', '2021-04-21 04:40:42'),
(3, 'Karlitos', 'karlitos@gmail.com', '$2y$10$ahM4Ab0CCc8c86186F7Vpuj4ATrTL0VHm6bDkra2i1BAe1RNfbgq2', '2021-04-21 04:51:00', '2021-04-21 04:51:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creador` (`creador`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
