-- DROP DATABASE IF EXISTS `Sft_Eng` ;
CREATE SCHEMA IF NOT EXISTS `Sft_Eng` ;
USE `Sft_Eng` ;

-- -----------------------------------------------------
-- Table `Sft_Eng`.`Family_Group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sft_Eng`.`Family_Group` (
  `Group_ID` INT NOT NULL,
  `Street_Address` VARCHAR(50) NOT NULL,
  `City_Address` VARCHAR(50) NOT NULL,
  `State_Address` VARCHAR(50) NOT NULL,
  `ZIP_Address` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`Group_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sft_Eng`.`Account_Info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sft_Eng`.`Account_Info` (
  `Account_ID` INT NOT NULL,
  `First_Name` VARCHAR(50) NOT NULL,
  `Last_Name` VARCHAR(50) NOT NULL,
  `Email` VARCHAR(50) NOT NULL,
  `Phone_Number` CHAR(10) NOT NULL,
  `Account_Type` ENUM('Parent', 'Child', 'Guardian', 'Teacher') NOT NULL,
  `Gender` ENUM('Male', 'Female') NULL,
  `Group_ID` INT NOT NULL,
  PRIMARY KEY (`Account_ID`),
  CONSTRAINT `Account_Group`
    FOREIGN KEY (`Group_ID`)
    REFERENCES `Sft_Eng`.`Family_Group` (`Group_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sft_Eng`.`Location`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sft_Eng`.`Location` (
  `Account_ID` INT NOT NULL,
  `Time` DATETIME NOT NULL,
  `Longitude` FLOAT NOT NULL,
  `Latitude` FLOAT NOT NULL,
  `Status` ENUM('Urgent', 'Normal') NOT NULL,
  PRIMARY KEY (`Account_ID`, `Time`),
  CONSTRAINT `Location_Account`
    FOREIGN KEY (`Account_ID`)
    REFERENCES `Sft_Eng`.`Account_Info` (`Account_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
