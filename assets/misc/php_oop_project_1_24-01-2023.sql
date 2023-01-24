-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 24. 01 2023 kl. 21:45:07
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
-- Struktur-dump for tabellen `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_cvr` int(11) NOT NULL,
  `customer_color` varchar(255) NOT NULL,
  `customer_hourly_rate` int(11) NOT NULL,
  `customer_enabled` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_cvr`, `customer_color`, `customer_hourly_rate`, `customer_enabled`) VALUES
(1, 'hawdaha 1', 124151, '#e3e3e3', 1000, 1),
(2, 'hawda 2', 124151, '#e3e3e3', 1000, 1),
(3, 'hawdawd 3', 124151, '#e3e3e3', 1000, 1),
(4, 'hq32dad', 124151, '#e3e3e3', 1000, 1),
(5, 'w4daa', 124151, '#e3e3e3', 1000, 1),
(6, 'hawdawd awda', 124151, '#e3e3e3', 1000, 1),
(7, 'yqeawd awd', 124151, '#e3e3e3', 1000, 1),
(8, 'yqeawd aw 8', 124151, '#e3e3e3', 1000, 0);

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
-- Struktur-dump for tabellen `sprints`
--

CREATE TABLE `sprints` (
  `sprint_id` int(11) NOT NULL,
  `sprint_name` varchar(255) NOT NULL,
  `sprint_month` int(11) NOT NULL,
  `sprint_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `sprints`
--

INSERT INTO `sprints` (`sprint_id`, `sprint_name`, `sprint_month`, `sprint_year`) VALUES
(1, 'January 2023', 1, 2023),
(2, 'February 2023', 2, 2023),
(3, 'March 2023', 3, 2023),
(4, 'April 2023', 4, 2023),
(5, 'May 2023', 5, 2023),
(6, 'June 2023', 6, 2023),
(7, 'July 2023', 7, 2023),
(8, 'August 2023', 8, 2023),
(9, 'September 2023', 9, 2023),
(10, 'October 2023', 10, 2023),
(11, 'November 2023', 11, 2023),
(12, 'December 2023', 12, 2023),
(13, 'January 2024', 1, 2024),
(14, 'February 2024', 2, 2024),
(15, 'March 2024', 3, 2024),
(16, 'April 2024', 4, 2024),
(17, 'May 2024', 5, 2024),
(18, 'June 2024', 6, 2024),
(19, 'July 2024', 7, 2024),
(20, 'August 2024', 8, 2024),
(21, 'September 2024', 9, 2024),
(22, 'October 2024', 10, 2024),
(23, 'November 2024', 11, 2024),
(24, 'December 2024', 12, 2024);

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
(50, 'x1', 3, 5, 1, '<p>hawdawd</p>', 1, 2, 2, 0, 1, 0, '2023-01-11 21:19:13', 0),
(51, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, quae.', 5, 5, 1, '<p>hawdawda</p>', 1, 1, 4, 0, 1, 0, '2023-01-11 21:20:22', 31),
(52, 'x2', 5, 5, 2, '<p>hawdawda</p>', 2, 1, 4, 0, 1, 0, '2023-01-11 21:20:22', 31),
(53, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, quae.', 5, 5, 3, '<p>hawdawda</p>', 3, 1, 4, 0, 1, 0, '2023-01-11 21:20:22', 31),
(54, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque quae minima cupiditate rem, magni quis!', 5, 5, 1, '<p>hawdawda</p>', 1, 1, 4, 0, 1, 0, '2023-01-11 21:21:06', 31),
(55, 'lawkdj alwkjd kajwhd kjawhd kjhawgdjh gavhwd', 3, 5, 1, '<p>hjasdælawjdk lawkd </p><p><br></p><p>alkwdjklawd</p><p><br></p><p><strong>akælwjdkawjdkawdjkajwkd a</strong></p>', 1, 1, 1, 0, 1, 0, '2023-01-11 23:41:02', 31),
(56, '2 lkQSJK AHWDKJL AHWJKD alkjwhjd ', 3, 5, 1, '<p>hjasdælawjdk lawkd </p><p><br></p><p>alkwdjklawd</p><p><br></p>', 1, 2, 3, 0, 1, 0, '2023-01-11 23:42:40', 31),
(57, '2 lkQSJK AHWDKJL AHWJKD alkjwhjd ', 3, 5, 2, '<p>hjasdælawjdk lawkd </p><p><br></p><p>alkwdjklawd</p><p><br></p>', 2, 2, 3, 0, 1, 0, '2023-01-11 23:42:40', 31),
(58, '3 akjwdjkawd', 3, 5, 1, '<p>hawdawgawdaw</p>', 1, 2, 3, 0, 1, 0, '2023-01-11 23:45:19', 31),
(59, '4 alkwjdlkawjd', 4, 5, 1, '<p>haælkwdjkaw dkaw dkaw</p><p><br></p>', 1, 1, 3, 0, 1, 0, '2023-01-11 23:48:29', 31),
(60, '5 .,awdkawj', 3, 5, 1, '<p><br></p>', 1, 2, 1, 0, 1, 0, '2023-01-11 23:49:10', 31),
(61, '6 akldkawjd', 3, 5, 1, '<p>aæwldj aklwjd klawd</p>', 1, 3, 1, 0, 1, 0, '2023-01-11 23:49:38', 31),
(62, '7 kajdkawjdk ', 3, 5, 1, '<p><br></p>', 1, 2, 2, 0, 1, 0, '2023-01-11 23:53:17', 31),
(63, '8 awkldj awlkjd ', 3, 5, 1, '<p><br></p>', 1, 2, 2, 0, 1, 0, '2023-01-11 23:58:52', 31),
(64, 'Test 1', 2, 5, 1, '<p><strong>hawdawdawda wd aw</strong></p>', 1, 6, 2, 0, 1, 0, '2023-01-15 13:34:49', 31),
(65, 'Test 1', 2, 5, 3, '<p><strong>hawdawdawda wd aw</strong></p>', 3, 6, 2, 0, 1, 0, '2023-01-15 13:34:49', 31),
(66, 'Test 1', 2, 5, 4, '<p><strong>hawdawdawda wd aw</strong></p>', 4, 6, 2, 0, 1, 0, '2023-01-15 13:34:49', 31);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `tasks_persons`
--

CREATE TABLE `tasks_persons` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `time_percentage_allocated` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `tasks_persons`
--

INSERT INTO `tasks_persons` (`id`, `task_id`, `person_id`, `time_percentage_allocated`) VALUES
(26, 50, 31, 0),
(27, 51, 31, 0),
(28, 51, 32, 0),
(29, 52, 31, 0),
(30, 52, 32, 0),
(31, 53, 31, 0),
(32, 53, 32, 0),
(33, 54, 31, 0),
(34, 55, 31, 0),
(35, 58, 31, 0),
(36, 59, 31, 0),
(37, 60, 32, 0),
(38, 61, 31, 0),
(39, 62, 31, 0),
(40, 63, 31, 0),
(41, 64, 31, 0),
(42, 64, 32, 0),
(43, 65, 31, 0),
(44, 65, 32, 0),
(45, 66, 31, 0),
(46, 66, 32, 0);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `task_labels`
--

CREATE TABLE `task_labels` (
  `label_id` int(11) NOT NULL,
  `label_name` varchar(255) NOT NULL,
  `label_color` varchar(255) NOT NULL DEFAULT '#36008D'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `task_labels`
--

INSERT INTO `task_labels` (`label_id`, `label_name`, `label_color`) VALUES
(1, 'None', '#FFFFFF'),
(2, 'Pre-Sale', '#50dbc8'),
(3, 'Ad-hoc', '#30afe8'),
(4, 'Kørsel', '#40abc8');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `task_verticals`
--

CREATE TABLE `task_verticals` (
  `task_vertical_id` int(11) NOT NULL,
  `task_vertical_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `task_verticals`
--

INSERT INTO `task_verticals` (`task_vertical_id`, `task_vertical_name`) VALUES
(1, 'SEO'),
(2, 'Paid Search');

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
(31, 'Drilon Braha 2', 'drilib4@hotmail.com', '$2y$10$Pf6nwA0Y8P6eB7MYVRsVYe9J.cjgqjWOSAaDYeBl35tjrk7/i6RWK', '01-01-2023', '63ba2bb75bb0b.png', 'Full Stack Developer', 1, 1),
(32, '123123', 'drilib5@hotmail.com', '$2y$10$tg7oAonk6B8JQmT1JLpl0eynd6gL0fpyC0MncbJO9SCwHBKke7pNi', '03-01-2023', 'none.svg', 'default', 0, 1),
(33, 'drilib6@hotmail.com', 'drilib6@hotmail.com', '$2y$10$E0VH7V8SH3Guy8ws3txJdeZ/KemId3xdCOuqPdwgnhIHnZifZQU9u', '03-01-2023', 'none.svg', 'default', 0, 1);

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
-- Indeks for tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks for tabel `darkmode`
--
ALTER TABLE `darkmode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `sprints`
--
ALTER TABLE `sprints`
  ADD PRIMARY KEY (`sprint_id`);

--
-- Indeks for tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indeks for tabel `tasks_persons`
--
ALTER TABLE `tasks_persons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `task_labels`
--
ALTER TABLE `task_labels`
  ADD PRIMARY KEY (`label_id`);

--
-- Indeks for tabel `task_verticals`
--
ALTER TABLE `task_verticals`
  ADD PRIMARY KEY (`task_vertical_id`);

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
-- Tilføj AUTO_INCREMENT i tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tilføj AUTO_INCREMENT i tabel `darkmode`
--
ALTER TABLE `darkmode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tilføj AUTO_INCREMENT i tabel `sprints`
--
ALTER TABLE `sprints`
  MODIFY `sprint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tilføj AUTO_INCREMENT i tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Tilføj AUTO_INCREMENT i tabel `tasks_persons`
--
ALTER TABLE `tasks_persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Tilføj AUTO_INCREMENT i tabel `task_labels`
--
ALTER TABLE `task_labels`
  MODIFY `label_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tilføj AUTO_INCREMENT i tabel `task_verticals`
--
ALTER TABLE `task_verticals`
  MODIFY `task_vertical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
