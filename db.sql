create database marchesBenin;

use marchesBenin;

create table Ville(idVille int not null auto_increment primary key,nomVille varchar(200) not null);

create table TypeEmplacement(idType int not null auto_increment primary key,libelle varchar(200) not null);

create table Marche(idMarche int not null auto_increment primary key,nomMarche varchar(200) not null,description varchar(250) default null,capacite int not null,adresse varchar(200) default null,telephone varchar(50) default null,image varchar(250) not null, idVille int not null, foreign key Marche(idVille) references Ville(idVille));

create table Emplacement(idEmplacement int not null auto_increment primary key,numero varchar(50) not null, idType int not null,idMarche int not null, foreign key (idType) references TypeEmplacement(idType),foreign key (idMarche) references Marche(idMarche));

insert into Ville(nomVille) values ('Cotonou'),('Porto-Novo');

insert into Marche(nomMarche,capacite,image,idVille) values ('Gbégamey',1000,'assets/images/1.jpg',1),('Mènontin',800,'assets/images/2.jpg',1),('Wologuèdè',2000,'assets/images/3.jpg',1);

