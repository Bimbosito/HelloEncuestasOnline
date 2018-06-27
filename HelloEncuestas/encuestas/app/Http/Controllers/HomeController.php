<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  //  public function __construct()
   // {
     //   $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('interfaz', 'Home');
        Session::forget('usu');
        return view('Home.principal');
    }

    public function productos(){
        Session::put('interfaz', 'Productos');
        return view('Home.productos');
    }

    public function paquetes()
    {
        Session::put('interfaz', 'Paquetes');
        return view('Home.paquetes');
    }

    public function tour()
    {
        Session::put('interfaz', 'Tour');
        return view('Home.tour');
    }

    public function restorepage()
    {
        Session::put('interfaz','emails');
        return view('emails.restorepage');
    }
}
