drop table  IF EXISTS idiomas CASCADE;
drop table  IF EXISTS resultados CASCADE;
drop table  IF EXISTS usuarios CASCADE;
drop table  IF EXISTS roles CASCADE;
drop table IF EXISTS temas CASCADE;
drop table IF EXISTS apartados CASCADE;
drop table IF EXISTS niveles CASCADE;
drop table IF EXISTS preguntas CASCADE;
drop table IF EXISTS respuestas CASCADE;
drop table IF EXISTS sesiones CASCADE;
drop table IF EXISTS sesiones_apartados CASCADE;
drop table IF EXISTS examen CASCADE;
drop table IF EXISTS sesiones_temas CASCADE;

create table roles (
  id_rol bigserial constraint pk_roles primary key,
  descripcion varchar(45) not null
);

insert into roles (descripcion) values ('Administrador');
insert into roles (descripcion) values ('Usuario');

create table usuarios (
  id bigserial constraint pk_usuarios primary key,
  username varchar(50) not null,
  email varchar(80) not null,
  password varchar(250) not null,
  authkey varchar(250) not null,
  accesstoken varchar(250) not null,
  activate boolean not null default false,
  rol_id bigint default 2 references roles (id_rol) on delete no action on update cascade
);

insert into usuarios (username, email, password, authkey, accesstoken, activate, rol_id) values('aurora','aurora@gmail.com','fsJl5YYV2GU46','aurora','aurora', true, 1);
insert into usuarios (username, email, password, authkey, accesstoken, activate) values('lolo','lolo@gmail.com','lologonzalez','lolo','lolo', true);


create table idiomas (
  id_idioma   bigserial constraint pk_idiomas primary key,
  descripcion varchar(50) not null,
  icono varchar(100)
);
insert into idiomas (descripcion, icono) values ('Inglés', 'images/iconosBanderas/england.png');
insert into idiomas (descripcion, icono) values ('Español', 'images/iconosBanderas/spain.png');
insert into idiomas (descripcion, icono) values ('Francés', 'images/iconosBanderas/france.png');
insert into idiomas (descripcion, icono) values ('Alemán', 'images/iconosBanderas/germany.png');
insert into idiomas (descripcion, icono) values ('Italiano', 'images/iconosBanderas/italy.png');


create table niveles (
    id_nivel bigserial constraint pk_niveles primary key,
    descripcion varchar(50),
    id_idioma bigint  references idiomas (id_idioma) on delete no action on update cascade
);

insert into niveles (descripcion, id_idioma) values ('Básico', 3);
insert into niveles (descripcion, id_idioma) values ('Medio', 3);
insert into niveles (descripcion, id_idioma) values ('Avanzado', 3);

create table temas (
  id_tema bigserial constraint pk_temas primary key,
  titulo varchar(50) not null,
  descripcion varchar(150) not null,
  id_idioma bigint  references idiomas (id_idioma) on delete no action on update cascade

);

insert into temas (titulo, descripcion, id_idioma) values ('Tema 1 -Verbo To Be-','This is the description of Theme 1', 1);
insert into temas (titulo, descripcion, id_idioma) values ('Tema 2','This is the description of Theme 2', 1);
insert into temas (titulo, descripcion, id_idioma) values ('Tema 3','This is the description of Theme 3', 1);
insert into temas (titulo, descripcion, id_idioma) values ('Tema 4','This is the description of Theme 4', 1);
insert into temas (titulo, descripcion, id_idioma) values ('Tema 1','Descripción del tema 1', 2);
insert into temas (titulo, descripcion, id_idioma) values ('Tema 2','Descripción del tema 2', 2);
insert into temas (titulo, descripcion, id_idioma) values ('Tema 3','Descripción del tema 3', 2);
insert into temas (titulo, descripcion, id_idioma) values ('Tema 4','Descripción del tema 4', 2);

create table apartados (
  id_apartado bigserial     constraint pk_apartados primary key,
  id_tema     bigint        references temas (id_tema) on delete no action on update cascade,
  titulo      varchar(100)  not null,
  contenido   text not null
);

insert into apartados (id_tema, titulo, contenido) values (1,'1-Significado  verbo To Be','contenido');
insert into apartados (id_tema, titulo, contenido) values (1,'2-Conjugacion en presente verbo To Be','contenido');
insert into apartados (id_tema, titulo, contenido) values (1,'3-Usos del verbo To Be','contenido');
insert into apartados (id_tema, titulo, contenido) values (5,'1-Conjugacion verbo Ser','contenido');


create table preguntas (
  id_pregunta bigserial constraint pk_preguntas primary key,
  id_apartado bigint    references apartados (id_apartado) on delete no action on update cascade,
  pregunta    varchar(255) not null
);

insert into preguntas (id_apartado, pregunta) values (1,'¿Qué significa verbo To Be?');


create table respuestas (
  id_respuesta bigserial constraint pk_respuestas primary key,
  id_pregunta  bigint    references preguntas (id_pregunta) on delete no action on update cascade,
  descripcion varchar(50)
);

insert into respuestas (id_pregunta, descripcion) values (1,'ser o estar');


create table sesiones (
  id_sesion   bigserial constraint pk_sesiones primary key,
  id_usuario  bigint not null references usuarios (id) on delete no action on update cascade,
  id_idioma   bigint not null references idiomas (id_idioma) on delete no action on update cascade,
  fecha       timestamp not null default current_timestamp,
  fin         boolean not null default false
);

insert into sesiones (id_usuario, id_idioma, fin) values (1, 1, false);
insert into sesiones (id_usuario, id_idioma, fin) values (1, 2, false);

create table sesiones_temas (
  id_sesion_tema bigserial constraint pk_sesiones_temas primary key,
  id_sesion bigint references sesiones (id_sesion) on delete no action on update cascade,
  id_tema bigint references temas (id_tema) on delete no action on update cascade,
  fecha timestamp not null  default current_timestamp,
  finalizado boolean not null default false
);

insert into sesiones_temas (id_sesion, id_tema, finalizado) values (1, 1, true);
insert into sesiones_temas (id_sesion, id_tema, finalizado) values (1, 2, true);
insert into sesiones_temas (id_sesion, id_tema, finalizado) values (1, 3, false);
insert into sesiones_temas (id_sesion, id_tema, finalizado) values (2, 5, true);
insert into sesiones_temas (id_sesion, id_tema, finalizado) values (2, 6, false);

create table sesiones_apartados (
  id_sesion_apartado bigserial constraint pk_sesiones_apartados primary key,
  id_sesion_tema bigint references sesiones_temas (id_sesion_tema) on delete no action on update cascade,
  id_apartado bigint references apartados (id_apartado) on delete no action on update cascade,
  fecha timestamp not null  default current_timestamp,
  finalizado boolean not null default false
);

insert into sesiones_apartados (id_sesion_tema, id_apartado, finalizado) values (1, 1, false);
insert into sesiones_apartados (id_sesion_tema, id_apartado, finalizado) values (1, 2, false);
insert into sesiones_apartados (id_sesion_tema, id_apartado, finalizado) values (1, 3, true);

create table examen (
  id_examen bigserial constraint pk_examen primary key,
  id_sesion_apartado bigint references sesiones_apartados (id_sesion_apartado) on delete no action on update cascade,
  puntuacion integer not null,
  puntuacion_minima integer not null
);

create table resultados (
  id_resultado bigserial constraint pk_resultado primary key,
  fecha timestamp not null  default current_timestamp,
  id_sesion_apartado bigint references sesiones_apartados (id_sesion_apartado) on delete no action on update cascade,
  id_pregunta bigint references preguntas (id_pregunta) on delete no action on update cascade,
  id_respuesta bigint references respuestas (id_respuesta) on delete no action on update cascade,
  correcto boolean not null,
  puntuacion_minima integer not null
);
insert into resultados (id_sesion_apartado, id_pregunta, id_respuesta, correcto, puntuacion_minima) values (1, 1, 1, true, 80);
