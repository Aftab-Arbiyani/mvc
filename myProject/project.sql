-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 02:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `userName`, `password`, `status`, `createdDate`) VALUES
(2, 'BCD', 'BCD123', 1, '2021-02-24'),
(7, 'QWTRQ', 'hkbdsn,', 1, '2021-03-04'),
(8, 'ABC', '798465132', 1, '2021-03-04'),
(13, 'QWTRQ51', '7895', 1, '2021-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `entityTypeId` enum('product','category') NOT NULL,
  `code` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `inputType` varchar(20) NOT NULL,
  `backendType` varchar(50) NOT NULL,
  `sortOrder` int(4) NOT NULL,
  `backendModel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `name`, `entityTypeId`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(1, 'Color', 'product', 'color', 'select', 'int(11)', 1, NULL),
(2, 'Brand', 'product', 'brand', 'select', 'int(11)', 2, NULL),
(6, 'material', 'product', 'material', 'text', 'varchar(20)', 5, ''),
(7, 'Product Type', 'product', 'productType', 'text', 'varchar', 8, '');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `optionId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `sortOrder` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_option`
--

INSERT INTO `attribute_option` (`optionId`, `name`, `attributeId`, `sortOrder`) VALUES
(3, 'red', 1, 3),
(5, 'black', 1, 4),
(6, 'brand1', 2, 5),
(7, 'brand2', 2, 6),
(8, 'material1', 6, 7),
(9, 'one', 7, 6);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `description` varchar(30) NOT NULL,
  `pathId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `parentId`, `name`, `status`, `description`, `pathId`) VALUES
(1, 0, 'bedroom', '1', 'hcjh', '1'),
(3, 1, 'beds', '1', 'these are  beds', '1=3'),
(7, 0, 'livingroom', '1', 'this is living room', '7'),
(8, 7, 'sofa', '1', 'sofas', '7=8'),
(10, 0, 'Office', '0', 'for office', '10'),
(11, 0, 'kitchen', '0', 'for kitchen', '11'),
(12, 10, 'chair', '0', 'office chair', '10=12'),
(13, 10, 'stool', '0', 'office stool', '10=13'),
(14, 11, 'dining table', '1', 'for kitchen', '11=14'),
(15, 1, 'nightstand', '1', 'for bedroom', '1=15'),
(16, 0, 'Gaming', '1', 'for gaming', '16'),
(17, 16, 'Gaming Chair', '0', 'for gaming', '16=17'),
(18, 16, 'desk', '0', 'gaming desk', '16=18'),
(19, 7, 'bean bag chair', '0', 'for living room', '7=19'),
(20, 11, 'bar furniture', '1', 'for kitchen', '11=20'),
(22, 11, 'baker rack', '0', 'for baking', '11=22'),
(23, 11, 'wine rack ', '1', '', '11=23'),
(24, 10, 'book case', '0', 'for keeping books', '10=24');

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE `cms_page` (
  `pageId` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `identifier` varchar(20) NOT NULL,
  `content` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_page`
--

INSERT INTO `cms_page` (`pageId`, `title`, `identifier`, `content`, `status`, `createdDate`) VALUES
(1, 'Page', 'hdksn', 'this is page', 1, '2021-03-11'),
(4, 'one', 'iwhef', 'this is the one', 1, '2021-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `groupId` int(11) DEFAULT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` int(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `createdDate` date NOT NULL,
  `updatedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `groupId`, `firstName`, `lastName`, `email`, `mobile`, `password`, `status`, `createdDate`, `updatedDate`) VALUES
(1, 1, 'john', 'doe', 'johndoe@example.com', 2147483647, 'john123', 'enabled', '2021-02-02', '2021-02-02'),
(2, 1, 'jane', 'doe', 'jane@mail.com', 687985212, 'jane123', 'enabled', '2021-02-02', '2021-02-02'),
(6, 1, 'alex', 'garrett', 'alex@mail.com', 421547572, 'alex@mail.com', '0', '2021-02-09', '2021-03-03'),
(11, 1, 'jack', 'doe', 'jack@mail.com', 545687, '123456', '1', '2021-02-18', '2021-02-27'),
(16, 2, 'ABC', 'cde', 'abc@mail.com', 88987465, '145023', '1', '2021-02-19', '2021-02-26'),
(18, 1, 'CDE', 'EFG', 'cde@example.com', 8994561, 'cde123', '0', '2021-02-20', '2021-03-02'),
(25, 2, 'ABC', 'cde', 'khd@maisd', 684, '68412', '1', '2021-03-03', '0000-00-00'),
(26, 2, 'ABC', 'cde', 'khd@maisd', 684, '68412', '1', '2021-03-03', '0000-00-00'),
(27, 2, 'ABC', 'cde', 'khd@maisd', 684, '68412', '1', '2021-03-03', '0000-00-00'),
(33, 1, 'CDE', 'efg11', 'sa@mail.com', 87465132, '4521354', '0', '2021-03-04', '2021-03-04'),
(37, 1, 'ABC', 'cde', 'jack@mail.com', 465132, '56314', '0', '2021-03-04', '0000-00-00'),
(38, 1, 'CDE', 'cdef', 'abc@mail.com', 845, '542', '0', '2021-03-04', '0000-00-00'),
(39, 1, 'wqdes', 'sda', 'hvgjbh', 0, 'HVGJBHN', '0', '2021-03-04', '0000-00-00'),
(58, 1, 'ABC', 'cde', 'abc@mail.com', 123456, '7895', '0', '2021-03-04', '2021-03-04'),
(70, 1, '', '', '', 0, '', 'Disable', '2021-03-18', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `addressId` int(11) NOT NULL,
  `customerId` int(11) DEFAULT NULL,
  `Address` varchar(30) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Zipcode` int(11) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `AddressType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`addressId`, `customerId`, `Address`, `City`, `State`, `Zipcode`, `Country`, `AddressType`) VALUES
(1, 6, '400B, XYZ society', 'Ahmedabad', 'Gujarat', 280001, 'India', 'shipping'),
(2, 6, '221B, Baker Street', 'Rajkot', 'Gujarat', 3500012, 'India', 'biling'),
(3, 33, '200A, XYZW', 'ABC', 'abc', 786215, 'ABCD', ''),
(31, 58, 'ship', 'abc', 'acd', 1234, 'qwe', 'billing'),
(32, 58, 'bil', 'bcd', 'adc', 4567, 'iuo', 'shipping'),
(41, 33, 'bil1', 'efg', 'fgh', 89564, 'China', 'billing'),
(42, 33, 'ship1', 'xyz', 'hij', 5741, 'china', 'shipping'),
(43, NULL, 'bil2', 'xyzw', 'klm', 896565, 'india', 'billing'),
(44, NULL, 'ship2', 'wxyz', 'mno', 23265, 'india', 'shipping');

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `groupId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`groupId`, `name`, `status`, `createdDate`) VALUES
(1, 'Retail', 1, '2021-03-02'),
(2, 'Wholesale', 1, '2021-03-02'),
(3, 'group 3', 1, '2021-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `imageId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `label` varchar(20) NOT NULL,
  `small` tinyint(4) NOT NULL,
  `thumb` tinyint(4) NOT NULL,
  `base` tinyint(4) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gallery` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`imageId`, `productId`, `label`, `small`, `thumb`, `base`, `image`, `gallery`) VALUES
(1, 0, '', 0, 0, 0, 'act.PNG', ''),
(2, 0, '', 0, 0, 0, 'class.png', ''),
(3, 0, '', 0, 0, 0, 'Screenshot (65).png', ''),
(16, 24, '107', 0, 0, 0, 'Screenshot (107).png', '1'),
(21, 24, 'cap', 0, 1, 0, 'Capture.PNG', ''),
(36, 24, 'ss', 1, 0, 0, 'Screenshot (65).png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `methodId` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Code` varchar(20) NOT NULL,
  `Description` varchar(30) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `createdDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`methodId`, `Name`, `Code`, `Description`, `Status`, `createdDate`) VALUES
(1, 'phone', 'uye-cnc', 'this is phone', '1', '2021-02-20'),
(4, 'Movie', 'iuwe-ipo', 'tom & jerry ', '1', '2021-02-20'),
(5, 'payment ', 'ytew-akm', 'this is payment', '0', '2021-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `discount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `createdDate` date NOT NULL,
  `updatedDate` date NOT NULL,
  `productType` varchar(20) DEFAULT NULL,
  `color` varchar(40) DEFAULT NULL,
  `brand` varchar(40) DEFAULT NULL,
  `material` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`, `updatedDate`, `productType`, `color`, `brand`, `material`) VALUES
(2, 'dhbc', 'product2', '200', 20, 5, 'this is product 2', '1', '2021-02-19', '2021-02-19', NULL, NULL, NULL, NULL),
(11, 'sdgjb', 'product 10', '1000', 1000, 100, 'this is product', '1', '2021-02-19', '2021-02-19', NULL, NULL, NULL, NULL),
(13, 'ndcbcs', 'product 5', '10000', 500, 100, 'this is product 5', '1', '2021-02-19', '2021-02-19', NULL, NULL, NULL, NULL),
(20, 'ndcbcs', 'tv', '500', 500, 2, 'this is fridge', '1', '2021-02-19', '2021-02-19', NULL, NULL, NULL, NULL),
(23, 'euwyj', 'fridge', '10000', 500, 2, 'this is fridge', '1', '2021-02-10', '2021-02-19', NULL, NULL, NULL, NULL),
(24, 'qyte', 'tv', '8000', 500, 5, 'this is tv3', '1', '2021-02-22', '2021-02-22', 'one', 'red', 'brand2', 'material1'),
(28, 'wvds', 'sdv', '500', 0, 3, 'this is product', '0', '2021-03-18', '0000-00-00', NULL, NULL, NULL, NULL),
(34, 'efwcda', 'table', '5000', 200, 5, 'igb', '1', '2021-03-18', '0000-00-00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`entityId`, `productId`, `categoryId`) VALUES
(2, 34, 3),
(3, 35, -1);

-- --------------------------------------------------------

--
-- Table structure for table `product_group_price`
--

CREATE TABLE `product_group_price` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `customerGroupId` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_group_price`
--

INSERT INTO `product_group_price` (`entityId`, `productId`, `customerGroupId`, `price`) VALUES
(1, 24, 1, '100.00'),
(5, 24, 2, '200.00'),
(6, 24, 3, '500.00'),
(7, 2, 1, '500.00'),
(8, 2, 2, '1000.00'),
(9, 2, 3, '200.00'),
(10, 23, 1, '8000.00'),
(11, 23, 2, '5000.00'),
(12, 23, 3, '6000.00');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `methodId` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Code` varchar(20) NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `Description` varchar(30) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `createdDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`methodId`, `Name`, `Code`, `Amount`, `Description`, `Status`, `createdDate`) VALUES
(1, 'mobile', 'dsv wdcw', '8000', 'this is mobile', 'available', '2021-02-17'),
(2, 'TV', 'sdhg_kash', '8000', 'this is TV', '1', '2021-02-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`optionId`),
  ADD KEY `attributeId` (`attributeId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`pageId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `groupId` (`groupId`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`imageId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`methodId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`methodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `methodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `methodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `attribute_option_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `customer_group` (`groupId`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
