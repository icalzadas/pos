<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Sucursal;
use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\PermisosSucursales;
use App\Models\OperacionesCaja;
use App\Models\Caja;
use App\Models\TiposPago;
use App\Models\Stock;
use App\Models\MovimientoStock;
use App\Models\CuentasXCobrar;
use Carbon\Carbon;

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
                          ->where('s.estatus',1)
                          ->get(); 
                          
        $clientes = Cliente::all();  
        
        //$productos = Productos::all();

        //debo determinar si el usuario que va accesar a terminal pos tiene una caja asignada y abierta
        $caja_abierta = OperacionesCaja::where('id_user',$id_usuario)->where('estatus',1)->select('estatus','id_caja','id')->first();
        if($caja_abierta!=null){
            $estatus_caja_user = $caja_abierta->estatus;
            $id_caja = $caja_abierta->id_caja;

            $nombre_caja_aux = Caja::where('id',$id_caja)->first();
            $nombre_caja = $nombre_caja_aux->caja;

            $id_operacion_caja = $caja_abierta->id;

            return view('venta.index',compact('sucursales','clientes','estatus_caja_user','nombre_caja','id_operacion_caja'));
        }else{
            $estatus_caja_user = 0;
            return view('venta.index',compact('sucursales','clientes','estatus_caja_user'));
        }
                
        
        
    }

    public function store(Request $request)
    {
        $user = \Auth::user();        
        $id_usuario = $user->id;
        
        $fecha_venta = Carbon::now();

        $tipo_pago_aux = TiposPago::where('tipo_pago',$request->tipo_pago)->first();
        $id_tipo_pago = $tipo_pago_aux->id;


        //guardo la venta
        $venta = Venta::create([
            'id_sucursal' =>$request->id_sucursal,
            'id_cliente' =>$request->id_cliente,
            'id_user' =>$id_usuario,
            'id_tipo_pago' =>$id_tipo_pago,
            'id_operacion_caja' => $request->id_operacion_caja,
            'fecha_venta' =>$fecha_venta,            
            'efectivo' =>$request->efectivo_pago,
            'cambio' =>$request->cambio,
            'cobrado_sn' =>1,
            'subtotal' =>$request->total_venta,
            'total' =>$request->total_venta,
            'estatus' =>1
        ]);

        //detalle de la venta
        $id_producto = $request->id_producto_tabla;
        $cantidad = $request->cantidad;
        $precio_venta = $request->precio_venta;
        $subtotal = $request->subtotal;
        $total = $request->total;

        $cont = 0;
        
        while($cont < count($id_producto)){
            DetalleVenta::create([
                'id_venta' =>$venta->id,
                'id_producto' => $id_producto[$cont], //viene de la vista tabla en ventas
                'cantidad' => $cantidad[$cont], //viene de la vista tabla en ventas
                'precio_venta' => $precio_venta[$cont],//viene de la vista tabla en ventas
                'subtotal' => $subtotal[$cont],//viene de la vista tabla en ventas
                'total' => $total[$cont]
            ]);
            
            //actualizo stock
            $stock = Stock::where('id_producto',$id_producto[$cont])->where('id_sucursal',$request->id_sucursal)->first();
            $stock->cantidad = $stock->cantidad - $cantidad[$cont];
            $stock->save(); 

            //inserto en movimientos_stock
            $ms = MovimientoStock::create([
                'id_sucursal' => $request->id_sucursal,
                'id_producto' => $id_producto[$cont],
                'cantidad' =>  $cantidad[$cont],
                'tipo_movimiento' => 'VENTA_PRODUCTO'
            ]);            
            
            
            $cont++;    
        }

        if($tipo_pago_aux->tipo_pago=='Credito'){
            $fecha_venta_aux = $fecha_venta;
            $fecha_cobro = Carbon::now()->addDay($request->dias_credito);
            //$fecha_cobro->addDay($request->dias_credito);
            CuentasXCobrar::create([
                'id_venta' => $venta->id,
                'limite_credito' => $request->lim_credito,
                'dias_credito' => $request->dias_credito,
                'fecha_venta' => $fecha_venta_aux,
                'fecha_cobro' => $fecha_cobro
            ]);
        }


        return response()->json([
            'message' => "Venta a credito generada correctamente",
            'id_venta' => $venta->id
        ], 200);

        //return Redirect::to('categorias')->with(['message'=>'Categoria agreada correctamente']);
    }

    public function listado(){
        $user = \Auth::user();        
        $id_usuario = $user->id;

        $users_sucursales = PermisosSucursales::where('id_user',$id_usuario)->select('id_sucursal')->get();

        $ventas = DB::table('ventas as v')
                    ->join('sucursales as s','v.id_sucursal','=','s.id')
                    ->join('clientes as c','v.id_cliente','=','c.id')
                    ->join('users as u','v.id_user','=','u.id')
                    ->join('tipos_pago as t','v.id_tipo_pago','=','t.id')
                    ->select('v.id','s.sucursal',DB::raw("concat(ifnull(c.nombre,''),' ',ifnull(c.paterno,''),' ',ifnull(c.materno,'')) as cliente"),'u.nick','t.tipo_pago','v.fecha_venta','v.efectivo','v.cambio','v.cobrado_sn','v.subtotal','v.total','v.estatus')
                    ->whereIn('v.id_sucursal',$users_sucursales)
                    ->get();
        
        return view('venta.listado',compact('ventas'));            

    }

    public function cancelar(Request $request){
        $venta = Venta::findOrFail($request->id_venta);
        $venta->estatus = 0; 
        $venta->save();

        //debo regresar cantidades al stock
        foreach($venta->detalleVenta as $detalle){
            //actualizo stock
            $stock = Stock::where('id_producto',$detalle->id_producto)->where('id_sucursal',$venta->id_sucursal)->first();
            if($stock!=null){
                $stock->cantidad = $stock->cantidad + $detalle->cantidad;
                $stock->save();
            }
            
        }

        return redirect()->route('listado_ventas')->with(['message'=>'Venta cancelada correctamente']);
    }

    public function ticket($id){
        $venta = Venta::findOrFail($id);
        return view("venta.ticket")->with("venta", $venta);
    }

    public function imprimir_ticket($id){
        $venta = Venta::findOrFail($id);
        $sucursal = $venta->sucursal->sucursal;
        $cliente = $venta->cliente->nombre . " " . $venta->cliente->paterno;
        $tipo_pago = $venta->tipoPago->tipo_pago;

        //Esto escribe en la consola de php
        //$connector = new FilePrintConnector("php://stdout");
        //$impresora = new Printer($connector);
        
        //Configuración para imprimir en impresora térmica
        $nombreImpresora = "pos_printer";
        $connector = new WindowsPrintConnector($nombreImpresora);
        $impresora = new Printer($connector);
        $impresora->setTextSize(2, 2);
        $impresora->text("Detalle de venta\n");
        $impresora->setTextSize(1, 1);
        $impresora->text("Sucursal: $sucursal \n");
        $impresora->text("Cliente: $cliente\n");
        $impresora->text("Fecha: $venta->fecha_venta\n");
        $impresora->text("Tipo de pago: $tipo_pago\n");
        foreach($venta->detalleVenta as $detalle){
            $impresora->text("-----------------\n");
            $producto = $detalle->producto->producto;
            $impresora->text("Producto: $producto\n");
            $impresora->text("Cantidad: $detalle->cantidad\n");
            $impresora->text("Precio: $detalle->precio_venta\n");
            $impresora->text("-----------------\n");
        }
        $impresora->text("Paga con: $venta->efectivo\n");
        $impresora->text("Cambio: $venta->cambio\n");
        $impresora->text("Costo total: $venta->total\n");
        $impresora->feed(5);
        $impresora->cut();
        $impresora->close();
        return response()->json([
            'mensaje' => 'Impresión exitosa'
        ]);
    }
}
