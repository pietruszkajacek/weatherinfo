-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Paź 2014, 12:53
-- Wersja serwera: 5.6.20
-- Wersja PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `weatherinfo`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cities_weather`
--

CREATE TABLE IF NOT EXISTS `cities_weather` (
`id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `wind` varchar(255) NOT NULL,
  `visibility` varchar(255) NOT NULL,
  `skyconditions` varchar(255) NOT NULL,
  `temperature` varchar(255) NOT NULL,
  `dewpoint` varchar(255) NOT NULL,
  `relativehumidity` varchar(255) NOT NULL,
  `pressure` varchar(255) NOT NULL,
  `order_front_end` smallint(6) DEFAULT NULL,
  `show_front_end` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=105 ;

--
-- Zrzut danych tabeli `cities_weather`
--

INSERT INTO `cities_weather` (`id`, `country_name`, `city_name`, `location`, `wind`, `visibility`, `skyconditions`, `temperature`, `dewpoint`, `relativehumidity`, `pressure`, `order_front_end`, `show_front_end`) VALUES
(1, 'Poland', 'Katowice', 'Katowice, Poland (EPKT) 50-14N 019-02E 284M', ' from the ESE (120 degrees) at 3 MPH (3 KT) (direction variable):0', ' 4 mile(s):0', '', ' 68 F (20 C)', ' 59 F (15 C)', ' 72%', ' 29.91 in. Hg (1013 hPa)', 4, 1),
(9, 'Poland', 'Gdansk-Rebiechowo', '', '', '', '', '', '', '', '', NULL, 0),
(11, 'Poland', 'Krakow', '', '', '', '', '', '', '', '', NULL, 0),
(12, 'Chile', 'Arica', '', '', '', '', '', '', '', '', NULL, 0),
(15, 'Russian Federation', 'Cul''Man', 'Cul''Man, Russia (UELL) 56-50N 124-52E 858M', ' from the SSW (200 degrees) at 9 MPH (8 KT) gusting to 16 MPH (14 KT):0', ' greater than 7 mile(s):0', ' overcast', ' 62 F (17 C)', ' 59 F (15 C)', ' 88%', ' 29.65 in. Hg (1004 hPa)', 0, 1),
(26, 'Antarctica', 'Amundsen-Scott South Pole Statio', 'Amundsen-Scott South Pole Station, Antarctica (NZSP) 90-00S 00-00E 2835M', ' from the NNE (030 degrees) at 22 MPH (19 KT):0', ' less than 1 mile:0', ' mostly cloudy', ' -63 F (-53 C)', '', '', ' 27.96 in. Hg (946 hPa)', 8, 1),
(29, 'United States', 'NASA Shuttle Facility', 'Titusville, NASA Shuttle Landing Facility, FL, United States (KTTS) 28-37N 080-42W', ' from the ESE (110 degrees) at 3 MPH (3 KT):0', ' 10 mile(s):0', ' mostly clear', ' 75.0 F (23.9 C)', ' 68.4 F (20.2 C)', ' 79%', ' 30.08 in. Hg (1018 hPa)', 5, 1),
(32, 'United States', 'Portland, Portland-Troutdale Airport', '', '', '', '', '', '', '', '', NULL, 0),
(38, 'Japan', 'Hiroshima Airport', 'Hiroshima Airport, Japan (RJOA) 34-26N 132-55E 334M', ' from the NE (050 degrees) at 24 MPH (21 KT) gusting to 36 MPH (31 KT):0', ' 1 mile(s):0', ' mostly cloudy', ' 64 F (18 C)', ' 64 F (18 C)', ' 100%', ' 29.29 in. Hg (0992 hPa)', 6, 1),
(39, 'Japan', 'Nagasaki Airport', 'Nagasaki Airport, Japan (RJFU) 32-55N 129-55E 5M', ' from the N (350 degrees) at 26 MPH (23 KT):0', ' 5 mile(s):0', ' mostly cloudy', ' 69 F (21 C)', ' 66 F (19 C)', ' 88%', ' 29.23 in. Hg (0990 hPa)', 7, 1),
(47, 'Brazil', 'Barcelos', '', '', '', '', '', '', '', '', NULL, 0),
(59, 'China', 'Beijing', 'Beijing, China (ZBAA) 39-56N 116-17E 55M', ' from the S (170 degrees) at 4 MPH (4 KT):0', ' greater than 7 mile(s):0', '', ' 51 F (11 C)', ' 32 F (0 C)', ' 46%', ' 30.21 in. Hg (1023 hPa)', 3, 1),
(73, 'Egypt', 'Hurguada', 'Hurguada, Egypt (HEGN) 27-09N 033-43E 14M', ' from the NW (320 degrees) at 8 MPH (7 KT):0', ' greater than 7 mile(s):0', '', ' 73 F (23 C)', ' 48 F (9 C)', ' 40%', ' 29.91 in. Hg (1013 hPa)', 2, 1),
(88, 'Germany', 'Berlin-Schoenefeld', 'Berlin-Schoenefeld, Germany (EDDB) 52-23N 013-31E 50M', ' from the S (170 degrees) at 7 MPH (6 KT):0', ' greater than 7 mile(s):0', '', ' 64 F (18 C)', ' 57 F (14 C)', ' 77%', ' 29.80 in. Hg (1009 hPa)', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, '9ici.RhUot8oZV3zXnOHXu', 1268889823, 1413196344, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `weather_providers`
--

CREATE TABLE IF NOT EXISTS `weather_providers` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `wsdl` varchar(2048) NOT NULL,
  `connection_timeout` smallint(6) NOT NULL DEFAULT '5'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `weather_providers`
--

INSERT INTO `weather_providers` (`id`, `name`, `wsdl`, `connection_timeout`) VALUES
(1, 'Global Weather', 'http://www.webservicex.net/globalweather.asmx?WSDL', 9);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `cities_weather`
--
ALTER TABLE `cities_weather`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `country_name` (`country_name`,`city_name`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `weather_providers`
--
ALTER TABLE `weather_providers`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `cities_weather`
--
ALTER TABLE `cities_weather`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT dla tabeli `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `weather_providers`
--
ALTER TABLE `weather_providers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `users_groups`
--
ALTER TABLE `users_groups`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
