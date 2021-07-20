-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 03:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `challenge15`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `coverImage` varchar(256) DEFAULT NULL,
  `mainTitle` varchar(32) DEFAULT NULL,
  `subtitle` varchar(64) DEFAULT NULL,
  `about` varchar(512) DEFAULT NULL,
  `telephone` varchar(32) DEFAULT NULL,
  `location` varchar(32) DEFAULT NULL,
  `imgUrl1` varchar(256) DEFAULT NULL,
  `descUrl1` varchar(512) DEFAULT NULL,
  `imgUrl2` varchar(256) DEFAULT NULL,
  `descUrl2` varchar(512) DEFAULT NULL,
  `imgUrl3` varchar(256) DEFAULT NULL,
  `descUrl3` varchar(512) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `LinkedIn` varchar(64) DEFAULT NULL,
  `facebook` varchar(64) DEFAULT NULL,
  `twitter` varchar(64) DEFAULT NULL,
  `google` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `service_id`, `coverImage`, `mainTitle`, `subtitle`, `about`, `telephone`, `location`, `imgUrl1`, `descUrl1`, `imgUrl2`, `descUrl2`, `imgUrl3`, `descUrl3`, `description`, `LinkedIn`, `facebook`, `twitter`, `google`) VALUES
(1, 2, 'https://cdn.stocksnap.io/img-thumbs/960w/computer-keyboard_A28WZDTYEY.jpg', 'Main Title', 'This is the page for this company. ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid illo eos iure, ipsum voluptates dolores? Earum, recusandae cupiditate possimus ad sapiente perspiciatis laboriosam non saepe! Soluta ad non quas, aliquid eaque placeat officiis! Harum error incidunt labore? Nihil possimus minus libero odit, debitis numquam corporis, harum repudiandae consequatur sed repellat eum nam, exercitationem alias. Necessitatibus rem numquam enim, obcaecati natus fugiat amet provident voluptatum. Eos rerum quos earum vo', '071/381-590', 'Skopje, Makedonija', 'https://cdn.stocksnap.io/img-thumbs/960w/html-css_APJFUAE4M5.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi fugit, eos nostrum eius inventore molestias voluptates sapiente debitis placeat laudantium quam numquam id porro earum odio nobis dignissimos tempora veniam sequi esse iste perspiciatis nihil provident? At cupiditate quisquam pariatur nam ab repellat ea eaque maiores quod veniam modi blanditiis consequuntur assumenda, facere vitae minus!', 'https://cdn.stocksnap.io/img-thumbs/960w/macbook-laptop_7ULJ7GRFDB.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste possimus consectetur, consequuntur suscipit illo placeat saepe veritatis harum minima nam facere est, labore quam mollitia odio, at ratione voluptate nostrum vel asperiores impedit repellat. Aspernatur?', 'https://cdn.stocksnap.io/img-thumbs/960w/coding-programming_F164KBFZ95.jpg', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati doloribus dolores, accusantium nobis voluptatem illum vitae. Officia recusandae quod ipsam maxime corporis neque. Perspiciatis inventore exercitationem, nisi nam sint alias eius iusto. Nulla, ex. Error omnis, obcaecati quibusdam eligendi qui aliquid fuga, similique ullam accusamus libero molestias sequi magnam, itaque porro. Sapiente ab deleniti dolor a! Aspernatur odio magnam sed perspiciatis dicta sequi iste obcaecati consectetur assumend', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat animi reiciendis possimus velit tenetur numquam distinctio ab excepturi totam. Harum, voluptate? Facilis natus, itaque ducimus rerum corrupti dolorum cum explicabo maxime eos, perspiciatis dolores incidunt eligendi. Nihil enim ex, beatae amet minima deleniti optio illo magnam quisquam sapiente dicta commodi officia quo accusamus pariatur maiores ad quasi nostrum, nemo eligendi ut eveniet deserunt facilis? Recusandae tempora voluptates quia la', 'https://www.linkedin.com/in/marijan-karovski-8051a51b5/', 'https://www.facebook.com/mkzsm', 'https://www.twitter.com/mkarovski', 'https://www.google.com/');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `message` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `provide`
--

CREATE TABLE `provide` (
  `id` int(11) NOT NULL,
  `provider` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provide`
--

INSERT INTO `provide` (`id`, `provider`) VALUES
(1, 'Service'),
(2, 'Product');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `provide`
--
ALTER TABLE `provide`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `provide`
--
ALTER TABLE `provide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `provide` (`id`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
