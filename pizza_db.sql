-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 17 2020 г., 15:23
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
-- База данных: `pizza_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`Id`, `Title`) VALUES
(1, 'Пицца'),
(2, 'Напитки'),
(3, 'Акции');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `Title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SmallDescription` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Structure` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Category` int(11) DEFAULT NULL,
  `ImageSource` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`Title`, `Description`, `SmallDescription`, `Structure`, `Category`, `ImageSource`, `price`, `id`) VALUES
('Карбонара', '30 см, традиционное, 610 г', 'Очень вкусная пицца', 'Бекон, сыры чеддер и пармезан, моцарелла, томаты черри, красный лук, чеснок, соус альфредо, итальянские травы', 1, 'carbonara.png', '450.00', 1),
('Coca-Cola', '0,5л', NULL, NULL, 2, 'cola.png', '100.00', 2),
('Mirinda', '0,5л', NULL, NULL, 2, 'mirinda.png', '100.00', 3),
('3 пиццы 30 см', '3 пиццы 30 см на тонком тесте по суперцене.', 'Крутая акция', 'Состав комбо: Пицца \"Ветчина и грибы\" Пицца \"4 сыра\" Пицца \"Пепперони\" ', 3, 'sale1.png', '0.00', 4),
('Пепперони 25см в подарок', 'Пепперони 25см в подарок при заказе от 595р..', 'Крутая акция', 'Сделайте заказ на сумму больше 595 рублей и получите пиццу в подарок!!!!\" ', 3, 'sale2.png', '0.00', 5),
('Четыре сыра', '30 см, традиционное, 550 г', 'Очень странная пицца', 'Моцарелла, чеддер, пармезан, брынза, сливочный соус', 1, '54cheese.png', '680.00', 6),
('Гавайская', '30 см, традиционное, 600 г', 'Очень своеобразная пицца', 'Ананас, куриная грудка, помидоры, болгарский перец, моцарелла', 1, 'hawaii.png', '590.00', 7),
('Грибная', '30 см, традиционное, 540 г', 'Грибная пицца с грибами', 'Шампиньоны, ветчина, моцарелла, томатный соус', 1, 'shrooms.png', '550.00', 8),
('Мексиканская', '30 см, традиционное, 700 г', 'Пицца тако белл ', 'Курица, сладкий чили, острый перец халапеньо, томаты, красный лук, моцарелла, томатный соус, соус сальса', 1, 'tacoplz.png', '680.00', 9),
('Пепперони', '25 см, традиционное, 500 г', 'Пицца с кругляшками', 'Пепперони, моцарелла, томатный соус', 1, 'pepperoni.png', '500.00', 10),
('Monster Energy Ultra White', '0.55л', NULL, NULL, 2, 'monster.png', '155.00', 11),
('Arizona', '0.55л', NULL, NULL, 2, 'arizona.png', '125.00', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`orderid`, `userid`, `price`) VALUES
(10, 1, '705.00'),
(11, 1, '705.00'),
(12, 1, '705.00'),
(13, 1, '705.00'),
(14, 1, '705.00'),
(15, 1, '705.00'),
(16, 1, '590.00'),
(17, 1, '590.00'),
(18, 1, '590.00'),
(19, 1, '590.00'),
(20, 1, '550.00'),
(21, 1, '590.00');

-- --------------------------------------------------------

--
-- Структура таблицы `orderscontent`
--

CREATE TABLE `orderscontent` (
  `orderid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `volume` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orderscontent`
--

INSERT INTO `orderscontent` (`orderid`, `itemid`, `volume`) VALUES
(12, 8, 1),
(13, 8, 1),
(14, 8, 1),
(16, 7, 1),
(20, 8, 1),
(21, 7, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `surname`, `pass`, `isAdmin`) VALUES
(1, 'patachyon@gmail.com', 'Александр', 'Пузиков', '240bb62e49867a654fbaca74843365e9', b'1'),
(5, 'party62rock@gmail.com', 'Санёк', 'Тестировщик', '240bb62e49867a654fbaca74843365e9', b'0');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Category` (`Category`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `userid` (`userid`);

--
-- Индексы таблицы `orderscontent`
--
ALTER TABLE `orderscontent`
  ADD PRIMARY KEY (`orderid`,`itemid`),
  ADD KEY `itemid` (`itemid`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`Category`) REFERENCES `categories` (`Id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `orderscontent`
--
ALTER TABLE `orderscontent`
  ADD CONSTRAINT `orderscontent_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`),
  ADD CONSTRAINT `orderscontent_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `goods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
