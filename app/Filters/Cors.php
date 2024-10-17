<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

Class Cors implements FilterInterface
{


    public function before(RequestInterface $request, $arguments = null)
    {
        $allowedOrigin = 'http://localhost:5173/'; // Cambia esto a tu dominio

        // Establecer encabezados CORS
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            if ($_SERVER['HTTP_ORIGIN'] === $allowedOrigin) {
                header('Access-Control-Allow-Origin: ' . $allowedOrigin);
            }
        }

        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

        // Manejar preflight (OPTIONS)
        if ($request->getMethod() === 'options') {
            return Services::response()->setStatusCode(204);
        }
    }

    /*
    public function before(RequestInterface $request, $arguments = null)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
    }
 */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
      // Do something here
    }
}