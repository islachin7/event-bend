<?php namespace App\Controllers;


use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\Dashboard;
use App\Models\UsuarioModel;
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth extends ResourceController
{

  public function __construct(){
		$this->db = \Config\Database::connect();
	}

  //-------------------------------------------------------------------------

	public function index(){
    $query = $this->db->query('call listar_usuariosActivos()');
    $data = $query->getResult();
    return $this->respond($data, 200);
	}

  //-------------------------------------------------------------------------

  public function login(){

    $correo =$this->request->getVar('correo');
    $password =$this->request->getVar('password');

    //validacion de correo
    if($correo == "" || strlen($correo) <= 0){

      $response = [
        'error'     => 'Error: Campo correo se encuentra vacio.'
      ];
      return $this->respond($response,400);

    }

    //validacion de password
    if($password == "" || strlen($password) <= 0){

      $response = [
        'error'     => 'Error: Campo password se encuentra vacio.'
      ];
      return $this->respond($response,400);

    }

    $query = $this->db->query('call listar_usuarioCorreo("'.$correo.'")');
    $usuario = $query->getRowArray();

    if($usuario!=false){

      if(password_verify($password, $usuario['password'])){

         // JWT
        $key = $_ENV['JWT_SECRET'];
  
        $payload = [
          'idusuario' =>  $usuario['id']
        ];

        $token = JWT::encode($payload, $key, 'HS256');

        $response = [
          'message' => 'Ingreso',
          'token'   => $token
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

    //validacion de corrreo
    if($correo == "" || strlen($correo) <= 0){

      $response = [
        'error'     => 'Error el correo enviado esta vacio, llene el campo obligatorio.'
      ];
      return $this->respond($response,400);

    }

    //busca usuario
    $query = $this->db->query('call listar_usuarioCorreo("'.$correo.'")');
    $usuarioOBJ = $query->getRowArray();

    if($usuarioOBJ!=null){

      //generar codigo
      $codigo = mt_rand(0,9).''.mt_rand(0,9).''.mt_rand(0,9).''.mt_rand(0,9).''.mt_rand(0,9).''.mt_rand(0,9);
      
      //controlador donde esta el metodo de enviar correo
      $dashboard = new Dashboard();

      $urlnueva = explode(":", base_url());

      //datos para correo
      $para = 'islachinvictor7@gmail.com';
      $asunto = 'Reestablecer Password';
      $info = 'Se envia el código de verificación para el cambio de password.';
      $usuario = $usuarioOBJ['nombre'].' '.$usuarioOBJ['apellido'];
      $cuerpo = '<div>
                  <p>Codigo de verificación, favor de no compartirlo con nadie, de lo contrario puede ser eliminado</p>
                  <h4>'.$codigo.'</h4>
                  <p style="margin:0;"><a href="'.$urlnueva[0].':'.$urlnueva[1].'/auth/new-password" style="background: #b6bf4a; text-decoration: none; padding: 10px 25px; color: #ffffff; border-radius: 4px; display:inline-block; mso-padding-alt:0;text-underline-color:#ff3884"><span style="mso-text-raise:10pt;font-weight:bold;">Ingresar</span></a></p>
                </div>';

      //envio de correo
      if($dashboard->correosimple($usuario,$info,$cuerpo,$para,$asunto)==false){

        $response = [
          'error'     => 'Error en el envio de correo.'
        ];
        return $this->respond($response,400);

      }else{

        // JWT
        $key = $_ENV['JWT_SECRET'];
  
        $payload = [
          'idusuario' =>  $usuarioOBJ['id']
        ];

        $token = JWT::encode($payload, $key, 'HS256');

        //validacion de codigo anterior para reemplazar con el actual
        $query = $this->db->query('call listar_traerCodigo('.$usuarioOBJ['id'].')');
        $usuarioCodigo = $query->getRowArray();

        if($usuarioCodigo != NULL){
          $queryElim = $this->db->query('call delete_codigoRecuperacion('.$usuarioOBJ['id'].')');
        }

        //INSERT usuario codigo de recuperacion
        $query = $this->db->query('call insert_codigoRecuperacion('.$usuarioOBJ['id'].',"'.$codigo.'")');
        
        $response = [
          'message'   => 'Revise su correo y siga las instrucciones.',
          'token'     => $token
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

   //-------------------------------------------------------------------------

  public function verificacodigo(){

    $token =$this->request->getVar('token');
    $codigo  =$this->request->getVar('codigo');

    //validacion de codigo
    if($codigo == "" || strlen($codigo) <= 0){

      $response = [
        'error'     => 'Código vacio, intentar nuevamente.'
      ];
      return $this->respond($response,400);

    }

    // JWT
    $key = $_ENV['JWT_SECRET'];
    $decoded = JWT::decode($token, new Key($key, 'HS256'));

    $idusu = $decoded->idusuario;

    $query = $this->db->query('call listar_traerCodigo('.$idusu.')');
    $usuarioCodigo = $query->getRowArray();

    $today = date_create(date("Y-m-d H:i:s")); 
    $fecha_envio = date_create(date("Y-m-d H:i:s",strtotime($usuarioCodigo['fecha_envio'])));
    $diferencia = date_diff($fecha_envio,$today);

    if($diferencia->format('%i') > 30){

      $queryElim = $this->db->query('call delete_codigoRecuperacion('.$idusu.')');

      $response = [
        'error'     => 'El tiempo de tu código expiro, genera un nuevo código.'
      ];
      return $this->respond($response,400);

    }elseif($codigo != $usuarioCodigo['cod_recupe']){

      $response = [
        'error'     => 'El código no coincide. vuelve a intentarlo'
      ];
      return $this->respond($response,400);

    }else{

      $queryElim = $this->db->query('call delete_codigoRecuperacion('.$idusu.')');

      // JWT
      $key = $_ENV['JWT_SECRET'];
  
      $payload = [
        'idusuario' =>  $idusu
      ];

      $token = JWT::encode($payload, $key, 'HS256');

      $response = [
        'message'   => 'Validación Exitosa.',
        'token'     => $token
      ];
      return $this->respond($response,200);

    }

  }

   //-------------------------------------------------------------------------

  public function cambiarPassword(){

    //obtiene datos de la web
    $token =$this->request->getVar('token');
    $newpass =$this->request->getVar('newpassword');
    $con_newpass =$this->request->getVar('confirm_newpassword');

    //validacion de password
    if($newpass == "" || strlen($newpass) <= 0){

      $response = [
        'error'     => 'Error el nuevo password enviado esta vacio, llene el campo obligatorio.'
      ];
      return $this->respond($response,400);

    }

    //validacion de password
    if($con_newpass == "" || strlen($con_newpass) <= 0){

      $response = [
        'error'     => 'Error la confirmación del password enviado esta vacio, llene el campo obligatorio.'
      ];
      return $this->respond($response,400);

    }

    //validacion de password
    if($newpass != $con_newpass){

      $response = [
        'error'     => 'La contraseña de verificación no coincide.'
      ];
      return $this->respond($response,400);

    }else{

      // JWT
      $key = $_ENV['JWT_SECRET'];
      $decoded = JWT::decode($token, new Key($key, 'HS256'));
      $idusu = $decoded->idusuario;

      //pass hasheado
      $passuser = password_hash($newpass, PASSWORD_DEFAULT);

      //update al pass
      $query = $this->db->query('call update_passwordReset('.$idusu.',"'.$passuser.'")');
        
      $response = [
        'message'   => 'Actualización de Password Completada con Exito.'
      ];

      return $this->respond($response,200);

    }
  }


}
