-------------------------------------------------------------------------
--
--                  PROCEDIMIENTOS PARA AUTH
--
-------------------------------------------------------------------------

		CREATE PROCEDURE listar_usuarioCorreo(IN p_correo VARCHAR(200))
                     SELECT u.id, 
                            u.nombre, 
                            u.apellido, 
                            u.correo,
                            u.tipousuario as tipo, 
                            tu.nombre as tipousuario,
                            u.password,
                            u.ind_activo
                       FROM usuario u 
                 INNER JOIN tipousuario tu on tu.id = u.tipousuario
                      WHERE u.ind_activo = 1
                        AND u.correo = p_correo;
    

-------------------------------------------------------------------------


		CREATE PROCEDURE listar_usuariosActivos()
                     SELECT u.id, 
                            u.nombre, 
                            u.apellido,
                            u.correo, 
                            tu.nombre as tipousuario,
                            u.ind_activo 
                       FROM usuario u 
                 INNER JOIN tipousuario tu on tu.id = u.tipousuario
                      WHERE	u.ind_activo = 1;


-------------------------------------------------------------------------


		CREATE PROCEDURE listar_traerCodigo(IN p_id INT)
                     SELECT  u.cod_recupe,
                            u.fecha_envio
                     FROM  usuario_recuperacion u 
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

		CREATE PROCEDURE listar_direcciones()
                     SELECT  *
                     FROM 	direccion d;

-------------------------------------------------------------------------

		CREATE PROCEDURE listar_direccion(IN p_id INT)
                     SELECT *
                     FROM 	direccion d
                    WHERE  d.id = p_id;

-------------------------------------------------------------------------

		CREATE PROCEDURE insert_direccion( IN p_nombre_direccion VARCHAR(300),
                                                 IN p_descripcion_dire VARCHAR(300),
                                                 IN p_numero_piso INT,
                                                 IN p_aforo_max INT
                                               )
                     INSERT INTO direccion( id,
                                            nombre_direccion,
                                            descripcion_dire,
                                            numero_piso,
                                            aforo_max,
                                            fecha_inactivo,
                                            ind_activo)

                                   VALUES ( NULL,
                                            p_nombre_direccion,
                                            p_descripcion_dire,
                                            p_numero_piso,
                                            p_aforo_max,
                                            NULL,
                                            1
                                          );

-------------------------------------------------------------------------

		CREATE PROCEDURE update_direccion( IN p_id INT,
                                                 IN p_nombre_direccion VARCHAR(300),
                                                 IN p_descripcion_dire VARCHAR(300),
                                                 IN p_numero_piso INT,
                                                 IN p_aforo_max INT
                                                )
                     UPDATE  direccion
                        SET  nombre_direccion =  p_nombre_direccion,            
                             descripcion_dire =  p_descripcion_dire,            
                             numero_piso      =  p_numero_piso,     
                             aforo_max        =  p_aforo_max     
                     WHERE  id = p_id;

-------------------------------------------------------------------------

		CREATE PROCEDURE update_direccion_acti( IN p_id INT)
                     UPDATE  direccion
                     SET  fecha_inactivo = NULL,
                          ind_activo = 1
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

		CREATE PROCEDURE listar_servicios()
                     SELECT  *
                       FROM  servicio s;    
-------------------------------------------------------------------------

		CREATE PROCEDURE listar_servicio(IN p_id INT)
                     SELECT  *
                       FROM  servicio s
                      WHERE  s.id = p_id;    
-------------------------------------------------------------------------

		CREATE PROCEDURE insert_servicio(IN p_nombre_servicio VARCHAR(300))
                     INSERT INTO servicio(id,nombre_servicio,fecha_inactivo,ind_activo)
                            VALUES (NULL,p_nombre_servicio,NULL,1);

-------------------------------------------------------------------------

		CREATE PROCEDURE update_servicio(  IN p_id INT,
                                                 IN p_nombre_servicio VARCHAR(300)
                                              )
                     UPDATE  servicio
                     SET  nombre_servicio = p_nombre_servicio
                     WHERE  id = p_id;

-------------------------------------------------------------------------

		CREATE PROCEDURE update_servicio_acti( IN p_id INT)
                     UPDATE  servicio
                     SET  fecha_inactivo = NULL,
                          ind_activo = 1
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

		CREATE PROCEDURE listar_categorias()
                     SELECT  *
                       FROM  categoria c;

-------------------------------------------------------------------------

		CREATE PROCEDURE listar_categoria(IN p_id INT)
                     SELECT  *
                       FROM  categoria c
                      WHERE  c.id = p_id;

-------------------------------------------------------------------------

		CREATE PROCEDURE insert_categoria(IN p_nombre_categoria VARCHAR(300))
                     INSERT INTO categoria(id,nombre_categoria,fecha_inactivo,ind_activo)
                            VALUES (NULL,p_nombre_categoria,NULL,1);

-------------------------------------------------------------------------

		CREATE PROCEDURE update_categoria( IN p_id INT,
                                                 IN p_nombre_categoria VARCHAR(300)
                                                 )
                     UPDATE  categoria
                        SET  nombre_categoria = p_nombre_categoria
                     WHERE  id = p_id;

 -------------------------------------------------------------------------

		CREATE PROCEDURE update_categoria_acti(IN p_id INT)
                     UPDATE  categoria
                     SET  fecha_inactivo = null,
                            ind_activo = 1
                     WHERE  id = p_id;
            
 -------------------------------------------------------------------------

		CREATE PROCEDURE delete_categoria(IN p_id INT)
                     UPDATE  categoria
                     SET  fecha_inactivo = NOW(),
                            ind_activo = 0
                     WHERE  id = p_id;

-------------------------------------------------------------------------
--
--                  PROCEDIMIENTOS PARA CATEGORIA_EVENTO
--
-------------------------------------------------------------------------

		CREATE PROCEDURE listar_categorias_eventos()
                     SELECT ce.id,
                            ce.nombre_cate_evento,
                            ce.categoria,
                            c.nombre_categoria
                       FROM categoria_evento ce
                 INNER JOIN categoria c ON ce.categoria = c.id;

-------------------------------------------------------------------------

		CREATE PROCEDURE listar_categoria_evento(IN p_categoria INT)
                     SELECT ce.id,
                            ce.nombre_cate_evento,
                            ce.categoria,
                            c.nombre_categoria
                       FROM categoria_evento ce
                 INNER JOIN categoria c ON ce.categoria = c.id
                      WHERE ce.categoria = p_categoria;

-------------------------------------------------------------------------

		CREATE PROCEDURE insert_categoria_evento( IN p_categoria INT,
                                                        IN p_nombre_cate_evento VARCHAR(300)
                                                      )

                     INSERT INTO categoria_evento( id,
                                                   categoria,
                                                   nombre_cate_evento,
                                                   fecha_inactivo,
                                                   ind_activo
                                                 )
                            VALUES ( NULL,
                                     p_categoria,
                                     p_nombre_cate_evento,
                                     NULL,
                                     1);

-------------------------------------------------------------------------

		CREATE PROCEDURE update_categoria_evento( IN p_id INT,
                                                        IN p_categoria INT,
                                                        IN p_nombre_cate_evento VARCHAR(300))
                     UPDATE  categoria_evento
                        SET  categoria = p_categoria,
                             nombre_cate_evento = p_nombre_cate_evento
                     WHERE  id = p_id;
            
 -------------------------------------------------------------------------

		CREATE PROCEDURE update_categoria_evento_acti(IN p_id INT)
                     UPDATE  categoria_evento
                       SET  fecha_inactivo = null,
                            ind_activo = 1
                     WHERE  id = p_id;

 -------------------------------------------------------------------------

		CREATE PROCEDURE delete_categoria_evento(IN p_id INT)
                     UPDATE  categoria_evento
                       SET  fecha_inactivo = NOW(),
                            ind_activo = 0
                     WHERE  id = p_id;

-------------------------------------------------------------------------
--
--                  PROCEDIMIENTOS PARA EVENTO
--
-------------------------------------------------------------------------

		CREATE PROCEDURE listar_evento(IN p_id INT)
                     SELECT e.id,
                            e.nombre_organizador,
                            e.apellido_organizador,
                            e.nombre_evento,
                            CASE WHEN e.tipo_doc = 1 THEN 'DNI'
                                 WHEN e.tipo_doc = 2 THEN 'RUC'
                                 ELSE 'C. EXTRANJERO'
                            END,
                            e.numero_doc,
                            e.celular,
                            e.direccion,
                            d.descripcion_dire,
                            e.fecha_inicio,
                            e.fecha_fin,
                            e.categoria_evento,
                            ce.nombre_cate_evento,
                            CASE WHEN e.tipo_evento = 1 THEN 'GRATIS'
                                 ELSE 'PAGO'
                            END,
                            e.costo,
                            e.fecha_creacion,
                            e.fecha_actualizacion,
                            e.fecha_inactivo,
                            e.ind_activo,
                            e.estado_evento
                       FROM evento e
                 INNER JOIN direccion d ON e.direccion = d.id
                 INNER JOIN categoria_evento ce ON ce.categoria_evento = ce.id
                      WHERE e.id = p_id
                        AND e.ind_activo = 1;

-------------------------------------------------------------------------

		CREATE PROCEDURE insert_evento( IN p_nombre_organizador varchar(200),
                                              IN p_apellido_organizador varchar(200),
                                              IN p_nombre_evento varchar(500),
                                              IN p_tipo_doc int, --1 DNI/2 RUC/3 C.EXTRANJERIA,
                                              IN p_numero_doc varchar(20),
                                              IN p_celular varchar(20),
                                              IN p_direccion int,
                                              IN p_fecha_inicio datetime,
                                              IN p_fecha_fin datetime,
                                              IN p_categoria_evento int,
                                              IN p_tipo_evento int, -- 1 Gratis / 2 Pago,
                                              IN p_costo decimal(18,2),
                                              IN p_estado_evento int -- 1 Pendiente / 2 Evento,
                                              )

                     INSERT INTO categoria_evento( id,
                                                   nombre_organizador  ,
                                                   apellido_organizador,
                                                   nombre_evento       ,
                                                   tipo_doc            ,
                                                   numero_doc          ,
                                                   celular             ,
                                                   direccion           ,
                                                   fecha_inicio        ,
                                                   fecha_fin           ,
                                                   categoria_evento    ,
                                                   tipo_evento         ,
                                                   costo               ,
                                                   fecha_creacion      ,
                                                   fecha_actualizacion ,
                                                   fecha_inactivo      ,
                                                   ind_activo          ,
                                                   estado_evento
                                                 )
                                          VALUES ( 
                                                   NULL,
                                                   p_nombre_organizador  ,
                                                   p_apellido_organizador,
                                                   p_nombre_evento       ,
                                                   p_tipo_doc            ,
                                                   p_numero_doc          ,
                                                   p_celular             ,
                                                   p_direccion           ,
                                                   p_fecha_inicio        ,
                                                   p_fecha_fin           ,
                                                   p_categoria_evento    ,
                                                   p_tipo_evento         ,
                                                   p_costo               ,
                                                   current_timestamp()   ,
                                                   current_timestamp()   ,
                                                   NULL                  ,
                                                   1                     ,
                                                   p_estado_evento
                                                 );

-------------------------------------------------------------------------

		CREATE PROCEDURE update_evento( IN p_id INT,
                                              IN p_nombre_organizador varchar(200),
                                              IN p_apellido_organizador varchar(200),
                                              IN p_nombre_evento varchar(500),
                                              IN p_tipo_doc int, --1 DNI/2 RUC/3 C.EXTRANJERIA,
                                              IN p_numero_doc varchar(20),
                                              IN p_celular varchar(20),
                                              IN p_direccion int,
                                              IN p_fecha_inicio datetime,
                                              IN p_fecha_fin datetime,
                                              IN p_categoria_evento int,
                                              IN p_tipo_evento int, -- 1 Gratis / 2 Pago,
                                              IN p_costo decimal(18,2),
                                              IN p_estado_evento int -- 1 Pendiente / 2 Evento,
                                              )
                     UPDATE evento
                        SET nombre_organizador   = p_nombre_organizador  ,
                            apellido_organizador = p_apellido_organizador,
                            nombre_evento        = p_nombre_evento       ,
                            tipo_doc             = p_tipo_doc            ,
                            numero_doc           = p_numero_doc          ,
                            celular              = p_celular             ,
                            direccion            = p_direccion           ,
                            fecha_inicio         = p_fecha_inicio        ,
                            fecha_fin            = p_fecha_fin           ,
                            categoria_evento     = p_categoria_evento    ,
                            tipo_evento          = p_tipo_evento         ,
                            costo                = p_costo               ,
                            estado_evento        = p_estado_evento       ,
                            fecha_actualizacion  = NOW()        
                     WHERE  id = p_id;
            
 -------------------------------------------------------------------------

		CREATE PROCEDURE delete_evento(IN p_id INT)
                     UPDATE evento
                       SET  fecha_inactivo = NOW(),
                            ind_activo = 0
                     WHERE  id = p_id;

-------------------------------------------------------------------------
--
--                  PROCEDIMIENTOS PARA SERVICIO_EVENTO
--
-------------------------------------------------------------------------

		CREATE PROCEDURE listar_servicio_evento(IN p_evento INT)
                     SELECT se.id,
                            se.servicio,
                            s.nombre_servicio,
                            se.fecha_asignacion
                       FROM servicio_evento se
                 INNER JOIN servicio s ON se.servicio = s.id
                      WHERE se.evento = p_evento
                        AND se.ind_activo = 1;

-------------------------------------------------------------------------

		CREATE PROCEDURE insert_servicio_evento(  IN p_servicio INT,
                                                        IN p_evento INT)

                     INSERT INTO servicio_evento(  id,
                                                   servicio,
                                                   evento,
                                                   fecha_asignacion,
                                                   fecha_inactivo,
                                                   ind_activo
                                                 )
                            VALUES ( NULL,
                                     p_servicio,
                                     p_servicio,
                                     NOW(),
                                     NULL,
                                     1);

-------------------------------------------------------------------------

		CREATE PROCEDURE update_servicio_evento(  IN p_id INT,
                                                        IN p_servicio INT,
                                                        IN p_evento INT)
                     UPDATE  servicio_evento
                        SET  servicio = p_servicio,
                             evento = p_evento
                      WHERE  id = p_id;
            
 -------------------------------------------------------------------------

		CREATE PROCEDURE delete_servicio_evento(IN p_id INT)
                     UPDATE  servicio_evento
                       SET  fecha_inactivo = NOW(),
                            ind_activo = 0
                     WHERE  id = p_id;