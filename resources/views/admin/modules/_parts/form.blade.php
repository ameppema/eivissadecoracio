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
<form action="{{$module->id}}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf

    <div class="row">
        <div class="col-6">
            <label for="titulo" class="form-label">Título de la página</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escribir título de la página" value="{{old('titulo') ?? $module->titulo}}">
        </div>

        <div class="col-6">
            <label for="subtitulo" class="form-label">Descripción de la página</label>
            <input type="text" class="form-control" id="subtitulo" name="subtitulo" placeholder="Escribir descripción de la página" value="{{old('subtitulo') ?? $module->subtitulo}}">
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 1fr; grid-gap: 20px; margin: 20px 0;">
        <div style="display: flex; flex-direction: column;">
            <label for="imagen" class="form-label">Imagen Grande <span style="font-weight: 200">(Desktop)</span></label>
            <input class="form-control" type="file" id="imagen-principal" name="imagen-principal" style="height: auto; padding: .400rem;">
        </div>

        <div style="display: flex; flex-direction: column;">
            <label for="imagen_movil" class="form-label">Imagen Pequeña <span style="font-weight: 200">(Móvil)</span></label>
            <input class="form-control" type="file" id="imagen_movil" name="imagen_movil" style="height: auto; padding: .400rem;">
        </div>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); grid-template-rows: 1fr; grid-gap: 20px;">
        <div class="form-group">
            <label for="fisrt_text">Texto <span class="text-capitalize">{{$module_name}}</span> Nº 1</label>
            <textarea class="form-control" id="fisrt_text" rows="10" name="fisrt_text" >{{$module->texto_principal}}</textarea>
        </div>
    
        <div class="form-group">
            <label for="second_text">Texto <span class="text-capitalize">{{$module_name}}</span> Nº 2</label>
            <textarea class="form-control" id="second_text" rows="10" name="second_text">{{$module->texto_secundario}}</textarea>
        </div>
    
        <div class="form-group">
            <label for="third_text">Texto <span class="text-capitalize">{{$module_name}}</span> Nº 3</label>
            <textarea class="form-control" id="third_text" rows="10" name="third_text">{{$module->texto_tres}}</textarea>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar página de <span class="text-capitalize">{{$module_name}}</span></button>
</form>