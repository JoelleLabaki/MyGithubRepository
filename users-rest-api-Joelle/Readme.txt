This application is a php Rest ApI built using phalcon framework associated with wampserver .

--------------------------------------------------------------------------------------
* Implementing Phalcon framework under wampserver:
1-Download the latest version of php.
2-then download the suitable php_phalcon.dll file from http://phalconphp.com/download 
3-Enable php_phalcon extension in the php extensions.
4-In Apache modules enable rewrite_module (or mod_rewrite)
---------------------------------------------------------------------------------------

---------------------------------------------------------------------------------------
* for testing the REST API,Use Curl Commands:

//Retrieves all users
curl -i -X GET http://localhost/my-rest-api/               

//Retrieves users based on id primary key
curl -i -X GET http://localhost/my-rest-api/api/users/1    

//Creates a new user account
curl -i -X POST -d '{\"full_name\":\"Joe_black\",\"email\":\"joeblack@hotmail.com\",\"password\":\"apasswrd\",\"join_date\":\"sysdate()\"}'  http://localhost/my-rest-api/api/users

//Try to Create a new user account with an existing email
curl -i -X POST -d '{\"full_name\":\"Joe_black\",\"email\":\"joeblack@hotmail.com\",\"password\":\"apasswrd\",\"join_date\":\"sysdate()\"}'  http://localhost/my-rest-api/api/users
----------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------
* database schema/scripts :

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

----------------------------------------------------------------------------------------
