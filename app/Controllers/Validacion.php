<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Validacion extends ResourceController
{

    //--------------------------------------------------------------------

	public function validacion_inicial($variable,$mensaje){

        if($variable == "" || strlen($variable) <= 0){
            $response = [
                'error'     => $mensaje
                ];
            return respond($response,400);
        }
    }


}