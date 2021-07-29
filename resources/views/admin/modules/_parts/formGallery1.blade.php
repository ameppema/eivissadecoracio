{{-- Formulario para agregar un elemento --}}
<p style="font-weight: 700; margin-bottom: .5rem;" class="form-label col-12">Agregar imagen a la Galería Nº 1</p>

<form action="{{route('admin.gallery.image.store')}}" method="POST" enctype="multipart/form-data">
    @method('post')
    @csrf

    <div class="form-row">
        <input type="hidden" name="gallery_id" value="{{$module->id}}">
        <input type="hidden" name="gallery_type" value="1">
    </div>

    <div class="form-row mb-4">
        <div class="custom-file col-4">
            <input class="custom-file-input @if($errors->test->first('imagen_src')) is-invalid @endif" type="file" id="imagen_src" name="imagen_src" id="customFileLangHTML" aria-describedby="validationServer03Feedback">
            <label for="imagen_src" class="custom-file-label" data-browse="Elegir Imagen">Seleccionar imagen</label>

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