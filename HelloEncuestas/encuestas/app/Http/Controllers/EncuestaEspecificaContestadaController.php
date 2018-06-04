<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Sede;
use App\Ciudad;
use App\RegistroEspecifica;
use App\RegistroEspecificaContestado;
use App\EncuestaEspecifica;
use App\EncuestaEspecificaContestada;
use App\PreguntasEspecifica;
use App\RespuestasEspecifica;
use App\OpcionMultipleEspecifica;

use Illuminate\Http\Request;

class EncuestaEspecificaContestadaController extends Controller
{
	public function index()
    {
        $encuestas = DB::table('encuesta_especifica as e')
        ->join('encuesta_especifica_contestada as ec', 'e.id_esp', '=', 'ec.id_esp')
        ->join('marca as m', 'e.marca', '=', 'm.id_mar')
        ->select(DB::raw('e.*, m.*, e.nombre as encu,  count(ec.id_esp) as cuantos'))
        ->where('e.id_usu', '=', Session::get('usu'))
        ->where('borrado', '=', 0)
        ->groupBy('ec.id_esp')
        ->get();

    	return view('EncuestaEspecificaContestada.index', ['encuestas'=>$encuestas]);
    }

    public function edit($id)
    {
        $resultados = DB::table('encuesta_especifica as e')
        ->join('encuesta_especifica_contestada as ec', 'e.id_esp', '=', 'ec.id_esp')
    	->join('respuestas_especifica as re', 'ec.id_econ', '=', 're.id_econ')
    	->join('preguntas_especifica as pe', 're.id_pesp', '=', 'pe.id_pesp')
    	->select('e.nombre', 'pe.id_pesp','pregunta', 'respuesta')
    	->where('e.id_esp', '=', $id)
    	->get();

    	$preguntas = DB::table('preguntas_especifica')
    	->where('id_esp', '=', $id)
    	->get();

    	$respuestas = DB::table('opcion_multiple_especifica')
    	->get();

    	$registros = DB::table('encuesta_especifica_contestada as ec')
    	->join('registro_especifica_contestado as reg', 'ec.id_econ', '=', 'reg.id_econ')
    	->join('registro_especifica as re', 'reg.id_regesp', '=', 're.id_regesp')
    	->where('ec.id_econ', '=', $id)
    	->get();

    	return view('EncuestaEspecificaContestada.resultados', ['resultados'=>$resultados, 'registros'=>$registros, 'preguntas'=>$preguntas, 'respuestas'=>$respuestas]);
    }

    public function store(Request $request)
    {
    	$contestada = new EncuestaEspecificaContestada;
    	$contestada->id_esp = $request->get('numEncuesta');
    	if($contestada->save()){
    		$registros = DB::table('registro_especifica')
    		->where('id_esp', '=', $request->get('numEncuesta'))
    		->get();

    		foreach($registros as $r) {
    			$formulario = new RegistroEspecificaContestado;
    			$formulario->texto = $request->get('r_'.$r->id_regesp);
    			$formulario->id_regesp = $request->get('n_'.$r->id_regesp);
    			$formulario->id_econ = $contestada->id_econ;
    			$formulario->save();
    		}

    		$preguntas = DB::table('preguntas_especificas')
    		->where('id_esp', '=', $request->get('numEncuesta'))
    		->get();

    		foreach ($preguntas as $p) {
    			$respuestas = new RespuestasEspecifica;
    			$cadena = "";
    			switch ($p->tipo){
    				case 1:
    					$respuestas->respuesta = $request->get('pre'.$p->id_pesp);
    					$respuestas->id_pesp = $p->id_pesp;
    					$respuestas->id_econ = $contestada->id_econ;
    					$respuestas->save();
    					
    					break;

    				case 2:
    					$respuestas->respuesta = $request->get('pre'.$p->id_pesp);
    					$respuestas->id_pesp = $p->id_pesp;
    					$respuestas->id_econ = $contestada->id_econ;
    					$respuestas->save();

    					break;

    				case 3:
    					$opciones = DB::table('opcion_multiple_especifica')
    					->where('id_pesp', '=', $p->id_pesp)
    					->get();

    					foreach($opciones as $o){
    						if($request->has('opc'.$o->id_res)){
    							$cadena.=$request->get('opc'.$o->id_res).';';
    						}
    					}

    					$respuestas->respuesta = substr($cadena, 0, -1);
    					$respuestas->id_pesp = $p->id_pesp;
    					$respuestas->id_econ = $contestada->id_econ;
    					$respuestas->save();

    					break;

    				case 4:
    					$respuestas->respuesta = $request->get('opc'.$p->id_pesp);
    					$respuestas->id_pesp = $p->id_pesp;
    					$respuestas->id_econ = $contestada->id_econ;
    					$respuestas->save();

    					break;

    				case 5:
    					$respuestas->respuesta = $request->get('pre'.$p->id_pesp);
    					$respuestas->id_pesp = $p->id_pesp;
    					$respuestas->id_econ = $contestada->id_econ;
    					$respuestas->save();

    					break;

    				case 6:
    					$opciones = DB::table('opcion_multiple_especifica')
    					->where('id_pesp', '=', $p->id_pesp)
    					->get();

    					foreach($opciones as $o){
    						if($request->has('opc'.$o->id_res)){
    							$cadena.=$request->get('opc'.$o->id_res).';';
    						}
    					}

    					$respuestas->respuesta = $cadena.$request->get('pre'.$p->id_pesp);
    					$respuestas->id_pesp = $p->id_pesp;
    					$respuestas->id_econ = $contestada->id_econ;
    					$respuestas->save();
    					break;

    				case 7:
    					$respuestas->respuesta = $request->get('opc'.$p->id_pesp).$request->get('pre'.$p->id_pesp);
    					$respuestas->id_pesp = $p->id_pesp;
    					$respuestas->id_econ = $contestada->id_econ;
    					$respuestas->save();

    					break;
    				
    				default:
    					# code...
    					break;
    			}
    		}
    	}
    	else{

    	}
    }

	public function show($id)
    {
        $encuesta = EncuestaEspecifica::findOrFail($id);

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

        return view('EncuestaEspecificaContestada.contestar', ['encuesta'=>$encuesta, 'marcas'=>$marcas, 'preguntas'=>$preguntas, 'registro'=>$registro, 'opciones'=>$opciones]);
    }

    public function graficas(Request $request)
    {
    	$resultados = DB::table('encuesta_especifica_contestada as ec')
    	->join('respuestas_especifica as re', 'ec.id_econ', '=', 're.id_econ')
    	->join('preguntas_especifica as pe', 're.id_pesp', '=', 'pe.id_pesp')
    	->select('ec.id_econ', 'pregunta', 'respuesta')
    	->where('ec.id_econ', '=', $request->get('id'))
    	->get();

    	$registos = DB::table('encuesta_especifica_contestada as ec')
    	->join('registro_especifica as reg', 'ec.id_econ', '=', 'reg.id_econ')
    	->where('ec.id_econ', '=', $request->get('id'))
    	->get();

    	$encuesta = DB::table('encuesta_especifica_contestada as ec')
    	->join('encuesta_especifica as e', 'ec.id_esp', 'e.id_esp')
    	->where('id_econ', '=', $request->get('id'))
    	->get();

    	return view('EncuestaEspecificaContestada.graficas', ['resultados'=>$resultados, 'registros'=>$registros, 'encuesta'=>$encuesta]);

    }

    public function guardar(Request $request)
    {
    	$contestada = new EncuestaEspecificaContestada;
    	$contestada->id_esp = $request->get('numEncuesta');
    	if($contestada->save()){
    		$registros = DB::table('registro_especifica')
    		->where('id_esp', '=', $request->get('numEncuesta'))
    		->get();

    		foreach($registros as $r) {
    			$formulario = new RegistroEspecificaContestado;
    			$formulario->texto = $request->get('r_'.$r->id_regesp);
    			$formulario->id_regesp = $request->get('n_'.$r->id_regesp);
    			$formulario->id_econ = $contestada->id_econ;
    			$formulario->save();
    		}

    		$preguntas = DB::table('preguntas_especifica')
    		->where('id_esp', '=', $request->get('numEncuesta'))
    		->get();

    		foreach ($preguntas as $p) {
    			$respuestas = new RespuestasEspecifica;
    			$cadena = "";
    			switch ($p->tipo){
    				case 1:
    					$respuestas->respuesta = $request->get('pre'.$p->id_pesp);
    					$respuestas->id_pesp = $p->id_pesp;
    					$respuestas->id_econ = $contestada->id_econ;
    					$respuestas->save();
    					
    					break;

    				case 2:
    					$respuestas->respuesta = $request->get('pre'.$p->id_pesp);
    					$respuestas->id_pesp = $p->id_pesp;
    					$respuestas->id_econ = $contestada->id_econ;
    					$respuestas->save();

    					break;

    				case 3:
    					$opciones = DB::table('opcion_multiple_especifica')
    					->where('id_pesp', '=', $p->id_pesp)
    					->get();

    					foreach($opciones as $o){
    						if($request->has('opc'.$o->id_res)){
    							$cadena.=$request->get('opc'.$o->id_res).';';
    						}
    					}

    					$respuestas->respuesta = substr($cadena, 0, -1);
    					$respuestas->id_pesp = $p->id_pesp;
    					$respuestas->id_econ = $contestada->id_econ;
    					$respuestas->save();

    					break;

    				case 4:
    					$respuestas->respuesta = $request->get('opc'.$p->id_pesp);
    					$respuestas->id_pesp = $p->id_pesp;
    					$respuestas->id_econ = $contestada->id_econ;
    					$respuestas->save();

    					break;

    				case 5:
    					$respuestas->respuesta = $request->get('pre'.$p->id_pesp);
    					$respuestas->id_pesp = $p->id_pesp;
    					$respuestas->id_econ = $contestada->id_econ;
    					$respuestas->save();

    					break;

    				case 6:
    					$opciones = DB::table('opcion_multiple_especifica')
    					->where('id_pesp', '=', $p->id_pesp)
    					->get();

    					foreach($opciones as $o){
    						if($request->has('opc'.$o->id_res)){
    							$cadena.=$request->get('opc'.$o->id_res).';';
    						}
    					}

    					$respuestas->respuesta = $cadena.$request->get('pre'.$p->id_pesp);
    					$respuestas->id_pesp = $p->id_pesp;
    					$respuestas->id_econ = $contestada->id_econ;
    					$respuestas->save();
    					break;

    				case 7:
    					$respuestas->respuesta = $request->get('opc'.$p->id_pesp).$request->get('pre'.$p->id_pesp);
    					$respuestas->id_pesp = $p->id_pesp;
    					$respuestas->id_econ = $contestada->id_econ;
    					$respuestas->save();

    					break;
    				
    				default:
    					# code...
    					break;
    			}
    		}
    	}
    	else{

    	}
    }
}
