<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Categoria extends ResourceController
{
    
    public function __construct(){
        $this->db = \Config\Database::connect();
	}

    //--------------------------------------------------------------------

    public function index(){
        $query = $this->db->query('call listar_categorias()');
        $data = $query->getResult();
        return $this->respond($data, 200);
	}

	//--------------------------------------------------------------------

    public function create(){

        $nombre_categoria =$this->request->getVar('nombre_categoria');


        //validaciones
        if($nombre_categoria == "" || strlen($nombre_categoria) <= 0){
            $response = [
                'error'     => 'Error, el nombre de la categoria esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //insert
        $query = $this->db->query('call insert_categoria("'.$nombre_categoria.'")');
        $response = [
            'message'   => 'Se generó con éxito la categoria.'
        ];
        return $this->respond($response,200);
 
	}

    //--------------------------------------------------------------------

    public function read(){
        $id_categoria =$this->request->getVar('id_categoria');

        //validacion de id_categoria
        if($id_categoria == "" || strlen($id_categoria) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de categoria.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria
        $busca = $this->db->query('call listar_categoria('.$id_categoria.')');
        $categoria = $busca->getRowArray();

        //validacion de categoria
        if($categoria == null){
            $response = [
            'error'     => 'Error, no existe la categoria.'
            ];
            return $this->respond($response,400);
        }

        $query = $this->db->query('call listar_categoria("'.$id_categoria.'")');
        $data = $query->getRowArray();
        return $this->respond($data, 200);
        
	}

    //--------------------------------------------------------------------

    public function update_categoria(){

        $id_categoria =$this->request->getVar('id_categoria');
        $nombre_categoria =$this->request->getVar('nombre_categoria');

        //validaciones
        if($id_categoria == "" || strlen($id_categoria) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de categoria.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria
        $busca = $this->db->query('call listar_categoria('.$id_categoria.')');
        $categoria = $busca->getRowArray();

        //validacion de categoria
        if($categoria == null){
            $response = [
            'error'     => 'Error, no existe la categoria.'
            ];
            return $this->respond($response,400);
        }

        //validaciones
        if($nombre_categoria == "" || strlen($nombre_categoria) <= 0){
            $response = [
                'error'     => 'Error, el nombre de la categoria esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //UPDATE
        $query = $this->db->query('call update_categoria('.$id_categoria.',"'.$nombre_categoria.'")');
        $response = [
            'message'   => 'Se actualizó con éxito la categoria.'
        ];
        return $this->respond($response,200);

	}

    //--------------------------------------------------------------------

    public function activate(){
        $id_categoria =$this->request->getVar('id_categoria');

        //validacion de id_categoria
        if($id_categoria == "" || strlen($id_categoria) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de categoria.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria
        $busca = $this->db->query('call listar_categoria('.$id_categoria.')');
        $categoria = $busca->getRowArray();

        //validacion de categoria
        if($categoria == null){
            $response = [
            'error'     => 'Error, no existe la categoria.'
            ];
            return $this->respond($response,400);
        }

        //activar
        $query = $this->db->query('call update_categoria_acti('.$id_categoria.')');
        $response = [
            'message'   => 'Se activó con éxito la categoria.'
        ];
        return $this->respond($response, 200);
	}

    //--------------------------------------------------------------------

    public function delete_categoria(){
        $id_categoria =$this->request->getVar('id_categoria');

        //validacion de id_categoria
        if($id_categoria == "" || strlen($id_categoria) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de categoria.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria
        $busca = $this->db->query('call listar_categoria('.$id_categoria.')');
        $categoria = $busca->getRowArray();

        //validacion de categoria
        if($categoria == null){
            $response = [
            'error'     => 'Error, no existe la categoria.'
            ];
            return $this->respond($response,400);
        }

        //delete
        $query = $this->db->query('call delete_categoria('.$id_categoria.')');
        $response = [
            'message'   => 'Se eliminó con éxito la categoria.'
        ];
        return $this->respond($response, 200);
	}


}
