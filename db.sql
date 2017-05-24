CREATE TABLE `prijava` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` enum('','facebook','google') COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) DEFAULT NULL,COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(245) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `email_code` varchar(245) DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
  PRIMARY KEY (`id`)
)
