-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 26 2021 г., 10:20
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `specautoregion`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(124) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(124) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'service6.jpg',
  `info` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `other` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `slug` varchar(124) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icons` varchar(124) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '<i class="fas fa-cogs"></i>'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `price`, `img`, `info`, `other`, `slug`, `icons`) VALUES
(34, 'ТЕХНИЧЕСКОЕ ОБСЛУЖИВАНИЕ', 'Уточняйте по телефону у специалиста', 'Tilda_Icons_25as_bodywork.svg', 'Наш автосервис предлагает качественный ремонт, диагностику и техническое обслуживание.', 'Наши автоcервис предлагает профессиональное техническое обслуживание любой модели автомобиля. Регулярно и вовремя приезжая в мастерскую, владельцы предупреждают проблемы с транспортом и избегают дорогостоящего ремонта. В нашем автосервисе вас ждут доступные цены на техобслуживание Вашего автомобиля.', 'tehnicheskoe-obsluzhivanie', '<i class=\"fas fa-cogs\"></i>'),
(35, 'ДИАГНОСТИКА', 'Уточняйте по телефону у специалиста', 'Tilda_Icons_25as_auto customising.svg', 'Мы специализируемся на автомобилях любых марок и знаем все об их устройстве и особенностях.', 'В нашем автосервисе можно провести диагностику автомобиля на современных стендах, точном оборудовании. Специалисты автосервиса точно определят, есть ли проблемы с транспортом, дадут гаранти.ю на работы.', 'diagnostika', '<i class=\"fas fa-cogs\"></i>'),
(36, 'РЕМОНТ АВТОМОБИЛЯ', 'Уточняйте по телефону у специалиста', 'Tilda_Icons_25as_aerography.svg', 'На все работы мы предоставляем гарантию до двух лет.', 'Мастера автосервиса профессионально выполнят текущий, экстренный или капитальный ремонт двигателя и восстановят работоспособность вашего автомобиля. Мы решим проблемы, вызванные износом силового агрегата, несвоевременной заменой масла, фильтров и прочими причинами поломок.', 'remont-avtomobilya', '<i class=\"fas fa-cogs\"></i>');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `feedback` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_true` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`, `is_true`) VALUES
(158, 'Саня', '&quot;На удивление мне все понравилось, отношение к клиентам и авто!!!! Проверили машину, как говорят &quot;перетрехнули&quot;,выявили некоторые недостатки по ходовой, услуги свои( навязывание) по устранению этих недостатков не предлагали, все на совести владельца,хочешь делай у них, хочешь в другом месте! Короче, спасиюо Лехе и Сереге,!&quot;', 1),
(159, 'Валера', '&quot;Офигительный автосервис. Не первый год приезжаю только к этому специалисту. Всем рекомендую! Лучше не найти.&quot;', 1);

--
-- Триггеры `feedback`
--
DELIMITER $$
CREATE TRIGGER `watchlog_feedback` AFTER INSERT ON `feedback` FOR EACH ROW BEGIN
		INSERT INTO logs (created_at, table_name, str_id, name_value, feedback_value)
		VALUES (NOW(), 'feedback', NEW.id, NEW.name, NEW.feedback);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `logs`
--

CREATE TABLE `logs` (
  `created_at` datetime NOT NULL,
  `table_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `str_id` bigint NOT NULL,
  `name_value` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `feedback_value` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=ARCHIVE DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `logs`
--

INSERT INTO `logs` (`created_at`, `table_name`, `str_id`, `name_value`, `feedback_value`) VALUES
('2021-03-28 11:31:09', 'feedback', 102, 'sdf', 'sdf'),
('2021-03-29 11:28:36', 'feedback', 103, '123', '123'),
('2021-04-05 14:55:31', 'feedback', 104, 'С„С‹РІ', 'С„С‹РІ'),
('2021-04-05 14:59:13', 'feedback', 105, 'asd', 'asd'),
('2021-04-05 14:59:42', 'feedback', 106, 'asd', 'asd'),
('2021-04-05 15:00:09', 'feedback', 107, 'asd', 'asd'),
('2021-04-05 15:00:37', 'feedback', 108, 'asd', 'asd'),
('2021-04-05 15:01:13', 'feedback', 109, 'asd', 'asd'),
('2021-04-05 15:02:49', 'feedback', 110, 'asd', 'asd'),
('2021-04-05 15:04:56', 'feedback', 111, 'asd', 'asd'),
('2021-04-05 15:06:16', 'feedback', 112, 'asd', 'asd'),
('2021-04-05 15:07:10', 'feedback', 113, 'asd', 'asd'),
('2021-04-05 15:08:19', 'feedback', 114, 'asd', 'asd'),
('2021-04-05 15:09:43', 'feedback', 115, 'С„С‹РІ', 'С„С‹РІ'),
('2021-04-05 15:10:26', 'feedback', 116, 'asd', 'asd'),
('2021-04-05 15:10:33', 'feedback', 117, '11', '11'),
('2021-04-05 15:11:57', 'feedback', 118, 'asd', 'asd'),
('2021-04-05 15:31:10', 'feedback', 119, '222', 'asd'),
('2021-04-05 15:39:51', 'feedback', 120, 'asd', 'sad'),
('2021-04-05 15:39:56', 'feedback', 121, 'asd', 'asd'),
('2021-04-05 15:53:07', 'feedback', 122, 'asd', 'asd'),
('2021-04-05 15:53:51', 'feedback', 123, 'asd', 'asd'),
('2021-04-05 16:01:05', 'feedback', 124, 'asd', 'asd'),
('2021-04-05 16:04:07', 'feedback', 125, 'asd', 'asd'),
('2021-04-05 16:05:19', 'feedback', 126, 'sd', 'asd'),
('2021-04-05 16:06:06', 'feedback', 127, 'asd', 'asd'),
('2021-04-05 16:28:47', 'feedback', 128, 'asd', 'asd'),
('2021-04-05 16:34:35', 'feedback', 129, 'asd', 'asd'),
('2021-04-05 16:39:09', 'feedback', 130, 'С„С‹РІ', 'С‹РІ'),
('2021-04-05 17:08:59', 'feedback', 131, '123', '123'),
('2021-04-05 19:29:19', 'feedback', 132, 'asd', 'asd'),
('2021-04-05 19:35:52', 'feedback', 133, 'asd', 'asd'),
('2021-04-05 19:38:08', 'feedback', 134, 'С„С‹РІ', 'С„С‹РІ'),
('2021-04-05 19:38:24', 'feedback', 135, 'С„С‹РІ', 'С„С‹РІ'),
('2021-04-05 19:42:46', 'feedback', 136, 'asd', 'asd'),
('2021-04-05 19:43:28', 'feedback', 137, 'asd', 'asd'),
('2021-04-05 19:45:42', 'feedback', 138, 'asd', 'asd'),
('2021-04-05 19:46:29', 'feedback', 139, 'asd', 'asd'),
('2021-04-05 19:47:06', 'feedback', 140, 'asd', 'sad'),
('2021-04-05 19:48:19', 'feedback', 141, 'asd', 'asd'),
('2021-04-05 20:39:05', 'feedback', 142, 'sdf', 'sdf'),
('2021-04-05 20:40:17', 'feedback', 143, 'zd', 'asd'),
('2021-04-07 20:25:40', 'feedback', 144, 'РѕСЂ', 'Рї'),
('2021-04-08 14:51:03', 'feedback', 145, 'asd', 'sd'),
('2021-04-08 15:48:54', 'feedback', 146, 'asd', 'asd'),
('2021-04-08 15:49:24', 'feedback', 147, '111', '111'),
('2021-04-08 20:17:06', 'feedback', 148, 'asd', 'asd'),
('2021-04-10 13:15:50', 'feedback', 149, 'С†Р°', 'Р°С†Сѓ'),
('2021-04-10 17:50:34', 'feedback', 150, '333', '233'),
('2021-04-10 17:53:33', 'feedback', 151, 'С„С‹РІ', 'С„С‹РІ'),
('2021-04-11 11:45:15', 'feedback', 152, 'С„С‹РІ', 'С„С‹РІ'),
('2021-04-13 11:04:38', 'feedback', 153, '123', '11'),
('2021-04-14 14:14:14', 'feedback', 154, 'Р’Р°Р»РµСЂР°', 'Р’РµР»РёРєРѕР»РµРїРЅС‹Р№ СЃРµСЂРІРёСЃ!!!!'),
('2021-04-15 16:46:20', 'feedback', 155, 'Р’Р°Р»РµСЂРёР№', 'РљСЂСѓС‚РѕР№ СЃРµСЂРІРёСЃ!'),
('2021-04-15 21:03:32', 'feedback', 156, 'РЎР°РЅСЏ', 'РќР° СѓРґРёРІР»РµРЅРёРµ РјРЅРµ РІСЃРµ РїРѕРЅСЂР°РІРёР»РѕСЃСЊ, РѕС‚РЅРѕС€РµРЅРёРµ Рє РєР»РёРµРЅС‚Р°Рј Рё Р°РІС‚Рѕ!!!! РџСЂРѕРІРµСЂРёР»Рё РјР°С€РёРЅСѓ, РєР°Рє РіРѕРІРѕСЂСЏС‚ &quot;РїРµСЂРµС‚СЂРµС…РЅСѓР»Рё&quot;,РІС‹СЏРІРёР»Рё РЅРµРєРѕС‚РѕСЂС‹Рµ РЅРµРґРѕСЃС‚Р°С‚РєРё РїРѕ С…РѕРґРѕРІРѕР№, СѓСЃР»СѓРіРё СЃРІРѕРё( РЅР°РІСЏР·С‹РІР°РЅРёРµ) РїРѕ СѓСЃС‚СЂР°РЅРµРЅРёСЋ СЌС‚РёС… РЅРµРґРѕСЃС‚Р°С‚РєРѕРІ РЅРµ РїСЂРµРґР»Р°РіР°Р»Рё, РІСЃРµ РЅР° СЃРѕРІРµСЃС‚Рё РІР»Р°РґРµР»СЊС†Р°,С…РѕС‡РµС€СЊ РґРµР»Р°Р№ Сѓ РЅРёС…, С…РѕС‡РµС€СЊ РІ РґСЂСѓРіРѕРј РјРµСЃС‚Рµ! РљРѕСЂРѕС‡Рµ, СЃРїР°СЃРёСЋРѕ Р›РµС…Рµ Рё РЎРµСЂРµРіРµ,!'),
('2021-04-15 21:11:04', 'feedback', 157, 'Р’Р°Р»РµСЂР°', 'РћС„РёРіРёС‚РµР»СЊРЅС‹Р№ Р°РІС‚РѕСЃРµСЂРІРёСЃ. РќРµ РїРµСЂРІС‹Р№ РіРѕРґ РїСЂРёРµР·Р¶Р°СЋ С‚РѕР»СЊРєРѕ Рє СЌС‚РѕРјСѓ СЃРїРµС†РёР°Р»РёСЃС‚Сѓ. Р’СЃРµРј СЂРµРєРѕРјРµРЅРґСѓСЋ! Р›СѓС‡С€Рµ РЅРµ РЅР°Р№С‚Рё.'),
('2021-04-20 08:33:09', 'feedback', 158, 'Саня', '&quot;На удивление мне все понравилось, отношение к клиентам и авто!!!! Проверили машину, как говорят &quot;перетрехнули&quot;,выявили некоторые недостатки по ходовой, услуги свои( навязывание) по устранению этих недостатков не предлагали, все на совести владельца,хочешь делай у них, хочешь в другом месте! Короче, спасиюо Лехе и Сереге,!&quot;'),
('2021-04-20 08:33:23', 'feedback', 159, 'Валера', '&quot;Офигительный автосервис. Не первый год приезжаю только к этому специалисту. Всем рекомендую! Лучше не найти.&quot;'),
('2021-04-20 10:23:01', 'feedback', 160, 'asd', 'asd'),
('2021-04-26 13:48:24', 'feedback', 161, 'asd', 'asd'),
('2021-04-26 13:59:18', 'feedback', 162, 'asd', 'asd'),
('2021-04-26 13:59:51', 'feedback', 163, 'asd', 'asd'),
('2021-04-26 15:54:36', 'feedback', 164, 'asd', 'asd'),
('2021-04-26 15:57:22', 'feedback', 165, 'asd', 'asd'),
('2021-04-26 16:10:47', 'feedback', 166, 'd', 'as'),
('2021-04-26 16:25:13', 'feedback', 167, 'asd', 'asd'),
('2021-04-26 16:25:34', 'feedback', 168, 'asd', 'asdasd'),
('2021-04-28 13:13:26', 'feedback', 169, 'asd', 'asd'),
('2021-04-28 13:14:37', 'feedback', 170, '55555', '2525'),
('2021-04-28 13:15:23', 'feedback', 171, 'SDasd', 'ASDasd'),
('2021-04-28 13:16:00', 'feedback', 172, '231', '123'),
('2021-04-28 14:03:14', 'feedback', 173, 'ывап', 'вап'),
('2021-04-30 10:07:17', 'feedback', 174, 'asd', 'asd'),
('2021-04-30 10:12:56', 'feedback', 175, '11', '111'),
('2021-04-30 10:13:17', 'feedback', 176, '            <label for=\"submitMail\">                 <input id=\"submitMail\"                        type=\"submit\"                        value=\"Отправить\"                        class=\"submit submit__input fonts fonts__link\">             </label>', '            <label for=\"submitMail\">                 <input id=\"submitMail\"                        type=\"submit\"                        value=\"Отправить\"                        class=\"submit submit__input fonts fonts__link\">             </label>'),
('2021-04-30 10:53:04', 'feedback', 177, 'asd', 'htmlentities($value)'),
('2021-04-30 10:53:48', 'feedback', 178, '$this->params = $_REQUEST;', '$this->params = $_REQUEST;'),
('2021-04-30 10:54:13', 'feedback', 179, '$_REQUEST', '$_REQUEST'),
('2021-04-30 10:54:24', 'feedback', 180, '$_REQUEST', '$_REQUEST'),
('2021-04-30 10:55:11', 'feedback', 181, '$_REQUEST', '$_REQUEST'),
('2021-04-30 10:59:15', 'feedback', 182, '        &lt;div class=&quot;admin__contact&quot;&gt;             &lt;h5 class=&quot;fonts fonts__fontsMin&quot;&gt; &lt;span class=&quot;spanBlue&quot;&gt;*&lt;/span&gt; Если забыли пароль или логин обратитесь к администратору сайта:&lt;/h5&gt;             &lt;h5 class=&quot;fonts fonts__fontsMin&quot;&gt; &lt;span class=&quot;spanBlue&quot;&gt;Mr.Valery.LV@yandex.ru&lt;/span&gt; &lt;/h5&gt;             &lt;h5 class=&quot;fonts fonts__fontsMin&quot;&gt;или&lt;/h5&gt;             &lt;a target=&quot;_blank&quot; href=&quot;https://telegram.im/@WebLVS&quot;&gt;&lt;img class=&quot;headerUp headerUp__links headerUp__links_tm&quot; src=&quot;/images/icons/othere/tm.png&quot; alt=&quot;tm&quot;&gt;&lt;/a&gt;         &lt;/div&gt;', '        &lt;div class=&quot;admin__contact&quot;&gt;             &lt;h5 class=&quot;fonts fonts__fontsMin&quot;&gt; &lt;span class=&quot;spanBlue&quot;&gt;*&lt;/span&gt; Если забыли пароль или логин обратитесь к администратору сайта:&lt;/h5&gt;             &lt;h5 class=&quot;fonts fonts__fontsMin&quot;&gt; &lt;span class=&quot;spanBlue&quot;&gt;Mr.Valery.LV@yandex.ru&lt;/span&gt; &lt;/h5&gt;             &lt;h5 class=&quot;fonts fonts__fontsMin&quot;&gt;или&lt;/h5&gt;             &lt;a target=&quot;_blank&quot; href=&quot;https://telegram.im/@WebLVS&quot;&gt;&lt;img class=&quot;headerUp headerUp__links headerUp__links_tm&quot; src=&quot;/images/icons/othere/tm.png&quot; alt=&quot;tm&quot;&gt;&lt;/a&gt;         &lt;/div&gt;'),
('2021-04-30 11:17:20', 'feedback', 183, '                &lt;h5 class=&quot;fonts fonts__fontsMin&quot;&gt;Alexei.Polfinov@yandex.ru&lt;/h5&gt;             &lt;/div&gt;              &lt;div&gt;                 &lt;h4 class=&quot;fonts fonts__headerUp&quot;&gt;Время работы:&lt;/h4&gt;                 &lt;h5 class=&quot;fonts fonts__fontsMin&quot;&gt;Пн - Пт: 9.00 - 20.00&lt;/h5&gt;                 &lt;h5 class=&quot;fonts fonts__fontsMin&quot;&gt;Сб: 9.00 - 17.00&lt;/h5&gt;                 &lt;h5 class=&quot;fonts fonts__fontsMin&quot;&gt;Вс: выходной&lt;/h5&gt;             &lt;/div&gt;              &lt;div class=&quot;headerUp headerUp__linksBlock&quot;&gt;                 &lt;a href=&quot;https://wa.me/+79104603472&quot; target=&quot;_blank&quot; class=&quot;headerUp headerUp__links&quot;&gt;&lt;i class=&quot;fab fa-whatsapp&quot;&gt;&lt;/i&gt;&lt;/a&gt;                 &lt;a href=&quot;https://instagram.com/special.region.auto?igshid=12a1dw49c2dmk&quot; target=&quot;_blank&quot; class=&quot;headerUp headerUp__links&quot;&gt', '                &lt;h5 class=&quot;fonts fonts__fontsMin&quot;&gt;Alexei.Polfinov@yandex.ru&lt;/h5&gt;             &lt;/div&gt;              &lt;div&gt;                 &lt;h4 class=&quot;fonts fonts__headerUp&quot;&gt;Время работы:&lt;/h4&gt;                 &lt;h5 class=&quot;fonts fonts__fontsMin&quot;&gt;Пн - Пт: 9.00 - 20.00&lt;/h5&gt;                 &lt;h5 class=&quot;fonts fonts__fontsMin&quot;&gt;Сб: 9.00 - 17.00&lt;/h5&gt;                 &lt;h5 class=&quot;fonts fonts__fontsMin&quot;&gt;Вс: выходной&lt;/h5&gt;             &lt;/div&gt;              &lt;div class=&quot;headerUp headerUp__linksBlock&quot;&gt;                 &lt;a href=&quot;https://wa.me/+79104603472&quot; target=&quot;_blank&quot; class=&quot;headerUp headerUp__links&quot;&gt;&lt;i class=&quot;fab fa-whatsapp&quot;&gt;&lt;/i&gt;&lt;/a&gt;                 &lt;a href=&quot;https://instagram.com/special.region.auto?igshid=12a1dw49c2dmk&quot; target=&quot;_blank&quot; class=&quot;headerUp headerUp__links&quot;&gt'),
('2021-04-30 11:47:44', 'feedback', 184, '                &lt;/textarea&gt;             &lt;label for=&quot;submitMail&quot;&gt;                 &lt;input id=&quot;submitMail&quot;                        type=&quot;submit&quot;                        value=&quot;Отправить&quot;                        class=&quot;submit submit__input fonts fonts__link&quot;&gt;             &lt;/label&gt;', '                &lt;/textarea&gt;             &lt;label for=&quot;submitMail&quot;&gt;                 &lt;input id=&quot;submitMail&quot;                        type=&quot;submit&quot;                        value=&quot;Отправить&quot;                        class=&quot;submit submit__input fonts fonts__link&quot;&gt;             &lt;/label&gt;'),
('2021-04-30 13:07:40', 'feedback', 185, '$id = (new Request())-&gt;getParams()[\'id\'];', '$id = (new Request())-&gt;getParams()[\'id\'];'),
('2021-04-30 13:53:48', 'feedback', 186, 'asd', 'asd'),
('2021-04-30 14:09:44', 'feedback', 187, 'asd', 'asd'),
('2021-04-30 14:10:59', 'feedback', 188, 'Jr', 'JKr'),
('2021-04-30 14:44:53', 'feedback', 189, 'asd', 'asd'),
('2021-04-30 14:52:29', 'feedback', 190, '123', '123'),
('2021-06-27 20:12:07', 'feedback', 191, 'qw', 'asd');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `category` int NOT NULL,
  `name` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `category`, `name`, `price`) VALUES
(119, 34, 'Дезинфекция автокондиционера', 'от 800 руб.'),
(120, 34, 'Очистка автомобильного кондиционера', 'от 820 руб.'),
(121, 34, 'Очистка испарителя автокондиционера', 'от 840 руб.'),
(122, 34, 'Чистка радиаторов', 'от 1000 руб.'),
(123, 35, 'Диагностика КПП', 'от 480 руб.'),
(124, 35, 'Диагностика раздатки', 'от 620 руб.'),
(125, 35, ' Диагностика заднего моста', 'от 420 руб.'),
(126, 35, ' Замер компрессии двигателя', 'от 800 руб.'),
(127, 35, 'Диагностика ТНВД дизельного двигателя', ' от 1200 руб.'),
(128, 36, ' Замена коленчатого вала двигателя', 'от 4200 руб.'),
(129, 36, ' Замена поддона картера двигателя', ' от 3800 руб.'),
(130, 36, 'Замена прокладок свечных колодцев ', 'от 2400 руб.');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `login` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `pass`, `role`) VALUES
(1, 'admin', '$2y$10$jfb3CaxwSFpEmUJeh8Yv4um33qJ3u4.yhXBph3LgGBNmCS1U/1no6', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_ibfk_1` (`category`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
