-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.0
-- Время создания: Ноя 12 2024 г., 14:43
-- Версия сервера: 8.0.35
-- Версия PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `users_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users_log_reg`
--

CREATE TABLE `users_log_reg` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users_log_reg`
--

INSERT INTO `users_log_reg` (`id`, `login`, `password`, `email`) VALUES
(10, 'StolasTheDemon33', 'Live228pop', 'veselichak21@gmail.com'),
(12, 'StolasTheDemon', 'Live228pop2', 'sword-finn@inbox.ru'),
(15, 'demon', 'kekich', 'gpub.g27.9.9@gmail.com'),
(18, 'nikita', 'nQUq9j4Urup6knk', '999Winnable@gmail.com'),
(23, 'Pekos', '2356polkaKos', '12534Gjman@inbox.ru'),
(24, 'StolasTheDemon356', 'Ekolomane14', 'veselichak2221@gmail.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users_log_reg`
--
ALTER TABLE `users_log_reg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users_log_reg`
--
ALTER TABLE `users_log_reg`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
