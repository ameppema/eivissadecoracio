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

    {{-- Section in Spanish --}}
    <div class="section__spanish">
        {{-- Section Page: Title & Description --}}
        <div class="section__header">
            <div class="header-title__items">
                <img class="header-title__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
                <label class="form-label header-title__label" for="pageTitle_ES">Título</label>
                <input class="form-control header-title__input" id="pageTitle_ES" name="titulo" type="text" placeholder="Escribir título en Español" value="{{old('titulo') ?? $module->titulo}}">
            </div>
            
            <div class="header-subtitle__items">
                <img class="header-subtitle__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
                <label class="form-label header-subtitle__label" for="pageSubtitle_ES">Descripción</label>
                <input class="form-control header-subtitle__input" id="pageSubtitle_ES" name="subtitulo" type="text" placeholder="Escribir subtitulo en Español" value="{{old('subtitulo') ?? $module->subtitulo}}">
            </div>
        </div>
    
        {{-- Section Paragraph --}}
        <div class="section__paragraph">
            <div class="form-group paragraph__items">
                <img class="paragraph__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
                <label class="paragraph__label" for="first_text">Texto <span class="text-capitalize">{{$module_name}}</span> Nº 1</label>
                <textarea class="form-control paragraph__text" id="first_text" rows="10" name="first_text">{{$module->texto_principal}}</textarea>
            </div>
            
            <div class="form-group paragraph__items">
                <img class="paragraph__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
                <label class="paragraph__label" for="second_text">Texto <span class="text-capitalize">{{$module_name}}</span> Nº 2</label>
                <textarea class="form-control paragraph__text" id="second_text" rows="10" name="second_text" >{{$module->texto_secundario}}</textarea>
            </div>
            
            <div class="form-group paragraph__items">
                <img class="paragraph__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
                <label class="paragraph__label" for="third_text">Texto <span class="text-capitalize">{{$module_name}}</span> Nº 3</label>
                <textarea class="form-control paragraph__text" id="third_text" rows="10" name="third_text" >{{$module->texto_principal}}</textarea>
            </div>
        </div>
    </div>
    
    {{-- Section in English --}}
    <div class="section__english">
        {{-- Section Page: Title & Description --}}
        <div class="section__header">
            <div class="header-title__items">
                <img class="header-title__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
                <label class="form-label header-title__label" for="pageTitle_EN">Título</label>
                <input class="form-control header-title__input" id="pageTitle_EN" name="pageTitle_EN" type="text" placeholder="Escribir título en Ingles" value="{{old('titulo') ?? $module->titulo}}">
            </div>
            
            <div class="header-subtitle__items">
                <img class="header-subtitle__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
                <label class="form-label header-subtitle__label" for="pageSubtitle_EN">Descripción</label>
                <input class="form-control header-subtitle__input" id="pageSubtitle_EN" name="pageSubtitle_EN" type="text" placeholder="Escribir subtitulo en Ingles" value="{{old('subtitulo') ?? $module->subtitulo}}">
            </div>
        </div>
        
        {{-- Section Paragraph --}}
        <div class="section__paragraph">
            <div class="form-group paragraph__items">
                <img class="paragraph__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
                <label class="paragraph__label" for="first_text">Texto <span class="text-capitalize">{{$module_name}}</span> Nº 1</label>
                <textarea class="form-control paragraph__text" id="first_text" rows="10" name="first_text" >{{$module->texto_principal}}</textarea>
            </div>
            
            <div class="form-group paragraph__items">
                <img class="paragraph__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
                <label class="paragraph__label" for="second_text">Texto <span class="text-capitalize">{{$module_name}}</span> Nº 2</label>
                <textarea class="form-control paragraph__text" id="second_text" rows="10" name="second_text" >{{$module->texto_principal}}</textarea>
            </div>
            
            <div class="form-group paragraph__items">
                <img class="paragraph__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
                <label class="paragraph__label" for="third_text">Texto <span class="text-capitalize">{{$module_name}}</span> Nº 3</label>
                <textarea class="form-control paragraph__text" id="third_text" rows="10" name="third_text" >{{$module->texto_principal}}</textarea>
            </div>
        </div>
    </div>

    {{-- Section Images --}}
    <div class="section__images">
        <div style="display: flex; flex-direction: column;">
            <label for="imagen" class="form-label">Imagen Grande <span style="font-weight: 200">(Desktop)</span></label>
            <input class="form-control" type="file" id="imagen-principal" name="imagen-principal" style="height: auto; padding: .400rem;">
        </div>

        <div style="display: flex; flex-direction: column;">
            <label for="imagen_movil" class="form-label">Imagen Pequeña <span style="font-weight: 200">(Móvil)</span></label>
            <input class="form-control" type="file" id="imagen_movil" name="imagen_movil" style="height: auto; padding: .400rem;">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar página de <span class="text-capitalize">{{$module_name}}</span></button>
</form>