 <div class="content-header p-0 ">
     <form action="{{ route('guardar_indicador') }}" method="POST" id="form_crear_indicadores">
         @csrf
         <input type="hidden" name="method" value="" id="metodo_indicadores_dos">
         <div class="card card-blue">
             <div class="card-header">
                 <h3 class="card-title">Crear Indicador</h3>
                 <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                             class="fas fa-minus"></i>
                     </button>
                 </div>
             </div>
             <div class="card-body">
                 <div class="row">
                     <div class="col-12">
                         <div class="row">
                             <div class="col-lg-4 p-1">
                                 <div class="form-group">
                                     <label>Nombre Indicador</label>
                                     <input class="form-control-sm-border" style="width: 100%;" id="nombre_indicador"
                                         name="nombre_indicador" required autocomplete="off">
                                 </div>
                             </div>
                             <div class="col-lg-4 p-1">
                                 <div class="form-group">
                                     <label>Nombre Proceso</label>
                                     <select class="form-control-sm select2bs4" style="width: 100%; borde"
                                         id="areas_id" name="areas_id" required>
                                         <option value="">-Seleccione-</option>
                                         @foreach ($areas as $areas)
                                             <option value="{{ $areas->id }}">
                                                 {{ $areas->nombre_areas }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="col-lg-2 p-1">
                                 <div class="form-group">
                                     <label>Frecuencia C/T</label>
                                     <select class="form-control-sm" style="width: 100%;" id="frecuencia_control_id"
                                         name="frecuencia_control_id" required>
                                         <option value="">-Seleccione-</option>
                                         @foreach ($frecuencia_control as $frecuencia_control)
                                             <option value="{{ $frecuencia_control->id }}">
                                                 {{ $frecuencia_control->frecuencia_control }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group col-lg-2 p-1">
                                 <label>Meta</label>
                                 <div class="input-group-append">
                                     <input class="form-control-sm-border text-center tabla_metas" style="width: 100%;"
                                         id="metas_id" name="meta" autocomplete="off" required
                                         onchange="resultadoEquivalente();">
                                     <span class="input-group-text"><i class="fa-solid fa-percent"></i></span>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-4 float-right">
                     <div class="row">
                         <div class="col-lg-3 p-1">
                             <div class="form-group">
                                 <button type="submit" class="btn btn-block bg-gradient-primary float-right"
                                     id="btn-editar_c"
                                     style="display: none; height:30px; width:80px; padding: 0%">Editar</button>
                             </div>
                         </div>
                         <div class="col-lg-3 p-1">
                             <div class="form-group">
                                 <button type="button" class="btn btn-block bg-gradient-danger" id="btn-cancelar_c"
                                     style="display: none; height:30px; width:80px; padding: 0%"
                                     onclick="limpiar()">Borrar</button>
                             </div>
                         </div>
                         <div class="col-lg-3 p-1  clearfix" style="text-align: center;">
                             <div class="form-group">
                                 <button type="reset" class="btn btn-block bg-gradient-warning " id="btn-limpiar_c"
                                     style="height:30px; width:80px; padding: 0%">Limpiar</button>
                             </div>
                         </div>
                         <div class="col-lg-3 p-1">
                             <div class="form-group">
                                 <button type="submit" class="btn btn-block bg-gradient-info float-right"
                                     id="btn-guardar_c" style="height:30px; width:80px; padding: 0%">Guardar</button>
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
            <h3 class="card-title">Visualizador Indicador Creado</h3>
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
                                        <table id="tabla_crear_indicador"
                                            class="table-sm table-striped table-bordered aligned-middle">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th>Nombre Indicador</th>
                                                    <th>Nombre Proceso</th>
                                                    <th>Frecuencia Control</th>
                                                    <th>Metas</th>
                                                    <th>Acción 1</th>
                                                    <th>Acción 2</th>
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
                            <label for="filtro_busqueda_proceso">Bucar proceso</label>
                            <input type="text" name="filtro_busqueda" id="filtro_busqueda_proceso"
                                class="form-control mx-1" placeholder="Buscar.." data-index="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
