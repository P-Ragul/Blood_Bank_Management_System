-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 01:17 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbmanagement`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `BloodStockDetails` ()  BEGIN
SELECT StockID,BloodGroup,BloodQuantity,Status
FROM bloodstock;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateDonor` (IN `did` VARCHAR(20), IN `dna` VARCHAR(20), IN `dag` INT(11), IN `dge` VARCHAR(10), IN `dbg` VARCHAR(20), IN `dpn` VARCHAR(15), IN `dlo` VARCHAR(50))  BEGIN
INSERT INTO donor(DonorID,DonorName,Age,Gender,Blood_Group,PhoneNo,Location)
VALUES (did,dna,dag,dge,dbg,dpn,dlo);
UPDATE bloodstock
SET bloodstock.BloodQuantity=(bloodstock.BloodQuantity+400)
WHERE bloodstock.BloodGroup=dbg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateRequest` (IN `r_id` VARCHAR(20), IN `r_na` VARCHAR(20), IN `r_da` DATE, IN `r_bg` VARCHAR(20), IN `r_q` INT(11), IN `r_hi` VARCHAR(20))  BEGIN
INSERT INTO request(RequestID,PatientName,RequestDate,RequiredBloodGroup,RequiredQuantity,HospID)
VALUES (r_id,r_na,r_da,r_bg,r_q,r_hi);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteRequest` (IN `rid` VARCHAR(20))  BEGIN
DELETE FROM request 
where RequestID=rid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DonorDetails` ()  BEGIN
SELECT *
FROM donor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EditBloodStock` (IN `id` VARCHAR(20), IN `bd_q` INT(11), IN `st_` VARCHAR(20))  BEGIN
update bloodstock as b set 
b.BloodQuantity=bd_q,b.Status=st_
where b.StockID=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EditDonor` (IN `id` VARCHAR(20), IN `d_na` VARCHAR(20), IN `d_ag` INT(11), IN `d_ge` VARCHAR(10), IN `d_bg` VARCHAR(20), IN `d_pn` VARCHAR(15), IN `d_lo` VARCHAR(50))  BEGIN
update donor as d set 
d.DonorID=id,d.DonorName=d_na,d.Age=d_ag,d.Gender=d_ag,d.Blood_Group=d_bg,d.PhoneNo=d_pn,d.Location=d_lo
where d.DonorID=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EditRequest` (IN `id` VARCHAR(20), IN `r_na` VARCHAR(20), IN `r_da` DATE, IN `r_bg` VARCHAR(20), IN `r_q` INT(11), IN `r_hi` VARCHAR(20))  BEGIN
update request as r set
r.RequestID=id,r.PatientName=r_na,r.RequestDate=r_da,r.RequiredBloodGroup=r_bg,r.RequiredQuantity=r_q,r.HospID=r_hi
where r.RequestID=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HospitalDetails` ()  BEGIN
SELECT 
hospital.HospitalID,hospital.HospitalName,hospital.Address,hospital.ContactNo,hospital.Website,hospital.Location,request.RequiredBloodGroup,request.RequiredQuantity,request.RequestDate
FROM hospital,request
WHERE hospital.HospitalID=request.HospID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `a_id` VARCHAR(20), IN `pas` VARCHAR(20))  BEGIN
SELECT * FROM authentication
WHERE a_id=StaffLoginID AND pas=Password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RequestDetails` ()  BEGIN
SELECT * FROM
request;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RowDonor` (IN `rid` VARCHAR(20))  BEGIN
select * from donor where DonorID=rid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RowRequest` (IN `rid` VARCHAR(20))  BEGIN
select * from request where RequestID=rid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RowStock` (IN `rid` VARCHAR(20))  BEGIN
select * from bloodstock where StockID=rid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `StaffDetails` ()  BEGIN
SELECT StaffID,StaffName,HospID
FROM bloodbankstaff;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `StaffLoginID` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`StaffLoginID`, `Password`) VALUES
('L001', '001xyz'),
('L002', '002xyz');

-- --------------------------------------------------------

--
-- Table structure for table `bloodbankstaff`
--

CREATE TABLE `bloodbankstaff` (
  `StaffID` varchar(20) NOT NULL,
  `StaffName` varchar(50) NOT NULL,
  `LoginID` varchar(20) NOT NULL,
  `HospID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloodbankstaff`
--

INSERT INTO `bloodbankstaff` (`StaffID`, `StaffName`, `LoginID`, `HospID`) VALUES
('ST001', 'STabc', 'L001', 'H001'),
('ST002', 'STxyz', 'L002', 'H002');

-- --------------------------------------------------------

--
-- Table structure for table `bloodstock`
--

CREATE TABLE `bloodstock` (
  `StockID` varchar(20) NOT NULL,
  `BloodGroup` varchar(20) NOT NULL,
  `BloodQuantity` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloodstock`
--

INSERT INTO `bloodstock` (`StockID`, `BloodGroup`, `BloodQuantity`, `Status`) VALUES
('S001', 'A+', 600, 'Available'),
('S002', 'A-', 100, 'Not Available'),
('S003', 'AB+', 0, 'Not Available'),
('S004', 'AB-', 0, 'Not Available'),
('S005', 'B+', 200, 'Available'),
('S006', 'B-', 200, 'Available'),
('S007', 'O+', 250, 'Available'),
('S008', 'O-', 0, 'Not Available');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `DonorID` varchar(20) NOT NULL,
  `DonorName` varchar(20) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Blood_Group` varchar(20) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `Location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`DonorID`, `DonorName`, `Age`, `Gender`, `Blood_Group`, `PhoneNo`, `Location`) VALUES
('D001', 'Ragul', 24, '24', 'O+', '0776879650', 'Colombo'),
('D002', 'Anna', 31, 'Female', 'B+', '0771239871', 'Colombo'),
('D003', 'Arjun', 24, '24', 'A-', '0714545454', 'Colombo'),
('D004', 'Arun', 30, 'Male', 'A+', '0714545451', 'Colombo'),
('D005', 'Mary', 19, 'Female', 'O-', '0704545454', 'Colombo'),
('D006', 'Arunraj', 30, 'Male', 'A+', '0701342424', 'Colombo'),
('D007', 'Naif', 22, 'Male', 'A+', '0714545455', 'Colombo');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `HospitalID` varchar(20) NOT NULL,
  `HospitalName` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `ContactNo` varchar(15) NOT NULL,
  `Website` varchar(20) NOT NULL,
  `Location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`HospitalID`, `HospitalName`, `Address`, `ContactNo`, `Website`, `Location`) VALUES
('H001', 'Hosp_A', '232/5A,PioneerRoad,Colombo', '111234567', 'www.hospa.con', 'Colombo'),
('H002', 'Hosp_B', '444/8B,ManiacRoad,Colombo', '112345678', 'www.hospb.com', 'Colombo');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `RequestID` varchar(20) NOT NULL,
  `PatientName` varchar(20) NOT NULL,
  `RequestDate` date NOT NULL,
  `RequiredBloodGroup` varchar(20) NOT NULL,
  `RequiredQuantity` int(11) NOT NULL,
  `HospID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`RequestID`, `PatientName`, `RequestDate`, `RequiredBloodGroup`, `RequiredQuantity`, `HospID`) VALUES
('R001', 'Venuja', '2022-01-05', 'B+', 150, 'H001'),
('R002', 'Naif', '2022-01-04', 'O+', 100, 'H002'),
('R003', 'Vini', '2022-01-01', 'B-', 100, 'H002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`StaffLoginID`);

--
-- Indexes for table `bloodbankstaff`
--
ALTER TABLE `bloodbankstaff`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `LoginID` (`LoginID`),
  ADD KEY `HospID` (`HospID`);

--
-- Indexes for table `bloodstock`
--
ALTER TABLE `bloodstock`
  ADD PRIMARY KEY (`StockID`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`DonorID`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`HospitalID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`RequestID`),
  ADD KEY `HospID` (`HospID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bloodbankstaff`
--
ALTER TABLE `bloodbankstaff`
  ADD CONSTRAINT `bloodbankstaff_ibfk_1` FOREIGN KEY (`LoginID`) REFERENCES `authentication` (`StaffLoginID`),
  ADD CONSTRAINT `bloodbankstaff_ibfk_2` FOREIGN KEY (`HospID`) REFERENCES `hospital` (`HospitalID`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`HospID`) REFERENCES `hospital` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
