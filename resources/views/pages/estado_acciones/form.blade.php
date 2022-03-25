@section('contenido')
    <div class="content-header">
        <form action="{{ route('store_estado_acciones') }}" method="POST" id="form-estados">
            @csrf
            <div class="card card-teal">
                <div class="card-header">
                    <h3 class="card-title">Estado Acciones Administrador</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>Tipo Acciones</label>
                                <Select class="form-control col-lg-12" style="width: 100%;" id="tipo_acciones_id"
                                    name="tipo_acciones_id" required>
                                    <option value="">-Seleccione-</option>
                                    @foreach ($tipo_acciones as $tipo_acciones)
                                        <option value="{{ $tipo_acciones->id }}">
                                            {{ $tipo_acciones->tipo_accion }}
                                        </option>
                                    @endforeach
                                </Select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Codigo Accion</label>
                                <input class="form-control col-lg-12" style="width: 100%;" id="codigo_accion"
                                    name="codigo_accion" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="from-group">
                                <label>Fecha Cierre</label>
                                <input class="form-control col-lg-12" style="width: 100%;" id="fecha_cierre"
                                    name="fecha_cierre" required>
                                {{-- <div class="input-group date" id="fecha_cierre" name="fecha_cierre" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input"
                                    data-target="#reservationdate" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div> --}}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Estado</label>
                                <Select class="form-control col-lg-12" style="width: 100%;" id="estado_id" name="estado_id"
                                    required>
                                    <option value="">-Seleccione-</option>
                                    @foreach ($estados as $estados)
                                        <option value="{{ $estados->id }}">
                                            {{ $estados->estado }}
                                        </option>
                                    @endforeach
                                </Select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-block bg-gradient-warning"
                                        id="btn-limpiar">Limpiar</button>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block bg-gradient-info"
                                        id="btn-guardar-estado">Guardar</button>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block bg-gradient-primary" id="btn-editar-estado"
                                        style="display: none">Editar</button>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <button type="button" class="btn btn-block bg-gradient-danger" id="btn-cancelar-estado"
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
                <h3 class="card-title">Visualisador De Estado</h3>
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
                                            <table id="tabla_estado"
                                                class="table table-striped table-bordered aligned-middle">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th>Tipo Accion</th>
                                                        <th>Codigo Accion</th>
                                                        <th>Fecha Cierre</th>
                                                        <th>Estado</th>
                                                        <th> Accion</th>
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
