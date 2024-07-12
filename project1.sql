-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2024 at 12:56 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `title`, `description`, `img`, `username`, `create_at`) VALUES
(5, 'ádasdasd', 'ádasdasdasdasd', 'img/1720239608_6688c5f8d7a26.jpg', 'trongliem', '2024-07-06 11:20:08'),
(7, 'img 1', 'qwer qwer asdf zxcv asdf  hjkg bnmv rtyu ', 'img/1720241645_6688cded06dbc.jpg', 'trongliem', '2024-07-06 11:54:05'),
(8, 'img 3 ', 'Bind Parameter: Use bindParam to bind the actual selected category ID to the placeholder.', 'img/1720243313_6688d47197b5b.jpg', 'trongliem', '2024-07-06 12:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `created_at`) VALUES
(1, 'admin', '29-06-2024 07:26:26'),
(3, 'admin', '29-06-2024 07:30:54'),
(9, 'hello mọi người', '2024-06-29 07:36:24'),
(11, 'tôi là siu nhân\r\n', '2024-06-29 07:40:42'),
(15, 'san phamz', '2024-06-29 07:49:34'),
(16, 'san phamz', '2024-06-29 07:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `id` int NOT NULL,
  `url` text NOT NULL,
  `clicks` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `url`, `clicks`, `created_at`) VALUES
(4, 'https://www.youtube.com/', 6, '2024-06-29 08:25:47'),
(6, 'http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=project1&table=url', 5, '2024-06-29 15:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`) VALUES
(6, 'ngotrongliem2004@gmail.com', 'trongliem', '$2y$10$QNw1n55vqt41kj7v/pb7mOvx9KJasimKxMtvlEbdJrCCAQtk7/lVm'),
(7, 'ngotrongliem2004@gmail.com', 'Ngo Trong Liem', '$2y$10$O4V71txrFHfSgDEIxL2K2Om7UjommgM4cN9O34ypxOnnCyG5j0dBa'),
(8, 'ngotrongliem2004@gmail.com', 'Ngo Trong Liem', '$2y$10$U1tGXHmXrMho.eCOImvSu.uANSX.kXJu9SjLi/3HajnoX73Dya9rm'),
(9, 'liemntph36778@fpt.edu.vn23', 'Ngo Trong Liem', '$2y$10$Uxzfuk3ASZn9EyuxLu7qeuytxG2L6K7xLvB5a.XUb4Zxvd4kGgXQ6'),
(10, '0376278382@gmail.com', 'lim', '$2y$10$pxcNXkbTClUupp8H1HXyteorP99/P8rWJid.ND1Ag/dcNSWughKC6'),
(11, 'ngotrongliem2004@gmail.com', '123', '$2y$10$Qrxfv2muZrtTHPhv2i4xUeUVuD.U.GbSb6C28O/asrQYnJL/VJatC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
