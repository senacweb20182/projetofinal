create table tb_produtos(
    id int primary key auto_increment,
    produto varchar(150) not null,
    foto varchar(150) not null,
    quantidade int not null,
    preco int not null,
    custo int not null,
    descricao varchar(150) not null,
    review varchar(150) not null
);