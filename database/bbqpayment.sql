DROP DATABASE IF EXISTS `bbqpayment`;

CREATE DATABASE `bbqpayment`;

USE `bbqpayment`;

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
    orderid int not null,
    totalcost decimal(6,2) not null,
    status varchar(15) not null,
    constraint bbqpayment_pk primary key(orderid)
);

INSERT INTO `payment` (orderid, totalcost,status)
VALUES
('1', '166.90',  'succeeded'),
('2', '52.00',  'succeeded');