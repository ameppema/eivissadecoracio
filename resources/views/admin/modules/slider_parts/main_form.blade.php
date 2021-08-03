{{-- inputs errors --}}
@if($errors->any())
    <x-adminlte-alert class="bg-red " icon="fa-lg fas fa-exclamation-circle" title="Error en el Formulario" dismissable>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-adminlte-alert> 
@endif

<!-- Form new Slide -->
<form action="" method="post" enctype="multipart/form-data">
    @csrf

    {{-- Section Title & Description in Spanish --}}
    <div class="slider__spanish">
        <div class="slider__title">
            <img class="title__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
            <label class="title__label" for="SlideTitle_ES">Título</label>
            <x-adminlte-input id="SlideTitle_ES" name="titulo" placeholder="Título en Español" disable-feedback value="{{old('titulo')}}"/>
        </div>
        
        <div class="slider__description">
            <img class="description__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
            <label class="description__label" for="SlideDescription_ES">Descripción</label>
            <x-adminlte-input id="SlideDescription_ES" name="descripcion" placeholder="Descripción en Español" disable-feedback value="{{old('descripcion')}}"/>
        </div>
    </div>
    
    {{-- Section Title & Description in English --}}
    <div class="slider__english">
        <div class="slider__title">
            <img class="title__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
            <label class="title__label" for="SlideTitle_EN">Título</label>
            <x-adminlte-input id="SlideTitle_EN" name="titulo" placeholder="Título en Ingles" disable-feedback value="{{old('titulo')}}"/>
        </div>
        
        <div class="slider__description">
            <img class="description__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
            <label class="description__label" for="SlideDescription_EN">Descripción</label>
            <x-adminlte-input id="SlideDescription_EN" name="descripcion" placeholder="Descripción en Ingles" disable-feedback value="{{old('descripcion')}}"/>
        </div>
    </div>

    {{-- Section Add images --}}
    <div style="display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 1fr; grid-gap: 20px; margin-bottom: 20px;">
        <div style="display: flex; flex-direction: column;">
            <label for="imagen" class="form-label">Imagen Grande <span style="font-weight: 200">(Desktop)</span></label>
            <input class="form-control" type="file" id="imagen-slide" name="imagen" style="height: auto; padding: .400rem;">
        </div>
    
        <div style="display: flex; flex-direction: column;">
            <label for="imagen-movil" class="form-label">Imagen Pequeña <span style="font-weight: 200">(Móvil)</span></label>
            <input class="form-control" type="file" id="imagen-slide-movil" name="imagen-movil" style="height: auto; padding: .400rem;">
        </div>
    </div>

    <x-adminlte-button type="submit" label="Agregar nuevo Slide" theme="primary"/>
</form>