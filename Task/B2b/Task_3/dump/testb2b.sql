-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 04 2021 г., 16:02
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testb2b`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `user_id`, `title`, `info`) VALUES
(1, 1, 'News-One', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt enim error, eum molestias quibusdam sed voluptas.'),
(2, 6, 'New-Two', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt enim error, eum molestias quibusdam sed voluptas.'),
(3, 2, 'News-Tree', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt enim error, eum molestias quibusdam sed voluptas.'),
(4, 1, 'News-One(2)', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt enim error, eum molestias quibusdam sed voluptas.');

-- --------------------------------------------------------

--
-- Структура таблицы `phone_numbers`
--

CREATE TABLE `phone_numbers` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `phone_numbers`
--

INSERT INTO `phone_numbers` (`id`, `user_id`, `phone`) VALUES
(1, 1, '89998152505'),
(2, 1, '89998152506'),
(3, 2, '89998152507'),
(4, 3, '89998152508'),
(5, 4, '8999999991'),
(6, 6, '89998152505'),
(7, 5, '89998152555'),
(8, 2, '89625323622');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int NOT NULL COMMENT '0 - не указан, 1 - мужчина, 2 - женщина.',
  `birth_date` int NOT NULL COMMENT 'Дата в unixtime.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `birth_date`) VALUES
(1, 'Inna', 2, 1625220363),
(2, 'Kris', 2, 962532362),
(3, 'Alex', 1, 994154884),
(4, 'Irina', 2, 1278151684),
(5, 'Anton', 1, 615388033),
(6, 'Alina', 2, 962532362);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`user_id`);

--
-- Индексы таблицы `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `phone_numbers`
--
ALTER TABLE `phone_numbers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD CONSTRAINT `phone_numbers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
