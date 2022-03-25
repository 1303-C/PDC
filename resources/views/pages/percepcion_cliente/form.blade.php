@section('contenido')
    <div class="content-header">
        <form action="{{ route('store_percepcion_cliente') }}" method="POST" id="form-procesos">
            @csrf
            <div class="card card-teal">
                <div class="card-header">
                    <h3 class="card-title">Percepcion Cliente Interno</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Proceso</label>
                                <select class="form-control col-lg-12" style="width: 100%;" id="p_areas_id"
                                    name="p_areas_id" required>
                                    <option value="">-Seleccione-</option>
                                    @foreach ($areas as $areas)
                                        <option value="{{ $areas->id }}">
                                            {{ $areas->nombre_areas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-5">
                                    <label>Calificacion Total</label>
                                    <input disabled="disabled" class="form-control" style="width: 100%;"
                                        id="calificacion_total" name="calificacion_total" required>
                                </div>
                                <div class="form-group col-lg-5">
                                    <label>Desempeño</label>
                                    <input disabled="disabled" class="form-control" style="width: 100%;" id="desempeño"
                                        name="desempeño" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="form-group col-lg-5">
                                    <label>Efectividad</label>
                                    <select class="form-control tabla_efectividad" onchange="llamarValueEfectividad();"
                                        style="width: 100%;" id="efectividad" name="efectividad" autocomplete="off"
                                        name="indicador_inverso" required>
                                        <option value="">-Selecione-</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>

                                </div>
                                <div class="form-group col-lg-5">
                                    <label>oportunidad</label>
                                    <select class="form-control tabla_oportunidad" onchange="resultadoCalificacion();"
                                        style="width: 100%;" id="oportunidad" name="oportunidad" autocomplete="off"
                                        required>
                                        <option value="">-Selecione-</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-lg-5">
                                <label>Calificacion</label>
                                <input readonly class="form-control inputCalificacion" style="width: 100%;"
                                    id="calificacion" name="calificacion" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-block bg-gradient-warning"
                                        id="btn-limpiar-p">Limpiar</button>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block bg-gradient-info"
                                        id="btn-guardar-p">Guardar</button>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block bg-gradient-primary" id="btn-editar-p"
                                        style="display: none">Editar</button>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <button type="button" class="btn btn-block bg-gradient-danger" id="btn-cancelar-p"
                                        style="display: none" onclick="limpiar()">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="content-header">
        <div class="card card-teal">
            <div class="card-header">
                <h3 class="card-title">Visualisador Percepcion Cliente Interno</h3>
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
                                            <table id="tabla_cliente_interno"
                                                class="table table-striped table-bordered aligned-middle">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th>Proceso</th>
                                                        <th>Efectividad</th>
                                                        <th>oportunidad</th>
                                                        <th>Calificacion</th>
                                                        <th>Calificacion Total</th>
                                                        <th>Desempeño</th>
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
