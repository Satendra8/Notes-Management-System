-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2021 at 01:25 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `item_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`item_id`, `order_id`, `item_name`, `quantity`, `price`, `discount`, `item_total`) VALUES
(78, 0, 'domain', 2, '2000.00', '0.00', '4000.00'),
(79, 0, 'logo', 1, '1000.00', '2.00', '980.00'),
(80, 0, 'domain', 2, '2000.00', '0.00', '4000.00'),
(81, 0, 'logo', 1, '1000.00', '2.00', '980.00'),
(188, 1, 'gegg', 1, '1000.00', '0.00', '1000.00'),
(189, 28, 'sfsdfwsf', 1, '1000.00', '0.00', '1000.00'),
(190, 28, 'domain', 2, '2000.00', '6.00', '3760.00'),
(191, 28, 'sfsdfwsf', 5, '6000.00', '7.00', '27900.00'),
(192, 31, 'logo1', 5, '300.00', '0.00', '1500.00'),
(193, 31, 'logo2', 6, '400.00', '0.00', '2400.00'),
(194, 31, 'logo3', 4, '500.00', '0.00', '2000.00'),
(195, 31, 'logo3', 6, '1000.00', '0.00', '6000.00'),
(196, 32, 'Hosting', 2, '2000.00', '0.00', '4000.00'),
(197, 32, 'Domain', 1, '1000.00', '5.00', '950.00'),
(198, 32, 'logo', 3, '3000.00', '0.00', '9000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `invoice_id` int(11) NOT NULL,
  `invoice_type` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `particulars` varchar(100) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_pan` varchar(12) NOT NULL,
  `customer_gst` varchar(15) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `gst` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`invoice_id`, `invoice_type`, `order_date`, `customer_name`, `particulars`, `customer_address`, `customer_pan`, `customer_gst`, `total`, `gst`, `grand_total`) VALUES
(1, 'Award', '2021-05-15', 'Satendra Kumareqe', 'Domain Hosting', 'Partapur Meeruteeqq', '1234567890', 'a23swd4r5t12345', '1000.00', '180.00', '1180.00'),
(28, 'S/W Development', '2021-05-28', 'Parimal K11111', 'Award11', 'fswggg111111', '1234567892', '123456789112345', '32660.00', '5878.80', '38538.80'),
(31, 'AppDesign', '2021-05-22', 'Varun verma', 'Grocery', 'alwar rajasthan rj', '1234567891', '123456789012345', '5900.00', '1062.00', '6962.00'),
(32, 'Conference', '2021-06-27', 'Sunil Kumar verma', 'wwwwwwwwwww', 'Delhi', '1234567891', '123456789212345', '13950.00', '2511.00', '16461.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `r_password` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `user_type`, `password`, `r_password`, `token`) VALUES
(10, 'Dr Lal', 'lwt@gmail.com', '9999999999', 'admin', '$2y$10$1q2mxsucEow73tDecuSGRuFC2n94X5SmgdpBJEcM8nWtsTT8z9Jgy', '$2y$10$JLmdmLUsC.U5IBzSQyEUlONRc/HxCBdl8DmY1jxz1XMX1vj0OJ.fG', ''),
(11, 'Satendra Kumar', 'sk@gmail.com', '1111111111', 'admin', '$2y$10$AL8Jxo3aYy7kcKY6J9Nz3.H1VXNt./gGjgJNmlYlTT7iGgNdNrTwW', '$2y$10$xbyNFI/3gE8K.eGFRMQHB.tpE273HJ5hEGi0hSLU1t6dmtma1nAre', ''),
(12, 'Sourav Kumar', 'abc@gmail.com', '2222222222', 'user', '$2y$10$G9E9dgcxvGadAm8sKPNdnOphIs6xN5fL6zPgRf8D049Ov865qNykO', '$2y$10$lRNMJ1rAJwXmn49JwBFGmOZQi97dh4D3OlKzyidSwFkQLSmlhS8Ee', ''),
(13, 'skumar', 'skumar007125@gmail.com', '1236547896', 'admin', '$2y$10$cQvo7VLJTNk9tXy9kPQJrOX5PyBM5DyC2VMfeaL4VcnSiZRJc1Sda', '$2y$10$u6aq7GLfmW7drUM8UmmK1ux9H6sLaZ4yHUToQgsJLbU77QsL3LRvS', 'd88b4257c812511cc7926f56fc4a36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
