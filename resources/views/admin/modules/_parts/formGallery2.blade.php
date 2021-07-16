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

{{-- Formulario para agregar un elemento --}}
<p class="h2 col-12">Agregar Imagen</p>

<form action="{{route('admin.gallery.image.store')}}" method="POST" enctype="multipart/form-data" class="mt-4">
    @method('post')
    @csrf

    <div class="form-row">
        <input type="hidden" name="gallery_id" value="{{$module->id}}">
        <input type="hidden" name="gallery_type" value="2">
    </div>

    <div class="form-row mb-4">

    <div class="custom-file col-5">
            <input class="custom-file-input @if($errors->test->first('imagen_src')) is-invalid @endif" type="file" id="imagen_src" name="imagen_src" id="customFileLangHTML" aria-describedby="validationServer03Feedback">
            <label for="imagen_src" class="custom-file-label" data-browse="Elegir Imagen">Imagen</label>
            @if($errors->test->first('imagen_src'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                Este Campo es Requerido
            </div>
            @endif

        </div>

        <div class="custom-file col-7">
            <input type="text" class="form-control" id="alt" 
            placeholder="Texto Alterno | alt='' ''" name="imagen_alt" value="{{old('imagen_alt')}}">
            @error('imagen_alt')
                {{$message}}
            @enderror
        </div>

    </div>

        <button type="submit" class="btn btn-primary">Agregar a <span class="text-capitalize">Galeria</span></button>
</form>
{{-- Fin Formulario  --}}