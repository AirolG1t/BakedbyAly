-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 12:36 PM
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
-- Database: `cake_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carttable`
--

CREATE TABLE `carttable` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cartId` varchar(500) NOT NULL,
  `cName` varchar(500) NOT NULL,
  `cPrice` int(255) NOT NULL,
  `cImage` varchar(1000) NOT NULL,
  `cFlavor` varchar(255) NOT NULL,
  `cSize` varchar(255) NOT NULL,
  `cCategory` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `totalPrice` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carttable`
--

INSERT INTO `carttable` (`id`, `user_id`, `cartId`, `cName`, `cPrice`, `cImage`, `cFlavor`, `cSize`, `cCategory`, `qty`, `totalPrice`) VALUES
(127, 2, '19811', 'leGrand4', 23, 'tower.png', 'Velvet', 'large', 'cake', 1, 23);

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
(22, 118625762, 402080954, 'afhaief', 614728252, ''),
(23, 402080954, 118625762, 'bruh', 239159775, ''),
(24, 521088223, 118625762, 'bruh 2', 386217085, ''),
(25, 118625762, 521088223, 'what', 79645842, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_db`
--

CREATE TABLE `order_db` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Opid` int(11) NOT NULL,
  `Oname` varchar(255) NOT NULL,
  `Odate` date NOT NULL,
  `randOid` varchar(1000) NOT NULL,
  `Oqty` int(11) NOT NULL,
  `Oprice` double NOT NULL,
  `Osize` varchar(255) NOT NULL,
  `Ocategory` varchar(255) NOT NULL,
  `Ostatus` varchar(255) NOT NULL,
  `Odedication` longtext NOT NULL,
  `Odatepickup` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_db`
--

INSERT INTO `order_db` (`id`, `user_id`, `Opid`, `Oname`, `Odate`, `randOid`, `Oqty`, `Oprice`, `Osize`, `Ocategory`, `Ostatus`, `Odedication`, `Odatepickup`) VALUES
(97, 2, 0, 'leGrand4', '2023-11-13', '3086317', 3, 23, 'large', 'cake', 'Pending', '', '0000-00-00'),
(98, 2, 0, 'chocolate4', '2023-11-13', '9249847', 1, 31, 'medium', 'cake', 'Pending', '', '0000-00-00'),
(99, 2, 0, 'fohjfe', '2023-11-13', '9249847', 3, 845, 'large', 'cake', 'Pending', '', '0000-00-00'),
(100, 2, 0, 'chocolate12', '2023-11-13', '4771925', 1, 333, 'medium', 'themecupcake', 'Ongoing', '', '0000-00-00'),
(101, 2, 0, 'cupcake2000', '2023-11-13', '2499598', 3, 45, 'small', 'numberlettercupcake', 'Ongoing', '', '0000-00-00'),
(102, 2, 0, 'chocolate123', '2023-11-13', '2499598', 1, 550, ' medium', 'themecupcake', 'Ongoing', '', '0000-00-00'),
(103, 2, 0, 'chocolate123', '2023-11-13', '6447153', 3, 550, ' medium', 'themecupcake', 'Pending', '', '0000-00-00'),
(104, 2, 0, 'chocolate4', '2023-11-13', '8703980', 1, 31, 'medium', 'cake', 'Pending', 'test dedication', '2023-12-12'),
(105, 2, 83633, 'fohjfe', '2023-11-14', '8802470', 2, 845, 'large', 'cake', 'Pending', '', '0000-00-00'),
(106, 2, 42063, 'chocolate4', '2023-11-15', '7035024', 1, 31, 'medium', 'cake', 'Pending', '', '0000-00-00');

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
(45, 'leGrand4', '19811', '23', 'tower.png', 'Velvet', 'large', '0', 'cake', 'mjher hello'),
(46, 'chocolate4', '42063', '31', 'cake2.png', 'Velvet, Vanilla', 'medium', '13', 'cake', 'fef'),
(51, 'chocolate12', '57639', '333', '1698916928bryam-blanco-nXKWLn8y9qE-unsplash.jpg', 'Chocolate, Caramel', 'medium, large', '123', 'themecupcake', ''),
(52, 'chocolate123', '30845', '300', '1698916973bryam-blanco-nXKWLn8y9qE-unsplash.jpg', 'Chocolate, Caramel', 'small, medium, large', '123', 'themecupcake', ''),
(53, 'cupcake2000', '59110', '45', '1698917014joshua-flores-5RQffqRkmWQ-unsplash.jpg', 'Moist Chocolate', 'small', '25', 'numberlettercupcake', 'tett'),
(54, 'fohjfe', '83633', '345', '1699249389dessy-dimcheva-zyMJwFBg8u8-unsplash.jpg', 'Chocolate, Moist Chocolate, Caramel', 'large, medium, small', '29', 'cake', 'arihieha aotjepoajta althiaehtoia atakhntnikoaehjtoa eajtioaht');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `payment_reference` varchar(255) NOT NULL,
  `payment_url` longtext NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_amount` double NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `payment_reference`, `payment_url`, `order_id`, `user_id`, `payment_amount`, `payment_status`, `payment_date`) VALUES
(12, 'cs_syvcJ87xZz72Kv1pgMh5jYNJ', 'https://checkout.paymongo.com/cs_syvcJ87xZz72Kv1pgMh5jYNJ_client_an6RAUGUDVAidEeKvUt1v3Vw#cGtfdGVzdF91MU1QbUF2REZteXEzMXF5TGhjZGh1SzQ=', 3086317, 2, 69, 'NOT YET PAID', NULL),
(13, 'cs_9zzZB7dq19Uiu5FGbQohVb2f', 'https://checkout.paymongo.com/cs_9zzZB7dq19Uiu5FGbQohVb2f_client_kj48McBM35vD7g42mJNnurEb#cGtfdGVzdF91MU1QbUF2REZteXEzMXF5TGhjZGh1SzQ=', 9249847, 2, 7636, 'NOT YET PAID', NULL),
(14, 'cs_51m1in3mvNj9SKkFEz6wPwTB', 'https://checkout.paymongo.com/cs_51m1in3mvNj9SKkFEz6wPwTB_client_ftqJDmno7DatAT1W3L6BcHi6#cGtfdGVzdF91MU1QbUF2REZteXEzMXF5TGhjZGh1SzQ=', 4771925, 2, 333, 'PAID', NULL),
(15, 'cs_ZUHPfbfvogNTEUk8BEnUps9f', 'https://checkout.paymongo.com/cs_ZUHPfbfvogNTEUk8BEnUps9f_client_5wLsGpGLD5sSX31SyMLCBf2t#cGtfdGVzdF91MU1QbUF2REZteXEzMXF5TGhjZGh1SzQ=', 2499598, 2, 685, 'PAID', NULL),
(16, 'cs_5dDTZwBPGYPja9bdgaitmRXN', 'https://checkout.paymongo.com/cs_5dDTZwBPGYPja9bdgaitmRXN_client_CMKZAn8XEbd9VG8ZpiFoECuW#cGtfdGVzdF91MU1QbUF2REZteXEzMXF5TGhjZGh1SzQ=', 6447153, 2, 3300, 'PAID', NULL),
(17, 'cs_bjbz9biN4ESHveGHF4Q1kAT2', 'https://checkout.paymongo.com/cs_bjbz9biN4ESHveGHF4Q1kAT2_client_Qm9hquHoErYpUf3Cbv1HDP8N#cGtfdGVzdF91MU1QbUF2REZteXEzMXF5TGhjZGh1SzQ=', 8703980, 2, 31, 'PAID', NULL),
(18, 'cs_KuKdWhcKJEL3mydq53K4Jf6D', 'https://checkout.paymongo.com/cs_KuKdWhcKJEL3mydq53K4Jf6D_client_6YEVULqKbg9gw4Jg4MGVnX3W#cGtfdGVzdF91MU1QbUF2REZteXEzMXF5TGhjZGh1SzQ=', 8802470, 2, 1690, 'PAID', NULL),
(19, 'cs_wvYDHthGwDTUXj3V8yWUx8dd', 'https://checkout.paymongo.com/cs_wvYDHthGwDTUXj3V8yWUx8dd_client_NZFu2TB3b5zNXdeqo4XLZxXf#cGtfdGVzdF91MU1QbUF2REZteXEzMXF5TGhjZGh1SzQ=', 7035024, 2, 31, 'NOT YET PAID', NULL);

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
  `contact` varchar(255) NOT NULL,
  `img` varchar(400) NOT NULL,
  `status` varchar(255) NOT NULL,
  `userType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `contact`, `img`, `status`, `userType`) VALUES
(1, 118625762, 'airol', 'zabala', 'admin', '123', '999999', '1695567456drnest.jpg', 'Active now', 'admin'),
(2, 402080954, 'Juan', 'Dela Cruz', 'accnt192@gmail.com', '5678', '09123456789', '1695568856ch1.jpg', 'Active now', 'customer'),
(3, 521088223, 'dawda', 'fawfaw', 'afe@email.com', 'hello', '0', '1697899446color-web.jpg', 'Offline now', 'admin'),
(4, 709968953, 'dawda', 'fawfwa', 'dawd@email.com', 'afwfa', '0', '1697899580logo-web.jpg', 'Offline now', 'customer'),
(5, 502115795, 'dwa', 'daw', 'towqe@gmail.com', 'asdfg', '0', '1697899767tower.png', 'active now', 'customer'),
(6, 326002987, 'jenn', 'ignacio', 'jenn@gmail.com', 'asdf', '0', '1699023328bryam-blanco-nXKWLn8y9qE-unsplash.jpg', 'Offline now', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carttable`
--
ALTER TABLE `carttable`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `carttable`
--
ALTER TABLE `carttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_db`
--
ALTER TABLE `order_db`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
