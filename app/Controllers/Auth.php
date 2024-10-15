<?php namespace App\Controllers;


use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\UsuarioModel;

class Auth extends ResourceController
{

  public function __construct(){
		$this->db = \Config\Database::connect();
	}

	public function index()
	{
    $model = new UsuarioModel();
    $query = $this->db->query('call listar_usuariosActivos()');
    $data = $query->getResult();
    return $this->respond($data, 200);
	}

  public function login(){

    $model = new UsuarioModel();
    $correo =$this->request->getVar('correo');
    $password =$this->request->getVar('password');

    $query = $this->db->query('call listar_usuarioCorreo("'.$correo.'")');
    $usuario = $query->getRowArray();

    if($usuario!=false){

      if(password_verify($password, $usuario['password'])){

        $response = [
          'message'  => 'Ingreso'
        ];
        return $this->respond($response,200);

      }else{
        $response = [
          'error'     => 'Password Incorrecto'
        ];
        return $this->respond($response,400);
      }

    }else{
      $response = [
        'error'     => 'No existe'
      ];
      return $this->respond($response,400);
    }
  }


    public function logout(){
      $session=session();
      $session->remove('correo');
      $session->remove('nombre');
      $session->remove('idCliente');
      $session->remove('tipo');
      return redirect()->to(base_url().'home');
    }


  }
