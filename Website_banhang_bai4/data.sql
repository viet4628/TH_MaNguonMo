-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for my_store
CREATE DATABASE IF NOT EXISTS `my_store` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `my_store`;

-- Dumping structure for table my_store.account
CREATE TABLE IF NOT EXISTS `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.account: ~0 rows (approximately)
INSERT INTO `account` (`id`, `username`, `fullname`, `password`, `role`) VALUES
	(1, 'viet', 'Việt Nguyễn Xuân', '$2y$10$MfZdqwcI91tu7UNpLAYn5.Je2dlmua9l9mgJ1MWo8e9zdkMSlP8Hi', 'admin');

-- Dumping structure for table my_store.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.category: ~5 rows (approximately)
INSERT INTO `category` (`id`, `name`, `description`) VALUES
	(1, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(2, 'Laptop', 'Danh mục các loại laptop'),
	(3, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(4, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(5, 'Thiết bị âm thanh', 'Danh mục loa, tai nghe, micro');

-- Dumping structure for table my_store.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Đang xử lý','Đã xác nhận','Đang giao','Đã giao','Đã hủy') DEFAULT 'Đang xử lý',
  `account_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.orders: ~0 rows (approximately)

-- Dumping structure for table my_store.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.order_details: ~0 rows (approximately)

-- Dumping structure for table my_store.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.product: ~20 rows (approximately)
INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`, `category_id`) VALUES
	(2, 'iPhone 13', 'Điện thoại thông minh Apple iPhone 13 với màn hình OLED và chip A15 Bionic.', 14900000.00, 'uploads/67e4396bed614_1743010155.png', 1),
	(3, 'Samsung Galaxy S21', 'Điện thoại Samsung Galaxy S21, màn hình 6.2 inch, 8GB RAM.', 30990000.00, 'uploads/67e63a214b395_1743141409.png', 1),
	(4, 'Xiaomi Mi 11', 'Điện thoại Xiaomi Mi 11, Snapdragon 888, màn hình AMOLED 120Hz.', 15200000.00, 'uploads/67e639c78c7b3_1743141319.jpg', 1),
	(5, 'iPhone 12', 'Điện thoại iPhone 12 với màn hình OLED 6.1 inch và camera kép 12MP.', 9990000.00, 'uploads/67e6393308918_1743141171.png', 1),
	(6, 'Samsung Galaxy A52', 'Điện thoại Samsung Galaxy A52, màn hình Super AMOLED 6.5 inch.', 9290000.00, 'uploads/67e638d8d4483_1743141080.png', 1),
	(7, 'MacBook Pro 14 inch', 'Laptop MacBook Pro 14 inch, chip M1 Pro, màn hình Retina.', 39990000.00, 'uploads/67e439a0a8ebc_1743010208.png', 2),
	(8, 'Dell XPS 13', 'Laptop Dell XPS 13, i7-1165G7, RAM 16GB, màn hình InfinityEdge.', 54990000.00, 'uploads/67e43995c410f_1743010197.png', 2),
	(9, 'HP Spectre x360', 'Laptop HP Spectre x360 13 inch, màn hình cảm ứng 4K, RAM 16GB.', 50990000.00, 'uploads/67e6383b08ac0_1743140923.jpg', 2),
	(10, 'Lenovo ThinkPad X1 Carbon', 'Laptop Lenovo ThinkPad X1 Carbon, i7, 16GB RAM, màn hình 14 inch.', 26790000.00, 'uploads/67e637c13de71_1743140801.png', 2),
	(11, 'Microsoft Surface Laptop 4', 'Laptop Microsoft Surface Laptop 4, màn hình 13.5 inch, chip Intel i7.', 12490000.00, 'uploads/67e636b4d1e5b_1743140532.jpg', 2),
	(12, 'iPad Pro 12.9', 'Máy tính bảng iPad Pro 12.9 inch, chip M1, màn hình Liquid Retina.', 23990000.00, 'uploads/67e63633c365d_1743140403.png', 3),
	(13, 'Samsung Galaxy Tab S7', 'Máy tính bảng Samsung Galaxy Tab S7, màn hình 11 inch, 6GB RAM.', 18990000.00, 'uploads/67e635dfdc70c_1743140319.png', 3),
	(14, 'Microsoft Surface Pro 7', 'Máy tính bảng Microsoft Surface Pro 7, màn hình 12.3 inch, RAM 8GB.', 21700000.00, 'uploads/67e598509caa3_1743099984.png', 3),
	(15, 'iPad Air 2020', 'Máy tính bảng iPad Air 2020, màn hình 10.9 inch, chip A14 Bionic.', 16990000.00, 'uploads/67e59602ded07_1743099394.png', 3),
	(16, 'Lenovo Tab P11', 'Máy tính bảng Lenovo Tab P11, màn hình 11 inch, 4GB RAM.', 8190000.00, 'uploads/67e635af32850_1743140271.png', 3),
	(17, 'Tai nghe AirPods Pro', 'Tai nghe không dây Apple AirPods Pro với tính năng chống ồn.', 6190000.00, 'uploads/67e43a058e002_1743010309.png', 4),
	(18, 'Bose QuietComfort 35 II', 'Tai nghe Bose QuietComfort 35 II, chống ồn, kết nối Bluetooth.', 9490000.00, 'uploads/67e59925ebd79_1743100197.png', 4),
	(19, 'JBL Flip 5', 'Loa Bluetooth JBL Flip 5, âm thanh mạnh mẽ, chống nước IPX7.', 2390000.00, 'uploads/67e2ab70a0471_1742908272.jpg', 5),
	(20, 'Sony WH-1000XM4', 'Tai nghe Sony WH-1000XM4, chống ồn tuyệt vời, chất âm Hi-Res.', 6690000.00, 'uploads/67e598cc3d2b0_1743100108.png', 4),
	(21, 'Anker Soundcore 2', 'Loa Bluetooth Anker Soundcore 2, âm thanh 360 độ, chống nước IPX7.', 1500000.00, 'uploads/67e2e64219ca3_1742923330.png', 5);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
