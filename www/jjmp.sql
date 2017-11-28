drop DATABASE if EXISTS  jjmp;
create database if not exists jjmp ;
use jjmp;

CREATE TABLE if not EXISTS info (
id int auto_increment unique not null ,
roll  varchar(255) not null,
nickname varchar(255) unique not null,
pass varchar(255) not null,
email varchar(255) unique not null,
primary key(id)
);

DROP TABLE IF EXISTS forum;
CREATE TABLE forum (
idpergunta int auto_increment unique not null ,
idutilizador int not null,
pergunta text not null,
primary key(idpergunta),
FOREIGN key(idutilizador) REFERENCES info(id)
  ON DELETE CASCADE
  ON UPDATE CASCADE
);

DROP TABLE IF EXISTS respostas;
CREATE TABLE respostas (
idresposta int auto_increment unique not null ,
idpergunta int not null ,
idutilizador int not null,
resposta text not null,
FOREIGN key(idpergunta) REFERENCES forum(idpergunta)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
FOREIGN key(idutilizador) REFERENCES info(id)
  ON DELETE CASCADE
  ON UPDATE CASCADE
);
DROP TABLE IF EXISTS tutoriais;
CREATE TABLE tutoriais(
idtutorial int(20) auto_increment unique not null,
tutorialimgpath varchar(100) UNIQUE,
tutorialname VARCHAR(100) UNIQUE NOT NULL,
tutorialurl VARCHAR(100) UNIQUE
);
DROP TABLE IF EXISTS settings;
CREATE TABLE settings (
idsett int NOT NULL AUTO_INCREMENT  PRIMARY KEY,
barvalue int not null
);
INSERT INTO info(roll,nickname,pass,email) VALUES (2,"admin","LJEgnJ4=","admin@jjmp.com");
