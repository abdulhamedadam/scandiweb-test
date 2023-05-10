-- phpMyAdmin SQL Dump
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- PHP Version: 8.2.0


CREATE TABLE `products` (
  `id` Int (11) NOT NULL PRIMARY KEY,
  `sku` varchar(255)  NOT NULL,UNIQUE(sku),
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `type` ENUM ('DVD', 'Book','Furniture')  ,
  `attribute` varchar(255)  NOT NULL
) ;


INSERT INTO `products` (`id`,`sku`, `name`, `price`, `type`, `attribute`) VALUES
(1,'BOOK', 'Harry Potter and the Cursed Child', 50, 'Book', '2 KG'),
(2,'DISC', 'DVD', 10, 'DVD', '120 MB'),
(3,'FURNITURE', 'Blue chair',  2,'Furniture', '30x10x10');

