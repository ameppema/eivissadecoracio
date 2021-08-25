<x-adminlte-modal id="modalCustom" title="Editar componentes del Slide" size="xl" v-centered static-backdrop scrollable>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data" id="Form-Edit">
            @csrf
            @method('put')
            {{-- Modal Title & Description in Spanish --}}
            <div class="modal__spanish">
                <div class="modal__title">
                    <img class="title__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
                    <label class="title__label" for="ModalTitle_ES">Título</label>
                    <x-adminlte-input id="ModalTitle_ES" name="titulo" placeholder="Título en Español" disable-feedback value="{{old('titulo')}}"/>
                </div>
                
                <div class="modal__description">
                    <img class="description__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
                    <label class="description__label" for="ModalDescription_ES">Descripción</label>
                    <x-adminlte-input id="ModalDescription_ES" name="descripcion" placeholder="Descripción en Español" disable-feedback value="{{old('descripcion')}}"/>
                </div>
            </div>
            
            {{-- Modal Title & Description in English --}}
            <div class="modal__english">
                <div class="modal__title">
                    <img class="title__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
                    <label class="title__label" for="ModalTitle_EN">Título</label>
                    <x-adminlte-input id="ModalTitle_EN" name="titulo_en" placeholder="Título en Ingles" disable-feedback value="{{old('titulo')}}"/>
                </div>
                
                <div class="modal__description">
                    <img class="description__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
                    <label class="description__label" for="ModalDescription_EN">Descripción</label>
                    <x-adminlte-input id="ModalDescription_EN" name="descripcion_en" placeholder="Descripción en Ingles" disable-feedback value="{{old('descripcion')}}"/>
                </div>
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
            <x-adminlte-button style="margin-right: 15px" type="submit" theme="success" label="Actualizar" id="EnviarModalEditar"/>
            <x-adminlte-button style="margin-left: 15px" theme="danger" label="Cancelar" data-dismiss="modal"/>
        </div>
    </x-slot>
</x-adminlte-modal>