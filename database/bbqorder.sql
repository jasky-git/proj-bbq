DROP DATABASE IF EXISTS `bbqorder`;

CREATE DATABASE `bbqorder`;

USE `bbqorder`;



DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `cname` varchar(80) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(80) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_time` varchar(15) NOT NULL

) ;


INSERT INTO `orders` (cname, phone, email, address, delivery_date, delivery_time)
VALUES
('Apple','91234567', 'apple@hotmail.com', '80 Stamford Rd, Singapore 178902', '2019-10-10', '0800-1000'),
('Banana','92224588', 'banana@gmail.com', '80 Stamford Rd, Singapore 178902', '2019-05-30', '1500-1700');




DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `orderid` int(11) NOT NULL  AUTO_INCREMENT,
  `itemid1` varchar(10) NOT NULL,
  `name1` varchar (100) NOT NULL,
  `qty1` int(11) NOT NULL,
  `itemid2` varchar(10) NOT NULL,
  `name2` varchar (100) NOT NULL,
  `qty2` int(11) NOT NULL,
  `itemid3` varchar(10) NOT NULL,
  `name3` varchar (100) NOT NULL,
  `qty3` int(11) NOT NULL,
  `itemid4` varchar(10) NOT NULL,
  `name4` varchar (100) NOT NULL,
  `qty4` int(11) NOT NULL,
  `itemid5` varchar(10) NOT NULL,
  `name5` varchar (100) NOT NULL,
  `qty5` int(11) NOT NULL,
  
  
   constraint bbqorderdetails_pk primary key(orderid)
) ;

INSERT INTO `orderdetails` 
(`itemid1`,`name1`,`qty1`, `itemid2`,`name2`,`qty2`, `itemid3`,`name3`,`qty3`, 
`itemid4`,`name4`,`qty4`, `itemid5`,`name5`,`qty5`)
VALUES
('bbq01','Premium Cup Otah (Raw)',2, 'bbq02', 'Chicken Satay (Raw)', 5, 
'bbq03', 'Buffalo Chicken Wing (Smoke)',0, 'bbq04', 'Chicken Chop (BBQ)', 0,
 'bbq05', 'Ketupat',9),
 ('bbq01','Premium Cup Otah (Raw)',11, 'bbq02', 'Chicken Satay (Raw)', 7, 
'bbq03', 'Buffalo Chicken Wing (Smoke)',2, 'bbq04', 'Chicken Chop (BBQ)', 0,
 'bbq05', 'Ketupat',21);

