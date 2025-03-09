CREATE DATABASE zoo CHARSET utf8mb4;
USE zoo;

CREATE TABLE users(
	id_user INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    pseudo_user VARCHAR(100),
    mail_user VARCHAR(100) UNIQUE,
    password_user VARCHAR(255),
    role_user VARCHAR(50)
)ENGINE=InnoDB;
        
CREATE TABLE participation(
	id_participation INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	score_participation INT,
	date_participation DATETIME
)ENGINE=InnoDB;
    
CREATE TABLE jouer(
	id_user INT,
	id_participation INT,
	FOREIGN KEY (id_user) REFERENCES users(id_user),
	FOREIGN KEY (id_participation) REFERENCES participation (id_participation)
)ENGINE=InnoDB;
    
CREATE TABLE jeu_de_piste(
	id_jeu_de_piste INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	name_jeu_de_piste VARCHAR(50) UNIQUE,
	description_jeu_de_piste TEXT,
	date_jeu_de_piste DATE
)ENGINE=InnoDB;

CREATE table participer(
	id_jeu_de_piste INT,
    id_participation INT,
    FOREIGN KEY (id_jeu_de_piste) REFERENCES jeu_de_piste(id_jeu_de_piste),
    FOREIGN KEY (id_participation) REFERENCES participation (id_participation)
)ENGINE=InnoDB;

CREATE TABLE qr_code(
	id_qr_code INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    code_qr_code VARCHAR(100) UNIQUE,
    position_qr_code INT,
    id_animal INT,
    id_jeu_de_piste INT
)ENGINE=InnoDB;

CREATE TABLE quizz(
	id_quizz INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    question_quizz VARCHAR(255),
    reponse_quizz VARCHAR(255),
    id_qr_code INT,
    FOREIGN KEY (id_qr_code) REFERENCES qr_code (id_qr_code)
)ENGINE=InnoDB;

CREATE TABLE animal(
	id_animal INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nom_animal VARCHAR(100) UNIQUE,
    espece_animal VARCHAR(100),
    description_animal TEXT,
    age_animal INT,
    id_enclos INT    
)ENGINE=InnoDB;

CREATE TABLE enclos(
	id_enclos INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nom_enclos VARCHAR(100) UNIQUE,
    type_enclos VARCHAR(100),
    superficie_enclos DECIMAL
)ENGINE=InnoDB;
        

ALTER TABLE qr_code
	ADD CONSTRAINT fk_animal
    FOREIGN KEY (id_animal) REFERENCES animal(id_animal),
    ADD CONSTRAINT fk_jeu_de_piste
    FOREIGN KEY (id_jeu_de_piste) REFERENCES jeu_de_piste (id_jeu_de_piste);
    
ALTER TABLE animal
	ADD CONSTRAINT fk_enclos
    FOREIGN KEY (id_enclos) REFERENCES enclos(id_enclos);
    
CREATE TABLE newsletter (
	id_newsletter INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    email_newsletter VARCHAR(100) NOT NULL UNIQUE,
    date_inscription_newsletter TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB;