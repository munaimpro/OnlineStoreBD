-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 09:33 AM
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
-- Database: `db_shopproject1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`) VALUES
(1, 'Munaim Khan', 'munaim', 'munaim@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'IPHONE'),
(2, 'SAMSUNG'),
(3, 'ACER'),
(4, 'CANON');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `productId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Accessories'),
(2, 'Mobile Phones'),
(3, 'Clothing'),
(4, 'Fruits'),
(5, 'Organic Food'),
(6, 'Grocery');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `cmrId` varchar(255) NOT NULL,
  `productId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `email`, `address`, `phone`, `pass`, `city`, `zip`, `country`) VALUES
(1, 'Hasan Arif', 'arif@gmail.com', 'Pathanpara, Bayezid, Chattogram', '01432574568', 'e10adc3949ba59abbe56e057f20f883e', 'Dhaka', '1000', 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` varchar(255) NOT NULL,
  `productId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(1, '1', '4', 'Lorem Ipsum is simply', '2', '1310.44', 'upload/03e2ff0cb7.jpg', '2023-01-12 14:26:00', 1),
(2, '1', '9', 'Lorem Ipsum is simply', '1', '505.22', 'upload/03a2f8d3b8.jpg', '2023-01-12 14:26:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` varchar(255) NOT NULL,
  `brandId` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `image`, `price`, `type`) VALUES
(3, 'Lorem Ipsum is simply', '6', '4', '<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>\r\n<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>', 'upload/d8faa77370.jpg', '621.75', 1),
(4, 'Lorem Ipsum is simply', '5', '3', '<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>\r\n<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>', 'upload/03e2ff0cb7.jpg', '655.22', 1),
(5, 'Lorem Ipsum is simply', '2', '2', '<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>\r\n<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>', 'upload/1558c42cfd.png', '621.75', 0),
(6, 'Lorem Ipsum is simply', '2', 'Select Brand', '<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>\r\n<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>', 'upload/87e4b08a91.jpg', '655.22', 0),
(7, 'Lorem Ipsum is simply', '6', '3', '<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>\r\n<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>', 'upload/976d9eab5d.jpg', '403.66', 0),
(8, 'Lorem Ipsum is simply', '1', '3', '<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>\r\n<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>', 'upload/10d97e09fc.png', '457.88', 0),
(9, 'Lorem Ipsum is simply', '3', '4', '<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>\r\n<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>', 'upload/03a2f8d3b8.jpg', '505.22', 1),
(10, 'Lorem Ipsum is simply', '2', '1', '<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>\r\n<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>', 'upload/df42c926e2.jpg', '403.66', 1),
(11, 'Lorem Ipsum is simply', '4', '3', '<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>\r\n<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>', 'upload/d4a9e94db3.jpg', '655.22', 1),
(12, 'Lorem Ipsum is simply', '3', '2', '<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>\r\n<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>', 'upload/20bde1cd6b.jpg', '605.22', 1),
(13, 'Lorem Ipsum is simply', '2', '2', '<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>\r\n<p>Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;Product details will be go here.&nbsp;</p>', 'upload/a3a211111e.jpg', '505.22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wlist`
--

CREATE TABLE `tbl_wlist` (
  `wlistId` int(11) NOT NULL,
  `cmrId` varchar(255) NOT NULL,
  `productId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wlist`
--

INSERT INTO `tbl_wlist` (`wlistId`, `cmrId`, `productId`, `productName`, `price`, `image`) VALUES
(1, '1', '4', 'Lorem Ipsum is simply', '655.22', 'upload/03e2ff0cb7.jpg'),
(2, '1', '9', 'Lorem Ipsum is simply', '505.22', 'upload/03a2f8d3b8.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  ADD PRIMARY KEY (`wlistId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  MODIFY `wlistId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
