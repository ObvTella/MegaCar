<?php
namespace App\Http\Controllers;
use App\Models\Macchina;
use Illuminate\Http\Request;

class MacchineController extends Controller 
{
	/** @var macchina */
	protected $macchina;
	/** 
	/**
	* Create a new controller instance.
	* @return void
	*/
	public function __construct(Macchina $macchina) //constructor
	{
		//
		$this->macchina = $macchina;
	}
	public function index() 
	{
		$macchina = $this->macchina->all();
		return $macchina; //mostra tutti le macchine
	}
	public function store(Request $request) 
	{
		// Validate if the input for each field is correct
		$this->validate($request, [
		'targa' => 'required|string|max:45',
		'marca' => 'required|string|max:45',
		'modello' => 'required|string|max:45',
		'tipo' => 'required|string|max:45',
		'anno' => 'required|string|max:4',
		'prezzo' => 'required|numeric',
		'descrizione_macchina' => 'required|string|max:45',
		'porte' => 'required|int',
		'posti' => 'required|int',
		'usato' => 'required|boolean',
		]);
		// Crea un nuovo macchina
		$macchina = $this->macchina->create([
		'targa' => $request->input('targa'),
		'marca' => $request->input('marca'),
		'modello' => $request->input('modello'),
		'tipo' => $request->input('tipo'),
		'anno' => $request->input('anno'),
		'prezzo' => $request->input('prezzo'),
		'descrizione_macchina' => $request->input('descrizione_macchina'),
		'porte' => $request->input('porte'),
		'posti' => $request->input('posti'),
		'usato' => $request->input('usato'),
		]);
		return $macchina;
	}
 
	public function update(Request $request) 
	{
		
		// Validate if the input for each field is correct
		$this->validate($request, [
		'targa' => 'required|string|max:45',
		'marca' => 'required|string|max:45',
		'modello' => 'required|string|max:45',
		'tipo' => 'required|string|max:45',
		'anno' => 'required|string|max:4',
		'prezzo' => 'required|numeric',
		'descrizione_macchina' => 'required|string|max:45',
		'porte' => 'required|int',
		'posti' => 'required|int',
		'usato' => 'required|boolean',
		]);
		$macchina = $this->macchina->findOrFail($request->input('id'));
		// aggiorna macchina
		$macchina->targa = $request->input('targa');
		$macchina->marca = $request->input('marca');
		$macchina->modello = $request->input('modello');
		$macchina->tipo = $request->input('tipo');
		$macchina->anno = $request->input('anno');
		$macchina->prezzo = $request->input('prezzo');
		$macchina->descrizione_macchina = $request->input('descrizione_macchina');
		$macchina->porte = $request->input('porte');
		$macchina->posti = $request->input('posti');
		$macchina->usato = $request->input('usato');
		
		//salva modello
		$macchina->save();
		
		return $macchina;
	}
 
	public function detail($id) 
	{
		$macchina = $this->macchina->findOrFail($id);
		return $macchina;
	} 
	public function destroy($id) 
	{
		$macchina = $this->macchina->findOrFail($id);
		$macchina->delete();
		return "Deleted " . $id;
	}
}
?> 