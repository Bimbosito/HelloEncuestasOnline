<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class PaqueteController extends Controller
{
    public function index()
    {
    	Session::forget('interfaz');

    	if(Session::has('admin')){
    		Session::put('interfaz', 'Paquetes');
    		return view('Paquetes.index');
    	}
    	else{
    		Session::put('interfaz', 'Paquetes Administrador');
    		return view('Home.paquetes');
    	}
    }

	public function create()
	{
		# code...
	}

	public function store(Request $request)
	{
		# code...
	}

	public function edit($id)
	{
		# code...
	}

	public function update(Request $request)
	{
		# code...
	}

    public function show($id)
    {
    	# code...
    }

    public function destroy($id)
    {
    	# code...
    }
}
