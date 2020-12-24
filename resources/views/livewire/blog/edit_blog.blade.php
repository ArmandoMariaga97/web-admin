
<div wire:ignore class="modal fade text-left" id="edit-modal-{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title text-text-bold-600" id="myModalLabel33">Editar entrada al BLOG</label>
      </div>
        <form action="#">
          <div class="modal-body">
            <label>Título:</label>
            <div class="form-group">
              <input type="text" wire:model="titulo" placeholder="Escribra su titulo" class="form-control">
              @error('titulo') <span style="color:red;">{{ $message }}</span> @enderror
            </div>
            <label>Contenido: </label>
            <div class="form-group">
              <textarea type="text" wire:model="contenido" placeholder="Escriba su contenido" class="form-control" cols="30" rows="10"></textarea>
              @error('contenido') <span style="color:red;">{{ $message }}</span> @enderror
            </div>
            <label>Imagen: </label> <br>
            <span>Formatos admitidos JPEG, JPG, PNG, peso max 2mb</span>
            <div class="form-group">
              <input id="archivo" type="file" wire:model="img" placeholder="Seleccione una imágen" class="form-control">
              @error('img') <span style="color:red;">{{ $message }}</span> @enderror
            </div>
            <div>
              <span>Imágen actual</span>
              <img style="max-height:100px;" src="{{ asset('uploads/blog/'.$blog->img )}}"></img>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="form-edit-closed" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <buttom wire:click="update"  type="reset" class="btn btn-primary btn-lg">Actualizar</buttom>
          </div>
        </form>
    </div>
  </div>
</div>



