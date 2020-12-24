@extends('layouts.app')

@section('contenido')
<br><br>
<h1 align="center">¿Qué quieres hacer hoy?</h1>
<br><br>
<div class="row">
    <div class="col-lg-4 col-12">
      <div class="card pull-up">
        <a href="{{ route('blog') }}">
            <div class="card-content">
            <div class="card-body">
                <div class="media d-flex">
                <div class="media-body text-left">
                    <h6 class="text-muted">Gestionar</h6>
                    <h3>Gestionar BLOG</h3>
                </div>
                <div class="align-self-center">
                    <i class="icon-book-open success font-large-2 float-right"></i>
                </div>
                </div>
            </div>
            </div>
        </a>
      </div>
    </div>
    <div class="col-lg-4 col-12">
      <div class="card pull-up">
        <a href="{{ route('galeria') }}">
            <div class="card-content">
            <div class="card-body">
                <div class="media d-flex">
                <div class="media-body text-left">
                    <h6 class="text-muted">Gestionar</h6>
                    <h3>GALERIA</h3>
                </div>
                <div class="align-self-center">
                    <i class="icon-picture primary font-large-2 float-right"></i>
                </div>
                </div>
            </div>
            </div>
        </a>
      </div>
    </div>
    <div class="col-lg-4 col-12">
      <div class="card pull-up">
        <a href="{{ route('promociones') }}">
            <div class="card-content">
            <div class="card-body">
                <div class="media d-flex">
                <div class="media-body text-left">
                    <h6 class="text-muted">Gestionar</h6>
                    <h3> PROMOCIONES</h3>
                </div>
                <div class="align-self-center">
                    <i class="icon-badge danger font-large-2 float-right"></i>
                </div>
                </div>
            </div>
            </div>
        </a>
      </div>
    </div>
</div>

@endsection