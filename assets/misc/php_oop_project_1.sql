-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 03. 01 2023 kl. 14:20:06
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
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL DEFAULT 'none.png',
  `user_role` int(255) NOT NULL,
  `user_activated` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `profile_image`, `user_role`, `user_activated`) VALUES
(24, 'drilib@hotmail.com', '51231@h.com', '$2y$10$TXtNGWj2CIUv8hFfW8J6GeZXZqQ9E6siGGtbk7zgROy0wboaYErXm', '01-01-2023', 'none.png', 0, 0),
(25, 'aæklwdj', 'ajwdaw@h.com', '$2y$10$eaJDGOlJLpyc2P38ijIgdOfACIAqvrLgmSYSMPC2vFbuJdT/2zitW', '01-01-2023', 'none.png', 0, 0),
(26, 'awlkdj', 'lakwjdajlkwd@h.com', '$2y$10$XVKXIJALQE4ZsTnwLgdnV.cs80UpI9TroEXQp5r13IPUppHJDtDZO', '01-01-2023', 'none.png', 0, 0),
(27, 'a.klwjdkl', 'awdawghawdawd@h.com', '$2y$10$ZK9sR0LEqH1dX6q7QSXDKeBS4BGOcIACLYhAEq3L9rvPbdiT6.q4K', '01-01-2023', 'none.png', 0, 0),
(28, 'drilib2@hotmail.com', 'drilib2@hotmail.com', '$2y$10$MhqMXA9iUzuMJxGkHkLSZOojfHSD60IByGF7LvA/tuyXhfpap/p.K', '01-01-2023', 'none.png', 0, 0),
(29, 'lawdalwkdja@h.com', 'lawdalwkdja@h.com', '$2y$10$.Q4tMD5cIEXDoMUOYxcXv.JxvG.iDppTNTi8k330v1kYF3dHGglXm', '01-01-2023', 'none.png', 0, 0),
(30, 'drilib3@hotmail.com', 'drilib3@hotmail.com', '$2y$10$zFdH7a2PSomt54FeroSGJupK3vdttoBUHBHz8VfcGGpgrdsB2XUaq', '01-01-2023', 'none.png', 0, 0),
(31, 'drilib4@hotmail.com', 'drilib4@hotmail.com', '$2y$10$vuHd1b4I9ihKLqozwaIbReqU3B0EgD8udfMOI1CQlgXRrxx/0uRkC', '01-01-2023', 'none.png', 0, 1),
(32, '123123', 'drilib5@hotmail.com', '$2y$10$tg7oAonk6B8JQmT1JLpl0eynd6gL0fpyC0MncbJO9SCwHBKke7pNi', '03-01-2023', 'none.png', 0, 0),
(33, 'drilib6@hotmail.com', 'drilib6@hotmail.com', '$2y$10$E0VH7V8SH3Guy8ws3txJdeZ/KemId3xdCOuqPdwgnhIHnZifZQU9u', '03-01-2023', 'none.png', 0, 0);

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
