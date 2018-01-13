create database campanha character set=utf8;

use campanha;

create table licencas (
id int auto_increment,
nomelicenca varchar(150),
contato varchar(150),
licenca varchar(65),
dataexpiracao date,
primary key(id))engine=innodb charset=utf8;

create table usuarios(
id int auto_increment,
email varchar(50),
nome varchar(30),
atributos varchar(1024),
atributos JSON,
primary key(id),
unique(email))engine=innodb charset=utf8;
