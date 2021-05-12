<?php
namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;


class AuthController extends Controller 
{
	public function register(Request $request)
    {
        // prendo la richiesta in input
        $input = $request->all();
        //controllo che sia valida
		$validator = Validator::make($input, [
            'username' => 'required|unique:clientes|string|max:45',
            'password' => 'required|string|max:45',
            'conferma_password' => 'required|string|max:45|same:password',
            'nome_cliente' => 'required|string|max:45',
            'cognome_cliente' => 'required|string|max:45',
            'email_cliente' => 'required|email|max:45',
            'indirizzo' => 'required|string|max:45',
            ]);
        if ($validator->fails()) //se fallisce rispondo con json (bad request + errore)
        {
            return response()->json([
                'status' => 500,
                'message' => 'Bad request',
                'error' => $validator->errors(),
            ], 401);
        }

        unset($input['conferma_password']); //dealloco conferma password dopo averla verificata

        $input['password'] = Hash::make($input['password']); //hash della password
        $input['api_token'] = sha1(rand()); // api token generata casualmente
        $query = Cliente::create($input); //creo cliente con query

        $response['api_token'] = $query->api_token; //stampo api token
        $response['username'] = $query->username; //stampo username

        return response()->json($response, 200); //restituisco json

    }

    public function login(Request $request)
    {
        // prendo la richiesta in input
        $input = $request->all();
        //controllo che sia valida
		$validator = Validator::make($input, [
            'username' => 'required|string|max:45',
            'password' => 'required|string|max:45',
            ]);
        if ($validator->fails()) //se fallisce rispondo con json (bad request + errore)
        {
            return response()->json([
                'status' => 500,
                'message' => 'Bad request',
                'error' => $validator->errors(),
            ], 401);
        }

        $check_user = Cliente::where('username', '=', $input['username'])->first(); //controllo che username sia nel database
        if ($check_user) //falso se non trova utente
        {
            $password = $input['password'];
            if (Hash::check($password, $check_user['password'])) //controllo password inserita con password nel databse(hash)
            {
                $check_user->api_token = sha1(rand());
                //$check_user->updated_at = freshTimestamp();
                $check_user->save();
                $response['status'] = 200;
                $response['message'] = 'Login Successfully';

                return response()->json($response, 200);
            }
            else
            {
                $response['status'] = 401;
                $response['message'] = 'Password non corretta';
    
                return response()->json($response, 401);
            }
        }
        else
        {
            $response['status'] = 401;
            $response['message'] = 'Username non corretto';

            return response()->json($response, 401);
        }
    }
}
?> 