@if (session()->has('delete-img-success'))
    <script  type="text/javascript">
          toastr.error('Imagen ELIMINADA de la galeria con exito.', 'Bien hecho!!');
    </script>
    {{ session('delte-img-success')  }}
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