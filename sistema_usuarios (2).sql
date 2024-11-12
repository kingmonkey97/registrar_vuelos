-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2024 a las 20:51:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`, `created_at`) VALUES
(0, 0, 0, 'buendia\r\n', '2024-11-07 13:35:01'),
(0, 0, 0, 'frg', '2024-11-07 13:35:18'),
(0, 0, 0, 'ffr', '2024-11-07 13:35:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compania`
--

CREATE TABLE `compania` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `edad` int(11) DEFAULT NULL CHECK (`edad` >= 1 and `edad` <= 90),
  `fecha` date NOT NULL,
  `VIP` enum('si','no') NOT NULL,
  `provincia` varchar(255) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compania`
--

INSERT INTO `compania` (`id`, `nombre`, `direccion`, `edad`, `fecha`, `VIP`, `provincia`, `usuario_id`, `fecha_creacion`) VALUES
(0, 'YEAN CARLOS DELGADO RIVAS', 'CALLE 24 #2 B BIS-25', 38, '2024-11-22', 'si', 'Bilbao', 0, '2024-11-07 13:14:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`) VALUES
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `created_at`) VALUES
(0, 0, 'holo', '2024-11-07 13:33:48'),
(0, 0, 'holo', '2024-11-07 13:34:15'),
(0, 0, 'holo\r\n', '2024-11-07 13:44:45'),
(0, 0, 'rrrrrrrrrrrrr', '2024-11-07 13:45:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `id` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`id`, `contenido`, `usuario_id`, `fecha`) VALUES
(0, 'holo', 0, '2024-11-07 13:37:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `password`, `fecha_creacion`) VALUES
(0, 'holo', '$2y$10$OVLSs/Nhw73ATvfZVKiDkeR/C88KBq5zcjO/lRF9oVXy0BGfBPGTO', '2024-11-07 13:33:05'),
(0, 'holl', '$2y$10$6eVnspXjUiQTb8L9.qicr..4iaZ1.LqQfnZ/l1NF4gNYZVxStCQBC', '2024-11-07 13:47:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
