ALTER TABLE `strong_db`.`tbl_user` 
ADD COLUMN `active_flag` TINYINT(4) NULL DEFAULT 1 AFTER `access`;

CREATE TABLE `strong_db`.`refprovince` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `psgcCode` VARCHAR(255) NULL DEFAULT NULL,
  `provDesc` TEXT NULL DEFAULT NULL,
  `regCode` VARCHAR(255) NULL DEFAULT NULL,
  `provCode` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));

INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('1', '012800000', 'ILOCOS NORTE', '01', '0128');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('2', '012900000', 'ILOCOS SUR', '01', '0129');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('3', '013300000', 'LA UNION', '01', '0133');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('4', '015500000', 'PANGASINAN', '01', '0155');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('5', '020900000', 'BATANES', '02', '0209');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('6', '021500000', 'CAGAYAN', '02', '0215');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('7', '023100000', 'ISABELA', '02', '0231');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('8', '025000000', 'NUEVA VIZCAYA', '02', '0250');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('9', '025700000', 'QUIRINO', '02', '0257');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('10', '030800000', 'BATAAN', '03', '0308');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('11', '031400000', 'BULACAN', '03', '0314');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('12', '034900000', 'NUEVA ECIJA', '03', '0349');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('13', '035400000', 'PAMPANGA', '03', '0354');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('14', '036900000', 'TARLAC', '03', '0369');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('15', '037100000', 'ZAMBALES', '03', '0371');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('16', '037700000', 'AURORA', '03', '0377');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('17', '041000000', 'BATANGAS', '04', '0410');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('18', '042100000', 'CAVITE', '04', '0421');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('19', '043400000', 'LAGUNA', '04', '0434');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('20', '045600000', 'QUEZON', '04', '0456');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('21', '045800000', 'RIZAL', '04', '0458');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('22', '174000000', 'MARINDUQUE', '17', '1740');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('23', '175100000', 'OCCIDENTAL MINDORO', '17', '1751');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('24', '175200000', 'ORIENTAL MINDORO', '17', '1752');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('25', '175300000', 'PALAWAN', '17', '1753');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('26', '175900000', 'ROMBLON', '17', '1759');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('27', '050500000', 'ALBAY', '05', '0505');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('28', '051600000', 'CAMARINES NORTE', '05', '0516');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('29', '051700000', 'CAMARINES SUR', '05', '0517');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('30', '052000000', 'CATANDUANES', '05', '0520');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('31', '054100000', 'MASBATE', '05', '0541');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('32', '056200000', 'SORSOGON', '05', '0562');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('33', '060400000', 'AKLAN', '06', '0604');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('34', '060600000', 'ANTIQUE', '06', '0606');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('35', '061900000', 'CAPIZ', '06', '0619');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('36', '063000000', 'ILOILO', '06', '0630');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('37', '064500000', 'NEGROS OCCIDENTAL', '06', '0645');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('38', '067900000', 'GUIMARAS', '06', '0679');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('39', '071200000', 'BOHOL', '07', '0712');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('40', '072200000', 'CEBU', '07', '0722');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('41', '074600000', 'NEGROS ORIENTAL', '07', '0746');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('42', '076100000', 'SIQUIJOR', '07', '0761');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('43', '082600000', 'EASTERN SAMAR', '08', '0826');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('44', '083700000', 'LEYTE', '08', '0837');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('45', '084800000', 'NORTHERN SAMAR', '08', '0848');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('46', '086000000', 'SAMAR (WESTERN SAMAR)', '08', '0860');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('47', '086400000', 'SOUTHERN LEYTE', '08', '0864');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('48', '087800000', 'BILIRAN', '08', '0878');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('49', '097200000', 'ZAMBOANGA DEL NORTE', '09', '0972');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('50', '097300000', 'ZAMBOANGA DEL SUR', '09', '0973');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('51', '098300000', 'ZAMBOANGA SIBUGAY', '09', '0983');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('52', '099700000', 'CITY OF ISABELA', '09', '0997');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('53', '101300000', 'BUKIDNON', '10', '1013');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('54', '101800000', 'CAMIGUIN', '10', '1018');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('55', '103500000', 'LANAO DEL NORTE', '10', '1035');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('56', '104200000', 'MISAMIS OCCIDENTAL', '10', '1042');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('57', '104300000', 'MISAMIS ORIENTAL', '10', '1043');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('58', '112300000', 'DAVAO DEL NORTE', '11', '1123');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('59', '112400000', 'DAVAO DEL SUR', '11', '1124');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('60', '112500000', 'DAVAO ORIENTAL', '11', '1125');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('61', '118200000', 'COMPOSTELA VALLEY', '11', '1182');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('62', '118600000', 'DAVAO OCCIDENTAL', '11', '1186');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('63', '124700000', 'COTABATO (NORTH COTABATO)', '12', '1247');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('64', '126300000', 'SOUTH COTABATO', '12', '1263');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('65', '126500000', 'SULTAN KUDARAT', '12', '1265');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('66', '128000000', 'SARANGANI', '12', '1280');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('67', '129800000', 'COTABATO CITY', '12', '1298');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('68', '133900000', 'NCR, CITY OF MANILA, FIRST DISTRICT', '13', '1339');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('70', '137400000', 'NCR, SECOND DISTRICT', '13', '1374');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('71', '137500000', 'NCR, THIRD DISTRICT', '13', '1375');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('72', '137600000', 'NCR, FOURTH DISTRICT', '13', '1376');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('73', '140100000', 'ABRA', '14', '1401');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('74', '141100000', 'BENGUET', '14', '1411');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('75', '142700000', 'IFUGAO', '14', '1427');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('76', '143200000', 'KALINGA', '14', '1432');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('77', '144400000', 'MOUNTAIN PROVINCE', '14', '1444');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('78', '148100000', 'APAYAO', '14', '1481');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('79', '150700000', 'BASILAN', '15', '1507');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('80', '153600000', 'LANAO DEL SUR', '15', '1536');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('81', '153800000', 'MAGUINDANAO', '15', '1538');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('82', '156600000', 'SULU', '15', '1566');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('83', '157000000', 'TAWI-TAWI', '15', '1570');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('84', '160200000', 'AGUSAN DEL NORTE', '16', '1602');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('85', '160300000', 'AGUSAN DEL SUR', '16', '1603');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('86', '166700000', 'SURIGAO DEL NORTE', '16', '1667');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('87', '166800000', 'SURIGAO DEL SUR', '16', '1668');
INSERT INTO `strong_db`.`refprovince` (`id`, `psgcCode`, `provDesc`, `regCode`, `provCode`) VALUES ('88', '168500000', 'DINAGAT ISLANDS', '16', '1685');


DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015501');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015502');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015503');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015504');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015505');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015506');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015507');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015508');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015509');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015510');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015511');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015512');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015513');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015514');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015515');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015516');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015517');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015518');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015519');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015520');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015521');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015522');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015523');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015524');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015525');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015526');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015527');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015528');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015529');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015530');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015531');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015532');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015533');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015534');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015535');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015536');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015537');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015538');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015539');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015540');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015541');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015542');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015543');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015544');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015545');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015546');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015547');
DELETE FROM `strong_db`.`tbl_city` WHERE (`id` = '015548');

ALTER TABLE `strong_db`.`tbl_city` 
ADD COLUMN `province_id` VARCHAR(45) NULL AFTER `CreatedDate`;

insert into tbl_city(`name`, `id`, `province_id`) SELECT citymunDesc,citymunCode,provCode  from refcitymun;

ALTER TABLE `strong_db`.`tbl_branch` 
ADD COLUMN `province` VARCHAR(45) NULL DEFAULT '0155' AFTER `barangay`;

DELETE FROM tbl_barangay;
insert into tbl_barangay (id,`name`,city_id) SELECT brgyCode,brgyDesc,citymunCode from refbrgy;

ALTER TABLE `strong_db`.`tbl_user_info` 
ADD COLUMN `province` VARCHAR(45) NULL AFTER `weight`;

ALTER TABLE `strong_db`.`tbl_category` 
RENAME TO  `strong_db`.`tbl_body_part` ;

CREATE TABLE `strong_db`.`tbl_category` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `deleted_flag` INT(11) NULL DEFAULT 0,
  `branch_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));

ALTER TABLE `strong_db`.`tbl_workout` 
ADD COLUMN `body_part_id` INT NULL DEFAULT 1 AFTER `branch_id`;
