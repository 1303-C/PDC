@extends("themes.lte.layout")
@section('titulo')
    Estado acciones
@endsection

@section('scripts')
    <script src="{{ asset('assets/lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        var tabla_indicador = $('#tabla_estado').DataTable({
            destroy: true,
            responsive: true,
            processing: true,
            scrollY: "150px",
            // serverSide: true,
            autoWidth: false,
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            ajax: "{{ route('getlistado_estado') }}",
            columns: [{
                data: 'tipo_acciones',
                name: 'tipo_acciones',
            }, {
                data: 'codigo_accion',
                name: 'codigo_accion',
            }, {
                data: 'fecha_cierre',
                name: 'fecha_cierre',
            }, {
                data: 'estados',
                name: 'estados',
            }, {
                class: "editar_estado",
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

        $('#tabla_estado tbody').on('click', 'td.editar_estado', function() {
            var tr = $(this).closest('tr');
            var row = $('#tabla_estado').DataTable().row(tr);
            var d = row.data();
            $('#form-estados').attr("action", "http://pdc.test/pages/estado_acciones/update/" + d.id);
            $('#tipo_acciones_id').val(d.tipo_acciones_id);
            $('#codigo_accion').val(d.codigo_accion);
            $('#fecha_cierre').val(d.fecha_cierre);
            $('#estado_id').val(d.estado_id);


            //Visualizacion Botones 
            $('#btn-guardar-estado').css('display', 'none')
            $('#btn-editar-estado').css('display', '')
            $('#btn-cancelar-estado').css('display', '')

        });

        function limpiar() {
            $('#tipo_acciones_id').val('');
            $('#codigo_accion').val('');
            $('#fecha_cierre').val('');
            $('#estado_id').val('');



            //Visualizacion Botones 
            $('#btn-guardar-estado').css('display', '')
            $('#btn-editar-estado').css('display', 'none')
            $('#btn-cancelar-estado').css('display', 'none')
        }
    </script>
@endsection

@section('contenido')
    @include('pages.estado_acciones.form')
@endsection
