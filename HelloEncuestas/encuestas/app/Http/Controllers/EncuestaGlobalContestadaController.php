<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Sede;
use App\Ciudad;
use App\RegistroGlobal;
use App\RegistroGlobalContestado;
use App\EncuestaGlobal;
use App\EncuestaGlobalContestada;
use App\PreguntasGlobal;
use App\RespuestasGlobal;
use App\OpcionMultipleGlobal;

use Illuminate\Http\Request;

class EncuestaGlobalContestadaController extends Controller
{
    public function index()
    {
        $encuestas = DB::table('encuesta_global as g')
        ->join('marca as m', 'g.marca', '=', 'm.id_mar')
        ->select('g.*', 'm.*', 'g.nombre as encu', 'm.nombre as marca')
        ->where('g.id_usu', '=', Session::get('usu'))
        ->where('borrado', '=', 0)
        ->get();

        return view('EncuestaGlobal.index', ['encuestas'=>$encuestas]);
    }

    public function create()
    {
        $marcas = DB::table('marca')
        ->where('id_usu', '=', Session::get('usu')) 
        ->get();

        return view('EncuestaGlobal.create', ['marcas'=>$marcas]);
    }

    public function store(Request $request)
    {
        $encuesta = new EncuestaGlobal;
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
                    $registro =  new RegistroGlobal;
                    $registro->campo = $request->get('campo'.$r);
                    $registro->id_glo = $encuesta->id_glo;
                    $registro->save();
                }
                $r = $r + 1;
            }
            while($p <= $cuantosP){
                if($request->get('pregunta'.$p) != "") {
                    $pregunta = new PreguntasGlobal;
                    $pregunta->pregunta = $request->get('pregunta'.$p);
                    $pregunta->tipo = $request->get('tip'.$p);
                    $pregunta->id_glo = $encuesta->id_glo;
                    if($pregunta->save()){
                        if($request->get('tip'.$p) == 3 || $request->get('tip'.$p) == 4 || $request->get('tip'.$p) == 6 || $request->get('tipo'.$p) == 7){
                            while ($o <= $cuantosO) {
                                if($request->get('opcion'.$p.$o) != ""){
                                    $opcion = new OpcionMultipleGlobal;
                                    $opcion->respuestas = $request->get('opcion'.$p.$o);
                                    $opcion->id_pglo = $pregunta->id_pglo;
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
        $encuesta = EncuestaGlobal::findOrfail($id);
        $preguntas = DB::table('preguntas_global as pe')
        ->where('id_glo', '=', $id)
        ->get();
        //-------------------------------------------------
        $marca = DB::table('marca')
        ->where('id_usu', '=', Session::get('usu'))
        ->get();
        //------------------------------------------------------------------------
          $enc = DB::table('encuesta_global')
        ->where('id_glo', '=', $id)
        ->first();

//-----------------------------------------------------------------------------------
        $preguntas = DB::table('preguntas_global as preg')
        ->where('id_pglo', '=', $id)
        ->get();

        $registro = DB::table('registro_global')
        ->where('id_glo', '=', $id)
        ->get();

        $opciones = DB::table('opcion_multiple_global')
        ->get();

        
        //------------------------------------------------------
        return view('EncuestaGlobal.edit', ['encuesta'=>$encuesta, 'marca'=>$marca, 'preguntas'=>$preguntas, 'registro'=>$registro, 'opciones'=>$opciones, 'enc'=>$enc,'id'=>$id]);
    }

    public function update(Request $request, $id)
    {
        $encuesta = EncuestaGlobal::find($id);
        $encuesta->nombre = $request->nombre;
        $encuesta->fecha_inicio = $request->fechaInicio;
        $encuesta->fecha_fin = $request->fechaFin;
        $encuesta->sede = $request->sede;
        $encuesta->marca = $request->marca;
        $encuesta->evento = $request->evento;
        $encuesta->abierto = $request->abierto;
        $encuesta->save();

        //$encuesta->id_usu = Session::get('usu');
        if($encuesta->update()){
            $a = 1;
            $o = 1;
            $bandera = 0;
            while ($request->get('pregunta'.$a)!="") {
                $pregunta = new PreguntasGlobal;
                $pregunta->pregunta = $request->get('pregunta'.$a);
                $pregunta->tipo = $request->get('tip');
                $pregunta->id_esp = $encuesta->id_esp;
                if($pregunta->save()){
                    if($request->get('tip') == 2){
                        while($request->get('correspondencia'.$o) == $a){
                            $opcion = new OpcionMultipleGlobal;
                            $opcion->respuestas = $request->get('respuesta'.$o);
                            $opcion->id_pglo = $pregunta->id_pglo;
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

    public function show($id)
    {
        $encuesta = EncuestaGlobal::findOrFail($id);

        $preguntas = DB::table('preguntas_global')
        ->where('id_pglo', '=', $id)
        ->get();

        $registro = DB::table('registro_global')
        ->where('id_glo', '=', $id)
        ->get();

        $marcas = DB::table('marca')
        ->where('id_usu', '=', Session::get('usu')) 
        ->get();

        $opciones = DB::table('opcion_multiple_global')
        ->get();

        return view('EncuestaGlobal.show', ['encuesta'=>$encuesta, 'marcas'=>$marcas, 'preguntas'=>$preguntas, 'registro'=>$registro, 'opciones'=>$opciones]);
    }

    public function destroy($id)
    {
        $encuesta = EncuestaGlobal::findOrFail($id);
        $encuesta->borrado = 1;
        if($encuesta->update()){
            return redirect()->action('EncuestaGlobalController@index');
        }
    }

    public function buscarOpciones($pregunta)
    {
        $opciones = DB::table('opcion_multiple_global')
        ->where('id_pglo', '=', $pregunta)
        ->get();

        return response()->json($opciones);
    }

    public function eliminar(Request $request)
    {
        $encuesta = EncuestaGlobal::findOrFail($id);
        $encuesta->borrado = 1;
        if($encuesta->update()){
            return redirect()->action('EncuestaGlobalController@index');
        }
    }

    public function guardar(Request $request)
    {
        $encuesta = new EncuestaGlobal;
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
                    $registro =  new RegistroGlobal;
                    $registro->campo = $request->get('dato'.$r);
                    $registro->id_glo = $encuesta->id_glo;
                    $registro->save();
                }
                $r = $r + 1;
            }
            while($p <= $cuantosP){
                if($request->get('pregunta'.$p) != "") {
                    $o = 1;
                    $pregunta = new PreguntasGlobal;
                    $pregunta->pregunta = $request->get('pregunta'.$p);
                    $pregunta->tipo = $request->get('tip'.$p);
                    $pregunta->id_glo = $encuesta->id_glo;
                    if($pregunta->save()){
                        if($request->get('tip'.$p) == 3 || $request->get('tip'.$p) == 4 || $request->get('tip'.$p) == 6 || $request->get('tip'.$p) == 7){
                            while ($o <= $cuantosO) {
                                if($request->get('opcion'.$p.$o) != ""){
                                    $opcion = new OpcionMultipleGlobal;
                                    $opcion->respuestas = $request->get('opcion'.$p.$o);
                                    $opcion->id_pglo = $pregunta->id_pglo;
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
        $encuesta = EncuestaGlobal::findOrfail($request->id);
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
                    $registro = RegistroGlobal::findOrfail($reques->id);
                    $registro->campo = $request->get('dato'.$r);
                    $registro->id_glo = $encuesta->id_glo;
                    $registro->update();
                }
                $r = $r + 1;
            }
            
            while ($request->get('pregunta'.$p)!="") {
                $pregunta = PreguntasGlobal::findOrfail($request->id);
                $pregunta->pregunta = $request->get('pregunta'.$a);
                $pregunta->tipo = $request->get('tipo');
                $pregunta->id_glo = $encuesta->id_glo;
                if($pregunta->update()){
                    if($request->get('tipo') == 2){
                        while($request->get('correspondencia'.$o) == $a){
                            $opcion = OpcionMultipleGlobal::findOrfail($request->id);
                            $opcion->respuestas = $request->get('respuesta'.$o);
                            $opcion->id_pglo = $pregunta->id_pglo;
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
}