@extends("themes.lte.layout")
@section('titulo')
    Analisis Indicador
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
        var tabla_indicador = $('#tabla_indicador').DataTable({
            destroy: true,
            responsive: true,
            processing: true,
            scrollY: "300px",
            // serverSide: true,
            autoWidth: false,
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            ajax: "{{ route('getlistado_indicadores') }}",
            columns: [{
                data: 'nombre_indicador',
                name: 'nombre_indicador',
            }, {
                data: 'analisis_indicador',
                name: 'analisis_indicador',
            }, {
                data: 'indicador_inverso',
                name: 'indicador_inverso',
            }, {
                data: 'resultados',
                name: 'resultados',
                render: function(data, type, row) {
                    return data + '%';
                }
            }, {
                data: 'meta',
                name: 'meta',
                render: function(data, type, row) {
                    return data + '%';
                }
            }, {
                data: 'equivalencia',
                name: 'equivalencia',
                render: function(data, type, row) {
                    return data + '%';
                }
            }, {
                data: 'created_at',
                name: 'created_at',
                render: function(data, type, row) {
                    return moment(data).format('DD/MM/YYYY');
                }
            }, {
                class: "editar_indicador",
                orderable: false,
                data: null,
                defaultContent: '<td>' +
                    '<div class="action button text-center">' +
                    '<a href="#" class="btn btn-primary btn-icon btn-sm">' +
                    '<i class="fas fa-edit"></i>' +
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

        tabla =  $('#tabla_indicador').DataTable();

        $("#filtro_busqueda").keyup(function(){
            tabla.columns($(this).data('index')).search(this.value).draw();
        })

      



        $('#tabla_indicador tbody').on('click', 'td.editar_indicador', function() {
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
    </script>
@endsection

@section('contenido')
    @include('pages.Procesos_Calidad.form')
@endsection
