<?php

namespace App\Http\Controllers;

use App\Incidencia;
use App\Incidente;
use App\Persona;
use Illuminate\Http\Request;
use Exception;
use App\Bitacora;
use App\Reporte;
use App\User;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $incidencias=db::select('select i.id, i.created_at, i.dni, i.categoria
                                    from incidencias i
                                    inner join reportes r
                                    on i.id = r.incidencia_id ');
        // $incidencias = Incidencia::all();
        return view('reporte.index', compact('incidencias','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            $bitacora = new Bitacora();
            $bitacora->user = auth()->user()->name;
            $bitacora->equipo = gethostname();
            $bitacora->descripcion = 'Emitir reporte';
            $bitacora->tabla = 'reportes';
            $bitacora->save();

            $reporte = new Reporte();
            $reporte->description = $request->description;
            $reporte->aprhendido = $request->aprhendido;
            $reporte->objetos = $request->objetos;
            $reporte->incidencia_id = $request->incidencia_id;
            $reporte->save();

            $incidencia = Incidencia::find($request->incidencia_id);
            $incidencia->seguido = $request->seguido;
            $incidencia->estado = 'disabled';
            $incidencia->update();

            DB::commit();
            return redirect()->route('incidentes.index')->with('status_success','Reporte saved saccessfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('incidentes.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($incidencia_id)
    {
        $reportes = Reporte::where('incidencia_id',$incidencia_id)->get();

        $longitud = Incidencia::where('id',$incidencia_id)->value('longitud');
        $latitud = Incidencia::where('id',$incidencia_id)->value('latitud');
        $estado = Incidencia::where('id',$incidencia_id)->value('seguido');
        $dni = Incidencia::where('id',$incidencia_id)->value('dni');
        $nombre = Persona::where('dni',$dni)->value('nombre');

        $incidencias = Incidencia::where('id',$incidencia_id)->get();
        foreach($incidencias as $incidencia)
        {
            $incidencia->user;
        }
        //return $procesos;
        return view('reporte.view',compact('reportes',
        'incidencias','incidencia_id','longitud','latitud'
        ,'nombre','estado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($incidencia_id)
    {
        $reportes = Reporte::where('incidencia_id',$incidencia_id)->get();
        //return $procesos;
        return view('reporte.edit',compact('reportes','incidencia_id'));
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
        try{
            DB::beginTransaction();

            $bitacora = new Bitacora();
            $bitacora->user = auth()->user()->name;
            $bitacora->equipo = gethostname();
            $bitacora->descripcion = 'Actualizar reporte';
            $bitacora->tabla = 'reportes';
            $bitacora->save();

            $reporte =   Reporte::find($id);
            $reporte->description = $request->description;
            $reporte->objetos = $request->objetos;
            $reporte->aprhendido = $request->aprhendido;
            $reporte->update();

            $incidencia = Incidencia::find($request->incidencia_id);
            $incidencia->seguido = $request->seguido;
            $incidencia->update();

            DB::commit();
            return redirect()->route('reporte.index')->with('status_success','Reporte updated saccessfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('reporte.index');
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
