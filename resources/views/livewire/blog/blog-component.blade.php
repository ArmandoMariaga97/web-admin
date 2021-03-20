<div x-data="{open: @entangle('open'), 
            form_create: @entangle('form_create'),
          }">

  @push('archivos')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  @endpush

  <div class="row" id="default">

          @include("livewire.blog.alerts")
                      

          <div class="col-md-12 col-12 mb-2" >

            <div align="right" class="mb-2">
                <a href="{{ route('blogcreated') }}" style="margin-right:20px;" type="button" class="btn btn-success round btn-glow px-2">
                      Agregar
                </a>
            </div>

          </div>

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 align="center" class=""><b>ENTRADAS AL BLOG</b></h2>
              </div>

              <div class="card-content collapse show">
                <div class="table-responsive">
                  <table class="table mb-0">
                    <thead>
                      @if($blogs->count() > 0)
                        <tr>
                          <th style="width:30%;">Imágen</th>
                          <th style="width:50%;">Título</th>
                          <th style="width:20%;" colspan="2">Acción</th>
                        </tr>
                      @endif
                    </thead>
                    <tbody>
                        @forelse($blogs as $blog)
                            <tr>
                                <td  align="center">
                                  <br>
                                  <img style="max-width:150px;" src="{{ asset('uploads/'.$blog->img )}}"></img>
                                  <br>
                                  {{$blog->created_at}}
                                </td>

                                <td>
                                  <h3><b>{{ Str::limit($blog->titulo , 80) }} </b></h3>
                                </td>

                                <td  align="center">
                                    <li style="list-style:none;">
                                        <ul>
                                            <buttom data-toggle="modal" data-target="#show-{{ $blog->id }}" class="btn btn-warning" title="Ver Blog"><i class="icon-eye"></i></buttom>
                                        </ul>
                                        <ul>
                                          <buttom data-toggle="modal" wire:click="edit({{ $blog->id }})" data-target="#form-edit-{{ $blog->id }}" class="btn btn-success" title="Editar Blog"><i class="icon-note"></i></buttom>
                                        </ul>
                                        <ul>
                                            <buttom data-toggle="modal" data-target="#delete-modal-{{ $blog->id }}" class="btn btn-danger" title="Eliminar Blog"><i class="icon-close"></i></buttom>
                                        </ul>
                                    </li>
                                </td>
                            </tr>

                            @include("livewire.blog.form-edit")
                            @include("livewire.blog.delete_blog")
                            @include("livewire.blog.show")

                        @empty
                            <td align="center" colspan="4">No has agregado contenido a tu BLOG</td>
                        @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
  
  </div>

          <script>
            $('#contenido').summernote({
                placeholder: 'contenido de la entrada al BLOG',
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
