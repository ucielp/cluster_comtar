ALTER TABLE description ADD INDEX (  `locus_id` );
ALTER TABLE families ADD INDEX (  `locus_id` );

ALTER TABLE  `mirnas` ADD  `table_reference` VARCHAR( 30 ) NOT NULL;


--~ UPDATE `mirnas` SET `table_reference` = 'MIRNA_156_GACAGAAGAGAGTGAGCA' WHERE `mirnas`.`id` = 1; UPDATE `mirnas` SET `table_reference` = 'MIRNA_159_TTGGATTGAAGGGAGCTC' WHERE `mirnas`.`id` = 2; UPDATE `mirnas` SET `table_reference` = 'MIRNA_160_GCCTGGCTCCCTGTATGC' WHERE `mirnas`.`id` = 3; UPDATE `mirnas` SET `table_reference` = 'MIRNA_162_CGATAAACCTCTGCATCC' WHERE `mirnas`.`id` = 4; UPDATE `mirnas` SET `table_reference` = 'MIRNA_164_GGAGAAGCAGGGCACGTG' WHERE `mirnas`.`id` = 5; UPDATE `mirnas` SET `table_reference` = 'MIRNA_166_CGGACCAGGCTTCATTCC' WHERE `mirnas`.`id` = 6; UPDATE `mirnas` SET `table_reference` = 'MIRNA_167_GAAGCTGCCAGCATGATC' WHERE `mirnas`.`id` = 7; UPDATE `mirnas` SET `table_reference` = 'MIRNA_168_CGCTTGGTGCAGGTCGGG' WHERE `mirnas`.`id` = 8; UPDATE `mirnas` SET `table_reference` = 'MIRNA_169_AGCCAAGGATGACTTGCC' WHERE `mirnas`.`id` = 9; UPDATE `mirnas` SET `table_reference` = 'MIRNA_171_TTGAGCCGTGCCAATATC' WHERE `mirnas`.`id` = 10; UPDATE `mirnas` SET `table_reference` = 'MIRNA_172_GAATCTTGATGATGCTGC' WHERE `mirnas`.`id` = 11; UPDATE `mirnas` SET `table_reference` = 'MIRNA_319_TGGACTGAAGGGAGCTCC' WHERE `mirnas`.`id` = 12; UPDATE `mirnas` SET `table_reference` = 'MIRNA_390_AGCTCAGGAGGGATAGCG' WHERE `mirnas`.`id` = 13; UPDATE `mirnas` SET `table_reference` = 'MIRNA_393_CCAAAGGGATCGCATTGA' WHERE `mirnas`.`id` = 14; UPDATE `mirnas` SET `table_reference` = 'MIRNA_394_TGGCATTCTGTCCACCTC' WHERE `mirnas`.`id` = 15; UPDATE `mirnas` SET `table_reference` = 'MIRNA_395_TGAAGTGTTTGGGGGAAC' WHERE `mirnas`.`id` = 16; UPDATE `mirnas` SET `table_reference` = 'MIRNA_396_TCCACAGCTTTCTTGAAC' WHERE `mirnas`.`id` = 17; UPDATE `mirnas` SET `table_reference` = 'MIRNA_397_CATTGAGTGCAGCGTTGA' WHERE `mirnas`.`id` = 18; UPDATE `mirnas` SET `table_reference` = 'MIRNA_398_GTGTTCTCAGGTCACCCC' WHERE `mirnas`.`id` = 19; UPDATE `mirnas` SET `table_reference` = 'MIRNA_399_GCCAAAGGAGATTTGCCC' WHERE `mirnas`.`id` = 20; UPDATE `mirnas` SET `table_reference` = 'MIRNA_408_TGCACTGCCTCTTCCCTG' WHERE `mirnas`.`id` = 21; UPDATE `mirnas` SET `table_reference` = 'MIRNA_827_TAGATGACCATCAGCAAA' WHERE `mirnas`.`id` = 22;

DROP TABLE mirnas;

CREATE TABLE IF NOT EXISTS `mirnas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `sequence` varchar(50) NOT NULL,
  `table_reference` varchar(100) NOT NULL,
  `hyb_perf` FLOAT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `mirnas`
--

INSERT INTO `mirnas` (`name`, `sequence`, `table_reference`, hyb_perf) VALUES
('miR156', 'GACAGAAGAGAGTGAGCA', 'MIRNA_156_GACAGAAGAGAGTGAGCA', -37.5),
('miR159', 'TTGGATTGAAGGGAGCTC', 'MIRNA_159_TTGGATTGAAGGGAGCTC', -37.5),
('miR160', 'GCCTGGCTCCCTGTATGC', 'MIRNA_160_GCCTGGCTCCCTGTATGC', -37.5),
('miR162', 'CGATAAACCTCTGCATCC', 'MIRNA_162_CGATAAACCTCTGCATCC', -35.5),
('miR164', 'GGAGAAGCAGGGCACGTG', 'MIRNA_164_GGAGAAGCAGGGCACGTG', -41.8),
('miR166', 'CGGACCAGGCTTCATTCC', 'MIRNA_166_CGGACCAGGCTTCATTCC', -39.7),
('miR167', 'GAAGCTGCCAGCATGATC', 'MIRNA_167_GAAGCTGCCAGCATGATC', -38.5),
('miR168', 'CGCTTGGTGCAGGTCGGG', 'MIRNA_168_CGCTTGGTGCAGGTCGGG', -43),
('miR169', 'AGCCAAGGATGACTTGCC', 'MIRNA_169_AGCCAAGGATGACTTGCC', -39.2),
('miR171', 'TTGAGCCGTGCCAATATC', 'MIRNA_171_TTGAGCCGTGCCAATATC', -36.6),
('miR172', 'GAATCTTGATGATGCTGC', 'MIRNA_172_GAATCTTGATGATGCTGC', -34.1),
('miR319', 'TGGACTGAAGGGAGCTCC', 'MIRNA_319_TGGACTGAAGGGAGCTCC', -41.9),
('miR390', 'AGCTCAGGAGGGATAGCG', 'MIRNA_390_AGCTCAGGAGGGATAGCG', -41.3),
('miR393', 'CCAAAGGGATCGCATTGA', 'MIRNA_393_CCAAAGGGATCGCATTGA', -36.2),
('miR394', 'TGGCATTCTGTCCACCTC', 'MIRNA_394_TGGCATTCTGTCCACCTC', -39.5),
('miR395', 'TGAAGTGTTTGGGGGAAC', 'MIRNA_395_TGAAGTGTTTGGGGGAAC', -36.6),
('miR396', 'TCCACAGCTTTCTTGAAC', 'MIRNA_396_TCCACAGCTTTCTTGAAC', -34.5),
('miR397', 'CATTGAGTGCAGCGTTGA', 'MIRNA_397_CATTGAGTGCAGCGTTGA', -36),
('miR398', 'GTGTTCTCAGGTCACCCC', 'MIRNA_398_GTGTTCTCAGGTCACCCC', -40.6),
('miR399', 'GCCAAAGGAGATTTGCCC', 'MIRNA_399_GCCAAAGGAGATTTGCCC', -37.9),
('miR408', 'TGCACTGCCTCTTCCCTG', 'MIRNA_408_TGCACTGCCTCTTCCCTG', -41.4),
('miR827', 'TAGATGACCATCAGCAAA', 'MIRNA_827_TAGATGACCATCAGCAAA', -34.1);

DROP TABLE description;

--~ Cargar la tabla DB/functional_description.sql (ONLINE YA LA CARGUÉ)
--~ mysql -u uciel -p target3vu  < /home/uciel/lab/sitios/DB_and_old/functional_description.sql

--~ ESTO ES PARA adapat
--~ INSERT INTO `mirnas` (`name`, `sequence`, `table_reference`, hyb_perf) VALUES
--~ ('miR156', 'GACAGAAGAGAGTGAGCA', '156_GACAGAAGAGAGTGAGCA', -37.5),
--~ ('miR164', 'GGAGAAGCAGGGCACGTG', '164_GGAGAAGCAGGGCACGTG', -41.8),
--~ ('miR166', 'CGGACCAGGCTTCATTCC', '166_CGGACCAGGCTTCATTCC', -39.7),
--~ ('miR172', 'GAATCTTGATGATGCTGC', '172_GAATCTTGATGATGCTGC', -34.1),
--~ ('miR319', 'TGGACTGAAGGGAGCTCC', '319_TGGACTGAAGGGAGCTCC', -41.9),
--~ ('miR396', 'TCCACAGCTTTCTTGAAC', '396_TCCACAGCTTTCTTGAAC', -34.5),
--~ ('miR396osa', 'CCACAGGCTTTCTTGAAC', '396_OSA_TCCACAGCTTTCTTGAAC', -35.89),
--~ ('miR396shuffle', 'GATCTTCATTACGCTCCA', '396_SHUFFLE_GATCTTCATTACGCTCCA', -34.6);

--~ Esto lo debo hacer pero ya lo cambie en la definicion
ALTER TABLE  `mirnas` CHANGE  `name`  `name` VARCHAR( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL

--~ Le agrego group para poder elegirlas juntas
ALTER TABLE  `plants` ADD  `grupo` VARCHAR( 30 ) NOT NULL DEFAULT  'none';
--~ Chequear que sea OSativa, Bdistachyon, Pvirgatum, Sbicolor, Sitalica y Zmays
UPDATE  `patmatch_2013`.`plants` SET  `grupo` =  'Monocots' WHERE  `plants`.`id` =67;
UPDATE  `patmatch_2013`.`plants` SET  `grupo` =  'Monocots' WHERE  `plants`.`id` =88;
UPDATE  `patmatch_2013`.`plants` SET  `grupo` =  'Monocots' WHERE  `plants`.`id` =92;
UPDATE  `patmatch_2013`.`plants` SET  `grupo` =  'Monocots' WHERE  `plants`.`id` =95;
UPDATE  `patmatch_2013`.`plants` SET  `grupo` =  'Monocots' WHERE  `plants`.`id` =96;
UPDATE  `patmatch_2013`.`plants` SET  `grupo` =  'Monocots' WHERE  `plants`.`id` =104;



--
-- Table structure for table `gene_families_pfam`
--
DROP TABLE gene_families_pfam;

CREATE TABLE IF NOT EXISTS `gene_families_pfam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family` text NOT NULL,
  `locus_tag` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `locus_tag` (`locus_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--~ Esto lo hago para cargar la definicion de familia que saque de Pfam (con R)

LOAD DATA INFILE 'pfam_families.csv' INTO TABLE gene_families_pfam
  FIELDS TERMINATED BY ',' ENCLOSED BY '"'
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES;


ALTER TABLE  `mirnas` ADD  `conservation` TEXT NOT NULL
UPDATE mirnas SET conservation = 'Angiosperms';
