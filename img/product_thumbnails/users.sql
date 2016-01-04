-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Nov 17, 2015 at 01:15 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tempest_road`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `access_level` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `phone_number`, `email`, `password`, `first_name`, `last_name`, `access_level`) VALUES
(1, 'Super', '1234 ', '  ShakeNBake@hotmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '  Ricky', '  Bobby', 'Privileged'),
(2, 'Admin', '', ' ShakeNBake@hotmail.com', '1209227dd65df46bbbf90bd4d1e97fa1de21ded8', ' Ricky', ' Bobby', 'Administrator'),
(3, 'normal', '', ' ShakeNBake@hotmail.com', '9c2a6e4809aeef7b7712ca4db05a681452f4f748', ' Ricky', ' Bobby', 'Normal User'),
(4, 'guest', '', ' ShakeNBake@hotmail.com', '', ' Ricky', ' Bobby', 'guest'),
(5, 'Dtrav1030', '', ' ShakeNBake@hotmail.com', '', ' Ricky', ' Bobby', 'Normal User'),
(7, 'dddddddd', '', ' ShakeNBake@hotmail.com', '', ' Ricky', ' Bobby', 'Normal User'),
(8, 'ShakeNBake', '', ' ShakeNBake@hotmail.com', '', ' Ricky', ' Bobby', 'Normal User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;