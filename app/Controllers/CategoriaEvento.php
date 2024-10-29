<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class CategoriaEvento extends ResourceController
{
    
    public function __construct(){
        $this->db = \Config\Database::connect();
	}

    //--------------------------------------------------------------------

    public function index(){
        $query = $this->db->query('call listar_categorias_eventos()');
        $data = $query->getResult();
        return $this->respond($data, 200);
	}

	//--------------------------------------------------------------------

    public function create(){

        $nombre_cate_evento =$this->request->getVar('nombre_cate_evento');
        $id_categoria =$this->request->getVar('id_categoria');

        //validaciones
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

        //validacion de nombre de categoria del evento
        if($nombre_cate_evento == "" || strlen($nombre_cate_evento) <= 0){
            $response = [
                'error'     => 'Error, el nombre de la categoria del evento esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //insert
        $query = $this->db->query('call insert_categoria_evento('.$id_categoria.',"'.$nombre_cate_evento.'")');
        $response = [
            'message'   => 'Se generó con éxito la categoria del evento.'
        ];
        return $this->respond($response,200);
 
	}

    //--------------------------------------------------------------------

    public function read(){
        $id_categoria_evento =$this->request->getVar('id_categoria_evento');

        //validacion de id_categoria_evento
        if($id_categoria_evento == "" || strlen($id_categoria_evento) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria_evento
        $busca = $this->db->query('call listar_categoria_evento_by_id('.$id_categoria_evento.')');
        $categoria_evento = $busca->getRowArray();

        //validacion de la categoria del evento
        if($categoria_evento == null){
            $response = [
            'error'     => 'Error, no existe la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        $query = $this->db->query('call listar_categoria_evento_by_id('.$id_categoria_evento.')');
        $data = $query->getRowArray();
        return $this->respond($data, 200);
        
	}

    //--------------------------------------------------------------------

    public function read_categoria(){
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

        $query = $this->db->query('call listar_categoria_evento_by_categoria('.$id_categoria.')');
        $data = $query->getResult();
        return $this->respond($data, 200);
        
	}

    //--------------------------------------------------------------------

    public function update_categoria_evento(){

        $id_categoria_evento =$this->request->getVar('id_categoria_evento');
        $id_categoria =$this->request->getVar('id_categoria');
        $nombre_cate_evento =$this->request->getVar('nombre_cate_evento');

        //validaciones
        if($id_categoria_evento == "" || strlen($id_categoria_evento) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria_evento
        $busca = $this->db->query('call listar_categoria_evento_by_id('.$id_categoria_evento.')');
        $categoria_evento = $busca->getRowArray();

        //validacion de la categoria del evento
        if($categoria_evento == null){
            $response = [
            'error'     => 'Error, no existe la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        //validaciones
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

        //validacion de nombre de categoria evento
        if($nombre_cate_evento == "" || strlen($nombre_cate_evento) <= 0){
            $response = [
                'error'     => 'Error, el nombre de la categoria del evento esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //UPDATE
        $query = $this->db->query('call update_categoria_evento('.$id_categoria_evento.','.$id_categoria.',"'.$nombre_cate_evento.'")');
        $response = [
            'message'   => 'Se actualizó con éxito la categoria del evento.'
        ];
        return $this->respond($response,200);

	}

    //--------------------------------------------------------------------

    public function activate(){
        $id_categoria_evento =$this->request->getVar('id_categoria_evento');

        //validacion de id_categoria_evento
        if($id_categoria_evento == "" || strlen($id_categoria_evento) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria_evento
        $busca = $this->db->query('call listar_categoria_evento_by_id('.$id_categoria_evento.')');
        $categoria_evento = $busca->getRowArray();

        //validacion de la categoria del evento
        if($categoria_evento == null){
            $response = [
            'error'     => 'Error, no existe la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        //activar
        $query = $this->db->query('call update_categoria_evento_acti('.$id_categoria_evento.')');
        $response = [
            'message'   => 'Se activó con éxito la categoria del evento.'
        ];
        return $this->respond($response, 200);
	}

    //--------------------------------------------------------------------

    public function delete_categoria_evento(){
        $id_categoria_evento =$this->request->getVar('id_categoria_evento');

        //validacion de id_categoria_evento
        if($id_categoria_evento == "" || strlen($id_categoria_evento) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria_evento
        $busca = $this->db->query('call listar_categoria_evento_by_id('.$id_categoria_evento.')');
        $categoria_evento = $busca->getRowArray();

        //validacion de la categoria del evento
        if($categoria_evento == null){
            $response = [
            'error'     => 'Error, no existe la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        //delete
        $query = $this->db->query('call delete_categoria_evento('.$id_categoria_evento.')');
        $response = [
            'message'   => 'Se eliminó con éxito la categoria del evento.'
        ];
        return $this->respond($response, 200);
	}


}
