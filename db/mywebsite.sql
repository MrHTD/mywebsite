-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 01:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mywebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `role`) VALUES
(1, 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1),
(2, 'ahmed01', 'c53c4cc302010b9506bc9ca7266e1e8f75ab1513', 1),
(3, 'other', 'd0941e68da8f38151ff86a61fc59f7c5cf9fcaa2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'GAMING', 3);

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `playlist_id` int(11) NOT NULL,
  `playlist_name` varchar(100) NOT NULL,
  `playlist_url` text NOT NULL,
  `playlist_date` text NOT NULL,
  `playlist_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`playlist_id`, `playlist_name`, `playlist_url`, `playlist_date`, `playlist_image`) VALUES
(1, 'HORIZON FORBIDDEN WEST', 'https://www.youtube.com/playlist?list=PLuYfgeocxT-ki3gfviDi9YvgQB1fefpCG', '2022-02-27T13:27', 'horizon.jpg'),
(3, 'HITMAN 3', 'https://www.youtube.com/watch?v=Aph_-7Eh02Q&list=PLuYfgeocxT-mZ2Z37uiNCfzQJEiIQfc2r', '2023-02-05T13:38', 'XX85ZND1RuA13iphoE1Qb7ex.png'),
(4, 'HOGWARTS LEGACY', 'https://www.youtube.com/playlist?list=PLuYfgeocxT-mtwC1IVhvxlhXMDoLXg2Nb', '2023-02-10T13:38', 'hogwarts.png'),
(5, 'MODERN WARFARE 2', 'https://www.youtube.com/playlist?list=PLuYfgeocxT-mtQfSvrlSecYKf59MqD9z7', '2022-10-23T13:41', 'cod_mw2.jpg'),
(6, 'GOD OF WAR RAGNARöK', 'https://www.youtube.com/playlist?list=PLuYfgeocxT-lDJ_s0OgBUdrzixGRuIdS0', '2022-11-09T17:08', '4xJ8XB3bi888QTLZYdl7Oi0s.png'),
(7, 'A PLAGUE TALE REQUIEM', 'https://www.youtube.com/playlist?list=PLuYfgeocxT-nAdL-FKCboVGgpGcM_hCf6', '2022-10-18T17:09', 'plague_tale.jpg'),
(8, 'GHOST OF TSUSHIMA', 'https://www.youtube.com/playlist?list=PLuYfgeocxT-kzTtdfJ17YWdoBPPdjaUam', '2022-06-17T17:10', 'ghost.jpg'),
(9, 'STRAY', 'https://www.youtube.com/playlist?list=PLuYfgeocxT-m5FYx3cvmbqSGNJBvQ5PRB', '2022-07-21T17:13', 'Stray_cover_art.jpg'),
(10, 'RATCHET AND CLANK RIFT APART', 'https://www.youtube.com/playlist?list=PLuYfgeocxT-lpbfZl1XMhNAG85_ZwSjOr', '2022-04-19T17:15', 'DwVjpbKOsFOyPdNzmSTSWuxG.jpg'),
(11, 'LEGO STAR WARS THE SKYWALKER SAGA', 'https://www.youtube.com/playlist?list=PLuYfgeocxT-lVTgs1fihMz0RkyI5AnNy1', '2022-05-07T17:15', 'qrpfY71rsvMn6beyjgStw3cH.png'),
(12, 'MARVEL\'S SPIDER-MAN: MILES MORALES PS5', 'https://www.youtube.com/playlist?list=PLuYfgeocxT-kakPnVr9MwO2xJGdi6w13o', '2022-05-17T17:17', 'spider.jpg'),
(13, 'UNCHARTED 4 A THIEF’S END', 'https://www.youtube.com/playlist?list=PLuYfgeocxT-kKa2RcgVi-uIMvXTw7C96n', '2021-05-17T17:18', 'SGqMZHd7WWmN4XIcLfYMxJsc.png'),
(14, 'DAYS GONE', 'https://www.youtube.com/watch?v=aKoWaIGQdAY&list=PLuYfgeocxT-lLSCmRd4H9JIJAu2Wh3He6', '2021-02-25T17:21', 'wYL4v2r8uMQFvVTJlfuj8ICk.jpg'),
(15, 'DYING LIGHT 2', 'https://www.youtube.com/watch?v=D66_sflLtKw&list=PLuYfgeocxT-nVjDtajcuYUBrh_L-NjaPH', '2022-02-22T17:32', 'ab67616d0000b2731191472294b5568cb4230b51.jpg'),
(16, 'GOD OF WAR', 'https://www.youtube.com/watch?v=H-25GZSWaBg&list=PLuYfgeocxT-nFygSN6HzT9sNapMwnBONJ', '2022-01-25T17:33', 'god-of-war-hub-thumbnail-2018-en-29jul21.jpg'),
(17, 'RESIDENT EVIL 2 REMAKE', 'https://www.youtube.com/playlist?list=PLuYfgeocxT-k39MtzZOf33Qu811e-U3K3', '2020-01-24T17:34', 'uDFoGvnMTTCLVmTwjj0njGWC.png');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL,
  `post_date` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `post_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(3, 'FARCRY 6', '<p><strong>Far Cry 6 is a 2021 first-person shooter game developed by Ubisoft Toronto and published by Ubisoft. It is the sixth main installment in the Far Cry series and the successor to 2018s Far Cry 5.</strong></p>', 1, '25 Feb 2023', 'UBISOFT', 'xqoTYwf0S55ro6fwcIIY1KI4.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`playlist_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `playlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
