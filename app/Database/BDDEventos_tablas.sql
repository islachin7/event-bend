create database bddevento;
use bddevento;

-------------------------------------------------------------------------

create table tipousuario(
  id      int primary key AUTO_INCREMENT,
  nombre  varchar(200)
);

-------------------------------------------------------------------------

CREATE TABLE usuario (
  id                  int primary key AUTO_INCREMENT,
  nombre              varchar(100) ,
  apellido            varchar(100),
  correo              varchar(200),
  password            varchar(255),
  ind_veri_corre      int,
  ind_activo          int,
  fecha_creacion      datetime DEFAULT current_timestamp(),
  fecha_actualizacion datetime DEFAULT current_timestamp(),
  fecha_inactivo      datetime,
  tipousuario         int,
  index(tipousuario),
  foreign key (tipousuario) references tipousuario(id)
);

-------------------------------------------------------------------------

CREATE TABLE usuario_recuperacion (
  id          int primary key AUTO_INCREMENT,
  usuarioid   int,
  cod_recupe  varchar(6),
  fecha_envio datetime,
  index(usuarioid),
  foreign key (usuarioid) references usuario(id)
);

-------------------------------------------------------------------------

CREATE TABLE direccion (
  id                int primary key AUTO_INCREMENT,
  nombre_direccion  varchar(300),
  descripcion_dire  varchar(300),
  numero_piso       int,
  aforo_max         int,
  fecha_inactivo    datetime,
  ind_activo        int -- 0 inactivo / 1 activo
);

-------------------------------------------------------------------------

CREATE TABLE servicio (
  id              int primary key AUTO_INCREMENT,
  nombre_servicio varchar(300),
  fecha_inactivo  datetime,
  ind_activo      int -- 0 inactivo / 1 activo
);

-------------------------------------------------------------------------

CREATE TABLE categoria (
  id                int primary key AUTO_INCREMENT,
  nombre_categoria  varchar(300),
  fecha_inactivo    datetime,
  ind_activo        int -- 0 inactivo / 1 activo
);

-------------------------------------------------------------------------

CREATE TABLE categoria_evento (
  id                  int primary key AUTO_INCREMENT,
  categoria           int,
  nombre_cate_evento  varchar(300),
  fecha_inactivo      datetime,
  ind_activo          int, -- 0 inactivo / 1 activo
  index(categoria),
  foreign key (categoria) references categoria(id)
);

-------------------------------------------------------------------------

CREATE TABLE evento (
  id                    int primary key AUTO_INCREMENT,
  nombre_organizador    varchar(200),
  apellido_organizador  varchar(200),
  nombre_evento         varchar(500),
  tipo_doc              int, 
  numero_doc            varchar(20),
  celular               varchar(20),
  direccion             int,
  correo                varchar(300),
  fecha_inicio          datetime,
  fecha_fin             datetime,
  categoria_evento      int,
  tipo_evento           int, 
  costo                 decimal(18,2),
  fecha_creacion        datetime DEFAULT current_timestamp(),
  fecha_actualizacion   datetime DEFAULT current_timestamp(),
  fecha_inactivo        datetime,
  ind_activo            int, 
  estado_evento         int, 
  index(categoria_evento),
  index(direccion),
  foreign key (categoria_evento) references categoria_evento(id),
  foreign key (direccion) references direccion(id)
);

-------------------------------------------------------------------------

CREATE TABLE servicio_evento (
  id                int primary key AUTO_INCREMENT,
  servicio          int,
  evento            int,
  fecha_asignacion  datetime DEFAULT current_timestamp(),
  fecha_inactivo    datetime,
  ind_activo        int, -- 0 inactivo / 1 activo
  index(servicio),
  index(evento),
  foreign key (servicio) references servicio(id),
  foreign key (evento) references evento(id)
);

-------------------------------------------------------------------------











