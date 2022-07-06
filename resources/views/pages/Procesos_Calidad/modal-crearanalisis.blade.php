@if (session('creacion_analisis'))
    <div class="modal fade" id="modal-alert">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p>
                    <h2>Se ha creado el analisis del indicador: </h2>
                    </p>
                    <p>
                    <h1>{{ session('creacion_analisis') }}</h1>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif
