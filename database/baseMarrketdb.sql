drop database if exists basedDealsdb;

create database basedDealsdb;

use basedDealsdb;

create table account (
    username varchar(30) not null,
    uid int(8) not null auto_increment,
    name varchar(30),
    email varchar(30),
    password varchar(20),
    dateCreated timestamp,
    shopkeeper boolean,
    primary key (uid)
)

create table product (
    productname varchar(30),
    price float(7,2),
    productPic varchar(256),
    description varchar(512),
    pid int(8) not null auto_increment,
    category varchar(30),
    primary key (pid)
);

create table group (
    orderId int(8) not null,
    uid int(8) not null,
    primary key (orderId, uid),
    foreign key (orderId)
    references order(orderId),
    foreign key (uid)
    references account(uid)
);

create table order (
    discount float(2,1) not null,
    orderId int(8) not null,
    dateCreated timestamp,
    primary key (orderId),
    foreign key (uid),
    foreign key(pid),
);
