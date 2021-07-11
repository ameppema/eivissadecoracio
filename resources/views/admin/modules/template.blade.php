@extends('adminlte::page')

@section('title', ' Eivissa Modules')

@section('content_header')
    <div class="page-header">
    <h1 class="text-capitalize">Eivisa | {{$module_name}}</h1>
    </div>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

            
            {{-- Start ContentShow
                <div class="card">
                    <div class="card-body">

                    <p class="h1">Contenido Home</p>
                        
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Imagen Principal</th>
                                <th scope="col">Subtitulo</th>
                                <th scope="col">Texto Principal</th>
                                <th scope="col">Texto Secundario</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="table-edit">
                            
                            <tr>
                                <th scope="row">{{$module->id}}</th>
                                <td>{{ $module->titulo }}</td>
                                <td class="w-25"><img src="http://eivissadecoracio.test/storage/{{$module->imagen_principal}}" class="card-img" alt="Service Item"></td>
                                <td>{{$module->subtitulo}}</td>
                                <td>{{$module->texto_principal}}</td>
                                <td>{{$module->texto_secundario}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCustom" data-slideid="{{$module->id}}" ><i class="fas fa-pencil-alt" data-slideid="{{$module->id}}"></i></button>
                                    <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    
                    </div>
                </div>
            End SlideShow --}}
            {{-- Start Main Content --}}
            <div class="card">
                <div class="card-body">

                <div class="jumbotron jumbotron-fluid" ">
                    <div class="container">
                        <h1 class="display-4 text"><small class="text-muted">Titulo:</small> {{$module->titulo}}</h1>
                        <h2><small class="text-muted">SubTitulo:</small> {{$module->subtitulo}}</h2>
                        <hr class="my-4">
                        <p class="h3"><small class="text-muted">Texto Principal:</small> {{ $module->texto_principal }}</p>
                        <hr class="my-4">
                        <p class="h3"><small class="text-muted">Texto Secundario:</small> {{ $module->texto_secundario }}</p>
                    </div>
                </div>

                <img src="/storage/{{$module->imagen_principal}}" alt="{{$module->titulo}} img" class="img-thumbnail w-25">

                </div>
            </div>

            {{-- End Jumbotrone --}}

            {{-- Start New Slider Item Form -  --}}
                <div class="card">
                    <div class="card-body">
                    {{--Inicia formulario de Contenido--}}
                        <div>
                            @include('admin.modules._parts.form')
                        </div>
                        <p class="h2">Galerias</p>
                    {{--Fin formulario en Contenido--}}

                    </div>
                </div>
            {{-- End New Slider Item Form  --}}

            </div>
        </div>
    </div>
</section>

@stop

@section('js')
    <script type="application/javascript">
        var alertList = document.querySelectorAll('.alert')
            alertList.forEach(function (alert) {
            new bootstrap.Alert(alert)
            })
    </script>
@stop