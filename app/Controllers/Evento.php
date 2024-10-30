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

        $nombre_organizador   =$this->request->getVar('nombre_organizador'); //OBLIGA
        $apellido_organizador =$this->request->getVar('apellido_organizador'); //OBLIGA
        $nombre_evento        =$this->request->getVar('nombre_evento'); //OBLIGA
        $tipo_doc             =$this->request->getVar('tipo_doc');
        $numero_doc           =$this->request->getVar('numero_doc');
        $celular              =$this->request->getVar('celular');
        $direccion            =$this->request->getVar('direccion'); //OBLIGA
        $correo               =$this->request->getVar('correo'); //OBLIGA
        $fecha_inicio         =$this->request->getVar('fecha_inicio'); //OBLIGA
        $fecha_fin            =$this->request->getVar('fecha_fin '); //OBLIGA
        $categoria_evento     =$this->request->getVar('categoria_evento'); //OBLIGA
        $tipo_evento          =$this->request->getVar('tipo_evento'); //OBLIGA
        $costo                =$this->request->getVar('costo'); //OBLIGA
        $estado_evento        =$this->request->getVar('estado_evento'); //OBLIGA


        //validaciones
        if($nombre_organizador == "" || strlen($nombre_organizador) <= 0){
            $response = [
                'error'     => 'Error, el nombre del organizador esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($apellido_organizador == "" || strlen($apellido_organizador) <= 0){
            $response = [
                'error'     => 'Error, el apellido del organizador esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($nombre_evento == "" || strlen($nombre_evento) <= 0){
            $response = [
                'error'     => 'Error, el nombre del evento esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($direccion == "" || strlen($direccion) <= 0){
            $response = [
                'error'     => 'Error, no selecciono la dirección, seleccione el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //busca direccion
        $busca = $this->db->query('call listar_direccion('.$direccion.')');
        $direccion = $busca->getRowArray();

        //validacion de direccion
        if($direccion == null){
            $response = [
            'error'     => 'Error, no existe la dirección.'
            ];
            return $this->respond($response,400);
        }

        if($correo == "" || strlen($correo) <= 0){
            $response = [
                'error'     => 'Error, el correo esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($fecha_inicio == "" || strlen($fecha_inicio) <= 0){
            $response = [
                'error'     => 'Error, la fecha de inicio del evento esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($fecha_fin == "" || strlen($fecha_fin) <= 0){
            $response = [
                'error'     => 'Error, la fecha de finalización del evento esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($categoria_evento == "" || strlen($categoria_evento) <= 0){
            $response = [
                'error'     => 'Error, no selecciono la categoria del evento, seleccione el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria_evento
        $busca = $this->db->query('call listar_categoria_evento_by_id('.$categoria_evento.')');
        $categoria_evento = $busca->getRowArray();

        //validacion de la categoria del evento
        if($categoria_evento == null){
            $response = [
            'error'     => 'Error, no existe la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        if($tipo_evento == "" || strlen($tipo_evento) <= 0){
            $response = [
                'error'     => 'Error, no selecciono el tipo de evento, seleccione el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($costo == "" || strlen($costo) <= 0){
            $response = [
                'error'     => 'Error, el costo esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($estado_evento == "" || strlen($estado_evento) <= 0){
            $response = [
                'error'     => 'Error, el estado esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        $fecha_1 = new DateTime($fecha_inicio);
        $fecha_1 = $fecha_1->format('Y-m-d H:i:s');

        $fecha_2 = new DateTime($fecha_fin);
        $fecha_2 = $fecha_2->format('Y-m-d H:i:s');


        //insert
        $query = $this->db->query('call insert_evento("'.$nombre_organizador.'","'.$apellido_organizador.'","'.$nombre_evento.'","'.$tipo_doc.'","'.$numero_doc.'","'.$celular.'",'.$direccion.',"'.$correo.'","'.$fecha_1.'","'.$fecha_2.'",'.$categoria_evento.','.$tipo_evento.','.$costo.','.$estado_evento.')');
        $response = [
            'message'   => 'Se generó con éxito el evento.'
        ];
        return $this->respond($response,200);
 
	}

    //--------------------------------------------------------------------

    public function read(){
        $id_evento =$this->request->getVar('id_evento');

        //validacion de id_evento
        if($id_evento == "" || strlen($id_evento) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador del evento.'
            ];
            return $this->respond($response,400);
        }

        //busca evento
        $busca = $this->db->query('call listar_evento('.$id_evento.')');
        $evento = $busca->getRowArray();

        //validacion de evento
        if($evento == null){
            $response = [
            'error'     => 'Error, no existe el evento.'
            ];
            return $this->respond($response,400);
        }

        $query = $this->db->query('call listar_evento("'.$id_evento.'")');
        $data = $query->getRowArray();
        return $this->respond($data, 200);
        
	}

    //--------------------------------------------------------------------

    public function update_evento(){

        $id_evento            =$this->request->getVar('id_evento');
        $nombre_organizador   =$this->request->getVar('nombre_organizador');
        $apellido_organizador =$this->request->getVar('apellido_organizador');
        $nombre_evento        =$this->request->getVar('nombre_evento');
        $tipo_doc             =$this->request->getVar('tipo_doc');
        $numero_doc           =$this->request->getVar('numero_doc');
        $celular              =$this->request->getVar('celular');
        $direccion            =$this->request->getVar('direccion');
        $correo               =$this->request->getVar('correo');
        $fecha_inicio         =$this->request->getVar('fecha_inicio');
        $fecha_fin            =$this->request->getVar('fecha_fin ');
        $categoria_evento     =$this->request->getVar('categoria_evento');
        $tipo_evento          =$this->request->getVar('tipo_evento');
        $costo                =$this->request->getVar('costo');
        $estado_evento        =$this->request->getVar('estado_evento');

        //validaciones
        //validacion de id_evento
        if($id_evento == "" || strlen($id_evento) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador del evento.'
            ];
            return $this->respond($response,400);
        }

        //busca evento
        $busca = $this->db->query('call listar_evento('.$id_evento.')');
        $evento = $busca->getRowArray();

        //validacion de evento
        if($evento == null){
            $response = [
            'error'     => 'Error, no existe el evento.'
            ];
            return $this->respond($response,400);
        }

        if($nombre_organizador == "" || strlen($nombre_organizador) <= 0){
            $response = [
                'error'     => 'Error, el nombre del organizador esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($apellido_organizador == "" || strlen($apellido_organizador) <= 0){
            $response = [
                'error'     => 'Error, el apellido del organizador esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($nombre_evento == "" || strlen($nombre_evento) <= 0){
            $response = [
                'error'     => 'Error, el nombre del evento esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($direccion == "" || strlen($direccion) <= 0){
            $response = [
                'error'     => 'Error, no selecciono la dirección, seleccione el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($correo == "" || strlen($correo) <= 0){
            $response = [
                'error'     => 'Error, el correo esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($fecha_inicio == "" || strlen($fecha_inicio) <= 0){
            $response = [
                'error'     => 'Error, la fecha de inicio del evento esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($fecha_fin == "" || strlen($fecha_fin) <= 0){
            $response = [
                'error'     => 'Error, la fecha de finalización del evento esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($categoria_evento == "" || strlen($categoria_evento) <= 0){
            $response = [
                'error'     => 'Error, no selecciono la categoria del evento, seleccione el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($tipo_evento == "" || strlen($tipo_evento) <= 0){
            $response = [
                'error'     => 'Error, no selecciono el tipo de evento, seleccione el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($costo == "" || strlen($costo) <= 0){
            $response = [
                'error'     => 'Error, el costo esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($estado_evento == "" || strlen($estado_evento) <= 0){
            $response = [
                'error'     => 'Error, el estado esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        $fecha_1 = new DateTime($fecha_inicio);
        $fecha_1 = $fecha_1->format('Y-m-d H:i:s');

        $fecha_2 = new DateTime($fecha_fin);
        $fecha_2 = $fecha_2->format('Y-m-d H:i:s');

        //UPDATE
        $query = $this->db->query('call update_evento('.$id_evento.',"'.$nombre_organizador.'","'.$apellido_organizador.'","'.$nombre_evento.'","'.$tipo_doc.'","'.$numero_doc.'","'.$celular.'",'.$direccion.',"'.$correo.'","'.$fecha_1.'","'.$fecha_2.'",'.$categoria_evento.','.$tipo_evento.','.$costo.','.$estado_evento.')');
        $response = [
            'message'   => 'Se actualizó con éxito el evento.'
        ];
        return $this->respond($response,200);

	}

    //--------------------------------------------------------------------

    public function activate(){
        $id_evento =$this->request->getVar('id_evento');

        //validacion de id_evento
        if($id_evento == "" || strlen($id_evento) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador del evento.'
            ];
            return $this->respond($response,400);
        }

        //busca evento
        $busca = $this->db->query('call listar_evento('.$id_evento.')');
        $evento = $busca->getRowArray();

        //validacion de evento
        if($evento == null){
            $response = [
            'error'     => 'Error, no existe el evento.'
            ];
            return $this->respond($response,400);
        }

        //activar
        $query = $this->db->query('call update_evento_acti('.$id_evento.')');
        $response = [
            'message'   => 'Se activó con éxito el evento.'
        ];
        return $this->respond($response, 200);
	}

    //--------------------------------------------------------------------

    public function delete_evento(){
        $id_evento =$this->request->getVar('id_evento');

        //validacion de id_evento
        if($id_evento == "" || strlen($id_evento) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de evento.'
            ];
            return $this->respond($response,400);
        }

        //busca evento
        $busca = $this->db->query('call listar_evento('.$id_evento.')');
        $evento = $busca->getRowArray();

        //validacion de evento
        if($evento == null){
            $response = [
            'error'     => 'Error, no existe el evento.'
            ];
            return $this->respond($response,400);
        }

        //delete
        $query = $this->db->query('call delete_evento('.$id_evento.')');
        $response = [
            'message'   => 'Se eliminó con éxito el evento.'
        ];
        return $this->respond($response, 200);
	}


}
