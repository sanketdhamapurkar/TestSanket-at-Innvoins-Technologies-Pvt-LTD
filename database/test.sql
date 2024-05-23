-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 10:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ci_sessions`
--

CREATE TABLE `tbl_ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ci_sessions`
--

INSERT INTO `tbl_ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('5tjlt878p2pj4p8lpbjrcibsan008dif', '::1', 1716448315, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731363434383331353b),
('81k11dnipu1iva23u9u9vgie04a9v2an', '::1', 1716447993, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731363434373939333b),
('b86vnuakdt2pq6kdba5mgsnc9n1v39b9', '::1', 1716448689, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731363434383638393b),
('fsr71jcvo75jqbol6lk3qbnosqb7876i', '::1', 1716449014, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731363434393031343b),
('i1sfb5om1bua2eq39smohn8dhtn0emf1', '::1', 1716449959, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731363434393935393b6572726f727c733a32383a22496e76616c696420757365726e616d65206f722070617373776f7264223b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d),
('k1nmouu14dcplqq9fs27tuf96r7fgalr', '::1', 1716450231, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731363434393935393b757365725f69647c733a313a2231223b),
('t6h0mjtt2cbtgivvj27cpnkt18l0lrnj', '::1', 1716446886, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731363434363838363b),
('thutflpnbg8q3pegr152s9ooaa2lh21p', '::1', 1716447187, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731363434373138373b),
('unpfbngjkafg725ftbdlv0dqd27htpea', '::1', 1716449458, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731363434393435383b6572726f727c733a32383a22496e76616c696420757365726e616d65206f722070617373776f7264223b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'sanket', 'sanket.dhamapurkar13@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-05-23 06:25:56'),
(2, 'admin', 'admin@gmail.com', '$2y$10$a0KwSXn0qn2zOXbYBKTgPehdeH15TdarqJ6U89xzgBTSC2bUi4paq', '2024-05-23 06:47:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ci_sessions`
--
ALTER TABLE `tbl_ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
