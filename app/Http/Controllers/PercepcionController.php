<?php

namespace App\Http\Controllers;

use App\Models\nombre_proceso;
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
        $procesos= procesos::get();
        $nombre_proceso = nombre_proceso::get();
        if ($request->ajax()) { 
            $datos = procesos::leftjoin("t_nombre_procesos AS nombre_procesos","t_procesos.nombre_procesos_id","=","nombre_procesos.id")
            ->get(['t_procesos.*','nombre_procesos.nombre_proceso AS nombre_procesos']);
            return DataTables::of($datos)->make(true);
        }
        return view('pages.percepcion_cliente.index', compact('procesos','nombre_proceso'));
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
       $datos = $request -> all();
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
    public function getlistado_procesos()
    {
        try {
            $procesos = procesos::leftjoin("t_nombre_procesos AS nombre_procesos","t_procesos.nombre_procesos_id","=","nombre_procesos.id")
            ->get(['t_procesos.*','nombre_procesos.nombre_proceso AS nombre_procesos']);
            $response = ['data' => $procesos];
        } catch (\Throwable $th) {
        }
        return response()->json($response);
    }
}
