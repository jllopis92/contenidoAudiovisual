-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 05-07-2016 a las 21:36:41
-- Versión del servidor: 5.5.42
-- Versión de PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `contenidoAudiovisual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_in_movie`
--

CREATE TABLE `category_in_movie` (
  `video_id` int(10) unsigned NOT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres`
--

CREATE TABLE `genres` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genre_in_movie`
--

CREATE TABLE `genre_in_movie` (
  `genero_id` int(10) unsigned NOT NULL,
  `video_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_07_03_054800_update_users_table', 2),
('2016_07_03_172003_update_table_users', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int(11) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `asignatura_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `visit` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `imageRef` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `authorization_date` datetime DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL,
  `production_year` year(4) NOT NULL,
  `direction` varchar(255) NOT NULL,
  `direction_assistant` varchar(255) DEFAULT NULL,
  `casting` varchar(255) DEFAULT NULL,
  `continuista` varchar(255) DEFAULT NULL,
  `script` varchar(255) NOT NULL,
  `production` varchar(255) NOT NULL,
  `production_assistant` varchar(255) DEFAULT NULL,
  `photografic_direction` varchar(255) NOT NULL,
  `camara` varchar(255) NOT NULL,
  `camara_assistant` varchar(255) DEFAULT NULL,
  `art_direction` varchar(255) DEFAULT NULL,
  `sonorous_register` varchar(255) NOT NULL,
  `mounting` varchar(255) DEFAULT NULL,
  `image_postproduction` varchar(255) NOT NULL,
  `sound_postproduction` varchar(255) NOT NULL,
  `catering` varchar(255) DEFAULT NULL,
  `music` varchar(255) DEFAULT NULL,
  `actors` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `usuario_id`, `asignatura_id`, `name`, `visit`, `language`, `duration`, `creation_date`, `description`, `imageRef`, `url`, `authorization_date`, `state`, `production_year`, `direction`, `direction_assistant`, `casting`, `continuista`, `script`, `production`, `production_assistant`, `photografic_direction`, `camara`, `camara_assistant`, `art_direction`, `sonorous_register`, `mounting`, `image_postproduction`, `sound_postproduction`, `catering`, `music`, `actors`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 'Life of Pi', 0, 'Español', 0, '2016-07-03', 'descripcion', '32gridallbum2.jpg', '4745Video.mp4', NULL, NULL, 1999, 'direccion', 'asis direct', 'casting', 'continuista', 'guion', 'produccion', 'asis product', 'direct foto', 'camara', 'asist camara', 'dir arte', 'reg sonoro', 'montaje', 'post img', 'post sound', 'catering', 'musica', 'actores', '2016-07-04 04:40:47', '2016-07-04 04:40:47'),
(2, 6, 2, 'video2', 0, 'Español', 0, '2016-07-03', 'descripcion', '545gridallbum10.jpg', '545VideoTest.mp4', NULL, NULL, 1999, 'direccion', 'asis direct', 'casting', 'continuista', 'guion', 'produccion', 'asis product', 'direct foto', 'camara', 'asist camara', 'dir arte', 'reg sonoro', 'montaje', 'post img', 'post sound', 'catering', 'musica', 'actores', '2016-07-04 05:18:55', '2016-07-04 05:18:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movie_in_grill`
--

CREATE TABLE `movie_in_grill` (
  `video_id` int(10) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peoples`
--

CREATE TABLE `peoples` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people_in_movie`
--

CREATE TABLE `people_in_movie` (
  `persona_id` int(10) unsigned NOT NULL,
  `video_id` int(10) unsigned NOT NULL,
  `rol_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_in_subject`
--

CREATE TABLE `student_in_subject` (
  `asignatura_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) unsigned NOT NULL,
  `profesor_id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subjects`
--

INSERT INTO `subjects` (`id`, `profesor_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 7, 'Taller Integrado 1', '2016-07-04 03:35:00', NULL),
(2, 8, 'Taller de Realización 1', '2016-07-04 03:35:00', NULL),
(3, 7, 'Taller de Integración 1', '2016-07-04 03:36:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtitles`
--

CREATE TABLE `subtitles` (
  `id` int(10) unsigned NOT NULL,
  `video_id` int(10) unsigned DEFAULT NULL,
  `trailer_id` int(10) unsigned DEFAULT NULL,
  `language` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trailers`
--

CREATE TABLE `trailers` (
  `id` int(10) unsigned NOT NULL,
  `video_id` int(10) unsigned NOT NULL,
  `duration` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `zone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sector` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` enum('profesor','alumno','administrador','externo') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `birthday`, `zone`, `country`, `region`, `city`, `sector`, `tipo`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'root', 'root@root.cl', '', '2010-02-02', '', '', '', '', '', 'profesor', 'CTy4tDJtW9MCylZJEzkYHTKz1LUBZRgcv2lCFVOVkwnSXfPmX1DpbuvgZmkx', '2016-07-03 08:22:11', '2016-07-04 02:43:32', NULL),
(3, 'usuario2', 'usuario2@usuario2.cl', '$2y$10$6LNhH3pbeIMcicB4fbG93.1ZbCJTg3/iDnPC1dzV8KdxuVM/KGycK', '0000-00-00', '', 'Argentina', '', 'Cordoba', '', 'profesor', 'Cl0mLjw4RuN0YQFPLn9DsIBxxN6Lx0ZZET13GMETamzpvVI7Fzx2gPbqL1sY', '2016-07-03 21:26:55', '2016-07-04 01:27:04', '2016-07-04 01:27:04'),
(6, 'usuario5', 'usuario5@usuario5.cl', '$2y$10$qQKWEjCf0hI1ECwCmoce7Ofv7UdpmDrHX1o1gxW8jTle5GMpy0cGe', '2016-06-07', 'Sudamérica', 'Chile', 'Valparaiso', '', '', 'externo', 'tEPCyWlpnf3HTC5rb3KFrWU6ADzX7yctSlUrjfzQVcxBMNcxhuieb0nOt8ee', '2016-07-04 00:07:38', '2016-07-05 05:34:34', NULL),
(7, 'profesor1', 'profesor1@profesor1.cl', '$2y$10$za4AgCmXu3eG5ldvG2Cblu1.6gefbmfs8pfYpzgLin77vPRHsTv2e', '1980-07-02', 'Sudamérica', 'Chile', 'Valparaiso', '', '', 'externo', 'Hidf37X21n3euhWv4awOZr5DuToe8u4EcR08gETrhJcC0sppNxqDFt9FiopB', '2016-07-04 04:30:50', '2016-07-04 04:30:58', NULL),
(8, 'profesor2', 'profesor2@profesor2.cl', '$2y$10$VKyUMLuG5e5n7ki3mxncHOtid4reEhNfxJYlY/Zf1cOFZ3RMpDWO.', '1970-07-01', 'Sudamérica', 'Chile', 'Valparaiso', '', '', 'externo', NULL, '2016-07-04 04:32:55', '2016-07-04 04:32:55', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category_in_movie`
--
ALTER TABLE `category_in_movie`
  ADD PRIMARY KEY (`video_id`,`categoria_id`),
  ADD KEY `fk_video_has_categoria_categoria1_idx` (`categoria_id`),
  ADD KEY `fk_video_has_categoria_video1_idx` (`video_id`);

--
-- Indices de la tabla `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genre_in_movie`
--
ALTER TABLE `genre_in_movie`
  ADD PRIMARY KEY (`genero_id`,`video_id`),
  ADD KEY `fk_genero_has_video_video1_idx` (`video_id`),
  ADD KEY `fk_genero_has_video_genero1_idx` (`genero_id`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_video_asignatura1_idx` (`asignatura_id`),
  ADD KEY `fk_video_usuario1_idx` (`usuario_id`);

--
-- Indices de la tabla `movie_in_grill`
--
ALTER TABLE `movie_in_grill`
  ADD PRIMARY KEY (`video_id`,`date`),
  ADD KEY `fk_parrilla_has_video_video1_idx` (`video_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `peoples`
--
ALTER TABLE `peoples`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `people_in_movie`
--
ALTER TABLE `people_in_movie`
  ADD PRIMARY KEY (`persona_id`,`video_id`,`rol_id`),
  ADD KEY `fk_persona_has_video_video1_idx` (`video_id`),
  ADD KEY `fk_persona_has_video_persona1_idx` (`persona_id`),
  ADD KEY `fk_persona_en_video_rol1_idx` (`rol_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `student_in_subject`
--
ALTER TABLE `student_in_subject`
  ADD PRIMARY KEY (`asignatura_id`,`usuario_id`),
  ADD KEY `fk_alumno_en_asignatura_asignatura1_idx` (`asignatura_id`),
  ADD KEY `fk_alumno_en_asignatura_usuario1_idx` (`usuario_id`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_asignatura_usuario1_idx` (`profesor_id`);

--
-- Indices de la tabla `subtitles`
--
ALTER TABLE `subtitles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subtitulo_video1_idx` (`video_id`),
  ADD KEY `fk_subtitulo_trailer1_idx` (`trailer_id`);

--
-- Indices de la tabla `trailers`
--
ALTER TABLE `trailers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_trailer_video1_idx` (`video_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `subtitles`
--
ALTER TABLE `subtitles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `trailers`
--
ALTER TABLE `trailers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `category_in_movie`
--
ALTER TABLE `category_in_movie`
  ADD CONSTRAINT `fk_video_has_categoria_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_video_has_categoria_video1` FOREIGN KEY (`video_id`) REFERENCES `movies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `genre_in_movie`
--
ALTER TABLE `genre_in_movie`
  ADD CONSTRAINT `fk_genero_has_video_genero1` FOREIGN KEY (`genero_id`) REFERENCES `genres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_genero_has_video_video1` FOREIGN KEY (`video_id`) REFERENCES `movies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `fk_video_asignatura1` FOREIGN KEY (`asignatura_id`) REFERENCES `subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_video_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `movie_in_grill`
--
ALTER TABLE `movie_in_grill`
  ADD CONSTRAINT `fk_parrilla_has_video_video1` FOREIGN KEY (`video_id`) REFERENCES `movies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `people_in_movie`
--
ALTER TABLE `people_in_movie`
  ADD CONSTRAINT `fk_persona_en_video_rol1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_has_video_persona1` FOREIGN KEY (`persona_id`) REFERENCES `peoples` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_has_video_video1` FOREIGN KEY (`video_id`) REFERENCES `movies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `student_in_subject`
--
ALTER TABLE `student_in_subject`
  ADD CONSTRAINT `fk_alumno_en_asignatura_asignatura1` FOREIGN KEY (`asignatura_id`) REFERENCES `subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_en_asignatura_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `fk_asignatura_usuario1` FOREIGN KEY (`profesor_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subtitles`
--
ALTER TABLE `subtitles`
  ADD CONSTRAINT `fk_subtitulo_trailer1` FOREIGN KEY (`trailer_id`) REFERENCES `trailers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subtitulo_video1` FOREIGN KEY (`video_id`) REFERENCES `movies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `trailers`
--
ALTER TABLE `trailers`
  ADD CONSTRAINT `fk_trailer_video1` FOREIGN KEY (`video_id`) REFERENCES `movies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
