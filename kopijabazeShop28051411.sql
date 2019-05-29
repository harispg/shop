-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: shop
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.16.04.1

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
-- Table structure for table `article_category`
--

DROP TABLE IF EXISTS `article_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_category` (
  `category_id` int(10) unsigned NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`,`article_id`),
  KEY `article_category_article_id_foreign` (`article_id`),
  CONSTRAINT `article_category_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `article_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_category`
--

LOCK TABLES `article_category` WRITE;
/*!40000 ALTER TABLE `article_category` DISABLE KEYS */;
INSERT INTO `article_category` VALUES (1,45,NULL,NULL),(1,76,NULL,NULL),(1,112,NULL,NULL),(1,130,NULL,NULL),(1,139,NULL,NULL),(2,30,NULL,NULL),(2,73,NULL,NULL),(2,74,NULL,NULL),(2,88,NULL,NULL),(2,106,NULL,NULL),(2,111,NULL,NULL),(2,118,NULL,NULL),(2,131,NULL,NULL),(2,137,NULL,NULL),(2,150,NULL,NULL),(3,35,NULL,NULL),(3,36,NULL,NULL),(3,61,NULL,NULL),(3,121,NULL,NULL),(3,122,NULL,NULL),(4,1,NULL,NULL),(4,14,NULL,NULL),(4,16,NULL,NULL),(4,23,NULL,NULL),(4,49,NULL,NULL),(4,60,NULL,NULL),(4,64,NULL,NULL),(4,66,NULL,NULL),(4,119,NULL,NULL),(4,120,NULL,NULL),(4,136,NULL,NULL),(5,2,NULL,NULL),(5,6,NULL,NULL),(5,21,NULL,NULL),(5,52,NULL,NULL),(5,72,NULL,NULL),(5,77,NULL,NULL),(5,93,NULL,NULL),(5,104,NULL,NULL),(5,126,NULL,NULL),(5,146,NULL,NULL),(6,3,NULL,NULL),(6,7,NULL,NULL),(6,8,NULL,NULL),(6,9,NULL,NULL),(6,10,NULL,NULL),(6,11,NULL,NULL),(6,18,NULL,NULL),(6,27,NULL,NULL),(6,28,NULL,NULL),(6,39,NULL,NULL),(6,48,NULL,NULL),(6,55,NULL,NULL),(6,57,NULL,NULL),(6,67,NULL,NULL),(6,102,NULL,NULL),(6,114,NULL,NULL),(7,22,NULL,NULL),(7,29,NULL,NULL),(7,34,NULL,NULL),(7,40,NULL,NULL),(7,44,NULL,NULL),(7,51,NULL,NULL),(7,59,NULL,NULL),(7,65,NULL,NULL),(7,68,NULL,NULL),(7,75,NULL,NULL),(7,79,NULL,NULL),(7,94,NULL,NULL),(7,97,NULL,NULL),(7,108,NULL,NULL),(7,116,NULL,NULL),(7,117,NULL,NULL),(7,142,NULL,NULL),(8,19,NULL,NULL),(8,42,NULL,NULL),(8,71,NULL,NULL),(8,83,NULL,NULL),(8,87,NULL,NULL),(8,90,NULL,NULL),(8,100,NULL,NULL),(8,101,NULL,NULL),(8,110,NULL,NULL),(8,138,NULL,NULL),(8,140,NULL,NULL),(8,145,NULL,NULL),(8,147,NULL,NULL),(9,20,NULL,NULL),(9,26,NULL,NULL),(9,31,NULL,NULL),(9,54,NULL,NULL),(9,62,NULL,NULL),(9,78,NULL,NULL),(9,82,NULL,NULL),(9,84,NULL,NULL),(9,129,NULL,NULL),(10,4,NULL,NULL),(10,25,NULL,NULL),(10,41,NULL,NULL),(10,53,NULL,NULL),(10,56,NULL,NULL),(10,81,NULL,NULL),(10,86,NULL,NULL),(10,109,NULL,NULL),(11,5,NULL,NULL),(11,37,NULL,NULL),(11,38,NULL,NULL),(11,43,NULL,NULL),(11,92,NULL,NULL),(11,123,NULL,NULL),(11,124,NULL,NULL),(11,128,NULL,NULL),(11,134,NULL,NULL),(12,15,NULL,NULL),(12,24,NULL,NULL),(12,63,NULL,NULL),(12,69,NULL,NULL),(12,89,NULL,NULL),(12,91,NULL,NULL),(12,98,NULL,NULL),(12,127,NULL,NULL),(12,144,NULL,NULL),(13,13,NULL,NULL),(13,17,NULL,NULL),(13,33,NULL,NULL),(13,46,NULL,NULL),(13,50,NULL,NULL),(13,58,NULL,NULL),(13,85,NULL,NULL),(13,96,NULL,NULL),(13,99,NULL,NULL),(13,115,NULL,NULL),(13,132,NULL,NULL),(13,143,NULL,NULL),(13,148,NULL,NULL),(13,149,NULL,NULL),(14,12,NULL,NULL),(14,47,NULL,NULL),(14,80,NULL,NULL),(14,103,NULL,NULL),(14,105,NULL,NULL),(14,133,NULL,NULL),(14,135,NULL,NULL),(15,32,NULL,NULL),(15,70,NULL,NULL),(15,95,NULL,NULL),(15,107,NULL,NULL),(15,113,NULL,NULL),(15,125,NULL,NULL),(15,141,NULL,NULL);
/*!40000 ALTER TABLE `article_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_photo`
--

DROP TABLE IF EXISTS `article_photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_photo` (
  `article_id` int(10) unsigned NOT NULL,
  `photo_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`article_id`,`photo_id`),
  KEY `article_photo_photo_id_foreign` (`photo_id`),
  CONSTRAINT `article_photo_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `article_photo_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_photo`
--

LOCK TABLES `article_photo` WRITE;
/*!40000 ALTER TABLE `article_photo` DISABLE KEYS */;
INSERT INTO `article_photo` VALUES (1,5,NULL,NULL),(1,16,NULL,NULL),(2,3,NULL,NULL),(2,7,NULL,NULL),(2,19,NULL,NULL),(3,11,NULL,NULL),(3,14,NULL,NULL),(4,2,NULL,NULL),(4,5,NULL,NULL),(5,5,NULL,NULL),(5,17,NULL,NULL),(6,11,NULL,NULL),(7,3,NULL,NULL),(7,10,NULL,NULL),(7,14,NULL,NULL),(8,1,NULL,NULL),(8,2,NULL,NULL),(8,14,NULL,NULL),(9,6,NULL,NULL),(10,15,NULL,NULL),(11,9,NULL,NULL),(11,16,NULL,NULL),(12,6,NULL,NULL),(13,3,NULL,NULL),(14,9,NULL,NULL),(14,15,NULL,NULL),(15,11,NULL,NULL),(16,12,NULL,NULL),(16,16,NULL,NULL),(17,9,NULL,NULL),(18,11,NULL,NULL),(18,20,NULL,NULL),(19,16,NULL,NULL),(19,20,NULL,NULL),(20,5,NULL,NULL),(20,17,NULL,NULL),(21,10,NULL,NULL),(21,14,NULL,NULL),(21,20,NULL,NULL),(22,3,NULL,NULL),(23,3,NULL,NULL),(23,12,NULL,NULL),(24,9,NULL,NULL),(24,15,NULL,NULL),(25,4,NULL,NULL),(25,12,NULL,NULL),(25,16,NULL,NULL),(26,4,NULL,NULL),(26,7,NULL,NULL),(26,9,NULL,NULL),(27,13,NULL,NULL),(28,2,NULL,NULL),(28,7,NULL,NULL),(29,3,NULL,NULL),(29,7,NULL,NULL),(29,17,NULL,NULL),(30,2,NULL,NULL),(30,10,NULL,NULL),(30,14,NULL,NULL),(31,3,NULL,NULL),(31,18,NULL,NULL),(32,1,NULL,NULL),(32,2,NULL,NULL),(32,6,NULL,NULL),(33,1,NULL,NULL),(33,8,NULL,NULL),(33,17,NULL,NULL),(34,20,NULL,NULL),(35,4,NULL,NULL),(35,14,NULL,NULL),(36,10,NULL,NULL),(36,15,NULL,NULL),(37,4,NULL,NULL),(37,15,NULL,NULL),(37,19,NULL,NULL),(38,16,NULL,NULL),(39,1,NULL,NULL),(39,11,NULL,NULL),(39,17,NULL,NULL),(40,17,NULL,NULL),(41,14,NULL,NULL),(42,3,NULL,NULL),(43,9,NULL,NULL),(43,10,NULL,NULL),(44,13,NULL,NULL),(45,6,NULL,NULL),(45,16,NULL,NULL),(46,9,NULL,NULL),(46,11,NULL,NULL),(46,15,NULL,NULL),(47,3,NULL,NULL),(47,9,NULL,NULL),(48,14,NULL,NULL),(48,20,NULL,NULL),(49,8,NULL,NULL),(49,10,NULL,NULL),(49,15,NULL,NULL),(50,3,NULL,NULL),(50,10,NULL,NULL),(50,19,NULL,NULL),(51,7,NULL,NULL),(51,11,NULL,NULL),(51,19,NULL,NULL),(52,17,NULL,NULL),(53,19,NULL,NULL),(54,9,NULL,NULL),(54,16,NULL,NULL),(55,13,NULL,NULL),(56,6,NULL,NULL),(56,14,NULL,NULL),(57,11,NULL,NULL),(58,7,NULL,NULL),(58,13,NULL,NULL),(58,18,NULL,NULL),(59,11,NULL,NULL),(60,9,NULL,NULL),(61,15,NULL,NULL),(61,18,NULL,NULL),(62,16,NULL,NULL),(63,1,NULL,NULL),(63,3,NULL,NULL),(63,6,NULL,NULL),(64,5,NULL,NULL),(65,4,NULL,NULL),(66,2,NULL,NULL),(66,4,NULL,NULL),(67,9,NULL,NULL),(67,12,NULL,NULL),(67,15,NULL,NULL),(68,13,NULL,NULL),(69,3,NULL,NULL),(69,7,NULL,NULL),(69,12,NULL,NULL),(70,4,NULL,NULL),(70,18,NULL,NULL),(71,11,NULL,NULL),(72,10,NULL,NULL),(73,5,NULL,NULL),(73,7,NULL,NULL),(73,18,NULL,NULL),(74,3,NULL,NULL),(75,2,NULL,NULL),(75,16,NULL,NULL),(76,16,NULL,NULL),(76,19,NULL,NULL),(77,2,NULL,NULL),(77,3,NULL,NULL),(77,8,NULL,NULL),(78,17,NULL,NULL),(79,7,NULL,NULL),(79,12,NULL,NULL),(80,9,NULL,NULL),(81,19,NULL,NULL),(82,8,NULL,NULL),(82,11,NULL,NULL),(82,18,NULL,NULL),(83,6,NULL,NULL),(83,10,NULL,NULL),(84,5,NULL,NULL),(84,9,NULL,NULL),(85,1,NULL,NULL),(85,2,NULL,NULL),(85,3,NULL,NULL),(86,4,NULL,NULL),(87,9,NULL,NULL),(87,10,NULL,NULL),(88,1,NULL,NULL),(88,5,NULL,NULL),(88,12,NULL,NULL),(89,2,NULL,NULL),(89,4,NULL,NULL),(89,5,NULL,NULL),(90,15,NULL,NULL),(90,18,NULL,NULL),(90,19,NULL,NULL),(91,3,NULL,NULL),(91,5,NULL,NULL),(91,19,NULL,NULL),(92,1,NULL,NULL),(92,20,NULL,NULL),(93,18,NULL,NULL),(94,6,NULL,NULL),(94,8,NULL,NULL),(94,17,NULL,NULL),(95,8,NULL,NULL),(95,16,NULL,NULL),(95,20,NULL,NULL),(96,2,NULL,NULL),(97,5,NULL,NULL),(98,1,NULL,NULL),(98,10,NULL,NULL),(99,8,NULL,NULL),(100,13,NULL,NULL),(100,16,NULL,NULL),(101,9,NULL,NULL),(101,18,NULL,NULL),(102,2,NULL,NULL),(102,12,NULL,NULL),(103,6,NULL,NULL),(103,7,NULL,NULL),(104,20,NULL,NULL),(105,8,NULL,NULL),(105,10,NULL,NULL),(106,6,NULL,NULL),(106,9,NULL,NULL),(106,15,NULL,NULL),(107,10,NULL,NULL),(108,6,NULL,NULL),(108,13,NULL,NULL),(108,19,NULL,NULL),(109,5,NULL,NULL),(109,17,NULL,NULL),(110,7,NULL,NULL),(110,18,NULL,NULL),(111,9,NULL,NULL),(111,11,NULL,NULL),(112,7,NULL,NULL),(113,18,NULL,NULL),(114,11,NULL,NULL),(115,11,NULL,NULL),(115,12,NULL,NULL),(115,16,NULL,NULL),(116,2,NULL,NULL),(116,3,NULL,NULL),(116,12,NULL,NULL),(117,10,NULL,NULL),(117,16,NULL,NULL),(118,9,NULL,NULL),(118,18,NULL,NULL),(118,19,NULL,NULL),(119,2,NULL,NULL),(119,10,NULL,NULL),(120,5,NULL,NULL),(120,12,NULL,NULL),(121,5,NULL,NULL),(121,6,NULL,NULL),(122,2,NULL,NULL),(122,8,NULL,NULL),(123,3,NULL,NULL),(123,12,NULL,NULL),(123,18,NULL,NULL),(124,4,NULL,NULL),(124,13,NULL,NULL),(124,16,NULL,NULL),(125,1,NULL,NULL),(125,10,NULL,NULL),(126,9,NULL,NULL),(127,9,NULL,NULL),(127,20,NULL,NULL),(128,2,NULL,NULL),(128,5,NULL,NULL),(128,18,NULL,NULL),(129,10,NULL,NULL),(129,17,NULL,NULL),(130,7,NULL,NULL),(130,10,NULL,NULL),(131,6,NULL,NULL),(131,8,NULL,NULL),(132,1,NULL,NULL),(132,6,NULL,NULL),(132,8,NULL,NULL),(133,2,NULL,NULL),(133,7,NULL,NULL),(134,8,NULL,NULL),(135,1,NULL,NULL),(135,12,NULL,NULL),(135,18,NULL,NULL),(136,10,NULL,NULL),(137,3,NULL,NULL),(137,16,NULL,NULL),(138,13,NULL,NULL),(138,16,NULL,NULL),(138,18,NULL,NULL),(139,2,NULL,NULL),(140,2,NULL,NULL),(141,5,NULL,NULL),(142,7,NULL,NULL),(142,9,NULL,NULL),(143,6,NULL,NULL),(143,8,NULL,NULL),(143,10,NULL,NULL),(144,4,NULL,NULL),(144,5,NULL,NULL),(144,11,NULL,NULL),(145,2,NULL,NULL),(145,12,NULL,NULL),(145,18,NULL,NULL),(146,8,NULL,NULL),(146,17,NULL,NULL),(146,20,NULL,NULL),(147,4,NULL,NULL),(148,1,NULL,NULL),(148,10,NULL,NULL),(148,12,NULL,NULL),(149,4,NULL,NULL),(149,16,NULL,NULL),(150,7,NULL,NULL),(150,13,NULL,NULL),(150,15,NULL,NULL);
/*!40000 ALTER TABLE `article_photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_tag`
--

DROP TABLE IF EXISTS `article_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_tag` (
  `article_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`article_id`,`tag_id`),
  KEY `article_tag_tag_id_foreign` (`tag_id`),
  CONSTRAINT `article_tag_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `article_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_tag`
--

LOCK TABLES `article_tag` WRITE;
/*!40000 ALTER TABLE `article_tag` DISABLE KEYS */;
INSERT INTO `article_tag` VALUES (4,1),(9,1),(11,1),(21,1),(26,1),(27,1),(32,1),(35,1),(44,1),(47,1),(52,1),(53,1),(54,1),(58,1),(60,1),(61,1),(70,1),(71,1),(72,1),(76,1),(79,1),(81,1),(82,1),(91,1),(95,1),(97,1),(108,1),(112,1),(113,1),(119,1),(125,1),(127,1),(130,1),(140,1),(141,1),(145,1),(146,1),(3,2),(6,2),(8,2),(12,2),(15,2),(21,2),(22,2),(30,2),(31,2),(34,2),(35,2),(38,2),(39,2),(40,2),(41,2),(49,2),(62,2),(64,2),(66,2),(77,2),(78,2),(81,2),(82,2),(83,2),(85,2),(89,2),(90,2),(92,2),(95,2),(98,2),(100,2),(105,2),(107,2),(108,2),(115,2),(128,2),(130,2),(131,2),(134,2),(138,2),(140,2),(142,2),(146,2),(148,2),(149,2),(1,3),(10,3),(11,3),(18,3),(19,3),(20,3),(24,3),(25,3),(46,3),(50,3),(51,3),(65,3),(73,3),(74,3),(75,3),(77,3),(82,3),(83,3),(87,3),(90,3),(93,3),(95,3),(97,3),(99,3),(103,3),(106,3),(113,3),(118,3),(121,3),(125,3),(126,3),(127,3),(134,3),(138,3),(139,3),(146,3),(150,3),(2,4),(14,4),(24,4),(28,4),(33,4),(34,4),(40,4),(50,4),(51,4),(57,4),(58,4),(69,4),(74,4),(75,4),(81,4),(101,4),(103,4),(106,4),(108,4),(111,4),(113,4),(118,4),(123,4),(126,4),(139,4),(143,4),(145,4),(149,4),(3,5),(10,5),(13,5),(14,5),(23,5),(25,5),(37,5),(38,5),(41,5),(42,5),(43,5),(48,5),(50,5),(53,5),(58,5),(60,5),(61,5),(63,5),(64,5),(66,5),(72,5),(76,5),(78,5),(84,5),(87,5),(89,5),(94,5),(98,5),(99,5),(104,5),(106,5),(109,5),(125,5),(129,5),(130,5),(135,5),(136,5),(137,5),(139,5),(140,5),(147,5),(1,6),(5,6),(8,6),(14,6),(16,6),(20,6),(26,6),(32,6),(36,6),(37,6),(41,6),(45,6),(56,6),(67,6),(75,6),(80,6),(88,6),(96,6),(102,6),(107,6),(109,6),(110,6),(116,6),(122,6),(128,6),(131,6),(132,6),(133,6),(142,6),(3,7),(4,7),(6,7),(7,7),(17,7),(18,7),(21,7),(33,7),(35,7),(36,7),(42,7),(45,7),(46,7),(52,7),(54,7),(55,7),(56,7),(59,7),(61,7),(63,7),(65,7),(67,7),(68,7),(71,7),(73,7),(74,7),(79,7),(86,7),(91,7),(93,7),(100,7),(103,7),(104,7),(111,7),(114,7),(119,7),(121,7),(123,7),(124,7),(128,7),(137,7),(147,7),(148,7),(2,8),(4,8),(5,8),(7,8),(8,8),(16,8),(17,8),(19,8),(20,8),(25,8),(27,8),(29,8),(30,8),(38,8),(43,8),(46,8),(48,8),(55,8),(65,8),(66,8),(78,8),(80,8),(83,8),(87,8),(97,8),(107,8),(110,8),(115,8),(117,8),(120,8),(122,8),(124,8),(126,8),(127,8),(144,8),(148,8);
/*!40000 ALTER TABLE `article_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_user`
--

DROP TABLE IF EXISTS `article_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_user` (
  `article_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`article_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_user`
--

LOCK TABLES `article_user` WRITE;
/*!40000 ALTER TABLE `article_user` DISABLE KEYS */;
INSERT INTO `article_user` VALUES (2,2),(2,3),(3,2),(3,3),(3,4),(4,1),(4,3),(6,1),(8,1),(36,1),(71,1),(121,2);
/*!40000 ALTER TABLE `article_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `specification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` int(10) unsigned NOT NULL,
  `price` double(8,2) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT '0',
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `articles_name_unique` (`name`),
  UNIQUE KEY `articles_sku_unique` (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'consequatur','Omnis magni quisquam qui sunt id. Et sed unde aut aut eum autem. Dolor doloremque consequatur ut aspernatur enim quia sit natus. Sint praesentium aut laborum et optio qui.','Exercitationem aut dolor ullam. Vero quia laudantium repellendus. Aut provident et est. Expedita id et et autem dolore dolorem.',465850,8.48,0,0,0,19,'2019-04-06 16:10:38','2019-04-06 16:10:38'),(2,'fuga','Repellat et nisi facilis ipsa neque. Eum et perferendis quae. Rem odit ut debitis quaerat. Soluta dolorem accusantium ipsam eaque ea.','Et mollitia fugiat et ea ut alias atque debitis. Adipisci id temporibus et consequatur corporis minima ut. Ex est voluptas maiores. Sed repellat sed ducimus ex.',649496,54.65,15,0,0,54,'2019-04-06 16:10:38','2019-04-15 16:08:16'),(3,'sit','Distinctio perferendis blanditiis non quasi sit. Repellendus cupiditate iusto quia exercitationem qui. Architecto recusandae non eos nisi consequatur et alias eos. Velit nemo distinctio minima rem.','Rerum dolor rerum quasi accusantium voluptate. Commodi ut placeat illum velit et.',408534,20.85,0,0,0,235,'2019-04-06 16:10:38','2019-04-06 16:10:38'),(4,'error','Autem soluta fugit repellendus laudantium consequatur. Nesciunt porro sint omnis assumenda. A ut tempore ducimus ut iste culpa.','Modi accusantium debitis accusamus explicabo consequatur consequatur. Magnam repellat ab reiciendis vel dolorem rem. Iure amet et eum.',217384,24.84,0,0,0,294,'2019-04-06 16:10:38','2019-04-06 16:10:38'),(5,'rerum','Totam temporibus ipsa quisquam qui. Ut perferendis aut hic natus. Sequi asperiores sunt tempora culpa provident et fugit. Et expedita repudiandae eligendi itaque suscipit dicta.','Et pariatur animi harum aliquid aut. Qui beatae illo eum. Nulla hic et delectus id ea debitis dicta.',765783,44.15,0,0,0,389,'2019-04-06 16:10:38','2019-04-06 16:10:38'),(6,'amet','Ex accusantium reiciendis accusantium voluptatem sint omnis. Sint et ut voluptatum in aut qui. Eos id beatae consequatur excepturi delectus.','Quis voluptatem sequi aliquid neque. Modi voluptatibus et quos doloremque neque aut. Quasi qui est facilis quia rem.',107360,4.41,0,0,0,168,'2019-04-06 16:10:38','2019-04-06 16:10:38'),(7,'autem','Quo temporibus suscipit ut dolores. Repellat ipsum aut consequatur in. Ea ipsum tempora eveniet odit nemo. Libero architecto qui qui ut perspiciatis omnis.','Eum deleniti illo expedita ex est quia maiores. Autem fuga dolorem dolorem enim. Quos pariatur exercitationem temporibus tempore quis voluptatem.',172340,42.04,0,0,0,158,'2019-04-06 16:10:38','2019-04-06 16:10:38'),(8,'dolorem','Nihil quod sapiente itaque quia repudiandae nihil aperiam. Consequuntur amet accusamus dolorum quia et. Repudiandae commodi fugiat quae nihil esse similique aut. Vel quo amet et sapiente consequatur consequatur.','Qui soluta ut explicabo sunt dolorem illo ab. Consectetur reiciendis explicabo nostrum enim harum. Ullam architecto sed quos dolore. Quasi assumenda aliquam est aut ipsa.',709557,6.80,0,0,0,396,'2019-04-06 16:10:38','2019-04-06 16:10:38'),(9,'aut','Error rem sit consequatur. Sequi velit qui eos sint deserunt dolorem provident nesciunt. Iusto ut voluptatem qui maiores reiciendis neque delectus. Totam quia ut quidem harum suscipit nulla rerum rerum.','Molestiae rerum dolorem nemo sint consequuntur enim. Ad est quisquam voluptatem autem provident. Suscipit vitae blanditiis voluptas nesciunt. Nesciunt quod enim aut tempora voluptatibus sed ipsum ea.',997974,36.42,0,0,0,459,'2019-04-06 16:10:38','2019-04-06 16:10:38'),(10,'nostrum','Aut labore est odio quisquam. Ea sit et explicabo velit unde qui. Ut aut vero a quisquam sunt. Ducimus vel sunt nemo eum adipisci.','Quod libero beatae autem nostrum sequi. Hic enim eum voluptatem deserunt error. Deserunt non recusandae quasi qui voluptatem saepe modi. Molestias ipsum distinctio delectus.',963877,72.82,0,0,0,313,'2019-04-06 16:10:38','2019-04-06 16:10:38'),(11,'in','Velit vel reiciendis sed voluptatem magni. Ipsa quis illo rem nesciunt ex. Nemo rerum itaque in qui earum et.','Qui autem debitis nam. Nihil qui aspernatur adipisci laboriosam dolor qui voluptas vero. Eum non consequatur minus nihil in accusamus. Eveniet sint explicabo possimus.',185063,69.07,0,0,0,196,'2019-04-06 16:10:38','2019-04-06 16:10:38'),(12,'iste','Corrupti reiciendis porro qui nobis illo. Sint sed animi sapiente deleniti facilis illo. Cupiditate et libero praesentium temporibus.','Vel omnis provident a rerum consequatur nemo dolorem. Esse fugit velit quas qui et totam. Eius numquam consequatur in autem voluptatem quas possimus.',935384,47.15,0,0,0,358,'2019-04-06 16:10:38','2019-04-06 16:10:38'),(13,'pariatur','Quo et et doloremque accusantium illum soluta odio velit. Assumenda similique dolorem sint delectus rerum voluptas. Itaque veritatis ut voluptas voluptatum perferendis similique. Odio sapiente quo nobis architecto maxime beatae.','Sint quod et nulla eum. Illum tenetur omnis corrupti ratione. Tempore quas facilis illo laboriosam. Expedita nihil molestias unde et at. Aut rerum deserunt rerum iste non.',705648,69.71,0,0,0,202,'2019-04-06 16:10:38','2019-04-06 16:10:38'),(14,'qui','Et ab nulla omnis quasi. Et consequatur tempora sequi hic. Voluptatem quas rerum et sed quisquam consequatur iusto dicta.','Esse itaque quia assumenda dolore odit reiciendis. Aspernatur quia a et ea veniam est qui. Iste inventore numquam et deleniti.',955777,55.95,0,0,0,216,'2019-04-06 16:10:38','2019-04-06 16:10:38'),(15,'illum','Culpa architecto necessitatibus nemo libero sunt quae. Dolore sunt error necessitatibus sequi aut. Commodi incidunt soluta temporibus velit numquam qui. Vero amet earum earum.','Aut qui laborum modi labore. Ut est dolorem saepe. Quia et ut quod amet illum numquam laborum. Sapiente impedit dolore distinctio sunt cupiditate.',857200,81.08,0,0,0,206,'2019-04-06 16:10:38','2019-04-06 16:10:38'),(16,'mollitia','Odit exercitationem assumenda repellat ea. Qui earum ut et adipisci dolorem mollitia est. Perspiciatis est accusantium maiores molestiae nobis. Vel facilis sed similique et. Ea sapiente qui vitae facere cum.','Omnis ea dolore voluptas vitae totam. Voluptatem deleniti praesentium quibusdam nihil est laborum.',150153,53.54,0,0,0,213,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(17,'reiciendis','Sit quia commodi eum laborum. Animi nostrum quidem voluptatem voluptatem accusamus quos. Et inventore ea quos et amet. Amet in corporis rerum et sit recusandae earum. Occaecati voluptatem quasi autem doloremque itaque saepe.','Sapiente sit saepe impedit aut aut tempore harum. Et illo consequatur est magni. Possimus dolor molestiae eum ea sit neque voluptas. Optio at placeat quia temporibus ratione non magni.',265167,92.22,0,0,0,449,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(18,'voluptatum','Hic qui aliquid minus accusamus. Consectetur soluta et voluptate aut voluptates sed velit libero. Corrupti omnis velit magnam dolorem earum ab molestias. Quia vero et quos nobis ea impedit voluptates.','Doloremque accusamus fugiat aut repellendus eos facere tenetur. Excepturi officia quia nostrum eos sequi. Repellendus sunt rerum et ut natus et nobis. Ullam id nihil repellendus quia.',980402,71.93,0,0,0,320,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(19,'consectetur','Reprehenderit eligendi voluptate suscipit unde excepturi est. Beatae est a vitae dicta sunt culpa. Quo dolores qui dolore. Ipsam fugit et necessitatibus in asperiores repellat. Ducimus et ut minus.','Ad porro qui dolorem. Expedita et voluptatem eos eum cum vel. Nulla quia nisi voluptatem quos omnis sint perferendis ut. Ipsam est eos sapiente excepturi illum.',767860,82.76,0,0,0,56,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(20,'at','Dolore impedit et inventore id velit. Soluta fugiat beatae omnis sint. Modi nemo repudiandae vitae dignissimos. Dolorem omnis blanditiis eligendi qui blanditiis praesentium.','Molestiae qui minima fuga ut quia tenetur sunt. Voluptatum repudiandae repellat iure nobis et modi qui. Dolores est fuga placeat aperiam ut vitae.',399760,58.71,0,0,0,272,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(21,'voluptas','Vitae at atque expedita ducimus eos id sed. Aut consectetur quia non minima voluptates. Autem sunt fugiat hic nemo. Quisquam ut perferendis ex cumque.','Aut repellendus quasi nihil magni. Ducimus beatae nemo velit vel incidunt temporibus quibusdam. Nostrum eum reiciendis possimus qui optio.',580655,42.18,0,0,0,456,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(22,'est','Totam dolor possimus vel. Commodi exercitationem sit quia iusto. Dolor blanditiis enim error eos illo. Laboriosam eos et blanditiis aliquam alias corrupti.','Et nostrum aliquam eaque beatae ea. Commodi repellendus nesciunt asperiores aperiam quae maiores dolor veniam. Unde doloremque minima cum nesciunt illo nihil alias.',995627,86.10,0,0,0,341,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(23,'et','Dicta alias quo aut omnis qui incidunt dolores. Optio omnis alias exercitationem. Hic sit tempora modi nisi possimus laboriosam quae animi. Dicta alias aut nihil illo modi.','Ducimus consequatur itaque velit eaque velit quia. Iste reiciendis dicta quam doloribus voluptatem omnis. Occaecati fugit nemo provident quis.',173842,4.35,0,0,0,297,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(24,'omnis','Non molestias totam odit odio quis ut dicta laborum. Aut neque non dolorum et amet distinctio. Vel rerum ut repellendus id in corporis expedita fugiat. Vel quibusdam ut placeat ipsum eum ut inventore.','Illum temporibus ipsa temporibus aut similique nisi eos. Quo autem cupiditate temporibus inventore similique.',333153,41.97,0,0,0,489,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(25,'asperiores','Aut vel illo ratione eius modi non. Nihil veritatis recusandae incidunt aperiam suscipit eum. Consequatur provident ullam et. Odio perspiciatis sit quis vel quod.','Ipsam aut dolores fugiat vitae ad dolor qui. Non dolorem quidem nobis occaecati perspiciatis tempore aut. Dolore laudantium ab quaerat in. Deserunt qui saepe unde.',482848,9.29,0,0,0,188,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(26,'vel','Est voluptatem occaecati omnis distinctio ullam. A est in et voluptatem officia. Rerum itaque voluptatum tempora voluptas magni et. Sed quia sunt voluptatum nemo commodi aspernatur.','Debitis delectus optio quisquam. In eum totam sit maiores odio. Sed reiciendis minus error voluptas enim.',339161,2.95,0,0,0,344,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(27,'quod','Est earum dolor aspernatur quas omnis id consectetur. Et nemo impedit sed perspiciatis accusantium. Neque ut atque a nemo quos eos aliquam. Consectetur cupiditate vero quos.','Praesentium quam pariatur quia ut accusantium cupiditate. Exercitationem harum tempore autem dolore consequatur tempora. Provident voluptatum hic odit et eaque non pariatur enim.',358441,27.28,0,0,0,207,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(28,'quae','Occaecati minus possimus nostrum id nesciunt ipsam corporis. Sit sunt voluptatibus impedit voluptas. Aliquam ea illo molestiae commodi.','Autem et incidunt enim deserunt fuga facilis. Deserunt sint illum vero blanditiis quis officia quaerat. Et iure aut sed. Distinctio dolorem enim aut et ullam eum optio.',169586,32.30,0,0,0,480,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(29,'cum','Tempore cum dolores molestiae totam. Vero non rem corrupti delectus impedit.','Ut facere quasi perspiciatis deserunt illum quidem autem. Cum et accusamus asperiores voluptate aut. Enim quia omnis perferendis.',975444,4.74,0,0,0,414,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(30,'quia','Nesciunt rerum velit aspernatur omnis vel voluptatem expedita. Eos ut libero molestiae deleniti libero architecto. Ut placeat vel sed aut eveniet in. Est modi sed tempora facere voluptate minus et.','Exercitationem animi ut vitae qui qui. Mollitia enim voluptatem dolores quam et praesentium voluptas. Dolor voluptas assumenda aut quia incidunt. Dolores laboriosam et dolor qui dignissimos minus.',432243,97.38,0,0,0,107,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(31,'ad','Aliquam et ut reprehenderit quia est dolorum quis. Et dolorum deleniti laudantium repellendus aut. Dolor dolorem itaque possimus sapiente voluptatum dignissimos.','Fugit fugit blanditiis distinctio vitae voluptates. Sit voluptates dolor dolor. Facilis ipsum illum repellat aut nesciunt. Rerum maxime et et optio ea vel.',885099,67.84,0,0,0,167,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(32,'perspiciatis','Quis perferendis temporibus animi soluta. Quas nisi et quis libero molestias porro. Quo in atque quis autem. Excepturi numquam fugiat nostrum aliquid ab.','Ut quo quae quia aliquam iste aliquam ex. Id voluptatibus quo itaque et ea odit. Voluptas ea est animi eveniet voluptatibus magni.',565010,87.28,0,0,0,99,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(33,'deserunt','Officiis quis odit dolore autem possimus cupiditate. Fugit nulla nobis laudantium et ex. Iste dolor nihil quam. Laudantium ratione quo necessitatibus commodi repellendus laboriosam.','A iusto vitae qui accusamus. Et quo ut quam dolores quos velit. Veniam eos in ab. Nulla illum nesciunt sed enim ea. Animi quia minus doloribus fugit.',368932,29.81,0,0,0,414,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(34,'voluptatibus','Consequatur rerum dignissimos ut omnis laborum. Rerum molestiae omnis sed aut necessitatibus quod explicabo. Est quidem quas quam qui velit.','Ad libero architecto tempore optio repellat. Eos est in necessitatibus et. Deleniti autem voluptatibus quia ratione esse ullam.',132304,40.59,0,0,0,72,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(35,'occaecati','Enim amet nobis natus ipsam quia. Laborum hic tenetur adipisci assumenda. Commodi fuga minima exercitationem reprehenderit.','Quae maxime est nulla. Veniam asperiores ut molestiae excepturi ea. Aut occaecati consequuntur quod animi. Ad ea dolores et laborum.',777383,20.99,0,0,0,292,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(36,'aspernatur','Libero sit provident quis. Nulla repellat mollitia voluptas eos animi sit. Tempora ipsa ut aperiam eligendi quas aut sunt.','Sequi doloremque ipsum perferendis tempore. Qui esse ut inventore distinctio ut facere. Ut qui error voluptas distinctio.',947901,47.69,0,0,0,323,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(37,'ut','Consequuntur sed blanditiis laboriosam commodi. Ut non dicta et deleniti iusto sunt veritatis. Est est animi aut non et.','Velit voluptatibus dicta sunt omnis ex. Et nam molestiae reiciendis optio dignissimos. Dicta cumque ducimus dolorem nihil dolorem exercitationem et. Occaecati placeat et ea animi.',549414,0.80,0,0,0,344,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(38,'fugiat','Ea voluptatum illo facere voluptates autem eos. Voluptas corporis aut sed non nulla. Itaque sed fugiat dolorem veritatis rerum accusamus beatae.','Consequatur delectus culpa perspiciatis nihil. Ut labore ea fugiat sunt quo cumque. Adipisci aperiam et quis repudiandae ea repellat quis. A ipsam quibusdam quo repellendus.',800311,60.72,0,0,0,129,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(39,'excepturi','Quod sit sit assumenda fugit. Illum mollitia distinctio rerum dolore. Nulla in quia nobis numquam dolorum impedit.','In doloremque dolores iure cum et. Temporibus et provident dolor magni pariatur. Quia perspiciatis sit quibusdam voluptates ullam explicabo. Eos odit recusandae qui nobis.',580923,67.25,0,0,0,372,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(40,'culpa','Ex quis qui eum. Dolorem velit corporis vel. Earum et dolor praesentium quis est debitis rerum maiores.','Culpa enim qui sed et. Consequatur magnam excepturi quae ipsa iste. Rem velit debitis omnis optio et est. Nostrum qui aliquid nobis delectus ut similique temporibus doloremque.',623487,94.87,0,0,0,497,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(41,'inventore','Consectetur architecto neque repudiandae quidem magnam. Aut amet adipisci labore consequuntur. Ad suscipit consequatur delectus cupiditate praesentium maiores molestiae. Doloremque dolores voluptas odio impedit aut corporis aut.','Voluptates cum voluptates ipsa dolores atque nam. Libero animi ut dolore dolor dolor. Et et eveniet qui. Reiciendis sed suscipit sapiente error maiores et id veniam.',969390,13.82,0,0,0,454,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(42,'voluptates','Molestias quidem totam iusto vel et aliquam. Incidunt illum quis non consequatur nesciunt qui ad ipsam. Debitis iure inventore in fuga.','Totam fugit quibusdam expedita ratione. Eos ut et qui adipisci. Blanditiis saepe ea perspiciatis in alias quis.',633641,20.57,0,0,0,41,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(43,'cumque','Ut eum autem labore quae explicabo non velit iure. Nostrum voluptatum inventore aut nam laborum omnis tempora. Natus accusantium qui ab in atque.','Ratione doloremque incidunt voluptas neque rerum dolorum odio voluptatum. Non quasi laborum similique et officia omnis et. Consequatur inventore iste totam reiciendis.',878591,81.65,0,0,0,328,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(44,'vero','Sunt magni impedit voluptatem eaque soluta repellendus alias. Voluptas nostrum reprehenderit quia consequatur tempora. Quos et sit nemo sit.','Nihil eos reprehenderit voluptatem. Voluptatem maiores voluptatem et. In sed sunt dolorem sed voluptates dolores. Maiores aperiam voluptates nisi. Voluptas quia tenetur itaque eius aliquam.',478730,61.57,0,0,0,374,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(45,'sunt','Nostrum esse et adipisci ut voluptatibus quo ut. Delectus eligendi sit odit aspernatur. Voluptas molestiae nihil earum doloremque. Beatae ut repellat delectus. Pariatur nostrum perferendis eius ut excepturi molestias.','Autem et aut doloribus voluptatibus repellat sequi facilis. Aliquam asperiores quae fugit veniam non rerum quod.',738764,13.58,0,0,0,177,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(46,'dolore','Omnis et fugit eum sed. Sunt eaque reiciendis quia harum. Consequuntur temporibus amet temporibus beatae.','Atque aut odio dicta quis. Et necessitatibus est voluptas voluptatem est non vero. Alias est suscipit perferendis. Tempore consequatur nostrum et.',816901,78.31,0,0,0,194,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(47,'enim','Omnis nam ipsum quia labore. Minima corrupti voluptatem fugiat sint alias consequatur et. Vero et assumenda voluptatem et illo nemo sapiente corporis. Atque eum iste nisi ut vitae vero illum.','Dolore magni unde quam optio tempore maiores nihil rerum. Consequatur voluptatum velit illum nobis cumque est ut. Est libero eum animi. Consequatur officiis qui ad.',815897,56.22,0,0,0,390,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(48,'facilis','Quia excepturi suscipit optio laborum dolores accusamus dolor. Quae nam omnis corrupti eveniet nostrum. Sapiente autem non delectus aut animi. Ab soluta rerum beatae autem qui eaque quasi aspernatur.','Id totam id doloribus magni quo quis nobis. Enim ea aut enim est quaerat. Ratione eius quia expedita ut distinctio. Dicta aut architecto illo quam.',245800,47.39,0,0,0,195,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(49,'tempora','Ipsum numquam architecto pariatur illum reprehenderit sed architecto qui. Cumque officia aliquam numquam consectetur minus qui est odit. Asperiores in exercitationem qui sed nostrum quos. Ea veritatis dignissimos sapiente molestiae tenetur consequatur.','Eos est voluptas ratione ad. Voluptas illo autem amet voluptatibus. Iusto ut soluta velit qui quisquam.',993794,79.72,0,0,0,149,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(50,'sapiente','Debitis id commodi distinctio corrupti facere tempore. Cumque beatae rerum eligendi quos provident laborum neque voluptatem. Qui nostrum omnis molestiae quod.','Expedita dolorum suscipit earum non porro occaecati. Quia ut labore esse quo. Tempore sapiente quis ut delectus. Ipsam maxime repellendus nostrum.',393381,44.61,0,0,0,143,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(51,'reprehenderit','Eum eius optio quae dolor omnis sequi magnam. Voluptas recusandae rerum quis sit delectus.','Quia eveniet iure non odio blanditiis accusamus. Omnis aspernatur non recusandae voluptates. Non dolor quia eos et ullam totam aut.',352539,50.81,0,0,0,485,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(52,'non','Hic dolores rerum voluptatem est dolorem. Minima voluptas hic explicabo inventore. Rerum vel quia similique odit.','Itaque quis sint ex ut autem dolorum. Quae minus labore ut dolor fuga maiores. Eveniet modi quia omnis tempore amet corporis. Autem iure ullam molestiae ea architecto necessitatibus eligendi.',601096,23.81,0,0,0,201,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(53,'corporis','Facilis fugiat non exercitationem nihil officiis dolorem ea. Esse autem tenetur qui voluptatem quaerat ut. Sequi ipsum at facere omnis veritatis alias.','Saepe quas accusamus dolorem ab. Veniam at hic sed qui mollitia. Possimus blanditiis possimus architecto magnam accusamus.',926842,55.12,0,0,0,447,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(54,'placeat','Sed commodi sit rerum magni tempore ullam ducimus. Dolorem itaque numquam et non commodi consequatur. Laudantium distinctio omnis autem expedita delectus ipsam omnis. At eum sit minus amet amet.','Dolor laborum illum qui numquam. Iure nulla rem et repellendus voluptate aliquam nihil. Maxime ut ipsa et voluptatem et qui. Fuga autem optio repellendus maxime qui nam possimus.',767033,17.48,0,0,0,269,'2019-04-06 16:10:39','2019-04-06 16:10:39'),(55,'vitae','Velit rerum aliquam natus similique officiis. Quas ad aut cupiditate qui at. Vero nulla dolores corporis ea praesentium fugit qui. Ea hic mollitia adipisci voluptas aut ut et.','Quis omnis illum ipsum qui libero et nesciunt. Incidunt corrupti sed dicta odio dolores. Ipsa sint deserunt quis explicabo quod nam.',803663,26.04,0,0,0,143,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(56,'laborum','Nobis fugiat dignissimos totam aut deleniti et. Repellendus ullam dolor temporibus est. Tempora ut quia eligendi quo.','Dolores in provident quo aliquam consequatur. Itaque quos expedita ut numquam. Iusto aut modi nisi velit. Mollitia aut magni aut fuga nisi.',490224,23.67,0,0,0,395,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(57,'provident','Corrupti numquam exercitationem autem quisquam sint et veniam. Ut quia molestiae ducimus laboriosam. In incidunt ipsum saepe et repellendus. Deserunt occaecati doloribus rerum provident fuga sed laboriosam.','Qui earum pariatur explicabo omnis molestiae eaque officiis nam. Earum est odio consequuntur et. Nemo cumque recusandae expedita.',760991,39.84,0,0,0,249,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(58,'nisi','Animi possimus vel architecto reprehenderit ipsam eum ad. Eum sit soluta ea maiores perspiciatis. Officia et distinctio optio quasi nulla voluptas exercitationem.','Sequi rerum iusto perferendis beatae quis adipisci ea. At fuga laboriosam ab illo culpa eligendi. Voluptatem cupiditate qui dolor modi accusantium mollitia. Sed fuga dolore sint fuga laboriosam.',545044,68.69,0,0,0,21,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(59,'repellendus','Eum nesciunt eum nesciunt et. Accusamus corrupti sunt velit est in nostrum. Labore provident quod quia aliquid itaque.','Aut est in facilis quae eum enim vitae. Quia qui et earum et. Voluptas et enim voluptate at illum aliquid facere.',180694,32.96,0,0,0,391,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(60,'eum','Et repellat animi sunt laudantium sunt. Et magni velit modi laudantium ut. Necessitatibus sunt veniam sit consequatur dolor aliquid est.','Qui nulla temporibus et recusandae ut rerum et. Est iure odit voluptate consequatur dolorum. Sunt velit necessitatibus aut qui corrupti ut. Et eligendi consequatur dolore nisi omnis dolor.',947679,62.45,0,0,0,476,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(61,'magni','Nesciunt voluptatem inventore natus quia. Ea voluptatem molestiae ut distinctio cumque. Deleniti eum sed animi ex. Alias dignissimos et illo et temporibus.','Labore id eveniet dicta qui libero. Accusamus itaque qui cumque. Vero nulla sed atque deserunt provident doloremque. Enim occaecati voluptatem id cumque autem fugit.',892146,72.54,0,0,0,370,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(62,'voluptatem','Occaecati maxime eius voluptas animi et. Iure itaque ipsam quibusdam mollitia. Quia molestias omnis nihil nisi qui corrupti. Magnam illo enim doloribus magni ut amet quia rerum.','Iure aut distinctio ea quo. Rerum nobis dolorum cupiditate ea aut. Eos temporibus optio aliquam.',875275,63.57,0,0,0,258,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(63,'beatae','Eveniet debitis consequatur omnis saepe. Ut soluta doloribus eaque non. Repellendus dolorum cupiditate dolorem mollitia quisquam itaque. Corporis qui quos enim magnam.','At temporibus accusantium excepturi itaque officia et. Quod quaerat asperiores commodi necessitatibus quis perspiciatis sunt odio. Placeat expedita id voluptates inventore totam aspernatur.',489218,24.40,0,0,0,337,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(64,'nesciunt','Et dicta libero quam et dolorem non hic. Voluptatem voluptatum quibusdam velit nobis delectus ut. Iure odio harum eum ullam qui.','Et aut quidem et et qui ducimus corporis. Iure sapiente accusamus libero sunt fugiat quasi veniam. Ad dicta voluptatem nostrum voluptate pariatur aut.',386882,53.03,0,0,0,358,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(65,'numquam','Quas reprehenderit saepe ipsam odit alias distinctio excepturi non. Ut eligendi unde a officia modi amet. Dignissimos dolor earum modi sapiente. Assumenda accusamus earum nesciunt rem.','A fuga qui recusandae. Iusto eos atque in quo error. Quisquam quia omnis consectetur voluptatem libero. Qui dolor error saepe commodi est tempore.',675404,81.50,0,0,0,139,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(66,'quas','Dolore sit nulla omnis et numquam nesciunt. Minus at nam quibusdam est non voluptatum. Vel ut aut tempora reiciendis et aut. Laborum iste ut velit necessitatibus. Quas distinctio non nobis.','Quo aliquam sunt corrupti laboriosam. Reprehenderit et dignissimos quos provident possimus in.',553751,44.09,0,0,0,224,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(67,'ipsa','Libero omnis nostrum corrupti sed reiciendis rerum deserunt sequi. Architecto sequi eum aut dolores. Quo qui iure quas. Tempore incidunt sapiente pariatur vitae praesentium.','Consequatur repellendus sint consectetur eius molestiae numquam. Consectetur ut eos consequuntur ut. Quisquam ipsum earum itaque enim possimus cum ducimus.',950611,97.85,0,0,0,75,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(68,'ratione','Ab earum nisi nihil temporibus. Neque iure dolorem quos cupiditate quibusdam rerum. Deleniti ea aliquid molestiae dolor.','Soluta adipisci sapiente sit nam ut dolorum. Vel et fugit blanditiis recusandae odio nesciunt. Debitis ut et animi saepe voluptas.',211158,65.77,0,0,0,210,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(69,'totam','Corrupti quia et necessitatibus voluptatibus praesentium. Deleniti est libero quia qui sed sed. Quaerat voluptatem quia ipsum magni. Consequatur molestias aut amet eum.','Et optio repudiandae corporis voluptatem inventore. Sequi enim iusto officiis aliquid. Iure sed praesentium corrupti cupiditate nemo sunt.',470719,12.55,0,0,0,125,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(70,'ea','Ratione quia quia praesentium aspernatur amet dolore consequatur. Autem saepe quibusdam iste mollitia et non consequatur qui. Eos impedit assumenda reprehenderit eligendi occaecati aut distinctio praesentium.','Quia in qui veniam et sit nam. Laboriosam et totam minima rerum. Aut aut iste est culpa nesciunt quae. Sed eum dignissimos fugit sed.',425202,3.09,0,0,0,425,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(71,'ullam','Veniam natus laudantium voluptas vel. Est est suscipit optio eius accusantium totam laboriosam. Dolores sint sint eos quisquam est nisi.','Est doloribus sed aliquid reprehenderit aut nisi. Sunt officiis iste voluptate nobis qui. Quia officiis sit eos quam sit laboriosam.',385393,25.56,0,0,0,343,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(72,'dignissimos','Dolorum deleniti unde est veritatis voluptatem. Similique harum nisi voluptate et nisi aliquid ipsa. Ratione quam commodi maiores cumque dolore quasi.','Voluptas architecto consequatur eos illo exercitationem beatae. Et et sint eum repellendus quas. Cum ea est recusandae expedita necessitatibus.',320627,61.23,0,0,0,470,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(73,'maxime','Ea est sapiente eos quas. Eveniet maxime velit tempora ipsam nam nam. Blanditiis iure molestiae voluptatibus sit. Laboriosam voluptatem est nemo blanditiis sit omnis quidem.','Numquam error adipisci fugiat minima. Ipsa fugit repellat ipsam iure distinctio.',740380,16.30,0,0,0,310,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(74,'labore','Voluptatem omnis accusantium aut sed. Pariatur fuga sint reiciendis quaerat voluptate. Quibusdam id eos aut ut in quia sunt. Quia illo voluptatem culpa fugiat.','Aliquam earum in et qui. Numquam vitae aut quaerat atque ipsum voluptas. Quia ea omnis quia voluptas dolor quia qui.',970016,18.79,0,0,0,299,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(75,'temporibus','Quia molestias aut qui nemo. Et provident nobis ad reprehenderit voluptatem nisi fugit.','Cum ea numquam velit eum ipsam vero. Quae autem nostrum nisi voluptas modi. Maxime corporis asperiores totam et ab.',703150,17.53,0,0,0,63,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(76,'eos','Iste ipsam soluta sunt alias ratione quas sed. Consequatur praesentium voluptas sit accusantium nisi a. Incidunt accusantium non ut aut ipsam.','Magni officia tempora iste nihil amet. Qui laboriosam officiis totam consequatur. Explicabo aut molestiae dolor occaecati dolorem.',220141,42.82,0,0,0,118,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(77,'accusamus','Repudiandae provident expedita illo nemo nostrum. Qui soluta ut quod ut. Et dolorem enim cum sunt libero id. Aperiam adipisci excepturi sit similique voluptate numquam omnis.','Voluptatem explicabo vitae aspernatur. Quasi ex consequuntur magni assumenda ab aut harum placeat. Sunt mollitia tempora amet dolorem ut dignissimos et et.',485410,87.16,0,0,0,166,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(78,'deleniti','Est reprehenderit ipsam minus aspernatur. Accusamus temporibus consequatur et omnis fugit. Omnis aut officia explicabo repudiandae repellat. Quaerat delectus et non dicta maiores.','Culpa praesentium vitae impedit ullam repellat. Animi quibusdam velit inventore ut sunt voluptatem. Libero adipisci eos deleniti harum sint impedit in.',476368,12.97,0,0,1,322,'2019-04-06 16:10:40','2019-04-15 15:14:54'),(79,'magnam','Et exercitationem libero incidunt perspiciatis debitis quos maxime. Quaerat veritatis reiciendis delectus doloremque. Dicta aspernatur ex ipsam repudiandae est placeat eos.','Non culpa aut voluptatibus expedita. Maiores neque mollitia dolorem animi. Quo totam ipsam libero est sequi. Et tenetur voluptas ut natus fugit.',972945,41.91,0,0,0,346,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(80,'velit','Ut perspiciatis ut in et ut fugit. Ratione quae possimus repudiandae accusantium explicabo. Rem distinctio provident quas qui doloribus eum. Voluptates laudantium recusandae quis exercitationem officiis.','Blanditiis quia voluptate rerum doloribus eos ipsum doloremque voluptatum. Et molestiae temporibus odio dolor velit. Et dolorem sed ut cum est deserunt.',448247,14.04,0,0,0,254,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(81,'ex','Sunt quasi rerum praesentium. Doloremque molestiae quibusdam nemo assumenda esse. Qui explicabo ut aut suscipit alias. Dolores assumenda asperiores eos dolorem in temporibus.','Odio non dolores aut odit inventore ducimus. Consequatur necessitatibus saepe nihil quia excepturi qui. Et cupiditate ut ipsa.',688710,4.20,0,0,0,439,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(82,'hic','Sint in dolores omnis rerum. Cupiditate dolorem consequatur dolorum. Aut aut voluptas molestias iure in iusto modi. Labore tenetur velit laudantium dolorum eligendi omnis. Quidem a quia error consequatur.','Quia et non corrupti nam. Possimus velit maiores quasi itaque iure architecto et. Fuga pariatur esse nostrum qui. Dolorum omnis dolorum eos odio modi possimus. Qui quis recusandae itaque qui sint.',874339,56.71,0,0,0,123,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(83,'quaerat','Deserunt odit odit voluptas quos consectetur error esse. Ex tempore et praesentium sint quo illum eos. Qui unde est provident odio et. Itaque doloremque id cumque est dolorem ab qui.','Natus deleniti culpa voluptas ut sed sint nemo. Nisi voluptas culpa saepe autem enim repellendus error. Explicabo ut quis neque culpa.',542106,60.65,0,0,0,286,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(84,'tempore','Corrupti libero quo saepe velit quia. Architecto in corrupti dolores nihil dolor voluptatibus. Tenetur quia saepe ex at. Eum quos deleniti laborum vel esse aut error.','Nulla amet nisi sed ab praesentium doloremque. Dolor blanditiis aspernatur quia doloribus recusandae. Odit officia velit similique est. Est earum ut id exercitationem.',313673,45.24,0,0,0,246,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(85,'explicabo','Atque omnis assumenda quaerat dolores autem a illum. Et et iusto est sint. In ut minima suscipit optio vel corporis pariatur.','Vel ipsa minus itaque. Voluptas beatae quis minus quia. Officiis nobis quas nemo error laboriosam. Ut reiciendis eligendi soluta tempore. Aut nostrum suscipit aut.',692773,82.89,0,0,0,366,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(86,'blanditiis','Molestiae ea blanditiis suscipit dolorem veritatis. Et voluptatem velit nihil. In dolorum quo dolorem rem itaque quo. Praesentium voluptatibus nostrum consequuntur eaque ipsa vero aut.','Architecto voluptas velit dolor ratione. Laudantium provident modi beatae illum sapiente. Rem possimus quia autem est est. Qui labore est neque.',578587,21.93,0,0,0,329,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(87,'dolor','Aliquid sed dolorum aliquid voluptatem architecto quia sit. Et quo sit tenetur quod accusantium adipisci illo. Sed at aperiam unde autem reprehenderit voluptas dolorem. Laudantium voluptates est explicabo eos sint.','Omnis illo quos quia explicabo expedita. Sapiente quos ut totam deserunt. Corrupti eveniet doloremque quidem non aut sed porro. Nisi dolorum rem quis.',793819,37.34,0,0,0,329,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(88,'dolorum','A est animi dicta. Adipisci dolorem magni voluptatem ipsa. Pariatur in et architecto aliquam eum sint et. Cum aut voluptates eum et.','Pariatur omnis cumque doloribus aut. Commodi consequatur eos in voluptatem. Voluptas ut reprehenderit sit sit.',136251,86.84,0,0,0,93,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(89,'quis','Qui reprehenderit sunt sed et beatae quod voluptas accusamus. Maiores nobis maxime dolor ut. Excepturi delectus numquam eveniet tenetur ut quisquam provident repellendus. Sed nulla dolor itaque et dolores qui eius tenetur.','Velit nihil ipsum numquam omnis accusamus ut. Dignissimos accusantium accusantium et fugiat cupiditate saepe repellat. Doloribus deserunt quibusdam dolore. Nostrum et fuga eos laborum nulla.',767519,64.50,0,0,0,189,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(90,'natus','Quam amet aut unde et placeat blanditiis reiciendis. Perspiciatis officiis adipisci sit aspernatur iste. Quos voluptatum sequi fuga voluptatem. Qui minus voluptas iusto.','Blanditiis commodi omnis assumenda consequatur. Exercitationem aut sed totam alias assumenda aliquam. Cupiditate voluptatum tempora quo quas commodi dolores.',479116,21.93,0,0,0,345,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(91,'veniam','Quas ea nostrum recusandae rerum neque. Odit ut omnis ut delectus nulla doloribus velit perspiciatis. Beatae quibusdam voluptatem soluta pariatur dicta illum dolor cumque.','Praesentium non fugit autem beatae. Repudiandae quos omnis praesentium ratione minima nesciunt. Impedit et deleniti maxime aut odit. Repellendus esse mollitia autem tenetur eum sit qui.',252546,50.57,0,0,0,159,'2019-04-06 16:10:40','2019-04-06 16:10:40'),(92,'repudiandae','Nihil quia maxime libero rerum esse consequatur. Nam mollitia unde eaque ex quia iusto. Est aut nemo aut iure itaque dolore.','Eum tenetur natus est. Possimus doloremque repellendus in dolor commodi voluptatem. Atque quia aliquid provident optio. Quis id perspiciatis at sunt minus perferendis.',629910,55.74,0,0,0,482,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(93,'quo','Qui temporibus dignissimos dolor labore ab nisi vero sit. Blanditiis et modi voluptatem consectetur eveniet. Rem alias sequi in nemo et rerum. Omnis possimus delectus quaerat molestiae id ut vitae.','Laborum doloribus quia rerum molestiae nulla. Blanditiis aperiam quos iusto dicta sunt. Dolores omnis architecto sunt nam neque corrupti rerum. Perspiciatis voluptatem temporibus sunt dolorem.',398944,55.34,0,0,0,463,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(94,'odit','Atque deserunt debitis rerum id voluptas doloribus itaque aliquam. Et quos vitae asperiores ex. Nihil ducimus optio aut dolores eos et dolor.','Repellendus rerum non vitae consequuntur sapiente quo. Id quod nihil architecto sit. Explicabo numquam aliquid sed consectetur.',131115,74.94,0,0,0,361,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(95,'minima','Quas in minus eveniet rem. Consequatur aliquid accusantium in occaecati nesciunt consequatur. Tempore ipsam possimus eveniet consequatur facilis blanditiis.','Repellat enim cumque fuga facilis in. Ad eos ut qui excepturi modi enim.',552364,87.24,0,0,0,489,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(96,'id','Nihil est quod voluptatem cum. Vero rerum illo magnam odio. Corporis at est praesentium doloribus consequatur sed aut.','Sint quisquam et ea ullam id impedit error. Nam et sed qui voluptas. Id odio fuga voluptates eius. Sint nobis suscipit nisi velit dolores.',847939,81.85,0,0,0,162,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(97,'molestiae','Quisquam sequi similique suscipit officiis et sit. Aliquam et vero rerum autem ipsam aut. Dicta sint culpa error est.','Libero qui voluptas aut voluptatem quis explicabo veritatis. Optio quia animi non exercitationem nesciunt aut excepturi. Enim odit corrupti quibusdam dolore.',957852,9.18,0,0,0,154,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(98,'atque','Animi sapiente dolor dolorem similique rerum earum. Nesciunt sit dolorum occaecati earum fugit. Corrupti suscipit commodi cumque. Culpa labore ipsum tempora placeat quibusdam sit alias.','Adipisci ut et ut ea voluptas accusantium repellendus. Neque iste rerum neque id dolore culpa reiciendis. Deleniti magni porro iure. Pariatur quia ut quas voluptas beatae quam eius ea.',136023,69.64,0,0,0,473,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(99,'soluta','Eos ut optio velit nemo in rem molestiae. Odio officiis suscipit est aut velit voluptate deserunt. Dignissimos fugit nostrum distinctio.','Non qui porro occaecati amet. In et et in nam facilis et velit occaecati. Qui labore sed enim minima et magni. Velit sequi et suscipit facilis.',945961,58.90,0,0,0,327,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(100,'suscipit','Animi impedit temporibus corrupti quod sint neque sit. Commodi aliquid odio nemo praesentium. Eligendi quos nesciunt tempora quis consequatur alias.','Aliquam sunt iusto molestiae eaque qui aliquid cupiditate. Fugiat excepturi accusantium qui odio qui. In saepe facilis voluptatem nisi. Quos repellat ea harum est.',701983,75.35,0,0,0,274,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(101,'similique','Voluptates et voluptatibus quos consectetur saepe illo aut. Dolorum quod reprehenderit sit culpa omnis praesentium distinctio consequatur. Est reiciendis laborum commodi at perferendis quo quibusdam. Perferendis voluptas debitis perferendis sunt amet. Eligendi molestiae qui sint sed consequatur similique dolores aperiam.','Qui accusantium reprehenderit animi cum. Tenetur sed aspernatur quis eaque eos. Necessitatibus nulla minima quidem maxime earum optio quaerat. Maxime magni et animi assumenda.',204735,37.06,0,0,0,39,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(102,'alias','Cumque tenetur perferendis est. Optio cum laboriosam rerum laboriosam velit cum consequuntur.','Vitae voluptatibus dolores cumque quia eius. Error distinctio quia eos vel qui. Quia delectus voluptas ut soluta veritatis soluta.',420555,44.32,0,0,0,460,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(103,'aliquam','Quo in soluta sit eaque perspiciatis pariatur facilis voluptas. Sed magni unde ea vitae minima. Et facilis corrupti ipsam repudiandae error. Sed ipsam dignissimos sit omnis.','Expedita qui aut magnam amet ut repellendus. Saepe omnis ullam maxime minus et delectus quam.',717007,27.06,0,0,0,241,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(104,'cupiditate','Quidem omnis aut totam deleniti voluptatum neque. Totam est quia ad. Quam sit soluta consequatur.','Non id facilis et ut qui. Molestiae assumenda et et repellat accusantium consequatur. Porro qui voluptatibus hic nobis.',309612,43.35,0,0,0,126,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(105,'maiores','Suscipit ut nemo dolorem ut. Necessitatibus repellendus voluptatem ipsum iusto consequuntur quaerat. Molestiae minus debitis repudiandae consequatur assumenda quis.','Repellat unde accusantium ut. Alias consequatur eaque beatae quisquam assumenda quia. Et et molestias ut. Repellendus qui est eum.',597792,20.00,0,0,0,53,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(106,'perferendis','Hic consequatur officia ut consequatur ipsum nobis. Ad quisquam quidem in et natus. Dolorem odio ea aperiam assumenda aspernatur consectetur. Impedit maxime saepe impedit quod autem eum. Voluptate omnis autem aut et.','Nobis ipsa officia sint et necessitatibus veniam in. Qui enim minus aperiam ratione et placeat eos. Quia repudiandae numquam sunt quisquam sequi quia.',843602,0.64,0,0,0,115,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(107,'quidem','Expedita fugit rerum doloremque. Tempore necessitatibus non porro esse aut voluptatem laborum. Aut odit et deleniti voluptatem. In libero accusamus eos similique natus sit omnis.','Rerum rerum ut corrupti qui ut velit. Beatae rerum nihil adipisci at et molestias quo. Omnis dicta ipsam maxime et voluptas et dolores. Consequatur voluptate aperiam qui impedit.',877980,24.57,0,0,0,355,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(108,'aliquid','Voluptas error corrupti nihil molestias magnam optio. Soluta iusto eveniet sapiente. Eius dolorem dolore corporis est numquam ipsam inventore. Sed rerum natus quos consequatur laudantium sapiente harum.','Ut unde eos eveniet exercitationem. Et quasi quia sit qui velit laboriosam. Natus aut quas quidem quia. Sit error est quo cum accusantium ex.',137245,19.47,0,0,0,489,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(109,'eligendi','Ut impedit omnis animi tenetur ullam porro quia. Sed corrupti accusantium delectus enim.','Sint autem eos dolorum sit sit. Qui autem hic maiores. Unde minus adipisci ut odit. Tempora ut et earum cumque iste molestiae deleniti. Voluptatem modi amet quibusdam commodi ut.',983190,98.18,0,0,0,221,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(110,'quibusdam','Amet harum facilis sit odio aspernatur ipsam et. Sunt et exercitationem eum est neque. Vero quae assumenda qui velit illum. Consequatur ut aut quaerat rerum rerum eum.','Atque pariatur quia non aut. Rerum et ullam sed neque. Amet soluta quis minus incidunt.',729077,94.83,0,0,0,357,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(111,'eius','Vel perferendis sit illum ratione aliquam. Repudiandae et qui quibusdam rerum accusantium ea. Et facilis libero rerum vitae qui numquam. Qui ipsa eaque consequatur distinctio aut excepturi magnam.','Molestiae velit ducimus quibusdam sunt ad qui consequuntur. Quo ipsum velit et vel sit incidunt. Molestias et accusamus et similique voluptas.',808950,67.68,0,0,0,500,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(112,'molestias','Hic exercitationem fugit illum officiis maxime ut autem eaque. Est consectetur autem esse voluptatem quasi est. Aliquid qui unde voluptatum voluptas. Commodi dolor magni accusamus ex qui. Omnis similique labore id et nemo ad cupiditate.','Veritatis commodi et eaque illo. Sunt provident dolor voluptas ipsa id velit. Rerum laudantium voluptas eveniet pariatur accusamus omnis accusamus incidunt.',219302,71.16,0,0,0,177,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(113,'itaque','Quibusdam soluta et excepturi temporibus. Maxime quam libero fuga dolores nostrum itaque. Sit ducimus error optio perferendis id.','Est non unde vel saepe. Officia eum dolorem rerum. Velit at est repellat rerum aut praesentium.',139366,11.40,0,0,0,264,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(114,'modi','Molestias tenetur quasi in. At sed dignissimos minima nisi voluptatem et temporibus. Dignissimos et quae suscipit nihil.','Harum tempora porro itaque cum et sed similique. Adipisci occaecati ea aperiam consequatur repellendus. Laboriosam autem quidem voluptatibus eos maxime tenetur quam.',133501,84.47,0,0,0,214,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(115,'praesentium','Non accusamus ducimus aperiam ut animi quaerat repellat. Consectetur ut placeat qui quis cupiditate magni. Similique quia officiis ducimus voluptas magnam occaecati qui.','Blanditiis debitis exercitationem voluptatem et ipsam. Et necessitatibus voluptates earum sed. Qui neque cumque atque in.',811991,14.01,0,0,0,122,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(116,'dicta','Magni laboriosam autem sit non molestiae. Impedit fuga provident voluptas. Et et repellendus sapiente officia. Earum id ut eos consequatur qui. Alias ea blanditiis natus harum harum dolorum optio et.','Provident aut officiis dolor quaerat adipisci qui beatae. Et voluptate placeat ea eum. Rem quo omnis dolores placeat rerum cumque consequuntur.',962919,26.59,0,0,0,246,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(117,'voluptate','Quia nihil corporis qui sunt consequatur. Quas quia vitae aut aperiam ducimus minus. Rerum ea velit possimus nostrum.','Quia odit pariatur ipsam explicabo doloribus iure aut molestias. Quis ex quae exercitationem. Voluptatum hic tenetur incidunt omnis qui.',958599,67.97,0,0,0,91,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(118,'nulla','Mollitia quos rem est et adipisci. Dicta blanditiis voluptatibus magnam et inventore sit provident. Perferendis velit facilis et qui deleniti modi porro. Sit nisi deleniti excepturi.','Molestiae est quas animi magni. Esse nesciunt blanditiis enim. Dicta incidunt vel quibusdam dolorem rerum voluptates totam.',713390,58.94,0,0,0,245,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(119,'assumenda','Pariatur atque fuga voluptatem cupiditate. Quidem corporis similique vel optio est quos consequatur aut. Aliquid nihil esse sapiente debitis reiciendis veritatis nemo repellendus. Eum quia odit molestiae magnam enim.','Distinctio dolorem et perspiciatis id qui veniam harum similique. Veniam nihil expedita amet neque. Tempore ab harum qui ea qui voluptatem nulla.',535042,65.21,0,0,0,10,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(120,'optio','Harum suscipit eum magni voluptas. Error qui expedita nobis omnis occaecati. Consequatur dignissimos autem placeat fuga sequi cupiditate rem. Similique eaque maxime est velit quaerat nisi accusantium.','Voluptatem et nulla tempore temporibus rem voluptas explicabo quia. Temporibus ut sint quia ducimus vero doloremque harum eligendi. Deserunt eum voluptas illo illum.',372469,40.45,0,0,0,193,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(121,'distinctio','Qui quis in id eos hic ea facilis. Eum fugiat sit adipisci. Non quae quo voluptas. Adipisci culpa ea suscipit esse.','Iusto doloremque similique voluptatem nulla enim. Esse sapiente amet aspernatur ea blanditiis aliquam quasi quasi. Earum autem et dolores aut corrupti.',308612,55.21,0,0,0,434,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(122,'officia','Magnam qui aut fugiat vel velit et reiciendis eum. Consequatur non molestiae dolorem itaque dolores. Et quibusdam quisquam debitis. Saepe nisi molestiae cum. Molestiae maxime nemo voluptates sit.','Qui soluta et et sed. Qui deleniti ex eum maxime rerum ut. Est praesentium recusandae temporibus deleniti voluptatem earum.',511825,72.07,0,0,0,110,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(123,'incidunt','Non voluptatibus minus et sed rerum error itaque. Eum neque odio eveniet nostrum exercitationem dolorem necessitatibus. Recusandae quas repellat minus sequi aut cumque. Vitae occaecati molestiae et modi deleniti et.','Debitis similique voluptates repellat cum sit. Rerum eaque qui doloremque occaecati repudiandae quia cum. Voluptas totam inventore est eligendi consequuntur libero quas. Reiciendis et cumque ea.',683874,15.35,0,0,0,87,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(124,'delectus','Commodi sint saepe numquam. Soluta odio asperiores magni fugit soluta iste commodi.','A amet voluptatem et aut distinctio. Aspernatur ut voluptate minus quia dolore consectetur maxime quas. Quod facere quod id enim ut odio.',870091,29.96,0,0,0,332,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(125,'recusandae','Sit eos quia mollitia consequatur aperiam alias fuga. Consequatur ab fuga aut eius voluptatem ad ut est. Repellendus neque enim dolorum animi distinctio ipsam et. Dolorem molestiae veniam optio nam odit facilis beatae.','Eaque accusamus maxime perferendis odit. Voluptas voluptatum corporis possimus nisi reprehenderit quaerat dignissimos. Voluptates voluptatibus qui distinctio non quo. Et quis accusantium sunt sit.',319024,81.86,0,0,0,29,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(126,'dolores','Placeat et eos aut. Sint perferendis temporibus laudantium accusamus est dolor rerum rem. Architecto aspernatur dolores qui aliquid quia.','Rem quaerat consectetur ad laudantium eaque omnis et. Itaque architecto laborum itaque hic culpa et esse ipsam. Necessitatibus dolor a dolores et quisquam qui.',354248,68.65,0,0,0,467,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(127,'esse','Culpa itaque nostrum laudantium sunt molestias. Placeat est labore voluptas iste et ut sit reiciendis. Rerum voluptatum quo eum nihil eveniet. Eaque dignissimos voluptatem iure at et.','Et officiis rerum eius ex officia ea at. Voluptatibus debitis autem exercitationem reprehenderit consequatur. Et cum voluptatum suscipit est vel eveniet. Quibusdam impedit totam hic vero.',182943,52.73,0,0,0,279,'2019-04-06 16:10:41','2019-04-06 16:10:41'),(128,'sint','Sit quis quibusdam et rerum est. Consequatur modi sit qui voluptatem repudiandae possimus et. Aliquid voluptatem atque amet natus rerum. Quibusdam corporis provident aut. Iusto est quae eligendi facilis.','Qui ipsa doloribus est maxime ut. Quod architecto facilis ut quae repellat. Distinctio cupiditate perspiciatis molestiae aut aliquid vitae.',139559,49.93,0,0,0,153,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(129,'ab','Reiciendis distinctio consequatur commodi. Ut odio id et aliquam consectetur velit. Et odit perferendis corrupti modi quam.','Sequi eos quaerat eius quisquam sit cupiditate perspiciatis. Earum nihil qui libero inventore id molestiae non delectus. Natus pariatur ad blanditiis exercitationem omnis modi perferendis non.',370198,95.94,0,0,0,402,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(130,'ipsam','Sapiente ut consequuntur nihil hic omnis. Rerum eaque et qui impedit.','Quia consequuntur autem non corporis et totam. Nemo quos quas explicabo doloremque eaque. Possimus dolorem voluptatem impedit sunt et itaque aut iste. Fugit cum excepturi saepe labore.',113529,37.65,0,0,1,392,'2019-04-06 16:10:42','2019-04-15 15:14:35'),(131,'odio','Deleniti asperiores molestiae ea. Dolorem omnis similique explicabo necessitatibus et ipsum officiis. Rerum laudantium alias velit. Ut perferendis libero repellat reprehenderit laboriosam expedita quas est. Earum et suscipit laudantium suscipit.','Repudiandae rerum cupiditate quo adipisci dignissimos. Quidem ratione aut dolore laudantium in et vero. Culpa consequuntur voluptatum natus id pariatur. Nihil est et maiores dolores unde dolores.',636946,4.10,0,0,1,107,'2019-04-06 16:10:42','2019-04-15 15:14:36'),(132,'necessitatibus','Ipsam accusamus dolorem perspiciatis et animi animi exercitationem. Ex officiis exercitationem ea voluptas dolores pariatur. Voluptate quo ipsam magni ut quas omnis.','Odit ab doloremque omnis. Reiciendis nesciunt qui officia sit. Alias eos minus expedita incidunt. Vel aperiam consequuntur necessitatibus quia.',728414,11.29,0,0,1,64,'2019-04-06 16:10:42','2019-04-15 15:14:37'),(133,'porro','Esse est rem quia enim ab autem. Occaecati at quidem quaerat atque reprehenderit molestiae. Sed provident hic eaque quo accusantium necessitatibus.','Qui quia est sed nisi laboriosam rerum. Quo sint sint quia. Dignissimos ea illum sapiente temporibus. Et et sed aliquid labore quam.',212893,74.71,0,0,1,14,'2019-04-06 16:10:42','2019-04-15 15:14:37'),(134,'iusto','Ut beatae eos commodi autem omnis. Maiores quod quo veritatis et. Sed velit voluptates aut voluptas deserunt placeat autem. Dolor neque harum ea molestias.','Rerum qui fugit animi sint dolores culpa fugiat. Vel ducimus ad dolores. Omnis blanditiis qui provident voluptatem. Harum officia vero sunt ea exercitationem possimus enim.',489000,70.13,0,0,1,22,'2019-04-06 16:10:42','2019-04-15 15:14:38'),(135,'neque','Occaecati beatae saepe est libero error nemo voluptatibus. Deleniti illo eaque quae sint ipsam tempore. In enim inventore voluptas id sint voluptas. Aperiam rerum possimus incidunt aliquam. Ut autem quidem est vel.','Itaque veritatis dolor excepturi corrupti. Illo consectetur facilis illo sint hic consequuntur. Ut optio esse quo omnis et aliquam est.',433595,62.22,0,0,0,91,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(136,'sed','Expedita rerum nihil et dicta ea aut deleniti repellendus. Distinctio omnis dolorum nemo. Occaecati quia labore hic quisquam harum repellendus.','Maxime magni officiis non voluptates. Harum et ut rerum iste aut sit. Est consequatur et sit molestias et quasi rerum. Distinctio est natus quisquam assumenda sapiente.',665668,30.39,0,0,0,498,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(137,'laboriosam','Voluptatem cum qui placeat quae. Aspernatur eum numquam esse corporis voluptatem sit voluptas. Voluptatem sint et nesciunt sunt veniam. Autem voluptatem sit quo. Exercitationem iure quibusdam nihil quibusdam dolor.','Officia similique animi dolore voluptate. Minima voluptate corporis quis repellendus et. Alias vitae culpa rem omnis alias.',841697,58.62,0,0,0,206,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(138,'quos','Quos optio reiciendis qui iusto et iste. Quis molestiae accusantium ad nobis et sunt numquam.','Cumque iure eum exercitationem doloremque officiis voluptate qui. Vero autem eos quia quidem ducimus unde nesciunt sint. Molestias fugit est veritatis inventore dolorem qui voluptas.',417337,23.25,0,0,0,371,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(139,'doloribus','Praesentium voluptatum dolorem aliquam id rerum sit. Quibusdam aut ut temporibus quo aut. Aut officia qui sed rerum.','Quidem vitae est eum consequuntur illo. Quia magnam quia maxime accusantium quas dolor. Magni veritatis saepe assumenda fugit est aliquid. Beatae reiciendis consequatur eum illo.',577834,22.28,0,0,0,457,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(140,'rem','Earum ut laudantium laborum sed sunt molestias. Nihil magni ut assumenda et. Harum harum et velit sequi sunt omnis eum. Vel voluptates tenetur culpa nisi qui neque exercitationem.','Neque et et eius vel. Ipsum consequatur culpa nulla ut.',652213,89.66,0,0,0,223,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(141,'adipisci','Temporibus sit eveniet similique. Dolores nihil debitis necessitatibus nam quidem.','Consequatur mollitia optio asperiores. Sed ipsa iste eligendi accusantium. Magni omnis optio ut deleniti laboriosam. Officia at fuga nobis et quos quia debitis.',273689,22.77,0,0,0,180,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(142,'libero','Ducimus nihil et molestias ullam. Rem harum accusantium nihil illum voluptatem voluptas.','Rerum nobis veritatis consectetur perspiciatis consequatur occaecati possimus. Quis a nostrum aspernatur sed. Eligendi ut incidunt quis ut dolores laboriosam veritatis.',125709,28.35,0,0,0,316,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(143,'architecto','Tempore est atque modi velit quaerat. Dignissimos molestias aut sunt ut eos rem. Aperiam repellendus id tenetur accusantium.','Est dignissimos ipsam officiis impedit ducimus quia. Magnam vitae consequatur sed ut sint laborum voluptatem. Voluptatum quia aliquid distinctio voluptatem quis iure odit. Vel eaque accusantium ab.',860195,43.95,0,0,0,29,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(144,'nihil','Est non labore consectetur in. Quisquam qui ea soluta blanditiis aut non officiis. Iure inventore et excepturi vel necessitatibus repudiandae. Consequatur asperiores reiciendis accusantium quia.','Illo magnam quas dolor voluptatem eos earum et. Aut repudiandae placeat velit. Voluptatum asperiores a ea sit officiis nihil sunt. Quis quis sed natus vero aliquid.',864843,91.37,0,0,0,283,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(145,'ducimus','Aliquid neque quibusdam nemo sed quis voluptatem. Adipisci repellendus qui exercitationem quia soluta. Laboriosam nostrum sint quasi optio.','Expedita suscipit earum placeat deleniti saepe sint quas. Et ad animi blanditiis non enim. Magni iste ullam quis qui quidem quas.',906720,9.47,0,0,0,294,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(146,'ipsum','Eos pariatur earum mollitia esse. Excepturi ducimus et rerum sed. Iure exercitationem est officia recusandae. Dignissimos sit magni adipisci quia ducimus repellendus ab. Quidem ipsam a consectetur eos est est est.','Excepturi ea sapiente recusandae quas quam ad. Non aut natus quod assumenda. Asperiores adipisci et quasi nihil velit qui similique ratione.',753341,40.63,0,0,0,373,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(147,'facere','Veritatis doloremque quia omnis dolor quia praesentium. Omnis minus autem magnam dicta eum esse asperiores. Et maxime animi quae fugiat consequuntur accusamus dolores. Minus totam nisi porro possimus.','Vel qui est rerum iste. Voluptatem fugiat iusto ut accusamus beatae modi. Quis ut suscipit sit ut consectetur voluptates. Dolores ex in eaque.',986871,36.41,0,0,0,410,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(148,'nemo','Dolores omnis debitis minima optio fuga nesciunt. Ea pariatur harum illum. Odit optio omnis molestiae facere similique in et. Sit et doloremque voluptatem mollitia nihil molestiae at. In dolores placeat dolor ullam.','Quod dolores incidunt et dolore at quo. Et placeat dolorem excepturi quia quam. Assumenda ducimus blanditiis velit ut enim error qui.',935139,39.93,0,0,0,201,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(149,'nobis','Odio aut adipisci minus animi. Ad ut quo dignissimos cumque molestias doloribus. Excepturi facere soluta doloremque rerum enim est dolores eos.','Minus at laborum quia at accusamus facere eum. Qui ad nobis nulla non impedit sunt. Sed quae nemo esse consectetur molestiae beatae dolores quaerat.',134721,79.34,0,0,0,401,'2019-04-06 16:10:42','2019-04-06 16:10:42'),(150,'quasi','Iure est pariatur et nemo. Amet odio animi laudantium. Veniam libero a modi tempora debitis possimus possimus. Facere adipisci veritatis enim voluptatibus facere fugiat laudantium expedita.','Est est aperiam vero architecto magni aliquid. Laborum rerum nemo quia aut.',411666,86.63,0,0,0,282,'2019-04-06 16:10:42','2019-04-06 16:10:42');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'MidnightBlue','Rerum temporibus tempore quia id ducimus. Iusto velit est nostrum dolor. Beatae ut sunt rerum vel veritatis ipsum.','2019-04-06 16:10:37','2019-04-06 16:10:37'),(2,'Tan','Sed et at ratione accusamus enim quia nulla. Ut aliquid qui corporis consequatur architecto reiciendis.','2019-04-06 16:10:37','2019-04-06 16:10:37'),(3,'PaleTurquoise','Dolorem esse ea quasi possimus et consequatur ab excepturi. Aut natus doloremque blanditiis laborum hic aut dolores. Qui itaque mollitia sapiente iusto facilis nisi dolore. Enim quod recusandae nulla molestias molestiae.','2019-04-06 16:10:37','2019-04-06 16:10:37'),(4,'DarkSlateGray','Ut sunt natus numquam sed. Quam nam dignissimos in sit ad id. Ipsum aut sequi laudantium. Id autem consequuntur et sunt.','2019-04-06 16:10:37','2019-04-06 16:10:37'),(5,'OrangeRed','Architecto aliquid ipsum aspernatur est. Voluptas voluptatibus quisquam doloremque sint quae ea sed laborum.','2019-04-06 16:10:37','2019-04-06 16:10:37'),(6,'LightSalmon','Est tempore aut ut eveniet dolores qui. Nihil laborum debitis non et nobis. Incidunt dolore sed sit dolore officiis.','2019-04-06 16:10:37','2019-04-06 16:10:37'),(7,'MediumSpringGreen','Sit qui sit saepe voluptatem laborum ab. Quam magnam dolores ea quis. Doloremque suscipit animi fugit omnis.','2019-04-06 16:10:37','2019-04-06 16:10:37'),(8,'Peru','Fugiat necessitatibus placeat ea porro. Non officia aperiam dignissimos dolorem facere ipsa. Eaque id aut velit laboriosam itaque sit. Nesciunt sit sint suscipit.','2019-04-06 16:10:37','2019-04-06 16:10:37'),(9,'Chocolate','Quisquam et optio blanditiis rerum assumenda deserunt dolor. Libero sit natus consequatur ex quidem nulla nam. Nesciunt quia eius et incidunt placeat voluptas eveniet. Iusto et delectus esse soluta voluptatem.','2019-04-06 16:10:37','2019-04-06 16:10:37'),(10,'Chartreuse','Ad deleniti rerum culpa impedit libero molestiae ad consequuntur. Reiciendis eum ex autem porro rerum.','2019-04-06 16:10:37','2019-04-06 16:10:37'),(11,'GhostWhite','Minus et quod ut neque. Vitae nihil ullam aut omnis libero culpa amet. Quia reiciendis id a quo.','2019-04-06 16:10:37','2019-04-06 16:10:37'),(12,'OldLace','Dolores illo autem autem nisi. Enim neque provident ullam et voluptas illo. At dolorum suscipit qui suscipit.','2019-04-06 16:10:37','2019-04-06 16:10:37'),(13,'Orchid','Est et repellat aut aspernatur deleniti. Et cumque qui sed ipsa. Et at voluptatibus ut nihil et.','2019-04-06 16:10:37','2019-04-06 16:10:37'),(14,'Olive','Nam voluptatem in asperiores rerum. Tempora voluptas eum cum et. Magni ex non facilis.','2019-04-06 16:10:37','2019-04-06 16:10:37'),(15,'LightCoral','Id sunt aperiam quia atque. Tempora vero ut tempora quia ipsa dolore voluptates repellendus.','2019-04-06 16:10:37','2019-04-06 16:10:37');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_photo`
--

DROP TABLE IF EXISTS `category_photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_photo` (
  `category_id` int(10) unsigned NOT NULL,
  `photo_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`,`photo_id`),
  KEY `category_photo_photo_id_foreign` (`photo_id`),
  CONSTRAINT `category_photo_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_photo_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_photo`
--

LOCK TABLES `category_photo` WRITE;
/*!40000 ALTER TABLE `category_photo` DISABLE KEYS */;
INSERT INTO `category_photo` VALUES (1,19,NULL,NULL),(2,14,NULL,NULL),(3,8,NULL,NULL),(4,16,NULL,NULL),(5,8,NULL,NULL),(6,15,NULL,NULL),(7,11,NULL,NULL),(8,13,NULL,NULL),(9,17,NULL,NULL),(10,6,NULL,NULL),(11,13,NULL,NULL),(12,1,NULL,NULL),(13,13,NULL,NULL),(14,20,NULL,NULL),(15,1,NULL,NULL);
/*!40000 ALTER TABLE `category_photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_article_id_foreign` (`article_id`),
  CONSTRAINT `comments_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,121,NULL,'Some comment','2019-04-20 14:49:23','2019-04-20 14:49:23'),(2,1,121,NULL,'sdfsf','2019-04-20 14:51:10','2019-04-20 14:51:10'),(3,1,121,2,'dfdfdfdfsdfd','2019-04-20 14:51:18','2019-04-20 14:51:18'),(4,1,121,2,'I think not','2019-04-20 14:54:42','2019-04-20 14:54:42'),(5,1,121,1,'I think not sir','2019-04-20 14:55:05','2019-04-20 14:55:05'),(6,1,121,4,'Very accurate','2019-04-22 15:31:35','2019-04-22 15:31:35');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'default','{\"displayName\":\"App\\\\Notifications\\\\VerificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":11:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\VerificationEmail\\\":8:{s:2:\\\"id\\\";s:36:\\\"0ed10841-d60c-476b-b3ea-41b8cf19722d\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1557171067,1557171067),(2,'default','{\"displayName\":\"App\\\\Notifications\\\\VerificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":11:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\VerificationEmail\\\":8:{s:2:\\\"id\\\";s:36:\\\"bf74ece7-ab6b-47a8-ac14-c716ae4a8556\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1557251418,1557251418),(3,'default','{\"displayName\":\"App\\\\Notifications\\\\VerificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":11:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:6;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\VerificationEmail\\\":8:{s:2:\\\"id\\\";s:36:\\\"b557fd98-3266-4bc0-8c8b-bcb93e0703ba\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1557252221,1557252221),(4,'default','{\"displayName\":\"App\\\\Notifications\\\\VerificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":11:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\VerificationEmail\\\":8:{s:2:\\\"id\\\";s:36:\\\"9a4d2240-ee4f-42ff-a78c-0a0e2670eaa2\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1557253372,1557253372),(5,'default','{\"displayName\":\"App\\\\Notifications\\\\VerificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":11:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:35:\\\"App\\\\Notifications\\\\VerificationEmail\\\":8:{s:2:\\\"id\\\";s:36:\\\"ed0e77b6-c416-44b3-8559-6e2786d3ee89\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1557255795,1557255795);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
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
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_01_07_203608_create_photos_table',1),(4,'2019_02_01_131305_create_roles_table',1),(5,'2019_02_04_163057_create_jobs_table',1),(6,'2019_02_04_184754_create_articles_table',1),(7,'2019_02_04_204546_create_failed_jobs_table',1),(8,'2019_02_12_182708_create_categories_table',1),(9,'2019_03_08_121128_create_comments_table',1),(10,'2019_03_11_173444_create_ratings_table',1),(11,'2019_03_12_222948_create_permissions_table',1),(12,'2019_03_15_093325_create_tags_table',1),(13,'2019_03_26_134841_create_orders_table',1),(14,'2019_03_26_135000_create_order_items_table',1),(15,'2019_03_26_143451_create_order_statuses_table',1),(16,'2019_04_11_202331_create_article_user_table',2),(17,'2019_04_25_192028_add_warned_column_to_users_table',3);
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
  `article_id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (2,74,1,1,'2019-04-06 17:00:19','2019-04-06 17:00:19'),(5,4,1,4,'2019-04-10 12:07:16','2019-04-10 15:08:09'),(6,8,3,1,'2019-04-10 16:56:34','2019-04-10 16:56:34'),(7,5,3,1,'2019-04-10 16:56:37','2019-04-10 16:56:37'),(8,30,4,2,'2019-04-10 16:59:18','2019-04-10 16:59:20'),(9,88,4,1,'2019-04-10 16:59:22','2019-04-10 16:59:22'),(10,118,4,2,'2019-04-10 16:59:26','2019-04-10 16:59:27'),(11,61,5,1,'2019-04-10 17:00:30','2019-04-10 17:00:30'),(12,36,6,1,'2019-04-10 17:02:57','2019-04-10 17:02:57'),(13,73,7,1,'2019-04-10 17:12:00','2019-04-10 17:12:00'),(14,139,8,13,'2019-04-10 17:13:05','2019-04-10 17:13:14'),(15,121,9,1,'2019-04-10 17:15:39','2019-04-10 17:15:42'),(16,18,9,1,'2019-04-10 17:15:53','2019-04-10 17:15:53'),(17,4,9,0,'2019-04-10 17:16:29','2019-04-10 17:16:29'),(20,4,2,1,'2019-04-11 10:58:30','2019-04-11 10:58:30'),(22,61,2,1,'2019-04-11 12:28:53','2019-04-11 15:41:25'),(23,121,2,3,'2019-04-11 12:41:37','2019-04-11 15:44:05'),(25,2,11,1,'2019-04-15 09:00:33','2019-04-15 09:00:33'),(27,88,11,1,'2019-04-15 10:11:22','2019-04-15 10:50:18'),(28,121,11,2,'2019-04-15 14:28:58','2019-04-15 15:12:57'),(29,74,11,2,'2019-04-15 14:34:41','2019-04-15 14:34:56'),(30,115,11,1,'2019-04-15 14:35:22','2019-04-15 14:35:22'),(31,61,11,2,'2019-04-15 15:13:03','2019-04-15 15:13:13'),(33,121,13,9,'2019-04-15 16:53:41','2019-04-20 13:58:20'),(35,10,13,5,'2019-04-16 17:34:02','2019-04-16 17:34:45'),(36,9,13,10,'2019-04-17 18:57:08','2019-04-18 17:14:37'),(37,4,14,1,'2019-04-23 16:36:06','2019-04-23 16:36:06'),(38,2,13,1,'2019-04-23 16:47:51','2019-04-23 16:47:51'),(39,4,13,2,'2019-04-23 16:53:05','2019-05-05 17:46:33'),(40,3,13,1,'2019-04-23 17:01:39','2019-04-23 17:01:39'),(41,1,1,1,'2019-05-04 19:33:22','2019-05-04 19:33:22');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_statuses`
--

DROP TABLE IF EXISTS `order_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_statuses_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_statuses`
--

LOCK TABLES `order_statuses` WRITE;
/*!40000 ALTER TABLE `order_statuses` DISABLE KEYS */;
INSERT INTO `order_statuses` VALUES (1,'creating','2019-04-10 16:45:07','2019-04-10 16:45:07'),(2,'submited','2019-04-10 16:45:08','2019-04-10 16:45:08'),(3,'packing','2019-04-10 16:45:08','2019-04-10 16:45:08'),(4,'shiped','2019-04-10 16:45:08','2019-04-10 16:45:08'),(5,'delivered','2019-04-10 16:45:08','2019-04-10 16:45:08'),(6,'denied','2019-04-10 16:45:08','2019-04-10 16:45:08');
/*!40000 ALTER TABLE `order_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `order_status_id` int(10) unsigned NOT NULL,
  `discount` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,2,0,'2019-04-06 16:27:36','2019-04-10 16:51:31'),(2,2,1,0,'2019-04-08 18:52:31','2019-04-08 18:52:31'),(3,1,2,0,'2019-04-10 16:56:17','2019-04-10 16:57:01'),(4,1,2,0,'2019-04-10 16:57:01','2019-04-10 16:59:57'),(5,1,2,0,'2019-04-10 16:59:57','2019-04-10 17:00:47'),(6,1,2,0,'2019-04-10 17:00:47','2019-04-10 17:03:14'),(7,1,2,0,'2019-04-10 17:03:14','2019-04-10 17:12:19'),(8,1,2,0,'2019-04-10 17:12:19','2019-04-10 17:13:29'),(9,1,2,0,'2019-04-10 17:13:29','2019-04-10 17:16:56'),(10,1,2,0,'2019-04-10 17:16:56','2019-04-11 05:54:47'),(11,1,2,0,'2019-04-11 05:54:47','2019-04-15 16:06:27'),(12,3,1,0,'2019-04-12 07:55:06','2019-04-12 07:55:06'),(13,1,1,0,'2019-04-15 16:06:27','2019-04-15 16:06:27'),(14,4,1,0,'2019-04-15 17:38:31','2019-04-15 17:38:31'),(15,5,1,0,'2019-04-15 17:46:25','2019-04-15 17:46:25'),(16,6,1,0,'2019-04-15 17:51:13','2019-04-15 17:51:13'),(17,7,1,0,'2019-04-15 17:52:41','2019-04-15 17:52:41'),(18,8,1,0,'2019-04-15 17:53:21','2019-04-15 17:53:21'),(19,9,1,0,'2019-04-15 17:55:18','2019-04-15 17:55:18');
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
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(2,2),(4,2),(5,2),(9,2),(10,2);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'articles.create','Permission to create articles','2019-04-06 16:10:35','2019-04-06 16:10:35'),(2,'articles.modify','Permission to modify articles','2019-04-06 16:10:35','2019-04-06 16:10:35'),(3,'categories.create','Permission to create categories','2019-04-06 16:10:35','2019-04-06 16:10:35'),(4,'categories.modify','Permission to modify categories','2019-04-06 16:10:35','2019-04-06 16:10:35'),(5,'comments.delete','Permission to delete comments','2019-04-06 16:10:36','2019-04-06 16:10:36'),(6,'users.work','Permission to work with users','2019-04-06 16:10:36','2019-04-06 16:10:36'),(7,'roles.work','Permission to work with roles','2019-04-06 16:10:36','2019-04-06 16:10:36'),(8,'permissions.work','Permission to work with permissions','2019-04-06 16:10:36','2019-04-06 16:10:36'),(9,'photos.work','Permission to work with photos','2019-04-06 16:10:36','2019-04-06 16:10:36'),(10,'editApearance','Permission to edit the site Apearance','2019-04-06 16:10:36','2019-04-06 16:10:36');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_small` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_main` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (1,'recusandae','Images/dummyPics/1.jpg','Images/dummyPics/tn-1.jpg','Images/dummyPics/sm-1.jpg',NULL,'2019-04-06 16:10:36','2019-04-06 16:10:36'),(2,'officia','Images/dummyPics/2.jpg','Images/dummyPics/tn-2.jpg','Images/dummyPics/sm-2.jpg',NULL,'2019-04-06 16:10:36','2019-04-06 16:10:36'),(3,'porro','Images/dummyPics/3.jpg','Images/dummyPics/tn-3.jpg','Images/dummyPics/sm-3.jpg',NULL,'2019-04-06 16:10:36','2019-04-06 16:10:36'),(4,'sit','Images/dummyPics/4.jpg','Images/dummyPics/tn-4.jpg','Images/dummyPics/sm-4.jpg',NULL,'2019-04-06 16:10:36','2019-04-06 16:10:36'),(5,'exercitationem','Images/dummyPics/5.jpg','Images/dummyPics/tn-5.jpg','Images/dummyPics/sm-5.jpg',NULL,'2019-04-06 16:10:36','2019-04-06 16:10:36'),(6,'aut','Images/dummyPics/6.jpg','Images/dummyPics/tn-6.jpg','Images/dummyPics/sm-6.jpg',NULL,'2019-04-06 16:10:36','2019-04-06 16:10:36'),(7,'saepe','Images/dummyPics/7.jpg','Images/dummyPics/tn-7.jpg','Images/dummyPics/sm-7.jpg',NULL,'2019-04-06 16:10:37','2019-04-06 16:10:37'),(8,'quis','Images/dummyPics/8.jpg','Images/dummyPics/tn-8.jpg','Images/dummyPics/sm-8.jpg',NULL,'2019-04-06 16:10:37','2019-04-06 16:10:37'),(9,'sapiente','Images/dummyPics/9.jpg','Images/dummyPics/tn-9.jpg','Images/dummyPics/sm-9.jpg',NULL,'2019-04-06 16:10:37','2019-04-06 16:10:37'),(10,'aut','Images/dummyPics/10.jpg','Images/dummyPics/tn-10.jpg','Images/dummyPics/sm-10.jpg',NULL,'2019-04-06 16:10:37','2019-04-06 16:10:37'),(11,'hic','Images/dummyPics/11.jpg','Images/dummyPics/tn-11.jpg','Images/dummyPics/sm-11.jpg',NULL,'2019-04-06 16:10:37','2019-04-06 16:10:37'),(12,'ex','Images/dummyPics/12.jpg','Images/dummyPics/tn-12.jpg','Images/dummyPics/sm-12.jpg',NULL,'2019-04-06 16:10:37','2019-04-06 16:10:37'),(13,'voluptatem','Images/dummyPics/13.jpg','Images/dummyPics/tn-13.jpg','Images/dummyPics/sm-13.jpg',NULL,'2019-04-06 16:10:37','2019-04-06 16:10:37'),(14,'minima','Images/dummyPics/14.jpg','Images/dummyPics/tn-14.jpg','Images/dummyPics/sm-14.jpg',NULL,'2019-04-06 16:10:37','2019-04-06 16:10:37'),(15,'enim','Images/dummyPics/15.jpg','Images/dummyPics/tn-15.jpg','Images/dummyPics/sm-15.jpg',NULL,'2019-04-06 16:10:37','2019-04-06 16:10:37'),(16,'debitis','Images/dummyPics/16.jpg','Images/dummyPics/tn-16.jpg','Images/dummyPics/sm-16.jpg',NULL,'2019-04-06 16:10:37','2019-04-06 16:10:37'),(17,'dolor','Images/dummyPics/17.jpg','Images/dummyPics/tn-17.jpg','Images/dummyPics/sm-17.jpg',NULL,'2019-04-06 16:10:37','2019-04-06 16:10:37'),(18,'neque','Images/dummyPics/18.jpg','Images/dummyPics/tn-18.jpg','Images/dummyPics/sm-18.jpg',NULL,'2019-04-06 16:10:37','2019-04-06 16:10:37'),(19,'eos','Images/dummyPics/19.jpg','Images/dummyPics/tn-19.jpg','Images/dummyPics/sm-19.jpg',NULL,'2019-04-06 16:10:37','2019-04-06 16:10:37'),(20,'at','Images/dummyPics/20.jpg','Images/dummyPics/tn-20.jpg','Images/dummyPics/sm-20.jpg',NULL,'2019-04-06 16:10:37','2019-04-06 16:10:37'),(21,'1554569310Bird3.jpg','Images/Articles/1554569310Bird3.jpg','Images/Articles/tn-1554569310Bird3.jpg','Images/Articles/sm-1554569310Bird3.jpg',NULL,'2019-04-06 16:48:30','2019-04-06 16:48:30'),(22,'1556985978jabuka.jpg','Images/Articles/1556985978jabuka.jpg','Images/Articles/tn-1556985978jabuka.jpg','Images/Articles/sm-1556985978jabuka.jpg',NULL,'2019-05-04 16:06:18','2019-05-04 16:06:18'),(23,'15572533718520000.jpg','Images/Articles/15572533718520000.jpg','Images/Articles/tn-15572533718520000.jpg','Images/Articles/sm-15572533718520000.jpg',NULL,'2019-05-07 18:22:52','2019-05-07 18:22:52');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  `rating` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ratings_user_id_foreign` (`user_id`),
  KEY `ratings_article_id_foreign` (`article_id`),
  CONSTRAINT `ratings_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` VALUES (1,1,8,'4','2019-04-08 17:37:43','2019-04-08 17:37:45'),(2,2,121,'5','2019-04-11 10:55:13','2019-04-11 10:55:13'),(3,1,121,'4','2019-04-11 17:59:05','2019-04-20 15:01:27'),(4,1,4,'5','2019-05-05 17:46:35','2019-05-05 17:46:35');
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,'2019-04-06 16:10:36',NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin'),(2,'Editor'),(3,'Customer'),(4,'Guest');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'NOVO','2019-04-06 16:10:38','2019-04-06 16:10:38'),(2,'2019','2019-04-06 16:10:38','2019-04-06 16:10:38'),(3,'ljeto','2019-04-06 16:10:38','2019-04-06 16:10:38'),(4,'jesen','2019-04-06 16:10:38','2019-04-06 16:10:38'),(5,'plavo','2019-04-06 16:10:38','2019-04-06 16:10:38'),(6,'top','2019-04-06 16:10:38','2019-04-06 16:10:38'),(7,'dzabaluk','2019-04-06 16:10:38','2019-04-06 16:10:38'),(8,'kvalitetno','2019-04-06 16:10:38','2019-04-06 16:10:38');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
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
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `superAdmin` tinyint(1) DEFAULT NULL,
  `banned_until` timestamp NULL DEFAULT NULL,
  `numberOfLogins` int(11) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provided_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `warned` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_api_token_unique` (`api_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Haris Vodopic','haris@example.com','Images/dummyPics/avatar.svg',1,NULL,117,'2019-04-06 16:10:35','$2y$10$geWFZ6yqLwEYsQggQjVwcOKVKRhZw8a3n2fZgxS3kQ6oybVq/9BJO','rAmQsXj7wl1MBKBnzbWWyrzo56YUF4GdaQIF9pMBrpJOVSa4fGHORIJNCwtw',NULL,'j0OiE8p97lziODiTH5bySHvUSVhsmJ0cKYXHwanpIzo5FpoNAmoC52H9RmwK','2019-04-06 16:10:35','2019-05-27 17:04:47',1),(2,'Haris Vodopic','haris.vodopic@gmail.com','Images/dummyPics/avatar.svg',0,NULL,14,'2019-04-06 16:10:35','$2y$10$1ssbLaydt4cb9Yw9TKSl3.K9eQhG78ZCMIYbYGrdaewg/MRlkYJ6i','0e8ZX4CarLIslUfBojHCDnrrT3XTnytboQRL9CPX8o7iX6bycZDbRLUzbos4',NULL,'aoegRCKfNn9g2whm6zvF3iR9abXPG5lNuUyVmqGJh8isSUEwirXxl6xu07Z6','2019-04-06 16:10:35','2019-05-19 16:12:18',1),(3,'Ivana Vodopic','ivana@example.com','Images/dummyPics/avatar.svg',0,NULL,2,'2019-04-06 16:10:35','$2y$10$QJbit9TtYAhuQkwfekzYeeQYnYtiww8at4UlVpEt9yo9FCsWWDZxC','xYwTbjNdXYp6bJEFN9jS9rlpKwymnzWmL45TBcfQQ9TADenNO4SxC18fmJL9',NULL,'DwtqzWEasyCMb9Uz0oYTZ1odcjeDuSNoJ1TycJkSdu0yIEXhjVwkaoeUiXqD','2019-04-06 16:10:35','2019-04-20 17:24:01',1);
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

-- Dump completed on 2019-05-28 14:11:19
