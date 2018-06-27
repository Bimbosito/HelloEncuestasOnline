<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\ListaCorreos;
use App\Correos;

class CorreoController extends Controller
{
    //

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




 
}
