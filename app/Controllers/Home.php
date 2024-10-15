<?php namespace App\Controllers;

class Home extends BaseController
{
    private $db;
    protected $builder;

    public function __construct(){
        $this->db = \Config\Database::connect();
	}

	public function index()
	{
      return view('welcome_message');
	}

	//--------------------------------------------------------------------

}
