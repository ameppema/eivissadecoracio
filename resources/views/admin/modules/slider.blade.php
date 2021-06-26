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

                    {{-- Mostrando Errores --}}
                    @if($errors->any())
                    <x-adminlte-alert class="bg-red " icon="fa-lg fas fa-exclamation-circle" title="Error en el Formulario" dismissable>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </x-adminlte-alert>
                    
                    @endif

                        <!-- Formulario para agregar un elemento al slider -->
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <x-adminlte-input name="titulo" label="Titulo" placeholder="Titulo"
                                    fgroup-class="col-4" disable-feedback value="{{old('titulo')}}"/>
    
                                <x-adminlte-input name="descripcion" label="Descripcion" placeholder="..."
                                    fgroup-class="col-6" disable-feedback value="{{old('descripcion')}}"/>
                                
                            </div>
                                <div class="mb-3">
                                    <label for="imagen" class="form-label">Imagen</label>
                                    <input class="form-control" type="file" id="imagen-slide" name="imagen">
                                </div>
                                <div class="mb-3">
                                    <label for="imagen-movil" class="form-label">Imagen Version Movil</label>
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
                                    <td class="w-25"><img src="http://eivissadecoracio.test/storage/{{$slideItem->imagen}}" class="card-img" alt="Slide Item"></td>
                                    <td>{{$slideItem->descripcion}}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCustom" data-slideid="{{$slideItem->id}}" ><i class="fas fa-pencil-alt"></i></button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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

{{-- Modal para editar slide --}}
<x-adminlte-modal id="modalCustom" title="Editar Elemento del Slider" size="xl" theme="dark"
    icon="fas fa-bell" v-centered static-backdrop scrollable>

    <div>
            <!-- Formulario Modal para Editar un elemento al slider -->
            <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <x-adminlte-input name="titulo" label="Titulo" placeholder="Titulo"
                                    fgroup-class="col-4" disable-feedback value="{{old('titulo')}}" id="modal-titulo"/>
    
                                <x-adminlte-input name="descripcion" label="Descripcion" placeholder="..."
                                    fgroup-class="col-6" disable-feedback value="{{old('descripcion')}}" id="modal-desc" />
                                
                            </div>
                                <div class="mb-3">
                                    <label for="imagen" class="form-label">Imagen</label>
                                    <input class="form-control" type="file" id="imagen-slide-modal" name="imagen">
                                </div>
                                <div class="mb-3">
                                    <label for="imagen-movil" class="form-label">Imagen Version Movil</label>
                                    <input class="form-control" type="file" id="imagen-slide-movil-modal" name="imagen-movil">
                                </div>

                                <br>

                                <x-adminlte-button type="submit" label="Agregar al Slide" theme="primary"/>
                        </form>
    </div>

    <x-slot name="footerSlot">
        <x-adminlte-button class="mr-auto" theme="success" label="Aceptar"/>
        <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal"/>
    </x-slot>

</x-adminlte-modal>
@stop

@section('js')

    <script type="application/javascript">
        $(document).ready(() => {
            //Varibales
            let inpTitulo = $('#modal-titulo');
            let inpDesc = $('#modal-desc');

            
            // Peticion Asincrona para editar elementos
            $.ajax({
                url : 'http://eivissadecoracio.test/admin/slide/1/edit',
                data: {},
                type: 'GET',
                success: function(data){
                    if(data.success){
                        console.log(data[0]);
                    }
                },
                error: function(error){
                    console.log({error})
                    console.log({'error msg': error.responseJSON.message})
                }
            });
        })
    </script>

@stop