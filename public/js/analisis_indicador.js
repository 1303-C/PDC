$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var tabla_indicador = $('#tabla_indicador').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    scrollY: "150px",
    // serverSide: true,
    autoWidth: false,
    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    ajax: "/pages/Procesos_Calidad/listado_indicadores",
    columns: [{
        data: 'nombre_usuario',
        name: 'nombre_usuario',
    }, {
        data: 'nombre_indicador',
        name: 'nombre_indicador',
    }, {
        data: 'areas',
        name: 'areas',
    }, {
        data: 'analisis_indicador',
        name: 'analisis_indicador',
    }, {
        data: 'indicador_inverso',
        name: 'indicador_inverso',
    }, {
        data: 'resultados',
        name: 'resultados',
        render: function (data, type, row) {
            return data + '%';
        }
    }, {
        data: 'meta',
        name: 'meta',
        render: function (data, type, row) {
            return data + '%';
        }
    }, {
        data: 'equivalencia',
        name: 'equivalencia',
        render: function (data, type, row) {
            return data + '%';
        }
    }, {
        data: 'created_at',
        name: 'created_at',
        render: function (data, type, row) {
            return moment(data).format('DD/MM/YYYY');
        }
    }, {
        class: "editar_indicador",
        orderable: false,
        data: null,
        defaultContent: '<td>' +
            '<div class="action button text-center">' +
            '<a href="#" class="btn btn-primary btn-icon btn-sm">' +
            '<i class="fa-solid fa-user-pen"></i>' +
            '</a>' +
            '</div>' +
            '</td>',
    }, {
        class: "eliminar_indicador",
        orderable: false,
        data: null,
        defaultContent: '<td>' +
            '<div class="action button text-center">' +
            '<a href="#" class="btn btn-danger btn-icon btn-sm">' +
            '<i class="fa-solid fa-trash-can"></i>' +
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

tabla = $('#tabla_indicador').DataTable();
$("#filtro_busqueda").keyup(function () {
    tabla.columns($(this).data('index')).search(this.value).draw();
})

$('#tabla_indicador tbody').on('click', 'td.editar_indicador', function () {
    var tr = $(this).closest('tr');
    var row = $('#tabla_indicador').DataTable().row(tr);
    var d = row.data();
    $('#form-indicadores').attr("action", "http://pdc.test/pages/Procesos_Calidad/actualizar/" + d.id);
    $('#metodo-indicadores').attr("value", "put");
    $('#indicadores_id').val(d.indicadores_id);
    $('#indicador_inverso').val(d.indicador_inverso);
    $('#analisis_indicador').val(d.analisis_indicador);
    $('#resultados').val(d.resultados);
    $('#resultados').val(d.resultados);
    $('#meta').val(d.meta);
    $('#equivalencia').val(d.equivalencia);
    $('#desempeño').val(d.desempeño);

    //Visualizacion Botones 
    $('#btn-guardar').css('display', 'none')
    $('#btn-editar').css('display', '')
    $('#btn-cancelar').css('display', '')

});

$('#tabla_indicador tbody').on('click', 'td.eliminar_indicador', function () {
    var tr = $(this).closest('tr');
    var row = $('#tabla_indicador').DataTable().row(tr);
    var d = row.data();
    datos = {};
    datos['id'] = d.id;
    $.ajax({
        type: 'DELETE',
        url: "/pages/Procesos_Calidad/eliminar_indicador/" + d.id,
        // headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: datos,
        
        success: function (msg) {
            alert('Se ha eliminado el indicador');
        },
        error: function (msg) {
            alert('Hubo un error al eliminar')
        }
    });
});

function limpiar() {
    $('#indicadores_id').val('');
    $('#indicador_inverso').val('');
    $('#analisis_indicador').val('');
    $('#resultados').val('');
    $('#meta').val('');
    $('#equivalencia').val('');
    $('#desempeño').val('');


    //Visualizacion Botones 
    $('#btn-guardar').css('display', '')
    $('#btn-editar').css('display', 'none')
    $('#btn-cancelar').css('display', 'none')
}

function llamarValueResultado() {
    const selectResultado = document.querySelector('.tabla_resultados').value;
    resultadoEquivalente('', selectResultado);
}

function llamarValueMeta() {
    const selectMeta = document.querySelector('.tabla_metas').value;
    resultadoEquivalente(selectMeta, '');
}

function resultadoEquivalente() {
    const selectMeta = document.querySelector('.tabla_metas').value;
    const selectResultado = document.querySelector('.tabla_resultados').value;
    const inputEquivalencia = document.querySelector('.inputEquivalencia');
    const multiplicacion = Number(selectMeta) * Number(selectResultado);

    if (multiplicacion > 100) {
        inputEquivalencia.setAttribute('value', '100')
    } else if (multiplicacion <= 100) {
        inputEquivalencia.setAttribute('value', multiplicacion)
    }
    return multiplicacion;
}