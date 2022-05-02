@section('contenido')
    <div class="content-header p-0 ">
        <form action="{{ route('guardar_indicador') }}" method="POST">
            @csrf
            <input type="hidden" name="method" value="" id="metodo-indicadores_dos">
            <div class="card card-blue">
                <div class="card-header">
                    <h3 class="card-title">Crear Indicador</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 p-1">
                            <div class="form-group">
                                <label>Nombre Indicador</label>
                                <input class="form-control-sm-border" style="width: 100%;" id="nombre_indicador"
                                    name="nombre_indicador" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4 p-1">
                            <div class="form-group">
                                <label>Nombre Proceso</label>
                                <select class="form-control-sm" style="width: 100%;" id="areas_id" name="areas_id" required>
                                    <option value="">-Seleccione-</option>
                                    @foreach ($areas as $areas)
                                        <option value="{{ $areas->id }}">
                                            {{ $areas->nombre_areas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 p-1">
                            <div class="form-group">
                                <label>Frecuencia Control</label>
                                <select class="form-control-sm" style="width: 100%;" id="frecuencia_control_id"
                                    name="frecuencia_control_id" required>
                                    <option value="">-Seleccione-</option>
                                    @foreach ($frecuencia_control as $frecuencia_control)
                                        <option value="{{ $frecuencia_control->id }}">
                                            {{ $frecuencia_control->frecuencia_control }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-lg-2">
                            <div class="form-group ">
                                <label>Meta</label>
                                <input class="form-control tabla_metas" style="width: 100%;" id="meta" name="meta"
                                    autocomplete="off" required>
                            </div>
                        </div> --}}
                        <div class="col-lg-2 p-1">
                            <div class="form-group mx-auto" >
                                <button type="submit" class="btn btn-block bg-gradient-info">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="content-header p-0">
        <form action="{{ route('guardar_proceso') }}" method="POST" id="form-indicadores">
            @csrf
            <input type="hidden" name="method" value="" id="metodo-indicadores">
            <div class="card card-blue">
                <div class="card-header">
                    <h3 class="card-title">Analisis Indicador</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group p-1">
                                <label for="inputProjectLeader">Nombre Indicador</label>
                                <select class="form-control-sm" style="width: 100%;" id="indicadores_id"
                                    name="indicadores_id" required autocomplete="off">
                                    <option value="">-Seleccione-</option>
                                    @foreach ($indicadores as $indicador)
                                        <option value="{{ $indicador->id }}">{{ $indicador->nombre_indicador }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group p-1">
                                <label>Analisis Indicador</label>
                                <textarea class="form-control-sm" style="width: 100%;" id="analisis_indicador" name="analisis_indicador"
                                    autocomplete="off" required style="height: 4px;"></textarea>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <div class="form-group col-lg-3 p-1">
                                    <label>Meta</label>
                                    <div class="input-group-append">
                                        <input class="form-control-sm-border text-center tabla_metas" style="width: 100%;"
                                            id="meta" name="meta" autocomplete="off" required
                                            onchange="resultadoEquivalente();">
                                        <span class="input-group-text"><i class="fa-solid fa-percent"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-lg-3 p-1">
                                    <label>Resultado</label>
                                    <div class="input-group-append">
                                        <input class="form-control-sm-border text-center tabla_resultados"
                                            onchange="llamarValueResultado();" style="width: 100%;" id="resultados"
                                            name="resultados" autocomplete="off" required>
                                        <span class="input-group-text"><i class="fa-solid fa-percent"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-lg-3 p-1">
                                    <label>Equivalencia</label>
                                    <div class="input-group-append">
                                        <input readonly class="form-control-sm-border text-center inputEquivalencia"
                                            style="width: 100%;" id="equivalencia" name="equivalencia" required>
                                        <span class="input-group-text"><i class="fa-solid fa-percent"></i></span>
                                    </div>
                                </div>
                                <div class="form-group-sm col-lg-4 p-1">
                                    <label>Indicador Inverso</label>
                                    <select class="form-control-sm" style="width: 100%;" id="indicador_inverso"
                                        name="indicador_inverso" required>
                                        <option value="">-Selecione-</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="row">
                                <div class="col-lg-5 p-1">
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-block bg-gradient-warning"
                                            id="btn-limpiar">Limpiar</button>
                                    </div>
                                </div>
                                <div class="col-lg-5 p-1">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block bg-gradient-info"
                                            id="btn-guardar">Guardar</button>
                                    </div>
                                </div>
                                <div class="col-lg-5 p-1">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block bg-gradient-primary" id="btn-editar"
                                            style="display: none">Editar</button>
                                    </div>
                                </div>
                                <div class="col-lg-5 p-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-block bg-gradient-danger" id="btn-cancelar"
                                            style="display: none" onclick="limpiar()">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="content-header p-0">
        <div class="card card-blue">
            <div class="card-header">
                <h3 class="card-title">Visualisador Indicador</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="main-content">
                    <div class="col-xs-12 widget-container-col ui-sortable" id="widget-container-col-7">
                        <div class="widget-body">
                            <div class="widget-main padding-6">
                                <div class="tab-content">
                                    <div id="home" class="tab-pane active">
                                        <div class="row">
                                            <div class="widget-box widget-color-dark" id="widget-box-3">
                                            </div>
                                        </div>
                                        <div class="row-10">
                                            <table id="tabla_indicador"
                                                class="table-sm table-striped table-bordered aligned-middle">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th>Nombre Indicador</th>
                                                        <th>Nombre Proceso</th>
                                                        <th>Analisis Indicador</th>
                                                        <th>Indicador Inverso</th>
                                                        <th>Resultado</th>
                                                        <th>Meta</th>
                                                        <th>Equivalencia</th>
                                                        <th>Fecha Creacion</th>
                                                        <th> Accion</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="filtro_busqueda">Bucar proceso</label>
                                <input type="text" name="filtro_busqueda" id="filtro_busqueda" class="form-control mx-1"
                                    placeholder="Buscar.." data-index="1">
                            </div>
                            <div class="form-group col-lg-2">
                                <label>Desempeño</label>
                                <select readonly class="form-control " style="width: 100%;" id="desempeño" name="desempeño"
                                    required>
                                    @foreach ($analisis_indicadores as $analisis_indicadores)
                                        <option value="{{ $analisis_indicadores->id }}">
                                            {{ $analisis_indicadores->desempeño }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
