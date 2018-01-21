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

delimiter //
	create procedure sp_add_licencas(arg_nomelicenca varchar(150), arg_contato varchar(150), arg_licenca varchar(65), arg_dataexpiracao date)
		begin 
			insert into licencas(nomelicenca, contato, licenca, dataexpiracao) values (arg_nomelicenca, arg_contato, arg_licenca, arg_dataexpiracao);
		end //
delimiter ;

call sp_add_licencas("licença de testes", "Developer", sha1(md5(md5("teste"))), "2018-12-31");
call sp_add_licencas("Licença 2", "testes", sha1(md5(md5("teste2"))), "2018-01-30");

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

delimiter //
	create procedure sp_add_usuarios(arg_email varchar(50), arg_licenca int)
		begin
			insert into usuarios (email, snhpwd, licenca) values (arg_email, sha1(md5(sha1("1234"))), arg_licenca);
		end //
delimiter ;

insert into usuarios (email, nome, snhpwd, licenca) values ("root", "Administrador", sha1(md5(sha1("1234"))), 1); 
call sp_add_usuarios("teste", 2);
update usuarios set ativo=1;

delimiter //
	create procedure sp_login(arg_email varchar(50), arg_licenca int)
	begin
		select count(*) as existe from usuarios where email=arg_email and snhpwd=arg_snhpwd and ativo=1;
	end //
delimiter ;

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

create table tarefas(
id int auto_increment,
nometarefa varchar(45),
descricao text,
creator int,
datainicio date,
datatermino date,
porcentagem int(3),
finalizada boolean,
licenca int,
primary key(id),
foreign key (creator) references usuarios(id),
foreign key (licenca) references licencas(id))engine=innodb charset=utf8;

create table eleitores(
id int auto_increment,
nomeeleitor varchar(50),
cidade varchar(45),
bairro varchar(50),
rua varchar(50),
numero varchar(15),
email varchar(50),
fone1 varchar(15),
fone2 varchar(15),
zap varchar(15),
face varchar(50),
licenca int,
primary key(id),
foreign key(licenca) references licencas(id))engine=innodb charset=utf8;

-- procedure de adição de eleitores
delimiter //
	create procedure sp_add_eleitores( arg_nomeeleitor varchar (50), arg_cidade varchar(45), arg_bairro varchar(50), arg_rua varchar(50), arg_numero varchar(15), arg_email varchar(50), arg_fone1 varchar(15), arg_fone2 varchar(15), arg_zap varchar(15), arg_face varchar(50), arg_licenca varchar(65))
		begin
	insert into eleitores(nomeeleitor, cidade, bairro, rua, numero, email, fone1, fone2, zap, face, licenca) values (arg_nomeeleitor, arg_cidade, arg_bairro, arg_rua, arg_numero, arg_email, arg_fone1, arg_fone2, arg_zap, arg_face, arg_licenca);
		end //
delimiter ;

delimiter //
	create procedure sp_authuser(arg_usuario varchar(50))
	begin
		select usuarios.id, usuarios.email, usuarios.snhpwd, usuarios.nome, usuarios.licenca as idlicenca, licencas.licenca, licencas.nomelicenca, licencas.dataexpiracao, usuarios.ativo from campanha.usuarios usuarios inner join campanha.licencas licencas on (usuarios.licenca = licencas.id) where usuarios.email=arg_usuario;
		set @iduser=(select usuarios.id from usuarios where usuarios.email=arg_usuario);
		insert into logsistema (usuario, acao, dataacao) values (@iduser, "Logou-se no sistema", now());
	end //
delimiter ;

delimiter //
	create procedure sp_log()
		begin
		a
		end //
delimiter ;

