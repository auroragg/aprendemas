------------------------------
-- Archivo de base de datos --
------------------------------
drop table  IF EXISTS idiomas CASCADE;
drop table IF EXISTS temas CASCADE;
drop table IF EXISTS apartados CASCADE;
drop table IF EXISTS preguntas CASCADE;
drop table IF EXISTS respuestas CASCADE;
drop table IF EXISTS sesiones CASCADE;
drop table IF EXISTS sesiones_apartados CASCADE;
drop table IF EXISTS examen CASCADE;

create table idiomas (
  id_idioma   bigserial constraint pk_idiomas primary key,
  descripcion varchar(50) not null
);

insert into idiomas (descripcion) values ('Español');
insert into idiomas (descripcion) values ('Francés');
insert into idiomas (descripcion) values ('Inglés');
insert into idiomas (descripcion) values ('Alemán');
insert into idiomas (descripcion) values ('Italiano');

create table temas (
  id_tema bigserial constraint pk_temas primary key,
  id_idioma bigint  references idiomas (id_idioma) on delete no action on update cascade,
  descripcion varchar(150) not null
);

insert into temas (id_idioma, descripcion) values (3, 'This is the description of Theme 1');
insert into temas (id_idioma, descripcion) values (3, 'This is the description of Theme 2');
insert into temas (id_idioma, descripcion) values (3, 'This is the description of Theme 3');
insert into temas (id_idioma, descripcion) values (3, 'This is the description of Theme 4');

create table apartados (
  id_apartado bigserial     constraint pk_apartados primary key,
  id_tema     bigint        references temas (id_tema) on delete no action on update cascade,
  titulo      varchar(100)  not null,
  contenido   text not null
);

/*insert into apartados (id_tema, titulo, contenido) values (1,'Apartado 1','');*/

create table preguntas (
  id_pregunta bigserial constraint pk_preguntas primary key,
  id_apartado bigint    references apartados (id_apartado) on delete no action on update cascade,
  pregunta    varchar(255) not null
);

create table respuestas (
  id_respuesta bigserial constraint pk_respuestas primary key,
  id_pregunta  bigint    references preguntas (id_pregunta) on delete no action on update cascade,
  descripcion varchar(50)
);


create table sesiones (
  id_sesion   bigserial constraint pk_sesiones primary key,
  id_usuario  bigint not null,
  id_idioma   bigint not null references idiomas (id_idioma) on delete no action on update cascade,
  fecha       time not null, --datetime??
  exito       boolean not null default false
);

create table sesiones_apartados (
  id_sesion_apartado bigserial constraint pk_sesiones_apartados primary key,
  id_sesion bigint references sesiones (id_sesion) on delete no action on update cascade,
  id_apartado bigint references apartados (id_apartado) on delete no action on update cascade,
  fecha time not null --datetime???
);

create table examen (
  id_examen bigserial constraint pk_examen primary key,
  id_sesion_apartado bigint references sesiones_apartados (id_sesion_apartado) on delete no action on update cascade,
  puntuacion integer not null,
  puntuacion_minima integer not null
);

