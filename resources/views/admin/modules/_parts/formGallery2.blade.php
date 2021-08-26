{{-- Mostrando Errores 
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
--}}

<p style="font-weight: 700; margin-bottom: .5rem;" class="form-label col-12">Agregar imagen a la Galería Nº 2</p>

<form action="{{route('admin.gallery.image.store')}}" method="POST" enctype="multipart/form-data">
    @method('post')
    @csrf

    <div class="form-row">
        <input type="hidden" name="gallery_id" value="{{$module->id}}">
        <input type="hidden" name="gallery_type" value="2">
    </div>

    <div class="form-row mb-4">
        <div class="custom-file col-4">
            <input class="custom-file-input @if($errors->test->first('imagen_src')) is-invalid @endif" type="file" id="galleryForm-2" name="imagen_src" id="customFileLangHTML" aria-describedby="validationServer03Feedback">
            <label id="galleryLabel-2" for="imagen_src" class="custom-file-label" data-browse="Elegir Imagen">Seleccionar imagen</label>

            @if($errors->test->first('imagen_src'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    Este campo es requerido
                </div>
            @endif

        </div>

        <div class="custom-file col-4">
            <input type="text" class="form-control" id="alt" 
            placeholder="Descripción de la imagen" name="imagen_alt" value="{{old('imagen_alt')}}">

            @error('imagen_alt')
                {{$message}}
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary col-4">Agregar imagen a Galería</button>
    </div>
</form>