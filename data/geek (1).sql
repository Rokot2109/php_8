-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 07 2021 г., 12:57
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `geek`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `good_id` int(11) NOT NULL,
  `session_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `good_id`, `session_id`) VALUES
(17, 1, '0gp6h5f7v35de64e7moupu64o6nrnepb'),
(18, 1, '0gp6h5f7v35de64e7moupu64o6nrnepb'),
(19, 1, 'n0qgv8vl353in67q2dpt62qkao50voon'),
(20, 1, 'n0qgv8vl353in67q2dpt62qkao50voon'),
(22, 1, 'gfckvtqqgsr6e8uc66v82t3llbv371lo'),
(23, 1, 'gfckvtqqgsr6e8uc66v82t3llbv371lo'),
(25, 1, '1ssb895g8rmvdosafas2rt2geth2doim'),
(27, 1, 'n8bden911l64ah10ub27ccpaibr2q9dn'),
(28, 1, 'n8bden911l64ah10ub27ccpaibr2q9dn'),
(29, 1, 'n8bden911l64ah10ub27ccpaibr2q9dn'),
(30, 1, 'n8bden911l64ah10ub27ccpaibr2q9dn'),
(31, 1, 'n6qes0la532fokq7ajjbvio3tp9u5pfu'),
(32, 1, 'n6qes0la532fokq7ajjbvio3tp9u5pfu'),
(33, 1, 'n6qes0la532fokq7ajjbvio3tp9u5pfu');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`) VALUES
(1, 'Админ', 'Не флудить!'),
(2, 'Юзер', 'Как дела?'),
(3, '111', '22'),
(4, 'Вася3', 'Новое сообщение32');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `image`, `name`, `description`, `price`) VALUES
(1, 'Набор.jpg', 'Набор', 'Настольный набор Attache Selection черный/розовый 10 предметов', 100),
(3, 'ручка.jpg', 'ручка', 'Ручка шариковая Pensan Buro синяя (толщина линии 0.8 мм)', 50),
(4, 'Файлы.jpg', 'Файлы', 'Файл-вкладыш Attache A4 35 мкм в ассортименте рифленый 100 штук в', 25);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `filename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `filename`) VALUES
(1, '01.jpg'),
(2, '02.jpg'),
(3, '03.jpg'),
(4, '04.jpg'),
(5, '05.jpg'),
(6, '06.jpg'),
(7, '07.jpg'),
(8, '08.jpg'),
(9, '09.jpg'),
(10, '10.jpg'),
(11, '11.jpg'),
(12, '12.jpg'),
(13, '13.jpg'),
(14, '14.jpg'),
(15, '15.jpg'),
(21, 'aaz.jpg'),
(22, 'aaz.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `session_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `session_id`) VALUES
(4, '123', '+7 926', 'n1e6t87s7erirasq69gvkoap4tfvmv9e'),
(5, 'Rokot2109', '8926', 'n8bden911l64ah10ub27ccpaibr2q9dn'),
(7, 'Rokot2109', '+7 926', 'n8bden911l64ah10ub27ccpaibr2q9dn'),
(8, 'php', '+7 926', 'n6qes0la532fokq7ajjbvio3tp9u5pfu');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$2qMwxKY7nxxiFZFBP4yzrePkz5WVzb9F7dKO2xux5.XLbPLXkmBEC', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
