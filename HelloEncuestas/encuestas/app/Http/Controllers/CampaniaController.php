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

class CampaniaController extends Controller
{
    public function index()
    {
    	return view('Campania.index');
    }

    public function create()
    {
    	$marcas = DB::table('marca')
        ->where('id_usu', '=', Session::get('usu')) 
        ->get();

    	return view('campania.create', ['marcas'=>$marcas]);
    }
}
