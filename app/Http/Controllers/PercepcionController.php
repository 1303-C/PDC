<?php

namespace App\Http\Controllers;

use App\Models\areas;
use App\Models\procesos;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PercepcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $procesos = procesos::get();
        $areas = areas::get();
        return view('pages.percepcion_cliente.index', compact('procesos', 'areas'));
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
        $datos = $request->all();
        $calificacionTotal  = procesos::avg('calificacion');
        $datos['calificacion_total']=$calificacionTotal;
        $desempeño = $calificacionTotal/5*100;
        $datos['desempeño'] = $desempeño;
        procesos::create($datos);
        return redirect('/pages/percepcion_cliente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $datos = $request->all();
        procesos::findOrFail($id)->update($datos);
        return redirect('/pages/percepcion_cliente');
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

    public function getlistado_proceso ()
    {
        {
            try {
                $procesos = procesos::leftjoin("t_areas AS nombre_areas","t_procesos.p_areas_id","=","nombre_areas.id")
                ->get(['t_procesos.*','nombre_areas.nombre_areas AS nombre_areas']);
                $response = ['data' => $procesos];
            } catch (\Throwable $th) {
            }
            return response()->json($response);
        }
    }
}
