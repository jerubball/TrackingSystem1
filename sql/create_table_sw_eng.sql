-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema Child_Tracker
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Child_Tracker
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Child_Tracker` ;
USE `Child_Tracker` ;

-- -----------------------------------------------------
-- Table `Child_Tracker`.`family_group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Child_Tracker`.`family_group` (
  `Group_ID` INT NOT NULL AUTO_INCREMENT,
  `Street_Address` VARCHAR(100) NOT NULL,
  `City_Address` VARCHAR(100) NOT NULL,
  `State_Address` VARCHAR(100) NOT NULL,
  `Zip_Address` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Group_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Child_Tracker`.`account_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Child_Tracker`.`account_info` (
  `Account_ID` INT NOT NULL AUTO_INCREMENT,
  `Account_Token` TEXT UNIQUE NULL,
  `First_Name` VARCHAR(100) NULL,
  `Last_Name` VARCHAR(100) NULL,
  `Email` VARCHAR(100) NOT NULL,
  `Group_ID` INT NOT NULL,
  `Gender` ENUM('Male', 'Female') NULL,
  `Account_Type` ENUM('Parent', 'Child') NOT NULL,
  PRIMARY KEY (`Account_ID`),
  INDEX `Group_ID_idx` (`Group_ID` ASC),
  CONSTRAINT `Group_ID`
    FOREIGN KEY (`Group_ID`)
    REFERENCES `Child_Tracker`.`family_group` (`Group_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Child_Tracker`.`location`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Child_Tracker`.`location` (
  `Time` DATETIME NOT NULL,
  `Longitude` FLOAT NOT NULL,
  `Latitude` FLOAT NOT NULL,
  `Status` ENUM('Normal', 'Emergency') NOT NULL,
  `Account_ID` INT NOT NULL,
  PRIMARY KEY (`Time`, `Account_ID`),
  INDEX `Account_ID_idx` (`Account_ID` ASC),
  CONSTRAINT `Account_ID`
    FOREIGN KEY (`Account_ID`)
    REFERENCES `Child_Tracker`.`account_info` (`Account_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;