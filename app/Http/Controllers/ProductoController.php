<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Stock;
use App\Models\MovimientoStock;
use App\Models\Sucursal;
use App\Models\PermisosSucursales;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();        
        $id_usuario = $user->id;

        $users_sucursales = PermisosSucursales::where('id_user',$id_usuario)->select('id_sucursal')->get();
        $missucursales = Sucursal::whereIn('id',$users_sucursales)->where('estatus',1)->get();

        $productos = DB::table('productos as p')
                     ->join('categorias as c','p.id_categoria','=','c.id')
                     ->join('sucursales as s','s.id','=','p.id_sucursal')
                     ->whereIn('s.id',$users_sucursales)
                     ->orderBy('c.categoria','asc')
                     ->select('p.*','c.categoria','s.sucursal')->get();
        
        $categorias = Categorias::where('status',1)->get();
        return view('producto.index', compact('productos','categorias','missucursales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'id_categoria' => 'required',
            'producto' => 'unique:productos|required',
            'sku' => 'unique:productos|required',            
            'precio_costo' => 'required',
            'precio_venta' => 'required',
            'cantidad' => 'required',
            'status' => 'required'
            
        ]);*/

        $request->validate([
            'id_sucursal' => 'required',
            'id_categoria' => 'required',                       
            'precio_costo' => 'required',
            'precio_venta' => 'required',
            'cantidad' => 'required',
            'status' => 'required'
            
        ]);

        if($request->id_sucursal == "*"){
            //si id_sucursal es *(todas), debo ver todas las sucursales a las que el usuario tiene permiso e insertar 
            //producto, stock, movimientos_stock por cada sucursal

            $user = \Auth::user();        
            $id_usuario = $user->id;

            $users_sucursales = PermisosSucursales::where('id_user',$id_usuario)->select('id_sucursal')->get();

            foreach($users_sucursales as $us){
                $id_sucursal = $us['id_sucursal'];

                //inserto en productos
                $producto = Productos::create([
                    'id_sucursal' => $id_sucursal,
                    'id_categoria' => $request->id_categoria,//obligatorio
                    'producto' => $request->producto,//obligatorio y unico
                    'sku' => $request->sku,//obligatorio y unico
                    'codigo_barras' => $request->codigo_barras,//unico
                    'precio_costo' => $request->precio_costo,//obligatorio
                    'precio_venta' => $request->precio_venta,//obligatorio
                    'precio_mayoreo' => $request->precio_mayoreo,
                    'minimo' => $request->minimo,
                    'maximo' => $request->maximo,
                    'talla' => $request->talla,
                    'modelo' => $request->modelo,
                    'color' => $request->color,
                    'cantidad_inicial' => $request->cantidad,//obligatorio
                    'status' => $request->status//obligatorio
                ]);

                //debo insertar a stock
                $stock = Stock::create([
                    'id_sucursal' =>$id_sucursal,
                    'id_producto' =>$producto->id,
                    'cantidad' =>$request->cantidad,
                    'referencia' => 'ALTA_PRODUCTO'
                ]);

                //debo insertar a movimientos_stock
                $ms = MovimientoStock::create([
                    'id_sucursal' => $id_sucursal,
                    'id_producto' => $producto->id,
                    'cantidad' => $request->cantidad,
                    'tipo_movimiento' => 'ALTA_PRODUCTO'
                ]);


            }

            return Redirect::to('productos')->with(['message'=>'Producto agreado correctamente para todas tus sucursales']);
        }else{

            $producto = Productos::create([
                'id_sucursal' => $request->id_sucursal,
                'id_categoria' => $request->id_categoria,//obligatorio
                'producto' => $request->producto,//obligatorio y unico
                'sku' => $request->sku,//obligatorio y unico
                'codigo_barras' => $request->codigo_barras,//unico
                'precio_costo' => $request->precio_costo,//obligatorio
                'precio_venta' => $request->precio_venta,//obligatorio
                'precio_mayoreo' => $request->precio_mayoreo,
                'minimo' => $request->minimo,
                'maximo' => $request->maximo,
                'talla' => $request->talla,
                'modelo' => $request->modelo,
                'color' => $request->color,
                'cantidad_inicial' => $request->cantidad,//obligatorio
                'status' => $request->status//obligatorio
            ]);

            //debo insertar a stock
            $stock = Stock::create([
                'id_sucursal' =>$request->id_sucursal,
                'id_producto' =>$producto->id,
                'cantidad' =>$request->cantidad,
                'referencia' => 'ALTA_PRODUCTO'
            ]);

            //debo insertar a movimientos_stock
            $ms = MovimientoStock::create([
                'id_sucursal' => $request->id_sucursal,
                'id_producto' => $producto->id,
                'cantidad' => $request->cantidad,
                'tipo_movimiento' => 'ALTA_PRODUCTO'
            ]);

            return Redirect::to('productos')->with(['message'=>'Producto agreado correctamente']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    public function actualizar(Request $request)
    {
        /*$request->validate([
            'edit_id_categoria' => 'required',
            'edit_producto' => [Rule::unique('productos','producto')->ignore($request->id_producto),'required'],
            'edit_sku' => [Rule::unique('productos','sku')->ignore($request->id_producto),'required'],            
            'edit_precio_costo' => 'required',
            'edit_precio_venta' => 'required',
            'edit_cantidad' => 'required',
            'edit_status' => 'required'
            
        ]);*/

        $request->validate([
            
            'edit_id_categoria' => 'required',                       
            'edit_precio_costo' => 'required',
            'edit_precio_venta' => 'required',
            'edit_cantidad' => 'required',
            'edit_status' => 'required'
            
        ]);

        $producto = Productos::find($request->id_producto);
        $id_producto = $producto->id;
        //$producto->id_sucursal = $request->edit_id_sucursal;
        $producto->id_categoria = $request->edit_id_categoria;
        $producto->producto = $request->edit_producto;
        $producto->sku = $request->edit_sku;
        $producto->codigo_barras = $request->edit_codigo_barras;
        $producto->precio_costo = $request->edit_precio_costo;
        $producto->precio_venta = $request->edit_precio_venta;
        $producto->precio_mayoreo = $request->edit_precio_mayoreo;
        $producto->minimo = $request->edit_minimo;
        $producto->maximo = $request->edit_maximo;
        $producto->talla = $request->edit_talla;
        $producto->modelo = $request->edit_modelo;
        $producto->color = $request->edit_color;
        $producto->cantidad_inicial = $request->edit_cantidad;
        $producto->status = $request->edit_status;

        $producto->save();

        $producto_movimiento_stock = MovimientoStock::where('id_producto',$id_producto)->where('tipo_movimiento','ALTA_PRODUCTO')->first(); 
        $producto_movimiento_stock->cantidad = $request->edit_cantidad;
        $producto_movimiento_stock->save();

        return Redirect::to('productos')->with(['message'=>'Producto '. $request->edit_producto.' editado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function eliminar(Request $request)
    {
        $producto = Productos::find($request->del_id_producto);
        $prod_descripcion = $producto->producto;
        $producto->status = 0;
        $producto->save();

        return Redirect::to('productos')->with(['message'=>'Producto '. $prod_descripcion .' suspendido correctamente']);
    }

    public function getAutocompleteProducts(Request $request){
        //TODO
        $search = $request->search; 
        $id_sucursal = $request->id_sucursal; 
  
        if($search == ''){  
           //$productos = Productos::where('id_sucursal',$id_sucursal)->where('status',1)->orderby('producto','asc')->select(DB::raw("concat(producto,'(sku:',sku,')') as producto"),'id')->limit(5)->get();  
           $productos = DB::table('productos as p')
                        ->select(DB::raw("concat(p.producto,'(sku:',p.sku,')') as producto"),'p.id')
                        ->join('stock as s', function($join){
                            $join->on('p.id','=','s.id_producto');
                            $join->on('p.id_sucursal','=','s.id_sucursal');
                        }) 
                        ->where('p.id_sucursal',$id_sucursal)
                        ->where('p.status',1)  
                        ->where('s.cantidad','>',0)                         
                        ->orderby('p.producto','asc')
                        ->limit(5)
                        ->get();             
        
        }else{                                             
                        
            $productos = DB::table('productos as p')
                        ->select(DB::raw("concat(p.producto,'(sku:',p.sku,')') as producto"),'p.id')
                        ->join('stock as s', function($join){
                            $join->on('p.id','=','s.id_producto');
                            $join->on('p.id_sucursal','=','s.id_sucursal');
                        }) 
                        ->where('p.id_sucursal',$id_sucursal)
                        ->where('p.status',1)  
                        ->where('s.cantidad','>',0)
                        ->whereRaw("( p.producto like '%".$search."%' or p.sku like '%".$search."%' or p.codigo_barras like '%".$search."%' )") 
                        ->orderby('p.producto','asc')
                        ->limit(5)
                        ->get();        
        }  
  
        $response = array();
  
        foreach($productos as $pr){  
           $response[] = array("value"=>$pr->id,"label"=>$pr->producto);  
        }  
  
        echo json_encode($response);  
        exit;  
    }

    public function getProductInfo(Request $request){
        //TODO

        $search = $request->id_producto;    
         
        $productos = Productos::where('id', '=',$search)->get();  
        return response()->json($productos);   
         
    }
}
