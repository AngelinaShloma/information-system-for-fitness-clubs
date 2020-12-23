-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Дек 13 2020 г., 22:14
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
-- База данных: `fitnessclub`
--

-- --------------------------------------------------------

--
-- Структура таблицы `class_on_the_type_of_season_ticket`
--

CREATE TABLE `class_on_the_type_of_season_ticket` (
  `type_class_id` int(11) NOT NULL,
  `type_season_ticket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `FIO` varchar(60) NOT NULL,
  `phone` bigint(11) DEFAULT NULL,
  `date_of_birht` date NOT NULL,
  `sex` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`client_id`, `FIO`, `phone`, `date_of_birht`, `sex`) VALUES
(1, 'Петров Иван Михайлович', 89532674291, '2000-04-11', 'м'),
(2, 'Петров Алексей Сергеевич', 89534598231, '1993-06-11', 'м'),
(3, 'Комарова Наталья Михайловна', 89534598254, '1977-07-04', 'ж'),
(4, 'Васильева Мария Романовна', 89534598675, '1980-02-23', 'ж');

-- --------------------------------------------------------

--
-- Структура таблицы `coach`
--

CREATE TABLE `coach` (
  `coach_id` int(11) NOT NULL,
  `FIO` varchar(60) NOT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `season_ticket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payment`
--

INSERT INTO `payment` (`payment_id`, `amount`, `date`, `season_ticket_id`) VALUES
(1, 3000, '2020-11-29', 1),
(2, 1000, '2020-12-02', 1),
(3, 2000, '2020-12-01', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `qualification`
--

CREATE TABLE `qualification` (
  `coach_id` int(11) NOT NULL,
  `type_class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `season_ticket`
--

CREATE TABLE `season_ticket` (
  `season_ticket_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `type_season_ticket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `season_ticket`
--

INSERT INTO `season_ticket` (`season_ticket_id`, `status`, `date_start`, `date_end`, `client_id`, `type_season_ticket_id`) VALUES
(1, 'активен', '2020-06-02', '2021-12-01', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `signup`
--

CREATE TABLE `signup` (
  `class_id` int(11) NOT NULL,
  `season_ticket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `timetable`
--

CREATE TABLE `timetable` (
  `class_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `weekday` varchar(2) NOT NULL,
  `time_start` time NOT NULL,
  `tine_end` time NOT NULL,
  `format` varchar(45) NOT NULL,
  `type_room_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `type_class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `type_class`
--

CREATE TABLE `type_class` (
  `type_class_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `type_room`
--

CREATE TABLE `type_room` (
  `type_room_id` int(11) NOT NULL,
  `name_room` varchar(45) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `type_season_ticket`
--

CREATE TABLE `type_season_ticket` (
  `type_season_ticket_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `cost` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `time` varchar(45) NOT NULL,
  `available_classes` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_season_ticket`
--

INSERT INTO `type_season_ticket` (`type_season_ticket_id`, `name`, `cost`, `duration`, `time`, `available_classes`) VALUES
(1, 'групповой', 6000, 6, 'утро', 'фитнес'),
(2, 'групповой', 10000, 12, 'утро', 'фитнес');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `class_on_the_type_of_season_ticket`
--
ALTER TABLE `class_on_the_type_of_season_ticket`
  ADD PRIMARY KEY (`type_class_id`,`type_season_ticket_id`),
  ADD KEY `fk_class_on_the_type_of_season_ticket_type_class1_idx` (`type_class_id`),
  ADD KEY `fk_class_on_the_type_of_season_ticket_type_season_ticket1_idx` (`type_season_ticket_id`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `phone_UNIQUE` (`phone`);

--
-- Индексы таблицы `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`coach_id`),
  ADD UNIQUE KEY `phone_UNIQUE` (`phone`);

--
-- Индексы таблицы `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `season_ticket_id` (`season_ticket_id`);

--
-- Индексы таблицы `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`coach_id`,`type_class_id`),
  ADD KEY `fk_qualification_coach1_idx` (`coach_id`),
  ADD KEY `fk_qualification_type_class1_idx` (`type_class_id`);

--
-- Индексы таблицы `season_ticket`
--
ALTER TABLE `season_ticket`
  ADD PRIMARY KEY (`season_ticket_id`),
  ADD KEY `fk_season_ticket_client1_idx` (`client_id`),
  ADD KEY `fk_season_ticket_type_season_ticket1_idx` (`type_season_ticket_id`);

--
-- Индексы таблицы `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`class_id`,`season_ticket_id`),
  ADD KEY `fk_signup_timetable1_idx` (`class_id`),
  ADD KEY `fk_signup_season_ticket1_idx` (`season_ticket_id`);

--
-- Индексы таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `fk_timetable_type_room_idx` (`type_room_id`),
  ADD KEY `fk_timetable_coach1_idx` (`coach_id`),
  ADD KEY `fk_timetable_type_class1_idx` (`type_class_id`);

--
-- Индексы таблицы `type_class`
--
ALTER TABLE `type_class`
  ADD PRIMARY KEY (`type_class_id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Индексы таблицы `type_room`
--
ALTER TABLE `type_room`
  ADD PRIMARY KEY (`type_room_id`);

--
-- Индексы таблицы `type_season_ticket`
--
ALTER TABLE `type_season_ticket`
  ADD PRIMARY KEY (`type_season_ticket_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `coach`
--
ALTER TABLE `coach`
  MODIFY `coach_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `season_ticket`
--
ALTER TABLE `season_ticket`
  MODIFY `season_ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `timetable`
--
ALTER TABLE `timetable`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `type_class`
--
ALTER TABLE `type_class`
  MODIFY `type_class_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `type_room`
--
ALTER TABLE `type_room`
  MODIFY `type_room_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `type_season_ticket`
--
ALTER TABLE `type_season_ticket`
  MODIFY `type_season_ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `class_on_the_type_of_season_ticket`
--
ALTER TABLE `class_on_the_type_of_season_ticket`
  ADD CONSTRAINT `fk_class_on_the_type_of_season_ticket_type_class1` FOREIGN KEY (`type_class_id`) REFERENCES `type_class` (`type_class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_class_on_the_type_of_season_ticket_type_season_ticket1` FOREIGN KEY (`type_season_ticket_id`) REFERENCES `type_season_ticket` (`type_season_ticket_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`season_ticket_id`) REFERENCES `season_ticket` (`season_ticket_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `qualification`
--
ALTER TABLE `qualification`
  ADD CONSTRAINT `fk_qualification_coach1` FOREIGN KEY (`coach_id`) REFERENCES `coach` (`coach_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_qualification_type_class1` FOREIGN KEY (`type_class_id`) REFERENCES `type_class` (`type_class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `season_ticket`
--
ALTER TABLE `season_ticket`
  ADD CONSTRAINT `fk_season_ticket_client1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_season_ticket_type_season_ticket1` FOREIGN KEY (`type_season_ticket_id`) REFERENCES `type_season_ticket` (`type_season_ticket_id`);

--
-- Ограничения внешнего ключа таблицы `signup`
--
ALTER TABLE `signup`
  ADD CONSTRAINT `fk_signup_season_ticket1` FOREIGN KEY (`season_ticket_id`) REFERENCES `season_ticket` (`season_ticket_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_signup_timetable1` FOREIGN KEY (`class_id`) REFERENCES `timetable` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `fk_timetable_coach1` FOREIGN KEY (`coach_id`) REFERENCES `coach` (`coach_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_timetable_type_class1` FOREIGN KEY (`type_class_id`) REFERENCES `type_class` (`type_class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_timetable_type_room` FOREIGN KEY (`type_room_id`) REFERENCES `type_room` (`type_room_id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- События
--
CREATE DEFINER=`root`@`localhost` EVENT `update_status_season_ticket_1` ON SCHEDULE EVERY 1 DAY STARTS '2020-12-01 21:23:59' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE season_ticket SET `status` = 'активен' WHERE CURRENT_DATE BETWEEN `season_ticket.date_start` AND `season_ticket.date_end`$$

CREATE DEFINER=`root`@`localhost` EVENT `update_status_season_ticket_0` ON SCHEDULE EVERY 1 DAY STARTS '2020-12-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE season_ticket SET `status` = 'не активен' WHERE CURRENT_DATE NOT BETWEEN `season_ticket.date_start` AND `season_ticket.date_end`$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
