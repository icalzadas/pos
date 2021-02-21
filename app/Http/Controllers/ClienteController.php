<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;


class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        //$categorias = Categorias::all();
        return view('cliente.index', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
                        
        ]);

        $cliente = Cliente::create([
            'nombre' => $request->nombre,//obligatorio
            'paterno'    => $request->paterno,
            'materno'    => $request->materno,
            'calle'    => $request->calle,
            'colonia'    => $request->colonia,
            'ciudad'    => $request->ciudad,
            
        ]);

        return Redirect::to('clientes')->with(['message'=>'Cliente agreado correctamente']);
    }

    public function actualizar(Request $request)
    {
        $request->validate([
            'edit_nombre' => ['required'],
                        
        ]);

        $cliente = Cliente::find($request->id_cliente);
        $cliente->nombre = $request->edit_nombre; 
        $cliente->paterno = $request->edit_paterno; 
        $cliente->materno = $request->edit_materno;
        
        $cliente->calle = $request->edit_calle;
        $cliente->colonia = $request->edit_colonia;
        $cliente->ciudad = $request->edit_ciudad;

        $cliente->save();

        return Redirect::to('clientes')->with(['message'=>'Cliente editado correctamente']);
    }

    public function eliminar(Request $request)
    {
        $cliente = Cliente::find($request->del_id_cliente);        
        $cliente->delete();

        return Redirect::to('clientes')->with(['message'=>'Cliente eliminado correctamente']);
    }
}
