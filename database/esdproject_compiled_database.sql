# create inventory database
DROP DATABASE IF EXISTS `bbqinventory`;

CREATE DATABASE `bbqinventory`;

USE `bbqinventory`;

DROP TABLE IF EXISTS `inventory`;

CREATE TABLE `inventory` (
    itemid varchar(10) not null primary key,
    name varchar(30) not null,
    description varchar(250) not null,
    cost decimal(6,2) not null,
    qty int not null,
    updated_on timestamp default current_timestamp not null
);

# reference from https://www.bbqwholesale.com/
INSERT INTO `inventory` (itemid, name, description, cost, qty)
VALUES 
('bbq01', 'Premium Cup Otah (Raw)', 'Fresh mixed fish, coconut milk, chilli paste, in house secret recipe chilli paste spices, salt & sugar.','13.00', '5'),
('bbq02', 'Chicken Satay (Raw)', 'Chicken thigh meat, cumin seeds, turmeric, coriander seeds, onion, garlic, brown sugar, salt & herbs.','12.50', '10'),
('bbq03', 'Buffalo Chicken Wing (Smoke)', 'Mid joint chicken wing, homemade smoke BBQ sauce, garlic and sesame oil.','14.40', '20'),
('bbq04', 'Chicken Chop (BBQ)', 'Boneless chicken thigh, homemade BBQ Sauce, herbs and sesame oil.','17.00', '30'),
('bbq05', 'Ketupat', 'Fragrance rice.','2.00', '100');

# ----------------------------------------------------
# create orders database
DROP DATABASE IF EXISTS `bbqorder`;

CREATE DATABASE `bbqorder`;

USE `bbqorder`;

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
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
    constraint bbqorderdetails_fk1 foreign key(orderid) references bbqorder.orders(orderid),
    constraint bbqorderdetails_fk2 foreign key(itemid1) references bbqinventory.inventory(itemid),
    constraint bbqorderdetails_fk3 foreign key(itemid2) references bbqinventory.inventory(itemid),
    constraint bbqorderdetails_fk4 foreign key(itemid3) references bbqinventory.inventory(itemid),
    constraint bbqorderdetails_fk5 foreign key(itemid4) references bbqinventory.inventory(itemid),
    constraint bbqorderdetails_fk6 foreign key(itemid5) references bbqinventory.inventory(itemid)
);

INSERT INTO `orders` (cname, phone, email, startpoint, endpoint, delivery_date, delivery_time)
VALUES
('Apple','91234567', 'apple@hotmail.com', '80 Stamford Rd, Singapore 178902','Avant Parc, 9 Wak Hassan Place', '2019-10-10', '0800-1000'),
('Banana','92224588', 'banana@gmail.com', '80 Stamford Rd, Singapore 178902','Avant Parc, 9 Wak Hassan Place', '2019-05-30', '1500-1700');

INSERT INTO `orderdetails` (orderid, itemid1, qty1, itemid2, qty2, itemid3, qty3, itemid4, qty4, itemid5, qty5, remarks)
VALUES
('1', 'bbq01', '2', 'bbq03', '1', 'bbq05', '2', 'bbq02', '3', 'bbq04', '5', '');

INSERT INTO `orderdetails` (orderid, itemid1, qty1, remarks)
VALUES
('2', 'bbq01', '4', 'Contact 93208372 Carrot for collection');
# ----------------------------------------------------
# create payment database
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