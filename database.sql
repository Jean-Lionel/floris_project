
CREATE DATABASE intervation_informatique;

use intervation_informatique;

CREATE TABLE materiels(
	id int PRIMARY KEY AUTO_INCREMENT,
	numero_serie varchar(255),
	nom varchar(255),
	date_fabrication date,
	marque varchar(255)
);


CREATE TABLE pannes(
	id int PRIMARY KEY AUTO_INCREMENT,
	nom varchar(255),
	materiel_id int(6),
	date_panne date
	
);


CREATE TABLE services(
	id int PRIMARY KEY AUTO_INCREMENT,
	nom varchar(255)
	
);

CREATE TABLE techniciens(
	id int PRIMARY KEY AUTO_INCREMENT,
	nom varchar(255),
	prenom varchar(255),
	telephone varchar(255),
	matricule varchar(255)
);

CREATE TABLE utilisateurs(
	id int PRIMARY KEY AUTO_INCREMENT,
	nom varchar(255),
	prenom varchar(255),
	telephone varchar(255),
	login varchar(255),
	password varchar(255),
	role varchar(255)
);

CREATE TABLE affectation(
	id int PRIMARY KEY AUTO_INCREMENT,
	service_id int,
	materiel_id int,
	date_affectation date

);

