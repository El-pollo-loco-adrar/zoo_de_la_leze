CREATE DATABASE zoo CHARSET utf8mb4;
USE zoo;

CREATE TABLE IF NOT EXISTS `role`(
   id_role INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   name_role VARCHAR(50) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE users(
	id_user INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    pseudo_user VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci,
    mail_user VARCHAR(100) NOT NULL UNIQUE COLLATE utf8mb4_unicode_ci,
    password_user VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci,
    id_role INT NOT NULL,
	FOREIGN KEY (id_role) REFERENCES `role`(id_role) ON DELETE CASCADE
)ENGINE=InnoDB;
        
CREATE TABLE participation(
	id_participation INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	score_participation INT,
	date_participation DATETIME,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE
)ENGINE=InnoDB;
    
CREATE TABLE jeu_de_piste(
	id_jeu_de_piste INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	name_jeu_de_piste VARCHAR(50) UNIQUE COLLATE utf8mb4_unicode_ci,
	description_jeu_de_piste TEXT COLLATE utf8mb4_unicode_ci,
	date_jeu_de_piste DATE
)ENGINE=InnoDB;

CREATE table participer(
	id_jeu_de_piste INT,
    id_participation INT,
    FOREIGN KEY (id_jeu_de_piste) REFERENCES jeu_de_piste(id_jeu_de_piste) ON DELETE CASCADE,
    FOREIGN KEY (id_participation) REFERENCES participation(id_participation) ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE qr_code(
	id_qr_code INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    code_qr_code VARCHAR(100) UNIQUE,
    position_qr_code INT
)ENGINE=InnoDB;

CREATE TABLE contenir(
	id_jeu_de_piste INT,
	id_qr_code INT,
    FOREIGN KEY (id_jeu_de_piste) REFERENCES jeu_de_piste(id_jeu_de_piste) ON DELETE CASCADE,
    FOREIGN KEY (id_qr_code) REFERENCES qr_code(id_qr_code) ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE question(
	id_question INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    titre_question VARCHAR(255) COLLATE utf8mb4_unicode_ci,
    texte_question VARCHAR(255) COLLATE utf8mb4_unicode_ci
)ENGINE=InnoDB;

CREATE TABLE associer(
	id_qr_code INT,
    id_question INT,
    FOREIGN KEY (id_qr_code) REFERENCES qr_code(id_qr_code) ON DELETE CASCADE,
    FOREIGN KEY (id_question) REFERENCES question(id_question) ON DELETE CASCADE
    )ENGINE=InnoDB;

CREATE TABLE reponse(
	id_reponse INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    texte_reponse VARCHAR(100) COLLATE utf8mb4_unicode_ci,
    valid_reponse BOOLEAN NOT NULL,
    id_question INT,
    FOREIGN KEY (id_question) REFERENCES question(id_question) ON DELETE CASCADE
)ENGINE=InnoDB;
    
CREATE TABLE animal(
	id_animal INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nom_animal VARCHAR(100) UNIQUE COLLATE utf8mb4_unicode_ci,
    espece_animal VARCHAR(100) COLLATE utf8mb4_unicode_ci,
    description_animal TEXT COLLATE utf8mb4_unicode_ci,
    age_animal INT,
    image_url  VARCHAR(255) 
)ENGINE=InnoDB;
 
 CREATE TABLE rattacher(
	id_qr_code INT,
    id_animal INT,
	FOREIGN KEY (id_qr_code) REFERENCES qr_code(id_qr_code) ON DELETE CASCADE,
    FOREIGN KEY (id_animal) REFERENCES animal(id_animal) ON DELETE CASCADE
)ENGINE=InnoDB;

 CREATE TABLE creer(
	id_user INT,
    id_animal INT,
	FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE,
	FOREIGN KEY (id_animal) REFERENCES animal(id_animal) ON DELETE CASCADE
)ENGINE=InnoDB;
    
CREATE TABLE newsletter (
	id_newsletter INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    email_newsletter VARCHAR(100) NOT NULL UNIQUE
)ENGINE=InnoDB;

CREATE TABLE inscrire(
	id_user INT,
    id_newsletter INT,
    FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE,
	FOREIGN KEY (id_newsletter) REFERENCES newsletter(id_newsletter) ON DELETE CASCADE
)ENGINE=InnoDB;

INSERT INTO `role` (name_role) VALUES ("utilisateur"), ("administrateur");

ALTER TABLE animal MODIFY nom_animal VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE animal MODIFY espece_animal VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE animal MODIFY description_animal TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE animal MODIFY image_url VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;