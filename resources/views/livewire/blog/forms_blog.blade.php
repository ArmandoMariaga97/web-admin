
<div class="col-md-12 col-12 mb-2" >

    <div x-show="!open" align="right" class="mb-2">
        <button @click="open = !open" style="margin-right:20px;" type="button" class="btn btn-success round btn-glow px-2">
              Agregar
        </button>
    </div>

    <template x-if="open">
      <div x-show="open" align="right" class="mb-2">
          <button @click="open = !open, form_create = true, $wire.limpiarDatos()" style="margin-right:20px;" type="button" class="btn btn-danger round btn-glow px-2">
                Cancelar
          </button>
      </div>
    </template>

    @if($open)
      <div class="modal-content">

        <div x-show="form_create" style="background:#7DE373 ;" class="modal-header">
          <label class="modal-title text-text-bold-600 text-white">Nueva entrada al BLOG</label>
        </div> 

        <template x-if="!form_create">
          <div style="background:#EA5B25 ;" class="modal-header">
            <label class="modal-title text-text-bold-600 text-white">Editar entrada al BLOG</label>
          </div>  
        </template>

        <form  action="#">
          <div class="modal-body">

            <label>Título: {{ $titulo }}</label>
            <div class="form-group">
              <input type="text" wire:model.defer="titulo" placeholder="Escribra su titulo" class="form-control">
              @error('titulo') <span style="color:red;">{{ $message }}</span> @enderror
            </div>

            <label>Contenido: </label>
            <div class="form-group">
              <textarea type="text" wire:model.defer="contenido" placeholder="Escriba su contenido" class="form-control" cols="30" rows="10"></textarea>
              @error('contenido') <span style="color:red;">{{ $message }}</span> @enderror
            </div>

            <label>Imagen: {{ $img }}</label> <br>
            <span>Formatos admitidos JPEG, JPG, PNG, peso max 2mb</span>
            <div class="form-group">
            <input type="file" wire:model.defer="img" class="form-control">
              @error('img') <span style="color:red;">{{ $message }}</span> @enderror
            </div>

          </div>

          <div class="modal-footer">
            <button wire:click="limpiarDatos" type="button" id="form-create-closed" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <buttom x-show="form_create" wire:click="store" type="reset" class="btn btn-success">Guardar</buttom>
            <buttom x-show="!form_create" wire:click="update"  type="reset" class="btn btn-success">Actualizar</buttom>
          </div>

        </form>

      </div> 
    @endif
</div>
