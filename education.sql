-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 03:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `content_key` varchar(255) DEFAULT NULL,
  `content_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `content_key`, `content_value`) VALUES
(1, 'about_text', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum pariatur fuga eveniet soluta aspernatur rem, nam voluptatibus voluptate voluptates sapiente, inventore. Voluptatem, maiores esse molestiae.</p>\r\n<ul>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>\r\n<li>Saepe a minima quod iste libero rerum dicta!</li>\r\n<li>Voluptas obcaecati, iste porro fugit soluta consequuntur. Veritatis?</li>\r\n<li>Ipsam deserunt numquam ad error rem unde, omnis.</li>\r\n<li>Repellat assumenda adipisci pariatur ipsam eos similique, explicabo.</li>\r\n</ul>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quaerat harum facilis excepturi et? Mollitia!</p>'),
(2, 'about_video', 'https://www.youtube.com/watch?v=YyfNdC65uKk&ab_channel=AestheticSky');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `long_desc` text DEFAULT NULL,
  `duration` int(11) NOT NULL DEFAULT 0,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `attachment`, `short_desc`, `long_desc`, `duration`, `price`, `date`) VALUES
(1, 'Drawing', NULL, 'Lorem ipsum dolor sit amet,', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu ante felis. Vivamus nec viverra tortor, sit amet dictum sem. Nam molestie nisl eget nulla blandit ultricies. Nullam vehicula cursus eros eget pellentesque. ', 75, '165.00', '2022-08-11 12:41:19'),
(2, 'Engineering', NULL, 'Lorem ipsum dolor sit amet,', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu ante felis. Vivamus nec viverra tortor, sit amet dictum sem. Nam molestie nisl eget nulla blandit ultricies. Nullam vehicula cursus eros eget pellentesque. ', 75, '30.00', '2022-08-11 12:44:19'),
(3, 'fdsgf', NULL, 'gfdgddfgdfgdfggfdgdfg', 'gfdgfdgfdfdg gfdgfdgfdfdg gfdgfdgfdfdg gfdgfdgfdfdg gfdgfdgfdfdg gfdgfdgfdfdg gfdgfdgfdfdg gfdgfdgfdfdg gfdgfdgfdfdg ', 150, '25.00', '2022-08-11 17:42:53'),
(4, 'ghfhghg', NULL, 'gfhgfhgh gf gfhgf dfhtyghn dghguygfhjg', 'gfhgfhgh gf gfhgf dfhtyghn dghguygfhjg gfhgfhgh gf gfhgf dfhtyghn dghguygfhjg gfhgfhgh gf gfhgf dfhtyghn dghguygfhjg gfhgfhgh gf gfhgf dfhtyghn dghguygfhjg', 12, '100.00', '2022-08-11 18:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_2` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `attachment` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `title_2`, `description`, `attachment`, `date`) VALUES
(1, 'dsgsd', 'dfsgfdsgdhfh h fhdfhfd hdfh', 'fgfgg dfgfd hfhdfh dfhfdhdfhewt gftyt ', 1660224268, '2022-08-11 18:54:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
