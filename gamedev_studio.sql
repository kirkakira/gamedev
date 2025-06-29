-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 29 2025 г., 18:06
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gamedev_studio`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `forum_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `created_at`, `forum_id`) VALUES
(1, 'Разработка игр', 'Общие вопросы по разработке игр', 1750955394, 1),
(2, 'Unity', 'Вопросы по движку Unity', 1751034594, 2),
(3, 'Unreal Engine', 'Вопросы по движку Unreal Engine 5', 1751038194, 2),
(4, 'Баланс игр', 'Обсуждение игрового баланса', 1751039994, 3),
(5, 'работает', 'работает', NULL, 1),
(6, 'уйццуййцууцуйццуййцууцуйццуййцууц', 'уйццуййцууцуйццуййцууцуйццуййцууц', NULL, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `content`, `project_id`, `user_id`, `created_at`) VALUES
(1, 'Отличный проект! Когда ожидается релиз?', 1, 8, 1750998594),
(2, 'Спасибо! Планируем выпустить через 6 месяцев.', 1, 7, 1751002194),
(3, 'Нужна помощь с оптимизацией?', 2, 7, 1751027394),
(4, 'Да, особенно с мобильной версией', 2, 8, 1751030994);

-- --------------------------------------------------------

--
-- Структура таблицы `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `reward` varchar(255) DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `donation`
--

INSERT INTO `donation` (`id`, `amount`, `reward`, `project_id`, `user_id`, `created_at`, `date`, `updated_at`) VALUES
(1, 50.00, 'Ранний доступ', 1, 9, 1751012994, NULL, NULL),
(2, 100.00, 'Ранний доступ + артбук', 1, 10, 1751016594, NULL, NULL),
(3, 25.00, 'Упоминание в титрах', 2, 7, 1751027394, NULL, NULL),
(4, 2121.00, '2121', 3, 7, 2025, '2025-06-28', 2025),
(5, 22121.00, '211221', 1, 7, 2025, '2025-06-28', 2025),
(6, 14124124.00, '2211242', 2, 7, 2025, '2025-06-28', 2025),
(7, 99999999.99, '124124412124', 4, 7, 2025, '2025-06-28', 2025);

-- --------------------------------------------------------

--
-- Структура таблицы `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `forum`
--

INSERT INTO `forum` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Основной форум разработчиков', 'Обсуждение игровых проектов, технологий и сотрудничества', 1750955394, 1751041794),
(2, 'Технические вопросы', 'Помощь с движками и программированием', 1751034594, 1751041794),
(3, 'Геймдизайн', 'Обсуждение механик и баланса игр', 1751038194, 1751041794),
(4, 'вццввц', 'вццвцв', 1751100034, 1751100034),
(5, 'уйццуййцууц', 'уйццуййцууц', 1751145999, 1751145999);

-- --------------------------------------------------------

--
-- Структура таблицы `job_posting`
--

CREATE TABLE `job_posting` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `requirements` text DEFAULT NULL,
  `tasks` text DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `job_posting`
--

INSERT INTO `job_posting` (`id`, `project_id`, `role`, `requirements`, `tasks`, `deadline`, `created_at`) VALUES
(1, 1, 'Sound Designer', 'Опыт работы от 2 лет, знание FMOD/Wwise', 'Создание звуковых эффектов и атмосферы', '2025-07-27 19:29:54', 1750998594),
(2, 2, 'UI/UX Designer', 'Опыт создания интерфейсов для мобильных игр', 'Разработка интерфейса и UX игры', '2025-07-12 19:29:54', 1751020194),
(3, 3, 'QA Engineer', 'Опыт тестирования игр, внимание к деталям', 'Тестирование игры, поиск багов', '2025-07-04 19:29:54', 1751030994);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1751033476),
('m231001_000001_add_status_to_users', 1751033478),
('m250627_152750_create_forum_table', 1751038090),
('m250627_155150_add_views_to_topic_table', 1751039524);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `content`, `topic_id`, `user_id`, `created_at`) VALUES
(1, 'Попробуйте использовать object pooling и оптимизировать draw calls. Также проверьте сложные шейдеры.', 1, 7, 1751016594),
(2, 'Еще можно попробовать LOD-группы для сложных моделей.', 1, 9, 1751020194),
(3, 'Я использую методику \"петель вовлечения\" - постоянно добавляю новые элементы геймплея.', 2, 7, 1751023794),
(4, 'Unreal дает больше возможностей для AAA-проектов, но сложнее в изучении.', 3, 8, 1751030994),
(5, 'Важно чтобы каждая новая способность ощущалась значимой, но не ломала баланс.', 4, 10, 1751036394),
(6, '[eq', 2, 7, 1751054510),
(7, 'FUEFUВАХУАШГ\r\n', 1, 7, 1751100726),
(8, 'уйццуййцууцуйццуййцууцуйццуййцууц', 5, 7, 1751146019);

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `first_name`, `last_name`, `bio`, `skills`, `contact_email`, `website_url`, `created_at`, `updated_at`) VALUES
(1, 7, 'Кира', 'Новикова', 'Геймдизайнер с 5-летним опытом', 'Unity, C#, Game Design', 'kira@studio.com', 'https://kira-portfolio.com', 1750955394, 1751041794),
(2, 8, 'Алексей', 'Петров', 'Программист игр на Unity и Unreal', 'C#, C++, Unity, Unreal', 'alex@studio.com', 'https://alex-dev.com', 1751034594, 1751041794),
(3, 9, 'Марта', 'Сидорова', 'Художник 2D/3D', 'Blender, Photoshop, Substance', 'marta@studio.com', 'https://marta-art.com', 1751038194, 1751041794),
(4, 10, 'Иван', 'Кузнецов', 'Концепт-художник', 'Digital Painting, Concept Art', 'ivan@studio.com', 'https://ivan-art.com', 1751039994, 1751041794);

-- --------------------------------------------------------

--
-- Структура таблицы `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `target_audience` varchar(255) DEFAULT NULL,
  `development_stage` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `project`
--

INSERT INTO `project` (`id`, `title`, `description`, `genre`, `platform`, `target_audience`, `development_stage`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Cosmic Adventure', 'Игра в жанре космического приключения с элементами RPG', 'Adventure, RPG', 'PC, PlayStation', '18-35 лет', 'В разработке', 7, 1750955394, 1751041794),
(2, 'Pixel Dungeon', 'Рогалик в пиксельной графике с процедурной генерацией', 'Roguelike', 'PC, Mobile', '16+', 'Альфа-версия', 8, 1751034594, 1751041794),
(3, 'Neon Racing', 'Аркадные гонки в неоновом стиле', 'Racing, Arcade', 'PC, Xbox', '12+', 'Бета-тестирование', 9, 1751038194, 1751041794),
(4, 'daw', 'awd', 'awdwad', 'awd', 'awd', 'awd', 7, NULL, NULL),
(5, 'лололо', 'лололо', 'лололо', 'лололо', 'лололо', 'лололо', 7, NULL, NULL),
(6, 'цфвцфвфцв2222888', 'фцвфцвфцвфцвфцв', 'цфвцфвфцв2222888', 'цфвцфвфцв2222888', 'цфвцфвфцв2222888', 'цфвцфвфцв2222888', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `team`
--

INSERT INTO `team` (`id`, `name`, `project_id`, `role`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Основная команда', 1, 'Геймдизайнер', 7, 1750955394, 1751041794),
(2, 'Основная команда', 1, 'Программист', 8, 1750955394, 1751041794),
(3, 'Основная команда', 1, 'Художник', 9, 1750955394, 1751041794),
(4, 'Pixel Team', 2, 'Программист', 8, 1751034594, 1751041794),
(5, 'Pixel Team', 2, 'Художник', 10, 1751034594, 1751041794),
(6, 'Neon Team', 3, 'Художник', 9, 1751038194, 1751041794),
(7, 'Neon Team', 3, 'Программист', 8, 1751038194, 1751041794),
(8, 'каукау', 2, 'лох', 8, NULL, NULL),
(9, 'фцвфцв', 5, 'цфвфцв', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `topic`
--

INSERT INTO `topic` (`id`, `title`, `content`, `category_id`, `user_id`, `created_at`, `views`) VALUES
(1, 'Проблемы с оптимизацией в Unity', 'Столкнулся с падением FPS при большом количестве объектов. Какие есть способы оптимизации?', 2, 7, 1751012994, 15),
(2, 'Лучшие практики геймдизайна', 'Какие методики вы используете для создания увлекательного геймплея?', 2, 7, 1751020194, 23),
(3, 'Переход с Unity на Unreal', 'Стоит ли переходить на Unreal Engine для нового проекта?', 3, 8, 1751027394, 8),
(4, 'Баланс RPG-механик', 'Как правильно сбалансировать прокачку персонажа?', 4, 7, 1751034594, 12),
(5, 'уйццуййцууцуйццуййцууц', 'уйццуййцууцуйццуййцууц', 6, 7, 1751146013, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `email`, `auth_key`, `created_at`, `updated_at`, `status`) VALUES
(7, 'кира', '$2y$13$wXbLXfPlvyANmtfVWXPMwui1KmPKgcM2mOjMpvHMF192kRyTqtYL.', 'bendi32423@mail.ru', 'jlKmqAlvrybM_EYhAvOLYKr-xkogWt4e', 1751041212, 1751042333, 10),
(8, 'alex_dev', '$2y$13$wXbLXfPlvyANmtfVWXPMwui1KmPKgcM2mOjMpvHMF192kRyTqtYL.', 'alex@dev.com', 'jlKmqAlvrybM_EYhAvOLYKr-xkogWt4f', 1750955394, 1751041794, 10),
(9, 'marta_design', '$2y$13$wXbLXfPlvyANmtfVWXPMwui1KmPKgcM2mOjMpvHMF192kRyTqtYL.', 'marta@design.com', 'jlKmqAlvrybM_EYhAvOLYKr-xkogWt4g', 1751034594, 1751041794, 10),
(10, 'ivan_art', '$2y$13$wXbLXfPlvyANmtfVWXPMwui1KmPKgcM2mOjMpvHMF192kRyTqtYL.', 'ivan@art.com', 'jlKmqAlvrybM_EYhAvOLYKr-xkogWt4h', 1751038194, 1751041794, 10);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-category-forum_id` (`forum_id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `job_posting`
--
ALTER TABLE `job_posting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `job_posting`
--
ALTER TABLE `job_posting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk-category-forum_id` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `donation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `job_posting`
--
ALTER TABLE `job_posting`
  ADD CONSTRAINT `job_posting_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Ограничения внешнего ключа таблицы `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `team_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
