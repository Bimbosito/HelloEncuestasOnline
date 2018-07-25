<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Usuarios;
use App\ListaCorreos;
use App\Correos;
use App\CorreoRegistro;

class CorreoController extends Controller
{
  public function index()
  {
  
    $regcorreo = DB::table('regcorreo')
    ->get();

    $listacorreo = DB::table('lista_correos as lcorreo')
    ->get();


    return view('Correos.index', ['regcorreo'=>$regcorreo, 'listacorreo'=>$listacorreo]);
  }

public function listasend(Request $request){

$usuario = Session::get('usuario');

if($usuario == null) 
    {
      return view('Usuarios.login');
    }
else
{  

  //dd($request->cLista);
     $correos = Correos::where('id_lis', $request->cLista)->get();

     foreach ($correos as $correo) {
       Self::send($correo->correo);
     }
     $listas = ListaCorreos::where('id_usu', $usuario->id_usu)->get();
      //   dd($listas->nombre);
         return view('Correos.lista')->with('listas', $listas);

      }
    }
    
    public function lista(){
    $usuario = Session::get('usuario');
      //dd($usuario);
        if($usuario == null)
        {
     
        return view('Usuarios.login'); 

        }else{

          $listas = ListaCorreos::where('id_usu', $usuario->id_usu)->get();
      //   dd($listas->nombre);
         return view('Correos.lista')->with('listas', $listas);
           
        }


    }
     public function show($id){
      
     }

    public function enviarlista(Request $request){


    }


     public function send($to)
    {
       // $title = $request->input('title');
        //$content = $request->input('content');


 

        $title = 'ejemplo';
        $content = 'ejemplo';

         Mail::send( 'Correos.template' , ['title' => $title, 'content' => $content] , function ($message) use ($to)
        {

            $message->from('helloteam@gmail.com', 'Omar');

            $message->to($to);

        });

      }


public function correos(Request $request){


        $usuario = Session::get('usuario');
      //dd($usuario);
        if($usuario == null)
        {
     
        return view('Usuarios.login'); 

        }else{
              $email = "email";
              for($j = 1 ;$j< (int)$request->Correos+1;$j++){
                      $email = "email".$j;
                      if($request->$email != null)
                      Self::send($request->$email);
                       }
        return view('Correos.administrador'); 
       
    }
  }
    public function administrador(){

         $usuario = Session::get('usuario');
      //dd($usuario);
        if($usuario == null)
        {
     
        return view('Usuarios.login'); 

        }else{
      return view('Correos.administrador'); 
           
        }

        //return view('')
    }
public function agregarcorreo(Request $request)
  {
  $correo = new agregarcorreo;
  $correo->nombre=$request->get('nombre');
  $correo->correo=$request->get('correo');
  $correo->telefono=$request->get('telefono');
  $correo->direccion=$request->get('direccion');
  $correo->empresa=$request->get('empresa');
  $correo->lcorreo=$request->get('lcorreo');
  $correo->save();

  return '$request';
  
  }

  public function agregarlista(Request $request)
  {
    $lista = new ListaCorreos;
    $lista->nombre=$request->get('alista');
    $lista->id_usu = Session::get('usu');
    $lista->save();
    if($lista->save()){
    return redirect()->action('CorreoController@index');
  }else{
    return "Error al agregar Lista";
  }
  }
    public function editarlista(Request $request)
    {
      $lista = ListaCorreos::findOrfail($request->id);
      $lista->nombre=$request->get('alista');
      $lista->id_usu = Session::get('usu');
    
    
    }

  public function destroy($id){
    $lista = ListaCorreos::findOrfail($id);
    $lista->delete();
    if($lista->delete())
    {
       return redirect()->action('CorreoController@index');
    }else{
      return redirect()->action('CorreoController@index');
    }

  }
 
}
