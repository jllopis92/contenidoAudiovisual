-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 30-10-2016 a las 19:23:48
-- Versión del servidor: 5.5.42
-- Versión de PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `contenidoAudiovisual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `advertising`
--

CREATE TABLE `advertising` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `advertising`
--

INSERT INTO `advertising` (`id`, `movie_id`, `name`, `description`, `priority`, `image`, `created_at`, `updated_at`) VALUES
(1, 82, 'nueva resolucion', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget pharetra dui. Proin id enim tempor, rutrum orci quis, mattis sem. Duis rutrum semper quam, quis molestie urna vulputate ut. Pellentesque quis velit et lacus vehicula luctus eget nec dolo', 1, '5010r1.jpg', NULL, NULL),
(2, 19, 'Blood in to wine', 'Documental Vino Caduceus', 2, '7watermark.png', NULL, NULL),
(3, 37, 'test subtitulo', 'test para probar si se agrega el subtitulo', 1, '49watermark.png', '2016-10-16 20:52:10', '2016-10-16 20:52:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `startdate` varchar(48) NOT NULL,
  `enddate` varchar(48) NOT NULL,
  `allDay` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calendar`
--

INSERT INTO `calendar` (`id`, `title`, `startdate`, `enddate`, `allDay`) VALUES
(1, 'Life of Pi', '2016-07-22T07:30:00+05:30', '2016-07-22T07:30:00+05:30', 'false'),
(2, 'blood in to wine', '2016-07-22T09:30:00+05:30', '2016-07-22T09:30:00+05:30', 'false');

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
('2016_07_03_172003_update_table_users', 3),
('2016_08_14_232852_create_ratings_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int(11) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `asignatura_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `observation` varchar(255) DEFAULT NULL,
  `visit` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `creation_date` date NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `imageRef` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `authorization_date` datetime DEFAULT NULL,
  `state` int(1) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `production_year` year(4) NOT NULL,
  `category` enum('largometraje','mediometraje','cortometraje') NOT NULL,
  `category2` enum('ficcion','experimental','animacion','documental') NOT NULL,
  `shooting_format` enum('4K','2K','HD','MiniDV','16mm','35mm') NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `usuario_id`, `asignatura_id`, `name`, `observation`, `visit`, `language`, `duration`, `creation_date`, `description`, `imageRef`, `url`, `authorization_date`, `state`, `rating`, `production_year`, `category`, `category2`, `shooting_format`, `direction`, `direction_assistant`, `casting`, `continuista`, `script`, `production`, `production_assistant`, `photografic_direction`, `camara`, `camara_assistant`, `art_direction`, `sonorous_register`, `mounting`, `image_postproduction`, `sound_postproduction`, `catering`, `music`, `actors`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 'Video mp4', NULL, 4, '', '0', '0000-00-00', '', '1637gridallbum1.jpg', '1645Video.mp4', NULL, 2, 2, 0000, '', '', 'MiniDV', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-07-08 05:39:18', '2016-10-21 03:28:42'),
(19, 1, 1, 'Blood in to wine', NULL, 2, '', '0', '0000-00-00', 'Documental Vino Caduceus', '7watermark.png', 'Blood Into Wine 2010 BRRip [A Release-Lounge H264].mp4', NULL, 0, 0, 0000, '', '', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-07-08 09:38:11', '2016-10-21 03:34:50'),
(23, 9, 1, 'Warcraft', NULL, 6, '', '0', '0000-00-00', '', NULL, 'Warcraft.2016.HC.HDRip.XViD.AC3-ETRG.mp4', NULL, 2, NULL, 0000, '', '', '4K', 'test direc', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-07-12 03:27:02', '2016-10-27 22:34:23'),
(27, 9, 1, 'Steve Jobs ', NULL, 3, '', '0', '0000-00-00', '', '48watermark.png', '48Test.mp4', NULL, 0, 3.5, 0000, '', '', 'HD', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-07-15 17:13:58', '2016-10-27 22:43:59'),
(32, 10, 1, 'Padres por desigual ', NULL, 0, '', '0', '0000-00-00', '', '3watermark.png', '4portrait.mp4', NULL, 3, NULL, 0000, '', '', '2K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-07-26 22:14:09', '2016-10-27 22:36:11'),
(33, 10, 1, 'Point break', NULL, 0, 'Español', '0', '0000-00-00', 'test para saber si se guardan los años', '47watermark.png', '47portrait.mp4', NULL, 3, NULL, 2013, '', '', 'HD', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-01 20:58:53', '2016-10-27 22:48:31'),
(34, 10, 1, 'test nueva funcion', NULL, 0, 'Español', '0', '0000-00-00', 'test para probar funcion store nueva', '7watermark.png', '8portrait.mp4', NULL, 2, NULL, 2016, '', '', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-01 22:19:13', '2016-08-11 17:34:46'),
(37, 10, 1, 'test subtitulo', NULL, 0, 'Español', '0', '0000-00-00', 'test para probar si se agrega el subtitulo', '49watermark.png', '49portrait.mp4', NULL, 2, NULL, 2016, '', '', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-01 22:47:52', '2016-08-17 16:47:12'),
(38, 10, 1, 'test trailer', NULL, 0, 'Español', '0', '0000-00-00', 'test para probar si se agrega el trailer', '35watermark.png', '35portrait.mp4', NULL, 3, NULL, 2016, '', '', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-02 01:02:40', '2016-08-02 01:02:40'),
(39, 10, 1, 'test trailer', NULL, 0, 'Español', '0', '0000-00-00', 'test para probar si se agrega el trailer', '3watermark.png', '3portrait.mp4', NULL, 0, NULL, 2016, '', '', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-02 01:44:09', '2016-08-02 01:44:09'),
(40, 10, 1, 'test trailer', NULL, 0, 'Español', '0', '0000-00-00', 'test para probar si se agrega el trailer', '5watermark.png', '6portrait.mp4', NULL, 0, NULL, 2016, '', '', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-02 01:55:09', '2016-08-02 01:55:09'),
(41, 10, 1, 'test duracion', NULL, 0, 'Español', '0', '0000-00-00', 'test para probar si se agrega la duración del video', '12watermark.png', '1231Test.mp4', NULL, 0, NULL, 2016, '', '', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-02 01:57:22', '2016-08-02 01:57:22'),
(42, 10, 1, 'test duracion', NULL, 0, 'Español', '00:00:29', '0000-00-00', 'test para probar si se agrega la duración del video a la bd', '25watermark.png', '2531Test.mp4', NULL, 0, NULL, 2016, '', '', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-02 01:59:35', '2016-08-02 01:59:35'),
(43, 10, 1, 'test ffmpeg trailer', NULL, 0, 'Español', '00:00:29', '0000-00-00', 'prueba de funcionamiento conversor de trailer y subtitulos trailer', '716watermark.png', '82531Test.mp4', NULL, 0, NULL, 2016, '', '', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-02 02:25:21', '2016-08-02 02:25:21'),
(44, 10, 1, 'test ffmpeg trailer', NULL, 0, 'Español', '00:00:29', '0000-00-00', 'prueba de funcionamiento conversor de trailer y subtitulos trailer', '4716watermark.png', '472531Test.mp4', NULL, 0, NULL, 2016, '', '', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-02 02:30:59', '2016-08-02 02:30:59'),
(45, 10, 1, 'test ffmpeg trailer', NULL, 0, 'Español', '00:00:29', '0000-00-00', 'prueba de funcionamiento conversor de trailer y subtitulos trailer', '3316watermark.png', '332531Test.mp4', NULL, 0, NULL, 2016, '', '', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-02 02:32:43', '2016-08-02 02:32:43'),
(46, 10, 1, 'El mundo abandonado', NULL, 0, 'Español', '00:00:29', '0000-00-00', 'prueba de funcionamiento conversor de trailer y subtitulos trailer', '316watermark.png', '32531Test.mp4', NULL, 0, 0, 2016, '', '', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-02 02:34:12', '2016-10-27 22:40:38'),
(47, 10, 1, 'Joy', NULL, 0, 'Español', '00:00:29', '0000-00-00', 'prueba de funcionamiento conversor de trailer y subtitulos trailer', '816watermark.png', '82531Test.mp4', NULL, 0, 0, 2016, '', '', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-02 02:35:18', '2016-10-27 22:44:19'),
(48, 9, 1, 'upload by alumno', NULL, 0, 'Español', '00:00:03', '0000-00-00', 'ver estado', '18023m4.jpg', '1824VideoTest.mp4', NULL, 0, NULL, 2016, '', '', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-11 17:10:28', '2016-08-11 17:10:28'),
(49, 10, 1, 'El gran museo', NULL, 0, 'Español', '00:00:29', '0000-00-00', 'ver estado', '381watermark.png', '384Test.mp4', NULL, 1, 2.5, 2016, '', '', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-11 17:10:49', '2016-08-11 17:10:49'),
(50, 10, 1, 'Legend', NULL, 0, 'Español', '00:00:03', '2014-10-10', 'Ver si las categorias funcionan correctamente', '27023m4.jpg', '275945VideoTest.mp4', NULL, 2, 4, 2016, 'mediometraje', 'ficcion', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-21 00:54:39', '2016-10-27 22:49:17'),
(51, 10, 1, 'Secretos de guerra', NULL, 0, 'Español', '', '0000-00-00', '', '1027023m4.jpg', '104082531Test.mp4', NULL, 1, NULL, 2016, 'largometraje', 'animacion', '4K', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-23 20:39:16', '2016-08-23 20:39:16'),
(53, 10, 2, 'El hijo de Saul ', NULL, 0, 'Español', '', '2001-10-12', 'sddsdf', '16gridallbum3.jpg', '169Test.mp4', NULL, 1, NULL, 2016, 'largometraje', 'animacion', '4K', 'director 1', '', '', '', 'guion1', 'produc', 'pro asis', '', 'cam', '', '', '', 'mont', 'posst img', 'post sound', '', '', 'act', '2016-08-24 07:50:26', '2016-08-24 07:50:26'),
(54, 10, 2, 'Bendita calamidad', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'sddsdf', '47gridallbum3.jpg', '479Test.mp4', NULL, 1, 4, 2016, 'largometraje', 'animacion', '4K', 'director 1', '', '', '', 'guion1', 'produc', 'pro asis', '', 'cam', '', '', '', 'mont', 'posst img', 'post sound', '', '', 'act', '2016-08-24 07:54:58', '2016-08-24 07:54:58'),
(55, 10, 1, 'Los odiosos ocho', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'verificar carpeta', '38645gridallbum7.jpg', '38472531Test.mp4', NULL, 1, NULL, 2016, 'largometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion', 'prod', 'asis', '', 'cam', '', '', '', 'mon', 'img', 'son', '', '', 'act', '2016-08-29 18:08:48', '2016-08-29 18:08:48'),
(56, 10, 1, 'prueba imagenes', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'ver resolucion', '501445r3.jpg', '519Test.mp4', NULL, 1, NULL, 2009, 'largometraje', 'ficcion', '4K', 'dir', '', '', '', 'guion1', 'produc', 'asis prod', 'dir foto', 'cam', 'asis camara', '', '', 'montaje', 'post prod img', 'son', '', '', 'actores', '2016-09-07 21:51:00', '2016-09-07 21:51:00'),
(57, 10, 1, 'prueba imagenes', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'ver resolucion', '261445r3.jpg', '269Test.mp4', NULL, 1, NULL, 2009, 'largometraje', 'ficcion', '4K', 'dir', '', '', '', 'guion1', 'produc', 'asis prod', 'dir foto', 'cam', 'asis camara', '', '', 'montaje', 'post prod img', 'son', '', '', 'actores', '2016-09-07 21:54:35', '2016-09-07 21:54:35'),
(58, 10, 1, 'prueba imagenes', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'ver resolucion', '501445r3.jpg', '509Test.mp4', NULL, 1, NULL, 2009, 'largometraje', 'ficcion', '4K', 'dir', '', '', '', 'guion1', 'produc', 'asis prod', 'dir foto', 'cam', 'asis camara', '', '', 'montaje', 'post prod img', 'son', '', '', 'actores', '2016-09-07 21:55:57', '2016-09-07 21:55:57'),
(59, 10, 1, 'prueba imagenes', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'ver resolucion', '581445r3.jpg', '589Test.mp4', NULL, 1, NULL, 2009, 'largometraje', 'ficcion', '4K', 'dir', '', '', '', 'guion1', 'produc', 'asis prod', 'dir foto', 'cam', 'asis camara', '', '', 'montaje', 'post prod img', 'son', '', '', 'actores', '2016-09-07 22:03:08', '2016-09-07 22:03:08'),
(60, 10, 1, 'prueba imagenes', NULL, 0, 'Español', '00:00:02', '2001-10-12', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget pharetra dui. Proin id enim tempor, rutrum orci quis, mattis sem. Duis rutrum semper quam, quis molestie urna vulputate ut. Pellentesque quis velit et lacus vehicula luctus eget nec dolo', '31023m4.jpg', '3111portrait.mp4', NULL, 1, NULL, 2009, 'largometraje', 'ficcion', '4K', 'dir', '', '', '', 'guion1', 'produc', 'asis prod', 'dir foto', 'cam', 'asis camara', '', '', 'montaje', 'post prod img', 'son', '', '', 'actores', '2016-09-07 22:04:34', '2016-09-07 22:04:34'),
(61, 10, 1, 'test notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asdasd', '2610r1.jpg', '269Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'experimental', '4K', 'direccion', '', '', '', 'guion', 'produccion', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 17:13:35', '2016-09-09 17:13:35'),
(62, 10, 1, 'test notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asdasd', '5310r1.jpg', '539Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'experimental', '4K', 'direccion', '', '', '', 'guion', 'produccion', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 17:13:59', '2016-09-09 17:13:59'),
(63, 10, 1, 'test notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asdasd', '3710r1.jpg', '379Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'experimental', '4K', 'direccion', '', '', '', 'guion', 'produccion', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 17:16:44', '2016-09-09 17:16:44'),
(64, 10, 1, 'test notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asdasd', '5210r1.jpg', '539Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'experimental', '4K', 'direccion', '', '', '', 'guion', 'produccion', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 17:19:00', '2016-09-09 17:19:00'),
(65, 10, 1, 'test notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asdasd', '310r1.jpg', '39Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'experimental', '4K', 'direccion', '', '', '', 'guion', 'produccion', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 17:20:10', '2016-09-09 17:20:10'),
(66, 10, 1, 'notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asasdasd', '710r1.jpg', '74Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion1', 'produc', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 17:26:13', '2016-09-09 17:26:13'),
(67, 10, 1, 'notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asasdasd', '4510r1.jpg', '454Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion1', 'produc', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 17:35:53', '2016-09-09 17:35:53'),
(68, 10, 1, 'notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asasdasd', '3010r1.jpg', '304Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion1', 'produc', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 17:37:38', '2016-09-09 17:37:38'),
(69, 10, 1, 'notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asasdasd', '1910r1.jpg', '194Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion1', 'produc', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 17:38:26', '2016-09-09 17:38:26'),
(70, 10, 1, 'notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asasdasd', '4310r1.jpg', '434Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion1', 'produc', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 17:38:49', '2016-09-09 17:38:49'),
(71, 10, 1, 'notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asasdasd', '4910r1.jpg', '494Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion1', 'produc', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 17:42:58', '2016-09-09 17:42:58'),
(72, 10, 1, 'notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asasdasd', '1410r1.jpg', '144Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion1', 'produc', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 17:43:21', '2016-09-09 17:43:21'),
(73, 10, 1, 'notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asasdasd', '1510r1.jpg', '154Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion1', 'produc', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 18:04:25', '2016-09-09 18:04:25'),
(74, 10, 1, 'notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asasdasd', '210r1.jpg', '24Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion1', 'produc', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 18:05:09', '2016-09-09 18:05:09'),
(75, 10, 1, 'notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asasdasd', '110r1.jpg', '14Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion1', 'produc', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 18:06:08', '2016-09-09 18:06:08'),
(76, 10, 1, 'notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asasdasd', '3710r1.jpg', '374Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion1', 'produc', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 18:06:44', '2016-09-09 18:06:44'),
(77, 10, 1, 'notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asasdasd', '1110r1.jpg', '114Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion1', 'produc', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 18:08:18', '2016-09-09 18:08:18'),
(78, 10, 1, 'notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asasdasd', '5610r1.jpg', '564Test.mp4', NULL, 1, NULL, 2016, 'mediometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion1', 'produc', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 18:10:03', '2016-09-09 18:10:03'),
(79, 10, 1, 'notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asasdasd', '1010r1.jpg', '104Test.mp4', NULL, 2, NULL, 2016, 'mediometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion1', 'produc', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 18:11:16', '2016-09-09 18:11:16'),
(80, 10, 1, 'notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asasdasd', '1210r1.jpg', '124Test.mp4', NULL, 2, NULL, 2016, 'mediometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion1', 'produc', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 18:12:19', '2016-09-09 18:12:19'),
(81, 10, 1, 'notif', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'asasdasd', '1110r1.jpg', '114Test.mp4', NULL, 2, NULL, 2016, 'mediometraje', 'animacion', '4K', 'direccion', '', '', '', 'guion1', 'produc', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-09 18:14:18', '2016-09-09 18:14:18'),
(82, 10, 1, 'nueva resolucion', NULL, 0, 'Español', '00:00:29', '2001-10-12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget pharetra dui. Proin id enim tempor, rutrum orci quis, mattis sem. Duis rutrum semper quam, quis molestie urna vulputate ut. Pellentesque quis velit et lacus vehicula luctus eget nec dolor', '5010r1.jpg', '5113Test.mp4', NULL, 2, NULL, 2016, 'largometraje', 'experimental', '4K', 'direccion', '', '', '', 'guion', 'produccion', 'asis prod', '', 'camara', '', '', '', 'montaje', 'post prod img', 'post sound', '', '', 'actores', '2016-09-12 02:20:01', '2016-09-12 02:20:01');

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
-- Estructura de tabla para la tabla `movie_in_playlist`
--

CREATE TABLE `movie_in_playlist` (
  `id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movie_in_playlist`
--

INSERT INTO `movie_in_playlist` (`id`, `playlist_id`, `movie_id`, `name`, `url`, `duration`, `state`, `created_at`, `updated_at`) VALUES
(1, 16, 6, 'Video MP4', '1645Video.mp4', '0', 0, '2016-09-02 03:11:38', '2016-09-02 03:11:38'),
(2, 16, 23, 'Warcraft', 'Warcraft.2016.HC.HDRip.XViD.AC3-ETRG.mp4', '0', 0, '2016-09-02 03:11:38', '2016-09-02 03:11:38'),
(3, 16, 32, 'portrait', '4portrait.mp4', '0', 0, '2016-09-02 03:11:38', '2016-09-02 03:11:38'),
(4, 17, 54, 'Test1', '479Test.mp4', '00:00:29', 0, '2016-09-02 04:21:32', '2016-09-02 04:21:32'),
(5, 18, 54, 'Test2', '479Test.mp4', '00:00:29', 0, '2016-09-02 05:18:28', '2016-09-02 05:18:28'),
(6, 19, 42, 'Test3', '2531Test.mp4', '00:00:29', 0, '2016-09-02 05:22:42', '2016-09-02 05:22:42'),
(7, 19, 44, 'Test4', '472531Test.mp4', '00:00:29', 0, '2016-09-02 05:22:42', '2016-09-02 05:22:42'),
(8, 19, 48, 'Test5', '1824VideoTest.mp4', '00:00:03', 0, '2016-09-02 05:22:42', '2016-09-02 05:22:42'),
(9, 20, 62, '', '539Test.mp4', '00:00:29', 1, '2016-09-12 20:29:17', '2016-09-12 20:29:17'),
(10, 20, 63, '', '379Test.mp4', '00:00:29', 1, '2016-09-12 20:29:17', '2016-09-12 20:29:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `send_to` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notifications`
--

INSERT INTO `notifications` (`id`, `send_to`, `user_id`, `movie_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 81, '2016-09-09 18:14:18', '2016-09-09 18:14:18'),
(2, 10, NULL, 81, '2016-09-09 18:14:18', '2016-09-09 18:14:18'),
(3, 1, 15, NULL, '2016-09-09 18:25:22', '2016-09-09 18:25:22'),
(4, 10, 15, NULL, '2016-09-09 18:25:22', '2016-09-09 18:25:22'),
(5, 1, NULL, 82, '2016-09-12 02:20:02', '2016-09-12 02:20:02'),
(6, 10, NULL, 82, '2016-09-12 02:20:02', '2016-09-12 02:20:02');

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
-- Estructura de tabla para la tabla `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `duration`, `state`, `created_at`, `updated_at`) VALUES
(6, 'playlist 1', '', 0, '2016-09-02 02:41:08', '2016-09-02 02:41:08'),
(7, 'playlist 2', '', 0, '2016-09-02 02:42:30', '2016-09-02 02:42:30'),
(8, 'playlist 3', '', 0, '2016-09-02 02:47:42', '2016-09-02 02:47:42'),
(9, 'playlist 4', '', 0, '2016-09-02 02:48:03', '2016-09-02 02:48:03'),
(10, 'playlist 4', '', 0, '2016-09-02 02:50:58', '2016-09-02 02:50:58'),
(11, 'playlist 5', '', 0, '2016-09-02 02:51:20', '2016-09-02 02:51:20'),
(12, 'playlist 6', '', 0, '2016-09-02 02:55:36', '2016-09-02 02:55:36'),
(13, 'playlist 7', '', 0, '2016-09-02 02:57:41', '2016-09-02 02:57:41'),
(14, 'playlist 8', '', 0, '2016-09-02 02:58:22', '2016-09-02 02:58:22'),
(15, 'pl1', '', 0, '2016-09-02 02:59:37', '2016-09-02 02:59:37'),
(16, 'pl2', '', 0, '2016-09-02 03:11:38', '2016-09-02 03:11:38'),
(17, 'play', '', 0, '2016-09-02 04:21:32', '2016-09-02 04:21:32'),
(18, 'playli', '', 0, '2016-09-02 05:18:28', '2016-09-02 05:18:28'),
(19, 'playlist funcional', '00:01:01', 0, '2016-09-02 05:22:42', '2016-09-02 05:22:42'),
(20, 'lista 4', '00:00:58', 1, '2016-09-12 20:29:16', '2016-09-12 20:29:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `rateable_id` int(10) unsigned NOT NULL,
  `rateable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subtitles`
--

INSERT INTO `subtitles` (`id`, `video_id`, `trailer_id`, `language`, `url`, `created_at`, `updated_at`) VALUES
(1, 37, NULL, '', '53Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa', '2016-08-01 22:47:53', '2016-08-01 22:47:53'),
(2, 38, NULL, '', '41Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa', '2016-08-02 01:02:41', '2016-08-02 01:02:41'),
(3, 39, NULL, '', '10Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa', '2016-08-02 01:44:10', '2016-08-02 01:44:10'),
(4, 40, NULL, '', '9Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa', '2016-08-02 01:55:10', '2016-08-02 01:55:10'),
(5, 41, NULL, '', '22Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa', '2016-08-02 01:57:22', '2016-08-02 01:57:22'),
(6, 42, NULL, '', '35Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa', '2016-08-02 01:59:35', '2016-08-02 01:59:35'),
(7, NULL, 5, '', '2022Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa', '2016-08-02 02:35:20', '2016-08-02 02:35:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(11) NOT NULL,
  `rate` float DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_rating`
--

INSERT INTO `tbl_rating` (`id`, `rate`, `user_id`, `movie_id`) VALUES
(13, 4, 10, 50),
(14, 4, 10, 49),
(15, 1, 9, 49),
(16, 3.5, 9, 27),
(17, 4, 10, 54),
(18, 2, 10, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trailers`
--

CREATE TABLE `trailers` (
  `id` int(10) unsigned NOT NULL,
  `video_id` int(10) unsigned NOT NULL,
  `duration` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trailers`
--

INSERT INTO `trailers` (`id`, `video_id`, `duration`, `url`, `created_at`, `updated_at`) VALUES
(1, 38, '0', '41convert7portrait.mp4', '2016-08-02 01:02:41', '2016-08-02 01:02:41'),
(2, 40, '0', '10convert7portrait.mp4', '2016-08-02 01:55:10', '2016-08-02 01:55:10'),
(3, 41, '0', '22convert7portrait.mp4', '2016-08-02 01:57:22', '2016-08-02 01:57:22'),
(4, 42, '', '35convert7portrait.mp4', '2016-08-02 01:59:35', '2016-08-02 01:59:35'),
(5, 47, '00:00:02', '1816portrait.mp4', '2016-08-02 02:35:20', '2016-08-02 02:35:20'),
(6, 50, '00:00:29', '4082531Test.mp4', '2016-08-21 00:54:49', '2016-08-21 00:54:49'),
(7, 53, '00:00:03', '2724VideoTest.mp4', '2016-08-24 07:50:33', '2016-08-24 07:50:33'),
(8, 54, '00:00:03', '5824VideoTest.mp4', '2016-08-24 07:55:02', '2016-08-24 07:55:02'),
(9, 55, '00:00:29', '4919Test.mp4', '2016-08-29 18:08:57', '2016-08-29 18:08:57'),
(10, 56, '00:00:29', '033Test.mp4', '2016-09-07 21:51:08', '2016-09-07 21:51:08'),
(11, 57, '00:00:29', '3533Test.mp4', '2016-09-07 21:54:41', '2016-09-07 21:54:41'),
(12, 58, '00:00:29', '5733Test.mp4', '2016-09-07 21:56:04', '2016-09-07 21:56:04'),
(13, 59, '00:00:29', '833Test.mp4', '2016-09-07 22:03:15', '2016-09-07 22:03:15'),
(14, 60, '00:00:29', '3433Test.mp4', '2016-09-07 22:04:41', '2016-09-07 22:04:41'),
(15, 63, '00:00:02', '4411portrait.mp4', '2016-09-09 17:16:45', '2016-09-09 17:16:45'),
(16, 64, '00:00:02', '011portrait.mp4', '2016-09-09 17:19:01', '2016-09-09 17:19:01'),
(17, 65, '00:00:02', '1011portrait.mp4', '2016-09-09 17:20:11', '2016-09-09 17:20:11'),
(18, 66, '00:00:02', '1311portrait.mp4', '2016-09-09 17:26:14', '2016-09-09 17:26:14'),
(19, 67, '00:00:02', '5311portrait.mp4', '2016-09-09 17:35:54', '2016-09-09 17:35:54'),
(20, 68, '00:00:02', '3811portrait.mp4', '2016-09-09 17:37:39', '2016-09-09 17:37:39'),
(21, 72, '00:00:02', '2211portrait.mp4', '2016-09-09 17:43:23', '2016-09-09 17:43:23'),
(22, 77, '00:00:02', '1811portrait.mp4', '2016-09-09 18:08:19', '2016-09-09 18:08:19'),
(23, 78, '00:00:02', '311portrait.mp4', '2016-09-09 18:10:04', '2016-09-09 18:10:04'),
(24, 79, '00:00:02', '1711portrait.mp4', '2016-09-09 18:11:18', '2016-09-09 18:11:18'),
(25, 81, '00:00:02', '1811portrait.mp4', '2016-09-09 18:14:19', '2016-09-09 18:14:19'),
(26, 82, '00:00:02', '211portrait.mp4', '2016-09-12 02:20:03', '2016-09-12 02:20:03');

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
  `tipo` enum('profesor','alumno','administrador','adminParrilla','externo') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `birthday`, `zone`, `country`, `region`, `city`, `sector`, `tipo`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'root', 'root@root.cl', '', '2010-02-02', '', '', '', '', '', 'profesor', 'CTy4tDJtW9MCylZJEzkYHTKz1LUBZRgcv2lCFVOVkwnSXfPmX1DpbuvgZmkx', '2016-07-03 08:22:11', '2016-07-04 02:43:32', NULL),
(3, 'usuario2', 'usuario2@usuario2.cl', '$2y$10$6LNhH3pbeIMcicB4fbG93.1ZbCJTg3/iDnPC1dzV8KdxuVM/KGycK', '0000-00-00', '', 'Argentina', '', 'Cordoba', '', 'profesor', 'Cl0mLjw4RuN0YQFPLn9DsIBxxN6Lx0ZZET13GMETamzpvVI7Fzx2gPbqL1sY', '2016-07-03 21:26:55', '2016-07-04 01:27:04', '2016-07-04 01:27:04'),
(6, 'usuario5', 'usuario5@usuario5.cl', '$2y$10$qQKWEjCf0hI1ECwCmoce7Ofv7UdpmDrHX1o1gxW8jTle5GMpy0cGe', '2016-06-07', 'Sudamérica', 'Chile', 'Valparaiso', '', '', 'externo', 'gwgQErfurYUngzFxvrakiKL0Ecv5cSndll4OhD2WulzOXGwQsJzUHsT9akDy', '2016-07-04 00:07:38', '2016-07-12 02:53:03', NULL),
(7, 'profesor1', 'profesor1@profesor1.cl', '$2y$10$za4AgCmXu3eG5ldvG2Cblu1.6gefbmfs8pfYpzgLin77vPRHsTv2e', '1980-07-02', 'Sudamérica', 'Chile', 'Valparaiso', '', '', 'externo', 'Hidf37X21n3euhWv4awOZr5DuToe8u4EcR08gETrhJcC0sppNxqDFt9FiopB', '2016-07-04 04:30:50', '2016-07-04 04:30:58', NULL),
(8, 'profesor2', 'profesor2@profesor2.cl', '$2y$10$VKyUMLuG5e5n7ki3mxncHOtid4reEhNfxJYlY/Zf1cOFZ3RMpDWO.', '1970-07-01', 'Sudamérica', 'Chile', 'Valparaiso', '', '', 'externo', NULL, '2016-07-04 04:32:55', '2016-07-04 04:32:55', NULL),
(9, 'pass123456', 'alumno@alumno.cl', '$2y$10$ghkuAE56/Fhabuq3vgeAzej144HRe8qbdM.Yw7ifUc7JywSB7dA6G', '1990-10-10', 'Sudamérica', 'Chile', 'Santiago', '', '', 'alumno', '14aszNW2K7kvAqq3SkOdVFOTCeBckpV5nBj8oKSpelOHlR4MEyK1aMgT3FUF', '2016-07-12 02:46:31', '2016-10-01 22:34:25', NULL),
(10, 'password123456', 'profesor@profesor.cl', '$2y$10$eFtS7lDhkqipeFwjVoPEZ.K1LVw4XJaTh0Uy7I111hG9sxvCQXcR6', '1989-10-10', 'Sudamérica', 'Chile', 'Atacama', '', '', 'profesor', 'idPLdtqhzlf1JQdjYI7lC2sOtTzcBIiZ9OM0uscMwdE3Tevp6RL05J1ZTUWb', '2016-07-18 02:43:17', '2016-10-01 22:32:36', NULL),
(11, 'asd', 'asd@asd.cl', '$2y$10$nmHySruPxz/pdIEeSHaUaOa72j1ObALYq.aowuaPhtLna/by8DEXC', '1990-10-10', 'Sudamérica', 'Chile', 'RM Santiago', '', '', 'externo', 'w0wukx6CQndMEvsHMcHMuFwTK453FuBGQZtTcBqYNep9N3enjHnx5dXQzLJb', '2016-08-24 18:37:17', '2016-08-24 18:37:24', NULL),
(12, 'test', 'asd@aqweqwe.cl', '$2y$10$1LunLKLU2rMFFI2brv5QK.0wgaL7poGPzsg4rG2dkNwbP/wVV5cSa', '2000-12-12', 'Sudamérica', 'Argentina', 'Catamarca', '', '', 'externo', NULL, '2016-08-24 18:38:35', '2016-08-24 18:38:35', NULL),
(13, 'admin', 'admin@admin.cl', '$2y$10$3USQJ0BwZ68SM0R0EHLUDu2Ww5DmKTZsTcKRY4HMcCjv/aFrMK7f6', '1990-10-11', 'Sudamérica', 'Chile', 'V Valparaíso', '', '', 'adminParrilla', 'OUqKP62cDCdmSlI49SHXaspUWwSFAGuQXWHMuxInja4EEDUMttiWOn4xbGgv', '2016-09-02 17:08:43', '2016-09-02 17:11:20', NULL),
(14, 'test notif', 'notif@notif.cl', '$2y$10$5I890faA2tGNfs5AwHDo..UeqjML4VKCdO3NqTur6AtoXlFRVibwK', '1999-11-10', 'Sudamérica', 'Chile', 'V Valparaíso', '', '', 'externo', NULL, '2016-09-09 18:22:29', '2016-09-09 18:22:29', NULL),
(15, 'asdasdasd', 'asdas@asdas.cl', '$2y$10$WnQeh6joyxt6nF7EXX1HQu6Jm855DktlKcbsWZ9/qlTnk3hkLTVI6', '1989-10-10', 'Sudamérica', 'Chile', 'RM Santiago', '', '', 'externo', NULL, '2016-09-09 18:25:22', '2016-09-09 18:25:22', NULL),
(16, 'now', 'now@now.cl', '$2y$10$YbM8BSc126ZNcTpb/QscyenScVz9XsdjGfjyE5p3y2KQA1IItydRS', '1970-11-11', 'Sudamérica', 'Argentina', 'Buenos Aires', '', '', 'externo', NULL, '2016-09-09 19:09:45', '2016-09-09 19:09:45', NULL),
(17, 'usuario misma pass', 'usuario@usuario.cl', '$2y$10$NrD0R9Ai4wOoWc5xmvCA7ez/VhNFWoi2nJGj5Ax3DQzWu9B/dZlbq', '2000-12-12', 'Sudamérica', 'Chile', 'RM Santiago', '', '', 'externo', '0rqEwwHgvVkuMDxDSZJmaQFL69XgQmi2zlNFQ5pxH7ESkuNC7rKKbPAJSE16', '2016-10-01 22:35:22', '2016-10-01 22:36:10', NULL),
(18, 'administrador parrilla misma pass', 'adminparrilla@adminparrilla.cl', '$2y$10$clY5XdFw954o.t6Yybdtje3S2Jaqqz43LVHaS8JX3eDIWja4sEvQ.', '2000-12-12', 'Sudamérica', 'Chile', 'IX Araucanía', '', '', 'adminParrilla', NULL, '2016-10-01 22:36:50', '2016-10-01 22:36:50', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `advertising`
--
ALTER TABLE `advertising`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
-- Indices de la tabla `movie_in_playlist`
--
ALTER TABLE `movie_in_playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_rateable_id_rateable_type_index` (`rateable_id`,`rateable_type`),
  ADD KEY `ratings_user_id_index` (`user_id`),
  ADD KEY `ratings_rateable_id_index` (`rateable_id`),
  ADD KEY `ratings_rateable_type_index` (`rateable_type`);

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
-- Indices de la tabla `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `advertising`
--
ALTER TABLE `advertising`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT de la tabla `movie_in_playlist`
--
ALTER TABLE `movie_in_playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `subtitles`
--
ALTER TABLE `subtitles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `trailers`
--
ALTER TABLE `trailers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
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
-- Filtros para la tabla `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
