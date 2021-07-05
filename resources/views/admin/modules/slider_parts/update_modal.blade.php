<x-adminlte-modal id="modalCustom" title="Editar Elemento del Slider" size="xl" theme="dark"
    icon="fas fa-bell" v-centered static-backdrop scrollable>

    <div class="container">
            <!-- Formulario Modal para Editar un elemento al slider -->
            <form action="" method="post" enctype="multipart/form-data" id="Form-Edit">
                @csrf
                @method('put')
                <div class="row">
                    <x-adminlte-input name="titulo" label="Titulo" placeholder="Titulo"
                        fgroup-class="col-4" disable-feedback value="{{old('titulo')}}" id="modal-titulo"/>

                    <x-adminlte-input name="descripcion" label="Descripcion" placeholder="..."
                        fgroup-class="col-6" disable-feedback value="{{old('descripcion')}}" id="modal-desc" />
                </div>
                    
                    <div>
                        <p class="h3">Imagen Anterior</p>
                        <img class="img-fluid w-50" src="" alt="Imagen anterior Slide" id="oldImgDesk">

                        <div class="mb-3">
                            <label for="imagen" class="h2">Subir Imagen Nueva</label>
                            <input class="form-control w-50" type="file" id="imagen-slide-modal" name="imagenNueva">
                        </div>

                        <p class="h3">Imagen Movil Anterior</p>
                        <img class="img-fluid w-25" src="" alt="Imagen anterior Slide" id="oldImgMovil">

                        <div class="mb-3">
                            <label for="imagenMovilNueva" class="form-label h2">Subir Imagen Version Movil Nueva</label>
                            <input class="form-control w-50" type="file" id="imagen-slide-movil-modal" name="imagenMovilNueva">
                        </div>

                    </div>

                    <br>

            </form>
    </div>

    <x-slot name="footerSlot">
        <x-adminlte-button type="submit" class="mr-auto" theme="success" label="Aceptar" id="EnviarModalEditar"/>
        <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal"/>
    </x-slot>

</x-adminlte-modal>