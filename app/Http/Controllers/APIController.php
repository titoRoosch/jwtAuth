<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;

class APIController extends Controller
{

    public function __construct(){
        $this->middleware('jwt.auth');
    }

    public function ListaUsuario(){
        $json = [
            'usuario' => [
                'nome' => 'tito',
                'idade' => 23
            ],
            'usuario2' => [
                'nome' => 'enzo',
                'idade' => 13
            ],
            'usuario3' => [
                'nome' => 'walter',
                'idade' => 28
            ],
            'usuario4' => [
                'nome' => 'gui',
                'idade' => 22
            ]

        ];

        return response($json, 201)->header('Content-Type', 'application/json');
    }

    public function ListaClientes(){
        $cliente = Clientes::all();

        return response($cliente, 201)->header('Content-Type', 'application/json');
    }

    public function ListaCliente($id){
        $cliente = Clientes::find($id);

        return response($cliente, 201)->header('Content-Type', 'application/json');
    }

    public function CadastraCliente(Request $data){
        $cliente = Clientes::create([
            'nome' => $data->nome,
            'cnpj' => $data->cnpj
        ]);

        return response($cliente, 201)->header('Content-Type', 'application/json');
    

    }

    public function DeleteCliente($id){
        $cliente = Clientes::find($id);
        $cliente->delete();

        return response($cliente, 201)->header('Content-Type', 'application/json');
    

    }

    public function AlteraCliente( Request $data){

        $cliente = Clientes::find($data->id);

        $cliente->nome = $data->nome;
        $cliente->cnpj = $data->cnpj;
        $cliente->save();

        return response($cliente, 201)->header('Content-Type', 'application/json');
    
    }
}
