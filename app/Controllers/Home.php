<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        // Obtén el enrutador de CodeIgniter
        $routes = service('routes');

        // Obtén todas las rutas
        $allRoutes = $routes->getRoutes();

        // Formatea la información de las rutas
        $formattedRoutes = [];
        foreach ($allRoutes as $route) {
            $formattedRoutes[] = [
                'method' => $route->getHTTPMethods(),
                'pattern' => $route->getPattern(),
                'controller' => $route->getController(),
            ];
        }

        // Retorna la información de las rutas
        return $this->respond($formattedRoutes);
    }
}

