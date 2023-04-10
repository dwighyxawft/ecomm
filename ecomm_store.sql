-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2023 at 03:34 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(1, 'Xawft ', 'dwightxawft@gmail.com', 'timilehin1.', 'raghav-kapoor.png', 'Nigeria', 'Simple And Xawft', '+2348181107488', 'Wears WholeSaler'),
(3, 'Seyi Crown', 'amuoladipupo@gmail.com', 'timilehin', '07e6381ae27442a2ae8b76243ccbd096.jpg', 'South Africa', 'Manufacturer of Soaps and Detergents. ', 'Johannesburg', 'Product Manufacturer');

-- --------------------------------------------------------

--
-- Table structure for table `boxes_section`
--

CREATE TABLE `boxes_section` (
  `box_id` int(10) NOT NULL,
  `box_title` text NOT NULL,
  `box_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boxes_section`
--

INSERT INTO `boxes_section` (`box_id`, `box_title`, `box_desc`) VALUES
(1, 'best offer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis nisi non ex sollicitudin, non ornare velit consectetur. Sed porta malesuada facilisis. Curabitur vel accumsan nulla. Pellentesque et libero et elit luctus convallis. Proin eu tellus nibh. Praesent mollis cursus metus nec dictum. Maecenas mollis eget tortor vel tempor. Suspendisse finibus lectus in nibh sollicitudin condimentum.'),
(2, '100% original', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis nisi non ex sollicitudin, non ornare velit consectetur. Sed porta malesuada facilisis. Curabitur vel accumsan nulla. Pellentesque et libero et elit luctus convallis. Proin eu tellus nibh. Praesent mollis cursus metus nec dictum. Maecenas mollis eget tortor vel tempor. Suspendisse finibus lectus in nibh sollicitudin condimentum.'),
(3, 'new products', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis nisi non ex sollicitudin, non ornare velit consectetur. Sed porta malesuada facilisis. Curabitur vel accumsan nulla. Pellentesque et libero et elit luctus convallis. Proin eu tellus nibh. Praesent mollis cursus metus nec dictum. Maecenas mollis eget tortor vel tempor. Suspendisse finibus lectus in nibh sollicitudin condimentum.');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`, `cat_top`, `cat_image`) VALUES
(1, 'Men', 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit', '', 'IMG-20200622-WA0038.jpg'),
(2, 'Women', 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit', '', 'andre-francois-mckenzie-aUHr4gcQCCE-unsplash.jpg'),
(3, 'Kids', 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit', '', 'timmy74.jpg'),
(4, 'Other', 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit', '', 'timmy27.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(25) NOT NULL,
  `customer_city` text NOT NULL,
  `customer_country` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_city`, `customer_country`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'Timilehin Amu', 'dwightxawft@gmail.com', 'timilehin', 'Lagos', 'Nigeria', '+2348181107488', '17, Adetunji Adebajo, Lucky Fibres, Ikorodu', '3a3ae07b3ca14b8f9310103e5e7eefd1_1627379048811.jpg', '::1'),
(3, 'Timilehin Amu', 'amuoladipupo@gmail.com', 'timilehin1.', 'Lagos', 'Nigeria', '+2347015281103', '17, Adetunji Adebajo, Lucky Fibres, Ikorodu', 'andre-francois-mckenzie-aUHr4gcQCCE-unsplash.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 1, 750, 443009252, 3, 'Large', '2021-12-15', 'Complete'),
(2, 1, 120, 1276439756, 1, 'Small', '2021-12-16', 'pending'),
(3, 3, 600, 895944369, 5, 'Small', '2022-04-30', 'pending'),
(4, 3, 320, 895944369, 4, 'Small', '2022-04-30', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(10) NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(1, 822328218, 400, 'UBL/Omni Paisa', 2413, 77652134, '22-06-00');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(2, 3, 895944369, '6', 5, 'Small', 'pending'),
(3, 3, 895944369, '8', 4, 'Small', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`) VALUES
(1, 1, 1, '2021-12-20 14:31:19', 'hp Alien Wares And Laptops', 'christian-wiediger-WkfDrhxDMC8-unsplash.jpg', 'nordwood-themes-bJjsKbToY34-unsplash.jpg', 'john-schnobrich-FlPc9_VocJ4-unsplash.jpg', 300, 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit', 'Laptops'),
(2, 2, 4, '2021-12-08 18:56:28', 'Samsung Galaxy X3', 'timmy32.jpg', 'timmy55.jpg', 'timmy90.jpg', 200, 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit', 'Samsung, Phone, Galaxy'),
(3, 4, 1, '2021-12-08 18:56:53', 'Grey Tuxedo', 'timmy62.png', 'timmy62.png', 'timmy62.png', 150, 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit', 'Tux, Tuxedo, Suit, Grey'),
(4, 2, 4, '2021-12-08 18:57:33', 'Wallpapers', 'timmy16.jpg', 'timmy25.jpg', 'timmy26.jpg', 100, 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit', 'Wallpapers'),
(5, 2, 4, '2021-12-08 18:59:41', 'Boss Black Label', 'timmy56.jpg', 'timmy59.png', 'timmy56.jpg', 150, 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit', 'Black Label'),
(6, 2, 4, '2021-12-08 21:28:18', 'Sony Sound Box', 'electronics.png', 'electronics.png', 'electronics.png', 120, 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit', 'Electronics'),
(8, 3, 2, '2021-12-08 21:34:07', 'Red Slip-On Shoes', 'fashion.jpeg', 'fashion.jpeg', 'fashion.jpeg', 80, 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit', 'Slip-On'),
(9, 4, 2, '2021-12-08 21:36:36', 'Gowns', 'mat.png_BkCniamOw.png', 'mat.png_BkCniamOw.png', 'mat.png_BkCniamOw.png', 50, 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit', 'Gowns');

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Jackets', 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit.Lorem Ipsum dolor sit amet consectetur adpiliscing elit'),
(2, 'Accessories', 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit.Lorem Ipsum dolor sit amet consectetur adpiliscing elit'),
(3, 'Shoes', 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit.Lorem Ipsum dolor sit amet consectetur adpiliscing elit'),
(4, 'Coats', 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit.Lorem Ipsum dolor sit amet consectetur adpiliscing elit'),
(5, 'T-Shirt', 'Lorem Ipsum dolor sit amet consectetur adpiliscing elit.Lorem Ipsum dolor sit amet consectetur adpiliscing elit');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_images` text NOT NULL,
  `slide_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_images`, `slide_url`) VALUES
(1, 'slide number 1', 'timmy37.png', 'http://localhost:8080/ecomm/index.php'),
(2, 'slide number 2', 'timmy38.jpg', 'http://localhost:8080/ecomm/shop.php'),
(3, 'slide number 3', 'timmy39.jpg', 'http://localhost:8080/ecomm/checkout.php'),
(4, 'slide number 4', 'timmy40.jpg', 'http://localhost:8080/ecomm/customer_register.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `boxes_section`
--
ALTER TABLE `boxes_section`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `boxes_section`
--
ALTER TABLE `boxes_section`
  MODIFY `box_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
