<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caja;
use App\Models\PermisosSucursales;
use App\Models\Sucursal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CajasCobroController extends Controller
{
    public function index()
    {
        $user = \Auth::user();        
        $id_usuario = $user->id;

        $users_sucursales = PermisosSucursales::where('id_user',$id_usuario)->select('id_sucursal')->get();
        $missucursales = Sucursal::whereIn('id',$users_sucursales)->where('estatus',1)->get();
        
        $cajas = DB::table('cajas as c')
                ->select('c.*','s.sucursal')
                ->join('sucursales as s','c.id_sucursal','=','s.id')
                ->where('s.estatus',1)
                ->whereIn('c.id_sucursal',$users_sucursales)->get();
        
        return view('cajacobro.index', compact('cajas','missucursales'));
    }

    public function store(Request $request)
    {
        $id_sucursal = $request->id_sucursal;
        /*$request->validate([
            'id_sucursal' => 'required',  
            'caja' => Rule::unique('cajas')->where(function ($query) {
                return $query->where('id_sucursal', $id_sucursal);
            })         
                        
        ]);*/
        
        $messages = [
            'caja.unique' => 'El nombre de caja ya existe para la sucursal: '.$id_sucursal,
        ];

        Validator::make($request->all(), [
            'caja' => [
                'required',
                Rule::unique('cajas')->where(function ($query) use($id_sucursal) {
                    return $query->where('id_sucursal', $id_sucursal);
                })         
            ],
        ],$messages)->validate();

        $caja = Caja::create([
            'id_sucursal' => $request->id_sucursal,//obligatorio            
            'caja'    => $request->caja,
            'descripcion'    => $request->descripcion,
                      
        ]);

        return Redirect::to('cajas')->with(['message'=>'Caja agregada correctamente']);
    }

    public function actualizar(Request $request)
    {

        $id_sucursal = $request->edit_id_sucursal;
        $id_caja = $request->id_caja;

        var_dump($id_sucursal);
        var_dump($id_caja);

        $messages = [
            'edit_caja.unique' => 'El nombre de caja ya existe para la sucursal: '.$id_sucursal,
        ];

        $var = Validator::make($request->all(), [
            'edit_caja' => [
                
                Rule::unique('cajas','caja')->ignore($id_caja)->where(function ($query) use($id_sucursal) {
                    return $query->where('id_sucursal', $id_sucursal);
                })
            ]            
            
        ],$messages)->validate();

        var_dump($var);
        

        $caja = Caja::find($request->id_caja);
        $caja->caja = $request->edit_caja;         
        $caja->descripcion = $request->edit_descripcion; 
        $caja->save();

        return Redirect::to('cajas')->with(['message'=>'Caja editada correctamente']);
    }
}
