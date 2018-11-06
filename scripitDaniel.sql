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

create view produto_index as select
	a.id_produto as id,
    a.nome_produto as nome,
    a.descr_resumido as descr,
    a.preco_venda as preco,
    b.img as img,
	c.nome_cat as categoria
from tb_produto a join tb_imagem b join tb_categoria on a.id_produto = b.tb_produto_id_produto and c.id_categoria = a.tb_categoria_id_Categoria;