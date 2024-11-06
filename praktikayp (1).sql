-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 26 2024 г., 12:31
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `praktikayp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Пользователь '),
(2, 'Администратор'),
(3, 'Заблокированный ');

-- --------------------------------------------------------

--
-- Структура таблицы `stikers`
--

CREATE TABLE `stikers` (
  `id` int NOT NULL,
  `way` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `stikers`
--

INSERT INTO `stikers` (`id`, `way`, `name`, `description`) VALUES
(3, 'assets/img/stickers/667bd6cdd73e5.png', '123', '123123123123'),
(4, 'assets/img/stickers/667bdc454c6e4.png', 'dasdfsdf', 'asdfadsfsdfasdf');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role_id` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `avatar`, `role_id`) VALUES
(1, 'emil', 'fredi_2003@mail.ru', '$2y$10$NCxkceTXGwU.K37Ei7UuCe6lbpms63jLudPvXytboH2ZT6oxrtWaS', 'assets/img/avatar/667bdeac6a82b.png', 1),
(3, 'Emil', 'fredi_2005@mail.ru', '$2y$10$1G80MT.vWr5r2T4yG2KeTejGtvxNTcxqn7PdShbPfzVW5l9GcTFiG', 'assets/img/avatar/667bc1b9ac39c.png', 1),
(4, 'Admin Adminuchka', 'admin@mail.ru', '$2y$10$kcbOqG2rHJfo8kIT3Tyvduqhzj73sodQDfbqF3DjLvvdGaiETkBly', NULL, 2),
(5, 'Софья', 'n@mail.ru', '$2y$10$Eb3cQ/wwX3hGRmISOVAr/.MKyDOKBpFY6l.XqBvmdwqPRGph0YHVe', NULL, 1),
(6, 'emil', 'fredi_2002@mail.ru', '$2y$10$2B5Q48kgMsLIosAi7ODVnurH6a59EEg6nGg.1u38E.XkXEWQmMFhe', NULL, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stikers`
--
ALTER TABLE `stikers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `stikers`
--
ALTER TABLE `stikers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
