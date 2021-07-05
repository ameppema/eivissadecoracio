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

<!-- Formulario para agregar un elemento al slider -->
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <x-adminlte-input name="titulo" label="Titulo" placeholder="Titulo"
            fgroup-class="col-4" disable-feedback value="{{old('titulo')}}"/>

        <x-adminlte-input name="descripcion" label="Descripcion" placeholder="..."
            fgroup-class="col-6" disable-feedback value="{{old('descripcion')}}"/>
        
    </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input class="form-control" type="file" id="imagen-slide" name="imagen">
        </div>
        <div class="mb-3">
            <label for="imagen-movil" class="form-label">Imagen Version Movil</label>
            <input class="form-control" type="file" id="imagen-slide-movil" name="imagen-movil">
        </div>

        <br>

        <x-adminlte-button type="submit" label="Agregar al Slide" theme="primary"/>
</form>