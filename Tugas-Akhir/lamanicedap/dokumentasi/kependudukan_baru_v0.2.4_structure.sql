/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.5.35-1ubuntu1 : Database - kependudukan_lebih_baru
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kependudukan_lebih_baru` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kependudukan_lebih_baru`;

/*Table structure for table `biodata_wni` */

DROP TABLE IF EXISTS `biodata_wni`;

CREATE TABLE `biodata_wni` (
  `NIK` bigint(16) unsigned NOT NULL DEFAULT '0',
  `TGL_CTK_KTP` date DEFAULT NULL,
  `NO_PASPOR` varchar(30) DEFAULT NULL,
  `TGL_AKH_PASPOR` date DEFAULT NULL,
  `STATUS_WRG_NGR` tinyint(1) unsigned DEFAULT NULL,
  `NAMA_LGKP` varchar(60) NOT NULL DEFAULT '',
  `JENIS_KLMN` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `TEMPAT_LHR` varchar(60) NOT NULL DEFAULT '',
  `TGL_LHR` date NOT NULL DEFAULT '0000-01-01',
  `AKTA_LHR` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `NO_AKTA_LHR` varchar(40) DEFAULT NULL,
  `GOL_DRH` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `AGAMA` tinyint(1) unsigned DEFAULT NULL,
  `PDDK_AKH` tinyint(2) unsigned DEFAULT NULL,
  `PDDK_SKRG` tinyint(2) unsigned DEFAULT NULL,
  `KODE_PDDK_SKRG` bigint(16) DEFAULT NULL,
  `JENIS_PKRJN` tinyint(2) unsigned DEFAULT NULL,
  `STAT_KWN` tinyint(1) unsigned DEFAULT NULL,
  `AKTA_KWN` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `NO_AKTA_KWN` varchar(40) DEFAULT NULL,
  `TGL_KWN` date DEFAULT NULL,
  `AKTA_CRAI` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `NO_AKTA_CRAI` varchar(40) DEFAULT NULL,
  `TGL_CRAI` date DEFAULT NULL,
  `AKTA_KMTN` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `NO_AKTA_KMTN` varchar(40) DEFAULT NULL,
  `TGL_KMTN` date DEFAULT NULL,
  `NO_KK` bigint(16) unsigned DEFAULT NULL,
  `STATUS_HDK` tinyint(2) unsigned DEFAULT NULL,
  `NIK_AYAH` bigint(16) unsigned DEFAULT NULL,
  `NAMA_LGKP_AYAH` text,
  `NIK_IBU` bigint(16) unsigned DEFAULT NULL,
  `NAMA_LGKP_IBU` text,
  `STATUS_BK` tinyint(2) unsigned DEFAULT NULL,
  `NO_TELP` varchar(14) DEFAULT NULL,
  `EMAIL` varchar(60) DEFAULT NULL,
  `ALAMAT` text,
  `RT` tinyint(3) unsigned DEFAULT NULL,
  `RW` tinyint(3) unsigned DEFAULT NULL,
  `NO_KEL` smallint(4) unsigned DEFAULT NULL,
  `NO_KEC` tinyint(2) unsigned DEFAULT NULL,
  `NO_KABKOT` tinyint(2) unsigned DEFAULT NULL,
  `NO_PROP` tinyint(2) unsigned DEFAULT NULL,
  `KODE_POS` smallint(5) unsigned DEFAULT NULL,
  `ALAMAT_SEB` text,
  `TGL_UBAH_TRKHR` date DEFAULT NULL,
  `NIP_PET` bigint(18) unsigned DEFAULT NULL,
  `STATUS_KTP` tinyint(1) unsigned DEFAULT NULL,
  `FLAG` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`NIK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `data_kelahiran` */

DROP TABLE IF EXISTS `data_kelahiran`;

CREATE TABLE `data_kelahiran` (
  `REG_TX_LHR` char(18) NOT NULL,
  `NO_KET_RSPUS` varchar(24) DEFAULT NULL,
  `NIK_IBU` bigint(16) unsigned DEFAULT NULL,
  `TGL_UBAH_TRKHR` date DEFAULT NULL,
  `IFLAG` tinyint(1) unsigned DEFAULT '0',
  `NIP_VERIF_KEL` bigint(18) unsigned DEFAULT NULL,
  `NIP_VERIF_DUKCAPIL_1` bigint(18) unsigned DEFAULT NULL,
  `NIP_VERIF_DUKCAPIL_2` bigint(18) unsigned DEFAULT NULL,
  `KET_ALASAN` text,
  PRIMARY KEY (`REG_TX_LHR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `data_kelahiran_pus` */

DROP TABLE IF EXISTS `data_kelahiran_pus`;

CREATE TABLE `data_kelahiran_pus` (
  `NO_KET_PUS` char(22) NOT NULL,
  `KODE_PUS` int(10) unsigned DEFAULT NULL,
  `DARI_BIDAN_LUAR` tinyint(1) unsigned DEFAULT NULL,
  `NAMA_BIDAN` varchar(60) DEFAULT NULL,
  `NIK_AYAH_LHR` bigint(16) unsigned DEFAULT NULL,
  `NIK_IBU_LHR` bigint(16) unsigned DEFAULT NULL,
  `NAMA_ANAK` varchar(60) DEFAULT NULL,
  `JENIS_KEL_ANAK` tinyint(1) unsigned DEFAULT NULL,
  `TGL_LHR_ANAK` date DEFAULT NULL,
  `JAM_LHR_ANAK` time DEFAULT NULL,
  `BERAT_ANAK` int(5) unsigned DEFAULT NULL,
  `PANJANG_ANAK` int(3) unsigned DEFAULT NULL,
  `TGL_ISI_PUS` date DEFAULT NULL,
  `KET_BIDAN_LUAR` text,
  PRIMARY KEY (`NO_KET_PUS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `data_kelahiran_rs` */

DROP TABLE IF EXISTS `data_kelahiran_rs`;

CREATE TABLE `data_kelahiran_rs` (
  `NO_KET_RS` char(19) NOT NULL,
  `KODE_RS` int(7) unsigned DEFAULT NULL,
  `LHR_DRI_LUAR` tinyint(1) unsigned DEFAULT '0',
  `NAMA_DOKTER` varchar(60) DEFAULT NULL,
  `NIK_AYAH_LHR` bigint(16) unsigned DEFAULT NULL,
  `NIK_IBU_LHR` bigint(16) unsigned DEFAULT NULL,
  `NAMA_ANAK` varchar(60) DEFAULT NULL,
  `JENIS_KEL_ANAK` tinyint(1) unsigned DEFAULT NULL,
  `TGL_LHR_ANAK` date DEFAULT NULL,
  `JAM_LHR_ANAK` time DEFAULT NULL,
  `BERAT_ANAK` int(5) unsigned DEFAULT NULL,
  `PANJANG_ANAK` int(3) unsigned DEFAULT NULL,
  `TGL_ISI_RS` date DEFAULT NULL,
  `KET_LHR_DRI_LUAR` text,
  PRIMARY KEY (`NO_KET_RS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `data_keluarga` */

DROP TABLE IF EXISTS `data_keluarga`;

CREATE TABLE `data_keluarga` (
  `NO_KK` bigint(16) unsigned NOT NULL DEFAULT '0',
  `NAMA_KEP` varchar(60) DEFAULT NULL,
  `ALAMAT` varchar(120) DEFAULT NULL,
  `NO_RT` tinyint(3) unsigned zerofill DEFAULT NULL,
  `NO_RW` tinyint(3) unsigned zerofill DEFAULT NULL,
  `DUSUN` varchar(60) DEFAULT NULL,
  `KODE_POS` mediumint(5) unsigned DEFAULT NULL,
  `TELP` varchar(30) DEFAULT NULL,
  `ALS_PRMOHON` tinyint(1) unsigned DEFAULT NULL,
  `ALS_NUMPANG` tinyint(1) unsigned DEFAULT NULL,
  `NO_PROP` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `NO_KAB` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `NO_KEC` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `NO_KEL` smallint(4) unsigned NOT NULL DEFAULT '0',
  `USERID` bigint(10) unsigned DEFAULT NULL,
  `TGL_INSERTION` date DEFAULT NULL,
  `TGL_UPDATION` date DEFAULT NULL,
  `PFLAG` char(1) DEFAULT 'N',
  `CFLAG` char(1) DEFAULT 'N',
  PRIMARY KEY (`NO_KK`),
  KEY `idx_bio_01` (`NO_PROP`,`NO_KAB`,`NO_KEC`,`NO_KEL`),
  KEY `idx_bio_02` (`NO_PROP`,`NO_KAB`,`NO_KEC`),
  KEY `idx_bio_03` (`NO_PROP`,`NO_KAB`),
  KEY `idx_bio_04` (`NO_PROP`),
  KEY `idx_bio_05` (`NO_KAB`),
  KEY `idx_bio_06` (`NO_KEC`),
  KEY `idx_bio_07` (`NO_KEL`),
  KEY `idx_bio_08` (`NO_KEC`,`NO_KEL`),
  KEY `idx_drt_09` (`ALAMAT`,`NO_RT`,`NO_RW`,`DUSUN`),
  KEY `idx_drt_10` (`ALAMAT`),
  KEY `idx_drt_11` (`NO_RT`),
  KEY `idx_drt_12` (`NO_RW`),
  KEY `idx_drt_13` (`DUSUN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `data_kematian` */

DROP TABLE IF EXISTS `data_kematian`;

CREATE TABLE `data_kematian` (
  `NIK` int(16) NOT NULL,
  PRIMARY KEY (`NIK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `data_pemerintah` */

DROP TABLE IF EXISTS `data_pemerintah`;

CREATE TABLE `data_pemerintah` (
  `USERNAME` varchar(20) NOT NULL,
  `NO_IDNT` int(10) unsigned NOT NULL,
  `KATA_KUNCI` varchar(60) NOT NULL,
  `NAMA_INST_INDIV` varchar(50) DEFAULT NULL,
  `JNS_INST_INDIV` tinyint(1) NOT NULL DEFAULT '0',
  `ALMT_INST_INDIV` text,
  `NO_TELP_INST_INDIV` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`USERNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `mst_group` */

DROP TABLE IF EXISTS `mst_group`;

CREATE TABLE `mst_group` (
  `TGROUP` char(2) NOT NULL DEFAULT '-',
  `ID` char(2) NOT NULL DEFAULT '-',
  `KETERANGAN` varchar(50) DEFAULT '',
  PRIMARY KEY (`TGROUP`,`ID`),
  KEY `NewIndex` (`KETERANGAN`),
  KEY `NewIndex1` (`TGROUP`,`KETERANGAN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `mst_kecamatan` */

DROP TABLE IF EXISTS `mst_kecamatan`;

CREATE TABLE `mst_kecamatan` (
  `NO_PROP` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `NO_KAB` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `NO_KEC` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `NAMA` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`NO_PROP`,`NO_KAB`,`NO_KEC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `mst_kota` */

DROP TABLE IF EXISTS `mst_kota`;

CREATE TABLE `mst_kota` (
  `NO_PROP` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `NO_KAB` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `NAMA` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`NO_PROP`,`NO_KAB`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `mst_propinsi` */

DROP TABLE IF EXISTS `mst_propinsi`;

CREATE TABLE `mst_propinsi` (
  `NO_PROP` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `NAMA` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`NO_PROP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `pindah_penduduk` */

DROP TABLE IF EXISTS `pindah_penduduk`;

CREATE TABLE `pindah_penduduk` (
  `NO_SURAT_PNDH` varchar(16) NOT NULL,
  `NIK` bigint(16) unsigned DEFAULT NULL,
  `KODE_DESA_ASL` smallint(4) unsigned DEFAULT NULL,
  `KODE_DESA_TJN` smallint(4) unsigned DEFAULT NULL,
  `TGL_PINDAH` date DEFAULT NULL,
  `KODE_ALASAN_PNDH` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`NO_SURAT_PNDH`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Function  structure for function  `getMaxAktaNumber` */

/*!50003 DROP FUNCTION IF EXISTS `getMaxAktaNumber` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`139.194.163.180` FUNCTION `getMaxAktaNumber`(sNO_KET_RSPUS VARCHAR(22), sJNS_SURAKTA TINYINT(2)) RETURNS varchar(4) CHARSET latin1
BEGIN
    DECLARE nMax SMALLINT(4); 
	SET nMax =  (SELECT MAX(SUBSTR(REG_TX_LHR,15,4))
			FROM data_kelahiran
			WHERE REG_TX_LHR LIKE CONCAT(getRegAktaNumber(sNO_KET_RSPUS,sJNS_SURAKTA),"%"));
    RETURN nMax;
END */$$
DELIMITER ;

/* Function  structure for function  `getMaxNIKNumber` */

/*!50003 DROP FUNCTION IF EXISTS `getMaxNIKNumber` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`kependudukan`@`%` FUNCTION `getMaxNIKNumber`(sNO_KET_RSPUS VARCHAR(22), sJNS_SURAKTA TINYINT(2)) RETURNS varchar(4) CHARSET latin1
BEGIN
    DECLARE nMax SMALLINT(4); 
	SET nMax =  (SELECT MAX(SUBSTR(NIK,13,4))
			FROM biodata_wni
			WHERE NIK LIKE CONCAT(getNIKNumber(sNO_KET_RSPUS,sJNS_SURAKTA),"%"));
    RETURN nMax;
END */$$
DELIMITER ;

/* Function  structure for function  `getMaxRSPusNumber` */

/*!50003 DROP FUNCTION IF EXISTS `getMaxRSPusNumber` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`139.194.163.180` FUNCTION `getMaxRSPusNumber`(sNO_IDNT BIGINT(10) UNSIGNED, sJNS_SURAKTA TINYINT(2), sUSERNAME VARCHAR(20)) RETURNS varchar(4) CHARSET latin1
BEGIN
    DECLARE nMax SMALLINT(4); 
	IF sJNS_SURAKTA = 1 THEN
		SET nMax =  (SELECT MAX(SUBSTR(NO_KET_RS,16,4))
				FROM data_kelahiran_rs
				WHERE NO_KET_RS LIKE CONCAT(getRegRSPusNumber(sNO_IDNT,sJNS_SURAKTA,sUSERNAME),"%"));
	ELSEIF sJNS_SURAKTA = 2 THEN
		SET nMax =  (SELECT MAX(SUBSTR(NO_KET_PUS,19,4))
				FROM data_kelahiran_pus
				WHERE NO_KET_PUS LIKE CONCAT(getRegRSPusNumber(sNO_IDNT,sJNS_SURAKTA,sUSERNAME),"%"));
	END IF;
    RETURN nMax;
END */$$
DELIMITER ;

/* Function  structure for function  `getNIKNumber` */

/*!50003 DROP FUNCTION IF EXISTS `getNIKNumber` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`kependudukan`@`%` FUNCTION `getNIKNumber`(sNO_KET_RSPUS VARCHAR(22), sJNS_SURAKTA TINYINT(2)) RETURNS varchar(30) CHARSET latin1
BEGIN
	DECLARE nRegNum VARCHAR(30);
		IF sJNS_SURAKTA = 1 THEN
			SET nRegNum =  (SELECT CONCAT(bw.NO_PROP,bw.NO_KABKOT,bw.NO_KEC,SUBSTR(dkr.TGL_LHR_ANAK,9,2),SUBSTR(dkr.TGL_LHR_ANAK,6,2),SUBSTR(dkr.TGL_LHR_ANAK,3,2))
					FROM biodata_wni bw, data_kelahiran_rs dkr
					WHERE bw.NIK = dkr.NIK_IBU_LHR
						AND dkr.NO_KET_RS = sNO_KET_RSPUS);
		ELSEIF sJNS_SURAKTA = 2 THEN
			SET nRegNum =  (SELECT CONCAT(bw.NO_PROP,bw.NO_KABKOT,bw.NO_KEC,SUBSTR(dkp.TGL_LHR_ANAK,9,2),SUBSTR(dkp.TGL_LHR_ANAK,6,2),SUBSTR(dkp.TGL_LHR_ANAK,3,2))
					FROM biodata_wni bw, data_kelahiran_pus dkp
					WHERE bw.NIK = dkp.NIK_IBU_LHR
						AND dkp.NO_KET_PUS = sNO_KET_RSPUS);
		END IF;
	RETURN nRegNum;
END */$$
DELIMITER ;

/* Function  structure for function  `getRegAktaNumber` */

/*!50003 DROP FUNCTION IF EXISTS `getRegAktaNumber` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`139.194.163.180` FUNCTION `getRegAktaNumber`(sNO_KET_RSPUS VARCHAR(22), sJNS_SURAKTA TINYINT(2)) RETURNS varchar(30) CHARSET latin1
BEGIN
	DECLARE nRegNum VARCHAR(30);
		IF sJNS_SURAKTA = 1 THEN
			SET nRegNum =  (SELECT CONCAT(bw.NO_KEC,bw.NO_KEL,"03",SUBSTR(CURDATE(),9,2),SUBSTR(CURDATE(),6,2),SUBSTR(CURDATE(),3,2))
					FROM biodata_wni bw, data_kelahiran_rs dkr
					WHERE bw.NIK = dkr.NIK_IBU_LHR
						AND dkr.NO_KET_RS = sNO_KET_RSPUS);
		ELSEIF sJNS_SURAKTA = 2 THEN
			SET nRegNum =  (SELECT CONCAT(bw.NO_KEC,bw.NO_KEL,"03",SUBSTR(CURDATE(),9,2),SUBSTR(CURDATE(),6,2),SUBSTR(CURDATE(),3,2))
					FROM biodata_wni bw, data_kelahiran_pus dkp
					WHERE bw.NIK = dkp.NIK_IBU_LHR
						AND dkp.NO_KET_PUS = sNO_KET_RSPUS);
		END IF;
	RETURN nRegNum;
END */$$
DELIMITER ;

/* Function  structure for function  `getRegRSPusNumber` */

/*!50003 DROP FUNCTION IF EXISTS `getRegRSPusNumber` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`139.194.163.180` FUNCTION `getRegRSPusNumber`(sNO_IDNT BIGINT(10) UNSIGNED, sJNS_SURAKTA TINYINT(2), sUSERNAME varchar(20)) RETURNS varchar(30) CHARSET latin1
BEGIN
    DECLARE nRegNum VARCHAR(30); 
    SET nRegNum =  (SELECT CONCAT(NO_IDNT,LPAD(sJNS_SURAKTA,2,"0"),SUBSTR(CURDATE(),9,2),SUBSTR(CURDATE(),6,2),SUBSTR(CURDATE(),3,2))
                          FROM data_pemerintah
                          WHERE NO_IDNT = sNO_IDNT 
				AND USERNAME = sUSERNAME);
    RETURN nRegNum;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_setAktaRegNum` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_setAktaRegNum` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`kependudukan`@`%` PROCEDURE `sp_setAktaRegNum`(sNO_KET_RSPUS VARCHAR(22), sNIK_IBU BIGINT(16) UNSIGNED, sJNS_SURAKTA TINYINT(2))
BEGIN
    DECLARE maxNum SMALLINT(4);
    SET maxNum =  getMaxAktaNumber(sNO_KET_RSPUS, sJNS_SURAKTA);
    IF maxNum IS NULL THEN
        INSERT INTO data_kelahiran (REG_TX_LHR, NO_KET_RSPUS, NIK_IBU, TGL_UBAH_TRKHR)
        VALUES (CONCAT(getRegAktaNumber(sNO_KET_RSPUS, sJNS_SURAKTA),"0001"), sNO_KET_RSPUS, sNIK_IBU, CURDATE());
    ELSEIF maxNum IS NOT NULL THEN
        INSERT INTO data_kelahiran (REG_TX_LHR, NO_KET_RSPUS, TGL_UBAH_TRKHR)
        VALUES (CONCAT(getRegAktaNumber(sNO_KET_RSPUS, sJNS_SURAKTA),LPAD(maxNum+1, 4, "0")), sNO_KET_RSPUS, sNIK_IBU, CURDATE());
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_setNIKNum` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_setNIKNum` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`kependudukan`@`%` PROCEDURE `sp_setNIKNum`(sNO_KET_RSPUS VARCHAR(22), sJNS_SURAKTA TINYINT(2))
BEGIN
    DECLARE maxNum SMALLINT(4);
    SET maxNum =  getMaxNIKNumber(sNO_KET_RSPUS, sJNS_SURAKTA);
    IF maxNum IS NULL THEN
        INSERT INTO biodata_wni (NIK)
        VALUES (CONCAT(getNIKNumber(sNO_KET_RSPUS, sJNS_SURAKTA),"0001"));
    ELSEIF maxNum IS NOT NULL THEN
        INSERT INTO biodata_wni (NIK)
        VALUES (CONCAT(getNIKNumber(sNO_KET_RSPUS, sJNS_SURAKTA),LPAD(maxNum+1, 4, "0")));
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_setRSPusRegNum` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_setRSPusRegNum` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`139.194.163.180` PROCEDURE `sp_setRSPusRegNum`(sNO_IDNT BIGINT(10) UNSIGNED,  
              sJNS_SURAKTA TINYINT(2) UNSIGNED, sUSERNAME VARCHAR(20), sLHR_DRI_LUAR TINYINT(1) UNSIGNED, sNAMA_DOKTER VARCHAR(60), sNIK_AYAH BIGINT(16) UNSIGNED, sNIK_IBU BIGINT(16) UNSIGNED, sNAMA_ANAK VARCHAR(60), sJENIS_KEL TINYINT(1) UNSIGNED, sTGL_LHR DATE, sJAM_LHR TIME, sBERAT INT(5) UNSIGNED, sPANJANG INT(5) UNSIGNED, sKET TEXT)
BEGIN
    DECLARE maxNum SMALLINT(4);
    SET maxNum =  getMaxRSPusNumber(sNO_IDNT, sJNS_SURAKTA, sUSERNAME);
    IF maxNum IS NULL AND sJNS_SURAKTA = 1 THEN
        INSERT INTO data_kelahiran_rs (NO_KET_RS, KODE_RS, LHR_DRI_LUAR, NAMA_DOKTER, NIK_AYAH_LHR, NIK_IBU_LHR, NAMA_ANAK, JENIS_KEL_ANAK, TGL_LHR_ANAK, JAM_LHR_ANAK, BERAT_ANAK, PANJANG_ANAK, TGL_ISI_RS, KET_LHR_DRI_LUAR)
        VALUES (CONCAT(getRegRSPusNumber(sNO_IDNT, sJNS_SURAKTA, sUSERNAME),"0001"), sNO_IDNT, sLHR_DRI_LUAR, sNAMA_DOKTER, sNIK_AYAH, sNIK_IBU, sNAMA_ANAK, sJENIS_KEL, sTGL_LHR, sJAM_LHR, sBERAT, sPANJANG, CURDATE(), sKET);
    ELSEIF maxNum IS NULL AND sJNS_SURAKTA = 2 THEN
	INSERT INTO data_kelahiran_pus (NO_KET_PUS, DRI_BIDAN_LUAR, NAMA_BIDAN, NIK_AYAH_LHR, NIK_IBU_LHR, NAMA_ANAK, JENIS_KEL_ANAK, TGL_LHR_ANAK, JAM_LHR_ANAK, BERAT_ANAK, PANJANG_ANAK, TGL_ISI_PUS, KET_BIDAN_LUAR)
        VALUES (CONCAT(getRegRSPusNumber(sNO_IDNT, sJNS_SURAKTA, sUSERNAME),"0001"), sNO_IDNT, sLHR_DRI_LUAR, sNAMA_DOKTER, sNIK_AYAH, sNIK_IBU, sNAMA_ANAK, sJENIS_KEL, sTGL_LHR, sJAM_LHR, sBERAT, sPANJANG, CURDATE(), sKET);
    ELSEIF maxNum IS NOT NULL AND sJNS_SURAKTA = 1 THEN
        INSERT INTO data_kelahiran_rs (NO_KET_RS, KODE_RS, LHR_DRI_LUAR, NAMA_DOKTER, NIK_AYAH_LHR, NIK_IBU_LHR, NAMA_ANAK, JENIS_KEL_ANAK, TGL_LHR_ANAK, JAM_LHR_ANAK, BERAT_ANAK, PANJANG_ANAK, TGL_ISI_RS, KET_LHR_DRI_LUAR)
        VALUES (CONCAT(getRegRSPusNumber(sNO_IDNT, sJNS_SURAKTA, sUSERNAME),LPAD(maxNum+1, 4, "0")), sNO_IDNT, sLHR_DRI_LUAR, sNAMA_DOKTER, sNIK_AYAH, sNIK_IBU, sNAMA_ANAK, sJENIS_KEL, sTGL_LHR, sJAM_LHR, sBERAT, sPANJANG, CURDATE(), sKET);
    ELSEIF maxNum IS NOT NULL AND sJNS_SURAKTA = 2 THEN
        INSERT INTO data_kelahiran_pus (NO_KET_PUS, DRI_BIDAN_LUAR, NAMA_BIDAN, NIK_AYAH_LHR, NIK_IBU_LHR, NAMA_ANAK, JENIS_KEL_ANAK, TGL_LHR_ANAK, JAM_LHR_ANAK, BERAT_ANAK, PANJANG_ANAK, TGL_ISI_PUS, KET_BIDAN_LUAR)
        VALUES (CONCAT(getRegRSPusNumber(sNO_IDNT, sJNS_SURAKTA, sUSERNAME),LPAD(maxNum+1, 4, "0")), sNO_IDNT, sLHR_DRI_LUAR, sNAMA_DOKTER, sNIK_AYAH, sNIK_IBU, sNAMA_ANAK, sJENIS_KEL, sTGL_LHR, sJAM_LHR, sBERAT, sPANJANG, CURDATE(), sKET);
    END IF;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
