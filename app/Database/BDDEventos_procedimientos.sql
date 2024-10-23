-------------------------------------------------------------------------
--
--                  PROCEDIMIENTOS PARA AUTH
--
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
                      fecha_actualizacion = NOW()
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
--
--                  PROCEDIMIENTOS PARA DIRECCION
--
-------------------------------------------------------------------------

		CREATE PROCEDURE listar_direccion(IN p_id INT)
              SELECT 	*
                FROM 	direccion d 
               WHERE  d.id = p_id;

-------------------------------------------------------------------------

		CREATE PROCEDURE insert_direccion(IN p_descripcion_dire VARCHAR(300))
        INSERT INTO direccion(id,descripcion_dire,fecha_inactivo,ind_activo)
               VALUES (NULL,p_descripcion_dire,NULL,1);

-------------------------------------------------------------------------

		CREATE PROCEDURE update_direccion(IN p_id INT,
                                      IN p_descripcion_dire VARCHAR(300)
                                     )
              UPDATE  direccion
                 SET  descripcion_dire = p_descripcion_dire
               WHERE  id = p_id;
            
 -------------------------------------------------------------------------

		CREATE PROCEDURE delete_direccion(IN p_id INT)
              UPDATE  direccion
                 SET  fecha_inactivo = NOW(),
                      ind_activo = 0
               WHERE  id = p_id;
-------------------------------------------------------------------------
--
--                  PROCEDIMIENTOS PARA SERVICIO
--
-------------------------------------------------------------------------

		CREATE PROCEDURE listar_servicio(IN p_id INT)
              SELECT 	*
                FROM 	servicio s
               WHERE  s.id = p_id;

-------------------------------------------------------------------------

		CREATE PROCEDURE insert_servicio(IN p_nombre_servicio VARCHAR(300))
        INSERT INTO servicio(id,nombre_servicio,fecha_inactivo,ind_activo)
               VALUES (NULL,p_nombre_servicio,NULL,1);

-------------------------------------------------------------------------

		CREATE PROCEDURE update_servicio(IN p_id INT,
                                      IN p_nombre_servicio VARCHAR(300)
                                     )
              UPDATE  servicio
                 SET  nombre_servicio = p_nombre_servicio
               WHERE  id = p_id;
            
 -------------------------------------------------------------------------

		CREATE PROCEDURE delete_servicio(IN p_id INT)
              UPDATE  servicio
                 SET  fecha_inactivo = NOW(),
                      ind_activo = 0
               WHERE  id = p_id;

-------------------------------------------------------------------------
--
--                  PROCEDIMIENTOS PARA CATEGORIA
--
-------------------------------------------------------------------------

		CREATE PROCEDURE listar_servicio(IN p_id INT)
              SELECT 	*
                FROM 	servicio s
               WHERE  s.id = p_id;

-------------------------------------------------------------------------

		CREATE PROCEDURE insert_servicio(IN p_nombre_servicio VARCHAR(300))
        INSERT INTO servicio(id,nombre_servicio,fecha_inactivo,ind_activo)
               VALUES (NULL,p_nombre_servicio,NULL,1);

-------------------------------------------------------------------------

		CREATE PROCEDURE update_servicio(IN p_id INT,
                                      IN p_nombre_servicio VARCHAR(300)
                                     )
              UPDATE  servicio
                 SET  nombre_servicio = p_nombre_servicio
               WHERE  id = p_id;
            
 -------------------------------------------------------------------------

		CREATE PROCEDURE delete_servicio(IN p_id INT)
              UPDATE  servicio
                 SET  fecha_inactivo = NOW(),
                      ind_activo = 0
               WHERE  id = p_id;