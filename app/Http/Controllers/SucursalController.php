<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class SucursalController extends Controller
{
    public function index()
    {
        $sucursales = Sucursal::all();
        //$categorias = Categorias::all();
        return view('sucursal.index', compact('sucursales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sucursal' => 'unique:sucursales|required',
            'estatus' => 'required'
                        
        ]);

        $sucursal = Sucursal::create([
            'sucursal' => $request->sucursal,//obligatorio            
            'calle'    => $request->calle,
            'colonia'    => $request->colonia,
            'ciudad'    => $request->ciudad,
            'estatus' => $request->estatus,            
        ]);

        return Redirect::to('sucursales')->with(['message'=>'Sucursal agregada correctamente']);
    }

    public function actualizar(Request $request)
    {
        $request->validate([
            'edit_sucursal' => [Rule::unique('sucursales','sucursal')->ignore($request->id_sucursal),'required'],
            'edit_estatus' => 'required'            
        ]);

        $sucursal = Sucursal::find($request->id_sucursal);
        $sucursal->sucursal = $request->edit_sucursal; 
        
        
        $sucursal->calle = $request->edit_calle;
        $sucursal->colonia = $request->edit_colonia;
        $sucursal->ciudad = $request->edit_ciudad;

        
        $sucursal->estatus = $request->edit_estatus;

        $sucursal->save();

        return Redirect::to('sucursales')->with(['message'=>'Sucursal editada correctamente']);
    }

    public function eliminar(Request $request)
    {
        $sucursal = Sucursal::find($request->del_id_sucursal);
        $sucursal->estatus = 0;
        $sucursal->save();

        return Redirect::to('sucursales')->with(['message'=>'Sucursal suspendida correctamente']);
    }
}
