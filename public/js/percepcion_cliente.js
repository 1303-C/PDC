$('#tabla_cliente_interno').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    scrollY: "150px",
    // serverSide: true,
    autoWidth: false,
    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    ajax: "../pages/percepcion_cliente/listado_proceso",
    columns: [{
        data: 'nombre_areas',
        name: 'nombre_areas',
    }, {
        data: 'razon_calificacion',
        name: 'razon_calificacion',
    }, {
        data: 'efectividad',
        name: 'efectividad',
    }, {
        data: 'oportunidad',
        name: 'oportunidad',
    }, {
        data: 'calificacion',
        name: 'calificacion',
    }, {
        data: 'calificacion_total',
        name: 'calificacion_total',
    }, {
        class: "editar_proceso",
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

    'language': {
        'lengthMenu': 'Mostrar _MENU_ registros por página',
        'zeroRecords': 'No hay registros',
        'info': 'Mostrando página _PAGE_ de _PAGES_',
        'infoEmpty': 'No hay registros disponibles',
        'infoFiltered': '(filtrado de _MAX_ registros totales)',
        'search': 'Buscar:',
        'paginate': {
            'next': 'Siguiente',
            'previous': 'Anterior'
        }
    } 

});

$('#tabla_cliente_interno').on('click', 'td.editar_proceso', function () {
    var tr = $(this).closest('tr');
    var row = $('#tabla_cliente_interno').DataTable().row(tr);
    var d = row.data();
    console.log(d);
    $('#form-procesos').attr("action", "../pages/percepcion_cliente/update/" + d.id);
    // $('#metodo-indicadores').attr("value", "put");
    $('#p_areas_id').val(d.p_areas_id);
    $('#razon_calificacion').val(d.razon_calificacion);
    $('#efectividad').val(d.efectividad);
    $('#calificacion').val(d.calificacion);
    $('#calificacion_total').val(d.calificacion_total);
    // $('#desempeño').val(d.desempeño);
    $('#oportunidad').val(d.oportunidad);

    //Visualizacion Botones 
    $('#btn-guardar-p').css('display', 'none')
    $('#btn-editar-p').css('display', '')
    $('#btn-cancelar-p').css('display', '')

});

function limpiar() {
    $('#p_areas_id').val('');
    $('#razon_calificacion').val('');
    $('#efectividad').val('');
    $('#calificacion').val('');
    $('#calificacion_total').val('');
    // $('#desempeño').val('');
    $('#oportunidad').val('');

    //Visualizacion Botones 
    $('#btn-guardar-p').css('display', '')
    $('#btn-editar-p').css('display', 'none')
    $('#btn-cancelar-p').css('display', 'none')
}

function llamarValueEfectividad() {
    const selectEfectividad = document.querySelector('.tabla_efectividad').value;
    resultadoCalificacion('', selectEfectividad);
}

function llamarValueOportunidad() {
    const selectOportunidad = document.querySelector('.tabla_oportunidad').value;
    resultadoCalificacion(selectOportunidad, '');
}

function resultadoCalificacion() {
    const selectOportunidad = document.querySelector('.tabla_oportunidad').value;
    const selectEfectividad = document.querySelector('.tabla_efectividad').value;
    const inputCalificacion = document.querySelector('.inputCalificacion');
    const promedio = Number(selectEfectividad) / 2 + Number(selectOportunidad) / 2;

    if (promedio > 100) {
        inputCalificacion.setAttribute('value', '100')
    } else if (promedio <= 100) {
        inputCalificacion.setAttribute('value', promedio)
    }
    return promedio;
}

function calificacionTotal(data, type, row) {
    return Math.round((row.calificacion + 22) / 1);
}