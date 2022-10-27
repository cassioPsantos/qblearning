drop database qblearning;

create database qblearning;

use qblearning;

create table usuarios (
	id int primary key not null auto_increment,
    nome_usuario varchar(20),
	nome_completo varchar(30),
    descricao text(200),
    foto varchar(25),
    email varchar(30),
    senha varchar(30),
    genero varchar(9),
    nascimento date
);

create table cubos (
	cod int primary key not null auto_increment,
    id_usuario int,
    tipo_cubo varchar(15),
    modelo varchar(30),
    manutencao date,
    aquisicao date,
	foreign key (id_usuario) references usuarios(id)
);

create table tempos (
	cod int primary key not null auto_increment,
    id_usuario int,
    tipo_cubo varchar(15),
    tempo float(4,2)
);

create table melhor_tempo (
	cod int primary key not null auto_increment,
    id_usuario int,
    tipo_cubo varchar(15),
    melhor_tempo float(4,2),
    embaralhamento tinytext,
    dia date,
    foreign key (id_usuario) references usuarios(id)
);

create table pior_tempo (
	cod int primary key not null auto_increment,
    id_usuario int,
    tipo_cubo varchar(15),
    pior_tempo float(4,2),
    embaralhamento tinytext,
    dia date,
    foreign key (id_usuario) references usuarios(id)
);

create table ultimo_tempo (
	cod int primary key not null auto_increment,
    id_usuario int,
    tipo_cubo varchar(15),
    ultimo_tempo float(4,2),
    embaralhamento tinytext,
    dia date,
    foreign key (id_usuario) references usuarios(id)
);

create table melhor_media (
	cod int primary key not null auto_increment,
    id_usuario int,
    tipo_cubo varchar(15),
    melhor_media float(4,2),
    dia date,
    foreign key (id_usuario) references usuarios(id)
);

create table pior_media (
	cod int primary key not null auto_increment,
    id_usuario int,
    tipo_cubo varchar(15),
    pior_media float(4,2),
    dia date,
    foreign key (id_usuario) references usuarios(id)
);

create table ultima_media (
	cod int primary key not null auto_increment,
    id_usuario int,
    tipo_cubo varchar(15),
    ultima_media float(4,2),
    dia date,
    foreign key (id_usuario) references usuarios(id)
);

insert into usuarios (nome_usuario, nome_completo, email, senha, genero, nascimento, foto)
values ('cassiopsantos', 'Cássio Pereira dos Santos', 'teste@teste', 'teste', 'Masculino', '2004-10-14', 'default.png');