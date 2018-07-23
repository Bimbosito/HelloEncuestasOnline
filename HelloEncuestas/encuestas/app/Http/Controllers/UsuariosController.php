<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\RecuperarContrasenaMail;
use App\Usuarios;
use Auth;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
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
        Session::forget('usu');
        Session::forget('email');
        Session::forget('interfaz');
        return view('Home.principal');

}

public function loginuser(Request $request)
    {

        //dd($request->all());
        /*if(Auth::attempt([

        'email' => $request->email,
        'password' => $request->contrasena

     ]))*/

        $user = Usuarios::where('email', $request->get('email'))->first();
        if($user == null  ){
         return view('Usuarios.login');

        }
          else if($user->contrasena == $request->get('contrasena')){
           Session::put('usu', $user->id_usu);
           Session::put('email', $user->email);
           Session::forget('interfaz');
           Session::put('interfaz', 'Inicio');
            return view('Home.inicio');
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
        Session::put('interfaz', 'Regístrate');
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
        request()->image->move(public_path('assets/images/usuarios'), $imageName);
        }

    	$usuario = new Usuarios;
    	$usuario->nombre = $request->get('nombre');
    	$usuario->email = $request->get('email');
    	$usuario->contrasena = $request->get('password');
    	$usuario->empresa = $request->get('empresa');
    	$usuario->logo = $imageName;
        $usuario->id_paq = 1;   
        $usuario->save();
        return view('Home.principal');
         //Mail recuperar 



    }

    public function restoremail(Request $request)
    {

    $correo=DB::table('usuarios')
        ->where('email', '=', $request->get('email'))
        ->get();  
        if(count($correo) > 0)
        {
           
            $usuario=Usuarios::findOrFail($correo[0]->id_usu);
             $data = array(
    'contrasena'=>$usuario->contrasena,
);
            Mail::send('emails.restore', $data, function($message) use ($usuario){
        $message->from('developer.sr@hellomexico.mx','Helle Mexico Team');
        $message->to($usuario->email)->subject('Mensaje de prueba helloteam');
    });
     return view('emails.restorepage');
        }
        else
        {
             return "view('error')";
        }

//------------------------------------------------------------------
    
    }
    public function edit()
    {
     /*	$usuario = Usuarios::findOrFail($id);
    	$paquetes = DB::table('paquetes')->get();
    	return view('vusuarios.edit', ['usuario'=>$usuario, 'paquetes'=>$paquetes]);*/

        $usuario = Session::get('usu');
      //dd($usuario);

        if($usuario == null)
        {

            return view('Usuarios.login');

        }else{
            $user = Usuarios::findOrFail($usuario);
            return view('Usuarios.edit', ['user'=>$user]);

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
        Session::forget('interfaz');
        Session::put('interfaz', 'Perfil');

        $usuario = Session::get('usu');
      //dd($usuario);

        if($usuario == null)
        {

            return view('Usuarios.login');

        }else{
            $user = Usuarios::findOrFail($usuario);
            return view('Usuarios.mostrar', ['user'=>$user]);

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

    public function recuperar()
    { 
        
            return view('Usuarios.recuperar');

    }

    public function obtener(Request $request)
    {
        $correo=DB::table('usuarios')
        ->where('email', '=', $request->get('email'))
        ->get();  
        if(count($correo) > 0)
        {
           
            $usuario=Usuarios::findOrFail($correo[0]->id_usu);
            Mail::to($request->get('email'))->send(new RecuperarContrasenaMail($usuario));
            return view('Home.inicio');

        }
        else
        {
             return view('error');
        }
    }

}
