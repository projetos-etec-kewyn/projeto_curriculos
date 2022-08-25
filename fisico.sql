CREATE DATABASE projeto;
USE projeto;

CREATE TABLE usuarios (
id int PRIMARY KEY AUTO_INCREMENT,
email varchar(255),
nome varchar(255),
senha varchar(255),
cpf varchar(14),
tipo int
);

CREATE TABLE experiencia (
id_exp int PRIMARY KEY AUTO_INCREMENT,
fim date,
ocupacao varchar(255),
inicio date,
empresa varchar(255),
id_curr int
);

CREATE TABLE curriculo (
id_curr int PRIMARY KEY AUTO_INCREMENT,
nome varchar(255),
telefone varchar(14),
email varchar(255),
curso varchar(255)
);

CREATE TABLE competencias (
id_comp int PRIMARY KEY AUTO_INCREMENT,
competencia varchar(255),
id_curr int,
FOREIGN KEY(id_curr) REFERENCES curriculo (id_curr)
);

CREATE TABLE habilidades (
id_hab int PRIMARY KEY AUTO_INCREMENT,
habilidade varchar(255),
id_curr int,
FOREIGN KEY(id_curr) REFERENCES curriculo (id_curr)
);

CREATE TABLE educacao (
id_educ int PRIMARY KEY AUTO_INCREMENT,
fim date,
instituicao varchar(255),
inicio date,
curso varchar(255),
id_curr int,
FOREIGN KEY(id_curr) REFERENCES curriculo (id_curr)
);

ALTER TABLE experiencia ADD FOREIGN KEY(id_curr) REFERENCES curriculo (id_curr);
