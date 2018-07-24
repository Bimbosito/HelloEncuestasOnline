<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Sede;
use App\Ciudad;
use App\RegistroEspecifica;
use App\EncuestaEspecifica;
use App\PreguntasEspecifica;
use App\OpcionMultipleEspecifica;

use Illuminate\Http\Request;

class EncuestaEspecificaController extends Controller
{
    public function index()
    {
        $encuestas = DB::table('encuesta_especifica as e')
        ->join('marca as m', 'e.marca', '=', 'm.id_mar')
        ->select('e.*', 'm.*', 'e.nombre as encu', 'm.nombre as marca')
        ->where('e.id_usu', '=', Session::get('usu'))
        ->where('borrado', '=', 0)
        ->get();

    	return view('EncuestaEspecifica.index', ['encuestas'=>$encuestas]);
    }

    public function create()
    {
        $marcas = DB::table('marca')
        ->where('id_usu', '=', Session::get('usu')) 
        ->get();

    	return view('EncuestaEspecifica.create', ['marcas'=>$marcas]);
    }

    public function store(Request $request)
    {
    	$encuesta = new EncuestaEspecifica;
    	$encuesta->nombre = $request->get('nombre');
        $fecha = explode("-", $request->get('inicio'));
    	$encuesta->fecha_inicio = $fecha[2]."-".$fecha[1]."-".$fecha[0];
        $fecha2 = explode("-", $request->get('fin'));
    	$encuesta->fecha_fin = $fecha2[2]."-".$fecha2[1]."-".$fecha2[0];
    	$encuesta->sede = $request->get('sede');
    	$encuesta->marca = $request->get('marca');
    	$encuesta->evento = $request->get('eventos');
    	$encuesta->abierto = $request->get('abierto');
        $encuesta->borrado = 0;
    	$encuesta->id_usu = Session::get('usu');
    	if($encuesta->save()){
            $cuantosR = (int)$request->get('cuantosR');
            $cuantosP = (int)$request->get('cuantosP');
            $cuantosO = (int)$request->get('cuantosO');
    		$r = 1;
    		$p = 1;
            $o = 1;
    		$bandera = 0;
            $texto = "";
            while($r <= $cuantosR){
                if($request->get('campo'.$r) != ""){
                    $registro =  new RegistroEspecifica;
                    $registro->campo = $request->get('campo'.$r);
                    $registro->id_esp = $encuesta->id_esp;
                    $registro->save();
                }
                $r = $r + 1;
            }
    		while($p <= $cuantosP){
                if($request->get('pregunta'.$p) != "") {
                    $pregunta = new PreguntasEspecifica;
                    $pregunta->pregunta = $request->get('pregunta'.$p);
                    $pregunta->tipo = $request->get('tip'.$p);
                    $pregunta->id_esp = $encuesta->id_esp;
                    if($pregunta->save()){
                        if($request->get('tip'.$p) == 3 || $request->get('tip'.$p) == 4 || $request->get('tip'.$p) == 6 || $request->get('tip'.$p) == 7){
                            while ($o <= $cuantosO) {
                                if($request->get('opcion'.$p.$o) != ""){
                                    $opcion = new OpcionMultipleEspecifica;
                                    $opcion->respuestas = $request->get('opcion'.$p.$o);
                                    $opcion->id_pesp = $pregunta->id_pesp;
                                    if(!$opcion->save()){
                                        $bandera = 2;
                                        break;
                                    }
                                }
                                $o++;
                            }
                            $o = 0;
                        }
                    }
                    else{
                        $bandera = 1;
                        $texto = "Hubo error al guardar las respuestas";
                        break;
                    }
                }
                $p = $p + 1;
            }
    	}
    	else{
    		$bandera = 3;
            $texto = "Hubo error al guardar las preguntas";
    	}

    	if($bandera == 0){
    		return response()->json([
		    	'respuesta'=>1 //Exito
		    ]);
    	}

    	else{
    		return response()->json([
		    	'respuesta'=>0 //Error al guardar
		    ]);
    	}
    }

    public function edit($id)
    { 
    
     $encuesta = EncuestaEspecifica::find($id);
    	$preguntas = DB::table('preguntas_especifica as pe')
    	->where('id_esp', '=', $id)
        ->get();
        //------------------------------------------------
        $enc = DB::table('encuesta_especifica as e')
        ->where('id_esp', '=', $id)
        ->first();
        //-------------------------------------------------
        $marca = DB::table('marca')
        ->where('id_usu', '=', Session::get('usu'))
        ->get();
        //------------------------------------------------------------------------


        $preguntas = DB::table('preguntas_especifica')
        ->where('id_esp', '=', $id)
        ->get();

        $registro = DB::table('registro_especifica')
        ->where('id_esp', '=', $id)
        ->get();

        $opciones = DB::table('opcion_multiple_especifica')
        ->get();

        
        //----------------------------------------------------------------------------------
        return view('EncuestaEspecifica.edit', ['encuesta'=>$encuesta, 'marca'=>$marca, 'preguntas'=>$preguntas, 'registro'=>$registro, 'opciones'=>$opciones, 'id'=>$id, 'enc'=>$enc]);
    }

    public function update(Request $request, $id)
    {

//---------------------------------------------------------------------------------------------------------------------------------
  
        $encuesta = EncuestaEspecifica::findOrFail($id);
        $encuesta->nombre = $request->nombre;
        $encuesta->fecha_inicio = $request->fechaInicio;
        $encuesta->fecha_fin = $request->fechaFin;
        $encuesta->sede = $request->sede;
        $encuesta->marca = $request->marca;
        $encuesta->evento = $request->evento;
        $encuesta->abierto = $request->abierto;
        $encuesta->update();

        $encuesta->id_usu = Session::get('usu');
        if($encuesta->update()){
            $a = 1;
            $o = 1;
            $bandera = 0;
            while ($request->get('pregunta'.$a)!="") {
                $pregunta = new PreguntasEspecifica;
                $pregunta->pregunta = $request->get('pregunta'.$a);
                $pregunta->tipo = $request->get('tipo');
                $pregunta->id_esp = $encuesta->id_esp;
                if($pregunta->update()){
                    if($request->get('tipo') == 2){
                        while($request->get('correspondencia'.$o) == $a){
                            $opcion = new OpcionMultipleEspecifica;
                            $opcion->respuestas = $request->get('respuesta'.$o);
                            $opcion->id_pesp = $pregunta->id_pesp;
                            if(!$opcion->update()){
                                $bandera = 2;
                                break;
                            }
                        }
                    }
                }
                else{
                    $bandera = 1;
                    break;
                }

            }
        }
        else{
            $bandera = 3;
        }

        if($bandera == 0){
            return response()->json([
                'respuesta'=>1 //Exito
            ]);
        }

        else{
            return response()->json([
                'respuesta'=>0 //Error al guardar
            ]);
        }
    }



    public function show($id)
    {
        $encuesta = EncuestaEspecifica::find($id);

        $preguntas = DB::table('preguntas_especifica')
        ->where('id_esp', '=', $id)
        ->get();

        $registro = DB::table('registro_especifica')
        ->where('id_esp', '=', $id)
        ->get();

        $marcas = DB::table('marca')
        ->where('id_usu', '=', Session::get('usu')) 
        ->get();

        $opciones = DB::table('opcion_multiple_especifica')
        ->get();

        return view('EncuestaEspecifica.show', ['encuesta'=>$encuesta, 'marcas'=>$marcas, 'preguntas'=>$preguntas, 'registro'=>$registro, 'opciones'=>$opciones]);
    }

    public function destroy($id)
    {
        $encuesta = EncuestaEspecifica::findOrFail($id);
        $encuesta->borrado = 1;
        if($encuesta->update()){
        	return redirect()->action('EncuestaEspecificaController@index');
    	}
    }

    public function buscarOpciones($pregunta)
    {
    	$opciones = DB::table('opcion_multiple_especifica')
    	->where('id_pesp', '=', $pregunta)
    	->get();

        $opciones = DB::table('opcion_multiple_especifica')
        ->where('id_pesp', '=', $pregunta)
        ->get();

    	return response()->json($opciones);
    }

    public function eliminar(Request $request)
    {
        $encuesta = EncuestaEspecifica::findOrFail($id);
        $encuesta->borrado = 1;
        if($encuesta->update()){
            return redirect()->action('EncuestaEspecificaController@index');
        }
    }

    public function guardar(Request $request)
    {
        $encuesta = new EncuestaEspecifica;
        $encuesta->nombre = $request->get('nombre');
        $encuesta->fecha_inicio = $request->get('inicio');
        $encuesta->fecha_fin = $request->get('fin');
        $encuesta->sede = $request->get('sede');
        $encuesta->marca = $request->get('marca');
        $encuesta->evento = $request->get('eventos');
        $encuesta->abierto = $request->get('abierto');
        $encuesta->borrado = 0;
        $encuesta->id_usu = Session::get('usu');
        if($encuesta->save()){
            $cuantosR = (int)$request->get('cuantosR');
            $cuantosP = (int)$request->get('cuantosP');
            $cuantosO = (int)$request->get('cuantosO');
            $r = 1;
            $p = 1;
            $o = 1;
            $bandera = 0;
            $texto = "";
            while($r <= $cuantosR){
                if($request->get('dato'.$r) != ""){
                    $registro =  new RegistroEspecifica;
                    $registro->campo = $request->get('dato'.$r);
                    $registro->id_esp = $encuesta->id_esp;
                    $registro->save();
                }
                $r = $r + 1;
            }
            while($p <= $cuantosP){
                if($request->get('pregunta'.$p) != "") {
                    $o = 1;
                    $pregunta = new PreguntasEspecifica;
                    $pregunta->pregunta = $request->get('pregunta'.$p);
                    $pregunta->tipo = $request->get('tip'.$p);
                    $pregunta->id_esp = $encuesta->id_esp;
                    if($pregunta->save()){
                        if($request->get('tip'.$p) == 3 || $request->get('tip'.$p) == 4 || $request->get('tip'.$p) == 6 || $request->get('tip'.$p) == 7){
                            while ($o <= $cuantosO) {
                                if($request->get('opcion'.$p.$o) != ""){
                                    $opcion = new OpcionMultipleEspecifica;
                                    $opcion->respuestas = $request->get('opcion'.$p.$o);
                                    $opcion->id_pesp = $pregunta->id_pesp;
                                    if(!$opcion->save()){
                                        $bandera = 2;
                                    }
                                }
                                $o++;
                            }
                            $o = 0;
                        }
                    }
                    else{
                        $bandera = 1;
                        $texto = "Hubo error al guardar las respuestas";
                        break;
                    }
                }
                $p = $p + 1;
            }
        }
        else{
            $bandera = 3;
            $texto = "Hubo error al guardar las preguntas";
        }

        if($bandera == 0){
            return response()->json([
                'respuesta'=>1 //Exito
            ]);
        }

        else{
            return response()->json([
                'respuesta'=>0 //Error al guardar
            ]);
        }
    }

    public function actualizar(Request $request) 
    {
        $encuesta = EncuestaEspecifica::findOrfail($request->id);
       
        $encuesta->nombre = $request->get('nombre');
        $encuesta->fecha_inicio = $request->get('inicio');
        $encuesta->fecha_fin = $request->get('fin');
        $encuesta->sede = $request->get('sede');
        $encuesta->marca = $request->get('marca');
        $encuesta->evento = $request->get('eventos');
        $encuesta->abierto = $request->get('abierto');
        $encuesta->borrado = 0;
        $encuesta->id_usu = Session::get('usu');
        if($encuesta->update()){
            $cuantosR = (int)$request->get('cuantosR');
            $cuantosP = (int)$request->get('cuantosP');
            $cuantosO = (int)$request->get('cuantosO');
            $r = 1;
            $p = 1;
            $o = 1;
            $bandera = 0;
            $texto = "";
            while($r <= $cuantosR){
                if($request->get('dato'.$r) != ""){
                    $registro =  RegistroEspecifica::findOrfail($request->id);
                    $registro->campo = $request->get('dato'.$r);
                    $registro->id_esp = $encuesta->id_esp;
                    $registro->update();
                }
                $r = $r + 1;
            }
            while($p <= $cuantosP){
                if($request->get('pregunta'.$p) != "") {
                    $o = 1;
                    $pregunta = PreguntasEspecifica($request->id);
                    $pregunta->pregunta = $request->get('pregunta'.$p);
                    $pregunta->tipo = $request->get('tip'.$p);
                    $pregunta->id_esp = $encuesta->id_esp;
                    if($pregunta->update()){
                        if($request->get('tip'.$p) == 3 || $request->get('tip'.$p) == 4 || $request->get('tip'.$p) == 6 || $request->get('tip'.$p) == 7){
                            while ($o <= $cuantosO) {
                                if($request->get('opcion'.$p.$o) != ""){
                                    $opcion = OpcionMultipleEspecifica::findOrfail($request->id);
                                    $opcion->respuestas = $request->get('opcion'.$p.$o);
                                    $opcion->id_pesp = $pregunta->id_pesp;
                                    if(!$opcion->save()){
                                        $bandera = 2;
                                    }
                                }
                                $o++;
                            }
                            $o = 0;
                        }
                    }
                    else{
                        $bandera = 1;
                        $texto = "Hubo error al guardar las respuestas";
                        break;
                    }
                }
                $p = $p + 1;
            }
        }
        else{
            $bandera = 3;
            $texto = "Hubo error al guardar las preguntas";
        }

        if($bandera == 0){
            return response()->json([
                'respuesta'=>1 //Exito
            ]);
        }

        else{
            return response()->json([
                'respuesta'=>0 //Error al guardar
            ]);
        }
       }
}