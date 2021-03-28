<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caja;
use App\Models\PermisosSucursales;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class CajasCobroController extends Controller
{
    public function index()
    {
        $user = \Auth::user();        
        $id_usuario = $user->id;

        $users_sucursales = PermisosSucursales::where('id_user',$id_usuario)->select('id_sucursal')->get();
        
        $cajas = DB::table('cajas as c')
                ->select('c.*','s.sucursal')
                ->join('sucursales as s','c.id_sucursal','=','s.id')
                ->where('s.estatus',1)
                ->whereIn('c.id_sucursal',$users_sucursales)->get();
        
        return view('cajacobro.index', compact('cajas'));
    }
}
