@extends("themes.lte.layout")
@section('titulo')
    CCGR
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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
    <script src="{{ asset('assets/lte/plugins/moment/moment.min.js') }}"></script>
    <script>
        var tabla_indicador = $('#tabla_cumplimiento_compromisos').DataTable({
            destroy: true,
            responsive: true,
            processing: true,
            scrollY: "150px",
            // serverSide: true,
            autoWidth: false,
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            ajax: "{{ route('getlistado_cumplimientoCompromisos') }}",
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
    </script>
@endsection
@section('contenido')
    @include('pages.ccgr.form')
@endsection
