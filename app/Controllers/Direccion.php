<?php namespace App\Controllers;

class Direccion extends BaseController
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
        $p_descripcion_dire =$this->request->getVar('p_descripcion_dire');

        //validacion de direccion
        if($p_descripcion_dire == "" || strlen($p_descripcion_dire) <= 0){
            $response = [
            'error'     => 'Error, la dirección ingresada esta vacia, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }else{
            //insert
            $query = $this->db->query('call insert_direccion("'.$p_descripcion_dire.'")');
            $response = [
                'message'   => 'Se generó con éxito la dirección.'
            ];
            return $this->respond($response,200);
        }
	}

    //--------------------------------------------------------------------

    public function read(){
        $p_id_direccion =$this->request->getVar('p_id_direccion');

        //validacion de id_direccion
        if($p_id_direccion == "" || strlen($p_id_direccion) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de dirección.'
            ];
            return $this->respond($response,400);
        }
        else{
            $query = $this->db->query('call listar_direccion("'.$p_id_direccion.'")');
            $data = $query->getResult();
            return $this->respond($data, 200);
        }
	}

    //--------------------------------------------------------------------

    public function update(){
        $p_id_direccion =$this->request->getVar('p_id_direccion');
        $p_descripcion_dire =$this->request->getVar('p_descripcion_dire');

        //validacion de id_direccion
        if($p_id_direccion == "" || strlen($p_id_direccion) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de dirección.'
            ];
            return $this->respond($response,400);
        }

        //busca direccion
        $busca = $this->db->query('call listar_direccion('.$p_id_direccion.')');
        $direccion = $busca->getRowArray();

        //validacion de direccion
        if($direccion == null){
            $response = [
            'error'     => 'Error, no existe la dirección.'
            ];
            return $this->respond($response,400);
        }

        //validacion de direccion
        if($p_descripcion_dire == "" || strlen($p_descripcion_dire) <= 0){
            $response = [
            'error'     => 'Error, la dirección ingresada esta vacia, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //update
        $query = $this->db->query('call update_direccion('.$p_id_direccion.',"'.$p_descripcion_dire.'")');
        $response = [
            'message'   => 'Se actualizó con éxito la dirección.'
        ];

        return $this->respond($response,200);

	}

    //--------------------------------------------------------------------

    public function delete(){
        $p_id_direccion =$this->request->getVar('p_id_direccion');

        //validacion de id_direccion
        if($p_id_direccion == "" || strlen($p_id_direccion) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de dirección.'
            ];
            return $this->respond($response,400);
        }

        //busca direccion
        $busca = $this->db->query('call listar_direccion('.$p_id_direccion.')');
        $direccion = $busca->getRowArray();

        //validacion de direccion
        if($direccion == null){
            $response = [
            'error'     => 'Error, no existe la dirección.'
            ];
            return $this->respond($response,400);
        }

        //delete
        $query = $this->db->query('call delete_direccion('.$p_id_direccion.')');
        $response = [
            'message'   => 'Se eliminó con éxito la dirección.'
        ];
        return $this->respond($data, 200);
	}

    //--------------------------------------------------------------------


}