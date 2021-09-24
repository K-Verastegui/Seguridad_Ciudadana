<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Incidencia;
use App\Bitacora;
use App\User;
use Exception;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=DB::table('users as u')
        ->join('role_user as r', 'u.id','=','r.user_id')
        ->select('u.name', 'u.id')
        ->where('r.role_id', '!=', 2)
        ->get();

        $incidencias = Incidencia::all();
        foreach($incidencias as $incidencia)
        {
            $incidencia->user;
        }
        return view('incidencias.index',compact('incidencias','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($incidencia_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $incidencia = Incidencia::find($id);
            $incidencia->seguido = $request->eseguido;
            $incidencia->update();

            $bitacora = new Bitacora();
            $bitacora->user = auth()->user()->name;
            $bitacora->equipo = gethostname();
            $bitacora->descripcion = 'Asignar encargado';
            $bitacora->tabla = 'incidencias';
            $bitacora->save();

            $incidencia->users()->sync($request->get('user_id'));

            DB::commit();
            return redirect()->route('incidencias.index')->with('status_success','Asignado correctamente!');
        
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('incidencias.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
