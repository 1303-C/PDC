@section('contenido')
    <div class="content-header p-0">
        <form action="{{ route('store_caag') }}" method="POST" id="form-actividadesGerencia">
            @csrf
            <input type="hidden" name="method" value="" id="metodo-indicadores_dos">
            <div class="card card-blue">
                <div class="card-header">
                    <h3 class="card-title">Cumplimiento Actividades Asignadas Por Gerencia</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="row">
                                <div class="col-lg-12 p-1">
                                    <div class="form-group">
                                        <label>Actividades</label>
                                        <input class="form-control-sm-border" style="width: 100%;" id="Actividades"
                                            name="Actividades" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-12 p-1">
                                    <div class="form-group">
                                        <label>Analisis Indicador</label>
                                        <textarea class="form-control-sm" style="width: 100%;" id="analisis_indicador" name="analisis_indicador"
                                            autocomplete="off" required style="height: 4px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <label>Fecha Programada</label>
                                        <input class="form-control-sm-border" style="width: 100%;" id="fecha_programada"
                                            name="fecha_programada" type="Date" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <label>Porcentaje</label>
                                        <select class="form-control-sm" style="width: 100%;" id="porcentaje"
                                            name="porcentaje" required>
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
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <label>Estado Actividad</label>
                                        <Select class="form-control-sm col-lg-12" style="width: 100%;" id="ca_estado_id"
                                            name="ca_estado_id" required>
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
                                        <label>Fecha Cierre</label>
                                        <input class="form-control-sm-border" style="width: 100%;" id="fecha_cierre"
                                            name="fecha_cierre" type="Date" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="row">
                                <div class="col-lg-12 p-1">
                                    <div class="form-group">
                                        <label>Fecha Reprogramada</label>
                                        <input class="form-control-sm-boder" style="width: 100%;" id="fecha_reprogramada"
                                            name="fecha_reprogramada" type="Date" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="row">
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-block bg-gradient-warning"
                                            id="btn-limpiar">Limpiar</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block bg-gradient-info"
                                            id="btn-guardar-gerencia">Guardar</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block bg-gradient-primary"
                                            id="btn-editar-gerencia" style="display: none">Editar</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-block bg-gradient-danger"
                                            id="btn-cancelar-gerencia" style="display: none"
                                            onclick="limpiar()">Cancelar</button>
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
                <h3 class="card-title">Visualisador De Actividades Asignadas Por Gerencia</h3>
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
                                            <table id="tabla_actividades_gerencia"
                                                class="table-sm table-striped table-bordered aligned-middle">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th>Actividades</th>
                                                        <th>Fecha Programada</th>
                                                        <th>Fecha Cierre</th>
                                                        <th>Porcentaje</th>
                                                        <th>fecha_reprogramada</th>
                                                        <th>Analisis Indicador</th>
                                                        <th>Estado</th>
                                                        <th>Accion</th>
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
