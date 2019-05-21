<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::all();
        return $usuario;
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
        $usuario = new Usuario();
        $usuario->nombreUsuario = $request->nombreUsuario;
        $usuario->APAUsuario = $request->APAUsuario;
        $usuario->AMAUsuario = $request->AMAUsuario;
        $usuario->correoUsuario = $request->correoUsuario;
        $usuario->nicknameUsuario = $request->nicknameUsuario;
        $usuario->contrasenaUsuario = $request->contrasenaUsuario;
        $usuario->save();
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
    public function update(Request $request)
    {
        $usuario = Usuario::findOrFile($request->idUsuario);
        $usuario->nombreUsuario = $request->nombreUsuario;
        $usuario->APAUsuario = $request->APAUsuario;
        $usuario->AMAUsuario = $request->AMAUsuario;
        $usuario->correoUsuario = $request->correoUsuario;
        $usuario->nicknameUsuario = $request->nicknameUsuario;
        $usuario->contrasenaUsuario = $request->contrasenaUsuario;
        $usuario->save();
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
}
