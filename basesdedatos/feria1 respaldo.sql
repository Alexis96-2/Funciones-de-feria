-- MySQL dump 10.14  Distrib 5.5.60-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: feria
-- ------------------------------------------------------
-- Server version	5.5.60-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Aire Libre'),(2,'Mecanica'),(3,'Calculo'),(4,'Cientifica'),(5,'Persuasiva'),(6,'Artes'),(7,'Literaria'),(8,'Musical'),(9,'Social'),(10,'Administrativa');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beca`
--

DROP TABLE IF EXISTS `beca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beca` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Recurso` varchar(200) NOT NULL,
  `Titulo` varchar(70) NOT NULL,
  `Universidad_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Video_Universidad1_idx` (`Universidad_ID`),
  CONSTRAINT `fk_Video_Universidad10` FOREIGN KEY (`Universidad_ID`) REFERENCES `universidad` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beca`
--

LOCK TABLES `beca` WRITE;
/*!40000 ALTER TABLE `beca` DISABLE KEYS */;
INSERT INTO `beca` VALUES (1,'http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/Becas/1611952676.png','Becas',2),(2,'http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/Becas/1611997871.pdf','Beca 1',9);
/*!40000 ALTER TABLE `beca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrera`
--

DROP TABLE IF EXISTS `carrera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrera` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `RVOE` varchar(45) DEFAULT NULL,
  `Recurso` varchar(200) NOT NULL,
  `Periodo_Vigencia` varchar(45) DEFAULT NULL,
  `Universidad_ID` int(10) unsigned NOT NULL,
  `Estatus_ID` int(10) unsigned NOT NULL,
  `Seccion_ID` int(10) unsigned NOT NULL,
  `Nivel_Educativo_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Carrera_Universidad1_idx` (`Universidad_ID`),
  KEY `fk_Carrera_Estatus1_idx` (`Estatus_ID`),
  KEY `fk_Carrera_Seccion1_idx` (`Seccion_ID`),
  KEY `fk_Carrera_Nivel_Educativo1_idx` (`Nivel_Educativo_ID`),
  CONSTRAINT `fk_Carrera_Estatus1` FOREIGN KEY (`Estatus_ID`) REFERENCES `estatus` (`ID`),
  CONSTRAINT `fk_Carrera_Nivel_Educativo1` FOREIGN KEY (`Nivel_Educativo_ID`) REFERENCES `nivel_educativo` (`ID`),
  CONSTRAINT `fk_Carrera_Seccion1` FOREIGN KEY (`Seccion_ID`) REFERENCES `seccion` (`ID`),
  CONSTRAINT `fk_Carrera_Universidad1` FOREIGN KEY (`Universidad_ID`) REFERENCES `universidad` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrera`
--

LOCK TABLES `carrera` WRITE;
/*!40000 ALTER TABLE `carrera` DISABLE KEYS */;
INSERT INTO `carrera` VALUES (1,'Arquitectura','DEPRE DOF 26/11/1982','NA','',1,1,3,2),(2,'Biotecnología','DEPRE DOF 26/11/1982','NA','',1,1,3,2),(3,'Derecho','DEPRE DOF 26/11/1982','NA','',1,1,3,2),(4,'Relaciones Internacionales','DEPRE DOF 26/11/1982','NA','',1,1,3,2),(5,'Diseño Gráfico','DEPRE DOF 26/11/1982','NA','',1,1,3,2),(6,'Diseño Industrial','DEPRE DOF 26/11/1982','NA','',1,1,3,2),(7,'Diseño Multimedia','DEPRE DOF 26/11/1982','NA','',1,1,3,2),(8,'Terapia Física y Rehabilitación','DEPRE DOF 26/11/1982','NA','',1,1,3,2),(9,'Ingeniería Ambiental','DEPRE DOF 26/11/1982','NA','',1,1,3,2),(10,'Ingeniería Civil','DEPRE DOF 26/11/1982','NA','',1,1,3,2),(11,'Ingeniería Industrial para la Dirección','DEPRE DOF 26/11/1982','NA','',1,1,3,2),(12,'Administración área Capital Humano','620413','http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/carreras/1611953968.pdf','vigente',2,1,3,1),(13,'Contaduría','621464','http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/carreras/1611954002.pdf','vigente',2,1,3,1),(14,'Desarrollo de Negocios área Mercadotecnia','509419','http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/carreras/1611954032.pdf','vigente',2,1,3,1),(15,'Gastronomía','615429','http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/carreras/1611954053.pdf','vigente',2,1,3,1),(16,'Mantenimiento área Instalaciones','514497','http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/carreras/1611954095.pdf','vigente',2,1,3,1),(17,'Tecnologías de la Información área Desarrollo de Software Multiplataforma','601408','http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/carreras/1611954121.pdf','vigente',2,1,3,1),(18,'Tecnologías de la Información área Infraestructura de Redes Digitales','521456','http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/carreras/1611954139.pdf','vigente',2,1,3,1),(19,'Turismo área Hotelería','615424','NA','vigente',2,1,3,1),(20,'Turismo área Desarrollo de Productos Alternativos','509426','http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/carreras/1611954394.pdf','vigente',2,1,3,1),(21,'LICENCIATURA EN ADMINISTRACIÓN','201708LA','NA','01 DE FEBRERO 2020 AL 31 DE AGOSTO DEL 2024',3,1,3,2),(22,'MAESTRÍA EN DERECHO ENERGÉTICO Y AMBIENTAL','201675MDEyA','NA','21 DE MARZO DEL 2018 AL 31 DE AGOSTO DE 2022',3,1,3,4),(23,'MAESTRÍA EN DESARROLLO EN COMPETENCIAS DOCENTE','201723MDCD','NA','01 DE ABRIL DEL 2018 AL 31 DE AGOSTO DEL 2022',3,1,3,4),(24,'MAESTRÍA EN DOGMÁTICA PENAL Y SISTEMA ACUSATORIO','201724MDPySA','NA','01 DE ABRIL DE 2018 A 31 DE AGOSTO DE 2022',3,1,3,4),(25,'MAESTRÍA EN PSICOLOGÍA JURÍDICA Y CRIMINOLOGÍA','201707MPJyC','NA','28 DE DICIEMBRE DE 2018 AL 31 DE AGOSTO 2022',3,1,3,4),(26,'LICENCIATURA EN CRIMINOLOGÍA Y CRIMINALÍSTICA','201831LCyC','NA','30 DE DICIEMBRE 2020 AL 31 DE AGOSTO 2024',3,1,3,2),(27,'Licenciatura en Derecho','200816LD','NA','Vigente',4,1,3,2),(28,'Licenciatura en Política','201472LPGP','NA','Vigente',4,1,3,2),(29,'Especialidad en Amparo','200843EA','NA','Vigente',4,1,3,3),(30,'Maestría en Amparo','200819MA','NA','Vigente',4,1,3,4),(31,'ARQUITECTURA','202016LARQ','NA','',5,1,3,1),(32,'CIENCIAS DE LA EDUCACIÓN','202018LCEM','NA','',5,1,3,1),(33,'CONTADURÍA','202015LCM','NA','',5,1,3,1),(34,'CRIMINOLOGÍA ESCOLAR','202020LCRE','NA','',5,1,3,1),(35,'CRIMINOLOGÍA MIXTO','202019LCRM','NA','',5,1,3,1),(36,'DERECHO ESCOLAR','202013LDE','NA','',5,1,3,1),(37,'DERECHO MIXTO','202012LDM','NA','',5,1,3,1),(38,'GASTRONOMÍA ESCOLAR','202008LGE','NA','',5,1,3,1),(39,'GASTRONOMÍA MIXTO','202009LGM','NA','',5,1,3,1),(40,'NUTRICIÓN ESCOLAR','202011LNE','NA','',5,1,3,1),(41,'NUTRICIÓN MIXTA','202010LNM','NA','',5,1,3,1),(42,'Mantenimiento área Naval','NA','http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/carreras/1611954682.pdf','vigente',2,1,4,1),(43,'carr1','123','NA','2018-2027',6,2,3,2),(44,'Diseño Digital','12345','NA','2021',7,1,3,1),(45,'Diseño Digital','','NA','',8,2,3,1),(46,'MAESTRÍA EN ECOTECNOLOGÍAS E INNOVACIÓN SOSTENIBLE','2019104MEIS','NA','25 de marzo de 2019 al 31 de agosto del 2022',10,1,3,4),(47,'MAESTRÍA EN INNOVACIÓN Y SUSTENTABILIDAD TURÍSTICA','2019107MIyST','NA','25 de marzo de 2019 al 31 de agosto del 2022',10,1,3,4),(48,'MAESTRÍA EN ECOEMPRENDURISMO','2019103MEC','NA','25 de marzo de 2019 al 31 de agosto del 2022',10,1,3,4),(49,'MAESTRÍA EN EDUCACIÓN','2019105ME','NA','25 de marzo de 2019 al 31 de agosto del 2022',10,1,3,4),(50,'MAESTRÍA EN GESTIÓN INTERCULTURAL','2019106MGI','NA','25 de marzo de 2019 al 31 de agosto del 2022',10,1,3,4),(51,'MAESTRÍA EN NEUROLIDERAZGO Y COACHING COGNITIVO','2019108MNCC','NA','25 de marzo de 2019 al 31 de agosto del 2022',10,1,3,4),(52,'LICENCIATURA EN URGENCIAS MÉDICAS PREHOSPITALARIAS ','201667LUMP','NA','31 AGOSTO DE 2023',11,1,3,2),(53,'Administración y Desarrollo de Negocios','','NA','2021',12,1,3,2),(54,'Administración y Desarrollo Turistico','','NA','2021',12,1,3,2),(55,'Arquitectura','','NA','2021',12,1,3,2),(56,'Contaduría','','NA','2021',12,1,3,2),(57,'Derecho','','NA','2021',12,1,3,2),(58,'Diseño Grafico y Animación Digital','','NA','2021',12,1,3,2),(59,'Ingeniería en Instalaciones Hoteleras y Turisticas','','NA','2021',12,1,3,2),(60,'Nutrición','','NA','2021',12,1,3,2),(61,'Psicología','','NA','2021',12,1,3,2),(62,'Ingenieria biomedica','DER43','http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/carreras/1611997490.pdf','Agosto 2077',9,3,5,2);
/*!40000 ALTER TABLE `carrera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrera_area`
--

DROP TABLE IF EXISTS `carrera_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrera_area` (
  `Area_ID` int(10) unsigned NOT NULL,
  `Carrera_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Area_ID`,`Carrera_ID`),
  KEY `fk_Carrera_has_Area_Area1_idx` (`Area_ID`),
  KEY `fk_Carrera_has_Area_Carrera1_idx` (`Carrera_ID`),
  CONSTRAINT `fk_Carrera_has_Area_Area1` FOREIGN KEY (`Area_ID`) REFERENCES `area` (`ID`),
  CONSTRAINT `fk_Carrera_has_Area_Carrera1` FOREIGN KEY (`Carrera_ID`) REFERENCES `carrera` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrera_area`
--

LOCK TABLES `carrera_area` WRITE;
/*!40000 ALTER TABLE `carrera_area` DISABLE KEYS */;
INSERT INTO `carrera_area` VALUES (1,62),(5,62),(6,62);
/*!40000 ALTER TABLE `carrera_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacto_universidad`
--

DROP TABLE IF EXISTS `contacto_universidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacto_universidad` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Telefono` varchar(45) NOT NULL,
  `Correo_Electronico` varchar(80) NOT NULL,
  `Universidad_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Contacto_Universidad_Universidad1_idx` (`Universidad_ID`),
  CONSTRAINT `fk_Contacto_Universidad_Universidad1` FOREIGN KEY (`Universidad_ID`) REFERENCES `universidad` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacto_universidad`
--

LOCK TABLES `contacto_universidad` WRITE;
/*!40000 ALTER TABLE `contacto_universidad` DISABLE KEYS */;
INSERT INTO `contacto_universidad` VALUES (1,'9988817750','cci.uac@anahuac.mx',1),(2,'998 8811900','informes@utcancun.edu.mx',2),(3,'9831208775','universidad.wozniak@gmail.com',3),(4,'9988899400','escuelasuperiordeleyes@hotmail.com',4),(5,'9831293219 y 9831293335','direccion_chetumal@uva.edu.mx',5),(6,'44444','rexwolf96@gmail.com',6),(7,'4235436','ut_tareas@live.com.mx',7),(8,'4235436','ut_tareas@live.com.mx',8),(9,'44444','rexwolf96@gmail.com',9),(10,'9982056144','somos@earthlifeuniversity.com',10),(11,'9982413119','controlescolar.iucrm@cruzrojacancun.org',11),(12,'4421444128','heberto.aguirre@universidadriviera.edu.mx',12);
/*!40000 ALTER TABLE `contacto_universidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(70) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Quintana Roo');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estatus`
--

DROP TABLE IF EXISTS `estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estatus` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estatus`
--

LOCK TABLES `estatus` WRITE;
/*!40000 ALTER TABLE `estatus` DISABLE KEYS */;
INSERT INTO `estatus` VALUES (1,'Solicitado'),(2,'Pendiente'),(3,'Aprobado'),(4,'Negado');
/*!40000 ALTER TABLE `estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foto`
--

DROP TABLE IF EXISTS `foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foto` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Recurso` varchar(200) NOT NULL,
  `Titulo` varchar(70) NOT NULL,
  `Universidad_ID` int(10) unsigned NOT NULL,
  `Seccion_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Video_Universidad1_idx` (`Universidad_ID`),
  KEY `fk_Video_Seccion1_idx` (`Seccion_ID`),
  CONSTRAINT `fk_Video_Seccion11` FOREIGN KEY (`Seccion_ID`) REFERENCES `seccion` (`ID`),
  CONSTRAINT `fk_Video_Universidad11` FOREIGN KEY (`Universidad_ID`) REFERENCES `universidad` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto`
--

LOCK TABLES `foto` WRITE;
/*!40000 ALTER TABLE `foto` DISABLE KEYS */;
INSERT INTO `foto` VALUES (2,'http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/Fotos/1611952774.jpg','Entrada',2,3),(3,'http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/Fotos/1611952832.JPG','Toma aérea',2,3),(5,'http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/Fotos/1611953038.jpg','Laboratorio de cómputo',2,3),(6,'http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/Fotos/1611953071.jpg','Restaurante Escuela \"Raíces\"',2,3),(8,'http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/Fotos/1611953164.jpg','Laboratorio de Terapia Física',2,3),(9,'http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/Fotos/1611953208.jpg','Cocina de Gastronomía',2,3),(10,'http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/Fotos/1611953235.jpg','Laboratorio de Hotelería',2,3),(11,'http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/Fotos/1611953294.jpg','Áreas comunes',2,3),(12,'http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/Fotos/1612003780.png','Foto prueba',9,3),(13,'http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/Fotos/1612003909.png','Foto prueba',9,3);
/*!40000 ALTER TABLE `foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipio` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Ruta_Escudo` varchar(45) NOT NULL,
  `Estado_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Municipio_Estado1_idx` (`Estado_ID`),
  CONSTRAINT `fk_Municipio_Estado1` FOREIGN KEY (`Estado_ID`) REFERENCES `estado` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,'Cozumel','img_municipios/cozumel.png',1),(2,'Felipe Carrillo Puerto','img_municipios/fcpuerto.png',1),(3,'Isla Mujeres','img_municipios/imujeres.png',1),(4,'Oth&oacute;n P. Blanco','img_municipios/opblanco.png',1),(5,'Benito Ju&aacute;rez','img_municipios/bjuarez.png',1),(6,'Jos&eacute; Mar&iacute;a Morelos','img_municipios/jmmorelos.png',1),(7,'L&aacute;zaro C&aacute;rdenas','img_municipios/jomamorelos.png',1),(8,'Solidaridad','img_municipios/solidaridad.png',1),(9,'Tulum','img_municipios/jomamorelos.png',1),(10,'Bacalar','img_municipios/bacalar.png',1),(11,'Puerto Morelos','img_municipios/jomamorelos.png',1);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel_educativo`
--

DROP TABLE IF EXISTS `nivel_educativo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivel_educativo` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel_educativo`
--

LOCK TABLES `nivel_educativo` WRITE;
/*!40000 ALTER TABLE `nivel_educativo` DISABLE KEYS */;
INSERT INTO `nivel_educativo` VALUES (1,'T&eacute;cnico Superior Universitario (TSU)'),(2,'Licenciatura'),(3,'Especialidad'),(4,'Maestr&iacute;a'),(5,'Doctorado'),(6,'Diplomado');
/*!40000 ALTER TABLE `nivel_educativo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `red_social`
--

DROP TABLE IF EXISTS `red_social`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `red_social` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `red_social`
--

LOCK TABLES `red_social` WRITE;
/*!40000 ALTER TABLE `red_social` DISABLE KEYS */;
INSERT INTO `red_social` VALUES (1,'Facebook'),(2,'WhatsApp'),(3,'Instagram'),(4,'Twitter'),(5,'Pagina Web');
/*!40000 ALTER TABLE `red_social` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrado`
--

DROP TABLE IF EXISTS `registrado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registrado` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(80) NOT NULL,
  `Apellido_P` varchar(45) NOT NULL,
  `Apellido_M` varchar(45) NOT NULL,
  `Correo_Electronico` varchar(100) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Motivo` int(10) unsigned NOT NULL COMMENT '0: Egresado o Estudiando Bachillerato\n1: Padre o Tutor\n2:Trabajando y Quiere Estudiar',
  `Escuela` varchar(100) NOT NULL,
  `Area_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Registrado_Area1_idx` (`Area_ID`),
  CONSTRAINT `fk_Registrado_Area1` FOREIGN KEY (`Area_ID`) REFERENCES `area` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrado`
--

LOCK TABLES `registrado` WRITE;
/*!40000 ALTER TABLE `registrado` DISABLE KEYS */;
INSERT INTO `registrado` VALUES (1,'kevin','garci','ramirez','mr.kegara@gmail.com','9982998613',0,'cbtis111',4),(2,'kevin','garcia','ramirez','mr.kegara@gmail.com','1234567890',0,'cbtis111',1),(3,'x','x','x','x@prueba','23232323',0,'cncunu',1),(4,'Alexis Rafael','Aparicio','Hernández','rexwolf96@gmail.com','9989377067',0,'Bachilleres Plantel Cancún Cuatro',4),(5,'Kevin','Garcia','Ramirez','Mail','S',1,'Cbtis111',1),(6,'kevin','xd','ramirez','mr.kegara@gmail.com','xd',0,'cbtis111',1),(7,'sdf','asdf','asf','asf','saf',0,'sdf',1),(8,'Kevin','Garcia','Ramirez','dark.star.plrd@gmail.com','9982998613',0,'cbtis111',4),(9,'Israel','Morales','Garcia','Israflakes@gmail.com','9982998613',2,'Cbits 132',4);
/*!40000 ALTER TABLE `registrado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seccion`
--

DROP TABLE IF EXISTS `seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seccion` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
INSERT INTO `seccion` VALUES (1,'Video de Bienvenida'),(2,'Conferencia'),(3,'Instalaciones'),(4,'Mantenimiento área Naval'),(5,'Ingenieria biomedica'),(6,'Turismo área Desarrollo de Productos Alternativos');
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicacion`
--

DROP TABLE IF EXISTS `ubicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubicacion` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Num_Interior` varchar(5) DEFAULT NULL,
  `Num_Exterior` varchar(5) NOT NULL,
  `Calle` varchar(100) NOT NULL,
  `Colonia` varchar(45) NOT NULL,
  `Ciudad` varchar(45) NOT NULL,
  `Codigo_Postal` varchar(45) NOT NULL,
  `url_Maps` varchar(300) NOT NULL,
  `Universidad_ID` int(10) unsigned NOT NULL,
  `Municipio_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Ubicacion_Universidad_idx` (`Universidad_ID`),
  KEY `fk_Ubicacion_Municipio1_idx` (`Municipio_ID`),
  CONSTRAINT `fk_Ubicacion_Municipio1` FOREIGN KEY (`Municipio_ID`) REFERENCES `municipio` (`ID`),
  CONSTRAINT `fk_Ubicacion_Universidad` FOREIGN KEY (`Universidad_ID`) REFERENCES `universidad` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicacion`
--

LOCK TABLES `ubicacion` WRITE;
/*!40000 ALTER TABLE `ubicacion` DISABLE KEYS */;
INSERT INTO `ubicacion` VALUES (1,'Mz. 2','Km 13','Carretera Chetumal- Cancún','SM. 299','Cancún','77565','NA',1,5),(2,'Lote ','Manza','Carretera Cancún-Aeropuerto KM 11.5 ','SM 299 ','Cancún','77565','https://goo.gl/maps/x4BvW7X2osHttXZ87',2,1),(3,'s/n','s/n','Calzada del Centenario, esquina Ignacio Comonfort','del Bosque','Chetumal','77035','NA',3,4),(4,'0','Mza 2','Fonatur','Smza 313','Cancún','77506','NA',4,5),(5,'#','#422','Av. Boulevard Bahía esquina con calle Margarita','Zona de Granjas','Chetumal','77079','https://www.google.com/maps/dir//vizcaya+chetumal/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x8f5ba36a84d58b11:0x740137c08469e070?sa=X&ved=2ahUKEwjT3I2QhcLuAhVFQ6wKHUKDDJQQ9RcwC3oECBIQBA',5,4),(6,'j','j','k','l','j','a','NA',6,5),(7,'56','4','34','Prueba','Felipe Carrillo Pto','77500','NA',7,1),(8,'55','34','34','Prueba','Felipe Carrillo Pto','77500','NA',8,9),(9,'a','a','k','l','a','a','https://www.google.com/maps/place/Universidad+Tecnologica+de+Canc%C3%BAn,/@21.0495167,-86.8469238,15z/data=!4m12!1m6!3m5!1s0x0:0x539479cfc0929edb!2sUniversidad+Tecnologica+de+Canc%C3%BAn,!8m2!3d21.0495167!4d-86.8469238!3m4!1s0x0:0x539479cfc0929edb!8m2!3d21.0495167!4d-86.8469238',9,1),(10,'0','0','Carretera Federal Cancún-Playa del Carmen Mza. 005 Lote 001','Selvamar','Playa del Carmen','77727','NA',10,8),(11,'Plant','No.2','Av. Yaxchilán Sm.21','Centro  Sm.21','Cancún','77500','NA',11,5),(12,'NA','54','Avenida CTM','Real Ibiza','Playa del Carmen','77723','NA',12,8);
/*!40000 ALTER TABLE `ubicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `universidad`
--

DROP TABLE IF EXISTS `universidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `universidad` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Ruta_Escudo` varchar(100) NOT NULL,
  `Tipo` varchar(1) NOT NULL COMMENT '0: Publica\n1: Privada',
  `Proceso_Admision` varchar(100) NOT NULL,
  `Clave_Centro_Trabajo` varchar(11) NOT NULL,
  `Usuario_ID` int(10) unsigned NOT NULL,
  `Estatus_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Universidad_Usuario1_idx` (`Usuario_ID`),
  KEY `fk_Universidad_Estatus1_idx` (`Estatus_ID`),
  CONSTRAINT `fk_Universidad_Estatus1` FOREIGN KEY (`Estatus_ID`) REFERENCES `estatus` (`ID`),
  CONSTRAINT `fk_Universidad_Usuario1` FOREIGN KEY (`Usuario_ID`) REFERENCES `usuario` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `universidad`
--

LOCK TABLES `universidad` WRITE;
/*!40000 ALTER TABLE `universidad` DISABLE KEYS */;
INSERT INTO `universidad` VALUES (1,'Universidad Anáhuac Cancún','NA','2','NA','',2,1),(2,'Universidad Tecnológica de Cancún','http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/logos/1611953856.png','0','NA','23EUT0001F',4,1),(3,'INSTITUTO DE ESTUDIOS SUPERIORES WOZNIAK','NA','1','NA','23PSU0065G',5,1),(4,'Escuela Superior de Leyes','NA','1','NA','23PSU0012B',6,1),(5,'Universidad Vizcaya de las Américas campus Chetumal','NA','1','NA','',7,1),(6,'Instituto de prueba','NA','0','NA','a2a2a2a2',9,3),(7,'prueba','NA','1','NA','ct6789657',10,1),(8,'fwfa','NA','0','NA','ct6789657',11,3),(9,'Instituto de prueba2','http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/logos/1611997695.png','0','http://feriavirtual.upqroo.edu.mx/SeccionAdministrativa/docs_Unis/admision/1611997695.pdf','a2a2a2a2',12,2),(10,'Earth University','NA','1','NA','23PSU0081Y',16,1),(11,'INSTITUTO UNIVERSITARIO CRUZ ROJA MEXICANA PLANTEL CANCUN','NA','1','NA','23PSU0058X',18,1),(12,'Universidad Riviera Playa del Carmen','NA','1','NA','CER0612082D',19,1);
/*!40000 ALTER TABLE `universidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `universidad_red_social`
--

DROP TABLE IF EXISTS `universidad_red_social`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `universidad_red_social` (
  `Recurso` varchar(200) NOT NULL,
  `Red_Social_ID` int(10) unsigned NOT NULL,
  `Universidad_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Red_Social_ID`,`Universidad_ID`),
  KEY `fk_Red_Social_has_Universidad_Universidad1_idx` (`Universidad_ID`),
  KEY `fk_Red_Social_has_Universidad_Red_Social1_idx` (`Red_Social_ID`),
  CONSTRAINT `fk_Red_Social_has_Universidad_Red_Social1` FOREIGN KEY (`Red_Social_ID`) REFERENCES `red_social` (`ID`),
  CONSTRAINT `fk_Red_Social_has_Universidad_Universidad1` FOREIGN KEY (`Universidad_ID`) REFERENCES `universidad` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `universidad_red_social`
--

LOCK TABLES `universidad_red_social` WRITE;
/*!40000 ALTER TABLE `universidad_red_social` DISABLE KEYS */;
INSERT INTO `universidad_red_social` VALUES ('https://www.facebook.com/UTdeCancun',1,2),('https://cutt.ly/VfVwBeo',2,2),('https://www.instagram.com/utcancun/',3,2),('https://twitter.com/UTCancun',4,2),('http://utcancun.edu.mx/',5,2);
/*!40000 ALTER TABLE `universidad_red_social` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Apellido_P` varchar(45) NOT NULL,
  `Apellido_M` varchar(45) NOT NULL,
  `Telefono` varchar(45) NOT NULL,
  `Celular` varchar(45) NOT NULL,
  `Correo_Electronico` varchar(70) NOT NULL,
  `Tipo` int(11) NOT NULL COMMENT '0: Super Admin\n1: Supervisor\n2: Admin\n3:Bloqueado',
  `Contrasena` varchar(100) NOT NULL,
  `Nombre_Usuario` varchar(55) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Kevin','Garcia','Ramirez','9982998613','9982998613','mr.kegara@gmail.com',1,'kegarapass','Kegara'),(2,'Shubert','Collí','Tuyub','9981901994','9981901994','shubert.colli@anahuac.mx',2,'DpuZRSJ8','MLEKX'),(3,'Israel','Morales','Garcia','9988776655','9988776655','imgescuela@gmail.com',0,'xd','QIRQG'),(4,'Randhy Mizzraim','Yam','Albornoz','998 8811900','9982624715','ryam@utcancun.edu.mx',2,'2A9PHqnM','HAOPG'),(5,'HEDY PAOLA','GARCÍA','BAHENA','9831183008','9831208775','universidad.wozniak@gmail.com',2,'8Bb1oDDO','PNOCG'),(6,'Selmy Guadalupe','Lopez','Anastacio','9988952841','9988952841','escuelasuperiordeleyes@hotmail.com',2,'qU6YptV3','PMQSY'),(7,'Oscar Román ','Rosado','Pérez','983 129 32 19 y 983 129 33 35','9831574237','vinculacion_chetumal@uva.edu.mx',2,'KHao4PN8','AAMHG'),(8,'Alexis','Aparicio','Hernandez','9988776655','1122334455','rexwolf96@gmail.com',0,'Qq24uTtp','AEUXE'),(9,'nombrePrueba123','AP123','AM123','9989377067','7777777777','rexwolf96@gmail.com',2,'zIbAJCla','RZVCM'),(10,'Mariano','Xiu','Chan','2334235','7899','ut_tareas@live.com.mx',2,'e6C4YmqG','HAFII'),(11,'wertre','ertrwet','erter','45456645','4545','ut_tareas@live.com.mx',2,'A3fBaNjV','DJOGA'),(12,'nombrePrueba123','apa','herna','9989377067','7777777777','rexwolf96@gmail.com',2,'FMe6gfw2','XLDCY'),(13,'Mariano Administrador','Xiu','Chan','9988776655','9988776655','ut_tareas@live.com.mx',1,'A0apV7f0','ANCMV'),(14,'Gino Gerardo Administrador','Madrazo','Galvez','9988776655','9988776655','ginomad@hotmail.com',0,'ONPPtRUt','EWMKA'),(15,'Paulo','Romero','Dominguez','9988776655','9988776655','dark.star.plrd@gmail.com',1,'RvMrVLlS','XAOAZ'),(16,'Citlali Daniela ','Cauich',' Kantun','9981556957','9981556957','citlali.cauich@earthlifeuniversity.com',2,'QxxeFxzQ','RUZUY'),(17,'Manuel Alejandro','Flores','Barrera','9981399555','9981399555','manuel.flores@upqroo.edu.mx',0,'VI4RF261','KIBVD'),(18,'ÉLIDA ','HERNÁNDEZ ','ORTEGA ','998 8841616 EXT.110','9982413119','elidaheor@gmail.com',2,'OKa6ebx6','KAPWX'),(19,'Heberto René ','Aguirre ','Jiménez','4421444128','4421444128','heberto.aguirre@universidadriviera.edu.mx',2,'GqcrZXMg','VZYIM');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Recurso` varchar(200) NOT NULL,
  `Titulo` varchar(70) NOT NULL,
  `Universidad_ID` int(10) unsigned NOT NULL,
  `Seccion_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Video_Universidad1_idx` (`Universidad_ID`),
  KEY `fk_Video_Seccion1_idx` (`Seccion_ID`),
  CONSTRAINT `fk_Video_Seccion1` FOREIGN KEY (`Seccion_ID`) REFERENCES `seccion` (`ID`),
  CONSTRAINT `fk_Video_Universidad1` FOREIGN KEY (`Universidad_ID`) REFERENCES `universidad` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (1,'bAGej7FHPyo','Video ingenieria Biomedica',9,5),(2,'PRysh4a8qKE','Bienvenida a la universidad!',9,1);
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-30 18:34:05
