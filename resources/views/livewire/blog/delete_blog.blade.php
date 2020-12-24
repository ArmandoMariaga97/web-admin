
<div wire:ignore class="modal fade text-left" id="delete-modal-{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title text-text-bold-600" id="myModalLabel33">Eliminar entrada al BLOG</label>
      </div>
        <form action="#">
          <div class="modal-body">
              <h5>Seguro dese eliminar la entrada al blog <b>( {{ $blog->titulo }} )</b> </h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
            <buttom wire:click="destroy({{ $blog->id }})"  type="reset" class="btn btn-danger" data-dismiss="modal">Eliminar</buttom>
          </div>  
        </div>

    </div>
  </div>
</div>



