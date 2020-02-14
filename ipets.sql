-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 14 2020 г., 14:26
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
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `breed`
--

CREATE TABLE `breed` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `breed`
--

INSERT INTO `breed` (`id`, `name`) VALUES
(1, 'Овчарка'),
(2, 'Ротвейлер');

-- --------------------------------------------------------

--
-- Структура таблицы `club`
--

CREATE TABLE `club` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `club`
--

INSERT INTO `club` (`id`, `name`) VALUES
(1, 'Природа'),
(2, '4 лапы'),
(3, 'Усы, лапы и хвост'),
(4, 'Поросячий хвостик');

-- --------------------------------------------------------

--
-- Структура таблицы `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'Черный'),
(2, 'Золотистый');

-- --------------------------------------------------------

--
-- Структура таблицы `diploma`
--

CREATE TABLE `diploma` (
  `id` int(11) NOT NULL,
  `clubId` int(11) NOT NULL,
  `petId` int(11) NOT NULL,
  `award_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `diploma`
--

INSERT INTO `diploma` (`id`, `clubId`, `petId`, `award_description`) VALUES
(1, 1, 33, NULL),
(2, 1, 33, NULL),
(3, 1, 33, NULL),
(4, 1, 33, NULL),
(5, 1, 34, NULL),
(6, 1, 35, NULL),
(7, 1, 29, NULL),
(8, 1, 29, NULL),
(9, 1, 29, NULL),
(10, 1, 29, NULL),
(11, 1, 29, NULL),
(12, 1, 29, NULL),
(13, 1, 37, NULL),
(14, 1, 37, NULL),
(15, 1, 37, NULL),
(16, 1, 37, NULL),
(17, 1, 37, NULL),
(18, 1, 29, 'чсржщдргшдп ;klsjdlkjf aojshkjhw4k5jh jhaieruyituh5 lkjdklfgj xfghsfrghjs fxjsfgjnszfg  xfgsfg fysfgnzDghaztgr ');

-- --------------------------------------------------------

--
-- Структура таблицы `exhibitions`
--

CREATE TABLE `exhibitions` (
  `id` int(11) NOT NULL,
  `clubId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_trans` varchar(255) NOT NULL,
  `date` varchar(40) NOT NULL,
  `city` varchar(255) NOT NULL,
  `city_trans` varchar(255) NOT NULL,
  `rang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `exhibitions`
--

INSERT INTO `exhibitions` (`id`, `clubId`, `name`, `name_trans`, `date`, `city`, `city_trans`, `rang`) VALUES
(2, 1, 'Перша', 'Persha', '2020-10-12', 'Харків', 'Kharkiv', 'CACID'),
(4, 1, 'Друга', 'Persha', '2020-11-11', 'Харків', 'Kharkiv', 'CACID');

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
(23, 'Pets/Pet29/57eb44.jpg', 29, 1, 'Pet', '46a1b4e52f-1', ''),
(24, 'Pets/Pet29/d3f932.jpg', 29, NULL, 'Pet', 'c16ea1c3f2-2', ''),
(25, 'Pets/Pet32/6649e7.jpg', 32, 1, 'Pet', 'b4bf1721a8-1', ''),
(26, 'Pets/Pet33/e38976.jpg', 33, 1, 'Pet', '9e5b7bb5db-1', ''),
(27, 'Diplomas/Diploma1/49e59a.jpg', 1, 1, 'Diploma', '1730c6e938-1', ''),
(28, 'Diplomas/Diploma2/8ce322.jpg', 2, 1, 'Diploma', 'b09fa00480-1', ''),
(29, 'Diplomas/Diploma3/d2946f.jpg', 3, 1, 'Diploma', 'e9cc747b70-1', ''),
(30, 'Diplomas/Diploma4/4379de.jpg', 4, 1, 'Diploma', '4e0ece5dbf-1', ''),
(31, 'Pets/Pet34/c38462.png', 34, 1, 'Pet', '0fcb63f196-1', ''),
(32, 'Diplomas/Diploma5/0c6332.jpg', 5, 1, 'Diploma', '3fb4b578fc-1', ''),
(33, 'Diplomas/Diploma6/3ef486.jpg', 6, 1, 'Diploma', '2a90c46174-1', ''),
(34, 'Diplomas/Diploma7/5c7e98.png', 7, 1, 'Diploma', '47828e6d20-1', ''),
(35, 'Diplomas/Diploma8/a5829e.jpg', 8, 1, 'Diploma', '7047dbcec0-1', ''),
(36, 'Diplomas/Diploma9/bc4097.jpg', 9, 1, 'Diploma', '0692dc54a5-1', ''),
(37, 'Diplomas/Diploma10/feda43.jpg', 10, 1, 'Diploma', 'e37add3d94-1', ''),
(38, 'Diplomas/Diploma10/a15449.jpg', 10, NULL, 'Diploma', '88e5ac20b9-2', ''),
(39, 'Diplomas/Diploma10/bf9009.jpg', 10, NULL, 'Diploma', '560286c232-3', ''),
(40, 'Medicals/Medical1/9eed15.jpg', 1, 1, 'Medical', '1bafcab470-1', ''),
(41, 'Medicals/Medical1/479f3d.jpg', 1, NULL, 'Medical', 'cb8f1e38a6-2', ''),
(42, 'Medicals/Medical1/e1751b.jpg', 1, NULL, 'Medical', '292d21527a-3', ''),
(43, 'Pets/Pet36/45aa83.png', 36, 1, 'Pet', '6178bd9fa8-1', ''),
(44, 'Pets/Pet37/7e1d06.jpg', 37, 1, 'Pet', '0da0dee8ae-1', ''),
(45, 'Pets/Pet38/b01fbf.jpg', 38, 1, 'Pet', 'c3004d0ed2-1', ''),
(46, 'Diplomas/Diploma12/546b18.jpg', 12, 1, 'Diploma', '6ef429689e-1', ''),
(47, 'Diplomas/Diploma14/0332c9.jpg', 14, 1, 'Diploma', 'b1ea96e276-1', ''),
(48, 'Diplomas/Diploma15/d86104.jpg', 15, 1, 'Diploma', '1c6f66f768-1', ''),
(49, 'Diplomas/Diploma16/41d797.jpg', 16, 1, 'Diploma', 'b394a200ac-1', ''),
(50, 'Diplomas/Diploma17/2d1bac.jpg', 17, 1, 'Diploma', '43da0c792b-1', ''),
(51, 'Diplomas/Diploma17/87f4fb.jpg', 17, NULL, 'Diploma', '982ea91cea-2', ''),
(52, 'Diplomas/Diploma17/dd0d6a.jpg', 17, NULL, 'Diploma', 'fcfdbb9494-3', ''),
(53, 'Owners/Owner8/641279.jpg', 8, 1, 'Owner', 'a6ce8458af-1', ''),
(54, 'Owners/Owner8/ba6845.jpg', 8, NULL, 'Owner', '09fbddff66-2', ''),
(55, 'Owners/Owner8/d2f957.jpg', 8, NULL, 'Owner', '5a0b4f5fbb-3', ''),
(56, 'Owners/Owner8/8a18c4.jpg', 8, NULL, 'Owner', 'cb89bde105-4', ''),
(57, 'Diplomas/Diploma18/323d0e.jpg', 18, 1, 'Diploma', '8749e46828-1', '');

-- --------------------------------------------------------

--
-- Структура таблицы `medical`
--

CREATE TABLE `medical` (
  `id` int(11) NOT NULL,
  `clubId` int(11) NOT NULL,
  `petId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `medical`
--

INSERT INTO `medical` (`id`, `clubId`, `petId`) VALUES
(1, 1, 29);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1581493904),
('m140506_102106_rbac_init', 1581493983),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1581493983),
('m180523_151638_rbac_updates_indexes_without_prefix', 1581493983);

-- --------------------------------------------------------

--
-- Структура таблицы `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `clubId` int(11) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `last_name_trans` varchar(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `first_name_trans` varchar(40) NOT NULL,
  `middle_name` varchar(40) NOT NULL,
  `passport_series` varchar(10) DEFAULT NULL,
  `passport_ID` int(10) DEFAULT NULL,
  `issued_by` varchar(255) DEFAULT NULL,
  `date_of_issue` varchar(40) DEFAULT NULL,
  `adres_index` int(20) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `street` varchar(40) DEFAULT NULL,
  `house` varchar(40) DEFAULT NULL,
  `flat` varchar(40) DEFAULT NULL,
  `phone_home` varchar(40) DEFAULT NULL,
  `phone_work` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `site` varchar(100) DEFAULT NULL,
  `date_of_entry` varchar(40) DEFAULT NULL,
  `cipher_in_the_breeding_factory` varchar(100) DEFAULT NULL,
  `KSU_code` varchar(100) DEFAULT NULL,
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `owner`
--

INSERT INTO `owner` (`id`, `clubId`, `last_name`, `last_name_trans`, `first_name`, `first_name_trans`, `middle_name`, `passport_series`, `passport_ID`, `issued_by`, `date_of_issue`, `adres_index`, `city`, `street`, `house`, `flat`, `phone_home`, `phone_work`, `email`, `site`, `date_of_entry`, `cipher_in_the_breeding_factory`, `KSU_code`, `comments`) VALUES
(8, 1, 'Первый', '', 'Владелец', 'dg', 'Собаки', 'СС', 123456, 'XFBgXFB', '11-11-2011', 123, 'Харьков', 'Блюхера', '2', '23', '+23 (456) 5__-__-__', '+23 (456) 789-__-__', 'qwe@asr.com', 'www.usayert.com', '20-02-2001', '23', '33', 'arygaeryaqer'),
(10, 1, 'Второй', 'Vtoroy', 'Владелец', 'Vladelec', 'Собаки', NULL, NULL, NULL, NULL, 123, 'Харьков', 'Монако', '2', '12', '(+380) 996-53-78', '(+380) 772-62-55', 'qwe@asr.com', 'www.usayert.com', '2020-11-11', 'цук', '33', 'ыапр'),
(15, 2, 'qwt', 'awrt', 'at', 'ast', 'at', '', NULL, '', '', 1, '1', '1', '1', '1', '+11 (111) 111-11-11', '+11 (111) 111-11-11', '1', '', '', 'ch', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `clubId` int(11) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `nameId` int(11) DEFAULT NULL,
  `ownerId` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `dob` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `number_KSU` varchar(40) NOT NULL,
  `number_FCI` varchar(40) NOT NULL,
  `chip_number` varchar(40) DEFAULT NULL,
  `registration_club` varchar(255) NOT NULL,
  `breeding_club` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `father` varchar(255) DEFAULT NULL,
  `number_KSU_father` varchar(40) DEFAULT NULL,
  `mother` varchar(255) DEFAULT NULL,
  `number_KSU_mother` varchar(40) DEFAULT NULL,
  `dignity` varchar(40) DEFAULT NULL,
  `puppy_card_number` varchar(40) DEFAULT NULL,
  `participation_in_the_exhibition` varchar(10) DEFAULT NULL,
  `work_certificate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pet`
--

INSERT INTO `pet` (`id`, `clubId`, `breed`, `nameId`, `ownerId`, `color`, `dob`, `gender`, `number_KSU`, `number_FCI`, `chip_number`, `registration_club`, `breeding_club`, `comments`, `father`, `number_KSU_father`, `mother`, `number_KSU_mother`, `dignity`, `puppy_card_number`, `participation_in_the_exhibition`, `work_certificate`) VALUES
(29, 1, 'Овчарка', 27, 8, 'Черный', '20-02-2001', 'Сука', '1dzfhbd', '1zdfhbzdfgb', 'zdtyuetrdfgb', '2zdfhbdSF', '1zdfb', 'dtjkdthj', 'erg', 'dsxfg', '1dsfhgD', 'sdfrbg', 'Відмінно', 'dsvba', 'Так', 'вкимціунккен'),
(36, 1, 'Овчарка', 35, 10, 'Черный', '2019-10-11', 'Кобель', '1', '1', NULL, '1', '1', 'wqfqsrgf', '1', NULL, '1', NULL, '1', '1', '1', NULL),
(37, 1, 'Ротвейлер', 36, 10, 'Черный', '2019-03-01', 'Сука', '2', '3', NULL, '1', '2', 'sRY NewrN6T', '1', NULL, '2', NULL, '2', '2', '2', NULL),
(38, 1, 'Ротвейлер', 37, 8, 'Черный', '2019-02-22', 'Кобель', '3', '2', NULL, '2', 'сплпсалмр', 'asgaSRA', '2', NULL, '1', NULL, '2', '4', '2', NULL),
(39, 1, 'Овчарка', 38, 8, 'Черный', '2020-02-02', 'Кобель', '1111111111', '1111111111', NULL, 'AEFsef', 'ZXvZXV', 'zxcvbzadfghDFh', 'zdgjxzfgjxfjh', NULL, 'xfjxfjxfj', NULL, 'xfjxfjxfjxfhj', 'xfjxfjxfj', 'xfjxfj', NULL),
(43, 2, 'Овчарка', 44, 15, 'Черный', '11-11-2011', 'Кобель', '1', '1', '1', '1', '1zdfb', '1', 'sad', '', 'ad', '', '0', '1', '0', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `pet_exhibition`
--

CREATE TABLE `pet_exhibition` (
  `id` int(11) NOT NULL,
  `clubId` int(11) NOT NULL,
  `petId` int(11) NOT NULL,
  `exhibitionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pet_exhibition`
--

INSERT INTO `pet_exhibition` (`id`, `clubId`, `petId`, `exhibitionId`) VALUES
(1, 1, 27, 2),
(6, 1, 37, 4),
(10, 1, 36, 2),
(11, 1, 27, 2),
(12, 1, 27, 2),
(15, 1, 27, 4),
(16, 1, 37, 4),
(18, 1, 38, 2),
(19, 1, 37, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `pet_name`
--

CREATE TABLE `pet_name` (
  `id` int(11) NOT NULL,
  `clubId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_trans` varchar(255) NOT NULL,
  `ownerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pet_name`
--

INSERT INTO `pet_name` (`id`, `clubId`, `name`, `name_trans`, `ownerId`) VALUES
(27, 1, 'Нетка', '', 8),
(35, 1, 'Третья собака', 'Tuzik', 10),
(36, 1, 'йцу', 'явапр', 10),
(37, 1, 'sehksedfhgkajhdfgkjashkgjhsdkSDHGFK', 'явапр', 8),
(38, 1, 'Третья собака', 'Tuzik', 8),
(44, 2, 'Третья собака', 'Tuzik', 15);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `clubId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `accessToken` varchar(40) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `diploma`
--
ALTER TABLE `diploma`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `exhibitions`
--
ALTER TABLE `exhibitions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nameId` (`nameId`);

--
-- Индексы таблицы `pet_exhibition`
--
ALTER TABLE `pet_exhibition`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pet_name`
--
ALTER TABLE `pet_name`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk _owner` (`ownerId`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `club`
--
ALTER TABLE `club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `diploma`
--
ALTER TABLE `diploma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `exhibitions`
--
ALTER TABLE `exhibitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблицы `medical`
--
ALTER TABLE `medical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `pet_exhibition`
--
ALTER TABLE `pet_exhibition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `pet_name`
--
ALTER TABLE `pet_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`nameId`) REFERENCES `pet_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
