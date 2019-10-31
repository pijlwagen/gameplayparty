-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: g4meplayp4rty
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `bioscoop_files`
--

DROP TABLE IF EXISTS `bioscoop_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bioscoop_files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bioscoop_id` bigint(20) NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bioscoop_files`
--

LOCK TABLES `bioscoop_files` WRITE;
/*!40000 ALTER TABLE `bioscoop_files` DISABLE KEYS */;
INSERT INTO `bioscoop_files` VALUES (10,4,'LSghzLS0HnCd6dw62bfM57SnBykuNd2v10xwWm9h.jpeg','2019-10-09 06:58:58','2019-10-09 06:58:58'),(11,3,'2fQDxVCZrkOYqmsxU3HM7pQPeg8HbhTDGKa7smyN.jpeg','2019-10-09 06:59:55','2019-10-09 06:59:55'),(12,1,'a9anC7IDGx5JzAGEu1TnCJ0X6LlZcya7jVo0kYke.jpeg','2019-10-09 07:07:56','2019-10-09 07:07:56'),(14,1,'Gp83H2TQBdfVpy3sNpTxiTULbUcmUMhgvLQnEfeY.jpeg','2019-10-09 07:27:26','2019-10-09 07:27:26'),(15,3,'BjNbF28oi2PF8QHaimvNnp4nvJDdNJSDBwRwWzqM.jpeg','2019-10-09 07:27:46','2019-10-09 07:27:46'),(16,4,'3YXDZFDqtfxf0yijbkNQ3nCU35Mk87UPwHycShly.jpeg','2019-10-09 07:29:17','2019-10-09 07:29:17'),(17,1,'o96JZYnZZ6Mdv1vcA3vr6y2TXmGcyIpZ1q1dUl8j.jpeg','2019-10-09 08:49:20','2019-10-09 08:49:20');
/*!40000 ALTER TABLE `bioscoop_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bioscoop_openingstijden`
--

DROP TABLE IF EXISTS `bioscoop_openingstijden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bioscoop_openingstijden` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bioscoop_id` bigint(20) NOT NULL,
  `day` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bioscoop_openingstijden`
--

LOCK TABLES `bioscoop_openingstijden` WRITE;
/*!40000 ALTER TABLE `bioscoop_openingstijden` DISABLE KEYS */;
/*!40000 ALTER TABLE `bioscoop_openingstijden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bioscoop_tijden`
--

DROP TABLE IF EXISTS `bioscoop_tijden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bioscoop_tijden` (
  `bioscoop_id` bigint(20) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bioscoop_tijden`
--

LOCK TABLES `bioscoop_tijden` WRITE;
/*!40000 ALTER TABLE `bioscoop_tijden` DISABLE KEYS */;
/*!40000 ALTER TABLE `bioscoop_tijden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bioscoop_users`
--

DROP TABLE IF EXISTS `bioscoop_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bioscoop_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bioscoop_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bioscoop_users`
--

LOCK TABLES `bioscoop_users` WRITE;
/*!40000 ALTER TABLE `bioscoop_users` DISABLE KEYS */;
INSERT INTO `bioscoop_users` VALUES (96,3,4,'2019-10-29 19:18:00','2019-10-29 19:18:00'),(97,1,2,'2019-10-30 06:46:38','2019-10-30 06:46:38'),(98,1,4,'2019-10-30 06:46:38','2019-10-30 06:46:38');
/*!40000 ALTER TABLE `bioscoop_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bioscopen`
--

DROP TABLE IF EXISTS `bioscopen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bioscopen` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(548) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reservations` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bioscopen`
--

LOCK TABLES `bioscopen` WRITE;
/*!40000 ALTER TABLE `bioscopen` DISABLE KEYS */;
INSERT INTO `bioscopen` VALUES (1,'Kinepolis Jaarbeurs Utrecht','Utrecht','Jaarbeursboulevard 300','3521BC','<p><br></p>','kinepolis-jaarbeurs-utrecht','2019-09-24 11:56:11','2019-10-30 06:46:38','030-2003000',0),(3,'Kinepolis Almere','Almere','Forum 16','1315TH','<p>Kinepolis Almere is sinds 2004 gevestigd in het levendige centrum van Almere. Het ontwerp van het imposante gebouw is van de bekroonde architect Rem Koolhaas. De megabioscoop telt 8 zalen met in totaal 2137 comfortabele stoelen.</p><p>Bij binnenkomst is de trap die diagonaal door het gebouw loopt, de eerste blikvanger. Kinepolis Almere is sinds november 2017 verbouwd om meer aan te sluiten bij de look-and-feel van Kinepolis. Dit betekent dat alle zetels zijn vernieuwd, dat er automatische ticket machines (ATM’s) op de trap zijn geplaatst en er een volledige nieuwe shop met een ruimer assortiment is gekomen.</p>','kinepolis-almere','2019-09-24 12:45:01','2019-10-29 19:18:00','036-5300063',0),(4,'Kinepolis Den Helder','Den Helder','Willemsoord 51','1781AS','<p><br></p>','kinepolis-Den-Helder','2019-09-25 05:27:09','2019-10-30 06:50:37','0223677899',0);
/*!40000 ALTER TABLE `bioscopen` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_08_19_000000_create_failed_jobs_table',1),(2,'2019_09_11_173850_create_roles_table',1),(3,'2019_09_11_173951_create_user_roles_table',1),(4,'2019_09_18_162531_create_pages_table',2),(5,'2019_09_19_082928_create_bioscopen_table',3),(6,'2019_09_19_084847_create_bioscoop_openingstijden_table',3),(7,'2019_09_24_114159_create_bioscoop_users_table',4),(8,'2019_09_24_130717_create_bioscoop_files_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'Over ons','over-ons','over-ons','<h2><strong>Breng jouw spel naar het volgende niveau op het grote scherm!</strong></h2><h2><br></h2><p>Met een privé-theater dat speciaal voor jou en je crew is gereserveerd, heb je nog nooit eerder zo gespeeld. Maak er een toernooi van! Neem je eigen favoriete Xbox One-spellen mee of kies uit het aanbod van je theater.</p><h2><strong>Dingen die je moet weten</strong></h2><p>Er is geen minimum voor groepen, maar het wordt aanbevolen dat de groepsgrootte tussen de 8 en 12 personen is. Dit zal de speeltijd voor elke speler maximaliseren. Voel je vrij om je eigen Xbox-spel mee te nemen om te spelen (persoonlijke spelconsoles of spellen voor andere spelconsoles zijn niet toegestaan).</p><p>Er is geen leeftijdsgrens voor videospelletjes op Xbox, maar de ouders moeten wel zelf kunnen beslissen over de spelbeoordeling van oudere gamers (d.w.z., titels met een \'M\'-rating).</p><p>Feesten kunnen maximaal 6 weken voor de datum van uw voorkeur worden aangevraagd en zijn niet gegarandeerd tot de datum is bevestigd en geboekt door het theater. Voor elke partij kan een aanbetaling van $50 worden gevraagd en kan op elk moment voor de partij aan de kassa worden betaald. De boeking kan pas worden gereserveerd na ontvangst van de aanbetaling.</p><p><em>Annuleringen met een opzegtermijn van minder dan 24 uur kunnen leiden tot een niet-terugvorderbare aanbetaling.</em></p><p>Buiten eten en drinken is niet toegestaan in de theatercomplexen, maar als u een verjaardag viert, kunt u uw eigen verjaardagstaart meenemen! Wij zorgen voor de borden, servetten en bestek. Feesten kunnen op elk moment buiten de openingsuren geboekt worden. Een voorbeeldboeking is zaterdag 10.00 - 12.00 uur of eender welke nacht na 22.30 uur, in afwachting van beschikbaarheid in bepaalde theaters en kan rechtstreeks bij het theater worden bevestigd.</p><p>Cadeaubonnen, alle belangrijke creditcards en debetkaarten worden geaccepteerd als betaalmiddel. Het is mogelijk dat er op sommige locaties doordeweeks geen partyboekingen beschikbaar zijn.</p><p><br></p><p>* Xbox Live kan afhankelijk van de huidige internetconnectiviteit en internetsnelheden variëren tussen de deelnemende locaties.</p><p>* De vereisten en beschikbare functies voor Xbox Live-gameplay voor meerdere spelers verschillen per systeem en speltitel.</p><p><br></p>','2019-09-24 12:16:53','2019-10-18 15:33:19'),(3,'Home','home','welcome','<h1 class=\"ql-align-center\">Power to the players</h1><p class=\"ql-align-center\">Breng jouw spel naar het volgende niveau op het grote scherm! Met een privé-theater dat speciaal voor jou en je crew is gereserveerd, heb je nog nooit eerder zo gespeeld. Maak er een toernooi van!</p>',NULL,'2019-10-02 09:09:28'),(5,'Contact','contact','contact','<h1>Contact</h1><p><br></p><p>Wilt u meer informatie? Of heeft u een vraag over ons bedrijf?</p><p>Vul het formulier onderstaande formulier in en wij zullen zo spoedig mogelijk contact met u opnemen.</p>','2019-09-25 07:21:22','2019-10-02 09:52:57'),(6,'Terms of service','terms','page','<h1>Terms and Conditions (\"Terms\")</h1><p>Last updated: October 02, 2019</p><p>Please read these Terms and Conditions (\"Terms\", \"Terms and Conditions\") carefully before using the http://www.gameplayparty.nl website (the \"Service\") operated by GamePlayParty (\"us\", \"we\", or \"our\").</p><p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p><p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service. The Terms and Conditions agreement for GamePlayParty has been created with the help of&nbsp;<a href=\"https://www.termsfeed.com/\" target=\"_blank\">TermsFeed</a>.</p><h2>Links To Other Web Sites</h2><p>Our Service may contain links to third-party web sites or services that are not owned or controlled by GamePlayParty.</p><p>GamePlayParty has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that GamePlayParty shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p><p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p><h2>Termination</h2><p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p><p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p><h2>Governing Law</h2><p>These Terms shall be governed and construed in accordance with the laws of Netherlands, without regard to its conflict of law provisions.</p><p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p><h2>Changes</h2><p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 15 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p><p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p><h2>Contact Us</h2><p>If you have any questions about these Terms, please contact us.</p>','2019-09-25 18:54:23','2019-10-02 08:36:11'),(7,'Bioscopen','bioscopen','bioscopen','<h1 class=\"ql-align-center\">Bioscopen</h1><p class=\"ql-align-center\">Breng jouw spel naar het volgende niveau op het grote scherm! Met een privé-theater dat speciaal voor jou en je crew is gereserveerd, heb je nog nooit eerder zo gespeeld. Maak er een toernooi van! Neem je eigen favoriete Xbox One-spellen mee of kies uit het aanbod van je theater.</p><p class=\"ql-align-center\">GamePlayParty heeft een groot aanbod aan bioscopen waar u uit kunt kiezen, zo is er voor elk feest een zaal!</p><p><br></p><h1 class=\"ql-align-center\">Kies uw locatie</h1>','2019-10-02 06:51:00','2019-10-02 09:25:05'),(8,'Cookies','cookies','page','<h1>Cookies Policy</h1><p>Last updated: October 02, 2019</p><p>GamePlayParty (\"us\", \"we\", or \"our\") uses cookies on the www.gameplayparty.nl website (the \"Service\"). By using the Service, you consent to the use of cookies.</p><p>Our Cookies Policy explains what cookies are, how we use cookies, how third-parties we may partner with may use cookies on the Service, your choices regarding cookies and further information about cookies. This Cookies Policy for GamePlayParty has been created with the help of&nbsp;<a href=\"https://www.termsfeed.com/\" target=\"_blank\">TermsFeed</a>.</p><h2>What are cookies</h2><p>Cookies are small pieces of text sent by your web browser by a website you visit. A cookie file is stored in your web browser and allows the Service or a third-party to recognize you and make your next visit easier and the Service more useful to you.</p><p>Cookies can be \"persistent\" or \"session\" cookies. Persistent cookies remain on your personal computer or mobile device when you go offline, while session cookies are deleted as soon as you close your web browser.</p><h2>How GamePlayParty uses cookies</h2><p>When you use and access the Service, we may place a number of cookies files in your web browser.</p><p>We use cookies for the following purposes:</p><ul><li>To enable certain functions of the Service</li><li>We use both session and persistent cookies on the Service and we use different types of cookies to run the Service:</li><li>Essential cookies. We may use essential cookies to authenticate users and prevent fraudulent use of user accounts.</li></ul><h2>What are your choices regarding cookies</h2><p>If you\'d like to delete cookies or instruct your web browser to delete or refuse cookies, please visit the help pages of your web browser. As an European citizen, under GDPR, you have certain individual rights. You can learn more about these rights in the&nbsp;<a href=\"https://termsfeed.com/blog/gdpr/#Individual_Rights_Under_the_GDPR\" target=\"_blank\">GDPR Guide</a>.</p><p>Please note, however, that if you delete cookies or refuse to accept them, you might not be able to use all of the features we offer, you may not be able to store your preferences, and some of our pages might not display properly.</p><ul><li>For the Chrome web browser, please visit this page from Google:&nbsp;<a href=\"https://support.google.com/accounts/answer/32050\" target=\"_blank\">https://support.google.com/accounts/answer/32050</a></li><li>For the Internet Explorer web browser, please visit this page from Microsoft:&nbsp;<a href=\"http://support.microsoft.com/kb/278835\" target=\"_blank\">http://support.microsoft.com/kb/278835</a></li><li>For the Firefox web browser, please visit this page from Mozilla:&nbsp;<a href=\"https://support.mozilla.org/en-US/kb/delete-cookies-remove-info-websites-stored\" target=\"_blank\">https://support.mozilla.org/en-US/kb/delete-cookies-remove-info-websites-stored</a></li><li>For the Safari web browser, please visit this page from Apple:&nbsp;<a href=\"https://support.apple.com/kb/PH21411?locale=en_US\" target=\"_blank\">https://support.apple.com/kb/PH21411?locale=en_US</a></li><li>For any other web browser, please visit your web browser\'s official web pages.</li></ul><h2>Where can you find more information about cookies</h2><p>You can learn more about cookies and the following third-party websites:</p><ul><li>AllAboutCookies:&nbsp;<a href=\"http://www.allaboutcookies.org/\" target=\"_blank\">http://www.allaboutcookies.org/</a></li><li>Network Advertising Initiative:&nbsp;<a href=\"http://www.networkadvertising.org/\" target=\"_blank\">http://www.networkadvertising.org/</a></li></ul><p><br></p>','2019-10-02 08:34:33','2019-10-02 08:34:33'),(9,'Return and Refunds Policy','return','page','<h1>Returns and Refunds Policy</h1><p>Thank you for shopping at GamePlayParty.</p><p>Please read this policy carefully. This is the Return and Refund Policy of GamePlayParty. The Return and Refund Policy for GamePlayParty has been created with the help of&nbsp;<a href=\"https://www.termsfeed.com/\" target=\"_blank\">TermsFeed</a>.</p><h2>Digital products</h2><p>We do not issue refunds for digital products once the order is confirmed and the product is sent.</p><p>We recommend contacting us for assistance if you experience any issues receiving or downloading our products.</p><h2>Contact us</h2><p>If you have any questions about our Returns and Refunds Policy, please contact us:</p><ul><li>By email: annuleer@gameplayparty.nl</li></ul><p><br></p>','2019-10-02 08:37:28','2019-10-02 09:12:09'),(10,'Privacy Policy NL','privacy-nl','page','<h1>Privacybeleid</h1><p>Ingangsdatum: October 02, 2019</p><p>GamePlayParty (\"ons\", \"wij\" of \"onze\") beheert de http://www.gameplayparty.nl website (\"hierna genoemd Dienst\").</p><p>Deze pagina bevat informatie over ons beleid met betrekking tot de verzameling, het gebruik en de openbaarmaking van uw persoonsgegevens wanneer u onze Dienst gebruikt en de keuzes die u hebt met betrekking tot die gegevens. The Privacy Policy for GamePlayParty has been created with the help of&nbsp;<a href=\"https://termsfeed.com/privacy-policy-generator/\" target=\"_blank\">TermsFeed Privacy Policy Generator</a>.</p><p>Wij gebruiken uw gegevens om de Dienst te leveren en te verbeteren. Wanneer u de Dienst gebruikt, gaat u akkoord met de verzameling en het gebruik van informatie in overeenstemming met dit beleid. Tenzij anders bepaald in dit Privacybeleid heeft de terminologie die wordt gebruikt in dit Privacybeleid dezelfde betekenis als in onze Algemene voorwaarden, beschikbaar op http://www.gameplayparty.nl</p><h2>Definities</h2><ul><li><strong>Dienst</strong></li><li>Onder dienst verstaan wij de http://www.gameplayparty.nl website beheerd door GamePlayParty</li><li><strong>Gebruiksgegevens</strong></li><li>Onder gebruiksgegevens verstaan wij automatisch verzamelde gegevens die worden gegenereerd door het gebruik van de Dienst of van de infrastructuur van de Dienst zelf (bijvoorbeeld, de duur van het bezoek aan een pagina).</li><li><strong>Gebruiksgegevens</strong></li><li>Onder gebruiksgegevens verstaan wij automatisch verzamelde gegevens die worden gegenereerd door het gebruik van de Dienst of van de infrastructuur van de Dienst zelf (bijvoorbeeld, de duur van het bezoek aan een pagina).</li><li><strong>Cookies</strong></li><li>Cookies zijn informatiebestandjes die worden opgeslagen op uw apparaat (computer of mobiele apparaat).</li></ul><h2>Gegevensverzameling en gebruik</h2><p>Wij verzamelen verschillende soorten gegevens voor uiteenlopende doeleinden om onze Dienst aan u te kunnen leveren en om hem te verbeteren.</p><h3>Soorten gegevens die worden verzameld</h3><h4>Persoonsgegevens</h4><p>Wanneer u onze Dienst gebruikt, kunnen wij u vragen ons bepaalde persoonlijk identificeerbare informatie te verstrekken die kan worden gebruikt om contact op te nemen met u of om u te identificeren (\"Persoonsgegevens\"). Deze persoonlijk identificeerbare informatie kan omvatten maar is niet beperkt tot:</p><ul><li>E-mailadres</li><li>Voor- en achternaam</li><li>Telefoonnummer</li><li>Adres, provincie, postcode, stad</li><li>Cookies en Gebruiksgegevens</li></ul><h4>Gebruiksgegevens</h4><p>Wij kunnen ook gegevens verzamelen over de wijze waarop de gebruiker toegang krijgt tot de Dienst en hoe deze wordt gebruikt (\"Gebruiksgegevens\") Deze Gebruiksgegevens kunnen informatie bevatten zoals het Internet Protocol adres (IP-adres) van uw computer, het type browser, de versie van de browser, de pagina\'s die u hebt bezocht op onze Dienst, het tijdstip en de datum van uw bezoek, de tijd die u hebt doorgebracht op die pagina\'s, unieke apparaat-ID\'s en andere diagnostische gegevens.</p><h4>Tracking &amp; cookiegegevens</h4><p>Wij gebruiken cookies en soortgelijke volgtechnologieën om de activiteit op onze Dienst te volgen en we bewaren bepaalde informatie.</p><p>Cookies zijn bestanden met een kleine hoeveelheid gegevens die een anonieme unieke ID kunnen bevatten. Cookies worden van een website verzonden naar uw browser en opgeslagen op uw apparaat. Er worden ook andere volgtechnologieën gebruikt zoals beacons, tags en scripts om gegevens te verzamelen en te volgen en om onze Dienst te verbeteren en te analyseren.</p><p>U kunt uw browser instellen om alle cookies te weigeren of om aan te geven wanneer een cookie wordt verzonden. Maar als u geen cookies aanvaardt, kunt u mogelijk niet alle functies van onze Dienst gebruiken.</p><p>Voorbeelden van cookies die wij gebruiken:</p><ul><li><strong>Sessiecookies.</strong>&nbsp;Wij gebruiken Sessiecookies om onze Dienst te beheren.</li><li><strong>Voorkeurcookies.</strong>&nbsp;Wij gebruiken Voorkeurcookies om uw voorkeuren en uiteenlopende instellingen bij te houden.</li><li><strong>Veiligheidscookies.</strong>&nbsp;Wij gebruiken Veiligheidscookies voor veiligheidsdoeleinden.</li></ul><h2>Gebruik van gegevens</h2><p>GamePlayParty gebruikt de verzamelde gegevens voor uiteenlopende doeleinden:</p><ul><li>Om onze Dienst te leveren en te onderhouden</li><li>Om u wijzigingen in onze Dienst te melden</li><li>Om u de mogelijkheid te bieden om, indien gewenst, deel te nemen aan de interactieve functies van onze Dienst</li><li>Om onze klanten steun te verlenen</li><li>Om analyse- of waardevolle gegevens te verzamelen die we kunnen toepassen om onze Dienst te verbeteren</li><li>Om toezicht te houden op het gebruik van onze Dienst</li><li>Om technische problemen te detecteren, te voorkomen en te behandelen</li><li>Om u nieuws, speciale aanbiedingen en algemene informatie te bieden over onze goederen, diensten en evenementen die gelijkaardig zijn aan wat u in het verleden al gekocht hebt of waar u informatie over hebt gevraagd, tenzij u hebt aangegeven dat u dergelijke informatie niet wenst te ontvangen.</li></ul><h2>Overdracht van gegevens</h2><p>Uw gegevens, inclusief Persoonsgegevens, kunnen worden overgedragen naar - en bewaard op - computers die zich buiten het rechtsgebied van uw provincie, land of een andere overheidsinstantie bevinden waar de wetgeving inzake gegevensbescherming kan verschillen van de wetgeving in uw rechtsgebied.</p><p>Let erop dat, als u zich buiten Netherlands bevindt en u ons gegevens verstrekt, wij deze gegevens, inclusief Persoonsgegevens, overdragen naar Netherlands en ze daar verwerken.</p><p>Uw instemming met dit Privacybeleid gevolgd door uw indiening van dergelijke gegevens geven aan dat u akkoord gaat met die overdracht.</p><p>GamePlayParty zal alle redelijkerwijs noodzakelijke stappen ondernemen om ervoor te zorgen dat uw gegevens veilig en in overeenstemming met dit Privacybeleid worden behandeld en dat uw Persoonsgegevens nooit worden overgedragen aan een organisatie of een land als er geen gepaste controles zijn ingesteld, inclusief de veiligheid van uw gegevens en andere persoonsgegevens.</p><h2>Openbaarmaking van gegevens</h2><h3>Wettelijke vereisten</h3><p>GamePlayParty kan uw Persoonsgegevens openbaar maken als het te goeder trouw de mening is toegedaan dat een dergelijke handeling noodzakelijk is:</p><ul><li>Om te voldoen aan een wettelijke verplichting</li><li>Om de rechten en eigendom van GamePlayParty te beschermen en te verdedigen</li><li>Om mogelijke misstanden te voorkomen of te onderzoeken in verband met de Dienst</li><li>Om de persoonlijke veiligheid van gebruikers van de Dienst of het publiek te beschermen</li><li>Als bescherming tegen juridische aansprakelijkheid</li></ul><p>Als Europees staatsburger hebt u volgens GDPR bepaalde individuele rechten. U kunt meer over deze rechten lezen in de&nbsp;<a href=\"https://termsfeed.com/blog/gdpr/#Individual_Rights_Under_the_GDPR\" target=\"_blank\">GDPR-handleiding</a>.</p><h2>Veiligheid van gegevens</h2><p>De veiligheid van uw gegevens is belangrijk voor ons, maar vergeet niet dat geen enkele methode van verzending via het internet of elektronische methode van opslag 100% veilig is. Hoewel wij ernaar streven commercieel aanvaardbare middelen toe te passen om uw Persoonsgegevens te beschermen, kunnen wij de absolute veiligheid niet waarborgen.</p><h2>Dienstverleners</h2><p>Wij kunnen externe bedrijven en personen aanstellen om onze Dienst (\"Dienstverleners\") te vereenvoudigen, om de Dienst te leveren in onze naam, om diensten uit te voeren in het kader van onze Dienst of om ons te helpen bij de analyse van hoe onze Dienst wordt gebruikt.</p><p>Deze externe partijen hebben enkel toegang tot uw Persoonsgegevens om deze taken uit te voeren in onze naam en zij mogen deze niet openbaar maken aan anderen of ze gebruiken voor andere doeleinden.</p><h2>Links naar andere sites</h2><p>Onze Dienst kan links bevatten naar andere sites die niet door ons worden beheerd. Als u klikt op een link van een externe partij wordt u naar de site van die externe partij gebracht. Wij raden u sterk aan het Privacybeleid te verifiëren van elke site die u bezoekt.</p><p>Wij hebben geen controle over en aanvaarden geen aansprakelijkheid met betrekking tot de inhoud, het privacybeleid of de privacypraktijken van de sites of diensten van een externe partij.</p><h2>Privacy van kinderen</h2><p>Onze dienst richt zich niet op personen die jonger zijn dan 18 (\"Kinderen\").</p><p>Wij verzamelen nooit bewust persoonlijk identificeerbare informatie van iemand die jonger is dan 18 jaar oud. Als u een ouder of voogd bent en u stelt vast dat uw kind ons persoonsgegevens heeft geleverd, vragen wij u contact op te nemen met ons. Als u vaststelt dat wij persoonsgegevens hebben verzameld van kinderen zonder de verificatie van ouderlijk toezicht zullen wij de nodige stappen ondernemen om die informatie te verwijderen van onze servers.</p><h2>Wijzigingen aan dit Privacybeleid</h2><p>Wij kunnen ons Privacybeleid op gezette tijden bijwerken. Wij zullen u op de hoogte brengen van eventuele wijzigingen door het nieuwe Privacybeleid te publiceren op deze pagina.</p><p>Wij zullen u op de hoogte brengen via e-mail en/of een duidelijke melding op onze Dienst voor de wijzigingen van kracht gaan en wij zullen de \"aanvangsdatum\" bijwerken die vermeld staat bovenaan in dit Privacybeleid.</p><p>Wij raden u aan dit Privacybeleid regelmatig te controleren op eventuele wijzigingen. Wijzigingen aan dit Privacybeleid gaan van kracht op het moment dat ze worden gepubliceerd op deze pagina.</p><h2>Contact opnemen</h2><p>Als u vragen hebt over dit Privacybeleid kunt u contact opnemen met ons:</p><ul><li>Via email: info@gameplayparty.nl</li></ul><p><br></p>','2019-10-02 08:42:53','2019-10-02 08:44:32'),(11,'Privacy Policy EN','privacy-en','page','<h1>Privacy Policy</h1><p>Effective date: October 02, 2019</p><p>A dutch version can be found <a href=\"/privacy-nl\" target=\"_blank\">here </a>/ Een Nederlandstalige versie kan <a href=\"/privacy-nl\" target=\"_blank\">hier </a>worden gevonden.</p><p>GamePlayParty (\"us\", \"we\", or \"our\") operates the http://www.gameplayparty.nl website (hereinafter referred to as the \"Service\").</p><p>This page informs you of our policies regarding the collection, use, and disclosure of personal data when you use our Service and the choices you have associated with that data. The Privacy Policy for GamePlayParty has been created with the help of&nbsp;<a href=\"https://www.termsfeed.com/\" target=\"_blank\">TermsFeed</a>.</p><p>We use your data to provide and improve the Service. By using the Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, the terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, accessible from http://www.gameplayparty.nl</p><h2>Definitions</h2><ul><li><strong>Service</strong></li><li>Service is the http://www.gameplayparty.nl website operated by GamePlayParty</li><li><strong>Personal Data</strong></li><li>Personal Data means data about a living individual who can be identified from those data (or from those and other information either in our possession or likely to come into our possession).</li><li><strong>Usage Data</strong></li><li>Usage Data is data collected automatically either generated by the use of the Service or from the Service infrastructure itself (for example, the duration of a page visit).</li><li><strong>Cookies</strong></li><li>Cookies are small files stored on your device (computer or mobile device).</li></ul><h2>Information Collection and Use</h2><p>We collect several different types of information for various purposes to provide and improve our Service to you.</p><h3>Types of Data Collected</h3><h4>Personal Data</h4><p>While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you (\"Personal Data\"). Personally identifiable information may include, but is not limited to:</p><ul><li>Email address</li><li>First name and last name</li><li>Phone number</li><li>Address, State, Province, ZIP/Postal code, City</li><li>Cookies and Usage Data</li></ul><h4>Usage Data</h4><p>We may also collect information how the Service is accessed and used (\"Usage Data\"). This Usage Data may include information such as your computer\'s Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p><h4>Tracking &amp; Cookies Data</h4><p>We use cookies and similar tracking technologies to track the activity on our Service and we hold certain information.</p><p>Cookies are files with a small amount of data which may include an anonymous unique identifier. Cookies are sent to your browser from a website and stored on your device. Other tracking technologies are also used such as beacons, tags and scripts to collect and track information and to improve and analyse our Service.</p><p>You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.</p><p>Examples of Cookies we use:</p><ul><li><strong>Session Cookies.</strong>&nbsp;We use Session Cookies to operate our Service.</li><li><strong>Preference Cookies.</strong>&nbsp;We use Preference Cookies to remember your preferences and various settings.</li><li><strong>Security Cookies.</strong>&nbsp;We use Security Cookies for security purposes.</li></ul><h2>Use of Data</h2><p>GamePlayParty uses the collected data for various purposes:</p><ul><li>To provide and maintain the Service</li><li>To notify you about changes to our Service</li><li>To allow you to participate in interactive features of our Service when you choose to do so</li><li>To provide customer care and support</li><li>To provide analysis or valuable information so that we can improve the Service</li><li>To monitor the usage of the Service</li><li>To detect, prevent and address technical issues</li></ul><h2>Transfer Of Data</h2><p>Your information, including Personal Data, may be transferred to - and maintained on - computers located outside of your state, province, country or other governmental jurisdiction where the data protection laws may differ than those from your jurisdiction.</p><p>If you are located outside Netherlands and choose to provide information to us, please note that we transfer the data, including Personal Data, to Netherlands and process it there.</p><p>Your consent to this Privacy Policy followed by your submission of such information represents your agreement to that transfer.</p><p>GamePlayParty will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy and no transfer of your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of your data and other personal information.</p><h2>Disclosure Of Data</h2><h3>Legal Requirements</h3><p>GamePlayParty may disclose your Personal Data in the good faith belief that such action is necessary to:</p><ul><li>To comply with a legal obligation</li><li>To protect and defend the rights or property of GamePlayParty</li><li>To prevent or investigate possible wrongdoing in connection with the Service</li><li>To protect the personal safety of users of the Service or the public</li><li>To protect against legal liability</li></ul><p>As an European citizen, under GDPR, you have certain individual rights. You can learn more about these guides in the&nbsp;<a href=\"https://termsfeed.com/blog/gdpr/#Individual_Rights_Under_the_GDPR\" target=\"_blank\">GDPR Guide</a>.</p><h2>Security of Data</h2><p>The security of your data is important to us but remember that no method of transmission over the Internet or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p><h2>Service Providers</h2><p>We may employ third party companies and individuals to facilitate our Service (\"Service Providers\"), to provide the Service on our behalf, to perform Service-related services or to assist us in analyzing how our Service is used.</p><p>These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p><h2>Links to Other Sites</h2><p>Our Service may contain links to other sites that are not operated by us. If you click a third party link, you will be directed to that third party\'s site. We strongly advise you to review the Privacy Policy of every site you visit.</p><p>We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p><h2>Children\'s Privacy</h2><p>Our Service does not address anyone under the age of 18 (\"Children\").</p><p>We do not knowingly collect personally identifiable information from anyone under the age of 18. If you are a parent or guardian and you are aware that your Child has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from children without verification of parental consent, we take steps to remove that information from our servers.</p><h2>Changes to This Privacy Policy</h2><p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p><p>We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update the \"effective date\" at the top of this Privacy Policy.</p><p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p><h2>Contact Us</h2><p>If you have any questions about this Privacy Policy, please contact us:</p><ul><li>By email: info@gameplayparty.nl</li></ul><p><br></p>','2019-10-02 08:43:32','2019-10-02 09:27:34');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
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
  `created_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `paymentID` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payerID` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservation_id` bigint(20) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,'PAYID-LW4T4DQ1RE98547H13398216','TGNMJ689HP9Q6',1,59.53,'2019-10-30 06:40:14','2019-10-30 06:40:14');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kids` int(11) NOT NULL DEFAULT '0',
  `normal` int(11) NOT NULL DEFAULT '0',
  `youth` int(11) NOT NULL DEFAULT '0',
  `elder` int(11) NOT NULL DEFAULT '0',
  `special` int(11) NOT NULL DEFAULT '0',
  `time` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (1,'Michel','Bunschoten','noreply@michel3951.com','92739872','Harmonielaan 1','3439 LK','Nieuwegein',10,1,0,0,0,1,'2019-10-30 06:38:44','2019-10-30 06:38:44');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Beheerder',NULL,NULL),(2,'Redacteur',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timelocks`
--

DROP TABLE IF EXISTS `timelocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timelocks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `zaal_id` bigint(20) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `price` double(8,2) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timelocks`
--

LOCK TABLES `timelocks` WRITE;
/*!40000 ALTER TABLE `timelocks` DISABLE KEYS */;
INSERT INTO `timelocks` VALUES (1,1,'2019-11-01 12:00:00','2019-11-01 13:00:00',11.00,0);
/*!40000 ALTER TABLE `timelocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `user_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,1,1),(2,2,3),(4,2,4);
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Michel','noreply@michel3951.com',NULL,'$2y$10$54cF3nSVHxjnz1LK6elisOJT6tPjPHCxYOp8KImRPm2f6NawAdqrC','H0cH3zlkTyJtjXlReo5pVaQ3R7Y3KtUocYeDngGelc24RwToXyUN7BcYjMeT','2019-09-17 13:42:29','2019-09-17 13:42:29'),(2,'Test Account','test@accou.nt',NULL,'$2y$10$z2zQyb.1AOmS0jC1UUS1muh0lmiyKue4rmRUhR5Dh6DvTK5Skigd.','scXuYYqP8ukce96oxvLdNY0T0swbiorRfWl9qU0nYjVgxtSq6YWfBNcxEgPY','2019-09-22 15:09:51','2019-09-22 15:09:51'),(4,'Test Account 2','test2@accou.nt',NULL,'$2y$10$.sLbFdWR0zjL6rD/M87mreYddLBagzB1tuLx/.kBKAZlsa6RG013a',NULL,'2019-09-24 10:39:03','2019-09-24 10:39:03'),(5,'michel','astrojunk@outlook.com',NULL,'$2y$10$PNU.cEcBooELsXJoSEGvbOhoceasS11gOY/X0udBk/LqkRb4MV//e',NULL,'2019-09-24 19:09:17','2019-09-24 19:09:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zalen`
--

DROP TABLE IF EXISTS `zalen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zalen` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bioscoop_id` bigint(20) NOT NULL,
  `name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seats` int(11) NOT NULL DEFAULT '0',
  `handicapped_seats` int(11) NOT NULL DEFAULT '0',
  `atmos` tinyint(1) NOT NULL DEFAULT '0',
  `3d` tinyint(1) NOT NULL DEFAULT '0',
  `ultra` tinyint(1) NOT NULL DEFAULT '0',
  `dolby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '5.1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zalen`
--

LOCK TABLES `zalen` WRITE;
/*!40000 ALTER TABLE `zalen` DISABLE KEYS */;
INSERT INTO `zalen` VALUES (1,1,'Zaal 1','1',102,2,0,0,0,'5.1','2019-10-29 20:43:29','2019-10-30 06:47:07'),(2,1,'Zaal 2','2',102,2,0,0,0,'7','2019-10-29 20:43:55','2019-10-29 20:43:55'),(3,1,'Zaal 3','3',102,2,0,1,0,'7','2019-10-29 20:44:08','2019-10-29 20:44:08'),(4,1,'Zaal 4','4',99,2,0,0,0,'7','2019-10-29 20:44:52','2019-10-29 20:44:52'),(5,1,'Zaal 5','5',166,2,0,0,1,'7.1','2019-10-30 06:40:23','2019-10-30 06:40:23'),(6,1,'Zaal 6','6',180,2,0,1,1,'7.1','2019-10-30 06:41:34','2019-10-30 06:41:34'),(7,1,'Zaal 7','7',467,4,1,1,1,'7.1','2019-10-30 06:42:07','2019-10-30 06:42:07'),(8,1,'Zaal 8','8',211,2,1,1,1,'7.1','2019-10-30 06:42:39','2019-10-30 06:42:39'),(9,1,'Zaal 9','9',179,2,0,1,1,'7.1','2019-10-30 06:43:08','2019-10-30 06:43:08'),(10,1,'Zaal 10','10',108,2,0,0,1,'7.1','2019-10-30 06:43:41','2019-10-30 06:43:41'),(11,1,'Zaal 11','11',160,2,0,0,1,'7.1','2019-10-30 06:44:02','2019-10-30 06:44:02'),(12,1,'Zaal 12','12',575,4,0,1,1,'7.1','2019-10-30 06:44:46','2019-10-30 06:44:46'),(13,1,'Zaal 13','13',374,2,1,1,1,'7.1','2019-10-30 06:45:18','2019-10-30 06:45:18'),(14,1,'Zaal 14','14',185,2,0,0,1,'7.1','2019-10-30 06:45:49','2019-10-30 06:45:49'),(15,4,'Zaal 1','kdh1',291,0,0,1,0,'5.1','2019-10-30 06:48:28','2019-10-30 06:48:28'),(16,4,'Zaal 2','kdh2',121,0,0,1,0,'5.1','2019-10-30 06:48:53','2019-10-30 06:48:53'),(17,4,'Zaal 3','kdh3',89,2,0,1,0,'5.1','2019-10-30 06:49:17','2019-10-30 06:49:17'),(18,4,'Zaal 4','kdh4',89,2,0,0,0,'5.1','2019-10-30 06:49:40','2019-10-30 06:49:40'),(19,4,'Zaal 5','kdh5',89,2,0,0,0,'5.1','2019-10-30 06:50:03','2019-10-30 06:50:03'),(20,4,'Zaal 6','kdh6',89,2,0,0,0,'5.1','2019-10-30 06:50:29','2019-10-30 06:50:29');
/*!40000 ALTER TABLE `zalen` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-30  8:50:53
