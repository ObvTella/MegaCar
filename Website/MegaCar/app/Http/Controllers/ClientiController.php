<?php
namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientiController extends Controller 
{
	/** @var cliente */
	protected $cliente;
	/** 
	/**
	* Create a new controller instance.
	* @return void
	*/
	public function __construct(Cliente $cliente) //constructor
	{
		//
		$this->cliente = $cliente;
	}
	public function index() 
	{
		$clienti = $this->cliente->all();
		return $clienti; //mostra tutti i clienti
	}
	public function store(Request $request) 
	{
		// Validate if the input for each field is correct
		$this->validate($request, [
		'username' => 'required|string|max:45',
		'password' => 'required|string|max:45',
		'nome_cliente' => 'required|string|max:45',
		'cognome_cliente' => 'required|string|max:45',
		'email_cliente' => 'required|string|max:45',
		'indirizzo' => 'required|string|max:45',
		]);
		// Crea un nuovo cliente
		$cliente = $this->cliente->create([
		'username' => $request->input('username'),
		'password' => $request->input('password'),
		'nome_cliente' => $request->input('nome_cliente'),
		'cognome_cliente' => $request->input('cognome_cliente'),
		'email_cliente' => $request->input('email_cliente'),
		'indirizzo' => $request->input('indirizzo'),
		]);
		return $cliente;
	}
 
	public function update(Request $request) 
	{
		// Validate if the input for each field is correct
		
		$this->validate($request, [
		'id' => 'required|int',
		'username' => 'required|unique:clientes|string|max:45',
		'password' => 'required|string|max:45',
		'nome_cliente' => 'required|string|max:45',
		'cognome_cliente' => 'required|string|max:45',
		'email_cliente' => 'required|string|max:45',
		'indirizzo' => 'required|string|max:45',
		]);
		$cliente = $this->cliente->findOrFail($request->input('id'));
		// aggiorna cliente
		$cliente->username = $request->input('username');
		$cliente->password = $request->input('password');
		$cliente->nome_cliente = $request->input('nome_cliente');
		$cliente->cognome_cliente = $request->input('cognome_cliente');
		$cliente->email_cliente = $request->input('email_cliente');
		$cliente->indirizzo = $request->input('indirizzo');
		$cliente->save();
		
		/*
		$cliente->update
		(
		['password' => $request->input('password')],
		['nome_cliente' => $request->input('nome_cliente')],
		['cognome_cliente' => $request->input('cognome_cliente')],
		['email_cliente' => $request->input('email_cliente')],
		['indirizzo' => $request->input('indirizzo')],
		);
		*/
		
		return $cliente;
	}
 
	public function detail($id) 
	{
		$cliente = $this->cliente->findOrFail($id);
		return $cliente;
	} 
	public function destroy($id) 
	{
		$cliente = $this->cliente->findOrFail($id);
		$cliente->delete();
		return "Deleted " . $id;
	}
}
?> 