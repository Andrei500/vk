-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 24 2017 г., 11:10
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vk`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) UNSIGNED NOT NULL,
  `autor_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL COMMENT 'Имя',
  `surname` varchar(60) NOT NULL COMMENT 'Фамилия',
  `gender` varchar(25) NOT NULL COMMENT 'Пол',
  `day` int(3) UNSIGNED DEFAULT NULL COMMENT 'День рождения',
  `month` int(3) UNSIGNED DEFAULT NULL COMMENT 'Месяц  рождения',
  `year` int(5) UNSIGNED DEFAULT NULL COMMENT 'Год  рождения',
  `password` varchar(200) NOT NULL COMMENT 'Пароль',
  `avatar_id` int(11) UNSIGNED NOT NULL COMMENT 'ссылка на аватар',
  `city` varchar(50) NOT NULL COMMENT 'город',
  `job` varchar(100) NOT NULL COMMENT 'место работы',
  `status` varchar(250) NOT NULL COMMENT 'статус',
  `marital_status` varchar(100) NOT NULL COMMENT 'семейное положение'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Пользователи';

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
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
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
