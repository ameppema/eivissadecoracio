@extends('adminlte::page')

@section('title', ' Eivissa Slider')

@section('content_header')
    <div class="page-header">
    <h1>Eivisa | <small>Gestor de Menu</small></h1>
    </div>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            {{-- Start New Item Form - main_form  --}}
                <div class="card">
                    <div class="card-body">

                        @include('admin.modules._parts.partners_form')

                    </div>
                </div>
            {{-- End New Item Form  --}}

            {{-- Start - Add Image Form --}}

            <div class="card">
                <div class="card-body">
                <p class="h2">Agregar Imagen</p>
                <form action="{{route('admin.gallery.image.store')}}" method="POST" enctype="multipart/form-data" class="mt-4">
                    @method('post')
                    @csrf

                    <div class="form-row">
                        <input type="hidden" name="gallery_id" value="7">
                        <input type="hidden" name="gallery_type" value="1">
                    </div>

                    <div class="form-row mb-4">

                        <div class="custom-file col-5">
                            <input class="custom-file-input @if($errors->test->first('imagen_src')) is-invalid @endif" type="file" id="imagen_src" name="imagen_src" aria-describedby="validationServer03Feedback">
                            <label for="imagen_src" class="custom-file-label" data-browse="Elegir Imagen">Imagen Nueva</label>
                            @if($errors->test->first('imagen_src'))
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Este Campo es Requerido
                            </div>
                            @endif

                        </div>

                        <div class="custom-file col-7">
                            <input type="text" class="form-control" id="imagen_alt" 
                            placeholder="Texto Alterno | alt='' ''" name="imagen_alt">
                            @error('imagen_alt')
                                {{$message}}
                            @enderror
                        </div>

                    </div>

                        <button type="submit" class="btn btn-primary">Agregar a <span class="text-capitalize">Galeria</span></button>
                </form>
                </div>
            </div>

            {{-- End - Add Image Form --}}
            {{-- Start SlideShow - main_table --}}
                <div class="card">
                    <div class="card-body">
                        
                         <!-- Tabla -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Orden</th>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Alt Imagen</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="mylist">
                            @foreach($gallery as $item)
                                <tr data-id="{{$item->id}}">
                                    <td data-id="{{$item->id}}">{{$item->sort_order}}</td>

                                    <td class="w-50" ><img src="/storage/{{$item->image_src}}" alt="{{$item->image_alt}}" class="w-50"></td>
                                    <td class="text-capitalize" >{{$item->image_alt}}</td>
                                    <td>
                                        <button title="Editar"  class="btn btn-warning edit-category" data-toggle="modal" data-target="#editImageModal" data-image-id="{{$item->id}}"><i class="fas fa-edit"></i></button>
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
            {{-- End SlideShow --}}
            </div>
        </div>
    </div>
</section>

{{-- Formulario Modal para agregar un elemento --}}
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

            <p class="h2 col-12">Actualizar Imagen</p>

            <form method="POST" enctype="multipart/form-data" class="mt-4" id="modalFormUpdate">
                @method('put')
                @csrf

                <div class="form-row mb-4">

                    <div class="custom-file col-5">
                        <input class="custom-file-input @error('imagen_src') is-invalid @enderror" type="file" id="imagen_src" name="nueva_imagen_src" aria-describedby="validationServer03Feedback">
                        <label for="imagen_src" class="custom-file-label" data-browse="Elegir Imagen">Imagen Nueva</label>
                        @error('imagen_src')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            Este Campo es Requerido
                        </div>
                        @enderror

                    </div>

                    <div class="custom-file col-7">
                        <input type="text" class="form-control @error('imagen_src') is-invalid @enderror" id="modalAlt" 
                        placeholder="Texto Alterno | alt='' ''" name="nueva_imagen_alt">
                        @error('imagen_alt')
                            {{$message}}
                        @enderror
                    </div>

                </div>

                    <button type="submit" class="btn btn-primary">Agregar a <span class="text-capitalize">Galeria</span></button>
            </form>

            <div class="h1">Imagen Anterior:</div>

            <img id="modalImage" class="img-fluid">
      </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
    
    </div>
  </div>
</div>
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