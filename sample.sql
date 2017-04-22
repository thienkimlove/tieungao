-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: tieungao
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `keyword` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Chuot','Chuot','Chuot','ac8953b2485d0b6a5e8b84c6c224be94.png',1,'2017-04-22 11:40:37','2017-04-22 11:40:37');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `export_item_logs`
--

DROP TABLE IF EXISTS `export_item_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `export_item_logs` (
  `export_id` int(10) unsigned NOT NULL,
  `stock_product_id` int(10) unsigned NOT NULL,
  KEY `export_item_logs_export_id_foreign` (`export_id`),
  KEY `export_item_logs_stock_product_id_foreign` (`stock_product_id`),
  CONSTRAINT `export_item_logs_export_id_foreign` FOREIGN KEY (`export_id`) REFERENCES `exports` (`id`) ON DELETE CASCADE,
  CONSTRAINT `export_item_logs_stock_product_id_foreign` FOREIGN KEY (`stock_product_id`) REFERENCES `stock_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `export_item_logs`
--

LOCK TABLES `export_item_logs` WRITE;
/*!40000 ALTER TABLE `export_item_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `export_item_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exports`
--

DROP TABLE IF EXISTS `exports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exports_order_id_foreign` (`order_id`),
  KEY `exports_user_id_foreign` (`user_id`),
  CONSTRAINT `exports_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `exports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exports`
--

LOCK TABLES `exports` WRITE;
/*!40000 ALTER TABLE `exports` DISABLE KEYS */;
INSERT INTO `exports` VALUES (2,6,1,NULL,0,'2017-04-22 14:24:56','2017-04-22 14:25:45'),(3,7,1,NULL,0,'2017-04-22 14:26:05','2017-04-22 14:26:11');
/*!40000 ALTER TABLE `exports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `import_item_logs`
--

DROP TABLE IF EXISTS `import_item_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `import_item_logs` (
  `import_id` int(10) unsigned NOT NULL,
  `stock_product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `import_item_logs_import_id_foreign` (`import_id`),
  KEY `import_item_logs_stock_product_id_foreign` (`stock_product_id`),
  CONSTRAINT `import_item_logs_import_id_foreign` FOREIGN KEY (`import_id`) REFERENCES `imports` (`id`) ON DELETE CASCADE,
  CONSTRAINT `import_item_logs_stock_product_id_foreign` FOREIGN KEY (`stock_product_id`) REFERENCES `stock_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `import_item_logs`
--

LOCK TABLES `import_item_logs` WRITE;
/*!40000 ALTER TABLE `import_item_logs` DISABLE KEYS */;
INSERT INTO `import_item_logs` VALUES (1,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,2,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,3,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,4,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,5,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,6,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,7,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,8,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,9,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,10,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,11,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,12,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,13,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,14,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,15,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,16,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,17,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,18,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,19,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,20,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,21,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,22,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,23,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,24,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,25,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,26,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,27,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,28,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,29,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(1,30,'2017-04-22 11:43:53','2017-04-22 11:43:53');
/*!40000 ALTER TABLE `import_item_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `import_items`
--

DROP TABLE IF EXISTS `import_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `import_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `import_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `import_items_import_id_foreign` (`import_id`),
  KEY `import_items_product_id_foreign` (`product_id`),
  CONSTRAINT `import_items_import_id_foreign` FOREIGN KEY (`import_id`) REFERENCES `imports` (`id`) ON DELETE CASCADE,
  CONSTRAINT `import_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `import_items`
--

LOCK TABLES `import_items` WRITE;
/*!40000 ALTER TABLE `import_items` DISABLE KEYS */;
INSERT INTO `import_items` VALUES (1,1,1,10,'2017-04-22 11:43:47','2017-04-22 11:43:47'),(2,1,2,20,'2017-04-22 11:43:47','2017-04-22 11:43:47');
/*!40000 ALTER TABLE `import_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imports`
--

DROP TABLE IF EXISTS `imports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `supplier_id` int(10) unsigned NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'create',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `imports_user_id_foreign` (`user_id`),
  KEY `imports_supplier_id_foreign` (`supplier_id`),
  CONSTRAINT `imports_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `imports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imports`
--

LOCK TABLES `imports` WRITE;
/*!40000 ALTER TABLE `imports` DISABLE KEYS */;
INSERT INTO `imports` VALUES (1,1,1,NULL,'complete','2017-04-22 11:43:47','2017-04-22 11:43:53');
/*!40000 ALTER TABLE `imports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_04_15_065651_create_table_categories',1),(4,'2017_04_15_065957_create_table_suppliers',1),(5,'2017_04_15_065958_create_table_products',1),(6,'2017_04_15_065959_create_table_stock_products',1),(7,'2017_04_15_070046_create_table_orders',1),(8,'2017_04_15_070137_create_table_imports',1),(9,'2017_04_15_070209_create_table_import_items',1),(10,'2017_04_15_070224_create_table_exports',1),(11,'2017_04_15_072937_create_table_order_items',1),(12,'2017_04_15_081306_create_table_import_item_logs',1),(13,'2017_04_15_081324_create_table_export_item_logs',1),(14,'2017_04_15_215501_edit_some_field_imports',1),(15,'2017_04_17_171910_add_fields_to_order_items',1),(16,'2017_04_22_115534_edit_field_status_of_orders',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_current_price` int(10) unsigned NOT NULL,
  `product_current_vat` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,5,1,2,'2017-04-22 11:50:34','2017-04-22 11:50:34',34534545,10),(2,5,2,2,'2017-04-22 11:50:34','2017-04-22 11:50:34',4234234,10),(3,6,1,2,'2017-04-22 14:23:45','2017-04-22 14:23:45',34534545,10),(4,6,2,2,'2017-04-22 14:23:45','2017-04-22 14:23:45',4234234,10),(5,7,1,2,'2017-04-22 14:25:51','2017-04-22 14:25:51',34534545,10),(6,7,2,2,'2017-04-22 14:25:51','2017-04-22 14:25:51',4234234,10);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `billing_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_note` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'create',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (5,'Do Quan','123 Abc Street','123 Abc Street','123 Abc Street','234234234','tieungao@test.com','Do Quan','123 Abc Street','123 Abc Street','123 Abc Street','234234234','tieungao@test.com','Giao hang tan nha','cancel','2017-04-22 11:50:34','2017-04-22 14:22:27'),(6,'Do Quan','123 Abc Street','123 Abc Street','123 Abc Street','234234234','tieungao@test.com','Do Quan','123 Abc Street','123 Abc Street','123 Abc Street','234234234','tieungao@test.com','Giao hang tan nha','cancel','2017-04-22 14:23:45','2017-04-22 14:25:45'),(7,'Do Quan','123 Abc Street','123 Abc Street','123 Abc Street','234234234','tieungao@test.com','Do Quan','123 Abc Street','123 Abc Street','123 Abc Street','234234234','tieungao@test.com','Giao hang tan nha','cancel','2017-04-22 14:25:51','2017-04-22 14:26:11');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `supplier_id` int(10) unsigned NOT NULL,
  `sell_price` int(10) unsigned DEFAULT NULL,
  `promotion_price` int(10) unsigned DEFAULT NULL,
  `sell_vat` smallint(5) unsigned NOT NULL DEFAULT '10',
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_supplier_id_foreign` (`supplier_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Product 1',1,1,34534545,NULL,10,'Product 1','<p>Product 1</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"/files/upload/images/blog3.jpg\" style=\"height:270px; width:440px\" /></p>','Product 1','790772bf1591a98c7eaeaae9087f43bc.png','790772bf1591a98c7eaeaae9087f43bc.png','790772bf1591a98c7eaeaae9087f43bc.jpg','790772bf1591a98c7eaeaae9087f43bc.jpg',NULL,'790772bf1591a98c7eaeaae9087f43bc.png',NULL,1,'2017-04-22 11:42:08','2017-04-22 11:42:08'),(2,'Product 2',1,1,4234234,NULL,10,'Product 2','<p>Product 2</p>\r\n\r\n<p><img alt=\"\" src=\"/files/upload/images/blog3.jpg\" style=\"height:270px; width:440px\" /></p>','Product 2','e57734f3486236d1627bd9acc136ec66.jpg','e57734f3486236d1627bd9acc136ec66.png','e57734f3486236d1627bd9acc136ec66.jpg',NULL,NULL,NULL,NULL,1,'2017-04-22 11:43:22','2017-04-22 11:43:22');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_products`
--

DROP TABLE IF EXISTS `stock_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `in_stock` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stock_products_product_id_foreign` (`product_id`),
  CONSTRAINT `stock_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_products`
--

LOCK TABLES `stock_products` WRITE;
/*!40000 ALTER TABLE `stock_products` DISABLE KEYS */;
INSERT INTO `stock_products` VALUES (1,1,1,'2017-04-22 11:43:53','2017-04-22 14:26:11'),(2,1,1,'2017-04-22 11:43:53','2017-04-22 14:26:11'),(3,1,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(4,1,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(5,1,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(6,1,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(7,1,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(8,1,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(9,1,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(10,1,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(11,2,1,'2017-04-22 11:43:53','2017-04-22 14:26:11'),(12,2,1,'2017-04-22 11:43:53','2017-04-22 14:26:11'),(13,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(14,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(15,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(16,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(17,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(18,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(19,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(20,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(21,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(22,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(23,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(24,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(25,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(26,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(27,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(28,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(29,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53'),(30,2,1,'2017-04-22 11:43:53','2017-04-22 11:43:53');
/*!40000 ALTER TABLE `stock_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'Nha cung cap Bach Dang','Nha cung cap Bach Dang','43424234','thaicuong.giang@ved.com.vn',1,'2017-04-22 11:41:16','2017-04-22 11:41:16');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'quan.dm@teko.vn','quan.dm@teko.vn','$2y$10$gWboJN2AJWWe6ztHGDcvYuvmXZ6ZSW29n.M1f73wpyopr/.dNf7OC',NULL,'2017-04-22 07:19:58','2017-04-22 07:19:58');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-22 14:29:52
