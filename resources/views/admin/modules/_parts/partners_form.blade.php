{{-- Errores --}}
@if($errors->any())
    <div class="alert alert-danger d-flex flex-column  alert-dismissible fade show" role="alert">
        <div class="h3 d-block"> 
            <i class="fas fa-exclamation-circle"></i>
            <span> Error en el Formulario </span>
        </div>
        <div class="d-block">
            <ul class="d-block">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- Formulario para agregar un elemento -->
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; grid-template-rows: 1fr; grid-gap: 20px;">
        <div>
            <label for="titulo" class="form-label">Título de la sección</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Title..." value="{{$partnerData->titulo ?? old('titulo')}}">
        </div>

        <div>
            <label for="subtitulo" class="form-label">Descripción de la sección</label>
            <input type="text" class="form-control" id="subtitulo" name="subtitulo" placeholder="Sub..." value="{{$partnerData->subtitulo ?? old('subtitulo')}}">
        </div>
        
        <button type="submit" class="btn btn-primary" style="height: 38px; align-self: end;">Actualizar sección Partners</button>
    </div>
</form>

@section('css')
    <style>
        .partners {}
    </style>
@stop