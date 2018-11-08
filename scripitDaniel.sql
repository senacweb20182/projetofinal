create database progweb;
use progweb;

-- -----------------------------------------------------
-- Table `progweb`.`tb_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `progweb`.`tb_usuarios` (
  `id_usuario` INT(11) PRIMARY KEY auto_increment,
  `nome` VARCHAR(255) NOT NULL unique,
  `email` VARCHAR(50) NOT NULL unique,
  `login` VARCHAR(45) NOT NULL unique,
  `senha` VARCHAR(50) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `cpf` VARCHAR(14) NOT NULL unique,
  `celular` varchar(50)not null unique,
  `cep` varchar(50)not null,
  `bairro` varchar(50)not null,
  `cidade` varchar(50)not null,
  `rua` varchar(250)not null,
  `numero` varchar(250)not null,
  `complemento` varchar(250),
  `tb_perfil_id_perfil` INT(10) NOT NULL,
);

 "insert into tb_usuarios(nome,email, login, senha, data_nasc, cpf, celular, cep, bairro, cidade, uf, rua, numero, complemento)
 values 
('$nome', '$email', '$login', '$senha', '$data_nasc', '$cpf', '$telefone', $cep, $bairro, $cidade, $uf, $rua, $numero, $complemento)";

SELECT * FROM progweb.tb_usuarios;

insert into tb_usuarios
(nome,email, login, senha, data_nasc,cpf, celular) 
values
('$nome', '$email', '$login', '$senha', '$data_nasc', '$cpf', '$telefone');

select * from tb_usuarios;
delete from tb_usuarios where id < 10;
ALTER TABLE tb_usuarios ADD email VARCHAR(50) NULL; 


insert into tb_perfil(id_perfil, descricao) values (1, 'admim');

DROP PROCEDURE IF EXISTS insere_contato;
DELIMITER ;;
CREATE PROCEDURE insere_contato(pnome varchar(255), pemail varchar(50), plogin varchar (45), psenha varchar(50), pdata date, pcpf varchar(14), 
								ptel varchar(13), pcep varchar(10), pbairro varchar(45), pcidade varchar(8), prua varchar(50), pnum int(11), pcompl varchar(45))
BEGIN
	DECLARE teste bool DEFAULT 0;
    DECLARE  CONTINUE handler for sqlexception set teste = 1;
    start transaction;
		insert into tb_usuarios (nome, data_nasc, cpf, email, login, senha, tb_perfil_id_perfil) values (pnome, pdata, pcpf, pemail, plogin, psenha, 1);
		insert into tb_cidades(cod_cidade) select * from (select pcidade ) AS tmp where not exists( select cod_cidade from tb_cidades where cod_cidade = pcidade COLLATE utf8_unicode_ci) LIMIT 1;
		insert into tb_telefones(celular) select * from (select ptel) AS tmp where not exists( select celular from tb_telefones where celular = ptel COLLATE utf8_unicode_ci) LIMIT 1;
		insert into tb_bairros(bairro) select * from (select pbairro) AS tmp where not exists( select bairro from tb_bairros where bairro = pbairro COLLATE utf8_unicode_ci) LIMIT 1;
		SET @CID = (select id_cidade from tb_cidades where cod_cidade = pcidade COLLATE utf8_unicode_ci);
		SET @TID = (select id_tel from tb_telefones where celular = ptel COLLATE utf8_unicode_ci);
		SET @BID = (select id_bairro from tb_bairros where bairro = pbairro COLLATE utf8_unicode_ci);
		SET @UID = (select id_usuario from tb_usuarios where cpf = pcpf COLLATE utf8_unicode_ci); 
		insert into tb_endereco(rua, numero, comp, cep, tb_bairros_id_bairro, tb_cidades_id_cidade, tb_usuarios_id_usuario) values (prua, pnum, pcompl, pcep, @BID, @CID, @UID);
		insert into tb_usuarios_has_tb_telefones (tb_telefones_id_tel, tb_usuarios_id_usuario) values (@TID, @UID);
		if teste then
			select false;
			rollback;
		else
			commit;
		end if;
END ;;
DELIMITER ;

DROP PROCEDURE IF EXISTS insere_produto;
DELIMITER ;;
CREATE PROCEDURE insere_produto(pcod int(11), pnome varchar(45), pqtd int(11), pvenda float, pdesc varchar(100), pdescc varchar(200), 
								pa varchar(4), pl varchar(4), pc varchar(4), pd varchar(4), pp varchar(4), pmarca varchar(50), pcategoria varchar(50))
BEGIN
	DECLARE teste bool DEFAULT 0;
    DECLARE  CONTINUE handler for sqlexception set teste = 1;
    start transaction;
		insert into tb_categoria(nome_cat) select * from (select pcategoria ) AS tmp where not exists( select nome_cat from tb_categoria where nome_cat = pcategoria) LIMIT 1;
		insert into tb_marca(marca) select * from (select pmarca ) AS tmp where not exists( select marca from tb_marca where marca = pmarca) LIMIT 1;
		SET @CID = (select id_categoria from tb_categoria where nome_cat = pcategoria );
		SET @MID = (select id_marca from tb_marca where marca = pmarca );
		INSERT INTO tb_produto (cod_ref, nome_produto, quant, preco_venda, descr_resumido, descr_completo, altura, largura, comprimento, diametro, peso, tb_marca_id_marca, tb_categoria_id_Categoria) VALUES (pcod , pnome , pqtd , pvenda, pdesc , pdescc , pa , pl , pc , pd , pp , @MID, @CID);
		if teste then
			select false;
			rollback;
		else
			commit;
		end if;
END ;;
DELIMITER ;

DROP PROCEDURE IF EXISTS atualiza_produto;
DELIMITER ;;
CREATE PROCEDURE atualiza_produto(pid int(11), pcod int(11), pnome varchar(45), pqtd int(11), pvenda float, pdesc text,
									pdescc text, pa varchar(4), pl varchar(4), pc varchar(4), pd varchar(4), 
                                    pp varchar(4), pmarca varchar(50), pcategoria varchar(50), pfoto varchar(200))
BEGIN
	DECLARE teste bool DEFAULT 0;
    DECLARE  CONTINUE handler for sqlexception set teste = 1;
    start transaction;
		insert into tb_marca(marca) select * from (select pmarca ) AS tmp where not exists( select marca from tb_marca where marca = pmarca) LIMIT 1;
		insert into tb_categoria(nome_cat) select * from (select pcategoria ) AS tmp where not exists( select nome_cat from tb_categoria where nome_cat = pcategoria) LIMIT 1;
		SET @CID = (select id_categoria from tb_categoria where nome_cat = pcategoria );
		SET @MID = (select id_marca from tb_marca where marca = pmarca );
        UPDATE tb_produto SET
            cod_ref = pcod,
			nome_produto = pnome,
			quant = pqtd,
			preco_venda = pvenda,
			descr_resumido = pdesc,
			descr_completo = pdescc,
			altura = pa,
			largura = pl,
			comprimento = pc,
			diametro = pd,
			peso = pp,
            tb_marca_id_marca = @MID,
            tb_categoria_id_Categoria = @CID
			WHERE id_produto = pid;
		update tb_imagem set img = pfoto where tb_produto_id_Produto = pid;
        if teste then
			select false;
			rollback;
		else
			commit;
		end if;
END ;;
DELIMITER ;

create view produto_index as select
	a.id_produto as id,
    a.nome_produto as nome,
    a.descr_resumido as descr,
    a.preco_venda as preco,
    b.img as img,
	c.nome_cat as categoria
from tb_produto a join tb_imagem b join tb_categoria on a.id_produto = b.tb_produto_id_produto and c.id_categoria = a.tb_categoria_id_Categoria;

create view produto_view as select
	a.id_produto as id,
    a.nome_produto as nome,
    a.descr_completo as descr,
    a.preco_venda as preco,
    b.img as img,
	c.nome_cat as categoria,
    d.marca as marca
from tb_produto a join tb_imagem b join tb_categoria c join tb_marca d on a.id_produto = b.tb_produto_id_produto and c.id_categoria = a.tb_categoria_id_Categoria and d.id_marca = a.tb_marca_id_marca;


drop view if exists perfil_usuario;
create view perfil_usuario as select
	a.nome as nome,
    a.senha as senha,
    a.login as login,
	b.permissao as permissao,
    c.cep as cep
from tb_usuarios a join tb_perfil b join tb_endereco c on a.tb_perfil_id_perfil = b.id_perfil and a.id_usuario = c.tb_usuarios_id_usuario;

create view produto_full as select
	a.id_produto as id_produto,
    a.cod_ref as cod_ref,
    a.nome_produto as nome_produto,
    a.quant as quant,
    a.preco_venda as preco_venda,
    a.descr_resumido as descr_resumido,
    a.descr_completo as descr,
    a.altura as altura,
    a.largura as largura,
    a.comprimento as comprimento,
    a.diametro as diametro,
    a.peso as peso,
    b.img as img,
	c.nome_cat as nome_cat,
    d.marca as marca
from tb_produto a join tb_imagem b join tb_categoria c join tb_marca d on 
a.id_produto = b.tb_produto_id_produto and c.id_categoria = a.tb_categoria_id_Categoria and d.id_marca = a.tb_marca_id_marca;

DROP PROCEDURE IF EXISTS remove_produto;
DELIMITER ;;
CREATE PROCEDURE remove_produto(pid int(11))
BEGIN
	DECLARE teste bool DEFAULT 0;
    DECLARE  CONTINUE handler for sqlexception set teste = 1;
    start transaction;
		delete from tb_imagem where tb_produto_id_Produto = pid;
        delete from tb_produto where id_produto = pid;
		if teste then
			select false;
			rollback;
		else
			commit;
		end if;
END ;;
DELIMITER ;

create view usuario_full as select
	a.id_usuario as id_usuario,
    a.nome as nome,
    a.data_nasc as data_nasc,
    a.cpf as cpf,
    a.email as email,
    a.login as login,
    a.senha as senha,
    b.celular as celular,
    d.permissao as permissao,
    e.rua as rua,
    e.numero as numero,
    e.comp as comp,
    e.cep as cep,
	f.bairro as bairro,
    g.cod_cidade as cod_cidade
from tb_usuarios a join tb_telefones b join tb_usuarios_has_tb_telefones c join tb_perfil d join tb_endereco e join tb_bairros f join tb_cidades g on 
a.id_usuario = c.tb_usuarios_id_usuario and b.id_tel = c.tb_telefones_id_tel and a.tb_perfil_id_perfil = d.id_perfil and a.id_usuario = e.tb_usuarios_id_usuario and f.id_bairro = e.tb_bairros_id_bairro and g.id_cidade = e.tb_cidades_id_cidade;

DROP PROCEDURE IF EXISTS atualiza_contato;
DELIMITER ;;
CREATE PROCEDURE atualiza_contato(pid int(11), pnome varchar(255), pemail varchar(50), plogin varchar (45), psenha varchar(50), pdata date, pcpf varchar(14), 
								ptel varchar(13), pcep varchar(10), pbairro varchar(45), pcidade varchar(8), prua varchar(50), pnum int(11), pcompl varchar(45))
BEGIN
	DECLARE teste bool DEFAULT 0;
    DECLARE  CONTINUE handler for sqlexception set teste = 1;
    start transaction;
		SET @TID = (select tb_telefones_id_tel from tb_usuarios_has_tb_telefones where tb_usuarios_id_usuario = pid);
        UPDATE tb_telefones set celular = ptel where id_tel = @TID;
        UPDATE tb_usuarios set 
            nome = pnome,
            data_nasc = pdata,
            email = pemail,
            login = plogin,
            senha = psenha,
            cpf = pcpf
            where id_usuario = pid;
        insert into tb_cidades(cod_cidade) select * from (select pcidade ) AS tmp where not exists( select cod_cidade from tb_cidades where cod_cidade = pcidade) LIMIT 1;
		insert into tb_bairros(bairro) select * from (select pbairro ) AS tmp where not exists( select bairro from tb_bairros where bairro = pbairro) LIMIT 1;
		SET @CID = (select id_cidade from tb_cidades where cod_cidade = pcidade );
		SET @BID = (select id_bairro from tb_bairros where bairro = pbairro );
        UPDATE tb_endereco set
            cep = pcep,
            rua = prua,
            numero = pnum,
            comp = pcompl,
            tb_bairros_id_bairro = @BID,
            tb_cidades_id_cidade = @CID
            where tb_usuarios_id_usuario = pid;
        if teste then
			select false;
			rollback;
		else
			commit;
		end if;
END ;;
DELIMITER ;