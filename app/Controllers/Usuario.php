<?php namespace App\Controllers;
use App\Models\UsuarioModel;

class Usuario extends BaseController
{

	private $db;
	private $model;
	protected $builder;

	public function __construct(){
		if(session('correo')!=""){
			$this->db = \Config\Database::connect();
			$this->model   = new UsuarioModel();
		}
	}

	public function index()
	{

		$builder = $this->db->table("usuarios u");
        $builder->select('u.id,u.nombres,u.apellidos,u.correo,u.celular,u.fecha_actualizacion,tu.nombre as tipo');
        $builder->join('tipousuario tu', 'u.tipousuario = tu.id');
        $query = $builder->get();
        $results = $query->getResult();

		$data['lista'] = $results;
		echo view('listaUsuarios', $data);

	}

	//--------------------------------------------------------------------

}
