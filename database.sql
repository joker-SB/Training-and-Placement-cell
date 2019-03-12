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

#create table named as jobpost

CREATE TABLE `profile`.`jobpost` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(255) NOT NULL ,
  `companyname` VARCHAR(255) NOT NULL ,
  `title` VARCHAR(255) NOT NULL ,
  `body` TEXT NOT NULL ,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;
