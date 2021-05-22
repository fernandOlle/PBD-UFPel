create database TorneioFacil
use TorneioFacil

create table torneio (id_torneio serial not null, dt_ini timestamp not null, dt_fim timestamp not null, orcamento int,endereco char(30));
alter table torneio add primary key(id_torneio);

create table patrocinador (id_patrocinio serial not null, cpf/cnpj serial not null, nome varchar(30) not null, contribuiçao int, id_torneio serial not null);
alter table patrocinador add primary key(id_patrocinio);
alter table patrocinador add foreign key (id_torneio) references torneio (id_torneio) ON DELETE SET NULL ON UPDATE CASCADE;

create table organizador(cpf/cnpj serial not null, nome char(30) not null, telefone char(9), email char(30), id_torneio);
alter table organizador add primary key(cpf/cnpj);
alter table organizador add foreign key (id_torneio) references torneio (id_torneio) ON DELETE SET NULL ON UPDATE CASCADE;

create table dias (id_dias serial not null, dt_ini timestamp not null, hr_ini timestamp not null, id_torneio timestamp not null);
alter table dias add primary key(id_dias);
alter table dias references torneio (id_torneio) ON DELETE SET NULL ON UPDATE CASCADE;

create table ingresso(id_ingresso serial not null, valor int not null, dt_partida timestamp not null, nmr_assento timestamp not null, cpf serial not null, id_torneio serial not null, id_dias serial not null);
alter table ingresso add primary key(id_ingresso);
alter table ingresso add foreign key (id_torneio) references torneio (id_torneio) ON DELETE SET NULL ON UPDATE CASCADE;
alter table ingresso add foreign key (id_dias) references dias (id_dias) ON DELETE SET NULL ON UPDATE CASCADE;

create table patrocinadormaterial (id_patrocinio serial not null, tipo varchar(30), dt_aquisicao timestamp not null, local_guardado char(30));
alter table patrocinadormaterial add primary key(id_patrocinio);

create table equipamento (id_equipamento serial not null, tipo varchar(30), partdesiguinada char(30), id_patrocinio serial not null);
alter table equipamento add primary key(id_equipamento);
alter table equipamento add foreign key (id_patrocinio) references patrocinadormaterial (id_patrocinio) ON DELETE SET NULL ON UPDATE CASCADE;

create table times (id_time serial not null, nome_integrantes char(30) not null, nome_time char(30), nmr_integrantes int, total_partidas int, rodaatual int, eliminado boolean, id_torneio serial not null);
alter table times add primary key(id_time);
alter table times add foreign key (id_torneio) references torneio (id_torneio)  ON DELETE SET NULL ON UPDATE CASCADE;

create table integrante (cpf serial not null, nome char(30) not null, email char(30), id_time serial not null);
alter table integrante add primary key(cpf);
alter table integrante add foreign key (id_time) references times (id_time)	ON DELETE SET NULL ON UPDATE CASCADE;

create table integrantestime (id_time serial not null, id_integrante serial not null);
alter table integrantestime add foreign key (id_integrante) references integrante (cpf) ON DELETE SET NULL ON UPDATE CASCADE;
alter table integrantestime add foreign key (id_time) references times (id_time) ON DELETE SET NULL ON UPDATE CASCADE;

create table designado (id_dias serial not null, id_equipamento serial not null);
alter table designado add foreign key (id_equipamento) references equipamento (id_equipamento) ON DELETE SET NULL ON UPDATE CASCADE;
alter table designado add foreign key (id_dias) references dias (id_dias) ON DELETE SET NULL ON UPDATE CASCADE;

create table alugadoemprestado (id_equipamento serial not null, datadevolucao timestamp not null, valor int, emprestado boolean);
alter table alugadoemprestado add primary key(id_equipamento);

create table comprado (id_equipamento serial not null, valor int);
alter table comprado add primary key(id_equipamento);

create table participa(id_dias serial not null, id_time serial not null);
alter table participa add foreign key (id_dias) references dias (id_dias) ON DELETE SET NULL ON UPDATE CASCADE;
alter table participa add foreign key (id_time) references times (id_time) ON DELETE SET NULL ON UPDATE CASCADE;

