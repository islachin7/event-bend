create database bddevento;
use bddevento;

-------------------------------------------------------------------------

create table tipousuario(
  id int primary key AUTO_INCREMENT,
  nombre varchar(200)
);

-------------------------------------------------------------------------

CREATE TABLE usuario (
  id int primary key AUTO_INCREMENT,
  nombre varchar(100) ,
  apellido varchar(100),
  correo varchar(200),
  password varchar(255),
  ind_veri_corre int,
  ind_activo int,
  fecha_creacion datetime DEFAULT current_timestamp(),
  fecha_actualizacion datetime DEFAULT current_timestamp(),
  fecha_inactivo datetime,
  tipousuario int,
  index(tipousuario),
  foreign key (tipousuario) references tipousuario(id)
);

-------------------------------------------------------------------------

CREATE TABLE usuario_recuperacion (
  id int primary key AUTO_INCREMENT,
  usuarioid int,
  cod_recupe varchar(6),
  fecha_envio datetime,
  index(usuarioid),
  foreign key (usuarioid) references usuario(id)
);

-------------------------------------------------------------------------

		CREATE PROCEDURE listar_usuarioCorreo(IN p_correo VARCHAR(200))
              SELECT 	u.id, 
                      u.nombre, 
                      u.apellido, 
                      u.correo,
                      u.tipousuario as tipo, 
                      tu.nombre as tipousuario,
                      u.password,
                      u.ind_activo
                FROM 	usuario u 
          INNER JOIN 	tipousuario tu on tu.id = u.tipousuario
              WHERE 	u.ind_activo = 1
                AND  u.correo = p_correo;
    

-------------------------------------------------------------------------


		CREATE PROCEDURE listar_usuariosActivos()
              SELECT 	u.id, 
                      u.nombre, 
                      u.apellido,
                      u.correo, 
                      tu.nombre as tipousuario,
                      u.ind_activo 
                FROM 	usuario u 
          INNER JOIN 	tipousuario tu on tu.id = u.tipousuario
              WHERE 	u.ind_activo = 1;


-------------------------------------------------------------------------


		CREATE PROCEDURE listar_traerCodigo(IN p_id INT)
              SELECT 	u.cod_recupe,
                      u.fecha_envio
                FROM 	usuario_recuperacion u 
               WHERE  u.usuarioid = p_id;


-------------------------------------------------------------------------


		CREATE PROCEDURE update_passwordReset(IN p_id INT,IN p_pass VARCHAR(255))
              UPDATE  usuario
                 SET  password = p_pass,
                 SET  fecha_actualizacion = NOW()
               WHERE  id = p_id;

-------------------------------------------------------------------------


		CREATE PROCEDURE insert_codigoRecuperacion(IN p_id INT,IN p_codigo VARCHAR(6))
        INSERT INTO usuario_recuperacion(id,usuarioid,cod_recupe,fecha_envio)
               VALUES (NULL,p_id,p_codigo,NOW());
            
 -------------------------------------------------------------------------


		CREATE PROCEDURE delete_codigoRecuperacion(IN p_id INT)
          DELETE FROM usuario_recuperacion
                WHERE usuarioid = p_id;

-------------------------------------------------------------------------

INSERT INTO tipousuario (id, nombre) VALUES (NULL, 'administrador');
INSERT INTO tipousuario (id, nombre) VALUES (NULL, 'usuario');
INSERT INTO usuario (id, nombre, apellido, correo, password,cod_recupe,ind_veri_corre,ind_activo,fecha_creacion, fecha_actualizacion,fecha_inactivo,tipousuario)
VALUES (NULL, 'mario', 'lopez', 'mlopez@gmail.com','$2y$10$9AeMX15gBkAwXglycop.VuXvynxWoC1YLNNryhA6cpWuoqipIjdZa',NULL,0,1,current_timestamp(),current_timestamp(),NULL,1);

