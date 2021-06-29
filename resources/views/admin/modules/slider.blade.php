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
                            <tbody id="table-edit">
                                @foreach($slide as $slideItem)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{ $slideItem->titulo }}</td>
                                    <td class="w-25"><img src="http://eivissadecoracio.test/storage/{{$slideItem->imagen}}" class="card-img" alt="Slide Item"></td>
                                    <td>{{$slideItem->descripcion}}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCustom" data-slideid="{{$slideItem->id}}" ><i class="fas fa-pencil-alt" data-slideid="{{$slideItem->id}}"></i></button>
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

    <div class="container">
            <!-- Formulario Modal para Editar un elemento al slider -->
            <form action="" method="post" enctype="multipart/form-data" id="Form-Edit">
                @csrf
                @method('put')
                <div class="row">
                    <x-adminlte-input name="titulo" label="Titulo" placeholder="Titulo"
                        fgroup-class="col-4" disable-feedback value="{{old('titulo')}}" id="modal-titulo"/>

                    <x-adminlte-input name="descripcion" label="Descripcion" placeholder="..."
                        fgroup-class="col-6" disable-feedback value="{{old('descripcion')}}" id="modal-desc" />
                    
                </div>
                    
                    <div>

                        <p class="h3">Imagen Anterior</p>
                        <img class="img-fluid w-50" src="" alt="Imagen anterior Slide" id="oldImgDesk">

                        <div class="mb-3">
                            <label for="imagen" class="h2">Subir Imagen Nueva</label>
                            <input class="form-control w-50" type="file" id="imagen-slide-modal" name="imagenNueva">
                        </div>

                        <p class="h3">Imagen Movil Anterior</p>
                        <img class="img-fluid w-25" src="" alt="Imagen anterior Slide" id="oldImgMovil">

                        <div class="mb-3">
                            <label for="imagenMovilNueva" class="form-label h2">Subir Imagen Version Movil Nueva</label>
                            <input class="form-control w-50" type="file" id="imagen-slide-movil-modal" name="imagenMovilNueva">
                        </div>

                    </div>

                    <br>

                    <x-adminlte-button type="submit" label="Agregar al Slide" theme="primary"/>
            </form>
    </div>

    <x-slot name="footerSlot">
        <x-adminlte-button type="submit" class="mr-auto" theme="success" label="Aceptar" id="EnviarModalEditar"/>
        <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal"/>
    </x-slot>

</x-adminlte-modal>
@stop

@section('js')
<script type="application/javascript">

    const URL_BASE = 'http://eivissadecoracio.test/admin/slide/'

        $(document).ready(() => {

            // Obteniendo datos a editar
            $('#table-edit').on('click', function(e) {
                let _target = e.target;

                if(_target.classList.contains('btn-warning') | _target.classList.contains('fa-pencil-alt'))
                {
                    let SlideId = _target.getAttribute('data-slideid')
                    // Peticion Asincrona para editar elementos
                    $.ajax({
                        url : 'http://eivissadecoracio.test/admin/slide/'+SlideId+'/edit',
                        data: {},
                        type: 'GET',
                        success: function(data){
                            if(data){      
                                console.log(data[0]); //Debug

                                $('#Form-Edit').attr('action', 'http://eivissadecoracio.test/admin/slide/' + data[0].id)

                                $('#modal-titulo').val(data[0].titulo);
                                $('#modal-desc').val(data[0].descripcion);
                                $('#oldImgDesk').attr('src' , 'http://eivissadecoracio.test/storage/' + data[0].imagen);
                                $('#oldImgMovil').attr('src' , 'http://eivissadecoracio.test/storage/' + data[0].imagen_movil);
                            }
                        },
                        error: function(error){
                            console.log({error})
                            console.log({'error msg': error.responseJSON.message})
                        }
                    });
                }
            });

            $('#EnviarModalEditar').on('click', function(){
                $('#Form-Edit').submit();
            })
        })
</script>

@stop