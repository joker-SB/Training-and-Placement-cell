#create a database with name profile 
CREATE DATABASE profile;

#create  table named as admin

CREATE TABLE `profile`.`admin` ( 
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(255) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `image` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(32) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;
