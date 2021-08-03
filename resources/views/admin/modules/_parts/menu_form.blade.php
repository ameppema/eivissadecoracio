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

    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; grid-template-rows: 1fr; grid-gap: 20px;">
        <div style="display: flex; align-items: center;">
            <img style="width: 30px; height: 21px;" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
            <label for="nombre" class="form-label" style="margin: 0 10px 0 3px;">Nombre</label>
            <input type="text" class="form-control" style="display: inline; width: 100%;" id="nombre" name="nombre" placeholder="Agregar nuevo enlace en Español" value="{{old('nombre')}}">
        </div>
        
        <div style="display: flex; align-items: center;">
            <img style="width: 30px; height: 21px;" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
            <label for="nombre" class="form-label" style="margin: 0 10px 0 3px;">Nombre</label>
            <input type="text" class="form-control" style="display: inline; width: 100%;" id="nombre" name="nombre" placeholder="Agregar nuevo enlace en Ingles" value="{{old('nombre')}}">
        </div>
        
        <button style="height: 38px; align-self: end;" type="submit" class="btn btn-primary">Agregar a la Barra de Navegación</span></button>
    </div>
</form>