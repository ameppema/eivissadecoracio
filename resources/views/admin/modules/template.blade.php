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
                        <p class="h3"><small class="text-muted">Texto Principal:</small> {{ $module->texto_principal ? $module->texto_principal : 'Sin Texto' }}</p>
                        <hr class="my-4">
                        <p class="h3"><small class="text-muted">Texto Secundario:</small> {{ $module->texto_secundario ? $module->texto_secundario : 'Sin Texto' }}</p>
                        <hr class="my-4">
                        <p class="h3"><small class="text-muted">Texto Tres: </small> {{ $module->texto_tres ? $module->texto_tres : 'Sin Texto' }}</p>
                    </div>
                </div>

                <p class="h3">Imagen</p>
                @if($module->imagen_principal)
                    <img src="/storage/{{$module->imagen_principal}}" alt="{{$module->titulo}} img" class="img-thumbnail w-25">
                @else
                    <h3 class="text-warning">Sin Imagen Movil</h3>
                @endif
                <hr class="my-4">
                <p class="h3">Imagen Movil</p>
                @if($module->imagen_movil)
                    <img src="/storage/{{$module->imagen_movil}}" alt="{{$module->titulo}} img" class="img-thumbnail w-25">
                @else
                    <h3 class="text-warning">Sin Imagen Movil</h3>
                @endif

                </div>
            </div>

            {{-- End Jumbotrone --}}

            {{-- Start New Content Form -  --}}
            <div class="card">
                <div class="card-body">
                    {{--Inicia formulario de Contenido--}}
                    <div>
                        @include('admin.modules._parts.form')
                    </div>
                    {{--Fin formulario en Contenido--}}
                    
                </div>
            </div>
            {{-- End New Content Form  --}}

            {{-- Start New Gallery Form -  --}}
            <div class="card">
                <div class="card-body">
                    <p class="h1" >Galerias</p>
                    <br>
                    <p class="h2">Galeria 1</p>
                    <div class="mb-4">
                        {{-- Formulario para agregar un elemento --}}
                        @include('admin.modules._parts.formGallery')
                        {{-- Fin Formulario  --}}
                    </div>

                    {{-- Main Table --}}
                    <div class="row">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Alt</th>
                                <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($galleryOne as $gallery)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td class="w-50"><img class="w-50" src="/storage/{{$gallery->image_src}}" alt="{{$gallery->image_alt}}"></td>
                                    <td>{{$gallery->image_alt}}</td>
                                    <td>
                                        <!-- #acciones -->
                                    <button title="Editar"  class="btn btn-warning edit-category" data-toggle="modal" data-target="#editImageModal" data-image-id="{{$gallery->id}}"><i class="fas fa-edit"></i></button>
                                        <form action="{{route('admin.gallery.image.update', ['id' => $gallery->id])}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                            <button title="Eliminar"  class="btn btn-danger delete-category"><i class="fas fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>

                    <hr>

                    <div class="galeria">
                        <div class="row">
                            <p class="h2 col-12">Galeria 2</p>
                        </div>
                        <div>
                            {{-- Formulario para agregar un elemento --}}
                            @include('admin.modules._parts.formGallery2')
                            {{-- Fin Formulario  --}}
                        </div>

                        <div class="row">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Alt</th>
                                    <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($galleryTwo as $gallery)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td class="w-50"><img class="w-25" src="/storage/{{$gallery->image_src}}" alt="{{$gallery->image_alt}}"></td>
                                        <td>{{$gallery->image_alt}}</td>
                                        <td>@mdo</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- End New Gallery Form -  --}}

            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="editImageModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actulizar Imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        {{-- Formulario Modal para agregar un elemento --}}
            <p class="h2 col-12">Actualizar Imagen</p>

            <form method="POST" enctype="multipart/form-data" class="mt-4" id="modalFormUpdate">
                @method('put')
                @csrf

                <div class="form-row mb-4">

                    <div class="custom-file col-5">
                        <input class="custom-file-input @if($errors->test->first('imagen_src')) is-invalid @endif" type="file" id="imagen_src" name="nueva_imagen_src" id="customFileLangHTML" aria-describedby="validationServer03Feedback">
                        <label for="imagen_src" class="custom-file-label" data-browse="Elegir Imagen">Imagen Nueva</label>
                        @if($errors->test->first('imagen_src'))
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            Este Campo es Requerido
                        </div>
                        @endif

                    </div>

                    <div class="custom-file col-7">
                        <input type="text" class="form-control" id="imagen_alt" 
                        placeholder="Texto Alterno | alt='' ''" name="nueva_imagen_alt" value="{{old('imagen_alt')}}">
                        @error('imagen_alt')
                            {{$message}}
                        @enderror
                    </div>

                </div>

                    <button type="submit" class="btn btn-primary">Agregar a <span class="text-capitalize">Galeria</span></button>
            </form>

            <div class="h1">Imagen Anterior:</div>

            <img id="modalImage" src="" alt="" class="img-fluid">
      </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="submitEditImageModal" type="button" class="btn btn-primary">Actualizar</button> 
    </div>
    
    </div>
  </div>
</div>

@stop

@section('js')
    <script type="application/javascript">
        var alertList = document.querySelectorAll('.alert')
            alertList.forEach(function (alert) {
            new bootstrap.Alert(alert)
            })

            $('#editImageModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var dataId = button.data('image-id');
                $('#modalFormUpdate').attr('action', '/admin/gallery/' + dataId);
                    $.ajax({
                        url: '/admin/gallery/' + dataId,
                        type: 'GET',
                        success: function(data){
                            $('#modalImage').attr('src' , '/storage/' + data.image_src);
                            $('#imagen_alt').val(data.image_alt);
                        },
                        error: function(error){ console.log(error);}
                    });

            })

            $('#submitEditImageModal').on('click', function(){
                $('#editImageModal').submit();
            });
    </script>
@stop