<div>

  @push('archivos')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  @endpush

  <div class="row" id="default">
                      

            <div class="col-md-12 col-12 mb-2" >

                <div align="right" class="mb-2">
                    <a href="{{ route('blog') }}" style="margin-right:20px;" type="button" class="btn btn-danger round btn-glow px-2">
                            Cancelar
                    </a>
                </div>

            </div>

            <div class="col-md-12" role="document">
                <div style="border: solid 1px #48D7A4; border-radius:8px;" class="modal-content">
                    <div style="background:#48D7A4; border-radius:8px 8px 0 0;" class="modal-header">
                        <h2 align="center" class="text-white"><b>Agregar entrada al BLOG</b></h2>
                    </div>

                    <form  action="#">
                    <div class="modal-body">

                        <div class="row">
                        
                        <div class="col-md-12 form-group">
                            <label>Título:</label>
                            <input type="text" wire:model.defer="titulo" placeholder="Escribra su titulo" class="form-control">
                            @error('titulo') <span style="color:red;">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <label>Imagen: <span>Formatos admitidos JPEG, JPG, PNG, peso max 2mb</span> </label> <br>
                            <input type="file" wire:model.defer="img" class="form-control">
                            @error('img') <span style="color:red;">{{ $message }}</span> @enderror
                        </div>

                        <div wire:ignore class="col-md-12">
                            <textarea type="text" wire:model.defer="contenido" id="contenido" placeholder="Escriba su contenido" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-md-12">
                            @error('contenido') <span style="color:red;">{{ $message }}</span> @enderror
                        </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <a href="{{ route('blog') }}" class="btn btn-danger">Cancelar</a>
                        <buttom wire:click="store" type="reset" class="btn btn-success">Guardar</buttom>
                    </div>

                    </form>


                </div>
            </div>

  </div>

          <script wire:ignore>
            $('#contenido').summernote({
                placeholder: 'Contenido de la entrada al BLOG',
                tabsize: 2,
                height: 120,
                toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
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

