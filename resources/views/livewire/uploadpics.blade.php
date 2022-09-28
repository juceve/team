<div>
    <form wire:submit.prevent="save">
        <div class="form-group">
            <input class="form-control" type="file" wire:model="photo">
            @error('photo')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            @if ($photo)
                <small>Vista previa:</small><br>
                <img src="{{ $photo->temporaryUrl() }}" style="width: 150px;">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Actualizar Avatar</button>
                </div>
            @endif
        </div>

    </form>
</div>
