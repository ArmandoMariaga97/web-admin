
<div x-data="{open: @entangle('open')}" x-init="open = false" class="col-md-12 col-12 mb-2 ocultar-inicial" >

<div x-show="!open" align="right" class="mb-2">
    <button @click="open = !open" style="margin-right:20px;" class="btn btn-success round btn-glow px-2">
          Agregar
    </button>
</div>

<div x-show="open" align="right" class="mb-2">
    <button @click="open = !open" style="margin-right:20px;" class="btn btn-danger round btn-glow px-2">
          Cancelar
    </button>
</div>

<div x-show="open">
  <div class="modal-content">

    <div style="background:#7DE373 ;" class="modal-header">
      <label class="modal-title text-text-bold-600 text-white">agrgar imágenes a la galeria</label>
    </div> 

    <div>
        <input type="file" wire:model="photos" multiple>
        @error('photos.*') <span style="color:red;" class="error">{{ $message }}</span> @enderror
    </div>

    <div>
    @if ($photos)
        Photo Preview:
        @foreach($photos as $photo)
            <img style="width:200px;" src="{{ $photo->temporaryUrl() }}">
        @endforeach
    @endif
    </div>

    <div>
        <a class="btn btn-success" wire:click="cargarfotos"> Cargar Imágenes</a>
    </div>

  </div> 
</div>
</div>
