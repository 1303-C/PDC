@section('contenido')
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
                <div class="col-5">
                    <div class="form-group">
                        <label>Accion Correctiva</label>
                        <input class="form-control col-lg-12" style="width: 100%;" id="">
                    </div>
                </div>
                <div class="col-3">
                    <div class="from-group">
                        <label>Fecha Cierre</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Estado</label>
                        <Select class="form-control col-lg-12" style="width: 100%;" id="">
                            <option value="">estado</option>
                        </Select>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
