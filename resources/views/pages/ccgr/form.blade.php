@section('contenido')
    <div class="content-header p-0">
        <form action="{{ route('store_ccgr') }}" method="POST" id="form-cumplimientoCompromisos">
            @csrf
            <input type="hidden" name="method" value="" id="metodo-indicadores_dos">
            <div class="card card-blue">
                <div class="card-header">
                    <h3 class="card-title">Cumplimiento Compromisos Gestión Del Riesgo</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <label>Id-Control</label>
                                        <input class="form-control-sm-border" style="width: 100%;" id="id_control"
                                            name="id_control" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <label>Fecha Evaluación</label>
                                        <input class="form-control-sm-border" style="width: 100%;" id="fecha_evaluacion"
                                            name="fecha_evaluacion" type="Date" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-1">
                                    <div class="form-group">
                                        <label>Evidencia Cumplimiento o Avance</label>
                                        <textarea class="form-control-sm" style="width: 100%;" id="evidencia_avance" name="evidencia_avance"
                                            autocomplete="off" required style="height: 4px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <label>Frecuencia De Control</label>
                                        <select class="form-control-sm" style="width: 100%;" id="cc_frecuencia_controles_id"
                                            name="cc_frecuencia_controles_id" required>
                                            <option value="">-Seleccione-</option>
                                            @foreach ($frecuencia_control as $frecuencia_control)
                                                <option value="{{ $frecuencia_control->id }}">
                                                    {{ $frecuencia_control->frecuencia_control }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <label>Fecha Real Evaluación</label>
                                        <input class="form-control-sm-border" style="width: 100%;"
                                            id="fecha_real_evaluacion" name="fecha_real_evaluacion" type="Date" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <label>Fecha Actual</label>
                                        <input class="form-control-sm-border" style="width: 100%;" id="fecha_actual"
                                            name="fecha_actual" type="Date" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <label>% Avance</label>
                                        <select class="form-control-sm" style="width: 100%;" id="porcentaje_avances"
                                            name="porcentaje_avances" required>
                                            <option value="">-Seleccione-</option>
                                            <option value="0">0%</option>
                                            <option value="25">25%</option>
                                            <option value="50">50%</option>
                                            <option value="75">75%</option>
                                            <option value="90">90%</option>
                                            <option value="100">100%</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-lg-8 p-1">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <Select class="form-control-sm col-lg-12" style="width: 100%;"
                                            id="cc_estado_id" name="cc_estado_id" required>
                                            <option value="">-Seleccione-</option>
                                            @foreach ($estados as $estados)
                                                <option value="{{ $estados->id }}">
                                                    {{ $estados->estado }}
                                                </option>
                                            @endforeach
                                        </Select>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-block bg-gradient-warning"
                                            id="btn-limpiar-compromiso">Limpiar</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block bg-gradient-info"
                                            id="btn-guardar-compromiso">Guardar</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block bg-gradient-primary" id="btn-editar-compromiso"
                                            style="display: none">Editar</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-block bg-gradient-danger" id="btn-cancelar-compromiso"
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
                <h3 class="card-title">Visualizador De Estado</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
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
                                            <table id="tabla_cumplimiento_compromisos"
                                                class="table-sm table-striped table-bordered aligned-middle">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th>ID Control</th>
                                                        <th>Fecha Evaluación</th>
                                                        <th>Fecha Actual</th>
                                                        <th>Fecha Real Evaluación</th>
                                                        <th>Frecuencia Control</th>
                                                        <th>Estado</th>
                                                        <th>Porcentaje Avance</th>
                                                        <th>Evidencia Avance</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
