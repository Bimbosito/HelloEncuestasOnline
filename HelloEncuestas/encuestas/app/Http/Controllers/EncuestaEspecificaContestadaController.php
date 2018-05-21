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
        Session::put('usu', 2);

        $encuestas = DB::table('encuesta_especifica as e')
        ->join('marca as m', 'e.marca', '=', 'm.id_mar')
        ->select('e.*', 'm.*', 'e.nombre as encu', 'm.nombre as marca')
        ->where('e.id_usu', '=', Session::get('usu'))
        ->where('borrado', '=', 0)
        ->get();

    	return view('EncuestaEspecifica.index', ['encuestas'=>$encuestas]);
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
    			switch ($p->tipo){
    				case 1:
    					$respuestas->respuesta = $request->get('pre'.$p->id_pesp)
    					break;

    				case 2:
    					# code...
    					break;

    				case 3
    					# code...
    					break;

    				case 4:
    					# code...
    					break;

    				case 5:
    					# code...
    					break;

    				case 6:
    					# code...
    					break;

    				case 7:
    					# code...
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
}
