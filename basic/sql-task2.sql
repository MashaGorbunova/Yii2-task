/*
create database and 5 tables with PK and FK
table waiter: PK - id;
table dish: PK - id;
table numberOrder: PK - id;
table orders: PK - id, FK - orders;
table service: PK - order_id, FK - order_id, waiter_id;
*/
CREATE DATABASE cafe;
USE cafe;
CREATE TABLE waiter (id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL, waiter_name VARCHAR(20) NOT NULL) ENGINE=INNODB DEFAULT CHARSET=utf8;
CREATE TABLE dish (id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL, dish_name VARCHAR(20) NOT NULL, dish_category VARCHAR(20) NOT NULL) ENGINE=INNODB DEFAULT CHARSET=utf8;
CREATE TABLE numberOrder (id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL, number_order INT (11) NOT NULL UNIQUE) ENGINE=INNODB DEFAULT CHARSET=utf8;
CREATE TABLE orders (id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL, orders INT(11) NOT NULL, FOREIGN KEY (orders) REFERENCES numberOrder (id), dish_id INT(11) NOT NULL, FOREIGN KEY (dish_id) REFERENCES dish (id)) ENGINE=INNODB DEFAULT CHARSET=utf8;
CREATE TABLE service (order_id INT(11) PRIMARY KEY NOT NULL UNIQUE, FOREIGN KEY (order_id) REFERENCES numberOrder(id), waiter_id INT(11) NOT NULL, FOREIGN KEY (waiter_id) REFERENCES waiter(id)) ENGINE=INNODB DEFAULT CHARSET=utf8;

/* fill in data table dish */
INSERT INTO dish (dish_name, dish_category) VALUES ('оливье', 'салат');
INSERT INTO dish (dish_name, dish_category) VALUES ('мимоза', 'салат');
INSERT INTO dish (dish_name, dish_category) VALUES ('шуба', 'салат');
INSERT INTO dish (dish_name, dish_category) VALUES ('цезарь', 'салат');
INSERT INTO dish (dish_name, dish_category) VALUES ('весенний', 'салат');
INSERT INTO dish (dish_name, dish_category) VALUES ('куриный бульйон', 'первые блюда');
INSERT INTO dish (dish_name, dish_category) VALUES ('красный борщ', 'первые блюда');
INSERT INTO dish (dish_name, dish_category) VALUES ('суп-харчо', 'первые блюда');
INSERT INTO dish (dish_name, dish_category) VALUES ('щи', 'первые блюда');
INSERT INTO dish (dish_name, dish_category) VALUES ('гаспаччо', 'первые блюда');
INSERT INTO dish (dish_name, dish_category) VALUES ('мясо по-французки', 'основные блюда');
INSERT INTO dish (dish_name, dish_category) VALUES ('медальйоны из говядины', 'основные блюда');
INSERT INTO dish (dish_name, dish_category) VALUES ('стейк из лосося', 'основные блюда');
INSERT INTO dish (dish_name, dish_category) VALUES ('запеченая форель', 'основные блюда');
INSERT INTO dish (dish_name, dish_category) VALUES ('куриный шашлык', 'основные блюда');
INSERT INTO dish (dish_name, dish_category) VALUES ('рис с овощами', 'гарнир');
INSERT INTO dish (dish_name, dish_category) VALUES ('картофель по-домашнему', 'гарнир');
INSERT INTO dish (dish_name, dish_category) VALUES ('запеченые овощи', 'гарнир');
INSERT INTO dish (dish_name, dish_category) VALUES ('сырники', 'десерт');
INSERT INTO dish (dish_name, dish_category) VALUES ('блины с творогом', 'десерт');
INSERT INTO dish (dish_name, dish_category) VALUES ('штрудель с яблоками', 'десерт');
INSERT INTO dish (dish_name, dish_category) VALUES ('мороженое', 'десерт');
INSERT INTO dish (dish_name, dish_category) VALUES ('минеральная вода', 'напитки');
INSERT INTO dish (dish_name, dish_category) VALUES ('сок', 'напитки');
INSERT INTO dish (dish_name, dish_category) VALUES ('пиво', 'напитки');
INSERT INTO dish (dish_name, dish_category) VALUES ('красное вино', 'напитки');
INSERT INTO dish (dish_name, dish_category) VALUES ('белое вино', 'напитки');

/* fill in data table waiter */
INSERT INTO waiter (waiter_name) VALUES ('Иван');
INSERT INTO waiter (waiter_name) VALUES ('Антон');
INSERT INTO waiter (waiter_name) VALUES ('Александр');
INSERT INTO waiter (waiter_name) VALUES ('Сергей');
INSERT INTO waiter (waiter_name) VALUES ('Леонид');
INSERT INTO waiter (waiter_name) VALUES ('Елена');
INSERT INTO waiter (waiter_name) VALUES ('Ольга');
INSERT INTO waiter (waiter_name) VALUES ('Любовь');
INSERT INTO waiter (waiter_name) VALUES ('Надежда');
INSERT INTO waiter (waiter_name) VALUES ('Вера');

/* fill in data table numberOrder */
insert into numberOrder (number_order) values (1);
INSERT INTO numberOrder (number_order) VALUES (2);
INSERT INTO numberOrder (number_order) VALUES (3);
INSERT INTO numberOrder (number_order) VALUES (4);
INSERT INTO numberOrder (number_order) VALUES (5);
INSERT INTO numberOrder (number_order) VALUES (6);
INSERT INTO numberOrder (number_order) VALUES (7);
INSERT INTO numberOrder (number_order) VALUES (8);
INSERT INTO numberOrder (number_order) VALUES (9);
INSERT INTO numberOrder (number_order) VALUES (10);

/* fill in data table orders */
INSERT INTO orders (orders, dish_id) VALUES (1, 2);
INSERT INTO orders (orders, dish_id) VALUES (1, 11);
INSERT INTO orders (orders, dish_id) VALUES (1, 24);
INSERT INTO orders (orders, dish_id) VALUES (2, 2);
INSERT INTO orders (orders, dish_id) VALUES (2, 8);
INSERT INTO orders (orders, dish_id) VALUES (2, 19);
INSERT INTO orders (orders, dish_id) VALUES (3, 5);
INSERT INTO orders (orders, dish_id) VALUES (3, 16);
INSERT INTO orders (orders, dish_id) VALUES (3, 15);
INSERT INTO orders (orders, dish_id) VALUES (3, 25);
INSERT INTO orders (orders, dish_id) VALUES (4, 25);
INSERT INTO orders (orders, dish_id) VALUES (5, 25);
INSERT INTO orders (orders, dish_id) VALUES (6, 9);
INSERT INTO orders (orders, dish_id) VALUES (6, 12);
INSERT INTO orders (orders, dish_id) VALUES (7, 22);
INSERT INTO orders (orders, dish_id) VALUES (7, 19);
INSERT INTO orders (orders, dish_id) VALUES (8, 26);
INSERT INTO orders (orders, dish_id) VALUES (8, 11);
INSERT INTO orders (orders, dish_id) VALUES (9, 4);
INSERT INTO orders (orders, dish_id) VALUES (9, 13);
INSERT INTO orders (orders, dish_id) VALUES (9, 27);
INSERT INTO orders (orders, dish_id) VALUES (10, 18);
INSERT INTO orders (orders, dish_id) VALUES (10, 25);

/* fill in data table service */
insert into service (order_id, waiter_id) values (1, 10);
INSERT INTO service (order_id, waiter_id) VALUES (2, 5);
INSERT INTO service (order_id, waiter_id) VALUES (3, 4);
INSERT INTO service (order_id, waiter_id) VALUES (4, 10);
INSERT INTO service (order_id, waiter_id) VALUES (5, 2);
INSERT INTO service (order_id, waiter_id) VALUES (6, 1);
INSERT INTO service (order_id, waiter_id) VALUES (7, 2);
INSERT INTO service (order_id, waiter_id) VALUES (8, 10);
INSERT INTO service (order_id, waiter_id) VALUES (9, 5);
INSERT INTO service (order_id, waiter_id) VALUES (10, 10);

/* add col with cost in table dish for 3 task */
ALTER TABLE dish ADD dish_cost DOUBLE(6,2) NOT NULL; 

/* add values in col cost in table dish */
update dish set dish_cost='32.5' where id=1;
UPDATE dish SET dish_cost='30.0' WHERE id=2;
UPDATE dish SET dish_cost='30.5' WHERE id=3;
UPDATE dish SET dish_cost='46.0' WHERE id=4;
UPDATE dish SET dish_cost='22.0' WHERE id=5;
UPDATE dish SET dish_cost='17.0' WHERE id=6;
UPDATE dish SET dish_cost='19.5' WHERE id=7; 
UPDATE dish SET dish_cost='18.0' WHERE id=8;
UPDATE dish SET dish_cost='18.0' WHERE id=9;
UPDATE dish SET dish_cost='20.5' WHERE id=10;
UPDATE dish SET dish_cost='51.0' WHERE id=11;
UPDATE dish SET dish_cost='53.0' WHERE id=12;
UPDATE dish SET dish_cost='55.5' WHERE id=13;
UPDATE dish SET dish_cost='48.0' WHERE id=14;
UPDATE dish SET dish_cost='47.5' WHERE id=15;
UPDATE dish SET dish_cost='14.0' WHERE id=16;
UPDATE dish SET dish_cost='12.0' WHERE id=17;
UPDATE dish SET dish_cost='13.5' WHERE id=18;
UPDATE dish SET dish_cost='21.0' WHERE id=19;
UPDATE dish SET dish_cost='18.0' WHERE id=20;
UPDATE dish SET dish_cost='18.0' WHERE id=21;
UPDATE dish SET dish_cost='20.5' WHERE id=22;
UPDATE dish SET dish_cost='10.0' WHERE id=23;
UPDATE dish SET dish_cost='12.5' WHERE id=24;
UPDATE dish SET dish_cost='15.0' WHERE id=25;
UPDATE dish SET dish_cost='20.0' WHERE id=26;
UPDATE dish SET dish_cost='20.0' WHERE id=27;





