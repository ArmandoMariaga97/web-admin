@extends('layouts.app')

@section('content')

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <img src="/modernadmin/app-assets/images/logo/logo-dark.png" alt="branding logo">
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Web Admin</span>
                  </h6>
                </div>
                @if (session()->has('password_update'))
                  <div style="max-width:500px; margin-left:auto; margin-right:auto;" class="alert alert-icon-left alert-success alert-dismissible mb-2" role="alert">
                      <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">×</span>
                        </button>
                      <strong>Actualizacion exitosa!</strong> La contraseña <strong>se actualizó </strong> con exito, por favor inicie sesión nuevamente.
                  </div>
                @endif
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal"  method="POST" action="{{ route('login') }}">
                    @csrf  
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Your Username"
                        required>
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </fieldset>
                      <div>
                        @error('email') <span style="color:red;">{{ $message }}</span> @enderror
                      </div>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Enter Password"
                        required>
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                      </fieldset>
                      @error('password') <span style="color:red;">{{ $message }}</span> @enderror
                      <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-sm-left">
                          <fieldset>
                            <input type="checkbox" id="remember-me" class="chk-remember">
                            <label for="remember-me"> Recordar</label>
                          </fieldset>
                        </div>
                        <div class="col-md-6 col-12 float-sm-left text-center text-sm-right">
                            <a href="#" class="card-link">Recuperar contraseña</a>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection
