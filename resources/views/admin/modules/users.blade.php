@extends('adminlte::page')

@section('title', ' Eivissa Services')

@section('content_header')
    <div class="page-header">
    <h1>Eivisa | <small>Administrador de Usuarios</small></h1>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                {{-- Start New Slider Item Form -  --}}
                    <div class="card">
                        <div class="card-body">
                            <p class="h1">Home</p>

                            <p class="h1">Contenido de la Pagina</p>
                        </div>
                    </div>

                    {{-- Start SlideShow -  --}}
                    <div class="card">
                        <div class="card-body">
                            <p class="h1">Contenido Home</p>
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">enlaces</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                            </table>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop