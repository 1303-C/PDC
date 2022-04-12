<?php

namespace App\Http\Controllers;

use App\Models\caag;
use App\Models\estados;
use Illuminate\Http\Request;

class CaagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caag = caag::get();
        $estados = estados::get();
        return view('pages.caag.index', compact('caag', 'estados'));
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
        caag::create($datos);
        return redirect('/pages/caag');
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
        caag::findOrFail($id)->update($datos);
        return redirect('/pages/caag');
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

    public function getlistado_actividadesGerencia(Request $request) {

        try {
            $caag = caag::leftjoin("t_estados AS estado","t_caag.ca_estado_id","=","estado.id")->get(['t_caag.*','estado.estado AS estado']);
            $response = ['data' => $caag ];
        } catch (\Throwable $th) {
        }
        return response()->json($response);

    }
}
