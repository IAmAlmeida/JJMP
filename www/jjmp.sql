create database if not exists jjmp ;
use jjmp;

CREATE TABLE if not EXISTS info (
id int auto_increment unique not null ,
first_name varchar(255),
primary key(id)
);
