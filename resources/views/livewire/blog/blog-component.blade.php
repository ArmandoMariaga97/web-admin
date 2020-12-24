<div>

    @include("livewire.blog.create_blog")

  @push('archivos')
  <script type="text/javascript" src="/assets/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/toastr/toastr.css">
  <script type="text/javascript" src="/assets/toastr/toastr.js"></script>
  @endpush

  <div class="row" id="default">

          <div wire:ignore align="right" style="width:300px; margin:20px;" class="col-md-12 col-12">
            <button  style="margin-right:20px;" type="button" class="btn btn-success round btn-glow px-2" data-toggle="modal" data-target="#created-modal">
              Agregar
            </button>
          </div>

                      
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
                    toastr.warning('Entrada al BLOG ACTUALIZADA correctamente.', 'Bien hecho!!');
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
          
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Entradas al BLOG</h2>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                </div>
              </div>
              <div class="card-content collapse show">
                <div class="table-responsive">
                  <table class="table mb-0">
                    <thead>
                      <tr>
                        <th style="width:30%;">Título</th>
                        <th style="width:60%;">Contenido</th>
                        <th style="width:10%;" colspan="2">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($blogs as $blog)
                            <tr>
                                <td  align="center">
                                  {{ Str::limit($blog->titulo , 80) }} 
                                  <br>
                                  <img style="max-height:100px;" src="{{ asset('uploads/blog/'.$blog->img )}}"></img>
                                  <br>
                                  {{$blog->created_at}}
                                </td>
                                <td>{{ Str::limit($blog->contenido , 500) }}</td>
                                <td  align="center">
                                    <li style="list-style:none;">
                                        <ul>
                                            <buttom class="btn btn-warning" title="Ver Blog"><i class="icon-eye"></i></buttom>
                                        </ul>
                                        <ul>
                                            <buttom wire:click="edit({{ $blog->id }})" data-toggle="modal" data-target="#edit-modal-{{ $blog->id }}" class="btn btn-success" title="Editar Blog"><i class="icon-note"></i></buttom>
                                        </ul>
                                        <ul>
                                            <buttom data-toggle="modal" data-target="#delete-modal-{{ $blog->id }}" class="btn btn-danger" title="Eliminar Blog"><i class="icon-close"></i></buttom>
                                        </ul>
                                    </li>
                                </td>
                            </tr>
                            @include("livewire.blog.edit_blog")
                            @include("livewire.blog.delete_blog")

                        @empty
                            <td align="center" colspan="4">No has agregado contenido a tu BLOG</td>
                        @endforelse
                    </tbody>
                  </table>
                  {{ $blogs->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
