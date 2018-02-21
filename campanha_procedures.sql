delimiter //
	create procedure sp_add_licencas(arg_nomelicenca varchar(150), arg_contato varchar(150), arg_licenca varchar(65), arg_dataexpiracao date)
		begin 
			insert into licencas(nomelicenca, contato, licenca, dataexpiracao) values (arg_nomelicenca, arg_contato, arg_licenca, arg_dataexpiracao);
		end //
delimiter ;

delimiter //
	create procedure sp_add_usuarios(arg_email varchar(50), arg_licenca int)
		begin
			insert into usuarios (email, snhpwd, licenca) values (arg_email, sha1(md5(sha1("1234"))), arg_licenca);
		end //
delimiter ;

delimiter //
	create procedure sp_login(arg_email varchar(50), arg_snhpwd varchar(64))
	begin
	select count(*) as existe from usuarios where email=arg_email and snhpwd=arg_snhpwd and ativo=1;
	end //
delimiter ;

delimiter //
	create procedure sp_login_e(arg_email varchar(50), arg_snhpwd varchar(64))
		begin
			select count(*) as existe from eleitores where email=arg_email and senha=arg_snhpwd and acesso=1;
		end //
delimiter ;

delimiter //
	create procedure sp_add_eleitores( arg_nomeeleitor varchar (50), arg_cidade varchar(45), arg_bairro varchar(50), arg_rua varchar(50), arg_numero varchar(15), arg_email varchar(50), arg_fone1 varchar(15), arg_fone2 varchar(15), arg_zap varchar(15), arg_face varchar(50), arg_licenca int, arg_cadfor int, arg_lideranca boolean)
		begin
	insert into eleitores(nomeeleitor, cidade, bairro, rua, numero, email, fone1, fone2, zap, face, licenca, cadfor, lideranca) values (arg_nomeeleitor, arg_cidade, arg_bairro, arg_rua, arg_numero, arg_email, arg_fone1, arg_fone2, arg_zap, arg_face, arg_licenca, arg_cadfor, arg_lideranca);
		end //
delimiter ;

delimiter //
	create procedure sp_add_assessor(arg_nomeeleitor varchar (50), arg_cidade varchar(45), arg_bairro varchar(50), arg_rua varchar(50), arg_numero varchar(15), arg_email varchar(50), arg_fone1 varchar(15), arg_fone2 varchar(15), arg_zap varchar(15), arg_face varchar(50), arg_licenca int, arg_cadfor int)
		begin
			insert into eleitores(nomeeleitor, cidade, bairro, rua, numero, email, fone1, fone2, zap, face, cadfor, tipoeleitor, licenca) 
				values (arg_nomeeleitor, arg_cidade, arg_bairro, arg_rua, arg_numero, arg_email, arg_fone1, arg_fone2, arg_zap, arg_face, arg_cadfor, "Liderança", arg_licenca);
		end //
delimiter ;

delimiter //
	create procedure sp_authuser(arg_usuario varchar(50))
	begin
		select usuarios.id, usuarios.email, usuarios.snhpwd, usuarios.nome, usuarios.licenca as idlicenca, licencas.licenca, licencas.nomelicenca, licencas.dataexpiracao, usuarios.ativo from usuarios usuarios inner join licencas licencas on (usuarios.licenca = licencas.id) where usuarios.email=arg_usuario;
		set @idusuario=(select id from usuarios where usuarios.email=arg_usuario);
		insert into logsistema (usuario, acao, dataacao) values (@idusuario, "Logou-se no sistema", now());
	end //
delimiter ;

-- RELATORIOS - CONSULTAS
delimiter //
	create procedure sp_autheleitor(arg_usuario varchar(50))
		begin
			SELECT eleitores.nomeeleitor as nome, eleitores.email, eleitores.id, eleitores.licenca as idlicenca, licencas.nomelicenca, licencas.dataexpiracao FROM campanha.eleitores eleitores INNER JOIN campanha.licencas licencas ON (eleitores.licenca = licencas.id) where eleitores.email=arg_usuario;
			set @idusuario=(select id from eleitores where usuarios.email=arg_usuario);
			insert into logsistema (usuario, acao, dataacao) values (@idusuario, "Logou-se no sistema", now());
		end //
delimiter ;

delimiter //
	create procedure sp_getresume(arg_licenca int)
		begin
			select count(*) as total from eleitores where licenca=arg_licenca;
		end //
delimiter ;

delimiter //
	create procedure sp_getbairros(arg_licenca int)
		begin
			select distinct(bairro) as bairros from eleitores where licenca=arg_licenca;
		end //
delimiter ;

delimiter //
	create procedure sp_getcidades(arg_licenca int)
		begin
			select distinct(cidade) as cidades from eleitores where licenca=arg_licenca;
		end //
delimiter ;

create view equipes as
SELECT email as email, id as id, nome as nome, licenca as licenca FROM usuarios where ativo=1
      union
SELECT email as email, id as id, nomeeleitor as nome, licenca as licenca FROM eleitores where acesso=1;

delimiter //
	create procedure sp_selmessageto(arg_licenca int)
		begin
			select * from equipes where licenca=arg_licenca;
		end //
delimiter ;
-- altrações MENSAGENS
delimiter //
	create procedure sp_sel_membros(arg_licenca int)
	begin
		SELECT eleitores.id, eleitores.nomeeleitor as nome, eleitores.licenca
		FROM eleitores where eleitores.licenca=arg_licenca
			UNION
		SELECT usuarios.id, usuarios.nome, usuarios.licenca
		FROM usuarios where usuarios.licenca=arg_licenca;
	end //
delimiter ;

call sp_add_licencas("licença de testes", "Developer", sha1(md5(md5("teste"))), "2018-12-31");
call sp_add_licencas("Licença 2", "testes", sha1(md5(md5("teste2"))), "2018-01-30");
call sp_add_licencas("Alexandre", "Alex", sha1(md5(md5("lele"))), "2018-01-30");
call sp_add_licencas("Demostração do Sistema", "Demostração", sha1(md5(md5("demo"))), "2018-01-30");

call sp_add_usuarios("root",1);
call sp_add_usuarios("teste", 2);
call sp_add_usuarios("Alexandre", 3);
call sp_add_usuarios("demo", 4);
update usuarios set ativo=1;
