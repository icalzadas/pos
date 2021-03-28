<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Productos;
use App\Models\Categorias;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        //$categorias = Categorias::all();
        return view('user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'unique:users|required',

            'nick' => 'unique:users|required',
            'email' => 'unique:users|required',
            'password' => 'required',
                        
        ]);

        $user = User::create([
            'name' => $request->name,//obligatorio
            'nick'    => $request->nick,
            'email'    => $request->email,
            'telefono'    => $request->telefono,
            'password'    => Hash::make($request->password),
            
            
        ]);

        return Redirect::to('usuarios')->with(['message'=>'Usuario agregado correctamente']);
    }

    public function actualizar(Request $request)
    {
        $request->validate([
            [Rule::unique('users','name')->ignore($request->edit_name)],

            [Rule::unique('users','nick')->ignore($request->edit_nick)],
            [Rule::unique('users','email')->ignore($request->edit_email)],
            
                        
        ]);

        $user = User::find($request->id_user);
        $user->name = $request->edit_name; 
        $user->nick = $request->edit_nick; 
        $user->email = $request->edit_email;
        
        $user->telefono = $request->edit_telefono;
        if($request->edit_password<>"" && $request->edit_password<>null){
            $user->password = Hash::make($request->edit_password);    
        }        

        $user->save();

        return Redirect::to('usuarios')->with(['message'=>'Usuario editado correctamente']);
    }

    public function eliminar(Request $request)
    {
        $user = User::find($request->del_id_user);        
        $user->password = "";
        $user->save();

        return Redirect::to('usuarios')->with(['message'=>'Usuario suspendido correctamente']);
    }

}
