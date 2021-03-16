<div class="modal fade text-left" id="delete-modal-{{ $galeriaItem->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div style="border: solid 1px red; border-radius:8px;" class="modal-content">
        <div style="background:#FF6C6C; border-radius:8px 8px 0 0;" class="modal-header">
          <label class="modal-title text-white text-text-bold-600" >¿Seguro desea remover la siguiente imágen de su galeria?</label>
        </div>
        <form action="#">
            <div class="modal-body">
                <img style="max-width:100%;" src="{{ asset('uploads/'.$galeriaItem->url_img) }}" alt="img">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
              <buttom wire:click="delete({{ $galeriaItem->id }})"  type="reset" class="btn btn-danger" data-dismiss="modal">Eliminar</buttom>
            </div>  
        </form>

    </div>
  </div>
</div>