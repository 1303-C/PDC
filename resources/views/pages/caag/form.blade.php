@section('contenido')
    <div class="content-header">
        <form action="#" method="POST">
            @csrf
            <input type="hidden" name="method" value="" id="metodo-indicadores_dos">
            <div class="card card-teal">
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
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Actividades</label>
                                <input class="form-control" style="width: 100%;" id="nombre_indicador"
                                    name="nombre_indicador" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Fecha Programada</label>
                                <input class="form-control" style="width: 100%;" id="areas_id" name="areas_id" type="Date"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Fecha Cierre</label>
                                <input class="form-control" style="width: 100%;" id="areas_id" name="areas_id" type="Date"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Estado Actividad</label>
                                <input class="form-control" style="width: 100%;" id="areas_id" name="areas_id" required>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Porcentaje</label>
                                <select class="form-control" style="width: 100%;" id="areas_id" name="areas_id" required>
                                    <option value="">-Seleccione-</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Fecha Reprogramada</label>
                                <input class="form-control" style="width: 100%;" id="areas_id" name="areas_id" type="Date"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Analisis Indicador</label>
                            <textarea class="form-control" style="width: 100%;" id="analisis_indicador" name="analisis_indicador"
                                autocomplete="off" required style="height: 4px;"></textarea>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-block bg-gradient-info">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
