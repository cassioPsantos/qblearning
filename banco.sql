create database qblearning;
drop database qblearning;

use qblearning;

create table usuarios (
	id int primary key not null auto_increment,
	nome varchar(30),
    email varchar(30),
    senha varchar(30),
    nascimento date
);

create table cubos (
	cod int primary key not null auto_increment,
    id_usuario int,
    tipo_cubo varchar(15),
    modelo varchar(30),
    manutencao date,
    aquisicao date
);

create table tempos (
	cod int primary key not null auto_increment,
    id_usuario int,
    tipo_cubo varchar(15),
    tempo float(4,2)
);