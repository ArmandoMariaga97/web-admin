<div x-data="{open: @entangle('open')}" x-init="open = false" class="col-md-12 col-12 " >

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

      <div class="card-body row">
        <div class="col-md-12">
            @error('photos.*') 
              <div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2 col-md-12" role="alert">
                <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Algo anda mal!</strong> Algunos de los elementos cargados <a href="#" class="alert-link">NO CUMPLEN</a>                          
                con los requerimientos para ser agregados al sistema, por favor corrija u omita estos archivos para que puedan ser registrados con exito.
              </div>
            @enderror
        </div>

        <div wire:loading.remove class="col-md-12 row justify-content-center  mb-3">
            <div class="col-md-6 file-select" id="src-file1">
                  <input type="file" name="src-file1" aria-label="Archivo" wire:click="limpiarphotos"  wire:model="photos" multiple>
            </div>
        </div>

        <div style="color:green;" class="col-md-12 row justify-content-center  mb-3">
            <div wire:loading class="col-md-6">
                <div align="center" class="loader-wrapper">
                  <div class="loader-container">
                    <div class="ball-pulse loader-primary">
                      <div></div>
                      <div></div>
                      <div></div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    

        @if ($photos)
              
        <div class="col-md-12 row justify-content-center">

            @foreach($photos as $photo)

              <p style="display:none;"> 
                  {{ $file = $photo->getClientOriginalName() }}
                  {{ $extension = pathinfo($file, PATHINFO_EXTENSION) }}
                  {{ $tamano = $photo->getSize() }}
              </p>
        
              <div class="col-md-3 col-lg-4 contenedor-img-preview">

                  @if($extension != 'png' and $extension != 'jpg' and $extension != 'jpeg')
                  
                  <div style=" background:rgba(0,0,0,0.3); color:white; padding:10px;" class="img-errors-view img-preview">
                    <p align="center"><b style="color:red;">Imagen invalida.</b></p>  
                    <h3 align="center" style="font-size:35px; color:white;"> <i class="icon-picture"></i> </h3>
                    <p align="justify">
                      El archivo: 
                      <b>{{ $file }}</b> <br>
                      no tiene alguna de las siguientes extensiones (.JPG, .JPEG, .PNG) <br>
                    </p>
                    <p align="center">
                      <a wire:click="deleteForPhotos('{{$cont}}')" class="btn btn-warning mt-1">Omitir elemento</a>
                    </p>
                  </div>

                  @elseif($tamano > 1000000) 

                  <div style=" background:rgba(0,0,0,0.3); color:white; padding:10px;" class="img-errors-view img-preview">
                    <p align="center"><b style="color:red;">Tamaño invalido.</b></p>  
                    <h3 align="center" style="font-size:35px; color:white;"> <i class="icon-picture"></i> </h3>
                    <p align="justify">
                      El archivo: 
                      <b>{{ $file }}</b> <br>
                      Tiene un tamaño superior a <b>(2mb)</b>, tamaño máximo permitido. <br>
                    </p>
                    <p align="center">
                      <a wire:click="deleteForPhotos('{{$cont}}')" class="btn btn-warning mt-1">Omitir elemento</a>
                    </p>
                  </div>

                  @else

                    <img class="img-success-view img-preview" src="{{ $photo->temporaryUrl() }}"> 
                  
                  @endif
              </div>
                      
              <p style="display:none;">
              {{ $cont++ }}</p>

            @endforeach
          
        </div>
        @endif

      </div> 
    </div>
  </div>

</div>

