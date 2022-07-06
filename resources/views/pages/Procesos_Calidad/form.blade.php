<div class="content-header p-0">
    <form action="{{ route('guardar_proceso') }}" method="POST" id="form-indicadores">
        @csrf
        <input type="hidden" name="method" value="" id="metodo-indicadores">
        <input id="IdAnalisis" name="IdAnalisis" type="hidden" value=" ">
        <div class="card card-blue">
            <div class="card-header">
                <h3 class="card-title">Análisis Indicador</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="row">
                            <div class="form-group col-6 p-1">
                                <label for="inputProjectLeader ">Nombre</label>
                                <select class="form-control-sm " style="width: 100%;" id="indicadores_id"
                                    name="indicadores_id" required autocomplete="off">
                                    <option value="">-Seleccione-</option>
                                    @foreach ($indicadores as $indicador)
                                        <option value="{{ $indicador->id }}">{{ $indicador->nombre_indicador }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6 p-1">
                                <label for="inputProjectLeader">Nombre Lider</label>
                                <select class="form-control-sm" style="width: 100%;" id="usuarios_id" name="usuarios_id"
                                    required autocomplete="off">
                                    <option value="">-Seleccione-</option>
                                    @foreach ($User as $usuarios)
                                        <option value="{{ $usuarios->id }}">{{ $usuarios->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-3 p-1">
                                <label>Inverso</label>
                                <select class="form-control-sm" style="width: 100%;" id="indicador_inverso"
                                    name="indicador_inverso" required>
                                    <option value="">---</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3 p-1">
                                <label>Meta</label>
                                <select class="form-control-sm" style="width: 100%;" id="metas_id" name="metas_id"
                                    required autocomplete="off">
                                    <option value="">---</option>
                                    @foreach ($metas as $metas)
                                        <option value="{{ $metas->id }}">{{ $metas->meta }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-3 p-1">
                                <label>Resultado</label>
                                <div class="input-group-append">
                                    <input class="form-control-sm-border text-center tabla_resultados"
                                        onchange="llamarValueResultado();" style="width: 100%;" id="resultados"
                                        name="resultados" autocomplete="off" required>
                                    {{-- <span class="input-group-text"><i class="fa-solid fa-percent"></i></span> --}}
                                </div>
                            </div>
                            <div class="form-group col-lg-3 p-1">
                                <label>Equivalencia</label>
                                <div class="input-group-append">
                                    <input readonly class="form-control-sm-border text-center inputEquivalencia"
                                        style="width: 100%; background-color: rgba(172, 170, 170, 0.474)"
                                        id="equivalencia" name="equivalencia" required>
                                    {{-- <span class="input-group-text"><i class="fa-solid fa-percent"></i></span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="row">
                            <div class="form-group col-lg-12 p-1">
                                <label>Analisis Indicador</label>
                                <textarea class="form-control-sm" style="width: 99%; height: 117%; " id="analisis_indicador" name="analisis_indicador"
                                    autocomplete="off" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 float-right">
                    <div class="row">
                        <div class="col-lg-3 p-1">
                            <div class="form-group">
                                <button type="submit" class="btn btn-block bg-gradient-primary float-right"
                                    id="btn-editar"
                                    style="display: none; height:30px; width:80px; padding: 0%">Editar</button>
                            </div>
                        </div>
                        <div class="col-lg-3 p-1">
                            <div class="form-group">
                                <button type="button" class="btn btn-block bg-gradient-danger" id="btn-cancelar"
                                    style="display: none; height:30px; width:80px; padding: 0%"
                                    onclick="limpiar()">Borrar</button>
                            </div>
                        </div>
                        <div class="col-lg-3 p-1  clearfix" style="text-align: center;">
                            <div class="form-group">
                                <button type="reset" class="btn btn-block bg-gradient-warning " id="btn-limpiar"
                                    style="height:30px; width:80px; padding: 0%">Limpiar</button>
                            </div>
                        </div>
                        <div class="col-lg-3 p-1">
                            <div class="form-group">
                                <button type="submit" class="btn btn-block bg-gradient-info float-right"
                                    id="btn-guardar" style="height:30px; width:80px; padding: 0%">Guardar</button>
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
            <h3 class="card-title">Visualizador Indicador</h3>
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
                                                    <th>Nombre Lider</th>
                                                    <th>Nombre Indicador</th>
                                                    <th>Nombre Proceso</th>
                                                    <th>Analisis Indicador</th>
                                                    <th>Indicador Inverso</th>
                                                    <th>Resultado</th>
                                                    <th>Metas</th>
                                                    <th>Equivalencia</th>
                                                    <th>Fecha Creacion</th>
                                                    <th>Acciónes1</th>
                                                    <th>Acciónes2</th>
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
                            <input type="text" name="filtro_busqueda" id="filtro_busqueda"
                                class="form-control mx-1" placeholder="Buscar.." data-index="1">
                        </div>

                        <div class="col-lg-2">
                            <label>Desempeño</label>
                            <input type="text" name="desempeño" value="{{ $desempeño ?? '' }}"
                                class="form-control">
                        </div>

                        <div class="col-lg-2">
                            <label for="filtro_busqueda_fecha">Bucar Fecha</label>
                            <input type="text" name="filtro_busqueda_fecha" id="filtro_busqueda_fecha"
                                class="form-control mx-1" placeholder="Buscar.." data-index="8">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
