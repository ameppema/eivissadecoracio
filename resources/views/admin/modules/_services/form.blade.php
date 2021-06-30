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

<!-- Formulario para agregar un elemento al slider -->
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="mb-3 col-4">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo"
                placeholder="Texto principal" value="{{old('titulo')}}">
        </div>

        <div class="mb-3 col-8">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion"
                placeholder="..." value="{{old('descripcion')}}">
        </div>


        <div class="mb-3 col-4">
            <label for="enlace" class="form-label">Enlace</label>
            <input type="text" class="form-control" id="enlace" name="enlace"
                placeholder="Enlace a donde ira al hacer click" value="{{old('enlace')}}">
        </div>
        
    </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input class="form-control" type="file" id="imagen-slide" name="imagen">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Agregar servicio</button>
</form>