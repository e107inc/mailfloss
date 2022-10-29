CREATE TABLE `mailfloss` (
  `mailfloss_id` int(11) NOT NULL AUTO_INCREMENT,
  `mailfloss_date` int(11) NOT NULL,
  `mailfloss_email` varchar(50) NOT NULL,
  `mailfloss_suggestion` varchar(255) NOT NULL,
  `mailfloss_status` varchar(50) NOT NULL,
  `mailfloss_reason` varchar(50) NOT NULL,
  `mailfloss_role` int(1) NOT NULL,
  `mailfloss_disposable` int(1) NOT NULL,
  `mailfloss_free` int(1) NOT NULL,
  `mailfloss_passed` int(1) NOT NULL,
  `mailfloss_domain` varchar(50) NOT NULL,
  `mailfloss_meta` text NOT NULL,
  PRIMARY KEY (`mailfloss_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;