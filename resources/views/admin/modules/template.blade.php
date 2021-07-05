@extends('adminlte::page')

@section('title', ' Eivissa Modules')

@section('content_header')
    <div class="page-header">
    <h1>Eivisa | <small>Gestor de <span class="text-capitalize">{{$module_name}}</span></small></h1>
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
                    {{--Inicia formulario de Contenido--}}
                        <div>
                            @include('admin.modules._parts.form')
                        </div>
                        <p class="h2">Galerias</p>
                    {{--Fin formulario en Contenido--}}

                    </div>
                </div>
            {{-- End New Slider Item Form  --}}

            {{-- Start SlideShow -  
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
                        <tbody id="table-edit">
                            @foreach($service as $serviceItem)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $serviceItem->titulo }}</td>
                                <td class="w-25"><img src="http://eivissadecoracio.test/storage/{{$serviceItem->imagen}}" class="card-img" alt="Service Item"></td>
                                <td>{{$serviceItem->descripcion}}</td>
                                <td>{{$serviceItem->enlace}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCustom" data-slideid="{{$serviceItem->id}}" ><i class="fas fa-pencil-alt" data-slideid="{{$serviceItem->id}}"></i></button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    --}}
                    </div>
                </div>
            {{-- End SlideShow --}}
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