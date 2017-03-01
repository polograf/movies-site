-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Mar 2017, 17:46
-- Wersja serwera: 10.1.19-MariaDB
-- Wersja PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `moviesite`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `actors`
--

CREATE TABLE `actors` (
  `actor_id` int(11) NOT NULL,
  `actor_fullname` text NOT NULL,
  `actor_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `actors`
--

INSERT INTO `actors` (`actor_id`, `actor_fullname`, `actor_image`) VALUES
(1, 'Jim Carrey', ''),
(2, 'Kevin Kline', ''),
(3, 'Ron Livingston', ''),
(4, 'Borys Szyc', ''),
(5, 'Jaden Smith', ''),
(6, 'Trevante Rhodes', ''),
(7, 'Izabela Kuna', ''),
(8, 'Charlie Chaplin', ''),
(9, 'Sam Worthington', ''),
(10, 'Casey Affleck', ''),
(11, 'Taraji P. Henson', ''),
(15, 'Matthew McConaughey', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `directors`
--

CREATE TABLE `directors` (
  `director_id` int(11) NOT NULL,
  `director_fullname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `directors`
--

INSERT INTO `directors` (`director_id`, `director_fullname`) VALUES
(1, 'Tom Shadyac\r\n'),
(2, 'Mike Judge'),
(3, 'Harald Zwart'),
(4, 'Barry Jenkins'),
(5, 'Cyprian T. Olencki'),
(6, 'Charlie Chaplin'),
(7, 'Kenneth Lonergan'),
(8, 'Lawrance Kasadan'),
(9, 'James Cameron'),
(10, 'Theodore Melfi'),
(13, 'Garth Jennings');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `movie_type` int(2) NOT NULL DEFAULT '0',
  `movie_year` int(4) NOT NULL DEFAULT '0',
  `movie_leadactor` int(11) NOT NULL DEFAULT '0',
  `movie_director` int(11) NOT NULL DEFAULT '0',
  `movie_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_name`, `movie_type`, `movie_year`, `movie_leadactor`, `movie_director`, `movie_image`) VALUES
(1, 'Bruce Almighty', 5, 2003, 1, 1, 'images/movies/bruce.png'),
(2, 'Office Space', 5, 1999, 3, 2, 'images/movies/life.jpg'),
(3, 'Grand Canyon', 2, 1991, 2, 8, 'images/movies/grand.jpg'),
(4, 'Manchester by the Sea', 2, 2017, 10, 7, 'images/movies/manchester.jpg'),
(5, 'Karate Kid', 5, 2010, 5, 3, 'images/movies/karate.jpg'),
(6, 'Moonlight', 2, 2016, 6, 4, 'images/movies/moonlight.jpg'),
(7, 'PolandJa', 5, 2017, 7, 5, 'images/movies/polandja.jpg'),
(8, 'A Dog''s Life', 9, 1918, 8, 6, 'images/movies/dogs.jpg'),
(9, 'Avatar', 1, 2009, 9, 9, 'images/movies/avatar.jpg'),
(10, 'Hidden Figures', 2, 2016, 11, 10, 'images/movies/hidden.jpg'),
(11, 'Sing', 8, 2016, 15, 13, 'images/movies/sing.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `movietype`
--

CREATE TABLE `movietype` (
  `movietype_id` int(11) NOT NULL,
  `movietype_label` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `movietype`
--

INSERT INTO `movietype` (`movietype_id`, `movietype_label`) VALUES
(1, 'Scince-fiction'),
(2, 'Drama'),
(3, 'Adventure'),
(4, 'War'),
(5, 'Comedy'),
(6, 'Horror'),
(7, 'Action'),
(8, 'For Kids'),
(9, 'Melodrama'),
(10, 'Theatre'),
(11, 'Animation');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review_movie_id` int(11) NOT NULL,
  `review_date` date NOT NULL,
  `review_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `review_comment` varchar(255) CHARACTER SET latin1 NOT NULL,
  `review_rating` int(11) NOT NULL DEFAULT '0',
  `review_signature` text CHARACTER SET latin1 NOT NULL,
  `review_image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `reviews`
--

INSERT INTO `reviews` (`review_id`, `review_movie_id`, `review_date`, `review_name`, `review_comment`, `review_rating`, `review_signature`, `review_image`) VALUES
(39, 9, '2017-03-01', '"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros elit, ornare nec ipsum sed, mollis hendrerit sem. Nam velit arcu, semper vitae bibendum eget, auctor at erat. Nunc tristique, justo at condimentum lobortis, nibh tellus faucibus massa, eu', 5, 'Lorem ipsum', 'images/avatars/1.png '),
(40, 9, '2017-03-01', '"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros elit, ornare nec ipsum sed, mollis hendrerit sem. Nam velit arcu, semper vitae bibendum eget, auctor at erat. Nunc tristique, justo at condimentum lobortis, nibh tellus faucibus massa, eu', 2, 'Lorem ipsum', 'images/avatars/3.png '),
(41, 1, '2017-03-01', '"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros elit, ornare nec ipsum sed, mollis hendrerit sem. Nam velit arcu, semper vitae bibendum eget, auctor at erat. Nunc tristique, justo at condimentum lobortis, nibh tellus faucibus massa, eu', 4, 'Lorem Ipsum', 'images/avatars/1.png '),
(42, 1, '2017-03-01', '"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros elit, ornare nec ipsum sed, mollis hendrerit sem. Nam velit arcu, semper vitae bibendum eget, auctor at erat. Nunc tristique, justo at condimentum lobortis, nibh tellus faucibus massa, ', 5, 'Lorem Ipsum', 'images/avatars/6.png '),
(43, 2, '2017-03-01', '"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros elit, ornare nec ipsum sed, mollis hendrerit sem. Nam velit arcu, semper vitae bibendum eget, auctor at erat. Nunc tristique, justo at condimentum lobortis, nibh tellus faucibus massa, ', 2, 'Lorem Ipsum', 'images/avatars/6.png '),
(44, 2, '2017-03-01', '"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros elit, ornare nec ipsum sed, mollis hendrerit sem. Nam velit arcu, semper vitae bibendum eget, auctor at erat. Nunc tristique, justo at condimentum lobortis, nibh tellus faucibus massa, ', 4, 'Lorem Ipsum', 'images/avatars/3.png '),
(45, 3, '2017-03-01', '"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros elit, ornare nec ipsum sed, mollis hendrerit sem. Nam velit arcu, semper vitae bibendum eget, auctor at erat. Nunc tristique, justo at condimentum lobortis, nibh tellus faucibus massa, ', 1, 'Lorem Ipsum', 'images/avatars/2.png '),
(46, 3, '2017-03-01', '"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros elit, ornare nec ipsum sed, mollis hendrerit sem. Nam velit arcu, semper vitae bibendum eget, auctor at erat. Nunc tristique, justo at condimentum lobortis, nibh tellus faucibus massa, eu', 3, 'Lorem Ipsum', 'images/avatars/6.png '),
(47, 3, '2017-03-01', '"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros elit, ornare nec ipsum sed, mollis hendrerit sem. Nam velit arcu, semper vitae bibendum eget, auctor at erat. Nunc tristique, justo at condimentum lobortis, nibh tellus faucibus massa, eu', 3, 'Lorem Ipsum', 'images/avatars/5.png '),
(48, 11, '2017-03-01', '"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consectetur, justo non congue semper, felis eros bibendum lacus, eu venenatis ligula ligula sit amet tortor. Praesent gravida pharetra nibh in semper. Donec dapibus elit eu nisl ultricies vulp', 5, 'Lorem Ipsum', 'images/avatars/2.png ');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`actor_id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`director_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`),
  ADD KEY `movie_type` (`movie_type`,`movie_year`);

--
-- Indexes for table `movietype`
--
ALTER TABLE `movietype`
  ADD PRIMARY KEY (`movietype_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `review_movie_id` (`review_movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `actors`
--
ALTER TABLE `actors`
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT dla tabeli `directors`
--
ALTER TABLE `directors`
  MODIFY `director_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT dla tabeli `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT dla tabeli `movietype`
--
ALTER TABLE `movietype`
  MODIFY `movietype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT dla tabeli `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
