DROP DATABASE IF EXISTS `bbqorder`;

CREATE DATABASE `bbqorder`;

USE `bbqorder`;


CREATE TABLE `inventory` (
    itemid varchar(10) not null primary key,
    name varchar(30) not null,
	cost decimal(6,2) not null
	);


INSERT INTO `inventory` (itemid, name,cost)
VALUES 
('bbq01', 'Premium Cup Otah (Raw)','13.00'),
('bbq02', 'Chicken Satay (Raw)', '12.50'),
('bbq03', 'Buffalo Chicken Wing (Smoke)','14.40'),
('bbq04', 'Chicken Chop (BBQ)', '17.00'),
('bbq05', 'Ketupat', '2.00');


DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `cname` varchar(80) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `startpoint` varchar(80) NOT NULL,
  `endpoint` varchar(80) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_time` varchar(15) NOT NULL,
  `strip_id` varchar(100) NOT NULL

) ;


INSERT INTO `orders` (cname, phone, email, startpoint, endpoint, delivery_date, delivery_time, strip_id)
VALUES
('Apple','91234567', 'apple@hotmail.com', '80 Stamford Rd, Singapore 178902','Avant Parc, 9 Wak Hassan Place', '2019-10-10', '0800-1000','88888888'),
('Banana','92224588', 'banana@gmail.com', '80 Stamford Rd, Singapore 178902','Avant Parc, 9 Wak Hassan Place', '2019-05-30', '1500-1700','77777777');




DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `orderid` int(11) NOT NULL,
  `itemid1` varchar(10) NOT NULL,
  `qty1` int(11) NOT NULL,
  `itemid2` varchar(10) DEFAULT NULL,
  `qty2` int(11) DEFAULT NULL,
  `itemid3` varchar(10) DEFAULT NULL,
  `qty3` int(11) DEFAULT NULL,
  `itemid4` varchar(10) DEFAULT NULL,
  `qty4` int(11) DEFAULT NULL,
  `itemid5` varchar(10) DEFAULT NULL,
  `qty5` int(11) DEFAULT NULL,
  `remarks` varchar(150) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   constraint bbqorderdetails_pk primary key(orderid),
   constraint bbqorderdetails_fk1 foreign key(orderid) references orders(orderid),
   constraint bbqorderdetails_fk2 foreign key(itemid1) references inventory(itemid),
   constraint bbqorderdetails_fk3 foreign key(itemid2) references inventory(itemid),
   constraint bbqorderdetails_fk4 foreign key(itemid3) references inventory(itemid),
   constraint bbqorderdetails_fk5 foreign key(itemid4) references inventory(itemid),
   constraint bbqorderdetails_fk6 foreign key(itemid5) references inventory(itemid)
) ;

INSERT INTO `orderdetails` (orderid, itemid1, qty1, itemid2, qty2, itemid3, qty3, itemid4, qty4, itemid5, qty5, remarks)
VALUES
('1', 'bbq01', '2', 'bbq03', '1', 'bbq05', '2', 'bbq02', '3', 'bbq04', '5', '');

INSERT INTO `orderdetails` (orderid, itemid1, qty1, remarks)
VALUES
('2', 'bbq01', '4', 'Contact 93208372 Carrot for collection');

-- --------------------------------------------------------

