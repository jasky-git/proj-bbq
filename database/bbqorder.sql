DROP DATABASE IF EXISTS `bbqorder`;

CREATE DATABASE `bbqorder`;

USE `bbqorder`;

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
    orderid int not null primary key AUTO_INCREMENT,
    cname varchar(80) not null,
    phone int not null,
    email varchar(150) not null,
    startpoint varchar(80) not null,
    endpoint varchar(80) not null,
    delivery_date date not null,
    delivery_time varchar(15) not null
);

DROP TABLE IF EXISTS `orderdetails`;

CREATE TABLE `orderdetails` (
    orderid int not null,
    itemid1 varchar(10) not null,
    qty1 int not null,
    itemid2 varchar(10),
    qty2 int,
    itemid3 varchar(10),
    qty3 int,
    itemid4 varchar(10),
    qty4 int,
    itemid5 varchar(10),
    qty5 int,
    remarks varchar(150),
    created_on timestamp default current_timestamp not null,
    constraint bbqorderdetails_pk primary key(orderid),
    constraint bbqorderdetails_fk1 foreign key(orderid) references bbqorder.order(orderid),
    constraint bbqorderdetails_fk2 foreign key(itemid1) references bbqinventory.inventory(itemid),
    constraint bbqorderdetails_fk3 foreign key(itemid2) references bbqinventory.inventory(itemid),
    constraint bbqorderdetails_fk4 foreign key(itemid3) references bbqinventory.inventory(itemid),
    constraint bbqorderdetails_fk5 foreign key(itemid4) references bbqinventory.inventory(itemid),
    constraint bbqorderdetails_fk6 foreign key(itemid5) references bbqinventory.inventory(itemid)
);


INSERT INTO `order` (cname, phone, email, startpoint, endpoint, delivery_date, delivery_time)
VALUES
('Apple','91234567', 'apple@hotmail.com', '80 Stamford Rd, Singapore 178902','Avant Parc, 9 Wak Hassan Place', '2019-10-10', '0800-1000'),
('Banana','92224588', 'banana@gmail.com', '80 Stamford Rd, Singapore 178902','Avant Parc, 9 Wak Hassan Place', '2019-05-30', '1500-1700');

INSERT INTO `orderdetails` (orderid, itemid1, qty1, itemid2, qty2, itemid3, qty3, itemid4, qty4, itemid5, qty5, remarks)
VALUES
('1', 'bbq01', '2', 'bbq03', '1', 'bbq05', '2', 'bbq02', '3', 'bbq04', '5', '');

INSERT INTO `orderdetails` (orderid, itemid1, qty1, remarks)
VALUES
('2', 'bbq01', '4', 'Contact 93208372 Carrot for collection');