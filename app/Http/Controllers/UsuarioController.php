<?php

namespace App\Http\Controllers;

use App\Models\User as User;
use App\Http\Resources\User as UsuariosResource;
use Illuminate\Http\Request;



class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate(15);
        return UsuariosResource::collection ($usuarios);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    $usuario = new User;
    $usuario->name = $request->input('name');
    $usuario->email = $request->input('email');
    $usuario->password = bcrypt($request->input('password'));

        if( $usuario->save() ){
            return new UsuariosResource( $usuario );
        }
    }

    public function show($id)
    {
        $usuario = User::findOrFail( $id );
        return new UsuariosResource( $usuario );
    }

}
