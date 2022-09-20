create database qblearning;

use qblearning;

create table usuarios (
	id int primary key not null auto_increment,
	nome varchar(30),
    email varchar(30),
    senha varchar(30),
    nascimento date,
    genero int
);