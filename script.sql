drop database if exists cantine;
create database cantine;
use cantine;

create sequence menuSeq;
create sequence platSeq;
create sequence menuPlatSeq;
create sequence etudiantSeq;
create sequence commanderSeq;

create table menu (
    id int primary key default nextval('menuSeq'),
    date date
); 

create table plat (
    id int primary key default nextval('platSeq'),
    nom varchar(255) NOT NULL,
    prix float,
    check (length(nom) > 0),
    unique (nom)
);

create table menu_plat (
    id int primary key default nextval('menuPlatSeq'),
    id_menu int,
    id_plat int,
    foreign key (id_menu) references menu(id),
    foreign key (id_plat) references plat(id)
);

create table etudiant (
    id int primary key default nextval('etudiantSeq'),
    etu varchar(9) NOT NULL,
    mot_de_passe varchar(200)  NOT NULL,
    nom varchar(50) NOT NULL,
    date_naissance date NOT NULL,
    check (length(etu) > 0),
    check (length(mot_de_passe) > 0),
    check (length(nom) > 0),
    unique (etu)
);

create table commander (
    id int primary key default nextval('commanderSeq'),
    id_plat_menu int,
    quantite float ,
    id_etudiant int,
    foreign key (id_plat_menu) references menu_plat(id),
    foreign key (id_etudiant) references etudiant(id)
);

insert into menu (date) values ('2021-01-07');
insert into menu (date) values ('2021-01-08');
insert into menu (date) values ('2021-01-09');

insert into plat (nom, prix) values ('poulet sauce', 10000);
insert into plat (nom, prix) values ('poulet rôti', 15000);
insert into plat (nom, prix) values ('spaghetti carbonara', 8000);
insert into plat (nom, prix) values ('mine-sao spécial', 7500);
insert into plat (nom, prix) values ('henakisoa sy ravitoto', 12000);
insert into plat (nom, prix) values ('steack frite', 12500);
insert into plat (nom, prix) values ('double cheese burger poulet', 15000);
insert into plat (nom, prix) values ('poulet laquet', 13000);

insert into menu_plat (id_menu, id_plat) values (1, 1);
insert into menu_plat (id_menu, id_plat) values (1, 2);
insert into menu_plat (id_menu, id_plat) values (1, 3);

insert into menu_plat (id_menu, id_plat) values (2, 4);
insert into menu_plat (id_menu, id_plat) values (2, 5);
insert into menu_plat (id_menu, id_plat) values (2, 6);

insert into menu_plat (id_menu, id_plat) values (3, 7);
insert into menu_plat (id_menu, id_plat) values (3, 8);

insert into etudiant (etu, mot_de_passe, nom, date_naissance) values ('etu000982', 'hihi', 'jean', '1995-05-01');
insert into etudiant (etu, mot_de_passe, nom, date_naissance) values ('etu000983', 'hihi', 'ravo', '1997-07-01');

create view montant_plat_etudiant as  select commander.id_etudiant, sum(commander.quantite * plat.prix) as total from commander join menu_plat on menu_plat.id = commander.id_plat_menu join plat on menu_plat.id_plat = plat.id group by commander.id_etudiant;

create view commander_plat as select id_plat_menu, sum(quantite) as quantite from commander group by id_plat_menu;



select menu_plat.id_menu, sum(commander.quantite * plat.prix) as total from commander join menu_plat on menu_plat.id = commander.id_plat_menu join plat on plat.id = menu_plat.id_plat where commander.id_etudiant = 2 and menu_plat.id_menu = 1 group by (menu_plat.id_menu);



