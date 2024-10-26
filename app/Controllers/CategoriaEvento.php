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

        $p_nombre_cate_evento =$this->request->getVar('p_nombre_cate_evento');
        $p_id_categoria =$this->request->getVar('p_id_categoria');

        //validaciones
        //validacion de id_categoria
        if($p_id_categoria == "" || strlen($p_id_categoria) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de categoria.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria
        $busca = $this->db->query('call listar_categoria('.$p_id_categoria.')');
        $categoria = $busca->getRowArray();

        //validacion de categoria
        if($categoria == null){
            $response = [
            'error'     => 'Error, no existe la categoria.'
            ];
            return $this->respond($response,400);
        }

        //validacion de nombre de categoria del evento
        if($p_nombre_cate_evento == "" || strlen($p_nombre_cate_evento) <= 0){
            $response = [
                'error'     => 'Error, el nombre de la categoria del evento esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //insert
        $query = $this->db->query('call insert_categoria_evento('.$p_id_categoria.',"'.$p_nombre_cate_evento.'")');
        $response = [
            'message'   => 'Se generó con éxito la categoria del evento.'
        ];
        return $this->respond($response,200);
 
	}

    //--------------------------------------------------------------------

    public function read(){
        $p_id_categoria_evento =$this->request->getVar('p_id_categoria_evento');

        //validacion de id_categoria_evento
        if($p_id_categoria_evento == "" || strlen($p_id_categoria_evento) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria_evento
        $busca = $this->db->query('call listar_categoria_evento_by_id('.$p_id_categoria_evento.')');
        $categoria_evento = $busca->getRowArray();

        //validacion de la categoria del evento
        if($categoria_evento == null){
            $response = [
            'error'     => 'Error, no existe la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        $query = $this->db->query('call listar_categoria_evento_by_id('.$p_id_categoria_evento.')');
        $data = $query->getResult();
        return $this->respond($data, 200);
        
	}

    //--------------------------------------------------------------------

    public function read_categoria(){
        $p_id_categoria =$this->request->getVar('p_id_categoria');

         //validacion de id_categoria
         if($p_id_categoria == "" || strlen($p_id_categoria) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de categoria.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria
        $busca = $this->db->query('call listar_categoria('.$p_id_categoria.')');
        $categoria = $busca->getRowArray();

        //validacion de categoria
        if($categoria == null){
            $response = [
            'error'     => 'Error, no existe la categoria.'
            ];
            return $this->respond($response,400);
        }

        $query = $this->db->query('call listar_categoria_evento_by_categoria('.$p_id_categoria.')');
        $data = $query->getResult();
        return $this->respond($data, 200);
        
	}

    //--------------------------------------------------------------------

    public function update_categoria_evento(){

        $p_id_categoria_evento =$this->request->getVar('p_id_categoria_evento');
        $p_id_categoria =$this->request->getVar('p_id_categoria');
        $p_nombre_cate_evento =$this->request->getVar('p_nombre_cate_evento');

        //validaciones
        if($p_id_categoria_evento == "" || strlen($p_id_categoria_evento) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria_evento
        $busca = $this->db->query('call listar_categoria_evento_by_id('.$p_id_categoria_evento.')');
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
        if($p_id_categoria == "" || strlen($p_id_categoria) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de categoria.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria
        $busca = $this->db->query('call listar_categoria('.$p_id_categoria.')');
        $categoria = $busca->getRowArray();

        //validacion de categoria
        if($categoria == null){
            $response = [
            'error'     => 'Error, no existe la categoria.'
            ];
            return $this->respond($response,400);
        }

        //validacion de nombre de categoria evento
        if($p_nombre_cate_evento == "" || strlen($p_nombre_cate_evento) <= 0){
            $response = [
                'error'     => 'Error, el nombre de la categoria del evento esta vacio, llene el campo obligatorio.'
            ];
            return $this->respond($response,400);
        }

        //UPDATE
        $query = $this->db->query('call update_categoria_evento('.$p_id_categoria_evento.','.$p_id_categoria.',"'.$p_nombre_cate_evento.'")');
        $response = [
            'message'   => 'Se actualizó con éxito la categoria del evento.'
        ];
        return $this->respond($response,200);

	}

    //--------------------------------------------------------------------

    public function activate(){
        $p_id_categoria_evento =$this->request->getVar('p_id_categoria_evento');

        //validacion de p_id_categoria_evento
        if($p_id_categoria_evento == "" || strlen($p_id_categoria_evento) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria_evento
        $busca = $this->db->query('call listar_categoria_evento_by_id('.$p_id_categoria_evento.')');
        $categoria_evento = $busca->getRowArray();

        //validacion de la categoria del evento
        if($categoria_evento == null){
            $response = [
            'error'     => 'Error, no existe la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        //activar
        $query = $this->db->query('call update_categoria_evento_acti('.$p_id_categoria_evento.')');
        $response = [
            'message'   => 'Se activó con éxito la categoria del evento.'
        ];
        return $this->respond($response, 200);
	}

    //--------------------------------------------------------------------

    public function delete_categoria_evento(){
        $p_id_categoria_evento =$this->request->getVar('p_id_categoria_evento');

        //validacion de p_id_categoria_evento
        if($p_id_categoria_evento == "" || strlen($p_id_categoria_evento) <= 0){
            $response = [
            'error'     => 'Error, no existe identificador de la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        //busca categoria_evento
        $busca = $this->db->query('call listar_categoria_evento_by_id('.$p_id_categoria_evento.')');
        $categoria_evento = $busca->getRowArray();

        //validacion de la categoria del evento
        if($categoria_evento == null){
            $response = [
            'error'     => 'Error, no existe la categoria del evento.'
            ];
            return $this->respond($response,400);
        }

        //delete
        $query = $this->db->query('call delete_categoria_evento('.$p_id_categoria_evento.')');
        $response = [
            'message'   => 'Se eliminó con éxito la categoria del evento.'
        ];
        return $this->respond($response, 200);
	}


}
