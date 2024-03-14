<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/products', 'ProductController::index');         // Listar todos los productos
 $routes->get('/products/(:num)', 'ProductController::show/$1'); // Mostrar un producto específico
 $routes->post('/products', 'ProductController::create');       // Procesar la creación de un nuevo producto
 $routes->put('/products/(:num)', 'ProductController::update/$1');      // Procesar la actualización de un producto
 $routes->delete('/products/(:num)', 'ProductController::delete/$1');   // Eliminar un producto existente
 