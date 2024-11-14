SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `pharmacy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `pharmacy`;

CREATE TABLE `admin` (
  `ID` decimal(7,0) NOT NULL,
  `A_USERNAME` varchar(50) NOT NULL,
  `A_PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `admin` (`ID`, `A_USERNAME`, `A_PASSWORD`) VALUES
(1, 'admin', 'pass');


CREATE TABLE `clinicaltrials` (
  `trial_id` int NOT NULL,
  `emp_id` decimal(7,0) NOT NULL,
  `trial_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('Ongoing','Completed','Terminated') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `clinicaltrials` (`trial_id`, `emp_id`, `trial_name`, `start_date`, `end_date`, `status`) VALUES
(1, 4567001, 'COVID-19 Vaccine Phase 3', '2020-06-01', '2021-06-01', 'Completed'),
(2, 4567002, 'Heart Disease Study', '2021-01-15', NULL, 'Ongoing'),
(3, 4567005, 'Diabetes Prevention Trial', '2022-03-01', NULL, 'Ongoing'),
(4, 4567010, 'Cancer Immunotherapy Research', '2020-08-10', '2022-08-10', 'Completed'),
(5, 4567011, 'Safety and Efficacy of Therapy E in Cancer Patients', '2024-06-29', '2024-11-16', 'Completed');

CREATE TABLE `customer` (
  `C_ID` decimal(6,0) NOT NULL,
  `C_FNAME` varchar(30) NOT NULL,
  `C_LNAME` varchar(30) DEFAULT NULL,
  `C_AGE` int NOT NULL,
  `C_SEX` varchar(6) NOT NULL,
  `C_PHNO` decimal(10,0) NOT NULL,
  `C_MAIL` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `customer` (`C_ID`, `C_FNAME`, `C_LNAME`, `C_AGE`, `C_SEX`, `C_PHNO`, `C_MAIL`) VALUES
(987101, 'Ankit', 'Kumar', 22, 'Female', 9632587415, 'ankit@gmail.com'),
(987102, 'Varun', 'Ilango', 24, 'Male', 9987565423, 'varun@gmail.com'),
(987103, 'Rohit', 'Suresh', 45, 'Female', 7896541236, 'rohit@hotmail.com'),
(987104, 'John', 'Elizabeth', 30, 'Female', 7845129635, 'john@gmail.com'),
(987105, 'Zayed', 'Shah', 40, 'Male', 6789541235, 'zshah@hotmail.com'),
(987106, 'Vijay', 'Kumar', 60, 'Male', 8996574123, 'vijayk@yahoo.com'),
(987107, 'Meera', 'Das', 35, 'Female', 7845963259, 'meera@gmail.com');

CREATE TABLE `emplogin` (
  `E_ID` decimal(7,0) NOT NULL,
  `E_USERNAME` varchar(20) NOT NULL,
  `E_PASS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `emplogin` (`E_ID`, `E_USERNAME`, `E_PASS`) VALUES
(4567005, 'sid', 'pass1'),
(4567002, 'rahul', 'pass2'),
(4567010, 'ayush', 'pass3'),
(4567003, 'ajay', 'pass4'),
(4567011, 'likhith', 'pass8'),
(4567009, 'arjun', 'pass5'),
(4567006, 'amith', 'pass6');

CREATE TABLE `employee` (
  `E_ID` decimal(7,0) NOT NULL,
  `E_FNAME` varchar(30) NOT NULL,
  `E_LNAME` varchar(30) DEFAULT NULL,
  `BDATE` date NOT NULL,
  `E_AGE` int NOT NULL,
  `E_SEX` varchar(6) NOT NULL,
  `E_TYPE` varchar(20) NOT NULL,
  `E_JDATE` date NOT NULL,
  `E_SAL` decimal(8,2) NOT NULL,
  `E_PHNO` decimal(10,0) NOT NULL,
  `E_MAIL` varchar(40) DEFAULT NULL,
  `E_ADD` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `employee` (`E_ID`, `E_FNAME`, `E_LNAME`, `BDATE`, `E_AGE`, `E_SEX`, `E_TYPE`, `E_JDATE`, `E_SAL`, `E_PHNO`, `E_MAIL`, `E_ADD`) VALUES
(1, 'Admin', '-', '1989-05-24', 30, 'Female', 'Admin', '2009-06-24', 95000.00, 9874563219, 'admin@pharmacia.com', 'Chennai'),
(4567002, 'rahul', 'jindal', '2000-10-03', 20, 'Female', 'Pharmacist', '2012-10-06', 45000.00, 8546123566, 'rahul@gmail.com', 'Mumbai'),
(4567003, 'ajay', 'singh', '1998-02-01', 22, 'Male', 'Pharmacist', '2019-07-06', 21000.00, 7854123694, 'ajay@live.com', 'Chennai'),
(4567005, 'sid', 'kaur', '1992-01-02', 28, 'Female', 'Pharmacist', '2017-05-16', 32000.00, 7894532165, 'sid@gmail.com', 'Kolkata'),
(4567006, 'amith', 'singh', '1999-12-11', 20, 'Male', 'Pharmacist', '2018-09-05', 28000.00, 7896541234, 'amith@hotmail.com', 'Delhi'),
(4567009, 'arjun', 'kapoor', '1980-02-28', 40, 'Female', 'Manager', '2010-05-06', 80000.00, 7854123695, 'arjun@gmail.com', 'Pune'),
(4567010, 'ayush', 'gowda', '1993-04-05', 27, 'Male', 'Pharmacist', '2016-01-05', 30000.00, 7896541235, 'ayush@gmail.com', 'Hyderabad'),
(4567011, 'Likhith ', 'Arigela', '2004-03-24', 20, 'Male', 'Pharmacist', '2024-03-24', 100000.00, 9108934203, 'abc@gmail.com', 'Bengaluru');

CREATE TABLE `meds` (
  `MED_ID` decimal(6,0) NOT NULL,
  `MED_NAME` varchar(50) NOT NULL,
  `MED_QTY` int NOT NULL,
  `CATEGORY` varchar(20) DEFAULT NULL,
  `MED_PRICE` decimal(6,2) NOT NULL,
  `LOCATION_RACK` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `meds` (`MED_ID`, `MED_NAME`, `MED_QTY`, `CATEGORY`, `MED_PRICE`, `LOCATION_RACK`) VALUES
(123001, 'Dolo 650 MG', 1000, 'Tablet', 1.00, 'rack 5'),
(123002, 'Panadol Cold & Flu', 70, 'Tablet', 2.50, 'rack 6'),
(123003, 'Livogen', 15, 'Capsule', 5.00, 'rack 3'),
(123004, 'Gelusil', 440, 'Tablet', 1.25, 'rack 4'),
(123005, 'Cyclopam', 145, 'Tablet', 6.00, 'rack 2'),
(123006, 'Benadryl 200 ML', 35, 'Syrup', 50.00, 'rack 10'),
(123007, 'Lopamide', 15, 'Capsule', 5.00, 'rack 7'),
(123008, 'Vitamic C', 80, 'Tablet', 3.00, 'rack 8'),
(123009, 'Omeprazole', 35, 'Capsule', 4.00, 'rack 3'),
(123010, 'Concur 5 MG', 600, 'Tablet', 3.50, 'rack 9'),
(123011, 'Augmentin 250 ML', 115, 'Syrup', 80.00, 'rack 7'),
(123012, 'Saradon', 100, 'Tablet', 60.00, 'rack 6'),
(123013, 'Vitamin E', 125, 'Capsule', 50.00, 'rack 8');

CREATE TABLE `purchase` (
  `P_ID` decimal(4,0) NOT NULL,
  `SUP_ID` decimal(3,0) NOT NULL,
  `MED_ID` decimal(6,0) NOT NULL,
  `P_QTY` int NOT NULL,
  `P_COST` decimal(8,2) NOT NULL,
  `PUR_DATE` date NOT NULL,
  `MFG_DATE` date NOT NULL,
  `EXP_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `purchase` (`P_ID`, `SUP_ID`, `MED_ID`, `P_QTY`, `P_COST`, `PUR_DATE`, `MFG_DATE`, `EXP_DATE`) VALUES
(1001, 136, 123010, 200, 1500.50, '2020-03-01', '2019-05-05', '2021-05-10'),
(1002, 123, 123002, 1000, 3000.00, '2020-02-01', '2018-06-01', '2020-12-05'),
(1003, 145, 123006, 20, 800.00, '2020-04-22', '2017-02-05', '2020-07-01'),
(1004, 156, 123004, 250, 1000.00, '2020-04-02', '2020-05-06', '2023-05-06'),
(1005, 123, 123005, 200, 1200.00, '2020-02-01', '2019-08-02', '2021-04-01'),
(1006, 162, 123010, 500, 1500.00, '2019-04-22', '2018-01-01', '2020-05-02'),
(1007, 123, 123001, 500, 450.00, '2020-01-02', '2019-01-05', '2022-03-06');

DELIMITER $$
CREATE TRIGGER `QTYDELETE` AFTER DELETE ON `purchase` FOR EACH ROW BEGIN
UPDATE meds SET MED_QTY=MED_QTY-old.P_QTY WHERE meds.MED_ID=old.MED_ID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `QTYINSERT` AFTER INSERT ON `purchase` FOR EACH ROW BEGIN
UPDATE meds SET MED_QTY=MED_QTY+new.P_QTY WHERE meds.MED_ID=new.MED_ID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `QTYUPDATE` AFTER UPDATE ON `purchase` FOR EACH ROW BEGIN
UPDATE meds SET MED_QTY=MED_QTY-old.P_QTY WHERE meds.MED_ID=new.MED_ID;
UPDATE meds SET MED_QTY=MED_QTY+new.P_QTY WHERE meds.MED_ID=new.MED_ID;
END
$$
DELIMITER ;

CREATE TABLE `sales` (
  `SALE_ID` int NOT NULL,
  `C_ID` decimal(6,0) NOT NULL,
  `S_DATE` date DEFAULT NULL,
  `S_TIME` time DEFAULT NULL,
  `TOTAL_AMT` decimal(8,2) DEFAULT NULL,
  `E_ID` decimal(7,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `sales` (`SALE_ID`, `C_ID`, `S_DATE`, `S_TIME`, `TOTAL_AMT`, `E_ID`) VALUES
(21, 987105, '2024-11-03', '21:42:52', 50.00, 1),
(22, 987106, '2024-11-03', '21:43:30', 1250.00, 1);

DELIMITER $$
CREATE TRIGGER `SALE_ID_DELETE` BEFORE DELETE ON `sales` FOR EACH ROW BEGIN
DELETE from sales_items WHERE sales_items.SALE_ID=old.SALE_ID;
END
$$
DELIMITER ;


CREATE TABLE `sales_items` (
  `SALE_ID` int NOT NULL,
  `MED_ID` decimal(6,0) NOT NULL,
  `SALE_QTY` int NOT NULL,
  `TOT_PRICE` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `sales_items` (`SALE_ID`, `MED_ID`, `SALE_QTY`, `TOT_PRICE`) VALUES
(1, 123001, 20, 20.00),
(1, 123011, 2, 160.00),
(2, 123003, 75, 225.00),
(2, 123005, 60, 360.00),
(3, 123008, 40, 120.00),
(4, 123010, 250, 875.00),
(4, 123011, 1, 80.00),
(5, 123001, 45, 45.00),
(6, 123006, 2, 100.00),
(6, 123009, 10, 40.00),
(7, 123001, 100, 100.00),
(7, 123003, 50, 250.00),
(8, 123001, 10, 10.00),
(8, 123002, 10, 25.00);


DELIMITER $$
CREATE TRIGGER `SALEDELETE` AFTER DELETE ON `sales_items` FOR EACH ROW BEGIN
UPDATE meds SET MED_QTY=MED_QTY+old.SALE_QTY WHERE meds.MED_ID=old.MED_ID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `SALEINSERT` AFTER INSERT ON `sales_items` FOR EACH ROW BEGIN
UPDATE meds SET MED_QTY=MED_QTY-new.SALE_QTY WHERE meds.MED_ID=new.MED_ID;
END
$$
DELIMITER ;

DELIMITER $$

CREATE FUNCTION CalculateTotalSaleAmount(
    sale_id DECIMAL(10, 0)
)
RETURNS DECIMAL(10, 2)
DETERMINISTIC
BEGIN
    DECLARE total_amount DECIMAL(10, 2);
    
    SELECT SUM(i.quantity * p.price) 
    INTO total_amount
    FROM sale_items i
    JOIN products p ON i.product_id = p.product_id
    WHERE i.sale_id = sale_id;

    RETURN total_amount;
END$$

DELIMITER ;


CREATE TABLE `suppliers` (
  `SUP_ID` decimal(3,0) NOT NULL,
  `SUP_NAME` varchar(25) NOT NULL,
  `SUP_ADD` varchar(30) NOT NULL,
  `SUP_PHNO` decimal(10,0) NOT NULL,
  `SUP_MAIL` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `suppliers` (`SUP_ID`, `SUP_NAME`, `SUP_ADD`, `SUP_PHNO`, `SUP_MAIL`) VALUES
(123, 'XYZ Pharmaceuticals', 'Chennai, Tamil Nadu', 8745632145, 'xyz@xyzpharma.com'),
(136, 'ABC PharmaSupply', 'Trichy', 7894561235, 'abc@pharmsupp.com'),
(145, 'Daily Pharma Ltd', 'Hyderabad', 7854699321, 'daily@dpharma.com'),
(156, 'MedAll', 'Chennai', 9874585236, 'mainid@medall.com'),
(162, 'MedHead Pharmaceuticals', 'Trichy', 7894561335, 'abc@pharmsupp.com');

ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_USERNAME`),
  ADD UNIQUE KEY `USERNAME` (`A_USERNAME`),
  ADD KEY `ID` (`ID`);

ALTER TABLE `clinicaltrials`
  ADD PRIMARY KEY (`trial_id`),
  ADD KEY `emp_id` (`emp_id`);

ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_ID`),
  ADD UNIQUE KEY `C_PHNO` (`C_PHNO`),
  ADD UNIQUE KEY `C_MAIL` (`C_MAIL`);
  
ALTER TABLE `emplogin`
  ADD PRIMARY KEY (`E_USERNAME`),
  ADD KEY `E_ID` (`E_ID`);

ALTER TABLE `employee`
  ADD PRIMARY KEY (`E_ID`);

ALTER TABLE `meds`
  ADD PRIMARY KEY (`MED_ID`);

ALTER TABLE `purchase`
  ADD PRIMARY KEY (`P_ID`,`MED_ID`),
  ADD KEY `SUP_ID` (`SUP_ID`),
  ADD KEY `MED_ID` (`MED_ID`);

ALTER TABLE `sales`
  ADD PRIMARY KEY (`SALE_ID`),
  ADD KEY `C_ID` (`C_ID`),
  ADD KEY `E_ID` (`E_ID`);

ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`SALE_ID`,`MED_ID`),
  ADD KEY `MED_ID` (`MED_ID`);

ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`SUP_ID`);

ALTER TABLE `clinicaltrials`
  MODIFY `trial_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `sales`
  MODIFY `SALE_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `employee` (`E_ID`);

ALTER TABLE `clinicaltrials`
  ADD CONSTRAINT `clinicaltrials_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`E_ID`);

ALTER TABLE `emplogin`
  ADD CONSTRAINT `emplogin_ibfk_1` FOREIGN KEY (`E_ID`) REFERENCES `employee` (`E_ID`);

ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`SUP_ID`) REFERENCES `suppliers` (`SUP_ID`),
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`MED_ID`) REFERENCES `meds` (`MED_ID`);

ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `customer` (`C_ID`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`E_ID`) REFERENCES `employee` (`E_ID`);

ALTER TABLE `sales_items`
  ADD CONSTRAINT `sales_items_ibfk_1` FOREIGN KEY (`SALE_ID`) REFERENCES `sales` (`SALE_ID`),
  ADD CONSTRAINT `sales_items_ibfk_2` FOREIGN KEY (`MED_ID`) REFERENCES `meds` (`MED_ID`);
COMMIT;

