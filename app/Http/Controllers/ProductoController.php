<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;
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
        $productos = DB::table('productos as p')
                     ->join('categorias as c','p.id_categoria','=','c.id')
                     ->orderBy('c.categoria','asc')
                     ->select('p.*','c.categoria')->get();
        
        $categorias = Categorias::all();
        return view('producto.index', compact('productos','categorias'));
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
        $request->validate([
            'id_categoria' => 'required',
            'producto' => 'unique:productos|required',
            'sku' => 'unique:productos|required',            
            'precio_costo' => 'required',
            'precio_venta' => 'required',
            'cantidad' => 'required',
            'status' => 'required'
            
        ]);

        $producto = Productos::create([
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
            'cantidad' => $request->cantidad,//obligatorio
            'status' => $request->status//obligatorio
        ]);

        return Redirect::to('productos')->with(['message'=>'Producto agreado correctamente']);
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
        $request->validate([
            'edit_id_categoria' => 'required',
            'edit_producto' => [Rule::unique('productos','producto')->ignore($request->id_producto),'required'],
            'edit_sku' => [Rule::unique('productos','sku')->ignore($request->id_producto),'required'],            
            'edit_precio_costo' => 'required',
            'edit_precio_venta' => 'required',
            'edit_cantidad' => 'required',
            'edit_status' => 'required'
            
        ]);

        $producto = Productos::find($request->id_producto);
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
        $producto->cantidad = $request->edit_cantidad;
        $producto->status = $request->edit_status;

        $producto->save();

        return Redirect::to('productos')->with(['message'=>'Producto editado correctamente']);
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
        $producto->status = 0;
        $producto->save();

        return Redirect::to('productos')->with(['message'=>'Producto suspendido correctamente']);
    }

    public function getAutocompleteProducts(Request $request){

        $search = $request->search;  
  
        if($search == ''){  
           $productos = Productos::orderby('producto','asc')->select(DB::raw("concat(producto,'(sku:',sku,')') as producto"),'id')->limit(5)->get();  
        }else{  
           $productos = Productos::orderby('producto','asc')->select(DB::raw("concat(producto,'(sku:',sku,')') as producto"),'id')
                        ->where('producto', 'like', '%' .$search . '%')
                        ->orWhere('sku','like','%'.$search.'%')
                        ->orWhere('codigo_barras','like','%'.$search.'%')
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

        $search = $request->id_producto;    
         
        $productos = Productos::where('id', '=',$search)->get();  
        return response()->json($productos);   
         
    }
}
