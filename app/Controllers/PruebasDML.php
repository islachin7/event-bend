<?php namespace App\Controllers;

class PruebasDML extends BaseController
{
    
    public function jaja(){
        /*
        $para ="islachinvictor7@gmail.com";
        $asunto = "mensaje de prueba del sistema";
        $info = "se inserto un nuevo dato de prueba esta es una prueba ajajjaja";
        $usuario = "Victor Islachin";
        $cuerpo = '
    <p style="margin-top:0;margin-bottom:12px;"><strong># de Solicitud:</strong> 19</p>
    <p style="margin-top:0;margin-bottom:18px;"><strong>Tipo de Transferencia:</strong> Devolución al Almacén</p>
    <p style="margin-top:0;margin-bottom:18px;"><strong>Fecha de creación:</strong> 2021-05-20</p>
    <p style="margin-top:0;margin-bottom:18px;"><strong>Responsable:</strong> Victor Islachin</p>
        ';
        if($this->correosimple($usuario,$info,$cuerpo,$para,$asunto)==true){
          echo "siiii insertalo de leyr";
        }else{
          echo "no mal trabajo";
        }
        */
    $db = \Config\Database::connect();
      /*
      $query1 = $db->query("
      CREATE INDEX SeguimientoUsuario ON seguimiento(usuario);
      ");  
      */
  
  
    //$query1 = $db->query("DROP procedure listar_usuarioCorreo");
  
     $query2 = $db->query("
     CREATE PROCEDURE update_passwordReset(IN p_id INT,IN p_pass VARCHAR(255))
              UPDATE  usuario
                 SET  password = p_pass,
                      fecha_actualizacion = NOW()
               WHERE  id = p_id;
      ");
  
  
        //solo para querys jaja
  /*
        $query1 = $db->query("
        ALTER TABLE proyecto_temp add column estado int 
        ");
  */
        /*
        $query1 = $db->query("
        INSERT INTO tipoUsuario (id, nombre, descripcion) VALUES (11, 'Administrado Caja Chica', 'Caja Chica');
        ");
        */
  
        /*
        $query1 = $db->query("
  
        create table aumentoCaja(
          id int primary key auto_increment,
          monto decimal(18,2),
          fecha date
        );
  
        ");
        */
  
       
  /*
        $query1 = $db->query('create table cajaChicaC(
          id int primary key auto_increment,
          codigo varchar(100),
          fecha_apertura date,
          decimal(18,2),
          usuario int,
          idmaterial int,
          unique u_codigo(codigo,usuario),
          INDEX(usuario),
          INDEX(idmaterial),
          FOREIGN KEY (usuario) REFERENCES usuario(id),
          FOREIGN KEY (idmaterial) REFERENCES material_equipo(id)
        );');
        
        */
    
    //$query1 = $db->query('ALTER TABLE movilidad add movilidadEdit int');
   // $query1 = $db->query('ALTER TABLE movilidad modify monto decimal(18,2)');
    //$query1 = $db->query('update almacen set delete_estado =0 where id IN (29,30,31) ');
    //$query1 = $db->query('INSERT INTO tipoInventario (id, nombre) VALUES (NULL, "PERSONALIZADO")');
   // $query1 = $db->query('delete from usuario where id=3 ');
    //$query1 = $db->query('delete from detalleCompra where compra=61 and materialEquipo=647 ');
    //$query1 = $db->query('delete FROM detalleConsumoDiario WHERE cantidadconsumida < 0.01');
   // $query1 = $db->query('update transferencia set verificador=34 WHERE id IN (158,159,160)');
   // $query1 = $db->query('delete from proyecto where id = 21');
    //$results1 = $query1->getResult();
    //$valor=0.00;  
   // $query1 = $db->query('delete from proyecto id IN (11,12,18,19,20,21)');
   //$query1 = $db->query('delete from seguimiento Where fecha <= "2024-01-01"');
    //echo var_dump($results1);
    /*
    $query1 = $db->query("delete from factura");
    $results1 = $query1->getResult();
  */
  
  //$query1 = $db->query('update tipoUsuario set nombre = "Administrador de Caja Chica" WHERE id = 11');
  //$query1 = $db->query("Select * From transferencia Where id=150");
  //$results1 = $query1->getResult();
  
  /*
  $query1 = $db->query('select * from seguimiento Where fecha <= "2024-01-01" ');
  $results1 = $query1->getResult();
  
    foreach ($results1 as $row) {
      echo $row->id.'|'.$row->accion.'|'.$row->fecha.'<br>';
    }*/
  /*
  foreach ($results1 as $row) {
    echo '('.$row->id.'|'.$row->origen.'|'.$row->destino.')<br>';
  }
  */
    //echo "listo";
    //echo var_dump($results1);
    /*
        foreach ($results1 as $row) {
        echo 'id '.$row->id.'- dato '.$row->verificador.'<br>';
        }
    
    $id = 123;
    $idSanetizado = filter_var( $id,FILTER_SANITIZE_NUMBER_INT );
  
    echo $idSanetizado;
    */
      }

}
