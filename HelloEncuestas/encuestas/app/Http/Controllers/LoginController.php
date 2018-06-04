<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;

class LoginController extends Controller
{
    public function index(){
    	
    }

    public function ingresar(Request $request){
    	$login = DB::table('usuarios')
    	->where('email', '=', $request->get('usu'))
    	->where('contrasena', '=', $request->get('pass'))
    	->get();

    	if(count($login) > 0){
    		Session::put('usuario', $login->id_usu);
    		return view('index.php');
    	}

    	else{
    		return view('login.php');
    	}
    }

    public function existe(Request $request){
    	$login = DB::table('usuarios')
    	->where('email', '=', $request->get('usu'))
    	->get();

    	if(count($login) == 1){
    		return response()->json([
    			'cuanto'=>1
    		]);
    	}

    	else{
    		return response()->json([
    			'cuanto'=>0
    		]);
    	}
    }

    public function recuperar(Request $request){
    	$login = DB::table('usuarios')
    	->where('email', '=', $request->get('usu'))
    	->get();

    	if(count($login) == 1){
    		return response()->json($login);
    	}

    	else{
    		return response()->json([
    			'usuario' => 0;
    			'contrasena' => 0;
    		]);
    	}
    }
}
