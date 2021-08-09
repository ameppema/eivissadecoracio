@extends('adminlte::page')

@section('title', 'Section Page')

@section('content_header')
    <div class="page-header section__title">
        <h1>Página {{$module_name}} | <small>Eivissa Decoracio</small></h1>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    {{-- Content Form --}}
                    <div class="card">
                        <div class="card-body">
                            <div>
                                @include('admin.modules._parts.form')
                            </div>
                        </div>
                    </div>

                    {{-- Gallery Nº 1 --}}
                    <div class="card">
                        <div class="card-body">
                            <div style="margin-bottom: 50px">
                                @include('admin.modules._parts.formGallery1')
                            </div>

                            {{-- Gallery elements --}}
                            <div class="row">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="10%" style="border-top: none;">#</th>
                                            <th width="20%" style="border-top: none;">Imagen</th>
                                            <th width="50%" style="border-top: none;">Descripción de la imagen</th>
                                            <th width="20%" style="border-top: none;">Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($galleryOne as $gallery)
                                        <tr>
                                            <th style="vertical-align: middle;" scope="row">{{$loop->iteration}}</th>
                                            <td style="width: 150px; vertical-align: middle;"><img class="w-50" src="/storage/{{$gallery->image_src}}" alt="{{$gallery->image_alt}}"></td>
                                            <td style="vertical-align: middle;">{{$gallery->image_alt}}</td>
                                            <!-- #acciones -->
                                            <td style="vertical-align: middle; padding: 0 .75rem;">
                                                <button title="Editar" style="margin-right: 20px;" class="btn btn-warning edit-category" data-toggle="modal" data-target="#editImageModal" data-image-id="{{$gallery->id}}">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <form action="{{route('admin.gallery.image.update', ['id' => $gallery->id])}}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    
                                                    <button title="Eliminar" class="btn btn-danger delete-category"><i class="fas fa-times"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Gallery Nº 2 --}}
                    <div class="card">
                        <div class="card-body">
                            <div style="margin-bottom: 50px">
                                @include('admin.modules._parts.formGallery2')
                            </div>

                            {{-- Gallery elements --}}
                            <div class="row">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="10%" style="border-top: none;">#</th>
                                            <th width="20%" style="border-top: none;">Imagen</th>
                                            <th width="50%" style="border-top: none;">Descripción de la imagen</th>
                                            <th width="20%" style="border-top: none;">Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($galleryTwo as $gallery)
                                        <tr>
                                            <th style="vertical-align: middle;" scope="row">{{$loop->iteration}}</th>
                                            <td style="width: 150px; vertical-align: middle;"><img class="w-50" src="/storage/{{$gallery->image_src}}" alt="{{$gallery->image_alt}}"></td>
                                            <td style="vertical-align: middle;">{{$gallery->image_alt}}</td>
                                            <!-- #acciones -->
                                            <td style="vertical-align: middle; padding: 0 .75rem;">
                                                <button title="Editar" style="margin-right: 20px;" class="btn btn-warning edit-category" data-toggle="modal" data-target="#editImageModal" data-image-id="{{$gallery->id}}">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <form action="{{route('admin.gallery.image.update', ['id' => $gallery->id])}}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    
                                                    <button title="Eliminar" class="btn btn-danger delete-category"><i class="fas fa-times"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="editImageModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Actualizar imagen de Galería</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    {{-- Modal add new Image --}}
                    <form class="mt-4 modal__container" id="modalFormUpdate" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="form-row mb-4">
                            <div class="custom-file col-6">
                                <input class="custom-file-input @error('imagen_src') is-invalid @enderror" type="file" id="imagen_src" name="nueva_imagen_src" aria-describedby="validationServer03Feedback">
                                
                                <label class="custom-file-label modal__label" for="imagen_src" data-browse="Elegir Imagen">Imagen Nueva</label>
                                
                                @error('imagen_src')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Este Campo es Requerido
                                    </div>
                                @enderror
                            </div>

                            <div class="custom-file col-6">
                                <input type="text" class="form-control" id="imagen_alt" placeholder="Descripción de la imagen" name="nueva_imagen_alt" value="{{old('imagen_alt')}}">
                                @error('imagen_alt')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>

                        <img class="img-fluid modal__image" id="modalImage" src="" alt="">

                        <div class="modal__subtitle">Imagen actual</div>

                        <button class="btn btn-success modal__button" type="submit">Agregar a Galeria</button>
                        <button class="btn btn-danger modal__button" type="button" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .section__title {
            margin-left: 7.5px;
        }

        .section__header {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr;
            grid-gap: 20px;
            margin-bottom: 30px;
        }
        
        .section__spanish,
        .section__english {
            margin-bottom: 30px;
            border-bottom: 2px solid #f2f2f2;
        }
        
        .header-title__items,
        .header-subtitle__items {
            display: flex;
            align-items: center;
        }
        
        .header-title__image,
        .header-subtitle__image,
        .paragraph__image {
            width: 30px;
            height: 21px;
        }
        
        .header-title__label,
        .header-subtitle__label {
            margin: 0 10px 0 5px;
        }

        .header-title__items > .form-control,
        .header-subtitle__items > .form-control {
            width: 100%;
            margin-bottom: 0;
        }

        .section__paragraph {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: 1fr;
            grid-gap: 20px;
            margin-bottom: 30px;
        }
        
        .section__paragraph > .form-group {
            margin-bottom: 0;
        }
        
        .paragraph__image {
            margin-bottom: 3px;
        }
        
        .section__images {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr;
            grid-gap: 20px;
            margin-bottom: 20px;
        }

        .modal__container {
            text-align: center;
            margin: 50px;
        }
        
        .modal__image {
            width: 50%;
        }
        
        .modal__label {
            text-align: left;
        }
        
        .modal__subtitle {
            font-size: 25px;
            margin: 20px 0;
        }
        
        .modal__button {
            margin: 0 20px;
        }
    </style>
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
            });

            $('#submitEditImageModal').on('click', function(){
                $('#editImageModal').submit();
            });
    </script>
@stop