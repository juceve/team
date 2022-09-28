<div class="row">
    <div class="col-12 col-md-3 text-center border ">
        <div class="container mt-3 mb-3">
            <h6>IMAGEN DE PERFIL</h6>
            <img src="{{ Storage::url($asociado->user->avatar) }}" class="img-fluid">
            
        </div>


    </div>
    <div class="col-12 col-md-9 border">
        <div class="row form-group">
            <div class="col-12 col-md-6 border ">
                <div class="form-group mt-3">
                    <strong>Nombres:</strong>
                    {{ $persona->nombres }}
                </div>
            </div>
            <div class="col-12 col-md-6 border">
                <div class="form-group mt-3">
                    <strong>Apellidos:</strong>
                    {{ $persona->apellidos }}
                </div>
            </div>
            <div class="col-12 col-md-6 border">
                <div class="form-group mt-3">
                    <strong>Cedula:</strong>
                    {{ $persona->cedula }}
                </div>
            </div>
            <div class="col-12 col-md-6 border">
                <div class="form-group mt-3">
                    <strong>Direccion:</strong>
                    {{ $persona->direccion }}
                </div>
            </div>
            <div class="col-12 col-md-6 border">
                <div class="form-group mt-3">
                    <strong>Telefono:</strong>
                    {{ $persona->telefono }}
                </div>
            </div>
            <div class="col-12 col-md-6 border">
                <div class="form-group mt-3">
                    <strong>Celular:</strong>
                    {{ $persona->celular }}
                </div>
            </div>
            <div class="col-12 col-md-6 border">
                <div class="form-group mt-3">
                    <strong>Correo electrónico:</strong>
                    {{ $persona->email }}
                </div>
            </div>
            <div class="col-12 col-md-6 border">
                <div class="form-group mt-3">
                    <strong>Fecha de nacimiento:</strong>
                    {{ $persona->fecnacimiento }}
                </div>
            </div>
            <div class="col-12 col-md-6 border">
                <div class="form-group mt-3">
                    <strong>Fecha de ingreso:</strong>
                    {{ $asociado->fecingreso }}
                </div>
            </div>
            <div class="col-12 col-md-6 border">
                <div class="form-group mt-3">
                    <strong>Grado:</strong>
                    {{ $asociado->grado->nombre }}
                </div>
            </div>
            <div class="col-12 ">
                <div class="form-group mt-3">
                    <strong>Ocupación:</strong>
                    {{ $persona->ocupacion }}
                </div>
            </div>
        </div>
    </div>
</div>