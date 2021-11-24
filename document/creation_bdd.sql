--
-- base de données: 'annuaire'
--
create database if not exists annuaire default character set utf8 collate utf8_general_ci;
use annuaire;
-- --------------------------------------------------------
-- creation des tables

set foreign_key_checks =0;

-- table profil
drop table if exists profil;
create table profil (
	pro_id int not null auto_increment primary key,
	pro_libelle varchar(100) not null
)engine=innodb;

-- table utilisateur
drop table if exists utilisateur;
create table utilisateur (
	uti_id int not null auto_increment primary key,
	uti_login varchar(100) unique not null,
	uti_mdp varchar(500) not null,
	uti_profil int not null
)engine=innodb;

-- table message
drop table if exists message;
create table message (
	mes_id int not null auto_increment primary key,
	mes_auteur int not null,
	mes_datetime datetime not null,
	mes_text varchar(1000) not null
)engine=innodb; 

set foreign_key_checks =1;

-- contraintes
alter table utilisateur add constraint cs1 foreign key (uti_profil) references profil(pro_id);
alter table message add constraint cs2 foreign key (mes_auteur) references utilisateur(uti_id);
