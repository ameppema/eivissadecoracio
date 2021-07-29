<x-adminlte-modal id="modalCustom" title="Editar componentes del Slide" size="xl" v-centered static-backdrop scrollable>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data" id="Form-Edit">
            @csrf
            @method('put')

            <div class="row">
                <x-adminlte-input name="titulo" label="Título del Slide" placeholder="Escribir título del Slide" fgroup-class="col-6" disable-feedback value="{{old('titulo')}}" id="modal-titulo"/>

                <x-adminlte-input name="descripcion" label="Descripción del Slide" placeholder="Escribir descripción del Slide" fgroup-class="col-6" disable-feedback value="{{old('descripcion')}}" id="modal-desc" />
            </div>
                
            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 1fr; grid-gap: 20px; height: 500px;">
                <div class="image_large" style="display: flex; justify-content: space-between; flex-direction: column; align-items: center; padding: 30px 0;">
                    <p style="font-size: 30px; font-weight: 700;">Imagen Grande <span style="font-weight: 200">(Desktop)</span></p>
                    <img style="width: 400px;" src="" alt="Imagen anterior Slide" id="oldImgDesk">
                    <input style="padding: .50rem; background-color: #fff; background-clip: padding-box; border: 1px solid #ced4da; border-radius: .25rem; box-shadow: inset 0 0 0 transparent; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;" type="file" id="imagen-slide-modal" name="imagenNueva">
                </div>

                <div class="image_small" style="display: flex; justify-content: space-between; flex-direction: column; align-items: center; padding: 30px 0;">
                    <p style="font-size: 30px; font-weight: 700;">Imagen Pequeña <span style="font-weight: 200">(Móvil)</span></p>
                    <img style="width: 150px;" src="" alt="Imagen anterior Slide" id="oldImgMovil">
                    <input style="padding: .50rem; background-color: #fff; background-clip: padding-box; border: 1px solid #ced4da; border-radius: .25rem; box-shadow: inset 0 0 0 transparent; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;" type="file" id="imagen-slide-movil-modal" name="imagenMovilNueva">
                </div>
            </div>
        </form>
    </div>

    <x-slot name="footerSlot">
        <div style="width: 100%; text-align: center; padding: 15px;">
            <x-adminlte-button style="margin-right: 15px" type="submit" theme="success" label="Aceptar" id="EnviarModalEditar"/>
            <x-adminlte-button style="margin-left: 15px" theme="danger" label="Cancelar" data-dismiss="modal"/>
        </div>
    </x-slot>
</x-adminlte-modal>