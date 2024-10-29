<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Direccion extends ResourceController
{
    
    public function __construct(){
        $this->db = \Config\Database::connect();
	}

    //--------------------------------------------------------------------

    public function index(){
        $query = $this->db->query('call listar_direcciones()');
        $data = $query->getResult();
        return $this->respond($data, 200);
	}

	//--------------------------------------------------------------------

    public function create(){

        $nombre_direccion =$this->request->getVar('nombre_direccion');
        $descripcion_dire =$this->request->getVar('descripcion_dire');
        $numero_piso =$this->request->getVar('numero_piso');
        $aforo_max =$this->request->getVar('aforo_max');


        //validaciones
        if($nombre_direccion == "" || strlen($nombre_direccion) <= 0){
            $response = [
                'error'     => 'Error, el dirección ingresada esta vacia, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($descripcion_dire == "" || strlen($descripcion_dire) <= 0){
            $response = [
                'error'     => 'Error, la descripcion de la dirección ingresada esta vacia, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($numero_piso == "" || strlen($numero_piso) <= 0){
            $response = [
                'error'     => 'Error, El número de piso ingresado esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($aforo_max == "" || strlen($aforo_max) <= 0){
            $response = [
                'error'     => 'Error, El valor de aforo ingresado esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //insert
        $query = $this->db->query('call insert_direccion("'.$nombre_direccion.'","'.$descripcion_dire.'",'.$numero_piso.','.$aforo_max.')');
        $response = [
            'message'   => 'Se generó con éxito la dirección.'
        ];
        return $this->respond($response,200);
 
	}

    //--------------------------------------------------------------------

    public function read(){
        $id_direccion =$this->request->getVar('id_direccion');

        //validacion de id_direccion
        if($id_direccion == "" || strlen($id_direccion) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de dirección.'
            ];
            return $this->respond($response,400);
        }

        //busca direccion
        $busca = $this->db->query('call listar_direccion('.$id_direccion.')');
        $direccion = $busca->getRowArray();

        //validacion de direccion
        if($direccion == null){
            $response = [
            'error'     => 'Error, no existe la dirección.'
            ];
            return $this->respond($response,400);
        }

        $query = $this->db->query('call listar_direccion("'.$id_direccion.'")');
        $data = $query->getRowArray();
        return $this->respond($data, 200);
        
	}

    //--------------------------------------------------------------------

    public function update_direccion(){

        $id_direccion =$this->request->getVar('id_direccion');
        $nombre_direccion =$this->request->getVar('nombre_direccion');
        $descripcion_dire =$this->request->getVar('descripcion_dire');
        $numero_piso =$this->request->getVar('numero_piso');
        $aforo_max =$this->request->getVar('aforo_max');

        //validacion de id_direccion
        if($id_direccion == "" || strlen($id_direccion) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de dirección.'
            ];
            return $this->respond($response,400);
        }

        //busca direccion
        $busca = $this->db->query('call listar_direccion('.$id_direccion.')');
        $direccion = $busca->getRowArray();

        //validacion de direccion
        if($direccion == null){
            $response = [
            'error'     => 'Error, no existe la dirección.'
            ];
            return $this->respond($response,400);
        }

        //validaciones
        if($nombre_direccion == "" || strlen($nombre_direccion) <= 0){
            $response = [
                'error'     => 'Error, el dirección ingresada esta vacia, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($descripcion_dire == "" || strlen($descripcion_dire) <= 0){
            $response = [
                'error'     => 'Error, la descripcion de la dirección ingresada esta vacia, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($numero_piso == "" || strlen($numero_piso) <= 0){
            $response = [
                'error'     => 'Error, El número de piso ingresado esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        if($aforo_max == "" || strlen($aforo_max) <= 0){
            $response = [
                'error'     => 'Error, El valor de aforo ingresado esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //UPDATE
        $query = $this->db->query('call update_direccion('.$id_direccion.',"'.$nombre_direccion.'","'.$descripcion_dire.'",'.$numero_piso.','.$aforo_max.')');
        $response = [
            'message'   => 'Se actualizó con éxito la dirección.'
        ];
        return $this->respond($response,200);

	}

    //--------------------------------------------------------------------

    public function activate(){
        $id_direccion =$this->request->getVar('id_direccion');

        //validacion de id_direccion
        if($id_direccion == "" || strlen($id_direccion) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de dirección.'
            ];
            return $this->respond($response,400);
        }

        //busca direccion
        $busca = $this->db->query('call listar_direccion('.$id_direccion.')');
        $direccion = $busca->getRowArray();

        //validacion de direccion
        if($direccion == null){
            $response = [
            'error'     => 'Error, no existe la dirección.'
            ];
            return $this->respond($response,400);
        }

        //activar
        $query = $this->db->query('call update_direccion_acti('.$id_direccion.')');
        $response = [
            'message'   => 'Se activó con éxito la dirección.'
        ];
        return $this->respond($response, 200);
	}

    //--------------------------------------------------------------------

    public function delete_direccion(){
        $id_direccion =$this->request->getVar('id_direccion');

        //validacion de id_direccion
        if($id_direccion == "" || strlen($id_direccion) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de dirección.'
            ];
            return $this->respond($response,400);
        }

        //busca direccion
        $busca = $this->db->query('call listar_direccion('.$id_direccion.')');
        $direccion = $busca->getRowArray();

        //validacion de direccion
        if($direccion == null){
            $response = [
            'error'     => 'Error, no existe la dirección.'
            ];
            return $this->respond($response,400);
        }

        //delete
        $query = $this->db->query('call delete_direccion('.$id_direccion.')');
        $response = [
            'message'   => 'Se eliminó con éxito la dirección.'
        ];
        return $this->respond($response, 200);
	}


}
