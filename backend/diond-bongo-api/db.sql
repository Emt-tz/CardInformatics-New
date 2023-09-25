-- MySQL dump 10.13  Distrib 8.0.33, for macos13.3 (x86_64)
--
-- Host: localhost    Database: cardinfo_diondbongo
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `_prisma_migrations`
--

DROP TABLE IF EXISTS `_prisma_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `_prisma_migrations` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checksum` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finished_at` datetime(3) DEFAULT NULL,
  `migration_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logs` text COLLATE utf8mb4_unicode_ci,
  `rolled_back_at` datetime(3) DEFAULT NULL,
  `started_at` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `applied_steps_count` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `applicant`
--

DROP TABLE IF EXISTS `applicant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applicant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `application_code` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` int NOT NULL DEFAULT '0',
  `type_of_loan` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TZS',
  `loan_amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `purpose_of_loan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `existing_loan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `lender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `total_existing_loan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tsh. 0',
  `employer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `employed_from` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `employed_to` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `business_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `business_location` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `previous_employer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `previous_designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `previous_employed_from` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `previous_employed_to` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_nida_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_f_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_birth_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_martial_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_professional` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_p_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_response` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `R_comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `annual_salary` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `supplimentary_income` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `s_employed_income` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `other_income` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `income_source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_annual_income` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `collateral_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `collateral_value` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `salary_statement` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bank_statement` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `money_statement` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `start_credit_date` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `loan_status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `locked_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bank_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bankAdm_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bankAdm_no` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bankAdm_message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `approve_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `approval_date` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `approval_date1` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `delete_status` int NOT NULL DEFAULT '0',
  `deleted_coz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `deleted_Date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `expiry_date` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `accepted_status` int NOT NULL DEFAULT '0',
  `accepted_by` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `accepted_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`),
  KEY `bank_id` (`bank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `applicant_documents`
--

DROP TABLE IF EXISTS `applicant_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applicant_documents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `application_code` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_id` int NOT NULL DEFAULT '0',
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan` int NOT NULL DEFAULT '0',
  `query` int NOT NULL DEFAULT '0',
  `date_time` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `applicant_interest`
--

DROP TABLE IF EXISTS `applicant_interest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applicant_interest` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_created` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `application_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `loan_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bank_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `currency` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TZS',
  `p_loan_amount` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `interest_charge` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `annual_fee` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `late_payment_fee` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `other_fee` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `special_feature` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `payback_periods` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bankAdm_email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `accepted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bank` (
  `date` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regulator` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `calls_visits`
--

DROP TABLE IF EXISTS `calls_visits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calls_visits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '00/00/000',
  `stakeholder_name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `stakeholder_title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `stakeholder_p_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `call_or_visit` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `call_details` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `visit_details` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `details` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `comment` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `Adm_email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `credit_offer`
--

DROP TABLE IF EXISTS `credit_offer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `credit_offer` (
  `date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `promotion_code` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bank_id` int NOT NULL DEFAULT '0',
  `bankAdm_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bankAdm_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `institution_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `number_of_employees` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `loan_history` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `credit_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `credit_product` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `currency` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `credit_limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `interest_charge` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `annual_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `late_payment_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `other_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `additional_info` varchar(320) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payback_periods` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `app_deadline` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `expiry` int NOT NULL DEFAULT '0',
  `app_expire` date NOT NULL,
  `del_bankAdm_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `del_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `bank_id` (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `credit_offer_apply`
--

DROP TABLE IF EXISTS `credit_offer_apply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `credit_offer_apply` (
  `application_date` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `existing_loan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `lender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_existing_loan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `c_employer` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `c_designation` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `c_employed_from` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `c_employed_to` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Present',
  `business_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `business_location` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `R_nida_no` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_f_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_birth_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_martial_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_professional` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_p_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_response` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `R_comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `income_currency` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TZS',
  `annual_salary` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `s_employed_income` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `other_income` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `supplimentary_income` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `income_source` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_annual_income` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `salary_statement` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bank_statement` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `money_statement` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `credit_offer_id` int NOT NULL DEFAULT '0',
  `bank_id` int NOT NULL DEFAULT '0',
  `bankAdm_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bankAdm_no` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bankAdm_message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `user_id` int NOT NULL DEFAULT '0',
  `apply_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `credit_offer_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `approval_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `delete_status` int NOT NULL,
  `deleted_coz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `deleted_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `accepted_status` int NOT NULL DEFAULT '0',
  `accepted_by` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `accepted_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `query` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `credit_offer_id` (`credit_offer_id`,`bank_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `credit_offer_documents`
--

DROP TABLE IF EXISTS `credit_offer_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `credit_offer_documents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT '0',
  `promotion_code` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `credit` int NOT NULL DEFAULT '0',
  `query` int NOT NULL DEFAULT '0',
  `date_time` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `credit_offer_query`
--

DROP TABLE IF EXISTS `credit_offer_query`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `credit_offer_query` (
  `date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `credit_apply_id` int NOT NULL DEFAULT '0',
  `credit_offer_id` int NOT NULL DEFAULT '0',
  `bank_id` int NOT NULL DEFAULT '0',
  `bankAdm_email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bankAdm_no` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` int NOT NULL DEFAULT '0',
  `query` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `reply` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `feedback_no` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `f_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `feedback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `date_created` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `loginlogs`
--

DROP TABLE IF EXISTS `loginlogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loginlogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `IpAddress` varbinary(16) NOT NULL,
  `TryTime` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `loginlogs_data`
--

DROP TABLE IF EXISTS `loginlogs_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loginlogs_data` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `date_time_in` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `date_time_out` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `merch_applicant_tour`
--

DROP TABLE IF EXISTS `merch_applicant_tour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `merch_applicant_tour` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_created` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `applicant_tour_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `merch_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `merch_Adm_id` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `merch_Adm_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `merch_Adm_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tour_location` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `specific_location` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `route_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `days` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `currency` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `pay_adult` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `pay_teenager` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `pay_child` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `additional_info` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `status` int NOT NULL DEFAULT '0',
  `expiry_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `expiry` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1.logo.png',
  `del_Merch_Adm_email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `merch_applicant_tour_apply`
--

DROP TABLE IF EXISTS `merch_applicant_tour_apply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `merch_applicant_tour_apply` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_created` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tour_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `applicant_tour_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `merch_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `start_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `end_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `no_adult_p` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `no_teenager_p` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `no_child_p` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `no_infant_p` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_payment` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payment_loan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `existing_loan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `lender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_existing_loan` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `c_employer` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `c_designation` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `c_employed_from` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `c_employed_to` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Current',
  `business_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `business_location` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `business_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `R_nida_no` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_f_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_birth_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_martial_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_professional` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_p_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `R_response` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `R_comment` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `currency` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TZS',
  `annual_salary` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `s_employed_income` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `other_income` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `supplimentary_income` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_annual_income` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `collateral_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `collateral_value` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `salary_statement` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bank_statement` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `money_statement` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bank_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bankAdm_email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bankAdm_no` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tour_approval_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `approval_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tour_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `merch_applicant_tour_doc`
--

DROP TABLE IF EXISTS `merch_applicant_tour_doc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `merch_applicant_tour_doc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `merch_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `applicant_tour_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `doc_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `tour` int NOT NULL DEFAULT '0',
  `loan` int NOT NULL DEFAULT '0',
  `query` int NOT NULL DEFAULT '0',
  `date_created` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `merch_applicant_tour_interest`
--

DROP TABLE IF EXISTS `merch_applicant_tour_interest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `merch_applicant_tour_interest` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_created` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `applicant_tour_code` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tour_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `merch_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bank_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bankAdm_email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `currency` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `interest_charge` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `annual_fee` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `late_payment_fee` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `other_fee` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payback_periods` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `authorization` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `indemnity` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `accepted` int NOT NULL DEFAULT '0',
  `approved_status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `merch_applicant_tour_picture`
--

DROP TABLE IF EXISTS `merch_applicant_tour_picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `merch_applicant_tour_picture` (
  `id` int NOT NULL AUTO_INCREMENT,
  `merch_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `applicant_tour_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `picture_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1.logo.png',
  `tour` int NOT NULL DEFAULT '0',
  `date_created` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `merchant`
--

DROP TABLE IF EXISTS `merchant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `merchant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_created` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `merch_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `merch_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `merchant_type` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `regulator` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `business_tin_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `licence_expire` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bank_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bank_branch` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `account_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `merch_certificate` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `merch_Adm_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `updated_by` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `updated_date` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `query`
--

DROP TABLE IF EXISTS `query`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `query` (
  `date` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int NOT NULL DEFAULT '0',
  `application_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bank_id` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL DEFAULT '0',
  `request_for` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `reply_to` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `document1` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sec_request` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sec_reply` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `document2` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `query_status` int NOT NULL DEFAULT '0',
  `permanet_delete` int NOT NULL DEFAULT '0',
  `query_end` date NOT NULL,
  KEY `id` (`id`,`bank_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registration` (
  `date` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `nida_no` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tin_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `passport_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `f_name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `l_name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `gender` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `marital_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `birth_date` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '00/00/0000',
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bank_id` int NOT NULL DEFAULT '0',
  `merch_id` int NOT NULL DEFAULT '0',
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `role` int DEFAULT '2',
  `security_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `security_answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `account_status` int NOT NULL DEFAULT '0',
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `ward` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `street_no` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `street` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `district` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `region` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `p_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `profile_pic` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1avatar1.jpg',
  `last_edited` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `edited_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None ',
  `edited_coz` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `status` int NOT NULL DEFAULT '0',
  `locking_cz` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `locked_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `locked_date1` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0000-00-00',
  `Adm_email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  PRIMARY KEY (`id`),
  KEY `bank_id` (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `registration_deleted`
--

DROP TABLE IF EXISTS `registration_deleted`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registration_deleted` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT '0',
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `p_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `Adm_email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deleted_coz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deleted_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscription` (
  `bank_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `l_payment_date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0000-00-00',
  `l_end_date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0000-00-00',
  `l_admin_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `credit` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `c_payment_date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0000-00-00',
  `c_admin_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `c_end_date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0000-00-00',
  `tour` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `t_payment_date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0000-00-00',
  `t_admin_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `t_end_date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-25  8:12:30
