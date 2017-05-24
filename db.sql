CREATE TABLE `prijava` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(245) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `email_code` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`id`)
) 