@if (session('eliminar_indicador'))
    <div class="modal fade" id="modal-alert">
        <div class="modal-dialog">
            <div class="modal-content  bg-primary">
                <div class="modal-body text-center">
                    <p>
                    <h2>Se ha actualizado el indicador: </h2>
                    </p>
                    <p>
                    <h1>{{ session('eliminar_indicador') }}</h1>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif
