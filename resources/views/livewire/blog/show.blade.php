
<div wire:ignore class="modal fade text-left" id="show-{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">

  <div wire:reload class="modal-dialog modal-lg" role="document">

    <div style="border: solid 1px #FFA264; border-radius:8px;" class="modal-content">
        <div style="background:#FFA264; border-radius:8px 8px 0 0;" class="modal-header">
        </div>

        <div class="m-1">
            <h2 align="center" class="fw-bolder"><b>{{ $blog->titulo }}</b></h2>
        </div>

        <div class="">
            <img style="width:60%; border-radius:10px; margin-left:20%;" src="{{ asset('uploads/'.$blog->img )}}"></img>
        </div>

        <div class="m-1">
            {!! $blog->contenido !!}
        </div>


        <div class="modal-footer">
        <button wire:click="limpiarDatos" type="button" id="form-create-closed" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </div>


  </div>
</div>



