<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\PermisosSucursales;
use App\Models\Cliente;
use App\Models\Productos;
use App\Models\Stock;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = \Auth::user();        
        $id_usuario = $user->id;        
        $users_sucursales = PermisosSucursales::where('id_user',$id_usuario)->select('id_sucursal')->get();
        
        $usuarios = User::count();
        $vd = Venta::whereRaw('date(fecha_venta)>=curdate()')
               ->whereIn('id_sucursal',$users_sucursales)
               ->sum('total'); 
        $clientes = Cliente::count(); 
        
        $stock = Stock::where('cantidad','<=',0)->select('id_producto')->get();
        $prod_sin_stock = Productos::whereIn('id',$stock)->count();

        return view('home',compact('usuarios','vd','clientes','prod_sin_stock'));
    }
}
