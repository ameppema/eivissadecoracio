@extends('adminlte::page')

@section('title', ' Eivissa Slider')

@section('content_header')
    <div class="page-header">
    <h1>Panel de Administración Eivisa | <small>Gestor de Slider</small></h1>
    </div>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <x-adminlte-input name="titulo" label="Titulo" placeholder="Titulo"
                                    fgroup-class="col-4" disable-feedback/>
    
                                <x-adminlte-input name="descripcion" label="Descripcion" placeholder="..."
                                    fgroup-class="col-6" disable-feedback/>
                                
                            </div>
                                <div class="mb-3">
                                    <label for="imagen" class="form-label">Imagen</label>
                                    <input class="form-control" type="file" id="imagen-slide" name="imagen">
                                </div>
                                <div class="mb-3">
                                    <label for="imagen" class="form-label">Imagen Version Movil</label>
                                    <input class="form-control" type="file" id="imagen-slide-movil" name="imagen-movil">
                                </div>

                                <br>

                                <x-adminlte-button type="submit" label="Agregar al Slide" theme="primary"/>
                        </form>

                    </div>
                </div>

                <!-- Start SlideShow -->
                <div class="card">
                    <div class="card-body">
                    <section id="pinBoot">
                        @foreach($slide as $slideItem)

                        <article class="white-panel">
                        <img src="http://eivissadecoracio.test/storage/{{$slideItem->imagen}}" alt="imagen slider">
                            <h4><a href="#">{{$slideItem->titulo}}</a></h4>
                            <p>
                            {{$slideItem->descripcion}}
                            </p>
                        </article>
                        
                        @endforeach
                    </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop