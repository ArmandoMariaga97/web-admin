<div>

  @push('archivos')
  <script type="text/javascript" src="/assets/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/toastr/toastr.css">
  <script type="text/javascript" src="/assets/toastr/toastr.js"></script>
  <link rel="stylesheet" type="text/css" href="/modernadmin/app-assets/css/pages/gallery.css">
  @endpush


  <div class="row" id="default">
                      
          @if (session()->has('delete-success'))
              <script  type="text/javascript">
                    toastr.error('Entrada al BLOG ELIMINADA correctamente.', 'Bien hecho!!');
              </script>
          @endif
          @if (session()->has('update-success'))
              <script  type="text/javascript">
                    $(function(){
                      $('#form-edit-closed').click();
                    });
                    toastr.success('Entrada al BLOG ACTUALIZADA correctamente.', 'Bien hecho!!');
              </script>
          @endif
          @if (session()->has('photos-success'))
              <script  type="text/javascript">
                    $(function(){
                      $('#form-create-closed').click();
                    });
                    toastr.success('Imágenes agregadas correctamente.', 'Bien hecho!!');
              </script>
          @endif

          @include("livewire.galeria.galeria_form")

          <section id="hover-effects" class="card mt-3">
            <div class="card-header">
              <h4 class="card-title" style="font-size:24px;" align="center">Imágenes registradas en su galeria</h4>
              <hr>
            </div>
            <div class="card-content">
              <div class="card-body my-gallery">
                <div class="grid-hover row">

                  @forelse($galerias as $galeria)
                    <div class="col-md-6 col-12">
                      <figure class="effect-zoe">
                        <img src="{{ asset('uploads/galeria/'.$galeria->url_img) }}" alt="img">
                        <figcaption>
                          <h2>Creative
                            <span>Zoe</span>
                          </h2>
                          <p class="icon-links">
                            <a href="#" class="mr-1"><i class="ft-heart"></i></a>
                            <a href="#" class="mr-1"><i class="ft-eye"></i></a>
                            <a href="#" class="mr-1"><i class="ft-edit"></i></a>
                          </p>
                          <!-- <p class="description">Zoe never had the patience of her sisters. She deliberately
                            punched the bear in his face.</p> -->
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
