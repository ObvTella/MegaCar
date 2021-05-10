<?php
namespace App\Http\Controllers;
use App\Models\Consulente;
use Illuminate\Http\Request;

class ConsulentiController extends Controller 
{
	/** @var consulente */
	protected $consulente;
	/** 
	/**
	* Create a new controller instance.
	* @return void
	*/
	public function __construct(consulente $consulente) //constructor
	{
		//
		$this->consulente = $consulente;
	}
	public function index() 
	{
		$consulente = $this->consulente->all();
		return $consulente; //mostra tutti i consulenti
	}
	public function store(Request $request) 
	{
		// Validate if the input for each field is correct
		$this->validate($request, [
		'nome_consulente' => 'required|string|max:45',
		'congome_consulente' => 'required|string|max:45',
		'email_consulente' => 'required|string|max:45',
		]);
		// Crea un nuovo consulente
		$consulente = $this->consulente->create([
		'nome_consulente' => $request->input('nome_consulente'),
		'congome_consulente' => $request->input('congome_consulente'),
		'email_consulente' => $request->input('email_consulente'),
		]);
		return $consulente;
	}
 
	public function update(Request $request) 
	{
		
		// Validate if the input for each field is correct
		$this->validate($request, [
		'nome_consulente' => 'required|string|max:45',
		'congome_consulente' => 'required|string|max:45',
		'email_consulente' => 'required|string|max:45',
		]);
		$consulente = $this->consulente->findOrFail($request->input('id'));
		// aggiorna consulente
		$consulente->nome_consulente = $request->input('nome_consulente');
		$consulente->congome_consulente = $request->input('congome_consulente');
		$consulente->email_consulente = $request->input('email_consulente');
		
		//salva modello
		$consulente->save();
		
		return $consulente;
	}
 
	public function detail($id) 
	{
		$consulente = $this->consulente->findOrFail($id);
		return $consulente;
	} 
	public function destroy($id) 
	{
		$consulente = $this->consulente->findOrFail($id);
		$consulente->delete();
		return "Deleted " . $id;
	}
}
?> 