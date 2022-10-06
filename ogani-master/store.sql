-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 05:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` bigint(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `cimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `cname`, `cimage`) VALUES
(6, 'Fresh Meat', '1028952722.jpg'),
(7, 'Vegetables', '1345830665.jpg'),
(8, 'Fresh Fruits', '1664593252.jpg'),
(11, 'Fruits and Nuts Gifts', '566682059.jpg'),
(12, 'Fresh Drinks', '114551493.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `oid` bigint(20) NOT NULL,
  `date_ordered` date NOT NULL,
  `complete_status` varchar(255) NOT NULL,
  `customer_id` bigint(255) NOT NULL,
  `ammount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`oid`, `date_ordered`, `complete_status`, `customer_id`, `ammount`) VALUES
(1, '2022-09-21', 'Pending', 4, 400),
(2, '2022-09-15', 'Approved', 2, 2000),
(3, '2022-09-17', 'Shipped', 2, 400),
(5, '2022-09-09', 'Delivered', 2, 300),
(15, '2022-10-04', 'Pending', 2, 930),
(16, '2022-10-04', 'Pending', 2, 700),
(17, '2022-10-05', 'Pending', 2, 2400),
(18, '2022-10-05', 'Pending', 2, 230);

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `otid` bigint(20) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`otid`, `quantity`, `order_id`, `product_id`) VALUES
(1, 2, 2, 13),
(2, 4, 2, 12),
(3, 1, 15, 11),
(4, 1, 15, 12),
(5, 1, 16, 12),
(6, 6, 17, 13),
(7, 5, 17, 10),
(8, 1, 18, 11);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` bigint(255) NOT NULL,
  `pname` varchar(245) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `pprice` bigint(20) NOT NULL,
  `pdescription` text NOT NULL,
  `pimage` varchar(255) NOT NULL,
  `pquantity` bigint(20) NOT NULL,
  `date_added` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `category_id`, `pprice`, `pdescription`, `pimage`, `pquantity`, `date_added`) VALUES
(7, 'Beef Meat', 6, 500, 'This is fresh beef meet', '1588399922.jpg', 100, '2022-09-09'),
(10, 'Potatos', 7, 300, 'This is vagetables', '977145895.jpg', 78, '2022-09-07'),
(11, 'Mangoes', 8, 230, 'This is Fresh Fruits', '1221884262.jpg', 67, '2022-09-15'),
(12, 'Mutton', 6, 700, 'Hello this is the mutton meat', '2034420398.jpg', 35, '2022-09-23'),
(13, 'Lady Finger', 7, 150, ' wdsksdhksd', '235612159.jpg', 55, '2022-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rid` bigint(20) NOT NULL,
  `product_id` bigint(255) NOT NULL,
  `customer_id` bigint(255) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rid`, `product_id`, `customer_id`, `rate`) VALUES
(1, 7, 24, 3),
(2, 12, 24, 3.4),
(3, 13, 24, 4),
(4, 11, 24, 4.5),
(5, 10, 24, 3),
(6, 7, 2, 3.1),
(7, 13, 2, 3.2),
(8, 11, 2, 3.9),
(9, 10, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `shippingaddress`
--

CREATE TABLE `shippingaddress` (
  `shipid` bigint(20) NOT NULL,
  `country` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `zip` int(20) NOT NULL,
  `order_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shippingaddress`
--

INSERT INTO `shippingaddress` (`shipid`, `country`, `city`, `address`, `zip`, `order_id`) VALUES
(4, 'Pakistan', 'Lahore', 'Central park', 60000, 15),
(5, 'Pakistan', 'Lahore', 'Central park', 60000, 16),
(6, 'Pakistan', 'Lahore', 'Central park', 60000, 17),
(7, 'Pakistan', 'Lahore', 'Central park', 60000, 18);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` bigint(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` bigint(255) NOT NULL,
  `datecreated` date NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`, `datecreated`, `image`, `role`) VALUES
(2, 'Ali', 'Hamza', 'Alihamza', '202cb962ac59075b964b07152d234b70', 'alihamza@gmail.com', 345267188, '2022-09-09', 'image1.jpg', 1),
(4, 'Sajjad', 'Ahmad', 'sajjadahmad', '827ccb0eea8a706c4c34a16891f84e7b', 'sajjadahmad@gmail.com', 929372393, '2022-09-20', 'image1.jpg', 1),
(24, 'Akram', 'haider', 'akramhaider', '81dc9bdb52d04dc20036dbd8313ed055', 'saad@gmail.com', 15263723, '2022-09-15', '1616079839.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `fk4` (`customer_id`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`otid`),
  ADD KEY `fk` (`product_id`),
  ADD KEY `fk2` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `fk5` (`customer_id`),
  ADD KEY `fk6` (`product_id`);

--
-- Indexes for table `shippingaddress`
--
ALTER TABLE `shippingaddress`
  ADD PRIMARY KEY (`shipid`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `oid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `otid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shippingaddress`
--
ALTER TABLE `shippingaddress`
  MODIFY `shipid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`customer_id`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`order_id`) REFERENCES `order` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`catid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`customer_id`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk6` FOREIGN KEY (`product_id`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shippingaddress`
--
ALTER TABLE `shippingaddress`
  ADD CONSTRAINT `shippingaddress_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
