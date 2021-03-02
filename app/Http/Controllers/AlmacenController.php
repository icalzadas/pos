<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\MovimientoStock;
use App\Models\Sucursal;
use App\Models\PermisosSucursales;
use App\Models\Productos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class AlmacenController extends Controller
{
    public function index()
    {
        $user = \Auth::user();        
        $id_usuario = $user->id;

        $users_sucursales = PermisosSucursales::where('id_user',$id_usuario)->select('id_sucursal')->get();
        //$missucursales = Sucursal::whereIn('id',$users_sucursales)->get();

        $stock = DB::table('stock as s')
                ->join('sucursales as su','s.id_sucursal','=','su.id')
                ->join('productos as p','s.id_producto','=','p.id')
                ->select('s.*','su.sucursal','p.producto')
                ->whereIn('s.id_sucursal',$users_sucursales)->get();

        //var_dump($stock);        
       
        return view('almacen.index', compact('stock'));
    }
}
