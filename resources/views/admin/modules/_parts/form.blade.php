{{-- Mostrando Errores --}}
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
<p class="h1">Contenido en Inicio</p>
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="mb-3 col-4">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo"
                placeholder="Titulo..." value="{{old('titulo')}}">
        </div>

        <div class="mb-3 col-8">
            <label for="subtitulo" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="subtitulo" name="subtitulo"
                placeholder="..." value="{{old('descripcion')}}">
        </div>
        
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen Principal</label>
            <input class="form-control" type="file" id="imagen-slide" name="imagen-principal">
        </div>
    </div>
    
    <p class="h2">Contenido en la pagina</p>
    
    <div class="form-group w-75">
        <label for="fisrt_text">Texto Principal</label>
        <textarea class="form-control" id="fisrt_text" rows="3" name="fisrt_text"></textarea>
    </div>
    <div class="form-group w-75">
        <label for="second_text">Texto Secundario</label>
        <textarea class="form-control" id="second_text" rows="3" name="second_text"></textarea>
    </div>
    <br>
        <button type="submit" class="btn btn-primary">Agregar a <span class="text-capitalize">{{$module_name}}</span></button>
</form>