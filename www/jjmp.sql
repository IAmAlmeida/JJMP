DROP
    DATABASE IF EXISTS jjmp;
CREATE DATABASE IF NOT EXISTS jjmp; USE
    jjmp;
CREATE TABLE IF NOT EXISTS info(
    id INT AUTO_INCREMENT UNIQUE NOT NULL,
    role VARCHAR(255) NOT NULL DEFAULT 0,
    nickname VARCHAR(255) UNIQUE NOT NULL,
    pass VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    photo VARCHAR(100) NOT NULL DEFAULT '/public_html/img/user_photos/nobody.png',
    privatephotograph TINYINT(1) NOT NULL DEFAULT 0,
    PRIMARY KEY(id)
); DROP TABLE IF EXISTS
    forum;
CREATE TABLE forum(
    idpergunta INT(20) AUTO_INCREMENT UNIQUE NOT NULL,
    idutilizador INT(20) NOT NULL,
    pergunta TEXT NOT NULL,
    datapost datetime not null DEFAULT NOW(),
    PRIMARY KEY(idpergunta),
    FOREIGN KEY(idutilizador) REFERENCES info(id) ON DELETE CASCADE ON UPDATE CASCADE
); DROP TABLE IF EXISTS
    respostas;
CREATE TABLE respostas(
    idresposta INT AUTO_INCREMENT UNIQUE NOT NULL,
    idpergunta INT NOT NULL,
    idutilizador INT NOT NULL,
    resposta TEXT NOT NULL,
    FOREIGN KEY(idpergunta) REFERENCES forum(idpergunta) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(idutilizador) REFERENCES info(id) ON DELETE CASCADE ON UPDATE CASCADE
); DROP TABLE IF EXISTS
    tutoriais;
CREATE TABLE tutoriais(
    idtutorial INT(20) AUTO_INCREMENT UNIQUE NOT NULL,
    tutorialimgpath VARCHAR(100) UNIQUE,
    tutorialname VARCHAR(100) UNIQUE NOT NULL,
    tutorialurl VARCHAR(100) UNIQUE
); DROP TABLE IF EXISTS
    settings;
CREATE TABLE settings(
    idsett INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    barvalue INT NOT NULL
); INSERT INTO info(role, nickname, pass, email, photo,privatephotograph)
VALUES(
    2,
    "admin",
    "LJEgnJ4lZQR4",
    "admin@jjmp.com",
    "/public_html/img/user_photos/nobody.png",1
),(
    2,
    "João",
    "LJEgnJ4lZQR4",
    "J@jjmp.com",
    "/public_html/img/j_jjmp.jpg",1
),(
    2,
    "Almeida",
    "LJEgnJ4lZQR4",
    "JJ@jjmp.com",
    "/public_html/img/jj_jjmp.jpg",1
),(
    2,
    "Mia",
    "LJEgnJ4lZQR4",
    "M@jjmp.com",
    "/public_html/img/m_jjmp.jpg",1
),(
    2,
    "Pedro",
    "LJEgnJ4lZQR4",
    "P@jjmp.com",
    "/public_html/img/p_jjmp.jpg",1
);

#end
