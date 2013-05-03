This is a php web application for users.


---------------------------
* database schema/scripts :
---------------------------

CREATE DATABASE IF NOT EXISTS users_db ;
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `join_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


