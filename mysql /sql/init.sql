DROP SCHEMA IF EXISTS users;
CREATE SCHEMA users;
USE users;

DROP TABLE IF EXISTS `loginTest`;
CREATE TABLE `loginTest`(
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
);

INSERT INTO `loginTest`(`email`, `name` ,`password`) VALUES
('test@com' , '瑛貴' ,'password1'),
('test2@com' , 'かんた' , 'password2');

