-- MySQL dump 10.13  Distrib 5.1.41, for Win32 (ia32)
--
-- Host: localhost    Database: trillium
-- ------------------------------------------------------
-- Server version	5.1.41

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
-- Table structure for table `chapter`
--

DROP TABLE IF EXISTS `chapter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chapter` (
  `chapterID` int(11) NOT NULL AUTO_INCREMENT,
  `chapterName` varchar(225) NOT NULL,
  `schoolName` varchar(255) NOT NULL,
  `streetAddress` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postalCode` varchar(45) NOT NULL,
  `province_provinceID` int(11) NOT NULL,
  `chapterAdvisor_advisorID` int(11) NOT NULL,
  `region_regionID` int(11) NOT NULL,
  PRIMARY KEY (`chapterID`,`chapterAdvisor_advisorID`),
  KEY `fk_chapter_province1` (`province_provinceID`),
  KEY `fk_chapter_chapterAdvisor1` (`chapterAdvisor_advisorID`),
  KEY `fk_chapter_region1` (`region_regionID`),
  CONSTRAINT `fk_chapter_province1` FOREIGN KEY (`province_provinceID`) REFERENCES `province` (`provinceID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chapter_chapterAdvisor1` FOREIGN KEY (`chapterAdvisor_advisorID`) REFERENCES `chapteradvisor` (`advisorID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chapter_region1` FOREIGN KEY (`region_regionID`) REFERENCES `region` (`regionID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chapter`
--

LOCK TABLES `chapter` WRITE;
/*!40000 ALTER TABLE `chapter` DISABLE KEYS */;
INSERT INTO `chapter` VALUES (1,'North Park DECA','North Park Secondary School','10 North Park Drive','Brampton','L6S 3M1',1,1,3);
/*!40000 ALTER TABLE `chapter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chapteradvisor`
--

DROP TABLE IF EXISTS `chapteradvisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chapteradvisor` (
  `advisorID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstName` varchar(225) NOT NULL,
  `lastName` varchar(225) NOT NULL,
  `emailAddress` varchar(225) NOT NULL,
  PRIMARY KEY (`advisorID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chapteradvisor`
--

LOCK TABLES `chapteradvisor` WRITE;
/*!40000 ALTER TABLE `chapteradvisor` DISABLE KEYS */;
INSERT INTO `chapteradvisor` VALUES (1,'a.wesker','5dce471dd0c9e02a708819dd02ed4e1b','Albert','Wesker','a.wesker@hotmail.com');
/*!40000 ALTER TABLE `chapteradvisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `eventsID` int(11) NOT NULL AUTO_INCREMENT,
  `eventName` varchar(45) NOT NULL,
  PRIMARY KEY (`eventsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `feedbackID` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(45) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `chapterAdvisor_advisorID` int(11) NOT NULL,
  PRIMARY KEY (`feedbackID`,`chapterAdvisor_advisorID`),
  KEY `fk_feedback_chapterAdvisor1` (`chapterAdvisor_advisorID`),
  CONSTRAINT `fk_feedback_chapterAdvisor1` FOREIGN KEY (`chapterAdvisor_advisorID`) REFERENCES `chapteradvisor` (`advisorID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `icdccompetitions`
--

DROP TABLE IF EXISTS `icdccompetitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `icdccompetitions` (
  `icdcID` int(11) NOT NULL AUTO_INCREMENT,
  `oralPresentationResultOne` int(11) NOT NULL,
  `oralPresentationResultTwo` int(11) DEFAULT NULL,
  `writtenTestResult` int(11) NOT NULL,
  `rank` varchar(45) NOT NULL,
  PRIMARY KEY (`icdcID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `icdccompetitions`
--

LOCK TABLES `icdccompetitions` WRITE;
/*!40000 ALTER TABLE `icdccompetitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `icdccompetitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `icdccompetitions_has_events`
--

DROP TABLE IF EXISTS `icdccompetitions_has_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `icdccompetitions_has_events` (
  `icdcCompetitions_icdcID` int(11) NOT NULL,
  `events_eventsID` int(11) NOT NULL,
  PRIMARY KEY (`icdcCompetitions_icdcID`,`events_eventsID`),
  KEY `fk_icdcCompetitions_has_events_events1` (`events_eventsID`),
  CONSTRAINT `fk_icdcCompetitions_has_events_icdcCompetitions1` FOREIGN KEY (`icdcCompetitions_icdcID`) REFERENCES `icdccompetitions` (`icdcID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_icdcCompetitions_has_events_events1` FOREIGN KEY (`events_eventsID`) REFERENCES `events` (`eventsID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `icdccompetitions_has_events`
--

LOCK TABLES `icdccompetitions_has_events` WRITE;
/*!40000 ALTER TABLE `icdccompetitions_has_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `icdccompetitions_has_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `province` (
  `provinceID` int(11) NOT NULL AUTO_INCREMENT,
  `provinceName` varchar(45) NOT NULL,
  PRIMARY KEY (`provinceID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province`
--

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` VALUES (1,'Ontario'),(2,'British Columbia'),(3,'Alberta'),(4,'Saskatchewan'),(5,'Manitoba'),(6,'Quebec'),(7,'Nova Scotia'),(8,'New Brunswick'),(9,'P.E.I'),(10,'Newfoundland and Labrador'),(11,'Yukon'),(12,'North West Territories'),(13,'Nunavut');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincialcompetitions`
--

DROP TABLE IF EXISTS `provincialcompetitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincialcompetitions` (
  `provincialCompetitionsID` int(11) NOT NULL AUTO_INCREMENT,
  `oralPresentationResultOne` int(11) NOT NULL,
  `oralPresentationResultTwo` int(11) DEFAULT NULL,
  `writtenTestResult` int(11) NOT NULL,
  `rankInEvent` int(11) NOT NULL,
  PRIMARY KEY (`provincialCompetitionsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincialcompetitions`
--

LOCK TABLES `provincialcompetitions` WRITE;
/*!40000 ALTER TABLE `provincialcompetitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `provincialcompetitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincialcompetitions_has_events`
--

DROP TABLE IF EXISTS `provincialcompetitions_has_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincialcompetitions_has_events` (
  `provincialCompetitions_provincialCompetitionsID` int(11) NOT NULL,
  `events_eventsID` int(11) NOT NULL,
  PRIMARY KEY (`provincialCompetitions_provincialCompetitionsID`,`events_eventsID`),
  KEY `fk_provincialCompetitions_has_events_events1` (`events_eventsID`),
  CONSTRAINT `fk_provincialCompetitions_has_events_provincialCompetitions1` FOREIGN KEY (`provincialCompetitions_provincialCompetitionsID`) REFERENCES `provincialcompetitions` (`provincialCompetitionsID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_provincialCompetitions_has_events_events1` FOREIGN KEY (`events_eventsID`) REFERENCES `events` (`eventsID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincialcompetitions_has_events`
--

LOCK TABLES `provincialcompetitions_has_events` WRITE;
/*!40000 ALTER TABLE `provincialcompetitions_has_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `provincialcompetitions_has_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region` (
  `regionID` int(11) NOT NULL AUTO_INCREMENT,
  `regionName` varchar(255) NOT NULL,
  PRIMARY KEY (`regionID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES (1,'North Eastern'),(2,'Hamilton'),(3,'Peel'),(4,'Toronto'),(5,'Waterloo'),(6,'York');
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regionalcompetitions`
--

DROP TABLE IF EXISTS `regionalcompetitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regionalcompetitions` (
  `regionalCompetitionsID` int(11) NOT NULL AUTO_INCREMENT,
  `oralPresentationResultOne` int(11) NOT NULL,
  `writtenTestResut` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`regionalCompetitionsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regionalcompetitions`
--

LOCK TABLES `regionalcompetitions` WRITE;
/*!40000 ALTER TABLE `regionalcompetitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `regionalcompetitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regionalcompetitions_has_events`
--

DROP TABLE IF EXISTS `regionalcompetitions_has_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regionalcompetitions_has_events` (
  `regionalCompetitions_regionalCompetitionsID` int(11) NOT NULL,
  `events_eventsID` int(11) NOT NULL,
  PRIMARY KEY (`regionalCompetitions_regionalCompetitionsID`,`events_eventsID`),
  KEY `fk_regionalCompetitions_has_events_events1` (`events_eventsID`),
  CONSTRAINT `fk_regionalCompetitions_has_events_regionalCompetitions1` FOREIGN KEY (`regionalCompetitions_regionalCompetitionsID`) REFERENCES `regionalcompetitions` (`regionalCompetitionsID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_regionalCompetitions_has_events_events1` FOREIGN KEY (`events_eventsID`) REFERENCES `events` (`eventsID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regionalcompetitions_has_events`
--

LOCK TABLES `regionalcompetitions_has_events` WRITE;
/*!40000 ALTER TABLE `regionalcompetitions_has_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `regionalcompetitions_has_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `studentID` int(11) NOT NULL AUTO_INCREMENT,
  `studentNumber` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `emailAddress` varchar(255) DEFAULT NULL,
  `homeroom` varchar(10) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `chapter_chapterID` int(11) NOT NULL,
  PRIMARY KEY (`studentID`),
  KEY `fk_student_chapter1` (`chapter_chapterID`),
  CONSTRAINT `fk_student_chapter1` FOREIGN KEY (`chapter_chapterID`) REFERENCES `chapter` (`chapterID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_has_icdccompetitions`
--

DROP TABLE IF EXISTS `student_has_icdccompetitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_has_icdccompetitions` (
  `student_studentID` int(11) NOT NULL,
  `icdcCompetitions_icdcID` int(11) NOT NULL,
  PRIMARY KEY (`student_studentID`,`icdcCompetitions_icdcID`),
  KEY `fk_student_has_icdcCompetitions_icdcCompetitions1` (`icdcCompetitions_icdcID`),
  CONSTRAINT `fk_student_has_icdcCompetitions_student1` FOREIGN KEY (`student_studentID`) REFERENCES `student` (`studentID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_icdcCompetitions_icdcCompetitions1` FOREIGN KEY (`icdcCompetitions_icdcID`) REFERENCES `icdccompetitions` (`icdcID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_has_icdccompetitions`
--

LOCK TABLES `student_has_icdccompetitions` WRITE;
/*!40000 ALTER TABLE `student_has_icdccompetitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_has_icdccompetitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_has_provincialcompetitions`
--

DROP TABLE IF EXISTS `student_has_provincialcompetitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_has_provincialcompetitions` (
  `provincialCompetitions_provincialCompetitionsID` int(11) NOT NULL,
  `student_studentID` int(11) NOT NULL,
  PRIMARY KEY (`provincialCompetitions_provincialCompetitionsID`,`student_studentID`),
  KEY `fk_student_has_provincialCompetitions_provincialCompetitions1` (`provincialCompetitions_provincialCompetitionsID`),
  KEY `fk_student_has_provincialCompetitions_student1` (`student_studentID`),
  CONSTRAINT `fk_student_has_provincialCompetitions_provincialCompetitions1` FOREIGN KEY (`provincialCompetitions_provincialCompetitionsID`) REFERENCES `provincialcompetitions` (`provincialCompetitionsID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_provincialCompetitions_student1` FOREIGN KEY (`student_studentID`) REFERENCES `student` (`studentID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_has_provincialcompetitions`
--

LOCK TABLES `student_has_provincialcompetitions` WRITE;
/*!40000 ALTER TABLE `student_has_provincialcompetitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_has_provincialcompetitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_has_regionalcompetitions`
--

DROP TABLE IF EXISTS `student_has_regionalcompetitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_has_regionalcompetitions` (
  `student_studentID` int(11) NOT NULL,
  `regionalCompetitions_regionalCompetitionsID` int(11) NOT NULL,
  PRIMARY KEY (`student_studentID`,`regionalCompetitions_regionalCompetitionsID`),
  KEY `fk_student_has_regionalCompetitions_regionalCompetitions1` (`regionalCompetitions_regionalCompetitionsID`),
  CONSTRAINT `fk_student_has_regionalCompetitions_student1` FOREIGN KEY (`student_studentID`) REFERENCES `student` (`studentID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_regionalCompetitions_regionalCompetitions1` FOREIGN KEY (`regionalCompetitions_regionalCompetitionsID`) REFERENCES `regionalcompetitions` (`regionalCompetitionsID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_has_regionalcompetitions`
--

LOCK TABLES `student_has_regionalcompetitions` WRITE;
/*!40000 ALTER TABLE `student_has_regionalcompetitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_has_regionalcompetitions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-01-30 17:14:47
