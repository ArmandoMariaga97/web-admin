<div>

  @push('archivos')
  <script type="text/javascript" src="/assets/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/toastr/toastr.css">
  <script type="text/javascript" src="/assets/toastr/toastr.js"></script>
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

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Imágenes registradas en galeria</h2>
               

              </div>

            </div>
          </div>
        </div>
</div>
