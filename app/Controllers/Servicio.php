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

        $nombre_servicio =$this->request->getVar('nombre_servicio');


        //validaciones
        if($nombre_servicio == "" || strlen($nombre_servicio) <= 0){
            $response = [
                'error'     => 'Error, el nombre del servicio esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //insert
        $query = $this->db->query('call insert_servicio("'.$nombre_servicio.'")');
        $response = [
            'message'   => 'Se generó con éxito el servicio.'
        ];
        return $this->respond($response,200);
 
	}

    //--------------------------------------------------------------------

    public function read(){
        $id_servicio =$this->request->getVar('id_servicio');

        //validacion de id_servicio
        if($id_servicio == "" || strlen($id_servicio) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de servicio.'
            ];
            return $this->respond($response,400);
        }

        //busca servicio
        $busca = $this->db->query('call listar_servicio('.$id_servicio.')');
        $servicio = $busca->getRowArray();

        //validacion de servicio
        if($servicio == null){
            $response = [
            'error'     => 'Error, no existe el servicio.'
            ];
            return $this->respond($response,400);
        }

        $query = $this->db->query('call listar_servicio("'.$id_servicio.'")');
        $data = $query->getRowArray();
        return $this->respond($data, 200);
        
	}

    //--------------------------------------------------------------------

    public function update_servicio(){

        $id_servicio =$this->request->getVar('id_servicio');
        $nombre_servicio =$this->request->getVar('nombre_servicio');

        //validaciones
        if($id_servicio == "" || strlen($id_servicio) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de servicio.'
            ];
            return $this->respond($response,400);
        }

        //busca servicio
        $busca = $this->db->query('call listar_servicio('.$id_servicio.')');
        $servicio = $busca->getRowArray();

        //validacion de servicio
        if($servicio == null){
            $response = [
            'error'     => 'Error, no existe el servicio.'
            ];
            return $this->respond($response,400);
        }

        //validaciones
        if($nombre_servicio == "" || strlen($nombre_servicio) <= 0){
            $response = [
                'error'     => 'Error, el nombre del servicio esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //UPDATE
        $query = $this->db->query('call update_servicio('.$id_servicio.',"'.$nombre_servicio.'")');
        $response = [
            'message'   => 'Se actualizó con éxito el servicio.'
        ];
        return $this->respond($response,200);

	}

    //--------------------------------------------------------------------

    public function activate(){
        $id_servicio =$this->request->getVar('id_servicio');

        //validacion de id_servicio
        if($id_servicio == "" || strlen($id_servicio) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de servicio.'
            ];
            return $this->respond($response,400);
        }

        //busca servicio
        $busca = $this->db->query('call listar_servicio('.$id_servicio.')');
        $servicio = $busca->getRowArray();

        //validacion de servicio
        if($servicio == null){
            $response = [
            'error'     => 'Error, no existe el servicio.'
            ];
            return $this->respond($response,400);
        }

        //activar
        $query = $this->db->query('call update_servicio_acti('.$id_servicio.')');
        $response = [
            'message'   => 'Se activó con éxito el servicio.'
        ];
        return $this->respond($response, 200);
	}

    //--------------------------------------------------------------------

    public function delete_servicio(){
        $id_servicio =$this->request->getVar('id_servicio');

        //validacion de id_servicio
        if($id_servicio == "" || strlen($id_servicio) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de servicio.'
            ];
            return $this->respond($response,400);
        }

        //busca servicio
        $busca = $this->db->query('call listar_servicio('.$id_servicio.')');
        $servicio = $busca->getRowArray();

        //validacion de servicio
        if($servicio == null){
            $response = [
            'error'     => 'Error, no existe el servicio.'
            ];
            return $this->respond($response,400);
        }

        //delete
        $query = $this->db->query('call delete_servicio('.$id_servicio.')');
        $response = [
            'message'   => 'Se eliminó con éxito el servicio.'
        ];
        return $this->respond($response, 200);
	}


}
