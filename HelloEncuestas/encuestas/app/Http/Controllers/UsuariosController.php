<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use Auth;
use Session;
use Redirect;
class UsuariosController extends Controller
{
    public function index()
    {
    	return view('vusuarios.index');
    }


public function login()
    {

        return view('Usuarios.login');
    }
public function logout(){
         Session::forget('usuario');
        return view('Home.principal');

}

public function loginuser(Request $request)
    {

        //dd($request->all());
        /*if(Auth::attempt([

        'email' => $request->email,
        'password' => $request->contrasena

     ]))*/

        $user = Usuarios::where('email', $request->email)->first();
        if($user == null  ){
         return view('Usuarios.login');

        }
          else if($user->password == $request->contrasena){
           Session::put('usuario', $user);
            return Redirect::route('Usuarios.mostrar');
        }
        else{


             return view('Usuarios.login');

        }

        //dd($user);

    /* {

         // $user = Usuarios::where('email', $request->email)->first();

          //return redirect()->route('Home.principal');
            dd('entro');
     } else{

     //return redirect()->route('Usuarios.crear');
        dd('no entro');
}*/

    }


    public function create()
    {
    	//$paquetes = DB::table('paquetes')->get();
    	//return view('vusuarios.create', ['paquetes'=>$paquetes]);
        return view('Usuarios.create');
    }

    public function store(Request $request)
    {

      $imageName = "";

         if($request->hasFile('image')){
         request()->validate([

            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        }

    	$usuario = new Usuarios;
    	$usuario->nombre = $request->get('nombre');
    	$usuario->email = $request->get('email');
    	$usuario->password = $request->get('password');
    	$usuario->empresa = $request->get('empresa');
    	$usuario->logo =   $imageName;
        $usuario->id_paq = 1;
        $usuario->save();
        return view('Home.principal');

    }

    public function edit()
    {
     /*	$usuario = Usuarios::findOrFail($id);
    	$paquetes = DB::table('paquetes')->get();
    	return view('vusuarios.edit', ['usuario'=>$usuario, 'paquetes'=>$paquetes]);*/

        $usuario = Session::get('usuario');
      //dd($usuario);
        if($usuario == null)
        {

        return view('Usuarios.login');

        }else{
      return view('Usuarios.edit')->with('user' , $usuario);

        }

    }

    public function update(Request $request)
    {
        /*
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
    	}*/

        $usuario = Session::get('usuario');
      //dd($usuario);
        if($usuario == null)
        {

        return view('Usuarios.login');

        }else{

        $usuario = Usuarios::findOrFail($usuario->id_usu);
        $usuario->nombre = $request->get('nombre');
        $usuario->email = $request->get('email');
        $usuario->empresa = $request->get('empresa');
        $usuario->id_paq = 1;
        $usuario->save();
        Session::put('usuario', $usuario);
               return Redirect::route('Usuarios.mostrar');

        }
    }

    public function show()
    {


        $usuario = Session::get('usuario');
      //dd($usuario);

        if($usuario == null)
        {

        return view('Usuarios.login');

        }else{
      return view('Usuarios.mostrar')->with('user' , $usuario);

        }


    	/*$usuario = DB::table('usuarios as u')
    	->join('paquetes as p', 'u.id_paq', '=', 'p.id_paq')
    	->where('id_usu', '=', $id)
    	->first();

    	return view('vusuarios.show', ['usuario'=>$usuario]);*/



    }

    public function destroy($id)
    {
        $usuario = Usuarios::findOrFail($id);
        if($usuario->delete()){
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
}
