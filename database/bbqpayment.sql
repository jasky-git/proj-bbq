DROP DATABASE IF EXISTS `bbqpayment`;

CREATE DATABASE `bbqpayment`;

USE `bbqpayment`;

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
    orderid int not null,
    totalcost decimal(6,2) not null,
    payment_type varchar(15) not null,
    status varchar(15) not null,
    constraint bbqpayment_pk primary key(orderid),
    constraint bbqpayment_fk1 foreign key(orderid) references bbqorder.orders(orderid)
);

INSERT INTO `payment` (orderid, totalcost, payment_type, status)
VALUES
('1', '166.90', 'Credit Card', 'Completed'),
('2', '52.00', 'Credit Card', 'Pending');