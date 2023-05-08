-- phpMyAdmin SQL Dump
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- PHP Version: 8.2.0


CREATE TABLE `products` (
  `id` Int (11) NOT NULL PRIMARY KEY,
  `sku` varchar(255)  NOT NULL,UNIQUE
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `type` ENUM ('DVD', 'Book','Furniture')  ,
  `attribute` varchar(255)  NOT NULL
) ;


INSERT INTO `products` (`sku`, `name`, `price`, `type`, `attribute`) VALUES
('BOOK', 'Harry Potter and the Cursed Child', 50, 'Book', '2 KG'),
('DISC', 'DVD', 10, 'DVD', '120 MB'),
('FURNITURE', 'Blue chair', 'Furniture', 2, '30x10x10');

