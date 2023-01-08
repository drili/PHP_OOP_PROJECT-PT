-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 09. 01 2023 kl. 00:18:07
-- Serverversion: 10.1.28-MariaDB
-- PHP-version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_oop_project_1`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `darkmode`
--

CREATE TABLE `darkmode` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `darkmode_status` varchar(255) NOT NULL DEFAULT 'lightmode'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `darkmode`
--

INSERT INTO `darkmode` (`id`, `user_email`, `darkmode_status`) VALUES
(3, 'drilib4@hotmail.com', 'lightmode');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_low` int(11) NOT NULL,
  `task_high` int(11) NOT NULL,
  `task_workflow_status` int(11) NOT NULL DEFAULT '0',
  `task_description` varchar(255) NOT NULL,
  `sprint_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `label_id` int(11) NOT NULL,
  `task_type_id` int(11) NOT NULL,
  `task_vertical_id` int(11) NOT NULL,
  `is_external` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_name`, `task_low`, `task_high`, `task_workflow_status`, `task_description`, `sprint_id`, `customer_id`, `label_id`, `task_type_id`, `task_vertical_id`, `is_external`, `created_at`, `created_by`) VALUES
(1, 'TEST TASK', 3, 5, 0, 'TEST TASKTEST TASKTEST TASKTEST TASKTEST TASKTEST TASKTEST TASK', 1, 1, 1, 1, 1, 0, '0000-00-00 00:00:00', 32),
(2, 'TEST TASKTEST TASK', 1, 2, 0, 'TEST TASKTEST TASKTEST TASKTEST TASKTEST TASK', 4, 6, 1, 2, 1, 0, '2023-01-08 23:17:13', 32);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL DEFAULT 'none.png',
  `user_title` varchar(255) NOT NULL DEFAULT 'default',
  `user_role` int(255) NOT NULL,
  `user_activated` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `profile_image`, `user_title`, `user_role`, `user_activated`) VALUES
(24, 'drilib@hotmail.com', '51231@h.com', '$2y$10$TXtNGWj2CIUv8hFfW8J6GeZXZqQ9E6siGGtbk7zgROy0wboaYErXm', '01-01-2023', 'none.svg', 'default', 0, 0),
(25, 'aæklwdj', 'ajwdaw@h.com', '$2y$10$eaJDGOlJLpyc2P38ijIgdOfACIAqvrLgmSYSMPC2vFbuJdT/2zitW', '01-01-2023', 'none.svg', 'default', 0, 0),
(26, 'awlkdj', 'lakwjdajlkwd@h.com', '$2y$10$XVKXIJALQE4ZsTnwLgdnV.cs80UpI9TroEXQp5r13IPUppHJDtDZO', '01-01-2023', 'none.svg', 'default', 0, 0),
(27, 'a.klwjdkl', 'awdawghawdawd@h.com', '$2y$10$ZK9sR0LEqH1dX6q7QSXDKeBS4BGOcIACLYhAEq3L9rvPbdiT6.q4K', '01-01-2023', 'none.svg', 'default', 0, 0),
(28, 'drilib2@hotmail.com', 'drilib2@hotmail.com', '$2y$10$MhqMXA9iUzuMJxGkHkLSZOojfHSD60IByGF7LvA/tuyXhfpap/p.K', '01-01-2023', 'none.svg', 'default', 0, 0),
(29, 'lawdalwkdja@h.com', 'lawdalwkdja@h.com', '$2y$10$.Q4tMD5cIEXDoMUOYxcXv.JxvG.iDppTNTi8k330v1kYF3dHGglXm', '01-01-2023', 'none.svg', 'default', 0, 0),
(30, 'drilib3@hotmail.com', 'drilib3@hotmail.com', '$2y$10$zFdH7a2PSomt54FeroSGJupK3vdttoBUHBHz8VfcGGpgrdsB2XUaq', '01-01-2023', 'none.svg', 'default', 0, 0),
(31, 'Drilon Braha', 'drilib4@hotmail.com', '$2y$10$vXHSHQ9X0F7Ryx2rsm5lce34vFGuNEvAxRfEF7OgWbI/vBt8YTSzS', '01-01-2023', '63ba2bb75bb0b.png', 'Full Stack Developer', 1, 1),
(32, '123123', 'drilib5@hotmail.com', '$2y$10$tg7oAonk6B8JQmT1JLpl0eynd6gL0fpyC0MncbJO9SCwHBKke7pNi', '03-01-2023', 'none.svg', 'default', 0, 0),
(33, 'drilib6@hotmail.com', 'drilib6@hotmail.com', '$2y$10$E0VH7V8SH3Guy8ws3txJdeZ/KemId3xdCOuqPdwgnhIHnZifZQU9u', '03-01-2023', 'none.svg', 'default', 0, 0);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `user_role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_role_id`, `user_role_name`) VALUES
(1, 0, 'default'),
(2, 1, 'admin');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `darkmode`
--
ALTER TABLE `darkmode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `darkmode`
--
ALTER TABLE `darkmode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tilføj AUTO_INCREMENT i tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tilføj AUTO_INCREMENT i tabel `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
