{{-- Mostrando Errores --}}
@if($errors->any())
    <x-adminlte-alert class="bg-red " icon="fa-lg fas fa-exclamation-circle" title="Error en el Formulario" dismissable>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-adminlte-alert> 
@endif

<!-- Formulario para agregar un Slide -->
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <x-adminlte-input name="titulo" label="Título" placeholder="Título del Slide" fgroup-class="col-6" disable-feedback value="{{old('titulo')}}"/>

        <x-adminlte-input name="descripcion" label="Descripción" placeholder="Descripción del Slide" fgroup-class="col-6" disable-feedback value="{{old('descripcion')}}"/>
    </div>

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