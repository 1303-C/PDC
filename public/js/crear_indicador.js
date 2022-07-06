$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#tabla_crear_indicador').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    scrollY: "150px",
    // serverSide: true,
    autoWidth: false,
    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    ajax: "../pages/Procesos_Calidad/listado_crear_indicadores",
    columns: [{
        data: 'nombre_indicador',
        name: 'nombre_indicador',
    }, {
        data: 'areas',
        name: 'areas',
    }, {
        data: 'frecuencia_control',
        name: 'frecuencia_control',
    }, {
        data: 'meta',
        name: 'meta',
    }, {
        class: "editar_indicador_creado",
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
        class: "eliminar_indicador_creado",
        orderable: false,
        data: null,
        defaultContent: '<td>' +
            '<div class="action button text-center">' +
            '<a href="#" class="btn btn-danger btn-icon btn-sm">' +
            '<i class="fa-solid fa-trash-can"></i>' +
            '</a>' +
            '</div>' +
            '</td>',
    },],
    lengthChange: true,
    lengthMenu: [
        [5, 10, 25, 50, 75, 100, -1],
        [5, 10, 25, 50, 75, 100, "All"]
    ],

    language: {

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

tabla = $('#tabla_crear_indicador').DataTable();
$("#filtro_busqueda_proceso").keyup(function () {
    tabla.columns($(this).data('index')).search(this.value).draw();
})



$('#tabla_crear_indicador tbody').on('click', 'td.eliminar_indicador_creado', function () {


    var tr = $(this).closest('tr');
    var row = $('#tabla_crear_indicador').DataTable().row(tr);
    var d = row.data();

    $('#IdCrear').val(d.id);
    $("#modal-delete").modal("show");
    $("#modal").modal("show");
    setTimeout(function () {
        $('#modal-delete').modal("hide");
    }, 5000);
});

$("#btn-confirmar-indicador").click(function () {
    // console.log($("#IdCrear").val());
    $.ajax({
        type: 'DELETE',
        url: "../pages/Procesos_Calidad/eliminar/" + $("#IdCrear").val(),

        // data: datos,
        success: function (msg) {
            // alert('Se ha eliminado el indicador' + msg);
            window.location = "../pages/Procesos_Calidad_crear";
        },
        error: function (msg) {
            // alert('Hubo un error al eliminar')
        }
    });
});


$('#tabla_crear_indicador tbody').on('click', 'td.editar_indicador_creado', function () {
    var tr = $(this).closest('tr');
    var row = $('#tabla_crear_indicador').DataTable().row(tr);
    var d = row.data();
    $('#form_crear_indicadores').attr("action", "../pages/Procesos_Calidad/actualizardos/" + d.id);
    $('#metodo_indicadores_dos').attr("value", "put");
    $('#nombre_indicador').val(d.nombre_indicador);
    $('#areas_id').val(d.areas_id);
    $('#frecuencia_control_id').val(d.frecuencia_control_id);
    $('#meta').val(d.meta)




    //Visualizacion Botones 
    $('#btn-guardar_c').css('display', 'none')
    $('#btn-editar_c').css('display', '')
    $('#btn-cancelar_c').css('display', '')

});

function limpiar() {
    $('#nombre_indicador').val('');
    $('#areas').val('');
    $('#frecuencia_control').val('');
    $('#meta').val('');



    //Visualizacion Botones 
    $('#btn-guardar_c').css('display', '')
    $('#btn-editar_c').css('display', 'none')
    $('#btn-cancelar_c').css('display', 'none')
};

$('.select2bs4').select2({
    theme: 'bootstrap4',
});