<?php namespace App\Controllers;
use App\Models\CategoriaModel;

class Base extends BaseController
{
	public function index(){
	$db = \Config\Database::connect();

	$model = new CategoriaModel();

//	$query = $db->query('
//	SELECT * FROM productos
//	');
//	$results = $query->getResult();
	
	

//	echo var_dump($results);



	// foreach($results as $row){
  //       echo $row->id.' | '.$row->usuario.' | '.$row->producto.'<br>';
  //   }



	/*
    foreach($results as $row){
		$model->delete($row->id, true);
    }

	echo "eliminado";


	$data = [
		"imagen1" => "01.jpg",
		"imagen2" => "02.jpg",
		"imagen3" => "03.jpg"
	  ];
	$model->update(3,$data);

	echo "----------------------------------".'<br>';

	foreach($results as $row){
        echo $row->id.' | '.$row->nombre.' | '.$row->imagen1.' | '.$row->imagen2.' | '.$row->imagen3.'<br>';
    }
	
*/
	}


	//--------------------------------------------------------------------



	

}