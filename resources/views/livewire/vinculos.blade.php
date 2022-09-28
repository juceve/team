<div>

    <div class="card bg-info">
        <div class="card-body">
            <div class="row text-white">
                <div class="col-12 col-md-4 ">
                    <span><strong>ASOCIADO: </strong>
                        {{ $asociado->persona->apellidos . ' ' . $asociado->persona->nombres }}</span>
                </div>
                <div class="col-12 col-md-4">
                    <span><strong>GRADO: </strong> {{ $asociado->grado->nombre }}</span>
                </div>
                <div class="col-12 col-md-4">
                    <span><strong>FECHA INGRESO: </strong> {{ $asociado->fecingreso }}</span>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <h2 class="h5 mb-4">Formulario de Registro</h2>
                        <div class="row align-items-center">
                            <div class="col-3 form-group">
                                <label class="form-label">
                                    Nombres
                                </label>
                            </div>
                            <div class="col-9 form-group">
                                <input wire:model.defer="persona.nombres" type="text" class="form-control"
                                    required="">
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-3 form-group">
                                <label class="form-label">
                                    Apellidos
                                </label>
                            </div>
                            <div class="col-9 form-group">
                                <input wire:model.defer="persona.apellidos" type="text" class="form-control"
                                    required="">
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-3 form-group">
                                <label class="form-label">
                                    Doc. Identidad
                                </label>
                            </div>
                            <div class="col-9 form-group">
                                <input wire:model.defer="persona.cedula" type="text" class="form-control"
                                    required="">
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-3 form-group">
                                <label class="form-label">
                                    Celular
                                </label>
                            </div>
                            <div class="col-9 form-group">
                                <input wire:model.defer="persona.celular" type="text" class="form-control"
                                    required="">
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-3 form-group">
                                <label class="form-label">
                                    Parentezco
                                </label>
                            </div>
                            <div class="col-9 form-group">
                                <select wire:model.defer="parentezco_id" class="form-select" required>
                                    <option value="">-- Seleccione un parentezco --</option>
                                    @foreach ($parentezcos as $parentezco)
                                        <option value="{{ $parentezco->id }}">{{ $parentezco->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row align-items-center">
                            <div class="col-3 form-group">
                                <label class="form-label">

                                </label>
                            </div>
                            <div class="col-9 form-group">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-info" type="submit"><i class="fas fa-plus-circle"></i>
                                        Adiciona
                                        Familiar</button>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="h5">Vinculos Familiares</h2>
                    <div class="table-responsive">
                        <form wire:submit.prevent="save">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="bg-cyan ">
                                        <th class="text-white">NOMBRE</th>
                                        <th class="text-white">PARENTEZCO</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($vinculos->count() > 0)
                                        @foreach ($vinculos as $vinculo)
                                            <tr>
                                                <td>
                                                    {{ $vinculo->persona->nombres }}
                                                </td>
                                                <td>
                                                    {{ $vinculo->parentezco->nombre }}
                                                </td>
                                                <td width="30px">
                                                    <button
                                                        wire:click="delete({{ $vinculo->id }})"class="btn btn-outline-warning btn-sm"
                                                        title="Remover"><i class="fas fa-trash-alt"></i></button>

                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2">
                                                <span>No se encontraron registros</span>
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
