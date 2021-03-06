@section('contenido')
    <div class="content-header p-0">
        <form action="{{ route('store_percepcion_cliente') }}" method="POST" id="form-procesos">
            @csrf
            <div class="card card-blue">
                <div class="card-header">
                    <h3 class="card-title">Percepción Cliente Interno</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 p-1">
                            <div class="form-group">
                                <label>Proceso</label>
                                <select class="form-control-sm col-lg-12" style="width: 100%;" id="p_areas_id"
                                    name="p_areas_id" required>
                                    <option value="">-Seleccione-</option>
                                    @foreach ($areas as $areas)
                                        <option value="{{ $areas->id }}">
                                            {{ $areas->nombre_areas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Razón Calificación</label>
                                <textarea class="form-control-sm" style="width: 100%;" id="razon_calificacion" name="razon_calificacion"
                                    autocomplete="off" required style="height: 4px;"></textarea>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <div class="form-group col-lg-4 p-1">
                                    <label>Efectividad</label>
                                    <select class="form-control-sm tabla_efectividad text-center"
                                        onchange="llamarValueEfectividad();" style="width: 100%;" id="efectividad"
                                        name="efectividad" autocomplete="off" name="indicador_inverso" required>
                                        <option value="">-Selecione-</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>

                                </div>
                                <div class="form-group col-lg-4 p-1">
                                    <label>oportunidad</label>
                                    <select class="form-control-sm tabla_oportunidad text-center"
                                        onchange="resultadoCalificacion();" style="width: 100%;" id="oportunidad"
                                        name="oportunidad" autocomplete="off" required>
                                        <option value="">-Selecione-</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4 p-1">
                                    <label>Calificacion</label>
                                    <input readonly class="form-control-sm-border inputCalificacion text-center"
                                        style="width: 100%; background-color: rgba(172, 170, 170, 0.474)" id="calificacion"
                                        name="calificacion" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="row">
                                <div class="form-group col-lg-5 p-1">
                                    <button type="reset" class="btn btn-block bg-gradient-warning"
                                        id="btn-limpiar-p">Limpiar</button>
                                </div>
                                <div class="col-lg-5 p-1">
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-block bg-gradient-info"
                                            id="btn-guardar-p">Guardar</button>
                                    </div>
                                </div>
                                <div class="col-lg-5 p-1">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block bg-gradient-primary" id="btn-editar-p"
                                            style="display: none">Actualizar</button>
                                    </div>
                                </div>
                                <div class="col-lg-5 p-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-block bg-gradient-danger" id="btn-cancelar-p"
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
                <h3 class="card-title">Visualizador Percepcion Cliente Interno</h3>
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
                            <div class="widget-main padding-3">
                                <div class="tab-content">
                                    <div id="home" class="tab-pane active">
                                        <div class="row">
                                            <div class="widget-box widget-color-dark" id="widget-box-3">
                                            </div>
                                        </div>
                                        <div class="row-10">
                                            <table id="tabla_cliente_interno"
                                                class="table-sm table-striped table-bordered aligned-middle">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th>Proceso</th>
                                                        <th>Razón Calificación</th>
                                                        <th>Efectividad</th>
                                                        <th>oportunidad</th>
                                                        <th>Calificación</th>
                                                        <th>Calificación Total</th>
                                                        {{-- <th>Desempeño</th> --}}
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label>Desempeño</label>
                            <select readonly class="form-control" style="width: 100%;" id="desempeño" name="desempeño"
                                required>
                                @foreach ($procesos as $procesos)
                                    <option value={{ $procesos->id }}>
                                        {{ $procesos->desempeño }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
