<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Servicio extends ResourceController
{
    
    public function __construct(){
        $this->db = \Config\Database::connect();
	}

    //--------------------------------------------------------------------

    public function index(){
        $query = $this->db->query('call listar_servicios()');
        $data = $query->getResult();
        return $this->respond($data, 200);
	}

	//--------------------------------------------------------------------

    public function create(){

        $p_nombre_servicio =$this->request->getVar('p_nombre_servicio');


        //validaciones
        if($p_nombre_servicio == "" || strlen($p_nombre_servicio) <= 0){
            $response = [
                'error'     => 'Error, el nombre del servicio esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //insert
        $query = $this->db->query('call insert_servicio("'.$p_nombre_servicio.'")');
        $response = [
            'message'   => 'Se generó con éxito el servicio.'
        ];
        return $this->respond($response,200);
 
	}

    //--------------------------------------------------------------------

    public function read(){
        $p_id_servicio =$this->request->getVar('p_id_servicio');

        //validacion de id_servicio
        if($p_id_servicio == "" || strlen($p_id_servicio) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de servicio.'
            ];
            return $this->respond($response,400);
        }

        //busca servicio
        $busca = $this->db->query('call listar_servicio('.$p_id_servicio.')');
        $servicio = $busca->getRowArray();

        //validacion de servicio
        if($servicio == null){
            $response = [
            'error'     => 'Error, no existe el servicio.'
            ];
            return $this->respond($response,400);
        }

        $query = $this->db->query('call listar_servicio("'.$p_id_servicio.'")');
        $data = $query->getResult();
        return $this->respond($data, 200);
        
	}

    //--------------------------------------------------------------------

    public function update_servicio(){

        $p_id_servicio =$this->request->getVar('p_id_servicio');
        $p_nombre_servicio =$this->request->getVar('p_nombre_servicio');

        //validaciones
        if($p_id_servicio == "" || strlen($p_id_servicio) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de servicio.'
            ];
            return $this->respond($response,400);
        }

        //busca servicio
        $busca = $this->db->query('call listar_servicio('.$p_id_servicio.')');
        $servicio = $busca->getRowArray();

        //validacion de servicio
        if($servicio == null){
            $response = [
            'error'     => 'Error, no existe el servicio.'
            ];
            return $this->respond($response,400);
        }

        //validaciones
        if($p_nombre_servicio == "" || strlen($p_nombre_servicio) <= 0){
            $response = [
                'error'     => 'Error, el nombre del servicio esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //UPDATE
        $query = $this->db->query('call update_servicio('.$p_id_servicio.',"'.$p_nombre_servicio.'")');
        $response = [
            'message'   => 'Se actualizó con éxito el servicio.'
        ];
        return $this->respond($response,200);

	}

    //--------------------------------------------------------------------

    public function activate(){
        $p_id_servicio =$this->request->getVar('p_id_servicio');

        //validacion de p_id_servicio
        if($p_id_servicio == "" || strlen($p_id_servicio) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de servicio.'
            ];
            return $this->respond($response,400);
        }

        //busca servicio
        $busca = $this->db->query('call listar_servicio('.$p_id_servicio.')');
        $servicio = $busca->getRowArray();

        //validacion de servicio
        if($servicio == null){
            $response = [
            'error'     => 'Error, no existe el servicio.'
            ];
            return $this->respond($response,400);
        }

        //activar
        $query = $this->db->query('call update_servicio_acti('.$p_id_servicio.')');
        $response = [
            'message'   => 'Se activó con éxito el servicio.'
        ];
        return $this->respond($response, 200);
	}

    //--------------------------------------------------------------------

    public function delete_servicio(){
        $p_id_servicio =$this->request->getVar('p_id_servicio');

        //validacion de p_id_servicio
        if($p_id_servicio == "" || strlen($p_id_servicio) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de servicio.'
            ];
            return $this->respond($response,400);
        }

        //busca servicio
        $busca = $this->db->query('call listar_servicio('.$p_id_servicio.')');
        $servicio = $busca->getRowArray();

        //validacion de servicio
        if($servicio == null){
            $response = [
            'error'     => 'Error, no existe el servicio.'
            ];
            return $this->respond($response,400);
        }

        //delete
        $query = $this->db->query('call delete_servicio('.$p_id_servicio.')');
        $response = [
            'message'   => 'Se eliminó con éxito el servicio.'
        ];
        return $this->respond($response, 200);
	}


}
