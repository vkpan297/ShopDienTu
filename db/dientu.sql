-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 01:37 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dientu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `admin_Name` varchar(255) DEFAULT NULL,
  `admin_Email` varchar(255) DEFAULT NULL,
  `admin_User` varchar(255) DEFAULT NULL,
  `admin_Pass` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_Name`, `admin_Email`, `admin_User`, `admin_Pass`, `level`) VALUES
(1, 'Cương', 'vkpan297@gmail.com', 'Cuong_Admin', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id` int(11) NOT NULL,
  `brand_Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`id`, `brand_Name`) VALUES
(2, 'Oppo'),
(3, 'Huawei'),
(4, 'Apple'),
(5, 'Samsung'),
(6, 'Dell');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `product_Id` int(11) DEFAULT NULL,
  `sId` varchar(255) DEFAULT NULL,
  `product_Name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quanity` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `product_Id`, `sId`, `product_Name`, `price`, `quanity`, `image`) VALUES
(2, 10, '67k1qt08o3k2t0hed397hvdhl7', 'sản phẩm 8', '3000000', 2, '92783e11c2.jpg'),
(3, 4, '67k1qt08o3k2t0hed397hvdhl7', 'sản phẩm 2', '300000', 1, '0a769f9aea.jpg'),
(4, 7, '67k1qt08o3k2t0hed397hvdhl7', 'sản phẩm 5', '1000000', 1, '80d0c6752e.jpg'),
(8, 8, '67k1qt08o3k2t0hed397hvdhl7', 'sản phẩm 6', '5000000', 1, '5ef7e2aaac.jpg'),
(11, 3, '0f5ud1v0o13bm38iqtetbgrbf5', 'sản phẩm 1', '230000', 1, '52251f3332.webp'),
(12, 6, '0f5ud1v0o13bm38iqtetbgrbf5', 'sản phẩm 4', '3000000', 3, '05a6fef382.jpg'),
(39, 3, '844fpagpu3t5ciunqau8ivhi57', 'sản phẩm 1', '230000', 1, '52251f3332.webp'),
(40, 4, '50al347d8j19c3a145raifp788', 'sản phẩm 2', '300000', 1, '0a769f9aea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `cate_Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `cate_Name`) VALUES
(2, 'Laptops'),
(3, 'Desktop'),
(4, 'Mobile Phone'),
(5, 'Accessories'),
(6, 'Software'),
(7, 'Footware'),
(8, 'Sports &amp; Fitness'),
(9, 'Jewellery'),
(10, 'Clothing'),
(11, 'Home Dector &amp; Kitchen'),
(12, 'Beauty &amp; Healthcare'),
(13, 'Toys Kids &amp; Babies');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `product_Id` int(11) DEFAULT NULL,
  `product_Name` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_compare`
--

INSERT INTO `tbl_compare` (`id`, `product_Id`, `product_Name`, `customer_id`, `price`, `image`) VALUES
(1, 3, 'sản phẩm 1', 2, '230000', '52251f3332.webp'),
(2, 4, 'sản phẩm 2', 2, '300000', '0a769f9aea.jpg'),
(4, 6, 'sản phẩm 4', 1, '3000000', '05a6fef382.jpg'),
(5, 10, 'sản phẩm 8', 1, '3000000', '92783e11c2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zipcode` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(1, 'Cuong', 'Đường Nguyễn Trãi, Phường Thượng Đình, Quận Thanh Xuân, Hà Nội', 'Ha Noi', 'AF', '700000', '0379370048', 'vkpan297@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Cuong', 'Đường Nguyễn Trãi, Phường Thượng Đình, Quận Thanh Xuân, Hà Nội', 'Ha Noi', 'dn', '700000', '0379370048', 'abc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `product_Id` int(11) DEFAULT NULL,
  `product_Name` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `product_Id`, `product_Name`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(1, 3, 'sản phẩm 1', 2, 2, '460000', '52251f3332.webp', 2, '2021-07-06 00:59:09'),
(2, 4, 'sản phẩm 2', 2, 2, '600000', '0a769f9aea.jpg', 2, '2021-07-06 00:59:09'),
(3, 6, 'sản phẩm 4', 2, 1, '3000000', '05a6fef382.jpg', 2, '2021-07-06 00:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `product_Name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_desc` text DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `product_Name`, `category_id`, `brand_id`, `product_desc`, `type`, `price`, `image`) VALUES
(2, 'Máy giặt Sanyo', 5, 5, '<p>M&aacute;y giặt Sanyo</p>', 0, '1500000', '98f7e06f1c.webp'),
(3, 'sản phẩm 1', 9, 2, '<p>&aacute;dasdsdas</p>', 1, '230000', '52251f3332.webp'),
(4, 'slider 4s', 13, 6, '<p>đ&acirc;s</p>', 1, '300000', '0a769f9aea.jpg'),
(5, 'sản phẩm 3', 12, 5, '<p>dsadasasdasd</p>', 0, '1000000', 'fdbe49355f.jpg'),
(6, 'sản phẩm 4', 11, 5, '<p>dsadsadsdas</p>', 1, '3000000', '05a6fef382.jpg'),
(7, 'sản phẩm 5', 10, 4, '<p>dsadasdsads</p>', 1, '1000000', '80d0c6752e.jpg'),
(8, 'sản phẩm 6', 8, 3, '<p>&aacute;dsadsaasds</p>', 1, '5000000', '5ef7e2aaac.jpg'),
(9, 'sản phẩm 7', 7, 2, '<p>adssdsasdads</p>', 0, '200000', '66d291d455.jpg'),
(10, 'sản phẩm 8', 6, 6, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 1, '3000000', '92783e11c2.jpg'),
(11, 'sản phẩm 9', 4, 5, '<p>đ&acirc;sdsadasda</p>', 0, '5000000', 'fb4e507ff5.webp'),
(12, 'sản phẩm 10', 3, 4, '<p>đasadsadsadas</p>', 1, '3000000', '3bc2112454.jpg'),
(13, 'sản phẩm 11', 2, 3, '<p>dsadasdasdasdas</p>', 1, '400000', 'e79fc431c5.jpg'),
(14, 'jewellry 1', 9, 5, '<p>jewellry 1&nbsp;jewellry 1&nbsp;jewellry 1</p>', 1, '3000000', 'cc5d2324c6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `slider_Name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `slider_Name`, `image`, `type`) VALUES
(1, 'slider 1', '81e030b16a.jpg', 1),
(2, 'slider 2', 'e24b6ae544.jpg', 1),
(3, 'slider 3', '5352193dc0.jpg', 1),
(4, 'slider 4s', '47bcd095c5.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `product_Id` int(11) DEFAULT NULL,
  `product_Name` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `product_Id`, `product_Name`, `customer_id`, `price`, `image`) VALUES
(2, 8, 'sản phẩm 6', 1, '5000000', '5ef7e2aaac.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
