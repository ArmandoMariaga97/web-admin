<div>

    @if (session()->has('update-name'))
        <script  type="text/javascript">
            toastr.success('Nombre actualizado correctamente.', 'Bien hecho!!');
        </script>
    @endif

    @if (session()->has('update-img'))
        <script  type="text/javascript">
            toastr.success('Imágen actualizada correctamente.', 'Bien hecho!!');
        </script>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
              <div class="text-center">
                <div class="card-body contenedor-img-profile">
                    @auth
                    <img src="/img/avatar/{{ auth()->user()->avatar }}" class="rounded-circle img-profile" alt="Card image">
                    @endauth
                </div>

                <div class="card-body">

                    @if($form_password)
                    
                        <div class="">
                            <h3 align="center">Cambiar contraseña</h3>
                        </div>
                        
                        @if($password_ok == 'failed')
                        <div style="max-width:500px; margin-left:auto; margin-right:auto;" class="alert alert-icon-left alert-danger alert-dismissible mb-2" role="alert">
                            <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                                <strong>Lo sentimos!</strong> La contraseña <strong>Actual </strong> no es la correcta.
                        </div>
                        @endif

                        @if($confir_password == 'failed')
                        <div style="max-width:500px; margin-left:auto; margin-right:auto;" class="alert alert-icon-left alert-danger alert-dismissible mb-2" role="alert">
                            <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                                <strong>Lo sentimos!</strong> La contraseña <strong>Nueva </strong> no coincide.
                        </div>
                        @endif

                        <div class="mt-1">
                            <!-- <label for="password">Contraseña Actual:</label> -->
                            <input style="max-width:500px; margin-left:auto; margin-right:auto; border: solid 1px green;" type="{{ $show_password }}" class="form-control" wire:model.defer="password" placeholder="Contraseña actual">
                            @error('password') <span style="color:red;">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-1">
                            <!-- <label for="password">Contraseña Nueva:</label> -->
                            <input style="max-width:500px; margin-left:auto; margin-right:auto; border: solid 1px blue;" type="{{ $show_password }}" class="form-control" wire:model.defer="password1" placeholder="Contraseña nueva">
                            @error('password1') <span style="color:red;">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-1">
                            <!-- <label for="password">Confirmar Nueva:</label> -->
                            <input style="max-width:500px; margin-left:auto; margin-right:auto; border: solid 1px blue;" type="{{ $show_password }}" class="form-control" wire:model.defer="password2" placeholder="Confirmar contraseña nueva">
                            @error('password2') <span style="color:red;">{{ $message }}</span> @enderror
                        </div>
                        <div style="max-width:500px; margin-left:auto; margin-right:auto;" class="mt-1">
                            <button wire:click="show_password" style="float:right;" class="btn btn-warning"> <i class="icon-eye"></i> </a>
                        </div>

                    @endif

                    @if($select_image)
                        <h4 class="card-title" >
                            <label for="img">Archivos admitidos (JPG,PNG), peso Max 2mb.</label>
                            <input style="max-width:500px; margin-left:auto; margin-right:auto;" type="file" class="form-control" wire:model.defer="img" placeholder="Seleccionar imágen">
                            @error('img') <span style="color:red;">{{ $message }}</span> @enderror
                        </h4>
                    @endif

                    @if($form_nombre)
                        <h4 class="card-title" >
                            <input style="max-width:500px; margin-left:auto; margin-right:auto;" type="text" class="form-control" wire:model.defer="name" placeholder="Nombre o Nick">
                            @error('name') <span style="color:red;">{{ $message }}</span> @enderror
                        </h4>
                    @endif

                    @if(!$form_nombre and !$select_image and !$form_password)
                        <h4 class="card-title">{{ auth()->user()->name }}</h4>
                        <h6 class="card-subtitle text-muted">{{ auth()->user()->email }}</h6>
                    @endif

                </div>
                <div class="text-center">
                    @if(!$form_nombre and !$select_image and !$form_password)
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <a align="center" wire:click="open_form" class="text-white btn btn-outline btn-success mr-1 mb-1">
                                    <span>Cambiar Nombre</span>
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a align="center" wire:click="open_img" class="text-white btn btn-outline btn-primary mr-1 mb-1">
                                    <span>Cambiar Imágen</span>
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a align="center" wire:click="form_password" class="text-white btn btn-outline btn-danger mr-1 mb-1">
                                    <span>Cambiar Contraseña</span>
                                </a>
                            </div>
                        </div>
                    @endif

                    @if($form_nombre)
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <a style="align:right;" wire:click="open_form" class="text-white btn btn-outline btn-danger mr-1 mb-1">
                                    <span>Cancelar</span>
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a wire:click="update" class="text-white btn btn-outline btn-success mr-1 mb-1">
                                    <span>Actualizar</span>
                                </a>
                            </div>
                        </div>
                    @endif

                    @if($select_image)
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <a style="align:right;" wire:click="open_img" class="text-white btn btn-outline btn-danger mr-1 mb-1">
                                    <span>Cancelar</span>
                                </a>
                            </div>
                            @if($img)
                                <div class="col-md-2">
                                    <a wire:click="updateimg" class="text-white btn btn-outline btn-success mr-1 mb-1">
                                        <span>Actualizar </span>
                                    </a>
                                </div>
                            @else
                                <div class="col-md-2">
                                    <a class="text-white btn btn-outline btn-secondary mr-1 mb-1" disabled>
                                        <span>Actualizar </span>
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif

                    @if($form_password)
                        <div style="max-width:500px; margin-left:auto; margin-right:auto;">
                            <div class="row">
                                <div class="col-md-3">
                                    <a style="align:right;" wire:click="form_password" class="text-white btn btn-outline btn-danger mr-1 mb-1">
                                        <span>Cancelar</span>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a wire:click="reset_password" class="text-white btn btn-outline btn-success mr-1 mb-1">
                                        <span>Actualizar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
