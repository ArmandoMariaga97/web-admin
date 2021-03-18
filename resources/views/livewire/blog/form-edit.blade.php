
<div wire:ignore class="modal fade text-left" id="form-edit-{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">

  <div wire:reload class="modal-dialog modal-lg" role="document">
    <div style="border: solid 1px #0AACE3; border-radius:8px;" class="modal-content">
        <div style="background:#0AACE3; border-radius:8px 8px 0 0;" class="modal-header">
            <h2 align="center" class="text-white"><b>Editar entrada al BLOG</b></h2>
        </div>

        <form  action="#">
          <div class="modal-body">

            <div class="row">
            
              <div class="col-md-12 form-group">
                <label>Título:</label>
                  <input type="text" wire:model="titulo" placeholder="Escribra su titulo" class="form-control">
                  @error('titulo') <span style="color:red;">{{ $message }}</span> @enderror
              </div>

              <div class="col-md-12 form-group">
                <label>Imagen: <span>Formatos admitidos JPEG, JPG, PNG, peso max 2mb</span> </label> <br>
                  <input type="file" wire:model="img" class="form-control">
                  @error('img') <span style="color:red;">{{ $message }}</span> @enderror
              </div>

              <div class="col-md-12">
                <textarea type="text" wire:model="contenido" id="contenido{{ $blog->id }}" placeholder="Escriba su contenido" class="form-control" cols="30" rows="10">{{ $blog->contenido }}</textarea>
              </div>

            </div>

          </div>

          <div class="modal-footer">
            <button wire:click="limpiarDatos" type="button" id="form-create-closed" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <buttom wire:click="update"  type="reset" class="btn btn-success">Actualizar</buttom>
          </div>

        </form>


        <script>
            $('#contenido{{ $blog->id }}').summernote({
                placeholder: 'contenido de la entrada al BLOG',
                tabsize: 2,
                height: 120,
                toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview']]
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('contenido', contents);
                    }
                }
            });
         </script>

    </div>
  </div>
</div>



