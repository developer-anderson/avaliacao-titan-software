create database titan;
use titan;
create table if not exists produtos (
 `product_id` int(11) not null auto_increment primary key, 
 `name` varchar(100) not null,
  `color` varchar(20) not null
);
create table if not exists precos (
 `price_id` int(11) not null auto_increment primary key, 
 `price` float(5,2) not null
);