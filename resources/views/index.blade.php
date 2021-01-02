@extends('layouts.home')

@section('contenido')


<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-1 py-1 box-shadow-3 m-0">
                <div class="card-body">
                  <span class="card-title text-center">
                    <img src="/modernadmin/app-assets/images/logo/logo-dark-lg.png" class="img-fluid mx-auto d-block pt-2"
                    width="250" alt="logo">
                  </span>
                </div>
                <div class="card-body text-center">
                  <h3>Gracias por visitarno</h3>
                  <p>El sitio web se encuentra en mantenimiento.
                    <br> Por el momento solo es accesible para los administradores.</p>
                  <div class="mt-2"><i class="la la-cog spinner font-large-2"></i></div>
                </div>
                <hr>
                <p class="socialIcon card-text text-center pt-2 pb-2">
                  <a href="{{ route('login') }}" class="btn btn-success">
                    login admin
                  </a>
                </p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>



@endsection
