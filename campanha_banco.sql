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
licenca int,
atributos varchar(1024), -- json com algumas informações da companhia
primary key(id),
unique(email),
foreign key(licenca) references licencas(id),
check(JSON_VALID(atributos))
)engine=innodb charset=utf8;

create table segmento(
id int auto_increment,
nomesegmento varchar(50),
licenca int,
tipo varchar(25),
primary key(id))engine=innodb charset=utf8;
