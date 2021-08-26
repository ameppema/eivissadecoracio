@extends('adminlte::page')

@section('title', ' Eivissa Slider')

@section('content_header')
    <div class="page-header section__title">
        <h1>Sección de Partners | <small>Eivissa Decoracio</small></h1>
    </div>
@stop

@section('content')
{{--Alert Success--}}
@if(session()->has('success'))
    <div class="error-notice" id="close-alert">
        <div class="oaerror success">
        <strong>Muy Bien!</strong> - {{session()->get('success')}}
        </div> 
    </div>
@endif
<div id="alert"></div>    
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
                        {{-- Inputs for new Partner --}}
                        <div class="partner-new">
                            <p class="form-label col-12 partner-new__title">Agregar nuevo Partner a la sección</p>
    
                            <form action="{{route('admin.gallery.image.store')}}" method="POST" enctype="multipart/form-data">
                                @method('post')
                                @csrf
    
                                <div class="form-row">
                                    <input type="hidden" name="gallery_id" value="7">
                                    <input type="hidden" name="gallery_type" value="1">
                                </div>
    
                                <div class="partner-new__inputs">
                                    <div class="custom-file">
                                        <input id="newPartnerImg" class="custom-file-input @if($errors->test->first('imagen_src')) is-invalid @endif" type="file" name="imagen_src">

                                        <label id="parterImgLabel" class="custom-file-label" for="imagen_src" data-browse="Elegir Imagen">Seleccionar imagen</label>

                                        @if($errors->test->first('imagen_src'))
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                Este campo es requerido
                                            </div>
                                        @endif
                                    </div>
    
                                    <div class="custom-file">
                                        <input class="form-control" id="imagen_alt" type="text" placeholder="Nombre del nuevo Partner" name="imagen_alt" value="{{old('imagen_alt')}}">
                                        @error('imagen_alt')
                                            {{$message}}
                                        @enderror
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Agregar nuevo Partner</button>
                                </div>
                            </form>
                        </div>

                        {{-- Partners listing --}}
                        <table class="table partner-list">
                            <thead>
                                <tr>
                                    <th>Orden</th>
                                    <th>Imagen</th>
                                    <th>Nombre del Partner</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody id="mylist">
                                @foreach($gallery as $item)
                                    <tr data-id="{{$item->id}}">
                                        <td data-id="{{$item->id}}">{{$item->sort_order}}</td>
                                        <td>
                                            <img style="width: 150px;" src="/storage/{{$item->image_src}}" alt="{{$item->image_alt}}">
                                        </td>
                                        <td class="text-capitalize">{{$item->image_alt}}</td>
                                        <td>
                                            <button class="btn btn-warning edit-category" title="Editar" data-toggle="modal" data-target="#editImageModal" data-image-id="{{$item->id}}">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <form action="{{route('admin.gallery.image.destroy' , [$item->id] )}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')

                                                <button class="btn btn-danger delete-category" title="Eliminar">
                                                    <i class="fas fa-times"></i>
                                                </button>
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
                <h2 class="modal-title" id="exampleModalLabel">Editar Partner</h2>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" id="modalFormUpdate">
                    @method('put')
                    @csrf
                    
                    <div class="form-row partner-modal__inputs">
                        <div class="custom-file">
                            <input class="custom-file-input @error('imagen_src') is-invalid @enderror" id="updatePartnerImg" type="file" name="nueva_imagen_src" aria-describedby="validationServer03Feedback">
                            <label id="updateParterImgLabel" class="custom-file-label" for="imagen_src" data-browse="Elegir Imagen">Imagen Nueva</label>
                            
                            @error('imagen_src')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Este campo es requerido
                                </div>
                            @enderror
                        </div>

                        <div class="custom-file">
                            <input class="form-control @error('imagen_src') is-invalid @enderror" id="modalAlt" type="text"
                            placeholder="Nombre del Partner" name="nueva_imagen_alt">
                            
                            @error('imagen_alt')
                                {{$message}}
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">Actualizar</button>
                    </div>
                </form>

                <div class="partner-modal__subtitle">Imagen actual</div>

                <img class="img-fluid partner-modal__image" id="modalImage">
            </div>

            <div class="modal-footer partner-modal__button">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="{{ mix('/css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{asset('css/alert.css')}}">

    <style>
        .section__title {
            margin-left: 7.5px;
        }
    
        .partner-new {
            margin-bottom: 50px;
        }
        
        .partner-new__title {
            font-weight: 700;
        }
        
        .partner-new__inputs {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 1fr;
            grid-gap: 20px;
        }
        
        .partner-list thead tr th {
            border-top: none;
        }

        .partner-list tbody tr:hover {
            background-color: rgba(0,0,0,.075);
        }

        .partner-list tbody tr td {
            vertical-align: middle;
        }
        
        .partner-list tbody tr td button {
            margin-right: 20px;
        }
        
        .partner-modal__inputs {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 1fr;
            grid-gap: 20px;
        }
        
        .partner-modal__subtitle {
            margin-top: 50px;
            font-weight: 700;
            text-align: center;
        }
        
        .partner-modal__image {
            display: block;
            width: 50%;
            margin: 0 auto;
        }
        
        .partner-modal__button {
            display: flex;
            justify-content: center;
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
    <script src="{{asset('js/utils.js')}}"></script>

    <script type="application/javascript" defer>
        FeedBackImg('#newPartnerImg',false,'#parterImgLabel');
        FeedBackImg('#updatePartnerImg','#modalImage','#updateParterImgLabel');

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
                    success: (data) => {
                        let Alert = $('#alert');
                        let alertHtml = `
                        <div class="error-notice" id="close-alert">
                            <div class="oaerror success">
                            <strong>Exito</strong> - Orden Actualizado Correctamente
                            </div> 
                        </div>
                        `;
                        Alert.html(alertHtml);
                        setTimeout(() => {
                            Alert.toggle('slow');
                        }, 2000);
                        // console.log('%c Orden Cambiado Correctamente','background-color:green')
                    },
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