-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2017 at 11:46 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Apple'),
(2, 'Dell'),
(3, 'HP'),
(4, 'Lenovo'),
(5, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(1, '::1', 5),
(3, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'Computers'),
(3, 'Cell Phones'),
(4, 'Cameras'),
(5, 'Tablets');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_state` text NOT NULL,
  `customer_zip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_address`, `customer_contact`, `customer_state`, `customer_zip`) VALUES
(3, '::1', 'Justin Wang', 'justin@gmail.com', '123123123', 'China', 'Chicago', '6339 N Sheridan Rd', '7735087700', 'IL', '60626'),
(4, '::1', 'Brihat', 'brihat@gmail.com', '123', 'United States', 'Chicago', '6339 N Sheridan Rd', '7735087700', 'IL', '60626');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 1, 4, 'ThinkPad X1 Yoga', 1500, '<p>The ThinkPad X1 Yoga is the very definition of versatility, as it works the way you want to, accommodating your environment with a 360-degree hinge.&nbsp;</p>', 'lenovo_x1_yoga_1.png', 'lenovo, laptops, new'),
(2, 1, 2, 'XPS 13', 1200, '<p>The smallest 13.3-inch on the planet with the world&rsquo;s first InfinityEdge display.</p>', 'dell-xps-13-2015-product-photos-01.jpg', 'dell, laptops, new'),
(3, 3, 5, 'Samsung Note 8', 950, '<p>New Cellphone by Samsung, released 2017.</p>', 'Note8.jpg', 'samsung,cellphones,new'),
(4, 4, 5, 'Samsung Camera', 600, '<p>A nice camera made by Samsung</p>', 'samsung_camera.jpg', 'samsung,cameras,new'),
(5, 2, 3, 'HP ENVY 750-532', 1500, '<ul style=\"margin: 1em 0px 1em 1.3em; padding: 0px; list-style-position: initial; list-style-image: initial; color: #222222; font-family: Helvetica, Arial, sans-serif;\">\r\n<li>Intel Core i7-7700 Processor 3.6GHz</li>\r\n<li>NVIDIA GeForce GTX 1050 2GB GDDR5</li>\r\n<li>16GB DDR4-2133 RAM</li>\r\n<li>1TB HDD + 256GB SSD</li>\r\n<li>Microsoft Windows 10 Pro</li>\r\n<li>DVD-RW Drive</li>\r\n<li>7-in-1 Media Card Reader</li>\r\n<li>10/100/1000 Network</li>\r\n<li>1x1 802.11ac Wireless + Bluetooth 4.2 M.2</li>\r\n<li>Display Not Included</li>\r\n</ul>\r\n<p style=\"margin: 1em 0px; color: #222222; font-family: Helvetica, Arial, sans-serif;\">The HP ENVY 750-532 desktop computer is designed to inspire you, Creatively smart. Excitingly powerful. Finally, a machine that keeps up.</p>', 'hp_ENVY_750.jpg', 'hp, computers, new'),
(6, 3, 1, 'Apple Iphone 8', 699, '<p><span style=\"color: #222222; font-family: Roboto, arial, sans-serif; font-size: 13px;\">Silver &middot; 64 GB &middot; Unlocked â€‘ SIM Free</span></p>', 'apple_iphone_8.jpg', 'apple, cellphones, new'),
(7, 3, 1, 'Apple Iphone X', 1149, '<p><span style=\"color: #222222; font-family: Roboto, arial, sans-serif; font-size: 13px; background-color: #fcfcfc;\">Space Gray &middot; 256 GB &middot; AT&amp;T â€‘ GSM</span></p>', 'apple-iphone-x-new-1.jpg', 'apple, cellphones, new, iphone');

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

CREATE TABLE `wish` (
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `customer_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wish`
--

INSERT INTO `wish` (`p_id`, `ip_add`, `qty`, `customer_email`) VALUES
(6, '::1', 0, ''),
(7, '::1', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
