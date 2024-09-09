-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 11:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoteles`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `reviews` text NOT NULL,
  `score` text NOT NULL,
  `rating` text NOT NULL,
  `facities` text NOT NULL,
  `hotel_theme` text NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL,
  `paidcount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `price`, `reviews`, `score`, `rating`, `facities`, `hotel_theme`, `address`, `image`, `status`, `paidcount`) VALUES
(2, 'The Millennium Hilton New York', 88, '4.4', 'Excellent', '4', 'Air Conditioning,Airport Transport', 'Best value', '124 E Huron St, New york', 'img1.jpg', 1, 10),
(1, 'Ibis Styles London Heathrow', 100, '4.4', 'Very Good', '5', 'Airport Transport,Fitness Center', 'Boutique', '272 Bath Road, Harlington, England', 'img2.jpg', 1, 30),
(3, 'Hyatt Regency Maui Resort & Spa', 58, '', 'Average', '3', 'Fitness Center', 'Budget', '200 Nohea Kai Dr, Lahaina, HI', '/img3.jpg', 1, 5),
(4, 'Four Seasons Resort Maui at Wailea', 78, '', 'Poor', '2', 'Flat Tv,Fitness Center', 'Business', '3900 Wailea Alanui Drive, Kihei, HI', 'img4.jpg', 1, 13),
(5, 'Weissenhäuser Strand', 1000, '4.3', 'Terrible', '1', 'Heater,Fitness Center', 'Charming', '200 Nohea Kai Dr, Lahaina, HI', 'img5.jpg', 1, 10),
(6, 'aja Warnemünde', 800, '4.2', 'Very Good', '5', 'Internet – Wifi', 'Classic', '200 Nohea Kai Dr, Lahaina, HI', 'img6.jpg', 1, 25),
(7, 'Ostseehotel Dierhagen', 350, '4.2', 'Terrible', '3', 'Parking', 'Green', '200 Nohea Kai Dr, Lahaina, HI', 'img6.jpg', 1, 12),
(8, '\r\nDorfhotel Boltenhagen', 200, '4.2', 'Terrible', '3', 'Parking', 'Green', '200 Nohea Kai Dr, Lahaina, HI', 'img6.jpg', 1, 0),
(9, 'Ostseehotel Dierhagen', 350, '4.2', 'Terrible', '3', 'Parking', 'Green', '200 Nohea Kai Dr, Lahaina, HI', 'img6.jpg', 1, 0),
(10, 'Ostseehotel Dierhagen', 350, '4.2', 'Terrible', '3', 'Parking', 'Green', '200 Nohea Kai Dr, Lahaina, HI', 'img6.jpg', 1, 0),
(11, 'Strandhäuser Blankenfohrt Opens in new window\r\n', 350, '4.2', 'Terrible', '3', 'Parking', 'Green', '200 Nohea Kai Dr, Lahaina, HI', 'img6.jpg', 1, 0),
(12, 'Ostseehotel Dierhagen', 350, '4.2', 'Terrible', '3', 'Parking', 'Green', '200 Nohea Kai Dr, Lahaina, HI', 'img6.jpg', 1, 0),
(13, 'Ostseehotel Dierhagen', 350, '4.2', 'Terrible', '3', 'Parking', 'Green', '200 Nohea Kai Dr, Lahaina, HI', 'img6.jpg', 1, 0),
(14, 'Ostseehotel Dierhagen', 350, '4.2', 'Terrible', '3', 'Parking', 'Green', '200 Nohea Kai Dr, Lahaina, HI', 'img6.jpg', 1, 0),
(15, 'Ostseehotel Dierhagen', 350, '4.2', 'Terrible', '3', 'Parking', 'Green', '200 Nohea Kai Dr, Lahaina, HI', 'img6.jpg', 1, 0),
(16, 'Ostseehotel Dierhagen', 350, '4.2', 'Terrible', '3', 'Parking', 'Green', '200 Nohea Kai Dr, Lahaina, HI', 'img6.jpg', 1, 0),
(17, 'Ostseehotel Dierhagen', 350, '4.2', 'Terrible', '3', 'Parking', 'Green', '200 Nohea Kai Dr, Lahaina, HI', 'img6.jpg', 1, 0),
(18, 'Ostseehotel Dierhagen', 350, '4.2', 'Terrible', '3', 'Parking', 'Green', '200 Nohea Kai Dr, Lahaina, HI', 'img6.jpg', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
