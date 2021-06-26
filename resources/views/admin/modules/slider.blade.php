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
                        @foreach($slide as $slideItem)
                        {{--
                        <article class="white-panel">
                        <img src="http://eivissadecoracio.test/storage/{{$slideItem->imagen}}" alt="imagen slider">
                            <h4><a href="#">{{$slideItem->titulo}}</a></h4>
                            <p>
                            {{$slideItem->descripcion}}
                            </p>
                        </article>
                        --}}
                        
                            <!-- <div class="card bg-dark text-white" >
                                <img src="http://eivissadecoracio.test/storage/{{$slideItem->imagen}}" class="card-img" alt="...">
                                <div class="card-img-overlay">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text">Last updated 3 mins ago</p>
                                </div>
                            </div> -->
                        

                        @endforeach

                        <!-- Tabla de imagenes en el slider -->

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($slide as $slideItem)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{ $slideItem->titulo }}</td>
                                    <td class="w-25"><img src="http://eivissadecoracio.test/storage/{{$slideItem->imagen}}" class="card-img" alt="..."></td>
                                    <td>{{$slideItem->descripcion}}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" id="btn-editar-slideItem"><i class="fas fa-pencil-alt"></i></button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" id="btn-borrar-slideItem"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
<!-- Final tabla -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop