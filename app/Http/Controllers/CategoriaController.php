<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categorias::all();
        //$categorias = Categorias::all();
        return view('categoria.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria' => 'unique:categorias|required',
            'status'    => 'required'            
        ]);

        $categoria = Categorias::create([
            'categoria' => $request->categoria,//obligatorio y unico
            'status'    => $request->status
            
        ]);

        return Redirect::to('categorias')->with(['message'=>'Categoria agreada correctamente']);
    }

    public function actualizar(Request $request)
    {
        $request->validate([
            'edit_categoria' => [Rule::unique('categorias','categoria')->ignore($request->id_categoria),'required'],
            'edit_status'         => 'required'            
        ]);

        $categoria = Categorias::find($request->id_categoria);
        $categoria->categoria = $request->edit_categoria; 
        $categoria->status = $request->edit_status;       

        $categoria->save();

        return Redirect::to('categorias')->with(['message'=>'Categoria editada correctamente']);
    }

    public function eliminar(Request $request)
    {
        $categoria = Categorias::find($request->del_id_categoria);
        $categoria->status = 0;
        $categoria->save();

        return Redirect::to('categorias')->with(['message'=>'Categoria suspendida correctamente']);
    }
}
