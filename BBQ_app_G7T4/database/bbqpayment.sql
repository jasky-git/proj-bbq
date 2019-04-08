DROP DATABASE IF EXISTS `bbqpayment`;

CREATE DATABASE `bbqpayment`;

USE `bbqpayment`;

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
    orderid int not null auto_increment,
    totalcost decimal(6,2) not null,
    stripid varchar(150) not null,
    constraint bbqpayment_pk primary key(orderid)
);

INSERT INTO `payment` (orderid, totalcost,stripid)
VALUES
('1', '166.90',  '99999999'),
('2', '52.00',  '88888888');