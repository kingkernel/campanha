-- #####################################################################
--				Banco de dados da Agenda Anubis \\ CAMPANHA ELEITORAL //
--				Data criação: 10/01/2018
--				AltEração: 09/05/2018
--				Autor: daniel.santos.ap@gmail.com
-- #####################################################################
create database campanha character set=utf8;

use campanha;
-- ignore as duas linhas em hospedagens

-- #####################################################################
-- tabela de error router 
-- quando algo é digitado fora do caminho normal
-- #####################################################################
create table errorrouter(
id bigint auto_increment,
urldigitada varchar(200),
momento datetime,
usuario varchar(50),
primary key(id))engine=innodb charset=utf8;
-- #####################################################################
-- tabela de bugs 
-- bugs relatados pelos usuarios
-- #####################################################################
create table reportbugs(
id bigint auto_increment,
bug text,
momento datetime,
usuario varchar(50),
primary key(id))engine=innodb charset=utf8;
-- #####################################################################
-- tabela de log do sistema
-- informações gerais do sistema
-- #####################################################################
create table logsistema(
id int auto_increment,
usuario int,
acao text,
dataacao datetime,
primary key(id))engine=innodb charset=utf8;
-- #####################################################################
-- tabela de administração do sistema [logins administrativos]
-- #####################################################################
create table administracao(
id int auto_increment,
administradores varchar(50),
snhpwd varchar(64),
ativo boolean default 0,
nivel varchar(35) default "programador",
primary key(id))engine=innodb charset=utf8;
-- (programador, vendedor, partido);

create table current_system(
nomesistema varchar(50) primary key,
versao double(4,2),
emailcriador varchar(50))engine=innodb charset=utdf8;

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
tipo enum("municipal", "estadual", "site-eleitor") default "municipal",
mapkey varchar(40),
responsavel varchar(50),
primary key(id),
foreign key(licenca) references licencas(id))engine=innodb charset=utf8; 

-- AIzaSyD5PEcj6kLmlUT7tugLOy9wGygX_ptWGUY - mykey maps
-- TABELA DE TIPO DE USUARIOS --Y
create table tipousuario(
tipousuario varchar(35) primary key)engine=innodb charset=utf8;

insert into tipousuario (tipousuario) values ("simpatizante"), ("candidato"), ("assessor"), ("coordenador"), ("Diretor Partidário");

create table usuarios(
id int auto_increment,
email varchar(50),
snhpwd varchar(64),
ativo boolean default 0,
nome varchar(30),
licenca int,
atributos varchar(1024), -- json com algumas informações da companhia
tipousuario varchar(35) default "simpatizante",
primary key(id),
unique(email),
foreign key (tipousuario) rerferences tipousuario(tipousuario),
foreign key(licenca) references licencas(id) -- ,
-- check(JSON_VALID(atributos))
)engine=innodb charset=utf8;
-- tipo de usuario (candidato, simpatizante, assessor)

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
siglaestado varchar(2),
ativo boolean default 0,
primary key(id),
unique(sigla))engine=innodb charset=utf8;

insert into estados (nomeestado, sigla) values ("Acre", "AC"),("Alagoas", "AL"),("Amapá", "AP"),("Amazonas", "AM"),("Bahia", "BA"),("Ceará", "CE"),("Distrito Federal", "DF"),("Espírito Santo", "ES"),("Goiás", "GO"),("Maranhão", "MA"),("Mato Grosso", "MT"),("Mato Grosso do Sul", "MS"),("Minas Gerais", "MG"),("Pará", "PA"),("Paraíba", "PB"),("Paraná", "PR"),("Pernambuco", "PE"),("Piauí", "PI"),("Rio de Janeiro", "RJ"),("Rio Grande do Norte", "RN"),("Rio Grande do Sul", "RS"),("Rondônia", "RO"),("Roraima", "RR"),("Santa Catarina", "SC"),("São Paulo", "SP"),("Sergipe", "SE"),("Tocantins", "TO");

create table cidades (
id int auto_increment,
nomecidade varchar(45),
sigla varchar(2),
ativo boolean default 0,
primary key(id),
foreign key(sigla) references estados(sigla))engine=innodb charset=utf8;

insert into cidades (nomecidade, sigla) values ("Macapá", "MCP");

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

create table niveis(
nivel varchar(35),primary key,
sigla varchar(2))engine=innodb charset=utf8;

insert into niveis(nivel, sigla)values ("Dirigentes", "DR"), ("Lideres", "LD"),
("Multiplicadores", "MP"), ("Apoiadores", "AP"), ("Porta-Voz", "PV");

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
unique(email),
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

create table mensagens(
id bigint auto_increment,
sender int,
receiver int,
messageopen boolean default 0,
messagetext text,
messagedel boolean default 0,
messagecontext varchar(30),
primary key(id))engine=innodb charset=utf8;

create table message_group(
id int auto_increment,
nomegroup varchar(100),
licenca int,
criador int,
primary key(id),
foreign key(licenca) references licencas(id),
foreign key(criador) references usuarios(id),
foreign key(criador) references eleitores(id))engine=innodb charset=utf8;
 
create table msggroup_members(
id int auto_increment,
grupo int,
membro int,
primary key(id),
foreign key(grupo) references message_group(id),
foreign key(membro) references usuarios(id),
foreign key(membro) references eleitores(id))engine=innodb charset=utf8;
-- novas alterações
create table trackinuser(
id bigint auto_increment,
userid int,
cordenadas varchar(300),
primary key(id),
foreign key(userid) references usuarios(id))engine=innodb charset=utf8;

create table classication(
id int auto_increment,
campanha int,
primary key(id))engine=innodb charset=utf8;

alter table administracao add column nivel varchar(35) default "simpatizante";
alter table licenca_config add column responsavel varchar(50),
alter table estados add column ativo boolean default 0;
alter table cidades add column ativo boolean default 0;
alter table cidades change sigla siglaestado varchar(2);
alter table usuarios add column tipousuario varchar(35) default "simpatizante",

create table receita()engine=innodb charset=utf8;
