<?php

namespace App\Http\Controllers;

use App\Models\analisis_indicadores;
use App\Models\areas;
use App\Models\estados;
use App\Models\frecuencia_control;
use App\Models\indicadores;
use App\Models\nombre_proceso;
use DateTime;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $analisis_indicadores = analisis_indicadores::get();
        $areas = areas::get();
        $estados = estados::get();
        $indicadores = indicadores::get();
        $frecuencia_control = frecuencia_control::get();
        $nombre_proceso = nombre_proceso::get();
        if ($request->ajax()) {
            $datos = analisis_indicadores::leftjoin("t_indicadores AS indicadores_ide", "t_analisis_indicadores.indicadores_id", "=", "indicadores_ide.id")
                ->get(['t_analisis_indicadores.*", "nombre_indicador AS INDICADOR ']);
            return DataTables::of($datos)->make(true);
        }
        return view('pages.Procesos_Calidad.index', compact('analisis_indicadores', 'areas', 'estados', 'indicadores', 'frecuencia_control', 'nombre_proceso'));
    }

    /* public function getIndicadores(){
        try {
          
        } catch (\Throwable $th) {
            return response()->json(['message'=>'Error al traer la informacion de los indicadores'],500);
        }
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar_indicador(Request $request)
    {
        $datos = $request->all();
        indicadores::create($datos);
        return redirect('pages/Procesos_Calidad');
    }
    public function guardar_proceso(Request $request)
    {
        $datos = $request->all();
        $equivalencia = analisis_indicadores::avg('equivalencia');
        $datos['desempeño'] = $equivalencia;
        analisis_indicadores::create($datos);
        return redirect('pages/Procesos_Calidad');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        $datos = $request->all();
        analisis_indicadores::findOrFail($id)->update($datos);
        return redirect('pages/Procesos_Calidad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        //
    }

    public function getlistado_indicadores()
    {
        try {
            $analisis_indicadores = analisis_indicadores::leftjoin("t_indicadores AS indicadores", "t_analisis_indicadores.indicadores_id", "=", "indicadores.id")
                ->get(['t_analisis_indicadores.*', 'indicadores.nombre_indicador AS nombre_indicador']);
            $response = ['data' => $analisis_indicadores];
        } catch (\Throwable $th) {
        }
        return response()->json($response);
    }
    
}
