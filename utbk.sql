-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 08:41 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utbk`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_soal`
--

CREATE TABLE `bank_soal` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `kategori_soal_id` int(10) UNSIGNED NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_soal`
--

INSERT INTO `bank_soal` (`id`, `name`, `kategori_soal_id`, `created`, `modified`) VALUES
(1, 'bank soal 1', 2, '2020-12-07 04:42:35', '2020-12-07 04:42:35'),
(2, 'TPS bank soal 1', 10, '2020-12-07 05:07:03', '2020-12-07 05:07:03'),
(3, 'sos 1', 6, '2020-12-07 08:39:31', '2020-12-07 08:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `butir_paket_soal`
--

CREATE TABLE `butir_paket_soal` (
  `id` int(10) UNSIGNED NOT NULL,
  `paket_soal_id` int(10) UNSIGNED NOT NULL,
  `soal_id` int(10) UNSIGNED NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `butir_paket_soal`
--

INSERT INTO `butir_paket_soal` (`id`, `paket_soal_id`, `soal_id`, `created`) VALUES
(9, 1, 3, '2020-12-07 05:08:10'),
(10, 1, 4, '2020-12-07 05:08:10'),
(11, 1, 1, '2020-12-07 05:08:29'),
(12, 1, 2, '2020-12-07 05:08:29'),
(13, 1, 5, '2020-12-07 08:40:21'),
(14, 2, 3, '2020-12-07 12:29:47'),
(15, 2, 4, '2020-12-07 12:29:47'),
(16, 2, 1, '2020-12-07 12:30:05'),
(17, 2, 2, '2020-12-07 12:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_soal`
--

CREATE TABLE `kategori_soal` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `subject` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_soal`
--

INSERT INTO `kategori_soal` (`id`, `category`, `subject`) VALUES
(1, 'saintek', 'matematika'),
(2, 'saintek', 'biologi'),
(3, 'saintek', 'fisika'),
(4, 'saintek', 'kimia'),
(5, 'soshum', 'geografi'),
(6, 'soshum', 'ekonomi'),
(7, 'soshum', 'sejarah'),
(8, 'soshum', 'sosiologi'),
(9, 'soshum', 'matematika soshum'),
(10, 'tps', 'penalaran umum'),
(11, 'tps', 'pemahaman bacaan dan menulis'),
(12, 'tps', 'pengetahuan dan pemahaman umum'),
(13, 'tps', 'pengetahuan kuantitatif');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paket_soal`
--

CREATE TABLE `paket_soal` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `description` text CHARACTER SET utf8mb4,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket_soal`
--

INSERT INTO `paket_soal` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'kk', 'lll', '2020-12-07 04:43:35', '2020-12-07 04:43:35'),
(2, 'tes paket 2', 'desc', '2020-12-07 12:29:17', '2020-12-07 12:29:17'),
(3, 's', '', '2020-12-08 02:22:13', '2020-12-08 02:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `discount` tinyint(3) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `tryout` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `consultation` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `pendalaman` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `discount`, `start_date`, `end_date`, `tryout`, `consultation`, `pendalaman`, `status`, `created`, `modified`) VALUES
(1, 'Tes Produk 1', 'des', 100000, 7, '2020-12-04', '2020-12-25', 0, 0, 0, 1, '2020-12-08 07:12:40', '2020-12-08 07:12:40'),
(2, 'Tes produk 2 edit', 'dess1', 2000001, 81, '2020-12-10', '2020-12-31', 1, 1, 1, 1, '2020-12-08 07:29:07', '2020-12-08 07:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(10) UNSIGNED NOT NULL,
  `bank_soal_id` int(10) UNSIGNED NOT NULL,
  `kategori_soal_id` int(10) UNSIGNED NOT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `opt1` text CHARACTER SET utf8mb4 NOT NULL,
  `opt2` text CHARACTER SET utf8mb4 NOT NULL,
  `opt3` text CHARACTER SET utf8mb4 NOT NULL,
  `opt4` text CHARACTER SET utf8mb4 NOT NULL,
  `opt5` text CHARACTER SET utf8mb4 NOT NULL,
  `answer` tinyint(1) UNSIGNED NOT NULL,
  `explanation` text CHARACTER SET utf8mb4 NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `bank_soal_id`, `kategori_soal_id`, `description`, `opt1`, `opt2`, `opt3`, `opt4`, `opt5`, `answer`, `explanation`, `created`, `modified`) VALUES
(1, 1, 2, '<p>ssss</p>', '<p>dadda</p>', '<p>w</p>', '<p>q</p>', '<p>f</p>', '<p>c</p>', 1, '<p>zz</p>', '2020-12-07 04:43:03', '2020-12-07 04:43:03'),
(2, 1, 2, '<p>jjj</p>', '<p>das</p>', '<p>dwa</p>', '<p>f</p>', '<p>sxx</p>', '<p>bb</p>', 5, '<p>das</p>', '2020-12-07 04:45:03', '2020-12-07 04:45:03'),
(3, 2, 10, '<p>jiuhuidwa</p>', '<p>ss</p>', '<p>f</p>', '<p>fc</p>', '<p>z</p>', '<p>kk</p>', 1, '', '2020-12-07 05:07:26', '2020-12-07 05:07:26'),
(4, 2, 10, '<p>lo</p>', '<p>nn</p>', '<p>ll</p>', '<p>ry</p>', '<p>oo</p>', '<p>xnxn</p>', 2, '', '2020-12-07 05:07:51', '2020-12-07 05:07:51'),
(5, 3, 6, '<p>dwaod</p>', '<p>ss</p>', '<p>dwa</p>', '<p>d</p>', '<p>f</p>', '<p>b</p>', 1, '<p>c</p>', '2020-12-07 08:39:58', '2020-12-07 08:39:58'),
(6, 3, 6, '<p>Sebanyak 1,12 gram logam besi dihasilkan ketika 3,20 gram Fe<sub>2</sub>O<sub>3</sub> direduksi dengan gas H<sub>2</sub> dalam tanur dengan reaksi berikut:</p>\r\n\r\n<p>Fe<sub>2</sub>O<sub>3 </sub>+ 3 H<sub>2</sub> à 2 Fe + 3 H<sub>2</sub>O&lt;math xmlns=\"http://www.w3.org/1998/Math/MathML\"&gt;<msqrt>&lt;/math&gt;</p>\r\n\r\n<p>Apabila Ar Fe = 56; O = 16, persentase kemurnian logam besi yang dihasilkan sebesar….</p>\r\n\r\n<ol>\r\n <li>85 %</li>\r\n <li>75 %</li>\r\n <li>70 %</li>\r\n <li>65 %</li>\r\n <li>50 %</li>\r\n</ol>', '<p>dwa</p>', '<p>ss</p>', '<p>kjhk</p>', '<p>plp;</p>', '<p>csad</p>', 2, '<p>utu2eq</p>', '2020-12-07 12:20:03', '2020-12-07 12:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `tryout`
--

CREATE TABLE `tryout` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `quota` smallint(3) DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL,
  `type` tinyint(1) UNSIGNED DEFAULT NULL,
  `paket_soal_id` int(10) UNSIGNED NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tryout`
--

INSERT INTO `tryout` (`id`, `name`, `description`, `quota`, `start_time`, `end_time`, `status`, `type`, `paket_soal_id`, `created`, `modified`) VALUES
(1, 'Sesi 12', 'desc', 1, '10:10:00', '11:12:00', 0, NULL, 1, '2020-12-08 03:08:33', '2020-12-08 06:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `tryout_schedule`
--

CREATE TABLE `tryout_schedule` (
  `id` int(10) UNSIGNED NOT NULL,
  `tryout_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `description` text CHARACTER SET utf8mb4,
  `quota` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` tinyint(1) NOT NULL,
  `profile` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `gender`, `profile`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$qU4Qnp.Xx1bbA6whlww5fesFKtD1PxxwyAdfdUe5OmUNEcXaFFwdq', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1607381737, 1, 'Admin', 'istrator', 'ADMIN', '085743', 1, 'homepage-13.png'),
(14, '::1', 'tess', '$2y$10$9/YHLx5viNal2CbkzLpuS.qto72AGGofelwkIcQwYJHZ69lAKvsMC', 's@ss.c', '7a5bf3fc8e2e7106991d', '$2y$10$u2GUONgh.6KDp/8EFKamVOuNrWcn/wuRjbCVk5urCxhlTSOeC8/2i', NULL, NULL, NULL, NULL, NULL, 1607317542, NULL, 0, NULL, NULL, NULL, '887', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(20, 1, 1),
(21, 1, 2),
(22, 14, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bank_soal_kategori_soal` (`kategori_soal_id`);

--
-- Indexes for table `butir_paket_soal`
--
ALTER TABLE `butir_paket_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_butir_paket_soal_paket_soal` (`paket_soal_id`),
  ADD KEY `fk_butir_paket_soal_soal` (`soal_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_soal`
--
ALTER TABLE `kategori_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_soal`
--
ALTER TABLE `paket_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_soal_id` (`bank_soal_id`) USING BTREE,
  ADD KEY `fk_soal_kategori_soal` (`kategori_soal_id`);

--
-- Indexes for table `tryout`
--
ALTER TABLE `tryout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tryout_paket_soal` (`paket_soal_id`);

--
-- Indexes for table `tryout_schedule`
--
ALTER TABLE `tryout_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tryout_schedule_tryout` (`tryout_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_soal`
--
ALTER TABLE `bank_soal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `butir_paket_soal`
--
ALTER TABLE `butir_paket_soal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_soal`
--
ALTER TABLE `kategori_soal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paket_soal`
--
ALTER TABLE `paket_soal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tryout`
--
ALTER TABLE `tryout`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tryout_schedule`
--
ALTER TABLE `tryout_schedule`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD CONSTRAINT `fk_bank_soal_kategori_soal` FOREIGN KEY (`kategori_soal_id`) REFERENCES `kategori_soal` (`id`);

--
-- Constraints for table `butir_paket_soal`
--
ALTER TABLE `butir_paket_soal`
  ADD CONSTRAINT `fk_butir_paket_soal_paket_soal` FOREIGN KEY (`paket_soal_id`) REFERENCES `paket_soal` (`id`),
  ADD CONSTRAINT `fk_butir_paket_soal_soal` FOREIGN KEY (`soal_id`) REFERENCES `soal` (`id`);

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `fk_soal_bank_soal` FOREIGN KEY (`bank_soal_id`) REFERENCES `bank_soal` (`id`),
  ADD CONSTRAINT `fk_soal_kategori_soal` FOREIGN KEY (`kategori_soal_id`) REFERENCES `kategori_soal` (`id`);

--
-- Constraints for table `tryout`
--
ALTER TABLE `tryout`
  ADD CONSTRAINT `fk_tryout_paket_soal` FOREIGN KEY (`paket_soal_id`) REFERENCES `paket_soal` (`id`);

--
-- Constraints for table `tryout_schedule`
--
ALTER TABLE `tryout_schedule`
  ADD CONSTRAINT `fk_tryout_schedule_tryout` FOREIGN KEY (`tryout_id`) REFERENCES `tryout` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
