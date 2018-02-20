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

create table current_system(
nomesistema varchar(50) primary key,
versao double(4,2),
emailcriador varchar(50))engine=innodb charset=utf8;

insert into current_system (nomesistema, versao, emailcriador) values
("Agenda Anubis", "1.0", "daniel.santos.ap@gmail.com") ;

create table licencas (
id int auto_increment,
nomelicenca varchar(150),
contato varchar(150),
licenca varchar(65),
dataexpiracao date,
primary key(id),
unique(licenca))engine=innodb charset=utf8;

create table licenca_config(
id int auto_increment,
licenca int,
campanha varchar(50),
tipo enum("municipal", "estadual"),
primary key(id),
foreign key(licenca) references licencas(id))engine=innodb charset=utf8; 

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

create table permissions(
id int auto_increment,
usuario int,
cadastro boolean,
relatorio boolean,
mapa boolean,
primary key(id),
foreign key(usuario)references usuarios(id))engine=innodb charset=utf8;

create table segmento(
id int auto_increment,
nomesegmento varchar(50),
licenca int,
tipo varchar(25) default "particular",
primary key(id),
foreign key(licenca) references licencas(id))engine=innodb charset=utf8;

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
licenca int,
primary key(id),
-- check(JSON_VALID(atributos)),
foreign key(licenca) references licencas(id)) engine=innodb charset=utf8;

create table eleitores(
id int auto_increment,
nomeeleitor varchar(50),
cidade varchar(45),
bairro varchar(50),
rua varchar(50),
numero varchar(15),
email varchar(50),
acesso boolean default 0,
senha varchar(64),
fone1 varchar(15),
fone2 varchar(15),
zap varchar(15),
face varchar(50),
cadfor int,
tipoeleitor varchar(35) default "eleitor",
lideranca boolean default 0,
licenca int,
primary key(id),
foreign key(licenca) references licencas(id))engine=innodb charset=utf8;

create table perfil(
id int auto_increment,
usuario int,
primary key(id),
foreign key(usuario) references usuarios(id),
foreign key(usuario) references eleitores(id))engine=innodb charset=utf8;

-- alter table eleitores add column lideranca boolean default 0;
create table atividade(
id int auto_increment,
nomeatividade varchar(60),
descricao text,
licenca int,
primary key(id))engine=innodb charset=utf8; 

create table projeto_eleitor(
id int auto_increment,
projeto int,
eleitor int,
primary key(id))engine=innodb charset=utf8;

-- alter table eleitores add column tipoeleitor varchar(35);
-- alter table eleitores add column senha varchar(64);
-- alter table eleitores add column acesso boolean;
-- alter table eleitores add column cadfor int;

-- alter table eleitores add column cadfor int;

-- alterações do banco de dados da campanha eleitoral
-- data alterações 22/01/2018

create table mensagens(
id bigint auto_increment,
sender int,
receiver int,
messageopen boolean,
messagetext text,
messagedel boolean default 0,
messagecontext varchar(30),
primary key(id))engine=innodb charset=utf8;

create table tarefas(
id int auto_increment,
nometarefa varchar(50),
creator int,
porcentagem int(3) default 0,
inicio date,
fim date,
descricao text,
concluida boolean default 0,
primary key(id))engine=innodb charset=utf8;

delimiter //
	create procedure sp_add_messages()
delimiter ;

