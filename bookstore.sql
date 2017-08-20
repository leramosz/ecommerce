-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-08-2017 a las 06:29:35
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bookstore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `author`
--

CREATE TABLE `author` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `biography` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `author`
--

INSERT INTO `author` (`id`, `name`, `biography`, `image`, `featured`) VALUES
(1, 'Peter V. Brett', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '/assets/images/authors/1.jpg', 1),
(2, 'Robin Hobb', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '/assets/images/authors/1.jpg', 0),
(3, 'Sthephen King', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '/assets/images/authors/1.jpg', 1),
(4, 'Neil Gaiman', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '/assets/images/authors/1.jpg', 0),
(5, 'Charlaine Harris', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '/assets/images/authors/2.jpg', 0),
(6, 'Jose Perez', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '/assets/images/authors/1.jpg', 0),
(7, 'Paulo Coelho', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '/assets/images/authors/1.jpg', 0),
(8, 'Alex Flinn', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '/assets/images/authors/1.jpg', 0),
(9, 'Glenn Beck', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '/assets/images/authors/1.jpg', 1),
(10, 'Madonna', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '/assets/images/authors/2.jpg', 0),
(11, 'Guy Kawasaki', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '/assets/images/authors/1.jpg', 1),
(12, 'E. M. Brent-dyer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '/assets/images/authors/1.jpg', 0),
(13, 'Stephenie Meyer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '/assets/images/authors/2.jpg', 1),
(14, 'Sthephen Hawking', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '/assets/images/authors/1.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

CREATE TABLE `book` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `overview` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `sale_off` float UNSIGNED DEFAULT NULL,
  `hot` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `highlighted` tinyint(1) NOT NULL DEFAULT '0',
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `best_seller` tinyint(1) NOT NULL DEFAULT '0',
  `rating` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`id`, `author_id`, `name`, `overview`, `price`, `sale_off`, `hot`, `image`, `highlighted`, `new`, `best_seller`, `rating`) VALUES
(1, 8, 'Beastly', 'Beastly is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 18.65, NULL, 1, '/assets/images/books/1.jpg', 0, 1, 0, 5),
(2, 9, 'The Overton Window', 'The Overton Window is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 14.99, NULL, 0, '/assets/images/books/2.jpg', 1, 1, 0, 4),
(3, 10, 'Madonna Rain', 'Madonna Rain is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 30.15, NULL, 0, '/assets/images/books/3.jpg', 0, 1, 0, 4),
(4, 6, 'The Hunter', 'The Hunter is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 6.95, 3.5, 0, '/assets/images/books/4.jpg', 0, 1, 0, 1),
(5, 11, 'Enchantment', 'Enchantment is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 20.45, NULL, 0, '/assets/images/books/5.jpg', 1, 0, 0, 3),
(6, 14, 'The Grand Design', 'The Grand Design is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 22.5, NULL, 0, '/assets/images/books/6.jpg', 0, 1, 0, 5),
(7, 12, 'The Chalet School Reunion', 'The Chalet School Reunion is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 10.5, NULL, 0, '/assets/images/books/7.jpg', 1, 0, 0, 2),
(8, 13, 'The Host', 'The Host is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 50.25, NULL, 0, '/assets/images/books/8.jpg', 0, 1, 0, 5),
(9, 6, 'Lost Angel', 'Lost Angel is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 24.45, NULL, 1, '/assets/images/books/9.jpg', 0, 0, 1, 4),
(10, 1, 'The Core: a Final Descent into Darkness', 'The Core: a Final Descent into Darkness is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 45.8, NULL, 0, '/assets/images/books/10.jpg', 0, 0, 1, 4),
(11, 2, 'Assassin\'s Fate', 'Assassin\'s Fate is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 37.45, NULL, 0, '/assets/images/books/11.jpg', 0, 0, 1, 5),
(12, 3, 'The Dark Tower I: The Gunslinger', 'The Dark Tower I: The Gunslinger is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 34.7, NULL, 1, '/assets/images/books/12.jpg', 0, 0, 1, 5),
(13, 4, 'The Ocean at the End of the Lane: A Novel', 'The Ocean at the End of the Lane: A Novel is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 34.99, NULL, 0, '/assets/images/books/13.jpg', 0, 0, 1, 4),
(14, 5, 'Day Shift (A Novel of Midnight, Texas)', 'Day Shift (A Novel of Midnight, Texas) is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 35.5, 25.5, 0, '/assets/images/books/14.jpg', 0, 0, 1, 5),
(15, 3, 'The Shining', 'The Shining is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 45.6, NULL, 0, '/assets/images/books/15.jpg', 0, 0, 0, 5),
(16, 3, 'The Stand', 'The Stand is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 50.99, NULL, 0, '/assets/images/books/16.jpg', 0, 0, 0, 5),
(17, 3, 'IT: a Novel', 'ThIT: a Novel is lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim', 69.9, NULL, 1, '/assets/images/books/17.jpg', 1, 0, 0, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book_genre`
--

CREATE TABLE `book_genre` (
  `book_id` int(10) UNSIGNED NOT NULL,
  `genre_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `book_genre`
--

INSERT INTO `book_genre` (`book_id`, `genre_id`) VALUES
(1, 1),
(2, 4),
(3, 5),
(4, 1),
(5, 6),
(6, 7),
(7, 8),
(8, 1),
(9, 3),
(10, 1),
(11, 1),
(12, 2),
(13, 2),
(14, 3),
(15, 2),
(16, 2),
(17, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book_related`
--

CREATE TABLE `book_related` (
  `book_id` int(10) UNSIGNED NOT NULL,
  `book_related_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `book_related`
--

INSERT INTO `book_related` (`book_id`, `book_related_id`) VALUES
(1, 4),
(1, 8),
(1, 10),
(1, 11),
(12, 15),
(12, 16),
(15, 12),
(15, 16),
(16, 12),
(16, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genre`
--

CREATE TABLE `genre` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Fantasy'),
(2, 'Horror'),
(3, 'Mystery'),
(4, 'Thriller'),
(5, 'Music'),
(6, 'Business'),
(7, 'Science'),
(8, 'Adventures');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchase`
--

CREATE TABLE `purchase` (
  `id` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `total` float UNSIGNED NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `purchase`
--

INSERT INTO `purchase` (`id`, `total`, `time`) VALUES
('ORDER-5998e94111df5', 67.45, '2017-08-20 01:43:29'),
('ORDER-5998ea7d8cc68', 196.6, '2017-08-20 01:48:45'),
('ORDER-5998eb1e1975f', 142.33, '2017-08-20 01:51:26'),
('ORDER-59990328a54e4', 18.65, '2017-08-20 03:34:00'),
('ORDER-5999044109ff1', 99.15, '2017-08-20 03:38:41'),
('ORDER-59990829f236e', 30.15, '2017-08-20 03:55:21'),
('ORDER-599908df87ba3', 33.64, '2017-08-20 03:58:23'),
('ORDER-59990a544908b', 125.9, '2017-08-20 04:04:36'),
('ORDER-59990b0e7075d', 52.44, '2017-08-20 04:07:42'),
('ORDER-59990bc06c593', 158, '2017-08-20 04:10:40'),
('ORDER-59990be0e130a', 7, '2017-08-20 04:11:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `purchase_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `purchase_detail`
--

INSERT INTO `purchase_detail` (`purchase_id`, `user_id`, `book_id`, `quantity`, `subtotal`) VALUES
('ORDER-5998e94111df5', 1, 1, 2, 37.3),
('ORDER-5998e94111df5', 1, 3, 1, 30.15),
('ORDER-5998ea7d8cc68', 1, 1, 1, 18.65),
('ORDER-5998ea7d8cc68', 1, 9, 2, 48.9),
('ORDER-5998ea7d8cc68', 1, 10, 2, 91.6),
('ORDER-5998ea7d8cc68', 1, 11, 1, 37.45),
('ORDER-5998eb1e1975f', 2, 2, 2, 29.98),
('ORDER-5998eb1e1975f', 2, 11, 3, 112.35),
('ORDER-59990328a54e4', 1, 1, 1, 18.65),
('ORDER-5999044109ff1', 2, 1, 1, 18.65),
('ORDER-5999044109ff1', 2, 10, 1, 45.8),
('ORDER-5999044109ff1', 2, 12, 1, 34.7),
('ORDER-59990829f236e', 1, 3, 1, 30.15),
('ORDER-599908df87ba3', 1, 1, 1, 18.65),
('ORDER-599908df87ba3', 1, 2, 1, 14.99),
('ORDER-59990a544908b', 1, 11, 2, 74.9),
('ORDER-59990a544908b', 1, 14, 2, 51),
('ORDER-59990b0e7075d', 1, 2, 1, 14.99),
('ORDER-59990b0e7075d', 1, 11, 1, 37.45),
('ORDER-59990bc06c593', 1, 1, 2, 37.3),
('ORDER-59990bc06c593', 1, 10, 1, 45.8),
('ORDER-59990bc06c593', 1, 11, 2, 74.9),
('ORDER-59990be0e130a', 1, 4, 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `mail`, `username`, `password`) VALUES
(1, 'Leo Ramos', 'leo@gmail.com', 'leo', '12345'),
(2, 'test', 'test@gmail.com', 'test', '11111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlist`
--

CREATE TABLE `wishlist` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `wishlist`
--

INSERT INTO `wishlist` (`user_id`, `book_id`) VALUES
(1, 3),
(1, 4),
(1, 5),
(1, 11),
(1, 14);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `book_genre`
--
ALTER TABLE `book_genre`
  ADD PRIMARY KEY (`book_id`,`genre_id`);

--
-- Indices de la tabla `book_related`
--
ALTER TABLE `book_related`
  ADD PRIMARY KEY (`book_id`,`book_related_id`);

--
-- Indices de la tabla `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`purchase_id`,`user_id`,`book_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`user_id`,`book_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `author`
--
ALTER TABLE `author`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `book`
--
ALTER TABLE `book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
