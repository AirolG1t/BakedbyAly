-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 10:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carttable`
--

CREATE TABLE `carttable` (
  `cartId` varchar(500) NOT NULL,
  `cName` varchar(500) NOT NULL,
  `cPrice` int(255) NOT NULL,
  `cImage` varchar(1000) NOT NULL,
  `qty` int(255) NOT NULL,
  `totalPrice` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carttable`
--

INSERT INTO `carttable` (`cartId`, `cName`, `cPrice`, `cImage`, `qty`, `totalPrice`) VALUES
('19811', 'leGrand', 23, 'tower.png', 1, 23),
('42063', 'chocolate4', 31, 'cake2.png', 1, 31),
('30845', 'chocolate12', 333, '1698916973bryam-blanco-nXKWLn8y9qE-unsplash.jpg', 1, 333),
('59110', 'cupcake2000', 45, '1698917014joshua-flores-5RQffqRkmWQ-unsplash.jpg', 1, 45),
('30845', 'chocolate12', 333, '1698916973bryam-blanco-nXKWLn8y9qE-unsplash.jpg', 1, 333),
('59110', 'cupcake2000', 45, '1698917014joshua-flores-5RQffqRkmWQ-unsplash.jpg', 1, 45),
('59110', 'cupcake2000', 45, '1698917014joshua-flores-5RQffqRkmWQ-unsplash.jpg', 1, 45),
('30845', 'chocolate12', 333, '1698916973bryam-blanco-nXKWLn8y9qE-unsplash.jpg', 1, 333);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `random_msg_id` int(255) NOT NULL,
  `image` varchar(455) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `random_msg_id`, `image`) VALUES
(1, 402080954, 118625762, 'hello', 0, ''),
(2, 402080954, 118625762, 'hello', 0, ''),
(3, 402080954, 118625762, '', 146413815, 'Screenshot 2023-10-06 223514.png'),
(6, 402080954, 118625762, '', 567335921, 'Screenshot 2023-10-08 213407.png,Screenshot 2023-10-08 213702.png'),
(7, 402080954, 118625762, 'dhahda', 1551295170, ''),
(8, 402080954, 118625762, '', 277564593, 'Screenshot 2023-09-20 134814.png,Screenshot 2023-09-20 134830.png'),
(9, 402080954, 118625762, 'ndaihda', 14801214, ''),
(10, 402080954, 118625762, 'duaha', 974206194, 'Screenshot 2023-09-21 210620.png,Screenshot 2023-09-21 210739.png'),
(11, 118625762, 402080954, 'daa', 1025351200, ''),
(12, 402080954, 118625762, 'hczif', 741962637, ''),
(13, 402080954, 118625762, '', 981186162, 'logo-web.jpg,color-web.jpg'),
(14, 521088223, 118625762, 'hello', 133664437, ''),
(15, 402080954, 118625762, 'faehjf8heif', 1096981031, ''),
(16, 118625762, 402080954, 'faefaefae', 696829684, 'custcolor.jpg'),
(17, 118625762, 402080954, '', 1555463039, 'tower.png'),
(18, 402080954, 118625762, 'helloo', 1401376638, ''),
(19, 402080954, 118625762, 'faihefh', 561421140, 'Screenshot 2023-10-06 223514.png'),
(20, 402080954, 118625762, 'auidhaiuaehgrf', 751001721, ''),
(21, 402080954, 118625762, 'feaf', 237238325, 'Screenshot 2023-09-20 134830.png'),
(22, 118625762, 402080954, 'afhaief', 614728252, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_db`
--

CREATE TABLE `order_db` (
  `id` int(255) NOT NULL,
  `Oname` varchar(255) NOT NULL,
  `Odate` date NOT NULL,
  `randOid` varchar(1000) NOT NULL,
  `Osize` varchar(255) NOT NULL,
  `Ocategory` varchar(255) NOT NULL,
  `Ostatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_db`
--

INSERT INTO `order_db` (`id`, `Oname`, `Odate`, `randOid`, `Osize`, `Ocategory`, `Ostatus`) VALUES
(1, 'choclate cake', '2023-12-08', '4567888', 'Large', 'custom', 'Ongoing'),
(2, 'vanilla cake', '2023-07-26', '4985678', 'Medium', 'cake', 'Ongoing'),
(3, 'Caramel Cake', '2023-07-29', '5122575', 'Small', 'cake', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pid` varchar(1000) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `flavor` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `stock` varchar(1000) NOT NULL,
  `category` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `pid`, `price`, `image`, `flavor`, `size`, `stock`, `category`, `description`) VALUES
(45, 'leGrand4', '19811', '23', 'tower.png', 'Velvet', 'large', '46', 'cake', 'mjher hello'),
(46, 'chocolate4', '42063', '31', 'cake2.png', 'Velvet, Vanilla', 'large', '13', 'cake', 'fef'),
(51, 'chocolate12', '57639', '333', '1698916928bryam-blanco-nXKWLn8y9qE-unsplash.jpg', 'Chocolate, Caramel', 'small', '123', 'themecupcake', ''),
(52, 'chocolate12', '30845', '333', '1698916973bryam-blanco-nXKWLn8y9qE-unsplash.jpg', 'Chocolate, Caramel', 'small', '123', 'themecupcake', ''),
(53, 'cupcake2000', '59110', '45', '1698917014joshua-flores-5RQffqRkmWQ-unsplash.jpg', 'Moist Chocolate', 'small', '25', 'numberlettercupcake', 'tett'),
(54, 'fohjfe', '83633', '345', '1699249389dessy-dimcheva-zyMJwFBg8u8-unsplash.jpg', 'Chocolate, Moist Chocolate, Caramel', 'large, medium, small', '31', 'cake', 'arihieha aotjepoajta althiaehtoia atakhntnikoaehjtoa eajtioaht');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` int(255) NOT NULL,
  `img` varchar(400) NOT NULL,
  `status` varchar(255) NOT NULL,
  `userType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `contact`, `img`, `status`, `userType`) VALUES
(1, 118625762, 'airol', 'zabala', 'dwawfa@gmail.com', '1234', 0, '1695567456drnest.jpg', 'Offline now', 'admin'),
(2, 402080954, 'BMO', '  ', 'bmo20@gmail.com', '5678', 0, '1695568856ch1.jpg', 'Active now', 'customer'),
(3, 521088223, 'dawda', 'fawfaw', 'afe@email.com', 'hello', 0, '1697899446color-web.jpg', 'Offline now', 'customer'),
(4, 709968953, 'dawda', 'fawfwa', 'dawd@email.com', 'afwfa', 0, '1697899580logo-web.jpg', 'Offline now', 'customer'),
(5, 502115795, 'dwa', 'daw', 'towqe@gmail.com', 'asdfg', 0, '1697899767tower.png', 'active now', 'customer'),
(6, 326002987, 'jenn', 'ignacio', 'jenn@gmail.com', 'asdf', 0, '1699023328bryam-blanco-nXKWLn8y9qE-unsplash.jpg', 'Offline now', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `order_db`
--
ALTER TABLE `order_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_db`
--
ALTER TABLE `order_db`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
