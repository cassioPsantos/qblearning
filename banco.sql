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
    tipo_cubo int,
    modelo varchar(30),
    manutencao date,
    aquisicao date
);