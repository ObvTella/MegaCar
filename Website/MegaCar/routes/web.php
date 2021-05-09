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
	'prefix' => 'api/v1', // sito.com/api/v1/[route] ID
], function () use ($router)
{
	// tutti i clienti
	$router->get('/clienti', 'ClientiController@index');
	// 1 solo cliente
	$router->get('/clienti/{id}', 'ClientiController@detail');
	// crea un nuovo cliente
	$router->post('/clienti', 'ClientiController@store');
	// aggiorna un cliente
	$router->put('/clienti/', 'ClientiController@update');
	// cancella un cliente
	$router->delete('/clienti/{id}', 'ClientiController@destroy');

}); 