-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 21 2019 г., 12:06
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ipets`
--

-- --------------------------------------------------------

--
-- Структура таблицы `breed`
--

CREATE TABLE `breed` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `colorId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `breedId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `cross_breed_color`
--

CREATE TABLE `cross_breed_color` (
  `id` int(11) NOT NULL,
  `breedId` int(11) NOT NULL,
  `colorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `cross_owner_pets`
--

CREATE TABLE `cross_owner_pets` (
  `id` int(11) NOT NULL,
  `ownerId` int(11) NOT NULL,
  `petsId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(1, 'Owners/Owner2/1f06a7.jpg', 2, 1, 'Owner', '5e3895f8b8-1', ''),
(2, 'Owners/Owner3/798917.jpg', 3, 1, 'Owner', '751586024d-1', ''),
(3, 'Owners/Owner5/636d6c.jpg', 5, 1, 'Owner', 'c7e9716d1c-1', '');

-- --------------------------------------------------------

--
-- Структура таблицы `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `middle_name` varchar(40) NOT NULL,
  `adres_index` int(20) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `street` varchar(40) DEFAULT NULL,
  `house` int(11) DEFAULT NULL,
  `flat` int(11) DEFAULT NULL,
  `phone_home` varchar(15) DEFAULT NULL,
  `phone_work` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `site` varchar(100) DEFAULT NULL,
  `date_of_entry` date DEFAULT NULL,
  `cipher_in_the_breeding_factory` varchar(100) DEFAULT NULL,
  `KSU_code` varchar(100) DEFAULT NULL,
  `comments` text,
  `petsId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `owner`
--

INSERT INTO `owner` (`id`, `last_name`, `first_name`, `middle_name`, `adres_index`, `city`, `street`, `house`, `flat`, `phone_home`, `phone_work`, `email`, `site`, `date_of_entry`, `cipher_in_the_breeding_factory`, `KSU_code`, `comments`, `petsId`) VALUES
(1, 'Петров', 'Иван', 'Васильевич', 61123, 'Харьков', 'Блюхера', 13, 12, '690815', '050984563423', 'qwerty@gmail.com', '', '2012-12-19', '123', '123', 'Первый комментарий', 1),
(2, 'Второй', 'Сергей', 'Васильевич', 112345, 'Харьков', 'Монако', 2, 23, '234565', '23456789', 'фыва', 'ывнп', '2011-11-20', '23', '33', '<p>дцыкопрфкари</p>\r\n', 4454),
(3, 'Второй', 'Сергей', 'Васильевич', 112345, 'Харьков', 'Монако', 2, 23, '234565', '23456789', 'фыва', 'ывнп', '2011-11-20', '23', '33', '<p>дцыкопрфкари</p>\r\n', 4454),
(4, 'Иванов', 'Иван', 'Васильевич', 112345, 'Харьков', 'Монако', 2, 23, '234565', '23456789', 'фыва', 'ывнп', '2011-11-20', '23', '33', '<p>ывпмыП</p>\r\n', 4454),
(5, 'Иванов', 'Иван', 'Васильевич', 112345, 'Харьков', 'Монако', 2, 23, '234565', '23456789', 'фыва', 'ывнп', '2011-11-20', '23', '33', '<p>ывпмыП</p>\r\n', 4454);

-- --------------------------------------------------------

--
-- Структура таблицы `pet`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `breedId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `colorId` int(11) NOT NULL,
  `ownerId` int(11) NOT NULL,
  `dob` date NOT NULL,
  `genderId` int(11) NOT NULL,
  `pedigree_number` int(11) NOT NULL,
  `number_KSU` int(11) NOT NULL,
  `number_FCI` int(11) NOT NULL,
  `registration_club` varchar(255) NOT NULL,
  `breeding_club` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `father` int(11) DEFAULT NULL,
  `mother` int(11) DEFAULT NULL,
  `dignityId` int(11) DEFAULT NULL,
  `awardsId` int(11) DEFAULT NULL,
  `puppy_card_number` int(11) NOT NULL,
  `participation_in_the_exhibition` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pet`
--

INSERT INTO `pets` (`id`, `breedId`, `name`, `colorId`, `ownerId`, `dob`, `genderId`, `pedigree_number`, `number_KSU`, `number_FCI`, `registration_club`, `breeding_club`, `comments`, `father`, `mother`, `dignityId`, `awardsId`, `puppy_card_number`, `participation_in_the_exhibition`) VALUES
(1, 2, 'Сашка2', 2, 3, '2011-11-20', 1, 1, 1, 1, '1', '1', 'Пробный шар', 1, 2, 3, 2, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `accessToken` varchar(40) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `accessToken`, `auth_key`) VALUES
(100, 'admin', '123', '100-token', 'test100key'),
(101, 'demo', 'demo', '101-token', 'test101key');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cross_breed_color`
--
ALTER TABLE `cross_breed_color`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cross_owner_pets`
--
ALTER TABLE `cross_owner_pets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pet`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `breed`
--
ALTER TABLE `breed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `cross_breed_color`
--
ALTER TABLE `cross_breed_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `cross_owner_pets`
--
ALTER TABLE `cross_owner_pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `pet`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
