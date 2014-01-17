-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2014 at 03:38 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `recipeboxr`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `config_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(20) DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `food_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `pantry`
--

DROP TABLE IF EXISTS `pantry`;
CREATE TABLE IF NOT EXISTS `pantry` (
  `pantry_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `notes` text,
  `type` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`pantry_id`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `pantrytype`
--

DROP TABLE IF EXISTS `pantrytype`;
CREATE TABLE IF NOT EXISTS `pantrytype` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pantry_item`
--

DROP TABLE IF EXISTS `pantry_item`;
CREATE TABLE IF NOT EXISTS `pantry_item` (
  `pantry_id` int(10) unsigned NOT NULL DEFAULT '0',
  `product_id` int(10) unsigned NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT NULL,
  `threshold` int(11) DEFAULT NULL,
  PRIMARY KEY (`pantry_id`,`product_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `food_id` int(10) unsigned DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `unit_id` int(10) unsigned DEFAULT NULL,
  `recipe_id` int(10) unsigned DEFAULT NULL,
  `link_url` varchar(50) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`product_id`),
  KEY `food_id` (`food_id`),
  KEY `recipe_id` (`recipe_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
CREATE TABLE IF NOT EXISTS `recipe` (
  `recipe_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `note` text,
  `creator` int(10) unsigned DEFAULT NULL,
  `servings` int(11) DEFAULT NULL,
  `serving_size` int(11) DEFAULT NULL,
  `serving_unit` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`recipe_id`),
  KEY `creator` (`creator`),
  KEY `serving_unit` (`serving_unit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recipefoodcross`
--

DROP TABLE IF EXISTS `recipefoodcross`;
CREATE TABLE IF NOT EXISTS `recipefoodcross` (
  `recipe` int(10) unsigned NOT NULL DEFAULT '0',
  `food` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`recipe`,`food`),
  KEY `food` (`food`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

DROP TABLE IF EXISTS `rights`;
CREATE TABLE IF NOT EXISTS `rights` (
  `right_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`right_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role_rights_cross`
--

DROP TABLE IF EXISTS `role_rights_cross`;
CREATE TABLE IF NOT EXISTS `role_rights_cross` (
  `role_id` int(10) unsigned NOT NULL DEFAULT '0',
  `right_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`role_id`,`right_id`),
  KEY `right_id` (`right_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `password` char(40) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_pantry_cross`
--

DROP TABLE IF EXISTS `user_pantry_cross`;
CREATE TABLE IF NOT EXISTS `user_pantry_cross` (
  `user_id` int(10) unsigned DEFAULT NULL,
  `pantry_id` int(10) unsigned DEFAULT NULL,
  `owner` tinyint(1) DEFAULT '1',
  KEY `user_id` (`user_id`),
  KEY `pantry_id` (`pantry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_rights_cross`
--

DROP TABLE IF EXISTS `user_rights_cross`;
CREATE TABLE IF NOT EXISTS `user_rights_cross` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `right_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`right_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_role_cross`
--

DROP TABLE IF EXISTS `user_role_cross`;
CREATE TABLE IF NOT EXISTS `user_role_cross` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `role_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `util_units`
--

DROP TABLE IF EXISTS `util_units`;
CREATE TABLE IF NOT EXISTS `util_units` (
  `unit_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `abbreviation` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `util_unit_conv`
--

DROP TABLE IF EXISTS `util_unit_conv`;
CREATE TABLE IF NOT EXISTS `util_unit_conv` (
  `unit_from` int(10) unsigned NOT NULL DEFAULT '0',
  `unit_to` int(10) unsigned NOT NULL DEFAULT '0',
  `factor` float DEFAULT NULL,
  PRIMARY KEY (`unit_from`,`unit_to`),
  KEY `unit_to` (`unit_to`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pantry`
--
ALTER TABLE `pantry`
  ADD CONSTRAINT `pantry_ibfk_1` FOREIGN KEY (`type`) REFERENCES `pantrytype` (`type_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pantry_item`
--
ALTER TABLE `pantry_item`
  ADD CONSTRAINT `pantry_item_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pantry_item_ibfk_2` FOREIGN KEY (`pantry_id`) REFERENCES `pantry` (`pantry_id`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`recipe_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_ibfk_2` FOREIGN KEY (`serving_unit`) REFERENCES `util_units` (`unit_id`) ON UPDATE CASCADE;

--
-- Constraints for table `recipefoodcross`
--
ALTER TABLE `recipefoodcross`
  ADD CONSTRAINT `recipefoodcross_ibfk_1` FOREIGN KEY (`recipe`) REFERENCES `recipe` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipefoodcross_ibfk_2` FOREIGN KEY (`food`) REFERENCES `food` (`food_id`) ON UPDATE CASCADE;

--
-- Constraints for table `role_rights_cross`
--
ALTER TABLE `role_rights_cross`
  ADD CONSTRAINT `role_rights_cross_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_rights_cross_ibfk_2` FOREIGN KEY (`right_id`) REFERENCES `rights` (`right_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_pantry_cross`
--
ALTER TABLE `user_pantry_cross`
  ADD CONSTRAINT `user_pantry_cross_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_pantry_cross_ibfk_2` FOREIGN KEY (`pantry_id`) REFERENCES `pantry` (`pantry_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_role_cross`
--
ALTER TABLE `user_role_cross`
  ADD CONSTRAINT `user_role_cross_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `util_unit_conv`
--
ALTER TABLE `util_unit_conv`
  ADD CONSTRAINT `util_unit_conv_ibfk_1` FOREIGN KEY (`unit_from`) REFERENCES `util_units` (`unit_id`),
  ADD CONSTRAINT `util_unit_conv_ibfk_2` FOREIGN KEY (`unit_to`) REFERENCES `util_units` (`unit_id`);
