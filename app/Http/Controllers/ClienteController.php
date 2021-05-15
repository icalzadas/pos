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
            'cp' => $request->cp,
            'telefono' => $request->telefono,
            'rfc' => $request->rfc,
            'curp' => $request->curp,
            'limite_credito' => $request->limite_credito,
            'dias_credito' => $request->dias_credito
            
        ]);

        return Redirect::to('clientes')->with(['message'=>'Cliente agregado correctamente']);
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

        $cliente->cp = $request->edit_cp;
        $cliente->telefono = $request->edit_telefono;
        $cliente->rfc = $request->edit_rfc;

        $cliente->curp = $request->edit_curp;
        $cliente->limite_credito = $request->edit_limite_credito;
        $cliente->dias_credito = $request->edit_dias_credito;

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
