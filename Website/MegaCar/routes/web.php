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
	//test auth api_token 
	/*
	$router->post('/', [ 'middleware' => ['auth'], function () use ($router) 
	{
    	return $router->app->version();
	}]);
	*/

	$router->group([
		'prefix' => 'api/secure', // sito.com/api/secure/[route]/ID
			//sicurezza
	], function () use ($router)
	{
		//register
		$router->post('/register', 'AuthController@register');
		$router->post('/login', 'AuthController@login');
	}); 

$router->group([
	'prefix' => 'api/v1', // sito.com/api/v1/[route]/id
	//v1 semplici funzioni su chiavi primarie
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


	// tutti i consulenti
	$router->get('/consulenti', 'ConsulentiController@index');
	// 1 solo consulente
	$router->get('/consulenti/{id}', 'ConsulentiController@detail');
	// crea un nuovo consulente
	$router->post('/consulenti', 'ConsulentiController@store');
	// aggiorna un consulente
	$router->put('/consulenti/', 'ConsulentiController@update');
	// cancella un consulente
	$router->delete('/consulenti/{id}', 'ConsulentiController@destroy');
	
	
	// tutti le macchine
	$router->get('/macchine', 'MacchineController@index');
	// 1 sola macchina
	$router->get('/macchine/{id}', 'MacchineController@detail');
	// crea una nuova macchine
	$router->post('/macchine', 'MacchineController@store');
	// aggiorna una macchine
	$router->put('/macchine/', 'MacchineController@update');
	// cancella una macchine
	$router->delete('/macchine/{id}', 'MacchineController@destroy');

}); 

$router->group([
	'prefix' => 'api/v2', // sito.com/api/v2/[route]/ID
		//v2 semplici funzioni con chiavi esterne
], function () use ($router)
{
	//guide
	//appuntamenti
	//macchine_motori
	//macchine_optionals
	//macchine_colori

}); 

$router->group([
	'prefix' => 'api/v3', // sito.com/api/v3/[route]/ID
		//acquisti
], function () use ($router)
{
	//acquisti

}); 