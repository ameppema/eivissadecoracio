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
<p class="h1">Menu de Navegación</p>
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="mb-3 col-4">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
                placeholder="Nombre..." value="{{old('nombre')}}">
        </div>

    </div>
    
    <br>
        <button type="submit" class="btn btn-primary">Agregar a <span class="text-capitalize">menu</span></button>
</form>