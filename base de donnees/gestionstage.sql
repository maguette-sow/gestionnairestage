drop database gestionstage;
create database gestionstage;
use gestionstage;


create table filieres(
    idfilieres int primary key auto_increment,  
    nomfiliere VARCHAR(50),
    niveau VARCHAR(50)   
);

create table stagiaires(
    idstagiaires int primary key auto_increment, 
    nomstagiaires VARCHAR(50),
    prenom VARCHAR(50),
    civilite VARCHAR(1),
    photho VARCHAR(100),
    idfilieres int
);

create table utilisateurs(
    iduser int primary key auto_increment, 
   logins VARCHAR(50),
    email VARCHAR(255),
    roles  VARCHAR(50),
    etat int,
    pwd VARCHAR(255)
);
alter table stagiaires ADD CONSTRAINT fk_filieres_stagiaires FOREIGN key(idfilieres) REFERENCES filieres(idfilieres);
ALTER TABLE `filieres` CHANGE `idfilieres` `idfilieres` INT(11) NULL DEFAULT NULL AUTO_INCREMENT;


insert into filieres(nomfiliere,niveau) VALUES
('ROBOTIQUE','L'),
('ROBOTIQUE','M'),
('IDA','L'),
('IDA','M'),
('CD','L'),
('CD','M'),
('CJ','L'),
('CJ','M'),
('AES','L'),
('AES','M'),
('MIC','L'),
('MIC','M'),
('MAI','L'),
('MAI','M'),
('AGN','L'),
('AGN','M'),
('MCS','L'),
('MCS','M'),
('MM','L'),
('MM','M'),
('SRIV','L'),
('SRIV','M'),
('ASN','L'),
('ASN','M'),
('ME','L'),
('ME','M'),
('IL','L'),
('IL','M'),
('CYBERSECURITE','L'),
('CYBERSECURITE','M'),
('BDA','l'),
('BDA','M'),
('IA','L'),
('IA','M'),
('CHP','L'),
('CHP','M'),
('DM','L'),
('DM','M'),
('SG','L'),
('SG','M'),
('JV','L'),
('JV','M'),
('IN','L'),
('IN','M'),
('RCC','L'),
('RCC','M'),
('CHP-DM-IA','M'),
('ANGLAIS','L'),
('ANGLAIS','M'),
('SE','L'),
('SE','M'),
('SOCIOLOGIE','L'),
('SOCIOLOGIE','M');
-- (?,?);


insert into utilisateurs(logins,email,roles,etat,pwd ) VALUES 
('admin','maguettesow066@gmail.com','ADMIN',1,md5('1971')),
('user1','user1@gmail.com','VISITEUR',0,md5('1971')),
('user2','user2@gmail.com','VISITEUR',1,md5('1971'));


insert into stagiaires(nomstagiaires,prenom ,civilite,photho ,idfilieres ) VALUES
('Sow','Maguette','F','apple.png',1),
('Kandji','Maguette','F','imag.jpg',2),
('Ndiaye','Ibou','M','ima.jpeg',3),
('Sow','Nogaye','F','d.jpg',4),
('Diallo','Aliou','M','image.jpeg',5),
('Fall','Khady','F','images.jpg',6);
insert into stagiaires(nomstagiaires,prenom ,civilite,photho ,idfilieres ) VALUES
('Sow','Maguette','F','apple.png',1),
('Kandji','Fatou','F','imag.jpg',2),
('Ndiaye','Ibou','M','ima.jpeg',3),
('Sow','Nogaye','F','d.jpg',4),
('Diallo','Aliou','M','image.jpeg',5),
('Fall','Khady','F','images.jpg',6),
('Sow','Maguette','F','apple.png',1),
('Kandji','Fatou','F','imag.jpg',2),
('Ndiaye','Ibou','M','ima.jpeg',3),
('Sow','Nogaye','F','d.jpg',4),
('Diallo','Aliou','M','image.jpeg',5),
('Fall','Khady','F','images.jpg',6);


SELECT*FROM  filieres;
SELECT*FROM stagiaires;
SELECT*FROM utilisateurs;

UPDATE utilisateurs SET pwd=md5('1234') WHERE iduser=1;
UPDATE utilisateurs SET pwd=md5('1234') WHERE iduser=2;
UPDATE utilisateurs SET pwd=md5('1234') WHERE iduser=3;






















