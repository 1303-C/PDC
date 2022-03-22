@section('contenido')
    <form action="{{ route('store_estado_acciones') }}" method="POST" id="form-estados">
        @csrf
        <div class="card card-teal">
            <div class="card-header">
                <h3 class="card-title">Estado Acciones</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tipo Acciones</label>
                            <Select class="form-control col-lg-12" style="width: 100%;" id="tipo_acciones_id"
                                name="tipo_acciones_id">
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
                                name="codigo_accion">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="from-group">
                            <label>Fecha Cierre</label>
                            <input class="form-control col-lg-12" style="width: 100%;" id="fecha_cierre"
                                name="fecha_cierre">
                            {{-- <div class="input-group date" id="fecha_cierre" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div> 
                        </div> --}}
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Estado</label>
                            <Select class="form-control col-lg-12" style="width: 100%;" id="estado_id" name="estado_id">
                                <option value="">-Seleccione-</option>
                                @foreach ($estados as $estados)
                                    <option value="{{ $estados->id }}">
                                        {{ $estados->estado }}
                                    </option>
                                @endforeach
                            </Select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-block bg-gradient-info"
                                id="btn-guardar-Estado">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
