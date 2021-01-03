<div>

  @push('archivos')

  <script type="text/javascript" src="/assets/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/toastr/toastr.css">
  <script type="text/javascript" src="/assets/toastr/toastr.js"></script>
  <link rel="stylesheet" type="text/css" href="/modernadmin/app-assets/css/pages/gallery.css">
  <link rel="stylesheet" type="text/css" href="/modernadmin/app-assets/css/plugins/loaders/loaders.min.css">
  <link rel="stylesheet" type="text/css" href="/modernadmin/app-assets/css/core/colors/palette-loader.css">

  @endpush

  @include("livewire.galeria.alerts")


  <div class="row" id="default">

          @include("livewire.galeria.galeria_form")

          <section id="hover-effects" class="card mt-3 col-md-12">
            <div class="card-header">
              <h4 class="card-title" style="font-size:24px;" align="center">Imágenes registradas en su galeria</h4>
              <hr>
            </div>
            <div class="card-content">
              <div class="card-body my-gallery">
                <div class="grid-hover row">

                  @forelse($galerias as $galeria)

                    <div class="col-md-6 col-12 contenedor-img-galeria-w">
                      <figure style="border:solid 2px #2c303b;" class="effect-zoe">
                        <img class="img-galeria-w" src="{{ asset('uploads/galeria/'.$galeria->url_img) }}" alt="img">
                        <figcaption>
                          <h2 style="color:#2c303b;">Acciones
                          </h2>
                          <p class="icon-links">
                            <a wire:click="delete({{ $galeria->id }})" class="mr-1" title="Eliminar Imagen"><i class="ft-delete"></i></a>
                            <a href="#" class="mr-1" title="Editar Imagen"><i class="ft-edit"></i></a>
                            <!-- <a href="#" class="mr-1" title="Ver Imagen"><i class="ft-eye"></i></a> -->
                          </p>
                        </figcaption>
                      </figure>
                    </div>

                  @empty

                      <div class="col-md-12">
                        <P align="center">su galeria está vacia</P>
                      </div>

                  @endforelse

                </div>
              </div>
            </div>
            <!--/ Image grid -->
          </section>

    </div>
</div>
