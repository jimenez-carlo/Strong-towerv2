ALTER TABLE `strong_db`.`tbl_user_info` 
ADD COLUMN `city` INT NULL AFTER `medical_certificate`,
ADD COLUMN `barangay` INT NULL AFTER `city`;

UPDATE `strong_db`.`tbl_user_info` SET `city` = '015502', barangay = '015502002'
