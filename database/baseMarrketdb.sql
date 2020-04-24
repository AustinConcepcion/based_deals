drop database if exists basedDealsdb;

create database basedDealsdb;

use basedDealsdb;

create table user_account (
    username varchar(30) not null unique,
    uid int(8) not null auto_increment,
    name varchar(30),
    email varchar(30),
    password varchar(250),
    address varchar(100),
    creditInfo varchar(50),
    dateCreated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    shopkeeper boolean,
    primary key (uid)
);



create table product (
    productname varchar(256),
    price float(7,2),
    productPic varchar(256),
    description varchar(512),
    category varchar(30),
    isActive boolean not null default true,
    pid int(8) not null auto_increment,
    primary key (pid)
);

create table product_order (
    discount float(2,1) not null,
    orderId int(8) not null auto_increment,
    uid int(8) not null,
    pid int(8) not null,
    dateCreated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    primary key (orderId),
    foreign key (uid) references user_account(uid),
    foreign key(pid) references product(pid)
);

create table discount_group (
    orderId int(8) not null,
    uid int(8) not null,
    isActive boolean not null default 1,
    primary key (orderId, uid),
    foreign key (orderId) references product_order(orderId),
    foreign key (uid) references user_account(uid)
);

insert into product (productname, price, productPic, description, category) values("Yankee Candle Large Jar Candle Midsummer's Night", 20.99,
"https://images-na.ssl-images-amazon.com/images/I/81idxwhmJzL._AC_SY450_.jpg",
"Smells good yummy but do not eat it facts", "houseware");

insert into product (productname, price, productPic, description, category) values("Bath & Body Works, Aromatherapy Stress Relief 3-Wick Candle, Eucalyptus Spearmint", 30.47,
"https://images-na.ssl-images-amazon.com/images/I/61ALTSt9nZL._AC_SL1500_.jpg",
"Smells good yummy but do not eat it facts", "houseware");

insert into product (productname, price, productPic, description, category) values("Bath & Body Works White Barn 3-Wick Candle in Mahogany Teakwood High Intensity", 33.79,
"https://images-na.ssl-images-amazon.com/images/I/61cgxCeqCML._AC_SL1500_.jpg",
"Smells good yummy but do not eat it facts", "houseware");


DELIMITER $$    
DROP EVENT IF EXISTS close_expired_groups $$
CREATE EVENT close_expired_groups
	ON SCHEDULE EVERY 1 DAY
	STARTS (CURDATE() + INTERVAL 0 SECOND + INTERVAL 1 DAY)
    ON COMPLETION PRESERVE DO
    BEGIN
		UPDATE discount_group g
        INNER JOIN product_order o
        ON g.orderId = o.orderId
			SET g.isActive = 0,
				o.discount = CASE 
					WHEN (SELECT COUNT(*) AS group_members
						FROM discount_group d
						WHERE d.orderId = o.orderId
						) < 5 
						THEN 0
					WHEN group_members >= 5 AND group_members < 10
						THEN 5
					WHEN group_members >= 10
						THEN 10
				END
        WHERE o.dateCreated <= (CURDATE() + INTERVAL 0 SECOND - INTERVAL 7 DAY);
	END $$
