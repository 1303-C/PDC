<?php

namespace App\Http\Controllers;

use App\Models\ccgr;
use App\Models\estados;
use App\Models\frecuencia_control;
use Illuminate\Http\Request;

class CcgrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ccgr = ccgr::get();
        $estados = estados::get();
        $frecuencia_control = frecuencia_control::get();
        return view('pages.ccgr.index', compact('ccgr', 'estados', 'frecuencia_control'));
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
        ccgr::create($datos);
        return redirect('/pages/ccgr');
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
        ccgr::findOrFail($id)->update($datos);
        return redirect('/pages/ccgr');
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

    public function  getlistado_cumplimientoCompromisos (Request $request){

        try {
            $ccgr = ccgr::leftjoin("t_estados AS estado","t_ccgr.cc_estado_id","=","estado.id")->leftjoin("t_frecuencia_controles AS frecuencia_controles", "t_ccgr.cc_frecuencia_controles_id","=","frecuencia_controles.id")->get(['t_ccgr.*','estado.estado AS estado','frecuencia_controles.frecuencia_control AS frecuencia_controles']);
            $response = ['data' => $ccgr ];
        } catch (\Throwable $th) { 
        }
        return response()->json($response);
    }
}
