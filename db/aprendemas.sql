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

create table roles (
  id_rol bigserial constraint pk_roles primary key,
  descripcion varchar(45) not null
);

insert into roles (descripcion) values ('Administrador');
insert into roles (descripcion) values ('Invitado');
insert into roles (descripcion) values ('Usuario');

create table usuarios (
  id_usuario bigserial constraint pk_usuarios primary key,
  nombre varchar(45) not null,
  user_pass varchar(32),
  email varchar(75) not null,
  rol_id bigint references roles (id_rol) on delete no action on update cascade
);

create table idiomas (
  id_idioma   bigserial constraint pk_idiomas primary key,
  descripcion varchar(50) not null
);

insert into idiomas (descripcion) values ('Español');
insert into idiomas (descripcion) values ('Francés');
insert into idiomas (descripcion) values ('Inglés');
insert into idiomas (descripcion) values ('Alemán');
insert into idiomas (descripcion) values ('Italiano');

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
  descripcion varchar(150) not null,
  id_nivel bigint  references niveles (id_nivel) on delete no action on update cascade

);

insert into temas (descripcion, id_nivel) values ('This is the description of Theme 1', 1);
insert into temas (descripcion, id_nivel) values ('This is the description of Theme 2', 1);
insert into temas (descripcion, id_nivel) values ('This is the description of Theme 3', 1);
insert into temas (descripcion, id_nivel) values ('This is the description of Theme 4', 1);

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
  id_usuario  bigint not null references usuarios (id_usuario) on delete no action on update cascade,
  id_idioma   bigint not null references idiomas (id_idioma) on delete no action on update cascade,
  fecha       timestamp not null, --datetime??
  exito       boolean not null default false
);

create table sesiones_apartados (
  id_sesion_apartado bigserial constraint pk_sesiones_apartados primary key,
  id_sesion bigint references sesiones (id_sesion) on delete no action on update cascade,
  id_apartado bigint references apartados (id_apartado) on delete no action on update cascade,
  fecha timestamp not null --datetime???
);

create table examen (
  id_examen bigserial constraint pk_examen primary key,
  id_sesion_apartado bigint references sesiones_apartados (id_sesion_apartado) on delete no action on update cascade,
  puntuacion integer not null,
  puntuacion_minima integer not null
);

create table resultados (
  id_resultado bigserial constraint pk_resultado primary key,
  fecha timestamp not null,
  id_sesion_apartado bigint references sesiones_apartados (id_sesion_apartado) on delete no action on update cascade,
  id_pregunta bigint references preguntas (id_pregunta) on delete no action on update cascade,
  id_respuesta bigint references respuestas (id_respuesta) on delete no action on update cascade,
  correcto boolean not null,
  puntuacion_minima integer not null
);
