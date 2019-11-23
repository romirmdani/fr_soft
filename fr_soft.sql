-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 Nov 2019 pada 19.43
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fr_soft`
--

DELIMITER $$
--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `GetAncestry` (`GivenID` INT) RETURNS VARCHAR(1024) CHARSET latin1 BEGIN
    DECLARE rv VARCHAR(1024);
    DECLARE cm CHAR(1);
    DECLARE ch INT;

    SET rv = '';
    SET cm = '';
    SET ch = GivenID;
    WHILE ch > 0 DO
        SELECT IFNULL(parent_id,-1) INTO ch FROM
        (SELECT parent_id FROM dt_grp WHERE id_grp = ch) A;
        IF ch > 0 THEN
            SET rv = CONCAT(rv,cm,ch);
            SET cm = '/';
        END IF;
    END WHILE;
    RETURN rv;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `GetFamilyTree` (`GivenID` INT) RETURNS VARCHAR(1024) CHARSET latin1 BEGIN

    DECLARE rv,q,queue,queue_children VARCHAR(1024);
    DECLARE queue_length,front_id,pos INT;

    SET rv = '';
    SET queue = GivenID;
    SET queue_length = 1;

    WHILE queue_length > 0 DO
        SET front_id = FORMAT(queue,0);
        IF queue_length = 1 THEN
            SET queue = '';
        ELSE
            SET pos = LOCATE(',',queue) + 1;
            SET q = SUBSTR(queue,pos);
            SET queue = q;
        END IF;
        SET queue_length = queue_length - 1;

        SELECT IFNULL(qc,'') INTO queue_children
        FROM (SELECT GROUP_CONCAT(id_grp) qc
        FROM dt_grp WHERE parent_id = front_id) A;

        IF LENGTH(queue_children) = 0 THEN
            IF LENGTH(queue) = 0 THEN
                SET queue_length = 0;
            END IF;
        ELSE
            IF LENGTH(rv) = 0 THEN
                SET rv = queue_children;
            ELSE
                SET rv = CONCAT(rv,',',queue_children);
            END IF;
            IF LENGTH(queue) = 0 THEN
                SET queue = queue_children;
            ELSE
                SET queue = CONCAT(queue,',',queue_children);
            END IF;
            SET queue_length = LENGTH(queue) - LENGTH(REPLACE(queue,',','')) + 1;
        END IF;
    END WHILE;

    RETURN rv;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `GetParentIDByID` (`GivenID` INT) RETURNS INT(11) BEGIN
    DECLARE rv INT;

    SELECT IFNULL(parent_id,-1) INTO rv FROM
    (SELECT parent_id FROM dt_grp WHERE id_grp = GivenID) A;
    RETURN rv;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_brg`
--

CREATE TABLE `dt_brg` (
  `ID_BRG` int(11) NOT NULL,
  `CD_BRG` varchar(30) NOT NULL,
  `NAMA_BRG` varchar(50) NOT NULL,
  `ID_GRP` int(11) NOT NULL,
  `KET_BRG` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_brg`
--

INSERT INTO `dt_brg` (`ID_BRG`, `CD_BRG`, `NAMA_BRG`, `ID_GRP`, `KET_BRG`) VALUES
(1, '', 'SAMSUNG A1', 82, ''),
(2, '', 'SAMSUNG A2', 82, 'test'),
(3, '', 'EPSON 1', 73, ''),
(4, '', 'EPSON 2', 103, ''),
(5, '', 'OPPO V1', 117, ''),
(6, '', 'OPPO V2', 117, ''),
(7, '', 'PRINTER BARCODE', 12, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_grp`
--

CREATE TABLE `dt_grp` (
  `ID_GRP` int(11) NOT NULL,
  `NAMA_GRP` varchar(50) NOT NULL,
  `PARENT_ID` int(11) NOT NULL,
  `KET_GRP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_grp`
--

INSERT INTO `dt_grp` (`ID_GRP`, `NAMA_GRP`, `PARENT_ID`, `KET_GRP`) VALUES
(107, 'HP', 0, ''),
(108, 'OPPO', 107, ''),
(109, 'LAPTOP', 0, ''),
(110, 'ACER', 109, ''),
(111, 'OPPO 1', 108, ''),
(112, 'OPPO 2', 111, ''),
(113, 'OPPO 3', 112, ''),
(114, 'OPPO 4', 113, ''),
(115, 'OPPO 5', 114, ''),
(116, 'OPPO 6', 115, ''),
(117, 'OPPO 7', 116, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_user`
--

CREATE TABLE `dt_user` (
  `ID_USER` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `STATUS_LOG` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_user`
--

INSERT INTO `dt_user` (`ID_USER`, `USERNAME`, `PASSWORD`, `STATUS_LOG`) VALUES
(1, 'romi', 'romi', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_brg`
--
ALTER TABLE `dt_brg`
  ADD PRIMARY KEY (`ID_BRG`);

--
-- Indexes for table `dt_grp`
--
ALTER TABLE `dt_grp`
  ADD PRIMARY KEY (`ID_GRP`);

--
-- Indexes for table `dt_user`
--
ALTER TABLE `dt_user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_brg`
--
ALTER TABLE `dt_brg`
  MODIFY `ID_BRG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dt_grp`
--
ALTER TABLE `dt_grp`
  MODIFY `ID_GRP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `dt_user`
--
ALTER TABLE `dt_user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
