-- MySQL Script generated by MySQL Workbench
-- Fri Aug 17 18:45:19 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bcg
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bcg
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bcg` DEFAULT CHARACTER SET utf8 ;
USE `bcg` ;

-- -----------------------------------------------------
-- Table `bcg`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bcg`.`User` ;

CREATE TABLE IF NOT EXISTS `bcg`.`User` (
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(15) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`username`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bcg`.`Book`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bcg`.`Book` ;

CREATE TABLE IF NOT EXISTS `bcg`.`Book` (
  `buch_id` INT NOT NULL AUTO_INCREMENT,
  `isbn13` VARCHAR(13) UNIQUE,
  `titel` VARCHAR(250) NULL,
  `autor` VARCHAR(300) NULL,
  `verlag` VARCHAR(45) NULL,
  `bild` VARCHAR(45) NULL,
  PRIMARY KEY (`buch_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bcg`.`Userbook`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bcg`.`Userbook` ;

CREATE TABLE IF NOT EXISTS `bcg`.`Userbook` (
  `username` VARCHAR(50) NOT NULL,
  `buch_id` INT NOT NULL,
  `bewertung` INT NULL,
  `status` INT NULL,
  PRIMARY KEY (`username`, `buch_id`),
  INDEX `fk_Userbook_Book1_idx` (`buch_id` ASC),
  CONSTRAINT `fk_Userbook_User`
    FOREIGN KEY (`username`)
    REFERENCES `bcg`.`User` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Userbook_Book1`
    FOREIGN KEY (`buch_id`)
    REFERENCES `bcg`.`Book` (`buch_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
