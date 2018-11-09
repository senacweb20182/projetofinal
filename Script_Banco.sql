-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema eat5kphk6ver00sk
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema eat5kphk6ver00sk
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `eat5kphk6ver00sk` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `eat5kphk6ver00sk` ;

-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`preview`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`preview` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `comentario` VARCHAR(255) NULL DEFAULT NULL,
  `data` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_categoria` (
  `id_categoria` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_cat` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE INDEX `nome_cat_UNIQUE` (`nome_cat` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 24
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_marca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_marca` (
  `id_marca` INT(11) NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_marca`))
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_produto` (
  `id_produto` INT(11) NOT NULL AUTO_INCREMENT,
  `cod_ref` INT(11) NOT NULL,
  `nome_produto` VARCHAR(45) NOT NULL,
  `quant` INT(11) NOT NULL,
  `preco_venda` FLOAT NOT NULL,
  `descr_resumido` TEXT NULL DEFAULT NULL,
  `descr_completo` TEXT NULL DEFAULT NULL,
  `altura` VARCHAR(4) NOT NULL,
  `largura` VARCHAR(4) NOT NULL,
  `comprimento` VARCHAR(4) NOT NULL,
  `diametro` VARCHAR(4) NOT NULL,
  `peso` VARCHAR(4) NOT NULL,
  `tb_marca_id_marca` INT(11) NOT NULL,
  `tb_categoria_id_Categoria` INT(11) NOT NULL,
  PRIMARY KEY (`id_produto`),
  UNIQUE INDEX `cod_ref_UNIQUE` (`cod_ref` ASC),
  INDEX `fk_tb_produto_tb_categoria1_idx` (`tb_categoria_id_Categoria` ASC),
  INDEX `fk_tb_produto_tb_marca1_idx` (`tb_marca_id_marca` ASC),
  CONSTRAINT `fk_tb_produto_tb_categoria1`
    FOREIGN KEY (`tb_categoria_id_Categoria`)
    REFERENCES `eat5kphk6ver00sk`.`tb_categoria` (`id_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_produto_tb_marca1`
    FOREIGN KEY (`tb_marca_id_marca`)
    REFERENCES `eat5kphk6ver00sk`.`tb_marca` (`id_marca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 30
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '								';


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_perfil` (
  `id_perfil` INT(11) NOT NULL AUTO_INCREMENT,
  `permissao` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_perfil`),
  UNIQUE INDEX `permissao_UNIQUE` (`permissao` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_usuarios` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `tb_perfil_id_perfil` INT(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC),
  INDEX `fk_tb_usuarios_tb_perfil1_idx` (`tb_perfil_id_perfil` ASC),
  CONSTRAINT `fk_tb_usuarios_tb_perfil1`
    FOREIGN KEY (`tb_perfil_id_perfil`)
    REFERENCES `eat5kphk6ver00sk`.`tb_perfil` (`id_perfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 65
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`preview_has_tb_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`preview_has_tb_produto` (
  `preview_id` INT(11) NOT NULL,
  `tb_produto_id_Produto` INT(11) NOT NULL,
  `tb_usuarios_id_usuario` INT(11) NOT NULL,
  PRIMARY KEY (`preview_id`, `tb_produto_id_Produto`, `tb_usuarios_id_usuario`),
  INDEX `fk_preview_has_tb_produto_tb_produto1_idx` (`tb_produto_id_Produto` ASC),
  INDEX `fk_preview_has_tb_produto_preview_idx` (`preview_id` ASC),
  INDEX `fk_preview_has_tb_produto_tb_usuarios1_idx` (`tb_usuarios_id_usuario` ASC),
  CONSTRAINT `fk_preview_has_tb_produto_tb_preview1`
    FOREIGN KEY (`preview_id`)
    REFERENCES `eat5kphk6ver00sk`.`preview` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_preview_has_tb_produto_tb_produto1`
    FOREIGN KEY (`tb_produto_id_Produto`)
    REFERENCES `eat5kphk6ver00sk`.`tb_produto` (`id_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_preview_has_tb_produto_tb_usuarios1`
    FOREIGN KEY (`tb_usuarios_id_usuario`)
    REFERENCES `eat5kphk6ver00sk`.`tb_usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_bairros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_bairros` (
  `id_bairro` INT(11) NOT NULL AUTO_INCREMENT,
  `bairro` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_bairro`))
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_status` (
  `id_status` INT(11) NOT NULL AUTO_INCREMENT,
  `situacao` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_status`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_venda` (
  `id_compra` INT(11) NOT NULL AUTO_INCREMENT,
  `forma_pagto` VARCHAR(45) NOT NULL,
  `data_venda` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tb_status_id_status` INT(11) NOT NULL,
  PRIMARY KEY (`id_compra`),
  INDEX `fk_tb_venda_tb_status1_idx` (`tb_status_id_status` ASC),
  CONSTRAINT `fk_tb_venda_tb_status1`
    FOREIGN KEY (`tb_status_id_status`)
    REFERENCES `eat5kphk6ver00sk`.`tb_status` (`id_status`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_carrinho_comp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_carrinho_comp` (
  `id_itens` INT(11) NOT NULL AUTO_INCREMENT,
  `quantidade` INT(10) NOT NULL,
  `preco_custo` FLOAT NOT NULL,
  `preco_unitario` FLOAT NOT NULL,
  `tb_venda_id_Compra` INT(11) NOT NULL,
  `tb_produto_id_Produto` INT(11) NOT NULL,
  PRIMARY KEY (`id_itens`, `tb_venda_id_Compra`, `tb_produto_id_Produto`),
  INDEX `fk_tb_carrinho_comp_tb_venda1_idx` (`tb_venda_id_Compra` ASC),
  INDEX `fk_tb_carrinho_comp_tb_produto1_idx` (`tb_produto_id_Produto` ASC),
  CONSTRAINT `fk_tb_carrinho_comp_tb_produto1`
    FOREIGN KEY (`tb_produto_id_Produto`)
    REFERENCES `eat5kphk6ver00sk`.`tb_produto` (`id_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_carrinho_comp_tb_venda1`
    FOREIGN KEY (`tb_venda_id_Compra`)
    REFERENCES `eat5kphk6ver00sk`.`tb_venda` (`id_compra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_cidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_cidades` (
  `id_cidade` INT(11) NOT NULL AUTO_INCREMENT,
  `cod_cidade` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`id_cidade`))
ENGINE = InnoDB
AUTO_INCREMENT = 24
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_endereco` (
  `id_log` INT(11) NOT NULL AUTO_INCREMENT,
  `rua` VARCHAR(50) NOT NULL,
  `numero` INT(11) NOT NULL,
  `comp` VARCHAR(45) NULL DEFAULT NULL,
  `cep` VARCHAR(10) NOT NULL,
  `tb_bairros_id_bairro` INT(11) NOT NULL,
  `tb_cidades_id_cidade` INT(11) NOT NULL,
  `tb_usuarios_id_usuario` INT(11) NOT NULL,
  PRIMARY KEY (`id_log`),
  INDEX `fk_tb_endereco_tb_bairros1_idx` (`tb_bairros_id_bairro` ASC),
  INDEX `fk_tb_endereco_tb_cidades1_idx` (`tb_cidades_id_cidade` ASC),
  INDEX `fk_tb_endereco_tb_usuarios1_idx` (`tb_usuarios_id_usuario` ASC),
  CONSTRAINT `fk_tb_endereco_tb_bairros1`
    FOREIGN KEY (`tb_bairros_id_bairro`)
    REFERENCES `eat5kphk6ver00sk`.`tb_bairros` (`id_bairro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_endereco_tb_cidades1`
    FOREIGN KEY (`tb_cidades_id_cidade`)
    REFERENCES `eat5kphk6ver00sk`.`tb_cidades` (`id_cidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_endereco_tb_usuarios1`
    FOREIGN KEY (`tb_usuarios_id_usuario`)
    REFERENCES `eat5kphk6ver00sk`.`tb_usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 50
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_telefones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_telefones` (
  `id_tel` INT(11) NOT NULL AUTO_INCREMENT,
  `celular` VARCHAR(13) NOT NULL,
  PRIMARY KEY (`id_tel`),
  UNIQUE INDEX `celular_UNIQUE` (`celular` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 42
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_fornecedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_fornecedor` (
  `id_fornecedor` INT(11) NOT NULL,
  `nome` VARCHAR(145) NOT NULL,
  `email` VARCHAR(145) NOT NULL,
  PRIMARY KEY (`id_fornecedor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_forncedor_has_tb_telefones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_forncedor_has_tb_telefones` (
  `tb_fornecedor_id_fornecedor` INT(11) NOT NULL,
  `tb_telefones_id_tel` INT(11) NOT NULL,
  PRIMARY KEY (`tb_fornecedor_id_fornecedor`, `tb_telefones_id_tel`),
  INDEX `fk_tb_fornecedor_has_tb_telefones_tb_telefones1_idx` (`tb_telefones_id_tel` ASC),
  INDEX `fk_tb_fornecedor_has_tb_telefones_tb_fornecedor1_idx` (`tb_fornecedor_id_fornecedor` ASC),
  CONSTRAINT `fk_tb_forncedor_has_tb_telefones_tb_telefones1`
    FOREIGN KEY (`tb_telefones_id_tel`)
    REFERENCES `eat5kphk6ver00sk`.`tb_telefones` (`id_tel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_fornecedor_has_tb_telefones_tb_fornecedor1`
    FOREIGN KEY (`tb_fornecedor_id_fornecedor`)
    REFERENCES `eat5kphk6ver00sk`.`tb_fornecedor` (`id_fornecedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_fornecedor_has_tb_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_fornecedor_has_tb_produto` (
  `estoque` INT(11) NOT NULL,
  `preco_custo` FLOAT NOT NULL,
  `tb_produto_id_Produto` INT(11) NOT NULL,
  `tb_fornecedor_id_fornecedor` INT(11) NOT NULL,
  PRIMARY KEY (`tb_produto_id_Produto`, `tb_fornecedor_id_fornecedor`),
  INDEX `fk_tb_fornecedor_has_tb_produto_tb_forncedor1_idx` (`tb_fornecedor_id_fornecedor` ASC),
  CONSTRAINT `fk_tb_fornecedor_has_tb_produto_tb_forncedor1`
    FOREIGN KEY (`tb_fornecedor_id_fornecedor`)
    REFERENCES `eat5kphk6ver00sk`.`tb_fornecedor` (`id_fornecedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_fornecedor_has_tb_produto_tb_produto1`
    FOREIGN KEY (`tb_produto_id_Produto`)
    REFERENCES `eat5kphk6ver00sk`.`tb_produto` (`id_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_imagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_imagem` (
  `id_img` INT(11) NOT NULL AUTO_INCREMENT,
  `img` VARCHAR(150) NOT NULL DEFAULT '0',
  `tb_produto_id_Produto` INT(11) NOT NULL,
  PRIMARY KEY (`id_img`),
  INDEX `fk_tb_imagem_tb_produto1_idx` (`tb_produto_id_Produto` ASC),
  CONSTRAINT `fk_tb_imagem_tb_produto1`
    FOREIGN KEY (`tb_produto_id_Produto`)
    REFERENCES `eat5kphk6ver00sk`.`tb_produto` (`id_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_usuarios_has_tb_telefones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_usuarios_has_tb_telefones` (
  `tb_telefones_id_tel` INT(11) NOT NULL,
  `tb_usuarios_id_usuario` INT(11) NOT NULL,
  PRIMARY KEY (`tb_telefones_id_tel`, `tb_usuarios_id_usuario`),
  INDEX `fk_tb_usuarios_has_tb_telefones_tb_usuarios1_idx` (`tb_usuarios_id_usuario` ASC),
  CONSTRAINT `fk_tb_usuarios_has_tb_telefones_tb_telefones1`
    FOREIGN KEY (`tb_telefones_id_tel`)
    REFERENCES `eat5kphk6ver00sk`.`tb_telefones` (`id_tel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_usuarios_has_tb_telefones_tb_usuarios1`
    FOREIGN KEY (`tb_usuarios_id_usuario`)
    REFERENCES `eat5kphk6ver00sk`.`tb_usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `eat5kphk6ver00sk`.`tb_venda_has_tb_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`tb_venda_has_tb_usuarios` (
  `tb_usuarios_id_usuario` INT(11) NOT NULL,
  `tb_venda_id_Compra` INT(11) NOT NULL,
  PRIMARY KEY (`tb_usuarios_id_usuario`, `tb_venda_id_Compra`),
  INDEX `fk_tb_venda_has_tb_usuarios_tb_venda1_idx` (`tb_venda_id_Compra` ASC),
  CONSTRAINT `fk_tb_venda_has_tb_usuarios_tb_usuarios1`
    FOREIGN KEY (`tb_usuarios_id_usuario`)
    REFERENCES `eat5kphk6ver00sk`.`tb_usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_venda_has_tb_usuarios_tb_venda1`
    FOREIGN KEY (`tb_venda_id_Compra`)
    REFERENCES `eat5kphk6ver00sk`.`tb_venda` (`id_compra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

USE `eat5kphk6ver00sk` ;

-- -----------------------------------------------------
-- Placeholder table for view `eat5kphk6ver00sk`.`coment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`coment` (`comentario` INT, `data` INT, `nome` INT, `id_produto` INT);

-- -----------------------------------------------------
-- Placeholder table for view `eat5kphk6ver00sk`.`perfil_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`perfil_usuario` (`id` INT, `nome` INT, `senha` INT, `login` INT, `permissao` INT, `cep` INT);

-- -----------------------------------------------------
-- Placeholder table for view `eat5kphk6ver00sk`.`produto_full`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`produto_full` (`id_produto` INT, `cod_ref` INT, `nome_produto` INT, `quant` INT, `preco_venda` INT, `descr_resumido` INT, `descr` INT, `altura` INT, `largura` INT, `comprimento` INT, `diametro` INT, `peso` INT, `img` INT, `nome_cat` INT, `marca` INT);

-- -----------------------------------------------------
-- Placeholder table for view `eat5kphk6ver00sk`.`produto_index`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`produto_index` (`id` INT, `nome` INT, `descr` INT, `preco` INT, `img` INT, `categoria` INT);

-- -----------------------------------------------------
-- Placeholder table for view `eat5kphk6ver00sk`.`produto_view`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`produto_view` (`id` INT, `nome` INT, `descr` INT, `preco` INT, `img` INT, `categoria` INT, `marca` INT);

-- -----------------------------------------------------
-- Placeholder table for view `eat5kphk6ver00sk`.`usuario_full`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`usuario_full` (`id_usuario` INT, `nome` INT, `data_nasc` INT, `cpf` INT, `email` INT, `login` INT, `senha` INT, `celular` INT, `permissao` INT, `rua` INT, `numero` INT, `comp` INT, `cep` INT, `bairro` INT, `cod_cidade` INT);

-- -----------------------------------------------------
-- Placeholder table for view `eat5kphk6ver00sk`.`usuario_view`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eat5kphk6ver00sk`.`usuario_view` (`nome` INT, `login` INT, `senha` INT, `data_nasc` INT, `email@gmail` INT, `bairro` INT, `rua` INT, `numero` INT, `complemento` INT, `cep` INT, `cidade` INT);

-- -----------------------------------------------------
-- procedure atualiza_contato
-- -----------------------------------------------------

DELIMITER $$
USE `eat5kphk6ver00sk`$$
CREATE DEFINER=`o1fznc6tpz06fr23`@`%` PROCEDURE `atualiza_contato`(pid int(11), pnome varchar(255), pemail varchar(50), plogin varchar (45), psenha varchar(50), pdata date, pcpf varchar(14), 
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
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure atualiza_produto
-- -----------------------------------------------------

DELIMITER $$
USE `eat5kphk6ver00sk`$$
CREATE DEFINER=`o1fznc6tpz06fr23`@`%` PROCEDURE `atualiza_produto`(pid int(11), pcod int(11), pnome varchar(45), pqtd int(11), pvenda float, pdesc text,
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
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure insere_comentario
-- -----------------------------------------------------

DELIMITER $$
USE `eat5kphk6ver00sk`$$
CREATE DEFINER=`o1fznc6tpz06fr23`@`%` PROCEDURE `insere_comentario`(puid int(11), pdid int(11), pcoment text, pdata date)
BEGIN
	DECLARE teste bool DEFAULT 0;
    DECLARE  CONTINUE handler for sqlexception set teste = 1;
    start transaction;
        insert into preview (comentario, data) values (pcoment, pdata);
        set @CID = (select id from preview where comentario = pcoment);
        insert into preview_has_tb_produto(preview_id, tb_produto_id_Produto, tb_usuarios_id_usuario) values (@CID, pdid, puid);
        if teste then
			select false;
			rollback;
		else
			commit;
		end if;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure insere_contato
-- -----------------------------------------------------

DELIMITER $$
USE `eat5kphk6ver00sk`$$
CREATE DEFINER=`o1fznc6tpz06fr23`@`%` PROCEDURE `insere_contato`(pnome varchar(255), pemail varchar(50), plogin varchar (45), psenha varchar(50), pdata date, pcpf varchar(14), 
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
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure insere_produto
-- -----------------------------------------------------

DELIMITER $$
USE `eat5kphk6ver00sk`$$
CREATE DEFINER=`o1fznc6tpz06fr23`@`%` PROCEDURE `insere_produto`(pcod int(11), pnome varchar(45), pqtd int(11), pvenda float, pdesc varchar(100), pdescc varchar(200), 
								pa varchar(4), pl varchar(4), pc varchar(4), pd varchar(4), pp varchar(4), pmarca varchar(50), pcategoria varchar(50), pfoto varchar(200))
BEGIN
	DECLARE teste bool DEFAULT 0;
    DECLARE  CONTINUE handler for sqlexception set teste = 1;
    start transaction;
		insert into tb_categoria(nome_cat) select * from (select pcategoria ) AS tmp where not exists( select nome_cat from tb_categoria where nome_cat = pcategoria) LIMIT 1;
		insert into tb_marca(marca) select * from (select pmarca ) AS tmp where not exists( select marca from tb_marca where marca = pmarca) LIMIT 1;
        SET @CID = (select id_categoria from tb_categoria where nome_cat = pcategoria );
		SET @MID = (select id_marca from tb_marca where marca = pmarca );
		INSERT INTO tb_produto (cod_ref, nome_produto, quant, preco_venda, descr_resumido, descr_completo, altura, largura, comprimento, diametro, peso, tb_marca_id_marca, tb_categoria_id_Categoria) VALUES (pcod , pnome , pqtd , pvenda, pdesc , pdescc , pa , pl , pc , pd , pp , @MID, @CID);
		set @PID = (select id_produto from tb_produto where cod_ref = pcod);
        insert into tb_imagem (img, tb_produto_id_Produto) values (pfoto, @PID);
        if teste then
			select false;
			rollback;
		else
			commit;
		end if;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure insere_venda
-- -----------------------------------------------------

DELIMITER $$
USE `eat5kphk6ver00sk`$$
CREATE DEFINER=`o1fznc6tpz06fr23`@`%` PROCEDURE `insere_venda`(vfpgt varchar(45), vdatavenda timestamp, vstatus int(11), sStatus varchar(50))
BEGIN
DECLARE teste bool DEFAULT 0;
    DECLARE  CONTINUE handler for sqlexception set teste = 1;
    start transaction;
    insert into tb_venda(forma_pagto, data_venda, tb_status_id_status) values(vfpgt, vdatavenda, vstatus);
    insert into tb_status(situacao) values(sStatus);
   
    

END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure remove_produto
-- -----------------------------------------------------

DELIMITER $$
USE `eat5kphk6ver00sk`$$
CREATE DEFINER=`o1fznc6tpz06fr23`@`%` PROCEDURE `remove_produto`(pid int(11))
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
END$$

DELIMITER ;

-- -----------------------------------------------------
-- View `eat5kphk6ver00sk`.`coment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eat5kphk6ver00sk`.`coment`;
USE `eat5kphk6ver00sk`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`o1fznc6tpz06fr23`@`%` SQL SECURITY DEFINER VIEW `eat5kphk6ver00sk`.`coment` AS select `a`.`comentario` AS `comentario`,`a`.`data` AS `data`,`b`.`nome` AS `nome`,`c`.`id_produto` AS `id_produto` from (((`eat5kphk6ver00sk`.`tb_usuarios` `b` join `eat5kphk6ver00sk`.`preview` `a`) join `eat5kphk6ver00sk`.`tb_produto` `c`) join `eat5kphk6ver00sk`.`preview_has_tb_produto` `d` on(((`b`.`id_usuario` = `d`.`tb_usuarios_id_usuario`) and (`a`.`id` = `d`.`preview_id`) and (`c`.`id_produto` = `d`.`tb_produto_id_Produto`))));

-- -----------------------------------------------------
-- View `eat5kphk6ver00sk`.`perfil_usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eat5kphk6ver00sk`.`perfil_usuario`;
USE `eat5kphk6ver00sk`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`o1fznc6tpz06fr23`@`%` SQL SECURITY DEFINER VIEW `eat5kphk6ver00sk`.`perfil_usuario` AS select `a`.`id_usuario` AS `id`,`a`.`nome` AS `nome`,`a`.`senha` AS `senha`,`a`.`login` AS `login`,`b`.`permissao` AS `permissao`,`c`.`cep` AS `cep` from ((`eat5kphk6ver00sk`.`tb_usuarios` `a` join `eat5kphk6ver00sk`.`tb_perfil` `b`) join `eat5kphk6ver00sk`.`tb_endereco` `c` on(((`a`.`tb_perfil_id_perfil` = `b`.`id_perfil`) and (`a`.`id_usuario` = `c`.`tb_usuarios_id_usuario`))));

-- -----------------------------------------------------
-- View `eat5kphk6ver00sk`.`produto_full`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eat5kphk6ver00sk`.`produto_full`;
USE `eat5kphk6ver00sk`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`o1fznc6tpz06fr23`@`%` SQL SECURITY DEFINER VIEW `eat5kphk6ver00sk`.`produto_full` AS select `a`.`id_produto` AS `id_produto`,`a`.`cod_ref` AS `cod_ref`,`a`.`nome_produto` AS `nome_produto`,`a`.`quant` AS `quant`,`a`.`preco_venda` AS `preco_venda`,`a`.`descr_resumido` AS `descr_resumido`,`a`.`descr_completo` AS `descr`,`a`.`altura` AS `altura`,`a`.`largura` AS `largura`,`a`.`comprimento` AS `comprimento`,`a`.`diametro` AS `diametro`,`a`.`peso` AS `peso`,`b`.`img` AS `img`,`c`.`nome_cat` AS `nome_cat`,`d`.`marca` AS `marca` from (((`eat5kphk6ver00sk`.`tb_produto` `a` join `eat5kphk6ver00sk`.`tb_imagem` `b`) join `eat5kphk6ver00sk`.`tb_categoria` `c`) join `eat5kphk6ver00sk`.`tb_marca` `d` on(((`a`.`id_produto` = `b`.`tb_produto_id_Produto`) and (`c`.`id_categoria` = `a`.`tb_categoria_id_Categoria`) and (`d`.`id_marca` = `a`.`tb_marca_id_marca`))));

-- -----------------------------------------------------
-- View `eat5kphk6ver00sk`.`produto_index`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eat5kphk6ver00sk`.`produto_index`;
USE `eat5kphk6ver00sk`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`o1fznc6tpz06fr23`@`%` SQL SECURITY DEFINER VIEW `eat5kphk6ver00sk`.`produto_index` AS select `a`.`id_produto` AS `id`,`a`.`nome_produto` AS `nome`,`a`.`descr_resumido` AS `descr`,`a`.`preco_venda` AS `preco`,`b`.`img` AS `img`,`c`.`nome_cat` AS `categoria` from ((`eat5kphk6ver00sk`.`tb_produto` `a` join `eat5kphk6ver00sk`.`tb_imagem` `b`) join `eat5kphk6ver00sk`.`tb_categoria` `c` on(((`a`.`id_produto` = `b`.`tb_produto_id_Produto`) and (`c`.`id_categoria` = `a`.`tb_categoria_id_Categoria`))));

-- -----------------------------------------------------
-- View `eat5kphk6ver00sk`.`produto_view`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eat5kphk6ver00sk`.`produto_view`;
USE `eat5kphk6ver00sk`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`o1fznc6tpz06fr23`@`%` SQL SECURITY DEFINER VIEW `eat5kphk6ver00sk`.`produto_view` AS select `a`.`id_produto` AS `id`,`a`.`nome_produto` AS `nome`,`a`.`descr_completo` AS `descr`,`a`.`preco_venda` AS `preco`,`b`.`img` AS `img`,`c`.`nome_cat` AS `categoria`,`d`.`marca` AS `marca` from (((`eat5kphk6ver00sk`.`tb_produto` `a` join `eat5kphk6ver00sk`.`tb_imagem` `b`) join `eat5kphk6ver00sk`.`tb_categoria` `c`) join `eat5kphk6ver00sk`.`tb_marca` `d` on(((`a`.`id_produto` = `b`.`tb_produto_id_Produto`) and (`c`.`id_categoria` = `a`.`tb_categoria_id_Categoria`) and (`d`.`id_marca` = `a`.`tb_marca_id_marca`))));

-- -----------------------------------------------------
-- View `eat5kphk6ver00sk`.`usuario_full`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eat5kphk6ver00sk`.`usuario_full`;
USE `eat5kphk6ver00sk`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`o1fznc6tpz06fr23`@`%` SQL SECURITY DEFINER VIEW `eat5kphk6ver00sk`.`usuario_full` AS select `a`.`id_usuario` AS `id_usuario`,`a`.`nome` AS `nome`,`a`.`data_nasc` AS `data_nasc`,`a`.`cpf` AS `cpf`,`a`.`email` AS `email`,`a`.`login` AS `login`,`a`.`senha` AS `senha`,`b`.`celular` AS `celular`,`d`.`permissao` AS `permissao`,`e`.`rua` AS `rua`,`e`.`numero` AS `numero`,`e`.`comp` AS `comp`,`e`.`cep` AS `cep`,`f`.`bairro` AS `bairro`,`g`.`cod_cidade` AS `cod_cidade` from ((((((`eat5kphk6ver00sk`.`tb_usuarios` `a` join `eat5kphk6ver00sk`.`tb_telefones` `b`) join `eat5kphk6ver00sk`.`tb_usuarios_has_tb_telefones` `c`) join `eat5kphk6ver00sk`.`tb_perfil` `d`) join `eat5kphk6ver00sk`.`tb_endereco` `e`) join `eat5kphk6ver00sk`.`tb_bairros` `f`) join `eat5kphk6ver00sk`.`tb_cidades` `g` on(((`a`.`id_usuario` = `c`.`tb_usuarios_id_usuario`) and (`b`.`id_tel` = `c`.`tb_telefones_id_tel`) and (`a`.`tb_perfil_id_perfil` = `d`.`id_perfil`) and (`a`.`id_usuario` = `e`.`tb_usuarios_id_usuario`) and (`f`.`id_bairro` = `e`.`tb_bairros_id_bairro`) and (`g`.`id_cidade` = `e`.`tb_cidades_id_cidade`))));

-- -----------------------------------------------------
-- View `eat5kphk6ver00sk`.`usuario_view`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eat5kphk6ver00sk`.`usuario_view`;
USE `eat5kphk6ver00sk`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`o1fznc6tpz06fr23`@`%` SQL SECURITY DEFINER VIEW `eat5kphk6ver00sk`.`usuario_view` AS select `a`.`nome` AS `nome`,`a`.`login` AS `login`,`a`.`senha` AS `senha`,`a`.`data_nasc` AS `data_nasc`,`a`.`email` AS `email@gmail`,`b`.`bairro` AS `bairro`,`e`.`rua` AS `rua`,`e`.`numero` AS `numero`,`e`.`comp` AS `complemento`,`e`.`cep` AS `cep`,`c`.`cod_cidade` AS `cidade` from (((`eat5kphk6ver00sk`.`tb_usuarios` `a` join `eat5kphk6ver00sk`.`tb_endereco` `e`) join `eat5kphk6ver00sk`.`tb_bairros` `b`) join `eat5kphk6ver00sk`.`tb_cidades` `c` on((`a`.`id_usuario` = `e`.`tb_usuarios_id_usuario`)));

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
