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

@if (session()->has('store-success'))
    <script  type="text/javascript">
          $(function(){
            $('#form-create-closed').click();
          });
          toastr.success('Entrada al BLOG AGREGADA correctamente.', 'Bien hecho!!');
    </script>
@endif


