<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use App\Models\Caja;
use App\Models\User;
use App\Models\Venta;
use App\Models\OperacionesCaja;
use Carbon\Carbon;

class CajaController extends Controller
{
    public function index()
    {
        $cajas = DB::table('cajas as c')
                ->leftjoin('operaciones_caja as o','c.id','=','o.id_caja')
                ->leftjoin('users as u','o.id_user','=','u.id')
                ->select('c.id','c.caja',DB::raw('ifnull(u.name,"Caja sin actividad") as cajero'),DB::raw('ifnull(o.fecha_apertura,"Caja sin actividad") as fecha_apertura'),DB::raw('ifnull(o.monto_apertura,"-") as monto_apertura'),DB::raw('ifnull(o.fecha_cierre,"") as fecha_cierre'),DB::raw('ifnull(o.monto_cierre,"") as monto_cierre'),DB::raw('ifnull(o.estatus,"Caja sin actividad") as estatus'))
                ->whereRaw('o.id = (select max(id) from operaciones_caja where id_caja = c.id)')
                ->orderBy('c.id')
                ->get();

        $cajas_abiertas = OperacionesCaja::select(DB::raw('distinct id_caja'))->where('estatus',1)->get();        

        $cajas_select = DB::table('cajas as c')
                        ->whereNotIn('id',$cajas_abiertas)  
                        ->get();

        $cajas_cierre_select = DB::table('cajas as c')
                        ->whereIn('id',$cajas_abiertas)  
                        ->get();                
        
        $cajeros = User::all(); //TODO:se debe relacionar con roles para traer solo los de rol cajero
        
        return view('caja.index',compact('cajas','cajas_select','cajeros','cajas_cierre_select'));
    }

    public function open(Request $request){
        $request->validate([
            'id_caja' => 'required',
            'id_user' => 'required',            
            
        ]);

        $caja = Caja::where('id',$request->id_caja)->first();
        $caja_desc = $caja->caja;

        OperacionesCaja::create([
            'id_caja' =>$request->id_caja,
            'id_user' =>$request->id_user,
            'fecha_apertura' => Carbon::now(),
            'monto_apertura' =>$request->monto_apertura,            
            'estatus' => 1
        ]);

        return Redirect::to('caja')->with(['message'=>$caja_desc.' abierta']);

    }

    public function close(Request $request){

        //aqui viene el id_caja abierta
        //se supone, una caja, solo puede estar abierta una vez al mismo tiempo en la tabla operaciones_caja
        $caja_abierta = OperacionesCaja::where('id_caja',$request->id_caja)->where('estatus',1)->first(); 

        $id_operacion_caja = $caja_abierta->id; //este me sirve para traer las ventas de la caja

        //debo actualizar fecha_cierre, monto_cierre, estatus = 0 en operaciones_caja
        //$venta = Venta::where('id_operacion_caja',$id_operacion_caja)->select(DB::raw('sum(total) as total'))->get();
        $total_venta = Venta::where('id_operacion_caja',$id_operacion_caja)->sum('total');

        $caja = Caja::where('id',$request->id_caja)->first();
        $caja_desc = $caja->caja;

        $operacion_caja = OperacionesCaja::find($id_operacion_caja);
        $operacion_caja->fecha_cierre = Carbon::now();
        $operacion_caja->monto_cierre = $total_venta;
        $operacion_caja->estatus = 0;
        $operacion_caja->save();
        
        return Redirect::to('caja')->with(['message'=>$caja_desc.' cerrada']);


    }
}
