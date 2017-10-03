create database if not exists jjmp ;
use jjmp;

CREATE TABLE if not EXISTS info (
id int auto_increment unique not null ,
nickname varchar(255) unique not null,
pass varchar(255) not null,
email varchar(255) unique not null,
primary key(id)
);

CREATE TABLE if not EXISTS forum (
idpergunta int auto_increment unique not null ,
nickname varchar(255) not null,
pergunta text not null,
primary key(idpergunta)	
);

DROP TABLE IF EXISTS respostas;
CREATE TABLE respostas (
idpergunta int not null ,
nickname varchar(255) not null,
resposta text not null,
FOREIGN key(idpergunta) REFERENCES forum(idpergunta)
);