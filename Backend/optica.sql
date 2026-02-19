/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-12.1.2-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: OpticaAdam
-- ------------------------------------------------------
-- Server version	12.1.2-MariaDB-ubu2404

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750` (`queue_name`,`available_at`,`delivered_at`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `description` longtext NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `trend` varchar(255) NOT NULL,
  `mount_type` varchar(255) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `graduation` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `diameter` double DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `product` VALUES
(1,'Air Optix','-',10,5,'lentilla',1,'Ciba Vision',NULL,NULL,NULL,NULL,'2','diaria',1.5,'lentilla1.jpg'),
(2,'Total 30','-',10,4,'lentilla',1,'Alcon',NULL,NULL,NULL,NULL,'3','mensual',1.5,'lentilla2.jpg'),
(3,'Lens 55','-',22,5,'lentilla',1,'Lens 55',NULL,NULL,NULL,NULL,'2','diaria',1.5,'lentilla3.jpg'),
(4,'Air Toric','-',20,6,'lentilla',1,'UGO',NULL,NULL,NULL,NULL,'4','mensual',2,'lentilla4.jpg'),
(5,'Air Optix Colors','-',25,2,'lentilla',1,'Alcon',NULL,NULL,NULL,NULL,'2','diaria',1,'lentilla5.jpg'),
(6,'Gafas Hugo Boss acetato transparente','Montura óptica Hugo Boss de estilo elegante fabricada en acetato translúcido color beige. Diseño rectangular moderno, ligero y cómodo para uso diario. Compatible con lentes graduadas.',200,20,'graduadas',1,'Hugo Boss','completa','acetato','unisex','beige transparente',NULL,NULL,NULL,'graduada1.png'),
(7,'Gafas Tommy Hilfiger negras rectangulares','Montura óptica Tommy Hilfiger de diseño rectangular en color negro. Estilo clásico y elegante fabricado en acetato ligero, ideal para uso diario y compatible con lentes graduadas.',179,10,'graduadas',1,'Tommy Hilfiger','completa','acetato','unisex','negro',NULL,NULL,NULL,'graduada2.png'),
(8,'Gafas Zadig & Voltaire redondas negras','Montura óptica Zadig & Voltaire de forma redonda en color negro. Diseño moderno y sofisticado fabricado en acetato ligero, cómodo para uso diario y compatible con lentes graduadas.',189,30,'graduadas',1,'Zadig & Voltaire','completa','acetato','unisex','negro',NULL,NULL,NULL,'graduada3.png'),
(9,'Gafas Hugo metal dorado aviador','Montura óptica HUGO de estilo aviador cuadrado fabricada en metal dorado. Diseño ligero y elegante con plaquetas nasales ajustables, ideal para uso diario y compatible con lentes graduadas.',209,17,'graduadas',1,'Hugo','completa','metal','unisex','dorado',NULL,NULL,NULL,'graduada4.png'),
(10,'Gafas Tous negras redondeadas','Montura óptica TOUS de forma redondeada en color negro. Diseño elegante y ligero fabricado en acetato, cómodo para uso diario y compatible con lentes graduadas.',169,22,'graduadas',1,'Tous','completa','acetato','mujer','negro',NULL,NULL,NULL,'graduada5.png'),
(11,'Gafas Tous carey cat-eye','Montura óptica TOUS de estilo cat-eye en color carey marrón. Diseño femenino y elegante fabricado en acetato ligero, ideal para uso diario y compatible con lentes graduadas.',179,9,'graduadas',1,'Tous','completa','acetato','mujer','beige transparente',NULL,NULL,NULL,'graduada6.png'),
(12,'Gafas de sol negras oversize','Gafas de sol de diseño oversize cuadrado en color negro. Montura ligera y moderna con lentes degradadas que ofrecen protección solar y estilo para uso diario.',150,20,'sol',1,'Fashion','completa','acetato','mujer','negro',NULL,NULL,NULL,'sol1.png'),
(13,'Gafas de sol metal dorado degradadas','Gafas de sol de diseño elegante con montura metálica dorada y lentes degradadas. Modelo ligero y cómodo ideal para uso diario con protección solar y estilo moderno.',159,22,'sol',1,'Classic',NULL,'metal','unisex','dorado',NULL,NULL,NULL,'sol2.png'),
(14,'Gafas de sol negras cuadradas oversize','Gafas de sol de diseño cuadrado oversize en color negro con montura gruesa de acetato y lentes degradadas. Modelo moderno y elegante ideal para protección solar diaria con estilo.',159,4,'sol',1,'Fashion','completa','acetato','mujer','negro',NULL,NULL,NULL,'sol3.png'),
(15,'Gafas de sol ovaladas verdes retro','Gafas de sol de estilo retro con montura metálica fina y lentes verdes. Diseño ligero y elegante inspirado en el estilo vintage, ideal para uso diario con protección solar.',139,20,'sol',1,'Vintage','completa','metal','unisex','dorado',NULL,NULL,NULL,'sol4.png'),
(16,'Gafas de sol ovaladas degradadas marrón','Gafas de sol de inspiración vintage con montura metálica dorada y lentes degradadas en tono marrón. Diseño sofisticado y ligero ideal para un look elegante diario con protección solar.',149,22,'sol',1,'Elegante','completa','metal','unisex','dorado',NULL,NULL,NULL,'sol5.png'),
(17,'Paño de microfibra','Ideal para la limpieza delicada de lentes y pantallas. Textura suave y no deja pelusas.',1.5,20,'accesorio',1,'-',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'accesorio1.png'),
(18,'Funda rígida','Diseñada para proteger contra golpes y rayaduras. Interior aterciopelado suave.',11,15,'accesorio',1,'-',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'accesorio2.png'),
(19,'Funda de tela','Ligera y flexible. Protege las lentes de arañazos y polvo.',5,20,'accesorio',1,'-',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'accesorio3.png'),
(20,'Spray anti-huellas','Spray limpiador de gafas. Elimina el polvo, huellas y grasa sin dañar la montura. Apta para todos los cristales.',3,15,'accesorio',1,'Zeiss',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'accesorio4.png');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname1` varchar(20) NOT NULL,
  `surname2` varchar(20) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `user` VALUES
(1,'justo2@test.com','[\"ROLE_USER\"]','$2y$13$VqwzQbIVvxiHHTMsuuatpOAMIXylgS1xHqtTo1R4MLsqgrXg5DKqi','Justo2','Fernández',NULL,NULL,1,'2026-02-18 10:05:16');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `user_product`
--

DROP TABLE IF EXISTS `user_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_product` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`product_id`),
  KEY `IDX_8B471AA7A76ED395` (`user_id`),
  KEY `IDX_8B471AA74584665A` (`product_id`),
  CONSTRAINT `FK_8B471AA74584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_8B471AA7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_product`
--

LOCK TABLES `user_product` WRITE;
/*!40000 ALTER TABLE `user_product` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `user_product` ENABLE KEYS */;
UNLOCK TABLES;
commit;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-02-19 11:45:35
