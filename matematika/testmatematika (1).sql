-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 17 2016 г., 18:16
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `testmatematika`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `countryid` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `countryid` (`countryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `countryid`, `city`) VALUES
(1, 1, 'Вена'),
(2, 1, 'Зальцбург'),
(3, 1, 'Инсбрук'),
(4, 2, 'Солдеу'),
(5, 2, 'Пас-де-ла-Каса'),
(6, 3, 'Банско'),
(7, 3, 'София'),
(8, 4, 'Рио-де-Жанейро'),
(9, 4, 'Бузиус'),
(10, 4, 'Амазония'),
(11, 5, 'Дахаб'),
(12, 5, 'Таба'),
(13, 6, 'Барселона'),
(14, 6, 'Майорка'),
(15, 6, 'Мадрид');

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `country`) VALUES
(1, 'Австрия'),
(2, 'Андорра'),
(3, 'Болгария'),
(4, 'Бразилия'),
(5, 'Египет'),
(6, 'Испания');

-- --------------------------------------------------------

--
-- Структура таблицы `lenguages`
--

CREATE TABLE IF NOT EXISTS `lenguages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `countryid` int(11) NOT NULL,
  `cityid` int(11) NOT NULL,
  `lenguage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `countryid` (`countryid`),
  KEY `cityid` (`cityid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `lenguages`
--

INSERT INTO `lenguages` (`id`, `countryid`, `cityid`, `lenguage`) VALUES
(1, 1, 1, 'венский'),
(2, 1, 2, 'немецкий'),
(3, 1, 3, 'немецкий'),
(4, 2, 4, 'каталинский'),
(5, 2, 5, 'французкий'),
(6, 3, 6, 'болгарский'),
(7, 3, 7, 'болгарский'),
(8, 4, 8, 'партугальский'),
(9, 4, 9, 'партугальский'),
(10, 4, 10, 'индийский'),
(11, 5, 11, 'арабский'),
(12, 5, 12, 'арабский'),
(13, 6, 13, 'испанский'),
(14, 6, 14, 'каталанский'),
(15, 6, 15, 'мадридский');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`countryid`) REFERENCES `countries` (`id`);

--
-- Ограничения внешнего ключа таблицы `lenguages`
--
ALTER TABLE `lenguages`
  ADD CONSTRAINT `lenguages_ibfk_1` FOREIGN KEY (`countryid`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `lenguages_ibfk_2` FOREIGN KEY (`cityid`) REFERENCES `cities` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
