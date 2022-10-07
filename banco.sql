create database qblearning;

use qblearning;

create table usuarios (
	id int primary key not null auto_increment,
    nome_usuario varchar(20),
	nome_completo varchar(30),
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
    tempo float(4,2),
    embaralhamento varchar(60),
    dia date,
    foreign key (id_usuario) references usuarios(id)
);

create table melhor_media (
	cod int primary key not null auto_increment,
    id_usuario int,
    tipo_cubo varchar(15),
    media float(4,2),
    dia date,
    foreign key (id_usuario) references usuarios(id)
);