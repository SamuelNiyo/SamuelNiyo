-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 01:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `niyomurengezi_samuel_222008677`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateAmountAboveAverageView` ()  BEGIN
SET @sql ='CREATE OR REPLACE VIEW RevenueAboveAverageView AS
SELECT r.Revenue_id,r.Amount,r.Revenue_type
FROM Amount r
WHERE r.Amount > (
SELECT AVG(u.Amount)
FROM Revenue u
WHERE u.Amount = r.Amount
);
';
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete data` (IN `int` INT)  BEGIN
    DELETE FROM customers_table
    WHERE customer-id = customer_id;

    DELETE FROM orders
    WHERE customer_id = customer_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteAddressByUser` (IN `p_Address` VARCHAR(100))  BEGIN
DELETE FROM User
WHERE Address = p_Address;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteRevenueByAmount` (IN `p_Amount` INT)  BEGIN
DELETE FROM Revenue
WHERE Amount = p_Amount;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `display data` (IN `int` INT)  SELECT * FROM restaurant_table
UNION
SELECT * FROM orders_table
UNION
SELECT * FROM customers_table
UNION
SELECT * FROM delivery_personneltable
UNION
SELECT * FROM payment_transactionstable$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Display_Admin_Data` ()  BEGIN
SET @sql = 'SELECT * FROM Admin';
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Display_Agent_Data` ()  BEGIN
SELECT * FROM Agent;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Display_Manager_Data` ()  BEGIN
SELECT * FROM Manager;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Display_Revenue_Data` ()  BEGIN
SELECT * FROM Revenue;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Display_Transaction_Data` ()  BEGIN
SELECT * FROM Transaction;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Display_User_Data` ()  BEGIN
SELECT * FROM User;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert data` (IN `int` INT ZEROFILL)  INSERT INTO `customers_table` (`customer-id`, `name`, `email`, `phone`, `address`) VALUES ('1233', 'fabio', 'fff@gg.cm', '0788888', 'butar')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Admin` (IN `p_First_name` VARCHAR(50), IN `p_Last_name` VARCHAR(50), IN `p_Gender` VARCHAR(50), IN `p_Address` VARCHAR(60), IN `p_Email` VARCHAR(100), IN `p_Tel_number` INT)  BEGIN
INSERT INTO Admin (First_name,Last_name,Gender,Address,Email,Tel_number)
VALUES (p_First_name,p_Last_name,p_Gender,p_Address,p_Email,p_Tel_number);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Agent` (IN `P_First_name` VARCHAR(60), IN `P_Last_name` VARCHAR(60), IN `P_Email` VARCHAR(100), IN `P_Tel_number` INT, IN `p_Admin_id` INT, IN `p_Manager_id` INT)  BEGIN
INSERT INTO Agent (First_name,Last_name,Email,Tel_number,Admin_id,Manager_id)
VALUES (P_First_name,P_Last_name,P_Email,P_Tel_number,p_Admin_id,p_Manager_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Manager` (IN `P_First_name` VARCHAR(60), IN `P_Last_name` VARCHAR(60), IN `P_Gender` VARCHAR(65), IN `P_Address` VARCHAR(65), IN `P_Specialization` VARCHAR(100))  BEGIN
INSERT INTO Manager (First_name,Last_name,Gender,Address,Specialization)
VALUES (P_First_name,P_Last_name,P_Gender,P_Address,P_Specialization);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Revenue` (IN `p_Amount` INT, IN `p_Revenue_type` VARCHAR(80))  BEGIN
INSERT INTO Revenue (Amount,Revenue_type)
VALUES (p_Amount,p_Revenue_type);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Transaction` (IN `p_User_id` INT, IN `p_Revenue_id` INT)  BEGIN
INSERT INTO Transaction (User_id,Revenue_id)
VALUES (p_User_id,p_Revenue_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_User` (IN `p_First_name` VARCHAR(70), IN `p_Last_name` VARCHAR(70), IN `p_Tin_number` INT, IN `p_Age` INT, IN `p_Address` VARCHAR(100), IN `p_Email` VARCHAR(100), IN `p_Registration_date` DATE, IN `p_Agent_id` INT)  BEGIN
INSERT INTO User (First_name,Last_name,Tin_number,Age,Address,Email,Registration_date,Agent_id)
VALUES (p_First_name,p_Last_name,p_Tin_number,p_Age,p_Address,p_Email,p_Registration_date,p_Agent_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `subquery data` (IN `int` INT)  BEGIN
    SELECT order_id, customer_name, total_amount
    FROM orders_table
    WHERE order_id = order_id;

    SELECT item_name, quantity
    FROM customers_table
    WHERE order_id = order_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update` (IN `int` INT)  BEGIN
    UPDATE customers_table
    SET customer_status = new_status
    WHERE customers_id = customer-id;

    UPDATE orders
    SET order_status = new_status
    WHERE id = order_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Agent` (IN `p_Agent_id` INT, IN `p_New_Email` VARCHAR(100), IN `p_New_Tel_number` INT)  BEGIN
UPDATE Agent
SET Email = p_Agent_id,Email = p_New_Email,Tel_number = p_New_Tel_number
WHERE Agent_id = p_Agent_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_User` (IN `p_User_id` INT, IN `p_New_Email` VARCHAR(100), IN `p_New_Age` INT, IN `p_New_Address` VARCHAR(100))  BEGIN
UPDATE User
SET Email = p_New_Email, Age = p_New_Age, Address = p_New_Address
WHERE User_id = p_User_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `id_number` int(150) NOT NULL,
  `phone` int(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `martial_status` varchar(100) NOT NULL,
  `DoB` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`fname`, `lname`, `id_number`, `phone`, `gender`, `martial_status`, `DoB`, `email`, `password`) VALUES
('sdftgyh', 'sdfgyh', 123456, 123456, 'Female', 'single', '2000-11-11', '123456789', '123456789'),
('AAAAA', 'BBBBB', 250, 789554555, 'Female', 'single', '2001-11-24', 'asdfghjkl', '123456789'),
('asdfghj', 'asdfgh', 1234, 1234567, 'Female', 'married', '2000-11-12', '12345', '12345'),
('SAM', 'NIYOMU', 12345, 123456789, 'Male', 'SINGLE', '2002-11-12', '123456789', '123456789'),
('SAM', 'NIYOMU', 12345, 123456789, 'Male', 'SINGLE', '2002-11-12', 'admin', '123445'),
('SAM', 'NIYOMU', 12345, 123456789, 'Male', 'SINGLE', '2002-11-12', '12345', '123445');

-- --------------------------------------------------------

--
-- Table structure for table `adminn`
--

CREATE TABLE `adminn` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminn`
--

INSERT INTO `adminn` (`id`, `first_name`, `last_name`, `email`, `telephone`) VALUES
(23, 'sam', 'muvyo', 'asdfghjk', 2345),
(24, 'sam', 'muvyo', 'asdfghjk', 2345),
(1223, 'sdfgh', 'asdfg', 'asd', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` int(50) NOT NULL,
  `adminid` int(100) NOT NULL,
  `managerid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `first_name`, `last_name`, `email`, `telephone`, `adminid`, `managerid`) VALUES
(1, 'samuel', 'niyomurengezi', 'niyomurengezisammy', 1234, 34, 66),
(12, 'sasa', 'mumu', 'samu', 1234567890, 12, 13);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(100) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `address` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `first_name`, `last_name`, `address`, `specialization`) VALUES
(12, 'niyobyose', 'eric', 'rubavu', 'accounting'),
(14, 'sam', 'mumu', 'nyanza', 'B.I.T'),
(34, 'regis', 'kit', 'kigali', 'social work'),
(100, 'abias', 'emmy', 'huye', 'finance'),
(101, 'aime', 'diane', 'kigali', 'marketing'),
(343, 'sasa', 'mumu', 'nyanza', 'B.I.T');

-- --------------------------------------------------------

--
-- Table structure for table `revenue`
--

CREATE TABLE `revenue` (
  `id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `revenue_type` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `revenue`
--

INSERT INTO `revenue` (`id`, `amount`, `revenue_type`) VALUES
(25, 2500, 'TVA'),
(15, 1500, 'Personal Tax');

-- --------------------------------------------------------

--
-- Table structure for table `revenue_view`
--

CREATE TABLE `revenue_view` (
  `Revenue_id` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Revenue_type` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(150) NOT NULL,
  `userid` int(150) NOT NULL,
  `revenueid` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `userid`, `revenueid`) VALUES
(1, 44, 77),
(4, 44, 77),
(6, 2, 3),
(10, 150, 150),
(11, 2, 3),
(19, 2, 3),
(23, 55, 65),
(43, 64, 475),
(48, 55, 76),
(54, 345, 345),
(69, 90, 100),
(77, 55, 76),
(123, 2, 3),
(230, 3, 65),
(250, 23, 34),
(1000, 2323, 33);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_view`
--

CREATE TABLE `transaction_view` (
  `Transaction_id` int(11) DEFAULT NULL,
  `User_id` int(11) DEFAULT NULL,
  `Revenue_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `tin_number` int(100) NOT NULL,
  `age` int(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `registration_date` date NOT NULL,
  `agent_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `tin_number`, `age`, `address`, `email`, `registration_date`, `agent_id`) VALUES
(23, 'samm', 'niiiii', 1234567890, 43, 'sdfghj', 'sdfghjk', '2022-12-11', 65);

-- --------------------------------------------------------

--
-- Table structure for table `user_view`
--

CREATE TABLE `user_view` (
  `User_id` int(11) DEFAULT NULL,
  `First_name` varchar(70) DEFAULT NULL,
  `Last_name` varchar(70) DEFAULT NULL,
  `Tin_number` int(11) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Registration_date` date DEFAULT NULL,
  `Agent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
