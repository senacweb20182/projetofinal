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





regex101.com