-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 26 2023 г., 14:11
-- Версия сервера: 10.1.48-MariaDB
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `acc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `information`
--

CREATE TABLE `information` (
  `id` int(255) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating_count` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(11) NOT NULL DEFAULT '0',
  `rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `information`
--

INSERT INTO `information` (`id`, `title`, `text`, `rating_count`, `rating_sum`, `rating`) VALUES
(1, 'Компенсация убытков по ипотеке', 'Вот почему вам следует сосредоточиться на тестировании кампаний, прежде чем делиться ими с пользователями. В противном случае человек может увидеть ваше письмо обрезанным, со смещенным макетом, не отвечающим на запросы или неподдерживаемым содержанием. В ', 3, 7, 2),
(2, 'Выплата неустойки по ДДУ', 'Текст 1', 0, 0, 0),
(3, 'Компенсация морального вреда', 'Текст 2', 1, 5, 5),
(4, 'Штраф в размере 50%', 'Текст 3', 0, 0, 0),
(5, 'Возмещение иных расходов', '', 0, 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `information`
--
ALTER TABLE `information`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
