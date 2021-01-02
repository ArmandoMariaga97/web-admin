<div x-data="{open: @entangle('open')}" x-init="open = false" class="col-md-12 col-12 mb-2" >

<div x-show="!open" align="right" class="mb-2">
    <button @click="open = !open" style="margin-right:20px;" class="btn btn-success round btn-glow px-2">
          Agregar
    </button>
</div>

<div x-show="open" align="right" class="mb-2">
    <button @click="open = !open" wire:click="limpiarphotos" style="margin-right:20px;" class="btn btn-danger round btn-glow px-2">
          Cancelar
    </button>
</div>

<div x-show="open">
  <div class="modal-content">

    <div class="card-header">
      <a style="float:right; color:white;" wire:click="cargarfotos" class="btn btn-success round btn-glow px-2">
            Guardar
      </a>
      <h2 align="center" style="font-size:24px; color:#28d094;" class="card-title">Agregar imágenes a la galeria</h2>
      <hr>
    </div> 

    <div class="row">
      <div class="col-md-12 row justify-content-center  mb-3">
          <div class="col-md-6 file-select" id="src-file1">
              <input type="file" name="src-file1" aria-label="Archivo" wire:click="limpiarphotos"  wire:model="photos" multiple>
              @error('photos.*') <span style="color:red;" class="error">{{ $message }}</span> @enderror
          </div>
      </div>
  

      @if ($photos)
            
      <div class="col-md-12 row justify-content-center">

          @foreach($photos as $photo)

            @if($errors->has("photos.$cont"))          
              <div class="col-md-3 col-lg-3 contenedor-errors">
                <img class="img-errors" src="{{ $photo->temporaryUrl() }}">   
                <div class="info-errors-img">
                  <p align="center">{{ $errors->first("photos.$cont") }}</p>
                </div>           
              </div>
            @else
              <div class="col-md-3 col-lg-3 contenedor-success">
                <img class="img-success" src="{{ $photo->temporaryUrl() }}">   
                <div class="info-success-img">
                  <p align="center">Elemento adminitido</p>
                </div>           
              </div>
            @endif
                    
              <p style="display:none;">{{ $cont++ }}</p>

          @endforeach

        
      </div>
      @endif

    </div> 
  </div>
</div>

