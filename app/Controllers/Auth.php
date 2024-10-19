<?php namespace App\Controllers;


use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\Dashboard;
use App\Models\UsuarioModel;

class Auth extends ResourceController
{

  public function __construct(){
		$this->db = \Config\Database::connect();
	}

  //-------------------------------------------------------------------------

	public function index(){
    $model = new UsuarioModel();
    $query = $this->db->query('call listar_usuariosActivos()');
    $data = $query->getResult();
    return $this->respond($data, 200);
	}

  //-------------------------------------------------------------------------

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
          'error'     => 'Password Incorrecto, vuelve a validar.'
        ];
        return $this->respond($response,400);
      }

    }else{
      $response = [
        'error'     => 'El usuario ingresado no existe. Verifica tus datos e intenta nuevamente.'
      ];
      return $this->respond($response,400);
    }
  }

  //-------------------------------------------------------------------------

  public function logout(){
    $session=session();
    $session->remove('correo');
    $session->remove('nombre');
    $session->remove('idCliente');
    $session->remove('tipo');
    return redirect()->to(base_url().'home');
  }

  //-------------------------------------------------------------------------

  public function reestablecerContra(){

    //obtiene correo de la web
    $correo =$this->request->getVar('correo');

    //busca usuario
    $query = $this->db->query('call listar_usuarioCorreo("'.$correo.'")');
    $usuario = $query->getRowArray();

    if($usuario!=null){

      //generar codigo
      $codigo = mt_rand(0,9).''.mt_rand(0,9).''.mt_rand(0,9).''.mt_rand(0,9).''.mt_rand(0,9).''.mt_rand(0,9);
      
      $dashboard = new Dashboard();

      $para = 'islachinvictor7@gmail.com';
      $asunto = 'Reestablecer Password';
      $info = 'Se envia el código de verificación para el cambio de password.';
      $usuario = $usuario['nombre'].' '.$usuario['apellido'];
      $cuerpo = '<div>
                  <p>Codigo de verificación, favor de no compartirlo con nadie, de lo contrario puede ser eliminado</p>
                  <h4>'.$codigo.'</h4>
                </div>';

      if($dashboard->correosimple($usuario,$info,$cuerpo,$para,$asunto)==false){

        $response = [
          'error'     => 'Error en el envio de correo.'
        ];
        return $this->respond($response,400);

      }else{

        $id = $usuario['id']*1;

        echo $id;

        //update usuario codigo de recuperacion
        $query2 = $this->db->query('call update_codigoRecuperacion('.$id.',"'.$codigo.'")');
        
        $response = [
          'message'  => 'Enviado'
        ];
        return $this->respond($response,200);

      }
    
    }else{
      $response = [
        'error'     => 'Usuario no encontrado. Verifica el correo e intenta nuevamente.'
      ];
      return $this->respond($response,400);
    }

    

  }

  public function enviarcorreo(){

    $dashboard = new Dashboard();

    $para = 'islachinvictor7@gmail.com';
    $asunto = 'prueba';
    $info = 'picosa';
    $usuario = 'El dani';
    $cuerpo = '<p>Hola Dani</p>';

    if($dashboard->correosimple($usuario,$info,$cuerpo,$para,$asunto)==false){
      echo "noooooo";
    }else{
      echo "siiiii";
    }

  }



}
