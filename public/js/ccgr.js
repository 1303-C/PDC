var tabla_indicador = $('#tabla_cumplimiento_compromisos').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    scrollY: "150px",
    // serverSide: true,
    autoWidth: false,
    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    ajax: "/pages/ccgr/listado_cumplimientoCompromisos",
    columns: [{
        data: 'id_control',
        name: 'id_control',
    }, {
        data: 'fecha_evaluacion',
        name: 'fecha_evaluacion',
    }, {
        data: 'fecha_actual',
        name: 'fecha_actual',
    }, {
        data: 'fecha_real_evaluacion',
        name: 'fecha_real_evaluacion',
    }, {
        data: 'frecuencia_controles',
        name: 'frecuencia_controles',
    }, {
        data: 'estado',
        name: 'estado',
    }, {
        data: 'porcentaje_avances',
        name: 'porcentaje_avances',
        render: function (data, type, row) {
            return data + '%';
        }
    }, {
        data: 'evidencia_avance',
        name: 'evidencia_avance',
        
    }, {
        class: "editar_cumplimiento_compromisos",
        orderable: false,
        data: null,
        defaultContent: '<td>' +
            '<div class="action button text-center">' +
            '<a href="#" class="btn btn-primary btn-icon btn-sm">' +
            '<i class="fa-solid fa-user-pen"></i>' +
            '</a>' +
            '</div>' +
            '</td>',
    }],
    lengthChange: true,
    lengthMenu: [
        [5, 10, 25, 50, 75, 100, -1],
        [5, 10, 25, 50, 75, 100, "All"]
    ],

});

$('#tabla_cumplimiento_compromisos tbody').on('click', 'td.editar_cumplimiento_compromisos', function() {
    var tr = $(this).closest('tr');
    var row = $('#tabla_cumplimiento_compromisos').DataTable().row(tr);
    var d = row.data();
    $('#form-cumplimientoCompromisos').attr("action", "http://pdc.test/pages/ccgr/update/" + d.id);
    $('#id_control').val(d.id_control);
    $('#fecha_evaluacion').val(d.fecha_evaluacion);
    $('#fecha_actual').val(d.fecha_actual);
    $('#fecha_real_evaluacion').val(d.fecha_real_evaluacion);
    $('#cc_frecuencia_controles_id').val(d.cc_frecuencia_controles_id);
    $('#cc_estado_id').val(d.cc_estado_id);
    $('#porcentaje_avances').val(d.porcentaje_avances);
    $('#evidencia_avance').val(d.evidencia_avance);


    //Visualizacion Botones 
    $('#btn-guardar-compromiso').css('display', 'none')
    $('#btn-editar-compromiso').css('display', '')
    $('#btn-cancelar-compromiso').css('display', '')

});

function limpiar() {
    $('#id_control').val('');
    $('#fecha_evaluacion').val('');
    $('#fecha_actual').val('');
    $('#fecha_real_evaluacion').val('');
    $('#cc_frecuencia_controles_id').val('');
    $('#cc_estado_id').val('');
    $('#porcentaje_avances').val('');
    $('#evidencia_avance').val('');



    //Visualizacion Botones 
    $('#btn-guardar-compromiso').css('display', '')
    $('#btn-editar-compromiso').css('display', 'none')
    $('#btn-cancelar-compromiso').css('display', 'none')
}