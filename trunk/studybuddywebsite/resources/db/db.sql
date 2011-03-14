USE `hipaa`;
--
-- Table structure for table 'hipaa_message'
--

CREATE TABLE hipaa_message (
message_id int(10) unsigned NOT NULL auto_increment,
`to` varchar(90) NOT NULL,
`from` varchar(90) NOT NULL,
about varchar(90) NOT NULL,
`type` varchar(90) NOT NULL,
purpose varchar(90) NOT NULL,
consent_by varchar(90) default NULL,
consent_type varchar(90) default NULL,
belief_about varchar(90) default NULL,
belief_what varchar(90) default NULL,
belief_by varchar(90) default NULL,
message text NOT NULL,
parent_id int(11) NOT NULL default '-1',
replyto_id int(11) NOT NULL default '-1',
`date` timestamp NOT NULL default CURRENT_TIMESTAMP,
PRIMARY KEY (message_id)
);

--
-- Table structure for table `in_role`
--

CREATE TABLE `in_role` (
`in_role_id` int(10) unsigned NOT NULL auto_increment,
`role` char(45) NOT NULL,
`person` char(45) NOT NULL,
PRIMARY KEY (`in_role_id`),
UNIQUE KEY `role` (`role`,`person`)
);


--
-- Dumping data for table `in_role`
--

INSERT INTO `in_role` VALUES (1,'covered_entity','sacred_heart_hospital'),(2,'healthCare_provider','chief_of_medicine'),(3,'healthCare_provider','doctor'),(4,'healthCare_provider','surgeon'),(5,'healthCare_provider','intern'),(6,'healthCare_provider','nurse'),(7,'doctor','dr_cox'),(8,'chief_of_medicine','dr_kelso'),(9,'surgeon','dr_turk'),(10,'intern','dr_jd'),(11,'intern','dr_elliot'),(12,'nurse','carla'),(13,'secretary','lavern'),(14,'legal_attorney','ted'),(15,'janitor','j'),(16,'board_member','jordon'),(17,'adult','dr_cox'),(18,'individual','dr_cox'),(19,'adult','dr_kelso'),(20,'individual','dr_kelso'),(21,'adult','dr_turk'),(22,'individual','dr_turk'),(23,'adult','dr_jd'),(24,'individual','dr_jd'),(25,'adult','dr_elliot'),(26,'individual','dr_elliot'),(27,'adult','carla'),(28,'individual','carla'),(29,'adult','lavern'),(30,'individual','lavern'),(31,'adult','ted'),(32,'individual','ted'),(33,'adult','j'),(34,'individual','j'),(35,'adult','jordon'),(36,'individual','jordon'),(37,'covered_entity','seattle_grace_hospital'),(38,'entity','the_office'),(39,'healthCare_provider','hcp'),(40,'health_oversight_agency','hoa'),(41,'public_health_authority','pha'),(42,'healthCare_accreditation_organization','hcao'),(43,'health_plan','hp'),(44,'group_health_plan','ghp'),(45,'government_agency_health_plan','gahp'),(46,'health_insurance_issuer','hii'),(47,'healthCare_clearing_house','hcch'),(48,'individual','patient'),(49,'adult','patient'),(50,'suspected_crime_perpetrator','thief'),(51,'individual','thief'),(52,'adult','thief'),(53,'emancipated_minor','teen'),(54,'individual','teen'),(55,'unemancipated_minor','kid'),(56,'individual','kid'),(57,'individual','mom'),(58,'adult','mom'),(59,'individual','dad'),(60,'adult','dad'),(61,'deceased_individual','dead'),(62,'individual','dead'),(63,'adult','dead'),(64,'clergy','clergy_mem'),(65,'law_enforcement_officer','cop'),(66,'government_secretary','government_official');