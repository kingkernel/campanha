create database campanha character set=utf8;

use campanha;

create table logsistema(
id int auto_increment,
usuario int,
acao text,
dataacao datetime,
primary key(id))engine=innodb charset=utf8;

create table administracao(
id int auto_increment,
administradores varchar(50),
snhpwd varchar(64),
ativo boolean default 0,
primary key(id))engine=innodb charset=utf8;

create table licencas (
id int auto_increment,
nomelicenca varchar(150),
contato varchar(150),
licenca varchar(65),
dataexpiracao date,
primary key(id),
unique(licenca))engine=innodb charset=utf8;

create table usuarios(
id int auto_increment,
email varchar(50),
snhpwd varchar(64),
ativo boolean default 0,
nome varchar(30),
licenca int,
atributos varchar(1024), -- json com algumas informações da companhia
primary key(id),
unique(email),
foreign key(licenca) references licencas(id) -- ,
-- check(JSON_VALID(atributos))
)engine=innodb charset=utf8;

insert into usuarios (email, nome, snhpwd) values ("root", "Administrador", sha1(md5(sha1("1234"))));

delimiter //
	create procedure sp_login(arg_email varchar(50), arg_snhpwd varchar(64))
	begin
		select count(*) as existe from usuarios where email=arg_email and snhpwd=arg_snhpwd and ativo=1;
	end //
delimiter ;

create table segmento(
id int auto_increment,
nomesegmento varchar(50),
licenca int,
tipo varchar(25) default "particular",
primary key(id))engine=innodb charset=utf8;

create table estados (
id int auto_increment,
nomeestado varchar(45),
sigla varchar(2),
primary key(id),
unique(sigla))engine=innodb charset=utf8;

create table cidades (
id int auto_increment,
nomecidade varchar(45),
sigla varchar(2),
primary key(id),
foreign key(sigla) references estados(sigla))engine=innodb charset=utf8;

create table bairros(
id int auto_increment,
nomebairro varchar(50),
cidade int,
foreign key(cidade) references cidades(id),
primary key(id))engine=innodb charset=utf8;

create table logradouro (
id int auto_increment,
nomelogradouro varchar(100),
cep varchar(9),
primary key(id),
cidade int,
bairro int,
unique(cep)) engine=innodb charset=utf8;

create table contato(
id int auto_increment,
nome varchar(50),
cidade varchar(45),
bairro varchar(50),
logradouro varchar(100),
numero varchar(15),
atributos varchar(1024),
-- oculto
licenca varchar(65),
primary key(id),
-- check(JSON_VALID(atributos)),
foreign key(licenca) references licencas(licenca)) engine=innodb charset=utf8;

create table tarefas(
id int auto_increment,
nometarefa varchar(45),
descricao text,
creator int,
datainicio date,
datatermino date,
porcentagem int(3),
finalizada boolean,
licenca varchar(64),
primary key(id),
foreign key (creator) references usuarios(id),
foreign key (licenca) references licencas(licenca))engine=innodb charset=utf8;

create table eleitores(
id intauto_increment,
nomeeleitor varchar (50),
cidade varchar(45),
bairro varchar(50),
rua varchar(50)
numero varchar(15),
email varchar(50),
fone1 varchar(15),
fone2 varchar(15),
zap varchar(15),
face varchar(50),
licenca varchar(65),
primary key(id)
foreign key(licenca) references licencas(licenca))engine=innodb charset=utf8;
