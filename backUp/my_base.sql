-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 30 2015 г., 05:06
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `my_base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`username`, `login`, `password`, `id`) VALUES
('Ирина', 'IrinaLeem', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('Julia', 'JuliaLee', '827ccb0eea8a706c4c34a16891f84e7b', 2),
('Полина', 'Polya', '81dc9bdb52d04dc20036dbd8313ed055', 3),
('Наташа', 'Natasha', '827ccb0eea8a706c4c34a16891f84e7b', 4),
('Layla', 'L', '827ccb0eea8a706c4c34a16891f84e7b', 5),
('Leno4ka', 'Leno4ka', '827ccb0eea8a706c4c34a16891f84e7b', 7),
('Lena', 'Lena', '827ccb0eea8a706c4c34a16891f84e7b', 9),
('Alexey', 'Akolzin', '827ccb0eea8a706c4c34a16891f84e7b', 10),
('Nata', 'Nata', '827ccb0eea8a706c4c34a16891f84e7b', 12),
('Наташа1', 'Natasha1', '202cb962ac59075b964b07152d234b70', 15),
('Misha', 'Miha', '827ccb0eea8a706c4c34a16891f84e7b', 16),
('M', 'M', 'c4ca4238a0b923820dcc509a6f75849b', 17),
('dsfgdfg', 'dfgsdfsgdf', '962012d09b8170d912f0669f6d7d9d07', 18),
('Lolita', 'Lola', '202cb962ac59075b964b07152d234b70', 19);

-- --------------------------------------------------------

--
-- Структура таблицы `users_data`
--

CREATE TABLE IF NOT EXISTS `users_data` (
  `id record` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `date` tinytext NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `calories` float NOT NULL,
  `water` int(11) NOT NULL,
  PRIMARY KEY (`id record`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

--
-- Дамп данных таблицы `users_data`
--

INSERT INTO `users_data` (`id record`, `login`, `date`, `weight`, `height`, `age`, `calories`, `water`) VALUES
(96, 'JuliaLee', '2015-12-30', 56, 159, 20, 1917.58, 1960),
(97, 'Miha', '2015-12-30', 70, 183, 19, 2208.08, 2450),
(98, 'JuliaLee', '2015-12-30', 57, 159, 21, 2130.63, 1995);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
