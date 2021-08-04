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

    {{-- Section Title & Description in Spanish --}}
    <div class="partner__spanish">
        <div class="partner__title">
            <img class="title__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
            <label class="title__label" for="PartnerTitle_ES">Título</label>
            <input class="form-control" id="PartnerTitle_ES" name="titulo" type="text" placeholder="Título en Español" value="{{$partnerData->titulo ?? old('titulo')}}">
        </div>
        
        <div class="partner__description">
            <img class="description__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
            <label class="description__label" for="PartnerDescription_ES">Descripción</label>
            <input class="form-control" id="PartnerDescription_ES" name="descripcion" placeholder="Descripción en Español" disable-feedback value="{{old('descripcion')}}"/>
        </div>
    </div>
    
    {{-- Section Title & Description in English --}}
    <div class="partner__english">
        <div class="partner__title">
            <img class="title__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
            <label class="title__label" for="PartnerTitle_EN">Título</label>
            <input class="form-control" id="PartnerTitle_EN" name="titulo" type="text" placeholder="Título en Ingles" value="{{$partnerData->titulo ?? old('titulo')}}">
        </div>
        
        <div class="partner__description">
            <img class="description__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
            <label class="description__label" for="PartnerDescription_EN">Descripción</label>
            <input class="form-control" id="PartnerDescription_EN" name="descripcion" placeholder="Descripción en Ingles" disable-feedback value="{{old('descripcion')}}"/>
        </div>
    </div>

    <button class="btn btn-primary partner__button" type="submit">Actualizar sección Partner</button>
</form>