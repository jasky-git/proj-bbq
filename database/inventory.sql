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

INSERT INTO `inventory` (itemid, name, description, cost, qty)
VALUES 
('bbq01', 'Premium Cup Otah (Raw)', 'Fresh mixed fish, coconut milk, chilli paste, in house secret recipe chilli paste spices, salt & sugar.','13.00', '5'),
('bbq02', 'Chicken Satay (Raw)', 'Chicken thigh meat, cumin seeds, turmeric, coriander seeds, onion, garlic, brown sugar, salt & herbs.','12.50', '10'),
('bbq03', 'Buffalo Chicken Wing (Smoke)', 'Mid joint chicken wing, homemade smoke BBQ sauce, garlic and sesame oil.','14.40', '20'),
('bbq04', 'Chicken Chop (BBQ)', 'Boneless chicken thigh, homemade BBQ Sauce, herbs and sesame oil.','17.00', '30'),
('bbq05', 'Ketupat', 'Fragrance rice.','2.00', '100');
