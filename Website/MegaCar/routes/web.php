<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
//MAIN ROUTE / (INDEX)
$router->get('/', function () use ($router) 
{
    return $router->app->version();
});

$router->group([
	'prefix' => 'api/v1', // sito.com/api/v1/[route]
], function () use ($router)
{
	// tutti i clienti
	$router->get('/clienti', 'ClientiController@index');
	// crea un nuovo cliente
	$router->post('/clienti', 'ClientiController@store');
	// cancella un cliente
	$router->delete('/clienti/{username}', 'ClientiController@destroy');
}); 
