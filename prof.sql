-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 14 2020 г., 08:50
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `prof`
--

-- --------------------------------------------------------

--
-- Структура таблицы `full`
--

CREATE TABLE `full` (
  `id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `username` text NOT NULL,
  `qadam` varchar(255) NOT NULL,
  `bir` varchar(255) NOT NULL,
  `ikki` varchar(255) NOT NULL,
  `uch` varchar(255) NOT NULL,
  `file_doc` text NOT NULL,
  `file_photo` text NOT NULL,
  `file_other` text NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `full`
--

INSERT INTO `full` (`id`, `chat_id`, `firstname`, `username`, `qadam`, `bir`, `ikki`, `uch`, `file_doc`, `file_photo`, `file_other`, `status`) VALUES
(1, 12345678, 'ismi', 'userismi', 'bosh menyu', 'bir', 'ikki', 'uch', 'doc adresi', 'rasm adres', 'hamma adres', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `full`
--
ALTER TABLE `full`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `full`
--
ALTER TABLE `full`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
