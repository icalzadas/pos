<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Sucursal;

class VentaController extends Controller
{
    public function index()
    {
        $user = \Auth::user();        
        $id_usuario = $user->id;

        //mostrar las sucursales a las que el usuario tiene permiso
        $sucursales = DB::table('sucursales as s')
                          ->select('s.*')
                          ->join('permisos_sucursales as p','s.id','=','p.id_sucursal')
                          ->where('p.id_user','=',$id_usuario)
                          ->get(); 
                          
        $clientes = Cliente::all();  
        
        $productos = Productos::all();
        
        return view('venta.index',compact('sucursales','clientes','productos'));
    }

    
  
}
