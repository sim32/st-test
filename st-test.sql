-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 19 2016 г., 14:44
-- Версия сервера: 5.6.17
-- Версия PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `st-test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(2) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `city`
--

TRUNCATE TABLE `city`;
--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Москва'),
(2, 'Мурманск'),
(3, 'Санкт-Питербург'),
(4, 'Самара'),
(5, 'Сочи');

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL,
  `search_id` varchar(20) NOT NULL,
  `departure_city_id` int(2) NOT NULL,
  `arrive_city_id` int(2) NOT NULL,
  `date_departure` varchar(10) NOT NULL,
  `time_departure` varchar(5) NOT NULL,
  `count_adults` int(1) NOT NULL,
  `count_children` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `tickets`
--

TRUNCATE TABLE `tickets`;
--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`id`, `search_id`, `departure_city_id`, `arrive_city_id`, `date_departure`, `time_departure`, `count_adults`, `count_children`) VALUES
(1, '1_2_12-12-2014_1_0', 1, 2, '12-12-2014', '18:00', 1, 0),
(2, '1_2_12-12-2014_1_0', 1, 2, '12-12-2014', '15:00', 1, 0),
(3, '1_2_12-12-2014_1_0', 1, 2, '12-12-2014', '12:00', 1, 0),
(4, '1_2_12-12-2014_1_0', 1, 2, '12-12-2014', '17:30', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
