<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Sucursal;
use App\Models\PermisosSucursales;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class PermisosSucursalController extends Controller
{
    public function index()
    {

        $users = User::where('password','<>',"")->get();
        $sucursales = Sucursal::where('estatus',1)->get();

        $permisos_sucursales = DB::table('permisos_sucursales as p')
                ->join('users as u','p.id_user','=','u.id')
                ->join('sucursales as s','p.id_sucursal','=','s.id')
                ->orderBy('p.id_user')
                ->select('p.*','u.nick','s.sucursal')->get();


        return view('permisos_sucursales.index', compact('permisos_sucursales','users','sucursales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'id_sucursal' => 'required'
                        
        ]);

        $ps = PermisosSucursales::create([
            'id_user' => $request->id_user,//obligatorio
            'id_sucursal'    => $request->id_sucursal,//obligatorio
            
            
        ]);

        return Redirect::to('sucursales/permisos')->with(['message'=>'Permiso agregado correctamente']);
    }

    public function eliminar(Request $request)
    {
        $ps = PermisosSucursales::find($request->del_id_permiso);        
        $ps->delete();

        return Redirect::to('sucursales/permisos')->with(['message'=>'Permiso eliminado correctamente']);
    }
}
