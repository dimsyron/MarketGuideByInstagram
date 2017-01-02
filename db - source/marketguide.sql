/*
SQLyog Ultimate v10.42 
MySQL - 5.6.21 : Database - marketguide
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`marketguide` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `marketguide`;

/*Table structure for table `base` */

DROP TABLE IF EXISTS `base`;

CREATE TABLE `base` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `base` */

insert  into `base`(`id`,`word`) values (1,'fashion'),(2,'food'),(3,'cafe'),(4,'jajanan'),(5,'clothing'),(6,'seminar'),(7,'mahasiswa'),(8,'travelling'),(9,'wonderful'),(10,'kos '),(11,'kosmetik'),(12,'jalanjalan'),(13,'kuliner'),(14,'bimbel'),(15,'seni'),(16,'sepakbola'),(17,'bioskop'),(18,'belanja'),(19,'oleholeh'),(20,'event');

/*Table structure for table `location` */

DROP TABLE IF EXISTS `location`;

CREATE TABLE `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `location` */

insert  into `location`(`id`,`word`) values (1,'jogja'),(2,'solo'),(3,'bandung'),(4,'jakarta'),(5,'surabaya'),(6,'makassar'),(7,'palembang'),(8,'bali'),(9,'samarinda'),(10,'medan');

/*Table structure for table `result` */

DROP TABLE IF EXISTS `result`;

CREATE TABLE `result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_base` int(11) DEFAULT NULL,
  `id_location` int(11) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `is_checked` enum('Yes','No') DEFAULT 'No',
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=latin1;

/*Data for the table `result` */

insert  into `result`(`id`,`id_base`,`id_location`,`tag`,`is_checked`,`count`) values (1,1,1,'fashionjogja','Yes',61093),(2,1,2,'fashionsolo','Yes',70660),(3,1,3,'fashionbandung','Yes',331303),(4,1,4,'fashionjakarta','Yes',175965),(5,1,5,'fashionsurabaya','Yes',39023),(6,1,6,'fashionmakassar','Yes',15282),(7,1,7,'fashionpalembang','Yes',16873),(8,1,8,'fashionbali','Yes',20064),(9,1,9,'fashionsamarinda','Yes',5216),(10,1,10,'fashionmedan','Yes',31821),(11,2,1,'foodjogja','Yes',15089),(12,2,2,'foodsolo','Yes',1366),(13,2,3,'foodbandung','Yes',10287),(14,2,4,'foodjakarta','Yes',19808),(15,2,5,'foodsurabaya','Yes',11685),(16,2,6,'foodmakassar','Yes',1434),(17,2,7,'foodpalembang','Yes',2793),(18,2,8,'foodbali','Yes',34889),(19,2,9,'foodsamarinda','Yes',1649),(20,2,10,'foodmedan','Yes',4524),(21,3,1,'cafejogja','Yes',32799),(22,3,2,'cafesolo','Yes',9838),(23,3,3,'cafebandung','Yes',66381),(24,3,4,'cafejakarta','Yes',43338),(25,3,5,'cafesurabaya','Yes',35439),(26,3,6,'cafemakassar','Yes',37165),(27,3,7,'cafepalembang','Yes',3674),(28,3,8,'cafebali','Yes',19720),(29,3,9,'cafesamarinda','Yes',2814),(30,3,10,'cafemedan','Yes',5878),(31,4,1,'jajananjogja','Yes',24928),(32,4,2,'jajanansolo','Yes',50391),(33,4,3,'jajananbandung','Yes',174527),(34,4,4,'jajananjakarta','Yes',45599),(35,4,5,'jajanansurabaya','Yes',50519),(36,4,6,'jajananmakassar','Yes',36908),(37,4,7,'jajananpalembang','Yes',48736),(38,4,8,'jajananbali','Yes',10151),(39,4,9,'jajanansamarinda','Yes',17501),(40,4,10,'jajananmedan','Yes',36814),(41,5,1,'clothingjogja','Yes',10359),(42,5,2,'clothingsolo','Yes',4828),(43,5,3,'clothingbandung','Yes',54239),(44,5,4,'clothingjakarta','Yes',39426),(45,5,5,'clothingsurabaya','Yes',6445),(46,5,6,'clothingmakassar','Yes',420),(47,5,7,'clothingpalembang','Yes',815),(48,5,8,'clothingbali','Yes',19814),(49,5,9,'clothingsamarinda','Yes',417),(50,5,10,'clothingmedan','Yes',913),(51,6,1,'seminarjogja','Yes',1202),(52,6,2,'seminarsolo','Yes',199),(53,6,3,'seminarbandung','Yes',1180),(54,6,4,'seminarjakarta','Yes',2063),(55,6,5,'seminarsurabaya','Yes',1062),(56,6,6,'seminarmakassar','Yes',103),(57,6,7,'seminarpalembang','Yes',118),(58,6,8,'seminarbali','Yes',250),(59,6,9,'seminarsamarinda','Yes',25),(60,6,10,'seminarmedan','Yes',931),(61,7,1,'mahasiswajogja','Yes',47911),(62,7,2,'mahasiswasolo','Yes',4881),(63,7,3,'mahasiswabandung','Yes',10198),(64,7,4,'mahasiswajakarta','Yes',5498),(65,7,5,'mahasiswasurabaya','Yes',14722),(66,7,6,'mahasiswamakassar','Yes',2765),(67,7,7,'mahasiswapalembang','Yes',1367),(68,7,8,'mahasiswabali','Yes',634),(69,7,9,'mahasiswasamarinda','Yes',1227),(70,7,10,'mahasiswamedan','Yes',1413),(71,8,1,'travellingjogja','Yes',12796),(72,8,2,'travellingsolo','Yes',12380),(73,8,3,'travellingbandung','Yes',1406),(74,8,4,'travellingjakarta','Yes',632),(75,8,5,'travellingsurabaya','Yes',224),(76,8,6,'travellingmakassar','Yes',132),(77,8,7,'travellingpalembang','Yes',6),(78,8,8,'travellingbali','Yes',3499),(79,8,9,'travellingsamarinda','Yes',4),(80,8,10,'travellingmedan','Yes',282),(81,9,1,'wonderfuljogja','Yes',156158),(82,9,2,'wonderfulsolo','Yes',933),(83,9,3,'wonderfulbandung','Yes',2083),(84,9,4,'wonderfuljakarta','Yes',1260),(85,9,5,'wonderfulsurabaya','Yes',362),(86,9,6,'wonderfulmakassar','Yes',170),(87,9,7,'wonderfulpalembang','Yes',486),(88,9,8,'wonderfulbali','Yes',21629),(89,9,9,'wonderfulsamarinda','Yes',6),(90,9,10,'wonderfulmedan','Yes',444),(91,10,1,'kos jogja','Yes',2134),(92,10,2,'kos solo','Yes',104),(93,10,3,'kos bandung','Yes',1799),(94,10,4,'kos jakarta','Yes',344),(95,10,5,'kos surabaya','Yes',456),(96,10,6,'kos makassar','Yes',63),(97,10,7,'kos palembang','Yes',11),(98,10,8,'kos bali','Yes',63),(99,10,9,'kos samarinda','Yes',19),(100,10,10,'kos medan','Yes',128),(101,11,1,'kosmetikjogja','Yes',67903),(102,11,2,'kosmetiksolo','Yes',36569),(103,11,3,'kosmetikbandung','Yes',47148),(104,11,4,'kosmetikjakarta','Yes',174249),(105,11,5,'kosmetiksurabaya','Yes',121030),(106,11,6,'kosmetikmakassar','Yes',15022),(107,11,7,'kosmetikpalembang','Yes',30952),(108,11,8,'kosmetikbali','Yes',17006),(109,11,9,'kosmetiksamarinda','Yes',12296),(110,11,10,'kosmetikmedan','Yes',36278),(111,12,1,'jalanjalanjogja','Yes',40417),(112,12,2,'jalanjalansolo','Yes',7148),(113,12,3,'jalanjalanbandung','Yes',18988),(114,12,4,'jalanjalanjakarta','Yes',4942),(115,12,5,'jalanjalansurabaya','Yes',2525),(116,12,6,'jalanjalanmakassar','Yes',11956),(117,12,7,'jalanjalanpalembang','Yes',1174),(118,12,8,'jalanjalanbali','Yes',11109),(119,12,9,'jalanjalansamarinda','Yes',42),(120,12,10,'jalanjalanmedan','Yes',1547),(121,13,1,'kulinerjogja','Yes',579633),(122,13,2,'kulinersolo','Yes',255082),(123,13,3,'kulinerbandung','Yes',1042382),(124,13,4,'kulinerjakarta','Yes',829050),(125,13,5,'kulinersurabaya','Yes',684735),(126,13,6,'kulinermakassar','Yes',125833),(127,13,7,'kulinerpalembang','Yes',189372),(128,13,8,'kulinerbali','Yes',232508),(129,13,9,'kulinersamarinda','Yes',70296),(130,13,10,'kulinermedan','Yes',825760),(131,14,1,'bimbeljogja','Yes',1672),(132,14,2,'bimbelsolo','Yes',296),(133,14,3,'bimbelbandung','Yes',329),(134,14,4,'bimbeljakarta','Yes',960),(135,14,5,'bimbelsurabaya','Yes',512),(136,14,6,'bimbelmakassar','Yes',4),(137,14,7,'bimbelpalembang','Yes',48),(138,14,8,'bimbelbali','Yes',1),(139,14,9,'bimbelsamarinda','Yes',8),(140,14,10,'bimbelmedan','Yes',20),(141,15,1,'senijogja','Yes',2931),(142,15,2,'senisolo','Yes',46),(143,15,3,'senibandung','Yes',506),(144,15,4,'senijakarta','Yes',227),(145,15,5,'senisurabaya','Yes',55),(146,15,6,'senimakassar','Yes',67),(147,15,7,'senipalembang','Yes',113),(148,15,8,'senibali','Yes',4560),(149,15,9,'senisamarinda','Yes',31),(150,15,10,'senimedan','Yes',125),(151,16,1,'sepakbolajogja','Yes',73),(152,16,2,'sepakbolasolo','Yes',18),(153,16,3,'sepakbolabandung','Yes',123),(154,16,4,'sepakbolajakarta','Yes',809),(155,16,5,'sepakbolasurabaya','Yes',54),(156,16,6,'sepakbolamakassar','Yes',14),(157,16,7,'sepakbolapalembang','Yes',14),(158,16,8,'sepakbolabali','Yes',113),(159,16,9,'sepakbolasamarinda','Yes',6),(160,16,10,'sepakbolamedan','Yes',46),(161,17,1,'bioskopjogja','Yes',240),(162,17,2,'bioskopsolo','Yes',66),(163,17,3,'bioskopbandung','Yes',202),(164,17,4,'bioskopjakarta','Yes',210),(165,17,5,'bioskopsurabaya','Yes',57),(166,17,6,'bioskopmakassar','Yes',9),(167,17,7,'bioskoppalembang','Yes',20),(168,17,8,'bioskopbali','Yes',454),(169,17,9,'bioskopsamarinda','Yes',31),(170,17,10,'bioskopmedan','Yes',33),(171,18,1,'belanjajogja','Yes',5661),(172,18,2,'belanjasolo','Yes',2025),(173,18,3,'belanjabandung','Yes',7325),(174,18,4,'belanjajakarta','Yes',1497),(175,18,5,'belanjasurabaya','Yes',470),(176,18,6,'belanjamakassar','Yes',112),(177,18,7,'belanjapalembang','Yes',1470),(178,18,8,'belanjabali','Yes',1284),(179,18,9,'belanjasamarinda','Yes',20),(180,18,10,'belanjamedan','Yes',2297),(181,19,1,'oleholehjogja','Yes',41597),(182,19,2,'oleholehsolo','Yes',13754),(183,19,3,'oleholehbandung','Yes',66701),(184,19,4,'oleholehjakarta','Yes',23665),(185,19,5,'oleholehsurabaya','Yes',40990),(186,19,6,'oleholehmakassar','Yes',5925),(187,19,7,'oleholehpalembang','Yes',8754),(188,19,8,'oleholehbali','Yes',164251),(189,19,9,'oleholehsamarinda','Yes',1413),(190,19,10,'oleholehmedan','Yes',35038),(191,20,1,'eventjogja','Yes',74598),(192,20,2,'eventsolo','Yes',28693),(193,20,3,'eventbandung','Yes',54274),(194,20,4,'eventjakarta','Yes',132903),(195,20,5,'eventsurabaya','Yes',127635),(196,20,6,'eventmakassar','Yes',8209),(197,20,7,'eventpalembang','Yes',3768),(198,20,8,'eventbali','Yes',12309),(199,20,9,'eventsamarinda','Yes',3016),(200,20,10,'eventmedan','Yes',16022);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
