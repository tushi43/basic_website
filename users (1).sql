-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 08:53 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `aproducts`
--

CREATE TABLE `aproducts` (
  `id` int(5) NOT NULL,
  `name` varchar(25) NOT NULL,
  `code` int(5) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `quant` int(5) NOT NULL DEFAULT '20'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aproducts`
--

INSERT INTO `aproducts` (`id`, `name`, `code`, `image`, `price`, `quant`) VALUES
(1, 'Philip Mixer', 1, '1.jpg', 1500.00, 20),
(2, 'Haier Washing Machine', 2, '2.jpg', 6500.00, 20),
(3, 'Bajaj Iron', 3, '3.jpg', 450.00, 20),
(4, 'L.G. Mini-regrigerator', 4, '4.jpg', 15000.00, 20),
(5, 'Tonze Cooker', 5, '5.jpg', 650.00, 20),
(6, 'Inalsa Oven', 6, '6.jpg', 1500.00, 20),
(7, 'Sony LED TV', 7, '7.jpg', 46000.00, 20),
(8, 'Lenovo G50-80', 8, '8.jpg', 32000.00, 20),
(9, 'Apple 5S', 9, '9.jpg', 18000.00, 20),
(10, 'Canon EOS 1200D', 10, '10.jpg', 32000.00, 20);

-- --------------------------------------------------------

--
-- Table structure for table `hproducts`
--

CREATE TABLE `hproducts` (
  `id` int(5) NOT NULL,
  `name` varchar(25) NOT NULL,
  `code` int(5) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `quant` int(5) NOT NULL DEFAULT '15'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hproducts`
--

INSERT INTO `hproducts` (`id`, `name`, `code`, `image`, `price`, `quant`) VALUES
(1, 'Colorful bag', 211, '211.jpg', 750.00, 15),
(2, 'Colourful sofa cum chair', 221, '221.jpg', 599.00, 15),
(3, 'Sofa', 231, '231.jpg', 799.00, 15),
(4, 'Magic Lamp', 241, '241.jpg', 299.00, 15),
(5, 'Birthday College', 253, '253.jpg', 899.00, 15),
(6, 'Taj Sheet', 262, '262.jpg', 399.00, 15),
(7, 'Carved Lamp', 272, '272.jpg', 349.00, 15),
(8, 'Colourful Pot', 1131, '1131.jpg', 649.00, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telephone` int(15) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(15) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `telephone`, `address`, `password`, `state`, `city`, `pin`) VALUES
(1, 'ajay', 'Ajay\r\n', 'Jumani', 'aj@hotmail.com', 987456321, '  MUM', 'asdf', 'maharashta', 'Mumbai', 40072),
(2, 'rd', 'Rahul\r\n', 'Dhameja', 'rd@hotmail.com', 789654123, '  Ulhasnagar building no. 55', 'asdf', 'maharashta', 'Mumbai', 400074),
(3, 'Tushi', 'Tushar\r\n', 'jumani', 'tj@ves.ac.in', 2147483647, '  R.C.barrack no. 30,room no.464, chembur colony, chembur ', 'poiu', 'maharashta', 'Mumbai', 400074),
(4, 'Yb', 'Yashika\r\n', 'Bhatia', 'yb@hotmail.com', 56842565, '  Titwal mandir Building ', 'qwerty', 'maharashta', 'Mumbai', 475844);

-- --------------------------------------------------------

--
-- Table structure for table `wproducts`
--

CREATE TABLE `wproducts` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` int(10) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `quant` int(10) NOT NULL DEFAULT '20'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wproducts`
--

INSERT INTO `wproducts` (`id`, `name`, `code`, `image`, `price`, `quant`) VALUES
(1, 'wooden toy', 111, '111.jpg', 500.00, 20),
(2, 'Wooden toy2', 121, '121.jpg', 500.00, 20),
(3, 'Elephant Showpiece', 131, '131.jpg', 350.00, 20),
(4, 'Rook piece', 141, '141.jpg', 450.00, 20),
(5, 'Beyblade', 151, '151.jpg', 550.00, 20),
(6, 'Glass fish', 161, '161.jpg', 250.00, 20),
(7, 'Dog wheeler', 171, '171.jpg', 250.00, 20),
(8, 'Stack play toy', 181, '181.jpg', 150.00, 20),
(9, 'Unique pencil box', 1011, '1011.jpg', 650.00, 20),
(10, 'Antique Clock', 312, '312.jpg', 350.00, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aproducts`
--
ALTER TABLE `aproducts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `hproducts`
--
ALTER TABLE `hproducts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `wproducts`
--
ALTER TABLE `wproducts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aproducts`
--
ALTER TABLE `aproducts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hproducts`
--
ALTER TABLE `hproducts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `wproducts`
--
ALTER TABLE `wproducts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
