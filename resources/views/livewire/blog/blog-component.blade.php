<div x-data="{open: @entangle('open'), 
            form_create: @entangle('form_create'),
}">

  @push('archivos')
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
  @endpush

  <div class="row" id="default">
                      
          @include("livewire.blog.alerts")

          @include("livewire.blog.forms_blog")

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 align="center" class="card-title">ENTRADAS AL BLOG</h2>
              </div>
              <div class="card-content collapse show">
                <div class="table-responsive">
                  <table class="table mb-0">
                    <thead>
                      @if($blogs->count() > 0)
                        <tr>
                          <th style="width:30%;">Título</th>
                          <th style="width:60%;">Contenido</th>
                          <th style="width:10%;" colspan="2">&nbsp;</th>
                        </tr>
                      @endif
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
                                            <a href="#default" wire:click="edit({{ $blog->id }})" class="btn btn-success" title="Editar Blog"><i class="icon-note"></i></a>
                                        </ul>
                                        <ul>
                                            <buttom data-toggle="modal" data-target="#delete-modal-{{ $blog->id }}" class="btn btn-danger" title="Eliminar Blog"><i class="icon-close"></i></buttom>
                                        </ul>
                                    </li>
                                </td>
                            </tr>
                            @include("livewire.blog.delete_blog")

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
</div>
