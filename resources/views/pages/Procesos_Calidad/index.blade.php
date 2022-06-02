@extends('themes.lte.layout')
@section('titulo')
    Analisis Indicador
@endsection

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href={{ asset('assets/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }} rel="stylesheet" />
    <link href={{ asset('assets/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }} rel="stylesheet" />
    <link href={{ asset('assets/lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }} rel="stylesheet" />
@endsection

@section('scripts')
    <script src={{ asset('assets/lte/plugins/datatables/jquery.dataTables.min.js') }}></script>
    <script src={{ asset('assets/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}></script>
    <script src={{ asset('assets/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}></script>
    <script src={{ asset('assets/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}></script>
    <script src={{ asset('assets/lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}></script>
    <script src={{ asset('assets/lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}></script>
    <script src={{ asset('assets/lte/plugins/jszip/jszip.min.js') }}></script>
    <script src={{ asset('assets/lte/plugins/pdfmake/pdfmake.min.js') }}></script>
    <script src={{ asset('assets/lte/plugins/pdfmake/vfs_fonts.js') }}></script>
    <script src={{ asset('assets/lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}></script>
    <script src={{ asset('assets/lte/plugins/datatables-buttons/js/buttons.print.min.js') }}></script>
    <script src={{ asset('assets/lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}></script>
    <script src={{ asset('assets/lte/plugins/moment/moment.min.js') }}></script>
    <script src={{ asset('js/analisis_indicador.js') }}></script>
    <script></script>
@endsection

@section('contenido')
    @include('pages.Procesos_Calidad.form')
@endsection
