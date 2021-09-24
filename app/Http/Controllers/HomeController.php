<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Noty;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $robos = DB::table('incidencias')
                    ->where('categoria', 'Robo al paso')
                    ->count();    

        $violaciones = DB::table('incidencias')
                    ->where('categoria', 'Violaciones')
                    ->count();   

        $traficos = DB::table('incidencias')
                    ->where('categoria', 'Trafico de drogas')
                    ->count();  

        $asesinatos = DB::table('incidencias')
                    ->where('categoria', 'Asesinatos')
                    ->count();  

        $pandillajes = DB::table('incidencias')
                    ->where('categoria', 'Pandillaje')
                    ->count(); 

        $otros = DB::table('incidencias')
                    ->where('categoria', 'Otro tipo')
                    ->count(); 

        $frustado = DB::table('incidencias')
                    ->where('seguido', 'Frustado')
                    ->count(); 

        $fallido = DB::table('incidencias')
                    ->where('seguido', 'Fallido')
                    ->count(); 

        $notys = Noty::latest()
        ->orderBy('id', 'desc')
        ->take(3)
        ->get();

        return view('home',compact('robos','violaciones','traficos','asesinatos','pandillajes','otros','frustado','fallido','notys'));
    }
}
