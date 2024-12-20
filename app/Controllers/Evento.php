<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use \DateTime; 

class Evento extends ResourceController
{
    
    public function __construct(){
        $this->db = \Config\Database::connect();
	}

    //--------------------------------------------------------------------

    public function index(){
        $query = $this->db->query('call listar_eventos()');
        $data = $query->getResult();
        return $this->respond($data, 200);
	}

	//--------------------------------------------------------------------

    public function create(){

        $p_nombre_organizador   =$this->request->getVar('nombre_organizador'); //OBLIGA
        $p_apellido_organizador =$this->request->getVar('apellido_organizador'); //OBLIGA
        $p_nombre_evento        =$this->request->getVar('nombre_evento'); //OBLIGA
        $p_tipo_doc             =$this->request->getVar('tipo_doc');
        $p_numero_doc           =$this->request->getVar('numero_doc');
        $p_celular              =$this->request->getVar('celular');
        $p_direccion            =$this->request->getVar('direccion'); //OBLIGA
        $p_correo               =$this->request->getVar('correo'); //OBLIGA
        $p_fecha_inicio         =$this->request->getVar('fecha_inicio'); //OBLIGA
        $p_fecha_fin            =$this->request->getVar('fecha_fin '); //OBLIGA
        $p_categoria_evento     =$this->request->getVar('categoria_evento'); //OBLIGA
        $p_tipo_evento          =$this->request->getVar('tipo_evento'); //OBLIGA
        $p_costo                =$this->request->getVar('costo'); //OBLIGA
        $p_estado_evento        =$this->request->getVar('estado_evento'); //OBLIGA


        //validaciones
        if($p_nombre_organizador == "" || strlen($p_nombre_organizador) <= 0){
            $response = [
                'error'     => 'Error, el nombre del organizador esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_apellido_organizador == "" || strlen($p_apellido_organizador) <= 0){
            $response = [
                'error'     => 'Error, el apellido del organizador esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_nombre_evento == "" || strlen($p_nombre_evento) <= 0){
            $response = [
                'error'     => 'Error, el nombre del evento esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_direccion == "" || strlen($p_direccion) <= 0){
            $response = [
                'error'     => 'Error, no selecciono la dirección, seleccione el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //busca direccion
        $busca = $this->db->query('call listar_direccion('.$p_direccion.')');
        $direccion = $busca->getRowArray();

        //validacion de direccion
        if($direccion == null){
            $response = [
            'error'     => 'Error, no existe la dirección.'
            ];
            return $this->respond($response,400);
        }

        if($p_correo == "" || strlen($p_correo) <= 0){
            $response = [
                'error'     => 'Error, el correo esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_fecha_inicio == "" || strlen($p_fecha_inicio) <= 0){
            $response = [
                'error'     => 'Error, la fecha de inicio del evento esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_fecha_fin == "" || strlen($p_fecha_fin) <= 0){
            $response = [
                'error'     => 'Error, la fecha de finalización del evento esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_categoria_evento == "" || strlen($p_categoria_evento) <= 0){
            $response = [
                'error'     => 'Error, no selecciono la categoria del evento, seleccione el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria_evento
        $busca = $this->db->query('call listar_categoria_evento_by_id('.$p_categoria_evento.')');
        $categoria_evento = $busca->getRowArray();

        //validacion de la categoria del evento
        if($categoria_evento == null){
            $response = [
            'error'     => 'Error, no existe la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        if($p_tipo_evento == "" || strlen($p_tipo_evento) <= 0){
            $response = [
                'error'     => 'Error, no selecciono el tipo de evento, seleccione el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_costo == "" || strlen($p_costo) <= 0){
            $response = [
                'error'     => 'Error, el costo esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_estado_evento == "" || strlen($p_estado_evento) <= 0){
            $response = [
                'error'     => 'Error, el estado esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        $fecha_1 = new DateTime($p_fecha_inicio);
        $fecha_1 = $fecha_1->format('Y-m-d H:i:s');

        $fecha_2 = new DateTime($p_fecha_fin);
        $fecha_2 = $fecha_2->format('Y-m-d H:i:s');


        //insert
        $query = $this->db->query('call insert_evento("'.$p_nombre_organizador.'","'.$p_apellido_organizador.'","'.$p_nombre_evento.'","'.$p_tipo_doc.'","'.$p_numero_doc.'","'.$p_celular.'",'.$p_direccion.',"'.$p_correo.'","'.$fecha_1.'","'.$fecha_2.'",'.$p_categoria_evento.','.$p_tipo_evento.','.$p_costo.','.$p_estado_evento.')');
        $response = [
            'message'   => 'Se generó con éxito el evento.'
        ];
        return $this->respond($response,200);
 
	}

    //--------------------------------------------------------------------

    public function read(){
        $p_id_evento =$this->request->getVar('id_evento');

        //validacion de id_evento
        if($p_id_evento == "" || strlen($p_id_evento) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador del evento.'
            ];
            return $this->respond($response,400);
        }

        //busca evento
        $busca = $this->db->query('call listar_evento('.$p_id_evento.')');
        $evento = $busca->getRowArray();

        //validacion de evento
        if($evento == null){
            $response = [
            'error'     => 'Error, no existe el evento.'
            ];
            return $this->respond($response,400);
        }

        $query = $this->db->query('call listar_evento("'.$p_id_evento.'")');
        $data = $query->getRowArray();
        return $this->respond($data, 200);
        
	}

    //--------------------------------------------------------------------

    public function update_evento(){

        $p_id_evento            =$this->request->getVar('id_evento');
        $p_nombre_organizador   =$this->request->getVar('nombre_organizador');
        $p_apellido_organizador =$this->request->getVar('apellido_organizador');
        $p_nombre_evento        =$this->request->getVar('nombre_evento');
        $p_tipo_doc             =$this->request->getVar('tipo_doc');
        $p_numero_doc           =$this->request->getVar('numero_doc');
        $p_celular              =$this->request->getVar('celular');
        $p_direccion            =$this->request->getVar('direccion');
        $p_correo               =$this->request->getVar('correo');
        $p_fecha_inicio         =$this->request->getVar('fecha_inicio');
        $p_fecha_fin            =$this->request->getVar('fecha_fin ');
        $p_categoria_evento     =$this->request->getVar('categoria_evento');
        $p_tipo_evento          =$this->request->getVar('tipo_evento');
        $p_costo                =$this->request->getVar('costo');
        $p_estado_evento        =$this->request->getVar('estado_evento');

        //validaciones
        //validacion de id_evento
        if($p_id_evento == "" || strlen($p_id_evento) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador del evento.'
            ];
            return $this->respond($response,400);
        }

        //busca evento
        $busca = $this->db->query('call listar_evento('.$p_id_evento.')');
        $evento = $busca->getRowArray();

        //validacion de evento
        if($evento == null){
            $response = [
            'error'     => 'Error, no existe el evento.'
            ];
            return $this->respond($response,400);
        }

        if($p_nombre_organizador == "" || strlen($p_nombre_organizador) <= 0){
            $response = [
                'error'     => 'Error, el nombre del organizador esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_apellido_organizador == "" || strlen($p_apellido_organizador) <= 0){
            $response = [
                'error'     => 'Error, el apellido del organizador esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_nombre_evento == "" || strlen($p_nombre_evento) <= 0){
            $response = [
                'error'     => 'Error, el nombre del evento esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_direccion == "" || strlen($p_direccion) <= 0){
            $response = [
                'error'     => 'Error, no selecciono la dirección, seleccione el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_correo == "" || strlen($p_correo) <= 0){
            $response = [
                'error'     => 'Error, el correo esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_fecha_inicio == "" || strlen($p_fecha_inicio) <= 0){
            $response = [
                'error'     => 'Error, la fecha de inicio del evento esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_fecha_fin == "" || strlen($p_fecha_fin) <= 0){
            $response = [
                'error'     => 'Error, la fecha de finalización del evento esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_categoria_evento == "" || strlen($p_categoria_evento) <= 0){
            $response = [
                'error'     => 'Error, no selecciono la categoria del evento, seleccione el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_tipo_evento == "" || strlen($p_tipo_evento) <= 0){
            $response = [
                'error'     => 'Error, no selecciono el tipo de evento, seleccione el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_costo == "" || strlen($p_costo) <= 0){
            $response = [
                'error'     => 'Error, el costo esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($p_estado_evento == "" || strlen($p_estado_evento) <= 0){
            $response = [
                'error'     => 'Error, el estado esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        $fecha_1 = new DateTime($p_fecha_inicio);
        $fecha_1 = $fecha_1->format('Y-m-d H:i:s');

        $fecha_2 = new DateTime($p_fecha_fin);
        $fecha_2 = $fecha_2->format('Y-m-d H:i:s');

        //UPDATE
        $query = $this->db->query('call update_evento('.$p_id_evento.',"'.$p_nombre_organizador.'","'.$p_apellido_organizador.'","'.$p_nombre_evento.'","'.$p_tipo_doc.'","'.$p_numero_doc.'","'.$p_celular.'",'.$p_direccion.',"'.$p_correo.'","'.$fecha_1.'","'.$fecha_2.'",'.$p_categoria_evento.','.$p_tipo_evento.','.$p_costo.','.$p_estado_evento.')');
        $response = [
            'message'   => 'Se actualizó con éxito el evento.'
        ];
        return $this->respond($response,200);

	}

    //--------------------------------------------------------------------

    public function activate(){
        $p_id_evento =$this->request->getVar('id_evento');

        //validacion de p_id_evento
        if($p_id_evento == "" || strlen($p_id_evento) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador del evento.'
            ];
            return $this->respond($response,400);
        }

        //busca evento
        $busca = $this->db->query('call listar_evento('.$p_id_evento.')');
        $evento = $busca->getRowArray();

        //validacion de evento
        if($evento == null){
            $response = [
            'error'     => 'Error, no existe el evento.'
            ];
            return $this->respond($response,400);
        }

        //activar
        $query = $this->db->query('call update_evento_acti('.$p_id_evento.')');
        $response = [
            'message'   => 'Se activó con éxito el evento.'
        ];
        return $this->respond($response, 200);
	}

    //--------------------------------------------------------------------

    public function delete_evento(){
        $p_id_evento =$this->request->getVar('id_evento');

        //validacion de p_id_evento
        if($p_id_evento == "" || strlen($p_id_evento) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de evento.'
            ];
            return $this->respond($response,400);
        }

        //busca evento
        $busca = $this->db->query('call listar_evento('.$p_id_evento.')');
        $evento = $busca->getRowArray();

        //validacion de evento
        if($evento == null){
            $response = [
            'error'     => 'Error, no existe el evento.'
            ];
            return $this->respond($response,400);
        }

        //delete
        $query = $this->db->query('call delete_evento('.$p_id_evento.')');
        $response = [
            'message'   => 'Se eliminó con éxito el evento.'
        ];
        return $this->respond($response, 200);
	}


}
