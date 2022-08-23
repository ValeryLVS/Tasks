-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 17 2021 г., 16:04
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
-- База данных: `testphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `town` int NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` text COLLATE utf8mb4_unicode_ci,
  `additionally` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `town`, `name`, `address`, `phone`, `service`, `additionally`) VALUES
(91, 1, 'Иванов Иван', 'Москва, ул. Измайлова, д1', '8999898222', 'Нужен Ethernet', ''),
(92, 2, 'Иванов Петр', 'СПб, ул. Суворова д.10', '1234567891011', 'Мобильный доступ в интернет (GPRS, EDGE, 3G)', 'беспалтно'),
(93, 3, 'Дмитрий', 'Волгоград', '89998263267', 'Подключение к интернету по технологии WiMax', '');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `client_id` int NOT NULL,
  `provider_id` int NOT NULL,
  `reasons_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `provider_id`, `reasons_id`) VALUES
(23, 91, 1, 2),
(24, 92, 1, 4),
(25, 93, 2, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `providers`
--

CREATE TABLE `providers` (
  `id` int NOT NULL,
  `provider` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `providers`
--

INSERT INTO `providers` (`id`, `provider`, `address`) VALUES
(1, 'МТС', 'Москва, СПБ'),
(2, 'МГТС', 'СПб, Волгоград'),
(3, 'Билайн', 'Хабаровск'),
(4, 'Мегафон', 'Москва'),
(5, 'Yota', 'СПб, Хабаровск');

-- --------------------------------------------------------

--
-- Структура таблицы `reason`
--

CREATE TABLE `reason` (
  `id` int NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reason`
--

INSERT INTO `reason` (`id`, `reason`, `commit`) VALUES
(5, 'Причина - дорогая услуга.', 'Хотелось бы дешевле');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `service` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `service`, `provider`) VALUES
(2, 'Ethernet — подключение по локальной сети. 500руб.', 1),
(3, 'Подключение к интернету по технологии DOCSIS. 600руб.', 1),
(4, 'Мобильный доступ в интернет (GPRS, EDGE, 3G) 300руб.', 1),
(5, 'Интернет через спутниковую тарелку. 790руб.', 1),
(6, 'Подключение к интернету по технологии WiMax 620руб.', 1),
(8, 'Ethernet — подключение по локальной сети. 200руб.', 2),
(9, 'Подключение к интернету по технологии DOCSIS. 630руб.', 2),
(10, 'Мобильный доступ в интернет (GPRS, EDGE, 3G) 890руб.', 2),
(11, 'Интернет через спутниковую тарелку. 750руб.', 2),
(12, 'Подключение к интернету по технологии WiMax  450руб.', 2),
(14, 'Ethernet — подключение по локальной сети. 880руб.', 3),
(15, 'Подключение к интернету по технологии DOCSIS. 910руб.', 3),
(16, 'Мобильный доступ в интернет (GPRS, EDGE, 3G) 770руб.', 3),
(18, 'Ethernet — подключение по локальной сети. 540руб.', 4),
(19, 'Мобильный доступ в интернет (GPRS, EDGE, 3G) 610руб.', 4),
(20, 'Интернет через спутниковую тарелку. 100руб.', 4),
(21, 'Подключение к интернету по технологии WiMax 2100руб.', 4),
(22, 'Ethernet — подключение по локальной сети. 3100руб.', 5),
(24, 'Подключение к интернету по технологии DOCSIS. 290руб.', 5),
(25, 'Мобильный доступ в интернет (GPRS, EDGE, 3G) 2100руб.', 5),
(26, 'Интернет через спутниковую тарелку. 370руб.', 5),
(27, 'Подключение к интернету по технологии WiMax 740руб.', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `town`
--

CREATE TABLE `town` (
  `id` int NOT NULL,
  `town` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `town`
--

INSERT INTO `town` (`id`, `town`) VALUES
(1, 'Москва'),
(2, 'СПб'),
(3, 'Волгоград'),
(4, 'Хабаровск');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `town` (`town`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `provider_id` (`provider_id`),
  ADD KEY `reasons_id` (`reasons_id`);

--
-- Индексы таблицы `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reason`
--
ALTER TABLE `reason`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provider` (`provider`);

--
-- Индексы таблицы `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `reason`
--
ALTER TABLE `reason`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `town`
--
ALTER TABLE `town`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`town`) REFERENCES `town` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`reasons_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`provider`) REFERENCES `providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
