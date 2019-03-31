#create a database with name profile 
CREATE DATABASE profile;

#create  table named as admin to register the admin of this  website

CREATE TABLE `profile`.`admin` ( 
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(255) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `image` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(32) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

#create table named as jobpost to store job posts created  by recruiters 

CREATE TABLE `profile`.`jobpost` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(255) NOT NULL ,
  `companyname` VARCHAR(255) NOT NULL ,
  `title` VARCHAR(255) NOT NULL ,
  `body` TEXT NOT NULL ,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;


#create table named as poregister  to register the placement officer
CREATE TABLE `profile`.`poregister`( 
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(255) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(32) NOT NULL , 
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;


#create table post to store all the post posted by students and placement officers,but we retrive them as
a seperate post using some logics in sql code

CREATE TABLE `profile`.`post`( 
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(255) NOT NULL ,
  `category` VARCHAR(255) NOT NULL ,
  `title` VARCHAR(255) NOT NULL ,
  `body` TEXT NOT NULL ,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;


#create table named as recruiter to register recruiters with the company name

CREATE TABLE `profile`.`recruiter` (
  `id` INT(5) NOT NULL AUTO_INCREMENT , 
  `username` VARCHAR(255) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `companyname` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;



#create table named as recruiterprofile  to store the profile of recruiters so that when a recruiter login with his
userid and password we can display his profile also on the home page

CREATE TABLE `profile`.`recruiterprofile` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(255) NOT NULL ,
  `companyname` VARCHAR(255) NOT NULL ,
  `contactnumber` VARCHAR(13) NOT NULL ,
  `image` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;


#create table named as register to register  the students

CREATE TABLE `profile`.`register` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(255) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(32) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

#create table userprofile to store profile of all the students

CREATE TABLE `profile`.`userprofile` (
  `id` INT(5) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(255) NOT NULL ,
  `intro` VARCHAR(255) NOT NULL ,
  `skills` VARCHAR(255) NOT NULL ,
  `image` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;


#create a tabled named as job_apply to store the detail of the person who applied for the job
CREATE TABLE `profile`.`job_apply` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `job_id` INT(11) NOT NULL ,
  `companyname` VARCHAR(255) NOT NULL ,
  `username` VARCHAR(255) NOT NULL , 
  `status` VARCHAR(255) NOT NULL ,
  `applied_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;




