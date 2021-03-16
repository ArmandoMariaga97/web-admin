<div>

  @push('archivos')

  <link rel="stylesheet" type="text/css" href="/modernadmin/app-assets/css/pages/gallery.css">
  <link rel="stylesheet" type="text/css" href="/modernadmin/app-assets/css/plugins/loaders/loaders.min.css">
  <link rel="stylesheet" type="text/css" href="/modernadmin/app-assets/css/core/colors/palette-loader.css">

  @endpush


  @include("livewire.galeria.alerts")


  <div class="row" id="default">

          @include("livewire.galeria.galeria_form")

          <section id="hover-effects" class="card mt-3 col-md-12">
            <div class="card-header">
              <h4 class="card-title" style="font-size:24px;" align="center">IMÁGENES REGISTRADAS EN SU GALERIA</h4>
              <hr>
            </div>
            <div class="card-content">
              <div class="card-body my-gallery">
                <div class="grid-hover row">

                  @forelse($galerias as $galeriaItem)

                    <div class="col-md-6 col-12 contenedor-img-galeria-w">
                      <figure style="border:solid 2px #2c303b;" class="effect-zoe">
                        <img class="img-galeria-w" src="{{ asset('uploads/'.$galeriaItem->url_img) }}" alt="img">
                        <figcaption>
                          <p style="color:#2c303b; float:left;"><b>Creada:</b> {{ $galeriaItem->created_at }}
                          </p>
                          <p class="icon-links">
                            <a data-toggle="modal" data-target="#delete-modal-{{ $galeriaItem->id }}" class="mr-1" title="Eliminar Imagen"><i class="ft-delete"></i></a>
                            <a data-toggle="modal" data-target="#show-modal-{{ $galeriaItem->id }}" class="mr-1" title="Ver Imagen"><i class="ft-eye"></i></a>
                          </p>
                        </figcaption>
                      </figure>
                    </div>

                    @include("livewire.galeria.delete")
                    @include("livewire.galeria.show")

                  @empty

                      <div class="col-md-12">
                        <P align="center">Su galeria está vacia</P>
                      </div>

                  @endforelse

                </div>
              </div>
            </div>
            <!--/ Image grid -->
          </section>

    </div>
</div>
