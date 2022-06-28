@section('contenido')
    <div class="content-header p-0">
        <form action="{{ route('store_estado_acciones') }}" method="POST" id="form-estados">
            @csrf
            <div class="card card-blue">
                <div class="card-header">
                    <h3 class="card-title">Estado Acciones</h3>
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
                                    <div class="form-group  ">
                                        <label>Tipo Acciones</label>
                                        <Select class="form-control-sm" style="width: 100%;" id="tipo_acciones_id"
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
                                <div class="col-lg-6 p-1">
                                    <div class="form-group">
                                        <label>Codigo Acción</label>
                                        <input class="form-control-sm-border" style="width: 100%;" id="codigo_accion"
                                            name="codigo_accion" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="from-group col-lg-5 p-1">
                                    <label>Fecha Cierre</label>
                                    <input class="form-control-sm-border" style="width: 100%;" id="fecha_cierre"
                                        name="fecha_cierre" type="Date" required>
                                </div>
                                <div class="form-group col-lg-6 p-1">
                                    <label>Estado</label>
                                    <Select class="form-control-sm " style="width: 100%;" id="estado_id" name="estado_id"
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
                        </div>
                        <div class="col-4">
                            <div class="row">
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
                                            style="display: none">Actualizar</button>
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
                                            <table id="tabla_estado"
                                                class="table-sm table-striped table-bordered aligned-middle">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th>Tipo Acciones</th>
                                                        <th>Codigo Acción</th>
                                                        <th>Fecha Cierre</th>
                                                        <th>Estado</th>
                                                        <th> Acción</th>
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
