-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.20 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table kcms.albums
CREATE TABLE IF NOT EXISTS `albums` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `meta_title` varchar(70) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(160) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table kcms.albums: ~0 rows (approximately)
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;


-- Dumping structure for table kcms.albumsimages
CREATE TABLE IF NOT EXISTS `albumsimages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(20) NOT NULL,
  `foreign_key` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table kcms.albumsimages: ~0 rows (approximately)
/*!40000 ALTER TABLE `albumsimages` DISABLE KEYS */;
/*!40000 ALTER TABLE `albumsimages` ENABLE KEYS */;


-- Dumping structure for table kcms.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `terms` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `params` text,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table kcms.banners: ~0 rows (approximately)
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` (`id`, `terms`, `title`, `slug`, `image`, `description`, `published`, `params`, `created`) VALUES
	(1, 'slideshow', 'Slides Logo 1', 'slides-logo-12', '/files/Banner/slides-logo-12.jpg', 'admins', 1, 'addmin', '2014-10-30 00:37:40'),
	(2, 'slides_logo', 'Slides Logo 1', 'slides-logo-1', '/files/Banner/slides-logo-1.jpg', 'Slides Logo 1', 1, 'Slides Logo 1', '2014-10-30 00:38:25'),
	(4, 'slideshow', 'Slides Logo 1', 'slides-logo-123', '/files/Banner/slides-logo-123.jpg', '', 1, '', '2014-10-30 03:36:09');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;


-- Dumping structure for table kcms.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `description` text,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `meta_title` varchar(70) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(160) DEFAULT NULL,
  `template` varchar(50) DEFAULT NULL,
  `terms` varchar(50) DEFAULT 'post',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table kcms.categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `title`, `slug`, `image`, `description`, `published`, `meta_title`, `meta_keywords`, `meta_description`, `template`, `terms`, `created`, `modified`) VALUES
	(1, 'Uncategorized', 'uncategorized', NULL, NULL, 1, NULL, NULL, NULL, NULL, 'page', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table kcms.configurations
CREATE TABLE IF NOT EXISTS `configurations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `key` varchar(50) NOT NULL,
  `value` text NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table kcms.configurations: ~4 rows (approximately)
/*!40000 ALTER TABLE `configurations` DISABLE KEYS */;
INSERT INTO `configurations` (`id`, `title`, `key`, `value`, `type`) VALUES
	(1, 'Tiêu đề trang web', 'meta_title', 'Từ khi được thành lập, BOO đã xác định hướng đi của mình là không ngừng nâng cao chất lượng sản phẩm', 'text'),
	(2, 'Từ khóa trang chủ', 'meta_keywords', 'Thời trang, ý tưởng, iwill', 'text'),
	(3, 'Mô tả ngắn trang chủ', 'meta_description', 'BOO còn mong muốn đóng góp một phần vào sự phát triển của xã hội, đặc biệt là có thể ảnh hưởng tích cực đến suy nghĩ của các bạn trẻ.', 'text'),
	(4, 'Địa chỉ chân trang', 'footer_address', '', 'textarea');
/*!40000 ALTER TABLE `configurations` ENABLE KEYS */;


-- Dumping structure for table kcms.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table kcms.groups: ~3 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `title`, `slug`, `created`, `modified`) VALUES
	(1, 'Admin', 'admin', '2014-10-28 13:37:11', '2014-10-28 13:37:12'),
	(2, 'Manage', 'manage', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'Member', 'member', '2014-10-28 13:37:49', '2014-10-28 13:37:51');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for table kcms.links
CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table kcms.links: ~0 rows (approximately)
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` (`id`, `menu_id`, `parent_id`, `lft`, `rght`, `title`, `slug`, `link`, `published`, `created`, `modified`) VALUES
	(1, 1, NULL, 1, 4, 'Trang chủ', 'trang-chu', '/', 1, '2014-10-29 23:32:18', '2014-10-29 23:32:18'),
	(2, 1, NULL, 2, 3, 'Giới thiệu', 'gioi-thieu', '/gioi-thieu', 1, '2014-10-29 23:51:13', '2014-10-29 23:51:13'),
	(3, 2, NULL, 1, 4, 'Trang chủ', 'trang-chu', '/', 1, '2014-10-30 00:03:04', '2014-10-30 00:08:32'),
	(4, 2, 3, 2, 3, 'Tin nội bộ', 'tin-noi-bo', '/tin-noi-bo', 1, '2014-10-30 00:04:52', '2014-10-30 00:10:25');
/*!40000 ALTER TABLE `links` ENABLE KEYS */;


-- Dumping structure for table kcms.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table kcms.menus: ~0 rows (approximately)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`id`, `title`, `slug`, `created`) VALUES
	(1, 'Main Menu', 'main-menu', '2014-10-29 23:23:57'),
	(2, 'Menu right', 'menu-right', '2014-10-29 23:27:43');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;


-- Dumping structure for table kcms.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` longtext,
  `meta_title` varchar(70) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(160) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `terms` varchar(50) NOT NULL DEFAULT 'post',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table kcms.posts: ~0 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;


-- Dumping structure for table kcms.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `price_sales` decimal(10,2) DEFAULT '0.00',
  `description` longtext,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `meta_title` varchar(70) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(160) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table kcms.products: ~0 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Dumping structure for table kcms.productsimages
CREATE TABLE IF NOT EXISTS `productsimages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(20) NOT NULL,
  `foreign_key` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table kcms.productsimages: ~0 rows (approximately)
/*!40000 ALTER TABLE `productsimages` DISABLE KEYS */;
/*!40000 ALTER TABLE `productsimages` ENABLE KEYS */;


-- Dumping structure for table kcms.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table kcms.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `group_id`, `username`, `password`, `email`, `published`, `created`, `modified`) VALUES
	(1, 1, 'admin', '$2a$10$Y9HMF2abZ18V9kSHQ/jWQuj4MIbJCYSsL/0MzlpIQV8MPcfjIv/.u', 'depchuanseo@gmail.com', 1, '2014-10-28 09:32:15', '2014-10-29 23:17:30'),
	(2, 3, 'ntsieu', '$2a$10$NcT4KM.HnMVRtDmJCrdlkOC22fzwPIZHRDsBgvmaxQRf4AmZkgaxO', 'ntsieu@gmail.com', 1, '2014-10-29 06:59:13', '2014-10-29 06:59:13');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
