@if (session('creacion_indicador'))
    <div class="modal fade" id="modal-alert">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p>
                    <h2>Se ha creado el indicador: </h2>
                    </p>
                    <p>
                    <h1>{{ session('creacion_indicador') }}</h1>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif
