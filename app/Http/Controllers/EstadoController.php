<?php

namespace App\Http\Controllers;

use App\Models\estado_acciones;
use App\Models\estados;
use App\Models\tipo_acciones;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estado_acciones = estado_acciones::get();
        $tipo_acciones = tipo_acciones::get();
        $estados = estados::get();
        return view('pages.estado_acciones.index', compact('estado_acciones', 'tipo_acciones', 'estados'));
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
        estado_acciones::create($datos);
        return redirect('/pages/estado_acciones');
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
        estado_acciones::findOrFail($id)->update($datos);
        return redirect('/pages/estado_acciones');
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

    public function getlistado_estado(Request $request)
    {

        try {
            $estado_acciones = estado_acciones::leftjoin("t_tipo_acciones AS tipo_acciones", "t_estado_acciones.tipo_acciones_id", "=", "tipo_acciones.id")->leftjoin("t_estados AS estados","t_estado_acciones.estado_id","=","estados.id")->get(['t_estado_acciones.*', 'tipo_acciones.tipo_accion AS tipo_acciones','estados.estado AS estados']);
            $response = ['data' => $estado_acciones];
        } catch (\Throwable $th) {
        }
        return response()->json($response);
    }
}
