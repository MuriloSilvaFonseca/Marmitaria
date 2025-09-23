CREATE DATABASE  IF NOT EXISTS `marmitaria` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `marmitaria`;
-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: marmitaria
-- ------------------------------------------------------
-- Server version	8.0.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `endereco` (
  `id_usuario` int DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `num_casa` int DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'Rua Maria','Maria das Graças','Maria Teresa','sp','Casa',123,'3137863'),(13,'Rua Maria','Jardim Europa','SJBV','SP','Casa',123,'78978-879'),(15,'Rua João','Camila Tavares','SJBV','AL','Casa',2134,'12312-432'),(21,'Rua de Judas','Jardim Europa','SJBV','MG','Rua Maria',123,'12312-321'),(22,'Rua de Judas','Jardim Europa','SJBV','SP','Prédio',123,'12323-322'),(23,'Rua de Maria','Jardim','SJBV','SP','Rua Maria',123,'12343-432');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido` (
  `id_pedido` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `status` enum('Finalizado','Em andamento','Não confirmado') DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `desconto` decimal(10,2) DEFAULT NULL,
  `tipo_pag` enum('Cartão de crédito','Cartão de débito','Dinheiro','PIX') DEFAULT NULL,
  `entrega` enum('Retirada no Restaurante','Delivery') DEFAULT NULL,
  `data_pedido` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,22,'Não confirmado',60.00,NULL,'Dinheiro','Delivery','2025-09-23 13:33:08'),(2,22,'Não confirmado',60.00,NULL,'Dinheiro','Delivery','2025-09-23 13:35:13'),(3,22,'Não confirmado',60.00,NULL,'Dinheiro','Delivery','2025-09-23 13:35:16'),(4,22,'Não confirmado',87.00,NULL,'Dinheiro','Retirada no Restaurante','2025-09-23 13:36:54'),(5,22,'Não confirmado',87.00,NULL,'Cartão de débito','Retirada no Restaurante','2025-09-23 13:39:26'),(6,22,'Não confirmado',87.00,NULL,'Cartão de débito','Retirada no Restaurante','2025-09-23 14:19:14'),(7,22,'Não confirmado',42.22,NULL,'PIX','Retirada no Restaurante','2025-09-23 16:02:08'),(8,22,'Não confirmado',42.22,NULL,'PIX','Retirada no Restaurante','2025-09-23 16:27:16');
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produto` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(255) DEFAULT NULL,
  `descricao` text,
  `valor_prod` decimal(10,2) DEFAULT NULL,
  `categoria` varchar(50) NOT NULL,
  `status` enum('Disponível','Indisponível') DEFAULT NULL,
  `qtd_est` int DEFAULT NULL,
  `dt_venc` date DEFAULT NULL,
  `dt_aquisicao` date DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (1,'Marmita P','Marmita pequena balanceada: arroz integral, feijão, peito de frango grelhado e mix de legumes. Nutrição e sabor na medida certa.',14.99,'LowCarb','Disponível',10,'2025-09-30','2025-09-09'),(2,'Marmita P','Arroz, feijão, frango grelhado e salada fresca. Porção individual.',15.00,'Almoço','Disponível',50,'2025-09-20','2025-09-15'),(3,'Marmita M','Porção média com arroz, feijão, carne e legumes.',20.00,'Almoço','Disponível',40,'2025-09-20','2025-09-15'),(4,'Marmita G','Porção grande com arroz, feijão, carne, legumes e salada.',25.00,'Almoço','Disponível',30,'2025-09-20','2025-09-15'),(5,'Salada Fit','Mix de folhas, tomate, cenoura e frango grelhado.',18.00,'Salada','Disponível',20,'2025-09-18','2025-09-15'),(6,'Suco Natural','Suco de laranja ou acerola, 300ml.',8.00,'Bebida','Disponível',60,'2025-09-17','2025-09-15'),(7,'Marmita G','Marmita M: porção média balanceada com arroz integral, feijão, proteína grelhada e legumes frescos. Nutrição e sabor na medida certa.Marmita M: porção média balanceada com arroz integral, feijão, proteína grelhada e legumes frescos. Nutrição e sabor na medida certa.',19.99,'Comum','Disponível',7,'2025-10-02','2025-09-15'),(8,'Marmita P','Marmita do Cauan',12.33,'Comum','Disponível',3,'2025-10-03','2025-09-17'),(9,'Marmita G do Cauan','Marmita Grandinha do Cauan',12.65,'Vegetariano','Disponível',1231,'2025-10-02','2025-09-15'),(10,'Marmita GGGGG','MArmita GG teste',9.90,'Fitness','Disponível',10,'2025-10-09','2025-09-19'),(11,'teste','teste',12.33,'Fitness','Disponível',7,'2025-10-03','2025-09-19');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto_pedido`
--

DROP TABLE IF EXISTS `produto_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produto_pedido` (
  `id_pedido` int DEFAULT NULL,
  `id_produto` int DEFAULT NULL,
  `qtd_prod` int DEFAULT NULL,
  `valor_uni` decimal(10,2) DEFAULT NULL,
  KEY `id_pedido` (`id_pedido`),
  KEY `id_produto` (`id_produto`),
  CONSTRAINT `produto_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  CONSTRAINT `produto_pedido_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto_pedido`
--

LOCK TABLES `produto_pedido` WRITE;
/*!40000 ALTER TABLE `produto_pedido` DISABLE KEYS */;
INSERT INTO `produto_pedido` VALUES (1,2,1,15.00),(1,4,1,25.00),(1,3,1,20.00),(2,2,1,15.00),(2,4,1,25.00),(2,3,1,20.00),(3,2,1,15.00),(3,4,1,25.00),(3,3,1,20.00),(4,2,1,15.00),(4,2,1,15.00),(4,4,1,25.00),(4,6,4,8.00),(5,2,1,15.00),(5,2,1,15.00),(5,4,1,25.00),(5,6,4,8.00),(6,2,1,15.00),(6,2,1,15.00),(6,4,1,25.00),(6,6,4,8.00),(7,8,1,12.33),(7,10,1,9.90),(7,7,1,19.99),(8,8,1,12.33),(8,10,1,9.90),(8,7,1,19.99);
/*!40000 ALTER TABLE `produto_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `tipo_usuario` enum('Administrador','Cliente') DEFAULT NULL,
  `status` enum('Ativo','Inativo') DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Maria','maria@gmail.com','1','19 99999 9999','1','2025-09-10','Administrador','Ativo'),(13,'João Fonseca','joao@gmail.com','123569','213434656','123343534688','2007-03-04','Cliente','Ativo'),(15,'Junior','junior@gmail.com','123','(21) 34334-3242','124.243.433-44','2025-09-15','Cliente','Ativo'),(21,'Cauan Junior','cauan@gmail.com','1234','(12) 12333-5344','123.546.686-78','2025-08-31','Cliente','Ativo'),(22,'Camila Junior','camila@gmail.com','123','(12) 33232-4455','1233243445345','2025-08-31','Cliente','Ativo'),(23,'Nykolas Junior','nykolas@gmail.com','123','(12) 32323-4353','123.232.131-23','2025-09-10','Cliente','Ativo');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-23 16:38:54
