<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;

class UsuariosController extends Controller
{
    public function index()
    {
    	return view('vusuarios.index');
    }

    public function create()
    {
    	$paquetes = DB::table('paquetes')->get();
    	return view('vusuarios.create', ['paquetes'=>$paquetes]);
    }

    public function store(Request $request)
    {
    	$usuario = new Usuarios;
    	$usuario->nombre = $request->get('usu');
    	$usuario->email = $request->get('email');
    	$usuario->contrasena = $request->get('pass');
    	$usuario->empresa = $request->get('empresa');
    	$usuario->id_paq = 1;
    	if($usuario->save()){
    		return response()->json([
    			'respuesta'=>1
    		]);
    	}
    	else{
    		return response()->json([
    			'respuesta'=>0
    		]);
    	}
    }

    public function edit($id)
    {
    	$usuario = Usuarios::findOrFail($id);
    	$paquetes = DB::table('paquetes')->get();
    	return view('vusuarios.edit', ['usuario'=>$usuario, 'paquetes'=>$paquetes]);
    }

    public function update(Request $request, $id)
    {
    	$usuario = Usuarios::findOrFail($id);
    	$usuario->nombre = $request->get('usu');
    	$usuario->email = $request->get('email');
    	$usuario->contrasena = $request->get('pass');
    	$usuario->empresa = $request->get('empresa');
    	$usuario->id_paq = 1;
    	if($usuario->update()){
    		return response()->json([
    			'respuesta'=>1
    		]);
    	}
    	else{
    		return response()->json([
    			'respuesta'=>0
    		]);
    	}
    }

    public function show($id)
    {
    	$usuario = DB::table('usuarios as u')
    	->join('paquetes as p', 'u.id_paq', '=', 'p.id_paq')
    	->where('id_usu', '=', $id)
    	->first();

    	return view('vusuarios.show', ['usuario'=>$usuario]);
    }


}
