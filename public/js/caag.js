var tabla_indicador = $('#tabla_actividades_gerencia').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    scrollY: "150px",
    // serverSide: true,
    autoWidth: false,
    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    ajax: "/pages/caag/listado_actividadesGerencia",
    columns: [{
        data: 'Actividades',
        name: 'Actividades',
    }, {
        data: 'fecha_programada',
        name: 'fecha_programada',
    }, {
        data: 'fecha_cierre', 
        name: 'fecha_cierre',
    }, {
        data: 'porcentaje',
        name: 'porcentaje',
        render: function (data, type, row) {
            return data + '%';
        }
    }, {
        data: 'fecha_reprogramada',
        name: 'fecha_reprogramada',
    }, {
        data: 'analisis_indicador',
        name: 'analisis_indicador',
    }, {
        data: 'estado',
        name: 'estado',
    }, {
        class: "editar_actividades_gerencia",
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

$('#tabla_actividades_gerencia tbody').on('click', 'td.editar_actividades_gerencia', function() {
    var tr = $(this).closest('tr');
    var row = $('#tabla_actividades_gerencia').DataTable().row(tr);
    var d = row.data();
    $('#form-actividadesGerencia').attr("action", "http://pdc.test/pages/caag/update/" + d.id);
    $('#Actividades').val(d.Actividades);
    $('#fecha_programada').val(d.fecha_programada);
    $('#fecha_cierre').val(d.fecha_cierre);
    $('#porcentaje').val(d.porcentaje);
    $('#fecha_reprogramada').val(d.fecha_reprogramada);
    $('#analisis_indicador').val(d.analisis_indicador);
    $('#ca_estado_id').val(d.ca_estado_id);


    //Visualizacion Botones 
    $('#btn-guardar-gerencia').css('display', 'none')
    $('#btn-editar-gerencia').css('display', '')
    $('#btn-cancelar-gerencia').css('display', '')

});

function limpiar() {
    $('#Actividades').val('');
    $('#fecha_programada').val('');
    $('#fecha_cierre').val('');
    $('#porcentaje').val('');
    $('#fecha_reprogramada').val('');
    $('#analisis_indicador').val('');
    $('#ca_estado_id').val('');



    //Visualizacion Botones 
    $('#btn-guardar-gerencia').css('display', '')
    $('#btn-editar-gerencia').css('display', 'none')
    $('#btn-cancelar-gerencia').css('display', 'none')
}