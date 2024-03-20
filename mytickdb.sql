-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 03:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mytickdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comingmovies`
--

CREATE TABLE `comingmovies` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `images_path` varchar(50) NOT NULL,
  `cast` varchar(200) NOT NULL,
  `trailer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comingmovies`
--

INSERT INTO `comingmovies` (`id`, `name`, `images_path`, `cast`, `trailer`) VALUES
(15, 'Kanguva', 'kn.jpg', 'Suriya,Disha patani', 'https://youtu.be/oBlxdr1KbEA?si=GPDgXzSAlLasJO3v'),
(16, 'Indian 2', 'Indian_2_-_4_IT_1547788035006.jpg', 'Kamal Hassan', 'https://youtu.be/kqGj31bQQQ0?si=w7SbYliAj6cpelHc'),
(17, 'Thangalaan', 'tn.jpg', 'vikram,Malavika Mohan', 'https://youtu.be/W3A2mQdCS6g?si=0BhPK0-lPwPoCL61'),
(18, 'Pushpa 2', 'MV5BNGZlNTFlOWMtMzUw.jpg', 'Allu Arjun, Rashmika', 'https://youtu.be/jypuTb_5HWA?si=YWnBSUScFzfhTttP'),
(19, 'ARM', 'ARM1.jpg', 'Tovino', 'https://youtu.be/TWQjWLwY9ZE?si=Gw-zyJpaaM59VeiB');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(200) NOT NULL,
  `user_type` int(1) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `user_type`, `email`, `password`) VALUES
(1, 0, 'admin@gmail.com', 'password'),
(2, 1, 'demo@gmail.com', 'password'),
(3, 1, 'aswin@gmail.com', 'aswin'),
(4, 1, 'hi@gmail.com', 'hii'),
(5, 1, 'asaji9409@gmail.com', 'password'),
(6, 0, 'admin1@gmail.com', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `year` int(50) NOT NULL,
  `rating` double NOT NULL,
  `length` varchar(50) NOT NULL,
  `images_path` varchar(50) NOT NULL,
  `trailer` varchar(200) NOT NULL,
  `scrolling` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `type`, `year`, `rating`, `length`, `images_path`, `trailer`, `scrolling`) VALUES
(24, 'Aattam', 'comedy', 2024, 5, '2', '105876778.jpeg', 'https://youtu.be/2UczdNpVB1I?si=mVddZc6FdbtIiHYN', 'aattam-movie-review-new.jpg'),
(26, 'Ozler', 'Action,Thriller', 2024, 3, '2', 'ozler.jpg', 'https://youtu.be/txNRa0Qpu4A?si=ncO5RDS8YxDI2r3V', 'Abraham-Ozler-OTT-Release-Date-OTT-Platform-Satellite-Rights-and-More-2.jpeg'),
(28, 'Captain Miller', 'Action', 2024, 2, '2', 'cm.jpg', 'https://youtu.be/ujhWbKP1rKA?si=wZ_Wgql1hFVXYUnp', 'dhanush_.jfif'),
(29, 'Hanuman', 'Action', 2024, 2, '2', 'Hanu_Man_film_Release_poster.jpeg', 'https://youtu.be/Oqvly3MvlXA?si=1IQUITVRVH0mbAvf', 'hm.jpg'),
(30, 'Neru', 'Thriller', 2023, 4, '3', 'Neru-movie-hd-posters-002.jpeg', 'https://youtu.be/abuLOH7xs8I?si=c5HLaF8vRAycCfUO', 'neru-n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `movie_name` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `seatid` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `username`, `movie_name`, `total_price`, `seatid`, `order_date`) VALUES
(82, 'aswin@gmail.com', 'Aattam', 300.00, 0, '2024-01-12 02:09:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comingmovies`
--
ALTER TABLE `comingmovies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comingmovies`
--
ALTER TABLE `comingmovies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
