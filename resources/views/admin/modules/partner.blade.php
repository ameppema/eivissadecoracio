@extends('adminlte::page')

@section('title', ' Eivissa Slider')

@section('content_header')
    <div class="page-header section__title">
        <h1>Eivissa Decoracio | Sección de Partners</h1>
    </div>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {{-- Form Items Section --}}
                <div class="card">
                    <div class="card-body">
                        @include('admin.modules._parts.partners_form')
                    </div>
                </div>

                {{-- Form Galleries --}}
                <div class="card">
                    <div class="card-body">
                        <div style="margin-bottom: 50px;">
                            <p style="font-weight: 700;" class="form-label col-12">Agregar imagen a sección Partners</p>
    
                            <form action="{{route('admin.gallery.image.store')}}" method="POST" enctype="multipart/form-data">
                                @method('post')
                                @csrf
    
                                <div class="form-row">
                                    <input type="hidden" name="gallery_id" value="7">
                                    <input type="hidden" name="gallery_type" value="1">
                                </div>
    
                                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; grid-template-rows: 1fr; grid-gap: 20px;">
                                    <div class="custom-file">
                                        <input class="custom-file-input @if($errors->test->first('imagen_src')) is-invalid @endif" type="file" id="imagen_src" name="imagen_src" aria-describedby="validationServer03Feedback">
                                        <label for="imagen_src" class="custom-file-label" data-browse="Elegir Imagen">Seleccionar imagen</label>
                                        @if($errors->test->first('imagen_src'))
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                Este campo es requerido
                                            </div>
                                        @endif
                                    </div>
    
                                    <div class="custom-file">
                                        <input type="text" class="form-control" id="imagen_alt" placeholder="Descripción de la imagen" name="imagen_alt" value="{{old('imagen_alt')}}">
                                        @error('imagen_alt')
                                            {{$message}}
                                        @enderror
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Agregar imagen a la sección</button>
                                </div>
                            </form>
                        </div>

                        {{-- Start SlideShow - main_table --}}
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="10%" style="border-top: none;">Orden</th>
                                    <th width="40%" style="border-top: none;">Imagen</th>
                                    <th width="30%" style="border-top: none;">Nombre del Partner</th>
                                    <th width="20%" style="border-top: none;">Acciones</th>
                                </tr>
                            </thead>

                            <tbody id="mylist">
                                @foreach($gallery as $item)
                                    <tr data-id="{{$item->id}}">
                                        <td style="vertical-align: middle;" data-id="{{$item->id}}">{{$item->sort_order}}</td>
                                        <td style="vertical-align: middle;">
                                            <img style="width: 150px;" src="/storage/{{$item->image_src}}" alt="{{$item->image_alt}}">
                                        </td>
                                        <td style="vertical-align: middle;" class="text-capitalize" >{{$item->image_alt}}</td>
                                        <td style="vertical-align: middle;">
                                            <button title="Editar" style="margin-right: 20px;" class="btn btn-warning edit-category" data-toggle="modal" data-target="#editImageModal" data-image-id="{{$item->id}}"><i class="fas fa-edit"></i></button>
                                            <form action="{{route('admin.gallery.image.destroy' , [$item->id] )}}" method="POST" class="d-inline">
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
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Partner Modal --}}
<div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="editImageModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Actualizar Imagen</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" id="modalFormUpdate">
                    @method('put')
                    @csrf

                    <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr 1fr; grid-template-rows: 1fr; grid-gap: 20px;">
                        <div class="custom-file">
                            <input class="custom-file-input @error('imagen_src') is-invalid @enderror" type="file" id="imagen_src" name="nueva_imagen_src" aria-describedby="validationServer03Feedback">
                            <label for="imagen_src" class="custom-file-label" data-browse="Elegir Imagen">Imagen Nueva</label>
                            
                            @error('imagen_src')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Este campo es requerido
                                </div>
                            @enderror
                        </div>

                        <div class="custom-file">
                            <input type="text" class="form-control @error('imagen_src') is-invalid @enderror" id="modalAlt" 
                            placeholder="Texto Alterno | alt='' ''" name="nueva_imagen_alt">
                            
                            @error('imagen_alt')
                                {{$message}}
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Agregar a <span class="text-capitalize">Galeria</span></button>
                    </div>
                </form>

                <div style="text-align: center; font-weight: 700; margin-top: 50px;">Imagen actual</div>

                <img id="modalImage" class="img-fluid" style="width: 400px; display: block; margin: 0 auto;">
            </div>

            <div class="modal-footer" style="display: flex; justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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

        .partner__spanish,
        .partner__english {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr;
            grid-gap: 20px;
            margin-bottom: 30px;
        }
        
        .partner__title,
        .partner__description {
            display: flex;
            align-items: center;
        }
        
        .title__image,
        .description__image {
            width: 30px;
            height: 21px;
        }
        
        .title__label,
        .description__label {
            margin: 0 10px 0 5px;
        }

        .partner__button {
            height: 38px;
            align-self: end;
        }
    </style>
@stop

@section('js')
    <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>

    <script type="application/javascript" defer>
        $(document).ready(() => {
            /* Sorteable */
            const SortList = $('#mylist'); 
            SortList.sortable({
                animation: 150,
                easing: "cubic-bezier(1, 0, 0, 1)",
                ghostClass : 'bg-light',
                chosenClass : 'bg-light',
                onEnd: getOrder
            });

            function getOrder(){
                let ordered = SortList.sortable('toArray');
                ordered.reverse();
                let orderUpdated = [];
                ordered.forEach((id, index) => {
                    index += 1;
                    orderUpdated.push({index, id});
                });
                $.ajax({
                    type: 'PUT',
                    url: '/admin/module/partners/order',
                    data: {data: JSON.stringify(orderUpdated), _token: '{{csrf_token()}}'},
                    success: (data) => console.log('%c Orden Cambiado Correctamente','background-color:green'),
                    error: (err) => console.error('Not Succes')
                })
            }

            /* Modal Content */
            $('#editImageModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var dataId = button.data('image-id');
                $('#modalFormUpdate').attr('action', '/admin/gallery/' + dataId);
                    $.ajax({
                        url: '/admin/gallery/' + dataId,
                        type: 'GET',
                        success: function(data){
                            $('#modalImage').attr('src' , '/storage/' + data.image_src);
                            $('#modalAlt').val(data.image_alt);
                        },
                        error: function(error){ console.log(error);}
                    });

            })
        })
    </script>
@stop