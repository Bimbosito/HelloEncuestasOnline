<?php

namespace App\Http\Controllers;
use App\EncuestaEspecifica;
use App\PreguntasEspecifica;
use App\OpcionMultipleEspecifica;

use Illuminate\Http\Request;

class EncuestaEspecificaController extends Controller
{
    public function index()
    {
    	return view('encuesta.index');
    }

    public function create()
    {
    	return view('encuesta.create');
    }

    public function store(Request $request)
    {
    	$encuesta = new EncuestaEspecifica;
    	$encuesta->nombre = $request->get('nombre');
    	$encuesta->fecha_inicio = $request->get('fechaInicio');
    	$encuesta->fecha_fin = $request->get('fechaFin');
    	$encuesta->sede = $request->get('sede');
    	$encuesta->marca = $request->get('marca');
    	$encuesta->evento = $request->get('evento');
    	$encuesta->abierto = 1;
    	$encuesta->id_usu = Session::get('usu');
    	if($encuesta->save()){
    		$a = 1;
    		$o = 1;
    		$bandera = 0;
    		while ($request->get('pregunta'.$a)!="") {
    			$pregunta = new PreguntasEspecifica;
    			$pregunta->pregunta = $request->get('pregunta'.$a);
    			$pregunta->tipo = $request->get('tipo');
    			$pregunta->id_esp = $encuesta->id_esp;
    			if($pregunta->save()){
    				if($request->get('tipo') == 2){
    					while($request->get('correspondencia'.$o) == $a){
    						$opcion = new OpcionMultipleEspecifica;
    						$opcion->respuestas = $request->get('respuesta'.$o);
    						$opcion->id_pesp = $pregunta->id_pesp;
    						if(!$opcion->save()){
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

    public function edit($id)
    {
    	$encuesta = EncuestaEspecifica::findOrFail($id);
    	$preguntas = DB::table('preguntas_especifica as pe')
    	->where('id_esp', '=', $id)
    	->get();



    	return view('especifica.edit', ['encuesta'=>$encuesta, 'preguntas'=>$preguntas]);
    }

    public function update(Request $request, $id)
    {
    	$encuesta = EncuestaEspecifica::findOrFail($id);
    	$encuesta->nombre = $request->get('nombre');
    	$encuesta->fecha_inicio = $request->get('fechaInicio');
    	$encuesta->fecha_fin = $request->get('fechaFin');
    	$encuesta->sede = $request->get('sede');
    	$encuesta->marca = $request->get('marca');
    	$encuesta->evento = $request->get('evento');
    	$encuesta->abierto = 1;
    	//$encuesta->id_usu = Session::get('usu');
    	if($encuesta->update()){
    		$a = 1;
    		$o = 1;
    		$bandera = 0;
    		while ($request->get('pregunta'.$a)!="") {
    			$pregunta = new PreguntasEspecifica;
    			$pregunta->pregunta = $request->get('pregunta'.$a);
    			$pregunta->tipo = $request->get('tipo');
    			$pregunta->id_esp = $encuesta->id_esp;
    			if($pregunta->save()){
    				if($request->get('tipo') == 2){
    					while($request->get('correspondencia'.$o) == $a){
    						$opcion = new OpcionMultipleEspecifica;
    						$opcion->respuestas = $request->get('respuesta'.$o);
    						$opcion->id_pesp = $pregunta->id_pesp;
    						if(!$opcion->save()){
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

    public function destroy($id)
    {
        $encuesta = EncuestaEspecifica::findOrFail($id);
        $enciesta->abierto = 0;
        if($encuesta->update()){
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

    public function buscarOpciones($pregunta)
    {
    	$opciones = DB::table('opcion_multiple_especifica')
    	->where('id_pesp', '=', $pregunta)
    	->get();

    	return response()->json($opciones);
    }
}
