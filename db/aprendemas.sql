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
drop table IF EXISTS usuarios_sesiones CASCADE;
drop table IF EXISTS sesiones_apartados CASCADE;
drop table IF EXISTS examen CASCADE;
/*drop table IF EXISTS sesiones_temas CASCADE;*/

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

insert into temas (titulo, descripcion, id_idioma) values ('Tema 1 -Verbo To Be-','Verbo To Be: Significado, usos, conjugación', 1);
insert into temas (titulo, descripcion, id_idioma) values ('Tema 2','This is the description of Theme 2', 1);
insert into temas (titulo, descripcion, id_idioma) values ('Tema 3','This is the description of Theme 3', 1);
insert into temas (titulo, descripcion, id_idioma) values ('Tema 4','This is the description of Theme 4', 1);
insert into temas (titulo, descripcion, id_idioma) values ('Tema 1','Descripción del tema 1', 2);
insert into temas (titulo, descripcion, id_idioma) values ('Tema 2','Descripción del tema 2', 2);
insert into temas (titulo, descripcion, id_idioma) values ('Tema 3','Descripción del tema 3', 2);
insert into temas (titulo, descripcion, id_idioma) values ('Tema 4','Descripción del tema 4', 2);
insert into temas (titulo, descripcion, id_idioma) values ('Tême 1','Recherche del tema 1', 3);
insert into temas (titulo, descripcion, id_idioma) values ('Tême 2','Manger del tema 2', 3);
insert into temas (titulo, descripcion, id_idioma) values ('Tême 3','Porculer del tema 3', 3);
insert into temas (titulo, descripcion, id_idioma) values ('Tême 1','Brugenbanveh 1', 4);
insert into temas (titulo, descripcion, id_idioma) values ('Tême 2','Gutten Morguen 2', 4);
insert into temas (titulo, descripcion, id_idioma) values ('Tême 3','Valar morguris 3', 4);
insert into temas (titulo, descripcion, id_idioma) values ('Tême 1','Il bambino 1', 5);
insert into temas (titulo, descripcion, id_idioma) values ('Tême 2','Pizza bona 2', 5);
insert into temas (titulo, descripcion, id_idioma) values ('Tême 3','Arriva a la Italia 3', 5);

create table apartados (
  id_apartado bigserial     constraint pk_apartados primary key,
  id_tema     bigint        references temas (id_tema) on delete no action on update cascade,
  titulo      varchar(100)  not null,
  contenido   text not null,
  puntuacion_minima integer
);

insert into apartados (id_tema, titulo, contenido, puntuacion_minima) values (1,'1-Verbo To Be','El verbo to be (ser/estar) es uno de los verbos que más se usa en inglés y es un verbo irregular, así que es importante saber bien cómo se conjuga y cuándo se usa. Conjugacion verbo To Be presente:
I am</br>
You are
He/She is
We are
You are
They are', 5);
insert into apartados (id_tema, titulo, contenido, puntuacion_minima) values (1,'2-Usos del verbo To Be','Este verbo se usa con adjetivos,
 nacionalidades, para descripciones, para hablar de estados físicos y mentales, para decir la edad, para ocupaciones y
 para decir la hora', 5);
insert into apartados (id_tema, titulo, contenido, puntuacion_minima) values (1,'3-Pasado del verbo To Be','contenido', 5);
insert into apartados (id_tema, titulo, contenido, puntuacion_minima) values (2,'1-Otros usos ','contenido', 5);
insert into apartados (id_tema, titulo, contenido, puntuacion_minima) values (3,'1-Otro apartado más','contenido', 5);
insert into apartados (id_tema, titulo, contenido, puntuacion_minima) values (4,'1-Otro apartado más','contenido', 5);
insert into apartados (id_tema, titulo, contenido, puntuacion_minima) values (5,'1-Conjugacion verbo Ser','contenido', 5);
insert into apartados (id_tema, titulo, contenido, puntuacion_minima) values (5,'1-Conjugacion verbo Ser','contenido', 5);
insert into apartados (id_tema, titulo, contenido, puntuacion_minima) values (9,'1-Ques que vou va faire?','contenido', 5);
insert into apartados (id_tema, titulo, contenido, puntuacion_minima) values (9,'2-Coman sa apelle?','contenido', 5);
insert into apartados (id_tema, titulo, contenido, puntuacion_minima) values (12,'1-Gutten Triken forgotten','contenido', 5);
insert into apartados (id_tema, titulo, contenido, puntuacion_minima) values (13,'1-Gutten Triken forgotten','contenido', 5);
insert into apartados (id_tema, titulo, contenido, puntuacion_minima) values (14,'1-Il mio penna que molto miseria','contenido', 5);
insert into apartados (id_tema, titulo, contenido, puntuacion_minima) values (15,'1-Il mio penna que molto miseria','contenido', 5);
insert into apartados (id_tema, titulo, contenido, puntuacion_minima) values (16,'1-Il mio penna que molto miseria','contenido', 5);
insert into apartados (id_tema, titulo, contenido, puntuacion_minima) values (17,'1-Il mio penna que molto miseria','contenido', 5);


create table preguntas (
  id_pregunta bigserial constraint pk_preguntas primary key,
  id_apartado bigint    references apartados (id_apartado) on delete no action on update cascade,
  pregunta    varchar(255) not null
);

insert into preguntas (id_apartado, pregunta) values (1,'¿Qué significa verbo To Be?');
insert into preguntas (id_apartado, pregunta) values (1,'Conjuga el verbo To Be:  I ______');
insert into preguntas (id_apartado, pregunta) values (1,'Conjuga el verbo To Be:  We ______');
insert into preguntas (id_apartado, pregunta) values (1,'Conjuga el verbo To Be:  She ______');


create table respuestas (
  id_respuesta bigserial constraint pk_respuestas primary key,
  id_pregunta  bigint    references preguntas (id_pregunta) on delete no action on update cascade,
  descripcion varchar(50),
  es_correcta boolean
);

insert into respuestas (id_pregunta, descripcion, es_correcta) values (1,'ser o estar', true);
insert into respuestas (id_pregunta, descripcion, es_correcta) values (1,'ser', false);
insert into respuestas (id_pregunta, descripcion, es_correcta) values (1,'estar', false);
insert into respuestas (id_pregunta, descripcion, es_correcta) values (1,'poder', false);
insert into respuestas (id_pregunta, descripcion, es_correcta) values (2,'can', false);
insert into respuestas (id_pregunta, descripcion, es_correcta) values (2,'is', false);
insert into respuestas (id_pregunta, descripcion, es_correcta) values (2,'are', false);
insert into respuestas (id_pregunta, descripcion, es_correcta) values (2,'am', true);
insert into respuestas (id_pregunta, descripcion, es_correcta) values (3,'can', false);
insert into respuestas (id_pregunta, descripcion, es_correcta) values (3,'is', false);
insert into respuestas (id_pregunta, descripcion, es_correcta) values (3,'are', true);
insert into respuestas (id_pregunta, descripcion, es_correcta) values (3,'am', false);
insert into respuestas (id_pregunta, descripcion, es_correcta) values (4,'can', false);
insert into respuestas (id_pregunta, descripcion, es_correcta) values (4,'is', true);
insert into respuestas (id_pregunta, descripcion, es_correcta) values (4,'are', false);
insert into respuestas (id_pregunta, descripcion, es_correcta) values (4,'am', false);


create table sesiones (
  id_sesion   bigserial constraint pk_sesiones primary key,
  id_usuario  bigint not null references usuarios (id) on delete no action on update cascade,
  id_idioma   bigint not null references idiomas (id_idioma) on delete no action on update cascade,
  fecha       timestamp not null default current_timestamp,
  fin         boolean not null default false
);

insert into sesiones (id_usuario, id_idioma, fin) values ( 1, 1, false);
insert into sesiones (id_usuario, id_idioma, fin) values ( 1, 2, false);
insert into sesiones (id_usuario, id_idioma, fin) values ( 1, 3, true);

/*NUEVO
create table usuarios_sesiones(
    id_usuario_sesion bigserial constraint pk_usuarios_sesiones primary key,
    id_usuario bigint not null references usuarios (id) on delete no action on update cascade,
    id_sesion bigint not null references sesiones (id_sesion) on delete no action on update cascade
);

insert into usuarios_sesiones (id_usuario, id_sesion) values ( 1, 1);
insert into usuarios_sesiones (id_usuario, id_sesion) values ( 1, 2);
insert into usuarios_sesiones (id_usuario, id_sesion) values ( 1, 3);*/



/*create table sesiones_temas (
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
*/
create table sesiones_apartados (
  id_sesion_apartado bigserial constraint pk_sesiones_apartados primary key,
  id_sesion bigint references sesiones (id_sesion) on delete no action on update cascade,
  id_apartado bigint references apartados (id_apartado) on delete no action on update cascade,
  finalizado boolean not null default false
);

insert into sesiones_apartados (id_sesion, id_apartado, finalizado) values (1, 1, false);
insert into sesiones_apartados (id_sesion, id_apartado, finalizado) values (2, 1, true);
insert into sesiones_apartados (id_sesion, id_apartado, finalizado) values (3, 1, false);
insert into sesiones_apartados (id_sesion, id_apartado, finalizado) values (1, 2, false);
insert into sesiones_apartados (id_sesion, id_apartado, finalizado) values (1, 4, true);
insert into sesiones_apartados (id_sesion, id_apartado, finalizado) values (1, 6, true);

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
